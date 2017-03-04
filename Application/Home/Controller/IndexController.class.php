<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends PublicController {

	public function _initialize($value='')
	{
        $this->memberDb = M('member');
		$this->categoryDb = M('category');
        $this->taskDb = M('task');
        $this->articleDb = M('article');
        $this->commentDb = M('comment');
        $this->task_cfm = M('taskConfirm');
    	$config = M('config');
    	$this->data_config = $config->find(1);
    	$this->data_category = $this->categoryDb->select();
        $this->crumb = $this->categoryDb->field('category_id,parent_id,name')->select();
        
    }

    /**
     * [首页数据展示逻辑]
     * @param [type] $need [首页需求列表]
     * @param [type] $service [首页服务列表]
     * @param [type] $article_5 [首页灌水区列表]
     * @param [type] $article_6 [首页校园嗅事列表]
     */
   
    public function index()
    {
        $need = $this->taskDb->where('is_delete=0 and status=1 and type=2')->field('task_id,title,type,price,state,create_time')->order('state,create_time')->limit(12)->select();
        $service = $this->taskDb->where('is_delete=0 and status=1 and type=3')->field('task_id,title,type,price,state,create_time')->order('state,create_time')->limit(12)->select();
        $article_5 = $this->articleDb->where('is_delete=0 and status=1 and category_id=5')->field('article_id,category_id,title,create_time')->order('create_time desc')->limit(10)->select();
        $article_6 = $this->articleDb->where('is_delete=0 and status=1 and category_id=6')->field('article_id,category_id,title,create_time')->order('create_time desc')->limit(10)->select();
        
        $this->assign('web', $this->data_config);
        $this->assign('category', $this->data_category);
        $this->assign('need', $need);
        $this->assign('service', $service);
        $this->assign('article_5', $article_5);
        $this->assign('article_6', $article_6);
        $this->assign('category', $this->data_category);

        $this->assign('crumb',0);
    	$this->display('index');
    }

    /**
     * [任务逻辑方法]
     * @param  string $id [任务大厅下的栏目id]
     * @return [type]     [description]
     */
    public function task($id='')
    {   
        
        $arr = self::getParents($this->crumb, $id);
        $crumb = self::adjustCrumb($this->crumb,$arr,$id);
        $count = $this->taskDb->where("is_delete=0 and status=1 and type=$id")->count();
        $page = new \Think\Page($count,30);
        $show = $page->show();
        $list = $this->taskDb->where("is_delete=0 and status=1 and type=$id")->order('state,create_time desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list', $list);
        $this->assign('page', $show);

        $this->assign('category_meta', self::getMeta($id));
        $this->assign('web', $this->data_config);
        $this->assign('category', $this->data_category);
        $this->assign('crumb',$crumb);

    	$this->display('Task/task_list');
    }

    public function postTask($id='')
    {
        self::checkSession();
        $arr = self::getParents($this->crumb, $id);
        $crumb = self::adjustCrumb($this->crumb,$arr,$id);
        $this->assign('category_meta', self::getMeta($id));
        $this->assign('web', $this->data_config);
        $this->assign('category', $this->data_category);
        $this->assign('crumb',$crumb);
        $this->display('Task/post_task');
    }

    /**
     * [文章/帖子逻辑方法]
     * @param  string $id [栏目id]
     * @return [type]     [description]
     */
    public function article($id='')
    {        
        $arr = self::getParents($this->crumb, $id);
        $crumb = self::adjustCrumb($this->crumb,$arr,$id); 
        $count = $this->articleDb->where("is_delete=0 and status=1 and category_id=$id")->count();
        $page = new \Think\Page($count,30);
        $show = $page->show();
        $list = $this->articleDb->where("is_delete=0 and status=1 and category_id=$id")->order('create_time desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list', $list);
        $this->assign('page', $show);

        $this->assign('crumb',$crumb);
        $this->assign('web', $this->data_config);
        $this->assign('category_meta', self::getMeta($id));
        $this->assign('category', $this->data_category);
    	$this->display('Article/art_list');
    }

    public function postArticle($id='')
    {
        self::checkSession();
        $arr = self::getParents($this->crumb, $id);
        $crumb = self::adjustCrumb($this->crumb,$arr,$id);
        $this->assign('category_meta', self::getMeta($id));
        $this->assign('web', $this->data_config);
        $this->assign('category', $this->data_category);
        $this->assign('crumb',$crumb);
        $this->display('Article/post_article');
    }

    /**
     * [添加任务进数据库]
     */
    public function addTask()
    {
        (!IS_AJAX) && exit;
        if (!is_array(session('member'))) {
            exit;
        }
        if (self::checkVerifyCode(I('post.verifyCode'))) {
            $data = I('post.');
            $data['member_id'] = session('member.member_id');
            $data['create_time'] = time();
            $result = $this->taskDb->add($data);
            if ($result) {
                echo 1; //发布成功
            }else{
                echo 2;  //发布失败
            }
        }else{
            echo 3; //验证码错误
        }
    }

    /**
     * [添加文章进数据库]
     */
    public function addArticle()
    {
        (!IS_AJAX) && exit;
        if (!is_array(session('member'))) {
            exit;
        }
        if (self::checkVerifyCode(I('post.verifyCode'))) {
            $data = I('post.');
            $data['member_id'] = session('member.member_id');
            $data['create_time'] = time();
            $result = $this->articleDb->add($data);
            if ($result) {
                echo 1; //发布成功
            }else{
                echo 2;  //发布失败
            }
        }else{
            echo 3; //验证码错误
        }
    }

    /**
     * [内容页]
     * @param  string $id  [栏目id]
     * @param  string $aid [文章id]
     * @return [type]      [description]
     */
    public function articlePage($id='',$aid='')
    {

        $arr = self::getParents($this->crumb, $id);
        $crumb = self::adjustCrumb($this->crumb,$arr,$id);
        $this->assign('category_meta', self::getMeta($id));
        $this->assign('web', $this->data_config);
        $this->assign('category', $this->data_category);
        $this->assign('crumb',$crumb);
        $aid = I('get.aid');
        $article = $this->articleDb
        ->where('is_delete=0 and status=1 ')->alias('a')
        ->field('m.name,a.member_id,a.title,a.article_id,a.content,a.click,a.create_time')
        ->join('__MEMBER__ m ON m.member_id = a.member_id')
        ->find($aid);
        $comment = $this->commentDb->alias('c')->field('c.comment_id,c.parent_id,c.article_id,c.member_id,c.content,c.create_time,m.name')->where("c.article_id=$aid and c.status=1 and c.is_delete=0")->join('__MEMBER__ m ON m.member_id=c.member_id')->order('c.create_time desc')->select();
        $this->assign('comment',$comment);
        $this->assign('article',$article);
        $this->display('Article/article_page');
    }

    /**
     * [文章一级回复]
     * @param  string $aid [description]
     * @return [type]        [description]
     */
    public function artReply($aid='')
    {
        (!IS_AJAX) && exit;
        if (!is_array(session('member'))) {
            echo 1; //还没登录
            exit;
        }elseif (self::checkVerifyCode(I('post.verifyCode'))) {
            $data['member_id'] = session('member.member_id');
            $data['article_id'] = I('post.aid');
            $data['content'] = I('post.content');
            $data['create_time'] = time();
            $result = $this->commentDb->add($data);
            if ($result) {
                echo 2;   //回复成功
            }else{
                echo 3;   //回复失败
            }
            
        }else{
            echo 4;  //验证码错误
        }
    }

    /**
     * [文章二级评论回复]
     * @param  string $aid [description]
     * @return [type]        [description]
     */
    public function comReply($aid='')
    {
        (!IS_AJAX) && exit;
        if (!is_array(session('member'))) {
            echo 1; //还没登录
            exit;
        }else{
            $data['member_id'] = session('member.member_id');
            $data['article_id'] = I('post.aid');
            $data['parent_id'] = I('post.cid');
            $data['content'] = I('post.content');
            $data['create_time'] = time();
            $result = $this->commentDb->add($data);
            if ($result) {
                echo 2;   //回复成功
            }else{
                echo 3;   //回复失败
            }
            
          }
    }
    /**
     * [任务内容页]
     * @param  string $tid [任务id]
     * @return [type]        [description]
     */
    
    public function taskPage($tid='')
    {
        $arr = self::getParents($this->crumb, $id);
        $crumb = self::adjustCrumb($this->crumb,$arr,$id);
        $tid = I('get.tid');
        $task = $this->taskDb
        ->where('is_delete=0 and status=1')->alias('t')
        ->field('m.name,m.member_id,t.task_id,t.title,t.state,t.create_time,t.confirm')
        ->join('__MEMBER__ m ON m.member_id=t.member_id')
        ->find($tid);
        $this->assign('task',$task);
        $this->assign('category_meta', self::getMeta($id));
        $this->assign('web', $this->data_config);
        $this->assign('category', $this->data_category);
        $this->assign('crumb',$crumb);
        $this->display('Task/task_page');
    }

    public function confirmTask($tid='')
    {
        (!IS_AJAX) && exit;
        if (!is_array(session('member'))) {
            echo 6; //请先登录
            exit;
        }
        if (self::checkVerifyCode(I('get.verifyCode'))) {
            $data['task_id'] = I('get.tid');
            $data['member_id'] = session('member.member_id');
            if (self::checkTaskMember($data)) {
                echo 1; //不能重复确认
                exit;
            }elseif (self::checkMemberInfo($data['member_id'])) {
                 echo 5;
                 exit;
            }
            $time['update_time'] = time();
            $data['confirm_time'] = $time['update_time'];
            $result = $this->task_cfm->add($data);
            $result2 = $this->taskDb->where("task_id = $data[task_id]")->save($time);
            if ($result && $result2) {
                echo 2;  //任务接受成功
            }else{
                echo 3;  //接受失败
            }
        }else{
            echo 4;  //验证码错误
        }
    }

    /**
     * [一个会员只能确认一次任务]
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function checkTaskMember($arr)
    {
        $mid = $arr['member_id'];
        $tid = $arr['task_id'];
        return $this->task_cfm->where("task_id=$tid and member_id=$mid")->count();
    }

    /**
     * [判断会员是否能够确认任务]
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function checkMemberInfo($mid='')
    {
        return $this->memberDb->where("member_id=$mid and class=0 and tel=0")->count();
    }

    /**
     * [会员个人中心方法]
     * @param  string $value        [description]
     * @param [type] $page          [任务动态分页]
     * @param [type] $page_task     [任务列表分页]
     * @param [type] $page_article  [发帖列表分页]
     * @return [type]        [description]
     */
    public function member($value='')
    {
        self::checkSession();
        $mid = session('member.member_id');

        $count = $this->taskDb->alias('t')
        ->where("t.member_id=$mid and t.is_delete=0 and t.status=1 and t.state=1")
        ->join('__TASK_CONFIRM__ tc ON t.task_id=tc.task_id')
        ->join('__MEMBER__ m ON tc.member_id=m.member_id')
        ->count();
        $page = new \Think\Page($count, 30);
        $list = $this->taskDb->alias('t')
        ->field('m.name,m.tel,m.class,m.member_id,t.task_id,t.title,tc.confirm_time')
        ->where("t.member_id=$mid and t.is_delete=0 and t.status=1 and t.state=1")
        ->join('__TASK_CONFIRM__ tc ON t.task_id=tc.task_id')
        ->join('__MEMBER__ m ON tc.member_id=m.member_id')
        ->order('tc.confirm_time')
        ->limit($page->firstRow.','.$page->listRows)
        ->select();

        $count_task = $this->taskDb
        ->where("member_id=$mid and is_delete=0 and status=1")
        ->count();
        $page_task = new \Think\Page($count_task,30);
        $list_task = $this->taskDb
        ->field('task_id,title,confirm,create_time,update_time,state')
        ->where("member_id=$mid and is_delete=0 and status=1")
        ->order('create_time desc')
        ->limit($page_task->firstRow.','.$page_task->listRows)
        ->select();

        $count_art = $this->articleDb
        ->where("member_id=$mid and status=1 and is_delete=0")
        ->count();
        $page_art = new \Think\Page($count_art, 30);
        $list_art = $this->articleDb
        ->field('article_id,title,click,create_time,update_time')
        ->where("member_id=$mid and is_delete=0 and status=1")
        ->order('create_time desc')
        ->limit($page_art->firstRow.','.$page_art->listRows)
        ->select();


        //个人信息
        $member = $this->memberDb->find($mid);
        $this->assign('member',$member);
        $this->assign('list',$list);
        $this->assign('page',$page->show());
        $this->assign('list_task',$list_task);
        $this->assign('page_task',$page_task->show());
        $this->assign('list_art',$list_art);
        $this->assign('page_art',$page_art->show());
        $this->assign('web', $this->data_config);
        $this->assign('category', $this->data_category);
        $this->assign('crumb',0);
        $this->display('Member/member');
    }

    /**
     * [修改会员个人信息]
     * @param  string $type [type=1为修改个人信息，type=2为修改密码]
     * @return [type]        [description]
     */
    public function changeInfo($type='')
    {
        (!IS_AJAX) && exit;
        if (!is_array(session('member'))) {
            echo 5; //请先登录
            exit;
        }elseif (I('get.type')==1) {
            $mid = session('member.member_id');
            $data['name'] = I('post.name');
            $data['tel'] = I('post.tel');
            $data['class'] = I('post.class');
            $result = $this->memberDb->where("member_id=$mid")->save($data);
            if ($result) {
                echo 1;  //修改成功
            }else{
                echo 2;  //修改失败
            }
        }elseif (I('get.type')==2) {
            $mid = session('member.member_id');
            $member = $this->memberDb->find($mid);
            $data['pwd'] = hash('sha256',I('post.pwd').$member['salt']);
            $result = $this->memberDb->where("member_id=$mid")->save($data);
            if ($result) {
                echo 3;  //修改成功
                session('member',null);
            }else{
                echo 4;  //修改失败
            }
        }
    }

    /**
     * [改变任务的状态：已完成和已关闭]
     * @param  string $tik [任务id]
     * @return [type]        [description]
     */
    public function changeState($tid='')
    {
        (!IS_AJAX) && exit;
        if (!is_array(session('member'))) {
            echo 5; //请先登录
            exit;
        }elseif (I('get.type') == 1) {
            $tid = I('get.tid');
            $mid = session('member.member_id');
            $yourTask = $this->taskDb->where("task_id=$tid and member_id = $mid")->find();
            if ($yourTask) {
                $data['state'] = 2;   //表示任务采纳，状态变为已完成
                $result = $this->taskDb->where("task_id=$tid and member_id = $mid")->save($data);
                if ($result) {
                    echo 1;  //采纳成功
                }else{
                    echo 2;  //采纳失败
                }
            }
        }elseif (I('get.type') == 2) {
            $tid = I('get.tid');
            $mid = session('member.member_id');
            $yourTask = $this->taskDb->where("task_id=$tid and member_id = $mid")->find();
            if ($yourTask) {
                $data['state'] = 3;   //表示任务关闭，状态变为已关闭
                $result = $this->taskDb->where("task_id=$tid and member_id = $mid")->save($data);
                if ($result) {
                    echo 3;  //关闭成功
                }else{
                    echo 4;  //关闭失败
                }
        }
      }
    }
    /**
     * [会员对外个人中心]
     * @param  string $mid [会员id]
     * @return [type]      [description]
     */
    public function memberPub($mid='')
    {
        $mid = I('get.mid');
        $member = $this->memberDb->where('status=1 and is_delete=0')->field('member_id,name')->find($mid);
        $count = $this->taskDb->where("is_delete=0 and status=1 and member_id=$mid")->count();
        $page = new \Think\Page($count, 30);
        $show = $page->show();
        $list = $this->taskDb->where("is_delete=0 and status=1 and member_id=$mid")->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();
        
        $count_art = $this->articleDb->where("is_delete=0 and status=1 and member_id=$mid")->count();
        $page_art = new \Think\Page($count_art, 30);
        $show_art = $page_art->show();
        $list_art = $this->articleDb->where("is_delete=0 and status=1 and member_id=$mid")->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('member', $member);
        $this->assign('list',$list);
        $this->assign('page',$page);
        $this->assign('list_art',$list_art);
        $this->assign('page_art',$page_art);
        $this->assign('web', $this->data_config);
        $this->assign('category', $this->data_category);
        $this->assign('crumb',0);
        $this->display('Member/member_pub');
    }

    public function regLog($value='')
    {
        $this->assign('web', $this->data_config);
        $this->assign('category', $this->data_category);
        $this->assign('crumb',0);
        $this->display('register');
    }

    public function register($value='')
    {   
        (!IS_AJAX) && exit;
        $condition['email'] = I('post.email');
        if (self::checkVerifyCode(I('post.verifyCode')) && I('post.pwd')==I('post.pwd2')) {
            $exist = $this->memberDb->where($condition)->find();
            if (!is_array($exist)) { 
                $condition['salt'] = self::createSalt();
                $condition['pwd'] = hash('sha256',I('post.pwd').$condition['salt']);
                $condition['create_time'] = time();
                $result = $this->memberDb->add($condition);
                if($result) {
                    $member = $this->memberDb->field('member_id,name,email')->find($result);
                    session('member',$member);
                    echo 1; //注册成功
                }
            }else{
                echo 2;//邮箱已存在
            }
        }else{
            echo 3;//验证码错误
        }
        
    }

    public function login($value='')
    {
        (!IS_AJAX) && exit;
        $condition['email'] = I('post.email');

        if (self::checkVerifyCode(I('post.verifyCode'))) {
            $exist = $this->memberDb->where($condition)->field('member_id,salt')->find();

            if (is_array($exist)) {
                $condition['pwd'] = hash('sha256',I('post.pwd').$exist['salt']);
                $result = $this->memberDb->where($condition)->field('member_id,name,email')->find();
                if (is_array($result)) {
                    session('member',$result);
                    $data['last_time'] = time();
                    $this->memberDb->where($condition)->save($data);
                    echo 1; //登录成功
                }else{
                    echo 2;  //密码错误
                }
                
            }else{
                echo 3;  //邮箱错误
            }
        }else{
            echo 4;//验证码错误
        }
    }

    public function logout($value='')
    {
        session('member',null);
        $this->success('退出成功，正在跳转','Index/index');
    }


    public function checkSession($value='')
    {
        if(!is_array(session('member'))){
            $this->redirect('Index/regLog',array(),1,'Please login first!');
        }
    }

    /**
     * 栏目分发
     * @param  [type] $id [栏目id]
     * @return [type]     [description]
     */
    public function distrib($id)
    {
        switch ($id) {
            case '2':
                self::task($id);
                break;
            case '3':
                self::task($id);
                break;
            case '1':
                self::index();
                break;
            case '4':
                self::index();
                break;
            default:
                self::article($id);
                break;
        }
    }

    /**
     * [获取对应栏目的meta信息]
     * @param  string $id [栏目id]
     * @return [type]     [description]
     */
    public function getMeta($id='')
    {
        return $this->categoryDb->field('category_id,name,title,desc')->find($id);
    }
    /**
     * [获取指定栏目的所有父栏目id]
     * @param  [type] $data [所有栏目集合]
     * @param  [type] $id   [需要查找的栏目id]
     * @return [type]       [返回父栏目id数组]
     */
    public function getParents($data, $id)
    {
        static $arr = array();
        $data_get = $this->categoryDb->field('category_id,parent_id,name')->find($id);
        foreach ($data as $category) {
            if ($data_get['parent_id']==$category['category_id']) {
                $arr[] = $category['category_id'];
                self::getParents($data, $category['category_id']);
            }  
        }
        return $arr;
    }

    /**
     * [整合子栏目id和父栏目id]
     * @param  [type] $nav [所有栏目集合]
     * @param  [type] $arr [父栏目数组]
     * @param  [type] $id  [子栏目id]
     * @return [type]      [家族栏目集合]
     */
    public function adjustCrumb($nav,$arr,$id)
    {
        array_unshift($arr, $id);
        $crumb = array();
        foreach ($arr as $a) {
            foreach ($nav as $b) {
                if ($a==$b['category_id']) {
                    $crumb[] = $b;
                }
            }
        }
        return array_reverse($crumb);
        
    }

    /**
     * 生成验证码
     */
    public function verifyCode($value='')
    {
        $config =    array(
            'fontSize'    =>    40,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
            'useCurve'    =>    false
        );
        $Verify = new \Think\Verify($config);
        $Verify->codeSet = '0123456789'; 
        $Verify->entry();
    }

    /**
     * 检测验证码
     */

    public function checkVerifyCode($code='')
    {
        $verify = new \Think\Verify();
        return $verify->check($code);
    }

    /**
     * [生成salt]
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function createSalt($value='')
    {
        $str = str_shuffle('asd234SDF345dfgSDFwer345SDFmnbBJIH');
        return substr($str, 0,10);
    }



}