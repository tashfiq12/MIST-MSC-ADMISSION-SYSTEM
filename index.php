<?php

include "db.php";
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);

define('pageclassconst', TRUE);
include_once 'cms/admin/pages/pageClass.php';
$pageclass=new pagesClass();
$navdetails=$pageclass->listPages();
$id=$_GET["id"];
if($id=="")
{
  $id='1';
}
$pagedetails=$pageclass->particularPage($id);

?>


<!DOCTYPE html>
<html lang="en">
<head>

     <title>Website</title>
   <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css2/bootstrap.min.css">
     <link rel="stylesheet" href="css2/font-awesome.min.css">
     <link rel="stylesheet" href="css2/animate.css">
     <link rel="stylesheet" href="css2/owl.carousel.css">
     <link rel="stylesheet" href="css2/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css2/tooplate-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- HEADER 
     <header>
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-5">
                         <p>Welcome to a Professional Health Care</p>
                    </div>
                         
                    <div class="col-md-8 col-sm-7 text-align-right">
                         <span class="phone-icon"><i class="fa fa-phone"></i> 010-060-0160</span>
                         <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 6:00 AM - 10:00 PM (Mon-Fri)</span>
                         <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">info@company.com</a></span>
                    </div>

               </div>
          </div>
     </header>
   -->


     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                          <?php
                      foreach ($navdetails as $value) {
                      echo '<li><a class="smoothScroll" href="?id='.$value["ID"].'">'.$value["pagename"].'</a></li>';
                      }

                     ?>
                    </ul>
          <ul class="nav navbar-nav navbar-right">
             <li class="appointment-btn"><a href="login.php">SignUp</a></li>
          </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item item-first">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>MIST 360 DEGREE</h3>
                                           
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-second">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Graduation Ceremony</h3>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-third">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Beautiful MIST</h3>
                                   
                                        </div>
                                   </div>
                              </div>
                         </div>

               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.6s"><?php echo $pagedetails["pagetitle"]; ?></h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <p>
                                        <?php echo $pagedetails["pagedetails"];?>  

                                   </p>
                              </div>
                     
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- GOOGLE MAP -->
     <section id="google-map">
     <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
  -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.4647051535976!2d90.35586941423452!3d23.837626791356985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1410136a4dd%3A0x7a2bb9d68ea2166e!2sMilitary+Institute+of+Science+and+Technology!5e0!3m2!1sen!2sbd!4v1536521464965" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
     </section>           


     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
     

                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i> +88-02-9013166</p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#">info@mist.ac.bd</a></p>
                              </div>
                         </div>
                    </div>


                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                                   <p>Sunday - Thursday <span>08:00 AM - 03:00 PM</span></p>
                                   <p>Friday,Saturday <span>Closed</span></p>
                              </div> 

                              <ul class="social-icon">
                                   <li><a href="https://www.facebook.com/mist.ac.bd/" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                              <div class="copyright-text"> 
                                    <p><?php echo date("Y"); ?> &copy; <a href="http://www.mist.ac.bd" style="color: black;">MIST</a> All rights reserved.</p>
                                   
                                  <p>Developed, Designed & Powered by <a href="https://cse.mist.ac.bd/" target="_blank"> CSE DEPARTMENT,MIST</a></p>
                              </div>
                         </div>

                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn"> 
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>   
                    </div>
                    
               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="js2/jquery.js"></script>
     <script src="js2/bootstrap.min.js"></script>
     <script src="js2/jquery.sticky.js"></script>
     <script src="js2/jquery.stellar.min.js"></script>
     <script src="js2/wow.min.js"></script>
     <script src="js2/smoothscroll.js"></script>
     <script src="js2/owl.carousel.min.js"></script>
     <script src="js2/custom.js"></script>

</body>
</html>