<!DOCTYPE html>  
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" href="<?php echo e(asset('ev-assets/backend/plugins/images/icon.png')); ?>">
<title><?php echo $__env->yieldContent('title'); ?></title>
<link href="<?php echo e(asset('ev-assets/backend/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
<!-- Menu CSS -->
<link href="<?php echo e(asset('ev-assets/backend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')); ?>" rel="stylesheet">
<!-- vector map CSS -->
<link href="<?php echo e(asset('ev-assets/backend/plugins/bower_components/vectormap/jquery-jvectormap-2.0.2.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('ev-assets/backend/plugins/bower_components/css-chart/css-chart.css')); ?>" rel="stylesheet">
<!-- Morris CSS -->
<link href="<?php echo e(asset('ev-assets/backend/plugins/bower_components/morrisjs/morris.css')); ?>" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo e(asset('ev-assets/backend/css/animate.css')); ?>" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo e(asset('ev-assets/backend/css/style.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('ev-assets/backend/css/toastr.css')); ?>">
<!-- color CSS -->
<script src="<?php echo e(asset('ev-assets/backend/plugins/bower_components/jquery/dist/jquery.min.js')); ?>"></script>

<script src="<?php echo e(asset('ev-assets/backend/plugins/bower_components/Chart.js/Chart.min.js')); ?>"></script>
<style>
  .test-grid {
       padding: 5px;
       margin-left: 5px;
       border-radius: 4px;

      transition: all 250ms cubic-bezier(.4, 0, .2, 1) 0s;
      box-shadow: rgba(46, 41, 51, .08) 0px 1px 2px, rgba(71, 63, 79, .08) 0px 2px 4px;
  }
  .test-grid:hover{
    transform: translateY(-0.25rem);
    box-shadow: rgba(46, 41, 51, .08) 0px 4px 8px, rgba(71, 63, 79, .16) 0px 8px 16px;
  }
  .sm-side {
    height: 100vh !important
  }
  .menu-top-title{
    padding:10px;
    font-weight: bold;
    color: #a6a6a6;
    text-align:center;
  }
  .white-box, .panel {
      padding-bottom: 20px;
  }
  .dataTables_info{
    margin-left: 10px
  }

  .badge-new{
    top:6px !important;
    right: 0 !important;
  }
</style>
  <?php 
      //its shows the list of all classes on sidebar
      $classli = App\Classes::orderBy('created_at','asc')->paginate(4);
      $studentli = Auth::user()->admin_type == 'super' ? App\User::where('role', 'student')->get() : App\User::where('role', 'student')->where('school_id', Auth::user()->school_id)->get();

      //determines the authenticated user
      $get_school_admin = App\School::find(Auth::user()->school_id);
      $authe = Auth::user();

      $messages = App\Message::where('active','0')->where('to', $authe->id)->orderBy('created_at', 'desc')->get();
      $countli = App\Message::orderBy('created_at','desc')->paginate(5);
      $count2 = App\Notice::where('active',1)->orderBy('created_at','desc')->paginate(5);
      // site config using database
      $settings = App\Settings::find(1);
    ?>

    <?php if(isset($_COOKIE['skin'])): ?>
    <link href="<?php echo e(asset('ev-assets/backend/css/colors/'.$_COOKIE['skin'].'.css')); ?>" id="theme"  rel="stylesheet">
    <?php elseif($get_school_admin &&  $get_school_admin->color): ?>
    <link href="<?php echo e(asset('ev-assets/backend/css/colors/'.$get_school_admin->color .'.css')); ?>" id="theme"  rel="stylesheet">
    <?php else: ?>
    <link href="<?php echo e(asset('ev-assets/backend/css/colors/'.$settings->skin_color .'.css')); ?>" id="theme"  rel="stylesheet">
    <?php endif; ?>
    <link href="<?php echo e(asset('ev-assets/backend/plugins/bower_components/datatables/custom.css')); ?>" rel="stylesheet">
    
    
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script>
          window.Laravel = <?php echo json_encode([
              'csrfToken' => csrf_token(),
          ]); ?>
  </script>

  <?php $value = config('lang.locale'); ?>
  <?php if($value == "ar"): ?>
    <link href="<?php echo e(asset('ev-assets/backend/css/rtl.css')); ?>" rel="stylesheet">
  <?php endif; ?>

