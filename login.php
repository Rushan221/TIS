<?php

session_start();

if(isset($_SESSION['tid'])){

	header('location:Teachers/teacherdash.php'); // for 
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Login | TIS</title>
</head>
<body class="container">

<div class="text-center" style=" padding-top: 75px;">
    <img src="images/logo.png">
  </div>


<div class="login" style="padding-left: 307px; ">
<form class="form-signin"  style="width: 500px;" method="post" action="login.php">
  <fieldset>
      <div class="form-group">
        <label for="UserName">Username</label>
        <input type="username" class="form-control" name="username" placeholder="Enter Username" required autofocus>
      </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    
    <button type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" >Submit</button>
    <a class="btn btn-lg btn-primary btn-block btn-danger" href="index.php">Cancel</a>
  </fieldset>
  
</form>
</div>
</body>
</html>


<?php
include('dbcon.php');

if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	$qry="SELECT * FROM `teachers` WHERE `Teacher_username`= '$username' AND `Teacher_password` = '$password'; ";

	$run = mysqli_query($con,$qry);

	$row = mysqli_num_rows($run); // to test the number of rows return

	if ($row<1) {

		?>
		<script>
			alert('Username or Password not match!');
			window.open('login.php', '_self');
			
		</script>
		<?php 
	}

	else{
		$data = mysqli_fetch_assoc($run); // associative array

		$id = $data['Teacher_id'];		

		$_SESSION['tid']=$id;

		header('location:Teachers/teacherdash.php');
	}

}
  ?>
