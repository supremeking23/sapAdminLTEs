<?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");


  header("Content-Type: application/json", true);
  //try
  if(isset($_POST['event_name'])){
      $date_from= $_POST['date_from'];
      $time_from = $_POST['time_from'];

      $date_to= $_POST['date_to'];
      $time_to = $_POST['time_to'];

      $event_name = $_POST['event_name'];
       $admin_id =  $_POST['admin_id'];
        $department = $_POST['department'];
      $type = "Multiple Day Event";
      $query = "INSERT INTO tblevents(start,start_time,end,end_time,title,type,admin_id,department_id) VALUES('$date_from','$time_from','$date_to','$time_to','$event_name','$type','$admin_id','$department')";

      if(mysqli_query($connection,$query)or die(mysqli_error($connection))){
        $_SESSION['success_message'] = "Event has been  successfully scheduled" ;
         $log_user_id = $admin_id;
         $date=date("l jS \of F Y ");
         $log_message = "Add Event at " . $date;
         $log_header = "Add Event";
         insert_log($log_user_id,$log_header,$log_message);
      }
     
  }else{
    //$_SESSION['failed_message'] = "nothing is set " . $single_day . " sddsds " . $single_time;
  }
 

 //echo $_POST['event_name'] . "hahahahahhahahhaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaahhhhh";
?>
