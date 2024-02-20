@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('assets_backend/css/tree.css')}}">
<link href="{{asset("plugins/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Edit Custom Category </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Edit Category
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
            @if(isset($_GET['type']))
            <form action="{{route('category.update',$data['id'])}}?type={{$_GET['type']}}" method="POST"> 
            @else
            <form action="{{route('category.update',$data['id'])}}" method="POST"> 
            @endif
                <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}
                <div class="card-box table-responsive">
                    <div class="row">
                        @if(isset($_GET['type']))
                        <input type="hidden" name="custom_post_type" value="{{$_GET['type']}}">            
                        @else
                        @if(count(show_post_types())>0)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Post Type</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="custom_post_type">
                                        <option value="">Select Post Type</option>
                                        @foreach(show_post_types() as $type)
                                        <option value="{{$type->id}}" {{($data['custom_post_type']==$type->id)?'selected':''}}>{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Page Slider</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="slider_id">
                                        <option value="">Select Slider</option>
                                        @foreach($sliders as $slider)
                                        <option value="{{$slider->id}}" {{($data['slider_id']==$slider->id)?'selected':''}}>{{$slider->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="name" class="form-control" value="{{$data['name']}}">
                            </div>
                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea name="description" class="form-control">{{$data['description']}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Parent</label>
                                <select class="form-control select2" name="parent_id">
                                    <option value="">None</option>
                                    @foreach($categories as $key => $value)
                                    <option value="{{$value->id}}" {{($data['parent_id']==$value->id)?'selected':''}}>{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sort Order</label>
                                <input type="number" name="sort_order" value="{{$data['sort_order']}}" min="0" class="form-control">
                            </div>
                            @if(empty($data['image']))
                                <div class="form-group m-b-20">
                                    <label>Featured Image</label>
                                    <div class="image-placeholder" id="wfm" data-input="f-hidden" data-preview="f-holder">
                                        <img src="{{asset("placeholder.jpg")}}" id="f-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                    </div>
                                    <a href="javascript:void(0)" class="removeImage" data-hidden="f-hidden" data-holder="f-holder" style="display: none">Remove Image</a>
                                    <input type="hidden" name="image" id="f-hidden">
                                </div>
                                @else
                                <div class="form-group m-b-20">
                                    <label>Featured Image</label>
                                    <div class="image-placeholder" id="wfm" data-input="f-hidden" data-preview="f-holder">
                                        <img src="{{url($data['image'])}}" id="f-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                    </div>
                                    <a href="javascript:void(0)" class="removeImage" data-hidden="f-hidden" data-holder="f-holder" style="display: none">Remove Image</a>
                                    <input type="hidden" name="image" id="f-hidden" value="{{$data['image']}}">
                                </div>
                                @endif
                        </div>
                        <div class="col-md-6">
                            <label>Tree View of Category Levels</label>
                            <div class="card-box" style="max-height: 249px !important; overflow: scroll;">
                                <ul id="tree2">
                                    @foreach($categories->where('parent_id',null) as $value)
                                    <li>
                                        {{ $value->name }}
                                        @if(count($value->childrens))
                                            @include('ajax.cats_tree', ['childrens' => $value->childrens])
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" value="{{$data['meta_title']}}">
                            </div>
                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea name="meta_description" maxlength="255" class="form-control">{{$data['meta_description']}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Meta Keywords <small>(comma seperated)</small></label>
                                <input type="text" data-role="tagsinput" name="meta_keywords" class="form-control" value="{{$data['meta_keywords']}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Active</label>
                                <input type="checkbox" name="is_active" value="1" {{($data['is_active']==1)?'checked':''}}>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Update">
                            <a href="javascript:void(0)" class="btn btn-danger" onclick="deleteit()">Delete</a>
                            @if(isset($_GET['type']))
                            <a href="{{route('category.index')}}?type={{$_GET['type']}}" class="btn btn-success">Back</a>
                            @else
                            <a href="{{route('category.index')}}" class="btn btn-success">Back</a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>

            <form action="{{route('category.destroy',$data['id'])}}" method="POST" id="delete-form">
                <input type="hidden" name="_method" value="DELETE">
                {{csrf_field()}}
            </form>
		</div>
	</div>

</div>
@endsection
@section('customScripts')
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script src="{{asset('assets_backend/js/tree.js')}}"></script>
<script src="{{asset("plugins/select2/js/select2.min.js")}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        $(".select2").select2();
        $('#tree2').treed({openedClass:'fa fa-plus-o', closedClass:'fa fa-minus'});
        $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
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
</script>
@endsection