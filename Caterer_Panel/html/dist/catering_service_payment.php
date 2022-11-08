<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:../../../login.php');
  }
 ?>



 <!-- Select Caterer Payment Details -->
 <?php

   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['caterer_id']))
   {

     $caterer_id = $_GET['caterer_id'];

     $sql     = "SELECT * FROM tb_caterer WHERE caterer_id = $caterer_id";

     $result  = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {      
         $caterer_id        = $getData['caterer_id'];
         $company_name      = $getData['company_name'];
         $caterer_code      = $getData['caterer_code'];
         $contact_number    = $getData['contact_number'];
         $email_address     = $getData['email_address'];
         $event_panner_code = $getData['event_panner_code'];
     }
   }
  ?>



  <!-- Add Caterer Payment Section -->
 <?php
   $user_name = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['submit']))
   {    
         $payment_code       = rand(100000, 999999);
         $caterer_id         = $caterer_id;
         $company_name       = $_POST['company_name'];
         $contact_number     = $_POST['contact_number'];
         $email_address      = $_POST['email_address'];
         $company_code       = $_POST['company_code'];
         $paid_amount        = $_POST['paid_amount'];
         $trx_id             = $_POST['trx_id'];
         $payment_method     = $_POST['payment_method'];
         $payment_acc_number = $_POST['payment_acc_number'];
         $payment_date       = $_POST['payment_date'];
         $added_by           = $user_name;
       
         $tmp                = md5(time());
         $payment_screenshot = $_FILES["payment_screenshot"]["name"];
         $dst                = "./caterer_payment_img/".$tmp.$payment_screenshot;
         $dst_db             = "caterer_payment_img/".$tmp.$payment_screenshot;
         move_uploaded_file($_FILES["payment_screenshot"]["tmp_name"],$dst);

         $sql = "INSERT INTO tb_caterer_payment(payment_code,caterer_id,company_name,company_code,contact_number,email_address,paid_amount,trx_id,payment_method,payment_acc_number,payment_screenshot,payment_date,added_by,entry_time)values('$payment_code','$caterer_id','$company_name','$company_code','$contact_number','$email_address','$paid_amount','$trx_id','$payment_method','$payment_acc_number','$dst_db','$payment_date','$added_by','$current_datetime')";
         
         $insert_row = $db->insert($sql);

         if($insert_row)
         {
           ?>

           <script type="text/javascript">
             window.alert("Payment details added successfully.");
             window.location='catering_service_payment.php?caterer_id=<?php echo $caterer_id; ?>';
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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Divine Planners - Catering Service Payment | Caterer Panel</title>
    
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/icons/lavender.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/lavender.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icons/lavender.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/icons/lavender.png" color="#666666">
    <link rel="shortcut icon" href="assets/icons/lavender.png">

    <!-- Google Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">



</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand bg-light">
                <a class="link" href="index.php">
                    <img class="d-inline mb-2" src="assets/nav_logo/lavender.png" width="30" height="30">
                          <h4 class="mt-0 mb-0 py-0 d-inline" style="font-family: 'Lobster', cursive; font-size: 22px; color: #86A0B6;"><span class="text-dark">Divine</span> Planners</h4>
                    <span class="brand-mini">AC</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                    <li>
                        <form class="navbar-search" action="javascript:;">
                            <div class="rel">
                                <span class="search-icon"><i class="ti-search"></i></span>
                                <input class="form-control" placeholder="Search here...">
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-notification">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o rel"><span class="notify-signal"></span></i></a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <li class="dropdown-menu-header">
                                <div>
                                    <span><strong>5 New</strong> Notifications</span>
                                    <a class="pull-right" href="javascript:;">view all</a>
                                </div>
                            </li>
                            <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                                <div>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-13">4 New Booking</div><small class="text-muted">22 mins</small></div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="./assets/img/admin-avatar.png" />
                            <span></span><?php echo $_SESSION['user_name']; ?><i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="profile.html"><i class="fa fa-user"></i>Profile</a>
                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item" onclick="return confirm('Sure to logout?')" href="logout_service_panel.php"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="./assets/img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"><?php echo $_SESSION['user_name']; ?></div><small><?php echo $_SESSION['user_type']; ?></small></div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a href="index.php"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li class="heading">MAIN MENU</li>
                    <li>
                        <a href="add_caterer.php"><i class="sidebar-item-icon fa fa-cutlery"></i>
                            <span class="nav-label">Add Company</span>
                        </a>
                    </li>
                    <li>
                        <a href="manage_caterer.php"><i class="sidebar-item-icon fa fa-list-ul"></i>
                            <span class="nav-label">Manage Company</span>
                        </a>
                    </li>
                    <li>
                        <a class="active" href="manage_catering_service_payment.php"><i class="sidebar-item-icon fa fa-money"></i>
                            <span class="nav-label">Company Payment</span>
                        </a>
                    </li>
                    <li>
                        <a href="caterer_list.php"><i class="sidebar-item-icon fa fa-plus"></i>
                            <span class="nav-label">Add Catering Package</span>
                        </a>
                    </li>
                    <li>
                        <a href="customer_booking.php"><i class="sidebar-item-icon fa fa-arrow-down"></i>
                            <span class="nav-label">Customer Booking</span>
                        </a>
                    </li>
                    <li>
                        <a href="customer_feedback.php"><i class="sidebar-item-icon fa fa-star-half-o"></i>
                            <span class="nav-label">Customer Feedback</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"><i class="sidebar-item-icon fa fa-info-circle"></i>
                            <span class="nav-label">About Us</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="return confirm('Sure to logout?')" href="logout_service_panel.php"><i class="sidebar-item-icon fa fa-sign-out"></i>
                            <span class="nav-label">Sign Out</span>
                        </a>
                    </li>  
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->


        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Catering Service Payment</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home fa-fw"></i> Dashboard</a></li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Payment Details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Company Name</label>
                                            <input class="form-control" type="text" name="company_name" value="<?php echo $company_name; ?>" readonly>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Company Code</label>
                                            <input class="form-control" type="number" name="company_code" value="<?php echo $caterer_code; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Contact Number</label>
                                            <input class="form-control" type="number" name="contact_number" value="<?php echo $contact_number; ?>" readonly>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>E-mail Address</label>
                                            <input class="form-control" type="email" name="email_address" value="<?php echo $email_address; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Paid Amount</label>
                                            <input class="form-control" type="text" name="paid_amount" required>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>TrxID</label>
                                            <input class="form-control" type="text" name="trx_id" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Payment Method</label>
                                            <select class="form-control" name="payment_method" required>
                                                <option selected></option>
                                                <option>Bkash</option>
                                                <option>Nagad</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Payment Account Number</label>
                                            <input class="form-control" type="number" name="payment_acc_number" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Payment Screenshot</label>
                                            <input class="form-control" type="file" name="payment_screenshot" required>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Payment Date</label>
                                            <input class="form-control" type="date" name="payment_date" required>
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" class="btn btn-primary" value="Submit Payment">
                                </form>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Payment Rules</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                
                                <p>**You have to pay total 500 Tk. per service.</p>
                                <p>**You advance payment have to be 250 Tk. minimum.</p>
                                <p>**Make sure your payment accepted by admin or not.</p>
                                <p>**Please save your Bkash/Nagad payment history for future evidence.</p>

                                <div class="col-12 mb-4 mt-4">
                                    <a href=""><img src="payment_icon/bkash.svg" height="100" alt="bkash"></a>
                                    <p><b>Merchant Number: 01845125466, 01845125467</b></p>
                                </div>
                                
                                <div class="col-12 mb-4">
                                    <a href=""><img src="payment_icon/nagad.png" height="100" alt="nagad"></a>
                                    <p><b>Merchant Number: 01845125466, 01845125467</b></p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <!-- END PAGE CONTENT-->

            <footer class="page-footer">
                <div class="font-13"><?php echo date("Y") ?> © <b>PCIU</b> - All rights reserved.</div>
                <a class="px-4" href="index.php"><i class="fa fa-home fa-fw"></i>Home</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->
    <div class="theme-config">
        <div class="theme-config-toggle"><i class="fa fa-cog theme-config-show"></i><i class="ti-close theme-config-close"></i></div>
        <div class="theme-config-box">
            <div class="text-center font-18 m-b-20">SETTINGS</div>
            <div class="font-strong">LAYOUT OPTIONS</div>
            <div class="check-list m-b-20 m-t-10">
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedNavbar" type="checkbox" checked>
                    <span class="input-span"></span>Fixed navbar</label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedlayout" type="checkbox">
                    <span class="input-span"></span>Fixed layout</label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input class="js-sidebar-toggler" type="checkbox">
                    <span class="input-span"></span>Collapse sidebar</label>
            </div>
            <div class="font-strong">LAYOUT STYLE</div>
            <div class="m-t-10">
                <label class="ui-radio ui-radio-gray m-r-10">
                    <input type="radio" name="layout-style" value="" checked="">
                    <span class="input-span"></span>Fluid</label>
                <label class="ui-radio ui-radio-gray">
                    <input type="radio" name="layout-style" value="1">
                    <span class="input-span"></span>Boxed</label>
            </div>
            <div class="m-t-10 m-b-10 font-strong">THEME COLORS</div>
            <div class="d-flex m-b-20">
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Default">
                    <label>
                        <input type="radio" name="setting-theme" value="default" checked="">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-white"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue">
                    <label>
                        <input type="radio" name="setting-theme" value="blue">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-blue"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green">
                    <label>
                        <input type="radio" name="setting-theme" value="green">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-green"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple">
                    <label>
                        <input type="radio" name="setting-theme" value="purple">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-purple"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange">
                    <label>
                        <input type="radio" name="setting-theme" value="orange">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-orange"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink">
                    <label>
                        <input type="radio" name="setting-theme" value="pink">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-pink"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
            </div>
            <div class="d-flex">
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="White">
                    <label>
                        <input type="radio" name="setting-theme" value="white">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue light">
                    <label>
                        <input type="radio" name="setting-theme" value="blue-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-blue"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green light">
                    <label>
                        <input type="radio" name="setting-theme" value="green-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-green"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple light">
                    <label>
                        <input type="radio" name="setting-theme" value="purple-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-purple"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange light">
                    <label>
                        <input type="radio" name="setting-theme" value="orange-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-orange"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink light">
                    <label>
                        <input type="radio" name="setting-theme" value="pink-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-pink"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    

    <!-- CORE PLUGINS-->
    <script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="./assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
        })
    </script>

</body>

</html>