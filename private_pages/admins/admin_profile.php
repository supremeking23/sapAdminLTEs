<?php
  include("../includes/sessions.php");
  include("../includes/connection.php");
  include("../includes/functions.php");

  //
  date_default_timezone_set('Asia/Taipei');
//checked to see if the user is login...
  confirm_logged_in_admin();
  ?>

  <?php 
           //retrieving admin account

           $admin_id = $_SESSION['admin_id'];  
           $admin = get_admin_by_id($admin_id);

           if($admin){
             $last_name =  $admin['last_name'];
             $first_name = $admin['first_name'];
             $middle_name = $admin['middle_name'];
             $admin_department_id = $admin['admin_department_id'];
             $gender = $admin['gender'];
             $date_birth = $admin['date_birth'];
             $contact = $admin['contact'];
             $image = $admin['image'];
             $address = $admin['address'];
           }

  ?>
       

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>S-APP | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini " id="admins">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img width="50px" src="images/Logo.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>S-APP</b> Admin Panel</span>
    </a>

   <!-- Header Navbar -->
     <?php include('layouts/header_nav.php'); ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
     <?php include('layouts/navigation.php'); ?>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here -->

        <?php 
          //success message for updating profile picture
          echo message_success();
          //failed message for updating profile picture wrong password
         echo  failed_message();
        ?>
      
      <div class="row">
          
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title"></h3>

              </div><!-- /.box-header -->

              <div class="box-body">
                <center>
                 <img class="img-responsive" src="admin_images/<?php echo $image;?>" alt="Admin Picture" >
                 </center>
                <hr/>
                 
                 <center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-edit_picture">
                Change Profile Picture
                </button>
                </center>

                        <div class="modal fade" id="modal-edit_picture">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Change Profile Picture</h4>
                              </div>
                              

                                  <!-- form for updating of profile picture -->
                                    <form action="changepic.php" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                          <label>Profile Picture</label>
                                          <input required=""  type="file" name="upload-image" class="input-group" ><br>
                                          <p>Enter your password to continue.</p>
                                          <div class="form-group has-feedback">
                                            <input required=""  type="password" class="form-control" placeholder="Password" required="" name="password">
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                          </div>
                                        </div>

                                    

                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                          <input type="submit" name="upload" value="Upload"  class="btn btn-primary pull-right">
                                        </div>

                                </form>

                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
              </div><!-- /.box-body -->

              <div class="box-footer">
                <center>
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                    Change Information
                  </button>
                </center>

                <div class="modal fade" id="modal-default">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Profile</h4>
                      </div>
                              
                              <!-- form for updating of admin profile  -->

                        <script src = "../js/validations.js"></script>
                          <form action="process_pages/admin_edit_credential.php" method="post" enctype="multipart/form-data">
                              <div class="modal-body">
                               
                                <div class="form-group has-feedback">
                                  <input pattern="[a-zA-Z\s]{1,}" title="Letters only!" type="text" class="form-control" required="" placeholder="First Name" name="first_name" onkeypress = "return lettersonly(event)" value="<?php echo $first_name ?>">
                                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>

                                <div class="form-group has-feedback">
                                  <input pattern="[a-zA-Z\s]{1,}" title="Letters only!" type="text" class="form-control" required="" placeholder="Middle Name" name="middle_name" onkeypress = "return lettersonly(event)" value="<?php echo $middle_name ?>">
                                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>

                              <div class="form-group has-feedback">
                                <input pattern="[a-zA-Z\s]{1,}" title="Letters only!" type="text" class="form-control" required="" placeholder="Last Name" name="last_name" onkeypress = "return lettersonly(event)" value="<?php echo $last_name;?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                              </div>

                              <div class="form-group has-feedback">
                                <select class="form-control" name="gender">
                                  <option value="Male" <?php if($gender == 'Male') echo "selected=''"; ?>>Male</option>
                                  <option value="Female" <?php if($gender == 'Female') echo "selected=''"; ?>>Female</option>
                                </select>
                              </div>


                              <div class="form-group has-feedback">
                                <input type="text" class="form-control" required="" placeholder="Address" name="address" value="<?php echo $address;?>">
                                <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                              </div>


                              <div class="form-group has-feedback">
                                <input type="date" class="form-control" required="" name="date_birth" placeholder="Date of Birth" value="<?php echo $date_birth; ?>">
                                <span class="glyphicon glyphicon-calendar form-control-feedback" ></span>
                              </div>


                              <div class="form-group has-feedback">
                                <input title="Number only!" type="text" class="form-control" required="" placeholder="Contact" name="contact" onkeypress = "return numbersonly(event)" value="<?php echo $contact ?>">
                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                              </div>


                            <p>Enter your password to edit.</p>
                            
                            <div class="form-group has-feedback">
                              <input  required  type="password" class="form-control" placeholder="Password" required="" name="password">
                              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>


                              </div>
                              
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <input type="submit" name="edit_admin" value="Update Info" class="btn btn-primary pull-right">
                              </div>

                            </form>

                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
              
              </div><!-- box-footer -->
          </div><!-- /.box -->


        </div>

        <div class="col-lg-4 col-xs-6">
          <!-- change email -->
            <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">Change Email </h3>
                      <div class="box-tools pull-right">
                      
                      </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    
                    
                    <form action="process_pages/admin_edit_credential.php" method="post" enctype="multipart/form-data">
                          <div class="box-body">
                            <p>New Email</p>
                              <div class="form-group has-feedback">
                                <input type="email" class="form-control" required="" placeholder="Email" required="" name="new_email" value="<?php ?>">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                              </div>
                            <p>Enter password to continue</p>
                            <div class="form-group has-feedback">
                              <input  required  type="password" class="form-control" placeholder="Password" required="" name="password">
                              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                          </div><!-- /.box-body -->
                         
                          <div class="box-footer">
                              <input type="submit" name="edit_email" value="Change Email" class="btn btn-primary pull-right">
                          </div><!-- box-footer -->
                    </form>

                </div><!-- /.box -->
        </div>



         <div class="col-lg-4 col-xs-6">
          <!-- change Password -->
            <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Change Password </h3>
                      <div class="box-tools pull-right">
                      
                      </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    
                    
                    <form action="process_pages/admin_edit_credential.php" method="post" enctype="multipart/form-data">
                          <div class="box-body">
                            
                            <div class="form-group has-feedback">
                              <input  required  type="password" class="form-control" placeholder="Old Password" required="" name="old_password">
                              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>

                            <div class="form-group has-feedback">
                              <input  required  type="password" class="form-control" placeholder="New Password" required="" name="new_password">
                              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>

                            <div class="form-group has-feedback">
                              <input  required  type="password" class="form-control" placeholder="Confirm Password" required="" name="confirm_password">
                              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                          </div><!-- /.box-body -->
                         
                          <div class="box-footer">
                              <input type="submit" name="edit_password" value="Change Password" class="btn btn-primary pull-right">
                          </div><!-- box-footer -->
                    </form>

                </div><!-- /.box -->
        </div>


  

      </div>
            <!-- /.row -->  




         <!--|
        -------------------------->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

 
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


