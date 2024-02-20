<?php $__env->startSection('customStyles'); ?>
<link href="<?php echo e(asset('/plugins/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
    table{
      margin: 0 auto;
      width: 100%;
      clear: both;
      border-collapse: collapse;
      table-layout: fixed; 
      word-wrap:break-word;
    }
    .loader {
        float: right;
        margin-left: 10px;
    }
</style>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Visa Countires </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="<?php echo e(url('/admin/home')); ?>">Admin</a>
                    </li>
                    <li class="active">
                        All Visa Countries
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card-box table-responsive">
              
                <a href="<?php echo e(route('visacountries.create')); ?>" class="btn btn-primary btn-md pull-right" style="margin-bottom: 10px;">Add Visa Country</a>
              
                <h4 class="m-t-0 header-title"><b>Visa Countries List</b></h4>

                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	<tr>
                        <td><?php if(empty($value->country_image)): ?>
                            No Image
                            <?php else: ?>
                            <img src="<?php echo e(url($value->country_image)); ?>" width="100">
                            <?php endif; ?>
                        </td>
                		<td><?php echo e($value->country_name); ?></td>
                        <td><?php echo e($value->created_at); ?></td>
                		<td><a href="<?php echo e(route('visacountries.edit',$value->id)); ?>" class="btn btn-warning btn-md">Edit</a></td>
                	</tr>
                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
		</div>
	</div>

</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('customScripts'); ?>
<script src="<?php echo e(asset('/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.js')); ?>"></script>
<script type="text/javascript">
	$('#datatable').dataTable();
    $(document).on('change','.mark_featured',function(){
        var $loader = $(this).parent().find('.loader');
        $loader.html("<i class='fa fa-refresh fa-spin'></i>");
        var data = { '_token':"<?php echo e(csrf_token()); ?>", 'id':$(this).data('id') };
        jQuery.ajax({
            url:'<?php echo e(url("admin/ajax-popular-blog")); ?>',
            type: 'post',
            dataType: 'html',
            data: data,
            success: function( data ){
                $loader.html("");
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>