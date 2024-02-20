@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
{{-- @if(in_array("show", role(Auth::user()->user_type,'blog-category'))) --}}
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Post Category</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Category
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card-box table-responsive">
                {{-- @if(in_array("create", role(Auth::user()->user_type,'blog-category'))) --}}
                <a href="{{route('blog-category.create')}}" class="btn btn-primary btn-md pull-right" style="margin-bottom: 10px;">Add Category</a>
                {{-- @endif --}}
                <h4 class="m-t-0 header-title"><b>Categories List</b></h4>

                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Active</th>
                        <th>Created at</th>
                        {{-- @if(in_array("edit", role(Auth::user()->user_type,'blog'))) --}}
                        <th>Action</th>
                        {{-- @endif --}}
                    </tr>
                    </thead>


                    <tbody>
                	@foreach($data as $value)
                	<tr>
                        <td>
                            {{$value->name}}
                        </td>
                        <td>{{$value->slug}}</td>
                		<td>{{$value->description}}</td>
                		<td>{{($value->is_active==1)?'Yes':'No'}}</td>
                        <td>{{$value->created_at}}</td>
                        {{-- @if(in_array("edit", role(Auth::user()->user_type,'blog'))) --}}
                		<td><a href="{{route('blog-category.edit',$value->id)}}" class="btn btn-warning btn-md">Edit</a></td>
                        {{-- @endif --}}
                	</tr>
                	@endforeach

                    </tbody>
                </table>
            </div>
		</div>
	</div>

</div>
{{-- @else
<div class="container">
    <h2>Permission denied</h2>
</div>
@endif --}}
@endsection
@section('customScripts')
<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript">
	$('#datatable').dataTable();
</script>

@endsection