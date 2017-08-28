 <?php
  include("../includes/sessions.php");
  include("../includes/connection.php");
  include("../includes/functions.php");

  ?> 


<?php 
		if(isset($_POST['register_professor'])){
			$prof_id = 'A'. sprintf('%07d', mt_rand(1, 999999)); //auto generate
			$last_name = $_POST['last_name'];
			$first_name = $_POST['first_name'];
			$middle_name = $_POST['middle_name'];
			$gender = $_POST['gender'];
			$date_birth = $_POST['date_birth'];
			$email = $_POST['email'];
			$contact = $_POST['contact'];
			$address = $_POST['address'];
			$department = $_POST['department'];
			$password = $_POST['password'];
 		 	$confirm_password = $_POST['confirm_password'];

			 if($password != $confirm_password){
              $_SESSION['failed_message'] = "password and confirm password doesnt match";
			  redirect_to('professors.php');         	  
	            exit;
	         }else{

	         		$professor_profile = $_FILES['upload_image']['name'];
			        $professor_profile_tmp =$_FILES['upload_image']['tmp_name'];
			        move_uploaded_file($professor_profile_tmp, "professor_images/$professor_profile");


			        $query_insert_professor = "INSERT INTO tblprofessor (prof_id,last_name,first_name,middle_name,gender,address,contact,date_birth,email,password,image,department,isActive) VALUES ('$prof_id','$last_name','$first_name','$middle_name','$gender','$address','$contact','$date_birth','$email','$confirm_password','$professor_profile','$department',1)";

			        $run_insert_professor = mysqli_query($connection,$query_insert_professor)or die(mysqli_error($connection));


			        if($run_insert_professor && mysqli_affected_rows($connection) == 1){
							$_SESSION['success_message'] = "Professor has been added";
			                redirect_to('professors.php');
					}
	         }

		}


		if(isset($_POST['edit_professor'])){
			$admin_id = $_SESSION['admin_id'];

	 		//for edit
	 		$edit_professor_id = $_POST['edit_prof_id'];
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
 			
			 			$query_change_professor_info = "UPDATE tblprofessor SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', gender = '$gender', address = '$address', date_birth = '$date_birth', contact = '$contact' WHERE tbl_prof_id = '$edit_professor_id'";

						$run_query_change_professor_info = mysqli_query($connection,$query_change_professor_info)or die(mysqli_error($connection));

						if($run_query_change_professor_info && mysqli_affected_rows($connection) == 1){
							$_SESSION['success_message'] = "Professor information has been updated";
			                redirect_to('professors.php');
						}

			 		}else{
			 			$_SESSION['failed_message'] = "wrong password";
						redirect_to('professors.php');
			 		}
		}
?>