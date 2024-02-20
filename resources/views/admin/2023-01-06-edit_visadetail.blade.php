@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/summernote/summernote.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset("plugins/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<style>
    .products-form ul#product_tabs {
        border: 1px solid #f3f3f3;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Visa Detail </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li>
                        <a href="{{route('blog.index')}}">Visa Detail</a>
                    </li>
                    <li class="active">
                        Edit Visa Detail
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form action="{{route('visadetails.update',$data['id'])}}" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}
                <div class="card-box table-responsive">
                    <div class="p-10">
                        <div class="">
   
                            <div class="col-md-12">
                                <div class="form-group m-b-20">
                                    <label>Detail Title</label>
                                    <input type="text" class="form-control" name="visa_title" id="blog-title" placeholder="Enter title" value="{{$data['visa_title']}}" required="required">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug" value="{{$data['slug']}}"  required="required">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group m-b-20">
                                    <label>Country</label>
                                        <select required="required" class="form-control select2" name="country_id" >
                                         @foreach($visa_countries as $value)
                                         
                <?php if($value->id != $data['country_id']) { continue; } ?>
                                         
                                                <option <?php if($value->id == $data['country_id']) { echo 'selected="selected"'; } ?> value="{{$value->id}}">{{$value->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea required="required" class="summernote" name="visa_description" rows="10" required placeholder="Enter short description">{{$data['visa_description']}}</textarea>
                                </div>
                            </div>
                            
                            <!--- schema markup satart by sadam --->
                            <div class="optionBox">
                            <?php 
                                 $question = json_decode($data['sm_question']);
                                 $answer = json_decode($data['sm_answer']);
                                 $count =  count($question);
                                 if($count > 0)
                                 {
                                     for($i = 0; $i < $count; $i++)
                                     { ?>
                                    
                                        <div class="block">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Scehma Markup Question</label>
                                                    <input type="text" class="form-control" name="sm_question[]" value="{{ $question[$i] }}" id="sm_question" required>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>                                    
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Scehma Markup Answer</label>
                                                    <textarea class="form-control" name="sm_answer[]" rows="10" required placeholder="Enter short description">{!!$answer[$i]!!}</textarea>
                                                </div>
                                            </div>
                                            <button class="remove btn btn-danger btn-sm fa fa-trash"> Remove Schema Question</button>
                                        </div>
                                        <hr>
                                    <?php
                                            }
                                         }
                                    ?>
                                    <div class="block">
                                        <button class="add btn btn-primary btn-sm fa fa-plus"> Add Schema Question</button>
                                    </div>
                                </div>
                                <hr>
                            <!--- sechem markup end by Sadam    --->
                            
                            <div class="col-md-6">
                              @if(empty($data['visa_image']))
                            <div class="form-group m-b-20">
                                <label>Image</label>
                                <div class="image-placeholder" id="wfm" data-input="f-hidden" data-preview="f-holder">
                                    <img src="{{asset("placeholder.jpg")}}" id="f-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                </div>
                                <a href="javascript:void(0)" class="removeImage" data-hidden="f-hidden" data-holder="f-holder" style="display: none">Remove Image</a>
                                <input type="hidden" required="required" name="visa_image" id="f-hidden">
                            </div>
                            @else
                            <div class="form-group m-b-20">
                                <label>Image</label>
                                <div class="image-placeholder" id="wfm" data-input="f-hidden" data-preview="f-holder">
                                    <img src="{{url($data['visa_image'])}}" id="f-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                </div>
                                <a href="javascript:void(0)" class="removeImage" data-hidden="f-hidden" data-holder="f-holder" style="display: none">Remove Image</a>
                                <input type="hidden" name="visa_image" id="f-hidden" required="required" value="{{$data['visa_image']}}">
                            </div>
                            @endif
                            </div>


                        </div>
                    </div>
                </div>

<div class="card-box table-responsive">
                    <div class="row">
                        <div class="form-group col-sm-1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Meta Tags</label> <br>
                            <input id="meta_tags" class="mark_featured seo" switch="primary" name="seo[show_meta]" type="checkbox" @isset($data['seo']->show_meta) @if($data['seo']->show_meta != null) checked="checked" @endif @endisset>
                            <label for="meta_tags" data-on-label="Yes" data-off-label="No"></label>
                        </div>
                    </div>

                    <div class="row" id="show_meta_tags" @if(isset($data['seo']->show_meta)) @if($data['seo']->show_meta == null) style="display:none;" @endif @else style="display:none;" @endif>
                        <hr>
                        <h5 style="padding-left: 20px;">META TAGS</h5>
                        <hr>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Meta Title</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="seo[meta_title]" value="{{$data['seo']->meta_title or ''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Meta Keywords</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" data-role="tagsinput" name="seo[meta_keywords]" value="{{$data['seo']->meta_keywords or ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Meta Description</label>
                                <div class="col-md-12">
                                    <textarea maxlength="255" class="form-control" name="seo[meta_description]">{{$data['seo']->meta_description or ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Save">
                            @if(check_access(Auth::user()->id,'blog','_delete')==1)
                            <a href="javascript:void(0)" class="btn btn-danger" onclick="deleteit()">Delete</a>
                            @endif
                            <a href="{{route('visadetails.index')}}" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{route('visadetails.destroy',$data['id'])}}" method="POST" id="delete-form">
                <input type="hidden" name="_method" value="DELETE">
                {{csrf_field()}}
            </form>
        </div>
    </div>

</div>

@endsection
@section('customScripts')
<script src="{{asset('plugins/summernote/summernote.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset("plugins/select2/js/select2.min.js")}}" type="text/javascript"></script>
<script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
});
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
function deleteit() {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this!",
            type: "error",
            showCancelButton: true,
            cancelButtonClass: 'btn-default btn-md waves-effect',
            confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
            confirmButtonText: 'Delete!',
        },function() {
              $("#delete-form").submit();
        });
    }
var loadFile = function(event) {
    var output = $('#featured_image');
    output.attr('src', URL.createObjectURL(event.target.files[0]));
};
</script>
<script>
$(document).ready(function(){
    
    // dynamic row for schema start by sadam

        $('.add').click(function() {
            $('.block:last').before('<div class="block"><div class="col-md-12"><div class="form-group"><label>Scehma Markup Question</label><input type="text" class="form-control" name="sm_question[]" id="sm_question" required></div></div><div class="clearfix block"></div><div class="col-md-12 block"><div class="form-group"><label>Scehma Markup Answer</label><textarea class="form-control" name="sm_answer[]" rows="10" required placeholder="Enter short description"></textarea></div></div><button class="remove btn btn-danger btn-sm fa fa-trash"> Remove Schema Question</button></div><hr>');
        });
        $('.optionBox').on('click','.remove',function() {
         	$(this).parent().remove();
        });
    // dynamic row for schema end
     

    // Define function to open filemanager window
    var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '{{url('/filemanager')}}';
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
        
                lfm({type: 'image', prefix: '{{url('/filemanager')}}'}, function(url, path) {
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
            ['misc',['codeview']],
            ['table', ['table']],
            ['insert', ['link', 'unlink', 'picture', 'video','hr']]
        ],
        buttons: {
            lfm: LFMButton
        }
    })
   $(".select2").select2();
});
</script>
@endsection