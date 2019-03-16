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
<br/>
<div class="container">
  <div class="text-center"><h1>Teachers</h1></div>
  <br>

  <div class="container" style="padding-bottom: 10px;">
	<a class="btn btn-primary" href="teacherdash.php">Back to Dashboard</a> 
</div>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Course</th>
      <th scope="col">Skill</th>
      <th scope="col">Description</th> 
           
    </tr>
  </thead>
<?php
include('../dbcon.php');

		

		$sql = "SELECT * FROM `teachers` ";

		$run = mysqli_query($con,$sql);

		if(mysqli_num_rows($run)<1)
		{
			echo "<tr><td colspan='6'>No Records found</td></tr>";
		}
		else{
				$count = 0;
			while($data=mysqli_fetch_assoc($run))
			{
				$count ++;
				?>
				  <thead>
   					 <tr>
     					<td scope="col"><?php echo $data['Teacher_name']; ?></td>
     					<td scope="col"><?php echo $data['Teacher_address']; ?></td>
      					<td scope="col"><?php echo $data['Teacher_email']; ?></td>
      					<td scope="col"><?php echo $data['Teacher_course']; ?></td>
     	 				<td scope="col"><?php echo $data['Teacher_skill']; ?></td>
      					<td scope="col"><?php echo $data['Teacher_desc']; ?></td>   
      					  
    				</tr>
  				   </thead>


				<?php

			}
		}


		
	
?>