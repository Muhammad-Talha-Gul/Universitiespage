@extends('layouts.frontend')
@section('title', 'Application Form | '.$data->name.' | '.$data->university->name)


@section('content')
<style>
    .office-location-paragraph {
        color: black;
    }

    .location-icon {
        display: block;
    }

    section {
        padding: 80px 0;
    }

    .job_content p {
        margin-bottom: 20px;
    }

    .append-list ul {
        list-style: disc;
        padding-left: 25px !important;
    }

    .append-list ul li {
        margin-bottom: 20px;
    }

    .append-list ol {
        padding-left: 25px !important;
    }

    .append-list ol li {
        margin-top: 20px;
    }

    .job_form label {
        display: block;
        font-weight: 600;
        margin-bottom: 5px;
        font-size: 14px;
    }

    .input_field {
        background: transparent;
        width: 100%;
        border: none;
        border-bottom: 0.6px solid #34435e;
        color: #fff;
        padding: 5px 0;
    }

    .job_form .input_field {
        color: #000;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px 15px;
    }

    .send_btn {
        background: #0B6D76;
        border: none;
        color: #fff;
        border-radius: 5px;
        padding: 5px 40px;
        width: 100%;
        cursor: pointer;
    }

    .skill-badge {
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
    }

    .skills {
        text-transform: capitalize;
    }

    .append-list ul li {
        list-style-type: disc;
    }

    /* .details-list-main{
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 0px;
    } */

    .details-paragraph {
        text-transform: capitalize;
    }

    .job-details-heading {
        margin-bottom: 30px;
        text-transform: uppercase;
        font-size: 28px;
    }

    .job_form {
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        padding: 15px 20px 20px;
    }

    .form-heading {
        text-transform: capitalize;
    }
    @media (min-width: 300px) and (max-width: 575px) {
        section{
            margin-top: 0px !important;
        }
        .job_detail{
            margin-top: 100px !important;
        }
        .job-details-heading{
            font-size: 20px;
        }
        p{
            font-size: 14px;
        }
        li{
            font-size: 14px;
        }
        .job_form{
            margin-top: 30px;
        }
    }
    @media (min-width: 576px) and (max-width: 767px) {
        section{
            margin-top: 0px !important;
        }
        .job_detail{
            margin-top: 80px !important;
        }
        .job-details-heading{
            font-size: 22px;
        }
        p{
            font-size: 15px;
        }
        li{
            font-size: 15px;
        }
        .job_form{
            margin-top: 30px;
        }
    }
    @media (min-width: 768px) and (max-width: 991px) {
        section{
            margin-top: 0px !important;
        }
        .job_detail{
            margin-top: 80px !important;
        }
        .job-details-heading{
            font-size: 24px;
        }
        p{
            font-size: 16px;
        }
        li{
            font-size: 16px;
        }
        .job_form{
            margin-top: 30px;
        }
    }
    @media (min-width: 992px) and (max-width: 1199px) {
        section{
            margin-top: 0px !important;
        }
        .job_detail{
            margin-top: 100px !important;
        }
        .job-details-heading{
            font-size: 26px;
        }
    }
    @media (min-width: 300px) and (max-width: 400px) {
        .job_detail{
            margin-top: 160px !important;
        }
    }
