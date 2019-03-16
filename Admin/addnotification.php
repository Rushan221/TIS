<?php
 session_start();

  if (isset($_SESSION['uid']) ){

    echo "";      
  }
  else{
    header('location: index.php');
  }

?>

<?php 
include('header.php'); 

?>
<div class="col-sm-8 container" >
<div class="panel panel-default" style="padding-top: 2.5rem;">
  <div class="panel-heading">
    <h3 class="panel-title">Post Notification</h3>
  </div>
  <hr>
  <div class="panel-body">
  <form class="jumbotron" style="width: 1000px;" method="post" action="addnotification.php"> 
    <div class="form-group">
        <label for="teachername">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter Title" required />
      </div>
   
    <div class="form-group">
      <label for="Course">Course</label>
      
      <?php

      include('../dbcon.php');
      $qry = "SELECT DISTINCT `Course_name` FROM `course`; ";
      $run = mysqli_query($con,$qry);

      $Cname="<select name='course' class='form-control'>";

      while ($row = mysqli_fetch_assoc($run)) {
          $Cname .= "<option value='{$row['Course_name']}'> {$row['Course_name']}</option>"; // for dynamic course selection
      }

      $Cname .="</select>";

      echo $Cname;

      ?>
            
    </div>

    <div class="form-group">
      <label for="notitext">Notification</label>
      <textarea class="form-control" name="notitext" placeholder="Enter Notification" required /></textarea>
    </div>
     
    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
    <a class="btn btn-danger" href="admindash.php">Cancel</a>
  </form>
  
  </div>
</div>
</div>

</body>
</html>

<?php

if (isset($_POST['submit'])) {

	include('../dbcon.php');

	$title = $_POST['title'];
	$course = $_POST['course'];
	$noti= $_POST['notitext'];

	$sqlqry = "INSERT INTO `notification`(`Notification_title`, `Notification_course`, `Notification_text`) VALUES ('$title','$course','$noti')";

	$runqry = mysqli_query($con , $sqlqry);

	if($runqry == true){
		?>

		<script >
        
        alert('Notification posted');
        window.open('admindash.php','_self');
      </script>


		<?php
	}
	
}



?>