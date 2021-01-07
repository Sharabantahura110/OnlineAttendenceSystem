<?php 
//session_start();
require 'connection.php';
require 'session_required.php';
$id=$_SESSION['id'];
//$id=1;


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Course Assign</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/pro.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   
  </head>
  <body>
  <?php require 'navbar_profile.php';?>
    <div class="container">
      <div class="row">
        <div class="col-md-offset-4 col-md-6 ">
          
<form  method="POST" action="course_check.php"  >

<select class="styled-select black rounded position" name="teacher[]">

<option>Md. Fazlul Karim Patwary</option>
<option>K M Akkas Ali</option>
<option>M. Mesbahuddin Sarkar</option>
<option>Dr. Mohammad Shamim Kaiser</option>
<option>Fahima Tabassum</option>
<option>Jesmin Akhter</option>
<option>Risala Tasin Khan</option>
<option>Dr. Md. Wahiduzzaman</option>
<option>Shamim Al Mamun</option>
<option>Dr. Mohammmad Shahidul Islam</option>
<option>Dr. Mohammmad Abu Yousuf</option>
<option>Guest Teacher</option>

</select>

<br>
<br>

<select class="styled-select black rounded" name="course[]" >

<option value="1101">IT Fundamental</option>
<option value="1103">Inroduction to Programming Environment</option>
<option value="1105">Electrical Circuits</option>
<option value="1107">Differential and Integral Calculus</option>
<option value="1109">Communicative English</option>
<option value="1104">Structure Programming Language Lab</option>
<option value="1106">Electrical Circuits Lab</option>

<option value="1201">Data Structures</option>
<option value="1203">Object Oriented Programming</option>
<option value="1205">Complex Variable and Vector Algebra</option>
<option value="1207">Economics</option>
<option value="1209">Accounting</option>
<option value="1202">Data Sructures Lab</option>
<option value="1204">Object Oriented Programming Lab</option>

<option value="2101">Algorithm Analysis</option>
<option value="2103">Computer Architecture</option>
<option value="2105">Electrical Devices and Circuits</option>
<option value="2107">Ordinary and Differential Equation</option>
<option value="2109">Statistical and Probability Theory</option>
<option value="2102">Algorithm Analysis Lab</option>
<option value="2104">Computer Architecture Lab</option>
<option value="2106">Electronic Devices and Circuits Lab</option>

<option value="2201">Information System Analysis</option>
<option value="2203">DLD</option>
<option value="2205">Data Communication</option>
<option value="2207">Discrete Math</option>
<option value="2209">Computational Mathematics</option>
<option value="2202">Information System Analysis Lab</option>
<option value="2204">DLD Lab</option>
<option value="2206">Computational Mathematics Lab</option>

<option value="3101">Database Management System</option>
<option value="3103">Computer Network and Internet Technology</option>
<option value="3105">Signal and System</option>
<option value="3107">Operating System</option>
<option value="3109">Simulation and Modeling</option>
<option value="3102">DBMS Lab</option>
<option value="3104">Computer Network and Internet Technology Lab</option>
<option value="3106">Signal and System Lab</option>

<option value="3201">Software Engineering</option>
<option value="3203">Computer Graphics</option>
<option value="3205">Web Technologies</option>
<option value="3207">Microprocessor and Interfacing</option>
<option value="3209">Inroduction to Bio-informatics</option>
<option value="3202">Software Engineering Lab</option>
<option value="3204">Computer Graphics Lab</option>
<option value="3206">Web Programming Lab</option>
<option value="3208">Microprocessing and Interfacing Lab</option>
<option value="4101">Artificial Intelligence and Neural Networks</option>
<option value="4103">Telecommunication Systems</option>
<option value="4105">Management Information System</option>
<option value="4207">Parallel and Distributed System</option>
<option value="4109">Multimedia Systems and Application</option>
<option value="4102">AINN Lab</option>
<option value="4204">Telecommucation Systems Lab</option>

<option value="4201">Human Computer and Interfacing</option>
<option value="4203">Wireless and Mobile Communication</option>
<option value="4221">Embedded System Design</option>
<option value="4223">Speech Processing and Speech Recognition</option>
<option value="4225">Digital Image Processing and Pattern Recognition</option>
<option value="4227">Mobile Application development</option>
<option value="4229">Neuroinformatics</option>
<option value="4231">Object Oriented Software Engineering</option>
<option value="4251">Digital Communication Systems</option>
<option value="4255">E-commerce and E-governance</option>
<option value="4257">Cryptopraphy</option>
<option value="4259">Computer</option>
<option value="4253">Digital Signal Processing</option>
<option value="4261">Optical Fiber Communication</option>


</select>

</br>
</br>
<button type="submit" class="btn btn-lg edit_btn" name="submit">Submit</button>
</form>
        </div>
        
      </div>

    </div>

    <!-- password modal -->

    

     <?php require 'footer.php'; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

     <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.j"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  </body>
</html>