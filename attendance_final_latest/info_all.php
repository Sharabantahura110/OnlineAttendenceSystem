<?php
//session_start();
require 'connection.php';
require 'session_required.php';
//$id=$_SESSION['id'];
if(!empty(isset($_GET['t_id'])))
{$t_id=$_GET['t_id'];

$data=$user->viewInfo($t_id);

    

//var_dump($data);
echo $t_id;
$teacher_name=$_GET['teacher_name'];
//echo $teacher_name;
}
else
{
  $data['date']=NULL;
  $data['entrance_time']=NULL;
  $data['exit_time']=NULL;
  $teacher_name=NULL;
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
    <?php require 'navbar_profile.php'; ?>
<div class="container">
  <div class="row">

     <div class="col-md-offset-3 col-md-6 ">
          
<form  method="POST" action="info_all_check.php"  >

<select class="styled-select black rounded position" name="teacher[]">

<option >Md. Fazlul Karim Patwary</option>
<option >K M Akkas Ali</option>
<option >M. Mesbahuddin Sarkar</option>
<option >Dr. Mohammad Shamim Kaiser</option>
<option >Fahima Tabassum</option>
<option >Jesmin Akhter</option>
<option >Risala Tasin Khan</option>
<option >Dr. Md. Wahiduzzaman</option>
<option >Shamim Al Mamun</option>
<option >Dr. Mohammmad Shahidul Islam</option>
<option >Dr. Mohammmad Abu Yousuf</option>
<option >Guest Teacher</option>
</select>

<br>
<br>


<button type="submit" class="btn btn-lg edit_btn" name="submit">Submit</button>
</form>
        </div>

    <div class="col-md-offset-3 col-md-6">
   <h4>Attendance Record of <?php echo $teacher_name; ?></h4>
    <table class="table table-striped table-inverse edit_table1">
	<thead class="heading_table">
		<tr>
			<th>Date</th>
			<th>Entrance Time</th>
			<th>Exit Time</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($data as $row):?>
		<tr>
		<td><?=$row['date'];?></td>
		<td><?=$row['entrance_time'];?></td>
		<td><?=$row['exit_time'];?></td>
	</tr>
	<?php  endforeach; ?>	
	</tbody>
	</table>
  </div>
  </div>
  </div>
  <br>
  <br>
    <?php require 'footer.php'; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>