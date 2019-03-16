<?php include('header.php'); ?>
<br/>

<div class="col-sm-8 container" >
<div class="panel panel-default" style="padding-top: 2.5rem;">
  <div class="panel-heading">
    <h3 class="panel-title">Contact Teachers</h3>
  </div>
  <hr>
  <div class="panel-body">
  <form class="jumbotron" style="width: 1000px;" method="post" action="contactteacher.php"> <!--for updating -->
    <div class="form-group">
      <div class="form-group">
      <label for="Course">Teacher</label>      
      <?php
      include('../dbcon.php');
      $qry = "SELECT DISTINCT `Teacher_email` FROM `teachers` ";
      $run = mysqli_query($con,$qry);

      $Tname="<select name='Teacher' class='form-control'>";


      while ($row = mysqli_fetch_assoc($run)) {
          $Tname .= "<option value='{$row['Teacher_email']}'> {$row['Teacher_email']}</option>"; // for dynamic course selection
      }
      $Tname .="</select>";
      echo $Tname;
      ?>            
    </div>

        <label for="teachername">Name:</label>
        <input type="text" class="form-control" name="name" value="Admin"   readonly="Admin" />
    </div>
    <div class="form-group">
        <label for="teacheremail">Email Address:</label>
        <input type="text" class="form-control" name="emailaddress" placeholder="Enter your email address"  required />
    </div>

    <div class="form-group">
        <label for="subject">Subject:</label>
        <input type="text" class="form-control" name="subject" placeholder="Enter subject" required />
    </div>

    <div class="form-group">
        <label for="teachername">Email:</label>
        <textarea class="form-control" name="email"  rows="6" required ></textarea>
    </div>

    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
    <a class="btn btn-danger" href="studentwelcome.php">Cancel</a>

    </form>
    </div>
  </div>
  </div>
</body>
</html>

<?php

if (isset($_POST['submit'])) {

  $teacher = $_POST['Teacher'];
  $name = $_POST['name'];
  $email = $_POST['emailaddress'];
  $subject = $_POST['subject'];
  $msg = $_POST['email'];  

  $body = "From:" .$name ."\n"
          . $email ."\n"
          .$msg;

  if (mail($teacher, $subject, $body, 'From: TIS')) {

    ?>
    <script>
      alert('Success');
        window.open('admindash.php','_self');
    </script>
    <?php
    
    


      }  

}
?>