<style type="text/css">
.logoicon {display: none;height: 60px; text-align: center;padding-top:5px;padding-left: 5px;padding-right: 5px}
.logoicon i { font-size: 45px}
.site-min-height {
    min-height: 1400px;
}
.breadcrumb {margin-top: 15px;background-color: white;border-radius: 0px;padding: 15px}
@media (max-width: 760px){
  .mail-box .sm-side{
    float: none !important;
    width: 100% !important;
  }
  .mail-box .lg-side{
    float: none !important;
    width: 100% !important;
  }
}
.logoicon {display: block;}
@media (min-width: 1170px){
  .logoicon {display: none;}
}
</style>
<script type="text/javascript" language="javascript" src="<?php echo e(asset('ev-assets/backend/plugins/bower_components/datatables/datatables.min.js')); ?>"></script>
</head>
<body>
<div id="wrapper">
  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-static-top m-b-0" id='ev-header'>
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
      <div class="top-left-part">
        <a class="logo" href="<?php echo url('/dashboard'); ?>">
          <i class="logoicon">
            <i class="fa fa-dashboard" style="color:#222D32"></i>
          </i>
          <span class="hidden-xs">
            <?php if($get_school_admin && $get_school_admin->photo): ?><img src="<?php echo e(asset('ev-assets/uploads/school-images/'.$get_school_admin->photo)); ?>" alt="home" style="max-width: 180px;margin: 8px; max-height:45px"> <?php endif; ?>
          </span>
        </a>
      </div>
      <ul class="nav navbar-top-links navbar-left hidden-xs">
        <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu" style="color:#222D32"></i></a></li>
      </ul>
      <ul class="nav navbar-top-links navbar-right pull-right">
       

        
       

        <!-- /.dropdown -->
        <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="fa fa-bell-o" style="color:#222D32"></i>

          <div class="notify"></div>
          </a>
          <ul class="dropdown-menu dropdown-tasks">
            <?php $__currentLoopData = $count2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $counter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li> <a href="#">
              <div>
                <p> <strong><?php echo e($counter->title); ?></strong> <span class="pull-right text-muted"><?php echo e($counter->created_at); ?></span> </p>
              </div>
              </a> 
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li class="divider"></li>
            <li> <a class="text-center" href="<?php echo e(url('noticeboard/noticeboard_list')); ?>"> <strong>See All Notifications</strong> <i class="fa fa-angle-right"></i> </a> </li>
          </ul>
          <!-- /.dropdown-tasks -->
        </li>
        <?php if(Auth::user()->role == 'admin'): ?>
          <li class="dropdown language">
              <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#">
                  <img src="<?php echo e(asset('ev-assets/backend/img/flags/'.$value.'.png')); ?>" alt="" width='18' height='13' alt="">
                  <!-- <span class="username">English US</span> -->
                  <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                  <li><a href="<?php echo e(url('language/ar')); ?>"><img src="<?php echo e(asset('ev-assets/backend/img/flags/ar.png')); ?>" width='18' height='13' alt=""> Arabic</a></li>
                  <li><a href="<?php echo e(url('language/bl')); ?>"><img src="<?php echo e(asset('ev-assets/backend/img/flags/bl.png')); ?>" width='18' height='13' alt=""> Bengali</a></li>
                  <li><a href="<?php echo e(url('language/ch')); ?>"><img src="<?php echo e(asset('ev-assets/backend/img/flags/ch.png')); ?>" width='18' height='13' alt=""> Chinese</a></li>
                  <li><a href="<?php echo e(url('language/en')); ?>"><img src="<?php echo e(asset('ev-assets/backend/img/flags/en.png')); ?>" alt=""> English US</a></li>
                  <li><a href="<?php echo e(url('language/fr')); ?>"><img src="<?php echo e(asset('ev-assets/backend/img/flags/fr.png')); ?>" alt=""> French</a></li>
                  <li><a href="<?php echo e(url('language/de')); ?>"><img src="<?php echo e(asset('ev-assets/backend/img/flags/de.png')); ?>" alt=""> German</a></li>
                  <li><a href="<?php echo e(url('language/hi')); ?>"><img src="<?php echo e(asset('ev-assets/backend/img/flags/hi.png')); ?>" width='18' height='13' alt=""> Hindi</a></li>
                  <li><a href="<?php echo e(url('language/id')); ?>"><img src="<?php echo e(asset('ev-assets/backend/img/flags/id.png')); ?>" width='18' height='13' alt=""> Indonesian</a></li>
                  <li><a href="<?php echo e(url('language/it')); ?>"><img src="<?php echo e(asset('ev-assets/backend/img/flags/it.png')); ?>" width='18' height='13' alt=""> Italian</a></li>
                  <li><a href="<?php echo e(url('language/ro')); ?>"><img src="<?php echo e(asset('ev-assets/backend/img/flags/ro.png')); ?>" width='18' height='13' alt=""> Romanian</a></li>
                  <li><a href="<?php echo e(url('language/ru')); ?>"><img src="<?php echo e(asset('ev-assets/backend/img/flags/ru.png')); ?>" alt=""> Russian</a></li>
                  <li><a href="<?php echo e(url('language/es')); ?>"><img src="<?php echo e(asset('ev-assets/backend/img/flags/es.png')); ?>" alt=""> Spanish</a></li>
                  <li><a href="<?php echo e(url('language/th')); ?>"><img src="<?php echo e(asset('ev-assets/backend/img/flags/th.png')); ?>" width='18' height='13' alt=""> Thai</a></li>
                  <li><a href="<?php echo e(url('language/tk')); ?>"><img src="<?php echo e(asset('ev-assets/backend/img/flags/tk.png')); ?>" width='18' height='13' alt=""> Turkish</a></li>
              </ul>
          </li>
        <?php endif; ?>
        <!-- /.dropdown -->
        <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> 
        <?php if(auth()->user()->role != 'parent'): ?>
        <img src="<?php echo e(asset('ev-assets/uploads/avatars/'.$authe->image)); ?>" alt="user-img" width="36" class="img-circle">
        <?php endif; ?>
        <b class="hidden-xs" style="color:#222D32"><?php echo e(Auth::user()->name); ?></b> </a>
          <ul class="dropdown-menu dropdown-user log-menu">
            <li><a href="<?php echo e(url('profile/'.$authe->id)); ?>"><i class="fa fa-user"></i> <?php echo e(trans('topbar_menu_lang.profile')); ?></a></li>
            <?php if(Auth::user()->role == 'admin'): ?>
              <li><a href="<?php echo e(url('general_settings')); ?>"><i class="fa fa-gear"></i> <?php echo e(trans('topbar_menu_lang.menu_setting')); ?></a></li>
            <?php endif; ?>
            <li><a href="<?php echo e(url('noticeboard/noticeboard_list')); ?>"><i class="fa fa-bullhorn"></i> <?php echo e(trans('topbar_menu_lang.menu_notice')); ?></a></li>
            <li role="separator" class="divider"></li>
            <li class="dub"><a href="<?php echo e(url('logout')); ?>" class="btn btn-success" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> <?php echo e(trans('topbar_menu_lang.logout')); ?>

                                                     <form id="logout-form" action="<?php echo e(url('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                  </a>
            </li>
          </ul>
          <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
      </ul>
    </div>
  </nav>


