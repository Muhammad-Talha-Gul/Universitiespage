<?php $__env->startSection('customStyles'); ?>
<link href="<?php echo e(asset('/plugins/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('plugins/bootstrap-sweetalert/sweet-alert.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('plugins/toastr/toastr.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
    .loader {
        float: right;
        margin-left: 10px;
    }

    .name-left {
        font-weight: 600;
        margin-right: 5px;
    }

    .message-name {
        margin-bottom: 10px;
    }

    .message-modal-main {
        margin-bottom: 20px;
    }

    .reply-textarea {
        resize: none;
        overflow: hidden;
    }

    .reply-button-main {
        max-width: max-content;
        margin: 30px auto 0px;
    }

    .reply-button {
        padding: 7px 20px !important;
        margin-right: 8px;
    }
</style>
<?php if(check_access(Auth::user()->id,'student','_show')==1): ?>
<div class="container">
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Consultant </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="<?php echo e(url('/admin/home')); ?>">Admin</a>
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
        <div class="col-md-12">
            <div class="card-box table-responsive">
            </div>
            <h4 class="m-t-0 header-title"><b>Consultant List</b></h4>
            <table id="datatable" class="table hover">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Message Reason</th>
                        <th>Mesaage</th>
                        <!-- <th>Message sent Date</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(($message->user_name)??''); ?></td>
                        <td><?php echo e($message->user_email); ?></td>
                        <td><?php echo e($message->message_reason); ?></td>
                        <td style="max-width: 200px;  white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo e($message->message); ?></td>
                        <!-- <td><?php echo e(date('dS M, Y h:i a',strtotime($value->created_at))); ?></td> -->
                        <td>
                            <!-- <?php if(check_access(Auth::user()->id,'student','_show')==1): ?><a href="<?php echo e(route('consultant-details', ['id' =>$message->id])); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a> -->
                            <?php endif; ?>
                            <?php if(check_access(Auth::user()->id,'student','_show')==1): ?><a href="<?php echo e(route('message-delete', ['id' =>$message->id])); ?>" class="btn btn-info btn-xs"><i class="fa fa-trash"></i></a>
                            <?php endif; ?>

                            <?php if(check_access(Auth::user()->id,'student','_show')==1): ?>
                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#replyModal<?php echo e($message->id); ?>">
                                <i class="fa fa-eye"></i> Reply
                            </button>
                            <?php endif; ?>
                            <!-- <?php if(check_access(Auth::user()->id,'student','_show')==1): ?><a href="<?php echo e(route('show_consultant_student',($value->id)??'')); ?>" class="btn btn-info btn-xs"><i class="fa fa-user"> Students</i></a>
                            <?php endif; ?> -->

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<!-- Modal -->
<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="replyModal<?php echo e($message->id); ?>" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replyModalLabel">Mesaage Details and Reply</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="message-modal-main">
                    <div class="message-name">
                        <span class="name-left">Name:</span>
                        <span class="name-right"><?php echo e(($message->user_name)??''); ?></span>
                    </div>
                    <div class="message-name">
                        <span class="name-left">Email:</span>
                        <span class="name-right"><?php echo e(($message->user_email)??''); ?></span>
                    </div>

                    <div class="message-name">
                        <span class="name-left">Reason:</span>
                        <span class="name-right"><?php echo e($message->message_reason); ?></span>
                    </div>

                    <div class="message-name">
                        <span class="name-left">Mesaage:</span>
                        <span class="name-right"><?php echo e($message->message); ?></span>
                    </div>
                </div>
                <div class="reply-main">
                    <form action="<?php echo e(route('reply-message')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" id="email" name="email" value="<?php echo e($message->user_email); ?>">
                        <input type="hidden" id="id" name="id" value="<?php echo e($message->id); ?>">

                        <div class="reply-textarea-main">
                            <label for="" class="apply-inpu-label contact-us-label">Reply Here</label>
                            <textarea name="reply" id="" cols="30" rows="10" class="form-control apply-input reply-textarea" placeholder="Enter Your Reply" maxlength="1000" required></textarea>
                        </div>

                        <div class="reply-button-main">
                            <button type="submit" class="btn btn-info btn-xs reply-button">Reply</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    autosize();

    function autosize() {
        var text = $('.reply-textarea');

        text.each(function() {
            $(this).attr('rows', 1);
            resize($(this));
        });

        text.on('input', function() {
            resize($(this));
        });

        function resize($text) {
            $text.css('height', 'auto');
            $text.css('height', $text[0].scrollHeight + 'px');
        }
    }
    $('#datatable').dataTable({
        sort: false,
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
        }, function() {
            $("#delete-form-" + id).submit();
        });
    }
    $(document).on('change', '.mark_featured', function() {
        var $loader = $(this).parent().find('.loader');
        $loader.html("<i class='fa fa-refresh fa-spin'></i>");
        var data = {
            '_token': "<?php echo e(csrf_token()); ?>",
            'id': $(this).data('id')
        };
        jQuery.ajax({
            url: '<?php echo e(route("ajaxPopularUniversity")); ?>',
            type: 'post',
            dataType: 'html',
            data: data,
            success: function(data) {
                $loader.html("");
            }
        });
    });



    $(document).ready(function() {
        $('#replyForm').submit(function(e) {
            e.preventDefault(); // Prevent form submission

            // Serialize form data
            var formData = $(this).serialize();

            // AJAX request
            $.ajax({
                url: "<?php echo e(route('reply-message')); ?>",
                type: "POST",
                data: formData,
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Display success message
                        $('#replyModal').modal('hide');
                        alert('Email sent successfully.');
                    } else {
                        // Display error message
                        alert('Failed to send email: ' + response.error);
                    }
                },
                error: function(xhr, status, error) {
                    // Display error message
                    alert('Failed to send email: ' + error);
                }
            });
        });
    });
    
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>