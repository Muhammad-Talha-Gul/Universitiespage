<?php if(count($reviews)>0): ?>
	<?php if(auth()->check()): ?>
	<?php $__currentLoopData = $reviews->where('user_id', auth()->user()->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<a href="javascript:void(0);" class="o-blockLink">
		  <article class="c-bgLight-hoverDark border rounded p-3 mb-3 p-relative" style="background-color:#ffffff;border: 1px solid #c52228!important;">
		    <header class="pb-2">
		      <span class="text-primary">
		         <?php for($i=0; $i<$review->stars; $i++): ?><i class="fa fa-star-o"></i><?php endfor; ?>
		        <span class="sr-only"><?php echo e($review->stars); ?>/5</span>
		      </span>
		    </header>
		    <div class="text-muted small">By You - <?php echo e(date("dS M, Y h:i a", strtotime($review->created_at))); ?></div>
		    <span class="font-italic read-less">
		      <?php echo implode(' ', array_slice(str_word_count($review->review, 2), 0, 20)); ?>

		    </span>
		    <span class="font-italic read-more" style="display: none;">
		      <?php echo e($review->review); ?>

		    </span>
		    <?php if(str_word_count($review->review)>=20): ?>
		    <small class="text-primary read-more-btn">... Read more</small>
		    <?php endif; ?>
		    <span class="remove-approval" onclick="deleteReview(<?php echo e($review->id); ?>, <?php echo e($review->university_id); ?>)"> Remove</span>
		  </article>
		</a>
		<div class="clearfix"></div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
	<?php $__currentLoopData = $reviews->where('user_id','!=', (auth()->user()->id)??'0'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<a href="javascript:void(0);" class="o-blockLink">
		  <article class="c-bgLight-hoverDark border rounded p-3 mb-3 p-relative">
		    <header class="pb-2">
		      <span class="text-primary">
		         <?php for($i=0; $i<$review->stars; $i++): ?><i class="fa fa-star-o"></i><?php endfor; ?>
		        <span class="sr-only"><?php echo e($review->stars); ?>/5</span>
		      </span>
		    </header>
		    <div class="text-muted small">By <?php echo e($review->users->students->name); ?> - <?php echo e(date("dS M, Y h:i a", strtotime($review->created_at))); ?></div>
		    <span class="font-italic read-less">
		      <?php echo implode(' ', array_slice(str_word_count($review->review, 2), 0, 20)); ?>

		    </span>
		    <span class="font-italic read-more" style="display: none;">
		      <?php echo e($review->review); ?>

		    </span>
		    <?php if(str_word_count($review->review)>=20): ?>
		    <small class="text-primary read-more-btn">... Read more</small>
		    <?php endif; ?>
		  </article>
		</a>
		<div class="clearfix"></div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<p class="not-found">No Reviews</p>
<?php endif; ?>