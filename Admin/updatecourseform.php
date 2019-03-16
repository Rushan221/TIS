<?php
 session_start();

 	if (isset($_SESSION['uid']) ){

 		echo "";	 		
 	}
 	else{
 		header('location: index.php');
 	}

?>

<?php include ('header.php');
include('../dbcon.php');

$cid = $_GET['cid'];

$sql ="SELECT * FROM `course` WHERE `Course_id` = '$cid'"; 

$run = mysqli_query($con, $sql);

$data = mysqli_fetch_assoc($run);

 ?>

<div class="col-sm-8 container" >
<div class="panel panel-default" style="padding-top: 2.5rem;">
  <div class="panel-heading">
    <h3 class="panel-title">Add Course</h3>
  </div>
  <hr>
  <div class="panel-body">
  <form class="jumbotron" style="width: 1000px;" method="post" action="updatecoursedata.php"> 
    <div class="form-group">
        <label for="Coursename">Course Name:</label>
        <input type="text" class="form-control" name="name" value=<?php echo $data['Course_name']; ?> required />
      </div>
    
    <div class="form-group">
      <label for="duration">Course Duration:</label>
      <input type="text" class="form-control" name="duration" value=<?php echo $data['Course_duration']; ?> required />  
    </div>

    <div class="form-group">
      <label for="price">Course Price: </label>
      <input type="text" class="form-control " name="price" value=<?php echo $data['Course_price']; ?>  required />  
    </div>   

    <div class="form-group">
      <label for="description">Course Description:</label>
      <textarea class="form-control" name="description" placeholder="Enter Course Description" rows="4" required ><?php echo $data['Course_desc']; ?></textarea>
    </div>

    <div class="form-group">
      <input type="hidden" name="courseid" value=<?php echo $data['Course_id']; ?> />
    </div>
     
     
    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
    <a class="btn btn-danger" href="admindash.php">Cancel</a>
  </form>
  
  </div>
</div>
</div>

</body>
</html>