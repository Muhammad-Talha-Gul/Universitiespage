@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset("plugins/bootstrap-daterangepicker/daterangepicker.css")}}" rel="stylesheet">
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
    .pagination {margin: 0px;}
</style>
@endsection
@section('content')
@if(check_access(Auth::user()->id,'products','_show')==1)
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">{{$type['name']}}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        {{$type['name']}}
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">            
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
                @if(check_access(Auth::user()->id,'products','_delete')==1)
                <form action="{{route('deleteAllPosts')}}" method="POST" id="del_form" form="del_form">{{csrf_field()}}</form>
                <a class="btn btn-danger btn-sm" id="deleteAll">Delete (<span id="checkCount">0</span>)</a>
                @endif
                @if(check_access(Auth::user()->id,'products','_import')==1)
                @if($type['importable']==1)
                <a href="javascript:void(0)" data-toggle="modal" data-target="#importModal" class="btn btn-success btn-sm">Import {{$type['name']}}</a>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#exportModal" class="btn btn-info btn-sm">Export {{$type['name']}}</a>
                @endif
                @endif
                @if(check_access(Auth::user()->id,'products','_create')==1)
                <a href="{{route('create_post',$type['slug'])}}" class="btn btn-primary btn-sm">Add {{$type['name']}}</a>
                @endif
            </div>
            <div class="clearfix"></div>
            <div class="form-group search-box">
                <form>
                    <input type="text" id="search-input" class="form-control product-search" placeholder="Search here..." name="q" value="{{$_GET['q'] or ''}}">
                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="clearfix"></div>

            <div class="card-box table-responsive">                
                <h4 class="m-t-0 header-title"><b>{{$type['name']}} List</b></h4>
                <table id="" class="table hover">
                    <thead>
                    <tr>
                        <th>
                            <div class="checkbox checkbox-primary m-r-15 m-l-5">
                                <input type="checkbox" id="check_all">
                                <label for="check_all"></label>
                            </div>
                        </th>
                        @if($type['has_featured_image']==1)<th>Image</th>@endif
                        <th>Title</th>
                        @if($type['is_category_enable']==1)<th>Category</th>@endif
                        @if($type['has_brands']==1)<th>Brand</th>@endif
                        @if($type['show_sku']==1)<th>SKU</th>@endif
                        @if($type['show_quantity']==1)<th>Quantity</th>@endif
                        @if($type['show_price']==1)<th>Price</th>@endif
                        <th>Active</th>
                        <th>Is Featured</th>
                        <th>Created at</th>
                        @if(check_access(Auth::user()->id,'products','_edit')==1)
                        <th>Action</th>
                        @endif
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                        <td>
                            <div class="checkbox checkbox-primary m-r-15 m-l-5">
                                <input id="c_{{$key}}" type="checkbox" class="checkItem" name="ids[]" form="del_form" value="{{$value->id}}" >
                                <label for="c_{{$key}}"></label>
                            </div>
                        </td>
                        @if($type['has_featured_image']==1)
                        <td><figure class="featured_image">
                                @if(filter_var($value->image, FILTER_VALIDATE_URL))
                                <img src="{{$value->image}}" width="100">
                                @elseif(!empty($value->image))
                                <img src="{{url(getThumb($value->image))}}" width="100">
                                @else
                                <img src="{{asset('placeholder.jpg')}}" width="100">
                                @endif    
                            </figure>
                        </td>
                        @endif
                        <td>{{$value->title}}</td>
                        @if($type['is_category_enable']==1)
                        <td>{{(isset($value->category->name)?$value->category->name:'')}}</td>
                        @endif
                        @if($type['has_brands']==1)
                        <td></td>
                        @endif
                        @if($type['show_sku']==1)
                        <td>{{$value->sku}}</td>
                        @endif
                        @if($type['show_quantity']==1)
                        <td>{{$value->quantity}}</td>
                        @endif
                        @if($type['show_price']==1)
                        <td>{{$value->price}}</td>
                        @endif
                        <td>{{($value->is_active==1)?'Yes':'No'}}</td>
                        <td>
                            <div class="form-group">
                                <input type="checkbox" id="featured_{{$value->id}}" class="mark_featured" switch="primary" data-id="{{$value->id}}" value="1" {{($value['is_featured']==1)?'checked':''}} />
                                <label for="featured_{{$value->id}}" data-on-label="Yes" data-off-label="No">
                                </label>
                                <span class="loader"></span>
                            </div>
                        </td>
                        <td>{{$value->created_at}}</td>
                        @if(check_access(Auth::user()->id,'products','_edit')==1)
                        <td>
                            <a href="{{route('edit_post',['slug'=>$type['slug'],'id'=>$value->id])}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" class="btn btn-primary btn-xs duplicateThis" data-title="{{$value->title}}" data-id="{{$value->id}}"><i class="fa fa-copy"></i></a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>                
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Total Entries: {{$data->total()}}</label>
                </div>
                <div class="col-md-8 form-group text-right">
                    {{$data->links()}}
                </div>
            </div>
		</div>
	</div>

