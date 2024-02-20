@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@if(check_access(Auth::user()->id,'pages','_show')==1)
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Pages </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Pages
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
                    {{-- <form action="#" method="POST" id="del_form" form="del_form">{{csrf_field()}}</form>
                    <a class="btn btn-danger btn-sm" id="deleteAll">Delete (<span id="checkCount">0</span>)</a> --}}
                    @if(check_access(Auth::user()->id,'pages','_create')==1)
                    <a href="{{route('createPage')}}" class="btn btn-primary btn-sm">New Page</a>
                    @endif
                </div>
                <h4 class="m-t-0 header-title"><b>Pages List</b></h4>                
                <table id="datatable" class="table hover">
                    <thead>
                    <tr>
                        <th>Page Title</th>
                        <th>URL</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($homepage))
                    <tr>
                        <td><b>{{$homepage['title']}}</b></td>
                        <td>/ <a href="{{url('/')}}" target="_blank"><i class="fa fa-eye"></i></a></td>
                        <td></td>                        
                        <td>@if(check_access(Auth::user()->id,'pages','_edit')==1)
                            <a href="{{route('editPage', $homepage['id'])}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a> 
                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-home"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @foreach($data as $value)
                    <tr>
                        <td>{{$value->title}}</td>
                        <td>/{{$value->slug}} <a href="{{route('dynamicPage', $value->slug)}}" target="_blank"><i class="fa fa-eye"></i></a></td>
                        <td>{{$value->created_at}}</td>
                        <td>
                            @if(check_access(Auth::user()->id,'pages','_edit')==1)<a href="{{route('editPage',$value->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0);" data-title="{{$value->title}}" data-id="{{$value->id}}" class="btn btn-info btn-xs duplicateThis"><i class="fa fa-copy"></i></a>
                            <a href="{{route('makeHomePage',$value->id)}}" class="btn btn-default btn-xs"><i class="fa fa-home"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
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
        <h4 class="modal-title">Duplicate Page</h4>
      </div>
      <div class="modal-body">
          <form action="{{route('duplicatePage')}}" method="POST">
              {{csrf_field()}}
              <div class="form-group">
                  <input type="hidden" id="page-id" name="id">
                  <input type="text" class="form-control" name="title" id="page-title" required>
              </div>
              <div class="text-center">
                  <input type="submit" class="btn btn-success" value="Duplicate">
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
<script type="text/javascript">
    $('#datatable').dataTable({
        sort:false,
    });
    $(document).on('click',".duplicateThis",function(){
        $("#page-id").val($(this).data('id'));
        $("#page-title").val("Copy of "+$(this).data('title'));
        $("#duplicateModal").modal("show");
    });
</script>

@endsection