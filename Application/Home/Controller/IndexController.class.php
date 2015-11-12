<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
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
}