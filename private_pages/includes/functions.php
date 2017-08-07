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


function logged_in() {
	return isset($_SESSION["student_id"]);
}

function confirm_logged_in() {
	if (!logged_in()) {
		redirect_to("../login.php");
	}
}

?>
