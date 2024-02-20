<div class="section paddingbot-clear mb-3">
   <div class="container">
      <div class="top-description-container ">
         <p class="top-description">
            Looking for help to choose Countries and their admission process. We will give you detail information here.
         </p>
      </div>
   </div>
</div>
<div class="clearfix"></div>


<div class="container-fluid">
   <div class="gide-top-image-container">
      <img src="<?php echo e(url('/filemanager/photos/1/new_style')); ?>/gide-banner.jpg" width="100%" class="guide-banner-image">
   </div>
</div>

<?php if(isset($meta['university'])): ?>
<div class="container-fluid py-5 mb-5">
   <section class="container">
      <!-- <h2 class="h4 gide-heading"><?php echo e(($meta['title1'])??''); ?></h2> -->
      <div class="po_un_col1 mb-5 text-center">
         <h3 class="section-heading ">Countries
            <span>Guides</span>
         </h3>
      </div>
      <div class="card-columns text-center">
         <?php $__currentLoopData = getGuide('university'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

         <a href="<?php echo e(url(('guides/'.$guide->slug)??'#')); ?>">
            <article class="card gide-card">
               <div class="guide-card-image-main">
                  <img class="card-img-top" src="<?php echo e(url((fix($guide->image))??iph())); ?>" data-echo="<?php echo e(url((fix($guide->image))??iph())); ?>" alt="<?php echo e(($guide->title)??''); ?>">
               </div>
               <div class="p-2 headingguide"><?php echo e(($guide->title)??''); ?></div>
            </article>
         </a>

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
   </section>
</div>
<?php endif; ?>
<?php if(isset($meta['subject'])): ?>
<section class="container c-bulletLists mb-5">
   <!-- <h2 id="subject" class="h4 gide-heading"><?php echo e(($meta['title2'])??''); ?></h2> -->
   <div class="po_un_col1 mb-5 text-center">
      <h3 class="section-heading ">Subject
         <span>Guides</span>
      </h3>
   </div>
   <div class="o-2colLayout">
      <ul class="o-2colLayout-content c-lg-colCount-2">

         <?php $__currentLoopData = getGuide('subject'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php if(isset($guide->subject)): ?>
         <li><a href="<?php echo e(url(('guides/'.$guide->slug)??'#')); ?>"><?php echo e(($guide->subject->name)??''); ?></a></li>
         <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
   </div>
</section>
<?php endif; ?>