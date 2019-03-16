<?php

session_start();

if(isset($_SESSION['uid'])){

	header('location:admindash.php'); // for 
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/bootstrap.min.js"></script>
	<title> Admin Login | TIS</title>
</head>
<body class="container">

	<div class="text-center" style=" padding-top: 75px;">
    <img src="../images/logo.png">
  </div>

<div class="login" style="padding-left: 307px; ">
<form class="form-signin"  style="width: 500px;" method="post" action="index.php">
  <fieldset>
    <legend class="text-center"><h3>Admin Login</h3></legend>
      <div class="form-group">
        <label for="UserName">Username</label>
        <input type="username" class="form-control" id="username" name="username" placeholder="Enter Username" required autofocus>
      </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>
    
    <button type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" >Submit</button>
    <a class="btn btn-lg btn-primary btn-block btn-danger" href="../index.php">Cancel</a>
  </fieldset>
  
</form>
</div>


</body>
</html>

<?php
include('../dbcon.php');

if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	$qry="SELECT * FROM `admin` WHERE `Admin_username`= '$username' AND `Admin_password` = '$password'; ";

	$run = mysqli_query($con,$qry);

	$row = mysqli_num_rows($run); // to test the number of rows return

	if ($row<1) {

		?>
		<script>
			alert('Username or Password not match!');
			window.open('index.php', '_self');
			
		</script>
		<?php 
	}

	else{
		$data = mysqli_fetch_assoc($run); // associative array

		$id = $data['Admin_id'];		

		$_SESSION['uid']=$id;

		header('location:admindash.php');
	}

}
  ?>