<?php
require 'session_required.php';
require 'connection.php';
$id=$_SESSION['id'];
//$id=1;
if(isset($_POST['submit']))
{

$date=$_POST['date'];
$entrance_time=$_POST['entrance_time'];
$exit_time=$_POST['exit_time'];

$user->teacherAttendance($id,$date,$entrance_time,$exit_time);

//echo "inserted";
header("location:profile.php?id=$id");
}

?>