<!doctype html>
<html>
<head>
<script type="text/javascript">

</script>
</head>
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="profile.php">IIT<span>Attendance<span></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse menu" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                   
                  <!--  <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Teacher
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="teacher_attendace.php?id=$id">Give Attehdance</a></li>
                        <li><a href="view_info_teacher.php?id=$id">Veiw info</a></li>

                        </ul>
                    </li>-->

                    <li class="dropdown">
                       
                        <a href="course_assign.php" class="" > Course Assign </a>
                       
                    </li>
                    <li class="dropdown">
                       
                        <a href="approval.php" class="" > Approve </a>
                       
                    </li>
                    
                
                     
                    <li><a href="">Personal <i class="fa fa-angle-down"></i></a> 
                <ul>
                  <li><a href="teacher_attendace.php" class="" > Give Attendance </a>
                  </li>
                  <li><a class="" id="edit_password" data-toggle="modal" data-target="#password_model" value="Edit Password"> Edit Password </a>
                  </li>
                  
                </ul>
              
              </li>



                    <!--kkkkk-->

                    <li><a href="">Record <i class="fa fa-angle-down"></i></a> 
                <ul>
                  <li><a href="view_info_teacher.php">Personal Attendance<i class=""></i></a>
                  </li>
                  <li><a href="info_all.php">Teacher Attendance<i class=""></i></a>
                  </li>
                  
                </ul>
              
              </li>




                    <!--jjjjjj-->


                   
                    

                    <!--<li class="dropdown">
                       
                        <a class="" id="attendance" data-toggle="modal" data-target="#attendance_modal" value="Student Attendance"> Student Attendance </a>
                       
                    </li>-->

                     <li><a href="">Student Attendance <i class="fa fa-angle-down"></i></a> 
                <ul>
                  <li><a class="" id="attendance" data-toggle="modal" data-target="#attendance_modal" value="Take Attendance">Take Attendance<i class=""></i></a>
                  </li>
                  <li><a class="" id="attendance" data-toggle="modal" data-target="#attendance_record_modal" value="View Attendance"">View Attendance<i class=""></i></a>
                  </li>

                  <li><a class="" id="attendance" data-toggle="modal" data-target="#attendance_mark_modal" value="View Attendance"">Prepare Marksheet<i class=""></i></a>
                  </li>
                  <li><a class="" id="attendance" data-toggle="modal" data-target="#attendance_mark_modal_pdf" value="View Attendance"">Prepare PDF Marksheet<i class=""></i></a>
                  </li>
                  
                </ul>
              
              </li>
                    
                    <!--<li class="dropdown">
                        <a href="#">Teacher Attendance </a>
                       
                    </li>-->


                    
                    

                    <li>
                        <a class="page-scroll" href="logout.php">Logout</a>
                    </li>


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

<!-- attendance modal-->
<div id="attendance_modal" class="modal fade container" role="dialog" >
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Attendance</h3>
        </div>
        <form method="POST" action="attendance.php">
        
          <div class="modal-body">
          <div class="row">
          <div class="col-md-offset-1 col-md-4">
            <div class="dropdown">
              <i>Session:</i>
              <select id="Session" name="Session" >
                   <option value="14">2013-14</option>
                    <option value="15">2014-15</option>
                    <option value="16">2015-16</option>
                    <option value="17">2016-17</option>
              </select>
           </div>
           </div>

           <div class="col-md-6 col-md-offset-1">
           
            <div class="dropdown">
             <i>Course:</i>
              <select id="Course" name="Course"  >
              <?php foreach ($courses as $row):?>
                   <option value="<?= $row['course_id'];?>"><?= $row['course_title'];?></option>
               <?php  endforeach; ?>       
              </select>
           </div>
           </div>

          
        </div>
      </div>

          
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button id="submit_class" class="btn btn-default"  type="submit" >Submit</button>
        </div>
      </form>
      </div>
    </div>
</div>


<!-- record modal -->

<div id="attendance_record_modal" class="modal fade container" role="dialog" >
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Attendance Record</h3>
        </div>
        <form method="POST" action="showStudent_info.php">
        
          <div class="modal-body">
          <div class="row">
          <div class="col-md-offset-1 col-md-4">
            <div class="dropdown">
              <i>Session:</i>
              <select id="Session" name="Session" >
                   <option value="14">2013-14</option>
                    <option value="15">2014-15</option>
                    <option value="16">2015-16</option>
                    <option value="17">2016-17</option>
              </select>
           </div>
           </div>

           <div class="col-md-6 col-md-offset-1">
           
            <div class="dropdown">
             <i>Course:</i>
              <select id="Course" name="Course"  >
              <?php foreach ($courses as $row):?>
                   <option value="<?= $row['course_id'];?>"><?= $row['course_title'];?></option>
               <?php  endforeach; ?>       
              </select>
           </div>
           </div>
        </div>
      </div>

          
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button id="submit_class" class="btn btn-default"  type="submit" >Submit</button>
        </div>
      </form>
      </div>
    </div>
</div>

<!-- record finish -->


<!-- mark modal -->

<div id="attendance_mark_modal" class="modal fade container" role="dialog" >
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Attendance Marksheet</h3>
        </div>
        <form method="POST" action="std_new.php">
        
          <div class="modal-body">
          <div class="row">
          <div class="col-md-offset-1 col-md-4">
            <div class="dropdown">
              <i>Session:</i>
              <select id="Session" name="Session" >
                   <option value="14">2013-14</option>
                    <option value="15">2014-15</option>
                    <option value="16">2015-16</option>
                    <option value="17">2016-17</option>
              </select>
           </div>
           </div>

           <div class="col-md-6 col-md-offset-1">
           
            <div class="dropdown">
             <i>Course:</i>
              <select id="Course" name="Course"  >
              <?php foreach ($courses as $row):?>
                   <option value="<?= $row['course_id'];?>"><?= $row['course_title'];?></option>
               <?php  endforeach; ?>       
              </select>
           </div>
           </div>
        </div>
      </div>

          
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button id="submit_class" class="btn btn-default"  type="submit" >Submit</button>
        </div>
      </form>
      </div>
    </div>
</div>

<!-- mark finish -->

<!-- mark modal pdf-->

<div id="attendance_mark_modal_pdf" class="modal fade container" role="dialog" >
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Attendance Marksheet</h3>
        </div>
        <form method="POST" action="std_pdf.php">
        
          <div class="modal-body">
          <div class="row">
          <div class="col-md-offset-1 col-md-4">
            <div class="dropdown">
              <i>Session:</i>
              <select id="Session" name="Session" >
                   <option value="14">2013-14</option>
                    <option value="15">2014-15</option>
                    <option value="16">2015-16</option>
                    <option value="17">2016-17</option>
              </select>
           </div>
           </div>

           <div class="col-md-6 col-md-offset-1">
           
            <div class="dropdown">
             <i>Course:</i>
              <select id="Course" name="Course"  >
              <?php foreach ($courses as $row):?>
                   <option value="<?= $row['course_id'];?>"><?= $row['course_title'];?></option>
               <?php  endforeach; ?>       
              </select>
           </div>
           </div>
        </div>
      </div>

          
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button id="submit_class" class="btn btn-default"  type="submit" >Submit</button>
        </div>
      </form>
      </div>
    </div>
</div>