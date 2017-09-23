<?php 
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");
?>


<?php
	//select all events

	$department_id = $_GET['department_id'];
	$query = "SELECT * FROM tblevents INNER JOIN tbldepartments ON tblevents.department_id = tbldepartments.department_id WHERE tbldepartments.department_id = '$department_id' ";
	$run_query = $connection->query($query);
	
	//return array
	$events = array();

	//fetch results

	while($row_event = mysqli_fetch_assoc($run_query)){
		$e = array();
		$e['id'] = $row_event['id'];
		$e['start'] = $row_event['start'];
		$e['end'] = $row_event['end'];
		$e['title'] = $row_event['title'];
		$e['backgroundColor'] = $row_event['department_color'];
		$e['start_time'] = $row_event['start_time'];
		
		//merget the vent array into the return array
		array_push($events, $e);

	}

		//output json for our calendar
		echo  json_encode($events);


?>

