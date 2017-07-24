<?php
//入口文件（1定义常量，2加载函数库，3启动框架）

define('MOOCKM',dirname(__FILE__).DIRECTORY_SEPARATOR);
define('CORE',MOOCKM.'core');
define('APP',MOOCKM.'app');
define('DEBUG',true);

if(DEBUG){
	ini_set('display_error','On');
}else{
	ini_set('display_error','Off');
}

require CORE.'\common\function.php';
require CORE.'\moockm.php';

spl_autoload_register('\core\moockm::load');

\core\moockm::run();
