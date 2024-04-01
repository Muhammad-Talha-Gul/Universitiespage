<?php $__env->startSection('customStyles'); ?>
<link href="<?php echo e(asset('plugins/summernote/summernote.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset("plugins/select2/css/select2.min.css")); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset("plugins/multiselect/css/multi-select.css")); ?>"  rel="stylesheet" type="text/css" />
<style>
    .products-form ul#product_tabs {
        border: 1px solid #f3f3f3;
    }
    .removeThis {
        margin: 5px auto !important;;
        width: 100% !important;
    }
    .loader { position: absolute;width: 100%;height: 100%;z-index: 9999;text-align: center;background: #f7f7f7;opacity: 0.6;}
    .loader img {width: 50px;height: 50px;margin: auto;z-index: 99999999; }
    .ms-container {max-width: 100% !important;}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Add <?php echo e($type['name']); ?> </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="<?php echo e(url('/admin/home')); ?>">Admin</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('posts_lists',$type['slug'])); ?>"><?php echo e($type['name']); ?></a>
                    </li>
                    <li class="active">
                        Add <?php echo e($type['name']); ?>

                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo e(route('store_post',$type['slug'])); ?>" method="POST" enctype="multipart/form-data"> 
                <?php echo e(csrf_field()); ?>

                <div class="card-box table-responsive">
                    <div class="tabs-vertical-env products-form">
                        <ul class="nav tabs-vertical" id="product_tabs">
                            <li class="active">
                                <a href="#t-basic" data-toggle="tab" aria-expanded="false">Basic Details</a>
                            </li>
                            <?php if(count($type->customAttribute)>0): ?>
                            <li class="">
                                <a href="#t-attributes" data-toggle="tab" aria-expanded="false">Attributes</a>
                            </li>
                            <?php endif; ?>
                            <?php if($type['has_image_gallery']==1): ?>
                            <li class="">
                                <a href="#v-gallery" data-toggle="tab" aria-expanded="false">Gallery</a>
                            </li>
                            <?php endif; ?>
                            <?php if($type['has_related']==1): ?>
                            <li class="">
                                <a href="#v-related" id="related-tab" data-toggle="tab" aria-expanded="false">Related</a>
                            </li>
                            <?php endif; ?>
                            <?php if($type['has_post_seo']==1): ?>
                            <li class="">
                                <a href="#t-seo" data-toggle="tab" aria-expanded="false">SEO</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                        <div class="tab-content" style="width: 100%">
                            <div class="tab-pane active" id="t-basic">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="form-group m-b-20">
                                                    <label>Post Title</label>
                                                    <input type="text" class="form-control" name="title" placeholder="Enter title" required>
                                                    <input type="hidden" name="custom_post_type" value="<?php echo e($type['id']); ?>">
                                                </div>
                                                <?php if($type['is_category_enable']==1): ?>
                                                <div class="form-group m-b-20">
                                                    <label>Category</label>
                                                    <select class="form-control select2" name="category_id">
                                                        <option value="">Select Category</option>
                                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                                            <?php if(count($cat->childrens)>0): ?>
                                                            <optgroup label="<?php echo e($cat->name); ?>">
                                                                <?php echo $__env->make('admin.cats', ['childrens' => $cat->childrens], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                            </optgroup>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($type['has_brands']==1): ?>
                                                <div class="form-group m-b-20">
                                                    <label>Brand</label>
                                                    <select class="form-control select2" name="brand_id">
                                                        <option value="">Select Brand</option>
                                                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($type['has_desc']==1): ?>
                                                <div class="form-group m-b-20">
                                                    <label>Short Description</label>
                                                    <textarea class="form-control" name="short_description"></textarea>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($type['has_long_desc']==1): ?>
                                                <div class="form-group m-b-20">
                                                    <label>Description</label>
                                                    <textarea class="summernote" name="description"></textarea>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($type['has_author']==1): ?>
                                                <div class="form-group m-b-20">
                                                    <label>Select Author</label>
                                                    <select class="form-control" name="user_id">
                                                        <option value="<?php echo e(Auth::user()->id); ?>">Me (<?php echo e(Auth::user()->first_name); ?>)</option>
                                                        <?php $__currentLoopData = showAuthors(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->first_name.' '.$value->last_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($type['has_featured_image']==1): ?>
                                                <div class="form-group m-b-20">
                                                    <label>Featured Image</label>
                                                    <div class="image-placeholder" id="wfm" data-input="f-hidden" data-preview="f-holder">
                                                        <img src="<?php echo e(asset('placeholder.jpg')); ?>" id="f-holder" class="img-responsive img-selection img-thumbnail testImg" style="max-height:300px">
                                                    </div>
                                                    <a href="javascript:void(0)" class="removeImage" data-hidden="f-hidden" data-holder="f-holder" style="display: none">Remove Image</a>
                                                    <input type="hidden" name="image" id="f-hidden">
                                                </div>
                                                <?php endif; ?>
                                                <?php if($type['show_sku']==1): ?>
                                                <div class="form-group m-b-20">
                                                    <label>SKU</label>
                                                    <input type="text" name="sku" class="form-control" placeholder="SKU">
                                                </div>
                                                <?php endif; ?>
                                                <?php if($type['show_unit']==1): ?>
                                                <div class="form-group m-b-20">
                                                    <label>Unit</label>
                                                    <input type="text" name="unit" class="form-control" placeholder="ex kg, pcs etc">
                                                </div>
                                                <?php endif; ?>
                                                <?php if($type['show_quantity']==1): ?>
                                                <div class="form-group m-b-20">
                                                    <label>Quantity</label>
                                                    <input type="number" name="quantity" class="form-control" value="0" min="0" required>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($type['show_price']==1): ?>
                                                <div class="form-group m-b-20">
                                                    <label>Price</label>
                                                    <input type="number" id="regular-price" value="0" class="form-control" name="price" min="0" required>
                                                </div>
                                                <div class="form-group m-b-20">
                                                    <label>Discounted Price</label>
                                                    <input type="number" id="discounted-price" class="form-control" name="discounted_price" min="0">
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(count($type->customAttribute)>0): ?>
                            <div class="tab-pane" id="t-attributes">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <?php $__currentLoopData = $type->customAttribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($attr->input_type=='text'): ?>
                                                    <div class="form-group m-b-20">
                                                        <label><?php echo e($attr->attribute_name); ?></label>
                                                        <input type="text" class="form-control" name="attributes[<?php echo e($attr->attribute_slug); ?>]" placeholder="<?php echo e($attr->attribute_name); ?>">
                                                    </div>
                                                    <?php elseif($attr->input_type=='textarea'): ?>
                                                    <div class="form-group m-b-20">
                                                        <label><?php echo e($attr->attribute_name); ?></label>
                                                        <textarea class="form-control" name="attributes[<?php echo e($attr->attribute_slug); ?>]" placeholder="<?php echo e($attr->attribute_name); ?>"></textarea>
                                                    </div>
                                                    <?php elseif($attr->input_type=='select'): ?>
                                                    <div class="form-group m-b-20">
                                                        <label><?php echo e($attr->attribute_name); ?></label>
                                                        <select class="form-control" name="attributes[<?php echo e($attr->attribute_slug); ?>]">
                                                            <?php $__currentLoopData = explode(",", $attr->attribute_data); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <?php elseif($attr->input_type=='radio'): ?>
                                                    <div class="form-group m-b-20">
                                                        <label><?php echo e($attr->attribute_name); ?></label>
                                                        <?php $__currentLoopData = explode(",", $attr->attribute_data); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="radio radio-primary">
                                                            <input type="radio" name="attributes[<?php echo e($attr->attribute_slug); ?>]" value="<?php echo e($value); ?>">
                                                            <label><?php echo e($value); ?></label>
                                                        </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <?php elseif($attr->input_type=='checkbox'): ?>
                                                    <div class="form-group m-b-20">
                                                        <label><?php echo e($attr->attribute_name); ?></label>
                                                        <?php $__currentLoopData = explode(",", $attr->attribute_data); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="checkbox checkbox-primary">
                                                            <input type="checkbox" name="attributes[<?php echo e($attr->attribute_slug); ?>][]" value="<?php echo e($value); ?>">
                                                            <label><?php echo e($value); ?></label>
                                                        </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <?php elseif($attr->input_type=='editor'): ?>
                                                    <label><?php echo e($attr->attribute_name); ?></label>
                                                    <textarea class="summernote" name="attributes[<?php echo e($attr->attribute_slug); ?>]"></textarea>
                                                    <?php elseif($attr->input_type=='date'): ?>
                                                    <label><?php echo e($attr->attribute_name); ?></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control datepicker-autoclose" name="attributes[<?php echo e($attr->attribute_slug); ?>]" id="datepicker-autoclose">
                                                        <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                    </div>
                                                    <?php elseif($attr->input_type=='email'): ?>
                                                    <div class="form-group m-b-20">
                                                        <label><?php echo e($attr->attribute_name); ?></label>
                                                        <input type="email" class="form-control" name="attributes[<?php echo e($attr->attribute_slug); ?>]">
                                                    </div>
                                                    <?php elseif($attr->input_type=='number'): ?>
                                                    <div class="form-group m-b-20">
                                                        <label><?php echo e($attr->attribute_name); ?></label>
                                                        <input type="number" class="form-control" name="attributes[<?php echo e($attr->attribute_slug); ?>]">
                                                    </div>
                                                    <?php elseif($attr->input_type=='color'): ?>
                                                    <div class="form-group m-b-20">
                                                        <label><?php echo e($attr->attribute_name); ?></label>
                                                        <input type="text" class="colorpicker-default form-control" name="attributes[<?php echo e($attr->attribute_slug); ?>]">
                                                    </div>
                                                    <?php elseif($attr->input_type=='tags'): ?>
                                                    <div class="form-group m-b-20">
                                                        <label><?php echo e($attr->attribute_name); ?> <small>(comma seperated)</small></label>
                                                        <input type="text" data-role="tagsinput" placeholder="add <?php echo e($attr->attribute_name); ?>" name="attributes[<?php echo e($attr->attribute_slug); ?>]">
                                                    </div>
                                                    <?php elseif($attr->input_type=='questions'): ?>
                                                    <label><?php echo e($attr->attribute_name); ?></label>
                                                    <div id="<?php echo e($attr->attribute_slug); ?>"></div>
                                                    <a href="javascript:void(0)" class="btn btn-success add-attrs" data-id="<?php echo e($attr->attribute_slug); ?>">Add</a> 
                                                    <hr>
                                                    <?php elseif($attr->input_type=='file'): ?>
                                                    <div class="form-group m-b-20">
                                                        <label><?php echo e($attr->attribute_name); ?></label>
                                                        <div class="image-placeholder" id="wfm" data-input="f<?php echo e($k); ?>-hidden" data-preview="f<?php echo e($k); ?>-holder">
                                                            <img src="<?php echo e(asset('placeholder.jpg')); ?>" id="f<?php echo e($k); ?>-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                                        </div>
                                                        <a href="javascript:void(0)" class="removeImage" data-hidden="f<?php echo e($k); ?>-hidden" data-holder="f<?php echo e($k); ?>-holder" style="display: none">Remove Image</a>
                                                        <input type="hidden" name="attributes[<?php echo e($attr->attribute_slug); ?>]" id="f<?php echo e($k); ?>-hidden">
                                                    </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($type['has_image_gallery']==1): ?>
                            <div class="tab-pane" id="v-gallery">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                
                                                <div class="form-group">
                                                    <select id="noofdivs" class="form-control" style="max-width: 10%; display: inline;">
                                                        <?php for($i=1; $i<=5; $i++): ?>
                                                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                                        <?php endfor; ?>
                                                    </select>
                                                    <a href="javascript:void" id="addDivs" class="btn btn-sm btn-info">Add</a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="row" id="g-divs">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($type['has_related']==1): ?>
                            <div class="tab-pane" id="v-related">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="" id="related-posts" style="position: relative;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($type['has_post_seo']==1): ?>
                            <div class="tab-pane" id="t-seo">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="form-group m-b-20">
                                                    <label>Meta Title</label>
                                                    <input type="text" name="meta_title" class="form-control" maxlength="60" placeholder="Meta Title">
                                                </div>
                                                <div class="form-group m-b-20">
                                                    <label>Meta Description</label>
                                                    <textarea type="text" name="meta_description" class="form-control" maxlength="255" placeholder="Meta Description"></textarea>
                                                </div>
                                                <div class="form-group m-b-20">
                                                    <label>Meta Keywords <small>(comma seperated)</small></label>
                                                    <input type="text" name="meta_keywords" data-role="tagsinput" placeholder="add tag">
                                                </div>
                                                <div class="form-group m-b-20">
                                                    <label>Link Canonical</label>
                                                    <input type="text" name="link_canonical" class="form-control" placeholder="Link Canonical">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <div class="checkbox checkbox-primary">
                                <input type="checkbox" name="is_active" value="1" checked>
                                <label>Active</label>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="<?php echo e(route('posts_lists',$type['slug'])); ?>" class="btn btn-success">Back</a>
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
<script src="<?php echo e(asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/laravel-filemanager/js/lfm.js')); ?>"></script>
<script src="<?php echo e(asset("plugins/select2/js/select2.min.js")); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo e(asset("plugins/multiselect/js/jquery.multi-select.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("plugins/jquery-quicksearch/jquery.quicksearch.js")); ?>"></script>
<script type="text/javascript">
jQuery('.datepicker-autoclose').datepicker({
    autoclose: true,
    todayHighlight: true,
});
/*$('.testImg').on('load', function () {
    console.log($(this).width());
});*/
jQuery(document).ready(function(){
    $(".select2").select2();
    $('.colorpicker-default').colorpicker({
        format: 'hex'
    });
    $('.image-placeholder').filemanager('image',{prefix:"<?php echo e(url('/filemanager')); ?>"});

    $(document).on('click',".add-attrs",function(){
        var id = $(this).data('id');
        count = Math.floor(Math.random() * 100);
        var _html = `<div class="row" id="attr_`+count+`">
                        <div class="col-md-5">
                          <div class="form-group m-b-20">
                            <input type="text" class="form-control" placeholder="Title" name="attributes[`+id+`][questions][]">
                          </div>  
                        </div>
                        <div class="col-md-5">
                          <div class="form-group m-b-20">
                            <input type="text" class="form-control" placeholder="Value" name="attributes[`+id+`][answers][]">
                          </div>  
                        </div>
                        <div class="col-md-2"><a href="javascript:void(0)" onclick="delete_attr(`+count+`)" class="btn btn-danger btn-sm">Delete</a></div>
                    </div>`;
        $("#"+id).append(_html);
    });
    $("#delete-feature").on('click',function(){
        $('#features .f-item:last').fadeOut().remove();
        if($(".f-item").length>0){
            $(this).show(300);
        } else {
            $(this).hide(300);
        }
    });
});
function delete_attr(key){
        $("#attr_"+key).hide(300).remove();
    }
    $("#addDivs").on('click',function(){
        var $num = $("#noofdivs").val();
        for (var i=1; i<=$num; i++) {
          var $count = Math.floor(Math.random() * 10);
          $("#g-divs").append(`<div class="col-md-3">
                        <div class="image-placeholder" id="wfm" data-input="g`+$count+`-hidden" data-preview="g`+$count+`-holder">
                            <img src="<?php echo e(asset('placeholder.jpg')); ?>" id="g`+$count+`-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                        </div>
                        <input type="number" min="1" name="gallery[sort_order][]" class="form-control" placeholder="Sort Order">
                        <a href="javascript:void(0)" class="removeThis btn-danger btn-xs text-center" data-hidden="g`+$count+`-hidden" data-holder="g`+$count+`-holder"><i class="fa fa-trash-o"></i> Remove</a>
                        <input type="hidden" name="gallery[image][]" id="g`+$count+`-hidden">
                    </div>`);
        }
        $('.image-placeholder').filemanager('image',{prefix:"<?php echo e(url('/filemanager')); ?>"});
    });
    $(document).on('click',".removeThis",function(){
        $(this).parent().remove();
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
});

    $(document).on('click',"#related-tab",function(){
        $("#related-posts").html(`<div class="loader"><img src="<?php echo e(asset("loading.gif")); ?>"></div>`);
        var data = { "_token":"<?php echo e(csrf_token()); ?>" };
        $.ajax({
            url: "<?php echo e(route('getRelatedPosts',$type['slug'])); ?>",
            type:'POST',
            data:data,
            success: function(data)
            {
                $("#related-posts").html(data);
                $("#related-tab").removeAttr('id');
                $('.multiselect').multiSelect({
                    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    afterInit: function (ms) {
                        var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function (e) {
                                if (e.which === 40) {
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function (e) {
                                if (e.which == 40) {
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                    },
                    afterSelect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });
            }
        });
    });
    $(document).on('focusout','#discounted-price',function(){
        if($(this).val()>=$("#regular-price").val()){
            alert("Discounted can't be equal or greater than Regular Price");
            $(this).val("");
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>