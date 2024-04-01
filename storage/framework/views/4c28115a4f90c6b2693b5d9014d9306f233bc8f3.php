<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Editor
            </h3>
            <div class="portlet-widgets">
                <a data-toggle="collapse" data-parent="#<?php echo e($rand); ?>" href="#<?php echo e($rand); ?>" class="collapsed" aria-expanded="true"><i class="ion-minus-round"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="<?php echo e($rand); ?>" class="panel-collapse collapse" aria-expanded="true" style="">
            <div class="portlet-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="text" name="components[<?php echo e($rand); ?>][editor][title]" class="form-control" placeholder="Title/Heading" value="<?php echo e(isset($slot) ? $slot : ''); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <select class="form-control columns_selection" name="components[<?php echo e($rand); ?>][editor][columns]" data-rand="<?php echo e($rand); ?>" data-placement="<?php echo e('columns_'.$rand); ?>">
                            <option value="1" <?php if(isset($meta['columns'])): ?> <?php echo e(($meta['columns']==1)?'selected':''); ?> <?php endif; ?>>1 Column</option>
                            <option value="2" <?php if(isset($meta['columns'])): ?> <?php echo e(($meta['columns']==2)?'selected':''); ?> <?php endif; ?>>2 Columns</option>
                            <option value="3" <?php if(isset($meta['columns'])): ?> <?php echo e(($meta['columns']==3)?'selected':''); ?> <?php endif; ?>>3 Columns</option>
                            <option value="4" <?php if(isset($meta['columns'])): ?> <?php echo e(($meta['columns']==4)?'selected':''); ?> <?php endif; ?>>4 Columns</option>
                            <option value="5" <?php if(isset($meta['columns'])): ?> <?php echo e(($meta['columns']==5)?'selected':''); ?> <?php endif; ?>>5 Columns</option>
                            <option value="6" <?php if(isset($meta['columns'])): ?> <?php echo e(($meta['columns']==6)?'selected':''); ?> <?php endif; ?>>6 Columns</option>
                        </select>
                    </div>
                    <div id="columns_<?php echo e($rand); ?>">
                        <?php if(isset($meta['columns'])): ?>
                        <?php for($i=1;$i<=$meta['columns'];$i++): ?>
                        <div class="form-group col-md-12">
                            <textarea class="summernote" name="components[<?php echo e($rand); ?>][editor][content_<?php echo e($i); ?>]"><?php echo e(isset($meta['content_'.$i]) ? $meta['content_'.$i] : ''); ?></textarea>
                        </div>
                        <?php endfor; ?>
                        <?php else: ?>
                        <div class="form-group col-md-12">
                            <textarea class="summernote" name="components[<?php echo e($rand); ?>][editor][content_1]"><?php echo e(isset($meta['content_1']) ? $meta['content_1'] : ''); ?></textarea>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
            </div>
        </div>
    </div>
</div>