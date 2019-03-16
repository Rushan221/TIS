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

<div class="col-sm-8 container" >
<div class="panel panel-default" style="padding-top: 2.5rem;">
  <div class="panel-heading">
    <h3 class="panel-title">Contact Admin</h3>
  </div>
  <hr>
  <div class="panel-body">
  <form class="jumbotron" style="width: 1000px;" method="post" action="contactadmin.php"> <!--for updating -->
    <div class="form-group">
        <label for="teachername">Name:</label>
        <input type="text" class="form-control" name="name" placeholder="Entar your fullname"  required />
    </div>
    <div class="form-group">
        <label for="teacheremail">Email Address:</label>
        <input type="text" class="form-control" name="emailaddress" placeholder="Enter youremail address"  required />
    </div>

    <div class="form-group">
        <label for="subject">Subject:</label>
        <input type="text" class="form-control" name="subject" placeholder="Enter subject" required />
    </div>

    <div class="form-group">
        <label for="teachername">Email:</label>
        <textarea class="form-control" name="email"  rows="6" required ></textarea>
    </div>

    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
    <a class="btn btn-danger" href="studentwelcome.php">Cancel</a>

</form>
</div>
</div>
</div>
</body>
</html>

<?php

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['emailaddress'];
  $subject = $_POST['subject'];
  $msg = $_POST['email'];
  

  $body = "From:" .$name ."\n". $email ."\n".$msg;

  if (mail('rushantamrakar327@gmail.com', $subject, $body, 'From: TIS')) {

    ?>
    <script>
      alert('Success');
        window.open('studentwelcome.php','_self');
    </script>
    <?php
    
    


      }  

}
?>