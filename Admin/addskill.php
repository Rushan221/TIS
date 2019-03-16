<?php
 session_start();

 	if (isset($_SESSION['uid']) ){

 		echo "";	 		
 	}
 	else{
 		header('location: index.php');
 	}

?>

<?php include ('header.php'); ?>

<div class="col-sm-8 container" >
<div class="panel panel-default" style="padding-top: 2.5rem;">
  <div class="panel-heading">
    <h3 class="panel-title">Add Skill</h3>
  </div>
  <hr>
  <div class="panel-body">
  <form class="jumbotron" style="width: 1000px;" method="post" action="addskill.php"> 
    <div class="form-group">
        <label for="Skillname">Skill Name</label>
        <input type="text" class="form-control" name="skill" placeholder="Enter Skill Name" required />
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

if(isset($_POST['submit']))
  {
    include('../dbcon.php');
    $skill= $_POST['skill'];
    

    $sql= "SELECT * FROM skills WHERE Skill_name ='$skill'";
    $runqry = mysqli_query($con, $sql);

    $count = mysqli_num_rows($runqry);

    if($count > 0){
        ?>

      <script >
        
        alert('This skill already exists');
        window.open('viewskill.php','_self');
      </script>
      <?php

    }
    else{  

    $qry= "INSERT INTO `skills`(`Skill_name`) VALUES ('$skill')";

    $run = mysqli_query($con,$qry);

    echo $run;

    if($run == true){
      ?>

      <script >
        
        alert('success');
        window.open('viewskill.php','_self');
      </script>
      <?php

      }

    }


  }
?>


?>


