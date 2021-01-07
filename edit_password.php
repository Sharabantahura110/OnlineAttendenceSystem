<?php
require 'session_required.php';
//session_start();
require 'connection.php';
	$password=$_POST['new_password'];
	$id=$_POST['id'];
	//$password=md5($new_password);

	$user->editPassword($id,$password);;
?>