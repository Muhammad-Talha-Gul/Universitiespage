@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Add Custom Product Types </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Add Product Types
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
            <form action="{{route('attribute.store')}}" method="POST"> 
                {{csrf_field()}}
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Post Type</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="custom_post_type" required>
                                        <option value="">Select Post Type</option>
                                        @foreach(show_post_types() as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
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
                                <label>Attribute Name</label>
                                <input type="text" name="attribute_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Attribute Type</label>
                                <select class="form-control" id="type-selection" name="input_type">
                                    <option value="text">Single Line Input</option>
                                    <option value="number">Number</option>
                                    <option value="textarea">Multi-Line Input</option>
                                    <option value="select">Dropdown</option>
                                    <option value="radio">Radio Buttons</option>
                                    <option value="checkbox">Checkboxes</option>
                                    <option value="editor">Editor</option>
                                    <option value="date">Date</option>
                                    <option value="email">Email</option>
                                    <option value="color">Color</option>
                                    <option value="tags">Tags</option>
                                    <option value="questions">Questions & Anwsers</option>
                                    <option value="file">File</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="attributes-data" style="display: none;">
                                <label>Attribute Data</label>
                                <div class="tags-default">
                                    <input type="text" name="attribute_data" value="" data-role="tagsinput" placeholder="add data" style="height: 45px;" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Active</label>
                                <input type="checkbox" name="is_active" value="1" checked>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="{{route('attribute.index')}}" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </form>
		</div>
	</div>

</div>
@endsection
@section('customScripts')
<script src="{{asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')}}"></script>
<script type="text/javascript">
    $("#type-selection").on('change',function(){
        var val = $(this).val();
        if(val=='select' || val=='radio' || val=='checkbox') {
            $("#attributes-data").show(300);
        } else {
            $("#attributes-data").hide(300);
        }
    });
</script>
@endsection