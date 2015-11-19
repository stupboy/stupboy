<?php
namespace Home\Controller;
use Common\Controller\InitController;
class IndexController extends InitController {
    public function index(){
		echo 'hello'.$name.'!';
		$Data = M('Data');
		$result =$Data->find(2);
		$this->assign('result',$result);
		$this->display();
    }
	public function hello($name='thinkphp'){
		$this->assign('name',$name);
		$this->display();
	}
	public function test1(){
		echo 'MyFirstPHP!Program!';
		//$this->display();
	}
	
	public function LoginCheck(){
		$Data = M('AuthRule');
		$result =$Data->find(1);
		//$this->assign('result',$result);
		//$this->display();
		$Auth = new \Think\Auth();
		//需要验证的规则列表,支持逗号分隔的权限规则或索引数组
		$name = MODULE_NAME . '/' . ACTION_NAME;
		//当前用户id
		echo $result['name'];
		$uid = $result['id'];//'8';
		//分类
		$type = MODULE_NAME;
		//执行check的模式
		$mode = 'url';
		//'or' 表示满足任一条规则即通过验证;
		//'and'则表示需满足所有规则才能通过验证
		$relation = 'and';
		if ($Auth->check($name, $uid, $type, $mode, $relation)){
			die('AUTH:SUCCESS!');
		} else {
			die('AUTH:false!');
		}
	}
}