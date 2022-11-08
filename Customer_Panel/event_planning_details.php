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

   if(isset($_GET['event_planner_id']))
   {

     $event_planner_id = $_GET['event_planner_id'];

     $sql     = "SELECT * FROM tb_event_planner WHERE event_planner_id = $event_planner_id";

     $result  = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {
         $company_name           = $getData['company_name'];
         $company_image          = $getData['company_image'];
         $contact_number         = $getData['contact_number'];
         $email_address          = $getData['email_address'];
         $opening_hour           = $getData['opening_hour'];
         $about_company          = $getData['about_company'];
         $company_address        = $getData['company_address'];
         $company_services       = $getData['company_services'];
         $company_established_on = $getData['company_established_on'];
         $way_of_payment         = $getData['way_of_payment'];
         $bkash_acc_number       = $getData['bkash_acc_number'];
         $nagad_acc_number       = $getData['nagad_acc_number'];
         $added_by               = $getData['added_by'];
     }
   }
  ?>



  <!-- Event Package Card Data Load -->
 <?php
   $user_name       = $_SESSION['user_name'];
   $db              = new Database();
   $sql             = "SELECT * FROM tb_event_package WHERE company_id = $event_planner_id";
   $read_event_package = $db->select($sql);
  ?>




  <!--Event Planner Review load-->
 <?php
   $db   = new Database();
   $sql  = "SELECT * FROM tb_review WHERE company_id = $event_planner_id AND company_owner = '$added_by'";
   $read_review = $db->select($sql);
  ?>



  <!-- Total Review count -->
 <?php
     $db   = new Database();
     $sql  = "SELECT * FROM tb_review WHERE company_id = $event_planner_id";
     $read_total_review = $db->select($sql);
     if($read_total_review)
     {
       $total_review = $read_total_review->num_rows;
     }
     else
     {
       $total_review = 0;
     }
    ?>


<!-- Total rating value count -->
<?php
   $db   = new Database();
   $sql  = "SELECT sum(rating_value)rating_value FROM tb_review WHERE company_id = $event_planner_id";
   $sum_of_rating_value = $db->select($sql);

   while($getData = $sum_of_rating_value->fetch_assoc())
   {
     $total_rating = $getData['rating_value'];
   }
?>


<?php 
  
  error_reporting( error_reporting() & ~E_NOTICE );
  if ($total_rating == 0 AND $total_review == 0) 
  {
    $avg_rating = 0;
  }
  else
  {
    $avg_rating = (int) ($total_rating/$total_review);
  }

 ?>








<!DOCTYPE html>
<html lang="en">


