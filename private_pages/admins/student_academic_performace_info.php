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
        <li class="active">Student Profile</li>
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




                      //for fetching subjects
                      $yearlevel = $get_student_info['yearlevel'];
                      $program = $get_student_info['program_major'];
                      $section = $get_student_info['section'];

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

                    <a href="student_full_info.php?student_id=<?php echo $_GET['student_id']?>" class="btn btn-primary btn-block"><b>Back to Log History</b></a> 
                   
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->


          </div> <!-- /.cols -->



          <div class="col-md-9">



            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Student Classes</h3>

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
                    
                    <th>Subject</th>
                    <th>Professor</th>
                    <th>Midterm Grade</th>
                    <th>Midterm Evaluation</th>
                    <th>Final Grade</th>
                    <th>Final Evaluation</th>
                  </tr>
                  </thead>
                  <tbody>



          <!-- get first the department,program,yearlevel,section,subject,prof from tblprofessorsubject depending on the parameters -->
            <?php $get_data = get_student_subject_from_prof_class_info($yearlevel,$section,$program,$student_dept_id);

               
                while($fetch_data = mysqli_fetch_assoc($get_data)):
                    
          ?>
              <!-- pag wala pang subject baka pwedeng wag muna ipakita -- >
                <tr>
                  <!--fetch subject name -->
                  <?php 
                     $get_subject_data = get_subject_with_refence_id($fetch_data['subject_id']);
                     while($fetch_subject_data = mysqli_fetch_assoc($get_subject_data)):
                  ?>
                  <td><?php echo  $fetch_subject_data['subject_name'];?></td>
                  

                  <!--fetch prof name -->
                  <?php 
                     $get_prof_data = get_professor_with_refence_id($fetch_data['prof_id']);
                     while($fetch_prof_data = mysqli_fetch_assoc($get_prof_data)):
                  ?>
                  <td><?php echo  $fetch_prof_data['first_name'];?> <?php echo  $fetch_prof_data['middle_name'];?> <?php echo  $fetch_prof_data['last_name'];?></td>


                    <!--fetch midterm grade -->
                  <?php 
                     $get_midterm_grade_data = get_midterm_grade_for_student($fetch_data['prof_id'],$student_dept_id,$fetch_data['subject_id']);
                     if(mysqli_num_rows($get_midterm_grade_data)){
                     while($fetch_mid_grade_data = mysqli_fetch_assoc($get_midterm_grade_data)):
                  ?>
                  <td> <?php echo $fetch_mid_grade_data['midterm_grade'];?> </td>
                    
                   <?php endwhile; //  (get_midterm_grade_for_student)?>
                  <?php } else{ ?>

                  <td>N/A</td>
                  <?php }?>

                       <!--fetch midterm evaluation -->
                  <?php 
                     $get_midterm_evaluation_data = get_midterm_evaluation_for_student($fetch_data['prof_id'],$student_dept_id,$fetch_data['subject_id']);
                     if(mysqli_num_rows($get_midterm_evaluation_data)){
                     while($fetch_mid_evaluation_data = mysqli_fetch_assoc($get_midterm_evaluation_data)):
                  ?>
                  <td> <?php echo $fetch_mid_evaluation_data['midterm_evaluation'];?> </td>
                    
                   <?php endwhile; //  (get_midterm_evaluation_for_student)?>
                  <?php } else{ ?>
                  
                  <td>N/A</td>
                  <?php }?>

                       <!--fetch final grade -->
                  <?php 
                     $get_final_grade_data = get_finals_grade_for_student($fetch_data['prof_id'],$student_dept_id,$fetch_data['subject_id']);
                     if(mysqli_num_rows($get_final_grade_data)){
                     while($fetch_final_grade_data = mysqli_fetch_assoc($get_final_grade_data)):
                  ?>
                  <td> <?php echo $fetch_mid_grade_data['final_grade'];?> </td>
                    
                   <?php endwhile; //  (get_final_grade_for_student)?>
                  <?php } else{ ?>
                  
                  <td>N/A</td>
                  <?php }?>

                       <!--fetch final evaluation -->
                  <?php 
                     $get_final_evaluation_data = get_finals_evaluation_for_student($fetch_data['prof_id'],$student_dept_id,$fetch_data['subject_id']);
                     if(mysqli_num_rows($get_final_evaluation_data)){
                     while($fetch_final_evaluation_data = mysqli_fetch_assoc($get_final_evaluation_data)):
                  ?>
                  <td> <?php echo $fetch_final_evaluation_data['final_evaluation'];?> </td>
                    
                   <?php endwhile; //  (get_finals_evaluation_for_student)?>
                  <?php } else{ ?>
                  
                  <td>N/A</td>
                  <?php }?>




                </tr>
                  
                  <?php endwhile; //  (get_professor_with_refence_id)?>
                 <?php endwhile; //  (get_subject_with_refence_id)?>
                <?php endwhile; // outer while (get_student_subject_from_prof_class_info)?>
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



