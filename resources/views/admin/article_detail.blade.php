@extends('layouts.backend')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Article Detail </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Article Detail
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
        <div class="card-box table-responsive">
            <div class="col-md-6">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Author Details</h3>
                    </div>
                    <div class="panel-body">
                          @if($data->user->image==null)
                          <img class="img-responsive img-thumbnail" width="150" style="float: right" src="{{asset("assets_frontend/images/avatar.png")}}" id="profile_image" alt="{{$data->user->first_name.' '.$data->user->last_name}}">
                          @else
                          <img class="img-responsive img-thumbnail" width="150" style="float: right" src="{{asset('uploads/profiles/'.$data->user->image)}}" id="profile_image" alt="{{$data->user->first_name.' '.$data->user->last_name}}">
                          @endif
                        <div class="row">
                            <div class="form-group">
                                <label>Name</label>
                                <p>{{$data->user->first_name.' '.$data->user->last_name}}</p>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <p>{{$data->user->email}}</p>
                            </div>
                            <div class="form-group">
                                <label>Information</label>
                                <p>{{$data->user->brief}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <b>Article</b>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <p>{{$data['description']}}
                            <a href="{{asset('uploads/articles/'.$data['file'])}}"><img style="float: right" src="{{asset('download.png')}}" width="150"></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @if($data['status']!=1)
                    <a href="javascript:void(0)" class="pull-right btn btn-warning" id="publishThis" data-id="{{$data['id']}}">Mark this Article <b>Published</b></a>
                    @else
                    <a href="javascript:void(0)" class="pull-right btn btn-primary"><b>Published</b></a>
                    @endif
                </div>
            </div>
		</div>
	</div>

</div>
@endsection
@section('customScripts')
<script type="text/javascript">
    $("#publishThis").on('click',function(){
        var $this = $(this);
        $this.html(" <i class='fa fa-refresh fa-spin'></i>");
        var token = "{{csrf_token()}}";
        data = {'_token':token,'id':$(this).data('id')};
        jQuery.ajax({
            url:'{{route("publishArticle")}}',
            type: 'post',
            dataType: 'html',
            data: data,
            success: function( data ){
                $this.html("Published");
                $this.toggleClass('btn-warning btn-primary');
            }
        });
    });
</script>
@endsection