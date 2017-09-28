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
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"

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
      <!-- Sidebar Menu -->
      <?php include('layouts/navigation.php');?>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <h1>
        Departments and Programs
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Department</li><li class="active">Add Department</li>
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

           <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Departments</h3>
                    
                    <div class="box-tools">
                      
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                    <!-- /.box-tools -->
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
                        <th>Action</th>
                        
                      </tr>
                      </thead>
                      <tbody>
                       <?php //display all admins
                        $get_departments = get_all_department($admin_department_id);
                        while ($total_departments = mysqli_fetch_assoc($get_departments)) {
                            ?> 
                      <?php //desregard school admin
                          if($total_departments['department_id'] != 1):
                      ?>   
                      <tr>
                          <td><?php echo $total_departments['department_name']?></td>
                          <td><?php echo $total_departments['department_code']?></td>

                          <?php $count_programs = count_programs_by_department($total_departments['department_id']);
                                while($total_count = mysqli_fetch_assoc($count_programs)){
                                  $get_count_programs = $total_count['number_of_programs'];
                                }
                          ?>
                          <td><?php echo $get_count_programs;?></td>

                           <?php $count_admin = count_admins_by_department($total_departments['department_id']);
                                while($total_count = mysqli_fetch_assoc($count_admin)){
                                  $get_count_admins = $total_count['number_of_admins'];
                                }
                          ?>
                          <td><?php echo $get_count_admins;?></td>


                          <td><a href="department_info.php?department_id=<?php echo $total_departments['department_id']?>">View Info</a></td>

                         
                      </tr>
                     <?php     
                          endif;  
                        }
                        //end
                    ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
            </div>




        </div><!-- ./ row-->


        <div class="row">
          <div class="col-md-6">
                  <div class="box box-default">
                    <div class="box-header">
                      
                      <h3 class="box-title">Add Department</h3>
                      <div class="box-tools">
                        
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <div class="box-body">

                  <form action="process_pages/departments_page_process.php" method="POST" enctype="multipart/form-data">
                         <p>Department Name</p>
                          <div class="form-group has-feedback">
                            <input required=""  type="text" class="form-control" placeholder="Department Name" name="department_name">
                            <span class="glyphicon glyphicon-list form-control-feedback"></span>
                          </div>
                          <p>Department Code</p>
                          <div class="form-group has-feedback">
                            <input required=""  type="text" class="form-control" placeholder="Department Name" name="department_code">
                            <span class="glyphicon glyphicon-list form-control-feedback"></span>
                          </div>

                          <p>Department Logo</p>
                          <div class="form-group has-feedback">
                            <input required=""  type="file" onchange="document.getElementById('department_logo').src = window.URL.createObjectURL(this.files[0])"  name="department_logo">
                            
                            <img id="department_logo" src="" width="200px">
                          
                          </div>

                          <p>Department Banner</p>
                          <div class="form-group has-feedback">
                            <input required=""  type="file" onchange="document.getElementById('department_banner').src = window.URL.createObjectURL(this.files[0])"  name="department_banner">
                      
                            <img id="department_banner" src="" width="200px">
                          </div>

                          <p>Department Color</p>
                          <div class="form-group has-feedback">
                            <input required=""  type="color"   name="department_color">
                      
                           
                          </div>
                    </div>
                    <!-- /.chat -->
                    <div class="box-footer">
                        <input required=""   type="submit" class="btn btn-primary pull-right" name="add_department" value="Add Department">
                      
                    </div>
                  </form>
                </div>
          </div>
          <div class="col-md-6">
              <div class="box box-default">
                    <div class="box-header">
                      
                      <h3 class="box-title">Add Programs</h3>
                      <div class="box-tools">
                        
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <div class="box-body">
                      <form action="process_pages/departments_page_process.php" method="POST" enctype="multipart/form-data">

                        <p>Department Name</p>
                          <div class="form-group">

                             <select class="form-control" name="department">
                          <?php // get all department aside from school admin

                                  $get_department = get_all_department_aside_from_school_admin($admin_department_id);
                                  while($department = mysqli_fetch_assoc($get_department)):
                          ?>
                            
                                <option value="<?php echo $department['department_id']?>"><?php echo $department['department_name']?>(<?php echo $department['department_code']?>)</option>
                                
                              

                            <?php endwhile;?>

                              </select>
                          </div>


                          <p>Program Name</p>
                          <div class="form-group has-feedback">
                            <input required=""  type="text" class="form-control" placeholder="Program Name" name="program_name">
                            <span class="glyphicon glyphicon-list form-control-feedback"></span>
                          </div>

                           <p>Program Code</p>
                          <div class="form-group has-feedback">
                            <input required=""  type="text" class="form-control" placeholder="Program Code" name="program_code">
                            <span class="glyphicon glyphicon-list form-control-feedback"></span>
                          </div>

                           <p>Program Description</p>
                          <div class="form-group has-feedback">
                            <textarea class="form-control textarea" name="program_description"></textarea>
                          </div>

                     
                    </div>
                      <div class="box-footer">
                      <input required=""   type="submit" class="btn btn-primary pull-right" name="add_program" value="Add Program">
                      </div>

                     </form>
                </div>
          </div>
        </div>





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
<script src="additional_styling/navigation.js"></script>

<!-- page script -->

<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


<script type="text/javascript">
   // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    //CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5();
</script>

</body>
</html>