<?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");


 

  if (isset($_POST['submit_event_single'])) {

  		# code...
  	    //try
        if(isset($_POST['event_name'])){
        $single_day= $_POST['single_day'];
        $single_time = $_POST['single_time'];
        $event_name = $_POST['event_name'];
        $admin_id =  $_POST['admin_id'];
        $department = $_POST['department'];
        $type = "Single day event";
        $query = "INSERT INTO tblevents(start,start_time,title,type,department_id,admin_id) VALUES('$single_day','$single_time','$event_name','$type','$department','$admin_id')";

        if(mysqli_query($connection,$query)or die(mysqli_error($connection))){
          $_SESSION['success_message'] = "Event has been  successfully scheduled" ;
           $log_user_id =$admin_id;
            $date=date("l jS \of F Y ");
            $log_message = "Add Event at " . $date;
            $log_header = "Add Event";
            insert_log($log_user_id,$log_header,$log_message);
            redirect_to("../index.php");
       
       }else{
		    //$_SESSION['failed_message'] = "nothing is set " . $single_day . " sddsds " . $single_time;
		    //echo "sdsdsd ivan";
		  }
 
  	}
  }
  


  if (isset($_POST['submit_event_multiple'])) {

  	# code...
  	 if(isset($_POST['event_name'])){
      $date_from= $_POST['date_from'];
      $time_from = $_POST['time_from'];

      $date_to= $_POST['date_to'];
      $time_to = $_POST['time_to'];

      $event_name = $_POST['event_name'];
       $admin_id =  $_POST['admin_id'];
        $department = $_POST['department'];
      $type = "Multiple Day Event";
    echo  $query = "INSERT INTO tblevents(start,start_time,end,end_time,title,type,admin_id,department_id) VALUES('$date_from','$time_from','$date_to','$time_to','$event_name','$type','$admin_id','$department')";

      if(mysqli_query($connection,$query)or die(mysqli_error($connection))){
        $_SESSION['success_message'] = "Event has been  successfully scheduled" ;
         $log_user_id = $admin_id;
         $date=date("l jS \of F Y ");
         $log_message = "Add Event at " . $date;
         $log_header = "Add Event";
         insert_log($log_user_id,$log_header,$log_message);
         redirect_to("../index.php");
      }


  	
  }

}
  	
  




 //echo $_POST['event_name'] . "hahahahahhahahhaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaahhhhh";
?>
