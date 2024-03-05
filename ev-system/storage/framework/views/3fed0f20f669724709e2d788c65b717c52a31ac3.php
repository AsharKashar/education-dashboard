<?php $__env->startSection('title'); ?>
Profile
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php 
      //determines the authenticated user
      $authe = Auth::user();
    ?>
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-home"></i><?php echo e(trans('dashboard_lang.panel_title')); ?></a></li>
                          <li class="active">Admin Profile</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <aside class="profile-nav col-lg-5">
                      <section class="panel">
                          <div class="user-heading round">
                            <?php if(auth()->user()->role != 'parent'): ?>
                              <a href="#">
                                  <img src="<?php echo e(asset('ev-assets/uploads/avatars/'.$authe->image)); ?>" alt="">
                              </a>
                              <?php endif; ?>
                              <h1><?php echo e(Auth::user()->name); ?></h1>
                              <p><?php echo e(Auth::user()->email); ?></p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="<?php echo e(url('editprofile/'.$authe->id)); ?>"> <i class="fa fa-user"></i> Profile</a></li>
                              <li><a href="<?php echo e(url('editprofile/'.$authe->id)); ?>"> <i class="fa fa-edit"></i> Edit profile</a></li>
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-7">
                      <section class="panel">
                          <div class="bio-graph-heading">
                              <?php echo e(App\School::find(Auth::user()->school_id)->name); ?>

                              <p>Academic Session: (<?php echo e(App\AcademicSession::where('current', 1)->first()->name); ?>)</p>
                          </div>
                          <div class="panel-body bio-graph-info">
                              <h1>Bio Graph</h1>
                              <div class="row">
                                  <div class="bio-row">
                                      <p><span>First Name </span>: <?php echo e(Auth::user()->name); ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Last Name </span>: <?php echo e(Auth::user()->name); ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Email </span>: <?php echo e(Auth::user()->email); ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Role </span>: <?php echo e(Auth::user()->role); ?></p>
                                  </div>
                              </div>
                          </div>
                      </section>
                      
                  </aside>
              </div>
              <?php if(Auth::user()->permission('is_student')): ?>
               <div class="white-box" style="display:none">
                    <header class="panel-heading">
                              <h3><?php echo e(Auth::user()->name); ?>'s <?php echo e(trans('topbar_menu_lang.menu_attendance')); ?> (<?php echo e(date('M')); ?>)</h3>
                          </header>
                  <table class="table table-striped table-advance table-hover"> 
                              <thead>
                              <tr>
                              <?php
                              if ((int)date('m') == 9 && (int)date('m') == 4 && (int)date('m') == 6 && (int)date('m') == 11) {
                                $sp = 30;
                              }
                              elseif ((int)date('m') == 2) {
                                if (((int)date('Y') % 4) == 0) {
                                  $sp = 29;
                                }
                                else {
                                  $sp = 28;
                                }
                              }
                              else{
                                $sp = 31;
                              }
                              for ($day=1; $day <= $sp; $day++) { ?>

                                  <th class="<?php if($day == (int)date('d')): ?> des <?php endif; ?>"><?php echo e($day); ?></th>
                                  <?php 
                              }?>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                              <?php
                              for ($day=1; $day <= $sp; $day++) { 
                                $date = (int)date('Y').'-'.(int)date('m').'-'.$day;
                              ?>
                              <?php 
                                $getattc = App\Attendance::where('date',$date)->where('student_id',Auth::user()->id)->where('status',1)->count();
                                $getattd = App\Attendance::where('date',$date)->where('student_id',Auth::user()->id)->where('status',0)->count();
                                ?>
                                  <td data-title=""><?php if($getattc > 0): ?> P <?php elseif($getattd > 0): ?> A <?php else: ?> <?php endif; ?></td>
                                  <?php }?>
                              </tr>
                              </tbody>
                          </table>
                  </div>
                <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>