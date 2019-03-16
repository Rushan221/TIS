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
<br>

 <div class="container">
  <div class="text-center"><h1>Courses</h1></div>
  
 	 <div class="container">
  		<a class="btn btn-danger" href="studentwelcome.php">Back to Dashboard</a>
	</div>
<br/>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"><h3>Course Name</h3></th>
      <th scope="col"><h4>Course Duration</h4></th>      
      <th scope="col"><h4>Course Price (Rs.)</h4></th>
      <th scope="col"><h3>Course Description</h3></th>
           
    </tr>
  </thead>

  </div>

  <?php  
    include('../dbcon.php');

    $sql = "SELECT * FROM `course` where course_id !=5;";

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
              <td scope="col"><?php echo $data['Course_name']; ?></td>
              <td scope="col"><?php echo $data['Course_duration']; ?></td>              
              <td scope="col"><?php echo $data['Course_price']; ?></td> 
              <td scope="col"><?php echo $data['Course_desc']; ?></td>
             </tr>
             </thead>


        <?php
        

      }
    }   
  
?>