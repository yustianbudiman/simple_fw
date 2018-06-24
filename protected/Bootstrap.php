<?php
/**
* 
*/
class Bootstrap
{
	
	function __construct()
	{
		$url=isset($_GET['url'])?$_GET['url']:null;
		$url=rtrim($url,'/');
		$url=filter_var($url,FILTER_SANITIZE_URL);
		$url=explode('/', $url);

		$file= "app/controllers/".$url[0].".php";

		if(empty($url[0])){
			require 'app/controllers/Index.php';
			$controller=new Index();
			$controller->index();
			// echo $controller;
			return false;
		}

		if(file_exists($file)){
			require $file;
		}else{
			require 'protected/error/Error404.php';
			$error=new Error404();
			$error->controller404($url[0]);
			return false;
			
		}
		$controller=new $url[0];
		// $controller->loadModel($url[0]);


		if(isset($url[0]) && empty($url[1])){
			$controller->index(); //autoload
			// echo "string";
		}else if(isset($url[2])){
			$controller->{$url[1]}($url[2]); //parameter
		}else if(isset($url[1])){
			if(method_exists($controller, $url[1])){
				$controller->{$url[1]}();
				return false;
			}else{
				require 'protected/error/Error404.php';
				$error=new Error404();
				$error->method404($url[1]);
				return false;
			}

		}
	}
}