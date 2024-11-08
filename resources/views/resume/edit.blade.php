@extends('layouts.frontend')
@section('title', 'Application Form | ' . $data->name . ' | ' . $data->university->name)

@section('customStyles')

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{ asset('crm/css/dashforge.css') }}">
    <link rel="stylesheet" href="{{ asset('crm/css/dashforge.auth.css') }}">




    <style type="text/css">
        .navbar-main {
            background-color: #0b6d76 !important;
        }

        .sign-wrapper {
            width: 700px;
            display: block;
        }

        .cv-block {
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 30px;
        }

        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }

        .avatar-upload .avatar-edit {
            position: absolute;
            right: 25px;
            z-index: 1;
            top: 15px;
        }

        .avatar-upload .avatar-edit input {
            display: none;
        }

        .avatar-upload .avatar-edit input+label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
            background-image: url('public/crm/images/svg/edit.svg');
            background-repeat: no-repeat;
            background-size: 20px 20px;
            background-position: center;
        }



        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .avatar-upload .avatar-preview>div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .resume-form-label {
            display: block;
            width: 100%;
        }


        .form-check-input {
            width: 50px;
            height: 25px;
            background-color: #ddd;
            border-radius: 50px;
            position: relative;
            appearance: none;
            -webkit-appearance: none;
            outline: none;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: #0d6efd;
        }

        .form-check-input:before {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: white;
            transition: 0.3s;
        }

        .form-check-input:checked:before {
            transform: translateX(25px);
        }

        .view-cv-btn {
            position: absolute;
            top: -20px;
            left: 0;
        }
    </style>
