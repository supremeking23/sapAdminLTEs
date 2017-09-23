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
             $image = $admin['image'];
             $admin_department_id = $admin['admin_department_id'];

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
   <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
<body class="hold-transition skin-blue sidebar-mini " id="departments">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
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
        Departments
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Departments</li>
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
                 <?php //get all departments //for admin only
                      $get_department = get_all_department_aside_from_school_admin($admin_department_id);

                      while($department = mysqli_fetch_assoc($get_department)):
                 ?> 
                  <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-aqua-active" style="background: url('department logos/<?php echo $department['department_banner']?>') center center;">
                        <h2 class="widget-user-username" style="background:rgba(0,0,0,0.3);"><?php echo $department['department_name']?></h2>
                       
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle" src="department logos/<?php echo $department['department_logo']?>" alt="User Avatar">

                      </div>
                      <div class="box-footer">
                        <div class="row">
                          <div class="col-sm-4 border-right">
                            <div class="description-block">
                            <?php 
                 //count total number of admins
                  $count_professors = count_total_professors($department['department_id']);
                  while ($total_professors = mysqli_fetch_assoc($count_professors)) {
                     $total_number_professors =  $total_professors['total prof'];
                  }
              ?>
                              <h5 class="description-header"><?php echo  $total_number_professors?></h5>
                              <span class="description-text">Professors</span>
                            </div>
                            <!-- /.description-block -->
                          </div>
                          <!-- /.col -->

                           <?php 
                 //count total number of admins
                  $count_students = count_total_students($department['department_id']);
                  while ($total_students = mysqli_fetch_assoc($count_students)) {
                     $total_number_students =  $total_students['total student'];
                  }
              ?>
                          <div class="col-sm-4 border-right">
                            <div class="description-block">
                              <h5 class="description-header"><?php echo $total_number_students;?></h5>
                              <span class="description-text">Students</span>
                            </div>
                            <!-- /.description-block -->
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4">
                            <div class="description-block">
                              <a href="department_info.php?department_id=<?php echo $department['department_id']?>" class="btn btn-info btn-sm">View Info</a>
                            </div>
                            <!-- /.description-block -->
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
                  <!-- /.col -->
              
                <?php endwhile;?>


        </div>

       


      
         <!--| -->
       
       <!--<div id="container-floating">

             
              <div class="nd4 nds" data-toggle="tooltip" data-placement="left" data-original-title="contract@gmail.com"><img class="reminder">
                <p class="letter"><span class="glyphicon glyphicon-th-list"></span></p>
              </div>
              <div class="nd3 nds" data-toggle="tooltip" data-placement="left" data-original-title="Reminder"><img class="reminder" src="//ssl.gstatic.com/bt/C3341AA7A1A076756462EE2E5CD71C11/1x/ic_reminders_speeddial_white_24dp.png" /></div>
              <div class="nd1 nds" data-toggle="tooltip" data-placement="left" data-original-title="Edoardo@live.it"><img class="reminder">
                <p class="letter">E</p>
              </div>

              <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create" onclick="newmail()">
                <p class="plus">+</p>
                <img class="edit" src="https://ssl.gstatic.com/bt/C3341AA7A1A076756462EE2E5CD71C11/1x/bt_compose2_1x.png">
              </div>

      </div> -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y');?><a href="#">Company</a>.</strong> All rights reserved.
  </footer>

 
</div>
<!-- ./wrapper -->
<?php 
//close connection
$connection->close();
?>
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- AdminLTE App -->
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>

<!-- self script -->
<script src="additional_styling/additional.js"></script>
<script src="additional_styling/navigation.js"></script>



</body>
</html>