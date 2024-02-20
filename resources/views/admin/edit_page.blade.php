@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/summernote/summernote.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset("plugins/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
<style type="text/css">
    .ui-state-default {padding: 10px;margin-bottom: 10px;border-radius: 10px;}
    ul.components_list { width: 100%;list-style: none;display: inline-block;overflow: auto; white-space: nowrap; padding: 0px;margin: 0px;  }
    ul.components_list li { /*float: left;*/ display: inline-block; padding-right: 10px; margin: 0px;  }
    ul.components_list li a { text-align: center; padding: 5px; display: block; text-decoration: none;  }
    ul.components_list li a img { margin-bottom: 3px; }
    ul.components_list li a span { display: block; }
    .methods-list .row:nth-child(even) {margin-top: 5px;background: #f7f7f7;padding: 5px;border: 1px solid #ccc;}
    .methods-list .row:nth-child(odd) {margin-top: 5px;padding: 5px;border: 1px solid #ccc;}
    .deleteMethod {position: absolute;text-align: center;font-size: 25px;right: -7px;z-index: 99;top: -21px;}
    ul.components_list::-webkit-scrollbar-track {-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);background-color: #F5F5F5;}
    ul.components_list::-webkit-scrollbar{height: 5px;background-color: #F5F5F5; cursor: pointer;}
    ul.components_list::-webkit-scrollbar-thumb {background-color: #782572;}
    a.removeAcc {position: absolute;top: -16px;right: -7px;font-size: 20px;color: red;}
    .icon-item,.history-item {position: relative;}
    a.removeIcon,a.removeHistory {position: absolute;top: -16px;right: -7px;font-size: 20px;color: red;}
</style>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Edit Page </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Edit Page
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
            <form action="{{route('updatePage',$data['id'])}}" method="POST"> 
                {{csrf_field()}}
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Title</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="title" id="page-title" value="{{$data['title']}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">{{url("/page")}}/</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="slug" name="slug" value="{{$data['slug']}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="card-box table-responsive">
                    <div class="row" id="components">
                        @foreach($components as $key => $value)
                        @if($value->type=="search")
                        @component('admin.components.search',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="buttons")
                        @component('admin.components.buttons',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="programs")
                        @component('admin.components.programs',['sliders'=>$sliders,'rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="editor")
                        @component('admin.components.editor',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent
                        
                        @elseif($value->type=="guide")
                        @component('admin.components.guide',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="blog")
                        @component('admin.components.blog',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="banner")
                        @component('admin.components.banner',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="popular")
                        @component('admin.components.popular',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="consultant")
                        @component('admin.components.consultant',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="institution")
                        @component('admin.components.institution',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="courses")
                        @component('admin.components.courses',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="contact")
                        @component('admin.components.contact',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="spacer")
                        @component('admin.components.spacer',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="login")
                        @component('admin.components.login',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="register")
                        @component('admin.components.register',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="forum")
                        @component('admin.components.forum',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Custom Css</label>
                                <div class="col-md-12">
                                    <textarea rows="5" class="form-control" name="custom_css" placeholder="Add your custom styles here">{!! $data->custom_css or '' !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-2">
                            <label>Meta Tags</label> <br>
                            <input id="meta_tags" class="mark_featured seo" switch="primary" name="seo[show_meta]" type="checkbox" @isset($data->seo->show_meta) @if($data->seo->show_meta != null) checked="checked" @endif @endisset>
                            <label for="meta_tags" data-on-label="Yes" data-off-label="No"></label>
                        </div>
                    </div>

                    <div class="row" id="show_meta_tags" @if(isset($data->seo->show_meta)) @if($data->seo->show_meta == null) style="display:none;" @endif @else style="display:none;" @endif>
                        <hr>
                        <h5 style="padding-left: 20px;">META TAGS</h5>
                        <hr>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Meta Title</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="seo[meta_title]" value="{{$data->seo->meta_title or ''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Meta Keywords</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" data-role="tagsinput" name="seo[meta_keywords]" value="{{$data->seo->meta_keywords or ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Meta Description</label>
                                <div class="col-md-12">
                                    <textarea maxlength="255" class="form-control" name="seo[meta_description]">{{$data->seo->meta_description or ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="{{route('dynamicPages')}}" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{route('deletePage',$data['id'])}}" method="POST" id="delete-form">
                <input type="hidden" name="_method" value="DELETE">
                {{csrf_field()}}
            </form>
		</div>
	</div>

</div>
@endsection
@section('customScripts')
<script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script src="{{asset('plugins/summernote/summernote.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset("plugins/select2/js/select2.min.js")}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script type="text/javascript">
function convertToSlug(Text) {
    return Text
    .toLowerCase()
    .replace(/[^\w ]+/g,'')
    .replace(/ +/g,'-')
    ;
}
var lfm = function(options, cb) {
    var route_prefix = (options && options.prefix) ? options.prefix : '{{url('/filemanager')}}';
    window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
    window.SetUrl = cb;
};

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
jQuery(document).ready(function(){
    $(".select2").select2();
    $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
    $("#components").sortable({
      handle: ".handle",
      axis: 'y'
    });
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
                ['misc',['codeview']]
            ],
            buttons: {
                lfm: LFMButton
            }
        });
    $(document).on('focusout','#page-title',function(){
        $("#slug").val(convertToSlug($(this).val()));
    });
    $(".component").click(function(){
        var comp = $(this).data('comp');
        var data = { '_token':"{{csrf_token()}}", 'comp':$(this).data('comp') };
        jQuery.ajax({
            url:'{{route("ajaxGetComps")}}',
            type: 'post',
            dataType: 'html',
            data: data,
            success: function( data ){
                $("#components").append(data);
                $('.'+comp+'_eye').prop('checked',true);
                $(".select2").select2();
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
                        ['misc',['codeview']]
                    ],
                    buttons: {
                        lfm: LFMButton
                    }
                });
                $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
            }
        });
    });
});
function convertToSlug(Text) {
    return Text
        .toLowerCase()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-')
        ;
}
$(document).on('change','.product_type',function(){
    if($(this).val()=="category") {
        $(this).parent().next().closest('.categories').show(300);
    } else if($(this).val()=="brand") {
        $(this).parent().next().closest('.categories').hide();
    } else {
        $(this).parent().next().closest('.categories').hide(300);
    }
}); 
$(document).on('change','.product_style',function(){
    if($(this).val()==2) {
        $(this).parent().parent().find('.style2').show(300);
    } else {
        $(this).parent().parent().find('.style2').hide(300);
    }
}); 
    $(document).on('click',".addIcon", function(){
        var id = $(this).data('id');
        var count = Math.floor((Math.random() * 999) + 1);
        var html = `<div class="icon-item panel panel-info panel-border"> 
                            <a href="javascript:void(0)" class="removeIcon">
                                <i class="fa fa-times"></i>
                            </a> 
                            <div class="panel-heading"> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="components[`+id+`][icons][heading][]" placeholder="Title"> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                           <span class="input-group-btn">
                                             <a data-input="thumbnail`+id+`-`+count+`" data-preview="holder`+id+`-`+count+`" class="btn btn-success image-placeholder"><i class="fa fa-picture-o"></i> Choose</a>
                                           </span>
                                           <input id="thumbnail`+id+`-`+count+`" class="form-control" type="text" name="components[`+id+`][icons][image][]" placeholder="Icon">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="panel-body"> 
                                <div class="row">                                    
                                    <div class="form-group col-md-12">
                                        <label>Detail</label>
                                        <textarea class="form-control" name="components[`+id+`][icons][detail][]" placeholder="Detail"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Button Text</label>
                                        <input type="text" name="components[`+id+`][icons][btn-text][]" class="form-control" placeholder="Button Text">
                                    </div>                                    
                                    <div class="form-group icon-link col-md-6">
                                        <label>Button Lin</label>
                                        <input type="text" name="components[`+id+`][icons][btn-link][]" class="form-control" placeholder="Button Link">
                                    </div>                                    
                                </div>
                            </div>
                        <hr></div>`;
        $("#icons-"+id).append(html);
        $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
    });
    $(document).on('click',".addHistory", function(){
        var id = $(this).data('id');
        var count = Math.floor((Math.random() * 999) + 1);
        var html = `<div class="history-item panel panel-info panel-border"> 
                            <a href="javascript:void(0)" class="removeHistory">
                                <i class="fa fa-times"></i>
                            </a> 
                            <div class="panel-body"> 
                                <div class="row" style="border:0px;">
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" name="components[`+id+`][history][heading][]" placeholder="Title"> 
                                    </div>                                    
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control" name="components[`+id+`][history][detail][]" placeholder="Detail"></textarea>
                                    </div>                                    
                                </div>
                            </div>
                        <hr></div>`;
        $("#history-"+id).append(html);
    });
    $(document).on('click',".removeIcon",function(){
        $(this).parent().remove();
    });
    $(document).on('click',".removeHistory",function(){
        $(this).parent().remove();
    });

    /* SEO Related */
    $(document).on('change', '.seo', function(){
        var id = $(this).attr('id');
        if($(this).is(':checked')){
        $('#show_'+id).slideDown(300);
        }else{
        $('#show_'+id).slideUp(300);
        }
    });
    $(document).on('change','.columns_selection',function(){
        var i; var html = ""; var rand = $(this).data('rand'); var placement = $(this).data('placement');
        for (i = 1; i <= $(this).val(); i++) { 
            html+=`<div class="form-group col-md-12"><textarea class="summernote" name="components[`+rand+`][editor][content_`+i+`]">Column `+i+`</textarea></div>`;
        }
        $("#"+placement).html(html);
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
                ['misc',['codeview']]
            ],
            buttons: {
                lfm: LFMButton
            }
        });
    });
    $(document).on('click', '.addTab', function(){
        var id = $(this).data('id');
        $("#tabs-"+id).append(`<div class="acc-item panel panel-info panel-border"> <a href="javascript:void(0)" class="removeAcc"><i class="fa fa-times"></i></a> <div class="panel-heading"> <input type="text" class="form-control" name="components[`+id+`][tabs][tab_title][]" placeholder="Title"> </div> <div class="panel-body"> <textarea class="form-control summernote" name="components[`+id+`][tabs][tab_detail][]" placeholder="Detail"></textarea></div></div>`);
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
        });  
    });
    $(document).on('click',".removeAcc",function(){
        $(this).parent().remove();
    });
    $(document).on('click',".addImage", function(){
        var id = $(this).data('id');
        var count = Math.floor((Math.random() * 999) + 1);
        var html = `<div class="row text-center" style="position: relative;">
                        <div class="input-group pull-left col-md-6">
                           <span class="input-group-btn">
                             <a data-input="thumbnail`+id+`-`+count+`" data-preview="holder`+id+`-`+count+`" class="btn btn-success image-placeholder"><i class="fa fa-picture-o"></i> Choose</a>
                           </span>
                           <input id="thumbnail`+id+`-`+count+`" class="form-control" type="text" name="components[`+id+`][images][image][]">
                        </div>
                        <div class="form-group col-md-5">
                            <input type="text" class="form-control" name="components[`+id+`][images][text][]" placeholder="Text">
                        </div>                        
                        <div class="form-group col-md-1">
                            <a href="javascript:void(0)" class="btn btn-md btn-danger removeText"><i class="fa fa-times"></i></a>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" placeholder="Desciption" name="components[`+id+`][images][desc][]">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="components[`+id+`][images][btntext][]" class="form-control" placeholder="Button Text" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="components[`+id+`][images][btnlink][]" class="form-control" placeholder="Button Link" value="">
                        </div>                        
                    </div>`;
        $("#images-"+id).append(html);
        $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});        
    });
    $(document).on('click',".removeText",function(){
        $(this).parent().parent().remove();
    });








    $(document).on('change', '.change-style', function(){
        var rand = $(this).attr('data-rand');
        var val = $(this).val();
        $('.style-box'+rand).fadeOut(200);
        $('.'+val+rand).delay(200).fadeIn(200);
    });
    $(document).on('click', '.add-topic', function(){
        var rand = $(this).attr('data-rand');
        var key = $('.cosultant-topic .topic').length;
        var html=`
            <div class="topic form-group col-lg-3 col-md-4 col-sm-6" style="position: relative;">
                <div class="image-placeholder" id="wfm`+key+`" data-input="`+key+`b1-`+rand+`-hidden" data-preview="`+key+`b1-`+rand+`-holder">
                    <img src="{{asset('placeholder.jpg')}}" id="`+key+`b1-`+rand+`-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                </div>
                <button type="button" class="btn btn-danger remove-topic" style="position: absolute;top:0px;right: 11px;border-bottom-left-radius: 224px;width: 39px;padding-bottom: 13px;padding-left: 16px;"><i class="fa fa-trash"></i></button>
                <input type="hidden" name="components[`+rand+`][consultant][topic][`+key+`][image]" id="`+key+`b1-`+rand+`-hidden" > <br>
                <div class="form-group">
                    <input type="text" name="components[`+rand+`][consultant][topic][`+key+`][title]" class="form-control" placeholder="Title/Heading">
                </div>
            </div>
        `;
        $('.cosultant-topic').append(html);
        $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});        
    });
    $(document).on('click', '.remove-topic', function(){
        $(this).parent().remove();
    });
</script>
<script type="text/javascript">
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
</script>
@endsection