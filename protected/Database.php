<?php
/**
* 
*/
class Database extends PDO
{
	
	function __construct()
	{
		// parent::__construct();
		// parent::__construct('mysql:host=localhost;dbname=angular_four','root','');
		parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
		// echo "string";
	}
	public function insert($table,$data){
		ksort($data);
		$fieldName	=implode(", ", array_keys($data));
		$fieldValue	=':'.implode(', :', array_keys($data));
		$query=$this->prepare("insert into $table ($fieldName) values ($fieldValue)");
		foreach ($data as $key => $value) {
			 $query->bindValue($key,$value);
		}
		$result=$query->execute();
		if($result){
			return '1';
		}else{
			return '0';
		}
		
	}

	public function update($table,$data,$where){
		ksort($data);
		$fieldDetail='';
		foreach ($data as $key => $value) {
			$fieldDetail .="$key=:$key,";
		}
		$fieldDetail=rtrim($fieldDetail,',');
		$query=$this->prepare("update $table set $fieldDetail where _id=1");
		foreach ($data as $key => $value) {
			 $query->bindValue(":$key",$value);
		}
		$result=$query->execute();
		if($result){
			return '1';
		}else{
			return '0';
		}
		
	}

	public function findOne($sql,$condition=array(),$fatchMode=PDO::FETCH_ASSOC){
		$sth = $this->prepare($sql);
		foreach ($condition as $key => $value) {
			 $sth->bindValue(":$key",$value);
		}
		$sth->execute();
		$result = $sth->fetch($fatchMode);
		return $result;
	}

	public function findAll($sql,$condition=array(),$fatchMode=PDO::FETCH_ASSOC){
		$sth = $this->prepare($sql);
		foreach ($condition as $key => $value) {
			 $sth->bindValue(":$key",$value);
		}
		$sth->execute();
		$result = $sth->fetchAll($fatchMode);
		return $result;
	}
	public function delete($table,$condition = array()){
		$sth = $this->prepare('select * from user_details where _id=:id and lastName=:lastName');
		
		foreach ($condition as $key => $value) {
			 $sth->bindValue($key,$value);
			 // $sth->bindValue(,$value,PDO::PARAM_STR);
			 // $sth->bindValue(2,$value);
			 echo $key;
		}
		$array = array('name !=' => 'asep', 'id <' => 'a', 'date >' => '2018-02-03');
		print_r($array);
		// $x='';
		// foreach ($condition as $key => $value) {
		// 	$x .=$key.'='.$value;	 
		// }
		// print_r($condition);
		$sth->execute();
		$result = $sth->fetch(PDO::FETCH_ASSOC);
		// return $x;
		// "where "
		return $result;
	}
}