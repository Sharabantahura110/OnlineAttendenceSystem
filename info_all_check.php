<?php 
require 'session_required.php';
require ('connection_1.php');
require 'connection.php';
if(isset($_POST['submit'])){
		
		$name=$_POST['teacher'][0];
		$course_id=$_POST['course'][0];

		$data=$admin->findId($name);

		$teacher_id= $data['teacher_id'];

		

		header ("location:info_all.php?t_id=$teacher_id&teacher_name=$name");
}
?>