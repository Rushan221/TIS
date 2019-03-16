<?php
 session_start();

 	if (isset($_SESSION['uid']) ){

 		echo "";	 		
 	}
 	else{
 		header('location: index.php');
 	}

?>

<?php 
include('header.php'); 

?>

<div class="col-sm-8 container" >
<div class="panel panel-default" style="padding-top: 2.5rem;">
  <div class="panel-heading">
    <h3 class="panel-title">Add teacher</h3>
  </div>
  <hr>
  <div class="panel-body">
  <form class="jumbotron" style="width: 1000px;" method="post" action="addteacher.php"> 
    <div class="form-group">
        <label for="teachername">Name</label>
        <input type="text" class="form-control" name="teacher" placeholder="Enter Name" required />
      </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" name="address" placeholder="Enter Address" required />
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" placeholder="Enter Email" required />  
    </div>

    <div class="form-group">
      <label for="joindate">Join date</label>
      <input type="date" class="form-control " name="joindate" placeholder="Enter date"  required />  
    </div>

    <div class="form-group">
      <label for="Course">Course</label>
      
      <?php

      include('../dbcon.php');
      $qry = "SELECT DISTINCT `Course_name` FROM `course` where course_id !=5; ";
      $run = mysqli_query($con,$qry);

      $Cname="<select name='course' class='form-control'>";

      while ($row = mysqli_fetch_assoc($run)) {
          $Cname .= "<option value='{$row['Course_name']}'> {$row['Course_name']}</option>"; // for dynamic course selection
      }

      $Cname .="</select>";

      echo $Cname;

      ?>
            
    </div>

    <div class="form-group">
      <label for="Skill">Skill</label>
      
      <?php

      include('../dbcon.php');
      $qry = "SELECT DISTINCT `Skill_name` FROM `skills`; ";
      $run = mysqli_query($con,$qry);

      $Skillname="<select name='skill' class='form-control'>";

      while ($row = mysqli_fetch_assoc($run)) {
          $Skillname .= "<option value='{$row['Skill_name']}'> {$row['Skill_name']}</option>"; // for dynamic course selection
      }

      $Skillname .="</select>";

      echo $Skillname;

      ?>     
    </div>


    <div class="form-group">
      <label for="about">About</label>
      <textarea class="form-control" name="about" placeholder="Enter short description" required /></textarea>
    </div>

    <div class="form-group">
      <label for="username">Username</label>
      <input type="username" class="form-control" name="username" placeholder="Enter username" required />  
    </div>
     
    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
    <a class="btn btn-danger" href="admindash.php">Cancel</a>
  </form>
  
  </div>
</div>
</div>

</body>
</html>


<?php 

  

  if(isset($_POST['submit']))
  {
    include('../dbcon.php');
    $teacher= $_POST['teacher'];
    $address= $_POST['address'];
    $email= $_POST['email'];
    $date= $_POST['joindate'];
    $course = $_POST['course'];
    $skill = $_POST['skill'];
    $about= $_POST['about'];
    $username= $_POST['username'];  

    $sql= "SELECT * FROM teachers WHERE Teacher_username ='$username'";
    $runqry = mysqli_query($con, $sql);

    $count = mysqli_num_rows($runqry);

    if($count > 0){
        ?>

      <script >
        
        alert('Username already taken');
        window.open('addteacher.php','_self');
      </script>
      <?php

    }
    else{  

    $qry= "INSERT INTO `teachers`(`Teacher_name`, `Teacher_address`, `Teacher_email`,`Teacher_joindate`, `Teacher_course`, `Teacher_skill`, `Teacher_desc`,`Teacher_username`) VALUES ('$teacher','$address','$email','$date','$course','$skill','$about','$username')";

    $run = mysqli_query($con,$qry);

    echo $run;

    if($run == true){
      ?>

      <script >
        
        alert('success');
        window.open('admindash.php','_self');
      </script>
      <?php

      }

    }


  }
?>