<?php
	require 'session_required.php';
	require ('connection.php');
	$student_id= $_POST["student_id"];
	$table_name=$_POST["Course"];
	$class_number=$_POST["Class"];
	$session=$_POST["session"];
	$value=$_POST["value"];
	$user->studentPresent($student_id,$table_name,$class_number,$value,$session);
	/*public function studentPresent($student_id,$table_name,$class_number,$value)
	{
		$select=$this->db->prepare("UPDATE $table_name SET $class_number=:value WHERE student_id=:id ");
		$select->bindParam(":value",$value);
		$select->bindParam(":id",$student_id);
		$select->setFetchMode(PDO::FETCH_ASSOC);

		$select->execute();
	}*/
?>