<?php $__env->startSection('title'); ?>
Mark Tests
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-home"></i> <?php echo e(trans('dashboard_lang.panel_title')); ?></a></li>
                <li class="active">Mark Test</li>
            </ul>
            <!--breadcrumbs end -->
        </div>
    </div>
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Mark Test
                </header>
                <div class="panel-body">
                    <?php echo Form::open(array('url'=>'mark-test-question','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)); ?>

                    <div class="row">
                        <div class="col-md-6" id="printTop">
                            <div class="form-group">
                                <div class="row">
                                    <label  class="col-lg-2 control-label" style="margin-top:5px">Select Test</label>
                                    <div class="col-lg-9">
                                        <select name="test_id" class="form-control">
                                            <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($test->id); ?>" <?php if(isset($test_id) && $test_id == $test->id): ?> selected <?php endif; ?>><?php echo e($test->name); ?>: <?php echo e(App\Subject::find($test->subject_id) ? App\Subject::find($test->subject_id)->title: ''); ?> -- <?php echo e(App\Classes::find($test->class_id) ? App\Classes::find($test->class_id)->title : ''); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label"></label>
                                <div class="col-lg-9">
                                    <?php echo Form::submit('Submit', array('class'=>'btn btn-primary')); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
                <?php if(isset($results)): ?>
                    <?php if($results->count() > 0): ?>
                    <hr />
                        <div id="hide-table">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        <th>Subject</th>
                                        <th>Class</th>
                                        <th>Status</th>
                                        <th>Score</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td data-title="#"><a href="#"><?php echo e($key+1); ?></a></td>
                                            <td data-title="Student Name"><?php echo e(App\User::find($result->student_id) ? App\User::find($result->student_id)->name : ""); ?></td>
                                            <?php
                                                $getTest = App\Test::find($result->test_id);
                                            ?>
                                            <td data-title="Subject"><?php echo e($getTest && App\Subject::find($getTest->subject_id) ? App\Subject::find($getTest->subject_id)->title : ''); ?></td>
                                            <td data-title="Class"><?php echo e($getTest && App\Classes::find($getTest->class_id) ? App\Classes::find($getTest->class_id)->title : ''); ?></td>
                                            <td data-title="Status">
                                                <?php if($result->status == 1): ?>
                                                    <button class="btn btn-success btn-xs"></i>Marked</button>
                                                <?php else: ?>
                                                    <button class="btn btn-warning btn-xs"></i>Pending</button>
                                                <?php endif; ?>
                                            </td>
                                            <td data-title="Score"><?php echo e($result->score); ?></td>
                                            <td data-title="Action">
                                                <a href="<?php echo e(url('test/mark-test/'.$result->id)); ?>">
                                                    <button class="btn btn-primary btn-xs"><i class="fa fa-check"></i> Mark test</button>
                                                </a>
                                                <?php if($result->score): ?>
                                                <a href="<?php echo e(url('test/review-result/'.$result->id)); ?>">
                                                    <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Review result</button>
                                                </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div style="padding:10px">
                            <h1>No test result found</h1>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </section>
        </div>
    </div>
               
<script type="text/javascript">

function get_class_subjects(class_id) {

    $.ajax({
        url: '<?php echo e(url('')); ?>/get_class_subjects/' + class_id ,
        success: function(response)
        {
            jQuery('#section_selector_holder').html(response);
        }
    });
    
} 
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>