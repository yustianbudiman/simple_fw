<?php
/**
* 
*/
class Error404 extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		// echo "File Not exist";
	}

	public function method404($method){
		echo "Method or Class ".$method." Not exist";
	}

	public function controller404($file){
		 echo "File Controller ".$file." Not exist";
	}
}