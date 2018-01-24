<?php
function __autoload($class){
//var_dump($class);
	$controller_param = str_replace('_', DIRECTORY_SEPARATOR, $class);
	$controller_param = $controller_param.'.php';//Library\MainController.php


	if (file_exists($controller_param)) {
		require_once $controller_param;
	}else{
		throw new Exception('Class not found');
	}
}
	
        
//$controller = new Controllers_Home();

//$controller->loadUrl();