<?php $__env->startSection('title'); ?>
Mark Tests
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
ol, ul {
    margin: 0;
    padding-left:15px
}
ul {
    list-style-type: none;
}
li {
    margin-bottom: 10px
}
.ml5{
    margin-left: 20px
}
</style>
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
                <?php echo Form::open(array('url'=>'mark-test-store','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)); ?>

                <input type="hidden" class="form-control" name="test_id" value="<?php echo e($testresult->test_id); ?>">
                <input type="hidden" class="form-control" name="student_id" value="<?php echo e($testresult->student_id); ?>">
                <div id="hide-table">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Point</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $uniqueString = str_random(10);
                                ?>
                                <tr>
                                    <td data-title="#"><a href="#"><?php echo e($key+1); ?></a></td>
                                    <td data-title="Question">
                                        <?php echo e($question->question); ?>


                                        <hr>
                                        <div>
                                            <?php if($question->type == 'options'): ?>
                                                <?php
                                                    $getoptions = App\TestOption::where('question_id', $question->id)->get();
                                                ?>
                                                <div class="radio-list more">
                                                    <?php $__currentLoopData = $getoptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx =>  $go): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="option[<?php echo e($uniqueString); ?>][]" value="<?php echo e($idx); ?>"><?php echo e($idx+1); ?>. <?php echo e($go->option); ?>

                                                    </label>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php elseif($question->type == 'yesno'): ?>
                                                <div class="radio-list more">
                                                    <label class="radio-inline">
                                                    <input type="radio"  name="option[<?php echo e($uniqueString); ?>][]" value="0"> Yes
                                                    </label>
                                                    <label class="radio-inline">
                                                    <input type="radio" name="option[<?php echo e($uniqueString); ?>][]" value="1"> No
                                                    </label>
                                                </div>
                                            <?php elseif($question->type == 'file'): ?>
                                                <div>
                                                    <?php
                                                        $link = strtolower('ev-assets/uploads/test-files/'. $question->file);
                                                        $link2 = 'ev-assets/uploads/test-files/'. $question->file;
                                                        $extensions = array("gif", "jpg", "png", "jpeg", "png", "tiff", "tif");
                                                        $urlExt = pathinfo($link, PATHINFO_EXTENSION);
                                                    ?>
                                                    <?php if($question->file): ?>
                                                        <?php if(in_array($urlExt, $extensions)): ?>
                                                            <div>
                                                                <img src="<?php echo e(url($link2)); ?>" style="max-width:400px">
                                                            </div>
                                                            <br>
                                                        <?php else: ?> 
                                                            <a href="<?php echo e(url($link2)); ?>" class="btn btn-primary">
                                                            Download attached file
                                                            </a>
                                                            <br>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td data-title="Answer">
                                        <?php if(isset($answers[$key])): ?>
                                            <?php if($question->type == 'options'): ?>
                                                <?php if(isset($answers[$key][0])): ?>
                                                    <?php if(isset($question->options[$answers[$key][0]])): ?>
                                                        <?php echo e($question->options[$answers[$key][0]]->option); ?>

                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php elseif($question->type == 'fillword' || $question->type == 'short'): ?>
                                                <ol>
                                                    <?php for($i = 0; $i < count($answers[$key]); $i++): ?>
                                                        <?php if(isset($answers[$key][$i])): ?>
                                                            <li>
                                                                <?php echo e($answers[$key][$i]); ?>

                                                            </li>
                                                        <?php endif; ?>
                                                        <br>
                                                    <?php endfor; ?>
                                                </ol>
                                            <?php elseif($question->type == 'yesno'): ?>
                                                <?php if(isset($answers[$key][0])): ?>
                                                    <?php if($answers[$key][0] == 0): ?>
                                                        Yes
                                                    <?php else: ?>
                                                        No
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php elseif($question->type == 'file'): ?>
                                                <?php if($answers[$key][0]): ?>
                                                    <?php echo e($answers[$key][0]); ?>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td data-title="Point">
                                        <input type="text" name="point[]" value="<?php echo e($question->point); ?>" class="form-control">
                                    </td>
                                    <td data-title="Action">
                                        <ul>
                                            <li>
                                                <label class="radio-inline">
                                                    <input type="radio"  name="action[<?php echo e($key); ?>][]" value="0" required> Correct
                                                </label>
                                            </li>
                                            <li>
                                                <label class="radio-inline">
                                                    <input type="radio" name="action[<?php echo e($key); ?>][]" value="1" required> Incorrect
                                                </label>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <button class="ml5 btn btn-primary">Submit Mark</button>
                </div>
                <?php echo Form::close(); ?>

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