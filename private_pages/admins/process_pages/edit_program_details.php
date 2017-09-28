<?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");



if(isset($_POST['edit_program'])){
	
	$program_id = mysql_prep($_POST['program_id']);
	$program_name = mysql_prep($_POST['program_name']);
	$program_description = mysql_prep($_POST['program_description']);
	$program_code = mysql_prep($_POST['program_code']);
	$department_id = mysql_prep($_POST['department_id']);
	//update query
	 $query = "UPDATE tblcollegeprograms SET program_description = '$program_description', program_code = '$program_code', program_name = '$program_name' WHERE program_id = '$program_id' ";

	$update_program = mysqli_query($connection,$query)or die(mysqli_error($connection));

	if($update_program && mysqli_affected_rows($connection) == 1){
				$_SESSION['success_message'] = "Program Information has been updated";
                redirect_to('../department_info.php?department_id='. $department_id);
                echo "0k";
			}

		else{
				$_SESSION['failed_message'] = "Cannot update";
				 redirect_to('../department_info.php?department_id='. $department_id);
			}

}

?>