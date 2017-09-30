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
   <!-- fullCalendar -->
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
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


<!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 
  </style>
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
        Department Information
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Departments</li><li class="active">Departments Information</li>
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
                      $get_department = get_all_department_aside_from_school_admin($_GET['department_id']);

                      while($department = mysqli_fetch_assoc($get_department)):
                        $mission = $department['mission'];
                        $vision = $department['vision'];
                 ?> 
                  <div class="col-md-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                      <div class="box-tools pull-right" style="background-color: ">
                        <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#editbanners">
                         <i class="fa fa-wrench" style="color: white"></i>
                        </button>

                       <div class="modal fade" id="editbanners">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Change Logo And Banner</h4>
                              </div>
                              

                                  <!-- form for updating of profile picture -->
                                    <form action="process_pages/department_edit_process.php" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                          <label>Logo</label>
                                          <input  type="file" name="upload-logo" class="input-group" ><br>
                                           <label>Banner</label>
                                          <input   type="file" name="upload-banner" class="input-group" ><br>
                                          <p>Enter your password to continue.</p>
                                          <div class="form-group has-feedback">

                                          <input type="hidden" name="department_id" value="<?php echo $_GET['department_id']?>">
                                           <input type="hidden" name="admin_id" value="<?php echo $admin_id?>">
                                          <input type="hidden" name="banner_name" value="<?php echo $department['department_banner']?>">
                                          <input type="hidden" name="logo_name" value="<?php echo $department['department_logo']?>">
                                            <input required=""  type="password" class="form-control" placeholder="Password" required="" name="password">
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                          </div>
                                        </div>

                                    

                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                          <input type="submit" name="modify_banner" value="Save Changes"  class="btn btn-primary pull-right">
                                        </div>

                                </form>

                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                       
                      </div>
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-aqua-active" style="background: url('department logos/<?php echo $department['department_banner']?>') center center;background-color: <?php echo $department['department_color']?>?>">
                        <h2 class="widget-user-username" style="background:rgba(0,0,0,0.3);text-align: center;font-size: 50px"><?php echo $department['department_name']?></h2>
                       
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle" src="department logos/<?php echo $department['department_logo']?>" alt="Department Logo">

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

                             <?php 
                 //count total number of admins
                  $count_admins = count_total_admins($department['department_id']);
                  while ($total_admins = mysqli_fetch_assoc($count_admins)) {
                     $total_number_admins =  $total_admins['total admin'];
                  }

                 
              ?>

                          <div class="col-sm-4 border-right">
                            <div class="description-block">
                              <h5 class="description-header"><?php echo $total_number_admins;?></h5>
                              <span class="description-text">Admins</span>
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



            <div class="row">

               <div class="col-md-4">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Department Head</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#addHead"><i class="fa fa-wrench"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>


                      <!--add head -->


                        <div class="modal fade" id="addHead">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add Department Head<?php ?></h4>
                          </div>
                          <div class="modal-body">
                            

                <form class="form-horizontal" action="process_pages/department_edit_process.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">First Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="middle_name" class="col-sm-2 control-label">Middle Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="last_name" class="col-sm-2 control-label">Last Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="email" value="" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" value="" id="address" placeholder="Address">
                    </div>
                  </div>

                

                   <div class="form-group">
                    <label for="gender" class="col-sm-2 control-label">Gender</label>

                    <div class="col-sm-10">
                     <select class="form-control" name="gender">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    </div>
                  </div>

                   
                   <div class="form-group">
                    <label for="contact" class="col-sm-2 control-label">Contact</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="contact" value="" id="contact" placeholder="Contact">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="date_birth" class="col-sm-2 control-label">Date of Birth</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="date_birth" value="" id="date_birth" placeholder="">
                    </div>
                  </div>

                  


                <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Profile Picture</label>

                    <div class="col-sm-2">
                      <input type="file" name="upload_image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" >
                       <input type="hidden" value="" name="image_name">
                      <img id="image" class="profile-user-img img-responsive " src="" alt="User profile picture">
                    </div>
                  </div>

                   <!-- for deans and department id -->
                    <input type="hidden" name="deans_id" value="">
                    <input type="hidden" name="department_id" value="<?php echo $_GET['department_id'] ?>">
                

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="add_dean" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>

                          </div>
                          <div class="modal-footer">
                           
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>




                    </div>
                      <div class="box-body box-profile">

                      <?php $dean = get_dean_by_department_id($_GET['department_id']);

                          if($dean){

                              $deans_id = $dean['id'];
                             $deans_name = $dean['first_name'] .' '.$dean['middle_name'] .' '.$dean['last_name'];

                             $deans_image = $dean['image']; 
                             $deans_email = $dean['email'];
                             $deans_contact = $dean['contact'];

                            $date =date_create($dean['dean_since']);
                             $deans_since =date_format($date,"F d Y") ;  
                              
                            //for edit
                             $deans_first_name = $dean['first_name'];
                             $deans_middle_name =  $dean['middle_name'];
                             $deans_last_name = $dean['last_name'];
                             //email
                             $deans_address = $dean['address'];
                             //contact
                             $deans_birth_date = $dean['date_birth'];
                          }
                      ?>

                      <?php  $check_dean = check_dean_by_department_id($_GET['department_id']);


                        if(mysqli_num_rows($check_dean) > 0){?>

                        <img class="profile-user-img img-responsive img-circle" src="deans image/<?php echo $deans_image?>" alt="User profile picture">

                        <h3 class="profile-username text-center"><?php echo  (isset($deans_name)) ? $deans_name :"";?></h3>

                        <p class="text-muted text-center"></p>

                        <ul class="list-group list-group-unbordered">
                          <li class="list-group-item">
                            <b>Email</b> <a class="pull-right"><?php echo $deans_email;?></a>
                          </li>
                          <li class="list-group-item">
                            <b>Contact</b> <a class="pull-right"><?php echo $deans_contact;?></a>
                          </li>
                          <li class="list-group-item">
                            <b>Department Head Since</b> <a class="pull-right"><?php  echo (isset($deans_since))? $deans_since : "" ;?></a>
                          </li>
                        </ul>

                     

                        <a href="#" data-toggle="modal" data-target="#modal-default" class="btn btn-primary btn-block"><b>Edit</b></a>

                        <?php }else{echo ""; }?>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <div class="modal fade" id="modal-default">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Update Department Head Info <?php ?></h4>
                          </div>
                          <div class="modal-body">
                            

                <form class="form-horizontal" action="process_pages/department_edit_process.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">First Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php  echo (isset($deans_first_name))? $deans_first_name : "" ;?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="middle_name" class="col-sm-2 control-label">Middle Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name" value="<?php  echo (isset($deans_middle_name))? $deans_middle_name : "" ;?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="last_name" class="col-sm-2 control-label">Last Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php  echo (isset($deans_last_name))? $deans_last_name : "" ;?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="email" value="<?php  echo (isset($deans_email))? $deans_email : "" ;?>" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" value="<?php  echo (isset($deans_address))? $deans_address : "" ;?>" id="address" placeholder="Address">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="contact" class="col-sm-2 control-label">Contact</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="contact" value="<?php  echo (isset($deans_contact))? $deans_contact : "" ;?>" id="contact" placeholder="Contact">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="date_birth" class="col-sm-2 control-label">Date of Birth</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="date_birth" value="<?php  echo (isset($deans_birth_date))? $deans_birth_date : "" ;?>" id="date_birth" placeholder="">
                    </div>
                  </div>

                  


                <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Profile Picture</label>

                    <div class="col-sm-2">
                      <input type="file" name="upload_image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" >
                       <input type="hidden" value="<?php  echo (isset($deans_image))? $deans_image : "" ;?>" name="image_name">
                      <img id="image" class="profile-user-img img-responsive " src="deans image/<?php echo $deans_image?>" alt="User profile picture">
                    </div>
                  </div>

                   <!-- for deans and department id -->
                    <input type="hidden" name="deans_id" value="<?php  echo (isset($deans_id))? $deans_id : "" ;?>">
                    <input type="hidden" name="department_id" value="<?php echo $_GET['department_id'] ?>">
                

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="update_dean" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>

                          </div>
                          <div class="modal-footer">
                           
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>

                   
                    <!-- /.box -->
              </div>
                       

                <div class="col-md-4">
                  <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Department Mission</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <div class="btn-group">
                          <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-wrench"></i></button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#" data-toggle="modal" data-target="#modal-edit-mission">Edit</a></li>
                          
                          </ul>
                        </div>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                          <div class="col-md-12" style="text-indent: 16px"><?php echo $mission; ?></div>
                        <!-- /.col -->  
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- ./box-body -->
                    <div class="box-footer">
                      
                      <!-- /.row -->
                    </div>
                    <!-- /.box-footer -->
                  </div>
                  <!-- /.box -->
                </div>

                <!-- modal edit for department mission -->
                <div class="modal fade" id="modal-edit-mission">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Department Mission</h4>
                      </div>
                      <div class="modal-body">
                        
                         <form action="process_pages/department_edit_process.php" method="POST" enctype="multipart/form-data">
                        <textarea class="textarea" name="mission" placeholder="Place some text here"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $mission ?></textarea>

                          <input type="hidden" name="department_id" value="<?php echo $_GET['department_id'] ?>">
                      </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" name="update_mission" class="btn btn-primary">Save changes</button>
                          </div>

                        </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
             </div><!-- ./modal -->


                <div class="col-md-4">
                  <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Department Vision</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <div class="btn-group">
                          <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-wrench"></i></button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#" data-toggle="modal" data-target="#modal-edit-vision">Edit</a></li>
                          
                          </ul>
                        </div>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                       <div class="col-md-12" style="text-indent: 16px"><?php echo $vision; ?></div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- ./box-body -->
                    <div class="box-footer">
                      
                      <!-- /.row -->
                    </div>
                    <!-- /.box-footer -->
                  </div>
                  <!-- /.box -->
                </div>

                <!-- modal edit for department mission -->
                <div class="modal fade" id="modal-edit-vision">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Department Vision</h4>
                      </div>
                      <div class="modal-body">
                        
                         <form action="process_pages/department_edit_process.php" method="POST" enctype="multipart/form-data">
                        <textarea class="textarea" name="vision" placeholder="Place some text here"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $vision ?></textarea>
                      </div>
                          <div class="modal-footer">

                              <input type="hidden" name="department_id" value="<?php echo $_GET['department_id'] ?>">

                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" name="update_vision" class="btn btn-primary">Save changes</button>
                          </div>

                        </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
             </div><!-- ./modal -->


            </div>






              <div class="row">
              <div class="col-md-12">
                <!-- Professors in this department -->
                 <div class="box">
                    <div class="box-header">
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>

                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                        <h3 class="box-title">Programs</h3>
                    </div>
                    <!-- /.box-header -->

                  <div class="box-body">
                    <table  class="table table-bordered table-striped datatable">
                      <thead>
                      <tr>
                        <th>Program Name</th>
                        <th>Program Code</th>
                        <th>Program Description</th>
                        <th>Edit Detail</th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php $get_program = get_program_by_department_id($_GET['department_id']);
                            while($programs = mysqli_fetch_assoc($get_program)):
                      ?>
                      <tr>
                        <td><?php echo $programs['program_name']?></td>
                        <td><?php echo $programs['program_code']?></td>
                        <td><?php echo $programs['program_description']?></td>
                        <td><a data-toggle='modal' data-tooltip="tooltip" data-placement="left" data-title="Edit Detail" data-target='#editDetail<?php echo $programs['program_id']?>' type="button" href="">Edit Detail</a></td>
                      </tr>


                      <div class="modal fade" id="editDetail<?php echo $programs['program_id']?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Edit Detail fro this Program</h4>
                            </div>
                            <div class="modal-body">
                              <form action="process_pages/edit_program_details.php" method="POST">
                                <input type="text" name="program_name" class="form-control" value="<?php echo $programs['program_name']?>">
                                <br />
                                 <input type="text" name="program_code" class="form-control" value="<?php echo $programs['program_code']?>">
                                 <br />
                                <textarea name="program_description" class="form-control textarea"><?php echo $programs['program_description']?></textarea>
                             
                            </div>
                            <div class="modal-footer">

                              <input type="hidden" name="program_id" value="<?php echo $programs['program_id']?>">

                               <input type="hidden" name="department_id" value="<?php echo $_GET['department_id']?>">

                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                              <button type="submit" name="edit_program" class="btn btn-primary">Save changes</button>
                            </div>



                             </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->

                        <?php endwhile; /// program end?>

                          </tbody>
                        </table>
                      </div>
                      <!-- /.box-body -->
               </div>
             </div>
                

           </div> <!-- end programs-->



            <div class="row">
              <div class="col-md-12">
                <!-- Professors in this department -->
                 <div class="box">
                    <div class="box-header">
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>

                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                        <h3 class="box-title">Professors</h3>
                    </div>
                    <!-- /.box-header -->

                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Professor ID</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Birthdate</th>
                        <th>Email</th>
                        
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                       <?php //display all professor depending on the admin that is login
                        $get_professors = get_all_professors($_GET['department_id']);
                        while ($total_professors = mysqli_fetch_assoc($get_professors)):
                            ?> 
                        <tr>
                          <td><?php echo $total_professors['prof_id']?></td>
                          <td><?php echo $total_professors['first_name'].' '.$total_professors['middle_name'] . ' ' . $total_professors['last_name']?>
                          </td>
                          <td><?php echo $total_professors['gender']?></td>

                          <?php $date =date_create($total_professors['date_birth']);
                                 $date_birth = date_format($date,"F d Y");
                            ?>

                          <td><?php echo $date_birth;?></td>
                          <td><?php echo $total_professors['email']?></td>
                         <td>

                         <a  data-toggle='modal' data-tooltip="tooltip" data-placement="left" data-title="Delete Information" data-target='#deletemodal<?php echo $total_professors['tbl_prof_id'] ?>' ><span class='glyphicon glyphicon-trash'></span></a> | <a  href="professor_full_info.php?professor_id=<?php echo $total_professors['tbl_prof_id'] ?>" ><span class='glyphicon glyphicon-user'></span></a>
                         </td>
                      </tr>

                       <!-- for delete modal professor -->

                        <!-- for delete modal prof -->
                
                        <div class="modal modal-danger fade" id="deletemodal<?php echo $total_professors['tbl_prof_id'] ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Access Confirmation</h4>
                            </div>
                            <div class="modal-body">
                              <p>Please Enter Your Password to continue</p>
                               <form action="process_pages/delete_department_professor_process.php" method="POST">

                                 <input type="hidden" name="admin_id" value="<?php echo $admin_id ?>">  
                                 <input type="hidden" name="delete_prof" value="<?php echo $total_professors['tbl_prof_id'] ?>">
                                <div class="form-group has-feedback">
                                      <input type="password"   required="" class="form-control" placeholder="Password" name="admin_password">
                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                               
                            </div>
                            <div class="modal-footer">
                              <input type="hidden" name="department_id" value="<?php echo $_GET['department_id'];?>">
                              <button type="submit" name="prof_delete" class="btn btn-outline">Save changes</button>
                              </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>



                     <?php       
                            endwhile;
                            //end
                        ?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.box-body -->
               </div>
             </div>
                

           </div> <!-- end 2nd row professors-->


              <div class="row">
              <div class="col-md-12">
                <!-- Student in this department -->
                 <div class="box">
                    <div class="box-header">
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>

                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                        <h3 class="box-title">Students</h3>
                    </div>
                    <!-- /.box-header -->

                  <div class="box-body">
                    <table  class="table table-bordered table-striped datatable">
                      <thead>
                      <tr>
                        <th>Student ID</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Birthdate</th>
                        <th>Email</th>
                        <th>Program Enrolled</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                       <?php //display all students depending on the admin that is login
                        $get_students = get_all_students($_GET['department_id']);
                        while ($total_students = mysqli_fetch_assoc($get_students)):
                            ?> 
                        <tr>
                          <td><?php echo $total_students['student_id']?></td>
                          <td><?php echo $total_students['first_name'].' '.$total_students['middle_name'] . ' ' . $total_students['last_name']?>
                          </td>
                          <td><?php echo $total_students['gender']?></td>

                          <?php $date =date_create($total_students['date_birth']);
                                 $date_birth = date_format($date,"F d Y");
                            ?>

                          <td><?php echo $date_birth;?></td>
                          <td><?php echo $total_students['email']?></td>
                          <?php //program belong
                            $query_code = "SELECT * FROM tblcollegeprograms WHERE program_id = '".$total_students['program_major']."'";

                              $program = mysqli_query($connection,$query_code) or die(mysqli_error($connection));
                            if($program_code = mysqli_fetch_assoc($program)){
                              ?>
                          
                         <td><?php echo $program_code['program_name']?> (<?php echo $program_code['program_code']?>)</td>
                           <?php
                              }//program
                          ?>
                         <td>

                         <a  data-toggle='modal' data-tooltip="tooltip" data-placement="left" data-title="Delete Information" data-target='#deletemodal' ><span class='glyphicon glyphicon-trash'></span></a> | <a  href="student_full_info.php?student_id=<?php echo $total_students['tbl_student_id'] ?>" ><span class='glyphicon glyphicon-user'></span></a>
                         </td>
                      </tr>

                       <!-- for delete modal student -->




                     <?php       
                            endwhile;
                            //end
                        ?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.box-body -->
               </div>
             </div>
                

           </div> <!-- end 3rd row -->




             <div class="row">
              <div class="col-md-12">
                <!-- Tutorial in this department -->
                 <div class="box">
                    <div class="box-header">
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>

                      <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#addTutorial"><i class="fa fa-wrench"></i></button>


                      <!--add tutorial-->

                      <div class="modal fade" id="addTutorial">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add Tutorial</h4>
                              </div>
                              
                                        <div class="modal-body">

                                            <center>
                                            <button type="button" class="btn btn-warning"  id="file_tutorial">File Tutorial</button>
                                            <button type="button" class="btn btn-success" id="link_tutorial">Link Tutorial</button>
                                          </center>



                                          <div id="upload_file">

                                            <form action="process_pages/add_tutorial.php" method="post" enctype="multipart/form-data">

                                               <label>Tutorial Name</label>
                                                <input  type="text" required="" name="tutorial_name" class="form-control" ><br>
                                              <label>Upload Tutorial File</label>
                                               
                                                <input  type="file" required="" name="tutorial_asset" class="input-group" ><br>


                                                  <label>Recommendend for what Subject</label>
                                              <div class="form-group has-feedback">
                                                <select required=""  class="form-control" name="recomended_for">
                                                <option value="">Please choose a subject for this tutorial</option>
                                                <?php   $get_subject = get_subject_for_this_department_by_department_id($_GET['department_id']);

                                                while($subjects = mysqli_fetch_assoc($get_subject)):
                                                ?>
                                                <option value="<?php echo $subjects['subject_id'] ?>"><?php echo $subjects['subject_name']?></option>

                                            <?php endwhile; //subjects?>
                                                </select>
                                              </div>



                                              <div class="form-group has-feedback">

                                              <input type="hidden" name="department_id" value="<?php echo $_GET['department_id']?>">
                                               <input type="hidden" name="admin_id" value="<?php echo $admin_id?>">
                                        
                                              <input type="submit" class="btn btn-primary pull-right" name="upload_tutorial_file" value="Upload Tutorial File">
                                            </div>


                                            </form>

                                          </div><!-- upload_file -->





                                              <div id="upload_link">

                                            <form action="process_pages/add_tutorial.php" method="post" enctype="multipart/form-data">

                                               <label>Tutorial Name</label>
                                                <input  type="text" required="" name="tutorial_name" class="form-control" ><br>
                                              <label>Upload Tutorial Link</label>
                                               
                                                <input  type="text" required="" name="tutorial_asset" class="form-control" ><br>


                                                  <label>Recommendend for what Subject</label>
                                              <div class="form-group has-feedback">
                                                <select required=""  class="form-control" name="recomended_for">
                                                <option value="">Please choose a subject for this tutorial</option>
                                                <?php   $get_subject = get_subject_for_this_department_by_department_id($_GET['department_id']);

                                                while($subjects = mysqli_fetch_assoc($get_subject)):
                                                ?>
                                                <option value="<?php echo $subjects['subject_id'] ?>"><?php echo $subjects['subject_name']?></option>

                                            <?php endwhile; //subjects?>
                                                </select>
                                              </div>



                                              <div class="form-group has-feedback">

                                              <input type="hidden" name="department_id" value="<?php echo $_GET['department_id']?>">
                                               <input type="hidden" name="admin_id" value="<?php echo $admin_id?>">
                                        
                                              <input type="submit" class="btn btn-primary pull-right" name="upload_tutorial_link" value="Upload Tutorial File">
                                            </div>


                                            </form>

                                          </div><!-- upload_link -->


                                        </div><!-- modal body-->

                                    

                                        <div class="modal-footer">
                                         
                                        </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->






                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

                    </div>
                        <h3 class="box-title">Tutorials</h3>
                    </div>
                    <!-- /.box-header -->

                  <div class="box-body">
                    <table  class="table table-bordered table-striped datatable">
                      <thead>
                      <tr>
                        <th>Tutorial Name</th>
                        <th>Recommended for subject</th>
                        <th>Action</th>
                     
                      </tr>
                      </thead>
                      <tbody>
                        
                        <?php 


                        $get_tutorials = get_all_tutorials_by_department_id($_GET['department_id']);

                        while($fetch_tutorial = mysqli_fetch_assoc($get_tutorials)):
                        ?>
                        <tr>
                            <td><?php echo $fetch_tutorial['tutorial_name']?></td>
                            
                            <?php //get subject details
                                $get_subject_detail = get_subject_for_this_tutorial($fetch_tutorial['subject_id']);

                                while($fetch_subject_detail = mysqli_fetch_assoc($get_subject_detail)):
                            ?>
                                <td><?php echo $fetch_subject_detail['subject_name']; ?></td>
                              <?php endwhile; // get_subject_for_this_tutorial?>



                            <td>
                              <?php if($fetch_tutorial['tutorial_type'] =="video"){ ?>
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#video<?php echo $fetch_tutorial['tutorial_id']?>">Watch</button>

                               <div class="modal fade" id="video<?php echo $fetch_tutorial['tutorial_id']?>">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"><?php echo $fetch_tutorial['tutorial_name']?></h4>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <video width="320" height="240" autoplay>
                                              <source src="../video/<?php echo $fetch_tutorial['tutorial_asset']?>" type="video/mp4">
                                             
                                            Your browser does not support the video tag.
                                            </video>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                      </div>
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->


                              <?php }else{ ?>
                              <a href="<?php echo $fetch_tutorial['tutorial_asset'];?>" target="_blank">View</a>
                               <?php } ?>
                            </td>
                        </tr>
                        <?php endwhile;//get_all_tutorials_by_department_id ?>


                      </tbody>
                        </table>
                      </div>
                      <!-- /.box-body -->
               </div>
             </div>
                

           </div> <!-- end tutorial row -->





           <div class="row">
                 

                <div class="col-md-6">
                    <div class="box box-success">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Announcements</h3>
                </div>
                <div class="box-body chat" id="chat-box">
                  <hr><br>
                  <?php //print announcement  here
                  $get_announcements_by_department = get_all_announcement_by_department_id($_GET['department_id']);
                  if(mysqli_num_rows($get_announcements_by_department) > 0){
                  while($announcement = mysqli_fetch_assoc($get_announcements_by_department)):   
                  $date =date_create($announcement["post_date"]);
                  $date_posted = date_format($date,"F j, Y, g:i a");
                  //date("F j, Y, g:i a", $announcement["date_added"]);    
              ?>

                  <div class="item">
                  <img src="admin_images/<?php echo $announcement['image']?>" alt="" class="offline">
                  
                  <p class="message">
                    <a href="" class="name"> 
                      <small class="text-muted pull-right"><i class="fa fa-clock-o"></i><?php echo $date_posted; ?></small>
                     <?php echo $announcement['first_name'].' '. $announcement['last_name'];?> <small>(<?php echo $announcement['department_code']?>) </small>
                    </a>
                    <?php echo $announcement['content'];?>
                    <br />

                  </p>


                  </div>


                  <?php endwhile;   }else{
                    echo "nothing to show";
                  }

               ?>
                </div>
                <!-- /.chat -->
                <div class="box-footer">
                </div>
              </div>
              </div>



               <div class="col-xs-6">

                          <!-- calendar -->
            <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Calendar</h3>
                      <div class="box-tools pull-right">
                    </div><!-- /.box-header -->
                    
               
                          <div class="box-body">
                              <div id='calendar' style="max-width: 900px; margin: 0 auto;"></div>

                          </div><!-- /.box-body -->
                         
                          <div class="box-footer">
                          
                        </div>                                       
             </div>
           </div>  <!-- /.box -->
           


                   <!--  Modal to Event Details -->
        <div id="calendarModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Event Details</h4>
              </div>
              <div id="modalBody" class="modal-body">
                <h4 id="modalTitle" class="modal-title"></h4>
                <div id="modalWhen" style="margin-top:5px;">
               
                </div>
              </div>
              <input type="hidden" id="eventID"/>
              <div class="modal-footer">
              
              </div>
            </div>
          </div>
        </div>
        <!-- Modal-->


          </div>  <!-- /. col for calendar -->



           </div> <!-- end 4th row -->



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

