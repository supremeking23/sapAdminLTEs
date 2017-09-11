<?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");


 

  if (isset($_POST['edit_event_single'])) {

  		# code...
  	    //try
        if(isset($_POST['event_name'])){
        $event_id = $_POST['event_id'];
        $single_day= $_POST['single_day'];
        $single_time = $_POST['single_time'];
        $event_name = $_POST['event_name'];
        $admin_id =  $_POST['admin_id'];
       $department = $_POST['department'];
        $type = "Single day event";
        $query = "UPDATE tblevents SET start='$single_day',start_time ='$single_time',department_id = '$department',title = '$event_name' WHERE id=' $event_id' ";

        if(mysqli_query($connection,$query)or die(mysqli_error($connection))){
          $_SESSION['success_message'] = "Event has been  successfully updated" ;
           $log_user_id =$admin_id;
            $date=date("l jS \of F Y ");
            $log_message = "Update Event at " . $date;
            $log_header = "Update Event";
            insert_log($log_user_id,$log_header,$log_message);
            redirect_to("../all_events.php");
       
       }else{
		    //$_SESSION['failed_message'] = "nothing is set " . $single_day . " sddsds " . $single_time;
		    //echo "sdsdsd ivan";
		  }
 
  	}
  }
  


  if (isset($_POST['submit_event_multiple'])) {

  	# code...
  	 if(isset($_POST['event_name'])){


      $event_id = $_POST['event_id'];
      $date_from= $_POST['date_from'];
      $time_from = $_POST['time_from'];

      $date_to= $_POST['date_to'];
      $time_to = $_POST['time_to'];

      $event_name = $_POST['event_name'];
      $admin_id =  $_POST['admin_id'];
      $department = $_POST['department'];
      $type = "Multiple Day Event";
      $query = "UPDATE tblevents SET start='$date_from',start_time ='$time_from',end = '$date_to',end_time = '$time_to',department_id = '$department',title = '$event_name' WHERE id=' $event_id' ";

      if(mysqli_query($connection,$query)or die(mysqli_error($connection))){
        $_SESSION['success_message'] = "Event has been  successfully updated" ;
         $log_user_id = $admin_id;
         $date=date("l jS \of F Y ");
         $log_message = "Update Event at " . $date;
         $log_header = "Update Event";
         insert_log($log_user_id,$log_header,$log_message);
         redirect_to("../all_events.php");
      }


  	
  }

}
  	
  




 //echo $_POST['event_name'] . "hahahahahhahahhaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaahhhhh";
?>
