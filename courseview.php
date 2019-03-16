<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Courses | TIS</title>
</head>
<body >

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="index.php"><h4>TIS</h4></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav">
          <li><a class="nav-link" href="teacherview.php">Teachers</a></li>
          <li><a class="nav-link" href="#">Students</a></li>
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
  <div class="text-center"><h1>Courses</h1></div>
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
    include('dbcon.php');

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

  
  
