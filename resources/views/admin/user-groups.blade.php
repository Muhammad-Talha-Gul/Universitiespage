@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
@if(check_access(Auth::user()->id,'groups','_show')==1)
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">User Groups </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        All User Groups
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card-box table-responsive">
                @if(check_access(Auth::user()->id,'groups','_create')==1)
                <a href="{{route('groups.create')}}" class="btn btn-primary btn-sm pull-right" style="margin-bottom: 10px;">Add Group</a>
                @endif
                <h4 class="m-t-0 header-title"><b>Groups List</b></h4>
                <table id="datatable" class="table hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>No. of Users</th>
                        <th>Created at</th>
                        @if(check_access(Auth::user()->id,'groups','_edit')==1)
                        <th>Action</th>
                        @endif
                    </tr>
                    </thead>

                    <tbody>
                	@foreach($data as $value)
                	<tr>
                        <td></td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->users->count()}}</td>
                        <td>{{$value->created_at}}</td>
                        
                		<td>
                            @if(check_access(Auth::user()->id,'groups','_edit')==1)
                                <a href="{{route('groups.edit',$value->id)}}" class="btn btn-warning btn-xs">Edit</a>
                            @endif
                            @if(check_access(Auth::user()->id,'groups','_delete')==1)
                                <a class="btn btn-danger btn-xs"  onclick="deleteit({{$value->id}})"><i class="fa fa-trash"></i></a>
                                <form action="{{route('groups.destroy',$value['id'])}}" method="POST" id="delete-form-{{$value->id}}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{csrf_field()}}
                                </form>
                            @endif
                        </td>
                        
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
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script type="text/javascript">
	$('#datatable').dataTable();
     function deleteit(id) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this!",
            type: "error",
            showCancelButton: true,
            cancelButtonClass: 'btn-default btn-md waves-effect',
            confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
            confirmButtonText: 'Delete!',
        },function() {
              $("#delete-form-"+id).submit();
        });
    }
</script>

@endsection