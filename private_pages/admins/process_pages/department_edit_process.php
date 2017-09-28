<?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");


 

 if(isset($_POST['update_mission'])){
      
      $department_id = mysql_prep($_POST['department_id']);
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
  

    $department_id = mysql_prep($_POST['department_id']);
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
      $first_name = mysql_prep($_POST['first_name']);
      $middle_name = mysql_pre($_POST['middle_name']);
      $last_name = mysql_prep($_POST['last_name']);
      $email = mysql_prep($_POST['email']);
      $address = mysql_prep($_POST['address']);
      $contact = mysql_prep($_POST['contact']);
      $date_birth = mysql_prep($_POST['date_birth']);
      $department_id = mysql_prep($_POST['department_id']);
      $deans_id = mysql_prep($_POST['deans_id']);

      if($_FILES['upload_image']['name'] == "") {
    // No file was selected for upload, your (re)action goes here
          $dean_profile = $_POST['image_name'];
      }else{
            $dean_profile = $_FILES['upload_image']['name'];
            $dean_profile_tmp =$_FILES['upload_image']['tmp_name'];

          move_uploaded_file($dean_profile_tmp, "../deans image/$dean_profile");
      }


      //update query
      $query = "UPDATE tbldepartmentheads SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', address = '$address', contact = '$contact', date_birth = '$date_birth',image = '$dean_profile',email = '$email',dean_since=now() WHERE id = '$deans_id' ";

      $update_dean = mysqli_query($connection,$query)or die(mysqli_error($connection));

      if($update_dean && mysqli_affected_rows($connection) == 1){
            $_SESSION['success_message'] = "Dean Information has been updated";
                    redirect_to('../department_info.php?department_id='. $department_id);
          }

        else{
            $_SESSION['failed_message'] = "Cannot update";
            redirect_to('../department_info.php?department_id=' . $department_id);
          }

 }


 if(isset($_POST['add_dean'])){
      $first_name = mysql_prep($_POST['first_name']);
      $middle_name = mysql_prep($_POST['middle_name']);
      $last_name = mysql_prep($_POST['last_name']);
      $email = mysql_prep($_POST['email']);
      $address = mysql_prep($_POST['address']);
      $contact = mysql_prep($_POST['contact']);
      $date_birth = mysql_prep($_POST['date_birth']);
      $department_id = mysql_prep($_POST['department_id']);
      $gender = mysql_prep($_POST['gender']);
      //$deans_id = $_POST['deans_id'];

    
            $dean_profile = $_FILES['upload_image']['name'];
            $dean_profile_tmp =$_FILES['upload_image']['tmp_name'];

          move_uploaded_file($dean_profile_tmp, "../deans image/$dean_profile");
      


      //insert query
     $query = "INSERT INTO tbldepartmentheads(first_name,middle_name,last_name,address,date_birth,image,email,contact,department_id,gender,dean_since) VALUES('$first_name','$middle_name','$last_name','$address','$date_birth','$dean_profile','$email','$contact','$department_id','$gender',now())";

      $update_dean = mysqli_query($connection,$query)or die(mysqli_error($connection));

      if($update_dean && mysqli_affected_rows($connection) == 1){
            $_SESSION['success_message'] = "Dean Information has been added";
                    redirect_to('../department_info.php?department_id='. $department_id);
          }

        else{
            $_SESSION['failed_message'] = "Cannot add";
            redirect_to('../department_info.php?department_id=' . $department_id);
          }

 }


 

if(isset($_POST['modify_banner'])){

    $department_id =  mysql_prep($_POST['department_id']);
    $admin_id =  mysql_prep($_POST['admin_id']);
    $password = mysql_prep($_POST['password']);

    $verify_by_password = find_password($admin_id,$password);

    if($verify_by_password){  

        if($_FILES['upload-logo']['name'] == "") { // no data in the input type file

              $department_logo = $_POST['logo_name'];
        }else{

             $department_logo = mysql_prep($_FILES['upload-logo']['name']);
             $department_logo_tmp =$_FILES['upload-logo']['tmp_name'];
             move_uploaded_file($department_logo_tmp, "../department logos/$department_logo");
        }


        if($_FILES['upload-banner']['name'] == "") { // no data in the input type file

              $department_banner = $_POST['banner_name'];

        }else{

             $department_banner = mysql_prep($_FILES['upload-banner']['name']);
             $department_banner_tmp =$_FILES['upload-banner']['tmp_name'];
             move_uploaded_file($department_banner_tmp, "../department logos/$department_banner");
        }
       

        

        $query = "UPDATE tbldepartments SET department_logo = '$department_logo', department_banner = '$department_banner' WHERE department_id = '$department_id'";

        $run_query =  mysqli_query($connection,$query)or die(mysqli_error($connection));


         if($run_query && mysqli_affected_rows($connection) == 1){
                $_SESSION['success_message'] = "Department logo and banner has been successfully updated";
                redirect_to('../department_info.php?department_id='. $department_id);
                echo  $department_id;
              }

            else{
                $_SESSION['failed_message'] = "Cannot update";
               redirect_to('../department_info.php?department_id=' . $department_id);
                 echo  $department_id;
              }

     }//end password verify
     
     else{
            $_SESSION['failed_message'] = "Incorrect Password";
            redirect_to('../department_info.php?department_id=' . $department_id);
     }         

}








     // stop... remaining mission and vission student add via excel

      /*
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).


      */






 //echo $_POST['event_name'] . "hahahahahhahahhaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaahhhhh";
?>
