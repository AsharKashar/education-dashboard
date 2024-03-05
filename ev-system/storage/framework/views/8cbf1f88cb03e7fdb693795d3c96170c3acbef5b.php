<?php
$settings = App\Settings::find(1);
?>

  <div id="ev-side" style="z-index:1">
    <!-- Left navbar-header -->
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="nav" id="side-menu">
        <li>
             <p class="hide-menu menu-top-title">Academic Session: (<?php echo e(App\AcademicSession::where('current', 1)->first()->name); ?>)</p>
        </li>
        <li>
          <a href="<?php echo e(url('dashboard')); ?>" class="waves-effect" id="dashActive">
            <i class="fa fa-dashboard"></i> <span class="hide-menu"><?php echo e(trans('dashboard_lang.panel_title')); ?></span>
          </a>
        </li>
        <?php if(Auth::user()->permission('is_admin') && Auth::user()->admin_type == 'super'  && Auth::user()->admin_type != 'school'): ?>
            
            
        <?php endif; ?>
        
        <?php if((Auth::user()->permission('is_admin') || Auth::user()->permission('is_teacher')) && Auth::user()->admin_type != 'school'): ?>
            <li class="waves-effect">
                    <a href="#">
                        <i class="fa fa-suitcase"></i> <span class="hide-menu"><?php echo e(trans('other.academics')); ?><span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <?php if(Auth::user()->permission('is_admin')): ?>
                            <li><a href="<?php echo e(url('terms')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  Terms</a></li>
                            <li><a href="<?php echo e(url('sessions')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  Academic Sessions</a></li>
                        <?php endif; ?>
                        <?php if(Auth::user()->permission('is_admin') || Auth::user()->permission('is_teacher')): ?>
                            <li><a href="<?php echo e(url('student-promotion')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  Student Promotion</a></li>
                        <?php endif; ?>
                    </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_students')): ?>
            <li class="waves-effect">
                <a href="#">
                    <i class="zmdi zmdi-male-female"></i> <span class="hide-menu"><?php echo e(trans('other.student')); ?><span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(url('students/create_student')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  <?php echo e(trans('student_lang.add_title')); ?></a></li>
                    <li><a href="<?php echo e(url('students/create_bulk_student')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  <?php echo e(trans('student_lang.add_student')); ?> (<?php echo e(trans('mailandsms_lang.mailandsms_bulk')); ?>)</a></li> 
                    <li>
                    <a href="#"><i class="fa fa-caret-right"></i>  <?php echo e(trans('student_lang.student_all_students')); ?> <span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <?php $__currentLoopData = App\Classes::get_classes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url('classes/'.$classl->slug)); ?>"><i class="fa fa-caret-right"></i>  <?php echo e($classl->title); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('admission_enquiry')): ?>
             
        <?php endif; ?>
        <?php if(Auth::user()->permission('is_admin') || Auth::user()->role == 'teacher'): ?>
            
        <?php endif; ?>
        <?php if(Auth::user()->permission('is_admin') && Auth::user()->admin_type == 'super'): ?>
            <li class="waves-effect">
                <a href="#">
                    <i class="fa fa-building-o"></i> <span class="hide-menu"> <?php echo e(trans('other.schools')); ?><span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(url('schools')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  <?php echo e(trans('others.all_schools')); ?> </a></li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role == 'teacher' || Auth::user()->role == 'admin'): ?>
            <li class="waves-effect">
                <a href="#">
                    <i class="fa fa-sitemap"></i> <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_classes')); ?><span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(url('class/class_list')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  <?php echo e(trans('topbar_menu_lang.menu_classes')); ?></a></li>
                    <li><a href="<?php echo e(url('class/spread-sheets')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  Spread Sheets</a></li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role == 'quality_assurance'): ?>
            <li class="waves-effect">
                <a href="#">
                    <i class="fa fa-sitemap"></i> <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_classes')); ?><span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(url('class/spread-sheets')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  Spread Sheets</a></li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_sections') && Auth::user()->admin_type != 'school'): ?>
             <li class="waves-effect">
                <a href="<?php echo e(url('class/section_list')); ?>" class="waves-effect">
                    <i class="fa fa-sort-amount-asc"></i>
                    <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_section')); ?> </span>
                </a>
            </li> 
        <?php endif; ?>
        <?php if(Auth::user()->role == 'admin' ||  Auth::user()->role == 'teacher'): ?>
            <li class="waves-effect">
                <a href="#">
                    <i class="fa fa-edit"></i>
                    <span class="hide-menu"><?php echo e(trans('other.online_test')); ?> <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <?php if(Auth::user()->admin_type == 'super'): ?>
                        <li><a href="<?php echo e(url('online_test')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> Main Tests Library</a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo e(url('my-test-library')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.tests_library')); ?></a></li>
                    <li><a href="<?php echo e(url('create-test')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  <?php echo e(trans('other.add_test')); ?></a></li>
                    <li><a href="<?php echo e(url('mark-test-question')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.mark_tests')); ?></a></li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_subjects') && Auth::user()->admin_type != 'school'): ?>
            <li class="waves-effect">
                <a href="#">
                    <i class="fa fa-lightbulb-o"></i>
                    <span class="hide-menu"><?php echo e(trans('other.subject')); ?><span class="fa arrow"></span> </span>
                </a>
                <ul class="nav nav-second-level">
                    <?php $__currentLoopData = App\Classes::get_classes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(url('subject/'.$classl->slug)); ?>"><i class="fa fa-caret-right"></i>  <?php echo e($classl->title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('is_student')): ?>
            <li class="waves-effect">
                <a href="<?php echo e(url('student/subject/'.$authe->class_id)); ?>">
                    <i class="fa fa-lightbulb-o"></i>
                    <span class="hide-menu"><?php echo e(trans('other.subject')); ?> </span>
                </a>
            </li>
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class=" fa fa-edit"></i>
                    <span class="hide-menu"><?php echo e(trans('other.online_test')); ?> <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a  href="<?php echo e(url('student/online_test')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> Start Test</a></li>
                    <li><a  href="<?php echo e(url('student/test_result/'.$authe->id)); ?>"><i class="fa fa-caret-right"></i> Test Result</a></li>
                </ul>
            </li>
            
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span class="hide-menu"><?php echo e(trans('other.mark_report_student')); ?> <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a  href="<?php echo e(url('student/ca-test-result/'.$authe->id)); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> Mid-Term Results</a></li>
                    <li><a  href="<?php echo e(url('student/exam-result/'.$authe->id)); ?>"><i class="fa fa-caret-right"></i> Exam Results</a></li>
                </ul>
            </li>

            
            <li class="waves-effect">
                <a href="<?php echo e(url('student/class/study_material')); ?>" class="waves-effect">
                    <i class="fa fa-tablet"></i>
                    <span class="hide-menu"><?php echo e(trans('other.study_material')); ?></span>
                </a>
            </li>
             
        <?php endif; ?>
        <?php if(Auth::user()->permission('is_teacher')): ?>
            <li class="waves-effect">
                <a href="<?php echo e(url('teacher/class/study_material')); ?>" class="waves-effect">
                    <i class="fa fa-suitcase"></i>
                    <span class="hide-menu"><?php echo e(trans('other.study_material')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('is_parent')): ?>
             <li class="waves-effect">
                <a href="javascript:;" >
                    <i class="fa fa-money"></i>
                    <span class="hide-menu"><?php echo e(trans('invoice_lang.panel_title')); ?> <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <?php $__currentLoopData = $studentli->where('parent_id',$authe->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url('parent/invoice/'.$classl->id)); ?>"><i class="fa fa-caret-right"></i> <?php echo e($classl->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li> 
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span class="hide-menu"><?php echo e(trans('other.mark_report_student')); ?> <span class="fa arrow"></span> </span>
                </a>
                <ul class="nav nav-second-level">
                    <?php $__currentLoopData = $studentli->where('parent_id',$authe->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url('parent/marks/'.$classl->id)); ?>"><i class="fa fa-caret-right"></i> <?php echo e($classl->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class="fa fa-calendar"></i>
                    <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_routine')); ?> <span class="fa arrow"></span> </span>
                </a>
                <ul class="nav nav-second-level">
                    <?php $__currentLoopData = $studentli->where('parent_id',$authe->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url('parent/routine/'.$classl->id)); ?>"><i class="fa fa-caret-right"></i> <?php echo e($classl->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('is_admin') && Auth::user()->admin_type != 'school'): ?>
        
        <?php endif; ?>
         
        <?php if(Auth::user()->permission('send_sms')): ?>
         
        <?php endif; ?>
        <?php if(Auth::user()->role !== 'quality_assurance'): ?>
        
                    
                
            
        
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_exams') && Auth::user()->admin_type != 'school'): ?>
         
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_marks')): ?>
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class=" fa fa-thumb-tack"></i>
                    <span class="hide-menu"><?php echo e(trans('other.mark_report_student')); ?> <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <?php $__currentLoopData = App\Classes::get_classes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="sub_menu"><a href="<?php echo e(url('marksheet/'.$classl->slug)); ?>"><i class="fa fa-caret-right"></i> <?php echo e($classl->title); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_invoice')): ?>
             
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_payment')): ?>
             
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_teachers')): ?>
            <li class="waves-effect">
                <a href="<?php echo e(url('teacher_list')); ?>" class="waves-effect">
                    <i class="zmdi zmdi-account"></i>
                    <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_teacher')); ?> </span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_employee')): ?>
             
        <?php endif; ?>
        <?php if(Auth::user()->permission('is_admin') && Auth::user()->admin_type == 'super'): ?>
            <li class="waves-effect">
                <a href="<?php echo e(url('admin_list')); ?>" class="waves-effect">
                    <i class="zmdi zmdi-account-o"></i>
                    <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.Admin')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('is_admin')): ?>
            
        <?php endif; ?>
        <?php if(Auth::user()->permission('take_attendance') && Auth::user()->admin_type != 'school'): ?>
            
        <?php endif; ?>
         
        <li class="waves-effect">
            <a href="<?php echo e(url('noticeboard/noticeboard_list')); ?>" class="waves-effect">
                <i class="fa fa-volume-up"></i>
                <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_notice')); ?> </span>
            </a>
        </li>
         
        <?php if(Auth::user()->permission('view_tools') && Auth::user()->admin_type == 'super'): ?>
            <li class="waves-effect">
                <a href="javascript:;">
                    <i class="fa fa-gavel"></i>
                    <span class="hide-menu"><?php echo e(trans('other.tools')); ?> <span class="fa arrow"></span></span>
                    
                </a>
                <ul class="nav nav-second-level">
                    <li><a  href="<?php echo e(url('system_backup')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.system_backup')); ?></a></li>
                    <li><a  href="<?php echo e(url('data_import')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.data_import')); ?></a></li>
                    <li><a  href="<?php echo e(url('task_manager')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.task_manager')); ?></a></li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_settings') && Auth::user()->admin_type == 'super'): ?>
            <li class="waves-effect">
                <a href="javascript:;">
                    <i class="fa fa-gears"></i>
                    <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_setting')); ?> <span class="fa arrow"></span> </span>
                    
                </a>
                <ul class="nav nav-second-level">
                    <li><a  href="<?php echo e(url('general_settings')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.general_settings')); ?></a></li>
                    <li><a  href="<?php echo e(url('school_settings')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.school_settings')); ?></a></li>
                    <li><a  href="<?php echo e(url('autobackup_settings')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.auto_backup_settings')); ?></a></li>
                </ul>
            </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
  </div>
  <!-- Left navbar-header end -->


