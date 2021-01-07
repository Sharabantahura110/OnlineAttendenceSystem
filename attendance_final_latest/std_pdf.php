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
// 	//$Class=$_POST["Class"];
//$course='it1101';
//$course_id=1101;
	$a=$session-1;
$ad_session='20'.$a.'-'.$session;	
$id=$_SESSION['id'];
	$data1=$user->course_title($course_id);
 	$data=$user->getStudent($session);
 	$name=$user->teacherName($id);
	


		 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Attendance record</title>

    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
  </head>
  <body>
    <?php //require 'navbar_profile_gatt.php'; ?>


<?php 

if(!isset($error)){

        //create html of the data
        ob_start();
        ?>





<img  src="ju.jpg" style="display: block; width: 10%; height: 10%; padding-left: 45%">
<h4 align="center">Institute of Information Technology</h4>
<h3 align="center">Jahangirnagar University</h3>
<h4 align="center">Attendance Marks</h4>
<h4 align="center">Session: <?php echo $ad_session; ?></h4>


 <h3 align="center">Course Title: <?php echo $data1['course_title']; ?></h3>


    
    <table border="1" align="center" style="border-collapse: collapse;">

	
	<tbody>
	<tr>
		<td>Student ID</td>
		<td>Student Name</td>
		<!-- <td>Number of Class</td>
		<td>Present</td>
		<td>Absent</td> -->
		<td>Percentage</td>
		<td>Mark</td>
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
			$mark=0;
			if($total!=0){

			$percent=($my_count/$total)*100;

			if($percent>=90 && $percent<=100)
			{
				$mark=10;
			}

			elseif($percent>=85 && $percent<90)
			{
				$mark=9;
			}

			elseif($percent>=80 && $percent<85)
			{
				$mark=8;
			}

			elseif($percent>=75 && $percent<80)
			{
				$mark=7;
			}

			elseif($percent>=70 && $percent<75)
			{
				$mark=6;
			}
			elseif($percent>=65 && $percent<70)
			{
				$mark=5;
			}
			elseif($percent>=60 && $percent<65)
			{
				$mark=4;
			}
			elseif($percent==0)
			{
				$mark=0;
			}
			else
			{
				$mark=3;
			}

			}
			
		 }


 ?>


	<tr>
		
		<td><?=$row['student_id'];?></td>
		<td><?=$row['student_name'];?></td>
		<!-- <td><?=$total;?></td>
		<td><?=$my_count;?></td>
		<td><?=$total-$my_count;?></td> -->
		<td><?=number_format($percent,2);?></td>
		<td><?=$mark;?></td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<br>
	<br>

<h4 align="right"><?php echo $name['name']; ?></h4>
<p align="right"><?php echo $name['designation'];  ?>
	<br>Institute of Information Technology
</p>

<?php 
        $body = ob_get_clean();

        $body = iconv("UTF-8","UTF-8//IGNORE",$body);

        include("mpdf/mpdf.php");
        $mpdf=new \mPDF('c','A4','','' , 20, 20, 20, 20, 0, 0); 

        //write html to PDF
        $mpdf->WriteHTML($body);
 
        //output pdf
        //$mpdf->Output('info.pdf','D');

        //open in browser
        $mpdf->Output();

        //save to server
        //$mpdf->Output("mydata.pdf",'F');

    }



} ?>
    <?php //require 'footer.php'; ?>
   
  </body>
</html>