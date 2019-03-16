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
    <h3 class="panel-title">Add Course</h3>
  </div>
  <hr>
  <div class="panel-body">
  <form class="jumbotron" style="width: 1000px;" method="post" action="addcourse.php"> 
    <div class="form-group">
        <label for="Coursename">Course Name:</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Course Name" required />
      </div>
    
    <div class="form-group">
      <label for="duration">Course Duration:</label>
      <input type="text" class="form-control" name="duration" placeholder="Enter Course Duration" required />  
    </div>

    <div class="form-group">
      <label for="price">Course Price: </label>
      <input type="text" class="form-control " name="price" placeholder="Enter Course Price"  required />  
    </div>   

    <div class="form-group">
      <label for="description">Course Description:</label>
      <textarea class="form-control" name="description" placeholder="Enter Course Description" rows="4" required ></textarea>
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
    $name= $_POST['name'];
    $duration= $_POST['duration'];
    $price= $_POST['price'];
    $description = $_POST['description'];
     

    $sql= "SELECT * FROM Course WHERE Course_name ='$name'";
    $runqry = mysqli_query($con, $sql);

    $count = mysqli_num_rows($runqry);

    if($count > 0){
        ?>

      <script >
        
        alert('Course already exists');
        window.open('addcourse.php','_self');
      </script>
      <?php

    }
    else{  

    $qry= "INSERT INTO `course`(`Course_name`, `Course_duration`, `Course_price`, `Course_desc`) VALUES ('$name','$duration','$price','$description')";

    $run = mysqli_query($con,$qry);

    echo $run;

    if($run == true){
      ?>

      <script >
        
        alert('success');
        window.open('admindash.php','_self');
      </script>
      <?php

      }

    }


  }
?>