@endsection
@section('content')

    <style>
        .form-control {
            box-shadow: none !important;
            outline: none !important;
        }

        .student-login-icon .fa {
            margin-right: 0px !important;
        }

        .input-group-prepend {
            max-width: 37px;
        }

        .input-group select {
            max-width: calc(100% - 37px);
        }

        .input-group .form-control,
        .input-group-addon,
        .input-group-btn {
            display: unset !important;
        }

        .content-auth {
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            margin-top: 0px !important;
            margin-bottom: 10px !important;

        }

        @media (min-width: 320px) and (max-width: 767px) {
            .content-auth {
                margin-top: 140px !important;

            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .content-auth {
                margin-top: 120px !important;

            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            .content-auth {
                margin-top: 140px !important;

            }
        }
    </style>

    <div class="content content-fixed content-auth py-5">
        <div class="container">
            <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
                <div class="sign-wrapper ">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- <style>
        .cv-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #f8f9fa;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #0056b3;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
            font-size: 2.5em;
        }

        .section-title {
            color: #333;
            font-size: 24px;
            margin: 30px 0 10px;
            border-bottom: 2px solid #0056b3;
            padding-bottom: 5px;
        }

        .personal-info,
        .address-info,
        .education-info,
        .experience-info {
            margin-bottom: 30px;
        }

        .cv-label {
            font-weight: 600;
        }

        .cv-value {
            margin-left: 5px;
        }

        .profile-image {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .profile-image img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 3px solid #0056b3;
        }

        .line-break {
            border-top: 1px solid #ddd;
            margin: 30px 0;
        }

        .info-container {
            display: flex;
            justify-content: space-between;
        }

        .info-section {
            display: flex;
            align-items: center;
            width: 48%;
            margin-bottom: 10px;
        }

        .education-item, .experience-item, .skill-item, .language-item {
            margin-bottom: 20px;
            padding: 10px;
            border-left: 4px solid #0056b3;
            background-color: #ffffff;
            border-radius: 4px;
        }

        .education-item h3, .experience-item h3 {
            font-size: 18px;
            color: #333;
        }

        .skill-item, .language-item {
            font-size: 16px;
            color: #555;
        }

        .skill-item {
            margin-bottom: 20px;
        }

        .skill-bar, .language-bar {
            background-color: #e9ecef;
            border-radius: 5px;
            overflow: hidden;
            height: 10px;
            margin-top: 5px;
            width: 100%;
        }

        .proficiency {
            background-color: #0056b3;
            height: 100%;
            border-radius: 5px;
            transition: width 0.3s ease;
        }

        .language-bar .proficiency {
            background-color: #007bff;
        }

                    </style>
        <div class="cv-template-main">
            <div class="cv-container">

                <div class="profile-image">
                    <img src="{{ asset('assets_frontend/images/resume_profiles/' . $resumeDetails->profile_image ?? 'public/crm/images/p-image.png') }}" alt="Profile Image">
                </div>

                <h2 class="section-title">Personal Information</h2>
                <div class="personal-info">
                    <div class="info-container">
                        <div class="info-section">
                            <p class="cv-label">Full Name:</p>
                            <p class="cv-value">{{ $resumeDetails->full_name ?? 'N/A' }}</p>
                        </div>
                        <div class="info-section">
                            <p class="cv-label">Email:</p>
                            <p class="cv-value">{{ $resumeDetails->email ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="info-container">
                        <div class="info-section">
                            <p class="cv-label">Phone Number:</p>
                            <p class="cv-value">{{ $resumeDetails->phone_number ?? 'N/A' }}</p>
                        </div>
                        <div class="info-section">
                            <p class="cv-label">Gender:</p>
                            <p class="cv-value">{{ $resumeDetails->gender ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <p class="cv-label">About Yourself:</p>
                    <p class="cv-value">{{ $resumeDetails->about_yourself ?? 'N/A' }}</p>
                </div>

                <div class="line-break"></div>

                <h2 class="section-title">Address Details</h2>
                <div class="address-info">
                    <div class="info-container">
                        <div class="info-section">
                            <p class="cv-label">Postal Code:</p>
                            <p class="cv-value">{{ $resumeDetails->postal_code ?? 'N/A' }}</p>
                        </div>
                        <div class="info-section">
                            <p class="cv-label">City:</p>
                            <p class="cv-value">{{ $resumeDetails->city ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="info-container">
                        <div class="info-section">
                            <p class="cv-label">Country:</p>
                            <p class="cv-value">{{ $resumeDetails->country ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <p class="cv-label">Address:</p>
                    <p class="cv-value">{{ $resumeDetails->address ?? 'N/A' }}</p>
                </div>

                <h2 class="section-title">Education</h2>
                <div class="education-info">
                    @foreach ($resumeDetails->education_details as $education)
    <div class="education-item">
                            <h3>{{ $education->degree_name }} - {{ $education->university_name }}</h3>
                            <p>{{ $education->city }}, {{ $education->country }}</p>
                            <p>{{ $education->start_date }} - {{ $education->end_date ? $education->end_date : 'Present' }}</p>
                        </div>
    @endforeach
                </div>

                <h2 class="section-title">Experience</h2>
                <div class="experience-info">
                    @foreach ($resumeDetails->experience_details as $experience)
    <div class="experience-item">
                            <h3>{{ $experience->position }} - {{ $experience->employer }}</h3>
                            <p>{{ $experience->city }}, {{ $experience->country }}</p>
                            <p>{{ $experience->start_date }} - {{ $experience->end_date ? $experience->end_date : 'Present' }}</p>
                        </div>
    @endforeach
                </div>

                <h2 class="section-title">Skills</h2>
                <div class="skills-info">
                    <div class="row">
                        @foreach ($resumeDetails->skills as $skill)
    <div class="col-sm-6">
                                <div class="skill-item">
                                    <p>{{ $skill->name }}</p>
                                    <div class="skill-bar">
                                        <div class="proficiency" style="width: {{ $skill->proficiency === 'Basic' ? '25%' : ($skill->proficiency === 'Intermediate' ? '50%' : '100%') }};"></div>
                                    </div>
                                </div>
                            </div>
    @endforeach
                    </div>
                </div>

                <h2 class="section-title">Languages</h2>
                <div class="languages-info">
                    <div class="row">
                        @foreach ($resumeDetails->languages as $language)
    <div class="col-sm-6">
                                <div class="language-item">
                                    <p><strong>{{ $language->name }}:</strong> {{ $language->proficiency }}</p>
                                    <div class="language-bar">
                                        <div class="proficiency" style="width: {{ $language->proficiency === 'Basic' ? '25%' : ($language->proficiency === 'Intermediate' ? '50%' : '100%') }};"></div>
                                    </div>
                                </div>
                            </div>
    @endforeach
                    </div>
                </div>

            </div>
        </div> -->


        <style>
                        .cv-container {
                            display: none;
                            max-width: 700px;
                            margin: 0 auto;
                            background-color: #ffffff;
                            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
                            overflow: hidden;
                            transition: transform 0.3s;
                            position: relative;
                        }

                        .cv-container:hover {
                            transform: translateY(-5px);
                        }

                        .sidebar {
                            width: 30%;
                            background-color: #f4f4f4;
                            color: #ffffff;
                            padding: 30px 20px;
                            border-radius: 12px 0 0 12px;
                            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.1);
                        }

                        .sidebar h2 {
                            color: #0B56A5;
                            margin-bottom: 20px;
                            font-size: 1.75em;
                            border-bottom: 2px solid #ffffff;
                            padding-bottom: 5px;
                        }

                        .sidebar .skill-item,
                        .sidebar .language-item {
                            margin-bottom: 15px;
                        }

                        .sidebar .skill-bar,
                        .sidebar .language-bar {
                            background-color: #e0e0e0;
                            border-radius: 5px;
                            overflow: hidden;
                            height: 12px;
                            margin-top: 5px;
                        }

                        .proficiency {
                            background-color: #ffffff;
                            height: 100%;
                            border-radius: 5px;
                            transition: width 0.3s ease;
                        }

                        .main-content {
                            width: 70%;
                            padding: 20px;
                        }

                        .profile-image {
                            display: flex;
                            justify-content: center;
                        }

                        .profile-image img {
                            border-radius: 50%;
                            width: 140px;
                            height: 140px;
                            object-fit: cover;
                            border: 4px solid lightgray;
                        }

                        .section-heading {
                            color: #154A97;
                            text-align: left;
                            margin-bottom: 15px;
                            font-weight: 700;
                            position: relative;
                            font-size: 20px;
                            padding-bottom: 5px;
                            border-bottom: 2px solid lightgray;
                            text-transform: uppercase;
                            margin: 0px;
                            font-family: "Inter", sans-serif;
                        }

                        .user-name {
                            color: #154A97;
                            text-align: left;
                            margin-bottom: 15px;
                            font-weight: 700;
                            font-size: 22px;
                            padding-bottom: 5px;
                            text-transform: capitalize;
                            font-family: "Inter", sans-serif;
                            margin: 0px;
                        }

                        .section-sub-heading {
                            color: #154A97 !important;
                            text-align: left;
                            margin-bottom: 10px;
                            font-weight: 700;
                            font-size: 20px;
                            padding-bottom: 5px;
                            margin: 0px;
                            font-family: "Inter", sans-serif;
                            padding-bottom: 3px;
                        }

                        .info-container {
                            display: flex;
                            flex-wrap: wrap;
                            margin-bottom: 15px;
                        }

                        .info-section {
                            width: 100%;
                            display: flex;
                            align-items: center;
                        }

                        .info-label {
                            font-weight: 600;
                            color: #333;
                            margin-bottom: 0px;
                            font-size: 14px;
                        }

                        .info-value {
                            color: #555;
                            font-size: 16px;
                            font-weight: 400;
                            font-family: "Inter", sans-serif;
                            margin: 5px 0px;
                        }

                        .section {
                            margin-top: 30px;
                        }

                        .education-item,
                        .experience-item {
                            padding: 12px 0px;
                        }

                        .education-item h3,
                        .experience-item h3 {
                            font-size: 18px;
                            font-family: "Inter", sans-serif;
                            color: #333;
                        }

                        .footer {
                            text-align: center;
                            margin-top: 20px;
                            font-size: 0.9em;
                            color: #777;
                        }

                        .table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 10px;
                        }

                        .table th,
                        .table td {
                            border: 1px solid #0B56A5;
                            padding: 8px;
                            text-align: left;
                        }

                        .table th {
                            background-color: #0B56A5;
                            color: #ffffff;
                        }

                        .table tr:nth-child(even) {
                            background-color: #f8f9fa;
                        }



                        .view-cv-btn {
                            padding: 10px 20px;
                            background-color: #0B56A5;
                            color: #fff;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                            font-size: 1em;
                            margin: 20px auto;
                            display: block;
                            transition: background-color 0.3s;
                        }

                        .view-cv-btn:hover {
                            background-color: #084f57;
                        }

                        #main-div.hidden {
                            display: none;
                        }



                        .profile-image img {
                            width: 150px;
                            height: 150px;
                            border-radius: 50%;
                            object-fit: cover;
                        }
                        .main-content {
                            width: 70%;
                            padding: 20px;
                        }

                        .info-container {
                            display: flex;
                            justify-content: space-between;
                            margin-bottom: 10px;
                        }


                        /* Footer for Skills */
                        .skills-footer {
                            width: 100%;
                            padding: 20px;
                            background-color: #fff;
                            bottom: 0;
                            display: flex;
                            justify-content: center;
                            border-top: 1px solid #d3d3d3;
                        }

                        .skill-item {
                            margin-right: 20px;
                            position: relative;
                        }

                        .skill-item p {
                            font-size: 16px;
                            margin: 0;
                            padding-right: 10px;
                            color: #000;
                            /* Text color for skills */
                        }

                        .right-border {
                            border-right: 2px solid #d3d3d3;
                            /* Right border for skill items */
                            height: 100%;
                            position: absolute;
                            top: 0;
                            right: 0;
                        }

                        .skills-section {
                            display: flex;
                            align-items: center;
                            flex-wrap: wrap;
                        }



                        .about-main {
                            display: flex;
                            align-items: center;
                        }

                        .profile-main {
                            max-width: 200px;
                            width: 100%;
                        }

                        .details-main {
                            max-width: calc('100% - 200px');
                        }

                        .icon-span {
                            height: 18px;
                            width: 18px;
                            margin-right: 5px;
                            ;
                        }

                        .about-icon {
                            height: 16px;
                            width: 16px;
                            object-fit: contain;
                        }

                        .info-value {
                            display: flex;
                            align-items: center;
                        }

                        .main-section {
                            margin-top: 15px;
                        }

                        p {
                            margin: 5px 0px;
                            font-family: "Inter", sans-serif;
                            /* colo: #6b6b6b; */
                            line-height: 18px;

                            color: #565656;
                        }

                        p strong {
                            color:
                                #565656;
                            font-weight: 600 !important;
                        }

                        .cv-header {
                            padding: 20px 0px;
                        }

                        .cv-icon-main {
                            max-width: max-content;
                            margin-left: auto;
                        }

                        .cv-icon {
                            height: 40px;
                            width: 200px;
                            object-fit: contain;
                        }

                        .dash-span {
                            margin: 0px 8px;
                        }
                        .cv-inner-container{
                            /* border-top: 15px solid #5fb6ea; 
                            border-bottom: 15px solid #5fb6ea;  */
                            padding:20px 40px;
                            position: relative;
                        }
                        /* .cv-inner-container::before, .cv-inner-container::after {
    content: "";
    position: absolute;
    top: 0;
    height: 75px;
    width: 15px;
    background-color: #5fb6ea;
}

.cv-inner-container::before {
    left: 0; 
}

.cv-inner-container::after {
    right: 0; 
}

.cv-container::before, .cv-container::after {
    content: "";
    position: absolute;
    bottom: 0 !important;
    height: 75px;
    width: 15px;
    background-color: #5fb6ea;
}

.cv-container::before {
    left: 0;
}

.cv-container::after {
    right: 0; 
} */
                    </style>

                    <div class="cv-container" id="cvContainer">
                        <!-- Sidebar for Profile and Contact Information -->
                        <div class="cv-inner-container">
                            <div class="cv-header">
                                <div class="cv-icon-main">
                                    <img src="{{ asset('assets_frontend/images/euorpe-logo.png') }}" alt=""
                                        class="cv-icon">
                                </div>
                            </div>

                            <div class="about-main">
                                <div class="profile-main">
                                    <div class="profile-image">
                                        <img id="profile-img"
                                            src="{{ asset('assets_frontend/images/resume_profiles/' . $resumeDetails->profile_image ?? 'public/crm/images/p-image.png') }}"
                                            alt="Profile Image">
                                    </div>
                                </div>

                                <div class="details-main">
                                    <!-- Full Name -->
                                    <h2 class="user-name"> {{ $resumeDetails->full_name ?? 'N/A' }}</h2>

                                    <!-- Personal Information -->
                                    <div class="info-section">
                                        <p class="info-value"><span><strong>Nationality:</strong>
                                                {{ $resumeDetails->nationality ?? 'N/A' }}</span> <span
                                                style="margin-left:10px;"><strong>Date of birth:</strong>
                                                {{ $resumeDetails->birth_date ?? 'N/A' }}</span>
                                        <p>
                                    </div>
                                    <div class="info-section">
                                        <p class="info-value"><span class="icon-span">
                                                <img id="homeIcon"  src="{{ asset('assets_frontend/images/cv-svg/home.png') }}"
                                                    alt="" class="about-icon">

                                            </span><span><strong>Phone number:</strong>
                                                {{ $resumeDetails->phone_number ?? 'N/A' }}</span></span>
                                        <p>
                                    </div>
                                    <div class="info-section">
                                        <p class="info-value">
                                            <span class="icon-span">
                                                <img src="{{ asset('assets_frontend/images/cv-svg/phone.png') }}"
                                                    alt="" class="about-icon">

                                            </span><span><strong>Email Address:</strong> <a href="#"
                                                    style="color:#0B56A5;">
                                                    {{ $resumeDetails->email ?? 'N/A' }}</a></span></span>
                                        <p>
                                    </div>
                                    <div class="info-section">
                                        <p class="info-value"><span class="icon-span">

                                                <img src="{{ asset('assets_frontend/images/cv-svg/location.png') }}"
                                                    alt="" class="about-icon">
                                            </span><span><strong>Home:</strong>
                                                {{ $resumeDetails->address ?? 'N/A' }}</span></span>
                                        <p>
                                    </div>
                                </div>
                            </div>





                            <!-- Experience Details -->
                            <div class="section-wrapper">
                                <div class="section experience-section">
                                    <h2 class="section-heading">Work Experience</h2>
                                    <!-- @foreach ($resumeDetails->experience_details as $experience)
    <div class="experience-item">
                            <h3>{{ $experience->position }} - {{ $experience->employer }}</h3>
                            <p>{{ $experience->start_date }} - {{ $experience->end_date ? $experience->end_date : 'Present' }}</p>
                            <p>{{ $experience->city }}, {{ $experience->country }}</p>
                            <p>{{ $experience->details }}</p>
                        </div>
    @endforeach -->

                                    @foreach ($resumeDetails->experience_details as $experience)
                                        <div class="experience-item">
                                            <h3 class="section-sub-heading">{{ $experience->position }}</h3>
                                            <p><i><strong>{{ $experience->employer }}</strong> </i> <span
                                                    style="color: #A8A8A8;">[{{ $experience->start_date }} -
                                                    {{ $experience->end_date ? $experience->end_date : 'Present' }}]</span>
                                            </p>
                                            <p><strong>City:</strong> {{ $experience->city }} <span
                                                    class="dash-span">|</span> <strong>Country:</strong>
                                                {{ $experience->country }}</p>
                                            <p style="margin-top: 15px;">{{ $experience->details }}</p>
                                        </div>
                                    @endforeach
                                </div>


                            </div>
                            <!-- Education Details -->
                            <div class="section experience-section main-section">
                                <h2 class="section-heading">Education</h2>
                                <!-- @foreach ($resumeDetails->education_details as $education)
    <div class="education-item">
                                <h3>{{ $education->degree_name }} - {{ $education->university_name }}</h3>
                                <p>{{ $education->start_date }} - {{ $education->end_date ? $education->end_date : 'Present' }}</p>
                                <p>{{ $education->city }}, {{ $education->country }}</p>
                                <p>{{ $experience->details }}</p>
                            </div>
    @endforeach -->

                                @foreach ($resumeDetails->education_details as $education)
                                    <div class="experience-item">
                                        <h3 class="section-sub-heading">{{ $education->degree_name }}</h3>
                                        <p><i><strong>{{ $education->university_name }}</strong></i> <span
                                                style="color: #A8A8A8;">[{{ $education->start_date }} -
                                                {{ $education->end_date ? $education->end_date : 'Present' }}]</span></p>
                                        <p><strong>City:</strong> {{ $education->city }} <span class="dash-span">|</span>
                                            <strong>Country:</strong> {{ $education->country }} | <strong>Website:</strong>
                                            <a style="color:#154A97;"
                                                href="https://www.universitiespage.com/">https://www.universitiespage.com/</a>
                                        </p>

                                    </div>
                                @endforeach
                            </div>





                            <div class="section skills-section main-section" style="display: unset;">
                                <h2 class="section-heading" style="min-width:100%; display:block;">Language Skills</h2>
                                <!-- @foreach ($resumeDetails->languages as $language)
    <div class="skill-item">
                                <p>{{ $language->name }}</p>
                                <div class="right-border"></div>
                            </div>
    @endforeach -->
                                <p><strong>Mother Language</strong> Urdu</p><br>
                                <p><strong>Other language(s):</strong></p>
                                <div class="experience-item">
                                    <h3 class="section-sub-heading">English</h3>
                                    <p>
                                        @php
                                            $hasProficiency = false;
                                            foreach ($resumeDetails->languages as $language) {
                                                if (
                                                    !empty($language->listening) ||
                                                    !empty($language->reading) ||
                                                    !empty($language->spoken_interaction) ||
                                                    !empty($language->spoken_production) ||
                                                    !empty($language->writing)
                                                ) {
                                                    $hasProficiency = true;
                                                    break;
                                                }
                                            }
                                        @endphp

                                        @if ($hasProficiency)
                                            @foreach ($resumeDetails->languages as $language)
                                                <span class="language-type"
                                                    style="margin-right: 10px; margin-bottom: 5px; display: inline-block;">
                                                    <strong> LISTENING</strong> {{ $language->listening }} </span>
                                                <span class="language-type"
                                                    style="margin-right: 10px; margin-bottom: 5px; display: inline-block;"><strong>READING</strong>
                                                    {{ $language->reading }}</span>
                                                <span class="language-type"
                                                    style="margin-right: 10px; margin-bottom: 5px; display: inline-block;">
                                                    <strong>WRITING</strong> {{ $language->writing }} </span>
                                                <span class="language-type"
                                                    style="margin-right: 10px; margin-bottom: 5px; display: inline-block;"><strong>SPOKEN
                                                        PRODUCTION</strong> {{ $language->spoken_production }} </span>
                                                <span class="language-type"
                                                    style="margin-right: 10px; margin-bottom: 5px; display: inline-block;"><strong>SPOKEN
                                                        INTERACTION</strong> {{ $language->spoken_interaction }} </span>
                                    </p>
                                    @endforeach
                                    @endif

                                </div>
                            </div>

                            <div class="section skills-section main-section">
                                <h2 class="section-heading" style="min-width:100%; display:block;">DIGITAL SKILLS</h2>

                                <div class="experience-item">

                                    <p>
                                        @if (count($resumeDetails->skills) > 0)
                                            @foreach ($resumeDetails->skills as $skill)
                                                <span class="language-type"
                                                    style="margin-right: 7px; margin-left: 7px; margin-bottom: 5px; display: inline-block;">{{ $skill->name }}</span>
                                                /
                                            @endforeach
                                        @else
                                            <span class="language-type"
                                                style="margin-right: 7px; margin-bottom: 5px; display: inline-block;">Microsoft
                                                Office</span> /
                                            <span class="language-type"
                                                style="margin-right: 7px; margin-left: 7px; margin-bottom: 5px; display: inline-block;">Microsoft
                                                Excel</span> /
                                            <span class="language-type"
                                                style="margin-right: 7px; margin-left: 7px; margin-bottom: 5px; display: inline-block;">Microsoft
                                                Word</span> /
                                            <span class="language-type"
                                                style="margin-right: 7px; margin-left: 7px; margin-bottom: 5px; display: inline-block;">Microsoft
                                                PowerPoint</span>
                                        @endif

                                    </p>
                                </div>
                            </div>

                            <div class="section skills-section main-section" style="display: unset;">
                                <h2 class="section-heading" style="min-width:100%; display:block;">DRIVING LICENCE</h2>
                                <div class="experience-item">
                                    @if (count($resumeDetails->driving_licence) > 0)
                                        @foreach ($resumeDetails->driving_licence as $licence)
                                            <span class="language-type"
                                                style="margin-right: 10px; margin-bottom: 5px; display: inline-block;">
                                                <strong>Driving Licence:</strong> {{ $licence->driving_licence }}
                                            </span><br>
                                        @endforeach
                                    @else
                                        <span class="language-type"
                                            style="margin-right: 10px; margin-bottom: 5px; display: inline-block;">
                                            <strong>Driving Licence:</strong> A1</span><br>
                                        <span class="language-type"
                                            style="margin-right: 10px; margin-bottom: 5px; display: inline-block;">
                                            <strong>Driving Licence:</strong> B1</span><br>
                                    @endif
                                </div>
                            </div>

                            <div class="section skills-section main-section" style="display: unset;">
                                <h2 class="section-heading" style="min-width:100%; display:block;">HOBBIES AND INTERESTS
                                </h2>
                                <div class="experience-item">
                                    @if (count($resumeDetails->hobbies_and_interest) > 0)
                                        @foreach ($resumeDetails->hobbies_and_interest as $hobby)
                                            <span class="language-type"
                                                style="margin-right: 10px; margin-bottom: 5px; display: inline-block;">
                                                <strong>{{ $hobby->hobbies }}</strong> </span><br><br>
                                        @endforeach
                                    @else
                                        <span class="language-type"
                                            style="margin-right: 10px; margin-bottom: 5px; display: inline-block;">
                                            <strong>Gardening</strong> Write here the description </span><br><br>
                                        <span class="language-type"
                                            style="margin-right: 10px; margin-bottom: 5px; display: inline-block;"><strong>Novels</strong></span><br><br>
                                        <span class="language-type"
                                            style="margin-right: 10px; margin-bottom: 5px; display: inline-block;"><strong>Football
                                            </strong></span>
                                    @endif

                                </div>
                            </div>


                            <div class="section skills-section main-section" style="display: unset;">
                                <h2 class="section-heading" style="min-width:100%; display:block;">HONOURS AND AWARDS</h2>
                                @if (count($resumeDetails->awards) > 0)
                                    @foreach ($resumeDetails->awards as $award)
                                        <div class="experience-item">
                                            <p>
                                                <span class="language-type"
                                                    style="margin-right: 10px; margin-bottom: 5px; display: inline-block;"><span
                                                        style="color: #A8A8A8;">[ {{ $award->awarded_date }} ]
                                                        {{ $award->awarded_uni_name }}
                                                    </span></span><br>
                                                <span class="language-type"
                                                    style="margin-right: 10px; margin-bottom: 5px; display: inline-block;"><strong>{{ $award->awarded_title }}</strong></span>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="experience-item">
                                        <p>
                                            <span class="language-type"
                                                style="margin-right: 10px; margin-bottom: 5px; display: inline-block;"><span
                                                    style="color: #A8A8A8;">[ 17/05/2022 ] University of Sargodha
                                                </span></span><br>
                                            <span class="language-type"
                                                style="margin-right: 10px; margin-bottom: 5px; display: inline-block;"><strong>Best
                                                    Player of University Team</strong></span>
                                    </div>
                                    <div class="experience-item">
                                        <p>
                                            <span class="language-type"
                                                style="margin-right: 10px; margin-bottom: 5px; display: inline-block;"><span
                                                    style="color: #A8A8A8;">[ 17/05/2022 ] University of Sargodha
                                                </span></span><br>
                                            <span class="language-type"
                                                style="margin-right: 10px; margin-bottom: 5px; display: inline-block;"><strong>Best
                                                    Player of University Team</strong></span>
                                    </div>
                                @endif

                            </div>

                            <div class="section skills-section main-section" style="display: unset;">
                                <h2 class="section-heading" style="min-width:100%; display:block;">PROJECTS</h2>

                                @if (count($resumeDetails->projects) > 0)
                                    @foreach ($resumeDetails->projects as $project)
                                        <div class="experience-item">
                                            <p>
                                                <span class="language-type"
                                                    style="margin-right: 10px; margin-bottom: 5px; display: inline-block;"><span
                                                        style="color: #A8A8A8;">[ {{ $project->project_start_date }} -
                                                        {{ $project->project_end_date != null ? $project->project_end_date : 'Currently Working' }}
                                                        ] University of Sargodha
                                                    </span></span><br>
                                                <span class="language-type"
                                                    style="margin-right: 10px; margin-bottom: 5px; display: inline-block;"><strong>{{ $project->project_title }}</strong></span>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="experience-item">
                                        <p>
                                            <span class="language-type"
                                                style="margin-right: 10px; margin-bottom: 5px; display: inline-block;"><span
                                                    style="color: #A8A8A8;">[ 17/05/2022 ] University of Sargodha
                                                </span></span><br>
                                            <span class="language-type"
                                                style="margin-right: 10px; margin-bottom: 5px; display: inline-block;"><strong>Best
                                                    Player of University Team</strong></span>
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                    <button  class="btn btn-info mt-4" type="button" id="downloadCv" style="display: none;">Download Cv</button>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.3.4/purify.min.js"></script>

                    <!-- Include jsPDF library -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

                    <!-- Include html2canvas library -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
                    <script>
document.getElementById('downloadCv').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default action

    // Create a new jsPDF instance
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('p', 'mm', 'a4');

    // Fixed height and width for each page
    const pageHeight = doc.internal.pageSize.height;
    const pageWidth = doc.internal.pageSize.width;

    // Clone the CV container and sanitize the content
    const clonedCvContainer = document.getElementById('cvContainer').cloneNode(true);
    clonedCvContainer.style.boxShadow = 'none';
    clonedCvContainer.style.transform = 'none';
    clonedCvContainer.style.margin = '0'; // Remove any margin
    clonedCvContainer.style.padding = '0'; // Remove any padding
    clonedCvContainer.style.width = `${pageWidth - 10}mm`; // Subtracting 10mm for margin

    // Function to add content to the PDF
    function addContentToPDF(content) {
        const sanitizedContent = DOMPurify.sanitize(content);

        doc.html(sanitizedContent, {
            callback: function(doc) {
                const totalPages = doc.internal.getNumberOfPages();

                // Loop through each page to add borders
                for (let i = 1; i <= totalPages; i++) {
                    doc.setPage(i);
                    const borderWidth = 3; // Width of left and right borders
                    const borderHeight = 20; // Height above and below
                    const topBorderHeight = 3; // Height of the top border
                    const bottomBorderHeight = 3; // Height of the bottom border

                    doc.setFillColor(95, 182, 234);

                    // Draw left border
                    doc.rect(0, 0, borderWidth, borderHeight, 'F'); // Top left corner
                    doc.rect(0, pageHeight - borderHeight, borderWidth, borderHeight, 'F'); // Bottom left corner

                    // Draw right border
                    doc.rect(pageWidth - borderWidth, 0, borderWidth, borderHeight, 'F'); // Top right corner
                    doc.rect(pageWidth - borderWidth, pageHeight - borderHeight, borderWidth, borderHeight, 'F'); // Bottom right corner

                    // Draw top border
                    doc.rect(0, 0, pageWidth, topBorderHeight, 'F'); // Top border

                    // Draw bottom border
                    doc.rect(0, pageHeight - bottomBorderHeight, pageWidth, bottomBorderHeight, 'F'); // Bottom border
                }

                // Save the PDF
                doc.save('Talha_CV.pdf');
            },
            x: 0, // Set x to 0 to align content to the left
            y: 0, // Adjust y if needed
            width: pageWidth - 10, // Adjust width to fit the page width with margin
            windowWidth: 650,
            autoPaging: true
        });
    }

    // Ensure the profile image is loaded before rendering
    const profileImg = clonedCvContainer.querySelector('img#profile-img');

    if (profileImg && profileImg.complete) {
        addContentToPDF(clonedCvContainer.outerHTML);
    } else {
        profileImg.onload = function() {
            addContentToPDF(clonedCvContainer.outerHTML);
        };
    }

});
</script>




                    <button class="view-cv-btn" id="viewCvBtn" onclick="downloadPDF()">View CV</button>


                    <div class="wd-100p" id="main-div">
                        <div class="top-heading-main"
                            style="background: #0b6d76 !important; padding: 7px 0px; margin-bottom: 30px; border-radius: 20px;">
                            <h4 class="tx-color-01 mg-b-5 mb-0 text-center"
                                style="text-transform: capitalize; color: #fff;">Edit Here Your Information</h4>
                        </div>


                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                      
                        <form id="resumeForm" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="cv-block">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="tx-color-01 mg-b-5 mb-4 text-center">Personal information</h4>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="image-perview-main">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type="file" name="profile_image" id="imageUpload"
                                                        accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview"
                                                        style="background-image: url('{{ asset('assets_frontend/images/resume_profiles/' . $resumeDetails->profile_image ?? 'public/crm/images/p-image.png') }}');">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Full Name</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter Full Name"
                                                name="full_name" autocomplete="off"
                                                value="{{ $resumeDetails->full_name ?? '' }}">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-sm-6 mb-3">
                                                    <div class="input-group">
                                                      <div class="input-group-prepend">
                                                        <div class="input-group-text input-icon student-login-icon">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                      </div>
                                                      <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name" autocomplete="off" >
                                                    
                                                      <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                                        <span v-text="error"></span>
                                                      </div>
                                                    </div>
                                                  </div> -->

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Email</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                            </div>
                                            <input type="email" class="form-control" placeholder="Enter Your Email"
                                                name="email" autocomplete="off"
                                                value="{{ $resumeDetails->email ?? '' }}">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Phone Number</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control"
                                                placeholder="Enter Your Phone Number" name="phone_number"
                                                autocomplete="off" value="{{ $resumeDetails->phone_number ?? '' }}">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Gender</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <select name="gender" class="form-control w100p country-select">
                                                <option value="">--Select Gender --</option>
                                                <option value="Male"
                                                    {{ $resumeDetails->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female"
                                                    {{ $resumeDetails->gender == 'Female' ? 'selected' : '' }}>Female
                                                </option>
                                                <option value="Other"
                                                    {{ $resumeDetails->gender == 'Other' ? 'selected' : '' }}>Other
                                                </option>
                                            </select>
                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Date Of Birth</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="date" class="form-control" name="birth_date"
                                                id="birth_date_filter" value="{{ $resumeDetails->birth_date ?? '' }}">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label for="" class="resume-form-label">Nationality</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-flag"></i>
                                                </div>
                                            </div>
                                            <select name="nationality[]" class="form-control w100p country-select">
                                                @foreach ($countriesArray as $country)
                                                    <option value="{{ $country }}"
                                                        {{ $country == $resumeDetails['nationality'] ? 'selected' : '' }}>
                                                        {{ $country }}</option>
                                                @endforeach

                                            </select>
                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mb-4">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">About Yourself</label>
                                            <!-- <div class="input-group-prepend">
                                                        <div class="input-group-text input-icon student-login-icon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                      </div> -->
                                            <textarea class="form-control" name="about_yourself" cols="12" rows="5" id=""
                                                placeholder="Enter Your Details">{{ $resumeDetails->about_yourself ?? '' }}</textarea>

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- address details start -->
                            <div class="cv-block">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="tx-color-01 mg-b-5 mb-4 text-center">Address Details</h4>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="" class="resume-form-label">Postal Code</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" placeholder="Enter Postal Code"
                                                name="postal_code" autocomplete="off"
                                                value="{{ $resumeDetails->postal_code ?? '' }}">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">City</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-home"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter City"
                                                name="city" autocomplete="off"
                                                value="{{ $resumeDetails->city ?? '' }}">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Country</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-flag"></i>
                                                </div>
                                            </div>
                                            <select name="country" class="form-control w100p country-select">
                                                @foreach ($countriesArray as $country)
                                                    <option value="{{ $country }}"
                                                        {{ $country == $resumeDetails['country'] ? 'selected' : '' }}>
                                                        {{ $country }}</option>
                                                @endforeach

                                            </select>
                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-12 mb-4">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Address</label>
                                            <textarea class="form-control" name="address" cols="12" rows="5" id=""
                                                placeholder="Enter Your Address">{{ $resumeDetails->address ?? '' }}</textarea>
                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- address details end -->



                            <!-- education details start -->
                            <div class="cv-block">
                                <div class="col-sm-12">
                                    <h4 class="tx-color-01 mg-b-5 mb-4 text-center">Educations Details</h4>
                                </div>
                                @php $count = 0; @endphp
                                @foreach ($resumeDetails->education_details as $index => $education)
                                    @php ++$count; @endphp
                                    <div class="row education-section-main" id="education-row{{ $count }}">
                                        <div class="col-sm-6 mb-3">
                                            <div class="input-group">
                                                <label for="" class="resume-form-label">Degree Name</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text input-icon student-login-icon">
                                                        <i class="fa fa-book"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter Degree"
                                                    name="education_degree_name[]" autocomplete="off"
                                                    value="{{ $education->degree_name }}">

                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <div class="input-group">
                                                <label for="" class="resume-form-label">university Name</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text input-icon student-login-icon">
                                                        <i class="fa fa-building"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter Degree"
                                                    name="education_university_name[]" autocomplete="off"
                                                    value="{{ $education->university_name }}">

                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="" class="resume-form-label">City</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text input-icon student-login-icon">
                                                        <i class="fa fa-home"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter City"
                                                    name="education_city[]" autocomplete="off"
                                                    value="{{ $education->city }}">

                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <div class="input-group">
                                                <label for="" class="resume-form-label">Country</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text input-icon student-login-icon">
                                                        <i class="fa fa-flag"></i>
                                                    </div>
                                                </div>
                                                <select name="education_country[]"
                                                    class="form-control w100p country-select">
                                                    @foreach ($countriesArray as $country)
                                                        <option value="{{ $country }}"
                                                            {{ $country == $education->country ? 'selected' : '' }}>
                                                            {{ $country }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="" class="resume-form-label">Total Marks/CGPA</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text input-icon student-login-icon">
                                                        <i class="fa fa-graduation-cap"></i>
                                                    </div>
                                                </div>
                                                <input type="number" class="form-control" placeholder="Enter marks"
                                                    name="education_total_marks[]" autocomplete="off"
                                                    value="{{ $education->total_marks }}">

                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <div class="input-group">
                                                <label for="" class="resume-form-label">Start Date</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text input-icon student-login-icon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                                <input type="date" class="form-control" placeholder="Enter Degree"
                                                    name="education_start_date[]" autocomplete="off"
                                                    value="{{ $education->start_date }}">

                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-sm-6 mb-3" id="end-date-education-container">
                                            <div class="input-group">
                                                <label for="" class="resume-form-label">End Date</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text input-icon student-login-icon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                                <input type="date" class="form-control education-end-date-input"
                                                    placeholder="Enter Degree" name="education_end_date[]"
                                                    autocomplete="off" value="{{ $education->end_date }}"
                                                    {{ $education->education_present == 1 ? 'readonly' : '' }}>

                                                <input type="hidden" class="form-control education-end-date"
                                                    id="present-education-hidden-field" placeholder="Enter Degree"
                                                    name="education_present[]" autocomplete="off" value={{ $education->education_present }}>

                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-sm-6 mb-3">
                                            <div class="input-group">
                                                <label for="" class="resume-form-label">Institute Link </label>

                                                <input type="tyest" class="form-control"
                                                    placeholder="Enter University Website Link"
                                                    value="{{ $education->university_web_link }}"
                                                    name="education_university_web_link[]" autocomplete="off">

                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-12 my-3">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox"
                                                    class="custom-control-input current-education-present-button"
                                                    id="current-education-present-button{{ $count }}"
                                                    data-current_count="{{ $count }}"
                                                    {{ $education->education_present == 1 ? 'checked' : '' }}>
                                                <label class="custom-control-label"
                                                    for="current-education-present-button{{ $count }}">Present</label>
                                            </div>
                                        </div>
                                        <!-- <div class="col-sm-12 mb-4">
                            <div class="form-check form-switch">
                              <input class="form-check-input toggle-switch" name="education_currently_studying[]" type="checkbox"
                                id="flexSwitchCheckDefault">
                            </div>
                          </div> -->

                                        <div class="col-sm-12 mb-4">
                                            <div class="input-group">
                                                <label for="" class="resume-form-label">Details</label>
                                                <textarea class="form-control" name="education_details[]" cols="12" rows="5" id=""
                                                    placeholder="Enter Education Details">{{ $education->details }}</textarea>
                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="education-append_container">
                                </div>
                                <button type="button" class="btn btn-primary" id="addMoreEducation"
                                    data-current_count="{{ $count }}"><i class="fa fa-plus"></i></button>
                            </div>
                            <!-- education details end -->











                            <!-- experience details start -->
                            <div class="cv-block">
                                <div class="col-sm-12">
                                    <h4 class="tx-color-01 mg-b-5 mb-4 text-center">Experience Details</h4>
                                </div>
                                @php $count = 0; @endphp
                                @foreach ($resumeDetails->experience_details as $index => $experience)
                                    @php ++$count; @endphp
                                    <div class="row education-section" id="experience-row{{ $count }}">
                                        <div class="col-sm-6 mb-3">
                                            <div class="input-group">
                                                <label for="" class="resume-form-label">Position</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text input-icon student-login-icon">
                                                        <i class="fa fa-book"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Position Name"
                                                    name="experience_position[]" autocomplete="off"
                                                    value="{{ $experience->position }}">

                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <div class="input-group">
                                                <label for="" class="resume-form-label">Employer</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text input-icon student-login-icon">
                                                        <i class="fa fa-building"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Company Name"
                                                    name="experience_employer[]" autocomplete="off"
                                                    value="{{ $experience->employer }}">

                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="" class="resume-form-label">City</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text input-icon student-login-icon">
                                                        <i class="fa fa-home"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter City"
                                                    name="experience_city[]" autocomplete="off"
                                                    value="{{ $experience->city }}">

                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <div class="input-group">
                                                <label for="" class="resume-form-label">Country</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text input-icon student-login-icon">
                                                        <i class="fa fa-flag"></i>
                                                    </div>
                                                </div>
                                                <select name="experience_country[]"
                                                    class="form-control w100p country-select">
                                                    @foreach ($countriesArray as $country)
                                                        <option value="{{ $country }}"
                                                            {{ $country == $experience->country ? 'selected' : '' }}>
                                                            {{ $country }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <div class="input-group">
                                                <label for="" class="resume-form-label">Start Date</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text input-icon student-login-icon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                                <input type="date" class="form-control" placeholder="Enter Degree"
                                                    name="experience_start_date[]" autocomplete="off"
                                                    value="{{ $experience->start_date }}">

                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3" id="end-date-experience-container">
                                            <div class="input-group">
                                                <label for="" class="resume-form-label">End Date</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text input-icon student-login-icon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                                <input type="date" class="form-control end-date"
                                                    placeholder="Enter Degree" name="experience_end_date[]"
                                                    autocomplete="off" value="{{ $experience->end_date }}"
                                                    {{ $experience->experience_present == 1 ? 'readonly' : '' }}>
                                                <input type="hidden" class="form-control end-date"
                                                    id="present-hidden-field" placeholder="Enter Degree"
                                                    name="experience_present[]" autocomplete="off"
                                                    value={{ $experience->experience_present }}>

                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-sm-12 my-3">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox"
                                                    class="custom-control-input current-experience-present-button"
                                                    id="current-experience-present-button{{ $count }}"
                                                    data-current_count="{{ $count }}"
                                                    {{ $experience->experience_present == 1 ? 'checked' : '' }}>
                                                <label class="custom-control-label"
                                                    for="current-experience-present-button{{ $count }}">Present</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-4">
                                            <div class="input-group">
                                                <label for="" class="resume-form-label">Experience
                                                    Details</label>
                                                <textarea class="form-control" name="experience_details[]" cols="12" rows="5" id=""
                                                    placeholder="Enter Experience Details">{{ $experience->details }}</textarea>
                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                                <div id="experience-append_container">

                                </div>
                                <button type="button" class="btn btn-primary" id="addMoreexperience"
                                    data-current_count="{{ $count }}"><i class="fa fa-plus"></i></button>
                            </div>

                            <!-- experience details end -->

                            <!-- skills details start -->
                            <div class="cv-block">
                                <div class="col-sm-12">
                                    <h4 class="tx-color-01 mg-b-5 mb-4 text-center">Add Skills</h4>
                                </div>
                                <div class="row education-section">
                                    @foreach ($resumeDetails->skills as $index => $skill)
                                        <div class="col-sm-6 mb-3">
                                            <div class="input-group">
                                                <label for="" class="resume-form-label">Skill Name</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text input-icon student-login-icon">
                                                        <i class="fa fa-book"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter Skill"
                                                    name="skill_name[]" autocomplete="off" value="{{ $skill->name }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <div class="input-group">
                                                <label for="" class="resume-form-label">Skill
                                                    Perfoessionalim</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text input-icon student-login-icon">
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <select name="skill_perofessionlism[]"
                                                    class="form-control w100p country-select">
                                                    <option value="">--Select Skill --</option>
                                                    <option value="Basic"
                                                        {{ $skill->proficiency == 'Basic' ? 'selected' : '' }}>Basic
                                                    </option>
                                                    <option value="Intermediate"
                                                        {{ $skill->proficiency == 'Intermediate' ? 'selected' : '' }}>
                                                        Intermediate</option>
                                                    <option value="Expert"
                                                        {{ $skill->proficiency == 'Expert' ? 'selected' : '' }}>Expert
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div id="skills-append_container">
                                    <div class="row skills-section">

                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="addMoreskills"><i
                                        class="fa fa-plus"></i></button>
                            </div>
                            <!-- skills details end -->


                            {{-- {{ dd($resumeDetails->languages[0]->name) }} --}}
                            <!-- languages details start -->
                            <div class="cv-block">
                                <div class="col-sm-12">
                                    <h4 class="tx-color-01 mg-b-5 mb-4 text-center">Add Languages</h4>
                                </div>
                                <div class="row">



                                    {{-- {{ dd($resumeDetails->languages[0]) }} --}}


                                    
                                    {{-- @foreach ($resumeDetails->languages as $index => $language) --}}
                                        {{-- @if ($$resumeDetails->languages[0]->name === 'English') --}}
                                            <!-- Check if the language is English -->
                                            <div class="col-sm-6 mb-3">
                                                <div class="input-group">
                                                    <label for="" class="resume-form-label">Language
                                                        Name</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text input-icon student-login-icon">
                                                            <i class="fa fa-language"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Language" name="language_name[]"
                                                        autocomplete="off" value="{{ $resumeDetails->languages[0]->name }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="input-group">
                                                    <label for="" class="resume-form-label">Language
                                                        Type</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text input-icon student-login-icon">
                                                            <i class="fa fa-book"></i>
                                                        </div>
                                                    </div>
                                                    <select name="language_type[]"
                                                        class="form-control w100p language-professionalism"
                                                        id="language-professionalism">
                                                        <option value="">--Select Language Type--</option>
                                                        <option value="IELTS"
                                                            {{ $resumeDetails->languages[0]->cirtificate_type == 'IELTS' ? 'selected' : '' }}>
                                                            IELTS</option>
                                                        <option value="PTE"
                                                            {{ $resumeDetails->languages[0]->cirtificate_type  == 'PTE' ? 'selected' : '' }}>
                                                            PTE</option>
                                                        <option value="TOEFL iBT"
                                                            {{ $resumeDetails->languages[0]->cirtificate_type  == 'TOEFL iBT' ? 'selected' : '' }}>
                                                            TOEFL iBT</option>
                                                        <option value="TOEFL CBT"
                                                            {{ $resumeDetails->languages[0]->cirtificate_type  == 'TOEFL CBT' ? 'selected' : '' }}>
                                                            TOEFL CBT</option>
                                                        <option value="TOEFL PBT"
                                                            {{ $resumeDetails->languages[0]->cirtificate_type  == 'TOEFL PBT' ? 'selected' : '' }}>
                                                            TOEFL PBT</option>
                                                        <option value="Duolingo"
                                                            {{ $resumeDetails->languages[0]->cirtificate_type  == 'Duolingo' ? 'selected' : '' }}>
                                                            Duolingo</option>
                                                        <option value="Language Cert International ESOL"
                                                            {{ $resumeDetails->languages[0]->cirtificate_type  == 'Language Cert International ESOL' ? 'selected' : '' }}>
                                                            Language Cert International ESOL</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <div class="row" id="proficiency-container">
                                                    @php
                                                        $proficiencies = [
                                                            'listening',
                                                            'reading',
                                                            'spoken_interaction',
                                                            'spoken_production',
                                                            'writing',
                                                        ];
                                                        $levels = [
                                                            'IELTS' => [
                                                                ['level' => 'B2', 'score' => '5.5-6.5'],
                                                                ['level' => 'C1', 'score' => '7.0-8.0'],
                                                                ['level' => 'C2', 'score' => '8.5-9.0'],
                                                            ],
                                                            'PTE' => [
                                                                ['level' => 'B2', 'score' => '59-75'],
                                                                ['level' => 'C1', 'score' => '76-84'],
                                                                ['level' => 'C2', 'score' => '85-90'],
                                                            ],
                                                            'TOEFL iBT' => [
                                                                ['level' => 'B2', 'score' => '87-109'],
                                                                ['level' => 'C1', 'score' => '110-120'],
                                                            ],
                                                            'TOEFL CBT' => [
                                                                ['level' => 'B2', 'score' => '227-269'],
                                                                ['level' => 'C1', 'score' => '270-300'],
                                                            ],
                                                            'TOEFL PBT' => [
                                                                ['level' => 'B2', 'score' => '567-636'],
                                                                ['level' => 'C1', 'score' => '637-677'],
                                                            ],
                                                            'Duolingo' => [
                                                                ['level' => 'B2', 'score' => '95-125'],
                                                                ['level' => 'C1', 'score' => '130-155'],
                                                                ['level' => 'C2', 'score' => '160'],
                                                            ],
                                                            'Language Cert International ESOL' => [
                                                                ['level' => 'C2', 'score' => 'Mastery'],
                                                                ['level' => 'C1', 'score' => 'Expert'],
                                                                ['level' => 'B2', 'score' => 'Communicator'],
                                                            ],
                                                        ];
                                                    @endphp

                                                    {{-- {{ dd(isset($language)) }} --}}

{{-- 
@foreach ($resumeDetails->languages[1] as $key => $value) {
    {{ $key }}
 }
 
 
 @endforeach
  --}}
 
 

                                                    @if (isset($language))
                                                        @foreach ($proficiencies as $skill)
                                                            <div class="col-sm-6 mb-3">
                                                                <label
                                                                    class="resume-form-label">{{ ucfirst(str_replace('_', ' ', $skill)) }}</label>
                                                                <select class="form-control"
                                                                    name="language_{{ $skill }}[]">
                                                                    <option value="">Select Level</option>
                                                

                                                                    @if (isset($levels[$language->cirtificate_type]))

                                                                        <!-- Check for correct property -->
                                                                        @foreach ($levels[$language->cirtificate_type] as $level)

                                                                        {{ $level }}
                                                                            <option value="{{ $level['level'] }}"
                                                                                {{ $level['level'] == $level['listening'] ? 'selected' : '' }}
                                                                                {{ isset($language->$skill) && $language->$skill === $level['level'] ? 'selected' : '' }}>
                                                                                {{ $level['level'] }}
                                                                                ({{ $level['score'] }})
                                                                            </option>
                                                                        @endforeach
                                                                    @else
                                                                        <option value="" disabled>No levels
                                                                            available</option> <!-- Fallback option -->
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        {{-- @endif --}}
                                    {{-- @endforeach --}}
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-12 mb-3">
                                        <h5>Other Languages</h5>
                                    </div>
                                    @foreach ($resumeDetails->other_languages_data as $index => $language)
                                        @if ($language->name !== 'English')
                                            <!-- Display non-English languages here -->
                                            <div class="col-sm-6 mb-3">
                                                <div class="input-group">
                                                    <label for="" class="resume-form-label">Language
                                                        Name</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text input-icon student-login-icon">
                                                            <i class="fa fa-language"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Language" name="other_language_name[]"
                                                        autocomplete="off" value="{{ $language->name }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="input-group">
                                                    <label for="" class="resume-form-label">Language
                                                        Proficiency</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text input-icon student-login-icon">
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <select name="other_language_professionalism[]"
                                                        class="form-control w100p country-select">
                                                        <option value="Basic"
                                                            {{ $language->proficiency == 'Basic' ? 'selected' : '' }}>
                                                            Basic</option>
                                                        <option value="Intermediate"
                                                            {{ $language->proficiency == 'Intermediate' ? 'selected' : '' }}>
                                                            Intermediate</option>
                                                        <option value="Expert"
                                                            {{ $language->proficiency == 'Expert' ? 'selected' : '' }}>
                                                            Expert</option>
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>


                                <div id="languages-append_container">
                                    <div class="row languages-section">

                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="addMorelanguages"><i
                                        class="fa fa-plus"></i></button>
                            </div>



                            <!-- Driving Licence start -->
                            <div class="cv-block">
                                <div class="col-sm-12">
                                    <h4 class="tx-color-01 mg-b-5 mb-4 text-center">Add Driving Licence </h4>
                                </div>

                                <div class="row education-section" id="licence-append-container">

                                    @if (count($resumeDetails->driving_licence) > 0)
                                        @foreach ($resumeDetails->driving_licence as $licence)
                                            <div class="col-sm-6 mb-3">
                                                <div class="input-group">
                                                    <label for="" class="resume-form-label">Select Licence
                                                        Cateogory</label>

                                                    <select id="language_professionalism" name="driving_licence[]"
                                                        class="form-control w100p country-select" required>
                                                        <option value="LTV"
                                                            {{ $licence->driving_licence == 'LTV' ? 'selected' : '' }}>LTV
                                                        </option>
                                                        <option value="HTV"
                                                            {{ $licence->driving_licence == 'HTV' ? 'selected' : '' }}>HTV
                                                        </option>
                                                        <option value="Moter Car & Moter Bike"
                                                            {{ $licence->driving_licence == 'Moter Car & Moter Bike' ? 'selected' : '' }}>
                                                            Moter Car & Moter Bike</option>
                                                    </select>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif




                                </div>

                                <button type="button" class="btn btn-primary" id="add-more-driving-licence"><i
                                        class="fa fa-plus"></i></button>
                            </div>

                            {{-- end of Licence section --}}


                            <!-- Hobies start -->
                            <div class="cv-block">
                                <div class="col-sm-12">
                                    <h4 class="tx-color-01 mg-b-5 mb-4 text-center">Add Hobbies And Interest </h4>
                                </div>

                                <div class="row education-section" id="hobbie-append-container">
                                    @if (count($resumeDetails->hobbies_and_interest) > 0)
                                        @foreach ($resumeDetails->hobbies_and_interest as $hobby)
                                            <div class="col-sm-6 mb-3">
                                                <div class="input-group">
                                                    <label for="" class="resume-form-label">Enter Hobbie</label>

                                                    <input type="text" class="form-control"
                                                        value="{{ $hobby->hobbies }}"
                                                        placeholder="Enter Hobbie or interes" name="hobbies[]">

                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>

                                <button type="button" class="btn btn-primary" id="add-more-hobbies"><i
                                        class="fa fa-plus"></i></button>
                            </div>

                            {{-- end of hobbies section --}}




                            {{-- Faizan Honer and rewards --}}


                            <div class="cv-block">
                                <div class="col-sm-12">
                                    <h4 class="tx-color-01 mg-b-5 mb-4 text-center">Honours and Awards</h4>
                                </div>

                                @if (count($resumeDetails->awards) > 0)
                                    @foreach ($resumeDetails->awards as $award)
                                        <div class="row education-section">

                                            <div class="col-sm-6 mb-3">
                                                <div class="input-group">
                                                    <label for="" class="resume-form-label">Awarded Date</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text input-icon student-login-icon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                    <input type="date" class="form-control" placeholder="Awarded Date"
                                                        name="Awarded_date[]" value="{{ $award->awarded_date }}"
                                                        autocomplete="off">

                                                    <div class="reg-error-msg" v-if="errors.country"
                                                        v-for="error in errors.country">
                                                        <span v-text="error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="input-group">
                                                    <label for="" class="resume-form-label">University
                                                        Name</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text input-icon student-login-icon">
                                                            <i class="fa fa-book"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="University Name"
                                                        value="{{ $award->awarded_uni_name }}" name="awarded_uni_name[]"
                                                        autocomplete="off">

                                                    <div class="reg-error-msg" v-if="errors.country"
                                                        v-for="error in errors.country">
                                                        <span v-text="error"></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-12 mb-3">
                                                <div class="input-group">
                                                    <label for="" class="resume-form-label">Award Title</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text input-icon student-login-icon">
                                                            <i class="fa fa-building"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Award Title"
                                                        value="{{ $award->awarded_title }}" name="Awarded_title[]"
                                                        autocomplete="off">

                                                    <div class="reg-error-msg" v-if="errors.country"
                                                        v-for="error in errors.country">
                                                        <span v-text="error"></span>
                                                    </div>
                                                </div>
                                            </div>





                                        </div>
                                    @endforeach
                                @endif


                                <div class="experience-append_container">
                                    <div class="row experience-section mt-5" id="appended-award-section">
                                        <!-- experience form fields here as provided in your original code -->
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="add-more-awards"><i
                                        class="fa fa-plus"></i></button>
                            </div>
                            {{-- end of Honer and rewards section --}}




                            {{-- Faizan Projects Detail --}}

                            <div class="cv-block">
                                <div class="col-sm-12">
                                    <h4 class="tx-color-01 mg-b-5 mb-4 text-center"> Projects </h4>
                                </div>


                                @if (count($resumeDetails->projects) > 0)
                                    @foreach ($resumeDetails->projects as $project)
                                        <div class="row education-section">



                                            <div class="col-sm-6 mb-3">
                                                <div class="input-group">
                                                    <label for="" class="resume-form-label">Start Date</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text input-icon student-login-icon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                    <input type="date" class="form-control"
                                                        placeholder="Enter Project Starting Date"
                                                        name="project_start_date[]"
                                                        value="{{ $project->project_start_date }}" autocomplete="off">

                                                    <div class="reg-error-msg" v-if="errors.country"
                                                        v-for="error in errors.country">
                                                        <span v-text="error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="input-group">
                                                    <label for="" class="resume-form-label">End Date</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text input-icon student-login-icon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                    <input type="date" class="form-control end-date"
                                                        placeholder="Enter Project Starting Date"
                                                        name="project_end_date[]"
                                                        value="{{ $project->project_end_date }}" autocomplete="off">

                                                    <div class="reg-error-msg" v-if="errors.country"
                                                        v-for="error in errors.country">
                                                        <span v-text="error"></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-12 mb-3">
                                                <div class="input-group">
                                                    <label for="" class="resume-form-label"> Title </label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text input-icon student-login-icon">
                                                            <i class="fa fa-book"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="Project Title"
                                                        value="{{ $project->project_title }}" name="project_title[]"
                                                        autocomplete="off">

                                                    <div class="reg-error-msg" v-if="errors.country"
                                                        v-for="error in errors.country">
                                                        <span v-text="error"></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                @endif


                                <div class="experience-append_container">
                                    <div class="row experience-section mt-5" id="project-details-appended-container">
                                        <!-- experience form fields here as provided in your original code -->
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="add-more-projects"><i
                                        class="fa fa-plus"></i></button>
                            </div>

                            {{-- end of Honer and rewards section --}}










                            <input type="hidden" name="resume_id" id="resumeId"
                                value="{{ $resumeDetails->id }}">
                            <input type="hidden" name="student_id" id="student-id"
                                value="{{ $resumeDetails->student_id }}">
                            {{-- <input type="hidden" name="student_id" id="resumeId"
                                value="{{ $resumeDetails->student_id }}"> --}}
                            <!-- languages details end -->
                            <button id="update-resume-button" type="submit" class="btn btn-brand-02 btn-block">
                                Update</button>
                        </form>


                    </div>
                </div><!-- sign-wrapper -->
            </div><!-- media -->
        </div><!-- container -->
    </div><!-- content -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="//http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("language-professionalism").addEventListener("change", function() {
                const selectedValue = this.value;
                const proficiencyLevels = {
                    "IELTS": [{
                            level: "B2",
                            score: "5.5-6.5"
                        },
                        {
                            level: "C1",
                            score: "7.0-8.0"
                        },
                        {
                            level: "C2",
                            score: "8.5-9.0"
                        }
                    ],
                    "PTE": [{
                            level: "B2",
                            score: "59-75"
                        },
                        {
                            level: "C1",
                            score: "76-84"
                        },
                        {
                            level: "C2",
                            score: "85-90"
                        }
                    ],
                    "TOEFL iBT": [{
                            level: "B2",
                            score: "87-109"
                        },
                        {
                            level: "C1",
                            score: "110-120"
                        }
                    ],
                    "TOEFL CBT": [{
                            level: "B2",
                            score: "227-269"
                        },
                        {
                            level: "C1",
                            score: "270-300"
                        }
                    ],
                    "TOEFL PBT": [{
                            level: "B2",
                            score: "567-636"
                        },
                        {
                            level: "C1",
                            score: "637-677"
                        }
                    ],
                    "Duolingo": [{
                            level: "B2",
                            score: "95-125"
                        },
                        {
                            level: "C1",
                            score: "130-155"
                        },
                        {
                            level: "C2",
                            score: "160"
                        }
                    ],
                    "Language Cert International ESOL": [{
                            level: "C2",
                            score: "Mastery"
                        },
                        {
                            level: "C1",
                            score: "Expert"
                        },
                        {
                            level: "B2",
                            score: "Communicator"
                        }
                    ],
                    "Cambridge English Test": [{
                            level: "B2",
                            score: "162-176"
                        },
                        {
                            level: "C1",
                            score: "185-200"
                        },
                        {
                            level: "C2",
                            score: "205-209+"
                        }
                    ]
                };

                const proficiencyContainer = document.getElementById("proficiency-container");
                proficiencyContainer.innerHTML = ""; // Clear previous content

                if (selectedValue && proficiencyLevels[selectedValue]) {
                    proficiencyContainer.style.display = "flex";

                    // Create a row for each skill
                    const skills = ["Listening", "Reading", "Spoken Interaction", "Spoken Production",
                        "Writing", "Overall"
                    ];

                    skills.forEach(skill => {
                        const div = document.createElement("div");
                        div.className = "col-sm-6 mb-3";

                        const select = document.createElement("select");
                        select.className =
                            `language_${skill.toLowerCase().replace(" ", "_")} form-control`;
                        select.name =
                            `language_${skill.toLowerCase().replace(" ", "_")}[]`; // Add name attribute

                        // Add default option
                        const defaultOption = document.createElement("option");
                        defaultOption.value = "";
                        defaultOption.textContent = "Select Level"; // Default option text
                        select.appendChild(defaultOption);

                        // Populate the select with options
                        proficiencyLevels[selectedValue].forEach(level => {
                            const option = document.createElement("option");
                            option.value = level.level;
                            option.textContent = `${level.level} (${level.score})`;
                            select.appendChild(option);
                        });

                        div.innerHTML = `<label class="resume-form-label">${skill}</label>`;
                        div.appendChild(select);
                        proficiencyContainer.appendChild(
                            div); // Append the skill select to the container
                    });
                } else {
                    proficiencyContainer.style.display = "none";
                }
            });
        });

        $(document).ready(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                        $('#imagePreview').hide();
                        $('#imagePreview').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUpload").change(function() {
                readURL(this);
            });
        });

        $(document).ready(function() {
            let educationCounter = 0;
            $('#addMoreEducation').click(function() {
                // Define the HTML content for the new education section
                var currentCount = $(this).data('current_count');
                // Increment the count
                currentCount += 1;
                // Update the data attribute

                $(this).data('current_count', currentCount); // Set the updated value
                $(this).attr('data-current_count', currentCount); // Update the attribute in the DOM




                var newEducationSection = `
        <hr>
        <div class="row mt-4" id="education-row${currentCount}">
            <div class="col-sm-6 mb-3">
                <div class="input-group">
                <label for="" class="resume-form-label">Degree Name</label>
                  <div class="input-group-prepend">
                    <div class="input-group-text input-icon student-login-icon">
                        <i class="fa fa-book"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Degree" name="education_degree_name[]" autocomplete="off">
                </div>
            </div>

            <div class="col-sm-6 mb-3">
              <div class="input-group">
                <label for="" class="resume-form-label">University Name</label>
                  <div class="input-group-prepend">
                    <div class="input-group-text input-icon student-login-icon">
                        <i class="fa fa-building"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter University" name="education_university_name[]" autocomplete="off">
              </div>
            </div>

            <div class="col-sm-6 mb-3">
              <label for="" class="resume-form-label">City</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text input-icon student-login-icon">
                        <i class="fa fa-home"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter City" name="education_city[]" autocomplete="off">
                </div>
            </div>

            <div class="col-sm-6 mb-3">
              <div class="input-group">
              <label for="" class="resume-form-label">Country</label>
              <div class="input-group-prepend">
                  <div class="input-group-text input-icon student-login-icon">
                    <i class="fa fa-flag"></i>
                  </div>
                </div>
                <select name="education_country[]" class="form-control w100p country-select">
                  <option selected="">--Country--</option>
                   <option value="Afganistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bonaire">Bonaire</option>
                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Canary Islands">Canary Islands</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Channel Islands">Channel Islands</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos Island">Cocos Island</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote DIvoire">Cote DIvoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Curaco">Curacao</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="East Timor">East Timor</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands">Falkland Islands</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Ter">French Southern Ter</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Great Britain">Great Britain</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="India">India</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea North">Korea North</option>
                        <option value="Korea Sout">Korea South</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Laos">Laos</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macau">Macau</option>
                        <option value="Macedonia">Macedonia</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Midway Islands">Midway Islands</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Nambia">Nambia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherland Antilles">Netherland Antilles</option>
                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                        <option value="Nevis">Nevis</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau Island">Palau Island</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Phillipines">Philippines</option>
                        <option value="Pitcairn Island">Pitcairn Island</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                        <option value="Republic of Serbia">Republic of Serbia</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russia">Russia</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="St Barthelemy">St Barthelemy</option>
                        <option value="St Eustatius">St Eustatius</option>
                        <option value="St Helena">St Helena</option>
                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                        <option value="St Lucia">St Lucia</option>
                        <option value="St Maarten">St Maarten</option>
                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                        <option value="Saipan">Saipan</option>
                        <option value="Samoa">Samoa</option>
                        <option value="Samoa American">Samoa American</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syria</option>
                        <option value="Tahiti">Tahiti</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Erimates">United Arab Emirates</option>
                        <option value="United States of America">United States of America</option>
                        <option value="Uraguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vatican City State">Vatican City State</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                        <option value="Wake Island">Wake Island</option>
                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zaire">Zaire</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                </select>
              </div>
            </div>
             <div class="col-sm-6 mb-3">
                              <label for="" class="resume-form-label">Total Marks/CGPA</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                  </div>
                                  <input type="number" class="form-control" placeholder="Enter Total Marks" name="education_total_marks[]" autocomplete="off" >
                                 
                                  <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                    <span v-text="error"></span>
                                  </div>
                                </div>
                              </div>
            <div class="col-sm-6 mb-3">
                <div class="input-group">
                <label for="" class="resume-form-label">Start Date</label>
                  <div class="input-group-prepend">
                    <div class="input-group-text input-icon student-login-icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                  </div>
                  <input type="date" class="form-control" placeholder="Enter Start Date" name="education_start_date[]" autocomplete="off">
                </div>
            </div>

            <div class="col-sm-6 mb-3" id="end-date-education-container">
                <div class="input-group">
                <label for="" class="resume-form-label">End Date</label>
                  <div class="input-group-prepend">
                    <div class="input-group-text input-icon student-login-icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                  </div>
                  <input type="date" class="form-control education-end-date-input" placeholder="Enter End Date" name="education_end_date[]" autocomplete="off">
                  <input type="hidden" class="form-control education-end-date" id="present-education-hidden-field"
                                                    placeholder="Enter Degree" name="education_present[]"
                                                    autocomplete="off" value= 0>

                                                   
                </div>
            </div>


                  <div class="col-sm-6 mb-3">
                                            <div class="input-group">
                                                <label for="" class="resume-form-label">University Link </label>
    
                                                <input type="tyest" class="form-control"
                                                    placeholder="Enter University Website Link" 
                                                    name="education_university_web_link[]" autocomplete="off">
    
                                                <div class="reg-error-msg" v-if="errors.country"
                                                    v-for="error in errors.country">
                                                    <span v-text="error"></span>
                                                </div>
                                            </div>
                                        </div>

             <div class="col-sm-12 my-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input current-education-present-button" id="current-education-present-button${currentCount}" data-current_count="${currentCount}">
                                        <label class="custom-control-label" for="current-education-present-button${currentCount}">Present</label>
                                    </div>
                              </div>
          
                              <div class="col-sm-12 mb-4">
                                <div class="input-group">
                                  <label for="" class="resume-form-label"> EducationDetails</label>
                                  <textarea class="form-control" name="education_details[]" cols="12" rows="5" id="" placeholder="Enter Education Details"></textarea>
                                  <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                    <span v-text="error"></span>
                                  </div>
                                </div>
                              </div>
        </div>`;

                // Append the new education section to the container
                $('.education-append_container').append(newEducationSection);
            });



            $('#addMoreexperience').click(function() {
                var currentCount = $(this).data('current_count');
                // Increment the count
                currentCount += 1;
                // Update the data attribute
                $(this).data('current_count', currentCount); // Set the updated value
                $(this).attr('data-current_count', currentCount); // Update the attribute in the DOM

                // Define the HTML content for the new education section
                var newExperienceSection = `
                                
                          <div class="row experience-section my-2 py-2" id="experience-row${currentCount}">
                            
                            <div class="col-sm-6 mb-3">
                                <div class="input-group">
                                <label for="" class="resume-form-label">Position</label>
                                  <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-book"></i>
                                    </div>
                                  </div>
                                  <input type="text" class="form-control" placeholder="Position Name" name="experience_position[]" autocomplete="off" >
                                 
                                  <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                    <span v-text="error"></span>
                                  </div>
                                </div>
                              </div>

                              <div class="col-sm-6 mb-3">
                              <div class="input-group">
                                <label for="" class="resume-form-label">Employer</label>
                                  <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-building"></i>
                                    </div>
                                  </div>
                                  <input type="text" class="form-control" placeholder="Company Name" name="experience_employer[]" autocomplete="off" >
                                 
                                  <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                    <span v-text="error"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6 mb-3">
                              <label for="" class="resume-form-label">City</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                  </div>
                                  <input type="text" class="form-control" placeholder="Enter City" name="experience_city[]" autocomplete="off" >
                                 
                                  <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                    <span v-text="error"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6 mb-3">
                              <div class="input-group">
                              <label for="" class="resume-form-label">Country</label>
                              <div class="input-group-prepend">
                                  <div class="input-group-text input-icon student-login-icon">
                                    <i class="fa fa-flag"></i>
                                  </div>
                                </div>
                                <select name="experience_country[]" class="form-control w100p country-select">
                                  <option selected="">--Country--</option>
                                  <option value="Afganistan">Afghanistan</option>
                                  <option value="Albania">Albania</option>
                                  <option value="Algeria">Algeria</option>
                                  <option value="American Samoa">American Samoa</option>
                                  <option value="Andorra">Andorra</option>
                                  <option value="Angola">Angola</option>
                                  <option value="Anguilla">Anguilla</option>
                                  <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                  <option value="Argentina">Argentina</option>
                                  <option value="Armenia">Armenia</option>
                                  <option value="Aruba">Aruba</option>
                                  <option value="Australia">Australia</option>
                                  <option value="Austria">Austria</option>
                                  <option value="Azerbaijan">Azerbaijan</option>
                                  <option value="Bahamas">Bahamas</option>
                                  <option value="Bahrain">Bahrain</option>
                                  <option value="Bangladesh">Bangladesh</option>
                                  <option value="Barbados">Barbados</option>
                                  <option value="Belarus">Belarus</option>
                                  <option value="Belgium">Belgium</option>
                                  <option value="Belize">Belize</option>
                                  <option value="Benin">Benin</option>
                                  <option value="Bermuda">Bermuda</option>
                                  <option value="Bhutan">Bhutan</option>
                                  <option value="Bolivia">Bolivia</option>
                                  <option value="Bonaire">Bonaire</option>
                                  <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                  <option value="Botswana">Botswana</option>
                                  <option value="Brazil">Brazil</option>
                                  <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                  <option value="Brunei">Brunei</option>
                                  <option value="Bulgaria">Bulgaria</option>
                                  <option value="Burkina Faso">Burkina Faso</option>
                                  <option value="Burundi">Burundi</option>
                                  <option value="Cambodia">Cambodia</option>
                                  <option value="Cameroon">Cameroon</option>
                                  <option value="Canada">Canada</option>
                                  <option value="Canary Islands">Canary Islands</option>
                                  <option value="Cape Verde">Cape Verde</option>
                                  <option value="Cayman Islands">Cayman Islands</option>
                                  <option value="Central African Republic">Central African Republic</option>
                                  <option value="Chad">Chad</option>
                                  <option value="Channel Islands">Channel Islands</option>
                                  <option value="Chile">Chile</option>
                                  <option value="China">China</option>
                                  <option value="Christmas Island">Christmas Island</option>
                                  <option value="Cocos Island">Cocos Island</option>
                                  <option value="Colombia">Colombia</option>
                                  <option value="Comoros">Comoros</option>
                                  <option value="Congo">Congo</option>
                                  <option value="Cook Islands">Cook Islands</option>
                                  <option value="Costa Rica">Costa Rica</option>
                                  <option value="Cote DIvoire">Cote DIvoire</option>
                                  <option value="Croatia">Croatia</option>
                                  <option value="Cuba">Cuba</option>
                                  <option value="Curaco">Curacao</option>
                                  <option value="Cyprus">Cyprus</option>
                                  <option value="Czech Republic">Czech Republic</option>
                                  <option value="Denmark">Denmark</option>
                                  <option value="Djibouti">Djibouti</option>
                                  <option value="Dominica">Dominica</option>
                                  <option value="Dominican Republic">Dominican Republic</option>
                                  <option value="East Timor">East Timor</option>
                                  <option value="Ecuador">Ecuador</option>
                                  <option value="Egypt">Egypt</option>
                                  <option value="El Salvador">El Salvador</option>
                                  <option value="Equatorial Guinea">Equatorial Guinea</option>
                                  <option value="Eritrea">Eritrea</option>
                                  <option value="Estonia">Estonia</option>
                                  <option value="Ethiopia">Ethiopia</option>
                                  <option value="Falkland Islands">Falkland Islands</option>
                                  <option value="Faroe Islands">Faroe Islands</option>
                                  <option value="Fiji">Fiji</option>
                                  <option value="Finland">Finland</option>
                                  <option value="France">France</option>
                                  <option value="French Guiana">French Guiana</option>
                                  <option value="French Polynesia">French Polynesia</option>
                                  <option value="French Southern Ter">French Southern Ter</option>
                                  <option value="Gabon">Gabon</option>
                                  <option value="Gambia">Gambia</option>
                                  <option value="Georgia">Georgia</option>
                                  <option value="Germany">Germany</option>
                                  <option value="Ghana">Ghana</option>
                                  <option value="Gibraltar">Gibraltar</option>
                                  <option value="Great Britain">Great Britain</option>
                                  <option value="Greece">Greece</option>
                                  <option value="Greenland">Greenland</option>
                                  <option value="Grenada">Grenada</option>
                                  <option value="Guadeloupe">Guadeloupe</option>
                                  <option value="Guam">Guam</option>
                                  <option value="Guatemala">Guatemala</option>
                                  <option value="Guinea">Guinea</option>
                                  <option value="Guyana">Guyana</option>
                                  <option value="Haiti">Haiti</option>
                                  <option value="Hawaii">Hawaii</option>
                                  <option value="Honduras">Honduras</option>
                                  <option value="Hong Kong">Hong Kong</option>
                                  <option value="Hungary">Hungary</option>
                                  <option value="Iceland">Iceland</option>
                                  <option value="Indonesia">Indonesia</option>
                                  <option value="India">India</option>
                                  <option value="Iran">Iran</option>
                                  <option value="Iraq">Iraq</option>
                                  <option value="Ireland">Ireland</option>
                                  <option value="Isle of Man">Isle of Man</option>
                                  <option value="Israel">Israel</option>
                                  <option value="Italy">Italy</option>
                                  <option value="Jamaica">Jamaica</option>
                                  <option value="Japan">Japan</option>
                                  <option value="Jordan">Jordan</option>
                                  <option value="Kazakhstan">Kazakhstan</option>
                                  <option value="Kenya">Kenya</option>
                                  <option value="Kiribati">Kiribati</option>
                                  <option value="Korea North">Korea North</option>
                                  <option value="Korea Sout">Korea South</option>
                                  <option value="Kuwait">Kuwait</option>
                                  <option value="Kyrgyzstan">Kyrgyzstan</option>
                                  <option value="Laos">Laos</option>
                                  <option value="Latvia">Latvia</option>
                                  <option value="Lebanon">Lebanon</option>
                                  <option value="Lesotho">Lesotho</option>
                                  <option value="Liberia">Liberia</option>
                                  <option value="Libya">Libya</option>
                                  <option value="Liechtenstein">Liechtenstein</option>
                                  <option value="Lithuania">Lithuania</option>
                                  <option value="Luxembourg">Luxembourg</option>
                                  <option value="Macau">Macau</option>
                                  <option value="Macedonia">Macedonia</option>
                                  <option value="Madagascar">Madagascar</option>
                                  <option value="Malaysia">Malaysia</option>
                                  <option value="Malawi">Malawi</option>
                                  <option value="Maldives">Maldives</option>
                                  <option value="Mali">Mali</option>
                                  <option value="Malta">Malta</option>
                                  <option value="Marshall Islands">Marshall Islands</option>
                                  <option value="Martinique">Martinique</option>
                                  <option value="Mauritania">Mauritania</option>
                                  <option value="Mauritius">Mauritius</option>
                                  <option value="Mayotte">Mayotte</option>
                                  <option value="Mexico">Mexico</option>
                                  <option value="Midway Islands">Midway Islands</option>
                                  <option value="Moldova">Moldova</option>
                                  <option value="Monaco">Monaco</option>
                                  <option value="Mongolia">Mongolia</option>
                                  <option value="Montserrat">Montserrat</option>
                                  <option value="Morocco">Morocco</option>
                                  <option value="Mozambique">Mozambique</option>
                                  <option value="Myanmar">Myanmar</option>
                                  <option value="Nambia">Nambia</option>
                                  <option value="Nauru">Nauru</option>
                                  <option value="Nepal">Nepal</option>
                                  <option value="Netherland Antilles">Netherland Antilles</option>
                                  <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                  <option value="Nevis">Nevis</option>
                                  <option value="New Caledonia">New Caledonia</option>
                                  <option value="New Zealand">New Zealand</option>
                                  <option value="Nicaragua">Nicaragua</option>
                                  <option value="Niger">Niger</option>
                                  <option value="Nigeria">Nigeria</option>
                                  <option value="Niue">Niue</option>
                                  <option value="Norfolk Island">Norfolk Island</option>
                                  <option value="Norway">Norway</option>
                                  <option value="Oman">Oman</option>
                                  <option value="Pakistan">Pakistan</option>
                                  <option value="Palau Island">Palau Island</option>
                                  <option value="Palestine">Palestine</option>
                                  <option value="Panama">Panama</option>
                                  <option value="Papua New Guinea">Papua New Guinea</option>
                                  <option value="Paraguay">Paraguay</option>
                                  <option value="Peru">Peru</option>
                                  <option value="Phillipines">Philippines</option>
                                  <option value="Pitcairn Island">Pitcairn Island</option>
                                  <option value="Poland">Poland</option>
                                  <option value="Portugal">Portugal</option>
                                  <option value="Puerto Rico">Puerto Rico</option>
                                  <option value="Qatar">Qatar</option>
                                  <option value="Republic of Montenegro">Republic of Montenegro</option>
                                  <option value="Republic of Serbia">Republic of Serbia</option>
                                  <option value="Reunion">Reunion</option>
                                  <option value="Romania">Romania</option>
                                  <option value="Russia">Russia</option>
                                  <option value="Rwanda">Rwanda</option>
                                  <option value="St Barthelemy">St Barthelemy</option>
                                  <option value="St Eustatius">St Eustatius</option>
                                  <option value="St Helena">St Helena</option>
                                  <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                  <option value="St Lucia">St Lucia</option>
                                  <option value="St Maarten">St Maarten</option>
                                  <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                  <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                  <option value="Saipan">Saipan</option>
                                  <option value="Samoa">Samoa</option>
                                  <option value="Samoa American">Samoa American</option>
                                  <option value="San Marino">San Marino</option>
                                  <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                  <option value="Saudi Arabia">Saudi Arabia</option>
                                  <option value="Senegal">Senegal</option>
                                  <option value="Seychelles">Seychelles</option>
                                  <option value="Sierra Leone">Sierra Leone</option>
                                  <option value="Singapore">Singapore</option>
                                  <option value="Slovakia">Slovakia</option>
                                  <option value="Slovenia">Slovenia</option>
                                  <option value="Solomon Islands">Solomon Islands</option>
                                  <option value="Somalia">Somalia</option>
                                  <option value="South Africa">South Africa</option>
                                  <option value="Spain">Spain</option>
                                  <option value="Sri Lanka">Sri Lanka</option>
                                  <option value="Sudan">Sudan</option>
                                  <option value="Suriname">Suriname</option>
                                  <option value="Swaziland">Swaziland</option>
                                  <option value="Sweden">Sweden</option>
                                  <option value="Switzerland">Switzerland</option>
                                  <option value="Syria">Syria</option>
                                  <option value="Tahiti">Tahiti</option>
                                  <option value="Taiwan">Taiwan</option>
                                  <option value="Tajikistan">Tajikistan</option>
                                  <option value="Tanzania">Tanzania</option>
                                  <option value="Thailand">Thailand</option>
                                  <option value="Togo">Togo</option>
                                  <option value="Tokelau">Tokelau</option>
                                  <option value="Tonga">Tonga</option>
                                  <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                  <option value="Tunisia">Tunisia</option>
                                  <option value="Turkey">Turkey</option>
                                  <option value="Turkmenistan">Turkmenistan</option>
                                  <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                  <option value="Tuvalu">Tuvalu</option>
                                  <option value="Uganda">Uganda</option>
                                  <option value="United Kingdom">United Kingdom</option>
                                  <option value="Ukraine">Ukraine</option>
                                  <option value="United Arab Erimates">United Arab Emirates</option>
                                  <option value="United States of America">United States of America</option>
                                  <option value="Uraguay">Uruguay</option>
                                  <option value="Uzbekistan">Uzbekistan</option>
                                  <option value="Vanuatu">Vanuatu</option>
                                  <option value="Vatican City State">Vatican City State</option>
                                  <option value="Venezuela">Venezuela</option>
                                  <option value="Vietnam">Vietnam</option>
                                  <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                  <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                  <option value="Wake Island">Wake Island</option>
                                  <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                  <option value="Yemen">Yemen</option>
                                  <option value="Zaire">Zaire</option>
                                  <option value="Zambia">Zambia</option>
                                  <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                                <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                  <span v-text="error"></span>
                                </div>
                              </div>
                            </div>
                            
                              <div class="col-sm-6 mb-3">
                                <div class="input-group">
                                <label for="" class="resume-form-label">Start Date</label>
                                  <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                  </div>
                                  <input type="date" class="form-control" placeholder="Enter Degree" name="experience_start_date[]" autocomplete="off" >
                                 
                                  <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                    <span v-text="error"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6 mb-3" id="end-date-experience-container">
                                <div class="input-group">
                                <label for="" class="resume-form-label">End Date</label>
                                  <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                  </div>
                                  <input type="date" class="form-control end-date" placeholder="Enter Degree" name="experience_end_date[]" autocomplete="off" >
                                 <input type="hidden" class="form-control end-date" id="present-hidden-field"
                                                    placeholder="Enter Degree" name="experience_present[]"
                                                    autocomplete="off" value= 0>
                                  <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                    <span v-text="error"></span>
                                  </div>
                                </div>
                              </div>
                               <div class="col-sm-12 my-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input current-experience-present-button" id="current-experience-present-button${currentCount}" data-current_count="${currentCount}">
                                        <label class="custom-control-label" for="current-experience-present-button${currentCount}">Present</label>
                                    </div>
                              </div>
                              <div class="col-sm-12 mb-4">
                                <div class="input-group">
                                  <label for="" class="resume-form-label">Experience Details</label>
                                  <textarea class="form-control" name="experience_details[]" cols="12" rows="5" id="" placeholder="Enter Experience Details"></textarea>
                                  <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                    <span v-text="error"></span>
                                  </div>
                                </div>
                              </div>
                          </div>`;

                // Append the new education section to the container
                $('#experience-append_container').append(newExperienceSection);
            });


            $('#addMoreskills').click(function() {
                // Define the HTML content for the new education section
                var newskillsSection = `                
                          <div class="row skills-section my-2 py-2">
                             <div class="col-sm-6 mb-3">
                                <div class="input-group">
                                  <label for="" class="resume-form-label">Skill Name</label>
                                  <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-book"></i>
                                    </div>
                                  </div>
                                  <input type="text" class="form-control" placeholder="Enter Skill" name="skill_name[]" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="input-group">
                                  <label for="" class="resume-form-label">Skill Perfoessionalim</label>
                                  <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-star"></i>
                                    </div>
                                  </div>
                                  <select name="skill_perofessionlism[]" class="form-control w100p country-select">
                                    <option  value="Basic">Basic</option>
                                    <option  value="Intermediate">Intermediate</option>
                                    <option  value="Expert">Expert</option>
                                  </select>
                                </div>
                            </div>
                         </div>`;

                // Append the new education section to the container
                $('#skills-append_container').append(newskillsSection);
            });

            $('#addMorelanguages').click(function() {
                // Define the HTML content for the new education section
                var newlanguagesSection = `                   
        <div class="row languages-section my-2 py-2">
            <div class="col-sm-6 mb-3">
                <div class="input-group">
                    <label for="" class="resume-form-label">Language Name</label>
                    <div class="input-group-prepend">
                        <div class="input-group-text input-icon student-login-icon">
                            <i class="fa fa-language"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter Language" name="other_language_name[]" autocomplete="off">
                </div>
            </div>
            <div class="col-sm-6 mb-3">
                <div class="input-group">
                    <label for="" class="resume-form-label">Language Proficiency</label>
                    <div class="input-group-prepend">
                        <div class="input-group-text input-icon student-login-icon">
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <select name="other_language_professionalism[]" class="form-control w100p country-select">
                                    <option  value="Basic">Basic</option>
                                    <option  value="Intermediate">Intermediate</option>
                                    <option  value="Expert">Expert</option>
                    </select>
                </div>
            </div>
           
           
              </div>
`;

                // Append the new education section to the container
                $('#languages-append_container').append(newlanguagesSection);
            });




            //  ==============================================================
            //  =============================== faizan ======================= 
            //  ==============================================================

            $('#add-more-driving-licence').click(function() {
                // Define the HTML content for the new language section
                var newlanguagesSection = `
  
  
                      
                        <div class="col-sm-6 mb-3">
                          <div class="input-group">
                            <label for="" class="resume-form-label">Select Licence Cateogory</label>
                            
                            <select id="language_professionalism" name="driving_licence[]" class="form-control w100p country-select" required>
                            <option value="">Select Licence Category</option>
                           <option value="LTV">LTV</option>
                            <option value="HTV">HTV</option>
                            <option value=" Moter Car & Moter Bike"> Moter Car & Moter Bike</option>
                            </select>
                          </div>
                        </div>
                        
                            `;

                // Append the new liecence  section to the container
                $('#licence-append-container').append(newlanguagesSection);
            });





            $('#add-more-hobbies').click(function() {
                // Define the HTML content for the new language section
                var newhobieSection = `

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">

                                                                      <label for="" class="resume-form-label"> Hobbie </label>


                                            <input type="text" class="form-control" value=""
                                                placeholder="Enter Hobbie or interes" name="hobbies[]">

                                        </div>
                                    </div>
                                    

                                
                            `;

                // Append the Hobbie  section to the container
                $('#hobbie-append-container').append(newhobieSection);
            });




            $('#add-more-awards').click(function() {
                // Define the HTML content for the new language section
                var newAwardSection = `

                                      <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Awarded Date</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="date" class="form-control" placeholder="Awarded Date"
                                                name="Awarded_date[]" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">University Name</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-book"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="University Name"
                                                name="awarded_uni_name[]" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-12 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Award Title</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-building"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Award Title"
                                                name="Awarded_title[]" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                   
                                
                            `;
                // Append the new liecence  section to the container
                $('#appended-award-section').append(newAwardSection);
            });





            $('#add-more-projects').click(function() {
                // Define the HTML content for the new language section
                var newAwardSection = `

                                     <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Start Date</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="date" class="form-control" placeholder="Enter Degree"
                                                name="project_start_date[]" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">End Date</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="date" class="form-control end-date"
                                                placeholder="Enter Degree" name="project_end_date[]"
                                                autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-12 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Title </label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-book"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Position Name"
                                                name="project_title[]" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>



                                    
                                
                            `;
                // Append the more projects to the container
                $('#project-details-appended-container').append(newAwardSection);
            });



            $('body').on('click', '.current-experience-present-button', function() {
                var current_count = $(this).data('current_count');
                if ($(this).is(':checked')) {
                    var $endDateInput = $('#experience-row' + current_count).find(
                        '#end-date-experience-container').find('.end-date').val('');
                    $('#experience-row' + current_count).find('#end-date-experience-container').find(
                        '.end-date').prop('readonly', true);
                    $('#experience-row' + current_count).find('#end-date-experience-container').find(
                        '#present-hidden-field').val(1);


                } else {
                    $('#experience-row' + current_count).find('#end-date-experience-container').find(
                        '#present-hidden-field').val(0);
                    $('#experience-row' + current_count).find('#end-date-experience-container').find(
                        '.end-date').prop('readonly', false);


                }
            })


            $('body').on('click', '.current-education-present-button', function() {
                // present-education-hidden-field
                var current_count = $(this).data('current_count');
                if ($(this).is(':checked')) {
                    $('#education-row' + current_count).find('#end-date-education-container').find(
                        '.education-end-date-input').val('');
                    $('#education-row' + current_count).find('#end-date-education-container').find(
                        '.education-end-date-input').prop('readonly', true);
                    $('#education-row' + current_count).find('#end-date-education-container').find(
                        '#present-education-hidden-field').val(1);


                } else {
                    $('#education-row' + current_count).find('#end-date-education-container').find(
                        '.education-end-date-input').prop('readonly', false);
                    $('#education-row' + current_count).find('#end-date-education-container').find(
                        '#present-education-hidden-field').val(0);


                }
            })





            // ==============================================================





            $('#resumeForm').on('submit', function(e) {
                e.preventDefault(); // Prevent form from reloading the page
                var studentId = $('#student-id').val();
                var formData = new FormData(this); 

                $.ajax({
                    url: '{{ route('resume-update', ['id' => $resumeDetails->id]) }}', // Update to your edit route
                    method: 'POST',     
                    data: formData,
                    contentType: false, // Needed for FormData
                    processData: false, // Prevent jQuery from processing data
                    success: function(response) {
                        // Handle success - show a message, etc.
                        var url = `{{ url('resume') }}?i=${studentId}`;
                                window.location.href = url;


                        // window.location.href = ' {{ route('resume-update', ['id' => $resumeDetails->id]) }}' // Replace with the new page URL you want to redirect to

                        $('#resumeForm')[0].reset(); // Reset the form

                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : error;
                        alert('An error occurred: ' + errorMessage);
                    }
                });
            });

            $('.toggle-switch').on('change', function() {
                // Find the closest .end-date input field and toggle the disabled property
                $(this).closest('.row').find('.end-date').prop('disabled', this.checked);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Mapping for proficiency categories and their corresponding CEFR levels and scores
            const proficiencyMapping = {
                'IELTS': {
                    listening: {
                        B2: '5.5-6.5',
                        C1: '7.0-8.0',
                        C2: '8.5-9.0'
                    },
                    reading: {
                        B2: '5.5-6.5',
                        C1: '7.0-8.0',
                        C2: '8.5-9.0'
                    },
                    spoken_interaction: {
                        B2: '5.5-6.5',
                        C1: '7.0-8.0',
                        C2: '8.5-9.0'
                    },
                    spoken_production: {
                        B2: '5.5-6.5',
                        C1: '7.0-8.0',
                        C2: '8.5-9.0'
                    },
                    writing: {
                        B2: '5.5-6.5',
                        C1: '7.0-8.0',
                        C2: '8.5-9.0'
                    }
                },
                'PTE': {
                    listening: {
                        B2: '59-75',
                        C1: '76-84',
                        C2: '85-90'
                    },
                    reading: {
                        B2: '59-75',
                        C1: '76-84',
                        C2: '85-90'
                    },
                    spoken_interaction: {
                        B2: '59-75',
                        C1: '76-84',
                        C2: '85-90'
                    },
                    spoken_production: {
                        B2: '59-75',
                        C1: '76-84',
                        C2: '85-90'
                    },
                    writing: {
                        B2: '59-75',
                        C1: '76-84',
                        C2: '85-90'
                    }
                },
                'TOEFL iBT': {
                    listening: {
                        B2: '87-109',
                        C1: '110-120',
                        C2: ''
                    },
                    reading: {
                        B2: '87-109',
                        C1: '110-120',
                        C2: ''
                    },
                    spoken_interaction: {
                        B2: '87-109',
                        C1: '110-120',
                        C2: ''
                    },
                    spoken_production: {
                        B2: '87-109',
                        C1: '110-120',
                        C2: ''
                    },
                    writing: {
                        B2: '87-109',
                        C1: '110-120',
                        C2: ''
                    }
                },
                'TOEFL CBT': {
                    listening: {
                        B2: '227-269',
                        C1: '270-300',
                        C2: ''
                    },
                    reading: {
                        B2: '227-269',
                        C1: '270-300',
                        C2: ''
                    },
                    spoken_interaction: {
                        B2: '227-269',
                        C1: '270-300',
                        C2: ''
                    },
                    spoken_production: {
                        B2: '227-269',
                        C1: '270-300',
                        C2: ''
                    },
                    writing: {
                        B2: '227-269',
                        C1: '270-300',
                        C2: ''
                    }
                },
                // Add other categories similarly...
            };

            // Function to update proficiency levels based on selected category
            function updateProficiencyLevels(selectedCategory) {
                const listeningSelect = document.querySelector('select[name="language_listening[]"]');
                const readingSelect = document.querySelector('select[name="language_reading[]"]');
                const spokenInteractionSelect = document.querySelector(
                    'select[name="language_spoken_interaction[]"]');
                const spokenProductionSelect = document.querySelector(
                    'select[name="language_spoken_production[]"]');
                const writingSelect = document.querySelector('select[name="language_writing[]"]');

                const categoryMapping = proficiencyMapping[selectedCategory];

                // Update each proficiency select field
                updateSelectOptions(listeningSelect, categoryMapping.listening);
                updateSelectOptions(readingSelect, categoryMapping.reading);
                updateSelectOptions(spokenInteractionSelect, categoryMapping.spoken_interaction);
                updateSelectOptions(spokenProductionSelect, categoryMapping.spoken_production);
                updateSelectOptions(writingSelect, categoryMapping.writing);
            }

            // Function to update options of a select field
            function updateSelectOptions(selectElement, levels) {
                // Clear existing options
                selectElement.innerHTML = '<option value="">--Select Level--</option>';

                // Add new options based on levels
                for (const [level, score] of Object.entries(levels)) {
                    const option = document.createElement('option');
                    option.value = level;
                    option.textContent = `${level} (${score})`;
                    selectElement.appendChild(option);
                }
            }

            // Event listener for language professionalism selection
            document.querySelector('select[name="language_professionalism[]"]').addEventListener('change',
                function() {
                    const selectedCategory = this.value;

                    if (proficiencyMapping[selectedCategory]) {
                        updateProficiencyLevels(selectedCategory);
                    }
                });


            $('.tabg-input').tagsinput({
                trimValue: true,
                confirmKeys: [13, 44],
                focusClass: 'my-focus-class'
            });

            $('.bootstrap-tagsinput input').on('focus', function() {
                $(this).closest('.bootstrap-tagsinput').addClass('has-focus');
            }).on('blur', function() {
                $(this).closest('.bootstrap-tagsinput').removeClass('has-focus');
            });

        });
    </script>
    <script>
        // JavaScript to toggle visibility
        document.getElementById('viewCvBtn').addEventListener('click', function() {
            // Get the CV container and the main div
            var cvContainer = document.getElementById('cvContainer');
            var mainDiv = document.getElementById('main-div');
            var dButton = document.getElementById('downloadCv');

            // Check if the CV container is currently visible
            if (cvContainer.style.display === 'flex') {
                // If it is visible, hide it and show the main div
                cvContainer.style.display = 'none';
                 dButton.style.display = 'none';
                mainDiv.classList.remove('hidden');
                this.textContent = 'View CV'; // Update button text
            } else {
                // If it is hidden, show it and hide the main div
                cvContainer.style.display = 'flex';
                dButton.style.display = 'block';
                mainDiv.classList.add('hidden');
                this.textContent = 'Hide CV'; // Update button text
            }
        });
    </script>
@endsection
