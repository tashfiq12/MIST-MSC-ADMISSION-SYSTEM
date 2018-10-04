<?php
  $con=mysqli_connect("localhost","root","","test");
 include "db1.php";
 session_start();

class DataOperation extends Database
{
	
public function fetch_record($table){
$sql = "SELECT * FROM ".$table;
$array = array();
$query = mysqli_query($this->con,$sql);
while($row = mysqli_fetch_assoc($query)){
$array[] = $row;
}
return $array;
}

public function select_record($table,$where){
$sql = "";
$condition = "";
foreach ($where as $key => $value) {
// id = '5' AND m_name = 'something'
$condition .= $key . "='" . $value . "' AND ";
}
$condition = substr($condition, 0, -5);
$sql .= "SELECT * FROM ".$table." WHERE ".$condition;
$query = mysqli_query($this->con,$sql);
$row = mysqli_fetch_array($query);
return $row;

}
public function update_record($table,$where,$fields){
$sql = "";
$condition = "";
foreach ($where as $key => $value) {
// id = '5' AND m_name = 'something'
$condition .= $key . "='" . $value . "' AND ";
}
$condition = substr($condition, 0, -5);
foreach ($fields as $key => $value) {
//UPDATE table SET m_name = '' , qty = '' WHERE id = '';
$sql .= $key . "='".$value."', ";
}
$sql = substr($sql, 0,-2);
$sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
if(mysqli_query($this->con,$sql)){
return true;
}
}
}

$obj = new DataOperation;
$obj1 = new DataOperation;



if(isset($_POST["edit"])){
$id = $_SESSION['id'];
$where = array("id"=>$id);
$where1 = array("contact_id"=>$id);
$where2 = array("basic_educational_id"=>$id);
$where3 = array("additional_educational_id"=>$id);
$where4 = array("document_id"=>$id);
$myArray = array(
"studentname" => $_POST["name"],
"fathername" => $_POST["fathername"],
"mothername" => $_POST["mothername"],
"birthdate" => $_POST["bday"],
"blood" => $_POST["Blood"],
"nationality" => $_POST["nationality"],
"nationalid" => $_POST["nationalid"],
"programtype" => $_POST["Program"]
);
$myArray1 = array(
"email" => $_POST["email"],
"mobile" => $_POST["mobile"] ,
"present_address" => $_POST["present"],
"district" => $_POST["district"],
"zipcode" => $_POST["zipcode"]
);
$myArray2 = array(
"last_edu_institution" => $_POST["inst_name"],
"last_aca_session" => $_POST["last_session"] ,
"passing_year" => $_POST["pass_year"],
"und_dept_name" => $_POST["dept_name"]
);
$myArray3 = array(
"ssc_roll" => $_POST["sscroll"],
"ssc_pass_year" => $_POST["pass_sscyear"] ,
"ssc_institution" => $_POST["ssc_institution"],
"ssc_gpa" => $_POST["sscgpa"],
"hsc_roll" => $_POST["hscroll"],
"hsc_pass_year" => $_POST["pass_hscyear"] ,
"hsc_institution" => $_POST["hsc_institution"],
"hsc_gpa" => $_POST["hscgpa"],
"bsc_roll" => $_POST["bscroll"],
"bsc_pass_year" => $_POST["pass_bscyear"],
"bsc_institution" => $_POST["bsc_institution"],
"bsc_cgpa" => $_POST["bscgpa"]
);
 
 /*$query=mysqli_query($con,"select * from documents where document_id= '$id'");
 $row=mysqli_fetch_assoc($query);
  $old_image1=$row['sscgrade'];
  if(isset($_FILES['sscgrade']['name']) && ($_FILES['sscgrade']['name']!=""))
	   {
		    $size1=$_FILES['sscgrade']['size'];
	       $temp1=$_FILES['sscgrade']['tmp_name'];
		    $type1=$_FILES['sscgrade']['type'];
		    $profile_name1=$_FILES['sscgrade']['name'];
			//1st delete old file from folder
			unlink("profile_images/$old_image1");
		
			move_uploaded_file($temp1,"profile_images/$profile_name1");
	   }
	   else{
		   $profile_name1=$old_image1;
	   }
	 $old_image2=$row['hscgrade'];
  if(isset($_FILES['hscgrade']['name']) && ($_FILES['hscgrade']['name']!=""))
	   {
		    $size2=$_FILES['hscgrade']['size'];
	       $temp2=$_FILES['hscgrade']['tmp_name'];
		    $type2=$_FILES['hscgrade']['type'];
		    $profile_name2=$_FILES['hscgrade']['name'];
			//1st delete old file from folder
			unlink("profile_images/$old_image2");
		
			move_uploaded_file($temp2,"profile_images/$profile_name2");
	   }
	   else{
		   $profile_name2=$old_image2;
	   }
	   
	   $old_image3=$row['bscgrade'];
  if(isset($_FILES['bscgrade']['name']) && ($_FILES['bscgrade']['name']!=""))
	   {
		    $size3=$_FILES['bscgrade']['size'];
	       $temp3=$_FILES['bscgrade']['tmp_name'];
		    $type3=$_FILES['bscgrade']['type'];
		    $profile_name3=$_FILES['bscgrade']['name'];
			//1st delete old file from folder
			unlink("profile_images/$old_image3");
		
			move_uploaded_file($temp3,"profile_images/$profile_name3");
	   }
	   else{
		   $profile_name3=$old_image3;
	   }
   $myArray4 = array(
"sscgrade" => $profile_name1,
"hscgrade" => $profile_name2 ,
"bscgrade" => $profile_name3
);*/
if($obj->update_record("personal_info",$where,$myArray) && $obj->update_record("contact_info",$where1,$myArray1) && $obj->update_record("basic_educational_info",$where2,$myArray2) && $obj->update_record("additional_educational_info",$where3,$myArray3)){
   
    header("location:update.php?msg=Record Updated Successfully");
}
else{
	echo "error in updating";
}

}
?>