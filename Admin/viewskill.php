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

<br>

 <div class="container">
  <div class="text-center"><h1>Skills</h1></div>
  <br/>
  <div class="container" style="padding-bottom: 10px;">
	<a class="btn btn-primary" href="admindash.php">Back to Dashboard</a> 
	<a class="btn btn-primary" href="manageskill.php">Manage Skills</a> 
</div>
  
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"><h4>Skill Name</h4></th>    
      <th scope="col"></th>

           
    </tr>
  </thead>

  </div>

  <?php  
    include('../dbcon.php');

    $sql = "SELECT * FROM `skills` ";

    $run = mysqli_query($con,$sql);

    if(mysqli_num_rows($run)<1)
    {
      echo "<tr><td colspan='2'>No Records found</td></tr>";
    }
    else{
        $count = 0;
      while($data=mysqli_fetch_assoc($run))
      {
        $count ++;
        ?>
          <thead>
             <tr>
              <td scope="col"><?php echo $data['Skill_name']; ?></td>             	
             </tr>
             </thead>
        <?php
      }
    }    
  ?>