@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Custom Post Types </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Post Types
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card-box table-responsive">
                <a href="{{route('post_type.create')}}" class="btn btn-primary btn-md pull-right" style="margin-bottom: 10px;">Add Type</a>
                <h4 class="m-t-0 header-title"><b>Post Types List</b></h4>

                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Sort Order</th>
                        <th>Active</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                	@foreach($data as $value)
                	<tr>
                		<td>{{$value->name}}</td>
                		<td>{{$value->sort_order}}</td>
                		<td>{{($value->is_active==1)?'Yes':'No'}}</td>
                        <td>{{$value->created_at}}</td>
                		<td><a href="{{route('post_type.edit',$value->id)}}" class="btn btn-warning btn-md">Edit</a></td>
                	</tr>
                	@endforeach

                    </tbody>
                </table>
            </div>
		</div>
	</div>

</div>
@endsection
@section('customScripts')
<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript">
	$('#datatable').dataTable();
</script>

@endsection