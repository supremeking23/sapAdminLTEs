<?php

//redirect to new page http://your-bestsex-here.com/?u=4arkte4&o=8qmpfz2&t=  https://www.istripper.com/?
function redirect_to($new_location){
  header("Location: " . $new_location);
  exit;
}

//
//text limit
function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
 }



// prepared statement
function mysql_prep($string){
global $connection;
$escaped_string = mysqli_real_escape_string($connection,$string);
return $escaped_string;
}


// check if the id number exist in the database/// will not use any time soon
function check_id_presence($idnumber){
  global $connection;
  $idnumber = mysql_prep($idnumber);

  $query = "Select * FROM tblstudentinfo WHERE student_id = '$idnumber' LIMIT 1";

  $check_query = $connection->query($query);

  if($check_query->num_rows ==1){
      return $check_student = mysqli_fetch_assoc($check_query);
  }else{
    return null;
  }
}

//after the id has been verified... checked if the id has an email and a password /// will not use any time soon
function check_student_id($idnumber){
  global $connection;
  $idnumber = mysql_prep($idnumber);

  $query = "Select * FROM tblstudentinfo WHERE student_id = '$idnumber' AND (email ='' AND password ='') LIMIT 1";

  $check_query = $connection->query($query);

  if($check_query->num_rows ==1){
      return $check_student = mysqli_fetch_assoc($check_query);
  }else{
    return null;
  }
}

// check if the email has a match in any account /// will not use any time soon
function  check_email_exist($email){
  global $connection;
  $email = mysql_prep($email);
  $query = "Select * FROM tblstudentinfo WHERE email = '$email' LIMIT 1";
  $check_query = $connection->query($query);
  if($check_query->num_rows ==1){
      return $check_student = mysqli_fetch_assoc($check_query);
  }else{
    return null;
  }
}

//student registration function /// will not use any time soon
function register($idnumber,$email,$password){
  global $connection;
  $idnumber = mysql_prep($idnumber);
  $email = mysql_prep($email);
  //the confirm password
  $password = mysql_prep($_POST['confirm_password']);
  $query_update = "UPDATE tblstudentinfo SET email = '$email', password = '$password' WHERE student_id = '$idnumber'";
  if ($connection->query($query_update) === TRUE) {
      return true;
  } else {
    return null;
  }
}

//login process
function attempt_login_student($email,$password){
	global $connection;

  $email = mysql_prep($_POST['email']);
  //the confirm password
  $password = mysql_prep($_POST['password']);

  $query = "SELECT * FROM tblstudentinfo WHERE email = '$email' AND password = '$password' LIMIT 1";
  $result = $connection->query($query);

  if($login = mysqli_fetch_assoc($result)){
    //echo $login['name'];
    return $login;


  }else{
    return null;
    //redirect_to("login.php");
  }
}

function attempt_login_professor($email,$password){
	global $connection;

  $email = mysql_prep($_POST['email']);
  //the confirm password
  $password = mysql_prep($_POST['password']);

  $query = "SELECT * FROM tblprofessor WHERE email = '$email' AND password = '$password' LIMIT 1";
  $result = $connection->query($query);

  if($login = mysqli_fetch_assoc($result)){
    //echo $login['name'];
    return $login;


  }else{
    return null;
    //redirect_to("login.php");
  }
}

function attempt_login_councilor($email,$password){
	global $connection;

  $email = mysql_prep($_POST['email']);
  //the confirm password
  $password = mysql_prep($_POST['password']);

  $query = "SELECT * FROM tblguidancecounselor WHERE email = '$email' AND password = '$password' LIMIT 1";
  $result = $connection->query($query);

  if($login = mysqli_fetch_assoc($result)){
    //echo $login['name'];
    return $login;


  }else{
    return null;
    //redirect_to("login.php");
  }
}








//student
function logged_in() {
	return isset($_SESSION["student_id"]);
}

function confirm_logged_in() {
	if (!logged_in()) {
		redirect_to("../login.php");
	}
}


//admin


//admins
function attempt_login_admins($email,$password){
  global $connection;

  $email = mysql_prep($_POST['email']);

  $password = mysql_prep($_POST['password']);

  $query = "SELECT * FROM tbladmins WHERE email = '$email' AND password = '$password' LIMIT 1";
  $result = $connection->query($query) or die(mysqli_error());

  if($login = mysqli_fetch_assoc($result)){
    //echo $login['name'];
    return $login;


  }else{
    return null;
    //redirect_to("login.php");
  }
}

function logged_in_admin() {
  return isset($_SESSION["admin_id"]);
}

function confirm_logged_in_admin() {
  if (!logged_in_admin()) {
    redirect_to("login.php");
  }
}


