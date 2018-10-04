<?php

   error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
	 session_start();
      if($_SESSION['login']!==true){
        header('location:../login.php');
  }
  if(!empty($_GET['tid'] && !empty($_GET['product']))) {
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $tid = $GET['tid'];
    $product = $GET['product'];
  } else {
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Thank You</title>
</head>
<body>
  <div class="container mt-4">
    <h2>Thank you for completing payment in  <?php echo $product; ?></h2>
    <hr>
    <p>Your transaction ID is <?php echo $tid; ?></p>
    <p>
	<?php
	    $con = mysqli_connect("localhost", "root","", "test");
		 $idd=$_SESSION['id'];
	  $sql1 = "SELECT * FROM contact_info where contact_id= '$idd'";
     $result1 = mysqli_query($con, $sql1);
	 $row1 = mysqli_fetch_assoc($result1);
	 $sql2 = "SELECT * FROM  personal_info where id= '$idd'";
     $result2 = mysqli_query($con, $sql2);
	 $row2 = mysqli_fetch_assoc($result2);
	 error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
	require 'PHPMailer-master/PHPMailerAutoload.php';

    $mail = new PHPMailer();
  
  //Enable SMTP debugging.
     //$mail->SMTPDebug = 1;
  //Set PHPMailer to use SMTP.
    $mail->isSMTP();
  //Set SMTP host name
   $mail->Host = "smtp.gmail.com";
   $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = TRUE;
  $mail->Username = "your mail";
  $mail->Password = "yout password";
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "false";
  $mail->Port = 587;
  //Set TCP port to connect to
  //Provide username and password
  
  $mail->From = "nkrt5810@gmail.com";
  $mail->FromName = "Admin_MIST";
  
  $mail->addAddress($row1["email"]);
  
  $mail->isHTML(true);
 
  $mail->Subject = "Payment confirmation mail";
  $mail->Body = "Hey ".$row2["studentname"]." thanks for submitting your payment for MIST MSC ADMISSION REGISTRATION.";
  $mail->AltBody = "This is the plain text version of the email content";
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
	
	
	
	?>
	
	
	
	</p>
    <p><a href="index.php" class="btn btn-light mt-2">Go Back</a></p>
  </div>
</body>
</html>