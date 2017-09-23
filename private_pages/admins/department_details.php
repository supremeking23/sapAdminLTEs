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

           if(!isset($_GET['department_id'])){
            redirect_to('departments.php');
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
<body class="hold-transition skin-blue sidebar-mini ">
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
      <div class="user-panel">
        <div class="pull-left image">
          <img src="admin_images/<?php echo $image;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $first_name . " " . $last_name;?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $admin_department; ?></a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Control Panel</li>
        <!-- Optionally, you can add icons to the links -->
        <li ><a href="index.php"><i class="fa fa-link"></i> <span>Overview</span></a></li>
        <li ><a href="admins.php"><i class="fa fa-link"></i> <span>Admins</span></a></li>
         <li class="active"><a href="departments.php"><i class="fa fa-link"></i> <span>Departments</span></a></li>
        <li ><a href="professors.php"><i class="fa fa-link"></i> <span>Professors</span></a></li>
        <li><a href="guidance_councilor.php"><i class="fa fa-link"></i> <span>Guidance Councilors</span></a></li>
        <li><a href="students.php"><i class="fa fa-link"></i> <span>Students</span></a></li>
        
   
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    <?php //desplay department/college name
             $department_details = get_department_details_by_department_id($_GET['department_id']);
             while($department_detail = mysqli_fetch_assoc($department_details)){
                  $department_name = $department_detail['department_name'];
             }
    ?>
      <h1>
        <?php echo  $department_name; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Departments</li>
        <li class="active">Department Details</li>
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

     <div class="box">
            <div class="box-header">
              <h3 class="box-title">Programs and Courses</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Program Name</th>
                  <th>Program Code</th>
                  <th>Number of Sections</th>
                  <th>Number of students</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php //display all programs
                  $get_programs = get_all_programs_by_department($_GET['department_id']);
                  while ($total_programs = mysqli_fetch_assoc($get_programs)) {
                      ?> 
                  <tr>
                    <td><?php echo $total_programs['program_code']?></td>
                    <td><?php echo $total_programs['program_name']?>
                    </td>
                   <?php //get the number of sections (from 1st year to nth year)
                        $count_section = count_section_by_programs($total_programs['program_id']);
                        while($total_section = mysqli_fetch_assoc($count_section)){
                   ?>
                    <td><?php echo $total_section['number_of_sections']; }?></td>

                  <?php //number of students in the program
                      $count_student = count_student_by_programs($total_programs['program_id']);
                      while($total_student = mysqli_fetch_assoc($count_student)){
                  ?>
                   <td><?php echo $total_student['number_of_students']; }?></td>
                  
                   <td><center><a href="program_details.php?program_id=<?php echo $total_programs['program_id']; ?>" class="btn btn-info btn-sm" data-tooltip="tooltip" title="view program details">Program Details</a></center></td>
                </tr>


               <?php       
                  }
                  //end datatable
              ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>




      <div class="row">
          <!-- add new Department -->
     
     
        <div class="jumbotron">
          <h1>
          For Deans and Prof
          </h1>
        </div>
      </div>
      <!-- end row -->
              




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

<!-- page script -->
<!-- self script -->
<script src="additional_styling/additional.js"></script>
<script>
 
</script>



</body>
</html>