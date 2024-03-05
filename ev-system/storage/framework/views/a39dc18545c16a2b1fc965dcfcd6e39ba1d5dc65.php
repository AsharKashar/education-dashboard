<?php $__env->startSection('title'); ?>
<?php echo e(trans('message_lang.panel_title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    * {
        box-sizing: border-box;
    }
    
    body {
        font: 16px Arial;  
    }
    
    /*the container must be positioned relative:*/
    .autocomplete {
        position: relative;
        display: inline-block;
    }
    
    input {
        border: 1px solid transparent;
        background-color: #f1f1f1;
        padding: 10px;
        font-size: 16px;
    }
    
    input[type=text] {
        background-color: #f1f1f1;
        width: 100%;
    }
    
    input[type=submit] {
        background-color: DodgerBlue;
        color: #fff;
        cursor: pointer;
    }
    
    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
    }
    
    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff; 
        border-bottom: 1px solid #d4d4d4; 
    }
    
    /*when hovering an item:*/
    .autocomplete-items div:hover {
        background-color: #e9e9e9; 
    }
    
    /*when navigating through the items using the arrow keys:*/
    .autocomplete-active {
        background-color: DodgerBlue !important; 
        color: #ffffff; 
    }
    .edu-loading.m-loading{
        position: absolute;
        height: 2px;
        top: 0;
        left: 0;
        right: 0;
        z-index: 20;
        animation: loadOn ease 1500ms;
        z-index: 30000;
        background:gold
    }

    @keyframes  loadOn {
        0%{
            width: 0%;
        }
        100%{
            width: 100%;
        }
    }
</style>
<?php $authe = Auth::user();?>
  <div class="content-wrapper">
      <div class="edu-loading"></div>
    <!-- Main content -->
    <section class="content">
              <!--mail inbox start-->
              <div class="mail-box">
                  <?php echo $__env->make('admin.messages.aside', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <aside class="lg-side">
                      <div class="inbox-head">
                          <h3><?php echo e(trans('message_lang.inbox')); ?></h3>
                            
                      </div>
                       
                          <table class="table table-inbox table-hover">
                            <tbody>
                                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="<?php if ($message->active == 0) { echo "unread"; } ?>">
                                        <td class="view-message  dont-show">
                                            <?php
                                            $sender = App\User::find($message->from);
                                            ?>
                                            <?php echo e($sender ? $sender->name : ''); ?>

                                        </td>
                                        <td class="view-message "><a href="<?php echo e(asset('messages/'.$message->id)); ?>"><?php echo e($message->title); ?></a></td>
                                        <td class="view-message  text-right"><?php echo e($message->created_at->format('d M,Y \a\t h:i a')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                          </table>
                      </div>
                  </aside>
              </div>
              <!--mail inbox end-->
          </section>
      </div>
      <!--main content end-->
<?php echo $__env->make('admin.messages.script', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>