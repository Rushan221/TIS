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
        <input type="text" class="form-control" name="teacher" value=<?php echo $user['Teacher_name'];?>  required />
    </div>
    <div class="form-group">
        <label for="teacheremail">Email Address:</label>
        <input type="text" class="form-control" name="emailaddress" value=<?php echo $user['Teacher_email'];?>  required />
    </div>

    <div class="form-group">
        <label for="subject">Subject:</label>
        <input type="text" class="form-control" name="subject" placeholder="Enter subject" required />
    </div>

    <div class="form-group">
        <label for="teachername">Email:</label>
        <textarea class="form-control" name="email"  rows="6" required ></textarea>
    </div>

    <div class="form-group">
        <input type="hidden" class="form-control" name="teacherid" value=<?php echo $user['Teacher_id'];?>  required />
    </div>
    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
    <a class="btn btn-danger" href="teacherprofile.php">Cancel</a>

</form>
</div>
</div>
</div>
</body>
</html>

<?php

if (isset($_POST['submit'])) {

  $name = $_POST['teacher'];
  $email = $_POST['emailaddress'];
  $subject = $_POST['subject'];
  $msg = $_POST['email'];
  $id = $_POST['teacherid'];

  $body = "From:" .$name ."\n"."Teacher id:". $id. "\n". $email ."\n".$msg;

  if (mail('rushantamrakar327@gmail.com', $subject, $body, 'From: rushan2072@gmail.com')) {

    ?>
    <script>
      alert('Success');
        window.open('teacherdash.php','_self');
    </script>
    <?php
    
    


      }  

}
?>




    