@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/summernote/summernote.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link href="{{asset("plugins/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<style type="text/css">
    .ui-state-default {padding: 10px;margin-bottom: 10px;border-radius: 10px;}
    ul.components_list { width: 100%;list-style: none;display: inline-block;overflow: hidden;padding: 0px;margin: 0px;  }
    ul.components_list li { float: left; display: inline-block; padding-right: 10px; margin: 0px;  }
    ul.components_list li a { text-align: center; padding: 5px; display: block; text-decoration: none;  }
    ul.components_list li a img { margin-bottom: 3px; }
    ul.components_list li a span { display: block; }
    .methods-list .row:nth-child(even) {margin-top: 5px;background: #f7f7f7;padding: 5px;border: 1px solid #ccc;}
    .methods-list .row:nth-child(odd) {margin-top: 5px;padding: 5px;border: 1px solid #ccc;}
    .deleteMethod {position: absolute;text-align: center;font-size: 25px;right: -7px;z-index: 99;top: -21px;} 
</style>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Edit Homepage </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Homepage
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
            <form action="{{route('updateHomePage')}}" method="POST"> 
                {{csrf_field()}}
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Title</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="title" value="{{$data['title']}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">{{url("/page")}}/</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value="{{url("/")}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                              <ul class="components_list">
                                <li>
                                    <a href="javascript:void(0)" class="component" data-comp="product_slider">
                                    <img class="icon-colored" src="{{asset("assets_backend/images/icons/add_row.svg")}}" title="add_row.svg">
                                    <span>Product Slider</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="component" data-comp="ads">
                                    <img class="icon-colored" src="{{asset("assets_backend/images/icons/stack_of_photos.svg")}}">
                                    <span>Ads/Banners</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="component" data-comp="slider"><img class="icon-colored" src="{{asset("assets_backend/images/icons/panorama.svg")}}" title="Slider">
                                        <span>Slider</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="component" data-comp="icons">
                                        <img class="icon-colored" src="{{asset("assets_backend/images/icons/accept_database.svg")}}">
                                        <span>Icons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="component" data-comp="2_cols">
                                        <img class="icon-colored" src="{{asset("assets_backend/images/icons/template.svg")}}">
                                        <span>2 Column Products</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="component" data-comp="methods">
                                    <img class="icon-colored" src="{{asset("assets_backend/images/icons/add_image.svg")}}">
                                    <span>Methods</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="component" data-comp="testimonials">
                                    <img class="icon-colored" src="{{asset("assets_backend/images/icons/collaboration.svg")}}">
                                    <span>Testimonials</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="component" data-comp="cats">
                                        <img class="icon-colored" src="{{asset("assets_backend/images/icons/list.svg")}}">
                                        <span>Categories</span>
                                    </a>
                                </li>
                              </ul>    
                        </div>
                    </div>
                </div>
                <div class="card-box table-responsive">
                    <div class="row" id="components">
                        @foreach($components as $key => $value)
                        @if($value->type=="products")
                        @component('admin.components.product-slider',['rand'=>$key,'categories'=>$categories,'brands'=>$brands,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="slider")
                        @component('admin.components.slider',['rand'=>$key,'sliders'=>$sliders,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="ads")
                        @component('admin.components.ads',['rand'=>$key,'banners'=>$banners,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="cats")
                        @component('admin.components.cats',['rand'=>$key,'categories'=>$categories,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="methods")
                        @component('admin.components.methods',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="icons")
                        @component('admin.components.icons',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent

                        @elseif($value->type=="2_cols")
                        @component('admin.components.2_cols',['rand'=>$key,'categories'=>$categories,'brands'=>$brands,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent
                        @elseif($value->type=="testimonials")
                        @component('admin.components.testimonials',['rand'=>$key,'meta'=>json_decode($value['meta'],true)]) {{$value->title}} @endcomponent
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Meta Title</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="meta_title" value="{{$data['meta_title']}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Meta Description</label>
                                <div class="col-md-10">
                                    <textarea maxlength="255" class="form-control" name="meta_desc">{{$data['meta_desc']}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Meta Keywords</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" data-role="tagsinput" name="meta_keywords" value="{{$data['meta_keywords']}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Update">
                            <a href="{{route('dynamicPages')}}" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
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
<script type="text/javascript">
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
    });
    $(".component").click(function(){
        var data = { '_token':"{{csrf_token()}}", 'comp':$(this).data('comp') };
        jQuery.ajax({
            url:'{{route("ajaxGetComps")}}',
            type: 'post',
            dataType: 'html',
            data: data,
            success: function( data ){
                $("#components").append(data);
                $(".select2").select2();
                $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
            }
        });
    });
});
$(document).on('change','.product_type',function(){
    if($(this).val()=="category") {
        $(this).parent().next().closest('.categories').show(300);
        $(this).parent().next().next().closest('.brands').hide();
    } else if($(this).val()=="brand") {
        $(this).parent().next().next().closest('.brands').show(300);
        $(this).parent().next().closest('.categories').hide();
    } else {
        $(this).parent().next().closest('.categories').hide(300);
        $(this).parent().next().next().closest('.brands').hide(300);
    }
});
    $(document).on('click',".addMethod", function(){
        var count1 = Math.floor(Math.random() * 999); var count2 = Math.floor(Math.random() * 999);
        var id = $(this).data('id');
        var html = `<div class="row text-center" style="position: relative;">
                        <a href="javascript:void(0)" class="text-danger deleteMethod"><i class="fa fa-times"></i></a>
                        <div class="form-group col-md-6">
                            <div class="image-placeholder" id="wfm" data-input="f-hidden-`+count1+`" data-preview="f-holder-`+count1+`">
                                <img src="{{asset('placeholder.jpg')}}" id="f-holder-`+count1+`" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                            </div>
                            <input type="hidden" name="components[`+id+`][methods][image1][]" id="f-hidden-`+count1+`">
                        </div>
                        <div class="form-group col-md-6">
                            <div class="image-placeholder" id="wfm" data-input="f-hidden-`+count2+`" data-preview="f-holder-`+count2+`">
                                <img src="{{asset('placeholder.jpg')}}" id="f-holder-`+count2+`" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                            </div>
                            <input type="hidden" name="components[`+id+`][methods][image2][]" id="f-hidden-`+count2+`">
                        </div>
                    </div>`;
        $("#methods-"+id).append(html);
        $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
    });
    $(document).on('click',".deleteMethod",function(){
        $(this).parent().remove();
    });
    $(document).on('click',".addIcon", function(){
        var id = $(this).data('id');
        var html = `<div class="row text-center" style="position: relative;">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="components[`+id+`][icons][code][]" placeholder="Code">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="components[`+id+`][icons][text][]" placeholder="Text">
                            </div>
                            <div class="form-group col-md-2">
                                <a href="javascript:void(0)" class="btn btn-md btn-danger removeIcon"><i class="fa fa-times"></i></a>
                            </div>
                        </div>`;
        $("#icons-"+id).append(html);
        $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
    });
    $(document).on('click',".removeIcon",function(){
        $(this).parent().parent().remove();
    });
</script>
@endsection