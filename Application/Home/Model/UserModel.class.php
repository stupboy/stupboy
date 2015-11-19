<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	protected $_validate = array(
	array('username','require','用户名未填写！'),
	array('password','require','密码不能为空！'),
	);
	//protected $_auto = array(
	//array('create_time','time',1,'funtion'),
	//);

}