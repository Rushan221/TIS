<?php
 session_start();

 	if (isset($_SESSION['uid']) ){

 		echo "";	 		
 	}
 	else{
 		header('location: index.php');
 	}

?>

<?php include('header.php');

include('../dbcon.php');

$tid = $_GET['tid'];

$sql ="SELECT * FROM `teachers` WHERE `Teacher_id` = '$tid'"; 

$run = mysqli_query($con, $sql);

$data = mysqli_fetch_assoc($run);



 ?>

<div class="col-sm-8 container" >
<div class="panel panel-default" style="padding-top: 2.5rem;">
  <div class="panel-heading">
    <h3 class="panel-title">Update teacher</h3>
  </div>
  <hr>
  <div class="panel-body">
  <form class="jumbotron" style="width: 1000px;" method="post" action="updatedata.php" > <!--for image storing--> 
    <div class="form-group">
        <label for="teachername">Name</label>
        <input type="text" class="form-control" name="teacher" value=<?php echo $data['Teacher_name']; ?> required />
      </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" name="address" value=<?php echo $data['Teacher_address'] ?> required />
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" value=<?php echo $data['Teacher_email'] ?> required />  
    </div>

    <div class="form-group">
      <label for="joindate">Join date</label>
      <input type="date" class="form-control " name="joindate" value=<?php echo $data['Teacher_joindate'] ?> required />  
    </div>

    <div class="form-group">
      <label for="Course">Course</label>
      
      <?php

      include('../dbcon.php');
      $qry = "SELECT DISTINCT `Course_name` FROM `course`; ";
      $run = mysqli_query($con,$qry);

      $Cname="<select name='course' class='form-control' >";

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
      <textarea class="form-control" name="about"  required /><?php echo $data['Teacher_desc'] ?></textarea>
    </div>

    <div class="form-group">
      <input type="hidden" name="teacherid" value=<?php echo $data['Teacher_id']; ?> />
    </div>
     
    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
    <a class="btn btn-danger" href="admindash.php">Cancel</a>
  </form>
  
  </div>
</div>
</div>

</body>
</html>

