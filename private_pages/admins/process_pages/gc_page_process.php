 <?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");

  ?> 




 <?php 




 	if(isset($_POST['register_guidance_councilor'])){


    $gc_id = 'GC'. sprintf('%07d', mt_rand(1, 999999)); //auto 
 		$last_name = $_POST['last_name'];
 		$first_name= $_POST['first_name'];
 		$middle_name =$_POST['middle_name'];
 		$gender = $_POST['gender'];
 		$address = $_POST['address'];
 		$date_birth = $_POST['date_birth'];
 		$email = $_POST['email'];
 		$contact = $_POST['contact'];
 		
 		 $password = $_POST['password'];
 		 $confirm_password = $_POST['confirm_password'];

 		 if($password != $confirm_password){
              $_SESSION['failed_message'] = "password and confirm password doesnt match";
			       redirect_to('../guidance_councilor.php');         	  
            exit;
         }else{
         	  $gc_profile = $_FILES['upload_image']['name'];
            $gc_profile_tmp =$_FILES['upload_image']['tmp_name'];
            move_uploaded_file($gc_profile_tmp, "../../gc_images/$gc_profile");


         	$query_insert_gc = "INSERT INTO tblguidancecouncilor (gc_id,last_name,first_name,middle_name,gender,address,contact,birth_date,email,password,image,isActive,date_added) VALUES ('$gc_id','$last_name','$first_name','$middle_name','$gender','$address','$contact','$date_birth','$email','$confirm_password','$gc_profile',1,now())";

         	$run_insert_gc = mysqli_query($connection,$query_insert_gc)or die(mysqli_error($connection));


         	if($run_insert_gc && mysqli_affected_rows($connection) == 1){
				$_SESSION['success_message'] = "Guidance Councilor has been added";
                redirect_to('../guidance_councilor.php');
			     }
        }



 		/* if($password != $confirm_password){
              $_SESSION['failed_message'] = "password and confirm password doesnt match";
			  redirect_to('admins.php');         	  
            exit;
         }else{

         	$admin_profile = $_FILES['upload_image']['name'];
            $admin_profile_tmp =$_FILES['upload_image']['tmp_name'];
            move_uploaded_file($admin_profile_tmp, "admin_images/$admin_profile");


         	$query_insert_admins = "INSERT INTO tbladmins (last_name,first_name,middle_name,gender,address,contact,date_birth,email,password,image,admin_department_id) VALUES ('$last_name','$first_name','middle_name','$gender','$address','$contact','date_birth','$email','$confirm_password','$admin_profile','$admin_department_id')";

         	$run_insert_admin = mysqli_query($connection,$query_insert_admins)or die(mysqli_error($connection));


         	if($run_insert_admin && mysqli_affected_rows($connection) == 1){
				$_SESSION['success_message'] = "Admin has been added";
                redirect_to('admins.php');
			}
           		
         } */


 	}


 	if(isset($_POST['edit_admin'])){
 		$admin_id = $_SESSION['admin_id'];

 		//for edit
 		$edit_admin_id = $_POST['edit_admin_id'];
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
 			
 			$query_change_admin_info = "UPDATE tbladmins SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', gender = '$gender', address = '$address', date_birth = '$date_birth', contact = '$contact' WHERE admin_id = '$edit_admin_id'";

			$run_query_change_admin_info = mysqli_query($connection,$query_change_admin_info)or die(mysqli_error($connection));

			if($run_query_change_admin_info && mysqli_affected_rows($connection) == 1){
				$_SESSION['success_message'] = "Admin information has been updated";
                redirect_to('admins.php');
			}

 		}else{
 			$_SESSION['failed_message'] = "wrong password";
			redirect_to('admins.php');
 		}

 	}
 ?>