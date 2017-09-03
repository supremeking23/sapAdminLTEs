<?php 
  include("../../includes/sessions.php");
  include("../../includes/connection.php");
  include("../../includes/functions.php");
?>


<?php
	//select all events
	$query = "SELECT * FROM tblevents";
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
		
		//merget the vent array into the return array
		array_push($events, $e);

	}

		//output json for our calendar
		echo  json_encode($events);


?>

