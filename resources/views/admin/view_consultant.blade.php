@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<style type="text/css">
    .mails .mail-select {
        width: 1px;
        min-width: 0px;
        padding: 15px 0px 15px 20px;
    }
    .approve{
        background-color: #6E2789;
        color:white;
        padding: 5px;
        font-size: 12px;
        border-radius: 3px;
    }
    .n_approve{
        background-color:#dc3545;
        color:white;
        padding: 5px;
        font-size: 12px;
        border-radius: 3px;
    }
</style>
@endsection
@section('content')
@if(check_access(Auth::user()->id,'student','_view')==1)
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Consultant </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li>
                        <a href="{{route('admin_consultant')}}">Consultant Detail</a>
                    </li>
                    <li class="active">
                        Consultant
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
    <div class="row">
        <div class="col-xs-12">
            <div class="mails">

                <div class="table-box">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box m-t-20">
                                    <h4 class="m-t-0"><b>Consultant Detail</b></h4>

                                    <hr/>

                                    <div style="font-size: 16px;">
                                        <b>Name: </b>{{$data->name}} <br>
                                        <b>Email: </b>{{$data->email}} <br>
                                        <b>Phone: </b>{{$data->phone}} <br>
                                        <b>Company Name: </b>{{$data->company_name}} <br>
                                        <b>Number Of EMployees: </b> {{$data->employeeno}}<br>
                                        <b>Nationality: </b> {{$data->nationality}}<br>
                                        <b>State: </b> {{$data->state}}<br>
                                        <b>City: </b> {{$data->city}}<br>
                                        <b>Address: </b> {{$data->address}}<br>
                                        <b>Dsignation: </b> {{$data->designation}}<br>
                                        <b>Comment: </b> {{$data->comment}}<br>
                                        <b>Created At: </b> {{date('dS M, Y h:i a',strtotime($data->created_at))}}<br><br>
    
                                        <!-- @if(check_access(Auth::user()->id,'student','_delete')==1)
                                            <a style="cursor:pointer;" id="deleteIt" class="btn btn-{{($data->active == 1)?'danger':'success'}} waves-effect waves-light w-md m-b-30"><i class="fa fa-power-off m-r-10"></i>{{($data->active == 1)?'In Active':'Active'}}</a>
                                            <form id="del_form" action="{{route('student.destroy', $data->id)}}" method="POST">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                            </form>
                                        @endif -->
                                    </div>
                                </div>
                                <!-- card-box -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-right">
                                    <a href="{{route('student.index')}}" class="btn btn-primary waves-effect waves-light w-md m-b-30"><i class="fa fa-arrow-left m-r-10"></i>Back</a>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- End row -->

                    </div> <!-- table detail -->
                </div>
                <!-- end table box -->

            </div> <!-- mails -->
        </div>
    </div>
</div>
@else
@component('admin.access-denied') @endcomponent
@endif
@endsection
@section('customScripts')
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script type="text/javascript">
    $("#deleteIt").click(function(){
        swal({
                title: "Are you sure?",
                // text: "",
                type: "warning",
                showCancelButton: true,
                cancelButtonClass: 'btn-default btn-md waves-effect',
                confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
                confirmButtonText: 'Yes!',
            },function() {
                  $("#del_form").submit();
            });
    });
</script>
@endsection