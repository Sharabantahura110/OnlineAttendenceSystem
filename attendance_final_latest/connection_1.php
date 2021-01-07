<?php

	require 'function_1.php';
	try{
		$connection=new PDO("mysql:host=localhost;dbname=iit_attendance_db","root","iitjuoli");
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		$admin = new admin($connection);
	}

	 catch(PDOException $e)
		{
			 echo $e->getMessage();
		}

	



?>