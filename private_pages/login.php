
<!DOCTYPE html>
<html>


	<head>

	<title>Login</title>


	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<!-- Style --> <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<!-- Fonts --> <!--<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700"> -->

	</head>

	<body>

		<h1></h1>


		<div class="mainContainer hidden">

			<div class="logo" align="center">
				<a href="../index.php"><img alt="logo" src="images/logo.png" style="height: 250px; margin: 0px auto;"/></a>
			</div>

			<form action="#" method="post">
				<input type="email" Name="email" placeholder="EMAIL" required="">
				<input type="password" Name="password" placeholder="PASSWORD" required="">
				<ul class="tickOption">
					<li>
						<input type="checkbox" id="brand1" value="">
						<label for="brand1"><span></span>Remember me</label>
						<a href="#">Forgot password?</a>
					</li>
				</ul>
				<div class="submitOption">
					<input type="submit" value="LOGIN">
					<p> To register new account <span>→</span> <a href="signup.php"> Click Here</a></p>
					<div class="clear"></div>
				</div>
			</form>
		</div>


		<div class="footer fade-in hidden">
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
