 <?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");

  ?> 


  <?php 

  	if(isset($_POST['add_csv'])){
  		//echo "hello";

  		$department = $_POST['department'];
  		$program =  $_POST['program'];
  		$admin_password = $_POST['admin_password'];
  		$admin_id = $_POST['admin_id'];

  		$find_password = find_password($admin_id,$admin_password);

  		if ($find_password) {
  			echo "proceed";

  		//echo 	$_FILES['excel']['name'];
  		//echo    $_POST['add_csv'];

  	

  			//$_SESSION['success_message'] = "Correct Password";
  			//redirect_to("../students.php");

  			$extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 		 	$allowed_extension = array("xls", "xlsx", "csv"); //allowed extension


 		 //check selected file extension is present in allowed extension array
 		 if(in_array($extension, $allowed_extension)){
			  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
			  //include_once('PHPExcel/PHPExcel.php');
			  include_once("PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
			  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file
			  
			  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet){
			   $highestRow = $worksheet->getHighestRow();
			   for($row=2; $row<=$highestRow; $row++){
			    
			    $student_id = 'A'. sprintf('%07d', mt_rand(1, 999999)); //auto 


			    $last_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
			    $first_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
			     $middle_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
			    $address = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());

			     $contact = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());

			     //converts excel date to php date
     			 $newformat = date('Y-m-d',PHPExcel_Shared_Date::ExcelToPHP($worksheet->getCellByColumnAndRow(2, $row)->getValue()));

			     $date_birth = mysqli_real_escape_string($connect, $newformat);


			    $query = "INSERT INTO tblstudentinfo(student_id,last_name,first_name,middle_name,address,contact,date_birth,department) VALUES ('$student_id','$last_name','$first_name','$middle_name','$address','$contact','$date_birth','$department')";
			    	mysqli_query($connect, $query);


			   
			   }//for
			  }//foreach 
			 	
			  	//success message
			  $_SESSION['message_message'] = "Bulk student has been added";
  				redirect_to("../students.php");

			 }//array

		
  		}else{
  			//echo "wrong pass";
  			$_SESSION['failed_message'] = "Wrong Password";
  			redirect_to("../students.php");
  		}

  		/* $extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 		 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension


 		 //check selected file extension is present in allowed extension array
 		 if(in_array($extension, $allowed_extension)){
			  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
			  include("PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
			  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file
			  
			  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet){
			   $highestRow = $worksheet->getHighestRow();
			   for($row=2; $row<=$highestRow; $row++){
			    
			    $student_id = 'A'. sprintf('%07d', mt_rand(1, 999999)); //auto 


			    $last_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
			    $first_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
			     $middle_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
			    $address = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());

			     $contact = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());




			    $query = "INSERT INTO tbl_excel(excel_name, excel_email) VALUES ('".$name."', '".$email."')";
			    mysqli_query($connect, $query);


			   
			   }
			  } 
			 	
			  	//success message

			 }

			 */
  	}
   
  ?>
