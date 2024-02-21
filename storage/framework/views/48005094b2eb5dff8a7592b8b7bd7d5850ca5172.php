<!-- <div class="section paddingbot-clear <?php if(isset($meta['styled']) && $meta['styled']==1): ?> regular_service_area <?php endif; ?>">
  <div class="<?php if(isset($meta['full_width']) && $meta['full_width']==1): ?> <?php else: ?> container <?php endif; ?>">
     <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <?php if(isset($slot)): ?><h3><?php echo e(isset($slot) ? $slot : ''); ?></h3><?php endif; ?>
      </div>
      <?php if(isset($meta['columns'])): ?>
      <?php for($i=1;$i<=$meta['columns'];$i++): ?>
      <div class="col-sm-12 col-md-<?php echo e(12/(int)$meta['columns']); ?> col-lg-<?php echo e(12/(int)$meta['columns']); ?>">
        <?php echo isset($meta['content_'.$i]) ? $meta['content_'.$i] : ''; ?>

      </div>
      <?php endfor; ?>
      <?php else: ?>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <?php echo isset($meta['content_1']) ? $meta['content_1'] : ''; ?>

      </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<div class="clearfix"></div> -->