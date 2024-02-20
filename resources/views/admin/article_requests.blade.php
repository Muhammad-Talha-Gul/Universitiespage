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
                <h4 class="page-title">Article Requests </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Article Requests</a>
                    </li>
                    <li class="active">
                        All Article Requests
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>Article Requests List</b></h4>

                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Author</th>
                        <th>Article Detail</th>
                        <th>Status</th>
                        <th>Submitted at</th>
                        <th>View</th>
                    </tr>
                    </thead>

                    <tbody>
                	@foreach($data as $value)
                	<tr>
                        <td>{{$value->user->first_name.' '.$value->user->last_name}}</td>    
                        <td>{{substr($value->description, 0,100).'..'}}</td>    
                        <td>{!!($value->status==1)?"<span class='badge badge-success'>Published</span>":"<span class='badge badge-warning'>Pending</span>"!!}</td>    
                        <td>{{date_format($value->created_at,'d/m/Y g:i A')}}</td>    
                        <td><a href="{{route("requestDetail",$value->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a></td>    
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