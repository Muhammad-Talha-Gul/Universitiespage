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

    .name-left {
        font-weight: 600;
        margin-right: 5px;
        color: black;
    }

    .message-name {
        margin-bottom: 10px;
    }

    .message-modal-main {
        margin-bottom: 20px;
    }

    .reply-textarea {
        resize: none;
        overflow: hidden;
    }

    .reply-button-main {
        max-width: max-content;
        margin: 30px auto 0px;
    }

    .reply-button {
        padding: 7px 20px !important;
        margin-right: 8px;
    }

    .message-column {
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .modal-header::before {
        display: none !important;
    }

    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-width: 100%;
    }

    .modal-header::after {
        display: none !important;
    }
</style>
@if(check_access(Auth::user()->id,'student','_show')==1)
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
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
            </div>
            <h4 class="m-t-0 header-title"><b>Consultant List</b></h4>
            <table id="datatable" class="table hover">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Phone Number</th>
                        <th>Office Location</th>
                        <th>Mesaage</th>
                        <!-- <th>Message sent Date</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                    <tr>
                        <td>{{($message->user_name)??''}}</td>
                        <td>{{$message->user_email}}</td>
                        <td>{{$message->phone_number}}</td>
                        <td>{{$message->office_location}}</td>
                        <td class="message-column">{{$message->message}}</td>
                        <!-- <td>{{date('dS M, Y h:i a',strtotime($value->created_at))}}</td> -->
                        <td>
                            <!-- @if(check_access(Auth::user()->id,'student','_show')==1)<a href="{{ route('consultant-details', ['id' =>$message->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a> -->
                            @endif
                            <!-- @if(check_access(Auth::user()->id,'student','_show')==1)<a href="{{ route('message-delete', ['id' =>$message->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-trash"></i></a>
                            @endif -->

                            @if(check_access(Auth::user()->id,'student','_show')==1)
                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#replyModal{{$message->id}}">
                                <i class="fa fa-eye"></i>
                            </button>
                            @endif
                            <!-- @if(check_access(Auth::user()->id,'student','_show')==1)<a href="{{route('show_consultant_student',($value->id)??'')}}" class="btn btn-info btn-xs"><i class="fa fa-user"> Students</i></a>
                            @endif -->

                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<!-- Modal -->
@foreach($messages as $message)
<div class="modal fade" id="replyModal{{$message->id}}" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replyModalLabel">Mesaage Details</h5>
                <button type="button" class="close header-close-button" data-dismiss="modal" aria-label="Close">
                    x
                </button>
            </div>
            <div class="modal-body">
                <div class="message-modal-main">
                    <div class="message-name">
                        <span class="name-left">Name:</span>
                        <span class="name-right">{{($message->user_name)??''}}</span>
                    </div>
                    <div class="message-name">
                        <span class="name-left">Email:</span>
                        <span class="name-right">{{($message->user_email)??''}}</span>
                    </div>

                    <div class="message-name">
                        <span class="name-left">Phone Number:</span>
                        <span class="name-right">{{($message->phone_number)??''}}</span>
                    </div>

                    <div class="message-name">
                        <span class="name-left">Office Location:</span>
                        <span class="name-right">{{$message->office_location}}</span>
                    </div>

                    <div class="message-name">
                        <span class="name-left">Mesaage:</span>
                        <span class="name-right">{{$message->message}}</span>
                    </div>
                </div>
                <!-- <div class="reply-main">
                    <form action="{{route('reply-message')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" id="email" name="email" value="{{$message->user_email}}">
                        <input type="hidden" id="id" name="id" value="{{$message->id}}">

                        <div class="reply-textarea-main">
                            <label for="" class="apply-inpu-label contact-us-label">Reply Here</label>
                            <textarea name="reply" id="" cols="30" rows="10" class="form-control apply-input reply-textarea" placeholder="Enter Your Reply" maxlength="1000" required></textarea>
                        </div>

                        <div class="reply-button-main">
                            <button type="submit" class="btn btn-info btn-xs reply-button">Reply</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div> -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
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
    autosize();

    function autosize() {
        var text = $('.reply-textarea');

        text.each(function() {
            $(this).attr('rows', 1);
            resize($(this));
        });

        text.on('input', function() {
            resize($(this));
        });

        function resize($text) {
            $text.css('height', 'auto');
            $text.css('height', $text[0].scrollHeight + 'px');
        }
    }
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



    $(document).ready(function() {
        $('#replyForm').submit(function(e) {
            e.preventDefault(); // Prevent form submission

            // Serialize form data
            var formData = $(this).serialize();

            // AJAX request
            $.ajax({
                url: "{{ route('reply-message') }}",
                type: "POST",
                data: formData,
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Display success message
                        $('#replyModal').modal('hide');
                        alert('Email sent successfully.');
                    } else {
                        // Display error message
                        alert('Failed to send email: ' + response.error);
                    }
                },
                error: function(xhr, status, error) {
                    // Display error message
                    alert('Failed to send email: ' + error);
                }
            });
        });
    });
</script>

@endsection