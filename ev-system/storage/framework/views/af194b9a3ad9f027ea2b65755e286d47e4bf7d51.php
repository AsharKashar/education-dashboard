<?php $__env->startSection('title'); ?>
<?php echo e(trans('notice_lang.panel_title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-home"></i><?php echo e(trans('dashboard_lang.panel_title')); ?></a></li>
                          <li class="active"><?php echo e(trans('notice_lang.panel_title')); ?></li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <?php echo e(trans('notice_lang.panel_title')); ?>

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
                            <?php if(Session::has('data')): ?>   
                            <div class="container">
                              <div class="alert alert-success fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo e(Session::get('data')); ?>

                              </div>
                            </div>
                            <?php endif; ?>

                          <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title"><?php echo e(trans('notice_lang.add_class')); ?></h4>
                                          </div>
                                          <?php echo Form::open(array('url'=>'noticeboard/create_noticeboard','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)); ?>

                                          <div class="modal-body">

                                          
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label"> <?php echo e(trans('notice_lang.notice_title')); ?></label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="title"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                      <label class="col-lg-2 control-label"><?php echo e(trans('notice_lang.notice_notice')); ?></label>
                                                      <div class="col-lg-9">
                                                      <textarea name='body' class="ckeditor form-control" rows="10"></textarea>
                                                      </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label"><?php echo e(trans('notice_lang.to')); ?>

                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="for" class="form-control" data-validate="required" required>
                                                    <option value="all">All</option>
                                                    <option value="teachers">Teachers</option>
                                                    <option value="students">Students</option>
                                                    <option value="parents">Parents</option>
                                                  </select>
                                                  </div>
                                              </div>
                                              
                                                      </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'> <?php echo e(trans('notice_lang.add_class')); ?></button>
                                          
                                          </div>
                                          <?php echo Form::close(); ?>

                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                              <?php if(Auth::user()->permission('add_notice')): ?>
                                <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                    <?php echo e(trans('notice_lang.add_class')); ?>

                                </a>
                              <?php endif; ?>
                    <div id="hide-table">
                        <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                                            
                                <thead>
                              <tr>
                                  <th>#</th>
                                  <th><?php echo e(trans('notice_lang.notice_title')); ?></th>
                                  <th><?php echo e(trans('notice_lang.notice_notice')); ?></th>
                                  <th><?php echo e(trans('notice_lang.to')); ?></th>
                                  <?php if(Auth::user()->permission('add_notice')): ?>
                                    <th><?php echo e(trans('student_lang.action')); ?></th>
                                  <?php endif; ?>
                              </tr>
                              </thead>
                              <tbody>
                               
                                <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                  <td data-title="#"><a href="#"><?php echo e($key+1); ?></a></td>
                                  <td data-title="<?php echo e(trans('notice_lang.notice_title')); ?>"><?php echo e($post->title); ?></td>
                                  <td data-title="<?php echo e(trans('notice_lang.notice_notice')); ?>"><?php echo e($post->body); ?></td>
                                  <td data-title="<?php echo e(trans('notice_lang.to')); ?>"><?php echo e($post->for); ?></td>
                                  <?php if(Auth::user()->permission('add_notice')): ?>
                                  <td data-title="<?php echo e(trans('student_lang.action')); ?>">
                                      <a class="active" data-toggle="modal" href="#myModal2<?php echo e($post->id); ?>">
                                       <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                       </a>
                                      <!-- Modal -->
                                        <div class="modal fade" id="myModal2<?php echo e($post->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><?php echo e(trans('notice_lang.update_class')); ?></h4>
                                                    </div>
                                                    <?php echo Form::open(array('url'=>'noticeboard/update_noticeboard','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)); ?>

                                                    <div class="modal-body">

                                                    
                                                        <div class="form-group">
                                                            <label  class="col-lg-2 control-label"><?php echo e(trans('notice_lang.notice_title')); ?></label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control" value="<?php echo e($post->title); ?>" name="title"required>
                                                                <input type="hidden" class="form-control" value="<?php echo e($post->id); ?>" name="id"required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="col-lg-2 control-label"><?php echo e(trans('notice_lang.notice_notice')); ?></label>
                                                                <div class="col-lg-9">
                                                                <textarea name='body' class="ckeditor form-control" rows="10"><?php echo e($post->body); ?></textarea>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-lg-2 control-label"><?php echo e(trans('notice_lang.to')); ?>

                                                            </label>
                                                            <div class="col-lg-9">
                                                            <select name="for" class="form-control" data-validate="required" required>
                                                                <option value="all">All</option>
                                                                <option value="teachers">Teachers</option>
                                                                <option value="students">Students</option>
                                                                <option value="parents">Parents</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        
                                                                </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                        <button class="btn btn-warning" type="submit" name='submit'><?php echo e(trans('notice_lang.update_class')); ?></button>
                                                    
                                                    </div>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal -->
                                                <a class="active"  data-toggle="modal" href="#myModaldel<?php echo e($post->id); ?>">
                                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                                </a>
                                                <!-- Delete Modal -->
                                        <div class="modal fade" id="myModaldel<?php echo e($post->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        
                                                    </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                        <a href="<?php echo e(url('noticeboard/delete/'.$post->id)); ?>">
                                                        <button class="btn btn-danger"><?php echo e(trans('student_lang.delete')); ?></button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                              <!-- modal -->
                                  </td>
                                  <?php endif; ?>
                              </tr>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                          </table>
                        </div>
                      </section>
                  </div>
              </div>
               

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>