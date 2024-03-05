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
                                  <td data-title="Download"><a class="active" href="<?php echo e(url('ev-assets/uploads/study-materials/'.$mat->file_name)); ?>" target="_blank">
                                        <button class="btn btn-success btn-xs"><i class="fa fa-download "></i> Download</button>
                                      </a></td>
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