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


function check_student_id($idnumber){
  global $connection;
  $idnumber = mysql_prep($idnumber);
  $check_for_id_query2= "SELECT * FROM dummy_table where student_id = '$idnumber' AND (email = '' AND password = '') LIMIT 1";
  $row_result = $connection->query($check_for_id_query2);
  if($row_result->num_rows > 0){
      return $row_result;
      //redirect_to("register.php");
  }else{
      return null;
  }
}


function register($idnumber,$email,$password){
  global $connection;
  $idnumber = mysql_prep($_POST['idnumber']);
  $email = mysql_prep($_POST['email']);
  //the confirm password
  $password = mysql_prep($_POST['confirm_password']);
  $query_update = "UPDATE dummy_table SET email = '$email', password = '$password' WHERE student_id = '$idnumber'";
  if ($connection->query($query_update) === TRUE) {
      return true;
  } else {

  }
}


function attempt_login($email,$password){
	global $connection;

  $email = mysql_prep($_POST['email']);
  //the confirm password
  $password = mysql_prep($_POST['password']);

  $query = "SELECT * FROM dummy_table WHERE email = '$email' AND password = '$password' LIMIT 1";
  $result = $connection->query($query);

  if($login = mysqli_fetch_assoc($result)){
    //echo $login['name'];
    return $login;


  }else{
    return null;
    //redirect_to("login.php");
  }
}

?>
