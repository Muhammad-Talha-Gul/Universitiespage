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
                <h4 class="page-title">Edit Visa Country </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li>
                        <a href="{{route('blog.index')}}">Visa Country</a>
                    </li>
                    <li class="active">
                        Edit Visa Country
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form action="{{route('visacountries.update',$data['id'])}}" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}
                <div class="card-box table-responsive">
                    <div class="p-10">
                        <div class="">
                            <div class="col-md-6">
                                <div class="form-group m-b-20">
                                    <label>Country Title</label>
                                    <input type="text" class="form-control" id="blog-title" name="country_name" placeholder="Enter title" value="{{$data['country_name']}}" required>
                                </div>
                            </div>
                            <div class="clearfix"></div>   

                            @if(empty($data['country_image']))
                            <div class="form-group m-b-20">
                                <label>Country Image</label>
                                <div class="image-placeholder" id="wfm" data-input="f-hidden" data-preview="f-holder">
                                    <img src="{{asset("placeholder.jpg")}}" id="f-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                </div>
                                <a href="javascript:void(0)" class="removeImage" data-hidden="f-hidden" data-holder="f-holder" style="display: none">Remove Image</a>
                                <input type="hidden" name="country_image" id="f-hidden">
                            </div>
                            @else
                            <div class="form-group m-b-20">
                                <label>Country Image (200px X 100px)</label>
                                <div class="image-placeholder" id="wfm" data-input="f-hidden" data-preview="f-holder">
                                    <img src="{{url($data['country_image'])}}" id="f-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                </div>
                                <a href="javascript:void(0)" class="removeImage" data-hidden="f-hidden" data-holder="f-holder" style="display: none">Remove Image</a>
                                <input type="hidden" name="country_image" id="f-hidden" value="{{$data['country_image']}}">
                            </div>
                            @endif
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
                            <a href="{{route('visacountries.index')}}" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{route('visacountries.destroy',$data['id'])}}" method="POST" id="delete-form">
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
            ['misc',['codeview']]
        ],
        buttons: {
            lfm: LFMButton
        }
    })
   $(".select2").select2();
});
</script>
@endsection