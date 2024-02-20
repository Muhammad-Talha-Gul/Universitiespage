
@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
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
@if(check_access(Auth::user()->id,'additionals','_show')==1)
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Courses </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Courses Contact Logs </a>
                    </li>
                    <li class="active">
                        Courses
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
                
                <h4 class="m-t-0 header-title"><b>Courses List</b></h4>                
                <table id="datatable" class="table hover">
                    <thead>
                    <tr>
                       <th>#</th>
                       <th>Student Email</th>
                       <th>Course</th>
                       <th>Date</th>
                       <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($data as $key => $value)
                                    <tr class="{{($value->is_read==1)?'':'unread'}}" id="recorddel<?php echo $value->id; ?>">
                                        <td>
                                            <?php echo $i; $i = $i+1; ?>
                                        </td>
                                        
                                        <td>
                                            @foreach($users as $key => $user)
                                            <?php if($value->student_id == $user->id) {

                                                echo $user->email;

                                            }?>
                                            @endforeach
                                        </td>

                                        <td>
                                            @foreach($courses as $key => $course)
                                            <?php if($value->course_id == $course->id) {

                                                echo $course->name;

                                            }?>
                                            @endforeach
                                        </td>

                                        <td class="text-right" style="width: 180px;">
                                            {{($value->created_at!==null)?date_format($value->created_at,'d/m/Y g:i A'):'-'}}
                                        </td>
                                        <td>
                                          <button class="btn btn-danger fa fa-trash" onclick="delete_record('<?php echo $value->id; ?>')"></button>
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
<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script type="text/javascript">
    $('#datatable').dataTable({
        sort:false,
    });

</script>


<script>

    function delete_record(id) {

        var c_id = id;
        var linktodelete = '/delete_contactbtn/'+c_id+'';

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this!",
            type: "error",
            showCancelButton: true,
            cancelButtonClass: 'btn-default btn-md waves-effect',
            confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
            confirmButtonText: 'Delete!',
        },function() {
          $.ajax({
            type: 'GET',
            url: linktodelete,   
            data: {},
            dataType: "json",
            success: function (data) {
 
              if (data.message == 'success') {

              document.getElementById("recorddel"+c_id).style.display = 'none';
              swal("Success!", data.message_text, "success");

              } 
              else {

               swal("Failure!", data.message_text, "error");

              }

            }   
          });
        });
    }

</script>

@endsection