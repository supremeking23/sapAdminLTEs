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

     <div class="box">
            <div class="box-header">
              <h3 class="box-title">Departments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Department Name</th>
                  <th>Department Code</th>
                  <th>Number of Programs</th>
                  <th>Number of Admins</th>
                  <th>Number of Professors</th>
                  <th>Number of Studens</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                 <?php //display all department
                  $get_departments = get_all_department($admin_department_id);
                  while ($total_departments = mysqli_fetch_assoc($get_departments)) {
                      ?> 
                  <tr>
                    <td><?php echo $total_departments['department_code']?></td>
                    <td><?php echo $total_departments['department_name']?>
                    </td>
                    <?php 
                      //count number of programs
                      $count_programs = count_programs_by_department($total_departments['department_id']);
                      while($programs_by_department = mysqli_fetch_assoc($count_programs)){
                    ?>
                    <td><?php echo $programs_by_department['number_of_programs']; }?></td>

                    <?php 
                      //number of admins for each departments
                      $count_admin_department = count_admins_by_department($total_departments['department_id']);
                      while($admins_by_department = mysqli_fetch_assoc($count_admin_department)){
                      ?>

                    <td><?php echo $admins_by_department['number_of_admins']; }?></td>

                    <?php //number of professors for each departments
                       $count_professor_department = count_professors_by_department($total_departments['department_id']);
                      while($professors_by_department = mysqli_fetch_assoc($count_professor_department)){
                    ?>
                    <td><?php echo $professors_by_department['number_of_professors']; }?></td>
                    <?php //number of student for each department
                        $count_student_department = count_students_by_department($total_departments['department_id']);
                          while($students_by_department = mysqli_fetch_assoc($count_student_department)){
                        ?>
                    
                   <td><?php echo $students_by_department['number_of_students']; } ?></td>
                  
                   <td><a data-toggle='modal' data-tooltip="tooltip" title="View Details" href='department_details.php?department_id=<?php echo $total_departments['department_id'];?>'> <span class='glyphicon glyphicon-list-alt'></span></a> | <a  data-toggle='modal' data-target='#deletemodal' ><span class='glyphicon glyphicon-trash'></span></a></td>
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
       
       <div class="col-md-6">
          <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Add Department</h3>
                  <div class="box-tools pull-right">
                      
                  </div><!-- /.box-tools -->
              </div><!-- /.box-header -->
                    
                    
                    <form action="departments_page_process.php" method="post" enctype="multipart/form-data">
                          <div class="box-body">
                           
                            <div class="form-group">
                              <label>All Departments</label>
                              <select multiple class="form-control" name="departments">
                              <?php $all_departments = get_all_department($admin_department_id);
                                    while($departments = mysqli_fetch_assoc($all_departments)){
                                      ?>
                                      <option><?php echo $departments['department_name'] . "(".$departments['department_code'] . ")"?></option>
                                      <?php
                                    }
                              ?>
                                
                              </select>
                            </div>

                            <p>Department Code</p>
                              <div class="form-group has-feedback">
                                <input type="text" class="form-control" required="" placeholder="Department Code" required="" name="department_code" value="<?php ?>">
                                <span class="glyphicon glyphicon-book form-control-feedback"></span>
                              </div>
                               <p>Department Name</p>
                              <div class="form-group has-feedback">
                                <input type="text" class="form-control" required="" placeholder="Department Name" required="" name="department_name" value="<?php ?>">
                                <span class="glyphicon glyphicon-book form-control-feedback"></span>
                              </div>

                            <p>Enter password to continue</p>
                            <div class="form-group has-feedback">
                              <input  required  type="password" class="form-control" placeholder="Password" required="" name="password">
                              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                          </div><!-- /.box-body -->
                         
                          <div class="box-footer">
                              <input type="submit" name="add_department" value="Add Department" class="btn btn-primary pull-right">
                          </div><!-- box-footer -->
                    </form>

                </div><!-- /.box add department-->
       </div>


        <div class="col-md-6">
                      <!-- add new Department -->
                      <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Add Programs</h3>
                  <div class="box-tools pull-right">
                      
                  </div><!-- /.box-tools -->
              </div><!-- /.box-header -->
                    
                    
                    <form action="departments_page_process.php" method="post" enctype="multipart/form-data">
                          <div class="box-body">
                           
                            <div class="form-group">
                              <label>All Programs</label>
                              <select multiple class="form-control" name="departments">
                              <?php $all_programs = get_all_programs();
                                    while($programs = mysqli_fetch_assoc($all_programs)){
                                      //get the departments for each programs
                                      $get_department_from_program_query = "SELECT * FROM tbldepartments WHERE department_id = '".$programs['department_id']."'";
                                      $run_depatment_from_program = mysqli_query($connection,$get_department_from_program_query);

                                      while($get_department_code = mysqli_fetch_assoc($run_depatment_from_program)){


                                      ?>

                                      <option><?php echo $programs['program_name']."(".$programs['program_code'].")". " OF (".$get_department_code['department_code'].")";?></option>
                                      <?php
                                      }
                                    }
                              ?>
                                
                              </select>
                            </div>

                            <p>Department</p>
                            <div class="form-group has-feedback">
                              <select class="form-control" name="department">
                                <?php //departments?>
                                 <?php $all_departments = get_all_department($admin_department_id);
                                              while($departments = mysqli_fetch_assoc($all_departments)){
                                                ?>
                                             <option value="<?php echo $departments['department_id']?>"><?php echo $departments['department_code'] ?></option>

                                  <?php }?>
                              </select>
                            </div>

                            <p>Program Code</p>
                              <div class="form-group has-feedback">
                                <input type="text" class="form-control" required="" placeholder="Program Code" required="" name="program_code" value="<?php ?>">
                                <span class="glyphicon glyphicon-book form-control-feedback"></span>
                              </div>
                               <p>Program Name</p>
                              <div class="form-group has-feedback">
                                <input type="text" class="form-control" required="" placeholder="Program Name" required="" name="program_name" value="<?php ?>">
                                <span class="glyphicon glyphicon-book form-control-feedback"></span>
                              </div>

                            <p>Enter password to continue</p>
                            <div class="form-group has-feedback">
                              <input  required  type="password" class="form-control" placeholder="Password" required="" name="password">
                              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                          </div><!-- /.box-body -->
                         
                          <div class="box-footer">
                              <input type="submit" name="add_program" value="Add Program" class="btn btn-primary pull-right">
                          </div><!-- box-footer -->
                    </form>

                </div><!-- /.box add department-->
       
     
        </div>
        <!-- end col 6 -->
      </div>
      <!-- end row -->
         <!--| -->
       

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