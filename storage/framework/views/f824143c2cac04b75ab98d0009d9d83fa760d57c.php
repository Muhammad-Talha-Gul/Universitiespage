<?php $__env->startSection('customStyles'); ?>
<link href="<?php echo e(asset('plugins/summernote/summernote.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('/plugins/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('plugins/bootstrap-sweetalert/sweet-alert.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('plugins/toastr/toastr.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(check_access(Auth::user()->id,'subject','_show')==1): ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Subject </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="<?php echo e(url('/admin/home')); ?>">Admin</a>
                    </li>
                    <li class="active">
                        Subject
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
                <?php elseif(Session::has('errors')): ?>
                <div class="alert alert-danger">
                    <p><?php echo e(Session::get('errors')); ?></p>
                </div>
                <?php endif; ?>

                <div class="form-group pull-right" style="margin-bottom: 10px;">
                    
                    <?php if(check_access(Auth::user()->id,'subject','_create')==1): ?>
                    <a style="cursor:pointer" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSubject">New Subject</a>
                    <div id="addSubject" class="modal fade" role="dialog"  >
                      <div class="modal-dialog" style=" min-width:600px;">

                        <!-- Modal content-->
                        <form action="<?php echo e(route('subject.store')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">New Subject</h4>
                              </div>
                              <div class="modal-body row">
                                <div class="col-md-12" style="margin-top: 10px;width: 100%;">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Name</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="name" placeholder="Subject Name" value="<?php echo e(old('name')); ?>" required>
                                        </div>
                                    </div>
                                    
                                </div>
                              </div>
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-default" value="Save">
                              </div>
                            </div>
                        </form>

                      </div>
                    </div>
                    <?php endif; ?>
                </div>
                <h4 class="m-t-0 header-title"><b>Subject List</b></h4>                
                <table id="datatable" class="table hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th width="100px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        
                        <td><?php echo e($value->name); ?></td>  
                        <td>
                            <?php if(check_access(Auth::user()->id,'subject','_edit')==1): ?>
                                <a style="cursor:pointer;"  class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editSubject<?php echo e($value->id); ?>" ><i class="fa fa-pencil"></i></a>
                                <div id="editSubject<?php echo e($value->id); ?>" class="modal fade" role="dialog">
                                  <div class="modal-dialog" style=" min-width:600px">

                                    <!-- Modal content-->
                                    <form action="<?php echo e(route('subject.update',$value->id)); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('PUT')); ?>

                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit Subject</h4>
                                          </div>
                                          <div class="modal-body row" >
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <div class="form-group" style="width: 100%;">
                                                    <label class="col-md-12 control-label">Name</label>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="name" placeholder="Subject Name" value="<?php echo e($value->name); ?>" required style="width: 100%;">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                          </div>
                                          <div class="modal-footer">
                                            <input type="submit" class="btn btn-default" value="Update">
                                          </div>
                                        </div>
                                    </form>

                                  </div>
                                </div>
                            <?php endif; ?>
                            <?php if(check_access(Auth::user()->id,'subject','_delete')==1): ?><a class="btn btn-danger btn-xs"  onclick="deleteit(<?php echo e($value->id); ?>)"><i class="fa fa-trash"></i></a>
                                <form action="<?php echo e(route('subject.destroy', $value->id)); ?>" id="delete-form-<?php echo e($value->id); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('DELETE')); ?>

                                </form>
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
<script src="<?php echo e(asset('plugins/summernote/summernote.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('vendor/laravel-filemanager/js/lfm.js')); ?>"></script>
<script src="<?php echo e(asset('/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/toastr/toastr.min.js')); ?>"></script>
<script type="text/javascript">
    $('#datatable').dataTable({
        sort:false,
    });

    jQuery(document).ready(function(){
        var lfm = function(options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '<?php echo e(url('/filemanager')); ?>';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };

        var LFMButton = function(context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                click: function() {        
                    lfm({type: 'image', prefix: '<?php echo e(url('/filemanager')); ?>'}, function(url, path) {
                        context.invoke('insertImage', url);
                    });
                }
            });
            return button.render();
        };
        $('.image-placeholder').filemanager('image',{prefix:"<?php echo e(url('/filemanager')); ?>"});
        $('.summernote').summernote({
            height: 240,
            minHeight: null,
            maxHeight: null,
            focus: false,
            toolbar: [
                ['popovers', ['lfm']],
                ['style', ['style']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['link', ['linkDialogShow', 'unlink']],
                ['table', ['table']],
            ],
            buttons: {
                lfm: LFMButton
            }
        });
        $(".select2").select2();
        $(".tags").tagsinput();

        jQuery('.datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "yyyy-mm-dd",
        });
        // $('.date-picker-year').datepicker({
        //     format: "yyyy-mm-dd",
        //     weekStart: 1,
        //     orientation: "bottom",
        //     // language: '',
        //     keyboardNavigation: false,
        //     viewMode: "years",
        //     autoclose: true,
        //     minViewMode: "years"
        // });
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
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>