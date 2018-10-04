<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
 
include_once './inc/header.php';
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
include_once 'messages/alertClass.php';
$alert="";
define('pageclassconst', TRUE);
    include 'pages/pageClass.php';
   $pageClass=new pagesClass();
if(isset($_POST["submit"])){


  include_once 'functions/gump.class.php';
   $gump = new GUMP();
    $gump->validation_rules(array(
    
        'pagename'    => 'required',
        'pagetitle'    => 'required',
        'pagedetails'   => 'required'
));
      $gump->filter_rules(array(
    'pagename'    => 'trim|sanitize_string',
        'pagetitle'    => 'trim|sanitize_string',
        'pagedetails'    => 'trim|sanitize_string'
));
      $validated_data = $gump->run($_POST);
    if($validated_data === false) {
    $alert=$message->getAlert($gump->get_readable_errors(true),"error");
} 
else {
        unset($validated_data['submit']);
         $alert=$pageClass->updatePage($validated_data,$_GET["id"]);
}

  

}
   $id=$_GET["id"];
  $pageDetails=$pageClass->particularPage($id);
 



?>







    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-8 col-md-offset-2 main">
          <h1 class="page-header">Edit Pages</h1>
      <form method="post" action="<?php echo $_SERVER["PHP_SELF"]."?id=$id" ?>" enctype="multipart/form-data">
        <?php echo $alert;?>
        <h3>Editpages</h3>
        <div class="form-group">
    <label for="exampleInputEmail1">Page Name</label>
    <input type="text" class="form-control" name="pagename" value="<?php echo  $pageDetails["pagename"];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Page title</label>
    <input type="text" class="form-control" name="pagetitle" value="<?php echo  $pageDetails["pagetitle"];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Page Details</label>
    <textarea class="form-control" rows="15" cols="80" id="summernote" name="pagedetails"><?php echo  $pageDetails["pagedetails"];?> </textarea>
  </div>
   <input type="submit" id="submit" name="submit" value="Update Page" class="btn btn-primary">
</form>
</div>
</div>

    </div> <!-- /container -->


  </body>
</html>
