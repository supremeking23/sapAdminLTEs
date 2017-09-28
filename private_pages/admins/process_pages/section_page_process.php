 <?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");

  ?> 


<?php 
		if(isset($_POST['add_section'])){

			$section_name = mysql_prep($_POST['section_name']);
			$department = mysql_prep($_POST['department']);
			 $program = mysql_prep($_POST['program']);
			$yearlevel = mysql_prep($_POST['year']);
			


	         	

			        $query_insert_section = "INSERT INTO tblsection(section_name,program_id,department_id,yearlevel) VALUES('$section_name','$program','$department','$yearlevel')";

			        $run_insert_section = mysqli_query($connection,$query_insert_section)or die(mysqli_error($connection));


			        if($run_insert_section && mysqli_affected_rows($connection) == 1){
							$_SESSION['success_message'] = "Section has been added";
			                redirect_to('../class.php');
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