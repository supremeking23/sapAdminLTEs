<?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");



if(isset($_POST['edit_program'])){
	

	//update query
	$query = "UPDATE tblguidancecouncilor SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', address = '$address', contact = '$contact',birth_date = '$date_birth', gender = '$gender',image = '$gc_profile' WHERE tbl_gc_id = '$gc_id' ";

	$update_program = mysqli_query($connection,$query)or die(mysqli_error($connection));

	if($update_program && mysqli_affected_rows($connection) == 1){
				$_SESSION['success_message'] = "Guidance Councilor Information has been updated";
                redirect_to('../gc_edit_info.php?guidance_councilor='. $gc_id);
			}

		else{
				$_SESSION['failed_message'] = "Cannot update";
				 redirect_to('../gc_edit_info.php?guidance_councilor='. $gc_id);
			}

}

?>