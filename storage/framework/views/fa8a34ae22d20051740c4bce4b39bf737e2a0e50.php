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
</style>
<?php if(check_access(Auth::user()->id,'student','_show')==1): ?>
<div class="container">
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
                <h4 class="m-t-0 header-title"><b>Consultant List</b></h4>
                <table id="datatable" class="table hover">
                    <thead>
                        <tr>

                            <th>User Name</th>
                            <th>Emails</th>
                            <th>Password</th>
                            <th>User Type</th>
                            <th>Registerd Date</th>
                            <th>Permissions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $adminUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adminUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(($adminUser->first_name)??''); ?> <?php echo e(($adminUser->last_name)??''); ?></td>
                            <td><?php echo e(($adminUser->email)??''); ?></td>
                            <td><?php echo e(($adminUser->secret)??''); ?></td>
                            <td><?php echo e(($adminUser->user_type)??''); ?></td>
                            <td><?php echo e(($adminUser->created_at)??''); ?></td>
                            <td>
                                <?php if(isset($permissionsData[$adminUser->id]->admin_permissions)): ?>
                                <?php
                                $hasPermission = false;
                                ?>
                                <?php $__empty_1 = true; $__currentLoopData = $permissionsData[$adminUser->id]->admin_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($value === 'on'): ?>
                                <span><?php echo e($permission); ?>: <?php echo e($value); ?></span><br>
                                <?php
                                $hasPermission = true;
                                ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <!-- No permissions -->
                                <?php endif; ?>

                                <?php if(!$hasPermission): ?>
                                <span>No permissions</span>
                                <?php endif; ?>
                                <?php else: ?>
                                <span>No permissions</span>
                                <?php endif; ?>
                            </td>


                            <td>
                                <!-- <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">delete</button> -->
                                <!-- <?php if(check_access(Auth::user()->id,'student','_show')==1): ?><a  href="<?php echo e(route('admin-details', ['id' =>$adminUser->id])); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                            <?php endif; ?> -->
                                <a data-toggle="modal" data-target="#exampleModal<?php echo e($adminUser->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                                <a data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn-xs"><i class="fa fa-trash"></i></a>
                                <!-- <?php if(check_access(Auth::user()->id,'student','_show')==1): ?><a href="<?php echo e(route('show_consultant_student',($value->id)??'')); ?>" class="btn btn-info btn-xs"><i class="fa fa-user"> Students</i></a>
                            <?php endif; ?> -->

                            </td>
                        </tr>

                        <?php $__currentLoopData = $adminUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adminUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- permission Modal -->
                        <div class="modal fade" id="exampleModal<?php echo e($adminUser->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete This User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="permissions-main">
                                            <form method="POST" action="<?php echo e(route('updatePermission', ['id' => $adminUser->id])); ?>">
                                                <?php echo e(csrf_field()); ?>

                                                <!-- Course -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="course" value="off">
                                                    <input class="form-check-input" type="checkbox" id="course<?php echo e($adminUser->id); ?>" name="course" <?php echo e(isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['course'] === 'on' ? 'checked' : ''); ?>>
                                                    <label class="form-check-label" for="course<?php echo e($adminUser->id); ?>">Course</label>
                                                </div>

                                                <!-- Free Consultation -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="free_consultation" value="off">
                                                    <input class="form-check-input" type="checkbox" id="free_consultation<?php echo e($adminUser->id); ?>" name="free_consultation" <?php echo e(isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['free_consultation'] === 'on' ? 'checked' : ''); ?>>
                                                    <label class="form-check-label" for="free_consultation<?php echo e($adminUser->id); ?>">Free Consultation</label>
                                                </div>

                                                <!-- Student -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="student" value="off">
                                                    <input class="form-check-input" type="checkbox" id="student<?php echo e($adminUser->id); ?>" name="student" <?php echo e(isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['student'] === 'on' ? 'checked' : ''); ?>>
                                                    <label class="form-check-label" for="student<?php echo e($adminUser->id); ?>">Student</label>
                                                </div>

                                                <!-- Consultant -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="consultant" value="off">
                                                    <input class="form-check-input" type="checkbox" id="consultant<?php echo e($adminUser->id); ?>" name="consultant" <?php echo e(isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['consultant'] === 'on' ? 'checked' : ''); ?>>
                                                    <label class="form-check-label" for="consultant<?php echo e($adminUser->id); ?>">Consultant</label>
                                                </div>

                                                <!-- Apply Online -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="apply_online" value="off">
                                                    <input class="form-check-input" type="checkbox" id="apply_online<?php echo e($adminUser->id); ?>" name="apply_online" <?php echo e(isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['apply_online'] === 'on' ? 'checked' : ''); ?>>
                                                    <label class="form-check-label" for="apply_online<?php echo e($adminUser->id); ?>">Apply Online</label>
                                                </div>

                                                <!-- Guide -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="guide" value="off">
                                                    <input class="form-check-input" type="checkbox" id="guide<?php echo e($adminUser->id); ?>" name="guide" <?php echo e(isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['guide'] === 'on' ? 'checked' : ''); ?>>
                                                    <label class="form-check-label" for="guide<?php echo e($adminUser->id); ?>">Guide</label>
                                                </div>

                                                <!-- Pages -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="pages" value="off">
                                                    <input class="form-check-input" type="checkbox" id="pages<?php echo e($adminUser->id); ?>" name="pages" <?php echo e(isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['pages'] === 'on' ? 'checked' : ''); ?>>
                                                    <label class="form-check-label" for="pages<?php echo e($adminUser->id); ?>">Pages</label>
                                                </div>

                                                <!-- Articles -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="articles" value="off">
                                                    <input class="form-check-input" type="checkbox" id="articles<?php echo e($adminUser->id); ?>" name="articles" <?php echo e(isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['articles'] === 'on' ? 'checked' : ''); ?>>
                                                    <label class="form-check-label" for="articles<?php echo e($adminUser->id); ?>">Articles</label>
                                                </div>

                                                <!-- Visit Visa -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="visit_visa" value="off">
                                                    <input class="form-check-input" type="checkbox" id="visit_visa<?php echo e($adminUser->id); ?>" name="visit_visa" <?php echo e(isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['visit_visa'] === 'on' ? 'checked' : ''); ?>>
                                                    <label class="form-check-label" for="visit_visa<?php echo e($adminUser->id); ?>">Visit Visa</label>
                                                </div>
                                                <button type="submit" class="submit-butt">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <?php if(check_access(Auth::user()->id,'student','_show')==1): ?><a href="<?php echo e(route('admin-delete', ['id' =>$adminUser->id])); ?>" class="btn btn-secondary">Delete</a><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete This User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php if(check_access(Auth::user()->id,'student','_show')==1): ?><a href="<?php echo e(route('admin-delete', ['id' =>$adminUser->id])); ?>" class="btn btn-secondary">Delete</i></a><?php endif; ?>
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
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>