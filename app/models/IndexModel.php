<?php
/**
* 
*/

// namespace models;

class IndexModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
		// echo "string";
		// echo Model::set_model();
		// $this->db=new Database();
	}
	public function role(){
		$arr=['a','b','c'];
		return $arr;
	}

	public function getOne(){
		$sql="select*from user_details where _id=:id";
		$hasil=$this->db->findOne($sql,['id'=>2]);
		// $hasil=$this->db->insert('user_details',$data);
		return $hasil;
	}

	public function getAll(){
		$sql="select*from user_details";
		$hasil=$this->db->findAll($sql);
		// $hasil=$this->db->insert('user_details',$data);
		return $hasil;
	}

	public function create(){
		$data=[
			'firstName'=>'ahmad',
			'lastName'=>'rifai',
			'email'=>'rifai@gmail.com',
			'mobileNumber'=>'098829822',
			'status'=>'1'
			];
		$hasil=$this->db->insert('user_details',$data);
		return $hasil;
	}

	public function update(){
		$data=[
				'firstName'=>'ahmad',
				'lastName'=>'rifai',
				'email'=>'rifai@gmail.com',
				'mobileNumber'=>'098829822',
				'status'=>'1'
				];
		$where=['_id'=>1];
		$hasil=$this->db->update('user_details',$data,$where);
		return $hasil;
	}

	public function delete($table,$where){
		$hasil=$this->db->delete($table,$where);
		// $hasil=$this->db->insert('user_details',$data);
		return $hasil;
	}
}