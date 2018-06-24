<?php

/**
* 
*/
// use \models\IndexModel;
// $modelrr= Model::set_model('IndexModel');
class Index extends Controller
{
	function __construct()
	{
		parent::__construct();
		# code...
		$this->model->import('Index');
	}

	public function index(){
		// echo "controller index class index ".$arg;
		// require 'app/models/IndexModel.php';
		$model=new IndexModel();
		$data=$model->getAll();
		// print_r($data);
		$this->view->render('index/index',[
								'msg'=>'ini datanya',
								'model'=>$data,
							]);
	}

	public function update($arg=false){
		// require 'app/models/IndexModel.php';
		$model=new IndexModel();
		$data=$model->getOne();
		// print_r($data);
		$this->view->render('index/update',[
								'msg'=>'update',
								'model'=>$data,
							]);
	}


	public function delete(){
		$model=new IndexModel();
		$data=$model->delete('user_details',['id'=>'1','lastName'=>'Nathan']);
		print_r($data);
	}
}