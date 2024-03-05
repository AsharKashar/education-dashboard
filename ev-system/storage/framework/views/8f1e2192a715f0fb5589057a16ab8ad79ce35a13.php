<?php $__env->startSection('title'); ?>
<?php echo e(trans('topbar_menu_lang.menu_student')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-home"></i><?php echo e(trans('dashboard_lang.panel_title')); ?></a></li>
                          <li class="active"><?php echo e(trans('topbar_menu_lang.menu_student')); ?></li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             <?php echo e(trans('topbar_menu_lang.menu_student')); ?>

                          </header>
                          <?php if(auth()->user()->admin_type == 'super'): ?>
                            <div class="white-box">
                              <h4>VIEW BY SCHOOL</h4>
                              <?php $__currentLoopData = App\School::where("status", 1)->orderBy("created_at", "desc")->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(url('classes/'.$slug.'/'.$var->id)); ?>"><button class="btn btn-primary btn-xs"><?php echo e($var->name); ?></button></a> 
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                          <?php endif; ?>
                            <?php if( !$students->count() ): ?>
                            <div style="padding: 10px">0 student found...</div>
                            <?php else: ?> 
                          
                          <div id="hide-table">
                              <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th><?php echo e(trans('student_lang.student_photo')); ?></th>
                                  <th>Reg No</th>
                                  <th><?php echo e(trans('student_lang.student_name')); ?></th>
                                  <th><?php echo e(trans('student_lang.student_email')); ?></th>
                                  <th><?php echo e(trans('student_lang.student_address')); ?></th>
                                  <th><?php echo e(trans('student_lang.student_phone')); ?></th>
                                  <th><?php echo e(trans('parentes_lang.panel_title')); ?></th>
                                  <th><?php echo e(trans('others.school')); ?></th>
                                  <th><?php echo e(trans('student_lang.action')); ?></th>
                              </tr>
                              </thead>
                              <tbody>

                              <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                  <td data-title="#"><?php echo e($key+1); ?></td>
                                  <td data-title="<?php echo e(trans('student_lang.student_photo')); ?>"> <img src="<?php echo e(asset('ev-assets/uploads/avatars/'.$post->image)); ?>" alt="..." class="img-circle profile_img" width="50px" height="50px"> </td>
                                  <td data-title="Reg No"><?php echo e($post->reg_no); ?></td>
                                  <td data-title="<?php echo e(trans('student_lang.student_name')); ?>"><a href="<?php echo e(url('user/view/'. $post->id)); ?>"><?php echo e($post->name); ?></a></td>
                                  <td data-title="<?php echo e(trans('student_lang.student_email')); ?>"><?php echo e($post->email); ?></td>
                                  <td data-title="<?php echo e(trans('student_lang.student_address')); ?>"><?php echo e($post->address); ?></td>
                                  <td data-title="<?php echo e(trans('student_lang.student_phone')); ?>"><?php echo e($post->phone); ?></td>
                                  <td data-title="<?php echo e(trans('parentes_lang.panel_title')); ?>"><?php echo e(App\User::where('role','parent')->where('id',$post->parent_id)->first() ? App\User::where('role','parent')->where('id',$post->parent_id)->first()->name: null); ?></td>
                                  <td data-title="<?php echo e(trans('others.school')); ?>"><?php echo e(App\School::find($post->school_id)->name); ?></td>
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
                                              <h4 class="modal-title"><?php echo e(trans('student_lang.update_student')); ?></h4>
                                          </div>
                                          <?php echo Form::open(array('url'=>'classes/update_student','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)); ?>

                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label"><?php echo e(trans('student_lang.student_name')); ?></label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="<?php echo e($post->name); ?>" name="name" required>
                                                      <input type="hidden" class="form-control" value="<?php echo e($post->id); ?>" name="student_id" required>
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label"><?php echo e(trans('student_lang.student_email')); ?></label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="<?php echo e($post->email); ?>" name="email" required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label"><?php echo e(trans('student_lang.student_address')); ?></label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="<?php echo e($post->address); ?>" name="address" required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label"><?php echo e(trans('student_lang.student_phone')); ?></label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="<?php echo e($post->phone); ?>" name="phone">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label"><?php echo e(trans('parentes_lang.panel_title')); ?></label>
                                                  <div class="col-lg-9"> 
                                                    <select class="form-control" name="parent_id">
                                                      <?php $__currentLoopData = App\User::where('role','parent')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $par): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($par->id); ?>" <?php if($par->id == $post->parent_id): ?> selected <?php endif; ?> ><?php echo e($par->name); ?></option>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label"><?php echo e(trans('others.school')); ?></label>
                                                  <div class="col-lg-9">
                                                      <select class="form-control" name="school">
                                                        <?php $__currentLoopData = App\School::where("status", 1)->orderBy("created_at", "asc")->paginate(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                          <option value="<?php echo e($var->id); ?>" <?php if($var->id == $post->school_id): ?> selected="selected" <?php endif; ?>><?php echo e($var->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label"><?php echo e(trans('student_lang.student_photo')); ?></label>
                                                  <div class="col-lg-9">
                                                      <input type="file" class="form-control" name="file">
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'><?php echo e(trans('student_lang.update_student')); ?></button>
                                          
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
                                              <a href="<?php echo e(url('classes/delete/'.$post->id)); ?>" class="btn btn-danger"><?php echo e(trans('student_lang.delete')); ?></a>
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
                        <?php endif; ?>
                      </section>
                  </div>
      
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>