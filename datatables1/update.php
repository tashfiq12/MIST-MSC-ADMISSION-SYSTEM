<?php
	include('conn.php');
	if(isset($_POST['edit'])){
		$id=$_POST['id'];
		$firstname=$_POST['department'];
		
		mysqli_query($conn,"update `departments` set department='$firstname'  where id='$id'");
	}
?>