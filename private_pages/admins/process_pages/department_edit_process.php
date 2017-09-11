<?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");


 

 if(isset($_POST['update_mission'])){
      
      $department_id = $_POST['department_id'];
      $mission = mysql_prep($_POST['mission']);


      
      $query = "UPDATE tbldepartments SET mission = '$mission' WHERE department_id = '$department_id' ";

      $update_mission = mysqli_query($connection,$query)or die(mysqli_error($connection));

      if($update_mission && mysqli_affected_rows($connection) == 1){
            $_SESSION['success_message'] = "Department Mission has been updated";
                    redirect_to('../department_info.php?department_id='. $department_id);
          }

        else{
            $_SESSION['failed_message'] = "Cannot update";
            redirect_to('../department_info.php?department_id=' . $department_id);
          }
 }

  if(isset($_POST['update_vision'])){
  

    $department_id = $_POST['department_id'];
      $vision = mysql_prep($_POST['vision']);


      
      $query = "UPDATE tbldepartments SET vision = '$vision' WHERE department_id = '$department_id' ";

      $update_vision = mysqli_query($connection,$query)or die(mysqli_error($connection));

      if($update_vision && mysqli_affected_rows($connection) == 1){
            $_SESSION['success_message'] = "Department Mission has been updated";
                    redirect_to('../department_info.php?department_id='. $department_id);
          }

        else{
            $_SESSION['failed_message'] = "Cannot update";
            redirect_to('../department_info.php?department_id=' . $department_id);
          }

 }

  if(isset($_POST['update_dean'])){
  
   




  

      $first_name = $_POST['first_name'];
      $middle_name = $_POST['middle_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $contact = $_POST['contact'];
      $date_birth = $_POST['date_birth'];
      $department_id = $_POST['department_id'];
      $deans_id = $_POST['deans_id'];

      if($_FILES['upload_image']['name'] == "") {
    // No file was selected for upload, your (re)action goes here
          $dean_profile = $_POST['image_name'];
      }else{
            $dean_profile = $_FILES['upload_image']['name'];
            $dean_profile_tmp =$_FILES['upload_image']['tmp_name'];

          move_uploaded_file($dean_profile_tmp, "../deans image/$dean_profile");
      }


      //update query
      $query = "UPDATE tbldepartmentheads SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', address = '$address', contact = '$contact', date_birth = '$date_birth',image = '$dean_profile',email = '$email' WHERE id = '$deans_id' ";

      $update_dean = mysqli_query($connection,$query)or die(mysqli_error($connection));

      if($update_dean && mysqli_affected_rows($connection) == 1){
            $_SESSION['success_message'] = "Dean Information has been updated";
                    redirect_to('../department_info.php?department_id='. $department_id);
          }

        else{
            $_SESSION['failed_message'] = "Cannot update";
            redirect_to('../department_info.php?department_id=' . $department_id);
          }


    



      // stop... remaining mission and vission student add via excel

      /*
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).


      */

 }


 



 //echo $_POST['event_name'] . "hahahahahhahahhaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaahhhhh";
?>
