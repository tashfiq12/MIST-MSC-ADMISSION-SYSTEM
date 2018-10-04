<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
session_start();
 if($_SESSION['login']!==true){
        header('location:../../login.php');
  }
include_once './inc/header.php';
include_once 'messages/alertClass.php';
$alert="";
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
} else {
        unset($validated_data['submit']);
        define('pageclassconst', TRUE);
        include 'pages/pageClass.php';
        $pageClass=new pagesClass();
        $alert=$pageClass->addPage($validated_data);
}

}





?>






    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-8 col-md-offset-2 main">
          <h1 class="page-header">Add Pages</h1>
       
      <form method="post" action="">
        <?php echo $alert;?>
        <h3>Addpages</h3>
        <div class="form-group">
    <label for="exampleInputEmail1">Page Name</label>
    <input type="text" class="form-control" name="pagename" placeholder="Pagename">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Page title</label>
    <input type="text" class="form-control" name="pagetitle" placeholder="Pagetitle">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Page Details</label>
    <textarea class="form-control" rows="15" cols="80" id="summernote" name="pagedetails" > </textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
   </div>
   </div>

    </div> <!-- /container -->
  


  </body>
</html>


