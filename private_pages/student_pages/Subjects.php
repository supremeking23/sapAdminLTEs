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
	<link href="css/subject.css" rel="stylesheet">

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
				<div class="container">

					<div class="jumbotron" id="program">
					<br>

						<div id="vid"><b>Program:College Of Computer Science:Major in Application Development</b></div>
						<br>
						<br>


					</div>

					<div class="jumbotron" id="courses">
						<br>

						<img src="images/book.png" id="book">
						<div id="list"><b>List Of Subjects</b></div>
						<br>
						<br>
						<div class="table-responsive">

							<table class="table table-hover" >
								<thead>
									<tr>
										<th>CFN #</th>
										<th>Course Code</th>
										<th>Course Title</th>
										<th>Section</th>
										<th>Unit</th>
										<th>Time</th>
										<th>Days</th>
										<th>Room</th>
										<th>Class Size</th>
										<th>Enrolled #</th>
									</tr>
								</thead>
							<tbody>
								<tr>
									<td>#01</td>
									<td>CCS</td>
									<td>DATA COMM</td>

									<td>ACSAD</td>
									<td>4.0</td>
									<td>12P.M-1:30P.M</td>

									<td>M-TH</td>
									<td>801</td>
									<td>45</td>

									<td>#123</td>
								</tr>
								<tr>
									<td>#02</td>
									<td>CCS</td>
									<td>MOBI COMM</td>

									<td>ACSAD</td>
									<td>3.0</td>
									<td>1:30P.M-3:00P.M</td>

									<td>M-TH</td>
									<td>LAB 1</td>
									<td>40</td>

									<td>#223</td>
								</tr>


							</tbody>
							</table>
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
