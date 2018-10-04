<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
session_start();
 if($_SESSION['login']!==true){
        header('location:login.php');
  }
include "backend.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>PHP Pagination</title>
    <link href="css/mystyle4.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <h1 style="text-align:center">Important data</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Blood</th>
                    <th>Programtype</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Department name</th>
                    <th>SSC institution</th>
					 <th>SSC GPA</th>
					  <th>HSC institution</th>
					   <th>HSC GPA</th>
					    <th>BSC institution</th>
						 <th>BSC CGPA</th>
						  <th>BSC Certificate</th>
						  <th>Payment Amount</th>
						  <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
                <?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
                        <tr>
                                <td><?php echo $results->data[$i]['studentname']; ?></td>
                                <td><?php echo $results->data[$i]['blood']; ?></td>
                                <td><?php echo $results->data[$i]['programtype']; ?></td>
                                <td><?php echo $results->data[$i]['email']; ?></td>
                                <td><?php echo $results->data[$i]['mobile']; ?></td>
                                <td><?php echo $results->data[$i]['und_dept_name']; ?></td>
                                <td><?php echo $results->data[$i]['ssc_institution']; ?></td>
								
								<td><?php echo $results->data[$i]['ssc_gpa']; ?></td>
								<td><?php echo $results->data[$i]['hsc_institution']; ?></td>
								<td><?php echo $results->data[$i]['hsc_gpa']; ?></td>
								<td><?php echo $results->data[$i]['bsc_institution']; ?></td>
								<td><?php echo $results->data[$i]['bsc_cgpa']; ?></td>
								<td>
								 <img src="form-wizard/profile_images/<?php echo $results->data[$i]['bscgrade']; ?>" style="width:80px; height:60px;">
								</td>
								<td><?php echo $results->data[$i]['amount']; ?></td>
								<td><?php echo $results->data[$i]['status']; ?></td>
                        </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        <?php echo $paginator->createLinks($links); ?> 
    </div>
</body>
</html>