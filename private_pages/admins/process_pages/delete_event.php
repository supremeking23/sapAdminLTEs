<?php 
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");
?>

<?php 
    //header("Content-Type: application/json", true);
      
      if(isset($_POST['delete_event_single'])){
            $event_id = $_POST['event_id'];
            $admin_id = $_POST['admin_id'];
            $query = "DELETE FROM tblevents WHERE id = '$event_id'";
            $run_query = mysqli_query($connection,$query);

              if(mysqli_query($connection,$query)or die(mysqli_error($connection))){
                $_SESSION['success_message'] = "Event has been  successfully deleted" ;
                 $log_user_id = $admin_id;
                 $date=date("l jS \of F Y ");
                 $log_message = "Delete Event at " . $date;
                 $log_header = "Delete Event";
                 insert_log($log_user_id,$log_header,$log_message);
                 redirect_to("../all_events.php");
              }else{
                
              }
          
      }

      if(isset($_POST['delete_event_multiple'])){
          $event_id = $_POST['event_id'];
            $admin_id = $_POST['admin_id'];
            $query = "DELETE FROM tblevents WHERE id = '$event_id'";
            $run_query = mysqli_query($connection,$query);

              if(mysqli_query($connection,$query)or die(mysqli_error($connection))){
                $_SESSION['success_message'] = "Event has been  successfully deleted" ;
                 $log_user_id = $admin_id;
                 $date=date("l jS \of F Y ");
                 $log_message = "Delete Event at " . $date;
                 $log_header = "Delete Event";
                 insert_log($log_user_id,$log_header,$log_message);
                 redirect_to("../all_events.php");
              }else{
                
              }
      }

    
  
?>