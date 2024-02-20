<?php $__env->startSection('title',(isset($data['seo']->meta_title))?$data['seo']->meta_title:$data['title']); ?>
<?php $__env->startSection('seo'); ?>
  <?php if(isset($data['seo']->show_meta)): ?>
  <meta name="keywords" content="<?php echo isset($data['seo']->meta_keywords) ? $data['seo']->meta_keywords : ''; ?>">
  <meta name="description" content="<?php echo isset($data['seo']->meta_description) ? $data['seo']->meta_description : ''; ?>">
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('customStyles'); ?>
<style type="text/css">
  <?php echo (isset($data['custom_css']))?$data['custom_css']:''; ?>

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div class="bg-light">
      <?php if(request()->path()!=='/' && request()->path()!==null): ?>
      <nav class="container o-breadcrumb top-link-main">
        <a class="o-breadcrumb-item top-link" href="<?php echo e(url('/')); ?>">Home</a>
        <a class="o-breadcrumb-item top-link" href="<?php echo e(url($data->slug)); ?>"><?php echo e($data->title); ?></a>
      </nav>
      <?php endif; ?>
        
      <?php $__currentLoopData = $components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

        <?php if($value->type=='search'): ?>

          <?php $__env->startComponent('frontend.components.search',['meta'=>$value->meta]); ?> <?php echo e($value->title); ?> <?php echo $__env->renderComponent(); ?>

        <?php elseif($value->type=="buttons"): ?>

          <?php $__env->startComponent('frontend.components.buttons',['meta'=>$value->meta]); ?> <?php echo e($value->title); ?> <?php echo $__env->renderComponent(); ?>
        
        <?php elseif($value->type=="programs"): ?>
          <?php $__env->startComponent('frontend.components.programs',['meta'=>$value->meta]); ?> <?php echo e($value->title); ?> <?php echo $__env->renderComponent(); ?>

        <?php elseif($value->type=="editor"): ?>
          <?php $__env->startComponent('frontend.components.editor',['class'=>$key,'meta'=>$value->meta]); ?> <?php echo e($value->title); ?> <?php echo $__env->renderComponent(); ?>

        <?php elseif($value->type=="banner"): ?>

          <?php $__env->startComponent('frontend.components.banner',['class'=>$key,'meta'=>$value->meta,'blog'=>(isset($blog))?$blog:null]); ?> <?php echo e($value->title); ?> <?php echo $__env->renderComponent(); ?>

        <?php elseif($value->type=="blog"): ?>
          <?php $__env->startComponent('frontend.components.blog',['class'=>$key,'meta'=>$value->meta,'blog'=>(isset($blog))?$blog:null]); ?> <?php echo e($value->title); ?> <?php echo $__env->renderComponent(); ?>
        <?php elseif($value->type=="guide"): ?>
          <?php $__env->startComponent('frontend.components.guide',['class'=>$key,'meta'=>$value->meta,'blog'=>(isset($blog))?$blog:null]); ?> <?php echo e($value->title); ?> <?php echo $__env->renderComponent(); ?>

        <?php elseif($value->type=="popular"): ?>
          <?php $__env->startComponent('frontend.components.popular',['class'=>$key,'meta'=>$value->meta]); ?> <?php echo e($value->title); ?> <?php echo $__env->renderComponent(); ?>

        <?php elseif($value->type=="consultant"): ?>
          <?php $__env->startComponent('frontend.components.consultant',['class'=>$key,'meta'=>$value->meta]); ?> <?php echo e($value->title); ?> <?php echo $__env->renderComponent(); ?>

        <?php elseif($value->type=="institution"): ?>
          <?php $__env->startComponent('frontend.components.institution',['class'=>$key,'meta'=>$value->meta]); ?> <?php echo e($value->title); ?> <?php echo $__env->renderComponent(); ?>

        <?php elseif($value->type=="contact"): ?>
          <?php $__env->startComponent('frontend.components.contact',['class'=>$key,'meta'=>$value->meta]); ?> <?php echo e($value->title); ?> <?php echo $__env->renderComponent(); ?>

        <?php elseif($value->type=="login"): ?>
          <?php $__env->startComponent('frontend.components.login',['class'=>$key,'meta'=>$value->meta]); ?> <?php echo e($value->title); ?> <?php echo $__env->renderComponent(); ?>

        <?php elseif($value->type=="register"): ?>
          <?php $__env->startComponent('frontend.components.register',['class'=>$key,'meta'=>$value->meta]); ?> <?php echo e($value->title); ?> <?php echo $__env->renderComponent(); ?>

        <?php elseif($value->type=="courses"): ?>
          <?php $__env->startComponent('frontend.components.courses',['class'=>$key,'meta'=>$value->meta]); ?> <?php echo e($value->title); ?> <?php echo $__env->renderComponent(); ?>

        <?php elseif($value->type=="spacer"): ?>
          <?php if(isset($value->meta['style']) && $value->meta['style']==2): ?>
          <hr style="clear: both; margin-top: <?php echo e(isset($value->meta['space']) ? $value->meta['space'] : 0); ?>px;">
          <?php else: ?>
          <div class="spacer" style="display: block; clear: both; margin-top: <?php echo e(isset($value->meta['space']) ? $value->meta['space'] : 0); ?>px "></div>
          <?php endif; ?>

        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>