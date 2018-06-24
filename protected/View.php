<?php
/**
* 
*/
class View
{
	
	function __construct()
	{
		// echo "load view here";
	}

	public function render($name,$params=array()){
		/*content*/
		$content= './app/views/'.$name.'.php';
		require './app/views/layout/header.php';
		require './app/views/main/main.php';
		require './app/views/layout/footer.php';
		
	}

	function r_partial($path,$params=array())
	{
	    ob_start();
	    include("./app/views/".$path."");
	    $var=ob_get_contents(); 
	    ob_end_clean();
	    return $var;
	}


}