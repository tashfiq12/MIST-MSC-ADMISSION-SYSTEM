<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$department=$_POST['department'];
		
		mysqli_query($conn,"insert into `departments` (department) values ('$department')");
	}
?>