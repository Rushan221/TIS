<?php
include('../dbcon.php');

$id = $_REQUEST['skillid'];

$qry = "DELETE FROM `skills` WHERE `Skill_id`='$id' ;";

$run = mysqli_query($con, $qry);

if($run == true)
{
	?>
	<script>
		alert('Skill deleted');
		window.open('manageskill.php','_self');
	</script>

	<?php
}
?>