function get_admin_by_id($admin_id){
  global $connection;

  $admin_id = mysql_prep($admin_id);

  $query = "SELECT * FROM tbladmins WHERE admin_id = '$admin_id' AND isActive = 1";

  $result = $connection->query($query) or die(mysqli_error());

  if($admin = mysqli_fetch_assoc($result)){
    return $admin;
  }else{
    return null;
  }

}

function get_professor_by_id($professor_id){
  global $connection;

  $professor_id = mysql_prep($professor_id);

  $query = "SELECT * FROM tblprofessor WHERE tbl_prof_id = '$professor_id' AND isActive = 1";

  $result = $connection->query($query) or die(mysqli_error());

  if($prof = mysqli_fetch_assoc($result)){
    return $prof;
  }else{
    return null;
  }

}



function get_student_by_id($student_id){
  global $connection;

  $student_id = mysql_prep($student_id);

  $query = "SELECT * FROM tblstudentinfo WHERE tbl_student_id = '$student_id' AND isActive = 1";

  $result = $connection->query($query) or die(mysqli_error());

  if($student = mysqli_fetch_assoc($result)){
    return $student;
  }else{
    return null;
  }

}

function get_gc_by_id($gc_id){
  global $connection;

  $gc_id = mysql_prep($gc_id);

  $query = "SELECT * FROM tblguidancecouncilor WHERE tbl_gc_id = '$gc_id' AND isActive = 1";

  $result = $connection->query($query) or die(mysqli_error());

  if($gc = mysqli_fetch_assoc($result)){
    return $gc;
  }else{
    return null;
  }

}


function get_dean_by_department_id($department_id){
  global $connection;

  $department_id = mysql_prep($department_id);

  $query = "SELECT * FROM tbldepartmentheads WHERE department_id = '$department_id' ";

  $result = $connection->query($query) or die(mysqli_error());

  if($dean = mysqli_fetch_assoc($result)){
    return $dean;
  }else{
    return null;
  }

}

//check if there is a dean
function check_dean_by_department_id($department_id){
  global $connection;

  $department_id = mysql_prep($department_id);

  $query = "SELECT * FROM tbldepartmentheads WHERE department_id = '$department_id' ";

  $result = $connection->query($query) or die(mysqli_error());

return $result;

}

function find_password($admin_id,$password){
  global $connection;

  $admin_id = mysql_prep($admin_id);
  $password = mysql_prep($password);

  $query = "SELECT * FROM tbladmins WHERE admin_id = '$admin_id' AND password = '$password'";

  $result = $connection->query($query) or die(mysqli_error());

  if($admin = mysqli_fetch_assoc($result)){
    return $admin;
  }else{
    return null;
  }
}


function admin_department($admin_id_department){
  global $connection;

  $admin_id_department = mysql_prep($admin_id_department);

  $query = "SELECT * FROM tbldepartments WHERE department_id = '$admin_id_department'";

  $result = $connection->query($query) or die(mysqli_error($connection));

  if($admin_department = mysqli_fetch_assoc($result)){
    return $admin_department;
  }else{
    return null;
  }

}


//get all departments
function get_all_department($department_id){
   global $connection;

  $department_id = mysql_prep($department_id);

  if($department_id == 1){
    $query = "SELECT  * FROM tbldepartments";
  }else{
    $query = "SELECT  * FROM tbldepartments WHERE  department_id = $department_id";
  }
  

  $get_department = $connection->query($query) or die(mysqli_error());

  return $get_department;

}


function get_all_department_aside_from_school_admin($department_id){
  global $connection;

  $department_id = mysql_prep($department_id);

  if($department_id == 1){
    $query = "SELECT  * FROM tbldepartments WHERE department_id != 1 ";
  }else{
    $query = "SELECT  * FROM tbldepartments WHERE  department_id = $department_id";
  }
  

  $get_department = $connection->query($query) or die(mysqli_error($connection));

  return $get_department;
}


//for bulk student
function get_all_department_for_student_insertions($department_id){
   global $connection;

  $department_id = mysql_prep($department_id);

  if($department_id == 1){
    $query = "SELECT  * FROM tbldepartments WHERE department_id != 1";
  }else{
    $query = "SELECT  * FROM tbldepartments WHERE  department_id = $department_id ";
  }
  

  $get_department = $connection->query($query) or die(mysqli_error());

  return $get_department;

}


//for bulk student
function get_all_programs_for_student_insertions($department_id){
   global $connection;

  $department_id = mysql_prep($department_id);

  if($department_id == 1){
    $query = "SELECT  * FROM tblcollegeprograms WHERE department_id != 1";
  }else{
    $query = "SELECT  * FROM tblcollegeprograms WHERE  department_id = $department_id";
  }
  

  $get_programs = $connection->query($query) or die(mysqli_error());

  return $get_programs;

}

