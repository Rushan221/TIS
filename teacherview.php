<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Teachers | TIS</title>
</head>
<body>
	    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="index.php"><h4>TIS</h4></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav">
          <li><a class="nav-link" href="teacherview.php">Teachers</a></li>
          <li><a class="nav-link" href="courseview.php">Courses</a></li>
        </ul>
      </div>

        <ul class="nav navbar-nav">
          <li><a class="nav-link" href="Students/studentlogin.php"><h6>Student Area</h6></a></li>
        </ul>

        <ul class="nav navbar-nav">       
          <li><a class="nav-link" href="login.php"><h6>Login</h6></a></li>
        </ul>
        
        <ul class="nav navbar-nav">
          <li><a class="nav-link" href="register.php"><h6>Register</h6></a></li>
        </ul>
  </nav>

 <br>
  <div class="container">
  <div class="text-center"><h1>Teachers</h1></div>
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
           
    </tr>
  </thead>
<?php
include('dbcon.php');

		

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