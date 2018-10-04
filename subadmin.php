<?php

  error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
session_start();
 if($_SESSION['login']!==true){
        header('location:login.php');
  }
 $conn = mysqli_connect("localhost", "root", "", "test");
if(isset($_POST['Approved']))
{
   $status="Approved";
   $id=$_POST['id'];
   $query="Update `applied_stats` set `check_stats`= '$status' where `id` ='$id'";
   $res=mysqli_query($conn,$query);
   if($res)
   {
       $qury="INSERT INTO approved_list (id,studentname,email,mobile,und_dept_name,bsc_institution,bsc_cgpa,payment_status)
      SELECT a.id,a.studentname,b.email,b.mobile,c.und_dept_name,d.bsc_institution,d.bsc_cgpa,p.status from personal_info a,contact_info b,basic_educational_info c,additional_educational_info d,transactions p where '$id'=a.id and a.id=b.contact_id and b.contact_id=c.basic_educational_id and c.basic_educational_id=d.additional_educational_id and d.additional_educational_id=p.customer_id";
      if (mysqli_query($conn, $qury)) {
      echo "Approving purpose done";
      $sql1 = "SELECT * FROM contact_info where contact_id= '$id'";
     $result1 = mysqli_query($conn, $sql1);
   $row1 = mysqli_fetch_assoc($result1);
   $sql2 = "SELECT * FROM  personal_info where id= '$id'";
     $result2 = mysqli_query($conn, $sql2);
   $row2 = mysqli_fetch_assoc($result2);
  
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
  //Provide username and password
  $mail->Username = "your mail";
  $mail->Password = "your password";
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "false";
  $mail->Port = 587;
  //Set TCP port to connect to
  
  $mail->From = "nkrt5810@gmail.com";
  $mail->FromName = "Admin_MIST";
  
  $mail->addAddress($row1["email"]);
  
  $mail->isHTML(true);
 
  $mail->Subject = "Approval confirmation mail";
  $mail->Body = "Hey ".$row2["studentname"]." please download admit card for MIST MSC Admission test from your account and bring it to exam hall";
  $mail->AltBody = "This is the plain text version of the email content";
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
    } else {
      echo "Error: " . $qury . "<br>" . mysqli_error($conn);
    }
   }

   else
   {
    echo "Data not updated";
   }

}
if(isset($_POST['Rejected']))
{
   $status="Rejected";
   $id=$_POST['id'];
   $query="Update `applied_stats` set `check_stats`= '$status' where `id` ='$id'";
   $res=mysqli_query($conn,$query);
   if($res)
   {
       echo "data rejected successfully";
   }
   else
   {
    echo "Data not updated";
   }

}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>MIST SUBADMIN!</title>
  </head>
  <body>

   <?php
   $type=$_SESSION['type'];

  $link = mysqli_connect("localhost", "root", "", "test");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM department_wanted";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            if($type === "subadmin_CSE"){
            if($row['dept_wanted']==="CSE")
            {
                $idd1=$row['id'];
                $sql1 = "SELECT a.studentname,a.blood,a.programtype,b.email,b.mobile,c.und_dept_name,d.ssc_institution,d.ssc_gpa,d.hsc_institution,d.hsc_gpa,d.bsc_institution,d.bsc_cgpa,p.amount,p.status,aps.check_stats from personal_info a,contact_info b,basic_educational_info c,additional_educational_info d,documents e,transactions p,applied_stats aps where '$idd1'=a.id and a.id=b.contact_id and b.contact_id=c.basic_educational_id and c.basic_educational_id=d.additional_educational_id and d.additional_educational_id=e.document_id and e.document_id=p.customer_id and p.customer_id=aps.id";
             if($result1 = mysqli_query($link, $sql1)){
           if(mysqli_num_rows($result1) > 0){
           echo "<h1 class='text-center'>Welcome CSE subadmin</h1>";
             echo "<table class='table table-striped'>";
              echo "<thead>";
              echo "<tr>";
                  echo "<th>Name</th>";
                   echo "<th>Blood</th>";
                    echo "<th>Programtype</th>";
                    echo "<th>Email</th>";
                    echo "<th>Mobile</th>";
                    echo "<th>Undergrad Department name</th>";
                    echo "<th>SSC institution</th>";
                   echo "<th>SSC GPA</th>";
                 echo "<th>HSC institution</th>";
                   echo "<th>HSC GPA</th>";
                 echo "<th>BSC institution</th>";
                  echo "<th>BSC CGPA</th>";
                echo "<th>Payment Amount</th>";
                 echo "<th>Payment Status</th>";
                  echo "<th>Application Status</th>";
              echo "</tr>";
                echo "</thead>";
           while($row1 = mysqli_fetch_array($result1)){
           echo "<tbody>";
            echo "<tr>";
                echo "<td>" . $row1['studentname'] . "</td>";
                echo "<td>" . $row1['blood'] . "</td>";
                echo "<td>" . $row1['programtype'] . "</td>";
                echo "<td>" . $row1['email'] . "</td>";

                echo "<td>" . $row1['mobile'] . "</td>";
                echo "<td>" . $row1['und_dept_name'] . "</td>";
                echo "<td>" . $row1['ssc_institution'] . "</td>";
                echo "<td>" . $row1['ssc_gpa'] . "</td>";

                echo "<td>" . $row1['hsc_institution'] . "</td>";
                echo "<td>" . $row1['hsc_gpa'] . "</td>";
                echo "<td>" . $row1['bsc_institution'] . "</td>";
                echo "<td>" . $row1['bsc_cgpa'] . "</td>";

                  echo "<td>" . $row1['amount'] . "</td>";
                echo "<td>" . $row1['status'] . "</td>";
                 echo "<td style='color:green'>" . $row1['check_stats'] . "</td>";
               echo "<td> <form method='post' action=''>
                  <input type='hidden' name='id' value='$idd1'>
                 <button type='submit' name='Approved' class='btn btn-primary'>Approved</button>
                 <button type='submit' name='Rejected' class='btn btn-warning'>Rejected</button>
               </form>
             </td>";
            echo "</tr>";
          echo "</tbody>";
        }
        echo "</table>";
        // Free result set
        
    } 
      }
              
        }
      }

       if($type === "subadmin_EECE"){
            if($row['dept_wanted']==="EECE")
            {
                $idd1=$row['id'];
                $sql1 = "SELECT a.studentname,a.blood,a.programtype,b.email,b.mobile,c.und_dept_name,d.ssc_institution,d.ssc_gpa,d.hsc_institution,d.hsc_gpa,d.bsc_institution,d.bsc_cgpa,p.amount,p.status,aps.check_stats from personal_info a,contact_info b,basic_educational_info c,additional_educational_info d,documents e,transactions p,applied_stats aps where '$idd1'=a.id and a.id=b.contact_id and b.contact_id=c.basic_educational_id and c.basic_educational_id=d.additional_educational_id and d.additional_educational_id=e.document_id and e.document_id=p.customer_id and p.customer_id=aps.id";
             if($result1 = mysqli_query($link, $sql1)){
           if(mysqli_num_rows($result1) > 0){
           echo "<h1 class='text-center'>Welcome EECE subadmin</h1>";
             echo "<table class='table table-striped'>";
              echo "<thead>";
              echo "<tr>";
                  echo "<th>Name</th>";
                   echo "<th>Blood</th>";
                    echo "<th>Programtype</th>";
                    echo "<th>Email</th>";
                    echo "<th>Mobile</th>";
                    echo "<th>Undergrad Department name</th>";
                    echo "<th>SSC institution</th>";
                   echo "<th>SSC GPA</th>";
                 echo "<th>HSC institution</th>";
                   echo "<th>HSC GPA</th>";
                 echo "<th>BSC institution</th>";
                  echo "<th>BSC CGPA</th>";
                echo "<th>Payment Amount</th>";
                 echo "<th>Payment Status</th>";
                  echo "<th>Application Status</th>";
              echo "</tr>";
                echo "</thead>";
           while($row1 = mysqli_fetch_array($result1)){
           echo "<tbody>";
            echo "<tr>";
                echo "<td>" . $row1['studentname'] . "</td>";
                echo "<td>" . $row1['blood'] . "</td>";
                echo "<td>" . $row1['programtype'] . "</td>";
                echo "<td>" . $row1['email'] . "</td>";

                echo "<td>" . $row1['mobile'] . "</td>";
                echo "<td>" . $row1['und_dept_name'] . "</td>";
                echo "<td>" . $row1['ssc_institution'] . "</td>";
                echo "<td>" . $row1['ssc_gpa'] . "</td>";

                echo "<td>" . $row1['hsc_institution'] . "</td>";
                echo "<td>" . $row1['hsc_gpa'] . "</td>";
                echo "<td>" . $row1['bsc_institution'] . "</td>";
                echo "<td>" . $row1['bsc_cgpa'] . "</td>";

                  echo "<td>" . $row1['amount'] . "</td>";
                echo "<td>" . $row1['status'] . "</td>";
                 echo "<td style='color:green'>" . $row1['check_stats'] . "</td>";
               echo "<td> <form method='post' action=''>
                  <input type='hidden' name='id' value='$idd1'>
                 <button type='submit' name='Approved' class='btn btn-primary'>Approved</button>
                 <button type='submit' name='Rejected' class='btn btn-warning'>Rejected</button>
               </form>
             </td>";
            echo "</tr>";
          echo "</tbody>";
        }
        echo "</table>";
        // Free result set
        
    } 
      }
              
        }
      }

       if($type === "subadmin_ME"){
            if($row['dept_wanted']==="ME")
            {
                $idd1=$row['id'];
                $sql1 = "SELECT a.studentname,a.blood,a.programtype,b.email,b.mobile,c.und_dept_name,d.ssc_institution,d.ssc_gpa,d.hsc_institution,d.hsc_gpa,d.bsc_institution,d.bsc_cgpa,p.amount,p.status,aps.check_stats from personal_info a,contact_info b,basic_educational_info c,additional_educational_info d,documents e,transactions p,applied_stats aps where '$idd1'=a.id and a.id=b.contact_id and b.contact_id=c.basic_educational_id and c.basic_educational_id=d.additional_educational_id and d.additional_educational_id=e.document_id and e.document_id=p.customer_id and p.customer_id=aps.id";
             if($result1 = mysqli_query($link, $sql1)){
           if(mysqli_num_rows($result1) > 0){
           echo "<h1 class='text-center'>Welcome ME subadmin</h1>";
             echo "<table class='table table-striped'>";
              echo "<thead>";
              echo "<tr>";
                  echo "<th>Name</th>";
                   echo "<th>Blood</th>";
                    echo "<th>Programtype</th>";
                    echo "<th>Email</th>";
                    echo "<th>Mobile</th>";
                    echo "<th>Undergrad Department name</th>";
                    echo "<th>SSC institution</th>";
                   echo "<th>SSC GPA</th>";
                 echo "<th>HSC institution</th>";
                   echo "<th>HSC GPA</th>";
                 echo "<th>BSC institution</th>";
                  echo "<th>BSC CGPA</th>";
                echo "<th>Payment Amount</th>";
                 echo "<th>Payment Status</th>";
                  echo "<th>Application Status</th>";
              echo "</tr>";
                echo "</thead>";
           while($row1 = mysqli_fetch_array($result1)){
           echo "<tbody>";
            echo "<tr>";
                echo "<td>" . $row1['studentname'] . "</td>";
                echo "<td>" . $row1['blood'] . "</td>";
                echo "<td>" . $row1['programtype'] . "</td>";
                echo "<td>" . $row1['email'] . "</td>";

                echo "<td>" . $row1['mobile'] . "</td>";
                echo "<td>" . $row1['und_dept_name'] . "</td>";
                echo "<td>" . $row1['ssc_institution'] . "</td>";
                echo "<td>" . $row1['ssc_gpa'] . "</td>";

                echo "<td>" . $row1['hsc_institution'] . "</td>";
                echo "<td>" . $row1['hsc_gpa'] . "</td>";
                echo "<td>" . $row1['bsc_institution'] . "</td>";
                echo "<td>" . $row1['bsc_cgpa'] . "</td>";

                  echo "<td>" . $row1['amount'] . "</td>";
                echo "<td>" . $row1['status'] . "</td>";
                 echo "<td style='color:green'>" . $row1['check_stats'] . "</td>";
               echo "<td> <form method='post' action=''>
                  <input type='hidden' name='id' value='$idd1'>
                 <button type='submit' name='Approved' class='btn btn-primary'>Approved</button>
                 <button type='submit' name='Rejected' class='btn btn-warning'>Rejected</button>
               </form>
             </td>";
            echo "</tr>";
          echo "</tbody>";
        }
        echo "</table>";
        // Free result set
        
    } 
      }
              
        }
      }

       if($type === "subadmin_CIVIL"){
            if($row['dept_wanted']==="CIVIL")
            {
                $idd1=$row['id'];
                $sql1 = "SELECT a.studentname,a.blood,a.programtype,b.email,b.mobile,c.und_dept_name,d.ssc_institution,d.ssc_gpa,d.hsc_institution,d.hsc_gpa,d.bsc_institution,d.bsc_cgpa,p.amount,p.status,aps.check_stats from personal_info a,contact_info b,basic_educational_info c,additional_educational_info d,documents e,transactions p,applied_stats aps where '$idd1'=a.id and a.id=b.contact_id and b.contact_id=c.basic_educational_id and c.basic_educational_id=d.additional_educational_id and d.additional_educational_id=e.document_id and e.document_id=p.customer_id and p.customer_id=aps.id";
             if($result1 = mysqli_query($link, $sql1)){
           if(mysqli_num_rows($result1) > 0){
           echo "<h1 class='text-center'>Welcome CIVIL subadmin</h1>";
             echo "<table class='table table-striped'>";
              echo "<thead>";
              echo "<tr>";
                  echo "<th>Name</th>";
                   echo "<th>Blood</th>";
                    echo "<th>Programtype</th>";
                    echo "<th>Email</th>";
                    echo "<th>Mobile</th>";
                    echo "<th>Undergrad Department name</th>";
                    echo "<th>SSC institution</th>";
                   echo "<th>SSC GPA</th>";
                 echo "<th>HSC institution</th>";
                   echo "<th>HSC GPA</th>";
                 echo "<th>BSC institution</th>";
                  echo "<th>BSC CGPA</th>";
                echo "<th>Payment Amount</th>";
                 echo "<th>Payment Status</th>";
                  echo "<th>Application Status</th>";
              echo "</tr>";
                echo "</thead>";
           while($row1 = mysqli_fetch_array($result1)){
           echo "<tbody>";
            echo "<tr>";
                echo "<td>" . $row1['studentname'] . "</td>";
                echo "<td>" . $row1['blood'] . "</td>";
                echo "<td>" . $row1['programtype'] . "</td>";
                echo "<td>" . $row1['email'] . "</td>";

                echo "<td>" . $row1['mobile'] . "</td>";
                echo "<td>" . $row1['und_dept_name'] . "</td>";
                echo "<td>" . $row1['ssc_institution'] . "</td>";
                echo "<td>" . $row1['ssc_gpa'] . "</td>";

                echo "<td>" . $row1['hsc_institution'] . "</td>";
                echo "<td>" . $row1['hsc_gpa'] . "</td>";
                echo "<td>" . $row1['bsc_institution'] . "</td>";
                echo "<td>" . $row1['bsc_cgpa'] . "</td>";

                  echo "<td>" . $row1['amount'] . "</td>";
                echo "<td>" . $row1['status'] . "</td>";
                 echo "<td style='color:green'>" . $row1['check_stats'] . "</td>";
               echo "<td> <form method='post' action=''>
                  <input type='hidden' name='id' value='$idd1'>
                 <button type='submit' name='Approved' class='btn btn-primary'>Approved</button>
                 <button type='submit' name='Rejected' class='btn btn-warning'>Rejected</button>
               </form>
             </td>";
            echo "</tr>";
          echo "</tbody>";
        }
        echo "</table>";
        // Free result set
        
    } 
      }
              
        }
      }

       if($type === "subadmin_NAME"){
            if($row['dept_wanted']==="NAME")
            {
                $idd1=$row['id'];
                $sql1 = "SELECT a.studentname,a.blood,a.programtype,b.email,b.mobile,c.und_dept_name,d.ssc_institution,d.ssc_gpa,d.hsc_institution,d.hsc_gpa,d.bsc_institution,d.bsc_cgpa,p.amount,p.status,aps.check_stats from personal_info a,contact_info b,basic_educational_info c,additional_educational_info d,documents e,transactions p,applied_stats aps where '$idd1'=a.id and a.id=b.contact_id and b.contact_id=c.basic_educational_id and c.basic_educational_id=d.additional_educational_id and d.additional_educational_id=e.document_id and e.document_id=p.customer_id and p.customer_id=aps.id";
             if($result1 = mysqli_query($link, $sql1)){
           if(mysqli_num_rows($result1) > 0){
           echo "<h1 class='text-center'>Welcome NAME DEPARTMENT subadmin</h1>";
             echo "<table class='table table-striped'>";
              echo "<thead>";
              echo "<tr>";
                  echo "<th>Name</th>";
                   echo "<th>Blood</th>";
                    echo "<th>Programtype</th>";
                    echo "<th>Email</th>";
                    echo "<th>Mobile</th>";
                    echo "<th>Undergrad Department name</th>";
                    echo "<th>SSC institution</th>";
                   echo "<th>SSC GPA</th>";
                 echo "<th>HSC institution</th>";
                   echo "<th>HSC GPA</th>";
                 echo "<th>BSC institution</th>";
                  echo "<th>BSC CGPA</th>";
                echo "<th>Payment Amount</th>";
                 echo "<th>Payment Status</th>";
                  echo "<th>Application Status</th>";
              echo "</tr>";
                echo "</thead>";
           while($row1 = mysqli_fetch_array($result1)){
           echo "<tbody>";
            echo "<tr>";
                echo "<td>" . $row1['studentname'] . "</td>";
                echo "<td>" . $row1['blood'] . "</td>";
                echo "<td>" . $row1['programtype'] . "</td>";
                echo "<td>" . $row1['email'] . "</td>";

                echo "<td>" . $row1['mobile'] . "</td>";
                echo "<td>" . $row1['und_dept_name'] . "</td>";
                echo "<td>" . $row1['ssc_institution'] . "</td>";
                echo "<td>" . $row1['ssc_gpa'] . "</td>";

                echo "<td>" . $row1['hsc_institution'] . "</td>";
                echo "<td>" . $row1['hsc_gpa'] . "</td>";
                echo "<td>" . $row1['bsc_institution'] . "</td>";
                echo "<td>" . $row1['bsc_cgpa'] . "</td>";

                  echo "<td>" . $row1['amount'] . "</td>";
                echo "<td>" . $row1['status'] . "</td>";
                 echo "<td style='color:green'>" . $row1['check_stats'] . "</td>";
               echo "<td> <form method='post' action=''>
                  <input type='hidden' name='id' value='$idd1'>
                 <button type='submit' name='Approved' class='btn btn-primary'>Approved</button>
                 <button type='submit' name='Rejected' class='btn btn-warning'>Rejected</button>
               </form>
             </td>";
            echo "</tr>";
          echo "</tbody>";
        }
        echo "</table>";
        // Free result set
        
    } 
      }
              
        }
      }

    } 
}
else{
  echo "No rcords found";
}
} 
// Close connection
mysqli_close($link);
?>
  
   






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>