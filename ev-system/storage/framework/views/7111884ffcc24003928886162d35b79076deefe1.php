<?php $__env->startSection('title'); ?>
Test Starts
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
.timer{float: right;}
.istime{color: red;font-size: 25px}
.jst-hours {
  float: left;
}
.jst-minutes {
  float: left;
}
.jst-seconds {
  float: left;
}
.jst-clearDiv {
  clear: both;
}
.jst-timeout {
  color: red;
}
.more .radio-inline {display: block;margin: 10px}
</style>
<body onload="lll()">

            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-home"></i><?php echo e(trans('dashboard_lang.panel_title')); ?></a></li>
                          <li class="active">Test Starts</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Test Start
                          </header>
                          <header class="panel-heading">
                          <div style="float:left;">
                          <div class="timer" id="tim"></div>
                        </div>
                        </header>
                          <div class="well">
                            <form method="POST" action="<?php echo e(url('student/test/store')); ?>" id="form_id">
                              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                              <input type="hidden" name="student_id" value="<?php echo e(Auth::user()->id); ?>">
                              <input type="hidden" name="test_id" value="<?php echo e($id); ?>">
                            <div class="tab-content">
                             <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div id="menu<?php echo e($tq->id); ?>" class="tab-pane fade in <?php if(($key+1) == '1'): ?> active <?php endif; ?>">
                                <h3>Question <?php echo e($key+1); ?></h3>
                                <p><?php echo e($tq->question); ?></p>
                                <br>
                                <?php if($tq->type == 'options'): ?>
                                  <?php
                                      $uniqueString = str_random(10);
                                      $getoptions = App\TestOption::where('question_id', $tq->id)->get();
                                  ?>
                                  <input type="hidden" name="id[]" value="<?php echo e($uniqueString); ?>">
                                  <input type="hidden" name="type[<?php echo e($uniqueString); ?>]" value="options">
                                  <div class="radio-list more">
                                    <?php $__currentLoopData = $getoptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx =>  $go): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="radio-inline">
                                      <input type="radio" name="option[<?php echo e($uniqueString); ?>][]" value="<?php echo e($idx); ?>"><?php echo e($idx+1); ?>. <?php echo e($go->option); ?>

                                    </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </div>
                                <?php elseif($tq->type == 'fillword'): ?>
                                  <?php
                                      $uniqueString = str_random(10);
                                  ?>
                                  <input type="hidden" name="id[]" value="<?php echo e($uniqueString); ?>">
                                  <input type="hidden" name="type[<?php echo e($uniqueString); ?>]" value="fillword">
                                  <?php for($i = 0; $i < $tq->options; $i++): ?>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <input type="text" name="option[<?php echo e($uniqueString); ?>][]" class="form-control" placeholder="Answer" >
                                      </div>
                                    </div>
                                    <br>
                                  <?php endfor; ?>
                                <?php elseif($tq->type == 'yesno'): ?>
                                  <?php
                                      $uniqueString = str_random(10);
                                  ?>
                                  <input type="hidden" name="id[]" value="<?php echo e($uniqueString); ?>">
                                  <input type="hidden" name="type[<?php echo e($uniqueString); ?>]" value="yesno">
                                  <div class="radio-list more">
                                    <label class="radio-inline">
                                      <input type="radio" name="option[<?php echo e($uniqueString); ?>][]" value="0"> Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="option[<?php echo e($uniqueString); ?>][]" value="1"> No
                                    </label>
                                  </div>
                                <?php elseif($tq->type == 'short'): ?>
                                  <?php
                                      $uniqueString = str_random(10);
                                  ?>
                                  <input type="hidden" name="id[]" value="<?php echo e($uniqueString); ?>">
                                  <input type="hidden" name="type[<?php echo e($uniqueString); ?>]" value="short">
                                  <?php for($i = 0; $i < $tq->options; $i++): ?>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <input type="text" name="option[<?php echo e($uniqueString); ?>][]" class="form-control" placeholder="Answer" >
                                      </div>
                                    </div>
                                    <br>
                                  <?php endfor; ?>
                                <?php elseif($tq->type == 'file'): ?>
                                  <div>
                                    <?php
                                        $uniqueString = str_random(10);
                                        $link = strtolower('ev-assets/uploads/test-files/'. $tq->file);
                                        $link2 = 'ev-assets/uploads/test-files/'. $tq->file;
                                        $extensions = array("gif", "jpg", "png", "jpeg", "png", "tiff", "tif");
                                        $urlExt = pathinfo($link, PATHINFO_EXTENSION);
                                    ?>
                                  <input type="hidden" name="id[]" value="<?php echo e($uniqueString); ?>">
                                  <input type="hidden" name="type[<?php echo e($uniqueString); ?>]" value="file">
                                    <?php if($tq->file): ?>
                                      <?php if(in_array($urlExt, $extensions)): ?>
                                        <div>
                                            <img src="<?php echo e(url($link2)); ?>" style="max-width:50%">
                                        </div>
                                        <br>
                                      <?php else: ?> 
                                        <a href="<?php echo e(url($link2)); ?>" class="btn btn-primary">
                                          Download attached file
                                        </a>
                                        <br>
                                      <?php endif; ?>
                                      <div>
                                        <div class="row">
                                          <div class="col-md-4">
                                            <textarea name="option[<?php echo e($uniqueString); ?>][]"  class="form-control" placeholder="Answer"></textarea>
                                          </div>
                                        </div>
                                      </div>
                                    <?php endif; ?>
                                  </div>
                                <?php endif; ?>
                              </div>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <ul class="pagination">
                              <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="<?php if(($key+1) == '1'): ?> active <?php endif; ?>"><a data-toggle="pill" href="#menu<?php echo e($value->id); ?>"><?php echo e($key+1); ?></a></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <!-- Modal -->
                              <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Submit Test</h4>
                                    </div>
                                    <div class="modal-body">
                                      <p>Are you sure you want to submit?</p>
                                    </div>
                                    <div class="modal-footer">
                                      
                                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                      <input type="submit" class="btn btn-primary" value="Yes" style="float:right;">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- Modal -->
                              
                              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"style="">Submit Exam</button>
                            </form>
                            <p style="font-size:9px;color:red"><i>Note: Submit test before the time is up!!!</i></p>

                          </div>
                      </section>
                  </div>
              </div>
               
<script type="text/javascript" src="https://cdn.rawgit.com/sygmaa/CircularCountDownJs/master/circular-countdown.min.js"></script>
<script>
function lll (argument) {
  $('.timer').circularCountDown({
          duration: {
              seconds: <?php echo e($test->duration ? $test->duration * 60 : 60); ?>

          
          },
      end: function(){
        alert('time up!!!!!!!!!!!!!!!');
        $('#form_id').submit();
      }
        });

/**/  
}    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>