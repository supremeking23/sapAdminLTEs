<?php
  include("../includes/sessions.php");
  include("../includes/connection.php");
  include("../includes/functions.php");

//checked to see if the user is login...
  confirm_logged_in();
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="css/sidebar.css" rel="stylesheet">

		<!--HomePageDesigningTools-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

  </head>
  <body>

	<nav class="navbar navbar-default navbar-fixed-top" id="navbar">
		<div class="container-fluid">

			<div class="header">

				<img src ="images/Logo.png" id="logo">
				<div class="vertical-line"/>

				<!--<div class="vertical line" id="line"></div>-->
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" ><span class="glyphicon glyphicon-calendar" id="cal"></a></li>
				<li><a href="#"><span class="glyphicon glyphicon-bell" id="bell"></a></li>
				<li><a href="#"><span  class="glyphicon glyphicon-user" id="user"></a></li>

			</ul>
		</div>
	</nav>

	<div class="container-fluid" id="side" >

		<div class="row" >
			<div class="col-sm-3"  id="sidebar" data-spy="affix">
				<div id="Profile" >
						<img src="images/student.png"  alt="Student" id="studentpic">
					</div>

				<ul class="nav nav-pills nav-stacked "  data-spy="affix" id="sidenav">

					<li><a href="Sidebar.php"  id="overview"><span ><center><b>Overview</b></center></a></li>
					<li><a href="Subjects.php" id="subjects"><center><b>Subjects</b></center></a></li>
					<li><a href="#Students" id="a"><center><b>Services</b></center></a></li>
					<li><a href="techsupport.php" id="a"><center><b>Tech Support</b></center></a></li>
				</ul>

			</div>

			<div class="col-sm-3"  >
			</div>


			<div class="col-sm-9" id="content" >
				<!--<canvas id="gauge">

				</canvas>

				<div id="Overview">-->


				<div class="container">
            <h1><?php echo $_SESSION['student_id']?></h1>
					<div class="jumbotron" id="chartbackground">
						<div id="vid"><b>Student Performance</b></div>

						<!--put student performance here -->

						<canvas id="canvas" width="300" height="300"></canvas>

						<script src="js/gauge.js"></script>

					</div>

				</div>

					<!--<canvas id="ass" width="300" height="300"></canvas>
				<script src="js/ass.js"></script>-->



				<div class="container">
					<div class="jumbotron" id="vidlist2">
						<div id="vid"><b>Recommended Videos</b></div>


							<!--put video content here -->


						<div id="link"><b>Suggested Links</b></div>

						<ul = row >
							<!--put link content here -->
							<li><div class="well well-sm" id="link1"><a href="w3schools.com"><b>w3schools.com</a></div></li>
							<li><div class="well well-sm" id="link1"><a href="see.stanford.edu">see.stanford.edu</a></div></li>
							<li><div class="well well-sm" id="link1"><a href="ocw.mit.edu">ocw.mit.edu</a></div></li>
							<li><div class="well well-sm" id="link1"><a href="github.com">github.com</a></div></li>
							<li><div class="well well-sm" id="link1"><a href="codecademy.com">codecademy.com</b></a></div></li>


						</ul>





					</div>

				</div>
				<!--links-->
				<div class="container">
					<div class="jumbotron" id="missionvisioncontainer">


						<div class="jumbotron" id="mission">
						<br>
						<br>
						<br>
						<center><img src = "images/mission.png" id="mis"></center>
						<div id="vid1"><b><center>Mission</center></b></div>
						<br>
						<p id="mcontent">The College of Computer Science envisions an Information Technology Education Institution committed to the development and adequate utilization and applications of information technology.
							</p>
						</div>


						<div class="jumbotron" id="vision">
						<br>
						<br>
						<br>
						<center><img src = "images/vision.png" id = "vis"></center>
						<div id="vid1"><b><center>vision</center></b></div>

						<p id="vcontent">
						<br>
							Guided by its vision of commitment, the College shall provide a competitive, relevant, and functional information technology education curriculum responsive to the needs of the industrial and business organizations of the locality.

						</p>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="jumbotron" id="ccs">
						<div id="vid3"><b>College of Computer Science</b></div>
						<br>
						<br>
						<br>


						<img src="images/secretary.png" id ="sec">
						<p id="name">Dr.Antonio Maralit</p>
						<h4 id="role"><b>Dean</b></h4>
						<hr>
						<br>
						<br>
						<img src="images/secretary.png" id ="sec">
						<p id="name">Dr.Merlyn Paulmitan</p>
						<h4 id="role"><b>College Secretary</b></h4>
						<hr>
						<br>
						<br>
						<img src="images/secretary.png" id ="sec">
						<p id="name">Dr.Antonio Maralit</p>
						<h4 id="role"><b>Dean</b></h4>
						<hr>
						<br>
						<br>
						<img src="images/secretary.png" id ="sec">
						<p id="name">Dr.Antonio Maralit</p>
						<h4 id="role"><b>Dean</b></h4>
						<hr>
						<br>
						<br>
						<img src="images/secretary.png" id ="sec">
						<p id="name">Dr.Antonio Maralit</p>
						<h4 id="role"><b>Dean</b></h4>
						<hr>

				</div>
			</div>



				</div>
			</div>
		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">

		</script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->


    <script src="js/bootstrap.min.js">

	</script>
  </body>
</html>
