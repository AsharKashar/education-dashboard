<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo e(asset('ev-assets/backend/plugins/images/icon.png')); ?>">

     <title>Login - Eduvella School Management System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap Core CSS -->
<link href="<?php echo e(asset('ev-assets/backend/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo e(asset('ev-assets/backend/css/animate.css')); ?>" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo e(asset('ev-assets/backend/css/style.css')); ?>" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo e(asset('ev-assets/backend/css/colors/default.css')); ?>" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style type="text/css">
.login-register{background-color:   #D3D3D3}
.da-first {font-family: roboto, corbel, trebuchet ms;font-weight: bolder;}
.login-box {border-radius: 15px}
</style>
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<body>
<section id="wrapper" class="login-register">
  <div class="login-box">
          <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
            <div class="social"><img src="<?php echo e(asset('public/images/Logo.png')); ?>" alt="..." style="width:120px;margin-top:10px" height=""></div>
          </div>
    <div class="white-box" style="margin-top:-30px">
      <?php echo Form::open(array('url'=>'login','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)); ?>

        
        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
          <div class="col-xs-12">
            <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
            <input class="form-control" id="emailField" type="email" required="" placeholder="Email" name="email" autofocus>
          </div>
        </div>
        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
          <div class="col-xs-12">
            <?php if($errors->has('password')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
            <input class="form-control" id="passwordField" type="password" required="" placeholder="Password" name="password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox" value="remember-me" name="remember">
              <label for="checkbox-signup"> Remember me </label>
            </div>
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" id="submitMe" type="submit">Log In </button>
            <p> Auto Logins</p>
              <a id="adminclick" class="btn btn-primary btn-xs" style="padding:5px 20px; margin-bottom:10px" href="">Admin</a>
              <a id="studentclick" class="btn btn-danger btn-xs" style="padding:5px 20px; margin-bottom:10px" href="">Student</a>
              <a id="teacherclick" class="btn btn-success btn-xs" style="padding:5px 20px; margin-bottom:10px" href="">Teacher</a>
             
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<script src="<?php echo e(asset('ev-assets/backend/plugins/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo e(asset('ev-assets/backend/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo e(asset('ev-assets/backend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')); ?>"></script>
<script>
  $(document).ready(function(){
    $("#adminclick").click(function(e){
      e.preventDefault();
      $("#emailField").val('info@thetecknoknowledge.com');
      $("#passwordField").val('password');
      $("#submitMe").click();
    });
    $("#studentclick").click(function(e){
      e.preventDefault();
      $("#emailField").val('student@student.com');
      $("#passwordField").val('password');
      $("#submitMe").click();
    });
    $("#teacherclick").click(function(e){
      e.preventDefault();
      $("#emailField").val('teacher@teacher.com');
      $("#passwordField").val('password');
      $("#submitMe").click();
    });
    // $("#parentclick").click(function(e){
    //   e.preventDefault();
    //   $("#emailField").val('parent@mail.com');
    //   $("#passwordField").val('password');
    //   $("#submitMe").click();
    // });
    // $("#receptionclick").click(function(e){
    //   e.preventDefault();
    //   $("#emailField").val('reception@reception.com');
    //   $("#passwordField").val('password');
    //   $("#submitMe").click();
    // });
    // $("#curriculumclick").click(function(e){
    //   e.preventDefault();
    //   $("#emailField").val('curriculum@curriculum.com');
    //   $("#passwordField").val('password');
    //   $("#submitMe").click();
    // });
  })
  
</script>
<!--slimscroll JavaScript -->
<script src="<?php echo e(asset('ev-assets/backend/js/jquery.slimscroll.js')); ?>"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo e(asset('ev-assets/backend/js/custom.min.js')); ?>"></script>
<!--Style Switcher -->
<script src="<?php echo e(asset('ev-assets/backend/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')); ?>"></script>
</body>
</html>