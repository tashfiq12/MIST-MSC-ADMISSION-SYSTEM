<?php
 include "db1.php";
 error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
 session_start();
 if($_SESSION['login']!==true){
        header('location:../login.php');
  }
?>
<?php
  $hostname2 = "localhost";
$username2 = "root";
$password2 = "";
$databaseName2 = "test";

// connect to mysql database

$connect = mysqli_connect($hostname2, $username2, $password2, $databaseName2);

// mysql select query
$query10 = "SELECT * FROM `departments`";
$result10 = mysqli_query($connect, $query10);

$options = "";

while($row10 = mysqli_fetch_array($result10))
{
    $options = $options."<option>$row10[1]</option>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Form Wizard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/font-awesome.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
</head>
<body>
    
    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="wizards">
                <div class="progressbar">
                    <div class="progress-line" data-now-value="12.11" data-number-of-steps="7" style="width: 12.11%;"></div> <!-- 19.66% -->
                </div>
                <div class="form-wizard active">
                    <div class="wizard-icon"><i class="fa fa-user"></i></div>
                    <p>Personal details</p>
                </div>
                <div class="form-wizard">
                    <div class="wizard-icon"><i class="fa fa-address-book"></i></div>
                    <p>Contact details</p>
                </div>
                <div class="form-wizard">
                    <div class="wizard-icon"><i class="fa fa-adjust"></i></div>
                    <p>Basic Educational Details</p>
                </div>
                <div class="form-wizard">
                    <div class="wizard-icon"><i class="fa fa-adjust"></i></div>
                    <p>Additional Educational Details</p>
                </div>
				<div class="form-wizard">
                    <div class="wizard-icon"><i class="fa fa-adjust"></i></div>
                    <p>Necessary Documents</p>
                </div>
                   <div class="form-wizard">
                    <div class="wizard-icon"><i class="fa fa-file-text-o"></i></div>
                    <p>License</p>
                   </div>
                <div class="form-wizard">
                    <div class="wizard-icon"><i class="fa fa-check-circle"></i></div>
                    <p>Finish</p>
                </div>
            </div>
            <fieldset>
                <h4>Personal Information</h4>
                 <div class="form-group">
                    <label>Student Name</label>
                   <input type="text" class="form-control" name="name" placeholder="Enter Student name" required="">
                </div>
                 <div class="form-group">
                    <label>Student Name in Bangla (<a target="_blank" href="http://www.google.com/intl/bn/inputtools/try/">Try online</a>)</label>
                   <input type="text" class="form-control"  name="banglaname" placeholder="Enter Student's Bangla name" required="">
                </div>
                <div class="form-group">
                    <label>Father Name</label>
                  <input type="text" class="form-control" name="fathername" placeholder="Enter father name" required="">
                </div>
                 <div class="form-group">
                    <label>Mother name</label>
                  <input type="text" class="form-control" name="mothername" placeholder="Enter mother's name" required="">
                </div>
                <div class="form-group">
                    <label>Date of birth</label>
                  <input type="date" class="form-control" name="bday" required="">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                     <input type="radio" name="gender" value="male" size="10">Male
                    <input type="radio" name="gender" value="Female" size="10">Female
                </div>
                <div class="form-group">
                    <label>Blood</label>
                     <select name="Blood">
                    <option  selected>Select Blood</option>
                       <option value="A+">A+</option>
                      <option value="A-">A-</option>
                     <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="O+">O+</option>
                     <option value="O-">O-</option>
                     <option value="AB+">AB+</option>
                     <option value="AB-">AB-</option>
                     </select>
                </div>
                <div class="form-group">
                    <label>Relegion</label>
                    <select name="Relegion" id="Relegion">
                  <option value="-1" selected>Select Relegion</option>
                   <option value="Muslim">Muslim</option>
                   <option value="Hinduism">Hinduism</option>
                   <option value="Christianity">Christianity</option>
                  <option value="Buddhism">Buddhism</option>
                   </select>
                </div>
                <div class="form-group">
                    <label>Nationality</label>
                    <input type="text" class="form-control" name="nationality" placeholder="Enter Nationality" required="">
                </div>
                 <div class="form-group">
                    <label>NationalID</label>
                    <input type="text" class="form-control" name="nationalid" placeholder="Enter Nationalid" required="">
                </div>
                <div class="form-group">
                    <label>Program Type</label>
                      <select name="Program">
                  <option value="-1" selected>Choice of Program</option>
                 <option value="M.Sc.Engg">M.Sc.Engg</option>
                 <option value="M.Engg">M.Engg</option>
                 <option value="Ph.D">Ph.D</option>
                    </select>
                </div>
				  <div class="form-group">
                    <label>Department you want to apply for</label>
                      <select name="department_wanted">
                  <option value="-1" selected>Choice of Department</option>
                         <?php echo $options;?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Martial Status</label>
                     <select name="Martial">
                         <option value="-1" selected>Martial Status</option>
                         <option value="married">Unmarried</option>
                          <option value="married">Married</option>
                          <option value="Divorced">Divorced</option>
                         <option value="widowed">Widowed</option>
                     </select>
                </div>
                <div class="form-group">
                    <label>Student Type</label>
                     <select name="Student_type">
                       <option value="-1" selected>Student Type</option>
                       <option value="Full Time">Full Time</option>
                       <option value="Part Time">Part Time</option>
                     </select>
                </div>
                 <div class="wizard-buttons">
                    <button type="button" class="btn btn-next">Next</button>
                </div>
                
            </fieldset>
            <fieldset>
                <h4>Contact Information </h4>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" class="form-control"  name="email" placeholder="Enter Email Address" required="">
                </div>
                <div class="form-group">
                    <label>Mobile Number</label>
                    <input type="tel" name="mobile" class="form-control" placeholder="Enter mobile Number" required="" />
                </div>
                <div class="form-group">
                    <label>Present Address</label>
                    <input type="text" class="form-control" name="present" placeholder="Enter Present Address" required="">
                </div>
                <div class="form-group">
                    <label>Permanent Address</label>
                    <input type="text" class="form-control" name="permanent"  placeholder="Enter Permanent Address" required="">
                </div>
                <div class="form-group">
                    <label>District</label>
                    <input type="text" class="form-control" name="district"  placeholder="Enter District Name" required="">
                </div>
                <div class="form-group">
                    <label>Zip Code</label>
                    <input type="number" class="form-control" name="zipcode"  placeholder="Enter Zip Code" required="">
                </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>
            </fieldset>
            <fieldset>
                <h4>Basic educational info</h4>
                <div class="form-group">
                    <label>Last Educational Institution</label>
                    <input type="text" class="form-control" name="inst_name" placeholder="Enter Last Educational Institution" required="">
                </div>
                <div class="form-group">
                    <label>Last Academic Session</label>
                    <input type="text" class="form-control" name="last_session" placeholder="Enter Last Academic Session" required="">
                </div>
                <div class="form-group">
                    <label>Passing Year</label>
                    <input type="number" class="form-control" name="pass_year"  placeholder="Enter Passing Year" required="">
                </div>
                <div class="form-group">
                    <label>Undergraduate Department Name</label>
                    <input type="text" class="form-control" name="dept_name"  placeholder="Enter Department name" required="">
                </div>
                
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>
            </fieldset>
            <fieldset>
                    <h4>Input Additional Education info</h4>
                    <table class="table table-hover">
                       <tr>
                      <td>SSC Roll</td>
                      <td><input type="number" class="form-control"  name="sscroll" placeholder="Enter SSC Roll" required=""></td>
                      </tr>
                     <tr>
                      <td>SSC Passing Year</td>
                     <td><input type="number" class="form-control" name="pass_sscyear"  placeholder="Enter SSC year" required=""></td>
                    </tr>
                    <tr>
                   <td>SSC Institution</td>
                   <td><input type="text" class="form-control" name="ssc_institution"  placeholder="Enter SSC Institution" required=""></td>
                    </tr>
                  <tr>
                  <td>SSC GPA</td>
                  <td><input type="number" step="0.01" class="form-control" name="sscgpa"  placeholder="Enter SSC GPA" required=""></td>
                 </tr>

                  <tr>
                   <td>HSC Roll</td>
                 <td><input type="number" class="form-control"  name="hscroll" placeholder="Enter HSC Roll" required=""></td>
                 </tr>
                <tr>
                <td>HSC Passing Year</td>
              <td><input type="number" class="form-control" name="pass_hscyear"  placeholder="Enter HSC year" required=""></td>
              </tr>
               <tr>
               <td>HSC Institution</td>
               <td><input type="text" class="form-control" name="hsc_institution"  placeholder="Enter HSC Institution" required=""></td>
              </tr>
              <tr>
              <td>HSC GPA</td>
              <td><input type="number" step="0.01" class="form-control" name="hscgpa"  placeholder="Enter HSC GPA" required=""></td>
              </tr>

              <tr>
              <td>BSC Roll</td>
               <td><input type="number" class="form-control"  name="bscroll" placeholder="Enter BSC Roll" required=""></td>
              </tr>
              <tr>
              <td>BSC Passing Year</td>
               <td><input type="number" class="form-control" name="pass_bscyear"  placeholder="Enter BSC year" required=""></td>
              </tr>
              <tr>
              <td>BSC Institution</td>
             <td><input type="text" class="form-control" name="bsc_institution"  placeholder="Enter BSC Institution" required=""></td>
             </tr>
            <tr>
            <td>BSC CGPA</td>
            <td><input type="number" step="0.01" class="form-control" name="bscgpa"  placeholder="Enter BSC CGPA" required=""></td>
            </tr>

            </table>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>
            </fieldset>
			<fieldset>
			    <h4>Document upload</h4>
          <div class="form-group">
                    <label>Student Profile image UPLOAD</label>
                    <input type="file" name="profile_pic" id="profile_pic">
          </div>
			  <div class="form-group">
                    <label>SSC GRADESHEET UPLOAD</label>
                    <input type="file" name="sscgrade" id="sscgrade">
          </div>
			   <div class="form-group">
                    <label>HSC GRADESHEET UPLOAD</label>
                    <input type="file" name="hscgrade" id="hscgrade">
               </div>
			   <div class="form-group">
                    <label>BSC GRADESHEET UPLOAD</label>
                    <input type="file" name="bscgrade" id="bscgrade">
               </div>
			    <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>
			
			</fieldset>
            <fieldset>

                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="yes"> To the best of my knowledge all the information I entered is true
                </label>



                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>

            </fieldset>
            <fieldset>
                <div class="jumbotron text-center">
                <h1>Please click submit button to save your data</h1>
                </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="submit" name="save" class="btn btn-primary btn-submit">Submit</button>
                </div>
            </fieldset>
        </form>
    </div>
	<?php
	$db = new PDO("mysql:host=localhost;dbname=test","root","");
	   if(isset($_POST['save'])){
	$id = $_SESSION['id'];
			
	$studentname = $_POST['name'];
    $fathername=$_POST['fathername'];
    $mothername = $_POST['mothername'];
    $birthdate= $_POST['bday'];
    $blood=$_POST['Blood'];
    $nationality=$_POST['nationality'];
    $nationalid=$_POST['nationalid'];
    $program=$_POST['Program'];
    $stat1 = $db->prepare("insert into personal_info values(?,?,?,?,?,?,?,?,?)");
    $stat1->bindParam(1, $id);
    $stat1->bindParam(2, $studentname);
    $stat1->bindParam(3, $fathername);
    $stat1->bindParam(4, $mothername);
    $stat1->bindParam(5, $birthdate);
    $stat1->bindParam(6,$blood);
    $stat1->bindParam(7,$nationality);
    $stat1->bindParam(8,$nationalid);
    $stat1->bindParam(9,$program);
    $stat1->execute();
    $email = $_POST['email'];
    $mobile=$_POST['mobile'];
    $present = $_POST['present'];
    $district= $_POST['district'];
    $zipcode=$_POST['zipcode'];
    $stat2 = $db->prepare("insert into contact_info values(?,?,?,?,?,?)");
     $stat2->bindParam(1, $id);
     $stat2->bindParam(2, $email);
     $stat2->bindParam(3, $mobile);
     $stat2->bindParam(4, $present);
     $stat2->bindParam(5, $district);
     $stat2->bindParam(6, $zipcode);
    $stat2->execute();
     $inst_name = $_POST['inst_name'];
    $last_session=$_POST['last_session'];
    $pass_year = $_POST['pass_year'];
    $dept_name= $_POST['dept_name'];
    $stat3 = $db->prepare("insert into basic_educational_info values(?,?,?,?,?)");
    $stat3->bindParam(1, $id);
    $stat3->bindParam(2, $inst_name);
    $stat3->bindParam(3, $last_session);
    $stat3->bindParam(4, $pass_year);
    $stat3->bindParam(5, $dept_name);
    $stat3->execute();
     $sscroll = $_POST['sscroll'];
    $pass_sscyear=$_POST['pass_sscyear'];
    $ssc_institution = $_POST['ssc_institution'];
    $sscgpa= $_POST['sscgpa'];
     $hscroll = $_POST['hscroll'];
    $pass_hscyear=$_POST['pass_hscyear'];
    $hsc_institution = $_POST['hsc_institution'];
    $hscgpa= $_POST['hscgpa'];
     $bscroll = $_POST['bscroll'];
    $pass_bscyear=$_POST['pass_bscyear'];
    $bsc_institution = $_POST['bsc_institution'];
    $bscgpa= $_POST['bscgpa'];
     $stat4 = $db->prepare("insert into additional_educational_info values(?,?,?,?,?,?,?,?,?,?,?,?,? )");
    $stat4->bindParam(1, $id);
    $stat4->bindParam(2, $sscroll);
    $stat4->bindParam(3, $pass_sscyear);
    $stat4->bindParam(4, $ssc_institution);
    $stat4->bindParam(5, $sscgpa);
    $stat4->bindParam(6, $hscroll);
    $stat4->bindParam(7, $pass_hscyear);
    $stat4->bindParam(8, $hsc_institution);
    $stat4->bindParam(9, $hscgpa);
     $stat4->bindParam(10, $bscroll);
    $stat4->bindParam(11, $pass_bscyear);
    $stat4->bindParam(12, $bsc_institution);
    $stat4->bindParam(13, $bscgpa);

    $stat4->execute();


     $size5=$_FILES['profile_pic']['size'];
      $temp5=$_FILES['profile_pic']['tmp_name'];
     $type5=$_FILES['profile_pic']['type'];
     $profile_name5=$_FILES['profile_pic']['name'];
     if($profile_name5=="")
     {
       echo "<script>alert('please select a image!')</script>";
       exit();
     }
     elseif(($type5=="image/jpeg")|| ($type5=="image/png") || ($type5=="image/jpg") ||($type5=="image/gif"))
     {
       move_uploaded_file($temp5,"profile_images/$profile_name5");
     }
     else{
       echo "<script>alert('Invalid format!')</script>";
     }
	
	     $size=$_FILES['sscgrade']['size'];
	    $temp=$_FILES['sscgrade']['tmp_name'];
		 $type=$_FILES['sscgrade']['type'];
		 $profile_name=$_FILES['sscgrade']['name'];
		 if($profile_name=="")
		 {
			 echo "<script>alert('please select a image!')</script>";
			 exit();
		 }
		 elseif(($type=="image/jpeg")|| ($type=="image/png") || ($type=="image/jpg") ||($type=="image/gif"))
		 {
			 move_uploaded_file($temp,"profile_images/$profile_name");
		 }
		 else{
			 echo "<script>alert('Invalid format!')</script>";
		 }
		 
		  $size1=$_FILES['hscgrade']['size'];
	    $temp1=$_FILES['hscgrade']['tmp_name'];
		 $type1=$_FILES['hscgrade']['type'];
		 $profile_name1=$_FILES['hscgrade']['name'];
		 if($profile_name1=="")
		 {
			 echo "<script>alert('please select a image!')</script>";
			 exit();
		 }
		 elseif(($type1=="image/jpeg")|| ($type1=="image/png") || ($type1=="image/jpg") ||($type1=="image/gif"))
		 {
			 move_uploaded_file($temp1,"profile_images/$profile_name1");
		 }
		 else{
			 echo "<script>alert('Invalid format!')</script>";
		 }
		 
		  $size2=$_FILES['bscgrade']['size'];
	    $temp2=$_FILES['bscgrade']['tmp_name'];
		 $type2=$_FILES['bscgrade']['type'];
		 $profile_name2=$_FILES['bscgrade']['name'];
		 if($profile_name2=="")
		 {
			 echo "<script>alert('please select a image!')</script>";
			 exit();
		 }
		 elseif(($type2=="image/jpeg")|| ($type2=="image/png") || ($type2=="image/jpg") ||($type2=="image/gif"))
		 {
			 move_uploaded_file($temp2,"profile_images/$profile_name2");
		 }
		 else{
			 echo "<script>alert('Invalid format!')</script>";
		 }
      $stat5 = $db->prepare("insert into documents values(?,?,?,?,? )");
      $stat5->bindParam(1, $id);
       $stat5->bindParam(2, $profile_name5);
      $stat5->bindParam(3, $profile_name);
      $stat5->bindParam(4, $profile_name1);
      $stat5->bindParam(5, $profile_name2);
	   $stat5->execute();
     $dept_want = $_POST['department_wanted'];
     $stat6=$db->prepare("insert into department_wanted values(?,?,?)");
     $stat6->bindParam(1,$id);
     $stat6->bindParam(2,$studentname);
     $stat6->bindParam(3,$dept_want);
     $stat6->execute();

      $stat7=$db->prepare("insert into applied_stats values(?,?,'Pending')");
     $stat7->bindParam(1,$id);
     $stat7->bindParam(2,$studentname);
    // $stat7->bindParam(3,'Pending');
     $stat7->execute();


	   
	   
	   $conn=mysqli_connect("localhost","root","","test");
	   $sql = "SELECT * FROM contact_info where contact_id= '$id'";
       $result = mysqli_query($conn, $sql);
	   $row = mysqli_fetch_assoc($result);
	   $sql1 = "SELECT * FROM  personal_info where id= '$id'";
       $result1 = mysqli_query($conn, $sql1);
	   $row1 = mysqli_fetch_assoc($result1);
	   
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
  
  $mail->addAddress($row["email"]);
  
  $mail->isHTML(true);
 
  $mail->Subject = "test mail";
  $mail->Body = "Hey ".$row1["studentname"]." thanks for registering,now you can complete your payment.";
  $mail->AltBody = "This is the plain text version of the email content";
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   echo "Message has been received and data inserted successfully";
  }
	  
	}
	
	?>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>