<?php
// require 'protected/View.php';
$view=new View();
echo "ini halaman update";
// print_r($params['model']);
echo $view->r_partial("/index/form.php",[
										 'test'=>$params['model']
										 ]);
// echo base_url;