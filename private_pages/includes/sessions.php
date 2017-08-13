<?php
  session_start();

  function message(){
		if(isset($_SESSION["message"])){
			$output =  "<div class=\"well well-sm\">";
			$output .= "<div class=\"text-success \">";
			$output .= htmlentities($_SESSION["message"]);
			$output .= "</div>";
			$output .= "</div>";

			//clear message after use
			$_SESSION["message"] = null;

			return $output;
		}
	}


  function message_success(){
		if(isset($_SESSION["success_message"])){
			$output =  "<div class=\"well well-sm\">";
			$output .= "<div class=\"text-success \">";
			$output .= htmlentities($_SESSION["success_message"]);
			$output .= "</div>";
			$output .= "</div>";

			//clear message after use
			$_SESSION["success_message"] = null;

			return $output;
		}
	}




	 function failed_message(){
		if(isset($_SESSION["failed_message"])){
			$output =  "<div class=\"well well-sm\">";
			$output .= "<div class=\"text-danger \">";
			$output .= htmlentities($_SESSION["failed_message"]);
			$output .= "</div>";
			$output .= "</div>";

			//clear message after use
			$_SESSION["failed_message"] = null;

			return $output;
		}
	}
?>
