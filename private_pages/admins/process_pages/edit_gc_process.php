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
	$gc_id = $_POST['gc_id'];


	if($_FILES['upload_image']['name'] == "") {
		// No file was selected for upload, your (re)action goes here
		    $gc_profile = $_POST['image_name'];
		}else{
		    $gc_profile = $_FILES['upload_image']['name'];
		    $gc_profile_tmp =$_FILES['upload_image']['tmp_name'];

		    move_uploaded_file($admin_profile_tmp, "../../gc_images/$gc_profile");
		}


	//update query
	$query = "UPDATE tblguidancecouncilor SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', address = '$address', contact = '$contact',birth_date = '$date_birth', gender = '$gender',image = '$gc_profile' WHERE tbl_gc_id = '$gc_id' ";

	$update_admin = mysqli_query($connection,$query)or die(mysqli_error($connection));

	if($update_admin && mysqli_affected_rows($connection) == 1){
				$_SESSION['success_message'] = "Guidance Councilor Information has been updated";
                redirect_to('../gc_edit_info.php?guidance_councilor='. $gc_id);
			}

		else{
				$_SESSION['failed_message'] = "Cannot update";
				 redirect_to('../gc_edit_info.php?guidance_councilor='. $gc_id);
			}

}

?>