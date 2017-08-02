
<!DOCTYPE html>
<html>


	<head>

	<title>Sign Up</title>


	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<!-- Style --> <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<!-- Fonts --> <!--<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700">
-->

	</head>

	<body>
		<div style="margin-bottom: 20px;"></div>

		<div class="mainContainer hidden">

			<div class="logo" align="center">
				<a href="../index.php"><img alt="logo" src="images/logo.png" style="height: 250px; margin: 0px auto;"/></a>
			</div>

			<form action="#" method="post">
				<div class="form-component">
					<input placeholder="School ID Number"  type="text" required="">
					<div class="icon-agile">
						<i class="user" aria-hidden="true"></i>
					</div>
				</div>
				<div class="form-component">
					<input placeholder="Email" class="mail" type="email" required="">
					<div class="icon-agile">
						<i class="mail" aria-hidden="true"></i>
					</div>
				</div>
				<div class="form-component">
					<input placeholder="Password"  type="password" required="">
					<div class="icon-agile">
						<i class="pass" aria-hidden="true"></i>
					</div>
				</div>
				<div class="form-component">
					<input placeholder="Confirm Password"  type="password" required="">
					<div class="icon-agile">
						<i class="confirm-pass" aria-hidden="true"></i>
					</div>
				</div>
				<div class="login-check">
					<label class="checkbox" style="color:white;">
					<input type="checkbox" name="checkbox" checked="" >I Accept Terms & Conditions</label>
				</div>

				<div class="submitOption" style="margin-top: 20px;">
					<input type="submit" value="SIGN-UP">
					<p> Already have an account? <span>→</span> <a href="login.php"> Click Here</a></p>
					<div class="clear"></div>
				</div>
			</form>
		</div>

		<div class="footer hidden" style="margin-top: 70px;">
			<p> &copy; 2017 All Rights Reserved </p>
		</div>

		<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
		<script>
			$(document).ready(function () {
				$('div.hidden').fadeIn(1300).removeClass('hidden');
			});
		</script>

	</body>


</html>
