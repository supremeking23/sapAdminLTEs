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
    <!-- fullCalendar -->
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
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

  


 <style type="text/css">
   .colors{
    color: red;
   }

   .fc-time{
   display : none;
}
 </style> 


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
                <img  src="admin_images/<?php echo $image;?>" class="img-circle" alt="User Image">

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
        Overview
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Overview</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here -->
     <?php //messages
      echo message_success();
      ?>   

      <?php //retrieve counts

            //count total number of admins
            $count_admin = count_total_admins($admin_department_id);
            while ($total_admin = mysqli_fetch_assoc($count_admin)) {
               $total_number_admin =  $total_admin['total admin'];
            }

            //count total number of professors
            $count_prof = count_total_professors($admin_department_id);
            while ($total_prof = mysqli_fetch_assoc($count_prof)) {
               $total_number_prof =  $total_prof['total prof'];
            }

             //count total number of guidance councilor
            $count_gc = count_total_guidance_councilors();
            while ($total_gc = mysqli_fetch_assoc($count_gc)) {
               $total_number_gc =  $total_gc['total gc'];
            }


             //count total number of guidance councilor
            $count_students = count_total_students($admin_department_id);
            while ($total_students = mysqli_fetch_assoc($count_students)) {
               $total_number_student =  $total_students['total student'];
            }

      ?>


      <div class="row">
          
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $total_number_admin;?></h3>

              <p>Number of Admins</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="admins.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $total_number_prof;?></h3>

              <p>Number of Professors</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="professors.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>


          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $total_number_gc;?></h3>

              <p>Number of Guidance Councilors</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $total_number_student;?></h3>

              <p>Number of Students</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="students.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

      </div> <!--/.row-->

      <div class="row">
        <?php 
          //success message for updating profile picture
          echo message_success();
          //failed message for updating profile picture wrong password
         echo  failed_message();
        ?>
      </div>
    
      <div class="row">
                    <!--  -->
           <div class="col-xs-6"></div>

           <div class="col-xs-6">

                          <!-- calendar -->
            <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Calendar</h3>
                      <div class="box-tools pull-right">
                    </div><!-- /.box-header -->
                    
               
                          <div class="box-body">
                              <div id='calendar' style="max-width: 900px; margin: 0 auto;"></div>

                          </div><!-- /.box-body -->
                         
                          <div class="box-footer">
                            <button class="btn btn-primary pull-left" data-toggle="modal" data-target="#modal-add-event">Add Event</button>
                            <a href="all_events.php" class="btn btn-warning pull-right">All Events</a>
                        </div>                                       
             </div><!-- /.box -->
           </div>  <!-- /. col for calendar -->
           

      </div> <!-- /.end row -->

      <!-- modal for adding events -->

       <div class="modal fade" id="modal-add-event">
          <div class="modal-dialog">

         


            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Event</h4>
              </div>
              

               
              <div class="modal-body">
                   
                    
                             
                            <center>
                              <button type="button" id="single_day">Single day event</button>
                              <button type="button"  id="multiple_day">Multiple day event</button>
                            </center>

                      

                      <div id="single_reservation">
                          <form action="process_pages/add_event.php" method="POST">
                            <p><label for="event_name">Please enter the event name.</label></p>
                                
                                <div class="form-group has-feedback">
                                  <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                                  <input  required  type="text" class="form-control" placeholder="Event Name" required="" name="event_name" id="event_name">
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
                                <input type="date" class="form-control pull-right " id="" name="single_day">
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
                                <input type="time" class="form-control pull-right " id="" name="single_time">
                              </div>
                              <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <input type="submit" class="btn btn-primary" id="submit_event_single" name="submit_event_single" value="Schedule this event now">
                            </form>
                        </div> <!-- ./single_reservation -->



                        

                     <div class="row">
                        
                          
                         

                    

                          <div id="multiple_reservation">

                              <form action="process_pages/add_event.php" method="POST">

                              <div class="col-sm-12">
                                  <p><label for="event_name">Please enter the event name.</label></p>
                                
                                <div class="form-group has-feedback">
                                  <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                                  <input  required  type="text" class="form-control" placeholder="Event Name" required="" name="event_name" id="event_name">
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
                                          <input type="date" class="form-control pull-right " id="date_from" name="date_from">
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
                                          <input type="time" class="form-control pull-right " id="time_from" name="time_from">
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
                                          <input type="date" class="form-control pull-right " id="date_to" name="date_to">
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
                                          <input type="time" class="form-control pull-right " id="time_to" name="time_to">
                                        </div>
                                        <!-- /.input group -->
                                      </div>
                                      <!-- /.form group -->

                                      
                                    </div> <!-- /.cols sm -->

                                    <div class="col-sm-12">
                                      <input type="submit" class="btn btn-primary" id="submit_event_multiple" name="submit_event_multiple" value="Schedule this event now">
                                    </div>
                                  </form>

                          </div> <!-- /.multiple_reservation -->

                    </div><!-- /.row -->

              </div>
                <div class="modal-footer">
                  
              </div>

              </form>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

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
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="#">Company</a>.</strong> All rights reserved.
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


<!-- AdminLTE App -->
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>

<!-- page script -->

<script src="bower_components/plotlyjs/plotly-latest.min.js"></script>

<!-- fullCalendar -->
<script src="bower_components/moment/moment.js"></script>
<script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="additional_styling/additional.js"></script>
<script src="additional_styling/navigation.js"></script>




<script>
 $(document).ready(function() {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '<?php echo date('m-d-y')?>',
            selectable: false,
            selectHelper: true,
            editable: false,
            eventLimit: true, 
            allDay:true,

         
          events: {
            url: 'process_pages/getEvents.php',
            type: 'POST', // Send post data
            //backgroundColor: '',
            error: function() {
                alert('There was an error while fetching events.');
            }
        }
            

        }); //events


            //Date picker
  

    $("div#single_reservation").hide();
        $("div#multiple_reservation").hide();
  
    $("#single_day").click(function(){
        $("div#single_reservation").show();
        $("div#multiple_reservation").hide();
    });
    
    
    $("#multiple_day").click(function(){
        $("div#single_reservation").hide();
        $("div#multiple_reservation").show();
    });

    
    /*var event_name = $('#event_name').val();
         
   

     
    $("#single_day").click(function(){ 
      $('#submit_event').click(function(){
          
          $.ajax({
            url:"process_pages/input_event_single_date_process.php",
            method:"POST",

            data:$('#event_form').serialize(),
            success:function(data){
              $('form').trigger('reset');
              console.log(data);
              console.log(event_name);
            }
          });
      });
    });


    $("#multiple_day").click(function(){ 
      $('#submit_event').click(function(){
          
          $.ajax({
            url:"process_pages/input_event_multiple_date_process.php",
            method:"POST",

            data:$('#event_form').serialize(),
            success:function(data){
              $('form').trigger('reset');
              console.log(data);
              console.log(event_name);
            }
          });
      });
    });

*/
   
        
    });

</script>

</body>
</html>