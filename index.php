<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

 ?>



 <!-- Event Planner Card Data Load -->
 <?php
   $db              = new Database();
   $sql             = "SELECT * FROM tb_event_planner WHERE is_verified = 1";
   $read_event_planner = $db->select($sql);
  ?>



 <!-- Caterer Table Data Load -->
 <?php
   $db              = new Database();
   $sql             = "SELECT * FROM tb_caterer WHERE is_verified = 1";
   $read_caterer = $db->select($sql);
  ?>







<!DOCTYPE html>
<html lang="en">


<!-- molla/index-4.html  22 Nov 2019 09:53:08 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Divine Planners - Home</title>
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
                                    <a href="login.php">Login</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <a href="registration.php" class="btn btn-round py-2 px-0" style="background-color: #86A0B6; color: white;">Register Now</a>
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->


        <main class="main">
            <div class="intro-slider-container mb-5">
                <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" 
                    data-owl-options='{
                        "dots": true,
                        "nav": false, 
                        "responsive": {
                            "1200": {
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    <div class="intro-slide" style="background-image: url(assets/background_img/bg-6.jpg);">
                        <div class="container intro-content">
                            <div class="row text-left pl-4">
                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                    <h3 class="intro-subtitle text-third" style="font-size: 30px; color: #86A0B6;">DIVINE PLANNERS</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title" style="color: white;">Welcome to The</h1>

                                    <div class="intro-price">
                                        <span class="text-third" style="color: white; font-size: 40px;">
                                           EVENT PLANNING
                                        </span>
                                    </div><!-- End .intro-price -->

                                    <a href="#event_planners" class="btn btn-round" style="background-color: #86A0B6; color: white;">
                                        <span>Book Appointment</span>
                                    </a>
                                </div><!-- End .col-lg-11 offset-lg-1 -->
                            </div><!-- End .row -->
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->

                    <div class="intro-slide" style="background-image: url(assets/background_img/bg-11.jpg);">
                        <div class="container intro-content">
                            <div class="row text-left pl-4">
                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                    <h3 class="intro-subtitle text-third" style="font-size: 30px; color: #86A0B6;">DIVINE PLANNERS</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title" style="color: white;">Welcome to The</h1>

                                    <div class="intro-price">
                                        <span class="text-third" style="color: white; font-size: 40px;">
                                           EVENT PLANNING
                                        </span>
                                    </div><!-- End .intro-price -->

                                    <a href="#" class="btn btn-round" style="background-color: #86A0B6; color: white;">
                                        <span>Book Appointment</span>
                                    </a>
                                </div><!-- End .col-lg-11 offset-lg-1 -->
                            </div><!-- End .row -->
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->

                    <div class="intro-slide" style="background-image: url(assets/background_img/bg-3.jpg);">
                        <div class="container intro-content">
                            <div class="row text-left pl-4">
                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                    <h3 class="intro-subtitle text-third" style="font-size: 30px; color: #86A0B6;">DIVINE PLANNERS</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title" style="color: white;">Welcome to The</h1>

                                    <div class="intro-price">
                                        <span class="text-third" style="color: white; font-size: 40px;">
                                           EVENT PLANNING
                                        </span>
                                    </div><!-- End .intro-price -->

                                    <a href="#" class="btn btn-round" style="background-color: #86A0B6; color: white;">
                                        <span>Book Appointment</span>
                                    </a>
                                </div><!-- End .col-lg-11 offset-lg-1 -->
                            </div><!-- End .row -->
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->

                    <div class="intro-slide" style="background-image: url(assets/background_img/bg-9.jpg);">
                        <div class="container intro-content">
                            <div class="row text-left pl-4">
                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                    <h3 class="intro-subtitle text-third" style="font-size: 30px; color: #86A0B6;">DIVINE PLANNERS</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title" style="color: white;">Welcome to The</h1>

                                    <div class="intro-price">
                                        <span class="text-third" style="color: white; font-size: 40px;">
                                           EVENT PLANNING
                                        </span>
                                    </div><!-- End .intro-price -->

                                    <a href="#" class="btn btn-round" style="background-color: #86A0B6; color: white;">
                                        <span>Book Appointment</span>
                                    </a>
                                </div><!-- End .col-lg-11 offset-lg-1 -->
                            </div><!-- End .row -->
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->

                    <div class="intro-slide" style="background-image: url(assets/background_img/bg-5.jpg);">
                        <div class="container intro-content">
                            <div class="row text-left pl-4">
                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                    <h3 class="intro-subtitle text-third" style="font-size: 30px; color: #86A0B6;">DIVINE PLANNERS</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title" style="color: white;">Welcome to The</h1>

                                    <div class="intro-price">
                                        <span class="text-third" style="color: white; font-size: 40px;">
                                           EVENT PLANNING
                                        </span>
                                    </div><!-- End .intro-price -->

                                    <a href="#" class="btn btn-round" style="background-color: #86A0B6; color: white;">
                                        <span>Book Appointment</span>
                                    </a>
                                </div><!-- End .col-lg-11 offset-lg-1 -->
                            </div><!-- End .row -->
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->

                    <div class="intro-slide" style="background-image: url(assets/background_img/bg-2.jpg);">
                        <div class="container intro-content">
                            <div class="row text-left pl-4">
                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                    <h3 class="intro-subtitle text-third" style="font-size: 30px; color: #86A0B6;">DIVINE PLANNERS</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title" style="color: white;">Welcome to The</h1>

                                    <div class="intro-price">
                                        <span class="text-third" style="color: white; font-size: 40px;">
                                           EVENT PLANNING
                                        </span>
                                    </div><!-- End .intro-price -->

                                    <a href="#" class="btn btn-round" style="background-color: #86A0B6; color: white;">
                                        <span>Book Appointment</span>
                                    </a>
                                </div><!-- End .col-lg-11 offset-lg-1 -->
                            </div><!-- End .row -->
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->

            </div><!-- End .intro-slider-container -->
        </div>


        <div class="owl-carousel owl-simple" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": false,
                            "margin": 30,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "420": {
                                    "items":3
                                },
                                "600": {
                                    "items":4
                                },
                                "900": {
                                    "items":5
                                },
                                "1024": {
                                    "items":6
                                }
                            }
                        }'>
                        <a href="#" class="brand">
                            <img src="assets/images/brands/1.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/2.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/3.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/4.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/5.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/6.png" alt="Brand Name">
                        </a>
                    </div><!-- End .owl-carousel -->


            <div class="mb-4"></div><!-- End .mb-4 -->


            <div class="mb-3"></div><!-- End .mb-5 -->
            <div id="event_planners"></div>
            <br><br><br>
            <div class="container new-arrivals">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left mt-3">
                        <h2 class="title d-inline mt-4" style="color: #86A0B6; font-family: 'Rajdhani', sans-serif;"><img class="d-inline" src="assets/nav_logo/lavender.png" width="35" height="35"> Event Planners</h2><!-- End .title -->
                    </div><!-- End .heading-left -->
                </div><!-- End .heading -->

                <hr>

                <div id="new_receipe"></div>
                <div class="tab-content tab-content-carousel just-action-icons-sm">
                    <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>

                            <?php if($read_event_planner){ $i = 0; ?>
                            <?php while($result = $read_event_planner->fetch_assoc()){ $i = $i + 1; ?>
                            <div class="product product-2 shadow" style="border-radius: 5px;">
                                <figure class="product-media">
                                    <!--<span class="product-label label-circle label-new">New</span>-->
                                    <a href="event_planning_details - Copy.php?event_planner_id=<?php echo $result['event_planner_id']; ?>">
                                        <img src="<?php echo 'Service_Panel/html/dist/'.$result['company_image'] ?>" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action">
                                        <a href="event_planning_details - Copy.php?event_planner_id=<?php echo $result['event_planner_id']; ?>" class="btn-product" style="font-size: 15px;"><p>Book Appointment</p ></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body py-4">
                                    <div class="product-cat">
                                    Divine Planners
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="event_planning_details - Copy.php?event_planner_id=<?php echo $result['event_planner_id']; ?>" style="color: #86A0B6; font-family: 'Rajdhani', sans-serif; font-size: 20px;"><b><?php echo $result['company_name']; ?></b></a></h3><!-- End .product-title -->
                                    <div class="mt-1">
                                        <i class="fa fa-phone"></i> <?php echo $result['contact_number']; ?>
                                    </div>
                                    <div class="mb-1">
                                        <i class="fa fa-map-marker"></i> <?php echo $result['company_address']; ?>
                                    </div>
                                    <div class="ratings-container">

                                                <!-- Total Review count -->
                                                 <?php
                                                     $event_planner_id = $result['event_planner_id'];
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
                                                       $event_planner_id = $result['event_planner_id'];
                                                       $db   = new Database();
                                                       $sql  = "SELECT sum(rating_value)rating_value FROM tb_review WHERE company_id = $event_planner_id";
                                                       $sum_of_rating_value = $db->select($sql);

                                                       while($getData = $sum_of_rating_value->fetch_assoc())
                                                       {
                                                         $total_rating = $getData['rating_value'];
                                                       }
                                                    ?>

                                                        <!-- Average rating value count -->
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



                                                        <!-- Put rating strat -->
                                                     <?php 

                                                        if($avg_rating == 0)
                                                        {
                                                          ?>

                                                            <i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                          <?php
                                                        }
                                                        else if($avg_rating == 1)
                                                        {
                                                          ?>

                                                            <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                          <?php
                                                        }
                                                        else if($avg_rating == 2)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($avg_rating == 3)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($avg_rating == 4)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($avg_rating >= 5)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i>

                                                            <?php
                                                        }

                                                       ?>

                                                <span class="ratings-text">( <?php echo $total_review; ?> Reviews )</span>
                                            </div><!-- End .rating-container -->
                                    <div class="mt-1">
                                        <a href="event_planning_details.php?event_planner_id=<?php echo $result['event_planner_id']; ?>" class="btn btn-round px-0 py-2 my-1" style="background-color: #86A0B6; color: white;">View Details <i class="icon-long-arrow-right"></i></a>
                                    </div>
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                            <?php } ?>
                            <?php }else{ ?>
                            <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                            echo $msg; ?>
                            <?php } ?>


                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->


                </div><!-- End .tab-content -->
            </div><!-- End .container -->

            <div class="mb-6"></div><!-- End .mb-6 -->
            <div id="catering_services"></div>
            <br><br><br>
            <div class="bg-light pt-5 pb-6">
                <div class="container trending-products">
                    <div class="heading heading-flex mb-3">
                        <div class="heading-left">
                            <h2 class="title d-inline mt-4" style="color: #86A0B6; font-family: 'Rajdhani', sans-serif;"><img class="d-inline" src="assets/nav_logo/lavender.png" width="35" height="35"> Catering Service</h2><!-- End .title -->
                        </div><!-- End .heading-left -->

                       <div class="heading-right">
                            <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="trending-top-link" data-toggle="tab" href="#trending-top-tab" role="tab" aria-controls="trending-top-tab" aria-selected="true">Best Catering Service</a>
                                </li>
                            </ul>
                       </div><!-- End .heading-right -->
                    </div><!-- End .heading -->

                    <div class="row">
                        <div class="col-xl-5col d-none d-xl-block">
                            <div class="banner">
                                    <img src="assets/event_img/bg-9.jpg" alt="banner">
                                    <br>
                                    <img src="assets/event_img/bg-1.jpg" alt="banner">
                            </div><!-- End .banner -->
                        </div><!-- End .col-xl-5col -->

                        <div class="col-xl-4-5col">
                            <div class="tab-content tab-content-carousel just-action-icons-sm">
                                <div class="tab-pane p-0 fade show active" id="trending-top-tab" role="tabpanel" aria-labelledby="trending-top-link">
                                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                        data-owl-options='{
                                            "nav": true, 
                                            "dots": false,
                                            "margin": 20,
                                            "loop": false,
                                            "responsive": {
                                                "0": {
                                                    "items":2
                                                },
                                                "480": {
                                                    "items":2
                                                },
                                                "768": {
                                                    "items":3
                                                },
                                                "992": {
                                                    "items":4
                                                }
                                            }
                                        }'>

                                        <?php if($read_caterer){ $i = 0; ?>
                                        <?php while($result = $read_caterer->fetch_assoc()){ $i = $i + 1; ?>
                                        <div class="product product-2 shadow" style="border-radius: 5px;">
                                            <figure class="product-media">
                                                <!--<span class="product-label label-circle label-new">New</span>-->
                                                <a href="catering_service_details.php?caterer_id=<?php echo $result['caterer_id']; ?>">
                                                    <img src="<?php echo 'Service_Panel/html/dist/'.$result['company_image'] ?>" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action">
                                                    <a href="catering_service_details.php?caterer_id=<?php echo $result['caterer_id']; ?>" class="btn-product" style="font-size: 15px;"><p>Book Appointment</p ></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body py-4">
                                                <div class="product-cat">
                                                Divine Planners
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="catering_service_details.php?caterer_id=<?php echo $result['caterer_id']; ?>" style="color: #86A0B6; font-family: 'Rajdhani', sans-serif; font-size: 20px;"><b><?php echo $result['company_name']; ?></b></a></h3><!-- End .product-title -->
                                                <div class="mt-1">
                                                    <i class="fa fa-phone"></i> <?php echo $result['contact_number']; ?>
                                                </div>
                                                <div class="mb-1">
                                                    <i class="fa fa-map-marker"></i> <?php echo $result['company_address']; ?>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 4 Reviews )</span>
                                                </div><!-- End .rating-container -->
                                                <div class="mt-1">
                                                    <a href="catering_service_details.php?caterer_id=<?php echo $result['caterer_id']; ?>" class="btn btn-round px-0 py-2 my-1" style="background-color: #86A0B6; color: white;">View Details <i class="icon-long-arrow-right"></i></a>
                                                </div>
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                        <?php } ?>
                                        <?php }else{ ?>
                                        <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                                        echo $msg; ?>
                                        <?php } ?>

                                    </div><!-- End .owl-carousel -->
                                </div><!-- .End .tab-pane -->

                            </div><!-- End .tab-content -->
                        </div><!-- End .col-xl-4-5col -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .bg-light pt-5 pb-6 -->

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
                                    <li><a href="login.php">Login</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Account Setting</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="registration.php">Sign In</a></li>
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
                                    <a href="login.php">Login</a>
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
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/demos/demo-4.js"></script>
</body>


<!-- molla/index-4.html  22 Nov 2019 09:54:18 GMT -->
</html>