<?php $__env->startSection('customStyles'); ?>
<link href="<?php echo e(asset('plugins/bootstrap-sweetalert/sweet-alert.css')); ?>" rel="stylesheet" type="text/css">
<style type="text/css">
    .mails .mail-select {
        width: 1px;
        min-width: 0px;
        padding: 15px 0px 15px 20px;
    }
    .approve{
        background-color: #6E2789;
        color:white;
        padding: 5px;
        font-size: 12px;
        border-radius: 3px;
    }
    .n_approve{
        background-color:#dc3545;
        color:white;
        padding: 5px;
        font-size: 12px;
        border-radius: 3px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(check_access(Auth::user()->id,'student','_view')==1): ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Consultant </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="<?php echo e(url('/admin/home')); ?>">Admin</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin_consultant')); ?>">Consultant Detail</a>
                    </li>
                    <li class="active">
                        Consultant
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
    <div class="row">
        <div class="col-xs-12">
            <div class="mails">

                <div class="table-box">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box m-t-20">
                                    <h4 class="m-t-0"><b>Consultant Detail</b></h4>

                                    <hr/>

                                    <div style="font-size: 16px;">
                                        <b>Name: </b><?php echo e($data->name); ?> <br>
                                        <b>Email: </b><?php echo e($data->email); ?> <br>
                                        <b>Phone: </b><?php echo e($data->phone); ?> <br>
                                        <b>Company Name: </b><?php echo e($data->company_name); ?> <br>
                                        <b>Number Of EMployees: </b> <?php echo e($data->employeeno); ?><br>
                                        <b>Nationality: </b> <?php echo e($data->nationality); ?><br>
                                        <b>State: </b> <?php echo e($data->state); ?><br>
                                        <b>City: </b> <?php echo e($data->city); ?><br>
                                        <b>Address: </b> <?php echo e($data->address); ?><br>
                                        <b>Dsignation: </b> <?php echo e($data->designation); ?><br>
                                        <b>Comment: </b> <?php echo e($data->comment); ?><br>
                                        <b>Created At: </b> <?php echo e(date('dS M, Y h:i a',strtotime($data->created_at))); ?><br><br>
    
                                        <!-- <?php if(check_access(Auth::user()->id,'student','_delete')==1): ?>
                                            <a style="cursor:pointer;" id="deleteIt" class="btn btn-<?php echo e(($data->active == 1)?'danger':'success'); ?> waves-effect waves-light w-md m-b-30"><i class="fa fa-power-off m-r-10"></i><?php echo e(($data->active == 1)?'In Active':'Active'); ?></a>
                                            <form id="del_form" action="<?php echo e(route('student.destroy', $data->id)); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>

                                            </form>
                                        <?php endif; ?> -->
                                    </div>
                                </div>
                                <!-- card-box -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-right">
                                    <a href="<?php echo e(route('student.index')); ?>" class="btn btn-primary waves-effect waves-light w-md m-b-30"><i class="fa fa-arrow-left m-r-10"></i>Back</a>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- End row -->

                    </div> <!-- table detail -->
                </div>
                <!-- end table box -->

            </div> <!-- mails -->
        </div>
    </div>
</div>
<?php else: ?>
<?php $__env->startComponent('admin.access-denied'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('customScripts'); ?>
<script src="<?php echo e(asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')); ?>"></script>
<script type="text/javascript">
    $("#deleteIt").click(function(){
        swal({
                title: "Are you sure?",
                // text: "",
                type: "warning",
                showCancelButton: true,
                cancelButtonClass: 'btn-default btn-md waves-effect',
                confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
                confirmButtonText: 'Yes!',
            },function() {
                  $("#del_form").submit();
            });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>