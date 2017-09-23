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
<body class="hold-transition skin-blue sidebar-mini " id="students">
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
        Student Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Professor Profile</li>
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
         //echo $num_str = "A". sprintf("%07d", mt_rand(1, 999999));
        ?>

        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
                <div class="box box-primary">
                  <div class="box-body box-profile">

                  <?php 
                    //search for admins info
                    $get_student_info = get_student_by_id($_GET['student_id']);
                    if($get_student_info){
                      //table id
                      $tbl_student_id = $get_student_info['tbl_student_id'];

                      $student_name = $get_student_info['first_name'] . ' ' . $get_student_info['last_name'];
                      $student_image = $get_student_info['image'];
                      $student_dept_id = $get_student_info['department'];

                      //$date_added = $get_student_info['date_added'];
                      $gender = $get_student_info['gender'];
                      $student_date_birth = $get_student_info['date_birth'];
                      $student_id = $get_student_info['student_id'];

                    }

                   $get_student_dept = get_department_details_by_department_id($student_dept_id);
                   while($student_dept = mysqli_fetch_assoc($get_student_dept)){
                     $student_dept_code = $student_dept['department_code'];
                   }


                    $get_student_program = get_all_programs_by_department($student_dept_id);
                     while($student_program= mysqli_fetch_assoc($get_student_program)){
                     $student_program_code = $student_program['program_code'];
                      $student_program_name = $student_program['program_name'];
                   }

                  ?>

                    <img class="profile-user-img img-responsive img-circle" src="../student_images/<?php echo $student_image;?>" alt="User profile picture">

                    <h3 class="profile-username text-center"><?php echo $student_name;?> </h3>

                    <p class="text-muted text-center">Department: <?php echo  $student_dept_code; ?></p>

                     <p class="text-muted text-center">Program: <?php echo  $student_program_code;?></p>

                    <ul class="list-group list-group-unbordered">
                       <li class="list-group-item">
                        <b>Student ID:</b> <a class="pull-right"><?php echo $student_id?></a>
                      </li>
                     
                      <li class="list-group-item">
                        <b>Gender</b> <a class="pull-right"><?php echo $gender;?></a>
                      </li>
                      <li class="list-group-item">
                      <?php $date =date_create($student_date_birth);
                         $birthdate= date_format($date,"F d Y");?>
                        <b>Birthdate:</b> <a class="pull-right"><?php echo $birthdate;?></a>
                      </li>
                      <li class="list-group-item">
                       <?php $age = floor((time() - strtotime($birthdate)) / 31556926);?>
                        <b>Age:</b> <a class="pull-right"><?php echo $age;?></a>
                      </li>
                    </ul>

                    <a href="student_edit_info.php?student_id=<?php echo $_GET['student_id']?>" class="btn btn-primary btn-block"><b>Edit Information</b></a> 
                    <a href="student_academic_performace_info.php?student_id=<?php echo $_GET['student_id']?>" class="btn btn-success btn-block"><b>Student Academic Performance</b></a> 
                    <a href="prof_classes_info.php?professor_id=<?php echo $_GET['professor_id']?>" class="btn btn-warning btn-block"><b>Student Guidance</b></a> 
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->


          </div> <!-- /.cols -->


          <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
         
              <li class="active"><a href="#timeline" data-toggle="tab">Log History</a></li>
              
            </ul>
            <div class="tab-content">
             
              <?php  $get_logs = get_all_log_dates_by_student_id($_GET['student_id']);  
                      if(mysqli_num_rows($get_logs) > 0){
                      while($log_details = mysqli_fetch_assoc($get_logs)):
              ?>
              <div class="active tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          <?php $date =date_create($log_details['log_date']);
                          $log_date= date_format($date," F d Y");
                          echo $log_date;
                          ?>
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->


                  <?php 
                    //log items by date
                  $get_logs_by_date = get_all_logs_by_date_and_student_id($_GET['student_id'],$log_details['log_date']);
                  while($log_by_date = mysqli_fetch_assoc($get_logs_by_date)):   
                  ?>

                  <li>
                    
                    <?php if($log_by_date['log_header'] == "Success Login"){ ?>
                     <i class="glyphicon glyphicon-log-in bg-blue"></i>
                    <?php }elseif($log_by_date['log_header'] == "Success Logout"){ ?>
                    <i class="glyphicon glyphicon-log-out bg-red"></i>
                    <?php  }elseif($log_by_date['log_header'] == "Add Event"){ ?>
                    <i class="glyphicon glyphicon-calendar bg-blue"></i>
                    <?php }elseif($log_by_date['log_header'] == "Delete Event"){ ?>
                    <i class="glyphicon glyphicon-calendar bg-red"></i>
                    <?php }elseif($log_by_date['log_header'] == "Add College Program"){ ?>
                    <i class="glyphicon glyphicon-list bg-green"></i>
                    <?php }elseif($log_by_date['log_header'] == "Add Department"){ ?>
                    <i class="glyphicon glyphicon-list bg-blue"></i>
                     <?php  } ?>
                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> <?php $date =date_create($log_by_date['log_time']);
                          $log_date= date_format($date,"g:i:s A");
                          echo $log_date;
                          ?></span>

                        <h3 class="timeline-header no-border"><a href="#"><?php echo $log_by_date['log_header'];?></a> <?php echo $log_by_date['log_message']; ?>
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->

                  <?php endwhile; // log_by_date ?>

                </ul>
              </div>

            <?php endwhile;
                 
                  }else{
                    echo "nothing to show";
                  }
            ?>
              <!-- /.tab-pane -->


            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        </div> <!-- /.row -->

    
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

<!-- self script -->
<script src="additional_styling/additional.js"></script>
<script src="additional_styling/navigation.js"></script>



</body>
</html>