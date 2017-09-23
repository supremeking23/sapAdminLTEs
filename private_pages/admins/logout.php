<?php
  include("../includes/sessions.php");
  include("../includes/connection.php");
  include("../includes/functions.php");

//checked to see if the user is login...
  //confirm_logged_in_admin();
  ?>

<?php 
	//v1: simple logout
	// session_start();
	$log_user_id = $_SESSION["admin_id"];
	$userlevel="admin";
	$date=date("l jS \of F Y ");
	$log_header = "Success Logout";
	$log_message = "Success Logout at " . $date;
	insert_log($log_user_id,$log_header,$log_message,$userlevel);
	$_SESSION["admin_id"] = null; //wash it away.... handstamp
	//$_SESSION["username"] = null;
	redirect_to("login.php");
?>

<?php

	//heavy handed 
	//v2: destroy session
	// assumes nothing else in session to keep
	//session_start();
	// $_SESSION = array();
	// if(isset($_COOKIE[session_name()])) {
	// setcokie(session_name(),''.time()-42000,'/');
	//}
	// session_destroy();
	//redirect_to("login.php");
?>