</div>
<div id="importModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Import {{$type['name']}}</h4>
      </div>
      <div class="modal-body">
        <form id="importForm">
            <div class="form-group">
              <label>Select File (.csv)</label>
              {{csrf_field()}}
              <input type="file" name="file" class="form-control">
              <input type="hidden" name="type" value="{{$type['id']}}">
            </div>
            @if($type['is_category_enable']==1)
            <p>Please enter category IDs in CSV for link Categories with your {{$type['name']}}. <b><a href="{{route('category.index')}}" target="_blank">Click here for Category IDs</a></b></p>
            @endif
            <a href="{{route("downloadSample",$type['slug'])}}" class="btn btn-info btn-sm">Sample CSV</a>
            <input type="submit" class="btn btn-sm btn-success" value="Start Import">
        </form>
      </div>
      <div class="modal-footer" style="display: none;">
        <div class="progress">
            <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
            </div>
        </div>
        <div id="dup-errors"></div>
        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
      </div>
    </div>

  </div>
</div>
<div id="duplicateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Duplicate {{str_singular($type['name'])}}</h4>
      </div>
      <div class="modal-body">
          <form action="{{route('duplicatePost')}}" method="POST">
              {{csrf_field()}}
              <div class="form-group">
                  <input type="hidden" id="post-id" name="id">
                  <input type="text" class="form-control" name="title" id="post-title" required>
              </div>
              <div class="text-center">
                  <input type="submit" class="btn btn-success" value="Duplicate">
              </div>
          </form>
      </div>
    </div>

  </div>
</div>
<div id="exportModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Export {{$type['name']}}</h4>
      </div>
      <div class="modal-body">
        <form id="exportForm" action="{{route('exportPosts')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" class="form-control" id="reportrange" autocomplete="off" name="dates" required>
                <input type="hidden" name="post_type" value="{{$type['id']}}">
            </div>
            <div class="form-group">
                <select class="form-control" name="type" required>
                    <option value="xlsx">XLSX</option>
                    <option value="csv">CSV</option>
                </select>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-md btn-success" style="width: 100%;" value="Export">
            </div>
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
<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset("plugins/moment/moment.js")}}"></script>
<script src="{{asset("plugins/bootstrap-daterangepicker/daterangepicker.js")}}"></script>
<script type="text/javascript">
	$('#datatable').dataTable();
    $("#check_all").click(function(){
        $(':checkbox.checkItem').prop('checked', this.checked);
        $("#checkCount").text($(':checkbox.checkItem:checked').length);
    });
    $(".checkItem").on('click',function(){ $("#checkCount").text($(':checkbox.checkItem:checked').length); });
    $(document).ready(function (e) {
        $("#importForm").on('submit',function(e) {
            $(".modal-footer").show(100);
            e.preventDefault();
            $.ajax({
                url: "{{route('importPosts')}}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    html = "<p><span>Products Imported</span> Below products are not imported because of same <b>SKU Codes</b></p>";
                    html += "<ul>";
                    if(data==="inserted") {
                        $(".modal-footer").hide(100);
                        location.reload();
                    } else {
                        $(".progress-bar").hide(300);
                        $.each(data, function( index, value ) {
                          html += "<li>"+value+"</li>";
                        });
                        html += "</ul>";
                        $("#dup-errors").html(html);
                    }
                }
            });
        });
    });
    $(document).on('click','#deleteAll',function(e){
        if($('.checkItem').is(':checked')){
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
        } 
        else {
            toastr.error('Please Select Items', 'Error!');
        }
    });
    $(document).on('change','.mark_featured',function(){
        var $loader = $(this).parent().find('.loader');
        $loader.html("<i class='fa fa-refresh fa-spin'></i>");
        var data = { '_token':"{{csrf_token()}}", 'id':$(this).data('id') };
        jQuery.ajax({
            url:'{{route("ajaxFeaturedPost")}}',
            type: 'post',
            dataType: 'html',
            data: data,
            success: function( data ){
                $loader.html("");
            }
        });
    });
    $(".duplicateThis").click(function(){
        $("#post-id").val($(this).data('id'));
        $("#post-title").val("Copy of "+$(this).data('title'));
        $("#duplicateModal").modal("show");
    });

    $(function(){
            $('#reportrange span').html(moment().format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment(),
                endDate: moment(),
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-success',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            });
        });
</script>
@endsection