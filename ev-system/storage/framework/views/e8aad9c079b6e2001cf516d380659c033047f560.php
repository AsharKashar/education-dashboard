<?php $__env->startSection('title'); ?>
Edit Tests
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.teststyle', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="content-wrapper">
    <div class="edu-loading"></div>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-home"></i><?php echo e(trans('dashboard_lang.panel_title')); ?></a></li>
                    <li class="active">Edit Test</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <?php echo e(trans('other.online_test')); ?>

                    </header>
                    <?php echo Form::open(array('url'=>'test/update_test','id'=>'quiz-form','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)); ?>

                        <div class="container-fluid">
                        <input type="hidden" name="test_id" value="<?php echo e($test->id); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input type="text"  class="form-control" value="<?php echo e($test->name); ?>" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label"><?php echo e(trans('other.category')); ?></label>
                                    <div class="col-lg-9">
                                        <select name="category" class="form-control" required>
                                            <option value="1" <?php if($test->category == 1): ?> selected <?php endif; ?>><?php echo e(trans('other.level1')); ?></option>
                                            <option value="2" <?php if($test->category == 2): ?> selected <?php endif; ?>><?php echo e(trans('other.level2')); ?></option>
                                            <option value="3" <?php if($test->category == 3): ?> selected <?php endif; ?>><?php echo e(trans('other.level3')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label"><?php echo e(trans('other.can_redo_test')); ?>?</label>
                                    <div class="col-lg-9">
                                        <select name="redo" class="form-control" required>
                                            <option value="6" <?php if($test->redo == 6): ?> selected <?php endif; ?>>Anytime</option>
                                            <option value="1" <?php if($test->redo == 1): ?> selected <?php endif; ?>>One Time</option>
                                            <option value="2" <?php if($test->redo == 2): ?> selected <?php endif; ?>>Two Times</option>
                                            <option value="3" <?php if($test->redo == 3): ?> selected <?php endif; ?>>Three Times</option>
                                            <option value="4" <?php if($test->redo == 4): ?> selected <?php endif; ?>>Four Times</option>
                                            <option value="5" <?php if($test->redo == 5): ?> selected <?php endif; ?>>Five Times</option>
                                            <option value="0" <?php if($test->redo == 0): ?> selected <?php endif; ?>>Not Allowed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label"><?php echo e(trans('other.duration')); ?> (in minutes)</label>
                                    <div class="col-lg-9">
                                        <input type="number" min="0"  class="form-control" value="<?php echo e($test->duration); ?>" name="duration" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label"><?php echo e(trans('sattendance_lang.attendance_select_classes')); ?></label>
                                    <div class="col-lg-9">
                                        <select name="class_id" class="form-control" required  onchange="return get_class_subjects(this.value)">
                                            <option value="">Choose..</option>
                                            <?php $__currentLoopData = App\Classes::get_classes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($classl->id); ?>"   <?php if($test->class_id == $classl->id): ?> selected <?php endif; ?>><?php echo e($classl->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label"><?php echo e(trans('other.subject')); ?></label>
                                    <div class="col-lg-9">
                                        <select name="subject_id" id="subject_selector_holder" class="form-control" required>
                                            <?php
                                                if ($test->class_id) {
                                                    $subj = App\Subject::where('class_id',$test->class_id)->get();
                                                }
                                                else{
                                                    $subj = App\Subject::where('class_id',App\Classes::first()->id)->get();
                                                }
                                            ?>
                                            <?php if($subj): ?>
                                                <?php $__currentLoopData = $subj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($sub->id); ?>"  <?php if($test->subject_id == $sub->id): ?> selected <?php endif; ?>><?php echo e($sub->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <option>Select a class first</option>
                                            <?php endif; ?> 
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label"><?php echo e(trans('other.status')); ?></label>
                                    <div class="col-lg-9">
                                        <select name="status" class="form-control" required>
                                            <option value="2" <?php if($test->status == 2): ?> selected <?php endif; ?>>Pending</option>
                                            <option value="1" <?php if($test->status == 1): ?> selected <?php endif; ?>>Enabled</option>
                                            <option value="0" <?php if($test->status == 0): ?> selected <?php endif; ?>>Disabled</option>
                                        </select>
                                    </div>
                                </div>

                                <?php if(Auth::user()->admin_type == 'super'): ?>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label"><?php echo e(trans('other.global')); ?></label>
                                        <div class="col-lg-9">
                                            <select name="global" class="form-control" required>
                                                <option value="1" <?php if($test->global == 1): ?> selected <?php endif; ?>>Yes</option>
                                                <option value="0" <?php if($test->global == 0): ?> selected <?php endif; ?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h3 style="margin-left:10px"><?php echo e(trans('other.question_editor')); ?></h3>
                                <hr>

                                <div class="question-editor">
                                    <div></div>
                                    <h1>Edit questions here</h1>

                                    <ol class="question-editor-inner">
                                        <?php $__currentLoopData = $testQuestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($tq->type == 'options'): ?>
                                                <?php
                                                    $uniqueString = str_random(10);
                                                ?>
                                                <li id="option-question" type="options" ref="<?php echo e($uniqueString); ?>"> 	
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse"  onclick="onlybar(this);" data-parent="#accordion" href="#collapse<?php echo e($uniqueString); ?>">
                                                            <i class="glyphicon glyphicon glyphicon-chevron-down" title="Show/Hide"></i> 
                                                            <?php echo e(trans('other.options')); ?>

                                                        </a>
                                                        <button class="btn btn-danger btn-xs pull-right" type="button" id="btn-close-quiz">x</button>
                                                    </h4>
                                                    <div id="collapse<?php echo e($uniqueString); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <input type="hidden" name="type[]" value="options">
                                                        <input type="hidden" name="id[]" value="<?php echo e($uniqueString); ?>">
                                                        <label class="form-label"><strong>Write question:</strong></label>
                                                        <input type="text" class="form-control question" required value="<?php echo e($tq->question); ?>" name="question[]" placeholder="Question...">
                                                        <p class="mt-15">Options:</p>
                                                        <div class="options-group">
                                                            <div class="options-lists">
                                                                <?php
                                                                    $getoptions = App\TestOption::where('question_id', $tq->id)->get();
                                                                ?>
                                                                <?php $__currentLoopData = $getoptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $go): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="options">
                                                                        <div class="bor-bo-opt mb10">
                                                                            <div class="input-group">
                                                                                <input type="text" name="option[<?php echo e($uniqueString); ?>][]" class="form-control" value="<?php echo e($go->option); ?>" placeholder="Answer..." required>
                                                                                <span class="input-group-btn">
                                                                                    <a class="btn btn-default" id="btn-del-opt"><i class="glyphicon glyphicon-remove"></i></a>
                                                                                </span>
                                                                            </div>
                                                                            <input type="checkbox" <?php if($go->correct == 1): ?> checked <?php endif; ?> name="correct[<?php echo e($uniqueString); ?>][]"> 
                                                                                <label class="ckbox mb20 mt-10"> This is correct answer</label>
                                                                            <br>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                            <button class="btn btn-success btn-md mt-10" type="button" id="add_option"><i class="glyphicon glyphicon-plus"></i> Add answer</button>
                                                        </div>
                                                        <div class="points"><label class="mrg-10">Point: </label><input name="point[]" maxlength="2"  max="99" min="0" value="<?php echo e($tq->point); ?>" class="form-control ib input-points" type="number" required></div>
                                                        <hr>
                                                    </div>
                                                </li>
                                            <?php elseif($tq->type == 'fillword'): ?>
                                                <?php
                                                    $uniqueString = str_random(10);
                                                ?>
                                                <li id="option-question" type="fillword" ref="<?php echo e($uniqueString); ?>"> 	
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse"  onclick="onlybar(this);" data-parent="#accordion" href="#collapse<?php echo e($uniqueString); ?>">
                                                            <i class="glyphicon glyphicon glyphicon-chevron-down" title="Show/Hide"></i> 
                                                            <?php echo e(trans('other.fill_word')); ?>

                                                        </a>
                                                        <button class="btn btn-danger btn-xs pull-right" type="button" id="btn-close-quiz">x</button>
                                                    </h4>
                                                    <div id="collapse<?php echo e($uniqueString); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <input type="hidden" name="type[]" value="fillword">
                                                        <input type="hidden" name="id[]" value="<?php echo e($uniqueString); ?>">
                                                        <label class="form-label"><strong>Write sentence:</strong></label>
                                                    
                                                        <input type="text" class="form-control question" name="question[]" required value="<?php echo e($tq->question); ?>" placeholder="Sentence...">
                                                        <p class="mt-10"><label class="label label-info">Hint:</label> replace word to be complemented with <strong>____</strong>, i.e. 4 undescores</p>
                                                        <p class="mt-15">Correct Answer:</p>
                                                        <div class="options-group">
                                                            <div class="options-lists">
                                                                <?php for($i = 0; $i < $tq->options; $i++): ?>
                                                                    <div class="options">
                                                                        <div class="bor-bo-opt mb10">
                                                                            <div class="input-group">
                                                                                <input type="text" name="option[<?php echo e($uniqueString); ?>][]" class="form-control" placeholder="Correct Answer...">
                                                                                <span class="input-group-btn">
                                                                                    <a class="btn btn-default" id="btn-del-opt"><i class="glyphicon glyphicon-remove"></i></a>
                                                                                </span>
                                                                            </div>
                                                                            <br>
                                                                        </div>
                                                                    </div>
                                                                <?php endfor; ?>
                                                            </div>
                                                            <button class="btn btn-success btn-md mt-10" type="button" id="add_option"><i class="glyphicon glyphicon-plus"></i> Add correct answer</button>
                                                        </div>
                                                        <div class="points"><label class="mrg-10">Point: </label><input name="point[]" maxlength="2"  max="99" min="0" value="<?php echo e($tq->point); ?>" class="form-control ib input-points" type="number" required></div>
                                                        <hr>
                                                    </div>
                                                </li>
                                            <?php elseif($tq->type == 'yesno'): ?>
                                                <?php
                                                    $uniqueString = str_random(10);
                                                ?>
                                                <li id="option-question" type="yesno" ref="<?php echo e($uniqueString); ?>"> 	
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse"  onclick="onlybar(this);" data-parent="#accordion" href="#collapse<?php echo e($uniqueString); ?>">
                                                            <i class="glyphicon glyphicon glyphicon-chevron-down" title="Show/Hide"></i> 
                                                            <?php echo e(trans('other.yes_no')); ?>

                                                        </a>
                                                        <button class="btn btn-danger btn-xs pull-right" type="button" id="btn-close-quiz">x</button>
                                                    </h4>
                                                    <div id="collapse<?php echo e($uniqueString); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <input type="hidden" name="type[]" value="yesno">
                                                        <input type="hidden" name="id[]" value="<?php echo e($uniqueString); ?>">
                                                        <label class="form-label"><strong>Write Question:</strong></label>
                                                    
                                                        <input type="text" class="form-control question" name="question[]" required  value="<?php echo e($tq->question); ?>" placeholder="Question...">
                                                        <div>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="option[<?php echo e($uniqueString); ?>][]" value="1"> Yes
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="option[<?php echo e($uniqueString); ?>][]" value="2"> No
                                                            </label>
                                                        </div>
                                                        <br>
                                                        <p class="mt-10"><label class="label label-info">Hint:</label> &nbsp;Check correct answer</p>
                                                        <br>
                                                        <div class="points"><label class="mrg-10">Point: </label><input name="point[]"  maxlength="2"  max="99" min="0" value="<?php echo e($tq->point); ?>" class="form-control ib input-points" type="number" required></div>
                                                        <hr>
                                                    </div>
                                                </li>
                                            <?php elseif($tq->type == 'short'): ?>
                                                <?php
                                                    $uniqueString = str_random(10);
                                                ?>
                                                <li id="option-question" type="short" ref="<?php echo e($uniqueString); ?>"> 	
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse"  onclick="onlybar(this);" data-parent="#accordion" href="#collapse<?php echo e($uniqueString); ?>">
                                                            <i class="glyphicon glyphicon glyphicon-chevron-down" title="Show/Hide"></i> 
                                                            <?php echo e(trans('other.short_answer')); ?>

                                                        </a>
                                                        <button class="btn btn-danger btn-xs pull-right" type="button" id="btn-close-quiz">x</button>
                                                    </h4>
                                                    <div id="collapse<?php echo e($uniqueString); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <input type="hidden" name="type[]" value="short">
                                                        <input type="hidden" name="id[]" value="<?php echo e($uniqueString); ?>">
                                                        <label class="form-label"><strong>Write question:</strong></label>
                                                        <input type="text" class="form-control question" name="question[]" required value="<?php echo e($tq->question); ?>" placeholder="Question...">
                                                        <p class="mt-15">Correct Answer:</p>
                                                        <div class="options-group">
                                                            <div class="options-lists">
                                                                <?php for($i = 0; $i < $tq->options; $i++): ?>
                                                                    <div class="options">
                                                                        <div class="bor-bo-opt mb10">
                                                                            <div class="input-group">
                                                                                <input type="text" name="option[<?php echo e($uniqueString); ?>][]" class="form-control" placeholder="Correct Answer...">
                                                                                <span class="input-group-btn">
                                                                                    <a class="btn btn-default" id="btn-del-opt"><i class="glyphicon glyphicon-remove"></i></a>
                                                                                </span>
                                                                            </div>
                                                                            <br>
                                                                        </div>
                                                                    </div>
                                                                <?php endfor; ?>
                                                            </div>
                                                            <button class="btn btn-success btn-md mt-10" type="button" id="add_option"><i class="glyphicon glyphicon-plus"></i> Add correct answer</button>
                                                        </div>
                                                        <div class="points"><label class="mrg-10">Point: </label><input name="point[]" maxlength="2"  max="99" min="0" value="<?php echo e($tq->point); ?>" class="form-control ib input-points" type="number" required></div>
                                                        <hr>
                                                    </div>
                                                </li>
                                            <?php elseif($tq->type == 'file'): ?>
                                                <?php
                                                    $uniqueString = str_random(10);
                                                ?>
                                                <li id="option-question" type="file" ref="<?php echo e($uniqueString); ?>"> 	
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse"  onclick="onlybar(this);" data-parent="#accordion" href="#collapse<?php echo e($uniqueString); ?>">
                                                            <i class="glyphicon glyphicon glyphicon-chevron-down" title="Show/Hide"></i> 
                                                            <?php echo e(trans('other.file')); ?>

                                                        </a>
                                                        <button class="btn btn-danger btn-xs pull-right" type="button" id="btn-close-quiz">x</button>
                                                    </h4>
                                                    <div id="collapse<?php echo e($uniqueString); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <input type="hidden" name="type[]" value="file">
                                                        <input type="hidden" name="id[]" value="<?php echo e($uniqueString); ?>">
                                                        <label class="form-label"><strong>Write question:</strong></label>
                                                        <textarea class="form-control question" name="question[]" required placeholder="Question..."><?php echo e($tq->question); ?></textarea>	
                                                        <div class="options">
                                                            <p class="mt-10">Upload file: <small>Only if it neccessary: </small></p>		
                                                            <input type="file" name="file[<?php echo e($uniqueString); ?>][]" class="form-control question">
                                                            <input type="hidden" name="fileedit[<?php echo e($uniqueString); ?>][]" value="<?php echo e($tq->file); ?>" class="form-control question">
                                                            <br>
                                                            <div>
                                                                <?php
                                                                    $link = strtolower('ev-assets/uploads/test-files/'. $tq->file);
                                                                    $link2 = 'ev-assets/uploads/test-files/'. $tq->file;
                                                                    $extensions = array("gif", "jpg", "png", "jpeg", "png", "tiff", "tif");
                                                                    $urlExt = pathinfo($link, PATHINFO_EXTENSION);
                                                                ?>
                                                                <?php if($tq->file): ?>
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
                                                            <p class="mt-10 mb0"><label class="label label-info">INFO:</label> Teacher will upload file</p>
                                                        </div>
                                                        <div class="points"><label class="mrg-10">Point: </label><input name="point[]" maxlength="2"  max="99" min="0" value="<?php echo e($tq->point); ?>" class="form-control ib input-points" type="number" required></div>
                                                        <hr>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                        
                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ol>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="quiz-right">
                                    <h3><?php echo e(trans('other.select_question_type')); ?></h3>
                                    <hr>
                                    <div class="quiz-action-section">
                                        <button type="button" class="btn btn-primary pickaction" val="options"><?php echo e(trans('other.options')); ?></button>
                                        <button type="button" class="btn btn-primary pickaction" val="fillword"><?php echo e(trans('other.fill_word')); ?></button>
                                        <button type="button" class="btn btn-primary pickaction" val="yesno"><?php echo e(trans('other.yes_no')); ?></button>
                                        <button type="button" class="btn btn-primary pickaction" val="short"><?php echo e(trans('other.short_answer')); ?></button>
                                        <button type="button" class="btn btn-primary pickaction" val="file"><?php echo e(trans('other.file')); ?></button>
                                        <button type="submit" class="btn btn-success">Update Test Questions</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                            
                    </div>
                    <?php echo Form::close(); ?>

                </section>
            </div>
        </div>
    </div>
</div>
               
    <script>
        var counter = "<?php echo e($testQuestions->count()); ?>";
        $('.pickaction').on('click', function (e) {
            e.preventDefault();
            $('.edu-loading').addClass('m-loading');
            var action = $(this).attr('val');
            $.ajax({
                    url: "<?php echo e(url('select-quiz-type')); ?>" + '/' + action,
                    success: function(response)
                    {
                        $('.edu-loading').removeClass('m-loading');
                        counter += 1;
                        $('#number-holder').text(counter);
                        //$('#number-holder').text((eval($('.question-editor-inner').children().length)));
                        $('.question-editor-inner').append(response);
                        // $('.question-editor-inner #option-question:last-child #number-holder').text($('.question-editor-inner').children().length -1);
                    },
                    error: function(data) {
                        $('.edu-loading').removeClass('m-loading');
                    }
            });
        })
        $(document).on('click', '#btn-del-opt', function(e) {
            e.preventDefault();
            var parent = $(this).parent().parent().parent().parent();
            parent.slideUp(300, function () {
                parent.remove();
            });
        });
        $(document).on('click', '#btn-close-quiz', function (e) {
            e.preventDefault();
            var parent = $(this).parent().parent("#option-question");
            parent.slideUp(300, function () {
                parent.remove();
                counter -= 1;
                $('#number-holder').text(counter);
               // $('#number-holder').text((eval($('.question-editor-inner').children().length)));
            });
        })
        $(document).ready(function(){
            $('#quiz-form').submit(function (e) {
                var $checkboxes = $('#quiz-form').find('input[type="checkbox"]');
                $checkboxes.filter(':checked').val(1);
                $checkboxes.not(':checked').val(0);
                $checkboxes.prop('checked', true);
            })
                
        });
        $(function  () {
           // $("div.question-editor-inner").sortable();
            $("ol.question-editor-inner").sortable({
                group: 'question-editor-inner',
                pullPlaceholder: false,
                // animation on drop
                onDrop: function  ($item, container, _super) {
                    var $clonedItem = $('<li/>').css({height: 0});
                    $item.before($clonedItem);
                    $clonedItem.animate({'height': $item.height()});

                    $item.animate($clonedItem.position(), function  () {
                    $clonedItem.detach();
                    _super($item, container);
                    });
                },

                // set $item relative to cursor position
                onDragStart: function ($item, container, _super) {
                    var offset = $item.offset(),
                        pointer = container.rootGroup.pointer;

                    adjustment = {
                    left: pointer.left - offset.left,
                    top: pointer.top - offset.top
                    };

                    _super($item, container);
                },
                onDrag: function ($item, position) {
                    $item.css({
                    left: position.left - adjustment.left,
                    top: position.top - adjustment.top
                    });
                }
            });
        });
        $(document).on('keyup', '.input-points', function (e) {
            var val = $(this).val();
            if(val.length <= 2){
                $(this).val(val);
            }
            else{
                $(this).val(val.substring(0, 2));
            }
        });
        $(document).ready(function(){
            $(window).bind('scroll', function() {
            var navHeight = $( window ).height() - 70;
                if ($(window).scrollTop() > navHeight) {
                    $('.quiz-right').addClass('fixed');
                }
                else {
                    $('.quiz-right').removeClass('fixed');
                }
            });
        });
        function onlybar(el) {
			// el = $(el).closest('.sortable-div');
			el = $(el).find('i:first');
            el.toggleClass('rotated');
        }
        

        $(document).on('click', '#add_option', function (e) {
            e.preventDefault();
            var parent = $(this).parent();
            //var index = $(this).parent().parent().index();
            var attr = $(this).parent().parent().parent().attr('ref');
            var type = $(this).parent().parent().parent().attr('type');
            if(type == 'options'){
                var options = '<div class="options"><div class="bor-bo-opt mb10"><div class="input-group"><input type="text" name="option['+ attr +'][]" class="form-control" placeholder="Answer..." required><span class="input-group-btn"><a class="btn btn-default" id="btn-del-opt"><i class="glyphicon glyphicon-remove"></i></a></span></div><input type="checkbox" name="correct['+ attr +'][]"> <label class="ckbox mb20 mt-10"> This is correct answer</label><br></div></div>';
            }
            else if(type == 'fillword' || type == 'short'){
                var options = '<div class="options"><div class="bor-bo-opt mb10"><div class="input-group"><input type="text" name="option['+ attr +'][]" class="form-control" placeholder="Correct Answer..."><span class="input-group-btn"><a class="btn btn-default" id="btn-del-opt"><i class="glyphicon glyphicon-remove"></i></a></span></div><br></div></div>';
            }
            parent.find('.options-lists').append(options);
        });
        function get_class_subjects(class_id) {
            $.ajax({
                url: '<?php echo e(url('')); ?>/get_class_subjects/' + class_id ,
                success: function(response)
                {
                    jQuery('#subject_selector_holder').html(response);
                }
            });
        } 
    </script>
    <script src="<?php echo e(asset('ev-assets/backend/plugins/bower_components/jquery-sortable/jquery-sortable.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>