<?php

include "action.php";
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
 session_start();
 if($_SESSION['login']!==true){
        header('location:../login.php');
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
<?php
//php 7
$id = $_SESSION['id'];
$where = array("id"=>$id);
$where1 = array("contact_id"=>$id);
$where2 = array("basic_educational_id"=>$id);
$where3 = array("additional_educational_id"=>$id);
$where4 = array("document_id"=>$id);
$row = $obj->select_record("personal_info",$where);
$row1 = $obj->select_record("contact_info",$where1);
$row2 = $obj->select_record("basic_educational_info",$where2);
$row3 = $obj->select_record("additional_educational_info",$where3);
$row4 = $obj->select_record("documents",$where4);
?>
<div class="container">
        <form action="action.php" method="POST" enctype="multipart/form-data">
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
                   <input type="text" class="form-control" name="name" value="<?php echo $row["studentname"]; ?>" placeholder="Enter Student name" required="">
                </div>
                 <div class="form-group">
                    <label>Student Name in Bangla (<a target="_blank" href="http://www.google.com/intl/bn/inputtools/try/">Try online</a>)</label>
                   <input type="text" class="form-control"  name="banglaname" placeholder="Enter Student's Bangla name" required="">
                </div>
                <div class="form-group">
                    <label>Father Name</label>
                  <input type="text" class="form-control" name="fathername" value="<?php echo $row["fathername"]; ?>" placeholder="Enter father name" required="">
                </div>
                 <div class="form-group">
                    <label>Mother name</label>
                  <input type="text" class="form-control" name="mothername" value="<?php echo $row["mothername"]; ?>" placeholder="Enter mother's name" required="">
                </div>
                <div class="form-group">
                    <label>Date of birth</label>
                  <input type="date" class="form-control" name="bday" value="<?php echo date("d-m-Y",strtotime($row["birthdate"])) ?>" required="">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                     <input type="radio" name="gender" value="male" size="10">Male
                    <input type="radio" name="gender" value="Female" size="10">Female
                </div>
                <div class="form-group">
                    <label>Blood</label>
                     <select name="Blood">
                    <option value="<?php echo $row["blood"]; ?>"  selected></option>
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
                    <input type="text" class="form-control" name="nationality" value="<?php echo $row["nationality"]; ?>" placeholder="Enter Nationality"  required="">
                </div>
                 <div class="form-group">
                    <label>NationalID</label>
                    <input type="text" class="form-control" name="nationalid" value="<?php echo $row["nationalid"]; ?>" placeholder="Enter Nationalid" required="">
                </div>
                <div class="form-group">
                    <label>Program Type</label>
                      <select name="Program">
                  <option value="<?php echo $row["programtype"] ?>" selected>Choice of Program</option>
                 <option value="M.Sc.Engg">M.Sc.Engg</option>
                 <option value="M.Engg">M.Engg</option>
                 <option value="Ph.D">Ph.D</option>
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
                    <input type="email" class="form-control"  name="email" value="<?php echo $row1["email"]; ?>" placeholder="Enter Email Address" required="">
                </div>
                <div class="form-group">
                    <label>Mobile Number</label>
                    <input type="tel" name="mobile" class="form-control" value="<?php echo $row1["mobile"]; ?>" placeholder="Enter mobile Number" required="" />
                </div>
                <div class="form-group">
                    <label>Present Address</label>
                    <input type="text" class="form-control" name="present" value="<?php echo $row1["present_address"]; ?>" placeholder="Enter Present Address" required="">
                </div>
                <div class="form-group">
                    <label>Permanent Address</label>
                    <input type="text" class="form-control" name="permanent" value="<?php echo $row1["present_address"]; ?>"  placeholder="Enter Permanent Address" required="">
                </div>
                <div class="form-group">
                    <label>District</label>
                    <input type="text" class="form-control" name="district" value="<?php echo $row1["district"]; ?>"  placeholder="Enter District Name" required="">
                </div>
                <div class="form-group">
                    <label>Zip Code</label>
                    <input type="number" class="form-control" name="zipcode" value="<?php echo $row1["zipcode"]; ?>"  placeholder="Enter Zip Code" required="">
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
                    <input type="text" class="form-control" name="inst_name" value="<?php echo $row2["last_edu_institution"]; ?>" placeholder="Enter Last Educational Institution" required="">
                </div>
                <div class="form-group">
                    <label>Last Academic Session</label>
                    <input type="text" class="form-control" name="last_session" value="<?php echo $row2["last_aca_session"]; ?>" placeholder="Enter Last Academic Session" required="">
                </div>
                <div class="form-group">
                    <label>Passing Year</label>
                    <input type="number" class="form-control" name="pass_year" value="<?php echo $row2["passing_year"]; ?>"  placeholder="Enter Passing Year" required="">
                </div>
                <div class="form-group">
                    <label>Undergraduate Department Name</label>
                    <input type="text" class="form-control" name="dept_name" value="<?php echo $row2["und_dept_name"]; ?>"  placeholder="Enter Department name" required="">
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
                      <td><input type="number" class="form-control"  name="sscroll" value="<?php echo $row3["ssc_roll"]; ?>" placeholder="Enter SSC Roll" required=""></td>
                      </tr>
                     <tr>
                      <td>SSC Passing Year</td>
                     <td><input type="number" class="form-control" name="pass_sscyear" value="<?php echo $row3["ssc_pass_year"]; ?>"  placeholder="Enter SSC year" required=""></td>
                    </tr>
                    <tr>
                   <td>SSC Institution</td>
                   <td><input type="text" class="form-control" name="ssc_institution" value="<?php echo $row3["ssc_institution"]; ?>"  placeholder="Enter SSC Institution" required=""></td>
                    </tr>
                  <tr>
                  <td>SSC GPA</td>
                  <td><input type="number" step="0.01" class="form-control" name="sscgpa" value="<?php echo $row3["ssc_gpa"]; ?>"  placeholder="Enter SSC GPA" required=""></td>
                 </tr>

                  <tr>
                   <td>HSC Roll</td>
                 <td><input type="number" class="form-control"  name="hscroll" value="<?php echo $row3["hsc_roll"]; ?>" placeholder="Enter HSC Roll" required=""></td>
                 </tr>
                <tr>
                <td>HSC Passing Year</td>
              <td><input type="number" class="form-control" name="pass_hscyear" value="<?php echo $row3["hsc_pass_year"]; ?>"  placeholder="Enter HSC year" required=""></td>
              </tr>
               <tr>
               <td>HSC Institution</td>
               <td><input type="text" class="form-control" name="hsc_institution" value="<?php echo $row3["hsc_institution"]; ?>"  placeholder="Enter HSC Institution" required=""></td>
              </tr>
              <tr>
              <td>HSC GPA</td>
              <td><input type="number" step="0.01" class="form-control" name="hscgpa" value="<?php echo $row3["hsc_gpa"]; ?>"  placeholder="Enter HSC GPA" required=""></td>
              </tr>

              <tr>
              <td>BSC Roll</td>
               <td><input type="number" class="form-control"  name="bscroll"  value="<?php echo $row3["bsc_roll"]; ?>" placeholder="Enter BSC Roll" required=""></td>
              </tr>
              <tr>
              <td>BSC Passing Year</td>
               <td><input type="number" class="form-control" name="pass_bscyear" value="<?php echo $row3["bsc_pass_year"]; ?>"  placeholder="Enter BSC year" required=""></td>
              </tr>
              <tr>
              <td>BSC Institution</td>
             <td><input type="text" class="form-control" name="bsc_institution" value="<?php echo $row3["bsc_institution"]; ?>"  placeholder="Enter BSC Institution" required=""></td>
             </tr>
            <tr>
            <td>BSC CGPA</td>
            <td><input type="number" step="0.01" class="form-control" name="bscgpa" value="<?php echo $row3["bsc_cgpa"]; ?>"  placeholder="Enter BSC CGPA" required=""></td>
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
                    <label>SSC GRADESHEET UPLOAD</label>
                    <input type="file" name="sscgrade"  id="sscgrade">
               </div>
			   <div class="form-group">
                    <label>HSC GRADESHEET UPLOAD</label>
                    <input type="file" name="hscgrade"  id="hscgrade">
               </div>
			   <div class="form-group">
                    <label>BSC GRADESHEET UPLOAD</label>
                    <input type="file" name="bscgrade"  id="bscgrade">
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
                <h1>Please click update button to update your data</h1>
                </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="submit" name="edit" class="btn btn-primary btn-submit">UPDATE</button>
                </div>
            </fieldset>
        </form>
    </div>
<?php
?>
 <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>