 <?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");

  ?> 




 <?php 

 	if(isset($_POST['add_department'])){

 		$admin_id = $_SESSION['admin_id'];
		//$password = $_POST['password'];
		$department_code =  $_POST['department_code'];
		$department_name = $_POST['department_name'];
		echo $department_color = $_POST['department_color'];

		$department_logo = $_FILES['department_logo']['name'];
		$department_logo_tmp =$_FILES['department_logo']['tmp_name'];
		move_uploaded_file($department_logo_tmp, "../department logos/$department_logo");

		$department_banner = $_FILES['department_banner']['name'];
		$department_banner_tmp =$_FILES['department_banner']['tmp_name'];
		move_uploaded_file($department_banner_tmp, "../department logos/$department_banner");
		

		
			$query_add_department = "INSERT INTO tbldepartments(department_code,department_name,department_logo,department_banner,department_color) VALUES ('$department_code','$department_name','$department_logo','$department_banner','$department_color')";
			$run_add_department = mysqli_query($connection,$query_add_department)or die(mysqli_error($connection));


			if($run_add_department && mysqli_affected_rows($connection) == 1){
				$_SESSION['success_message'] = "Department has been added";
				$date=date("l jS \of F Y ");
				$log_user_id = $_SESSION['admin_id'];
	            $log_message = "Add Department at " . $date;
	            $log_header = "Add Department";
	            insert_log($log_user_id,$log_header,$log_message);
                redirect_to('../add_department_and_programs.php');
			}

		
 	}


 	if(isset($_POST['add_program'])){
 		$admin_id = $_SESSION['admin_id'];
		//$password = $_POST['password'];

		$department_id = $_POST['department'];
		$program_code = $_POST['program_code'];
		$program_name = $_POST['program_name'];
		$program_description = $_POST['program_description'];

		


		
			$query_add_program = "INSERT INTO tblcollegeprograms(department_id,program_code,program_name,program_description) VALUES ('$department_id','$program_code','$program_name','$program_description')";
			$run_add_program = mysqli_query($connection,$query_add_program)or die(mysqli_error($connection));


			if($run_add_program && mysqli_affected_rows($connection) == 1){
				$_SESSION['success_message'] = "Program has been added";
				$log_user_id = $_SESSION['admin_id'];
				$date=date("l jS \of F Y ");
	            $log_message = "Add College Program at " . $date;
	            $log_header = "Add College Program";
	            insert_log($log_user_id,$log_header,$log_message);
                redirect_to('../add_department_and_programs.php');
			}

	
		//echo $department_id . $program_code;
 	}



 	if(isset($_SESSION['q'])){
 		$_SESSION["failed_message"]="iadsd";
 		redirect_to('login.php');
 	}

 ?>