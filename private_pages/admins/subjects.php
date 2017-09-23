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

  <script>
 


  


 
</script>


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
<body class="hold-transition skin-blue sidebar-mini " id="subjects">
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
        Subjects
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Subjects</li>
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
              <h3 class="box-title">Subjects</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>CFN</th>
                  <th>Department</th>
                  <th>Subject Name</th>
                  <th>Subject Code</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                <?php $get_subjects = get_all_subjects();
                  while($subjects = mysqli_fetch_assoc($get_subjects)):
                ?>
                <tr>
                 


                  <td><?php echo $subjects['cfn']?></td>
                   <?php //department belong
                      $query_code = "SELECT * FROM tbldepartments WHERE department_id = '".$subjects['department_id']."'";

                        $department = mysqli_query($connection,$query_code) or die(mysqli_error($connection));
                      if($department_code = mysqli_fetch_assoc($department)){
                        ?>
                    
                   <td><?php echo $department_code['department_code']?></td>
                     <?php
                        }//department code
                    ?>
                  <td><?php echo $subjects['subject_name']?></td>
                  <td><?php echo $subjects['subject_code']?></td>
                  <td><a  data-toggle='modal' data-tooltip="tooltip" data-placement="left" data-title="Delete Subject" data-target='#deletemodal<?php echo $subjects['subject_id']?>' ><span class='glyphicon glyphicon-trash'></span></a>  |  <a  data-toggle='modal' data-tooltip="tooltip" data-placement="left" data-title="Delete Subject" data-target='#editmodal<?php echo $subjects['subject_id']?>' ><span class='fa fa-pencil'></span></a></td>
                </tr>


                  <!-- for delete modal subject -->
                
                        <div class="modal modal-danger fade" id="deletemodal<?php echo $subjects['subject_id']?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Access Confirmation</h4>
                            </div>
                            <div class="modal-body">
                              <p>Please Enter Your Password to continue</p>
                               <form action="process_pages/subject_page_process.php" method="POST">

                                 <input type="hidden" name="admin_id" value="<?php echo $admin_id ?>">  
                                 <input type="hidden" name="delete_subject" value="<?php echo $subjects['subject_id']?>">
                                <div class="form-group has-feedback">
                                      <input type="password"   required="" class="form-control" placeholder="Password" name="admin_password">
                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                               
                            </div>
                            <div class="modal-footer">
                              <button type="submit" name="subject_delete" class="btn btn-outline">Delete</button>
                              </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>



                                        <!-- for update modal subject -->
                
                        <div class="modal modal-default fade" id="editmodal<?php echo $subjects['subject_id']?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Access Confirmation</h4>
                            </div>
                            <div class="modal-body">
                             
                               <form action="process_pages/subject_page_process.php" method="POST">


                                 <div class="form-group has-feedback">
                                  <input type="text"   required="" class="form-control" placeholder="Subject Code"  name="subject_code" value="<?php echo $subjects['subject_code']?>">
                                  <span class="fa fa-book form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                  <input type="text" required="" class="form-control" placeholder="Subject Name" name="subject_name" value="<?php echo $subjects['subject_name']?>">
                                  <span class="fa fa-book form-control-feedback"></span>
                                </div>

                               
                                 <input type="hidden" name="update_subject" value="<?php echo $subjects['subject_id']?>">
                             
                               
                            </div>
                            <div class="modal-footer">
                              <button type="submit" name="subject_edit" class="btn btn-default">Save changes</button>
                              </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>

                  
                <?php endwhile;?>
            
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>




      <div class="row">
          <!-- add new students -->
        <?php include('layouts/add_subjects.php');?>
      


        <!-- ONLINE ENCODING OF REMARKS -->
               <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
              <h3 class="box-title">Open Online Encoding of Remarks</h3>
            </div>
            <div class="box-body">
              <div class="register-box-body">
                <p class="login-box-msg">Click the button below to open Online Encoding of Remarks</p>
                <form action="process_pages/subject_page_process.php" method="post" enctype="multipart/form-data">

                 
                 
                <?php 

                  // for online encoding of remarks
                  $get_state = open_encode_of_grade();

                  while($isStateActive = mysqli_fetch_assoc($get_state)):
                ?>

                <?php if($isStateActive['state'] == 0){?>
                <button type="submit" class="btn btn-primary btn-block" name="open_grade">OPEN</button>
                <?php }else{ ?>
                <button type="submit" class="btn btn-primary btn-block" name="close_grade">CLOSE</button>

                 <?php } ?>
               
               <?php endwhile;?>   

                </form>
              </div>
            </div>
          </div>
        </div>

      </div> <!-- end row -->
     
              




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


<script type="text/javascript">
  $(function(){
 
  $("#subjects a:contains('Subjects')").parent().addClass('active');
})
</script>

</body>
</html>