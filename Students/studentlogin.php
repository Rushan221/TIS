<?php

session_start();

if(isset($_SESSION['sid'])){

  header('location:studentwelcome.php'); // for 
}

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <title> Student Login | TIS</title>
</head>
<body class="container" >
  <div class="text-center" style=" padding-top: 80px;">
    <img src="../images/logo.png">
  </div>

<div class="login" style="padding-left: 307px; ">
<form class="form-signin"  style="width: 500px;" method="post" action="studentlogin.php" >
  <fieldset>
    
    <legend class="text-center"><h3>Student Login</h3></legend>
      <div class="form-group">
        <label for="UserName">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required autofocus>
      </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
    </div>
    
    <button type="submit" name="submit" value="submit" class="btn btn-lg btn-primary btn-block" >Submit</button>
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

  $qry = "SELECT * FROM `student` WHERE `Student_username`= '$username' AND `Student_password` = '$password'; ";

  $run = mysqli_query($con,$qry);

  $row = mysqli_num_rows($run); // to test the number of rows return
  


  if ($row < 1) {

    ?>
    <script>
      alert('Username or Password not match!'); //alert message
      window.open('studentlogin.php', '_self');
      
    </script>
    <?php 
  }

  else{

    $data = mysqli_fetch_assoc($run); // associative array

    $sid = $data['Student_id'];    

    $_SESSION['sid']=$sid;


    header('location:studentwelcome.php');
  }

}
  ?>
