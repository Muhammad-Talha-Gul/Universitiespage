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
                <h4 class="page-title">Review on @isset($data->post) <a href="{{route('product_detail',$data->post->slug)}}" target="_blank">{{$data->post->title or ''}}</a> @endisset</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li>
                        Notifications
                    </li>
                    <li class="active">
                        Review
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="card-box table-responsive" style="margin-bottom: 0px;">
                <h3>Detail</h3>
                <div class="form-group">
                    <label>Name:</label> <br>
                    {{$data->user->first_name or $data['name']}}
                </div>
                <div class="form-group">
                    <label>Summary:</label><br>
                    {{$data['summary']}}
                </div>
                <div class="form-group">
                    <label>Comment:</label><br>
                    {{$data['review']}}
                </div>
                <div class="form-group text-right">
                    <label>Reviewed at:</label>
                    {{date_format($data['created_at'],'d M Y g:i a')}}
                </div>
            </div>
		</div>
        <div class="col-md-4">
            <div class="card-box table-responsive" style="margin-bottom: 0px;">
                <h3>Ratings</h3>
                <div class="form-group">
                    <label>Price:</label>
                    <p>{{$data['price'].'/5'}}</p>
                </div>
                <div class="form-group">
                    <label>Value:</label>
                    <p>{{$data['value'].'/5'}}</p>
                </div>
                <div class="form-group">
                    <label>Quality:</label>
                    <p>{{$data['quality'].'/5'}}</p>
                </div>
            </div>
        </div>
	</div>
    <div class="card-box table-responsive">
        <div class="row">
            <div class="col-md-12">
                @if($data['is_active']!=1)                
                <a href="javascript:void(0)" class="btn btn-primary" onclick="aproveit()">Aprove</a>
                @endif
                <a href="javascript:void(0)" class="btn btn-danger" onclick="deleteit()">Delete</a>
                <a href="#" class="btn btn-success">Back</a>
                <form action="{{route('approveReview',$data['id'])}}" method="POST" id="aprove-form">
                    {{csrf_field()}}
                </form>
                <form action="{{route('deleteReview',$data['id'])}}" method="POST" id="delete-form">
                    {{csrf_field()}}
                </form>
            </div>
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
    function aproveit() {
        swal({
            title: "Are you sure?",
            text: "This will appear on website after aproval.!",
            type: "warning",
            showCancelButton: true,
            cancelButtonClass: 'btn-default btn-md waves-effect',
            confirmButtonClass: 'btn-warning btn-md waves-effect waves-light',
            confirmButtonText: 'Aprove!',
        },function() {
              $("#aprove-form").submit();
        });
    }
    function deleteit() {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this!",
            type: "error",
            showCancelButton: true,
            cancelButtonClass: 'btn-default btn-md waves-effect',
            confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
            confirmButtonText: 'Delete!',
        },function() {
              $("#delete-form").submit();
        });
    }
</script>
@endsection