<?php $__env->startSection('title'); ?>
<?php echo e(trans('subject_lang.panel_title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-home"></i> <?php echo e(trans('dashboard_lang.panel_title')); ?></a></li>
                          <li class="active"><?php echo e(trans('subject_lang.panel_title')); ?></li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <?php echo e(trans('subject_lang.panel_title')); ?>

                          </header>
                          <div>
                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item active">
                                      <a class="nav-link" data-toggle="tab" href="#level1" role="tab" aria-selected="true">Level 1</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#level2" role="tab" aria-selected="true">Level 2</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#level3" role="tab" aria-selected="true">Level 3</a>
                                  </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade in active" id="level1" role="tabpanel">
                                      <div class="row">
                                        <?php $__currentLoopData = App\Test::where('class_id', auth()->user()->class_id)->where('status',1)->orderBy('created_at','desc')->where('category', '1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-3">
                                          <!-- small box -->
                                          <div class="test-grid">
                                            <div class="inner">
                                              <h2><?php echo e($test->name); ?></h2>
                                              <span class="badge badge-new"> Level: <?php echo e($test->category); ?> </span>
                                              <h4>Class: <?php echo e(App\Classes::find($test->class_id) ? App\Classes::find($test->class_id)->title : ''); ?></h4>
                                              <h5>Subject: <?php echo e($test->subject($test->subject_id) ? $test->subject($test->subject_id)->title : ''); ?></h5>
                                              <p>Duration: <?php echo e($test->duration); ?> minutes</p>
                                            </div>
                                            <a href="<?php echo e(url('student/start_test/'.$test->id)); ?>" class="small-box-footer">
                                              Start Test <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                          </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </div>
                                  </div>
                                  <div class="tab-pane fade in" id="level2" role="tabpanel">
                                      <div class="row">
                                        <?php $__currentLoopData = App\Test::where('class_id', auth()->user()->class_id)->where('status',1)->orderBy('created_at','desc')->where('category', '2')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-3">
                                          <!-- small box -->
                                          <div class="test-grid">
                                            <div class="inner">
                                              <h2><?php echo e($test->name); ?></h2>
                                              <span class="badge badge-new"> Level: <?php echo e($test->category); ?> </span>
                                              <h4>Class: <?php echo e(App\Classes::find($test->class_id) ? App\Classes::find($test->class_id)->title : ''); ?></h4>
                                              <h5>Subject: <?php echo e($test->subject($test->subject_id) ? $test->subject($test->subject_id)->title : ''); ?></h5>
                                              <p>Duration: <?php echo e($test->duration); ?> minutes</p>
                                            </div>
                                            <a href="<?php echo e(url('student/start_test/'.$test->id)); ?>" class="small-box-footer">
                                              Start Test <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                          </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </div>
                                  </div>

                                  <div class="tab-pane fade in" id="level3" role="tabpanel">
                                      <div class="row">
                                        <?php $__currentLoopData = App\Test::where('class_id', auth()->user()->class_id)->where('status',1)->orderBy('created_at','desc')->where('category', '3')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-3">
                                          <!-- small box -->
                                          <div class="test-grid">
                                            <div class="inner">
                                              <h2><?php echo e($test->name); ?></h2>
                                              <span class="badge badge-new"> Level: <?php echo e($test->category); ?> </span>
                                              <h4>Class: <?php echo e(App\Classes::find($test->class_id) ? App\Classes::find($test->class_id)->title : ''); ?></h4>
                                              <h5>Subject: <?php echo e($test->subject($test->subject_id) ? $test->subject($test->subject_id)->title : ''); ?></h5>
                                              <p>Duration: <?php echo e($test->duration); ?> minutes</p>
                                            </div>
                                            <a href="<?php echo e(url('student/start_test/'.$test->id)); ?>" class="small-box-footer">
                                              Start Test <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                          </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          
                          
                      </section>
                  </div>
              </div>
               

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>