<!-- fullCalendar -->
<script src="bower_components/moment/moment.js"></script>
<script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    //CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()


     $("div#upload_link").hide();
        $("div#upload_file").hide();
  
    $("#link_tutorial").click(function(){
        $("div#upload_link").show();
        $("div#upload_file").hide();
    });
    
    
    $("#file_tutorial").click(function(){
        $("div#upload_link").hide();
        $("div#upload_file").show();
    });



     $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '<?php echo date('m-d-y')?>',
            selectable: false,
            selectHelper: true,
            editable: false,
            eventLimit: true, 
            allDay:true,

         
          events: {
            url: 'process_pages/getEventsByDepartmentId.php?department_id=<?php echo $_GET['department_id']?>',
            type: 'GET', // Send post data
            //backgroundColor: '',
            error: function() {
                alert('There was an error while fetching events.');
            }
        },

        eventClick:  function(event, jsEvent, view) {  // when some one click on any event
               // endtime = $.fullCalendar.moment(event.end).format('h:mm');
                //starttime = $.fullCalendar.moment(event.start_time).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = event.start + ' - ' + event.end;
                $('#modalTitle').html(event.title);
                $('#modalWhen').text();
                $('#eventID').val(event.id);
                $('#calendarModal').modal();
            },
            

        }); //events


  })
</script>
</body>
</html>