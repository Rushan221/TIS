<?php
include('../dbcon.php');

$id = $_REQUEST['tid'];

$qry = "DELETE FROM `teachers` WHERE `Teacher_id`='$id' ;";

$run = mysqli_query($con, $qry);

if($run == true)
{
	?>
	<script>
		alert('Teacher deleted');
		window.open('updateteacher.php','_self');
	</script>

	<?php
}
?>