<!-- AdminLTE App -->
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>

<!-- page script -->




<script src="bower_components/plotlyjs/plotly-latest.min.js"></script>
<!-- self script -->

<script src="additional_styling/additional.js"></script>
<script src="additional_styling/navigation.js"></script>
<script>

/*
//----- BAR GRAPH
//midterm bar
  var midterm_data_bar = {
  x: ['OOPROGR', 'DATAAPP', 'WEBAPPS','DATASTRU','FIL101'],
  y: [75 + '%', 77, 87,77,95],
  name: 'Midterm',
  type: 'bar'
  };

var data_midterm_bar = [midterm_data_bar];

var midterm_layout_bar = {barmode: 'group'};


Plotly.newPlot('midtermBar', data_midterm_bar, midterm_layout_bar);

//Plotly.newPlot('midtermBars', data_midterm_bar, midterm_layout_bar);

//final bar
var final_data_bar = {
  x: ['OOPROGR', 'DATAAPP', 'WEBAPPS','DATASTRU','FIL101'],
  y: [95, 78, 87,88,93],
  name: 'Final',
  type: 'bar'
  };



var data_final_bar = [final_data_bar];

var final_layout_bar = {barmode: 'group'};

Plotly.newPlot('finalBar', data_final_bar, final_layout_bar);


//semestral bar


var semestral_data_bar = {
  x: ['OOPROGR', 'DATAAPP', 'WEBAPPS','DATASTRU','FIL101'],
  y: [98, 88, 87,88,95],
  name: 'Semester',
  type: 'bar'
  };
var data_semestral_bar = [midterm_data_bar,final_data_bar,semestral_data_bar];

var semestral_layout_bar = {barmode: 'group'};

Plotly.newPlot('semestralBar', data_semestral_bar, semestral_layout_bar);

//----- ./BAR GRAPH


//----- PIE GRAPH

//Midterm
var midterm_data_pie = [{
  values: [75, 77, 87,77,95],
  labels: ['OOPROGR = 75%', 'DATAAPP = 77%', 'WEBAPPS = 87%','DATASTRU =77%','FIL101= 95%'],
  type: 'pie',
  //remove the text in pie
  textinfo: 'none',
  text: '',
  hoverinfo: 'label'
}];

var midterm_layout_pie = {
  height: 400,
  width: 500
};

Plotly.newPlot('midtermPie', midterm_data_pie, midterm_layout_pie);


//Final
var final_data_pie = [{
  values: [88, 87, 87,77,95],
  labels: ['OOPROGR = 88%', 'DATAAPP = 87%', 'WEBAPPS = 87%','DATASTRU = 77%','FIL101 = 95%'],
  type: 'pie',
  textinfo: 'none',
  text: '',
  hoverinfo: 'label'
}];

var final_layout_pie = {
  height: 400,
  width: 500
};

Plotly.newPlot('finalPie', final_data_pie, final_layout_pie);
*/
</script>









</body>
</html>