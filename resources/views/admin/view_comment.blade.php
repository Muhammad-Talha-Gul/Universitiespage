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
@if(check_access(Auth::user()->id,'comment','_view')==1)
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Comment </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li>
                        <a href="{{route('show_comment')}}">Comment List</a>
                    </li>
                    <li class="active">
                        Comment
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
                                    <h4 class="m-t-0"><b>BLOG: {{(isset($data->has_post->title))?$data->has_post->title:'-'}}</b></h4>

                                    <hr/>

                                    <div class="media m-b-30 ">
                                        <a href="#" class="pull-left">
                                            <img alt="" src="{{asset("assets_frontend/images/avatar.png")}}" class="media-object thumb-sm img-circle">
                                        </a>
                                        <div class="media-body">
                                            <span class="media-meta pull-right">{{date_format($data['created_at'],'dS F, Y h:i a')}}</span>
                                            <h4 class="text-primary m-0">{{$data['name']}}</h4>
                                            <small class="text-muted">From: {{$data['email']}}</small>
                                        </div>
                                    </div>
                                    @isset($data['company_name'])<b>Website: </b>{{$data['company_name']}} <br>@endisset<div style="height: 5px;"></div>
                                    <b>Approval: </b>{!!($data['is_active'] == 1)?'<span class="approve">Approved</span>':'<span class="n_approve">Not Approved</span>'!!} <br>
                                    <div style="height: 5px;"></div>
                                    <b>Email: </b>{{$data['email']}} <br>
                                    <p><b>Comment: </b> {!!$data['comment']!!}</p>
                                </div>
                                <!-- card-box -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-right">
                                    <a href="{{route('show_comment')}}" class="btn btn-primary waves-effect waves-light w-md m-b-30"><i class="fa fa-arrow-left m-r-10"></i>Back</a>
                                    @if(check_access(Auth::user()->id,'comment','_delete')==1)<a href="{{route('delete_comment', $data['id'])}}" class="btn btn-danger waves-effect waves-light w-md m-b-30"><i class="fa fa-trash m-r-10"></i>Delete</a>@endif
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