function get_all_programs(){
   global $connection;

  $query = "SELECT  * FROM tblcollegeprograms WHERE department_id != 1";

  $get_programs = $connection->query($query) or die(mysqli_error());

  return $get_programs;

}


//get all admins

function get_all_admins($department_id){
  global $connection;

  $department_id = mysql_prep($department_id);

  if($department_id==1){
    $query = "SELECT  *,date_format(date_birth, ' %M %e, %Y') AS date_of_birth FROM tbladmins WHERE isActive = 1";
  }else{
    $query = "SELECT * FROM tbladmins INNER JOIN tbldepartments ON tbladmins.admin_department_id  = tbldepartments.department_id WHERE isActive = 1 AND tbladmins.admin_department_id = $department_id";
  }
  

  $get_admin = $connection->query($query) or die(mysqli_error());

  return $get_admin;
}


//get all professors
/*
function get_all_professors(){
  global $connection;

  $query = "SELECT  * FROM tblprofessor WHERE isActive = 1";

  $get_professors = $connection->query($query) or die(mysqli_error());

  return $get_professors;
}*/

//depending on department

function get_all_professors($department_id){
  global $connection;

  $department_id = mysql_prep($department_id);

  if($department_id == 1){
    $query = "SELECT  * FROM tblprofessor WHERE isActive = 1";
  }else{
    //join query
    $query = "SELECT * FROM tblprofessor INNER JOIN tbldepartments ON tblprofessor.department  = tbldepartments.department_id WHERE isActive = 1 AND tblprofessor.department = $department_id";
  }

  
  $get_professors = $connection->query($query) or die(mysqli_error());

  return $get_professors;
}


function get_all_professors_for_subjects(){
  global $connection;

 

    $query = "SELECT  * FROM tblprofessor WHERE isActive = 1";
  

  
  $get_professors = $connection->query($query) or die(mysqli_error());

  return $get_professors;
}

function get_all_guidance_councilor(){
  global $connection;
  $query = "SELECT  * FROM tblguidancecouncilor WHERE isActive = 1";


  
  $get_guidance_councilor = $connection->query($query) or die(mysqli_error());

  return $get_guidance_councilor;
}

function get_all_students($department_id){
  global $connection;

  if($department_id == 1){
    $query = "SELECT  * FROM tblstudentinfo WHERE isActive = 1";
  }else{
     //join query
    $query = "SELECT * FROM tblstudentinfo INNER JOIN tbldepartments ON tblstudentinfo.department  = tbldepartments.department_id WHERE isActive = 1 AND tblstudentinfo.department = $department_id";
  }
  

  $get_students = $connection->query($query) or die(mysqli_error());

  return $get_students;
}


function get_all_student(){
  global $connection;


    $query = "SELECT  * FROM tblstudentinfo WHERE isActive = 1";

   

  $get_students = $connection->query($query) or die(mysqli_error());

  return $get_students;
}



//count functions

//by department ids
function count_total_admins($department_id){
  global $connection;

    if($department_id == 1){

    $query = "SELECT count(*) AS 'total admin' FROM tbladmins WHERE isActive = 1";
    }else{

     $query = "SELECT count(*) AS 'total admin' FROM tbladmins WHERE isActive = 1 AND admin_department_id = '$department_id'";
    }


  

  $count_admin = $connection->query($query) or die(mysqli_error());

  return $count_admin;
}


function count_total_professors($department_id){
  global $connection;

  if($department_id == 1){

  $query = "SELECT count(*) AS 'total prof' FROM tblprofessor WHERE isActive = 1";

  }else{
     $query = "SELECT count(*) AS 'total prof' FROM tblprofessor WHERE isActive = 1 AND department = '$department_id'";
  }

  $count_prof = $connection->query($query) or die(mysqli_error());

  return $count_prof;
}



function count_total_guidance_councilors(){
  global $connection;

  $query = "SELECT count(*) AS 'total gc' FROM tblguidancecouncilor WHERE isActive = 1";

  $count_gc = $connection->query($query) or die(mysqli_error($connection));

  return $count_gc;
}

function count_guidance_councilors_male(){
  global $connection;

  $query = "SELECT count(*) AS 'male gc' FROM tblguidancecouncilor WHERE isActive = 1 AND gender='Male'";

  $count_gc = $connection->query($query) or die(mysqli_error($connection));

  return $count_gc;
}

function count_guidance_councilors_female(){
  global $connection;

  $query = "SELECT count(*) AS 'female gc' FROM tblguidancecouncilor WHERE isActive = 1 AND gender='Female'";

  $count_gc = $connection->query($query) or die(mysqli_error($connection));

  return $count_gc;
}


