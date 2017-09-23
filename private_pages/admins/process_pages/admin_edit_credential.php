 <?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");

  ?>                            
<?php //date_default_timezone_set('Asia/Taipei');
	//if ($run_query && mysqli_affected_rows($connection) == 1) {}
?>

<?php 
	if(isset($_POST['edit_email'])){
		$admin_id = $_SESSION['admin_id'];
		$new_email = $_POST['new_email'];
		$password = $_POST['password'];


		$find_password = find_password($admin_id,$password);

		if($find_password){
			$query_change_email = "UPDATE tbladmins SET email = '$new_email' WHERE admin_id = '$admin_id'";
			$run_query_change_email = mysqli_query($connection,$query_change_email)or die(mysqli_error($connection));

			if($run_query_change_email && mysqli_affected_rows($connection) == 1){
				$_SESSION['success_message'] = "Email has been updated";
                redirect_to('../admin_profile.php');
			}

		}else{
				$_SESSION['failed_message'] = "wrong password";
				redirect_to('../admin_profile.php');
			}
	}



	if(isset($_POST['edit_password'])){
		$admin_id = $_SESSION['admin_id'];
		$old_password = $_POST['old_password'];
		$new_password = $_POST['new_password'];
		//the confirm password is the new poassword
		$confirm_password = $_POST['confirm_password'];

		$find_password = find_password($admin_id,$old_password);

		if($find_password){
			if($new_password === $confirm_password){

					$query_change_password = "UPDATE tbladmins SET password = '$confirm_password' WHERE admin_id = '$admin_id'";
					$run_query_change_password = mysqli_query($connection,$query_change_password)or die(mysqli_error($connection));

					if($run_query_change_password && mysqli_affected_rows($connection) == 1){
							$_SESSION['success_message'] = "Password has been updated";
			                redirect_to('../admin_profile.php');
						}

			}else{
				$_SESSION['failed_message'] = "new password and confirm password doesnt match";
				redirect_to('../admin_profile.php');
			}
		}else{
				$_SESSION['failed_message'] = "wrong password";
				redirect_to('../admin_profile.php');
			}



	}


	if(isset($_POST['edit_admin'])){
		$admin_id = $_SESSION['admin_id'];
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name'];
		$last_name = $_POST['last_name'];
		$gender = $_POST['gender'];
		$date_birth = $_POST['date_birth'];
		$contact = $_POST['contact'];
		$password = $_POST['password'];
		$address = $_POST['address'];


		$find_password = find_password($admin_id,$password);

		if ($find_password) {
			
			$query_change_admin_info = "UPDATE tbladmins SET last_name = '$last_name', first_name = '$first_name', middle_name = '$middle_name', address = '$address', contact = '$contact' ,gender = '$gender', date_birth = '$date_birth'  WHERE admin_id = '$admin_id'";
					$run_query_change_admin_info = mysqli_query($connection,$query_change_admin_info)or die(mysqli_error($connection));

					if($run_query_change_admin_info && mysqli_affected_rows($connection) == 1){
							$_SESSION['success_message'] = "Admin Info has been updated";
			               redirect_to('../admin_profile.php');
						}


		}else{
			$_SESSION['failed_message'] = "wrong password";
				redirect_to('../admin_profile.php');
		}

		
	}

?>

