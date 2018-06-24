<?php
/**
* 
*/
class Model
{
	
	function __construct()
	{
		# code...
		$this->db=new Database();
	}

	public function import($name){
		$path='./app/models/'.$name.'Model.php';
		if (file_exists($path)){
			require $path;
			$modelName=$name.'Model';
			$this->model=new $modelName();
			return $this->model;
		}
	}

}