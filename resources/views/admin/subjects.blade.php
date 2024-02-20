@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/summernote/summernote.css')}}" rel="stylesheet" />
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@if(check_access(Auth::user()->id,'subject','_show')==1)
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Subject </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Subject
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
                @elseif(Session::has('errors'))
                <div class="alert alert-danger">
                    <p>{{Session::get('errors')}}</p>
                </div>
                @endif

                <div class="form-group pull-right" style="margin-bottom: 10px;">
                    {{-- <form action="#" method="POST" id="del_form" form="del_form">{{csrf_field()}}</form>
                    <a class="btn btn-danger btn-sm" id="deleteAll">Delete (<span id="checkCount">0</span>)</a> --}}
                    @if(check_access(Auth::user()->id,'subject','_create')==1)
                    <a style="cursor:pointer" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSubject">New Subject</a>
                    <div id="addSubject" class="modal fade" role="dialog"  >
                      <div class="modal-dialog" style=" min-width:600px;">

                        <!-- Modal content-->
                        <form action="{{route('subject.store')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">New Subject</h4>
                              </div>
                              <div class="modal-body row">
                                <div class="col-md-12" style="margin-top: 10px;width: 100%;">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Name</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="name" placeholder="Subject Name" value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="col-md-12 control-label">Icon</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="icon" placeholder="Icon" value="{{ old('icon') }}">
                                        </div>
                                    </div> --}}
                                </div>
                              </div>
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-default" value="Save">
                              </div>
                            </div>
                        </form>

                      </div>
                    </div>
                    @endif
                </div>
                <h4 class="m-t-0 header-title"><b>Subject List</b></h4>                
                <table id="datatable" class="table hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th width="100px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $value)
                    <tr>
                        {{-- {{dd($value)}} --}}
                        <td>{{$value->name}}</td>  
                        <td>
                            @if(check_access(Auth::user()->id,'subject','_edit')==1)
                                <a style="cursor:pointer;"  class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editSubject{{$value->id}}" ><i class="fa fa-pencil"></i></a>
                                <div id="editSubject{{$value->id}}" class="modal fade" role="dialog">
                                  <div class="modal-dialog" style=" min-width:600px">

                                    <!-- Modal content-->
                                    <form action="{{route('subject.update',$value->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit Subject</h4>
                                          </div>
                                          <div class="modal-body row" >
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <div class="form-group" style="width: 100%;">
                                                    <label class="col-md-12 control-label">Name</label>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="name" placeholder="Subject Name" value="{{ $value->name }}" required style="width: 100%;">
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group" style="width: 100%;">
                                                    <label class="col-md-12 control-label">Icon</label>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="icon" placeholder="Icon" value="{{ $value->icon }}" style="width: 100%;">
                                                    </div>
                                                </div> --}}
                                            </div>
                                            
                                          </div>
                                          <div class="modal-footer">
                                            <input type="submit" class="btn btn-default" value="Update">
                                          </div>
                                        </div>
                                    </form>

                                  </div>
                                </div>
                            @endif
                            @if(check_access(Auth::user()->id,'subject','_delete')==1)<a class="btn btn-danger btn-xs"  onclick="deleteit({{$value->id}})"><i class="fa fa-trash"></i></a>
                                <form action="{{route('subject.destroy', $value->id)}}" id="delete-form-{{$value->id}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                </form>
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

@else
@component('admin.access-denied') @endcomponent
@endif
@endsection
@section('customScripts')
<script src="{{asset('plugins/summernote/summernote.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script type="text/javascript">
    $('#datatable').dataTable({
        sort:false,
    });

    jQuery(document).ready(function(){
        var lfm = function(options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '{{url('/filemanager')}}';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };

        var LFMButton = function(context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                click: function() {        
                    lfm({type: 'image', prefix: '{{url('/filemanager')}}'}, function(url, path) {
                        context.invoke('insertImage', url);
                    });
                }
            });
            return button.render();
        };
        $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
        $('.summernote').summernote({
            height: 240,
            minHeight: null,
            maxHeight: null,
            focus: false,
            toolbar: [
                ['popovers', ['lfm']],
                ['style', ['style']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['link', ['linkDialogShow', 'unlink']],
                ['table', ['table']],
            ],
            buttons: {
                lfm: LFMButton
            }
        });
        $(".select2").select2();
        $(".tags").tagsinput();

        jQuery('.datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "yyyy-mm-dd",
        });
        // $('.date-picker-year').datepicker({
        //     format: "yyyy-mm-dd",
        //     weekStart: 1,
        //     orientation: "bottom",
        //     // language: '',
        //     keyboardNavigation: false,
        //     viewMode: "years",
        //     autoclose: true,
        //     minViewMode: "years"
        // });
    });


    
    function deleteit(id) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this!",
            type: "error",
            showCancelButton: true,
            cancelButtonClass: 'btn-default btn-md waves-effect',
            confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
            confirmButtonText: 'Delete!',
        },function() {
              $("#delete-form-"+id).submit();
        });
    }
</script>

@endsection