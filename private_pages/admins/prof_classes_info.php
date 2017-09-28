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
<body class="hold-transition skin-blue sidebar-mini " id="professors">
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
        Professor Profile
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
                    $get_professor_info = get_professor_by_id($_GET['professor_id']);
                    if($get_professor_info){
                      //table id
                      $tbl_prof_id = $get_professor_info['tbl_prof_id'];

                      $professor_name = $get_professor_info['first_name'] . ' ' . $get_professor_info['last_name'];
                      $professor_image = $get_professor_info['image'];
                      $prof_dept_id = $get_professor_info['department'];

                      $date_added = $get_professor_info['date_added'];
                      $gender = $get_professor_info['gender'];
                      $prof_date_birth = $get_professor_info['date_birth'];
                      $prof_id = $get_professor_info['prof_id'];

                    }

                   $get_prof_dept = get_department_details_by_department_id($prof_dept_id);
                   while($prof_dept = mysqli_fetch_assoc($get_prof_dept)){
                     $prof_dept_code = $prof_dept['department_code'];
                   }
                   

                  ?>

                    <img class="profile-user-img img-responsive img-circle" src="../professor_images/<?php echo $professor_image;?>" alt="User profile picture">

                    <h3 class="profile-username text-center"><?php echo $professor_name;?></h3>

                    <p class="text-muted text-center">Department: <?php echo  $prof_dept_code; ?></p>

                    <ul class="list-group list-group-unbordered">
                       <li class="list-group-item">
                        <b>Professor ID:</b> <a class="pull-right"><?php echo $prof_id?></a>
                      </li>
                      <li class="list-group-item">
                        <?php $date =date_create($date_added);
                         $prof_since= date_format($date,"F  Y ");?>
                        <b>Admin since:</b> <a class="pull-right"><?php echo $prof_since?></a>
                      </li>
                      <li class="list-group-item">
                        <b>Gender</b> <a class="pull-right"><?php echo $gender;?></a>
                      </li>
                      <li class="list-group-item">
                      <?php $date =date_create($prof_date_birth);
                         $birthdate= date_format($date,"F d Y");?>
                        <b>Birthdate:</b> <a class="pull-right"><?php echo $birthdate;?></a>
                      </li>
                      <li class="list-group-item">
                       <?php $age = floor((time() - strtotime($birthdate)) / 31556926);?>
                        <b>Age:</b> <a class="pull-right"><?php echo $age;?></a>
                      </li>
                    </ul>
                    <a href="professor_full_info.php?professor_id=<?php echo $_GET['professor_id']?>" class="btn btn-primary btn-block"><b>Bact to Log History</b></a> 
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->


          </div> <!-- /.cols -->


          <div class="col-md-9">


              <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Professor Classes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin datatable">
                  <thead>
                  <tr>
                    
                    <th>Year and Section</th>
                    <th>Subject</th>
                    <th>Department</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>



                <?php $get_prof = get_prof_class_info($_GET['professor_id']);

                      while($prof = mysqli_fetch_assoc($get_prof)):
                ?>

                  <tr>

                            <?php $get_section = get_section_with_refence_id($prof['section_id']);
                                  while($year_section = mysqli_fetch_assoc($get_section)):
                            ?>
                              <td> <?php echo $year_section['yearlevel'] . ' - ' . $year_section['section_name']?></td>
                                   

                              <td><?php 
                                      //for subject
                                      if($prof['subject_id'] == 0){
                                        echo "No Subject Assigned";
                                      }else{ 

                                        $get_subject = get_subject_with_refence_id($prof['subject_id']);
                                        while($subject = mysqli_fetch_assoc($get_subject)){
                                          echo $subject['subject_name'];
                                        }//get subject name
                                      }
                              ?></td>  

                            <?php $get_department = get_department_with_refence_id($prof['department_id']);
                                  while($department = mysqli_fetch_assoc($get_department)):
                            ?>
                                      <td><?php echo $department['department_code']?></td>   
                           
                      
                   
                          <td>
                          <?php  //check to see if the there is a subject assigned
                                      if($prof['subject_id'] == 0){
                          ?>
                          <a  data-placement="left" data-tooltip ="tooltip" data-title="Assigned Subject" data-toggle="modal" data-target="#addSubject<?php echo $prof['profsubject_id']?>" ><span class='fa fa-book'></span></a> 
                          <?php }else{ ?>

                           <a  data-placement="left" data-tooltip ="tooltip" data-title="Edit Assigned Subject" data-toggle="modal" data-target="#editSubject<?php echo $prof['profsubject_id']?>" ><span class='fa fa-book'></span></a> 

                          <?php } ?>
                          |
                          <a  data-placement="left" data-tooltip ="tooltip" data-title="Delete Class" href="process_pages/delete_class_process.php?profsubject_id=<?php echo $prof['profsubject_id']?>&professor_id=<?php echo $_GET['professor_id']?>"><span class='fa fa-remove'></span></a> 
                          </td>



                          

                                          <!-- for adding of professor and subject -->
                 <div class="modal fade" id="addSubject<?php echo $prof['profsubject_id']?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Subject to this professor</h4>
                      </div>
                      <div class="modal-body">




                       <p>Class: <?php echo $year_section['yearlevel'] . ' - ' . $year_section['section_name']?></p>


                      <form action="process_pages/add_subject_to_this_prof.php" method="POST">

                          <div class="form-group has-feedback">
                            <select required=""  class="form-control" name="subject_id">
                            <option value="">Please choose a subject</option>
                              <?php //departments for student_use?>
                               <?php $all_subject = get_all_subject_for_this_professor_by_department_id($prof_dept_id);
                                            while($subject = mysqli_fetch_assoc($all_subject)){


                                              ?>
                                           <option value="<?php echo $subject['subject_id']?>"><?php echo $subject['subject_name'] ?></option>

                                <?php } // prof while?>
                            </select>
                          </div>


                         

                          </div>
                          <div class="modal-footer">

                       
                            <input type="hidden" name="profsubject_id" value="<?php echo $prof['profsubject_id']?>">

                            <input type="hidden" name="professor_id" value="<?php echo $_GET['professor_id']?>">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" name="add_subject_to_prof" class="btn btn-primary">Assigned this Subject</button>
                          </div>

                      </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->



                                                          <!-- for adding of professor and subject -->
                 <div class="modal fade" id="editSubject<?php echo $prof['profsubject_id']?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Subject to this professor</h4>
                      </div>
                      <div class="modal-body">




                       <p>Class: <?php echo $year_section['yearlevel'] . ' - ' . $year_section['section_name']?></p>


                      <form action="process_pages/add_subject_to_this_prof.php" method="POST">

                          <div class="form-group has-feedback">
                            <select required=""  class="form-control" name="subject_id">
                            <option value="">Please choose a subject</option>
                              <?php $prof_subject_id = $prof['profsubject_id'];?>
                               <?php $all_subject_edit = get_all_subject_for_this_professor_by_department_id($prof_dept_id);
                                            while($subject = mysqli_fetch_assoc($all_subject_edit)){


                                              ?>
                                           <option value="<?php echo $subject['subject_id']?>"><?php echo $subject['subject_name'] ?></option>

                                <?php } // prof while?>
                            </select>
                          </div>


                         

                          </div>
                          <div class="modal-footer">

                       
                            <input type="hidden" name="profsubject_id" value="<?php echo $prof['profsubject_id']?>">

                            <input type="hidden" name="professor_id" value="<?php echo $_GET['professor_id']?>">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" name="edit_subject_to_prof" class="btn btn-primary">Assigned this Subject</button>
                          </div>

                      </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                       
                  </tr>


               <?php endwhile; // department?>     

              <?php endwhile;//section outer?>    

              <?php endwhile;//prof outer?>
                 


                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->



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