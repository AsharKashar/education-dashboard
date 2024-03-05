<?php $__env->startSection('title'); ?>
<?php echo e(trans('student_lang.add_student')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
      
            <div class="row">
                <div class="col-lg-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> <?php echo trans('dashboard_lang.panel_title');?></a></li>
                        <li><a href="<?php echo e(url('students/create_student')); ?>"><?php echo e(trans('topbar_menu_lang.menu_student')); ?></a></li>
                        <li class="active"><?php echo e(trans('student_lang.add_student')); ?></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                  
              <section class="panel">
                  <header class="panel-heading">
                     <?php echo e(trans('student_lang.add_student')); ?>

                  </header>
                  <?php if(Session::has('message')): ?>   
                    <div class="white-box">
                              <?php if(Session::get('message') == trans('topbar_menu_lang.success')): ?>
                      <div class="alert alert-success fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo e(Session::get('message')); ?>

                      </div>
                      <?php else: ?>
                      <div class="alert alert-warning fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo e(Session::get('message')); ?>

                      </div>
                      <?php endif; ?>
                    </div>
                    <?php endif; ?>
                  <div class="panel-body">
                    <?php echo Form::open(array('url'=>'students/create_student','id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)); ?>

                    
                    <div class="col-lg-9">
                      <div class="form-group">
                        <label  class="col-lg-2 control-label"><?php echo e(trans('student_lang.student_name')); ?> <span class="required">*</span>
                        </label>
                          <div class="col-lg-9">
                            <input type="text" id="first-name" value="<?php echo e(old('name')); ?>" required="required" placeholder="" name="name" class="form-control col-md-7 col-xs-12">
                          </div>
                      </div>
                      <div class="form-group">
                        
                        <label  class="col-lg-2 control-label"><?php echo e(trans('student_lang.student_email')); ?><span class="required">*</span>
                        </label>
                          <div class="col-lg-9">
                          <input type="text" id="last-name" name="email" value="<?php echo e(old('email')); ?>" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                      </div>
                      
                      <div class="form-group">
                        <label  class="col-lg-2 control-label"><?php echo e(trans('student_lang.student_password')); ?></label>
                          <div class="col-lg-9">
                            <input id="middle-name" class="form-control col-md-7 col-xs-12" value="<?php echo e(old('password')); ?>" type="password" name="password">
                          </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-lg-2 control-label"><?php echo e(trans('student_lang.student_sex')); ?></label>
                          <div class="col-lg-9">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="gender" value="male"> &nbsp; <?php echo e(trans('student_lang.student_sex_male')); ?> &nbsp;
                              </label>
                              <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="gender" value="female"> <?php echo e(trans('student_lang.student_sex_female')); ?>

                              </label>
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-lg-2 control-label"><?php echo e(trans('student_lang.student_dob')); ?> <span class="required">*</span>
                        </label>
                          <div class="col-lg-9">
                            <input id="birthday" name="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date">
                          </div>
                      </div>
                          <input type="hidden" id="last-name" name="reg_no" value="<?php echo e($next_id); ?>" required="required" class="form-control col-md-7 col-xs-12">
                       
                      <div class="form-group">
                        <label  class="col-lg-2 control-label"><?php echo e(trans('student_lang.student_select_class')); ?><span class="required">*</span>
                        </label>
                          <div class="col-lg-9">
                            <select name="class_id" class="form-control" data-validate="required" id="class_id" 
                                                data-message-required="this is required"
                                                  onchange="return get_class_sections(this.value)">
                              <option value=""><?php echo e(trans('student_lang.student_select_class')); ?></option>
                              <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($class->id); ?>"><?php echo e($class->title); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                      </div>
                      
                      <div class="form-group">
                        <label  class="col-lg-2 control-label"><?php echo e(trans('student_lang.parent_guargian_name')); ?>/<?php echo e(trans('topbar_menu_lang.menu_parent')); ?>

                        </label>
                          <div class="col-lg-9">
                            <select id="heard" name="parent_id" class="form-control">
                              <option value="">Choose..</option>
                              <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($parent->id); ?>"><?php echo e($parent->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label  class="col-lg-2 control-label"><?php echo e(trans('others.school')); ?></label>
                          <div class="col-lg-9">
                            <select class="form-control" name="school">
                              <?php $__currentLoopData = App\School::get_schools(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($dt->id); ?>"><?php echo e($dt->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-lg-2 control-label"><?php echo e(trans('student_lang.student_photo')); ?>

                        </label>
                          <div class="col-lg-9">
                            <input type="file" name="file" class="form-control">
                          </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div  class="col-lg-2"></div>
                          <div class="col-lg-9">
                            <?php echo Form::submit(trans("student_lang.add_student"), array('class'=>'btn btn-primary', 'name'=>'publish')); ?>

                          </div>
                      </div>
                      </div>
                    <?php echo Form::close(); ?>

                  </div>
                      </section>
                  </div> 
                  </div> 

      


<script type="text/javascript">

  function get_class_sections(class_id) {

      $.ajax({
            url: '<?php echo e(url('')); ?>/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
      });
   
  } 
</script>
 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>