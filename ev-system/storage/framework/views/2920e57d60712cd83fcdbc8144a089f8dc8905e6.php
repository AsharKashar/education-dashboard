<?php if( !$sections->count() ): ?>
<option> There is no section for this class.</option>
<?php else: ?> 
    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($section->id); ?>"><?php echo e($section->title); ?></option>                 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>