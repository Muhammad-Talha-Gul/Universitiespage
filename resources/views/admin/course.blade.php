<?php ini_set('memory_limit', '-1'); ?>
@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@if(check_access(Auth::user()->id,'course','_show')==1)
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Course </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Course
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
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
                    @if(check_access(Auth::user()->id,'subject','_create')==1)
                        <a style="cursor:pointer" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addSubject">New Subject</a>
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
                    @if(check_access(Auth::user()->id,'course','_create')==1)
                        <a href="{{route('course.create')}}" class="btn btn-primary btn-sm">New Course</a>
                        <a download href="https://universitiespage.com/course_sitemap.xml" class="btn btn-success btn-sm" >Generate Site-map</a>

                    @endif
                    <div class="search-container" style="
    margin-top: 10px;
    border-radius: 5px;
">
                        <input onkeyup="searchDataAgain(this)" type="text" style="
    border-radius: 5px;
" placeholder="Search.." id="courses"  class="search-data" name="search">
                        <button type="submit" style="
    border-radius: 5px;
"><i class="fa fa-search" onclick="searchCourse(this)"></i></button>
                    </div>
                </div>
                    <div class="Courses">
            @include('admin.course_partial',[$data])
                    </div>

        </div>
        </div>
    </div>

</div>

@else
@component('admin.access-denied') @endcomponent
@endif
@endsection
@section('customScripts')
{{--<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>--}}
{{--<script src="{{asset('/plugins/datatables/dataTables.bootstrap.js')}}"></script>--}}
<script src="{{asset('assets_frontend/js/jquery.js') }}"></script>
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets_frontend/js/axios.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" ></script>

<script type="text/javascript">
    // $('#datatable').dataTable({
    //     sort:false,
    // });
    // $(function () {
    //
    //     let info;
    //     $('#datatable').DataTable({
    //         "serverSide": true,
    //         "processing": true,
    //         "ajax": {
    //             url:'/admin-courses',
    //             data: function(d){
    //                 var getPageNumber = $('#datatable').DataTable().page.info();
    //                 console.log(getPageNumber)
    //                 d.page =  getPageNumber.page + 1;
    //             },
    //         },
    //         "columns": [
    //             { "data": "Name" },
    //             { "data": "Universities" },
    //             { "data":  "Subject" },
    //             { "data":  "Qualification" },
    //             { "data": "Popular" },
    //             { "data": "Created at"},
    //             { "data": "Action"},
    //             // { "data": "delete"},
    //         ],
    //
    //
    //     });
    //
    // });


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
    function popular(id){
        $.ajax({
            url: "/admin/"+id,
            success: function(result){
              window.location.reload()
            }});
    }
    // $('.search-data').keyup(function () {
    //     let a =  $('.search-data').val()
    //    if (a.length > 3) {
    //        console.log(a.length)
    //        // $(document).on('keypress',function(e) {
    //        // if(e.which == 13) {
    //        searchCourse();
    //        // }
    //        // });
    //    }
    // });

    function searchDataAgain(input){
        let a = $(input).val();
        if (a.length > 2) {
                searchCourse();
            } else if (a.length === 0) {
                searchCourse();
            }

    }
    function searchCourse(input){
        let courses = $('#courses').val();
        axios.get('/admin-course/'+courses).then(function (response) {
            // console.log(response)
            $('.Courses').empty();
            $('.Courses').append(response.data)
        });
    }
</script>

@endsection