function count_total_students($department_id){
  global $connection;

  if($department_id == 1){
    $query = "SELECT count(*) AS 'total student' FROM tblstudentinfo WHERE isActive = 1";
  }else{
    $query = "SELECT count(*) AS 'total student' FROM tblstudentinfo WHERE isActive = 1  AND department = '$department_id'";
  }  
  

  $count_student = $connection->query($query) or die(mysqli_error());

  return $count_student;
}



//gender admins
function count_admin_gender_male($department_id){
  global $connection;

  if($department_id == 1){
    $query = "SELECT count(gender) AS 'gender_male' FROM tbladmins WHERE gender = 'Male' AND isActive = 1";
  }else{
    $query = "SELECT count(gender) AS 'gender_male' FROM tbladmins WHERE gender = 'Male' AND isActive = 1 AND admin_department_id = '$department_id'";
  }
  $count_admin_male = $connection->query($query) or die(mysqli_error($connection));

  return $count_admin_male;
}


function count_admin_gender_female($department_id){
  global $connection;

  if($department_id == 1){
    $query = "SELECT count(gender) AS 'gender_female' FROM tbladmins WHERE gender = 'Female' AND isActive = 1";
  }else{
     $query = "SELECT count(gender) AS 'gender_female' FROM tbladmins WHERE gender = 'Female' AND isActive = 1 AND admin_department_id = '$department_id'";
  }
  $count_admin_female = $connection->query($query) or die(mysqli_error($connection));

  return $count_admin_female;
}


//gender professors
function count_professor_gender_male($department_id){
  global $connection;

  if($department_id == 1){
  $query = "SELECT count(gender) AS 'gender_male' FROM tblprofessor WHERE gender = 'Male' AND isActive = 1";
  }else{
     $query = "SELECT count(gender) AS 'gender_male' FROM tblprofessor WHERE gender = 'Male' AND isActive = 1 AND department = '$department_id'";
  }
  $count_professors_male = $connection->query($query) or die(mysqli_error($connection));

  return $count_professors_male;
}


function count_professor_gender_female($department_id){
  global $connection;

  $query = "SELECT count(gender) AS 'gender_female' FROM tblprofessor WHERE gender = 'Female' AND isActive = 1";

  $count_professor_female = $connection->query($query) or die(mysqli_error($connection));

  return $count_professor_female;
}


//gender students
function count_students_gender_male($department_id){
  global $connection;

  if($department_id == 1){
    $query = "SELECT count(gender) AS 'gender_male' FROM tblstudentinfo WHERE gender = 'Male' AND isActive = 1";
  }else{
    $query = "SELECT count(gender) AS 'gender_male' FROM tblstudentinfo WHERE gender = 'Male' AND isActive = 1 AND department = '$department_id'"  ;
  }

  $count_professors_male = $connection->query($query) or die(mysqli_error($connection));

  return $count_professors_male;
}


function count_students_gender_female($department_id){
  global $connection;

  if($department_id == 1){
  $query = "SELECT count(gender) AS 'gender_female' FROM tblstudentinfo WHERE gender = 'Female' AND isActive = 1";
  }else{
    $query = "SELECT count(gender) AS 'gender_female' FROM tblstudentinfo WHERE gender = 'Female' AND isActive = 1 AND department = '$department_id'";
  }
  $count_professor_female = $connection->query($query) or die(mysqli_error($connection));

  return $count_professor_female;
}

//with id parameters
//count programs for eache department
function count_programs_by_department($department_id){
  global $connection;
  $department_id = mysql_prep($department_id);

  $query = "SELECT count(*) AS 'number_of_programs' FROM tblcollegeprograms WHERE department_id = '$department_id'";

  $count_programs_department = $connection->query($query) or die(mysqli_error($connection));

  return $count_programs_department;
}

//count admins for each department
function count_admins_by_department($department_id){
  global $connection;
  $department_id = mysql_prep($department_id);

  $query = "SELECT count(*) AS 'number_of_admins' FROM tbladmins WHERE admin_department_id = '$department_id'";

  $count_admin_department = $connection->query($query) or die(mysqli_error($connection));

  return $count_admin_department;
}


//count professors for each department
function count_professors_by_department($department_id){
  global $connection;
  $department_id = mysql_prep($department_id);

  $query = "SELECT count(*) AS 'number_of_professors' FROM tblprofessor WHERE department = '$department_id' AND isActive = 1";

  $count_professors_department = $connection->query($query) or die(mysqli_error($connection));

  return $count_professors_department;
}


 function count_students_by_department($department_id){
  global $connection;
  $department_id = mysql_prep($department_id);

  $query = "SELECT count(*) AS 'number_of_students' FROM tblstudentinfo WHERE department = '$department_id' AND isActive = 1";

  $count_students_department = $connection->query($query) or die(mysqli_error($connection));

  return $count_students_department;
}



