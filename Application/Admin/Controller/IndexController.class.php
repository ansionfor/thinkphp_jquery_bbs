<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends PublicController {
    public function _initialize(){
        parent::_initialize();
    	$this->taskDb = M('task');
    	$this->articleDb = M('article');
    	$this->memberDb = M('member');
    	$this->commentDb = M('comment');
        $this->categoryDb = M('category');
    	$this->configDb = M('config');
    }

    public function index($value='')
    {
    	$this->display('index');
    }
    public function category($value='')
    {
        $data = $this->categoryDb->field('category_id,parent_id,name,order,child_num')->select();
        $this->assign('data',$data);
    	$this->display('category_list');
    }
    public function categoryEdit($cid='')
    {
        $cat = $this->categoryDb->find($cid);
        $this->assign('cat',$cat);
    	$this->display('category_edit');
    }
    public function task($value='')
    {
        $tcount = $this->taskDb->field('task_id')->where("is_delete=0")->count();
        $tpage = new \Think\Page($tcount,15);
        $tshow = $tpage->show();
        $tlist = $this->taskDb->alias('t')
        ->field('t.title,t.task_id,t.type,t.state,t.status,t.create_time,t.update_time,m.name,m.member_id')
        ->where("t.is_delete=0")
        ->join("__MEMBER__ m ON t.member_id=m.member_id")
        ->limit($tpage->firstRow.','.$tpage->listRows)
        ->select();

        $this->assign('tlist',$tlist);
        $this->assign('tpage',$tshow);
    	$this->display('task_list');
    }
    public function article($value='')
    {
        $acount = $this->articleDb->field('article_id')->where("is_delete=0")->count();
        $apage = new \Think\Page($acount,15);
        $ashow = $apage->show();
        $alist = $this->articleDb->alias('a')
        ->field('a.title,a.article_id,a.category_id,a.status,a.create_time,a.update_time,c.name cname,m.name,m.member_id')
        ->where("a.is_delete=0")
        ->join("__MEMBER__ m ON a.member_id=m.member_id")
        ->join("__CATEGORY__ c ON c.category_id=a.category_id")
        ->limit($apage->firstRow.','.$apage->listRows)
        ->select();
        $this->assign('alist',$alist);
        $this->assign('apage',$ashow);
    	$this->display('art_list');
    }
    public function member($value='')
    {
        $mcount = $this->memberDb->field('member_id')->where("is_delete=0")->count();
        $mpage = new \Think\Page($mcount,15);
        $mshow = $mpage->show();
        $mlist = $this->memberDb
        ->field('member_id,name,email,tel,class,status,create_time,last_time')
        ->where("is_delete=0")
        ->limit($mpage->firstRow.','.$mpage->listRows)
        ->select();
        $this->assign('mlist',$mlist);
        $this->assign('mpage',$mshow);
    	$this->display('member_list');
    } 
    public function comment($value='')
    {
        $ccount = $this->memberDb->field('comment_id')->where("is_delete=0")->count();
        $cpage = new \Think\Page($ccount,15);
        $cshow = $cpage->show();
        $clist = $this->commentDb->alias('c')
        ->field('c.comment_id,c.content,m.name,m.member_id,c.status,c.create_time')
        ->where("c.is_delete=0")
        ->join('__MEMBER__ m ON m.member_id=c.member_id')
        ->limit($cpage->firstRow.','.$cpage->listRows)
        ->select();

        $this->assign('clist',$clist);
        $this->assign('cpage',$cshow);
    	$this->display('comment_list');
    } 
    public function config($value='')
    {
        $config = $this->configDb->find();
        $this->assign('config',$config);
    	$this->display('config');
    } 


    public function passTask($tid='')
    {
        $status['status'] = 1;
        $result = $this->taskDb->where("task_id=$tid")->save($status);
        if ($result) {
            echo 1;  //修改成功
        }else{
            echo 2;  //修改失败 
        }
    }

    public function notPassTask($tid='')
    {
        $status['status'] = 0;
        $result = $this->taskDb->where("task_id=$tid")->save($status);
        if ($result) {
            echo 1;  //修改成功
        }else{
            echo 2;  //修改失败 
        }
    }

    public function deleteTask($tid='')
    {
        $status['is_delete'] = 1;
        $result = $this->taskDb->where("task_id=$tid")->save($status);
        if ($result) {
            echo 1;  //删除成功
        }else{
            echo 2;  //删除失败 
        }
    }

    public function passArt($aid='')
    {
        $status['status'] = 1;
        $result = $this->articleDb->where("article_id=$aid")->save($status);
        if ($result) {
            echo 1;  //修改成功
        }else{
            echo 2;  //修改失败 
        }
    }

    public function notPassArt($aid='')
    {
        $status['status'] = 0;
        $result = $this->articleDb->where("article_id=$aid")->save($status);
        if ($result) {
            echo 1;  //修改成功
        }else{
            echo 2;  //修改失败 
        }
    }

    public function deleteArt($aid='')
    {
        $status['is_delete'] = 1;
        $result = $this->articleDb->where("article_id=$aid")->save($status);
        if ($result) {
            echo 1;  //删除成功
        }else{
            echo 2;  //删除失败 
        }
    }


    public function passMem($mid='')
    {
        $status['status'] = 1;
        $result = $this->memberDb->where("member_id=$mid")->save($status);
        if ($result) {
            echo 1;  //修改成功
        }else{
            echo 2;  //修改失败 
        }
    }

    public function notPassMem($mid='')
    {
        $status['status'] = 0;
        $result = $this->memberDb->where("member_id=$mid")->save($status);
        if ($result) {
            echo 1;  //修改成功
        }else{
            echo 2;  //修改失败 
        }
    }

    public function deleteMem($mid='')
    {
        $status['is_delete'] = 1;
        $result = $this->memberDb->where("member_id=$mid")->save($status);
        if ($result) {
            echo 1;  //删除成功
        }else{
            echo 2;  //删除失败 
        }
    }

    public function passCom($cid='')
    {
        $status['status'] = 1;
        $result = $this->commentDb->where("comment_id=$cid")->save($status);
        if ($result) {
            echo 1;  //修改成功
        }else{
            echo 2;  //修改失败 
        }
    }

    public function notPassCom($cid='')
    {
        $status['status'] = 0;
        $result = $this->commentDb->where("comment_id=$cid")->save($status);
        if ($result) {
            echo 1;  //修改成功
        }else{
            echo 2;  //修改失败 
        }
    }

    public function deleteCom($cid='')
    {
        $status['is_delete'] = 1;
        $result = $this->commentDb->where("comment_id=$cid")->save($status);
        if ($result) {
            echo 1;  //删除成功
        }else{
            echo 2;  //删除失败 
        }
    }

    public function catChange($value='')
    {
        $cid = I("get.cid");
        $data = I('post.');
    	$result = $this->categoryDb->where("category_id=$cid")->save($data);
        if ($result) {
            echo 1;  //修改成功
        }
    }
    public function confChange($value='')
    {
        $data = I("post.",'','');
    	$result = $this->configDb->where("config_id=1")->save($data);
        if ($result) {
            echo 1;  //修改成功
        }
    }

}