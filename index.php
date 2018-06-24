<?php

 require 'config/config.php';
 require 'config/database.php';
 
 //spl_autoload_register()
function __autoload($class){
	require system_core.$class.'.php';
}
 // require 'protected/Bootstrap.php';
 // require 'protected/Controller.php';
 // require 'protected/Model.php';
 // require 'protected/View.php';

 // require 'protected/Database.php';
 // require 'protected/Session.php';
 // require 'protected/Hash.php';

 $app= new Bootstrap();
