<?php
//session_start();
require 'connection.php';
require 'session_required.php';
$id=$_GET['id'];

	
	$user->deleteAttendance($id);
	header ("location:approval.php");
?>