//count section for each program
function count_section_by_programs($program_id){
  global $connection;
  $program_id = mysql_prep($program_id);

  $query = "SELECT count(*) AS 'number_of_sections' FROM tblsection WHERE program_id = '$program_id'";

  $count_section_program = $connection->query($query) or die(mysqli_error($connection));

  return $count_section_program;
}


//function countstudent for each program
function count_student_by_programs($program_id){
  global $connection;
  $program_id = mysql_prep($program_id);

  $query = "SELECT count(*) AS 'number_of_students' FROM tblstudentinfo WHERE program_major = '$program_id'";

  $count_student_program = $connection->query($query) or die(mysqli_error($connection));

  return $count_student_program;
}






//with parameters
//get department_details by department id
function get_department_details_by_department_id($department_id){
    global $connection;
    $department_id = mysql_prep($department_id);

    $query = "SELECT * FROM tbldepartments WHERE department_id = '$department_id'";

    $get_department_details = $connection->query($query) or die(mysqli_error($connection));

    return $get_department_details;
}

//get all programs by department id
function get_all_programs_by_department($department_id){
      global $connection;
      $department_id = mysql_prep($department_id);

      $query = "SELECT * FROM tblcollegeprograms WHERE department_id = '$department_id'";

      $get_department_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_department_details;
  }



//get all events single  /// must have a parameter of  admin department id
  function get_all_single_day_events(){
      global $connection;
     

     // $query = "SELECT * FROM tblevents FULL OUTER JOIN tbldepartments  ON (tblevents.department_id = tbldepartments.department_id) FULL OUTER JOIN tbladmins ON (tbldepartments.department_id = tbladmins.admin_department_id)  WHERE type = 'Single day event' ORDER BY start desc";

      $query = "SELECT * FROM tblevents WHERE type = 'Single day event'";

      $get_event_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_event_details;
  }


  //get all events multiple  must have a parameter of  admin department id
  function get_all_multiple_day_events(){
      global $connection;
     

      $query = "SELECT * FROM tblevents WHERE type = 'Multiple day event'";

      $get_event_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_event_details;
  }



  //with parameters
  //insert into log table

  function insert_log($log_user_id,$log_header,$log_message,$userlevel){
    global $connection;

    $log_user_id = mysql_prep($log_user_id);
    $log_message =  mysql_prep($log_message);
    $log_haeder = mysql_prep($log_header);
    $userlevel = mysql_prep($userlevel);

    //$log_time = mysql_prep($log_time);

    $query = "INSERT INTO tbllogs(log_user_id,log_header,log_message,log_time,log_date,log_user_level) VALUES ('$log_user_id','$log_header','$log_message', now(),now(),'$userlevel')";

    $run_log = $connection->query($query) && mysqli_affected_rows($connection) == 1 or die(mysqli_error($connection));

    return $run_log;
  }


  //for getting logs admins

  function get_all_logs_by_date_and_admin_id($admin_id,$date){
      global $connection;
      $admin_id = mysql_prep($admin_id);
      $date = mysql_prep($date);
      $userlevel = "admin";
      $query = "SELECT * FROM tbllogs WHERE log_user_id = '$admin_id' AND log_date ='$date' AND log_user_level ='$userlevel' ORDER BY log_time DESC";

      $get_log_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_log_details;
  }

  //distinct date
    function get_all_log_dates_by_admin_id($admin_id){
      global $connection;
      $admin_id = mysql_prep($admin_id);
      $userlevel = "admin";
      $query = "SELECT DISTINCT log_date FROM tbllogs WHERE log_user_id = '$admin_id' AND log_user_level ='$userlevel' ORDER BY log_date DESC";

      $get_log_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_log_details;
  }


  //for getting logs prof

  function get_all_logs_by_date_and_prof_id($professor_id,$date){
      global $connection;
      $professor_id = mysql_prep($professor_id);
      $date = mysql_prep($date);
      $userlevel = "prof";
      $query = "SELECT * FROM tbllogs WHERE log_user_id = '$professor_id' AND log_date ='$date' AND log_user_level = '$userlevel' ORDER BY log_time DESC";

      $get_log_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_log_details;
  }

    //distinct date
    function get_all_log_dates_by_prof_id($professor_id){
      global $connection;
      $professor_id = mysql_prep($professor_id);
      $userlevel = "prof";
      $query = "SELECT DISTINCT log_date FROM tbllogs WHERE log_user_id = '$professor_id' AND log_user_level = '$userlevel' ORDER BY log_date DESC";

      $get_log_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_log_details;
  }









  //distinct date gc's
    function get_all_log_dates_by_gc_id($gc_id){
      global $connection;
      $gc_id = mysql_prep($gc_id);
      $userlevel = "gc";
      $query = "SELECT DISTINCT log_date FROM tbllogs WHERE log_user_id = '$gc_id' AND log_user_level ='$userlevel' ORDER BY log_date DESC";

      $get_log_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_log_details;
  }



    function get_all_logs_by_date_and_gc_id($gc_id,$date){
      global $connection;
      $gc_id = mysql_prep($gc_id);
      $date = mysql_prep($date);
      $userlevel = "gc";
      $query = "SELECT * FROM tbllogs WHERE log_user_id = '$department_id' AND log_date ='$date' AND log_user_level ='$userlevel' ORDER BY log_time DESC";

      $get_log_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_log_details;
  }




  //for getting logs prof

  function get_all_logs_by_date_and_student_id($student_id,$date){
      global $connection;
      $student_id = mysql_prep($student_id);
      $date = mysql_prep($date);
      $userlevel = "student";
      $query = "SELECT * FROM tbllogs WHERE log_user_id = '$student_id' AND log_date ='$date' AND log_user_level = '$userlevel' ORDER BY log_time DESC";

      $get_log_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_log_details;
  }

    //distinct date
    function get_all_log_dates_by_student_id($student_id){
      global $connection;
      $student_id = mysql_prep($student_id);
      $userlevel = "student";
      $query = "SELECT DISTINCT log_date FROM tbllogs WHERE log_user_id = '$student_id' AND log_user_level = '$userlevel' ORDER BY log_date DESC";

      $get_log_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_log_details;
  }





  /*function get_all_announcement($department_id){
     global $connection;
      $department_id = mysql_prep($department_id);
      if($department_id == 1){
      // all announcement will be retrieve 
      $query = "SELECT * FROM tblannouncements INNER JOIN tbladmins ON tblannouncements.user_id = tbladmins.admin_id ORDER by announcement_id desc";
    }else{

        //only those announcement from that department will be retrieve including the post of the admin
       $query = "SELECT * FROM tblannouncements INNER JOIN tbladmins ON tblannouncements.user_id = tbladmins.admin_id WHERE tblannouncements.department_id = '$department_id' OR tblannouncements.department_id = 1 ORDER by announcement_id desc";
    }
      $get_announcement = $connection->query($query) or die(mysqli_error($connection));

      return $get_announcement;
  }*/


