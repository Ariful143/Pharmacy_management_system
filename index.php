<?php
session_start();
    if(isset($_SESSION['online_exam'])){
      header('location:dashboard/');
    }
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pharmacy Management System | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="css/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
    body{
      background-image: url(img/login-background.jpg) !important;
      background-size: cover !important;
      height: auto !important;
      background-position: center center !important;
    }
    .login-logo a{
      color: white !important;
    }
    .nav-tabs-custom > .nav-tabs > li{
      width: 50%;
      margin-right: 0px;
    }
    .login-box-body, .register-box-body { 
        border-radius: 15px;
    }
  </style>

  <!-- Google Font -->
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Pharmacy</b> Management System</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div id="message">

    </div>

    <form method="post" action="" autocomplete="off">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="email"  placeholder="Email">
        
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="pass"  placeholder="Password">
         
      </div>
      <div class="row">
        <div class="col-xs-6">
            <a href="#" class="btn btn-block btn-google btn-flat"  data-toggle="modal" data-target="#modal-forgot-password">Forgot Password ?</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">

          <button type="submit" id="signin" class="btn btn-primary btn-block btn-flat">Sign In <i class="fa fa-spinner fa-spin"></i></button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="social-auth-links text-center">
     
      
      
    </div>
    <!-- /.social-auth-links -->
  
        <div class="modal fade" id="modal-registration">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Registration Form</h4>
              </div>
              <div class="modal-body">
                <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1-1" data-toggle="tab">Teacher Registration</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">Student Registration</a></li> 
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1-1">
                <form action="" method="">
                <br>
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" id='tname' placeholder="Teacher Full name" required> 
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="email" class="form-control" id='temail' placeholder="Email" required>
                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="password" class="form-control" id='tpassword1' placeholder="Password" required>
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="password" class="form-control" id='tpassword2' placeholder="Retype password" required>
                      <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="row">
                      <!-- /.col -->
                      <div class="col-xs-12">
                        <button type="button" id="treg" class="btn btn-primary btn-block"> <i class="fa fa-spinner treg fa-spin" style="font-size:18px"> </i> Register</button>
                      </div>
                      <!-- /.col -->
                    </div>
                  </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                <form action="" method="">
                <br>
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" id='sname' placeholder="Student Full name" required>
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="email" class="form-control" id='semail' placeholder="Email" required>
                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="password" class="form-control" id='spassword1' placeholder="Password" required>
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="password" class="form-control" id='spassword2' placeholder="Retype password" required>
                      <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="row">
                      <!-- /.col -->
                      <div class="col-xs-12">
                        <button type="button"  id='sreg' class="btn btn-primary btn-block"> <i class="fa fa-spinner  fa-spin" style="font-size:18px"> </i> Register</button>
                      </div>
                      <!-- /.col -->
                    </div>
                  </form>
              </div> 
            </div>
            <!-- /.tab-content -->
          </div>
          <div id="errormessage"></div>
              </div> 
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modal-forgot-password">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Forgot Password</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="js/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('.fa-spin').hide();
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });

 



$('#sreg').click(function(){

  var spassword1 = $('#spassword1').val();
  var spassword2 = $('#spassword2').val();
  var sname = $('#sname').val();
  var semail = $('#semail').val();
 
     $.ajax({
    url:"inc/actions.php", 
    type: "post", 
    dataType: 'json',
    data: {action: "treg", name:sname, email: semail, pass: spassword1,pass2: spassword2},
    success:function(result){
      if(result['status']=='success'){
        $('#errormessage').empty();
        $('#errormessage').append(result['message']);
        setTimeout(function(){
          $('.fa-spin').hide();
          $('#errormessage').hide();
          window.location.href = result['url']; 
        },1000);
      }else{
        $('#errormessage').empty();
        $('#errormessage').append(result['message']); 
      }
    }
  });

  
 
});



$('#treg').click(function(){

  var tpassword1 = $('#tpassword1').val();
  var tpassword2 = $('#tpassword2').val();
  var tname = $('#tname').val();
  var temail = $('#temail').val();
 
     $.ajax({
    url:"inc/actions.php", 
    type: "post", 
    dataType: 'json',
    data: {action: "treg", name:tname, email: temail, pass: tpassword1,pass2: tpassword2},
    success:function(result){
      if(result['status']=='success'){
        $('#errormessage').empty();
        $('#errormessage').append(result['message']);
        setTimeout(function(){
          $('.fa-spin').hide();
          $('#errormessage').hide();
          window.location.href = result['url']; 
        },1000);
      }else{
        $('#errormessage').empty();
        $('#errormessage').append(result['message']); 
      }
    }
  });  
});



$('#signin').click(function(){

  event.preventDefault();
  $('.fa-spin').show();
  var email = $('#email').val();
  var pass = $('#pass').val();

  $.ajax({
    url:"inc/actions.php", //the page containing php script
    type: "post", //request type,
    dataType: 'json',
    data: {action: "login", email: email, pass: pass},
    success:function(result){
      if(result['status']=='success'){
        $('#message').empty();
        $('#message').append(result['message']);
        setTimeout(function(){
          $('#message').hide();
          $('.fa-spin').hide();
          window.location.href = result['url'];
          
        }, 1000);
      }else{
        $('.fa-spin').hide();
        $('#message').empty();
        $('#message').append(result['message']);
        setTimeout(function(){ 
          $('.fa-spin').hide();  
        }, 1000);
      }
    }
  });
});

  });
</script>
</body>
</html>
