<?php
//phpinfo();
require_once 'router.php';

foreach($_GET as $key=>$value);
	if(!empty($_GET)){	
		$url = $value;
	//var_dump($_GET);
	   
		if(isset($route[$url])){
	
			$class = explode('@', $route[$url]);
			$controller = $class[0];
			$action = $class[1];
			
			$class = new $controller;
			$class->$action();
			
		}else{
	
			echo 'This route does not exist';
  
		}

	}else{

		$class = explode('@', $route['adminform']);
		$controller = $class[0];
		$action = $class[1];
		
		$class = new $controller;
		$class->$action();
	}