function get_all_announcement($department_id){
     global $connection;
      $department_id = mysql_prep($department_id);
      
      // all announcement will be retrieve 
      $query = "SELECT * FROM tblannouncements INNER JOIN tbladmins ON (tblannouncements.user_id = tbladmins.admin_id) INNER JOIN tbldepartments ON (tbladmins.admin_department_id = tbldepartments.department_id) ORDER by announcement_id desc";
    
      $get_announcement = $connection->query($query) or die(mysqli_error($connection));

      return $get_announcement;
  }

function get_all_announcement_by_department_id($department_id){
   global $connection;
      $department_id = mysql_prep($department_id);
      
      // all announcement will be retrieve 
      $query = "SELECT * FROM tblannouncements INNER JOIN tbladmins ON (tblannouncements.user_id = tbladmins.admin_id) INNER JOIN tbldepartments ON (tbladmins.admin_department_id = tbldepartments.department_id) WHERE tbldepartments.department_id = '$department_id' ORDER by announcement_id desc";
    
      $get_announcement = $connection->query($query) or die(mysqli_error($connection));

      return $get_announcement;
}

function get_all_event_by_department_id($department_id){
   global $connection;
      $department_id = mysql_prep($department_id);
      
      
      $query = "SELECT * FROM tblevents INNER JOIN tbldepartments ON (tblevents.department_id = tbldepartments.department_id)  ORDER by id desc";
    
      $get_events = $connection->query($query) or die(mysqli_error($connection));

      return $get_events;
}


  function get_all_events_by_date_and_department_id($department_id,$date){
      global $connection;
      $department_id = mysql_prep($admin_id);
      $date = mysql_prep($date);

      $query = "SELECT * FROM tblevents INNER JOIN tbldepartments ON (tblevents.department_id = tbldepartments.department_id) WHERE tbldepartments.department_id = '$department_id' AND tblevents.start = '$date'  ORDER by id desc";
     
     

      $ $get_events = $connection->query($query) or die(mysqli_error($connection));

      return $ $get_events;
  }

  //testings

  function get_events_by_id($event_id){
      global $connection;
      $event_id = mysql_prep($event_id);

      $query = "SELECT * FROM tblevents WHERE id = '$event_id'";

      $get_event_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_event_details;
  }




  //for section and year

  function get_all_year(){
     global $connection;
    

      $query = "SELECT * FROM tblyearlevel ";

      $get_yearlevel = $connection->query($query) or die(mysqli_error($connection));

      return $get_yearlevel;
  }


    function get_all_section($department_id,$program_id){
     global $connection;
    
     $program_id = mysql_prep($program_id);
     $department_id =mysql_prep($department_id);
      $query = "SELECT * FROM tblsection WHERE program_id = '$program_id' AND '$department_id' ";

      $get_section = $connection->query($query) or die(mysqli_error($connection));

      return $get_section;
  }




  //get all departments
