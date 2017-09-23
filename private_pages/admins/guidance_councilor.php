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
        Guidance Councilors
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Guidance Councilors</li>
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
              <h3 class="box-title">Guidance Councilors</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Guidance Councilor ID</th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  <th>Birthdate</th>
                  <th>Email</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                 <?php //display all professor depending on the admin that is login
                  $get_guidance_councilor = get_all_guidance_councilor();
                  while ($total_gc = mysqli_fetch_assoc($get_guidance_councilor)) {
                      ?> 
                  <tr>
                    <td><?php echo $total_gc['gc_id']?></td>
                    <td><?php echo $total_gc['first_name'].' '.$total_gc['middle_name'] . ' ' . $total_gc['last_name']?>
                    </td>
                    <td><?php echo $total_gc['gender']?></td>

                    <?php $date =date_create($total_gc['birth_date']);
                           $date_birth = date_format($date,"F d Y");
                      ?>

                    <td><?php echo $date_birth;?></td>
                    <td><?php echo $total_gc['email']?></td>
                   
                  

                    <td><a  data-toggle='modal' data-tooltip="tooltip" data-placement="left" data-title="Delete Information" data-target='#deletemodal<?php echo $total_gc['tbl_gc_id'] ?>' ><span class='glyphicon glyphicon-trash'></span></a> | <a  href="guidance_councilor_full_info.php?guidance_councilor=<?php echo $total_gc['tbl_gc_id']; ?>" ><span class='glyphicon glyphicon-user'></span></a></td>
                </tr>


                  <!-- for delete modal gc -->
                
                        <div class="modal modal-danger fade" id="deletemodal<?php echo $total_gc['tbl_gc_id'] ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Access Confirmation</h4>
                            </div>
                            <div class="modal-body">
                              <p>Please Enter Your Password to continue</p>
                               <form action="process_pages/delete_gc_process.php" method="POST">

                                 <input type="hidden" name="admin_id" value="<?php echo $admin_id ?>">  
                                 <input type="hidden" name="delete_gc" value="<?php echo $total_gc['tbl_gc_id'] ?>">
                                <div class="form-group has-feedback">
                                      <input type="password"   required="" class="form-control" placeholder="Password" name="admin_password">
                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                               
                            </div>
                            <div class="modal-footer">
                              <button type="submit" name="gc_delete" class="btn btn-outline">Save changes</button>
                              </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
    

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

          <?php include('layouts/add_guidance_councilor.php'); ?>

        <div class="col-md-6">
         

          <div class="info-box">

            <span class="info-box-icon bg-blue"><i class="fa fa-male"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Male</span>
              <?php $count_male_gc = count_guidance_councilors_male();
                      while($male_gc = mysqli_fetch_assoc($count_male_gc)){
                          $total_male_gc = $male_gc['male gc'];
                      }
              ?>
              <span class="info-box-number"><?php echo $total_male_gc;?></span>
            </div>
          </div>


          <div class="info-box">

            <span class="info-box-icon bg-orange"><i class="fa fa-female"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Female</span>

                <?php $count_female_gc = count_guidance_councilors_female();
                      while($female_gc = mysqli_fetch_assoc($count_female_gc)){
                          $total_female_gc = $female_gc['female gc'];
                      }
              ?>
              <span class="info-box-number"><?php echo $total_female_gc?></span>
            </div>
          </div>
          <div class="info-box">

            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
            <div class="info-box-content">

              <span class="info-box-text">Total Guidance Councilor</span>
               <?php $count_total_gc = count_total_guidance_councilors();
                      while($count_gc = mysqli_fetch_assoc($count_total_gc)){
                          $total_gc = $count_gc['total gc'];
                      }
              ?>
              <span class="info-box-number"><?php echo $total_gc?></span>
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
<script src="additional_styling/additional.js"></script>
<script src="additional_styling/navigation.js"></script>

<!-- page script -->



<script type="text/javascript">
  $(function(){

  $("#gc a:contains('Guidance Councilors')").parent().addClass('active');
})
</script>

</body>
</html>