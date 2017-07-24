<?php
namespace core\lib;
class route{
	public $ctrl;
	public $action;
	public function __construct(){
		if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/' ){
			$path=explode('/',trim($_SERVER['REQUEST_URI'],'/'));
			$this->ctrl=$path[0];
			unset($path[0]);
			if(isset($path[1])){
				$this->action=$path[1];
				unset($path[1]);
			}else{
			$this->action='index';
			}
			$count = count($path)+2;
			$i=2;
			while($i<$count){
			   if(isset($path[$i+1])){
                 $_GET[$path[$i]] = $path[$i+1];
               }
               $i = $i+2;
			}
		}else{
			$this->ctrl='index';
			$this->action='index';
		}
	}
}
?>