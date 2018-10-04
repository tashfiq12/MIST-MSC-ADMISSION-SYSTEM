<?php
	include('conn.php');
	if(isset($_POST['del'])){
		$id=$_POST['id'];
		mysqli_query($conn,"delete from `departments` where id='$id'");
	}
?>