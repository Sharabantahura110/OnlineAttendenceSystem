<?php
//session_start();
require 'connection.php';
require 'session_required.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$session=$_POST["Session"];
	//$session=14;
	$course_id=$_POST["Course"];
	$course='it'.$course_id;
	//$Class=$_POST["Class"];
	//$course='it1101';
	
	$data1=$user->course_title($course_id);
	$data=$user->getStudent($session);
	


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
    <?php require 'navbar_profile_gatt.php'; ?>
<div class="container">
  <div class="row">
    <div class="col-md-offset-3 col-md-6 edit_table">
    
    <table class="table table-striped table-inverse ">

	<h3>Attendance Record of <?php echo $data1['course_title']; ?></h3>
	<tbody>
	<tr>
		<td>Student ID</td>
		<td>Student Name</td>
		<td>Number of Class</td>
		<td>Present</td>
		<td>Absent</td>
		<td>Percentage</td>
	</tr>

<?php

foreach ($data as $row):
		
	
		$data0=$user->student_course($course,$row['student_id'],$session);
		
		
		
		//var_dump($data1);
		//$one=1;
		if($data0!=NULL)
		{

			
		//$data2=$user->studentName($row['student_id'],$session);
		$my_count=0;
		$total=0;
		for($i=1;$i<=20;$i++){
			if($data0[0]["class_$i"]=="Yes"){
				$my_count++;
				$total++;
				
				}
			else if($data0[0]["class_$i"]=="No"){
				$my_count=$my_count;
				$total++;
				
				}
			
			
			}
			$percent=0;
			if($total!=0){

			$percent=($my_count/$total)*100;


			}
			

		 }


 ?>


	<tr>
		
		<td><?=$row['student_id'];?></td>
		<td><?=$row['student_name'];?></td>
		<td><?=$total;?></td>
		<td><?=$my_count;?></td>
		<td><?=$total-$my_count;?></td>
		<td><?=number_format($percent,2);?></td>
		
	</tr>
	<?php endforeach; }?>
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