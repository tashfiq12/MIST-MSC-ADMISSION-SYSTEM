<?php
define('pageclassconst', TRUE);
include_once './login/loginClass.php';
 unset($_SESSION['id']);

 unset($_SESSION['username']);

 unset($_SESSION['password']);
$login=new loginClass();
$login->logout();
?>