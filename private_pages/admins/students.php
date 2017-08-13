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
        <li ><a href="professors.php"><i class="fa fa-link"></i> <span>Professors</span></a></li>
        <li><a href="guidance_councilor.php"><i class="fa fa-link"></i> <span>Guidance Councilors</span></a></li>
        <li class="active"><a href="students.php"><i class="fa fa-link"></i> <span>Students</span></a></li>
        
   
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <h1>
        Students
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Students</li>
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
              <h3 class="box-title">Students</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Students ID</th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  <th>Birthdate</th>
                  <th>Email</th>
                  <th>Department</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                 <?php //display all admins
                  $get_students = get_all_students();
                  while ($total_students = mysqli_fetch_assoc($get_students)) {
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
                    <?php //department belong
                      $query_code = "SELECT * FROM tbldepartments WHERE department_id = '".$total_students['department']."'";

                        $department = mysqli_query($connection,$query_code) or die(mysqli_error($connection));
                      if($department_code = mysqli_fetch_assoc($department)){
                        ?>
                    
                   <td><?php echo $department_code['department_code']?></td>
                     <?php
                        }//department code
                    ?>
                   <td><a data-toggle='modal' data-target='#editmodal<?php echo $total_students['tbl_student_id'] ?>'> <span class='glyphicon glyphicon-pencil'></span></a> | <a  data-toggle='modal' data-target='#deletemodal' ><span class='glyphicon glyphicon-trash'></span></a></td>
                </tr>

                        <div class="modal fade" id="editmodal<?php echo $total_students['tbl_student_id'] ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Profile</h4>
                              </div>
                              
                              <!-- form for updating of professors profile  -->

                        <script src = "../js/validations.js"></script>
                          <form action="students_page_process.php" method="post" enctype="multipart/form-data">
                              <div class="modal-body">
                               
                                <div class="form-group has-feedback">
                                  <input  title="Letters only!" type="text" class="form-control" required="" placeholder="First Name" name="first_name" onkeypress = "return lettersonly(event)" value="<?php echo $total_students['first_name'] ?>">
                                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>

                                <div class="form-group has-feedback">
                                  <input  title="Letters only!" type="text" class="form-control" required="" placeholder="Middle Name" name="middle_name" onkeypress = "return lettersonly(event)" value="<?php echo $total_students['middle_name'] ?>">
                                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>

                              <div class="form-group has-feedback">
                                <input  title="Letters only!" type="text" class="form-control" required="" placeholder="Last Name" name="last_name" onkeypress = "return lettersonly(event)" value="<?php echo $total_students['last_name'] ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                              </div>

                              <div class="form-group has-feedback">
                                <select class="form-control" name="gender">
                                  <option value="Male" <?php if($total_students['gender'] == 'Male') echo "selected=''"; ?>>Male</option>
                                  <option value="Female" <?php if($total_students['gender'] == 'Female') echo "selected=''"; ?>>Female</option>
                                </select>
                              </div>


                              <div class="form-group has-feedback">
                                <input type="text" class="form-control" required="" placeholder="Address" name="address" value="<?php echo $total_students['address'] ;?>">
                                <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                              </div>


                              <div class="form-group has-feedback">
                                <input type="date" class="form-control" required="" name="date_birth" placeholder="Date of Birth" value="<?php echo $total_students['date_birth']; ?>">
                                <span class="glyphicon glyphicon-calendar form-control-feedback" ></span>

                              </div>


                              <div class="form-group has-feedback">
                                <input title="Number only!" type="text" class="form-control" required="" placeholder="Contact" name="contact" onkeypress = "return numbersonly(event)" value="<?php echo $total_students['contact'] ?>">
                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                              </div>


                            <p>Enter your password to edit.</p>
                            
                            <div class="form-group has-feedback">
                              <input  required  type="password" class="form-control" placeholder="Password" required="" name="password">
                              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>


                              </div>
                              
                              <div class="modal-footer">
                                <input type="hidden" name="edit_prof_id" value="<?php echo $total_students['tbl_student_id']?>">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <input type="submit" name="edit_student" value="Update Info" class="btn btn-primary pull-right">
                              </div>

                            </form>

                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->


               <?php       
                  }
                  //end
              ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>




      <div class="row">
          <!-- add new professors -->
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
              <h3 class="box-title">Add new Students</h3>
            </div>
            <div class="box-body">
              <div class="register-box-body">
                <p class="login-box-msg">Register a New Student</p>
                <form action="students_page_process.php" method="post" enctype="multipart/form-data">

                  <div class="form-group has-feedback">
                    <input type="text"  required="" class="form-control" placeholder="Student ID" name="student_id">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                 
                  <div class="form-group has-feedback">
                    <input type="text"  title="Letters only!" required="" class="form-control" placeholder="First Name" onkeypress = "return lettersonly(event)" name="first_name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="text"  title="Letters only!" onkeypress = "return lettersonly(event)" required="" class="form-control" placeholder="Middle Name" name="middle_name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="text" pattern="[a-zA-Z\s]{1,}" title="Letters only!" required="" class="form-control" placeholder="Last Name" onkeypress = "return lettersonly(event)" name="last_name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <select class="form-control" name="gender">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="date" required="" class="form-control" name="date_birth" placeholder="Date of Birth">
                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="email" required="" class="form-control" placeholder="Email" required="" name="email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>

                  <div class="form-group has-feedback">
                      <input title="Number only!" type="text" class="form-control" required="" placeholder="Contact" name="contact" onkeypress = "return numbersonly(event)" >
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>

                     <div class="form-group has-feedback">
                                <input type="text" class="form-control" required="" placeholder="Address" name="address" value="">
                                <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                      </div>

                    <div class="form-group has-feedback">
                    <select class="form-control" name="department">
                      <?php //departments?>
                       <?php $all_departments = get_all_department();
                                    while($departments = mysqli_fetch_assoc($all_departments)){
                                      ?>
                                   <option value="<?php echo $departments['department_id']?>"><?php echo $departments['department_code'] ?></option>

                        <?php }?>
                    </select>
                  </div>
                  
                  <div class="form-group has-feedback">
                    <input type="password"   required="" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" required="" class="form-control" placeholder="Retype password" name="confirm_password">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                  </div>
                  <input type="file" name="upload_image" class="input-group">

                  <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <div class="col-xs-4">
                      <button type="submit" class="btn btn-primary btn-block btn-flat" name="register_student">Register</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


        <div class="col-md-6">
         

          <div class="info-box">

            <span class="info-box-icon bg-blue"><i class="fa fa-male"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Male</span>
              <?php $count_male_professors = count_professor_gender_male();
                      while($male_professors = mysqli_fetch_assoc($count_male_professors)){
                          $total_male_professors = $male_professors['gender_male'];
                      }
              ?>
              <span class="info-box-number"><?php echo $total_male_professors;?></span>
            </div>
          </div>


          <div class="info-box">

            <span class="info-box-icon bg-orange"><i class="fa fa-female"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Female</span>

               <?php $count_female_professors = count_professor_gender_female();
                      while($female_professors = mysqli_fetch_assoc($count_female_professors)){
                          $total_female_professors = $female_professors['gender_female'];
                      }
              ?>

              <span class="info-box-number"><?php echo $total_female_professors?></span>
            </div>
          </div>
          <div class="info-box">

            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
            <div class="info-box-content">

              <span class="info-box-text">Total Professors</span>
               <?php 
                 //count total number of admins
                  $count_professors = count_total_professors();
                  while ($total_professors = mysqli_fetch_assoc($count_professors)) {
                     $total_number_professors =  $total_professors['total prof'];
                  }
              ?>
              <span class="info-box-number"><?php echo $total_number_professors?></span>
            </div>
          </div>

          <!--- info box end -->

          <!-- add subject portion -->

        </div>
        <!-- end col 6 -->
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
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y');?><a href="#">Company</a>.</strong> All rights reserved.
  </footer>

 
</div>
<!-- ./wrapper -->

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

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>



</body>
</html>