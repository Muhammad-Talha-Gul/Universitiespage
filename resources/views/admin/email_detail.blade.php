@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<style type="text/css">
    .mails .mail-select {
        width: 1px;
        min-width: 0px;
        padding: 15px 0px 15px 20px;
    }
</style>
@endsection
@section('content')
@if(check_access(Auth::user()->id,'additionals','_show')==1)
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Contact Email </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#" onclick="history.back()">Emails</a>
                    </li>
                    <li class="active">
                        Email
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

                    <div class="table-detail">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="btn-toolbar m-t-20" role="toolbar">
                                    <div class="btn-group">
                                        <form action="{{route("deleteEmails")}}" method="POST" id="del_form" form="del_form">{{csrf_field()}} <input type="hidden" name="ids" value="{{$data['id']}}"></form>
                                        <a href="#" onclick="history.back()" class="btn btn-primary waves-effect waves-light "><i class="fa fa-arrow-left"></i></a>
                                        <button type="button" id="deleteIt" class="btn btn-primary waves-effect waves-light "><i class="fa fa-trash-o"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box m-t-20">
                                    <h4 class="m-t-0"><b><?php if($data['type'] == 'complaint') { echo 'Subject'; } else { echo 'Nationality'; } ?>: {{$data['subject']}}</b></h4>
                                    <br>
                                    <h4 class="m-t-0"><b>Phone Number: {{$data['phone']}}</b></h4>

                                    <hr/>

                                    <div class="media m-b-30 ">
                                        <a href="#" class="pull-left">
                                            <img alt="" src="{{asset("assets_frontend/images/avatar.png")}}" class="media-object thumb-sm img-circle">
                                        </a>
                                        <div class="media-body">
                                            <span class="media-meta pull-right">{{date_format($data['created_at'],'d/m/Y g:i A')}}</span>
                                            <h4 class="text-primary m-0">{{$data['name']}}</h4>
                                            <small class="text-muted">From: {{$data['email']}}</small>
                                        </div>
                                    </div> <!-- media -->
                                    {{$data['message']}}
                                </div>
                                <!-- card-box -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-right">
                                    <a href="#" onclick="history.back()" class="btn btn-primary waves-effect waves-light w-md m-b-30"><i class="fa fa-arrow-left m-r-10"></i>Back</a>
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
                text: "You will not be able to recover this!",
                type: "error",
                showCancelButton: true,
                cancelButtonClass: 'btn-default btn-md waves-effect',
                confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
                confirmButtonText: 'Delete!',
            },function() {
                  $("#del_form").submit();
            });
    });
</script>
@endsection