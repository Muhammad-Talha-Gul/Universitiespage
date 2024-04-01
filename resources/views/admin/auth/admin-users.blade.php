@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<style type="text/css">
    .loader {
        float: right;
        margin-left: 10px;
    }
</style>
@if(check_access(Auth::user()->id,'student','_show')==1)
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Consultant </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Consultant
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
                    @if(check_access(Auth::user()->id,'student','_create')==1)
                    {{-- <a href="{{route('student.create')}}" class="btn btn-primary btn-sm">New Page</a> --}}
                    @endif
                </div>
                <h4 class="m-t-0 header-title"><b>Consultant List</b></h4>
                <table id="datatable" class="table hover">
                    <thead>
                        <tr>

                            <th>User Name</th>
                            <th>Emails</th>
                            <th>Password</th>
                            <th>User Type</th>
                            <th>Registerd Date</th>
                            <th>Permissions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adminUsers as $adminUser)
                        <tr>
                            <td>{{($adminUser->first_name)??''}} {{($adminUser->last_name)??''}}</td>
                            <td>{{($adminUser->email)??''}}</td>
                            <td>{{($adminUser->secret)??''}}</td>
                            <td>{{($adminUser->user_type)??''}}</td>
                            <td>{{($adminUser->created_at)??''}}</td>
                            <td>
                                @isset($permissionsData[$adminUser->id]->admin_permissions)
                                @php
                                $hasPermission = false;
                                @endphp
                                @forelse($permissionsData[$adminUser->id]->admin_permissions as $permission => $value)
                                @if($value === 'on')
                                <span>{{ $permission }}: {{ $value }}</span><br>
                                @php
                                $hasPermission = true;
                                @endphp
                                @endif
                                @empty
                                <!-- No permissions -->
                                @endforelse

                                @if(!$hasPermission)
                                <span>No permissions</span>
                                @endif
                                @else
                                <span>No permissions</span>
                                @endisset
                            </td>


                            <td>
                                <!-- <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">delete</button> -->
                                <!-- @if(check_access(Auth::user()->id,'student','_show')==1)<a  href="{{ route('admin-details', ['id' =>$adminUser->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                            @endif -->
                                <a data-toggle="modal" data-target="#exampleModal{{ $adminUser->id }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                                <a data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn-xs"><i class="fa fa-trash"></i></a>
                                <!-- @if(check_access(Auth::user()->id,'student','_show')==1)<a href="{{route('show_consultant_student',($value->id)??'')}}" class="btn btn-info btn-xs"><i class="fa fa-user"> Students</i></a>
                            @endif -->

                            </td>
                        </tr>

                        @foreach($adminUsers as $adminUser)
                        <!-- permission Modal -->
                        <div class="modal fade" id="exampleModal{{ $adminUser->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete This User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="permissions-main">
                                            <form method="POST" action="{{ route('updatePermission', ['id' => $adminUser->id]) }}">
                                                {{ csrf_field() }}
                                                <!-- Course -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="course" value="off">
                                                    <input class="form-check-input" type="checkbox" id="course{{ $adminUser->id }}" name="course" {{ isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['course'] === 'on' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="course{{ $adminUser->id }}">Course</label>
                                                </div>

                                                <!-- Free Consultation -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="free_consultation" value="off">
                                                    <input class="form-check-input" type="checkbox" id="free_consultation{{ $adminUser->id }}" name="free_consultation" {{ isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['free_consultation'] === 'on' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="free_consultation{{ $adminUser->id }}">Free Consultation</label>
                                                </div>

                                                <!-- Student -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="student" value="off">
                                                    <input class="form-check-input" type="checkbox" id="student{{ $adminUser->id }}" name="student" {{ isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['student'] === 'on' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="student{{ $adminUser->id }}">Student</label>
                                                </div>

                                                <!-- Consultant -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="consultant" value="off">
                                                    <input class="form-check-input" type="checkbox" id="consultant{{ $adminUser->id }}" name="consultant" {{ isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['consultant'] === 'on' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="consultant{{ $adminUser->id }}">Consultant</label>
                                                </div>

                                                <!-- Apply Online -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="apply_online" value="off">
                                                    <input class="form-check-input" type="checkbox" id="apply_online{{ $adminUser->id }}" name="apply_online" {{ isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['apply_online'] === 'on' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="apply_online{{ $adminUser->id }}">Apply Online</label>
                                                </div>

                                                <!-- Guide -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="guide" value="off">
                                                    <input class="form-check-input" type="checkbox" id="guide{{ $adminUser->id }}" name="guide" {{ isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['guide'] === 'on' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="guide{{ $adminUser->id }}">Guide</label>
                                                </div>

                                                <!-- Pages -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="pages" value="off">
                                                    <input class="form-check-input" type="checkbox" id="pages{{ $adminUser->id }}" name="pages" {{ isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['pages'] === 'on' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="pages{{ $adminUser->id }}">Pages</label>
                                                </div>

                                                <!-- Articles -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="articles" value="off">
                                                    <input class="form-check-input" type="checkbox" id="articles{{ $adminUser->id }}" name="articles" {{ isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['articles'] === 'on' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="articles{{ $adminUser->id }}">Articles</label>
                                                </div>

                                                <!-- Visit Visa -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="hidden" name="visit_visa" value="off">
                                                    <input class="form-check-input" type="checkbox" id="visit_visa{{ $adminUser->id }}" name="visit_visa" {{ isset($permissionsData[$adminUser->id]) && $permissionsData[$adminUser->id]->admin_permissions['visit_visa'] === 'on' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="visit_visa{{ $adminUser->id }}">Visit Visa</label>
                                                </div>
                                                <button type="submit" class="submit-butt">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        @if(check_access(Auth::user()->id,'student','_show')==1)<a href="{{ route('admin-delete', ['id' =>$adminUser->id]) }}" class="btn btn-secondary">Delete</a>@endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete This User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                @if(check_access(Auth::user()->id,'student','_show')==1)<a href="{{ route('admin-delete', ['id' =>$adminUser->id]) }}" class="btn btn-secondary">Delete</i></a>@endif
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
        sort: false,
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
        }, function() {
            $("#delete-form-" + id).submit();
        });
    }
    $(document).on('change', '.mark_featured', function() {
        var $loader = $(this).parent().find('.loader');
        $loader.html("<i class='fa fa-refresh fa-spin'></i>");
        var data = {
            '_token': "{{csrf_token()}}",
            'id': $(this).data('id')
        };
        jQuery.ajax({
            url: '{{route("ajaxPopularUniversity")}}',
            type: 'post',
            dataType: 'html',
            data: data,
            success: function(data) {
                $loader.html("");
            }
        });
    });
</script>

@endsection