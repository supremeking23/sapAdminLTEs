 <?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");

  ?> 


<?php 
		if(isset($_POST['add_subject'])){
			$cfn = 'A'. sprintf('%07d', mt_rand(1, 999999)); //auto generate
			$subject_code = mysql_prep($_POST['subject_code']);
			$subject_name = mysql_prep($_POST['subject_name']);
			$department = mysql_prep($_POST['department']);
			


	         	

			        $query_insert_subject = "INSERT INTO tblsubjects(cfn,subject_name,subject_code,isActive,department_id) VALUES('$cfn','$subject_name','$subject_code',1,$department)";

			        $run_insert_subject = mysqli_query($connection,$query_insert_subject)or die(mysqli_error($connection));


			        if($run_insert_subject && mysqli_affected_rows($connection) == 1){
							$_SESSION['success_message'] = "Subject has been added";
			                redirect_to('../subjects.php');
					}
	      
		}




		if(isset($_POST['subject_delete'])){

				$admin_id = mysql_prep($_POST['admin_id']);
				$admin_password = mysql_prep($_POST['admin_password']);
				$subject_id = mysql_prep($_POST['delete_subject']);

				$find_password = find_password($admin_id,$admin_password);

				if($find_password){
			 		$query_delete_subject = "UPDATE tblsubjects SET isActive = 0 WHERE subject_id = '$subject_id'";

			        $run_delete_subject = mysqli_query($connection,$query_delete_subject)or die(mysqli_error($connection));


			        if($run_delete_subject && mysqli_affected_rows($connection) == 1){
							$_SESSION['success_message'] = "Subject has been deleted";
			                redirect_to('../subjects.php');
					}

			}else{
				$_SESSION['failed_message'] = "Wrong Password";
  				redirect_to('../subjects.php');
			}		
		}




				if(isset($_POST['subject_edit'])){
				//$cfn = 'A'. sprintf('%07d', mt_rand(1, 999999)); //auto generate
				$subject_code = mysql_prep($_POST['subject_code']);
				$subject_name = mysql_prep($_POST['subject_name']);
			

				$subject_id = mysql_prep($_POST['update_subject']);
	         	

			        $query_edit_subject = "UPDATE tblsubjects SET subject_name ='$subject_name',subject_code ='$subject_code' WHERE subject_id = '$subject_id'";

			        $run_edit_subject = mysqli_query($connection,$query_edit_subject)or die(mysqli_error($connection));


			        if($run_edit_subject && mysqli_affected_rows($connection) == 1){
							$_SESSION['success_message'] = "Subject has been edited";
			                redirect_to('../subjects.php');
					}
	      
		}




		if(isset($_POST['open_grade'])){

			//opens the online encoding of remarks
			$query="UPDATE tblprevileges SET state = 1 WHERE tbl_previleges_id = 1";

			$run_query  = $connection->query($query);

			 if($run_query && mysqli_affected_rows($connection) == 1){
			      	$_SESSION['success_message'] = "Online Encoding of Grade is Now Open";
			        redirect_to('../subjects.php');
			  }else{
			    return null;
			  }
		}




		if(isset($_POST['close_grade'])){

			//opens the online encoding of remarks
			$query="UPDATE tblprevileges SET state = 0 WHERE tbl_previleges_id = 1";

			$run_query  = $connection->query($query);

			 if($run_query && mysqli_affected_rows($connection) == 1){
			      	$_SESSION['success_message'] = "Online Encoding of Grade is Now Close";
			        redirect_to('../subjects.php');
			  }else{
			    return null;
			  }
		}


	

		
?>