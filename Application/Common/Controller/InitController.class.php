<?php
namespace Common\Controller;        //命名空间
use Think\Controller;               //引用系统controller类
use Think\Auth;                     //引用权限管理类Auth
class InitController extends Controller {
	//公用类添加权限验证
	public function _initialize(){
		if(!session('uid')){//如果权限SESSION值为空则跳转进入登入界面
		$this->error('跳转登入页面',U('Home/Login/Index'));
		}
		$auth=new Auth();//初始化Auth类
		//MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME 模块/控制器/方法
		//MOUDLE_NAME.'-'.ACTION_NAME 模块/方法
		if(!$auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,session('uid'))){
			$this->error('你没有权限');
		}
	}
	
}
?>