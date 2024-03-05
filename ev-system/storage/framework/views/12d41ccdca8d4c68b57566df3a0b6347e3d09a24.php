<?php $__env->startSection('title'); ?>
Study Material
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="#"><i class="fa fa-home"></i><?php echo e(trans('dashboard_lang.panel_title')); ?></a></li>
                          <li class="active">Study Material</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Study Material
                          </header>
                           <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Add Study Material</h4>
                                          </div>
                                          <?php echo Form::open(array('url'=>'teacher/class/study_material','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)); ?>

                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Title</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="" name="title">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Description</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="" name="description">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">Class
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="class_id" class="form-control">
                                                    <option value="">Choose..</option>
                                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($class->id); ?>"><?php echo e($class->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                  </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Read by</label>
                                                  <div class="col-lg-9">
                                                      <input type="date" class="form-control" id="f-name" value="" name="date">
                                                      <input type="hidden" class="form-control" id="f-name" value="<?php echo e(Auth::user()->id); ?>" name="teacher_id">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">File</label>
                                                  <div class="col-lg-9">
                                                      <input type="file" name="import_file" required="required">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                  </div>
                                              </div>
                                                      </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'> Add Study Material</button>
                                          
                                          </div>
                                          <?php echo Form::close(); ?>

                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                           <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                  Add Study Material
                              </a>   
                          <div id="hide-table">
                              <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Title</th>
                                  <th> Description</th>
                                  <th> Read by</th>
                                  <th> Class</th>
                                  <th> Download</th>
                                  <th><?php echo e(trans('student_lang.action')); ?></th>
                              </tr>
                              </thead>
                              <tbody>
                                

                                <?php $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                  <td data-title="#"><?php echo e($key+1); ?></td>
                                  <td data-title="Title"><?php echo e($mat->title); ?></td>
                                  <td data-title="Description"><?php echo e($mat->description); ?></td>
                                  <td data-title="Read by"><?php echo e($mat->date); ?></td>
                                  <td data-title="Class"><?php echo e($mat->classes($mat->class_id) ? $mat->classes($mat->class_id)->title : ''); ?></td>
                                  <td data-title="Download">
                                    <a class="active" href="<?php echo e(url('ev-assets/uploads/study-materials/'.$mat->file_name)); ?>" target="_blank">
                                        <button class="btn btn-success btn-xs"><i class="fa fa-download "></i> Download</button>
                                      </a></td>

                                  <td data-title="<?php echo e(trans('student_lang.action')); ?>">
                                      <a class="active" data-toggle="modal" href="#myModal2<?php echo e($mat->id); ?>">
                                       <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                       </a>
                                      <!-- Modal -->
                              <div class="modal fade" id="myModal2<?php echo e($mat->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Edit Study Material</h4>
                                          </div>
                                          <?php echo Form::open(array('url'=>'teacher/class/update_study_material','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)); ?>

                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Title</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="<?php echo e($mat->title); ?>" name="title">
                                                      <input type="hidden" class="form-control" id="f-name" value="<?php echo e($mat->id); ?>" name="id">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Description</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="<?php echo e($mat->description); ?>" name="description">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">Class
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="class_id" class="form-control">
                                                    <option value="">Choose..</option>
                                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($class->id); ?>" <?php if($class->id == $mat->class_id){echo 'selected';}?>><?php echo e($class->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                  </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Read by</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="<?php echo e($mat->date); ?>" name="date">
                                                      <input type="hidden" class="form-control" id="f-name" value="<?php echo e(Auth::user()->id); ?>" name="teacher_id">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                  </div>
                                              </div>
                                                      </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'> Edit Study Material</button>
                                          
                                          </div>
                                          <?php echo Form::close(); ?>

                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                            <a class="active"  data-toggle="modal" href="#myModaldel<?php echo e($mat->id); ?>">
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                            </a>
                            <!-- Delete Modal -->
                              <div class="modal fade" id="myModaldel<?php echo e($mat->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-body">
                                              
                                          </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <a href="<?php echo e(url('teacher/class/study_material/delete/'.$mat->id)); ?>">
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
                      </section>
                  </div>
              </div>
               

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>