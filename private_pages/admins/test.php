<?php
  include("../includes/sessions.php");
  include("../includes/connection.php");
  include("../includes/functions.php");


  header("Content-Type: application/json", true);
  //try
  if(isset($_POST['event_name'])){
  $single_day= $_POST['single_day'];
  $single_time = $_POST['single_time'];
  $event_name = $_POST['event_name'];
  $query = "INSERT INTO sample_table(start,start_time,title) VALUES('$single_day','$single_time','$event_name')";

  if(mysqli_query($connection,$query)or die(mysqli_error($connection))){
  	$_SESSION['success_message'] = "Event has been  successfully scheduled" ;
  }
 


  }else{
  	//$_SESSION['failed_message'] = "nothing is set " . $single_day . " sddsds " . $single_time;
  }
 

 //echo $_POST['event_name'] . "hahahahahhahahhaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaahhhhh";
?>
