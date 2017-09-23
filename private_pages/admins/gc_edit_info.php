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
<body class="hold-transition skin-blue sidebar-mini " id="gc">
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
        Admin Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Admin Profile</li>
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
                    $get_gc_info = get_gc_by_id($_GET['guidance_councilor']);
                    if($get_gc_info){
                      //table id
                      $tbl_gc_id = $get_gc_info['tbl_gc_id'];

                      $gc_name = $get_gc_info['first_name'] . ' ' . $get_gc_info['last_name'];
                      $gc_image = $get_gc_info['image'];
                     

                      $date_added = $get_gc_info['date_added'];
                      $gender = $get_gc_info['gender'];
                      $gc_date_birth = $get_gc_info['birth_date'];
                      $gc_id = $get_gc_info['gc_id'];

                    }

                 
                   

                  ?>

                    <img class="profile-user-img img-responsive img-circle" src="../gc_images/<?php echo $gc_image;?>" alt="User profile picture">

                    <h3 class="profile-username text-center"><?php echo $gc_name;?></h3>

                    <p class="text-muted text-center">Guidance Councilor</p>

                    <ul class="list-group list-group-unbordered">
                       <li class="list-group-item">
                        <b>Councilor ID:</b> <a class="pull-right"><?php echo $gc_id?></a>
                      </li>
                      <li class="list-group-item">
                        <?php $date =date_create($date_added);
                         $gc_since= date_format($date,"F  Y ");?>
                        <b>Councilor since:</b> <a class="pull-right"><?php echo $gc_since?></a>
                      </li>
                      <li class="list-group-item">
                        <b>Gender</b> <a class="pull-right"><?php echo $gender;?></a>
                      </li>
                      <li class="list-group-item">
                      <?php $date =date_create($gc_date_birth);
                         $birthdate= date_format($date,"F d Y");?>
                        <b>Birthdate:</b> <a class="pull-right"><?php echo $birthdate;?></a>
                      </li>
                      <li class="list-group-item">
                       <?php $age = floor((time() - strtotime($birthdate)) / 31556926);?>
                        <b>Age:</b> <a class="pull-right"><?php echo $age;?></a>
                      </li>
                    </ul>

                    <a href="guidance_councilor_full_info.php?guidance_councilor=<?php echo $_GET['guidance_councilor']?>" class="btn btn-primary btn-block"><b>Back to Log History</b></a> 
                    
                   
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->


          </div> <!-- /.cols -->


            <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
             
              <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
            
              <?php  $get_gc = get_gc_by_id($_GET['guidance_councilor']); ?>
              <!-- for numbers and letters validation -->

              <script src = "../js/validations.js"></script>
              <div class="active tab-pane" id="settings">
                <form action="process_pages/edit_gc_process.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                <?php if($get_gc): ?>
                  <div class="form-group">

                    <label for="first_name" class="col-sm-2 control-label">First Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" onkeypress = "return lettersonly(event)" value="<?php echo $get_gc['first_name'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="middle_name" class="col-sm-2 control-label">Middle Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="middle_name" name="middle_name" onkeypress = "return lettersonly(event)" placeholder="" value="<?php echo $get_gc['middle_name'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="last_name" class="col-sm-2 control-label">Last Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="last_name" name="last_name" onkeypress = "return lettersonly(event)" value="<?php echo $get_gc['last_name'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" name="email" value="<?php echo $get_gc['email'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Address" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?php echo $get_gc['address'];?>">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="date_birth" class="col-sm-2 control-label">Date of Birth</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="date_birth" name="date_birth"  value="<?php echo $get_gc['birth_date'];?>">
                    </div>
                  </div>


                  <div class="form-group">
                   <label for="gender" class="col-sm-2 control-label">Gender</label>

                   <div class="col-sm-10">
                      <select class="form-control" name="gender">
                        <option value="Male" <?php if($get_gc['gender'] == 'Male') echo "selected=''"; ?>>Male</option>
                        <option value="Female" <?php if($get_gc['gender'] == 'Female') echo "selected=''"; ?>>Female</option>
                      </select>
                    </div>
                  </div>


                   <div class="form-group">
                    <label for="contact" class="col-sm-2 control-label">Contact Number</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="contact" name="contact" placeholder="" value="<?php echo $get_gc['contact'];?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Profile Picture</label>

                    <div class="col-sm-2">
                      <input type="file" name="upload_image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" >
                       <input type="hidden" value="<?php echo $get_gc['image']?>" name="image_name">
                      <img id="image" class="profile-user-img img-responsive " src="../gc_images/<?php echo $get_gc['image'];?>" alt="User profile picture">
                    </div>
                  </div>

                   <!-- for admin_id -->
                    <input type="hidden" name="gc_id" value="<?php echo $get_gc['tbl_gc_id']?>">
               

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger" name="edit_info">Submit</button>
                    </div>
                  </div>




                  <?php endif; ?>


                </form>
              </div>
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