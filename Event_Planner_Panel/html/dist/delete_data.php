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

            if(isset($_GET['payment_id']))
            {
              $payment_id = $_GET['payment_id'];

              $sql = "DELETE FROM tb_event_planner_payment WHERE payment_id = $payment_id";

              $delete_row = $db->delete($sql);

              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Event Planner Payment details deleted successfully.");
                  window.location='event_planner_payment.php';

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




            <!-- Delete Event Package Details -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['event_package_id']))
            {
              $event_package_id = $_GET['event_package_id'];

              $sql = "DELETE FROM tb_event_package WHERE event_package_id = $event_package_id";

              $delete_row = $db->delete($sql);

              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Event Package details deleted successfully.");
                  window.location='add_event_package.php?event_planner_id=<?php echo $event_planner_id; ?>';

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

            if(isset($_GET['payment_id']))
            {
              $payment_id = $_GET['payment_id'];

              $sql = "DELETE FROM tb_caterer_payment WHERE payment_id = $payment_id";

              $delete_row = $db->delete($sql);

              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Caterer Payment details deleted successfully.");
                  window.location='manage_catering_service_payment.php';

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



            <!-- Delete Catering Package Details -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['catering_service_id']))
            {
              $catering_service_id = $_GET['catering_service_id'];
              $caterer_id          = $_GET['caterer_id'];

              $sql = "DELETE FROM tb_catering_package WHERE catering_service_id = $catering_service_id";

              $delete_row = $db->delete($sql);

              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Catering Package details deleted successfully.");
                  window.location='add_catering_package.php?caterer_id=<?php echo $caterer_id; ?>';

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





            <!-- Delete Customer Booking Details -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['booking_id']))
            {
              $booking_id = $_GET['booking_id'];

              $sql = "DELETE FROM tb_event_catering_booking WHERE booking_id = $booking_id";

              $delete_row = $db->delete($sql);

              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Customer Booking details deleted successfully.");
                  window.location='customer_booking.php';

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



            <!-- Delete Customer Booking Payment -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['payment_id']))
            {
              $payment_id = $_GET['payment_id'];

              $sql = "DELETE FROM tb_booking_payment WHERE payment_id = $payment_id";
              $delete_row = $db->delete($sql);
              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Booking payment deleted successfully.");
                  window.location='booking_payment.php';

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




            <!-- Delete Customer Review -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['review_id']))
            {
              $review_id = $_GET['review_id'];

              $sql = "DELETE FROM tb_review WHERE review_id = $review_id";
              $delete_row = $db->delete($sql);
              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Review deleted successfully.");
                  window.location='customer_feedback.php';

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











