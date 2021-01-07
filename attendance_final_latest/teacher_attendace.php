<?php //session_start();
require 'connection.php';
require 'session_required.php';
$id=$_SESSION['id'];

?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Teacher Attendance</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/pro.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/teacher_attendance.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
<?php require 'navbar_profile_gatt.php';?>
	<div class="container edit_ta">
    <div class="row">
		
    	<div class="col-md-offset-4 col-md-4">
			<form method="POST" action="teacher_attendace_send.php">
			<div id="contact-form" class="form-container" data-form-container>
			<div class="row">
				<div class="form-title">
					<span>Teacher Attendance</span>
				</div>
			</div>
			<div class="input-container">
				<div class="row">
					<span class="req-input" >
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Select today's date."> </span>
						<span><i class="fa fa-calendar" aria-hidden="true"></i></span>
						<input type="date" data-min-length="8" name="date">
					</span>
				</div>
				<div class="row">
					<span class="req-input">
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Please Input entrance time."> </span><span><i class="fa fa-clock-o time" aria-hidden="true"></i></span>
						<input type="time" class="edit_input" name="entrance_time" placeholder="entrance time">
					</span>
				</div>
				<div class="row">
					<span class="req-input">
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Please Input exit time."></span><span><i class="fa fa-clock-o time" aria-hidden="true"></i> </span>
						<input type="time" name="exit_time" placeholder="exit time">
					</span>
				</div>
				<!--<div class="row">
					<span class="req-input message-box">
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Please Include a Message."> </span>
						<textarea type="textarea" data-min-length="10" placeholder="Message"></textarea>
				</div>-->
				<div class="row submit-row">
					<button type="submit" class="btn btn-block submit-form" name="submit" value="submit">Submit</button>
				</div>
			</div>
			</div>
			</form>
		</div>
	</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>