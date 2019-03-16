<?php
if (isset($_POST['submit'])) {
  # code...

include('../dbcon.php');
    $skill= $_POST['skill'];
    $id = $_POST['skillid'];    

    $qry= "UPDATE `skills` SET `Skill_name` = '$skill' WHERE `Skill_id` = '$id';";

    $run = mysqli_query($con,$qry);

    

    if($run == true){
      ?>

      <script >
        
        alert('success');
        window.open('manageskill.php','_self');
      </script>
      <?php      

    }
  }
?>

