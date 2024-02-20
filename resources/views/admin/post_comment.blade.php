@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
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
@if(check_access(Auth::user()->id,'comment','_show')==1)
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Comments</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Comments
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
                <div class="alert alert-success"><p>{{Session::get('success')}}</p></div>
                @endif
                <h4 class="m-t-0 header-title"><b>Comment List</b></h4>
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Blog</th>
                        <th>Name</th>
                        <th>Comment</th>
                        @if(check_access(Auth::user()->id,'comment','approval')==1)<th>Approval</th>@endif
                        <th>Created At</th>
                        @if(check_access(Auth::user()->id,'comment','_view')==1)<th>Action</th>@endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $value)
                        <tr>
                            <td>{{(isset($value->has_post->title))?implode(' ', array_slice(str_word_count($value->has_post->title, 2), 0, 10)):''}} ...</td>
                            <td>{{$value->name}}</td>
                            <td>{{(isset($value->comment))?implode(' ', array_slice(str_word_count($value->comment, 2), 0, 15)):''}} ...</td>
                            @if(check_access(Auth::user()->id,'comment','approval')==1)
                            <td valign="middle">
                                <div class="form-group">
                                    <input id="comment_Approvel{{$value->id}}" class="mark_featured" switch="primary" data-id="{{$value->id}}" type="checkbox" @if($value->is_active == 1) checked="checked" @endif>
                                    <label for="comment_Approvel{{$value->id}}" data-on-label="Yes" data-off-label="No"></label>
                                    <span class="loader"></span>
                                </div>
                            </td>
                            @endif
                            <td>{{date_format($value->created_at,'dS F, Y h:i a')}}</td>
                            @if(check_access(Auth::user()->id,'comment','_view')==1)<td><a href="{{route('view_comment',$value->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i></a></td>@endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
<script src="{{asset('/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/vfs_fonts.js')}}"></script>
<script type="text/javascript">
    $('#datatable').dataTable({
        "dom": 'TC<"clear">Bfrtip',
        "order" : [],
        "columnDefs": [
            { "width": "18%", "targets": 0 },
            { "width": "8%", "targets": 1 },
            { "width": "40%", "targets": 2 },
            { "width": "10%", "targets": 3 },
            { "width": "14%", "targets": 4 },
            { "width": "10%", "targets": 5 }
        ],
        "buttons": [{
            extend: "csv",
            className: "btn-sm"
        }, {
            extend: "excel",
            className: "btn-sm"
        }, {
            extend: "pdf",
            className: "btn-sm"
        }, {
            extend: "print",
            className: "btn-sm"
        }],        
    });
    $(document).on('change','.mark_featured',function(){
        var $loader = $(this).parent().find('.loader');
        $loader.html("<i class='fa fa-refresh fa-spin'></i>");
        var data = { '_token':"{{csrf_token()}}", 'id':$(this).data('id') };
        jQuery.ajax({
            url:'{{route("ajaxActiveComment")}}',
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