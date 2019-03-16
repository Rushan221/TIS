<?php
if (isset($_POST['submit'])) {
  # code...

include('../dbcon.php');
    $title= $_POST['title'];
    $course= $_POST['course'];
    $text= $_POST['notitext'];
    $id = $_POST['nid'];    

    $qry= "UPDATE `notification` SET `Notification_title` = '$title', `Notification_course`='$course', `Notification_text`='$text' WHERE `Notification_id` = '$id';";

    $run = mysqli_query($con,$qry);

    if($run == true){
      ?>

      <script >
        
        alert('success');
        window.open('admindash.php','_self');
      </script>
      <?php      

    }
  }
?>