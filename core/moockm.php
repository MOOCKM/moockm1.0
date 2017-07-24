<?php
namespace core;
class moockm{
	public static $classMap=array();
	public $assign;
	static public function run(){
		$route = new \core\lib\route();
		$ctrlClass = $route->ctrl;
		$action = $route->action;
		$ctrlFile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
		$ctrlClass='\\app\ctrl\\'.$ctrlClass.'Ctrl';
		if(is_file($ctrlFile)){
			include $ctrlFile;
			$ctrl = new $ctrlClass();
			$ctrl->$action();
		}else{
			throw new Exception("找不到控制器",$ctrlClass);
			
		}
	}
	static public function load($class){
		if(isset($classmap[$class])){
			return true;
		}else{
			$class = str_replace('\\', '/', $class);
			$file=MOOCKM.'\\'.$class.'.php';
			if(is_file($file)){
				include $file;
				self::$classMap[$class] = $class;
 			}else{
 				return false;
 			}
		}
	}

	public function assign($name,$value){
		$this->assign[$name]=$value;
	}
	public function display($file){
		$file = APP.'/views/'.$file;
		if(is_file($file)){
			extract($this->assign);
			include $file;
		}
	}
}
?>