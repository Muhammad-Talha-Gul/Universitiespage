<?php $__env->startSection('customStyles'); ?>
<link href="<?php echo e(asset('plugins/bootstrap-sweetalert/sweet-alert.css')); ?>" rel="stylesheet" type="text/css">
<style type="text/css">
    .mails .mail-select {
        width: 1px;
        min-width: 0px;
        padding: 15px 0px 15px 20px;
    }

    .approve {
        background-color: #6E2789;
        color: white;
        padding: 5px;
        font-size: 12px;
        border-radius: 3px;
    }

    .n_approve {
        background-color: #dc3545;
        color: white;
        padding: 5px;
        font-size: 12px;
        border-radius: 3px;
    }

    .details-image {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .details-image-main {
        /* height: 300px; */
        width: 100%;
        position: relative;
    }

    .dowload-button {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #0B6D76;
        color: #fff;
        border: none;
        outline: none;
        box-shadow: none;
        border-radius: 5px;
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
                                <h4 class="m-t-0"><b>Online Consultant Detail</b></h4>

                                <hr />

                                <div style="font-size: 16px;">
                                    <b>Name: </b><?php echo e($consultant->student_name); ?> <br>
                                    <b>Email: </b><?php echo e($consultant->student_email); ?> <br>
                                    <b>Phone: </b><?php echo e($consultant->student_phone_number); ?> <br>
                                    <b>Nationality: </b> <?php echo e($consultant->student_country); ?><br>
                                    <b>State: </b> <?php echo e($consultant->student_state); ?><br>
                                    <b>City: </b> <?php echo e($consultant->student_city); ?><br>
                                    <b>Apply For: </b> <?php echo e($consultant->student_apply_for); ?><br>
                                    <b>Created At: </b> <?php echo e(date('dS M, Y h:i a',strtotime($consultant->created_at))); ?><br><br>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5 class="details-image-heading ml-2">Passport Image:</h5>
                                            <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2" style="min-width: 280px; margin-bottom:20px;">
                                                <div class="details-image-main">
                                                    <!-- Display passport image -->
                                                    <?php if($consultant->student_passport_image): ?>
                                                    <img src="<?php echo e(asset('uploads/images/' . $consultant->student_passport_image)); ?>" alt="Passport Image" class="details-image" id="passportImage"><br>
                                                    <button onclick="downloadPassportImage('passportImage')" class="dowload-button"><i class="fa fa-download"></i></button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 mt-3">
                                            <h5 class="details-image-heading">Last Education Image:</h5>
                                            <?php if($consultant->student_last_education_image): ?>
                                            <?php $__currentLoopData = json_decode($consultant->student_last_education_image, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2" style="min-width: 280px; margin-bottom:20px;">
                                                <!-- <h5 class="details-image-heading">Last Education Image:</h5> -->
                                                <div class="details-image-main">
                                                    <!-- Display last education images -->
                                                    <div class="details-image-item">
                                                        <img src="<?php echo e(asset('uploads/images/' . $image)); ?>" alt="Last Education Image" class="details-image">
                                                        <button onclick="downloadEducationImage('<?php echo e(asset('uploads/images/' . $image)); ?>', '<?php echo e($image); ?>')" class="dowload-button"><i class="fa fa-download"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>

                                    </div>

                                    <!-- <?php if(check_access(Auth::user()->id,'student','_delete')==1): ?>
                                            <a style="cursor:pointer;" id="deleteIt" class="btn btn-<?php echo e(($data->active == 1)?'danger':'success'); ?> waves-effect waves-light w-md m-b-30"><i class="fa fa-power-off m-r-10"></i><?php echo e(($data->active == 1)?'In Active':'Active'); ?></a>
                                            <form id="del_form" action="<?php echo e(route('student.destroy', $data->id)); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>

                                            </form>
                                        <?php endif; ?> -->


                                </div>
                                <!-- card-box -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-right">
                                    <a href="<?php echo e(route('applied-consultant')); ?>" class="btn btn-primary waves-effect waves-light w-md m-b-30"><i class="fa fa-arrow-left m-r-10"></i>Back</a>

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
    $("#deleteIt").click(function() {
        swal({
            title: "Are you sure?",
            // text: "",
            type: "warning",
            showCancelButton: true,
            cancelButtonClass: 'btn-default btn-md waves-effect',
            confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
            confirmButtonText: 'Yes!',
        }, function() {
            $("#del_form").submit();
        });
    });

    function downloadPassportImage(imageId) {
        var imageElement = document.getElementById(imageId);
        if (imageElement) {
            var imageUrl = imageElement.src;
            var originalFilename = imageUrl.substring(imageUrl.lastIndexOf('/') + 1);
            var currentDate = new Date();
            var uniqueFilename = 'passport_' + currentDate.getTime() + '.' + originalFilename.split('.').pop();
            var downloadLink = document.createElement('a');
            downloadLink.href = imageUrl;
            downloadLink.download = uniqueFilename;
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        } else {
            console.error("Image element with ID " + imageId + " not found.");
        }
    }

    function downloadEducationImage(imageUrl, originalFilename) {
        var currentDate = new Date();
        var uniqueFilename = 'last_education_' + currentDate.getTime() + '.' + originalFilename.split('.').pop();
        var downloadLink = document.createElement('a');
        downloadLink.href = imageUrl;
        downloadLink.download = uniqueFilename;
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>