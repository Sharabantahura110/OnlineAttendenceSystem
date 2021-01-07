<?php
require('session_required.php');
require 'connection.php';
$id=$_GET['id'];
$t_id=$_SESSION['id'];

	
	$result=$user->getId($id);
	//var_dump($result);
	//$user->deleteAttendance($id);
	$t_id=$result[0]['teacher_id'];
	$t_date=$result[0]['date'];
	$data=$user->viewInfo_check($t_id,$t_date);
	var_dump($data);

	$date=$data[0]['date'];
	$entrance_time=$data[0]['entrance_time'];
	$exit_time=$data[0]['exit_time'];
	
	$user->teacherAttendance_final($t_id,$date,$entrance_time,$exit_time);
	$user->deleteAttendance($id);
	header ("location:approval.php?id=$t_id");
?>