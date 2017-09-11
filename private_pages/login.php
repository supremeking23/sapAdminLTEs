<?php
  include("includes/sessions.php");
  include("includes/connection.php");
  include("includes/functions.php");
  ?>


  <?php
      //login process
      $emaik="";
      if(isset($_POST['submit'])){
        //process the form

        $email = $_POST['email'];
        $password = $_POST['password'];
        $identity = $_POST['identity'];


        if($identity == "student"){
              $student_attempt_login = attempt_login_student($email,$password);

              if($student_attempt_login){
                $_SESSION["student_id"] = $student_attempt_login["student_id"];
                redirect_to("student_pages/Sidebar.php");
              }else{
                $_SESSION['failed_message'] = "Wrong email / password";
                //echo "<script>alert('sdsd')</script>";
              }

        }else if($identity == "professor"){
              $professor_attempt_login = attempt_login_professor($email,$password);

              if($professor_attempt_login){
                $_SESSION["prof_id"] = $professor_attempt_login["prof_id"];
                redirect_to("professors_pages/Sidebar.php");
              }else{
                $_SESSION['failed_message'] = "Wrong email / password";
              }

        }else if($identity == "councilor"){
            $councilor_attempt_login = attempt_login_councilor($email,$password);

            if($councilor_attempt_login){
              $_SESSION["gc_id"] = $councilor_attempt_login["gc_id"];
              redirect_to("councilor_pages/Sidebar.php");
            }else{
                $_SESSION['failed_message'] = "Wrong email / password";
              }
        }


      }
  ?>



<!DOCTYPE html>
<html>


	<head>

	<title>Login</title>


	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<!-- Style -->
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
   <!-- Theme style -->
  <link rel="stylesheet" href="admins/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="admins/dist/css/skins/skin-blue.min.css">
	<!-- Fonts --> <!--<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700"> -->

  <style>
      .custom-select{
        width: 84%;
      	padding: 15px 10px 15px;
      	font-size: 14px;
      	background: transparent;
      	border: 2px solid #6f96d6;
      	outline: none;
      	margin-bottom: 26px;
      	color: #fff;
      	font-family: 'Quicksand', sans-serif;
      }

      .custom-select option {
        opacity: 0.3;
        background: rgba(0,0,0,0.4);
      }
  </style>
	</head>

	<body>
     <?php echo failed_message();?>
		<!--<h1></h1>-->
    <div style="margin-top:70px"></div>
   

		<div class="mainContainer hidden">

			<div class="logo" align="center">
				<a href="../index.php"><img alt="logo" src="images/logo.png" style="height: 250px; margin: 0px auto;"/></a>
			</div>

			<form action="login.php" method="post">
				<input type="email" Name="email" class="" placeholder="EMAIL" required="">
				<input type="password" Name="password" placeholder="PASSWORD" required="">
        <select name="identity" class="custom-select">

          <option value="student" selected>STUDENT</option>
          <option value="professor">PROFESSOR</option>
          <option value="councilor">GUIDANCE COUNCILOR</option>
        </select>
				<ul class="tickOption">
					<li>
						<input type="checkbox" id="brand1" value="">
						<label for="brand1"><span></span>Remember me</label>
						<a href="#">Forgot password?</a>
					</li>
				</ul>
				<div class="submitOption">
					<input type="submit" name="submit" value="LOGIN">
					<p> To register new account <span>→</span> <a href="signup.php"> Click Here</a></p>
					<div class="clear"></div>
				</div>
			</form>
		</div>


		<div class="footer fade-in hidden">
			<p> &copy; 2017 All Rights Reserved </p>
		</div>


		<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

		<script>
			$(document).ready(function () {
				$('div.hidden').fadeIn(1300).removeClass('hidden');
			});

       $(document).ready(function(){
      $('#errormodal').modal('show');
    });
		</script>

	</body>


</html>

<?php $connection->close();?>
