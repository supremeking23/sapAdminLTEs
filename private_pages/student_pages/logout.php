<?php require_once("../includes/session.php") ;?>
<?php require_once("../includes/functions.php") ;?>


<?php
	//v1: simple logout
	// session_start();
	$_SESSION["admin_id"] = null; //wash it away.... handstamp
	$_SESSION["username"] = null;
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
