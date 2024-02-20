
 <style type="text/css">
   
.headingguide {
    padding: 0.5rem!important;
    font-weight: 600;
    background: #0B6D76;
    color: white;
}

 </style>


 <div class="container-fluid">
   <img src="<?php echo e(url('/filemanager/photos/1/new_style')); ?>/gide-banner.jpg" width="100%">
 </div>

 <?php if(isset($meta['university'])): ?>
    <div class="container-fluid bg-light py-5 mb-5">
         <section class="container">
            <h2 class="h4 mb-3"><?php echo e(($meta['title1'])??''); ?></h2>
            <div class="card-columns text-center">
        <?php $__currentLoopData = getGuide('university'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <a href="<?php echo e(url(('guides/'.$guide->slug)??'#')); ?>">
                  <article class="card">
                     <img class="card-img-top" src="<?php echo e(url((fix($guide->image))??iph())); ?>" data-echo="<?php echo e(url((fix($guide->image))??iph())); ?>" width="400" height="122" alt="<?php echo e(($guide->title)??''); ?>" style="object-fit: cover;object-position: center;">
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
           <h2 id="subject" class="h4"><?php echo e(($meta['title2'])??''); ?></h2>
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
