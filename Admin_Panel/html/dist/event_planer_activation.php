<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:../../../login.php');
  }
 ?>

 


  <!--Event Planner Activation Section-->
  <?php
   $db = new Database();

     if(isset($_GET['event_planner_id']))
     {
       $event_planner_id = $_GET['event_planner_id'];

       $sql = "SELECT is_verified FROM tb_event_planner WHERE is_verified = 0 AND event_planner_id = $event_planner_id LIMIT 1";

       $result = $db->link->query($sql) or die($this->link->error.__LINE__);

       if($result->num_rows == 1)
       {
         $sql = "UPDATE tb_event_planner SET is_verified = 1 WHERE event_planner_id = $event_planner_id LIMIT 1";

         $update = $db->link->query($sql) or die($this->link->error.__LINE__);

         if($update)
         {
           ?>
           <script type="text/javascript">

             window.alert("Event activated successfully.");
             window.location='manage_event_planners.php';

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
