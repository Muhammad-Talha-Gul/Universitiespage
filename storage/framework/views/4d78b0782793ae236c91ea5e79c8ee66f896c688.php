<table class="table hover">
    <thead>
    <tr>
        <th>Title</th>
        <th>Created at</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
	    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    <tr>
	        <td><?php echo e($new->title); ?></td>
	        <td><?php echo e($new->created_at); ?></td>
	        <td>
	            <a href="javascript:void(0);" data-toggle="modal" data-target="#editNews" data-id="<?php echo e($new->id); ?>" class="btn btn-warning btn-xs edit_news"><i class="fa fa-pencil"></i></a>
	            <a class="btn btn-danger btn-xs " onclick="deleteNews('<?php echo e($new->id); ?>');"><i class="fa fa-trash"></i></a>

	        </td>
	    </tr>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>