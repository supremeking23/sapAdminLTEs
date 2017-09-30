<?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");


 
if (isset($_POST['upload_tutorial_file'])) {
 
    
  $tutorial_name = mysql_prep($_POST['tutorial_name']);

  $tut_asset = $_FILES['tutorial_asset']['name'];
  $tutorial_asset = basename($tut_asset);
  $tutorial_asset_tmp =$_FILES['tutorial_asset']['tmp_name'];
 

  $subject_id =mysql_prep($_POST['recomended_for']); //subject_id
  $department_id = mysql_prep($_POST['department_id']);


  print_r($_FILES);


     $message = 'Error uploading file';
        switch( $_FILES['tutorial_asset']['error'] ) {
            case UPLOAD_ERR_OK:
                $message = false;;
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $message .= ' - file too large (limit of bytes).';
                break;
            case UPLOAD_ERR_PARTIAL:
                $message .= ' - file upload was not completed.';
                break;
            case UPLOAD_ERR_NO_FILE:
                $message .= ' - zero-length file uploaded.';
                break;
            default:
                $message .= ' - internal error #'.$_FILES['tutorial_asset']['error'];
                break;
        }

        echo $message;

        print_r($_FILES['tutorial_asset']['error'] );




        switch ($_FILES['tutorial_asset']['error']) {
            case '1':
                $error = 'You Are Not Allowed To Upload File Of This Size';
                break;
            case '2':
                $error = 'You Can Not Not Upload File Of This Size';
                break;
            case '3':
                $error = 'The uploaded file was only partially uploaded';
                break;
            case '4':
                $error = 'Not Able To Upload';
                break;

            case '6':
                $error = 'Server Error Please Try Again Later';
                break;
            case '7':
                $error = 'Failed to write file to disk';
                break;
            case '8':
                $error = 'File upload stopped by extension';
                break;
            case '999':
            default:
                $error = 'Error Found But Did Not Found What Was Problem';
        }

          echo $error;

  //copy($tutorial_asset_tmp, "../");

 if(move_uploaded_file($tutorial_asset_tmp, "../admin_images/$tutorial_asset")){

  $query = "INSERT INTO tbltutorials(tutorial_name,tutorial_asset,subject_id,department_id,tutorial_type) VALUES('$tutorial_name','$tutorial_asset','$subject_id','$department_id','video')";
  
  $insert_data = mysqli_query($connection,$query)or die(mysqli_error($connection));

    if($insert_data && mysqli_affected_rows($connection) == 1){
        $_SESSION['success_message'] = "Tutorial has been added";
                redirect_to('../department_info.php?department_id=' .$department_id);
      }

   }else{
    echo "ayaw";
   }   

}



if (isset($_POST['upload_tutorial_link'])) {
 
    
  
 $tutorial_name = mysql_prep($_POST['tutorial_name']);

  $tutorial_asset = mysql_prep($_POST['tutorial_asset']); // web link
 

  $subject_id =mysql_prep($_POST['recomended_for']); //subject_id
  $department_id = mysql_prep($_POST['department_id']);


  $query = "INSERT INTO tbltutorials(tutorial_name,tutorial_asset,subject_id,department_id,tutorial_type) VALUES('$tutorial_name','$tutorial_asset','$subject_id','$department_id','web link')";
  
  $insert_data = mysqli_query($connection,$query)or die(mysqli_error($connection));

    if($insert_data && mysqli_affected_rows($connection) == 1){
        $_SESSION['success_message'] = "Tutorial has been added";
                redirect_to('../department_info.php?department_id=' .$department_id);
      }


}
  




 //echo $_POST['event_name'] . "hahahahahhahahhaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaahhhhh";
?>



