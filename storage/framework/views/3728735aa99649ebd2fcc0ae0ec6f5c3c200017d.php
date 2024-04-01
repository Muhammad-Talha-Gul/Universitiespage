<?php $__env->startSection('customStyles'); ?>
<link href="<?php echo e(asset('/plugins/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('plugins/bootstrap-sweetalert/sweet-alert.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('plugins/toastr/toastr.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
    .loader {
        float: right;
        margin-left: 10px;
    }
</style>
<?php if(check_access(Auth::user()->id,'additionals','_show')==1): ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">University </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="<?php echo e(url('/admin/home')); ?>">Universities Contact Logs </a>
                    </li>
                    <li class="active">
                        University
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
                
                <h4 class="m-t-0 header-title"><b>University List</b></h4>                
                <table id="datatable" class="table hover">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Student Email</th>
                      <th>Course</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="<?php echo e(($value->is_read==1)?'':'unread'); ?>" id="recorddel<?php echo $value->id; ?>">
                                        <td>
                                            <?php echo $i; $i = $i+1; ?>
                                        </td>
                                        
                                        <td>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value->student_id == $user->id) {

                                                echo $user->email;

                                            }?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>

                                        <td>
                                           <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value->university_id == $university->id) {

                                                echo $university->name;

                                            }?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>

                                        <td class="text-right" style="width: 180px;">
                                            <?php echo e(($value->created_at!==null)?date_format($value->created_at,'d/m/Y g:i A'):'-'); ?>

                                        </td>
                                        <td>
                                          <button class="btn btn-danger fa fa-trash" onclick="delete_record('<?php echo $value->id; ?>')"></button>
                                        </td>
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
<script src="<?php echo e(asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/toastr/toastr.min.js')); ?>"></script>
<script type="text/javascript">
    $('#datatable').dataTable({
        sort:false,
    });

</script>


<script>

    function delete_record(id) {

        var c_id = id;
        var linktodelete = '/delete_contactbtn/'+c_id+'';

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this!",
            type: "error",
            showCancelButton: true,
            cancelButtonClass: 'btn-default btn-md waves-effect',
            confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
            confirmButtonText: 'Delete!',
        },function() {
          $.ajax({
            type: 'GET',
            url: linktodelete,   
            data: {},
            dataType: "json",
            success: function (data) {
 
              if (data.message == 'success') {

              document.getElementById("recorddel"+c_id).style.display = 'none';
              swal("Success!", data.message_text, "success");

              } 
              else {

               swal("Failure!", data.message_text, "error");

              }

            }   
          });
        });
    }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>