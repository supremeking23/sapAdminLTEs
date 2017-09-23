<?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");



if(isset($_POST['admin_delete'])){

	$admin_id = $_POST['admin_id'];
	$delete_admin = $_POST['delete_admin'];
	$admin_password = $_POST['admin_password'];

	$find_password = find_password($admin_id,$admin_password);

	if($find_password){
		$query = "UPDATE tbladmins SET isActive = 0 WHERE admin_id = '$delete_admin'";

		$delete_admin_process = mysqli_query($connection,$query)or die(mysqli_error($connection));
		if($delete_admin_process && mysqli_affected_rows($connection) == 1){
				$_SESSION['success_message'] = "Admin has been deleted";
                redirect_to('../admins.php');
			}

		else{
				$_SESSION['failed_message'] = "Cannot delete";
				redirect_to('../admins.php');
			}
	}else{
		$_SESSION['failed_message'] = "Wrong Password";
  			redirect_to("../admins.php");
	}
}

?>