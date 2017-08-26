 <?php
  include("../includes/sessions.php");
  include("../includes/connection.php");
  include("../includes/functions.php");

  ?> 




 <?php 

 	if(isset($_POST['add_department'])){
 		$admin_id = $_SESSION['admin_id'];
		$password = $_POST['password'];
		$department_code =  $_POST['department_code'];
		$department_name = $_POST['department_name'];


		$find_password = find_password($admin_id,$password);

		if($find_password){
			$query_add_department = "INSERT INTO tbldepartments(department_code,department_name) VALUES ('$department_code','$department_name')";
			$run_add_department = mysqli_query($connection,$query_add_department)or die(mysqli_error($connection));


			if($run_add_department && mysqli_affected_rows($connection) == 1){
				$_SESSION['success_message'] = "Department has been added";
                redirect_to('departments.php');
			}

		}else{
			$_SESSION['failed_message'] = "wrong password";
			redirect_to('departments.php');
		}
 	}


 	if(isset($_POST['add_program'])){
 		$admin_id = $_SESSION['admin_id'];
		$password = $_POST['password'];

		$department_id = $_POST['department'];
		$program_code = $_POST['program_code'];
		$program_name = $_POST['program_name'];

		$find_password = find_password($admin_id,$password);


		if($find_password){
			$query_add_program = "INSERT INTO tblcollegeprograms(department_id,program_code,program_name) VALUES ('$department_id','$program_code','$program_name')";
			$run_add_program = mysqli_query($connection,$query_add_program)or die(mysqli_error($connection));


			if($run_add_program && mysqli_affected_rows($connection) == 1){
				$_SESSION['success_message'] = "Program has been added";
                redirect_to('departments.php');
			}

		}else{
			$_SESSION['failed_message'] = "wrong password";
			redirect_to('departments.php');
		}
		//echo $department_id . $program_code;
 	}



 	if(isset($_SESSION['q'])){
 		$_SESSION["failed_message"]="iadsd";
 		redirect_to('login.php');
 	}

 ?>