<?php $__env->startSection('title'); ?>
<?php echo e(trans('setting_lang.panel_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <link href="<?php echo e(asset('ev-assets/backend/assets/bootstrap-colorpicker/css/colorpicker.css')); ?>" rel="stylesheet">             
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
              <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-home"></i><?php echo e(trans('dashboard_lang.panel_title')); ?></a></li>
                          <li class="active"><?php echo e(trans('setting_lang.panel_title')); ?></li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>

            <div class="row">
              <div class="col-lg-12">
                  
                      <section class="panel">
                          <header class="panel-heading">
                              <?php echo e(trans('setting_lang.panel_title')); ?>

                          </header>
                          <div class="panel-body">
                    <?php echo Form::open(array('url'=>'general_settings','id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)); ?>

                    <div class="col-lg-9">
                      <div class="form-group">
                        <label for="first-name">System Name
                        </label>
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                          <input type="hidden" id="first-name" required="required" name="id" value="1" class="form-control col-md-7 col-xs-12">
                          <input type="text" id="first-name" value="<?php echo e($settings->system_name); ?>" required="required" placeholder="Enter title here" name="system_name" class="form-control col-md-7 col-xs-12">
                      
                      </div>
                      <div class="form-group">
                        <label><?php echo e(trans('setting_lang.setting_school_name')); ?> <span class="required">*</span>
                        </label>
                          <input type="text" id="last-name" name="system_title" value="<?php echo e($settings->system_title); ?>" required="required" class="form-control col-md-7 col-xs-12">
                        
                      </div>
                      <div class="form-group">
                        <label><?php echo e(trans('setting_lang.setting_school_address')); ?></label>
                        
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" value="<?php echo e($settings->address); ?>" type="text" name="address">
                       
                      </div>
                      <div class="form-group">
                        <label><?php echo e(trans('setting_lang.setting_school_email')); ?>

                        </label>
                          <input value="<?php echo e($settings->system_email); ?>" name="system_email" class="date-picker form-control col-md-7 col-xs-12" type="text">
                        </div>
                      <div class="form-group">
                        <label><?php echo e(trans('setting_lang.setting_school_currency_code')); ?></label>
                          <input value="<?php echo e($settings->currency); ?>" name="currency" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      <div class="form-group">
                        <label>Text-align
                        </label>
                          <input value="<?php echo e($settings->text_align); ?>" name="text_align" class="date-picker form-control col-md-7 col-xs-12" type="text">
                        </div>
                      <div class="form-group">
                        <label>User can change skin??
                        </label>
                          <select name="can_change" class="form-control">
                            <option value="1" <?php if($settings->can_change == 1): ?> selected="selected" <?php endif; ?>>Yes</option>
                            <option value="0" <?php if($settings->can_change == 0): ?> selected="selected" <?php endif; ?>>No</option>
                          </select>
                        </div>
                      <div class="form-group">
                        <label>Skin Colour
                        </label>
                          <select name="skin_color" class="form-control">
                            <option value="default" <?php if($settings->skin_color == 'default'): ?> selected='selected' <?php endif; ?>>Default</option>
                            <option value="blue" <?php if($settings->skin_color == 'blue'): ?> selected='selected' <?php endif; ?>>Blue</option>
                            <option value="green" <?php if($settings->skin_color == 'green'): ?> selected='selected' <?php endif; ?>>Green</option>
                            <option value="purple" <?php if($settings->skin_color == 'purple'): ?> selected='selected' <?php endif; ?>>Purple</option>
                            <option value="yellow" <?php if($settings->skin_color == 'yellow'): ?> selected='selected' <?php endif; ?>>Yellow</option>
                            <option value="red" <?php if($settings->skin_color == 'red'): ?> selected='selected' <?php endif; ?>>Red</option>
                          </select>
                        </div>
                      <div class="form-group">
                        <label>Front Page Active?
                        </label>
                          <select name="page" class="form-control">
                            <option value="1" <?php if($settings->page == 1): ?> selected="selected" <?php endif; ?>>Yes</option>
                            <option value="0" <?php if($settings->page == 0): ?> selected="selected" <?php endif; ?>>No</option>
                          </select>
                        </div>
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <?php echo Form::submit(trans('setting_lang.update_setting'), array('class'=>'btn btn-primary', 'name'=>'publish')); ?>

                        </div>
                      </div>
                    <?php echo Form::close(); ?>

                  </div>
                      </section>
                  </div> 
                  </div> 
                </div>
  
 <script src="<?php echo e(asset('ev-assets/backend/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js')); ?>"></script>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>