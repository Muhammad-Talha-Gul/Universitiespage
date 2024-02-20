@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<style type="text/css">
    table{
      margin: 0 auto;
      width: 100%;
      clear: both;
      border-collapse: collapse;
      table-layout: fixed; 
      word-wrap:break-word;
    }
    .loader {
        float: right;
        margin-left: 10px;
    }
</style>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Visa Countires </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        All Visa Countries
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card-box table-responsive">
              
                <a href="{{route('visacountries.create')}}" class="btn btn-primary btn-md pull-right" style="margin-bottom: 10px;">Add Visa Country</a>
              
                <h4 class="m-t-0 header-title"><b>Visa Countries List</b></h4>

                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                	@foreach($data as $value)
                	<tr>
                        <td>@if(empty($value->country_image))
                            No Image
                            @else
                            <img src="{{url($value->country_image)}}" width="100">
                            @endif
                        </td>
                		<td>{{$value->country_name}}</td>
                        <td>{{$value->created_at}}</td>
                		<td><a href="{{route('visacountries.edit',$value->id)}}" class="btn btn-warning btn-md">Edit</a></td>
                	</tr>
                	@endforeach

                    </tbody>
                </table>
            </div>
		</div>
	</div>

</div>

@endsection
@section('customScripts')
<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript">
	$('#datatable').dataTable();
    $(document).on('change','.mark_featured',function(){
        var $loader = $(this).parent().find('.loader');
        $loader.html("<i class='fa fa-refresh fa-spin'></i>");
        var data = { '_token':"{{csrf_token()}}", 'id':$(this).data('id') };
        jQuery.ajax({
            url:'{{url("admin/ajax-popular-blog")}}',
            type: 'post',
            dataType: 'html',
            data: data,
            success: function( data ){
                $loader.html("");
            }
        });
    });
</script>

@endsection