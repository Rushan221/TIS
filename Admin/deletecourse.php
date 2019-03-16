<?php
include('../dbcon.php');

$id = $_REQUEST['cid'];

$qry = "DELETE FROM `course` WHERE `Course_id`='$id' ;";

$run = mysqli_query($con, $qry);

if($run == true)
{
	?>
	<script>
		alert('Course deleted');
		window.open('viewcourse.php','_self');
	</script>

	<?php
}
?>