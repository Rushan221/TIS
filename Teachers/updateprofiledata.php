<?php

 if(isset($_POST['submit']))
  {
    include('../dbcon.php');
    $teacher= $_POST['teacher'];
    $address= $_POST['address'];
    $email= $_POST['email'];
    $course = $_POST['course'];
    $skill = $_POST['skill'];
    $about= $_POST['about'];
    $id = $_POST['teacherid'];


    

    $qry= "UPDATE `teachers` SET `Teacher_name` = '$teacher', `Teacher_address` = '$address', `Teacher_email` = '$email',`Teacher_course`='$course',`Teacher_skill`='$skill', `Teacher_desc` = '$about' WHERE `Teacher_id` = '$id';";

    $run = mysqli_query($con,$qry);

    echo $run;

    if($run == true){
      ?>

      <script >
        
        alert('success');

        window.open('teacherprofile.php?teacherid=<?php echo $id; ?>','_self');

      </script>
      <?php     

    }
  }
?>