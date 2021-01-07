<?php 
//session_start();
require ('connection_1.php');
require 'session_required.php';
if(isset($_POST['submit'])){
		
		$name=$_POST['teacher'][0];
		$course_id=$_POST['course'][0];

		$data=$admin->findId($name);

		$teacher_id= $data['teacher_id'];

		$admin->courseAssign($teacher_id,$course_id);

		header ("location:course_assign.php");
}
?>