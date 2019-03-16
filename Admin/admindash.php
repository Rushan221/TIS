<?php
 session_start();

 	if (isset($_SESSION['uid']) ){

 		echo "";	 		
 	}
 	else{
 		header('location: index.php');
 	}

?>

<?php include('header.php'); ?>
<br/>

<div class="text-center"><h1><u>Welcome to Admin Dashboard</u></h1></div>
<br/><br/>

<div class="container" >
  <div class="row">
    <div class="col-sm-4">
      <div class="list-group">
        <a href="viewteacher.php" class="list-group-item list-group-item-action active"><h4>Teachers</h4></a>
        <a href="addteacher.php" class="list-group-item list-group-item-action">Add Teacher</a>
        <a href="updateteacher.php" class="list-group-item list-group-item-action">Manage Teachers </a>
        
      </div>
    </div>

    <div class="col-sm-4">
      <div class="list-group">
        <a href="viewcourse.php" class="list-group-item list-group-item-action active"><h4>Courses</h4></a>
        <a href="addcourse.php" class="list-group-item list-group-item-action">Add Course</a>
        <a href="managecourse.php" class="list-group-item list-group-item-action">Manage Course</a>
        
      </div>
    </div>

    <div class="col-sm-4">
      <div class="list-group">
        <a href="viewskill.php" class="list-group-item list-group-item-action active"><h4>Skills</h4></a>
        <a href="addskill.php" class="list-group-item list-group-item-action">Add Skills</a>
        <a href="manageskill.php" class="list-group-item list-group-item-action">Manage Skills</a>
    </div>
    </div>

    </div>

    <br / >

      <div class="row" style="margin-left: 270px; ">
    <div class="col-sm-4">
      <div class="list-group">
        <a  class="list-group-item list-group-item-action active" style="color: white;"><h4>Total Teachers</h4></a>
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
        <a  class="list-group-item list-group-item-action active" style="color: white;"><h4>Total Courses</h4></a>
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


<div class="container"><h3>Notifications</h3>
  <div  style="padding-bottom: 20px;">
    <a class="btn btn-primary" href="addnotification.php">Post Notification</a> 
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
              <a  class="list-group-item list-group-item-action"><?php echo $data['Notification_course']; ?></a>
              <a  class="list-group-item list-group-item-action"><?php echo $data['Notification_text']; ?></a>
              <br/>
              <a class=" col-sm-2 btn btn-primary" href="updatenotiform.php?notiid=<?php echo $data['Notification_id']; ?>">Edit</a>
              <br/>
              <a class=" col-sm-2 btn btn-primary" href="deletenoti.php?notiid=<?php echo $data['Notification_id']; ?>">Delete</a>

              <br/>             

        <?php
       }
    } 
  
?>


</div>


</body>
</html>




