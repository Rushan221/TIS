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
	<h1>Welcome  to your profile, <?php echo $user['Teacher_name']; ?>!!</h1>
	<br>

	<a class="btn btn-primary" href="teacherdash.php">Back to Dashboard</a>
</div>
<br>
<div class="jumbotron container">
  <h4 class="display-3"><?php echo $user['Teacher_name']; ?></h4>
  <p class="lead">From: <?php echo $user['Teacher_address']; ?></p>
  <p class="lead">Email: <?php echo $user['Teacher_email']; ?></p>
  <p class="lead">Join date: <?php echo $user['Teacher_joindate']; ?></p>
  <p class="lead">Course: <?php echo $user['Teacher_course']; ?></p>
  <p class="lead">Skill: <?php echo $user['Teacher_skill']; ?></p>
  <hr class="my-4">
  <p>About Me:</p>
  <p><?php echo $user['Teacher_desc']; ?></p>  
</div>
<div class="container">
	<a class="btn btn-primary" href="updateprofile.php?teacherid=<?php echo $user['Teacher_id']; ?>">Update Profile</a>
</div>
<br/>


