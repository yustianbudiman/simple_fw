<?php

/**
* 
*/
class Controller
{
	
	function __construct()
	{
		// echo "Main controller ";
		$this->view=new view();
		$this->model=new model();
	}

	// public function loadModel($name){
	// 	$path='./app/models/'.$name.'Model.php';
	// 	if (file_exists($path)){
	// 		require $path;
	// 		$modelName=$name.'Model';
	// 		$this->model=new $modelName();
	// 	}
	// }
}