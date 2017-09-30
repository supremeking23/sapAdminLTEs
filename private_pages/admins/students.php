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
  function showProgram(str) {
  if (str == "") {
        document.getElementById("txtHint2").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","layouts/programs.php?q="+str,true);
        xmlhttp.send();
    }
}


  function showProgram2(str) {
  if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","layouts/programs.php?q="+str,true);
        xmlhttp.send();
    }
}



//not use
/*function showProgram(str) {
  if (str == "") {
        document.getElementById("txtHint2").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","layouts/programs2.php?q="+str,true);
        xmlhttp.send();
    }
}*/


  


 
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
                  $get_students = get_all_students($admin_department_id);
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
                   

                    <td><a  data-toggle='modal' data-tooltip="tooltip" data-placement="left" data-title="Delete Information" data-target='#deletemodal<?php echo $total_students['tbl_student_id'] ?>' ><span class='glyphicon glyphicon-trash'></span></a> | <a  href="student_full_info.php?student_id=<?php echo $total_students['tbl_student_id']; ?>" ><span class='glyphicon glyphicon-user'></span></a>

                    <?php if($total_students['section'] == "0"){ ?>
                     | <a  data-toggle='modal' data-tooltip="tooltip" data-placement="left" data-title="Add Section to this student" data-target='#addSectonModal<?php echo $total_students['tbl_student_id'] ?>' ><span class='fa fa-exclamation-circle'></span></a>
                   <?php }else{
                    echo "";
                    }

                      ?>
                    
                    </td>
                </tr>

                    
                   <!-- for delete modal student -->
                
                        <div class="modal modal-danger fade" id="deletemodal<?php echo $total_students['tbl_student_id'] ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Access Confirmation</h4>
                            </div>
                            <div class="modal-body">
                              <p>Please Enter Your Password to continue</p>
                               <form action="process_pages/delete_student_process.php" method="POST">

                                 <input type="hidden" name="admin_id" value="<?php echo $admin_id ?>">  
                                 <input type="hidden" name="delete_student" value="<?php echo $total_students['tbl_student_id'] ?>">
                                <div class="form-group has-feedback">
                                      <input type="password"   required="" class="form-control" placeholder="Password" name="admin_password">
                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                               
                            </div>
                            <div class="modal-footer">
                              <button type="submit" name="student_delete" class="btn btn-outline">Delete</button>
                              </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>



                                         <!-- for add section student -->
                
                        <div class="modal modal-default fade" id="addSectonModal<?php echo $total_students['tbl_student_id'] ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Add Section to this student</h4>
                            </div>
                            <div class="modal-body">
                              
                              <h3>Student Name: <small><?php echo $total_students['first_name'].' '.$total_students['middle_name'] . ' ' . $total_students['last_name']?></small></h3>

                                 <?php //department belong
                                $query_code = "SELECT * FROM tbldepartments WHERE department_id = '".$total_students['department']."'";

                                  $department = mysqli_query($connection,$query_code) or die(mysqli_error($connection));
                                if($department_details = mysqli_fetch_assoc($department)){
                                  ?>

                                <h3>Department: <small><?php echo $department_details['department_name']?> (<?php echo $department_details['department_code']?>)</small></h3>

                                   <?php
                        }//department code
                    ?>


                        <?php //department belong
                                $query_code = "SELECT * FROM tblcollegeprograms WHERE program_id = '".$total_students['program_major']."'";

                                  $program = mysqli_query($connection,$query_code) or die(mysqli_error($connection));
                                if($prorgram_details = mysqli_fetch_assoc($program)){
                                  ?>

                                <h3>Program: <small><?php echo $prorgram_details['program_name']?></small></h3>

                                   <?php
                        }//department code
                    ?>


                              <form action="process_pages/add_section_year_process.php" method="POST">
                                

                                  <p>Year</p>
                                  <div class="form-group has-feedback">
                                      <select required=""  class="form-control" name="year">
                                        <?php //year?>
                                         <?php $get_year = get_all_year();
                                                      while($year = mysqli_fetch_assoc($get_year)){
                                                        ?>
                                                     <option value="<?php echo $year['tbl_yearlevel_id']?>"><?php echo $year['yearlevel'] ?></option>

                                          <?php }?>
                                      </select>
                                    </div>

                                      <p>Section</p>
                                  <div class="form-group has-feedback">
                                      <select required=""  class="form-control" name="section">
                                        <?php //section?>
                                         <?php $all_section = get_all_section($total_students['department'],$total_students['program_major']);
                                                      while($section = mysqli_fetch_assoc($all_section)){
                                                        ?>
                                                     <option value="<?php echo $section['tbl_section_id']?>"><?php echo $section['section_name'] ?> </option>

                                          <?php }?>
                                      </select>
                                    </div>
                              
                              
                            </div>
                            <div class="modal-footer">

                              <input type="hidden" name="student_table_id" value="<?php echo $total_students['tbl_student_id'] ?>">
                              <button type="submit" name="add_student_year_sec" class="btn btn-primary">Add</button>


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
          <!-- add new students -->
        <?php include('layouts/add_students.php');?>
        <div class="col-md-6">
         

          <div class="info-box">

            <span class="info-box-icon bg-blue"><i class="fa fa-male"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Male</span>
              <?php $count_male_students = count_students_gender_male($admin_department_id);
                      while($male_students = mysqli_fetch_assoc($count_male_students)){
                          $total_male_students = $male_students['gender_male'];
                      }
              ?>
              <span class="info-box-number"><?php echo $total_male_students;?></span>
            </div>
          </div>


          <div class="info-box">

            <span class="info-box-icon bg-orange"><i class="fa fa-female"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Female</span>

               <?php $count_female_students = count_students_gender_female($admin_department_id);
                      while($female_students = mysqli_fetch_assoc($count_female_students)){
                          $total_female_students = $female_students['gender_female'];
                      }
              ?>

              <span class="info-box-number"><?php echo $total_female_students?></span>
            </div>
          </div>
          <div class="info-box">

            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
            <div class="info-box-content">

              <span class="info-box-text">Total Students</span>
               <?php 
                 //count total number of admins
                  $count_students = count_total_students($admin_department_id);
                  while ($total_students = mysqli_fetch_assoc($count_students)) {
                     $total_number_students =  $total_students['total student'];
                  }
              ?>
              <span class="info-box-number"><?php echo $total_number_students?></span>
            </div>
          </div>

          <!--- info box end -->

          <!-- add subject portion -->

        </div>
        <!-- end col 6 -->


            <div class="col-md-6">
                <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Bulk Student</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->

                <form action="process_pages/add_student_via_excel.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">

                    <p><a href="raw_files/template_file.xls" target="_blank">Download Template</a></p>

                       <p>Select Excel File</p>
                        <input type="file" name="excel"  >


                      <p>Select Department:</p>

                      <div class="form-group has-feedback">
                        <select required="" onchange="showProgram2(this.value)" class="form-control" name="department">
                        <option value="">Please choose a department</option>
                          <?php //departments for student_use?>
                           <?php $all_departments = get_all_department_for_student_insertions($admin_department_id);
                                        while($departments = mysqli_fetch_assoc($all_departments)){
                                          ?>
                                       <option value="<?php echo $departments['department_id']?>"><?php echo $departments['department_name'] ?> <?php echo $departments['department_code'] ?></option>

                            <?php }?>
                        </select>
                      </div>


                      
                      <div id="txtHint"><b></b></div>
                      



                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    <!--needs admins password before proceding -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#import_csv">Import and upload</button>
                          <div class="modal fade modal-danger" id="import_csv">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Access Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden" name="admin_id" value="<?php echo $admin_id;?>">
                                  <p>Please enter your password to continue</p>
                                  <div class="form-group has-feedback">
                                      <input type="password"   required="" class="form-control" placeholder="Password" name="admin_password">
                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  
                                  <input type="submit" name="add_csv" class="btn btn-primary" value="Proceed">
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->
                    </div> <!-- /.footer -->
               
                </form>
              </div>
              <!-- /.box -->


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




</body>
</html>