<?php 
class admin{
	public $db;
	function __construct($connection)
	{
		$this->db=$connection;
	}


	public function findId($name)
	{
		
		$select=$this->db->prepare("SELECT teacher_id FROM teacher_info_table WHERE name='$name'");
		$select->setFetchMode(PDO::FETCH_ASSOC);
		$select->execute();
			 
		$data=$select->fetch();
		return $data;
	}
		//var_dump($data);
		
		
		
	public function courseAssign($teacher_id,$course_id)
	{	
		$update=$this->db->prepare("UPDATE course_info_table SET teacher_id=:teacher_id WHERE course_id=:id");
			$update->bindParam(":id",$course_id);
			$update->bindParam(":teacher_id",$teacher_id);
			$update->setFetchMode(PDO::FETCH_ASSOC);
			$update->execute();
		
	}
}



?>