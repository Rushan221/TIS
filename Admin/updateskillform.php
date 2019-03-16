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

$skillid = $_GET['skillid'];

$sql ="SELECT * FROM `skills` WHERE `Skill_id` = '$skillid'"; 

$run = mysqli_query($con, $sql);

$data = mysqli_fetch_assoc($run);


?>
<div class="col-sm-8 container" >
<div class="panel panel-default" style="padding-top: 2.5rem;">
  <div class="panel-heading">
    <h3 class="panel-title">Update Skill</h3>
  </div>
  <hr>
  <div class="panel-body">
  <form class="jumbotron" style="width: 1000px;" method="post" action="updateskilldata.php"> 
    <div class="form-group">
        <label for="Skillname">Skill Name</label>
        <input type="text" class="form-control" name="skill" value=<?php echo $data['Skill_name']; ?> required />
    </div>
     <div class="form-group">
      <input type="hidden" name="skillid" value=<?php echo $data['Skill_id']; ?> />
    </div>
    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
    <a class="btn btn-danger" href="manageskill.php">Cancel</a>
  </form>
</div>
</div>
</div>

</body>
</html>