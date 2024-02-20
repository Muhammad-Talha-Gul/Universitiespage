@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset("plugins/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<style type="text/css">
    .table>tbody>tr>td {
        vertical-align: middle;
        padding: 2px;
    }
</style>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Site Notification </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Site Notification
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
    <div class="row">
        @if(Session::has('success'))
            <div class="alert alert-success">
                <p>{{Session::get('success')}}</p>
            </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger">
                <p>{{Session::get('error')}}</p>
            </div>
        @endif
        <div class="col-md-4">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>Configuration</b></h4>
                <form action="{{route("updateNSettings")}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="checkbox" id="enabled" name="meta[enabled]" switch="primary" value="1" @isset(orders_nsettings()['enabled']) {{(orders_nsettings()['enabled']==1)?'checked':''}} @endisset />
                        <label for="enabled" data-on-label="On" data-off-label="Off">
                        </label>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="type-selection" name="meta[type]" required>
                            <option value="">Select Type</option>
                            <option value="orders" @isset(orders_nsettings()['type']) {{(orders_nsettings()['type']=='orders')?'selected':''}} @endisset>Orders</option>
                            <option value="fake" @isset(orders_nsettings()['type']) {{(orders_nsettings()['type']=='fake')?'selected':''}} @endisset>Fake Orders</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="meta[sort]" required>
                            <option value="">Select Option</option>
                            <option value="latest" @isset(orders_nsettings()['sort']) {{(orders_nsettings()['sort']=='latest')?'selected':''}} @endisset>Latest</option>
                            <option value="random" @isset(orders_nsettings()['sort']) {{(orders_nsettings()['sort']=='random')?'selected':''}} @endisset>Random</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="meta[limit]" placeholder="No of Notifications" required @isset(orders_nsettings()['limit']) value="{{orders_nsettings()['limit']}}" @endisset>
                    </div>
                    {{-- <div class="form-group">
                        <input type="checkbox" name="meta[repeat]" value="1" @isset(orders_nsettings()['repeat']) {{(orders_nsettings()['repeat']==1)?'checked':''}} @endisset> Repeat notifications
                    </div> --}}
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-md btn-success" style="width: 100%;" value="Update">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-box table-responsive">                
                <div class="form-group pull-right" style="margin-bottom: 10px;">
                    <a href="javascript:void(0)" id="addBtn" class="btn btn-info btn-sm">Add <i class="fa fa-plus"></i></a>
                </div>
                <h4 class="m-t-0 header-title"><b>Fake Orders</b></h4>

                <table id="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Product</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $value)
                        <tr>
                            <td>{{$value->customer}}</td>
                            <td>{{str_limit($value->item->title,30,'...')}}</td>
                            <td>{{$value->created_at}}</td>
                            <td>
                                <a href="javascript:void(0)" data-id="{{$value->id}}" class="editBtn btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                <a href="{{route("deleteFOrder",$value->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>                    
        </div>
    </div>
</div>
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Fake Order</h4>
      </div>
      <div class="modal-body" id="addForm"></div>
    </div>

  </div>
</div>
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Fake Order</h4>
      </div>
      <div class="modal-body" id="editForm"></div>
    </div>

  </div>
</div>
@endsection
@section('customScripts')
<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset("plugins/select2/js/select2.min.js")}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        $(".select2").select2();
    });
	$('#datatable').dataTable();
    $("#check_all").click(function(){
        $(':checkbox.checkItem').prop('checked', this.checked);
        $(".selected-count").text($(':checkbox.checkItem:checked').length);
    });
    $(".checkItem").on('click',function(){ $(".selected-count").text($(':checkbox.checkItem:checked').length); });
    $("#addBtn").click(function(){
        $this = $(this);
        $this.html("<i class='fa fa-refresh fa-spin'></i>");
       jQuery.ajax({
            url:'{{route("addFOrder")}}',
            dataType: 'html',
            success: function( data ){
                $("#addForm").html(data);
                $("#addModal").modal("show");
                $(".select2").select2();
                $this.html("Add <i class='fa fa-plus'><i>");
            }
        }); 
    });
    $(".editBtn").click(function(){
        $this = $(this);
        $this.html("<i class='fa fa-refresh fa-spin'></i>");
        var data = { '_token':"{{csrf_token()}}", 'id': $(this).data('id') };
       jQuery.ajax({
            url:'{{route("editFOrder")}}',
            dataType: 'html',
            type: 'POST',
            data: data,
            success: function( data ){
                $("#editForm").html(data);
                $("#editModal").modal("show");
                $(".select2").select2();
                $this.html("<i class='fa fa-pencil'><i>");
            }
        }); 
    });
</script>
@endsection