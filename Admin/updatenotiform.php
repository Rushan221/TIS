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

$notiid = $_GET['notiid'];

$sql ="SELECT * FROM `notification` WHERE `Notification_id` = '$notiid'"; 

$run = mysqli_query($con, $sql);

$data = mysqli_fetch_assoc($run);

?>

<div class="col-sm-8 container" >
<div class="panel panel-default" style="padding-top: 2.5rem;">
  <div class="panel-heading">
    <h3 class="panel-title">Post Notification</h3>
  </div>
  <hr>
  <div class="panel-body">
  <form class="jumbotron" style="width: 1000px;" method="post" action="updatenotidata.php"> 
    <div class="form-group">
        <label for="teachername">Title</label>
        <input type="text" class="form-control" name="title" value=<?php echo $data['Notification_title']; ?> required />
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
      <textarea class="form-control" name="notitext" rows=4 required /><?php echo $data['Notification_text']; ?></textarea>
    </div>

    <div class="form-group">
      <input type="hidden" name="nid" value=<?php echo $data['Notification_id']; ?> />
    </div>
     
    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
    <a class="btn btn-danger" href="admindash.php">Cancel</a>
  </form>
  
  </div>
</div>
</div>

</body>
</html>