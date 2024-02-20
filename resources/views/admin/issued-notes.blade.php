@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset("plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css")}}" rel="stylesheet" />
<style type="text/css">
    figure.featured_image img {
        width: 50px;
        height: 50px;
        object-fit: contain;
        border: 1px solid #782572;
    }
    .loader {
        float: right;
        margin-left: 10px;
    }
    #dup-errors {text-align: left;}
    #dup-errors span { color: green; }
    #dup-errors p { color: red; }
    #dup-errors ul {
        height: 180px;
        overflow-x: scroll;
    }
    #dup-errors ul li {
        color: red;
    }
    .form-inline .input-group {width: 35%;}
</style>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Issued Notes</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Issued Notes
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
                    <a href="{{route('posts_lists',$type['slug'])}}" class="btn btn-primary btn-sm">{{$type['name']}}</a>
                </div>
                <div class="clearfix"></div>

                <table id="datatable" class="table hover">
                    <thead>
                    <tr>
                        <th><input type="checkbox" id="check_all"></th>
                        <th>Product</th>
                        <th>SKU</th>
                        <th>Incoming</th>
                        <th>Quantity</th>
                        <th></th>
                    </tr>
                    </thead>


                    <tbody>
                	@foreach($data as $value)
                	<tr>
                        <td><input type="checkbox" class="checkItem" name="ids[]" form="del_form" value="{{$value->post_id}}" ></td>
                        <td>{{getProduct($value->post_id)['title']}}</td>
                        <td>{{$value->sku}}</td>
                        <td><a href="{{route('transfers.edit',[$type['slug'],$value->transfer_id])}}" class="incoming-{{$value->post_id}}">{{$value->recieved_qty}}</a></td>
                        <td class="quantity-{{$value->id}}">{{getProduct($value->post_id)['quantity']}}</td>
                        <td><button class="btn btn-info btn-md issue-this" data-pid="{{$value->post_id}}" data-tid="{{$value->transfer_id}}">Issue to store</button></td>
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
<script src="{{asset('/plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset("/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js")}}" type="text/javascript"></script>
<script type="text/javascript">
	$('#datatable').dataTable();
    $("#check_all").click(function(){
        $(':checkbox.checkItem').prop('checked', this.checked);
        $("#checkCount").text($(':checkbox.checkItem:checked').length);
    });
    $(".checkItem").on('click',function(){ $("#checkCount").text($(':checkbox.checkItem:checked').length); });
    $(function(){
        $(".touchspin").TouchSpin({
            min: 1,
        });
    });
    $(document).on('click','.issue-this',function(){
        var pid = $(this).data('pid'); var tid = $(this).data('tid');
        data = {'_token':"{{csrf_token()}}",'post_id':pid,'transfer_id': tid }
        var $this = $(this); $this.html("<i class='fa fa-refresh fa-spin'></i>");
        $.ajax({
            url: "{{route('issueQty')}}",
            type: "POST",
            data: data,
            success: function(data)
            {
                location.reload();
            }
        });
    });
    /*$(document).on('click','.QTYaction',function(){
        var pid = $(this).data('pid');
        var qty = $(".qty-"+pid);
        $('.quantity-'+pid).html('<i class="fa fa-refresh fa-spin"></i>');
        data = {'_token':"{{csrf_token()}}",'id':pid,'qty':qty.val(),'type':$(this).data('type') }
        $.ajax({
            url: "{{route('updateQty')}}",
            type: "POST",
            data: data,
            success: function(data)
            {
                $('.quantity-'+pid).html(data);
                $('.incoming-'+pid).html(data);
                qty.val(1);
                qty.attr(max);
                toastr.success('Inventory updated', 'Done!');
            }
        });
    });*/
</script>

@endsection