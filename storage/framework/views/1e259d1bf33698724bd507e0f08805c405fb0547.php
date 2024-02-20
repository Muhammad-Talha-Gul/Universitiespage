
<?php $__env->startSection('customStyles'); ?>
<link href="<?php echo e(asset('plugins/jquery.filer/css/jquery.filer.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('plugins/summernote/summernote.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset("plugins/select2/css/select2.min.css")); ?>" rel="stylesheet" type="text/css" />
<style>
    .sq-box{
        width: 42px;
        background: lightgray;
        height: 38px;
        position: absolute;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
        text-align: center;
        padding-top: 8px;
        font-weight: bolder;
        top: 0px;
        right: 10px
    }
    .form-control{
        margin-bottom: 10px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(check_access(Auth::user()->id,'course','_create')==1): ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Add Course </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="<?php echo e(url('/admin/home')); ?>">Admin</a>
                    </li>
                    <li class="active">
                        Add Course
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo e(route('course.store')); ?>" method="POST" enctype="multipart/form-data"> 
                <?php echo e(csrf_field()); ?>

                <div class="card-box table-responsive">
                    <div class="tabs-vertical-env products-form">
                        <ul class="nav tabs-vertical" id="product_tabs">
                            <li class="active">
                                <a href="#t-general" data-toggle="tab" aria-expanded="false">General</a>
                            </li>
                            <li class="">
                                <a href="#t-about" data-toggle="tab" aria-expanded="false">About</a>
                            </li>
                            <li class="">
                                <a href="#t-entry_requirments" data-toggle="tab" aria-expanded="false">Entry Requirments</a>
                            </li>
                            <li class="">
                                <a href="#t-curriculum" data-toggle="tab" aria-expanded="false">Curriculum</a>
                            </li>
                        </ul>
                        <div class="tab-content" style="width: 100%">
                            <div class="tab-pane active" id="t-general">
                                <div class="row">
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label">Course Name</label>
                                                            <div class="col-md-11">
                                                                <input type="text" class="form-control" name="name" placeholder="Course Name" value="<?php echo e(old('name')); ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label">Duration</label>
                                                            <div class="col-md-5">
                                                                <input type="number" class="form-control" value="<?php echo e(old('name')); ?>" name="duration_qty" placeholder="Year/Months in No." required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <select name="duration_type" class="form-control" required>
                                                                    <option value="Year">Year</option>
                                                                    <option value="Months">Months</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label">University Name</label>
                                                            <div class="col-md-11">
                                                                <?php if(Auth::user()->user_type == 'university'): ?>
                                                                    <input type="hidden" value="<?php echo e(Auth::user()->university_detail->id); ?>" name="university_id">
                                                                    <input type="text" class="form-control" readonly value="<?php echo e(Auth::user()->university_detail->name); ?>">
                                                                <?php else: ?>
                                                                    <select name="university_id" class="form-control select2" required>
                                                                        <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($university->id); ?>"><?php echo e($university->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label">Subject</label>
                                                            <div class="col-md-11">
                                                                <select class="form-control select2" name="subject_id" required>
                                                                    <option disabled="" selected="">Select Any Subject</option>
                                                                    <?php $__currentLoopData = subjects(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($sub->id); ?>"><?php echo e($sub->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="margin-top: 10px;">
                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label">Qualification</label>
                                                            <div class="col-md-11">
                                                                <select class="form-control select2" name="qualification" required>
                                                                    <?php $__currentLoopData = qualification(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($edu->id); ?>"><?php echo e($edu->title); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    

                                                    <div class="col-md-6" style="margin-top: 10px;">
                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label">Yearly Fee</label>
                                                            <div class="col-md-11">
                                                                <input type="text" class="form-control" name="yearly_fee" placeholder="Yearly Fee" value="<?php echo e(old('yearly_fee')); ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                                                                        
                                                    <div class="col-md-6" style="margin-top: 10px;">
                                                        <div class="form-group">
                                                            <label class="col-md-6 control-label">Language</label>
                                                            <div class="col-md-11">
                                                                <input type="text" class="form-control tags" name="languages" value="<?php echo e(old('languages')); ?>" placeholder="Teaching Languages" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    
                                                    <!--- schema markup satart by awais  --->
                           
                                                      <div class="optionBox">
                                                          <div class="block">
                                                              <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Scehma Markup Question</label>
                                                                        <input type="text" class="form-control" name="sm_question[]" id="sm_question" >
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix block"></div>                                    
                                                                
                                                                <div class="col-md-12 block">
                                                                    <div class="form-group">
                                                                        <label>Scehma Markup Answer</label>
                                                                        <textarea class="form-control" name="sm_answer[]" rows="10"  placeholder="Enter short description"></textarea>
                                                                    </div>
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
                                                                    <input type="number" min="0" class="form-control" name="ratingValue[]" id="ratingValue" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 block2">
                                                                <div class="form-group">
                                                                    <label>Date</label>
                                                                    <input type="date" class="form-control" name="datePublished[]" id="datePublished" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 block2">
                                                                <div class="form-group">
                                                                    <label>Author's Name</label>
                                                                    <input type="text" min="0" class="form-control" name="author[]" id="worstRating" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 block2">
                                                                <div class="form-group">
                                                                    <label>Publisher's Name</label>
                                                                    <input type="text"  class="form-control" name="publisherName[]" id="publisherName" >
                                                                </div>
                                                            </div>
                                                            <!-- end row -->
                                                            <div class="clearfix block2"></div>
                                                            
                                                            <div class="col-md-12 block2">
                                                                <div class="form-group">
                                                                    <label>Review's Name</label>
                                                                    <input type="text" class="form-control" name="reviewerName[]" id="reviewerName" >
                                                                </div>
                                                            </div>
                                                            <div class="clearfix block2"></div>                                    
                                                            
                                                            <div class="col-md-12 block2">
                                                                <div class="form-group">
                                                                    <label>Review Description</label>
                                                                    <textarea class="form-control" name="reviewBody[]" rows="5"  placeholder="Enter short description"></textarea>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="block2">
                                                                <button class="add2 btn btn-primary btn-sm fa fa-plus"> Add Review Row</button>
                                                            </div>
                                                        </div>
                                                        <hr>
                        
                                                    <!--- sechem markup end by awais --->

                                                    
                                                </div>                                   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="t-about">
                                <div class="row">
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="form-group col-sm-10">
                                                    <label>About</label>
                                                    <textarea class="form-control" name="about"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="t-entry_requirments">
                                <div class="row">
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="form-group col-sm-10">
                                                    <label>Entry Requirments</label>
                                                    <textarea class="summernote" name="entry_requirments"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="t-curriculum">
                                <div class="row">
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="">
                                                    <div class="form-group col-sm-10">
                                                        <label>Curriculum</label>
                                                        <textarea class="summernote" name="curriculum"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="checkbox checkbox-primary">
                                    <input type="checkbox" name="active" value="1" checked>
                                    <label>Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <div class="checkbox checkbox-primary">
                                <input type="checkbox" name="scholarship" value="1" >
                                <label>Scholarship</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="<?php echo e(route('course.index')); ?>" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->

<?php else: ?>
<?php $__env->startComponent('admin.access-denied'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('customScripts'); ?>
<script src="<?php echo e(asset('plugins/summernote/summernote.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('vendor/laravel-filemanager/js/lfm.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset("plugins/select2/js/select2.min.js")); ?>" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        
        // dynamic row for schema start

        $('.add').click(function() {
            $('.block:last').before('<div class="block"><div class="col-md-12"><div class="form-group"><label>Scehma Markup Question</label><input type="text" class="form-control" name="sm_question[]" id="sm_question" required></div></div><div class="clearfix block"></div><div class="col-md-12 block"><div class="form-group"><label>Scehma Markup Answer</label><textarea class="form-control" name="sm_answer[]" rows="10" required placeholder="Enter short description"></textarea></div></div><button class="remove btn btn-danger btn-sm fa fa-trash"> Remove Schema Question</button></div><hr>');
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
        $('.image-placeholder').filemanager('image',{prefix:"<?php echo e(url('/filemanager')); ?>"});
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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>