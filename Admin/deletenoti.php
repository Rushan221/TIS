<?php
include('../dbcon.php');

$id = $_REQUEST['notiid'];

$qry = "DELETE FROM `notification` WHERE `Notification_id`='$id' ;";

$run = mysqli_query($con, $qry);

if($run == true)
{
	?>
	<script>
		alert('Notification deleted');
		window.open('admindash.php','_self');
	</script>

	<?php
}
?>