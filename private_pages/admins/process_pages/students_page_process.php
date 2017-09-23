 <?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");

  ?> 


<?php 
		if(isset($_POST['register_student'])){
			$student_id = 'A'. sprintf('%07d', mt_rand(1, 999999)); //auto 
			$last_name = $_POST['last_name'];
			$first_name = $_POST['first_name'];
			$middle_name = $_POST['middle_name'];
			$gender = $_POST['gender'];
			$date_birth = $_POST['date_birth'];
			$email = $_POST['email'];
			$contact = $_POST['contact'];
			$address = $_POST['address'];
			$department = $_POST['department'];
			$program = $_POST['program'];
			$guardian = $_POST['guardian'];
			$password = $_POST['password'];
 		 	$confirm_password = $_POST['confirm_password'];



	         		$students_profile = $_FILES['upload_image']['name'];
			        $students_profile_tmp =$_FILES['upload_image']['tmp_name'];
			        move_uploaded_file($students_profile_tmp, "../../student_images/$students_profile");


			        $query_insert_students = "INSERT INTO tblstudentinfo (student_id,last_name,first_name,middle_name,gender,address,contact,date_birth,image,department,isActive,guardian_name,email,password,program_major) VALUES ('$student_id','$last_name','$first_name','$middle_name','$gender','$address','$contact','$date_birth','$students_profile','$department',1,'$guardian','$email','$guardian','$password','$program')";

			        $run_insert_students = mysqli_query($connection,$query_insert_students)or die(mysqli_error($connection));


			        if($run_insert_students && mysqli_affected_rows($connection) == 1){
							$_SESSION['success_message'] = "Student has been added";
			                redirect_to('../students.php');
					}
	      

		}


		if(isset($_POST['edit_info'])){
			//$admin_id = $_SESSION['admin_id'];

	 		//for edit
	 		$student_id = $_POST['student_id'];
	 		$first_name = $_POST['first_name'];
	 		$middle_name = $_POST['middle_name'];
	 		$last_name = $_POST['last_name'];
	 		$gender =$_POST['gender'];
	 		$address = $_POST['address'];
	 		$date_birth = $_POST['date_birth'];
	 		$contact = $_POST['contact'];
	 		$email = $_POST['email'];


	 		if($_FILES['upload_image']['name'] == "") {
			// No file was selected for upload, your (re)action goes here
			    $student_profile = $_POST['image_name'];
			}else{
			      $student_profile = $_FILES['upload_image']['name'];
			      $student_profile_tmp =$_FILES['upload_image']['tmp_name'];

			    move_uploaded_file($student_profile_tmp, "../../student_images/$student_profile");
			}




			$query_change_student_info = "UPDATE tblstudentinfo SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', gender = '$gender', address = '$address', date_birth = '$date_birth', contact = '$contact',email = '$email', image='$student_profile' WHERE tbl_student_id = '$student_id'";

						$run_query_change_student_info = mysqli_query($connection,$query_change_student_info)or die(mysqli_error($connection));

						if($run_query_change_student_info && mysqli_affected_rows($connection) == 1){
							$_SESSION['success_message'] = "Student information has been updated";
			                redirect_to('../student_edit_info.php?student_id='.$student_id);
						}


	 		//admin who wants to edit
	 		/*$password = $_POST['password'];

	 		$find_password = find_password($admin_id,$password);

	 		 		if ($find_password) {
 			
			 			$query_change_student_info = "UPDATE tblstudentinfo SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', gender = '$gender', address = '$address', date_birth = '$date_birth', contact = '$contact' WHERE tbl_student_id = '$edit_student_id'";

						$run_query_change_student_info = mysqli_query($connection,$query_change_student_info)or die(mysqli_error($connection));

						if($run_query_change_student_info && mysqli_affected_rows($connection) == 1){
							$_SESSION['success_message'] = "Student information has been updated";
			                redirect_to('../students.php');
						}

			 		}else{
			 			$_SESSION['failed_message'] = "wrong password";
						redirect_to('../students.php');
			 		}*/
		}


		//add section and year

		/*if(isset($_POST['edit_student'])){
			$admin_id = $_SESSION['admin_id'];

	 		//for edit
	 		$edit_student_id = $_POST['edit_prof_id'];
	 		$first_name = $_POST['first_name'];
	 		$middle_name = $_POST['middle_name'];
	 		$last_name = $_POST['last_name'];
	 		$gender =$_POST['gender'];
	 		$address = $_POST['address'];
	 		$date_birth = $_POST['date_birth'];
	 		$contact = $_POST['contact'];


	 		//admin who wants to edit
	 		$password = $_POST['password'];

	 		$find_password = find_password($admin_id,$password);

	 		 		if ($find_password) {
 			
			 			$query_change_student_info = "UPDATE tblstudentinfo SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', gender = '$gender', address = '$address', date_birth = '$date_birth', contact = '$contact' WHERE tbl_student_id = '$edit_student_id'";

						$run_query_change_student_info = mysqli_query($connection,$query_change_student_info)or die(mysqli_error($connection));

						if($run_query_change_student_info && mysqli_affected_rows($connection) == 1){
							$_SESSION['success_message'] = "Student information has been updated";
			                redirect_to('../students.php');
						}

			 		}else{
			 			$_SESSION['failed_message'] = "wrong password";
						redirect_to('../students.php');
			 		}
		}*/
?>