<?php echo $__env->make('layouts.site_menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="site-min-height">
        <?php echo $__env->yieldContent('content'); ?> 
        </div>
    </div>
    <!-- /.container-fluid -->
    <footer class="footer" id='ev-footer'>Copyright &copy; <?php echo date('Y');?> <a href="http://thetechnoknowledge.com">TechnoKnowledge</a>.</footer>
  </div>
</div>
<div class="preloader">
  <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
  </svg>
</div>
<!-- /#wrapper -->
    
<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#example1').dataTable();
  });
</script>


<!-- Bootstrap Core JavaScript -->

<script src="<?php echo e(asset('ev-assets/backend/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('ev-assets/backend/js/other.js')); ?>"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo e(asset('ev-assets/backend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')); ?>"></script>
<!--slimscroll JavaScript -->
<script src="<?php echo e(asset('ev-assets/backend/js/jquery.slimscroll.js')); ?>"></script>
<!--Wave Effects -->
<script src="<?php echo e(asset('ev-assets/backend/js/waves.js')); ?>"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo e(asset('ev-assets/backend/js/custom.min.js')); ?>"></script>
<!--Style Switcher -->
<script src="<?php echo e(asset('ev-assets/backend/plugins/bower_components/Circular-Countdown/circular-countdown.js')); ?>"></script>


<?php echo $__env->yieldContent('page-js'); ?>
<script src="<?php echo e(asset('ev-assets/backend/plugins/bower_components/toastr/toastr.min.js')); ?>"></script>
<script src="<?php echo e(asset('ev-assets/backend/js/toastr.script.js')); ?>"></script>
<?php if(Session::has('error')): ?>  
<script>
    toastr.info('<?php echo e(Session::get('error')); ?>')
</script>
<?php endif; ?>
<?php if(Session::has('success')): ?>  
<script>
    toastr.success('<?php echo e(Session::get('success')); ?>')
</script>
<?php endif; ?>
  <script type="text/javascript">
    $(document).ready(function() { 
      $(window).load(function() { 

        if ($(location).attr('href') != "<?php echo url('dashboard'); ?>") {
          $("#dashActive").removeClass("active");
        }
        if ($(location).attr('href') != "<?php echo url('dashboard'); ?>") {
          $("#dashActive").removeClass("active");
        }
        if ($(location).attr('href') != "<?php echo url('dashboard'); ?>") {
          $("#dashActive").removeClass("active");
        }
        if ($(location).attr('href') != "<?php echo url('dashboard'); ?>") {
          $("#dashActive").removeClass("active");
        }
        $('form#permission-form').submit(function () {
            $(this).find('input[type="checkbox"]').each( function () {
                var checkbox = $(this);
                if( checkbox.is(':checked')) {
                    checkbox.attr('value','1');
                } else {
                    checkbox.after().append(checkbox.clone().attr({type:'hidden', value:0}));
                    checkbox.prop('disabled', true);
                }
            })
        });
      });
    });
    
  </script>
  
</body>

</html>

