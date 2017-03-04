<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
	public function _initialize($value='')
	{
		if (!is_array(session('admin'))) {
			$this->redirect('Login/index');
		}
	}
}