function get_all_subjects(){
   global $connection;

 

    $query = "SELECT  * FROM tblsubjects WHERE isActive = '1' ";

  

  $get_subjects = $connection->query($query) or die(mysqli_error());

  return $get_subjects;

}


function get_all_sections(){
   global $connection;

 

    $query = "SELECT  * FROM tblsection ";

  

  $get_section = $connection->query($query) or die(mysqli_error());

  return $get_section;
}


#for class section
function get_program_by_section_id($program_id){
    global $connection;

    $program_id = mysql_prep($program_id);

    $query = "SELECT  * FROM tblcollegeprograms WHERE program_id = '$program_id'";

  

    $get_data = $connection->query($query) or die(mysqli_error());

  return $get_data;
}


function get_department_by_section_id($department_id){
    global $connection;

    $department_id = mysql_prep($department_id);

    $query = "SELECT  * FROM tbldepartments WHERE department_id = '$department_id'";

  

    $get_data = $connection->query($query) or die(mysqli_error());

  return $get_data;
}

function get_year_by_section_id($yearlevel){
    global $connection;

    $yearlevel = mysql_prep($yearlevel);

    $query = "SELECT  * FROM tblyearlevel WHERE tbl_yearlevel_id = '$yearlevel'";

  

    $get_data = $connection->query($query) or die(mysqli_error());

  return $get_data;
}


#for class section




function get_count_student_by_section_id($section_id,$yearlevel,$department_id,$program_id){

  global $connection;
  $section_id = mysql_prep($section_id);
  $yearlevel = mysql_prep($yearlevel);
  $department_id = mysql_prep($department_id);
  $program_id = mysql_prep($program_id);

  $query = "SELECT count(*) AS 'number_of_students_in_this_section_year' FROM tblstudentinfo WHERE program_major = '$program_id' AND section = '$section_id' AND department = '$department_id' AND yearlevel = '$yearlevel' AND isActive = 1";

  $get_data= $connection->query($query) or die(mysqli_error($connection));

  return $get_data;

}

function get_all_year_level(){
  global $connection;

   $query = "SELECT * FROM tblyearlevel";
   $yearlevel = mysqli_query($connection,$query) or die(mysqli_error($connection));

  return $yearlevel;
}



function get_program_by_department_id($department_id){
    global $connection;

    $department_id = mysql_prep($department_id);

    $query = "SELECT  * FROM tblcollegeprograms WHERE department_id = '$department_id'";

  

    $get_data = $connection->query($query) or die(mysqli_error());

  return $get_data;
}







//
function get_prof_class_info($professor_id){
      global $connection;

      $professor_id = mysql_prep($professor_id);

      $query = "SELECT  * FROM tblprofessorsubject WHERE prof_id = '$professor_id'";

    

      $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;

}


function get_section_with_refence_id($section_id){
      global $connection;

      $section_id = mysql_prep($section_id);

      $query = "SELECT  * FROM tblsection WHERE tbl_section_id = '$section_id'";

    

      $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;

}


function get_subject_with_refence_id($subject_id){
      global $connection;

      $subject_id = mysql_prep($subject_id);

      $query = "SELECT  * FROM tblsubjects WHERE subject_id = '$subject_id'";

    

      $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;

}



function get_professor_with_refence_id($professor_id){
      global $connection;

      $professor_id = mysql_prep($professor_id);

      $query = "SELECT  * FROM tblprofessor WHERE tbl_prof_id = '$professor_id'";

    

      $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;

}


function get_department_with_refence_id($department_id){
      global $connection;

      $department_id = mysql_prep($department_id);

      $query = "SELECT  * FROM tbldepartments WHERE department_id = '$department_id'";

    

      $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;

}


//not official
function get_all_subject_for_this_professor_by_department_id($department_id){
       global $connection;

      $department_id = mysql_prep($department_id);

      $query = "SELECT  * FROM tblsubjects WHERE department_id = '$department_id'";

    

      $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;
}


