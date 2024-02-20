
@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<style type="text/css">
    .loader {
        float: right;
        margin-left: 10px;
    }
</style>
{{-- {{dd(Auth::user()->user_type)}} --}}
@if(Auth::user()->user_type == 'admin')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Country </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Country
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
                    {{-- <form action="#" method="POST" id="del_form" form="del_form">{{csrf_field()}}</form>
                    <a class="btn btn-danger btn-sm" id="deleteAll">Delete (<span id="checkCount">0</span>)</a> --}}
                    
                    <a href="{{route('addCountry')}}" class="btn btn-primary btn-sm">New Country</a>

                </div>
                <h4 class="m-t-0 header-title"><b>Country List</b></h4>                
                <table id="datatable" class="table hover">
                    <thead>
                    <tr>
                        <th>Country Name</th>
                        <th>Code</th>                        
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $value)
                    <tr>
                        <td>{{$value->country}}</td>
                        <td>{{$value->code}}</td>
                        <td>
                            <a href="{{url('admin/country/'.$value->id.'/edit')}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                            
                            <a class="btn btn-danger btn-xs"  onclick="deleteit({{$value->id}})"><i class="fa fa-trash"></i></a>
                            <form action="{{route('delete-country',$value->id)}}" method="POST" id="delete-form-{{$value->id}}">
                                <input type="hidden" name="_method" value="DELETE">
                                {{csrf_field()}}
                            </form>
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
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script type="text/javascript">
    $('#datatable').dataTable({
        sort:false,
    });
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