<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </head>

  <body>

	

    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

	<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<?php echo $__env->make('partials.footer-script', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


  </body>
</html>
