 <?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");

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
			        move_uploaded_file($professor_profile_tmp, "../../professor_images/$professor_profile");


			        $query_insert_professor = "INSERT INTO tblprofessor (prof_id,last_name,first_name,middle_name,gender,address,contact,date_birth,email,password,image,department,isActive,date_added) VALUES ('$prof_id','$last_name','$first_name','$middle_name','$gender','$address','$contact','$date_birth','$email','$confirm_password','$professor_profile','$department',1,now())";

			        $run_insert_professor = mysqli_query($connection,$query_insert_professor)or die(mysqli_error($connection));


			        if($run_insert_professor && mysqli_affected_rows($connection) == 1){
							$_SESSION['success_message'] = "Professor has been added";
			                redirect_to('../professors.php');
					}
	         }

		}


		
?>