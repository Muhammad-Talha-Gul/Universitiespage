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


    .custom-switch[type=checkbox] {
        height: 0;
        width: 0;
        visibility: hidden;
    }

    .custom-switch+label {
        cursor: pointer;
        text-indent: -9999px;
        width: 30px;
        /* Adjusted width */
        height: 15px;
        /* Adjusted height */
        background: grey;
        display: block;
        border-radius: 100px;
        position: relative;
    }

    .custom-switch+label:after {
        content: '';
        position: absolute;
        top: 2px;
        /* Adjusted top position */
        left: 2px;
        /* Adjusted left position */
        width: 11px;
        /* Adjusted width */
        height: 11px;
        /* Adjusted height */
        background: #fff;
        border-radius: 50%;
        transition: 0.3s;
    }

    .custom-switch:checked+label {
        background: #3ac9d6;
    }

    .custom-switch:checked+label:after {
        left: calc(100% - 2px);
        transform: translateX(-100%);
    }

    .custom-switch+label:active:after {
        width: 16px;
        /* Adjusted width */
    }

    .skill-badge{
                background: #0B6D76;
                color: #fff;
                padding: 3px 8px;
                border-radius: 20px;
                margin-right: 5px;
                display: inline-block;
                font-size: 12px;
                list-style: 38px;
                line-height: 19px;
                min-width: 30px;
                text-align: center;
                margin-bottom:5px;
            }
            .skills{
                text-transform: capitalize;
            }
            .append-list ul li{
                list-style-type: disc;
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
                <h4 class="page-title">Comments </h4>
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
            <div class="card-box table-responsive p-0">
            </div>
            <h4 class="m-t-0 header-title"><b>Comments List</b></h4>
            <table id="datatable" class="table hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Job Type</th>
                        <th>Location</th>
                        <th>Site Type</th>
                        <th>Skills</th>
                        <!-- <th>Message sent Date</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($jobOpportunities as $job)
                    <tr>
                        <td>{{($job->title)??''}} </td>
                        <td>{{$job->job_type}}</td>
                        <td>{{$job->city}}, {{$job->province}}, {{$job->country}}</td>
                        <td class="message-column">{{$job->site_based}}</td>
                        <td class="message-column">{{$job->skills}}</td>
                        <!-- <td>{{date('dS M, Y h:i a',strtotime($value->created_at))}}</td> -->
                        <td>
                            <!-- @if(check_access(Auth::user()->id,'student','_show')==1)<a href="{{ route('consultant-details', ['id' =>$message->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a> -->
                            @endif
                            <!-- @if(check_access(Auth::user()->id,'student','_show')==1)<a href="{{ route('message-delete', ['id' =>$message->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-trash"></i></a>
                            @endif -->

                            @if(check_access(Auth::user()->id,'student','_show')==1)
                           
                            <input type="hidden" name="id" value="{{$job->id}}">
                            <input type="hidden" name="status" id="status" value="{{$job->status}}">

                            <span style="max-width:max-content; display:inline-block;">
                                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#replyModal{{$job->id}}">
                                    <i class="fa fa-eye"></i>
                                </button>
                                <a href="{{route('job-delete', $job->id)}}" class="btn btn-info btn-xs">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a href="{{route('edit-job', $job->id)}}" class="btn btn-info btn-xs">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </span>
                            <span style="max-width:max-content; display:inline-block;">
                                <input type="checkbox" style="max-width:max-content; display:inline-block;" id="switch{{$job->id}}" class="custom-switch job-switch" {{$job->post_status == '1' ? 'checked' : ''}} />
                                <label for="switch{{$job->id}}" style="display:inline-block;">Toggle</label>
                            </span>
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
@foreach($jobOpportunities as $job)
<div class="modal fade" id="replyModal{{$job->id}}" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replyModalLabel">Job Details</h5>
                <button type="button" class="close header-close-button" data-dismiss="modal" aria-label="Close">
                    x
                </button>
            </div>
            <div class="modal-body">
                <div class="message-modal-main">
                    <div class="message-name">
                        <span class="name-left">Title:</span>
                        <span class="name-right">{{($job->title)}}</span>
                    </div>
                    <div class="message-name">
                        <span class="name-left">Job Type:</span>
                        <span class="name-right">{{($job->job_type)}}</span>
                    </div>

                    <div class="message-name">
                        <span class="name-left">Location:</span>
                        <span class="name-right">{{$job->city}}, {{$job->province}}, {{$job->country}}</span>
                    </div>

                    <div class="message-name">
                        <span class="name-left">Site Type:</span>
                        <span class="name-right">{{$job->site_based}}</span>
                    </div>
                    <div class="message-name">
                        <span class="name-left">Skills:</span>
                        <span class="name-right skills">{{$job->skills}}</span>
                    </div>

                    <div class="message-name">
                        <span class="name-left">Details:</span>
                        <span class="name-right">{!! $job->description !!}</span>
                    </div>
                    <div class="message-name">
                        <span class="name-left">Requirments:</span>
                        <span class="name-right"> {!! $job->requirements !!}</span>
                    </div>

                    <div class="message-name">
                        <span class="name-left">Responsibilites:</span>
                        <span class="name-right"> {!! $job->responsibilities !!}</span>
                    </div>
                </div>

                <style>
                    .replies-main {
                        margin-top: 15px;
                        padding-top: 10px;
                        border-top: 1px solid #ddd;
                        padding-left: 20px;
                    }
                    .apply-item{
                        padding: 15px;
                        margin-bottom: 10px;
                        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
                        list-style-type: none;
                    }
                </style>
                <div class="replies-main">
                    <h4 class="mt-0 mb-3" style="margin-top: 0px !important; margin-bottom:10px;">Job Applies</h4>
                    <ul class="p-0">

                        @if ($job->jobApplies->count() > 0)
                        @foreach ($job->jobApplies as $apply)

                            <li class="apply-item">
                                <div class="message-name">
                                    <span class="name-left">Name :</span>
                                    <span class="name-right" style="margin-right: 30px;">{{ $apply->name }}</span>
                                </div>
                                <div class="message-name">
                                    <span class="name-left">Phone Number :</span>
                                    <span class="name-right" style="margin-right: 30px;">{{ $apply->phone_number }}</span>
                                </div>
                                <!-- <div class="message-name">
                                    <span class="name-left">Current Salary :</span>
                                    <span class="name-right" style="margin-right: 30px;">{{ $apply->current_salary }}</span>
                                </div>
                               
                                <div class="message-name">
                                    <span class="name-left">Expected Salary :</span>
                                    <span class="name-right" style="margin-right: 30px;">{{ $apply->expected_salary }}</span>
                                </div> -->
                                <div class="message-name">
                                    <span class="name-left">Start Date :</span>
                                    <span class="name-right" style="margin-right: 30px;">{{ $apply->start_date }}</span>
                                </div>
                                <div class="message-name">
                                    <span class="name-left">Resume:</span>
                                    <span class="name-right" style="margin-right: 30px;">{{ $apply->resume }}</span>
                                    <span class="name-right" style="margin-right: 30px;">
                                        <a href="#" class="download-resume" data-file="{{ asset('uploads/files/' . $apply->resume) }}">Download</a>
                                    </span>
                                </div>
                                 <div class="message-name">
                                    <span class="name-left">Applied Date :</span>
                                    <span class="name-right" style="margin-right: 30px;">{{ $apply->created_at->format('Y-m-d') }}</span>
                                </div>
                            </li>
                            @endforeach
                            @else
                                <li>
                                    <div class="message-name">
                                        <span class="name-left">No replies found.</span>
                                    </div>
                                </li>
                            @endif
                    </ul>
                </div>
                

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
<script>
    $(document).ready(function(){
        $('.download-resume').on('click', function(e){
            e.preventDefault();
            var fileUrl = $(this).data('file');
            var link = document.createElement('a');
            link.href = fileUrl;
            link.download = fileUrl.substring(fileUrl.lastIndexOf('/') + 1);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    });
</script>
<script>
  $(document).ready(function() {
    $('.job-switch').change(function() {
        var jobId = $(this).attr('id').replace('switch', ''); // Extract comment ID from checkbox ID
        var isChecked = $(this).is(':checked'); // Check if the switch is checked

        // Determine the new status based on whether the switch is checked or not
        var newStatus = isChecked ? 1 : 0;

        console.log('New Status:', newStatus); // Log the new status value

        // Get CSRF token value
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Prepare headers for AJAX request
        var headers = {
            'X-CSRF-TOKEN': csrfToken
        };

        // Send AJAX request to update status
        $.ajax({
            type: 'POST',
            url: "{{ route('update-job-status', ['id' => ':id']) }}".replace(':id', jobId),
            data: {
                jobId: jobId,
                status: newStatus
            },
            headers: headers, // Include CSRF token in headers
            success: function(response) {
                if (response.success) {
                    console.log('Status updated successfully.');
                    alert('Status updated successfully.'); // Display alert when status is updated
                    // Update the status input field with the new status value
                    $('#status' + jobId).val(newStatus);
                } else {
                    console.error('Error updating status:', response.message);
                    alert('Error updating status: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error updating status:', error);
                alert('Error updating status: ' + error);
            }
        });
    });
    $('.reply-switch').change(function() {
    var replyId = $(this).attr('id').replace('switch', ''); // Extract reply ID from checkbox ID
    var isChecked = $(this).is(':checked'); // Check if the switch is checked
    
    // Determine the new status based on whether the switch is checked or not
    var newStatus = isChecked ? 1 : 0;
    // Send AJAX request to update status
    $.ajax({
        type: 'POST',
        url: "{{ route('reply-update-status', ['id' => ':id']) }}".replace(':id', replyId),
        data: {
            _token: '{{ csrf_token() }}',
            reply_id: replyId, // Include CSRF token
            status: newStatus,
        },
        success: function(response) {
            if (response.success) {
                console.log('Status updated successfully.');
                alert('Status updated successfully.'); // Display alert when status is updated
            } else {
                console.error('Error updating status:', response.message);
                alert('Error updating status: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error updating status:', error);
            alert('Error updating status: ' + error);
        }
    });
});

    
});






</script>
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

<script>
    // $(document).ready(function(){
    //     $(".skills").each(function(){
    //         var text = $(this).text().split(',');
    //         var badges = "";
    //         text.forEach(function(item) {
    //             badges += "<span class='skill-badge'>" + item.trim() + "</span>";
    //         });
    //         $(this).html(badges);
    //     });
    // });
    $(document).ready(function(){
        $(".skills").each(function(){
            var text = $(this).text().split(',');
            var badges = "";
            text.forEach(function(item) {
                badges += "<span class='skill-badge'>" + item.trim() + "</span>";
            });
            $(this).html(badges);
        });
    });
</script>

@endsection