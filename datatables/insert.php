<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$statement = $connection->prepare("
			INSERT INTO accounts (firstname, email, password,type) 
			VALUES (:name, :email, :password,:type)
		");
		$result = $statement->execute(
			array(
				':name'	=>	$_POST["firstname"],
				':email'	=>	$_POST["email"],
				':password'	=>	$_POST["password"],
				':type'	=>	$_POST["department"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE accounts
			SET firstname = :name, email = :email, password = :password,type =:type  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':name'	=>	$_POST["firstname"],
				':email'	=>	$_POST["email"],
				':password'	=>	$_POST["password"],
				':type'	=>	$_POST["department"],
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>