<?php
  session_start();
  include "include/Config.php";
  include "include/Database.php";
 ?>



 <!--User login section (USE BINARY KEYWORD FOR CASE SENSETIVE LOGIN INFORMATION)-->
 <?php
   $msg = "";
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
  if(isset($_POST['submit']))
  {
      $user_name = $_POST['user_name'];
      $password  = $_POST['password'];

      $sql = "SELECT * FROM tb_user WHERE BINARY user_name = '$user_name' AND BINARY password = '$password' LIMIT 1";

      $result = $db->link->query($sql) or die($this->link->error.__LINE__);

      if($result->num_rows != 0)
      {
        while($getData = $result->fetch_assoc())
        {
            $user_type = $getData['user_type'];
        }

        if($user_type == "Admin")
        {
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_type'] = $user_type;
            header('location: Admin_Panel/html/dist/index.php');
        }
        else if($user_type == "Event Planner")
        {
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_type'] = $user_type;
            header('location: Event_Planner_Panel/html/dist/index.php');
        }
        else if($user_type == "Caterer")
        {
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_type'] = $user_type;
            header('location: Caterer_Panel/html/dist/index.php');
        }
        else if($user_type == "Customer")
        {
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_type'] = $user_type;
            header('location: Customer_Panel/index.php');
        }

      }
      else
      {
        ?>

           <script type="text/javascript">
             window.alert("Incorrect Username or Password. Please try again!");
             window.location='login.php';
           </script>

          <?php
      }
  }
  ?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Divine Planners - Sign In</title>

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

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">

                        <a href="index.php">
                          <h4 class="mt-0 mb-0 py-0 d-inline" style="font-family: 'Lobster', cursive; font-size: 28px; color: #86A0B6; text-decoration: none;"><img class="d-inline mb-2" src="assets/nav_logo/lavender.png" width="35" height="35"><span style="color: black;">Divine</span> Planners</h4>
                        </a>
                        
                        <figure><img src="login_registration_assets/images/signin-image.jpg" alt="sing up image"></figure>
                        <p class="text-muted text-center">Don't have an account?</p>
                        <a href="registration.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <label for="user_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="user_name" id="user_name" placeholder="User Name" required />
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Log in"/>
                            </div>
                        </form>
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