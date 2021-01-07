<?php 
session_start();
require ('connection.php');
	
	if(isset($_POST['submit']))
	{
		$user_name=$_POST['user_name'];
		$password=$_POST['password'];
		
		
		$fi=$user->Login($user_name,$password);
		
		//var_dump($fi);
       
		
		if($fi['user_name']==$user_name && $fi['password']==$password)
		{
			//echo "valid user";

			
			
			
			//$_SESSION['email']=$email;
			$_SESSION['id']=$fi['teacher_id'];
			$id=$_SESSION['id'];

			//header("location:details.php");
			

			
			header ("location:profile.php?id=$id");
		}
		else
		{
			header ("location:login.php");
        
		}
			
	}
	
?>