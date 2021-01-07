<?php

	require 'function.php';
	try{
		$con=new PDO("mysql:host=localhost;dbname=iit_attendance_db","root","iitjuoli");
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		$user = new USER($con);
	}

	 catch(PDOException $e)
		{
			 echo $e->getMessage();
		}

	



?>