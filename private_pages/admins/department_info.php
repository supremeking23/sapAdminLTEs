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
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="admin_images/<?php echo $image;?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $first_name . " " . $last_name?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="admin_images/<?php echo $image;?>" class="img-circle" alt="User Image">

                <p>
                 <?php echo $first_name . " " . $last_name;?>
                 <?php 
                  //admin department
                  $find_admin_department = admin_department($admin_department_id);
                  if($find_admin_department){
                    $admin_department = $find_admin_department['department_code'];
                  }
                 ?>
                  <small><?php echo $admin_department; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="admin_profile.php?admin_id=<?php echo $admin_id;?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
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
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-aqua-active" style="background: url('department logos/<?php echo $department['department_banner']?>') center center;">
                        <h2 class="widget-user-username" style="background:rgba(0,0,0,0.3);text-align: center;font-size: 50px"><?php echo $department['department_name']?></h2>
                       
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

                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
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
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

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
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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


<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
</body>
</html>