///unofficial
function check_prof_availability($prof_id,$section_id,$yearlevel){
    global $connection;
    $prof_id = mysql_prep($prof_id);
    $section_id = mysql_prep($section_id);
    $yearlevel = mysql_prep($yearlevel);
     $query = "SELECT * FROM tblprofessorsubject WHERE prof_id ='$prof_id' AND (section_id = '$section_id' AND yearlevel = '$yearlevel') AND profsubject_id = ''";

     $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;
}



//edit assigned subject unofficial
function get_all_subject_for_this_professor_for_update_subject_assigned($department_id,$profsubject_id){
       global $connection;

      $department_id = mysql_prep($department_id);
      $profsubject_id = mysql_prep($profsubject_id);

      $query = "SELECT  * FROM tblsubjects INNER JOIN tblprofessorsubject ON tblsubjects.department_id = tblprofessorsubject.department_id WHERE tblprofessorsubject.department_id = '$department_id' AND tblprofessorsubject.profsubject_id != '$profsubject_id'";

    

      $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;
}


function get_student_class_info($student_id){
      global $connection;

      $professor_id = mysql_prep($professor_id);

      $query = "SELECT  * FROM tblprofessorsubject WHERE prof_id = '$professor_id'";

    

      $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;

}



//accepts yearlevel,section,program_id,department comming from tblstudentinfo
function get_student_subject_from_prof_class_info($yearlevel,$section,$program_id,$deparment){
      global $connection;

      $yearlevel = mysql_prep($yearlevel);
      $section = mysql_prep($section);
      $program_id = mysql_prep($program_id);
      $deparment = mysql_prep($deparment);

      $query = "SELECT  * FROM tblprofessorsubject WHERE yearlevel = '$yearlevel' AND section_id = '$section' AND program_id = '$program_id' AND department_id = '$deparment'";

    

      $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;

}



function get_midterm_grade_for_student($prof_id,$student_id,$subject_id){
      global $connection;

      $prof_id = mysql_prep($prof_id);
      $student_id = mysql_prep($student_id);
      $subject_id = mysql_prep($subject_id);
      

      $query = "SELECT  * FROM tblstudentsubjects WHERE prof_id = '$prof_id' AND student_id = '$student_id' AND subject_id = '$subject_id'";

    

      $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;
}


function get_midterm_evaluation_for_student($prof_id,$student_id,$subject_id){
      global $connection;

      $prof_id = mysql_prep($prof_id);
      $student_id = mysql_prep($student_id);
      $subject_id = mysql_prep($subject_id);
      

      $query = "SELECT  * FROM tblstudentsubjects WHERE prof_id = '$prof_id' AND student_id = '$student_id' AND subject_id = '$subject_id'";

    

      $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;
}

function get_finals_grade_for_student($prof_id,$student_id,$subject_id){
      global $connection;

      $prof_id = mysql_prep($prof_id);
      $student_id = mysql_prep($student_id);
      $subject_id = mysql_prep($subject_id);
      

      $query = "SELECT  * FROM tblstudentsubjects WHERE prof_id = '$prof_id' AND student_id = '$student_id' AND subject_id = '$subject_id'";

    

      $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;
}


function get_finals_evaluation_for_student($prof_id,$student_id,$subject_id){
      global $connection;

      $prof_id = mysql_prep($prof_id);
      $student_id = mysql_prep($student_id);
      $subject_id = mysql_prep($subject_id);
      

      $query = "SELECT  * FROM tblstudentsubjects WHERE prof_id = '$prof_id' AND student_id = '$student_id' AND subject_id = '$subject_id'";

    

      $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;
}



//get subject for that department
function get_subject_for_this_department_by_department_id($department_id){
      global $connection;

      $department_id = mysql_prep($department_id);

      $query = "SELECT  * FROM tblsubjects WHERE department_id = '$department_id'";

    

      $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;

}


//get all tutorials by department_id

function get_all_tutorials_by_department_id($department_id){
    global $connection;

      $department_id = mysql_prep($department_id);

      $query = "SELECT  * FROM tbltutorials WHERE department_id = '$department_id'";

    

      $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;
}


function get_subject_for_this_tutorial($subject_id){
    global $connection;

      $subject_id = mysql_prep($subject_id);

      $query = "SELECT  * FROM tblsubjects WHERE subject_id = '$subject_id'";

    

      $get_data = $connection->query($query) or die(mysqli_error());

    return $get_data;
}



function open_encode_of_grade(){
   global $connection;

   $query = "SELECT * FROM tblprevileges WHERE tbl_previleges_id = 1";
    $isStateActive = mysqli_query($connection,$query) or die(mysqli_error($connection));

    return $isStateActive;
}





?>
