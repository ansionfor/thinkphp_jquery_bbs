<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function _initialize($value='')
	{	
		$this->adminDb = M('admin');
	}

	public function index($value='')
	{
		$this->display('Index/login');
	}

	public function Login($value='')
	{
		(!IS_AJAX) && exit;
		if(self::checkVerifyCode(I('post.verifyCode'))){
			$name = I('post.name');
			$result = $this->adminDb->where("name='$name'")->find();
			if ($result) {
				$data['name'] = $name;
				$data['pwd'] = hash('sha256',I('post.pwd').'sdEF4gsD40');
				$correct = $this->adminDb->where($data)->find();
				if ($correct) {
					session('admin',$correct);
					echo 1; //登录成功
				}else{
					echo 2;  //密码错误
				}

			}else{
				echo 3;  //用户名错误
			}
		}else{
			echo 4;  //验证码错误
		}
	}

	public function logout($value='')
	{
		session('admin',null);
		$this->redirect('Login/index');
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
}