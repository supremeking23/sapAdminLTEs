<?php

//redirect to new page
function redirect_to($new_location){
  header("Location: " . $new_location);
  exit;
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

  $query = "SELECT * FROM tbladmins WHERE admin_id = '$admin_id'";

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
function get_all_department(){
   global $connection;

  $query = "SELECT  * FROM tbldepartments";

  $get_department = $connection->query($query) or die(mysqli_error());

  return $get_department;

}


//get all admins

function get_all_admins(){
  global $connection;

  $query = "SELECT  * FROM tbladmins";

  $get_admin = $connection->query($query) or die(mysqli_error());

  return $get_admin;
}


//get all professors

function get_all_professors(){
  global $connection;

  $query = "SELECT  * FROM tblprofessor";

  $get_professors = $connection->query($query) or die(mysqli_error());

  return $get_professors;
}


function get_all_students(){
  global $connection;

  $query = "SELECT  * FROM tblstudentinfo";

  $get_students = $connection->query($query) or die(mysqli_error());

  return $get_students;
}




//count functions


function count_total_admins(){
  global $connection;

  $query = "SELECT count(*) AS 'total admin' FROM tbladmins";

  $count_admin = $connection->query($query) or die(mysqli_error());

  return $count_admin;
}


function count_total_professors(){
  global $connection;

  $query = "SELECT count(*) AS 'total prof' FROM tblprofessor";

  $count_prof = $connection->query($query) or die(mysqli_error());

  return $count_prof;
}

function count_total_guidance_councilors(){
  global $connection;

  $query = "SELECT count(*) AS 'total gc' FROM tblguidancecouncilor";

  $count_gc = $connection->query($query) or die(mysqli_error($connection));

  return $count_gc;
}


function count_total_students(){
  global $connection;

  $query = "SELECT count(*) AS 'total student' FROM tblstudentinfo";

  $count_student = $connection->query($query) or die(mysqli_error());

  return $count_student;
}



//gender admins
function count_admin_gender_male(){
  global $connection;

  $query = "SELECT count(gender) AS 'gender_male' FROM tbladmins WHERE gender = 'Male'";

  $count_admin_male = $connection->query($query) or die(mysqli_error($connection));

  return $count_admin_male;
}


function count_admin_gender_female(){
  global $connection;

  $query = "SELECT count(gender) AS 'gender_female' FROM tbladmins WHERE gender = 'Female'";

  $count_admin_female = $connection->query($query) or die(mysqli_error($connection));

  return $count_admin_female;
}


//gender professors
function count_professor_gender_male(){
  global $connection;

  $query = "SELECT count(gender) AS 'gender_male' FROM tblprofessor WHERE gender = 'Male'";

  $count_professors_male = $connection->query($query) or die(mysqli_error($connection));

  return $count_professors_male;
}


function count_professor_gender_female(){
  global $connection;

  $query = "SELECT count(gender) AS 'gender_female' FROM tblprofessor WHERE gender = 'Female'";

  $count_professor_female = $connection->query($query) or die(mysqli_error($connection));

  return $count_professor_female;
}




?>
