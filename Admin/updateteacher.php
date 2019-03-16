<?php
 session_start();

 	if (isset($_SESSION['uid']) ){

 		echo "";	 		
 	}
 	else{
 		header('location: index.php');
 	}

?>

<?php include('header.php'); ?>
<div class="container" style="padding-top: 20px;">
	<h3>Search Teacher</h3>
	<hr>
  <form class="form-inline my-2 my-lg-0" method="post" action="updateteacher.php">

  	  <label for="about" style="padding-right: 10px;">Course</label>

      <?php

      include('../dbcon.php');
      $qry = "SELECT DISTINCT `Course_name` FROM `course` WHERE Course_id != 5; ";
      $run = mysqli_query($con,$qry);

      $Cname="<select name='course' class='form-control'>";

      while ($row = mysqli_fetch_assoc($run)) {
          $Cname .= "<option value='{$row['Course_name']}'> {$row['Course_name']}</option>"; // for dynamic course selection
      }

      $Cname .="</select>";

      echo $Cname;

      ?>
      <div style="padding-left: 15px;">
      	<button type="submit" class="btn btn-primary" name="submit" value="submit" >Search</button>
    	<a class="btn btn-danger" href="updateteacher.php">Cancel</a>  
      </div>

      <div style="padding-left: 20px;" >
      	<a class="btn btn-danger" href="admindash.php">Back to Dashboard</a>  
      </div>
  </form>


    

<br>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Course</th>
      <th scope="col">Skill</th>
      <th scope="col">Description</th> 
      <th scope="col"></th>     
    </tr>
  </thead>
  
  </div>

<?php
	
	if (isset($_POST['submit'])) {

		include('../dbcon.php');

		$Cname = $_POST['course'];

		$sql = "SELECT * FROM `teachers` WHERE Teacher_course = '$Cname';";

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
      					<td scope="col"><a class="btn btn-primary" href="updateform.php?tid=<?php echo $data['Teacher_id']; ?>">Edit</a></td> 
                <td scope="col"><a class="btn btn-primary" href="deleteteacher.php?tid=<?php echo $data['Teacher_id']; ?>">Delete</a> </td> 
    				</tr>
  				   </thead>


				<?php

			}
		}


		
	}
?>