<?php
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");


 
if (isset($_POST['add_subject_to_prof'])) {
  # code...
  
    $subject_id =mysql_prep($_POST['subject_id']);
    $profsubject_id = mysql_prep($_POST['profsubject_id']);
    $professor_id = mysql_prep($_POST['professor_id']);


    $query = "UPDATE tblprofessorsubject SET subject_id = '$subject_id' WHERE profsubject_id = '$profsubject_id' ";

    $insert_data = mysqli_query($connection,$query);

    if($insert_data && mysqli_affected_rows($connection) == 1){
        $_SESSION['success_message'] = "Subject has been assigned to this professor";
                redirect_to('../prof_classes_info.php?professor_id='.$professor_id);
      }

}


if (isset($_POST['edit_subject_to_prof'])) {
  # code...
  
    echo $subject_id =mysql_prep($_POST['subject_id']);
    $professor_id = mysql_prep($_POST['professor_id']);
    $profsubject_id = mysql_prep($_POST['profsubject_id']);

    $query = "UPDATE tblprofessorsubject SET subject_id = '$subject_id' WHERE profsubject_id = '$profsubject_id' ";

   $edit_data = mysqli_query($connection,$query);

    if($edit_data && mysqli_affected_rows($connection) == 1){
        $_SESSION['success_message'] = "Subject has been assigned to this professor";
                redirect_to('../prof_classes_info.php?professor_id='.$professor_id);
      }

}
  




 //echo $_POST['event_name'] . "hahahahahhahahhaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaahhhhh";
?>