</style>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<section class="job_detail">
    <div class="container">

        
        <div class="row">
            <div class="col-lg-7 col-md-12">
            <h1 class="job-details-heading">{{ $details->title }}</h1>
                <div class="details-list-main">
                    <p class="details-paragraph"><strong>Job Type:</strong> {{ $details->job_type }}</p>
                    <p class="details-paragraph"><strong>Site Based:</strong> {{ $details->site_based }}</p>
                    <p class="details-paragraph"><strong>Experience:</strong> {{ $details->experience }}</p>
                    <p class="details-paragraph"><strong>Location:</strong> {{ $details->city }}, {{ $details->province }}, {{ $details->country }}</p>
                </div>
                <div class="requirments append-list mb-4">
                    <strong>Requirments:</strong><br>
                    {!! $details->requirements !!}
                </div>
                <div class="responsibilities append-list mb-4">
                    <strong>Responsibilities:</strong><br>
                    {!! $details->responsibilities !!}
                </div>
                <div class="responsibilities append-list mb-4">
                    <strong>Details:</strong><br>
                    {!! $details->description !!}
                </div>
                <p><strong style="display: inline-block;">Skills:</strong>
                <div style="display: inline-block;" class="skills"> {{ $details->skills }}</div>
                </p>
            </div>
            <div class="col-lg-5 col-md-12">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="job_form">
                    <div id="custom-alert" style="display: none; background-color:rgba(11, 109, 118, 0.7); padding:10px 30px; color: #fff; border-redius:5px; margin-bottom:15px;">Application Submitted Successfully</div>
                    <h3 class="form-heading mb-3">Apply for this position</h3>
                    <form method="post" action="{{route('apply-job-post')}}" enctype="multipart/form-data" id="apply-job-form">
                        {{csrf_field()}}
                        <input type="hidden" value="{{ $details->id}}" name="job_id">
                        <div class="mb-4 {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="full_name">Full Name <span>*</span></label>
                            <input type="text" name="name" id="name" class="input_field job-input" value="">
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="mb-4 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Email <span>*</span></label>
                            <input type="email" name="email" id="email" class="input_field job-input" value="">
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="mb-4 {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label for="phone">Phone <span>*</span></label>
                            <input type="number" id="phone_number" name="phone_number" class="input_field job-input" value="">
                            @if ($errors->has('phone_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- <div class="mb-4 {{ $errors->has('current_salary') ? ' has-error' : '' }}">
                            <label for="current_salary">Current Salary <span>*</span></label>
                            <input type="number" name="current_salary" class="input_field job-input" id="current_salary" value="">
                            @if ($errors->has('current_salary'))
                            <span class="help-block">
                                <strong>{{ $errors->first('current_salary') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="mb-4 {{ $errors->has('expected_salary') ? ' has-error' : '' }}">
                            <label for="expected_salary">Expected Salary <span>*</span></label>
                            <input type="number" name="expected_salary" class="input_field job-input" id="expected_salary" value="">
                        </div> -->
                        <div class="mb-4 {{ $errors->has('start_date') ? ' has-error' : '' }}">
                            <label for="start_date">Earliest start date? <span>*</span></label>
                            <input type="date" min="2024-06-01" name="start_date" id="start_date" class="input_field job-input" value="">
                            @if ($errors->has('expected_salary'))
                            <span class="help-block">
                                <strong>{{ $errors->first('expected_salary') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="mb-4 {{ $errors->has('resume') ? ' has-error' : '' }}">
                            <label for="resume">Resume <span>*</span></label>
                            <input type="file" accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" name="resume" id="resume" class="input_field job-input">
                            @if ($errors->has('resume'))
                            <span class="help-block">
                                <strong>{{ $errors->first('resume') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="">
                            <input type="submit" class="send_btn" value="Submit Application">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .hiring_process {
        background: #0B6D76;
        color: #fff;
    }

    .hiring_process .heading {
        margin-bottom: 50px;
    }

    .hiring_col {
        position: relative;
        padding: 0px 15px;
    }

    .hiring_col::after {
        content: "";
        position: absolute;
        top: 50px;
        bottom: 50px;
        right: 0px;
        width: 1px;
        background: #fff;
    }

    .last_hiring_col::after {
        display: none !important;
    }

    .hiring_col h4 {
        color: #fff;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .hiring_col h3 {
        margin-bottom: 10px;
        font-size: 22px;
        font-weight: 600;
    }

    .hiring_col p {
        padding-right: 20px;
    }

    .hiring_col {
        padding: 15px;
        /* box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; */
        border-radius: 5px;
    }

    .hiring-heading {
        color: #fff !important;
    }
</style>
<section class="hiring_process py-5">
    <div class="container">
        <h2 class="heading hiring-heading">Hiring Process</h2>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="hiring_col">
                    <h4>01</h4>
                    <h3>Apply</h3>
                    <p style="height: 96px;">Apply for our posted job opportunity by submitting your resume. We look forward to reviewing your application and considering you for the position.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hiring_col">
                    <h4>02</h4>
                    <h3>Review</h3>
                    <p style="height: 96px;">Once we receive your resume, our HR team will review thoroughly to see if your expertise matches our required position.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hiring_col">
                    <h4>03</h4>
                    <h3>Interviews</h3>
                    <p style="height: 96px;">Our competency based interviews conducted by subject matter experts would tell if you have what it takes to work with us</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hiring_col last_hiring_col">
                    <h4>04</h4>
                    <h3>Onboarding</h3>
                    <p style="height: 96px;">Once you’ve passed the interview, we’ll make you the offer and after accepting it you will be welcomed to start your journey at Universities Page</p>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $(".skills").each(function() {
            var text = $(this).text().split(',');
            var badges = "";
            text.forEach(function(item) {
                badges += "<span class='skill-badge'>" + item.trim() + "</span>";
            });
            $(this).html(badges);
        });
    });
    //     $(document).ready(function(){
    //     $(".skills").each(function(){
    //         var text = $(this).text().split(',');
    //         var list = "<ul>"; // Start the unordered list
    //         text.forEach(function(item) {
    //             // Add each skill as a list item
    //             list += "<li>" + item.trim() + "</li>";
    //         });
    //         list += "</ul>"; // Close the unordered list
    //         $(this).html(list); // Replace the content with the list
    //     });
    // });

    // $(document).ready(function() {
    //     $(".skills").each(function() {
    //         var text = $(this).text().replace(/,/g, ', ');
    //         $(this).text(text);
    //     });
    // });
</script>

<script>
$(document).ready(function(){
    $('#apply-job-form').on('submit', function(e){
        e.preventDefault();
        if (!$('.t_loader').is(':visible')) {
            $('.t_loader').fadeIn(200)
          }
        if (this.checkValidity()) { // Check if the form is valid
            var formData = new FormData(this); 
            
            $.ajax({
                url: "{{route('apply-job-post')}}", 
                method: 'POST', 
                data: formData, 
                processData: false, 
                contentType: false,
                success: function(response){
                    console.log(response);
                    if ($('.t_loader').is(':visible')) {
                  $('.t_loader').fadeOut(200)
                }
                    $('#custom-alert').fadeIn(200).delay(2000).fadeOut(200); // Show and hide custom alert
                    $('.job-input').val('');
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                }
            });
        } else {
            console.log("Form is invalid");
        }
    });
});

</script>
@endsection