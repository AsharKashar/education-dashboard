<?php
    $uniqueString = str_random(10);
?>
<?php if($type == 'options'): ?>
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
            <input type="text" class="form-control question" name="question[]" required placeholder="Question...">
            <p class="mt-15">Options:</p>
            <div class="options-group">
                <div class="options-lists">
                    <div class="options">
                        <div class="bor-bo-opt mb10">
                            <div class="input-group">
                                <input type="text" name="option[<?php echo e($uniqueString); ?>][]" class="form-control" placeholder="Answer..." required>
                                <span class="input-group-btn">
                                    <a class="btn btn-default" id="btn-del-opt"><i class="glyphicon glyphicon-remove"></i></a>
                                </span>
                            </div>
                            <input type="checkbox" name="correct[<?php echo e($uniqueString); ?>][]"> 
                                <label class="ckbox mb20 mt-10"> This is correct answer</label>
                            <br>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-md mt-10" type="button" id="add_option"><i class="glyphicon glyphicon-plus"></i> Add answer</button>
            </div>
            <div class="points"><label class="mrg-10">Point: </label><input name="point[]"  maxlength="2" max="99" min="0" class="form-control ib input-points" type="number" required></div>
            <hr>
        </div>
    </li>
<?php elseif($type == 'fillword'): ?>
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
           
            <input type="text" class="form-control question" name="question[]" required placeholder="Sentence...">
            <p class="mt-10"><label class="label label-info">Hint:</label> replace word to be complemented with <strong>____</strong>, i.e. 4 undescores</p>
            <p class="mt-15">Correct Answer:</p>
            <div class="options-group">
                <div class="options-lists">
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
                </div>
                <button class="btn btn-success btn-md mt-10" type="button" id="add_option"><i class="glyphicon glyphicon-plus"></i> Add correct answer</button>
            </div>
            <div class="points"><label class="mrg-10">Point: </label><input name="point[]"  maxlength="2"  max="99" min="0" class="form-control ib input-points" type="number" required></div>
            <hr>
        </div>
    </li>
<?php elseif($type == 'yesno'): ?>
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
           
            <input type="text" class="form-control question" name="question[]" required placeholder="Question...">
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
            <div class="points"><label class="mrg-10">Point: </label><input name="point[]" maxlength="2" max="99" min="0" class="form-control ib input-points" type="number" required></div>
            <hr>
        </div>
    </li>
<?php elseif($type == 'short'): ?>
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
            <input type="text" class="form-control question" name="question[]" required placeholder="Question...">
            <p class="mt-15">Correct Answer:</p>
            <div class="options-group">
                <div class="options-lists">
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
                </div>
                <button class="btn btn-success btn-md mt-10" type="button" id="add_option"><i class="glyphicon glyphicon-plus"></i> Add correct answer</button>
            </div>
            <div class="points"><label class="mrg-10">Point: </label><input name="point[]"  maxlength="2" max="99" min="0" class="form-control ib input-points" type="number" required></div>
            <hr>
        </div>
    </li>
<?php elseif($type == 'file'): ?>
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
            <textarea class="form-control question" name="question[]" required placeholder="Question..."></textarea>	
            <div class="options">
                <p class="mt-10">Upload file: <small>Only if it neccessary: </small></p>		
                <input type="file" name="file[<?php echo e($uniqueString); ?>][]" class="form-control question">
                <br>
                <p class="mt-10 mb0"><label class="label label-info">INFO:</label> Teacher will upload file</p>
            </div>
            <div class="points"><label class="mrg-10">Point: </label><input name="point[]" maxlength="2"  max="99" min="0" class="form-control ib input-points" type="number" required></div>
            <hr>
        </div>
    </li>
<?php endif; ?>
