<?php 
//session_start();
require ('connection.php');
	
	if(isset($_POST['submit']))
	{
		$user_id=$_POST['id'];
		$course=$_POST['course'][0];
		$session=$_POST['session'][0];
		
		
		//$fi=$user->Login($user_name,$password);
		
		
		
		$id=$user_id;
		$sub_id='it'.$course;
	
		$data=$user->student_course($sub_id,$id,$session);
		
		
		
		//var_dump($data1);
		//$one=1;
		if($data!=NULL)
		{

			$data1=$user->course_title($course);
		$data2=$user->studentName($id,$session);
		$my_count=0;
		$total=0;
		for($i=1;$i<=20;$i++){
			if($data[0]["class_$i"]=="Yes"){
				$my_count++;
				$total++;
				
				}
			else if($data[0]["class_$i"]=="No"){
				$my_count=$my_count;
				$total++;
				
				}
			
			
			}
			if($total!=0){

			$percent=($my_count/$total)*100;


			}
			else
			{
				header ("location:student_info.php");
			}

		 }
		else
		{
			header ("location:student_info.php");
		}	
			//header ("location:profile.php?id=$id");
		}
		else
		{
			echo "Invalid!!";
		}
			
	
	
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Attendance record</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/pro.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/teacher_attendance.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php require 'navbar_student.php'; ?>
<div class="container">
  <div class="row">
    <div class="col-md-offset-3 col-md-6 edit_table">
    <h4>Your Attendance Record</h4>
    <table class="table table-striped table-inverse ">

	
	<tbody>
	
	<tr>
		<td>Student Name</td>
		<td><?=$data2['student_name'];?></td>
		
	</tr>
	<tr>
		<td>Student ID</td>
		<td><?=$id;?></td>
		
	</tr>
	<tr>
		<td>Course Title</td>
		<td><?=$data1['course_title'];?></td>
		
	</tr>
	<tr>
		<td>Number of Class</td>
		<td><?=$total;?></td>
		
	</tr>
	<tr>
		<td>Present</td>
		<td><?=$my_count;?></td>
		
	</tr>
	<tr>
		<td>Absent</td>
		<td><?=$total-$my_count;?></td>
		
	</tr>
	<tr>
		<td>Percentage</td>
		<td><?=number_format($percent,2);?></td>
		
	</tr>
	</tbody>
	</table>
  </div>
  </div>
  </div>
    <?php require 'footer.php'; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>