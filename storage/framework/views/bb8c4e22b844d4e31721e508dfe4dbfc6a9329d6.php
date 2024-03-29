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
<?php if(check_access(Auth::user()->id,'student','_show')==1): ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Student </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="<?php echo e(url('/admin/home')); ?>">Admin</a>
                    </li>
                    <li class="active">
                        Student
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
                    
                    <?php if(check_access(Auth::user()->id,'student','_create')==1): ?>
                    
                    <?php endif; ?>
                </div>
                <h4 class="m-t-0 header-title"><b>Student List</b>
            
                <a style="margin-left: 30px;" class="btn btn-success" onclick="download_to_excel()">Export Excel</a>
            </h4>   
            
            <table id="datatableall" style="display: none;" class="table hover">
                    <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Emails</th>
                        <th>Mobile</th>
                        <th>Nationality</th>
                        <th>Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    	
                        <td><?php echo e(($value->students->name)??''); ?></td>
                        <td><?php echo e($value->email); ?></td>
                        <td><?php echo e($value->phone); ?></td>
                        <td><?php echo e($value->country); ?></td>
                        <td><?php echo e(date('dS M, Y h:i a',strtotime($value->created_at))); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </tbody>
                </table>

                <table id="datatable" class="table hover">
                    <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Emails</th>
                        <th>Mobile</th>
                        <th>Nationality</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    	
                        <td><?php echo e(($value->students->name)??''); ?></td>
                        <td><?php echo e($value->email); ?></td>
                        <td><?php echo e($value->phone); ?></td>
                        <td><?php echo e($value->country); ?></td>
                        <td><?php echo e(date('dS M, Y h:i a',strtotime($value->created_at))); ?></td>
                        <td>
                            <?php if(check_access(Auth::user()->id,'student','_show')==1): ?><a href="<?php echo e(route('student.show',($value->students->id)??'')); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
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
    function deleteit(id) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this!",
            type: "error",
            showCancelButton: true,
            cancelButtonClass: 'btn-default btn-md waves-effect',
            confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
            confirmButtonText: 'Delete!',
        },function() {
              $("#delete-form-"+id).submit();
        });
    }
    $(document).on('change','.mark_featured',function(){
        var $loader = $(this).parent().find('.loader');
        $loader.html("<i class='fa fa-refresh fa-spin'></i>");
        var data = { '_token':"<?php echo e(csrf_token()); ?>", 'id':$(this).data('id') };
        jQuery.ajax({
            url:'<?php echo e(route("ajaxPopularUniversity")); ?>',
            type: 'post',
            dataType: 'html',
            data: data,
            success: function( data ){
                $loader.html("");
            }
        });
    });
</script>

<script>

function download_to_excel()
{ 

var tab_text="<table><tr>";
var textRange = ''; 
var j=0;
var tab = document.getElementById('datatableall'); // id of table

for(j = 0 ; j < tab.rows.length ; j++) 
{     
    tab_text += tab.rows[j].innerHTML+"</tr>";
}

tab_text +="</table>";

var a = document.createElement('a');
var data_type = 'data:application/vnd.ms-excel';
a.href = data_type + ', ' + encodeURIComponent(tab_text);
//setting the file name
a.download = 'export.xls';
//triggering the function
a.click();
//just in case, prevent default behaviour
e.preventDefault();

}

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>