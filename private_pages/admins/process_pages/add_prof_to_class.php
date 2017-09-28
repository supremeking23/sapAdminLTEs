<?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");


 
if (isset($_POST['add_prof_to_class'])) {
  # code...
    $prof_id = $_POST['professor_id'];
    $department_id =  $_POST['department_id'];
    $program_id = $_POST['program_id'];
    $section_id= $_POST['section_id'];
    $yearlevel =$_POST['yearlevel'];


    $query = "INSERT INTO tblprofessorsubject(prof_id,section_id,yearlevel,department_id,program_id) VALUES('$prof_id','$section_id','$yearlevel','$department_id','$program_id')";

    $insert_data = mysqli_query($connection,$query);

    if($insert_data && mysqli_affected_rows($connection) == 1){
        $_SESSION['success_message'] = "Professor has been added to this class";
                redirect_to('../class.php');
      }

}
  




 //echo $_POST['event_name'] . "hahahahahhahahhaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaahhhhh";
?>
