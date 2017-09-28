<?php 
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");
?>

<?php 
    //header("Content-Type: application/json", true);
$professor_id = $_GET['professor_id'];
    $delete_prof_subject = $_GET['profsubject_id'];
    $query = "DELETE FROM tblprofessorsubject WHERE profsubject_id = '$delete_prof_subject'";

    $delete_query = mysqli_query($connection,$query) or die(mysqli_error($connection));

    if($delete_query && mysqli_affected_rows($connection) == 1){
        $_SESSION['success_message'] = "Class has been deleted";
                redirect_to('../prof_classes_info.php?professor_id='. $professor_id);
      }

    
  
?>