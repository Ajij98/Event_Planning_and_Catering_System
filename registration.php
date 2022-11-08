<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

 ?>

<!--User registration section-->
<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  $db = new Database();
  $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
  date_default_timezone_set('Asia/Dhaka');

  if(isset($_POST['submit']))
  {
    if(checkEmail())
    {
      if(checkUsername())
      {
        if(matchPassword())
        {
          $name      = $_POST['name'];
          $email     = $_POST['email'];
          $phone     = $_POST['phone'];
          $address   = $_POST['address'];
          $user_name = $_POST['user_name'];
          $password  = $_POST['password'];
          $user_type = $_POST['user_type'];

          $sql = "INSERT INTO          tb_user(name,email,phone,address,user_name,password,user_type,entry_time)values('$name','$email','$phone','$address','$user_name','$password','$user_type','$current_datetime')";
          $insert_row = $db->insert($sql);

          if($insert_row)
          {
            ?>

           <script type="text/javascript">
             window.alert("Registration successfull, You may login now. Thank You!");
             window.location='login.php';
           </script>

           <?php

          }
          else {
            $msg = '<div class="alert alert-danger w-50 m-auto"><strong>Error !</strong> Something went wrong !</div><br />';
          }
        }
      }
    }
  }
  function checkEmail()
  {
    $db     = new Database();
    $sql    = "SELECT * FROM tb_user WHERE email='".$_POST['email']."'";
    $result = $db->link->query($sql) or die($this->link->error.__LINE__);
    if($result->num_rows > 0)
    {
        ?>
           <script type="text/javascript">
             window.alert("Warning! This email already exist, Try another one pls.");
           </script>
        <?php
      return false;
    }
    else
    {
      return true;
    }
  }
  function checkUsername()
  {
    $db     = new Database();
    $sql    = "SELECT * FROM tb_user WHERE user_name='".$_POST['user_name']."'";
    $result = $db->link->query($sql) or die($this->link->error.__LINE__);
    if($result->num_rows > 0)
    {
        ?>
           <script type="text/javascript">
             window.alert("Warning ! This username already exist, Try another one pls.");
           </script>
        <?php
      return false;
    }
    else
    {
      return true;
    }
  }
  function matchPassword(){
    if($_POST['password'] !== $_POST['confirm_password'])
    {
        ?>
           <script type="text/javascript">
             window.alert("Warning ! Password and Confirm password should match.");
           </script>
        <?php
      return false;
    }
    else
    {
      return true;
    }
  }
 ?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Divine Planners - Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="login_registration_assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="login_registration_assets/css/style.css">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/icons/lavender.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/lavender.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icons/lavender.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/icons/lavender.png" color="#666666">
    <link rel="shortcut icon" href="assets/icons/lavender.png">

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

    <div class="main" style="padding-top: 50px;">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign Up</h2>
                        <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="phone" name="phone" id="phone" placeholder="Your Phone" required/>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-map"></i></label>
                                <input type="address" name="address" id="address" placeholder="Your Address" required/>
                            </div>
                            <div class="form-group">
                                <label for="user_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="user_name" id="user_name" placeholder="User Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Repeat your password" required/>
                            </div>

                            <h4>Select user type</h4><hr>
                            <div class="form-check form-group">
                              <input class="form-check-input" type="radio" name="user_type" id="user_type_1" value="Event Planner">
                              <label class="form-check-label" for="user_type_1">
                                Event Planner
                              </label>
                            </div>

                            <div class="form-check form-group">
                              <input class="form-check-input" type="radio" name="user_type" id="user_type_2" value="Caterer">
                              <label class="form-check-label" for="user_type_2">
                                Caterer
                              </label>
                            </div>

                            <div class="form-check form-group">
                              <input class="form-check-input" type="radio" name="user_type" id="user_type_3" value="Customer">
                              <label class="form-check-label" for="user_type_3">
                                Customer
                              </label>
                            </div>


                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"/>
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">

                        <a href="index.php">
                          <h4 class="mt-0 mb-0 py-0 d-inline" style="font-family: 'Lobster', cursive; font-size: 28px; color: #86A0B6;"><img class="d-inline mb-2" src="assets/nav_logo/lavender.png" width="35" height="35"><span style="color: black;">Divine</span> Planners</h4>
                        </a>

                        <figure><img src="login_registration_assets/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="login_registration_assets/vendor/jquery/jquery.min.js"></script>
    <script src="login_registration_assets/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>