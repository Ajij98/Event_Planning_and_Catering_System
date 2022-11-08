<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>



 <!-- My booking table data load -->
 <?php
   $user_name = $_SESSION['user_name'];
   $db   = new Database();
   $sql  = "SELECT * FROM tb_event_catering_booking WHERE booked_by = '$user_name'";
   $read_my_booking = $db->select($sql);
  ?>


  <!-- My booking payment table data load -->
 <?php
   $user_name = $_SESSION['user_name'];
   $db   = new Database();
   $sql  = "SELECT * FROM tb_booking_payment WHERE paid_by = '$user_name'";
   $read_booking_payment = $db->select($sql);
  ?>









<!DOCTYPE html>
<html lang="en">


<!-- molla/index-4.html  22 Nov 2019 09:53:08 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Divine Planners - My Account</title>
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
            <div class="page-header text-center" style="background-image: url('assets/event_img/bg-11.jpg')">
                <div class="container">
                    <h1 class="page-title" style="color: white;">My Account</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="dashboard">
                    <div class="container">
                        <div class="row">
                            <aside class="col-md-4 col-lg-2 shadow py-4 px-4" style="border-radius: 5px; border-top: 1px solid #86A0B6;">
                                <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">My Booking</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-payment-link" data-toggle="tab" href="#tab-payment" role="tab" aria-controls="tab-payment" aria-selected="false">Booking Payment History</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" onclick="return confirm('Sure to logout?')" href="logout_customer.php">Sign Out</a>
                                    </li>
                                </ul>
                            </aside><!-- End .col-lg-3 -->

                            <div class="col-md-8 col-lg-9 ml-2 px-4 py-4" style="border: 1px solid #E4E4E4; border-radius: 5px;">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                        <p>Hello! <?php echo $_SESSION['user_name']; ?>
                                        <br>
                                        Welcome to 
                                        <a href="index.php" style="font-family: 'Lobster', cursive; font-size: 22px; color: #86A0B6;"><sup><i class="fa fa-quote-right fa-fw"></i></sup><span class="text-dark">Divine</span> Planners</a></p>
                                    </div><!-- .End .tab-pane -->

                                    <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                          <table class="table table-cart table-mobile" id="my_order_table">
                                            <thead>
                                              <tr>
                                                <th>Booking Id</th>
                                                <th>Booking Code</th>
                                                <th>Company Name</th>
                                                <th>Company Contact</th>
                                                <th>Company Address</th>
                                                <th>Event Name</th>
                                                <th>Event Date</th>
                                                <th>Event Time</th>
                                                <th>Service Details</th>
                                                <th>Booking Verify Status</th>
                                                <th>Make Payment</th>
                                                <th>Action</th>
                                              </tr>
                                            </thead>

                                            <tbody>

                                              <?php if($read_my_booking){ $i = 0; ?>
                                              <?php while($result = $read_my_booking->fetch_assoc()){ $i = $i + 1; ?>
                                              <tr>
                                                <td class="text-success font-weight-bold"><?php echo 'Booking Id-'.$result['booking_id']; ?></td>
                                                <td><?php echo $result['booking_code']; ?></td>
                                                <td><?php echo $result['company_name']; ?></td>
                                                <td><?php echo $result['contact_number']; ?></td>
                                                <td><?php echo $result['company_address']; ?></td>
                                                <td><?php echo $result['event_name']; ?></td>
                                                <td><?php echo $result['event_date']; ?></td>
                                                <td><?php echo $result['event_time']; ?></td>
                                                <td><?php echo $result['service_details']; ?></td>
                                                <td>
                                                    <?php
                                                        $is_verified = $result['is_verified'];

                                                        if($is_verified == 1)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-success" style="border-radius: 15px;">Confirmed</div><br />';
                                                                echo $msg;
                                                        }
                                                        else
                                                        {
                                                            $msg = '<div class="m-auto badge badge-danger" style="border-radius: 15px;">Pending...</div><br />';
                                                                echo $msg;
                                                        }
                                                    ?>
                                                </td>
                                                <td><a href="booking_payment.php?booking_id=<?php echo $result['booking_id']; ?>" class="btn btn-round btn-info py-0">Booking Payment</a></td>
                                                <td>
                                                  <a href="#?booking_id=<?php echo $result['booking_id']; ?>" title="cancel order" class="btn-remove d-inline"><i class="fa fa-trash-o text-danger"></i></a>
                                                </td>
                                              </tr>
                                              <?php } ?>
                                              <?php }else{ ?>
                                              <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                                                echo $msg; ?>
                                              <?php } ?>

                                            </tbody>
                                          </table><!-- End .table table-wishlist -->
                                    </div><!-- .End .tab-pane -->



                                    <div class="tab-pane fade" id="tab-payment" role="tabpanel" aria-labelledby="tab-payment-link">
                                          <table class="table table-cart table-mobile" id="my_order_table">
                                            <thead>
                                              <tr>
                                                <th>Payment Id</th>
                                                <th>Payment Code</th>
                                                <th>Booking Id</th>
                                                <th>Booking Code</th>
                                                <th>Paid Amount</th>
                                                <th>TrxID</th>
                                                <th>Payment Acc. Number</th>
                                                <th>Payment date</th>
                                                <th>Payment Verify Status</th>
                                                <th>Action</th>
                                              </tr>
                                            </thead>

                                            <tbody>

                                              <?php if($read_booking_payment){ $i = 0; ?>
                                              <?php while($result = $read_booking_payment->fetch_assoc()){ $i = $i + 1; ?>
                                              <tr>
                                                <td class="text-success font-weight-bold"><?php echo 'Payment Id-'.$result['payment_id']; ?></td>
                                                <td><?php echo $result['payment_code']; ?></td>
                                                <td><?php echo 'Booking Id-'.$result['booking_id']; ?></td>
                                                <td><?php echo $result['booking_code']; ?></td>
                                                <td><?php echo $result['paid_amount'].' Tk.'; ?></td>
                                                <td><?php echo $result['trx_id']; ?></td>
                                                <td><?php echo $result['payment_acc_number']; ?></td>
                                                <td><?php echo $result['payment_date']; ?></td>
                                                <td>
                                                    <?php
                                                        $is_accepted = $result['is_accepted'];

                                                        if($is_accepted == 1)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-success" style="border-radius: 15px;">Accepted</div><br />';
                                                                echo $msg;
                                                        }
                                                        else
                                                        {
                                                            $msg = '<div class="m-auto badge badge-danger" style="border-radius: 15px;">Not accept yet...</div><br />';
                                                                echo $msg;
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                  <a href="#?booking_id=<?php echo $result['booking_id']; ?>" title="cancel order" class="btn-remove d-inline"><i class="fa fa-trash-o text-danger"></i></a>
                                                </td>
                                              </tr>
                                              <?php } ?>
                                              <?php }else{ ?>
                                              <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                                                echo $msg; ?>
                                              <?php } ?>

                                            </tbody>
                                          </table><!-- End .table table-wishlist -->
                                    </div><!-- .End .tab-pane -->

                                    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>First Name *</label>
                                                    <input type="text" class="form-control" required>
                                                </div><!-- End .col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <label>Last Name *</label>
                                                    <input type="text" class="form-control" required>
                                                </div><!-- End .col-sm-6 -->
                                            </div><!-- End .row -->

                                            <label>Display Name *</label>
                                            <input type="text" class="form-control" required>
                                            <small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

                                            <label>Email address *</label>
                                            <input type="email" class="form-control" required>

                                            <label>Current password (leave blank to leave unchanged)</label>
                                            <input type="password" class="form-control">

                                            <label>New password (leave blank to leave unchanged)</label>
                                            <input type="password" class="form-control">

                                            <label>Confirm new password</label>
                                            <input type="password" class="form-control mb-2">

                                        <input type="submit" class="btn btn-primary btn-round" value="Save Changes">

                                        </form>
                                    </div><!-- .End .tab-pane -->
                                </div>
                            </div><!-- End .col-lg-9 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .dashboard -->
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

    <div class="mobile-menu-container mobile-menu-light">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>
            
            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
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
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- JQuery datatable plugin (js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
</body>


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->
</html>

<!-- My Order Table JS -->
<script>

  $(document).ready(function() {
    var table = $('#my_order_table').DataTable( {
        lengthChange: true,
    } );

    table.buttons().container()
        .appendTo( '#my_order_table_wrapper .col-md-6:eq(0)' );
  } );

</script>

<!-- My Product Table JS -->
<script>

  $(document).ready(function() {
    var table = $('#my_product_table').DataTable( {
        lengthChange: true,
    } );

    table.buttons().container()
        .appendTo( '#my_product_table_wrapper .col-md-6:eq(0)' );
  } );

</script>

<!-- Payment History Table JS -->
<script>

  $(document).ready(function() {
    var table = $('#payment_history_table').DataTable( {
        lengthChange: true,
    } );

    table.buttons().container()
        .appendTo( '#payment_history_table_wrapper .col-md-6:eq(0)' );
  } );

</script>
