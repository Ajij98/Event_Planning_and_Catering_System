<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:../../../login.php');
  }
 ?>

 


  <!--Event Planner Payment Activation Section-->
  <?php
   $db = new Database();

     if(isset($_GET['payment_id']))
     {
       $payment_id = $_GET['payment_id'];

       $sql = "SELECT is_accepted FROM tb_event_planner_payment WHERE is_accepted = 0 AND payment_id = $payment_id LIMIT 1";

       $result = $db->link->query($sql) or die($this->link->error.__LINE__);

       if($result->num_rows == 1)
       {
         $sql = "UPDATE tb_event_planner_payment SET is_accepted = 1 WHERE payment_id = $payment_id LIMIT 1";

         $update = $db->link->query($sql) or die($this->link->error.__LINE__);

         if($update)
         {
           ?>
           <script type="text/javascript">

             window.alert("Payment accepted successfully.");
             window.location='event_panner_payment.php';

           </script>
           <?php
         }
         else
         {
           echo $db->link->error;
         }
       }
       else
       {
         $msg = '<br /><br /><br /><div class="alert alert-danger w-50 m-auto text-center">Something went wrong!</div><br />';
         echo $msg;
       }
     }
     else
     {
       die("Something went wrong!");
     }
   ?>
