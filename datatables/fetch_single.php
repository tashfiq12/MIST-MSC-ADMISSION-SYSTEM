<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM accounts 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["firstname"] = $row["firstname"];
		$output["email"] = $row["email"];
		$output["password"] = $row["password"];
		$output["type"] = $row["type"];
		
	}
	echo json_encode($output);
}
?>