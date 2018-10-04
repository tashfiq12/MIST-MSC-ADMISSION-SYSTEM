
<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
session_start();
 if($_SESSION['login']!==true){
        header('location:../../login.php');
  }
include_once './inc/header.php';

define('pageclassconst', TRUE);
include_once 'pages/pageClass.php';
$pageClass=new pagesClass();
$alert="";

if($_GET["did"]!="")
{
	$did=$_GET["did"];
	echo "Are you sure you want to delete <a href='listpage.php?did=$did&status=Yes'>Yes</a> <a href='listpage.php'>No</a>";
}
    if($_GET["did"]!="" && $_GET["status"]=="Yes")
	{
		$alert=$pageClass->deletePage($_GET["did"]);
	}
	$pageList=$pageClass->listPages();


?>






    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-8 col-md-offset-2 main">
          <h1 class="page-header"> Page Lists</h1>

    
      <?php echo $alert;?>
         <table class="table table-striped table-bordered">
       	<thead>
       		<tr>
       			<th>Id</th>
       			<th>Name</th>
       			<th>Title</th>
       			<th>Action</th>

       		</tr>

       	</thead>
           <tbody>
                  <?php
                  $i=1;
                    if(count($pageList)){
                        foreach ($pageList as $value) {
                            echo '<tr>
                                <td>'.$value["ID"].'</td>
                                <td>'.$value["pagename"].'</td>
                                <td>'.$value["pagetitle"].'</td>
                                <td><a class="btn btn-group btn-warning btn-md" href="edit-pages.php?id='.$value["ID"].'">Edit</a>
                                &nbsp; <a class="btn btn-group btn-danger btn-md" href="listpage.php?did='.$value["ID"].'">Delete</a>
                               </td>
                                </tr>';
                            $i++;
                        }
                    }
                  ?>
              </tbody>


       </table>
     </div>
   </div>


    </div> <!-- /container -->

  </body>
</html>