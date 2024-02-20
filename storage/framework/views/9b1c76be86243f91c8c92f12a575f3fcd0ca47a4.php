<?php $__env->startSection('customStyles'); ?>
<link href="<?php echo e(asset('/plugins/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('plugins/bootstrap-sweetalert/sweet-alert.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('plugins/toastr/toastr.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(check_access(Auth::user()->id,'pages','_show')==1): ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Pages </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="<?php echo e(url('/admin/home')); ?>">Admin</a>
                    </li>
                    <li class="active">
                        Pages
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-box table-responsive">
                <?php if(Session::has('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e(Session::get('success')); ?></p>
                </div>
                <?php elseif(Session::has('error')): ?>
                <div class="alert alert-danger">
                    <p><?php echo e(Session::get('error')); ?></p>
                </div>
                <?php endif; ?>
                <div class="form-group pull-right" style="margin-bottom: 10px;">
                    
                    <?php if(check_access(Auth::user()->id,'pages','_create')==1): ?>
                    <a href="<?php echo e(route('createPage')); ?>" class="btn btn-primary btn-sm">New Page</a>
                    <?php endif; ?>
                </div>
                <h4 class="m-t-0 header-title"><b>Pages List</b></h4>                
                <table id="datatable" class="table hover">
                    <thead>
                    <tr>
                        <th>Page Title</th>
                        <th>URL</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($homepage)): ?>
                    <tr>
                        <td><b><?php echo e($homepage['title']); ?></b></td>
                        <td>/ <a href="<?php echo e(url('/')); ?>" target="_blank"><i class="fa fa-eye"></i></a></td>
                        <td></td>                        
                        <td><?php if(check_access(Auth::user()->id,'pages','_edit')==1): ?>
                            <a href="<?php echo e(route('editPage', $homepage['id'])); ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a> 
                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-home"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($value->title); ?></td>
                        <td>/<?php echo e($value->slug); ?> <a href="<?php echo e(route('dynamicPage', $value->slug)); ?>" target="_blank"><i class="fa fa-eye"></i></a></td>
                        <td><?php echo e($value->created_at); ?></td>
                        <td>
                            <?php if(check_access(Auth::user()->id,'pages','_edit')==1): ?><a href="<?php echo e(route('editPage',$value->id)); ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0);" data-title="<?php echo e($value->title); ?>" data-id="<?php echo e($value->id); ?>" class="btn btn-info btn-xs duplicateThis"><i class="fa fa-copy"></i></a>
                            <a href="<?php echo e(route('makeHomePage',$value->id)); ?>" class="btn btn-default btn-xs"><i class="fa fa-home"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<div id="duplicateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Duplicate Page</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo e(route('duplicatePage')); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

              <div class="form-group">
                  <input type="hidden" id="page-id" name="id">
                  <input type="text" class="form-control" name="title" id="page-title" required>
              </div>
              <div class="text-center">
                  <input type="submit" class="btn btn-success" value="Duplicate">
              </div>
          </form>
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
<script src="<?php echo e(asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/toastr/toastr.min.js')); ?>"></script>
<script type="text/javascript">
    $('#datatable').dataTable({
        sort:false,
    });
    $(document).on('click',".duplicateThis",function(){
        $("#page-id").val($(this).data('id'));
        $("#page-title").val("Copy of "+$(this).data('title'));
        $("#duplicateModal").modal("show");
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>