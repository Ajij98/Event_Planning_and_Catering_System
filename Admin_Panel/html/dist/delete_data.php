<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:../../../login.php');
  }
 ?>


          <!-- Delete Event Planner Details -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['event_planner_id']))
            {
              $event_planner_id = $_GET['event_planner_id'];

              $sql = "DELETE FROM tb_event_planner WHERE event_planner_id = $event_planner_id";

              $delete_row = $db->delete($sql);

              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Event Planner details deleted successfully.");
                  window.location='manage_event_planners.php';

                </script>

                <?php
              }
              else
              {
                $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                echo $msg;
                return false;
              }
            }
            ?>



            <!-- Delete Event Planner Payment Details -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['event_payment_id']))
            {
              $event_payment_id = $_GET['event_payment_id'];

              $sql = "DELETE FROM tb_event_planner_payment WHERE payment_id = $event_payment_id";

              $delete_row = $db->delete($sql);

              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Event Planner Payment details deleted successfully.");
                  window.location='event_panner_payment.php';

                </script>

                <?php
              }
              else
              {
                $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                echo $msg;
                return false;
              }
            }
            ?>






            <!-- Delete Caterer Details -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['caterer_id']))
            {
              $caterer_id = $_GET['caterer_id'];

              $sql = "DELETE FROM tb_caterer WHERE caterer_id = $caterer_id";

              $delete_row = $db->delete($sql);

              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Caterer details deleted successfully.");
                  window.location='manage_caterer.php';

                </script>

                <?php
              }
              else
              {
                $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                echo $msg;
                return false;
              }
            }
            ?>



            <!-- Delete Caterer Payment Details -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['caterer_payment_id']))
            {
              $caterer_payment_id = $_GET['caterer_payment_id'];

              $sql = "DELETE FROM tb_caterer_payment WHERE payment_id = $caterer_payment_id";

              $delete_row = $db->delete($sql);

              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Caterer Payment details deleted successfully.");
                  window.location='catering_service_payment.php';

                </script>

                <?php
              }
              else
              {
                $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                echo $msg;
                return false;
              }
            }
            ?>





            <!-- Delete Registered Event_Planner/Caterer (user) -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['planner_caterer_user_id']))
            {
              $planner_caterer_user_id = $_GET['planner_caterer_user_id'];

              $sql = "DELETE FROM tb_user WHERE user_id = $planner_caterer_user_id";
              $delete_row = $db->delete($sql);
              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Planner/Caterer details deleted successfully.");
                  window.location='registered_planner_and_caterer.php';

                </script>

                <?php
              }
              else
              {
                $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                echo $msg;
                return false;
              }
            }
            ?>




            <!-- Delete Registered Customer (user) -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['customer_user_id']))
            {
              $customer_user_id = $_GET['customer_user_id'];

              $sql = "DELETE FROM tb_user WHERE user_id = $customer_user_id";
              $delete_row = $db->delete($sql);
              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Customer details deleted successfully.");
                  window.location='registered_customer.php';

                </script>

                <?php
              }
              else
              {
                $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                echo $msg;
                return false;
              }
            }
            ?>











