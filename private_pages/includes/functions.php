<?php

//redirect to new page
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


// check if the id number exist in the database
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

//after the id has been verified... checked if the id has an email and a password
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

// check if the email has a match in any account
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

//student registration function
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

function get_all_students(){
  global $connection;

  $query = "SELECT  * FROM tblstudentinfo WHERE isActive = 1";

  $get_students = $connection->query($query) or die(mysqli_error());

  return $get_students;
}




//count functions


function count_total_admins(){
  global $connection;

  $query = "SELECT count(*) AS 'total admin' FROM tbladmins WHERE isActive = 1";

  $count_admin = $connection->query($query) or die(mysqli_error());

  return $count_admin;
}


function count_total_professors(){
  global $connection;

  $query = "SELECT count(*) AS 'total prof' FROM tblprofessor WHERE isActive = 1";

  $count_prof = $connection->query($query) or die(mysqli_error());

  return $count_prof;
}

function count_total_guidance_councilors(){
  global $connection;

  $query = "SELECT count(*) AS 'total gc' FROM tblguidancecouncilor WHERE isActive = 1";

  $count_gc = $connection->query($query) or die(mysqli_error($connection));

  return $count_gc;
}


function count_total_students(){
  global $connection;

  $query = "SELECT count(*) AS 'total student' FROM tblstudentinfo WHERE isActive = 1";

  $count_student = $connection->query($query) or die(mysqli_error());

  return $count_student;
}



//gender admins
function count_admin_gender_male(){
  global $connection;

  $query = "SELECT count(gender) AS 'gender_male' FROM tbladmins WHERE gender = 'Male' AND isActive = 1";

  $count_admin_male = $connection->query($query) or die(mysqli_error($connection));

  return $count_admin_male;
}


function count_admin_gender_female(){
  global $connection;

  $query = "SELECT count(gender) AS 'gender_female' FROM tbladmins WHERE gender = 'Female' AND isActive = 1";

  $count_admin_female = $connection->query($query) or die(mysqli_error($connection));

  return $count_admin_female;
}


//gender professors
function count_professor_gender_male(){
  global $connection;

  $query = "SELECT count(gender) AS 'gender_male' FROM tblprofessor WHERE gender = 'Male' AND isActive = 1";

  $count_professors_male = $connection->query($query) or die(mysqli_error($connection));

  return $count_professors_male;
}


function count_professor_gender_female(){
  global $connection;

  $query = "SELECT count(gender) AS 'gender_female' FROM tblprofessor WHERE gender = 'Female' AND isActive = 1";

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



//get all events single
  function get_all_single_day_events(){
      global $connection;
     

      $query = "SELECT * FROM tblevents WHERE type = 'Single day event'";

      $get_event_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_event_details;
  }


  //get all events multiple
  function get_all_multiple_day_events(){
      global $connection;
     

      $query = "SELECT * FROM tblevents WHERE type = 'Multiple day event'";

      $get_event_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_event_details;
  }



  //with parameters
  //insert into log table

  function insert_log($log_user_id,$log_header,$log_message){
    global $connection;

    $log_user_id = mysql_prep($log_user_id);
    $log_message =  mysql_prep($log_message);
    $log_haeder = mysql_prep($log_header);

    //$log_time = mysql_prep($log_time);

    $query = "INSERT INTO tbllogs(log_user_id,log_header,log_message,log_time,log_date) VALUES ('$log_user_id','$log_header','$log_message', now(),now())";

    $run_log = $connection->query($query) && mysqli_affected_rows($connection) == 1 or die(mysqli_error($connection));

    return $run_log;
  }


  //for getting logs

  function get_all_logs_by_date_and_admin_id($admin_id,$date){
      global $connection;
      $department_id = mysql_prep($admin_id);
      $date = mysql_prep($date);
      $query = "SELECT * FROM tbllogs WHERE log_user_id = '$department_id' AND log_date ='$date' ORDER BY log_time DESC";

      $get_log_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_log_details;
  }

  //distinct date
    function get_all_log_dates_by_admin_id($admin_id){
      global $connection;
      $department_id = mysql_prep($admin_id);

      $query = "SELECT DISTINCT log_date FROM tbllogs WHERE log_user_id = '$department_id' ORDER BY log_date DESC";

      $get_log_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_log_details;
  }





  //testings

  function get_events_by_id($event_id){
      global $connection;
      $event_id = mysql_prep($event_id);

      $query = "SELECT * FROM tblevents WHERE id = '$event_id'";

      $get_event_details = $connection->query($query) or die(mysqli_error($connection));

      return $get_event_details;
  }

?>
