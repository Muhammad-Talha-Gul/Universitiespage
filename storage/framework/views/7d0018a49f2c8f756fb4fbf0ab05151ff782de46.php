
<?php $__env->startSection('title','404 Error'); ?>
<?php $__env->startSection('customStyles'); ?>
<style type="text/css">
	@media  only screen and (min-device-width : 320px) and (max-device-width : 480px) {
		.page-not-found h2 {
			font-size: 30px;
		}
		.page-not-found h3 {
		    margin-bottom: 2em;
		}
	}
</style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content-wrapper">
  <div class="container" style="margin: 10px;margin-bottom: 50px;">
    <div class="std">
      <div class="page-not-found wow bounceInRight animated">
        <h2>Something went wrong!!!</h2>
        <h3>Go back and make sure every thing is alright</h3>
        <div><a href="<?php echo e(URL::previous()); ?>" class="btn-home"><span>Go Back</span></a></div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>