<?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");



if(isset($_POST['edit_info'])){
	$first_name =  $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$last_name = $_POST['last_name'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$date_birth = $_POST['date_birth'];
	$gender = $_POST['gender'];
	$admin_id = $_POST['admin_id'];


	if($_FILES['upload_image']['name'] == "") {
		// No file was selected for upload, your (re)action goes here
		    $admin_profile = $_POST['image_name'];
		}else{
		      $admin_profile = $_FILES['upload_image']['name'];
		    $admin_profile_tmp =$_FILES['upload_image']['tmp_name'];

		    move_uploaded_file($admin_profile_tmp, "../admin_images/$admin_profile");
		}


	//update query
	$query = "UPDATE tbladmins SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', address = '$address', contact = '$contact', date_birth = '$date_birth', gender = '$gender',image = '$admin_profile' WHERE admin_id = '$admin_id' ";

	$update_admin = mysqli_query($connection,$query)or die(mysqli_error($connection));

	if($update_admin && mysqli_affected_rows($connection) == 1){
				$_SESSION['success_message'] = "Admin Information has been updated";
                redirect_to('../admin_edit_info.php?admin_id='. $admin_id);
			}

		else{
				$_SESSION['failed_message'] = "Cannot update";
				redirect_to('../admin_edit_info.php?admin_id=' . $admin_id);
			}

}

?>