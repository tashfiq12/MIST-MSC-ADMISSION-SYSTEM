<?php

   error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
session_start();
 if($_SESSION['login']!==true){
        header('location:login.php');
  } 
$con=mysqli_connect("localhost","root","","test");
$idd=$_SESSION['id'];
$q=mysqli_query($con,"select studentname from personal_info where id='$idd'");
$n=  mysqli_fetch_assoc($q);
$stname= $n['studentname'];

$result = mysqli_query($con,"SELECT * FROM personal_info WHERE id='$idd'");
                    
                    while($row = mysqli_fetch_array($result))
                      {
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>MIST</title>
        <link rel="stylesheet" href="css/bootstrap3.min.css">
         <link rel="stylesheet" href="css/bootstrap-theme.min3.css">
       <script src="css/jquery.min3.js"></script>
        <script src="css/bootstrap.min3.js"></script>
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
       
        
        <script type="text/javascript">
            function printpage()
            {
            var printButton = document.getElementById("print");
            printButton.style.visibility = 'hidden';
            window.print()
             printButton.style.visibility = 'visible';
             }
        </script>
    </head>
    <body style="background-image:url(images/lightg.jpg) ">
      <form id="admincard" action="" method="post">
            
          <div class="container-fluid">
                            <div class="row">
                               <div class="col-sm-12">
      <center>  <table class="table table-bordered" style="font-family: Verdana">
                
                <tr>
                 <td style="width:3%;"><img src="images/pic11.png" width="50%"> </td>
                 <td style="width:8%;"><center><font style="font-family:Arial Black; font-size:20px;">
                    MILITARY Institute OF Science and Technology, Mirpur Cantonment, Dhaka-1216, Bangladesh.</font></center>
                
                <center><font style="font-family:Verdana; font-size:18px;">
                    Phone : +8801769023842, Admission Office,MIST
                    </font></center>
                
                <br>
                <br>
                <center><font style="font-family:Arial Black; font-size:20px;">
                   MSC ADMISSION EXAM ADMIT  CARD (2019-20)</font></center>
                </td>
                    <td colspan="2" width="3%" >
                   <?php
                    
                    $picfile_path ='form-wizard/profile_images/';
                    
                    $result1 = mysqli_query($con,"SELECT * FROM documents where document_id='$idd'");
                        
                    
                    
                    while($row1 = mysqli_fetch_array($result1))
                      {                  
                        $picsrc=$picfile_path.$row1['profile_pic'];
                        
                        echo "<img src='$picsrc.' class='img-thumbnail' width='180px' style='height:180px;'>";
                        echo"<div>";
                      }
                   ?>
                        </td>
                 </tr>       
                 
                 
                 <tr>
                 <td style="width:4%;"> <font style="font-family: Verdana;">Date</font> </td>
                    <td style="width:8%;" colspan="3"><font style="font-family: Verdana; font-weight: bold">
                        15th March 2019, Morning Session</font> </td>
                 </tr>
                 
                 <tr>
                 <td style="width:4%;"> <font style="font-family: Verdana;">Time </font> </td>
                    <td style="width:8%;" colspan="3"> <font style="font-family: Verdana; font-weight: bold">
                        9:00 AM - 12:00 AM </font></td>
                 </tr>
                 
                <tr>
                    <td> <font style="font-family: Verdana;">Registration No. </font> </td>
                    <td colspan="3"><font style="font-family: Verdana; font-weight: bold">
                     <?php echo $idd; ?></font> </td>
                </tr>
                
                <tr>
                 <td style="width:4%;"> <font style="font-family: Verdana;">Name  </font> </td>
                    <td style="width:8%;" colspan="3"><font style="font-family: Verdana; font-weight: bold">
                     <?php echo $stname;?></font> </td>
                 </tr>
                 
                 <tr>
                     <td style="width:4%;"> <font style="font-family: Verdana;">Exam Center  </font> </td>
                    <td style="width:8%;" colspan="3">
                       <font style="font-family: Verdana; font-weight: bold"> Military Institute of Science and Technology<br>
                        At - Mirpur Cantonment<br>
                        P.O - Dhaka-1216, Bangladesh.<br>
                        Phone: +8801769023842<br>
                        </font>
                    </td>
                 </tr>
                <?php
                }
                ?>
                 
                    </table>
                </div>
             </div>
          </div>
          
          <center><font style="font-family: Verdana; font-weight: bold; font-size: 20px;"> Instructions to the Candidate</font></center><br>
          <font style="font-family: Verdana;  font-size: 13px;"> 
            <p style="margin-left: 100px; margin-right: 100px; font-family: Verdana;">
                1. This Admit Card must be presented for verification at the time of examination, along with at least one
                   original(not photocopied or scanned copy) and valid (not expired) photo identification card
                   (e.g : Voter ID Card,Birth Certificate).
            </p>
            
            <p style="margin-left: 100px; margin-right: 100px; font-family: Verdana;">
                2. This Admit Card is valid only if the candidate's photograph and signature images are <b> legibly printed</b>.
                   Print this on an A4 sized paper and do color printing.
            </p>
            
            <p style="margin-left: 100px; margin-right: 100px; font-family: Verdana;">
                3. Candidates should occupy their alloted seats <b>25 minutes before</b> the scheduled start of the examination.
            </p>
            
            <p style="margin-left: 100px; margin-right: 100px; font-family: Verdana;">
                4. Candidates will not be allowed to enter the examination hall <b>30 minutes</b>
                after the commencement of the examination.
            </p>
            
            <p style="margin-left: 100px; margin-right: 100px; font-family: Verdana;">
                5. Mobile phones or any other Electronic gadgets are NOT ALLOWED inside the examination hall. There may not be any
                facility for the safe-keeping of your gadget outside the hall, so it may be easier to leave it at your residence.
            </p>
			<p style="margin-left: 100px; margin-right: 100px; font-family: Verdana;">
                6. Students are strictly instructed not to apply any unfair means during exam time.Students who apply unfair means in exam time will
				be punished and students have to accept & respect the decision of authority during exam time.
            </p>
            
          </font>
          
          <center><input type="button" id="print" class="toggle btn btn-primary" value="Print" onclick="printpage();"></center>
      </form>
    </body>
</html>
