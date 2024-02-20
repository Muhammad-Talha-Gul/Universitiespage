@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{asset('assets_backend/css/tree.css')}}">
<style type="text/css">
    .loader {
        float: right;
        margin-left: 10px;
    }
</style>
@endsection
@section('content')
@if(check_access(Auth::user()->id,'ads','_show')==1)
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Advertisements / Banners </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                       Advertisements / Banners
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card-box table-responsive">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <p>{{Session::get('success')}}</p>
                </div>
                @elseif(Session::has('error'))
                <div class="alert alert-danger">
                    <p>{{Session::get('error')}}</p>
                </div>
                @endif
                <div class="form-group pull-right" style="margin-bottom: 10px;">
                    @if(check_access(Auth::user()->id,'ads','_delete')==1)
                    <form action="{{route("deleteBanners")}}" method="POST" id="del_form" form="del_form">{{csrf_field()}}</form>
                    <a class="btn btn-danger btn-sm" id="deleteAll">Delete (<span id="checkCount">0</span>)</a>
                    @endif
                    @if(check_access(Auth::user()->id,'ads','_create')==1)
                    <a href="{{route("addBanner")}}" class="btn btn-primary btn-sm">Add</a>
                    @endif
                </div>
                <h4 class="m-t-0 header-title"><b>Advertisements / Banners List</b></h4>

                <table id="datatable" class="table hover">
                    <thead>
                    <tr style="width: 5%">
                        <th>
                            <div class="checkbox checkbox-primary m-r-15 m-l-5">
                                <input type="checkbox" id="check_all">
                                <label for="check_all"></label>
                            </div>
                        </th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Created at</th>
                        @if(check_access(Auth::user()->id,'ads','_edit')==1)
                        <th>Action</th>
                        @endif
                    </tr>
                    </thead>


                    <tbody>
                	@foreach($data as $key => $value)
                	<tr>
                        <td style="width: 5%">
                            <div class="checkbox checkbox-primary m-r-15 m-l-5">
                                <input type="checkbox" id="c_{{$key}}" class="checkItem" name="ids[]" form="del_form" value="{{$value->id}}" >
                                <label for="c_{{$key}}"></label>
                            </div>
                        </td>
                        <td>{{$value->name}}</td>
                		<td>{{$value->size}}</td>
                        <td>{{$value->created_at}}</td>
                        @if(check_access(Auth::user()->id,'ads','_edit')==1)
                		<td><a href="{{route('editBanner',$value->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a></td>
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
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script type="text/javascript">
    $("#check_all").click(function(){
        $(':checkbox.checkItem').prop('checked', this.checked);
        $("#checkCount").text($(':checkbox.checkItem:checked').length);
    });
    $(".checkItem").on('click',function(){ $("#checkCount").text($(':checkbox.checkItem:checked').length); });
	$('#datatable').dataTable();
    $(document).on('click','#deleteAll',function(e){
        if($('.checkItem').is(':checked')){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this!",
                type: "error",
                showCancelButton: true,
                cancelButtonClass: 'btn-default btn-md waves-effect',
                confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
                confirmButtonText: 'Delete!',
            },function() {
                  $("#del_form").submit();
            });
        } 
        else {
            toastr.error('Please Select Items', 'Error!');
        }
    });
</script>

@endsection