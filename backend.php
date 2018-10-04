<?php
$user = "root";
$pass = "";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
$limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 4;
$page  = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
$links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
$query = "SELECT a.studentname,a.blood,a.programtype,b.email,b.mobile,c.und_dept_name,d.ssc_institution,d.ssc_gpa,d.hsc_institution,d.hsc_gpa,d.bsc_institution,d.bsc_cgpa,e.bscgrade,p.amount,p.status from personal_info a,contact_info b,basic_educational_info c,additional_educational_info d,documents e,transactions p where a.id=b.contact_id and b.contact_id=c.basic_educational_id and c.basic_educational_id=d.additional_educational_id and d.additional_educational_id=e.document_id and e.document_id=p.customer_id";

require_once 'paginator.class.php';
$paginator  = new Paginator($dbh, $query);
$results    = $paginator->getData($limit, $page);
?>

