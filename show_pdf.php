<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
session_start();
 if($_SESSION['login']!==true){
        header('location:login.php');
  }
function fetch_data_table()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "test");  
      $sql = "SELECT a.studentname,a.blood,a.programtype,b.email,b.mobile,c.und_dept_name,d.ssc_gpa,d.hsc_gpa,d.bsc_institution,d.bsc_cgpa from personal_info a,contact_info b,basic_educational_info c,additional_educational_info d where a.id=b.contact_id and b.contact_id=c.basic_educational_id and c.basic_educational_id=d.additional_educational_id";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["studentname"].'</td>  
                          <td>'.$row["blood"].'</td>  
                          <td>'.$row["programtype"].'</td>  
                          <td>'.$row["email"].'</td>  
                          <td>'.$row["mobile"].'</td>
                           <td>'.$row["und_dept_name"].'</td>  
                          <td>'.$row["ssc_gpa"].'</td>  
                          <td>'.$row["hsc_gpa"].'</td>  
                          <td>'.$row["bsc_institution"].'</td>
                           <td>'.$row["bsc_cgpa"].'</td>   						  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 
     require_once('pdf/tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("View Data in pdf");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 8);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h3 align="center">Showing important data</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
                <th>Name</th>
                    <th>Blood</th>
                    <th>Programtype</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Department name</th>
					 <th>SSC GPA</th>
					   <th>HSC GPA</th>
					    <th>BSC institution</th>
						 <th>BSC CGPA</th>
           </tr>  
      ';	  
      $content .=  fetch_data_table();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);
      ob_end_clean();	  
      $obj_pdf->Output('sample.pdf', 'I');  

?>