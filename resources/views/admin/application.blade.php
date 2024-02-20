@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
<style>
    .green{
        color:green;
        cursor: pointer;
        font-size: 11px;
        line-height: 10px;
        font-weight: 600;
        margin-bottom:4px
    }
    .red{
        color:#ff4b4b;
        cursor: pointer;
        font-size: 11px;
        line-height: 10px;
        font-weight: 600;
        margin-bottom:4px
    }
    .orange{
        color: orange;
        cursor: pointer;
        font-size: 11px;
        line-height: 10px;
        font-weight: 600;
        margin-bottom:4px
    }
    .blue{
        color: blue;
        cursor: pointer;
        font-size: 11px;
        line-height: 10px;
        font-weight: 600;
        margin-bottom:4px
    }
    .darkpink{
        color: #f794a5;
        cursor: pointer;
        font-size: 11px;
        line-height: 10px;
        font-weight: 600;
        margin-bottom:4px
    }
    .lightbrown{
        color: brown;
        cursor: pointer;
        font-size: 11px;
        line-height: 10px;
        font-weight: 600;
        margin-bottom:4px
    }
</style>
@endsection
@section('content')
@if(check_access(Auth::user()->id,'applicationForm','_show')==1)
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Applications </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Applications
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

                <h4 class="m-t-0 header-title"><b>Application List</b></h4>                
                <table id="datatable" class="table hover">
                    <thead>
                    <tr>
                        <th>Application ID</th>
                        <th>Student Name</th>
                        <th>University Name</th>
                        <th>Course Name</th>
                        {{-- <th>Send To Uni</th> --}}
                        {{-- <th>Fee</th> --}}
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $value)
                    <tr>
                        {{-- {{dd($value)}} --}}
                        <td>{{$value->application_id}}-{{$value->id}}</td>
                        <td>{{($value->student->name)??''}}</td>
                        <td>{{$value->university->name}}</td>
                        <td>{{$value->course->name}}</td>
                        {{-- <td style="line-height:11px;vertical-align:middle;">{!!($value->send_to_uni)?'<span class="green">Send</span>':'<span class="red">Not Yet</span>'!!}</td> --}}
                        {{-- <td style="line-height:11px;vertical-align:middle;">
                            @if($value->application_fee == 0)
                                <span class="red">Unpaid</span>
                            @else
                                <span class="green">Paid</span>
                            @endif
                        </td> --}}
                        <td style="line-height:11px;vertical-align:middle;">
                            <ul>
                                @if($value->display == 0)
                                    <li class="red">Removed by Student</li>
                                @endif
                                @if($value->status == 4)
                                    <li class="orange">Incomplete</li>
                                @elseif($value->status == 3)
                                    <li class="blue">Processing</li>
                                @elseif($value->status == 2)
                                    <li class="darkpink">Pending</li>
                                @elseif($value->status == 1)
                                    <li class="green">Accepted by University</li>
                                @elseif($value->status == 0)
                                    <li class="lightbrown">Refused by University</li>
                                @endif
                            </ul>
                        </td>
                        <td>{{date('dS M, Y | h:i a', strtotime($value->created_at))}}</td>
                        <td>
                            @if(check_access(Auth::user()->id,'applicationForm','_view')==1)<a href="{{url('admin/applicationForm/'.$value->id)}}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
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