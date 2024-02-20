<?php $__env->startSection('customStyles'); ?>
<link href="<?php echo e(asset('plugins/summernote/summernote.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset("plugins/select2/css/select2.min.css")); ?>" rel="stylesheet" type="text/css" />
<style>
    .products-form ul#product_tabs {
        border: 1px solid #f3f3f3;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Add Visa Country </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="<?php echo e(url('/admin/home')); ?>">Admin</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('visacountries.index')); ?>">Visa Country</a>
                    </li>
                    <li class="active">
                        Add New Visa Country
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form action="<?php echo e(route('visacountries.store')); ?>" method="POST" enctype="multipart/form-data"> 
                <?php echo e(csrf_field()); ?>

                <div class="card-box table-responsive">
                    <div class="p-10">
                        <div class="">
                            <div class="col-md-6">
                                <div class="form-group m-b-20">
                                    <label>Country Name</label>
                                    <input type="text" class="form-control" name="country_name" id="blog-title" placeholder="Enter title" required>
                                </div>
                            </div>     
                            
                            <div class="col-md-12">
                                <div class="form-group m-b-20 m-t-10">
                                <label>Country Image (200px X 100px)</label>
                                <div class="image-placeholder" id="wfm" data-input="f-hidden" data-preview="f-holder">
                                    <img src="<?php echo e(asset('placeholder.jpg')); ?>" id="f-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                </div>
                                <a href="javascript:void(0)" class="removeImage" data-hidden="f-hidden" data-holder="f-holder" style="display: none">Remove Image</a>
                                <input type="hidden" name="country_image" id="f-hidden">
                            </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="<?php echo e(route('visacountries.index')); ?>" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('customScripts'); ?>
<script src="<?php echo e(asset('plugins/summernote/summernote.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/laravel-filemanager/js/lfm.js')); ?>"></script>
<script src="<?php echo e(asset("plugins/select2/js/select2.min.js")); ?>" type="text/javascript"></script>
<script type="text/javascript">
function convertToSlug(Text) {
    return Text
    .toLowerCase()
    .replace(/[^\w ]+/g,'')
    .replace(/ +/g,'-')
    ;
}
$(document).on('change', '.seo', function(){
    var id = $(this).attr('id');
    if($(this).is(':checked')){
        $('#show_'+id).slideDown(300);
    }else{
        $('#show_'+id).slideUp(300);
    }
});
$(document).on('focusout','#blog-title',function(){
    $("#slug").val(convertToSlug($(this).val()));
});
jQuery(document).ready(function(){
    $('.image-placeholder').filemanager('image',{prefix:"<?php echo e(url('/filemanager')); ?>"});
});
</script>
<script>
$(document).ready(function(){

    // Define function to open filemanager window
    var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '<?php echo e(url('/filemanager')); ?>';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = cb;
    };
    
    // Define LFM summernote button
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
    
    // Initialize summernote with LFM button in the popover button group
    // Please note that you can add this button to any other button group you'd like
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
            ['misc',['codeview']]
        ],
        buttons: {
            lfm: LFMButton
        }
    })
   $(".select2").select2();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>