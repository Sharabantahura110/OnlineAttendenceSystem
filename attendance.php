<?php
//session_start();
require 'connection.php';
require 'session_required.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$admission_session=$_POST["Session"];
	//$admission_session=16;
	
	$Course='it'.$_POST["Course"];
	//$Class=$_POST["Class"];
	
	$data=$user->getStudent($admission_session);
	//echo $admission_session;
	//var_dump($data);
	$stdid=$user->findStudentId($Course,$admission_session);
	//var_dump($stdid);
	$user_id=$stdid['student_id'];
	$class_no=$user->classNumber($user_id,$admission_session,$Course);
	$class_final=$class_no+1;
	$Class='class_'.$class_final;

	foreach ($data as $row):
		$user->autoAttendance($row['student_id'],$admission_session,$Course,$Class);
	endforeach;
	
}
//var_dump($data);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/pro.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/teacher_attendance.css">
    <link rel="stylesheet" type="text/css" href="css/view_admin.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
    
	<style>
	th, td{
	 	padding: 5px;
	 	font-size: 20px;
	 }
	 .fa-check{
	 	color:green;
	 	font-size: 25px;
	 }
	 table{
	 	margin-top: 20px;
	 	margin-left: 60px;
	 }
	 .fa-remove{
	 	color:red;
	 	font-size: 25px;
	 }
	table button{
	 	margin-left: 13px;
	 }
	 #submit{
	 	margin-top: 15px;
	 	margin-left: 425px;
	 	background-color: orange;
	 }
	</style>
</head>
<body>
<?php require 'navbar_profile_gatt.php'; ?>


<div class="container">
  <div class="row">
    <div class="col-md-offset-2 col-md-8">
    <table class="table table-striped table-inverse edit_table">
	<thead class="heading_table">
		<tr>
			<th style="text-align:center;">Roll</th>
			<th style="text-align:center;">Name</th>
			<th style="text-align:center;">Attendance</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($data as $row):?>
		<tr><td><?=$row['student_id'];?></td> <td><?=$row['student_name'];?></td>
		<td><button class="fa fa-check" aria-hidden="true"></button></td></tr>
	<?php
	endforeach; 
	?>
	</tbody>
</table>
</div>
</div>
</div>
 <div class="edit_submit" action="">  
 <form method="POST">
<!--<button id="submit" class="btn btn-lg" type="submit" name="submit">Submit</button>
</form>-->
</div>
<br>
<br>
<!-- attendance modal-->
  
<!--end attendance modal -->
 <?php require 'footer.php'; ?>
	  	<script src="bootstrap/js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="js/jquery.js"></script>
	    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
	    <script type="text/javascript" src="js/main.js"></script>
	    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
	    <script type="text/javascript">
	    $(document).ready(function(){

	    	$("table button").on("click",function(){
	    		var tr=$(this).closest("tbody tr").text();
	    		var row=tr.split(" ");
	    		var Course="<?php echo $Course;?>";
				var Class="<?php echo $Class;?>";
				var session="<?php echo $admission_session;?>";
				//alert(Course+" "+Class);
				var button_class=$(this).attr("class");
				if(button_class == "fa fa-check")
				{
					$(this).removeClass("fa fa-check");
					$(this).addClass("fa fa-remove");
					$.ajax({
				   url: 'update_attendence.php',
				   data: {
				     		student_id: row[0],
				     		Course:Course,
				     		Class:Class,
				     		session:session,
				     		value:"No"
				   },
				   success: function(data) {
				   },
				   type: 'POST'
				});
				}
				else
				{
					$(this).removeClass("fa fa-remove");
					$(this).addClass("fa fa-check");
					$.ajax({
				   url: 'update_attendence.php',
				   data: {
				     		student_id: row[0],
				     		Course:Course,
				     		Class:Class,
				     		session:session,
				     		value:"Yes"
				   },
				   success: function(data) {
				   },
				   type: 'POST'
				});
				}
				//alert(row[0]+" "+table_name+" "+class_number);	  			
	    	});
	    });
		</script>
</body>
</html>