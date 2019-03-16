<?php
 session_start();

 	if (isset($_SESSION['sid'])) {

 		echo "";	 		
 	}
 	else{
 		header('location: studentlogin.php');
 	}

?>

<?php include('header.php'); ?>
<br/>

<div class="text-center"><h1><u>Welcome to Student Area</u></h1></div>
<br/><br/>
<div class="container">
  <a class="btn btn-primary" href="viewteacher.php">View teachers</a>
  <a class="btn btn-primary" href="viewcourse.php">View courses</a>
  <a class="btn btn-primary" href="contactadmin.php">Contact Admin</a>
</div>
<br/>
<div class="container">

  <label for="about" style="padding-right: 10px;"><h4>General Notifications</h4></label>

<div class="container">
<div class="list-group">
  <?php  
    include('../dbcon.php');

    $sql = "SELECT * FROM `notification` where Notification_course='General' ORDER BY Notification_date DESC  ";

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

<div class="container">

<br/>
<hr>



<form method="post" action="studentwelcome.php">
<label for="about" style="padding-right: 10px;"><h4>Notification for Course</h4></label>

      <?php
      include('../dbcon.php');
      $qry = "SELECT `Course_name` FROM `course` where course_id != 5; ";
      $run = mysqli_query($con,$qry);

      $Cname="<select name='course' class='form-control'>";

      while ($row = mysqli_fetch_assoc($run)) {
          $Cname .= "<option value='{$row['Course_name']}'> {$row['Course_name']}</option>"; // for dynamic course selection
      }

      $Cname .="</select>";

      echo $Cname;

      ?>
      <div style="padding-top: 15px;">
      	<button type="submit" class="btn btn-primary" name="submit" value="submit" >Search</button>
    	   <a class="btn btn-danger" href="studentwelcome.php">Clear</a>
      </div>
  </form>
      <br/>

      <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Course</th>
      <th scope="col">Post Date</th>
      <th scope="col">Notification</th>
     </tr>
  </thead>
</div>


      <?php

      if (isset($_POST['submit'])) {

      	include('../dbcon.php');

      	$coursename = $_POST ['course'];

      	$sql = "SELECT * FROM notification WHERE Notification_course = '$coursename' ORDER BY Notification_date DESC ";

      	$runqry = mysqli_query($con, $sql);

      	if(mysqli_num_rows($runqry)<1)
		{
			echo "No Notifications found";
		}
		else{
				$count = 0;
			while($data=mysqli_fetch_assoc($runqry))
			{
				$count ++;
				?>

				 <thead>
   					 <tr>
     					<td scope="col"><?php echo $data['Notification_title']; ?></td>
     					<td scope="col"><?php echo $data['Notification_course']; ?></td>
      					<td scope="col"><?php echo $data['Notification_date']; ?></td>
      					<td scope="col"><?php echo $data['Notification_text']; ?></td>
     	 	     	 </tr>
  				   </thead>
           
				<?php      	
      			}
      		}   

        }
      ?>


        