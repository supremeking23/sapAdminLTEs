<?php
  include("../includes/sessions.php");
  include("../includes/connection.php");
  include("../includes/functions.php");
  ?>


  <?php 
    //login process
    
    if(isset($_POST['submit'])){
      
        $email = $_POST['email'];
        $password = $_POST['password'];
        $admin = attempt_login_admins($email,$password);
        if($admin){
            $_SESSION['admin_id'] = $admin['admin_id'];
            $log_user_id = $admin['admin_id'];
            $date=date("l jS \of F Y ");
            $log_message = "Success Login at " . $date;
            $log_header = "Success Login";
            $userlevel = "admin";
            insert_log($log_user_id,$log_header,$log_message,$userlevel);
            redirect_to('index.php');



        }else{
            //redirect_to('wala.php');
            $_SESSION["failed_message"] = "Incorrect Email or Passoword";
        }
    }else{

    }

  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>S-APP ADMIN | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<style type="text/css">
    /*on page style*/

    body {
     background: url("images/umakA.jpg");
     background-repeat: no-repeat;
     background-attachment: fixed;
     background-position: center;
     background-size: cover;
     -webkit-background-size: cover;
     -moz-background-size: cover;
     -o-background-size: cover;
     color: #FFF;
     font-family: 'Quicksand', sans-serif;
     text-align: center;
    }

    .login-box{
      background: white
    }
  </style>

</head>
<body>


<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>S-APP</b> ADMIN</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Please Sign in to your account</p>

    <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php echo failed_message();?>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- self script -->
<script src="additional_styling/additional.js"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
