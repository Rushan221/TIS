<?php
 session_start();

 	if (isset($_SESSION['tid'])) {

 		echo "";	 		
 	}
 	else{
 		header('location: ../login.php');
 	}

?>


<?php

include ('header.php');
?>
<?php
include('../dbcon.php');

$userid = $_SESSION['tid'];

$sql="SELECT * from teachers where Teacher_id ='$userid'; "; //sql for welcome message
$runqry = mysqli_query($con,$sql);

$user = mysqli_fetch_assoc($runqry);

?>

<div class="container" style="padding-top: 20px;" >
	<h3>Welcome <?php echo $user['Teacher_name']; ?>!!</h3>
	<hr>
</div>


<div class="container" style="padding-bottom: 20px;">
	<a class="btn btn-primary" href="teacherprofile.php">Go to My Profile</a> 
  <a class="btn btn-primary" href="contactadmin.php">Contact Admin</a> 
</div>

<br/>

<div class="row" style="margin-left: 270px; ">
    <div class="col-sm-4">
      <div class="list-group">
        <a href="allteacher.php" class="list-group-item list-group-item-action active"><h4>Total Teachers</h4></a>
        <a class="list-group-item list-group-item-action">
          <?php

          include ('../dbcon.php');

          $qry=" SELECT DISTINCT Teacher_id FROM `teachers`  ";
          $run = mysqli_query($con,$qry);

          $row = mysqli_num_rows($run);
          ?>

          <h3 class="text-center"><b><?php echo $row; ?></b></h3>
        </a>

      </div>
    </div>

    <div class="col-sm-4">
      <div class="list-group">
        <a href="allcourses.php" class="list-group-item list-group-item-action active"><h4>Total Courses</h4></a>
        <a  class="list-group-item list-group-item-action">

          <?php

          include ('../dbcon.php');

          $qry=" SELECT DISTINCT Course_id FROM `course` where Course_id !=5;  ";
          $run = mysqli_query($con,$qry);

          $row = mysqli_num_rows($run);
          ?>

          <h3 class="text-center"><b><?php echo $row; ?></b></h3>

        </a>

      </div>
    </div>
  </div>

  <br/>

  <div class="container"><h3>Notifications</h3>
  	<div  style="padding-bottom: 20px;">
		<a class="btn btn-primary" href="postnotification.php">Post Notification</a> 
	</div>
  </div>

<div class="container">
<div class="list-group">
	<?php  
    include('../dbcon.php');

    $sql = "SELECT * FROM `notification` ORDER BY Notification_date DESC  ";

    $run = mysqli_query($con,$sql);

    if(mysqli_num_rows($run)<1)
    {
      echo "<tr><td colspan='4'>No Records found</td></tr>";
    }
    else{
        $count = 0;
      while($data=mysqli_fetch_assoc($run))
      {
        $count ++;
        ?>
          
              <a  class="list-group-item list-group-item-action active" style="color: white;" ><h3><?php echo $data['Notification_title']; ?></h3></a>
              <a  class="list-group-item list-group-item-action"><?php echo $data['Notification_date']; ?></a>
              <a  class="list-group-item list-group-item-action"><?php echo $data['Notification_text']; ?></a>
              <br/>             

        <?php
       }
    } 
  
?>
  
    
  </div>
</div>

  
</div>
</div>



