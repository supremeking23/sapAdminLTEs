 <?php
  include("../includes/sessions.php");
  include("../includes/connection.php");
  include("../includes/functions.php");


  ?>                            



<?php 
	if(isset($_POST['upload'])){

		$admin_id = $_SESSION['admin_id'];
		$password = $_POST['password'];

		$verify_by_password = find_password($admin_id,$password);

		if($verify_by_password){

			 if($_FILES['upload-image']['name'] == "") {
               // No file was selected for upload, your (re)action goes here
                //$admin_profile = $_POST['image_name'];
                }else{
                
                $admin_profile = $_FILES['upload-image']['name'];
                $admin_profile_tmp =$_FILES['upload-image']['tmp_name'];

                move_uploaded_file($admin_profile_tmp, "admin_images/$admin_profile");
                		
                $upload_query = "UPDATE tbladmins SET image = '$admin_profile' WHERE admin_id = '$admin_id' ";
                $run_upload = mysqli_query($connection,$upload_query)or die(mysqli_error($connection));

                if($run_upload){
                	$_SESSION['success_message'] = "Profile picture has been updated";
                	redirect_to('admin_profile.php');

                }
            }

		}else{

			$_SESSION['failed_message'] = "wrong password";
			redirect_to('admin_profile.php');
		}

		
	}
?>