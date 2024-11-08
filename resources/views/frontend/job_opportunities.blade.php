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
</style>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<section class="contact-us py-5">
    <div class="container">
        <div class="contact-top-content-main mb-5">
            <h2 class="h2 contact-us-heading">
                Current Openings
            </h2>
            <!-- <p class="p contact-us-paragraph">
                We Are 
            </p> -->
        </div>
        <style>
            .justify-content-between {
                justify-content: space-between !important;
                align-items: center;
            }

            .job_col {
                /* border-bottom: 1px solid #c9c9c9; */
                padding: 15px 20px;
                margin-bottom: 20px;
                box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
                border-radius: 5px;
            }

            .job_col h3 {
                font-size: 18px;
                font-weight: 700;
                margin-bottom: 15px;
            }

            .job_col h3 a {
                color: black;
            }

            .job_col h3 a:hover {
                color: #0B6D76 !important;
            }

            .job_col ul {
                display: flex;
                align-items: center;
                padding: 0;
            }

            .job_col ul li{
                text-transform: capitalize;
            }
            .job_col ul li:not(:last-child) {
                margin-right: 20px;
                border-right: 1px solid #808287;
                padding-right: 20px;

            }

            .view_job_btn a {
                border: 1px solid black;
                border-radius: 5px;
                font-weight: 600;
                display: block;
                max-width: 140px;
                text-align: center;
                padding: 12px 0;
                margin-left: auto;
            }

            .view_job_btn a:hover {
                border-color: #0B6D76 !important;
                background: #0B6D76 !important;
                color: #fff !important;
            }

            @media screen and (max-width: 991px) {
                .job_col h3 {
                    font-size: 22px;
                }
            }

            @media screen and (max-width: 767px) {
                .job_col ul {
                    align-items: flex-start;
                    flex-direction: column;
                }

                .job_col ul li:not(:last-child) {
                    border-right: none;
                    margin-bottom: 15px;
                    
                }

                .view_job_btn a {
                    margin-left: 0;
                    margin-top: 20px;
                    font-size: 14px;
                    padding: 8px 0;
                }
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
            }
            .skills{
                text-transform: capitalize;
            }
            .job-listing-title{
                text-transform: capitalize;
            }
        </style>
        <div class="job-listing-main ">
            <!-- <div class="job-list-card job_col ">
                <div class="row justify-content-between">
                    <div class="col-md-9">
                        <h3><a href="https://techificent.com/careers/android">Android Developer</a></h3>
                        <ul>
                            <li>Permanent</li>
                            <li>Lahore, Punjab, Pakistan</li>
                            <li>November 25, 2022</li>
                            <li>Mobile Application Development</li>
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <div class="view_job_btn">
                            <a href="https://techificent.com/careers/android">View Job</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="job-list-card job_col ">
                <div class="row justify-content-between">
                    <div class="col-md-9">
                        <h3><a href="https://techificent.com/careers/android">Android Developer</a></h3>
                        <ul>
                            <li>Permanent</li>
                            <li>Lahore, Punjab, Pakistan</li>
                            <li>November 25, 2022</li>
                            <li>Mobile Application Development</li>
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <div class="view_job_btn">
                            <a href="https://techificent.com/careers/android">View Job</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="job-list-card job_col ">
                <div class="row justify-content-between">
                    <div class="col-md-9">
                        <h3><a href="https://techificent.com/careers/android">Android Developer</a></h3>
                        <ul>
                            <li>Permanent</li>
                            <li>Lahore, Punjab, Pakistan</li>
                            <li>November 25, 2022</li>
                            <li>Mobile Application Development</li>
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <div class="view_job_btn">
                            <a href="https://techificent.com/careers/android">View Job</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="job-list-card job_col last_job_col">
                <div class="row justify-content-between">
                    <div class="col-md-9">
                        <h3><a href="https://techificent.com/careers/android">Android Developer</a></h3>
                        <ul>
                            <li>Permanent</li>
                            <li>Lahore, Punjab, Pakistan</li>
                            <li>November 25, 2022</li>
                            <li>Mobile Application Development</li>
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <div class="view_job_btn">
                            <a href="https://techificent.com/careers/android">View Job</a>
                        </div>
                    </div>
                </div>
            </div> -->
            @if ($jobOpportunities->isEmpty())
            <p>No job available.</p>
            @else
            @foreach ($jobOpportunities as $jobOpportunity)
            <div class="job-list-card job_col ">
                <div class="row justify-content-between">
                    <div class="col-md-9">
                        <h3 class="job-listing-title"><a href="{{ route('job-details', ['id' => $jobOpportunity->id]) }}">{{ $jobOpportunity->title }}</a></h3>
                        <ul>
                            <li>{{ $jobOpportunity->job_type }}</li>
                            <li>{{ $jobOpportunity->site_based }}</li>
                            <li>{{ $jobOpportunity->city }}, {{ $jobOpportunity->province }}, {{ $jobOpportunity->country }}</li>
                            <li >{{ $jobOpportunity->experience}}</li>
                            <li class="skills">{{ $jobOpportunity->skills }}</li>
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <div class="view_job_btn">
                            <a href="{{ route('job-details', ['id' => $jobOpportunity->id]) }}">View Job</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <td>{{ $jobOpportunity->id }}</td>
                        <td>{{ $jobOpportunity->title }}</td>
                        <td>{{ $jobOpportunity->job_type }}</td>
                        <td>{{ $jobOpportunity->city }}</td>
                        <td>{{ $jobOpportunity->province }}</td>
                        <td>{{ $jobOpportunity->country }}</td>
                        <td>{{ $jobOpportunity->site_based }}</td>
                        <td>{{ $jobOpportunity->skills }}</td>
                        <td>{{ $jobOpportunity->requirements }}</td>
                        <td>{{ $jobOpportunity->responsibilities }}</td>
                        <td>{{ $jobOpportunity->description }}</td>
                        <td>{{ $jobOpportunity->mail_status }}</td>
                        <td>{{ $jobOpportunity->post_status }}</td> -->
            @endforeach
            @endif
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

    .hiring_col{
        position: relative;
        padding: 0px 15px;
    }
    .hiring_col::after{
        content: "";
        position: absolute;
        top: 50px;
        bottom: 50px;
        right: 0px;
        width: 1px;
        background: #fff;
    }
    .last_hiring_col::after{
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
    .hiring_col{
        padding: 15px;
        /* box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; */
        border-radius: 5px;
    }
    .hiring-heading{
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
            var text = $(this).text().replace(/,/g, ', ');
            $(this).text(text);
        });
    });
</script>
@endsection