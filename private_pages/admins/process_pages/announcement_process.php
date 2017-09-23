<?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");


   date_default_timezone_set('Asia/Taipei');

  if (isset($_POST['postnew'])) {

    $admin_id = $_POST['admin_id'];
    $department_id = $_POST['department_id'];
    $post_content = $_POST['post_content'];


    $query = "INSERT INTO tblannouncements(department_id,user_id,content,post_date) VALUES('$department_id','$admin_id','$post_content',now())";

    $post_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
     if($post_query && mysqli_affected_rows($connection) == 1){
        $_SESSION['success_message'] = "Announcement has been successfully posted";

        //for log

         $log_user_id = $admin_id;
         $date=date("l jS \of F Y ");
         $log_message = "Add Announcement at " . $date;
         $log_header = "Add Announcement";
         insert_log($log_user_id,$log_header,$log_message);
         redirect_to("../index.php");
     }else{
      echo "wala";
     }

  }


    if (isset($_POST['delete_announcement'])) {

    $admin_id = $_POST['admin_id'];
    $admin_password = $_POST['password'];
    $announcement_id = $_POST['announcement_id'];
    //$department_id = $_POST['department_id'];
    //$post_content = $_POST['post_content'];


    $find_password = find_password($admin_id,$admin_password);

    if($find_password){
      //delete
      $query = "DELETE FROM tblannouncements WHERE announcement_id = '$announcement_id'";
      $delete_query = mysqli_query($connection,$query);
       if($delete_query && mysqli_affected_rows($connection) == 1){
          $_SESSION['success_message'] = "Announcement has been successfully deleted";
           $log_user_id = $admin_id;
           $date=date("l jS \of F Y ");
           $log_message = "Delete Announcement at " . $date;
           $log_header = "Delete Announcement";
           insert_log($log_user_id,$log_header,$log_message);
           redirect_to("../index.php");
       }
    
    }else{
      $_SESSION['failed_message'] = "Wrong Password";
      redirect_to("../index.php");
    }
  

  }
  


 
 //echo $_POST['event_name'] . "hahahahahhahahhaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaahhhhh";
?>
