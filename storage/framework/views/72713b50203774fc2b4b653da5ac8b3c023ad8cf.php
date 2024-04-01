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
                <h4 class="page-title">Add Visa Detail </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="<?php echo e(url('/admin/home')); ?>">Admin</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('visadetails.index')); ?>">Visa Detail</a>
                    </li>
                    <li class="active">
                        Add New Visa Detail
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form action="<?php echo e(route('visadetails.store')); ?>" method="POST" enctype="multipart/form-data"> 
                <?php echo e(csrf_field()); ?>

                <div class="card-box table-responsive">
                    <div class="p-10">
                        <div class="">
                            <div class="col-md-12">
                                <div class="form-group m-b-20">
                                    <label>Detail Title</label>
                                    <input type="text" class="form-control" name="visa_title" id="visa-title" placeholder="Enter title" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group m-b-20">
                                    <label>Country</label>
                                        <select class="form-control select2" name="country_id" >
                                         <?php $__currentLoopData = $visa_countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         
                                         <?php //if($value->country_id != '') { continue; } ?>
                                         
                                         <option value="<?php echo e($value->countryid); ?>"><?php echo e($value->countryname); ?></option>
                                         
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea class="summernote" name="visa_description" rows="10" required placeholder="Enter short description"></textarea>
                                </div>
                            </div>
                            
                            <!--- schema markup satart by sadam --->
                            <?php /*
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Rating Value</label>
                                    <input type="number" min="0" class="form-control" name="ratingValue" id="ratingValue" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Best Rating</label>
                                    <input type="number" min="0" class="form-control" name="bestRating" id="bestRating" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Worst Rating</label>
                                    <input type="number" min="0" class="form-control" name="worstRating" id="worstRating" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Rating Count</label>
                                    <input type="number" min="0" class="form-control" name="ratingCount" id="ratingCountnumber" required>
                                </div>
                            </div>
                             */?>
                            <!--- end row -->
                           
                              <div class="optionBox">
                                  <div class="block">
                                      <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Scehma Markup Question</label>
                                                <input type="text" class="form-control" name="sm_question[]" id="sm_question" required>
                                            </div>
                                        </div>
                                        <div class="clearfix block"></div>                                    
                                        
                                        <div class="col-md-12 block">
                                            <div class="form-group">
                                                <label>Scehma Markup Answer</label>
                                                <textarea class="form-control" name="sm_answer[]" rows="5" required placeholder="Enter short description"></textarea>
                                            </div>
                                        </div>
                                       
                                    
                                    <div class="block">
                                        <button class="add btn btn-primary btn-sm fa fa-plus"> Add Schema Row</button>
                                    </div>
                                </div>
                                <hr>
                                
                                 <!-- review stat -->
                                    <div class="optionBox2">
                                        <div class="col-md-3 block2">
                                            <div class="form-group">
                                                <label>Rating</label>
                                                <input type="number" min="0" class="form-control" name="ratingValue[]" id="ratingValue" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 block2">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="date" class="form-control" name="datePublished[]" id="datePublished" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 block2">
                                            <div class="form-group">
                                                <label>Author's Name</label>
                                                <input type="text" min="0" class="form-control" name="author[]" id="worstRating" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 block2">
                                            <div class="form-group">
                                                <label>Publisher's Name</label>
                                                <input type="text"  class="form-control" name="publisherName[]" id="publisherName" required>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="clearfix block2"></div>
                                        
                                        <div class="col-md-12 block2">
                                            <div class="form-group">
                                                <label>Review's Name</label>
                                                <input type="text" class="form-control" name="reviewerName[]" id="reviewerName" required>
                                            </div>
                                        </div>
                                        <div class="clearfix block2"></div>                                    
                                        
                                        <div class="col-md-12 block2">
                                            <div class="form-group">
                                                <label>Review Description</label>
                                                <textarea class="form-control" name="reviewBody[]" rows="5" required placeholder="Enter short description"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="block2">
                                            <button class="add2 btn btn-primary btn-sm fa fa-plus"> Add Review Row</button>
                                        </div>
                                    </div>
                                    <hr>
                            <!--- sechem markup end by Sadam    --->
                            
                            <div class="col-md-6">
                            <div class="form-group m-b-20 m-t-10">
                                <label>Image</label>
                                <div class="image-placeholder" id="wfm" data-input="f-hidden" data-preview="f-holder">
                                    <img src="<?php echo e(asset('placeholder.jpg')); ?>" id="f-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                </div>
                                <a href="javascript:void(0)" class="removeImage" data-hidden="f-hidden" data-holder="f-holder" style="display: none">Remove Image</a>
                                <input type="hidden" name="visa_image" id="f-hidden">
                            </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="form-group col-sm-1"></div>
                        <div class="form-group col-sm-2">
                            <label>Meta Tags</label> <br>
                            <input id="meta_tags" class="mark_featured seo" switch="primary" name="seo[show_meta]" type="checkbox" >
                            <label for="meta_tags" data-on-label="Yes" data-off-label="No"></label>
                        </div>
                    </div>
                    <div class="row" id="show_meta_tags" style="display:none;">
                        <hr>
                        <h5 style="padding-left: 20px;">META TAGS</h5>
                        <hr>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Meta Title</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="seo[meta_title]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Meta Keywords</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" data-role="tagsinput" name="seo[meta_keywords]">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Meta Description</label>
                                <div class="col-md-12">
                                    <textarea maxlength="255" class="form-control" name="seo[meta_description]"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="<?php echo e(route('visadetails.index')); ?>" class="btn btn-success">Back</a>
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
$(document).on('focusout','#visa-title',function(){
    $("#slug").val(convertToSlug($(this).val()));
});
jQuery(document).ready(function(){
    $('.image-placeholder').filemanager('image',{prefix:"<?php echo e(url('/filemanager')); ?>"});
});
</script>
<script>
$(document).ready(function(){
    
    // dynamic row for schema start

        $('.add').click(function() {
            $('.block:last').before('<div class="block"><div class="col-md-12"><div class="form-group"><label>Scehma Markup Question</label><input type="text" class="form-control" name="sm_question[]" id="sm_question" required></div></div><div class="clearfix block"></div><div class="col-md-12 block"><div class="form-group"><label>Scehma Markup Answer</label><textarea class="form-control" name="sm_answer[]" rows="10" required placeholder="Enter short description"></textarea></div></div>\
                                        <button class="remove btn btn-danger btn-sm fa fa-trash"> Remove Schema Question</button>\
                                    </div><hr>');
        });
        $('.optionBox').on('click','.remove',function() {
         	$(this).parent().remove();
        });
        
        // review dynamic script
        $('.add2').click(function() {
            $('.block2:last').before('<div class="block2"><div class="col-md-3 block2">\
                                            <div class="form-group">\
                                                <label>Rating</label>\
                                                <input type="number" min="0" class="form-control" name="ratingValue[]" id="ratingValue" required>\
                                            </div>\
                                        </div>\
                                        <div class="col-md-3 block2">\
                                            <div class="form-group">\
                                                <label>Date</label>\
                                                <input type="date" class="form-control" name="datePublished[]" id="datePublished" required>\
                                            </div>\
                                        </div>\
                                        <div class="col-md-3 block2">\
                                            <div class="form-group">\
                                                <label>Author\'s\ Name</label>\
                                                <input type="text" min="0" class="form-control" name="author[]" id="worstRating" required>\
                                            </div>\
                                        </div>\
                                        <div class="col-md-3 block2">\
                                            <div class="form-group">\
                                                <label>Publisher\'s\ Name</label>\
                                                <input type="text"  class="form-control" name="publisherName[]" id="publisherName" required>\
                                            </div>\
                                        </div>\
                                        <div class="clearfix block2"></div>\
                                        <div class="col-md-12">\
                                            <div class="form-group">\
                                                <label>Review\'s\ Name</label>\
                                                <input type="text" class="form-control" name="reviewerName[]" id="reviewerName" required>\
                                            </div>\
                                        </div>\
                                        <div class="col-md-12 block2">\
                                            <div class="form-group">\
                                                <label>Review Description</label>\
                                                <textarea class="form-control" name="reviewBody[]" rows="5" required placeholder="Enter short description"></textarea>\
                                            </div>\
                                        </div>\
                                        <button class="remove2 btn btn-danger btn-sm fa fa-trash"> Remove Review Row</button></div><hr>');
        });
        $('.optionBox2').on('click','.remove2',function() { 
         	$(this).parent().remove();
        });
     // dynamic row for schema end

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
    
                // Define whatsapp  summernote button
    var whatsappButton = function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="fa fa-whatsapp fa_icon"></i> ',
            tooltip: 'Add Whatsapp button',
            click: function() 
            {
                
                let WhatsappNumber;
                let whatsapp = prompt("Enter What's app Number:", "923330033235");
                if (whatsapp == null || whatsapp == "") {
                WhatsappNumber = "923330033235";
                } else {
                WhatsappNumber =  whatsapp;
                }
                var buttonText = '<a class="fa fa-whatsapp fa_icon" target="_blank" href="https://api.whatsapp.com/send?phone='+WhatsappNumber+'" style="font-size: 18px;color: white;font-weight: bold; background: #3FC250; padding: 15px; border-radius: 10px; cursor: pointer;"> Chat With Us</a>';
                context.invoke('pasteHTML',buttonText);
            }
        });
        return button.render();
    };
    
    
            var callButton = function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="fa fa-phone fa_icon"></i> ',
            tooltip: 'Add Call button',
            click: function() 
            {
                
                let CallNumber;
                let call = prompt("Enter Call Number:", "923330033235");
                if (call == null || call == "") {
                CallNumber = "923330033235";
                } else {
                CallNumber =  call;
                }
                var buttonText = '<a class="fa fa-phone fa_icon" target="_blank" href="tel:'+CallNumber+'" style="font-size: 18px;color: white;font-weight: bold; background: #2c73c9; padding: 15px; border-radius: 10px; cursor: pointer;"> Call Us</a>';
                context.invoke('pasteHTML',buttonText);
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
            ['popovers', ['lfm','whatsapp']],
            ['popovers', ['lfm','call']],
            ['popovers', ['lfm']],
            ['style', ['style']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['misc',['codeview']],
            ['table', ['table']],
            ['insert', ['link', 'unlink', 'picture', 'video','hr']]
        ],
        buttons: {
            lfm: LFMButton,
            whatsapp: whatsappButton,
            call: callButton
        }
    })
   $(".select2").select2();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>