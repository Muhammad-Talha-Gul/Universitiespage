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
<?php if(check_access(Auth::user()->id,'university','_show')==1): ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">University </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="<?php echo e(url('/admin/home')); ?>">Admin</a>
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
                <div class="form-group pull-right" style="margin-bottom: 10px;">
                    
                    <?php if(check_access(Auth::user()->id,'university','_create')==1): ?>
                    <a href="<?php echo e(route('university.create')); ?>" class="btn btn-primary btn-sm">New University</a>
                    <a download href="https://universitiespage.com/university_sitemap.xml" class="btn btn-success btn-sm" >Generate Site-map</a>
                    <?php endif; ?>
                </div>
                <h4 class="m-t-0 header-title"><b>University List</b></h4>                
                <table id="datatable" class="table hover">
                    <thead>
                    <tr>
                        <th>University Name</th>
                        <th>Emails</th>
                        <th>Popular</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    	
                        <td><?php echo e((isset($value->university_detail->name))?$value->university_detail->name:''); ?></td>
                        <td><?php echo e($value->email); ?></td>
                        <td valign="middle">
                            <div class="form-group">
                                <input id="comment_Approvel<?php echo e($value->id); ?>" class="mark_featured" switch="primary" data-id="<?php if(isset($value->university_detail->id)){ echo $value->university_detail->id; } ?>" type="checkbox" 
                                <?php if(isset($value->university_detail->popular) AND $value->university_detail->popular == 1){ echo 'checked="checked"'; } ?> >
                                <label for="comment_Approvel<?php echo e($value->id); ?>" data-on-label="Yes" data-off-label="No"></label>
                                <span class="loader"></span>
                            </div>
                        </td>
                        <td><?php echo e($value->created_at); ?></td>
                        <td>
                            <?php if(check_access(Auth::user()->id,'university','_edit')==1): ?><a href="<?php echo e(url('admin/university/'.$value->id.'/edit')); ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                            <?php endif; ?>
                            <?php if(check_access(Auth::user()->id,'university','_delete')==1): ?>
                                <a class="btn btn-danger btn-xs"  onclick="deleteit(<?php echo e($value->id); ?>)"><i class="fa fa-trash"></i></a>
                                <form action="<?php echo e(route('university.destroy',$value['id'])); ?>" method="POST" id="delete-form-<?php echo e($value->id); ?>">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </tbody>
                </table>
                
                <div> <!-- by sadam -->
                    
                    <?php
                    if($data)
                    { 
                        $baseURL = "https://www.universitiespage.com/";
                        $string = '<?xml version="1.0" encoding="UTF-8"?> <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
                        
                        foreach($data as $slug)
                        { 
                            $string .= '<url>';
                            $string .= '<loc>'.$baseURL.'university/'.(isset($slug->university_detail->slug)? $slug->university_detail->slug : '').'</loc>';
                            $string .= '<lastmod>'.date('Y-m-d').'</lastmod>';
                            $string .= '</url>';
                            
                        }
                        
                        $string .='</urlset>';
                        file_put_contents("university_sitemap.xml", $string);
                    
                    }
                   ?>
                </div> <!-- end by sadam -->
                
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>