<?php $__env->startSection('title'); ?>
<?php echo e(trans('subject_lang.panel_title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 
    <div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-home"></i><?php echo e(trans('dashboard_lang.panel_title')); ?></a></li>
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
                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Test Title</th>
                            <th>Test Name</th>
                            <th>Status</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-title="#"><?php echo e($key+1); ?></td>
                                <td data-title="Test Title"><?php echo e($res->test_id($res->test_id)); ?></td>
                                <td data-title="Test Name"><?php echo e(App\Test::find($res->test_id) ? App\Test::find($res->test_id)->name : ''); ?></td>
                                <td data-title="Status">
                                    <?php if($res->status == 1): ?>
                                        <button class="btn btn-success btn-xs"></i>Marked</button>
                                    <?php else: ?>
                                        <button class="btn btn-warning btn-xs"></i>Pending</button>
                                    <?php endif; ?>
                                </td>
                                <td data-title="Score"><?php echo e($res->score); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $results->render(); ?>

                    </tbody>
                </table>
            </section>
        </div>
    </div>
               

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>