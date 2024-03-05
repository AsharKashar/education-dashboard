<?php $__env->startSection('title'); ?>
<?php echo e(trans('other.tests_library')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-home"></i><?php echo e(trans('dashboard_lang.panel_title')); ?></a></li>
                <li class="active"><?php echo e(trans('other.tests_library')); ?></li>
            </ul>
            <!--breadcrumbs end -->
        </div>
    </div>
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <a class="btn btn-success" href="<?php echo e(url('create-test')); ?>" style="margin:5px">
                        <?php echo e(trans('other.add_test')); ?>

                    </a>
                </header>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="tab" href="#allTests" role="tab" aria-selected="true"><?php echo e(trans('other.all_tests')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#myTests" role="tab" aria-selected="true"><?php echo e(trans('other.my_tests')); ?></a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade in active" id="allTests" role="tabpanel">
                        <div id="hide-table">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(trans('other.test_name')); ?></th>
                                        <th><?php echo e(trans('other.subject')); ?></th>
                                        <th><?php echo e(trans('other.grade')); ?></th>
                                        <th><?php echo e(trans('other.duration')); ?></th>
                                        <th><?php echo e(trans('other.can_redo_test')); ?></th>
                                        <th><?php echo e(trans('other.test_questions')); ?></th>
                                        <th><?php echo e(trans('other.date_created')); ?></th>
                                        <th><?php echo e(trans('other.status')); ?></th>
                                        <th><?php echo e(trans('other.category')); ?></th>
                                        <th><?php echo e(trans('student_lang.action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
        
                                    <?php $__currentLoopData = $alltests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td data-title="#"><a href="#"><?php echo e($key+1); ?></a></td>
                                            <td data-title="<?php echo e(trans('other.test_name')); ?>"> <?php echo e($test->name); ?> </td>
                                            <td data-title="<?php echo e(trans('other.subject')); ?>"><?php echo e($test->subject($test->subject_id)->title); ?></td>
                                            <td data-title="<?php echo e(trans('other.grade')); ?>"><?php echo e(App\Classes::find($test->class_id) ? App\Classes::find($test->class_id)->title : ''); ?></td>
                                            <td data-title="<?php echo e(trans('other.duration')); ?>"><?php echo e($test->duration); ?> minutes</td>
                                            <td data-title="<?php echo e(trans('other.can_redo_test')); ?>"><?php echo e($test->check_redo($test->redo)); ?></td>
                                            <td data-title="<?php echo e(trans('other.test_questions')); ?>">
                                                <?php
                                                    $getQuestion = App\TestQuestion::where('test_id', $test->id)->get();
                                                ?>
                                                <?php echo e($getQuestion->count()); ?>

                                            </td>
                                            <td data-title="<?php echo e(trans('other.date_created')); ?>"><?php echo e($test->created_at->format('d, M Y')); ?></td>
                                            <td data-title="<?php echo e(trans('other.status')); ?>">
                                                <?php if($test->status == 1): ?><span class="badge badge-success"> Enabled </span> <?php elseif($test->status == 2): ?><span class="badge badge-warning"> Pending </span> <?php else: ?> <span class="badge badge-danger"> Disabled </span> <?php endif; ?>
                                            </td>
                                            <td data-title="<?php echo e(trans('other.category')); ?>">Level: <?php echo e($test->category); ?></td>
                                            <td data-title="<?php echo e(trans('student_lang.action')); ?>">
                                                <a class="active" href="<?php echo e(url('edit-test/'.$test->id)); ?>">
                                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                </a>
                                                <a class="active"  data-toggle="modal" href="#myModaldel<?php echo e($test->id); ?>">
                                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                                </a>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="myModaldel<?php echo e($test->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                                <a href="<?php echo e(url('test/delete/'.$test->id)); ?>">
                                                                <button class="btn btn-danger"><?php echo e(trans('student_lang.delete')); ?></button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- modal -->
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="myTests" role="tabpanel">
                        <div id="hide-table">
                            <table id="exampletab" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(trans('other.test_name')); ?></th>
                                        <th><?php echo e(trans('other.subject')); ?></th>
                                        <th><?php echo e(trans('other.grade')); ?></th>
                                        <th><?php echo e(trans('other.duration')); ?></th>
                                        <th><?php echo e(trans('other.can_redo_test')); ?></th>
                                        <th><?php echo e(trans('other.test_questions')); ?></th>
                                        <th><?php echo e(trans('other.date_created')); ?></th>
                                        <th><?php echo e(trans('other.status')); ?></th>
                                        <th><?php echo e(trans('other.category')); ?></th>
                                        <th><?php echo e(trans('student_lang.action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
        
                                    <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td data-title="#"><a href="#"><?php echo e($key+1); ?></a></td>
                                            <td data-title="<?php echo e(trans('other.test_name')); ?>"> <?php echo e($test->name); ?> </td>
                                            <td data-title="<?php echo e(trans('other.subject')); ?>"><?php echo e($test->subject($test->subject_id)->title); ?></td>
                                            <td data-title="<?php echo e(trans('other.grade')); ?>"><?php echo e(App\Classes::find($test->class_id) ? App\Classes::find($test->class_id)->title : ''); ?></td>
                                            <td data-title="<?php echo e(trans('other.duration')); ?>"><?php echo e($test->duration); ?> minutes</td>
                                            <td data-title="<?php echo e(trans('other.can_redo_test')); ?>"><?php echo e($test->check_redo($test->redo)); ?></td>
                                            <td data-title="<?php echo e(trans('other.test_questions')); ?>">
                                                <?php
                                                    $getQuestion = App\TestQuestion::where('test_id', $test->id)->get();
                                                ?>
                                                <?php echo e($getQuestion->count()); ?>

                                            </td>
                                            <td data-title="<?php echo e(trans('other.date_created')); ?>"><?php echo e($test->created_at->format('d, M Y')); ?></td>
                                            <td data-title="<?php echo e(trans('other.status')); ?>">
                                                <?php if($test->status == 1): ?><span class="badge badge-success"> Enabled </span> <?php elseif($test->status == 2): ?><span class="badge badge-warning"> Pending </span> <?php else: ?> <span class="badge badge-danger"> Disabled </span> <?php endif; ?>
                                            </td>
                                            <td data-title="<?php echo e(trans('other.category')); ?>">Level: <?php echo e($test->category); ?></td>
                                            <td data-title="<?php echo e(trans('student_lang.action')); ?>">
                                                <a class="active" href="<?php echo e(url('edit-test/'.$test->id)); ?>">
                                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                </a>
                                                <a class="active"  data-toggle="modal" href="#myModaldel<?php echo e($test->id); ?>">
                                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                                </a>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="myModaldel<?php echo e($test->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                                <a href="<?php echo e(url('test/delete/'.$test->id)); ?>">
                                                                <button class="btn btn-danger"><?php echo e(trans('student_lang.delete')); ?></button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- modal -->
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                
            </section>
        </div>
    </div>
               
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#exampletab').dataTable();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>