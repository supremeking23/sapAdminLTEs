<?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");


 
if (isset($_POST['add_student_year_sec'])) {
  # code...
   $tbl_student_id = mysql_prep($_POST['student_table_id']);
   $section = mysql_prep($_POST['section']);
   $year = mysql_prep($_POST['year']);



    $query = "UPDATE tblstudentinfo SET section = '$section', yearlevel = '$year'  WHERE tbl_student_id = '$tbl_student_id'";

    $update_data = mysqli_query($connection,$query)or die(mysqli_error($connection));

    if($update_data && mysqli_affected_rows($connection) == 1){
        $_SESSION['success_message'] = "Student has been added to a class";

        
                redirect_to('../students.php');
      }

}
  




 //echo $_POST['event_name'] . "hahahahahhahahhaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaahhhhh";
?>
