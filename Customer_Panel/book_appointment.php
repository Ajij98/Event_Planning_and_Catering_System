<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>



 <!-- Select Event Planner Details -->
 <?php

   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['company_id']))
   {
     $company_id = $_GET['company_id'];

     $sql     = "SELECT * FROM tb_event_planner WHERE event_planner_id = $company_id";

     $result  = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {  
         $event_planner_id  = $getData['event_planner_id'];
         $event_panner_code = $getData['event_panner_code'];
         $company_name      = $getData['company_name'];
         $contact_number    = $getData['contact_number'];
         $company_address   = $getData['company_address'];
         $company_owner   = $getData['added_by'];
     }
   }
  ?>



  <!-- Book New Appointment (Event/Catering) Section -->
 <?php
   $user_name = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['submit']))
   {    
         $booking_code    = rand(100000, 999999);
         $customer_name   = $_POST['customer_name'];
         $email           = $_POST['email'];
         $phone           = $_POST['phone'];
         $address         = $_POST['address'];
         $event_name      = $_POST['event_name'];
         $service_details = $_POST['service_details'];
         $event_date      = $_POST['event_date'];
         $event_time      = $_POST['event_time'];
         $company_id      = $_POST['company_id'];
         $company_name    = $_POST['company_name'];
         $company_code    = $_POST['company_code'];
         $contact_number  = $_POST['contact_number'];
         $company_address = $_POST['company_address'];
         $customer_msg    = $_POST['customer_msg'];
         $booked_by       = $user_name;

         $sql = "INSERT INTO tb_event_catering_booking(booking_code,customer_name,email,phone,address,event_name,service_details,event_date,event_time,company_id,company_name,company_code,contact_number,company_address,customer_msg,booked_by,company_owner,entry_time)values('$booking_code','$customer_name','$email','$phone','$address','$event_name','$service_details','$event_date','$event_time','$company_id','$company_name','$company_code','$contact_number','$company_address','$customer_msg','$booked_by','$company_owner','$current_datetime')";
         
         $insert_row = $db->insert($sql);

         if($insert_row)
         {
           ?>

           <script type="text/javascript">
             window.alert("Booking details added successfully. Please pay advance to verify your booking. Thank You!");
             window.location='event_planning_details.php?event_planner_id=<?php echo $event_planner_id; ?>';
           </script>

          <?php
         }
         else 
         {
           $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong! Data not added.</div><br />';
           echo $msg;
           return false;
         }
   }

  ?>







<!DOCTYPE html>
<html lang="en">


<!-- molla/index-4.html  22 Nov 2019 09:53:08 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Divine Planners - Book Appointment</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/icons/lavender.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/lavender.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icons/lavender.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/icons/lavender.png" color="#666666">
    <link rel="shortcut icon" href="assets/icons/lavender.png">

    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-4.css">
    <link rel="stylesheet" href="assets/css/demos/demo-4.css">

    <!-- Fontawsome (Version-4.7.0)-->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">


    <!-- Google Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300&display=swap" rel="stylesheet">

    <!-- Extra CSS and JS (For Modal Image) -->
    <link rel="stylesheet" type="text/css" href="assets/extra_css/modal_image.css">

    <!-- Summernote Plugin File (Only js without bootstrap)-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    

</head>

