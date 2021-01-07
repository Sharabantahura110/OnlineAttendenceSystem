<?php
//session_start();
require 'connection.php';
require 'session_required.php';
//$id=$_SESSION['id'];

//$id=2;

$data=$user->approveInfo();

    

//var_dump($data);
//echo $id;
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
    <link rel="stylesheet" type="text/css" href="css/view_admin.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php require 'navbar_profile.php'; ?>
<div class="container">
  <div class="row">
    <div class="col-md-offset-2 col-md-8">
    <table class="table table-striped table-inverse edit_table">
	<thead class="heading_table">
		<tr>
      <th style="text-align: center;">Name</th>
			<th style="text-align: center;">Date</th>
			<th style="text-align: center;">Entrance Time</th>
			<th style="text-align: center;">Exit Time</th>
      <th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($data as $row):?>
		<tr>
    <td><?=$row['name'];?></td>
		<td><?=$row['date'];?></td>
		<td><?=$row['entrance_time'];?></td>
		<td><?=$row['exit_time'];?></td>
    <td> <div class="my_action">
          
          <div class="my_edit">
          <a href="approve_admin.php?id=<?=$row['id']?>"> <p class="action_para">Approve</p></a>
          </div>
          <div class="my_delete">
          <a href="delete.php?id=<?=$row['id']?>"> <p class="action_para">Delete</p></a>
          </div>
          </div></td>
	</tr>
	<?php  endforeach; ?>	
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