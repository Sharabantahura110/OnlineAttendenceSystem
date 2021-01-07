<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
     <script type="text/javascript" src="js/jquery.js"></script>

  <!-- This is what you need -->
  <script type="text/javascript" src="js/sweetalert.min.js"></script>
  <script src="js/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="css/sweetalert.css">
</head>
 <body>

 <?php require 'navbar_home.php';?>
    <div class="container edit_container">

      <form class="form-signin edit_form" method="POST" action="login_check.php">
        <h2 class="form-signin-heading">Please login</h2>
        <label for="inputEmail" class="sr-only">User Name</label>
        <input type="text" id="inputUser" class="form-control edit_form-control" name="user_name" placeholder="User Name" data-toggle="tooltip" title="tooltip on second input!" name="secondname" required autofocus><br>
        <!--<label for="inputPassword" class="sr-only">Memorable Data</label>
        <input type="password" id="inputMem" class="form-control edit_form-control" placeholder="Memorable Data" required><br>-->
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control edit_form-control" placeholder="Password" required><br>
        <button id="submit" class="btn btn-lg btn-primary btn-block edit_button" type="submit" name="submit" value="submit">Login</button>
      </form>
      <script type="text/javascript">
        $('input[type=text][id=inputEmail]').tooltip({ /*or use any other selector, class, ID*/
            placement: "right",
            trigger: "focus"
        });
      </script>
    </div> <!-- /container -->

   <?php require 'footer.php'; ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php 
//session_start();
//require 'connection.php';
//require 'session_required.php';
    
   /* if(isset($_POST['submit']))
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
          
        else{
     echo '<script type="text/javascript">
     swal("Wrong...", "Username or Password!", "error");
    </script>"';
        }  
    }
    */
?>