<body>
    <div class="page-wrapper">
        <header class="header header-2">
            <div class="header-top py-3" style="background-color: #86A0B6;">
                <div class="container">
                    <div class="header-left">
                        <a href="tel:#" style="color: white;"><i class="fa fa-phone fa-fw"></i> (+88) 01852-484588</a>
                        <a href="#" class="ml-4" style="color: white;"><i class="fa fa-envelope fa-fw"></i> divineplanners@gmail.com</a>
                        <a href="#" class="ml-4" style="color: white;"><i class="fa fa-map-marker fa-fw"></i> O. R. Nizam Road, JEC, Chattogram</a>
                    </div><!-- End .header-left -->

                    <div class="header-right">

                        <ul class="top-menu">
                            <li>
                                <a href="#" style="color: white;">Links</a>
                                <ul>
                                    <li class="ml-4 mr-2">
                                       <a href="#" title="facebook" style="color: white;"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="ml-4 mr-2">
                                        <a href="#" title="twitter" style="color: white;"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="ml-4 mr-2">
                                        <a href="#" title="instagram" style="color: white;"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <li class="ml-4 mr-2">
                                        <a href="#" title="youtube" style="color: white;"><i class="fa fa-youtube-play"></i></a>
                                    </li>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="index.php" class="logo ml-4 my-0">
                          <img class="d-inline mb-2" src="assets/nav_logo/lavender.png" width="35" height="35">
                          <h4 class="mt-0 mb-0 py-0 d-inline" style="font-family: 'Lobster', cursive; font-size: 28px; color: #86A0B6;"><span class="text-dark">Divine</span> Planners</h4>
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="#event_planners">Event Planner</a>
                                </li>
                                <li>
                                    <a href="#catering_services">Catering Service</a>
                                </li>
                                <li>
                                    <a href="#">About Us</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                                <li>
                                    <a onclick="return confirm('Sure to logout?')" href="logout_customer.php">Logout</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <a href="dashboard.php" class="btn btn-round py-2 px-0" style="background-color: #86A0B6; color: white;">My Account</a>
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="event_planning_details.php?event_planner_id=<?php echo $event_planner_id; ?>">Event Planning Details</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Book Appointment</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">

                          <div class="col-9 m-auto shadow px- py-4" style="border-radius: 5px; border-top: 1px solid #86A0B6;">

                            <h6 style="color: #86A0B6;">Book Appointment</h6><hr class="mt-0 mb-1">

                            <form class="px-4 py-4" action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <label>Your Full Name *</label>
                                      <input type="text" name="customer_name" class="form-control" required>
                                    </div>

                                    <div class="col-sm-6">
                                      <label>Your Email *</label>
                                      <input type="text" name="email" class="form-control" required>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <label>Your Contact *</label>
                                      <input type="text" name="phone" class="form-control" required>
                                    </div>

                                    <div class="col-sm-6">
                                      <label>Your Address Details *</label>
                                      <input type="text" name="address" class="form-control" required>
                                    </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                      <label>Event Name *</label>
                                      <input type="text" name="event_name" class="form-control" required>
                                    </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <label for="service_details">Services (Describe what services you need.)</label>
                                          <textarea id="service_details" name="service_details" class="form-control" required></textarea>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <label>Event Date *</label>
                                      <input type="date" name="event_date"  class="form-control" required>
                                    </div>

                                    <div class="col-sm-6">
                                      <label>Event Time *</label>
                                      <select name="event_time"  class="form-control" required>
                                          <option selected>Select one</option>
                                          <option>Day Event</option>
                                          <option>Night Event</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <label>Event Planner Id *</label>
                                      <input type="text" name="company_id" class="form-control" value="<?php echo $event_planner_id; ?>" readonly>
                                    </div>

                                    <div class="col-sm-4">
                                      <label>Event Planner Company Name *</label>
                                      <input type="text" name="company_name"  class="form-control" value="<?php echo $company_name; ?>" readonly>
                                    </div>

                                    <div class="col-sm-4">
                                      <label>Event Planner Code *</label>
                                      <input type="text" name="company_code" class="form-control" value="<?php echo $event_panner_code; ?>" readonly>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-sm-6">
                                      <label>Event Planner Contact *</label>
                                      <input type="text" name="contact_number" class="form-control" value="<?php echo $contact_number; ?>" readonly>
                                    </div>

                                    <div class="col-sm-6">
                                      <label>Event Planner Address *</label>
                                      <input type="text" name="company_address" class="form-control" value="<?php echo $company_address; ?>" readonly>
                                    </div>
                                  </div>

                                  <label>Message to event planner (If Any) </label>
                                  <textarea class="form-control" rows="3" name="customer_msg" placeholder="Type message to event planner" required></textarea>

                                  <input type="submit" name="submit" class="btn btn-round shadow" style="background-color: #86A0B6; color: white;" value="Submit Booking">

                              </form>

                              <!-- Script for Summernote -->
                                <script>
                                  $('#service_details').summernote({
                                    placeholder: 'Type what services you need...',
                                    tabsize: 0,
                                    height: 250,
                                    toolbar: [
                                      ['style', ['style']],
                                      ['font', ['bold', 'underline', 'clear']],
                                      ['color', ['color']],
                                      ['para', ['ul', 'ol', 'paragraph']],
                                      ['table', ['table']],
                                      ['insert', ['link', 'picture', 'video']],
                                      ['view', ['fullscreen', 'codeview', 'help']]
                                    ]
                                  });
                                </script>

                          </div>

                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        <footer class="footer">
            <div class="cta bg-image bg-dark pt-4 pb-5 mb-0" style="background-image: url(assets/event_img/bg-11.jpg);">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <div class="cta-heading text-center">
                                <h3 class="cta-title text-white"><a href="index.php" class="logo ml-4 my-0">
                                  <img class="d-inline mb-2" src="assets/nav_logo/lavender.png" width="35" height="35">
                                  <h4 class="mt-0 mb-0 py-0 d-inline" style="font-family: 'Lobster', cursive; font-size: 28px; color: #86A0B6;"><span class="text-dark">Divine</span> Planners</h4>
                                </a> </h3><!-- End .cta-title -->
                                <p class="cta-desc text-white">We are happy, you are here! Enjoy the moment. <span class="font-weight-normal"></p><!-- End .cta-desc -->
                            </div><!-- End .text-center -->
                        
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                        </div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cta -->
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6">
                            <div class="widget widget-about">
                                <a href="index.php" class="logo ml-4 my-0">
                                  <img class="d-inline mb-2" src="assets/nav_logo/lavender.png" width="35" height="35">
                                  <h4 class="mt-0 mb-0 py-0 d-inline" style="font-family: 'Lobster', cursive; font-size: 28px; color: #86A0B6;"><span class="text-dark">Divine</span> Planners</h4>
                                </a>

                                <p>An event planner who works in-house at a catering company will project manage the event from a food, beverage, and service perspective. ... It also includes overseeing all the logistics, planning, and operations involved in the delivery of the food & beverage. </p>

                                <div class="widget-call">
                                    <i class="icon-phone"></i>
                                    Got Question? Call us 24/7
                                    <a href="tel:#">(+88) 01852-484588</a>         
                                </div><!-- End .widget-call -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Event Planner</a></li>
                                    <li><a href="#">Catering Service</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Contact</a></li>
                                    <li><a onclick="return confirm('Sure to logout?')" href="logout_customer.php">Logout</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Account Setting</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="dashboard.php">My Account</a></li>
                                    <li><a href="#">Help</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom bg-dark" style="color: white;">
                <div class="container">
                    <p class="footer-copyright">Copyright © <?php echo date("Y"); ?> <span style="color: #FFA012;"><a href="index.php" style="color: #86A0B6;">Divine Planners</a></span>. All Rights Reserved.</p><!-- End .footer-copyright -->

                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <nav class="mobile-nav">
                <ul class="mobile-menu">
                                <li class="megamenu-container active">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="#">Event Planner</a>
                                </li>
                                <li>
                                    <a href="#">Catering Service</a>
                                </li>
                                <li>
                                    <a href="#">About Us</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                                <li>
                                    <a onclick="return confirm('Sure to logout?')" href="logout_customer.php">Logout</a>
                                </li>
                            </ul><!-- End .menu -->
            </nav><!-- End .mobile-nav -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->


    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.elevateZoom.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    <script type="text/javascript" src="assets/extra_js/modal_image.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/product.html  22 Nov 2019 09:55:05 GMT -->
</html>