<!-- molla/index-4.html  22 Nov 2019 09:53:08 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Divine Planners - Event Planning Details</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Event Planning Details</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-4 bg-light pt-1 pb-4" style="border-radius: 5px; border-top: 1px solid #86A0B6;">
                                <h6 class="mt-1 mb-1" style="color: #86A0B6; font-family: 'Rajdhani', sans-serif;"><b>BEAUTIFUL MOMENTS</b></h6><hr class="mt-0 mb-1 pt-0">
                                <div class="row">
                                    <div class="col-4 mb-1">
                                        <img id="myImg_1" style="border-radius: 5px;" src="assets/event_img/bg-3.jpg" data-zoom-image="assets/event_img/bg-3.jpg" alt="event_image">
                                        <!-- The Modal -->
                                        <div id="myModal_1" class="modal">
                                          <span class="close_1">&times;</span>
                                          <img class="modal-content" id="img01">
                                          <div id="caption_1"></div>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-1">
                                        <img id="myImg" style="border-radius: 5px;" src="assets/event_img/bg-6.jpg" data-zoom-image="assets/event_img/bg-6.jpg" alt="event_image">
                                        <!-- The Modal -->
                                        <div id="myModal" class="modal">
                                          <span class="close">&times;</span>
                                          <img class="modal-content" id="img02">
                                          <div id="caption"></div>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-1">
                                        <img id="myImg_3" style="border-radius: 5px;" src="assets/event_img/bg-7.jpg" data-zoom-image="assets/event_img/bg-7.jpg" alt="event_image">
                                        <!-- The Modal -->
                                        <div id="myModal_3" class="modal">
                                          <span class="close_3">&times;</span>
                                          <img class="modal-content" id="img03">
                                          <div id="caption_3"></div>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-1">
                                        <img id="myImg_4" style="border-radius: 5px;" src="assets/event_img/bg-10.jpg" data-zoom-image="assets/event_img/bg-10.jpg" alt="event_image">
                                        <!-- The Modal -->
                                        <div id="myModal_4" class="modal">
                                          <span class="close_4">&times;</span>
                                          <img class="modal-content" id="img04">
                                          <div id="caption_4"></div>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-1">
                                        <img id="myImg_5" style="border-radius: 5px;" src="assets/event_img/bg-5.jpg" data-zoom-image="assets/event_img/bg-5.jpg" alt="event_image">
                                        <!-- The Modal -->
                                        <div id="myModal_5" class="modal">
                                          <span class="close_5">&times;</span>
                                          <img class="modal-content" id="img05">
                                          <div id="caption_5"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <h6 class="mt-1 mb-1" style="color: #86A0B6; font-family: 'Rajdhani', sans-serif;"><b>CONTACT US</b></h6><hr class="mt-0 mb-1 pt-0">
                                </div>

                                <div class="row py-2">
                                    <div class="col-10">
                                        <p class="text-info" style="font-family: sans-serif; font-size: 20px;"><sup><i class="fa fa-quote-left fa-fw"></i></sup> <?php echo $company_name; ?></p>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-1">
                                        <i class="fa fa-phone fa-fw" style="color: #86A0B6;"></i>
                                    </div>
                                    <div class="col-10">
                                        <p style="font-family: sans-serif; font-size: 15px;"><b><?php echo $contact_number; ?></b></p>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-1">
                                        <i class="fa fa-envelope fa-fw" style="color: #86A0B6;"></i>
                                    </div>
                                    <div class="col-10">
                                        <p style="font-family: sans-serif; "><?php echo $email_address; ?></p>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-1">
                                        <i class="fa fa-map-marker fa-fw" style="color: #86A0B6;"></i>
                                    </div>
                                    <div class="col-10">
                                        <p style="font-family: sans-serif; "><?php echo $company_address; ?></p>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-1">
                                        <i class="fa fa-info-circle fa-fw" style="color: #86A0B6;"></i>
                                    </div>
                                    <div class="col-10">
                                        <p style="font-family: sans-serif; "><?php echo $about_company; ?></p>
                                    </div>
                                </div>


                                <div><hr class="my-3"></div>


                                <div class="row py-2">
                                    <div class="col-1">
                                        <i class="fa fa-handshake-o fa-fw" style="color: #86A0B6;"></i>
                                    </div>
                                    <div class="col-10">
                                        <p style="font-family: sans-serif; font-size: 15px;"><b>Our Services</b> 
                                            <?php echo $company_services; ?>
                                        </p>
                                    </div>
                                </div>


                                <div class="row py-2">
                                    <div class="col-1">
                                        <i class="fa fa-clock-o fa-fw" style="color: #86A0B6;"></i>
                                    </div>
                                    <div class="col-10">
                                        <p style="font-family: sans-serif; font-size: 15px;"><b>We are Open</b> 
                                            <br><?php echo $opening_hour; ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-1">
                                        <i class="fa fa-money fa-fw" style="color: #86A0B6;"></i>
                                    </div>
                                    <div class="col-10">
                                        <p style="font-family: sans-serif; font-size: 15px;"><b>Way of Payment</b> 
                                            <br><?php echo $way_of_payment; ?><br>                
                                        </p>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-1">
                                        <i class="fa fa-calendar-check-o fa-fw" style="color: #86A0B6;"></i>
                                    </div>
                                    <div class="col-10">
                                        <p style="font-family: sans-serif; font-size: 15px;"><b>Established on</b> 
                                            <br><?php echo date("D, F j, Y", strtotime($company_established_on)) ?>                
                                        </p>
                                    </div>
                                </div>

                            </div><!-- End .col-md-6 -->

                            <div class="col-md-7 ml-2" style="border: 1px solid #E4E4E4; border-radius: 5px;">

                                <div class="product-details-tab">
                                    <ul class="nav nav-pills justify-content-center" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="event-packages-link" data-toggle="tab" href="#event-packages-tab" role="tab" aria-controls="event-packages-tab" aria-selected="true">EVENT PACKAGES</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="payment-info-link" data-toggle="tab" href="#payment-info-tab" role="tab" aria-controls="payment-info-tab" aria-selected="false">PAYMENT INFORMATION</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">REVIEWS (<?php echo $total_review; ?>)</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="event-packages-tab" role="tabpanel" aria-labelledby="event-packages-link">
                                            <div class="row">

                                                <?php if($read_event_package){ $i = 0; ?>
                                                <?php while($result = $read_event_package->fetch_assoc()){ $i = $i + 1; ?>
                                                <div class="col-md-6">
                                                    <div class="product product-2 shadow text-center" style="border-radius: 5px;">
                                                            <div class="product-body py-4">

                                                                <img src="assets/event_img/bg-3.jpg" alt="event_image" width="120" style="border-radius: 5px; text-align: justify;">

                                                                <h3 class="product-title mt-3" style="color: #86A0B6; font-family: 'Rajdhani', sans-serif; font-size: 20px;"><b><?php echo $result['package_name']; ?></b></h3><!-- End .product-title -->

                                                                <h3 class="product-title text-dark" style="font-family: 'Rajdhani', sans-serif; font-size: 20px;"><b><?php echo $result['package_price'].' Tk.'; ?></b></h3><!-- End .product-title -->

                                                                <hr class="py-0 my-4">

                                                                <h3 class="product-title text-dark" style="font-family: 'Rajdhani', sans-serif; font-size: 20px;"><?php echo $result['package_details'].' Tk.'; ?></h3><!-- End .product-title -->

                                                                <hr class="py-0 my-4">

                                                                <div class="mt-1">
                                                                    <strong class="text-info"><i class="fa fa-phone fa-fw"></i> Call for Booking: <?php echo $contact_number; ?></strong> 
                                                                </div>
                                                            </div><!-- End .product-body -->
                                                        </div><!-- End .product -->
                                                </div>
                                                <?php } ?>
                                                <?php }else{ ?>
                                                <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                                                echo $msg; ?>
                                                <?php } ?>

                                            </div>

                                            <div><hr class="mb-0"></div>

                                                <p class="text-center"><b>OR</b> <hr class="mt-0"></p>

                                                <p class="mb-2"><i class="fa fa-mouse-pointer fa-fw" aria-hidden="true"></i> Click over the button to book new appointment. Thank You! (নতুন এপয়েন্টমেন্ট বুক করতে নিচের বুক নিউ এপয়েন্টমেন্ট বাটনে ক্লিক করুন। ধন্যবাদ!)</p>
                                                <div class="text-center">
                                                    <a href="book_appointment.php?company_id=<?php echo $event_planner_id; ?>" class="btn btn-info btn-round">Book New Appointment</a> || 

                                                    <a href="event_planners_review.php?company_id=<?php echo $event_planner_id; ?>" class="btn btn-success btn-round">Give Us Feedback</a>
                                                </div>

                                        </div><!-- .End .tab-pane -->

                                        <div class="tab-pane fade" id="payment-info-tab" role="tabpanel" aria-labelledby="payment-info-link">
                                            <div class="product-desc-content">
                                                <h3>Payment Information</h3>
                                                <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> You have to pay at least Tk. 500 advance to confirm your appointment.</p>
                                                <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> Save your payment history for future evidence.</p>
                                                <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> You can pay by Bkash or Nagad, which has been given below.</p>
                                                <p class="mb-3"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Make sure your advance payment accepted or not.</p>
                                                <div class="row">
                                                    <div class="col-lg-4 mr-0 pr-0">
                                                      <p><img src="payment_icon/bkash.svg" width="120"> Bkash Number : <b><?php echo $bkash_acc_number; ?> </b></p>
                                                    </div>
                                                    <div class="col-lg-4 ml-0 pl-0">
                                                     <p><img src="payment_icon/nagad.png" width="120"> Nagad Number : <b><?php echo $nagad_acc_number; ?> </b></p>
                                                    </div>
                                                </div>
                                            </div><!-- End .product-desc-content -->
                                        </div><!-- .End .tab-pane -->

                                        <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                            <div class="reviews">
                                                <h3>Reviews (<?php echo $total_review; ?>)</h3>

                                    <?php if($read_review){ $i = 0; ?>
                                    <?php while($result = $read_review->fetch_assoc()){ $i = $i + 1; ?>
                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#"><?php echo $result['reviewed_by']; ?></a></h4>
                                                <div class="ratings-container">
                                                    <?php
                                                      $rating_value = $result['rating_value'];

                                                        if($rating_value == 1)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($rating_value == 2)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($rating_value == 3)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($rating_value == 4)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($rating_value == 5)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i>

                                                            <?php
                                                        }
                                                     ?>
                                                </div><!-- End .rating-container -->
                                                <span class="review-date"><?php echo date("D, F j, Y", strtotime($result['entry_time'])) ?></span>
                                            </div><!-- End .col -->
                                            <div class="col">
                                                <h4><?php
                                                      $rating_value = $result['rating_value'];

                                                        if($rating_value == 1)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-danger">Awful</div><br />';
                                                             echo $msg;
                                                        }
                                                        else if($rating_value == 2)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-warning " style="color: white;">Poor</div><br />';
                                                             echo $msg;
                                                        }
                                                        else if($rating_value == 3)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-secondary">Average</div><br />';
                                                             echo $msg;
                                                        }
                                                        else if($rating_value == 4)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-info">Good</div><br />';
                                                             echo $msg;
                                                        }
                                                        else if($rating_value == 5)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-success">Excellent</div><br />';
                                                             echo $msg;
                                                        }
                                                     ?></h4>

                                                <div class="review-content">
                                                    <p><?php echo $result['comment']; ?></p>
                                                </div><!-- End .review-content -->
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    </div><!-- End .review -->
                                    <?php } ?>
                                    <?php }else{ ?>
                                    <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Review Found!</div><br />';
                                      echo $msg; ?>
                                    <?php } ?>


                                            </div><!-- End .reviews -->
                                        </div><!-- .End .tab-pane -->

                                    </div><!-- End .tab-content -->
                                </div><!-- End .product-details-tab -->
                                
                            </div><!-- End .col-md-6 -->
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
