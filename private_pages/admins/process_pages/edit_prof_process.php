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
	$prof_id = $_POST['prof_id'];


	if($_FILES['upload_image']['name'] == "") {
		// No file was selected for upload, your (re)action goes here
		    $professor_profile = $_POST['image_name'];
		}else{
		      $professor_profile = $_FILES['upload_image']['name'];
		      $professor_profile_tmp =$_FILES['upload_image']['tmp_name'];

		    move_uploaded_file($professor_profile_tmp, "../../professor_images/$professor_profile");
		}


	//update query
	$query = "UPDATE tblprofessor SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', address = '$address', contact = '$contact', date_birth = '$date_birth', gender = '$gender',image = '$professor_profile' WHERE tbl_prof_id = '$prof_id' ";

	$update_prof = mysqli_query($connection,$query)or die(mysqli_error($connection));

	if($update_prof && mysqli_affected_rows($connection) == 1){
				$_SESSION['success_message'] = "Professor Information has been updated";
                redirect_to('../prof_edit_info.php?professor_id='. $prof_id);
			}

		else{
				$_SESSION['failed_message'] = "Cannot update";
				redirect_to('../prof_edit_info.php?professor_id='. $prof_id);
			}

}

?>