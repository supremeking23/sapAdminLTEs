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
<body class="hold-transition skin-blue sidebar-mini " id="overview">
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
        Events
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Events</li>
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
            <div class="col-md-12">
               <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Event(Single Day)</h3>
                    <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table  class="table table-bordered table-striped datatable">
                    <thead>
                    <tr>
                      <th>Event ID</th>
                      <th>Event Title</th>
                      <th>Date</th>
                      <th>Department</th>
                      <th>Scheduled By</th>
                      <th>Actions</th>

                      
                    </tr>
                    </thead>

                    <tbody>
                    <?php //get all events
                        $all_events = get_all_single_day_events();
                        while($events = mysqli_fetch_assoc($all_events)):
                    ?>
                    <tr style="background-color: <?php echo ($admin_department_id == $events['department_id'])?"rgba(0,0,0,0.2)":""; ?> "> 
                      <td><?php echo $events['id']; ?></td>
                      <td><?php echo $events['title']; ?></td>
                      <?php $date_single = date_create($events['start']);
                      $time_single =date_create($events['start_time']);
                         
                      ?>
                      <td><?php echo date_format($date_single,"F d Y")." " . date_format($time_single,"g:i:s A"); ?></td>

                      <?php 
                      $query = "SELECT * FROM tbldepartments WHERE department_id = " . $events['department_id'] ;
                        $run_query = mysqli_query($connection,$query);
                        //for department name and code
                        while($run = mysqli_fetch_assoc($run_query)){ ?>
                            <td><?php echo  $run['department_name'];?> </td>
                      <?php  

                       ?>
                    

                     <?php 
                      $query = "SELECT * FROM tbladmins WHERE admin_id = " . $events['admin_id'] ;
                        $run_query = mysqli_query($connection,$query);
                        //for department name and code
                        while($runs = mysqli_fetch_assoc($run_query)){ ?>
                      
                      <td><?php echo  $runs['first_name'];?> <?php echo  $runs['last_name'];?> (<?php echo  $run['department_code'];?>)</td>

                       <?php  } //inner

                     } //outer

                       ?>

                       <td>

                         <?php //can delete if the department id of admin is = 1 and admin that is currently in the same department
                    if($events['department_id'] == $admin_department_id ||  $admin_department_id == 1):
                    ?>

                       <a type="button" data-tooltip="tooltip" data-placement="left" data-title="Edit Event"  data-toggle="modal" data-target="#editmodal_single_day<?php echo $events['id'];?>"><span class='glyphicon glyphicon-pencil'></span>  </a> | <a type="button" data-tooltip="tooltip" data-placement="left" data-title="Edit Event"  data-toggle="modal" data-target="#deletemodal_single_day<?php echo $events['id'];?>"><span class='glyphicon glyphicon-trash'></span></a>
                    <?php endif?>


                      </td>
                    </tr>


                    <!-- modal edit-->

                  <div class="modal fade" id="editmodal_single_day<?php echo $events['id'];?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Event(Single Day Event)</h4>
                          </div>
                          <div class="modal-body">
                            <form action="process_pages/edit_event.php" method="POST">
                              <div id="single_reservation">

                                                <input type="hidden" name="event_id"
                                                 value="<?php echo $events['id'];?>">

                                                <p><label for="event_name">Please enter the event name.</label></p>
                                            
                                                <div class="form-group has-feedback">
                                                  <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                                                  <input  required  type="text" class="form-control" placeholder="Event Name" required="" name="event_name" id="event_name" value="<?php echo $events['title']?>">
                                                  <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>


                                                  <?php if($admin_department_id== 1) {?>
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
                                                  <?php }else{?>

                                                   <input type="hidden" name="department" value="<?php echo $admin_department_id ?>">
                                                
                                                  <?php } ?>

                                  <!-- Date -->
                                  <div class="form-group">
                                    <label for="single_event">Date:</label>
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="date" class="form-control pull-right " id="" name="single_day" value="<?php echo $events['start']?>">
                                    </div>
                                    <!-- /.input group -->
                                  </div>
                                  <!-- /.form group -->


                                   <div class="form-group">
                                    <label for="single_event">Time:</label>
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="time" class="form-control pull-right " id="" name="single_time" value="<?php echo $events['start_time']?>">
                                    </div>
                                    <!-- /.input group -->
                                  </div>
                                  <!-- /.form group -->
                                </div> <!-- ./single_reservation -->

                           
                          </div>

                          <div class="modal-footer">
                             <input type="submit" class="btn btn-primary" id="submit_event_single" name="edit_event_single" value="Schedule this event now">
                            </form>
                          </div>
                           </form>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                 <div class="modal modal-warning fade" id="deletemodal_single_day<?php echo $events['id'];?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Delete Event(Single Day Event)</h4>
                          </div>
                          
                          <div class="modal-body">
                            <p>You are about to delete this event. Are you sure you want to delete this event?&hellip;</p>
                            <form action="process_pages/delete_event.php" method="POST">
                              <input type="hidden" name="event_id" value="<?php echo $events['id'];?>">
                               <input type="hidden" name="admin_id" value="<?php echo $admin_id;?>">
                              <p><input type="submit" name="delete_event_single" id="delete_event_button" class="btn btn-primary" value="Yes"> &nbsp&nbsp <input type="reset"  class="btn btn-danger" data-dismiss="modal"  value="No"></p>
                             </form> 


                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->


                      <?php endwhile;?>
                    </tbody>
                   
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->

            </div> <!-- /.row outer -->


        <div class="row">
          <div class="col-md-12">
             <div class="box">
              <div class="box-header with-border">
                   <h3 class="box-title">Event(Multiple Day)</h3>
                    <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table  class="table table-bordered table-striped datatable">
                  <thead>
                   <tr>
                      <th>Event ID</th>
                      <th>Event Title</th>
                      <th>Date Start</th>
                      <th>Date Finish</th>
                      <th>Department</th>
                      <th>Scheduled By</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   <?php //get all events
                        $all_events = get_all_multiple_day_events();
                        while($events = mysqli_fetch_assoc($all_events)):
                    ?>
                  <tr style="background-color: <?php echo ($admin_department_id == $events['department_id'])?"rgba(0,0,0,0.2)":""; ?> ">
                      <td><?php echo $events['id']; ?></td>
                      <td><?php echo $events['title']; ?></td>
                       <?php $date_from = date_create($events['start']);
                        $time_from =date_create($events['start_time']);
                        $date_to = date_create($events['end']);
                        $time_to =date_create($events['end_time']);
                         
                      ?>
                     <td><?php echo date_format($date_from,"F d Y")." " . date_format($time_from,"g:i:s A"); ?></td>
                      <td><?php echo date_format($date_to,"F d Y")." " . date_format($time_to,"g:i:s A"); ?></td>



                      <?php 
                      $query = "SELECT * FROM tbldepartments WHERE department_id = " . $events['department_id'] ;
                        $run_query = mysqli_query($connection,$query);
                        //for department name and code
                        while($run = mysqli_fetch_assoc($run_query)){ ?>
                            <td><?php echo  $run['department_name'];?> </td>
                      <?php  

                       ?>
                    

                     <?php 
                      $query = "SELECT * FROM tbladmins WHERE admin_id = " . $events['admin_id'] ;
                        $run_query = mysqli_query($connection,$query);
                        //for department name and code
                        while($runs = mysqli_fetch_assoc($run_query)){ ?>
                      
                      <td><?php echo  $runs['first_name'];?> <?php echo  $runs['last_name'];?> </td>

                       <?php  } //inner

                     } //outer

                       ?>


                             <?php //can delete if the department id of admin is = 1 and admin that is currently in the same department
                    if($events['department_id'] == $admin_department_id ||  $admin_department_id == 1):
                    ?>

                       <td><a type="button" data-tooltip="tooltip" data-placement="left" data-title="Edit Event"  data-toggle="modal" data-target="#editmodal_multiple_day<?php echo $events['id'];?>"><span class='glyphicon glyphicon-pencil'></span>  </a> | <a type="button" data-tooltip="tooltip" data-placement="left" data-title="Edit Event"  data-toggle="modal" data-target="#deletemodal_multiple_day<?php echo $events['id'];?>"><span class='glyphicon glyphicon-trash'></span></a>
              
                      </td>

                    <?php endif;?>   


                              <div class="modal fade" id="editmodal_multiple_day<?php echo $events['id'];?>">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Default Modal</h4>
                                      </div>
                                      <div class="modal-body">
                              


                              <div id="multiple_reservation">

                              <form action="process_pages/edit_event.php" method="POST">

                              <div class="col-sm-12">
                               <input type="hidden" name="event_id"
                                                 value="<?php echo $events['id'];?>">
                                  <p><label for="event_name">Please enter the event name.</label></p>
                                
                                <div class="form-group has-feedback">
                                  <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                                  <input  required  type="text" class="form-control" placeholder="Event Name" required="" name="event_name" id="event_name" value="<?php echo $events['title'];?>">
                                  <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                </div>


                                  <?php if($admin_department_id== 1) {?>
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
                                  <?php }else{?>

                                   <input type="hidden" name="department" value="<?php echo $admin_department_id ?>">
                                
                                  <?php } ?>

                                 </div>


                                  <div class="col-sm-6">
                                         <!-- Date -->
                                       <div class="form-group">
                                        <label for="date_from">Date From:</label>
                                        <div class="input-group date">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="date" class="form-control pull-right " id="date_from" value="<?php echo $events['start']?>" name="date_from">
                                        </div>
                                        <!-- /.input group -->
                                      </div>
                                      <!-- /.form group -->
                                      <div class="form-group">
                                        <label for="time_from">Time From:</label>
                                        <div class="input-group date">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="time" class="form-control pull-right " id="time_from" name="time_from" value="<?php echo $events['start_time']?>">
                                        </div>
                                        <!-- /.input group -->
                                      </div>
                                      <!-- /.form group -->
                                    </div> <!-- /.cols sm -->
                                  <div class="col-sm-6">
                                     <!-- Date -->
                                       <div class="form-group">
                                        <label for="date_to">Date To:</label>
                                        <div class="input-group date">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="date" class="form-control pull-right " id="date_to" name="date_to" value="<?php echo $events['end']?>">
                                        </div>
                                        <!-- /.input group -->
                                      </div>
                                      <!-- /.form group -->
                                      <div class="form-group">
                                        <label for="time_to">Time To:</label>
                                        <div class="input-group date">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="time" class="form-control pull-right " id="time_to" name="time_to" value="<?php echo $events['end_time']?>">
                                        </div>
                                        <!-- /.input group -->
                                      </div>
                                      <!-- /.form group -->

                                      
                                    </div> <!-- /.cols sm -->

                                    <div class="col-sm-12">
                                    
                                    </div>
                                  

                               </div> <!-- /.multiple_reservation -->



                               </div> <!-- /.modal body -->
                                      <div class="modal-footer">
                                          <input type="submit" class="btn btn-primary" id="submit_event_multiple" name="submit_event_multiple" value="Schedule this event now">
                                      </div>

                                </form>

                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->




                  <div class="modal modal-warning fade" id="deletemodal_multiple_day<?php echo $events['id'];?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Delete Event(Multiple Day Event)</h4>
                          </div>
                          
                          <div class="modal-body">
                            <p>You are about to delete this event. Are you sure you want to delete this event?&hellip;</p>
                            <form action="process_pages/delete_event.php" method="POST">
                              <input type="hidden" name="event_id" value="<?php echo $events['id'];?>">
                               <input type="hidden" name="admin_id" value="<?php echo $admin_id;?>">
                              <p><input type="submit" name="delete_event_multiple" id="delete_event_button" class="btn btn-primary" value="Yes"> &nbsp&nbsp <input type="reset"  class="btn btn-danger" data-dismiss="modal"  value="No"></p>
                             </form> 
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                    </tr>
                      <?php endwhile;?>
                  </tbody>
                 
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
      </div><!-- /.outer -->




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
<script>
  
</script>


</body>
</html>