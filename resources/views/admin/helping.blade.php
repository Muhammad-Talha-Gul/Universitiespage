@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
<style type="text/css"> .table .active {font-weight: bold;}</style>
@endsection
@section('content')
@if(check_access(Auth::user()->id,'additionals','_show')==1)
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Helping Hand</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li>
                        Notifications
                    </li>
                    <li class="active">
                        Helping Request
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="card-box table-responsive" style="margin-bottom: 0px;">
                <div class="form-group">
                    <label>Name:</label> <br>
                    {{$data['name']}}
                </div>
                <div class="form-group">
                    <label>Email:</label> <br>
                    {{$data['email']}}
                </div>
                <div class="form-group">
                    <label>Detail:</label><br>
                    {{$data['message']}}
                </div>
                <hr>
                <div class="form-group text-right">
                    <label>Sended at:</label>
                    {{date_format($data['created_at'],'d M Y g:i a')}}
                </div>
            </div>
		</div>
	</div>

</div>
@else
@component('admin.access-denied') @endcomponent
@endif
@endsection