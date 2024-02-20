@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>\
@endsection
@section('content')
@if(check_access(Auth::user()->id,'users','_show')==1)
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Users </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        All Users
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card-box table-responsive">
                @if(check_access(Auth::user()->id,'users','_create')==1)
                <a href="{{route('users.create')}}" class="btn btn-primary btn-md pull-right" style="margin-bottom: 10px;">Add User</a>
                @endif
                <h4 class="m-t-0 header-title"><b>Users List</b></h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control filter-role selectable">
                                <option value="">All Users</option>
                            </select>
                        </div>
                    </div>
                </div>
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th id="filter-role">Role</th>
                        <th>Created at</th>
                        @if(check_access(Auth::user()->id,'users','_edit')==1)
                        <th>Action</th>
                        @endif
                    </tr>
                    </thead>

                    <tbody>
                	@foreach($data as $value)
                	<tr>
                        <td>@if(empty($value->image))
                            No Image
                            @else
                            <img src="{{url($value->image)}}" width="50">
                            @endif
                        </td>
                        <td>{{$value->first_name.' '.$value->last_name}}</td>
                		<td>{{$value->email}}</td>
                        <td>{{$value->phone}}</td>
                		<td>{{$value->group->name or 'Administrator'}}</td>
                        <td>{{$value->created_at}}</td>
                        @if(check_access(Auth::user()->id,'users','_edit')==1)
                		<td><a href="{{route('users.edit',$value->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a></td>
                        @endif
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
<script type="text/javascript">
	$('#datatable').dataTable({
        initComplete: function () {
            this.api().columns('#filter-role').every( function () {
                var column = this;
                var select = $('.filter-role')
                    //.appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var search = [];

                          $.each($('.filter-role option:selected'), function(){
                              search.push($(this).val());
                          });
                          
                          search = search.join('|');
                        column
                            .search( search, true, false )
                            .draw();
                    } );
                column.data().unique().sort().each( function ( d, j ) {
                    if(d!="")
                    {
                      select.append( '<option value="'+d+'">'+d+'</option>' )
                    }
                });
            });
        }
    });
</script>

@endsection