<?php
namespace Home\Controller;
use Think\Controller;
class EmptyController extends Controller {
    public function index(){
		$this->error('输入错误！');
    }
	public function _empty(){
		$this->error('输入错误！');
	}
}