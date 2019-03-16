<?php
if (isset($_POST['submit'])) {
  # code...

include('../dbcon.php');
    $name= $_POST['name'];
    $duration= $_POST['duration'];
    $price= $_POST['price'];
    $desc= $_POST['description'];
    $id = $_POST['courseid'];    

    $qry= "UPDATE `course` SET `Course_name` = '$name', `Course_duration` = '$duration', `Course_price` = '$price',`Course_desc`='$desc' WHERE `Course_id` = '$id';";

    $run = mysqli_query($con,$qry);
    
    if($run == true){
      ?>

      <script >
        
        alert('success');
        window.open('viewcourse.php','_self');
      </script>
      <?php      

    }
  }
?>