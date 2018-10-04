<?php
    include('functions.php');
    $id = $_GET['id'];
    $query = "select * from `requests` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $firstname = $row['firstname'];
            $email = $row['email'];
            $password = $row['password'];
            $query = "INSERT INTO `accounts` (`id`, `firstname`, `email`, `type`, `password`) VALUES (NULL, '$firstname', '$email', 'user', '$password');";
        }
        $query .= "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
        if(performQuery($query)){
           echo "<script>alert('Account has been accepted.')</script>";
        }else{
            echo "<script>alert('Unknown error occured. Please try again.')</script>";
        }
    }else{
        echo "<script>alert('Error occured')</script>.";
    }
    
?>
<br/><br/>
<a href="home.php">Back</a>