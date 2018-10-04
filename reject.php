<?php
    include('functions.php');
    $id = $_GET['id'];
    
    $query = "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
        if(performQuery($query)){
            echo "<script>alert('Account has been rejected.')</script>";
        }else{
            echo "<script>alert('Unknown error occured.Please try again.)</script>";
        }

?>
<br/><br/>
<a href="home.php">Back</a>