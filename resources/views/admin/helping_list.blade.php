@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
@if(check_access(Auth::user()->id,'additionals','_show')==1)
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Helping Hands </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Helping Hands</a>
                    </li>
                    <li class="active">
                        Helping Hands
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>Helping Hands List</b></h4>

                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        {{-- <th>Company</th>
                        <th>Designation</th>
                        <th>City</th> --}}
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                	@foreach($data as $value)
                	<tr>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        {{-- <td>{{$value->company}}</td>
                        <td>{{$value->designation}}</td>
                        <td>{{$value->city}}</td> --}}
                        <td>{{date_format($value->created_at,'d M Y g:i A')}}</td>
                        <td><a href="{{route("notification_detail",$value->id)}}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i> Show</a></td> 
                    </tr>
                	@endforeach

                    </tbody>
                </table>
            </div>
		</div>
	</div>

</div>
@else
@component('admin.access-denied') @endcomponent
@endif
@endsection
@section('customScripts')
<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/vfs_fonts.js')}}"></script>
<script type="text/javascript">
	$('#datatable').dataTable({
        "dom": 'TC<"clear">Bfrtip',
        "buttons": [{
            extend: "csv",
            className: "btn-sm"
        }, {
            extend: "excel",
            className: "btn-sm"
        }, {
            extend: "pdf",
            className: "btn-sm"
        }, {
            extend: "print",
            className: "btn-sm"
        }],
    });
</script>

@endsection