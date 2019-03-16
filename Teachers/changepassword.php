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