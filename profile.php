<?php 
//session_start();
require 'connection.php';
require 'session_required.php';
$id=$_SESSION['id'];
//$id=1;
$qry=$con->prepare("select * from teacher_info_table where teacher_id=:id");
$qry->bindParam(':id',$id);
  
  $qry->execute();
  $result=$qry->fetch();

  //var_dump($result);


  $qry=$con->prepare("select course_id,course_title from course_info_table where teacher_id=:id");
  $qry->bindParam(':id',$id);
  
  $qry->execute();
  $courses=$qry->fetchAll();

  $name=$result['name'];
  $admin_name=$user->findAdmin($name);
  $name2=$admin_name['name'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profile</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/pro.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   
  </head>
  <body>
  <?php
  if($name==$name2)
  {
    require 'navbar_profile_only.php';
  } 
  else
  {
    require 'navbar_profile_only_all.php';
  }
 ?>
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-4 edit_pic">
          <img src="img/<?php echo $result['picture']; ?>" class="img-thumbnail edit_img" height= "45%" width= "60%"> 
        </div>
        <div class="col-md-6 edit_info">
          <h3><?php echo $result['name']; ?></h3><br><br>
          <i class="fa fa-briefcase" aria-hidden="true"> Designation: <?php echo $result['designation']; ?></i><br>
          <i class="fa fa-university" aria-hidden="true"> Institute of Information Technology</i><br>
          <i class="fa fa-envelope" aria-hidden="true"> Email: <?php echo $result['email']; ?></i><br><br><br><br>
          <h3>Research Interest:</h3>
          <ul class="fa-ul">
            <li><i class="fa-li fa fa-check-square"></i><?php echo $result['interest_1']; ?></li>
            <li><i class="fa-li fa fa-check-square"></i><?php echo $result['interest_2']; ?></li>
            <li><i class="fa-li fa fa-check-square"></i><?php echo $result['interest_3']; ?></li>
          </ul>

        </div>
      </div>

    </div>

    <!-- password modal -->

    <div id="password_model" class="modal fade container" role="dialog" >
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Change Password</h3>
        </div>
        <form action="edit_password.php" method="POST" role="form">
        <div class="modal-body">
          <label for="usr" class="label_edit">Password:</label>
            <input type="password" id="new_password" class="form-control" name="new_password">
            <label for="usr" class="label_edit">Re-type:</label>
            <input type="password" id="new_password2" class="form-control"  name="new_password2">
        </div>
          
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" id="save_password" class="btn btn-default" data-dismiss="modal" input type="submit" name="save" value="save" >Save</button>
        </div>
        </form>
      </div>
    </div>
</div>

<!-- end pass modal -->



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
    <script type="text/javascript" src="js/bootbox.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#submit_class").on("click",function(ev){
        var result=confirm("Are you sure!");
      if(!result)
      {
        ev.preventDefault();
      }
        });
        
        
        $("#save_password").on("click",function(e){
          var new_password=$("#new_password").val();
          var new_password2=$("#new_password2").val();
          var id="<?php echo $id;?>";
          if(new_password == new_password2 && new_password.length<=12)
          {
            $.post("edit_password.php",{new_password:new_password,id:id},function(){
              //alert(new_password+" "+id);
             // location.reload();
            });
          }
          else if(new_password.length>12)
          {
            alert("Password is not changed, length is too high");
          }
          else
          {
            alert("Password is not changed, Re-type is not same");
          }
        });
      
     /* $("#datepicker" ).datepicker();

       var length;
      $("#user_bio").on("input",function(){
         length=$("#user_bio").val().length;
        if(length >200)
        {
          alert("You have to enter less than 200 characters");
        }
      });
      $("#update").on("click",function(e){
        length=$("#user_bio").val().length;
        if(length >200)
          {
            alert("You have to enter less than 200 characters");
            e.preventDefault();
          }
        
      });*/
    });
    </script>
  </body>
</html>