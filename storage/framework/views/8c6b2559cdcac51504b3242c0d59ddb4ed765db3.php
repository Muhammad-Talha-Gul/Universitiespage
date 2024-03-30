<?php $__env->startSection('customStyles'); ?>
<link href="<?php echo e(asset('/plugins/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>\
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(check_access(Auth::user()->id,'users','_show')==1): ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Users </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="<?php echo e(url('/admin/home')); ?>">Admin</a>
                    </li>
                    <li class="active">
                        All Users
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card-box table-responsive">
                <?php if(check_access(Auth::user()->id,'users','_create')==1): ?>
                <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary btn-md pull-right" style="margin-bottom: 10px;">Add User</a>
                <?php endif; ?>
                <h4 class="m-t-0 header-title"><b>Users List</b></h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control filter-role selectable">
                                <option value="">All Users</option>
                            </select>
                        </div>
                    </div>
                </div>
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th id="filter-role">Role</th>
                        <th>Created at</th>
                        <?php if(check_access(Auth::user()->id,'users','_edit')==1): ?>
                        <th>Action</th>
                        <?php endif; ?>
                    </tr>
                    </thead>

                    <tbody>
                	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	<tr>
                        <td><?php if(empty($value->image)): ?>
                            No Image
                            <?php else: ?>
                            <img src="<?php echo e(url($value->image)); ?>" width="50">
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($value->first_name.' '.$value->last_name); ?></td>
                		<td><?php echo e($value->email); ?></td>
                        <td><?php echo e($value->phone); ?></td>
                		<td><?php echo e(isset($value->group->name) ? $value->group->name : 'Administrator'); ?></td>
                        <td><?php echo e($value->created_at); ?></td>
                        <?php if(check_access(Auth::user()->id,'users','_edit')==1): ?>
                		<td><a href="<?php echo e(route('users.edit',$value->id)); ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a></td>
                        <?php endif; ?>
                	</tr>
                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
		</div>
	</div>

</div>
<?php else: ?>
<?php $__env->startComponent('admin.access-denied'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('customScripts'); ?>
<script src="<?php echo e(asset('/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.js')); ?>"></script>
<script type="text/javascript">
	$('#datatable').dataTable({
        initComplete: function () {
            this.api().columns('#filter-role').every( function () {
                var column = this;
                var select = $('.filter-role')
                    //.appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var search = [];

                          $.each($('.filter-role option:selected'), function(){
                              search.push($(this).val());
                          });
                          
                          search = search.join('|');
                        column
                            .search( search, true, false )
                            .draw();
                    } );
                column.data().unique().sort().each( function ( d, j ) {
                    if(d!="")
                    {
                      select.append( '<option value="'+d+'">'+d+'</option>' )
                    }
                });
            });
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>