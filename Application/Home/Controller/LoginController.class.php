<?php
//登入检测
namespace Home\Controller;
use Think\Controller;
use Think\Image;
use Think\verify;
use Think\Auth;
//登入界面基于系统Controller类扩展，非权限验证扩展类Auth
class LoginController extends Controller {
	public function _empty(){
		$this->error('输入错误！',U('Home/From/read'));
	}
	// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    public function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
	public function verify(){
        //import("ORG.Util.Image");
        //Image::buildImageVerify(4,1,"png",100,28,"verify"); 
        $Verify = new \Think\Verify();
        $Verify->fontSize = 18;  
        $Verify->length   = 4;  
        $Verify->useNoise = false;  
        $Verify->codeSet = '0123456789abcdefghijklmnopqrstuvwxy';  
        $Verify->imageW = 130;  
        $Verify->imageH = 50;  
        $Verify->entry();        
    }
	public function index(){
		$this->display();
	}
	public function check(){
        $verify = new \Think\Verify();
        $test=$_POST['verify'];
        if($verify->check($_POST['verify'])){
        	//echo 'CC';
        }else{
        	//echo 'sbsbsbsbbbbbbbb';
        	$this->error('验证码输入错误！');
        }

		$User = D('user');
		if($User->create()){ //$Form->create()
		$condition['username'] = $_POST['username']; 
		$condition['password'] = md5($_POST['password']); 
		$result=$User->where($condition)->select(); 
		if($result){
			$result1=$User->where($condition)->find(); 
			session('uid',$result1['id']);
			//$auth = new Auth();
			//echo 'login success:'.$result1['username'].session('uid');
			//echo MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
			//if(!$auth->check("Home/Form/read",1)){
			//	echo "stop the foolish!";
			//}
			$this->success('登入成功，跳转中...',U('Home/Form/read'));
		}else{
			//echo 'error'.$_POST['username'];
			$this->error('密码错误！！');
		}
        }else{
        	//exit($User->getError());
        	$this->error($User->getError());
	    }
	}
	function logout(){
		session(null);
		$this->success('注销成功',U('Home/Login/Index'));
	}
}