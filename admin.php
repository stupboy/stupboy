<?php
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
//define('CONF_EXT','.ini'); 配置文件格式 默认为PHP
// 定义应用目录
define('COMMON_PATH','./Common/');
define('APP_PATH','./Apps/');
define('BIND_MODULE','Admin');
//define('BUILD_CONTROLLER_LIST','Index,User,Menu');
//define('BUILD_MODEL_LIST','User,Menu');
// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';
?>