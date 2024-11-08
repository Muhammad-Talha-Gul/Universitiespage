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


        .validation-failed {
            border: 2px solid #f09494 !important;
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

        .custom-control-input:checked ~ .custom-control-label::before {
    color: #fff;
    border-color: #0b6d76;
    background-color: #0b6d76;
}

.invisible-select{
    height:0px;
    width:0px;
    opacity:0;
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
                    <div class="wd-100p">

                        <div class="top-heading-main"
                            style="background: #0b6d76 !important; padding: 7px 0px; margin-bottom: 30px; border-radius: 20px;">
                            <h4 class="tx-color-01 mg-b-5 mb-0 text-center"
                                style="text-transform: capitalize; color: #fff;">Add Here Your Information</h4>
                        </div>
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
                                                        style="background-image: url('public/crm/images/p-image.png');">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Full Name*</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control required_field"
                                                placeholder="Enter Full Name" name="full_name" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Email*</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                            </div>
                                            <input type="email" class="form-control required_field"
                                                placeholder="Enter Your Email" name="email" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Phone Number*</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control required_field"
                                                placeholder="Enter Your Phone Number" name="phone_number"
                                                autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Gender*</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <select name="gender"
                                                class="form-control required_field w100p country-select">
                                                <option value="">--Select Gender --</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Date Of Birth*</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="date" class="form-control required_field " name="birth_date"
                                                id="birth_date_filter">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label for="" class="resume-form-label">Nationality*</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-flag"></i>
                                                </div>
                                            </div>
                                            <select name="nationality"
                                                class="form-control required_field  w100p country-select">
                                                <option value="">Select Country</option>
                                                @foreach ($countriesArray as $country)
                                                    <option value="{{ $country }}"> {{ $country }} </option>
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
                                            <textarea class="form-control word-limit" maxlength="200" name="about_yourself" cols="12"
                                                rows="5" id="" placeholder="Enter Your Details and max 200 characters are allowed"></textarea>

                                            <div class="reg-error-msg word-count-error text-danger"
                                                style="display: none;">
                                                Please enter at least 200 characters.
                                            </div>

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
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">City*</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-home"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control required_field "
                                                placeholder="Enter City" name="city" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Country*</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-flag"></i>
                                                </div>
                                            </div>
                                            <select name="country"
                                                class="form-control required_field  w100p country-select">
                                                <option value="">Select Country</option>
                                                @foreach ($countriesArray as $country)
                                                    <option value="{{ $country }}"> {{ $country }} </option>
                                                @endforeach

                                            </select>
                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label for="" class="resume-form-label">Postal Code (optional)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-list-ol"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control required_field "
                                                placeholder="Enter Postal Code" name="postal_code" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-12 mb-4">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Address*</label>
                                            <textarea class="form-control required_field word-limit" name="address" cols="12" rows="5"
                                                id="" placeholder="Enter your address maximum 200 characters are allowed" maxlength="200"></textarea>
                                            <div class="reg-error-msg word-count-error text-danger"
                                                style="display: none;">
                                                Please enter at least 200 words.
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- address details end -->






                            <!-- education details start -->
                            <div class="cv-block">
                                <div class="col-sm-12">
                                    <h4 class="tx-color-01 mg-b-5 mb-4 text-center">Education Details</h4>
                                </div>

                                @php $count = 0 ; @endphp
                                <div class="row education-section-main" id="education-row{{ ++$count }}">

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Degree Name*</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-book"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control required_field "
                                                placeholder="Enter degree name" name="education_degree_name[]"
                                                autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Institute Name*</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-building"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control required_field "
                                                placeholder="Enter institute Name" name="education_university_name[]"
                                                autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="" class="resume-form-label">City*</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-home"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control required_field "
                                                placeholder="Enter City" name="education_city[]" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Country*</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-flag"></i>
                                                </div>
                                            </div>
                                            <select name="education_country[]"
                                                class="form-control required_field  w100p country-select">
                                                <option value="">Select Country</option>
                                                @foreach ($countriesArray as $country)
                                                    <option value="{{ $country }}"> {{ $country }} </option>
                                                @endforeach

                                            </select>
                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="" class="resume-form-label">Total Marks/CGPA*</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-graduation-cap"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control required_field "
                                                placeholder="Enter marks" name="education_total_marks[]" step="0.01" min="0" 
                                                autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Start Date*</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="date" class="form-control required_field "
                                                placeholder="Enter Degree" name="education_start_date[]"
                                                autocomplete="off">

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
                                            <input type="date" class="form-control end-date education-end-date-input"
                                                placeholder="Enter Degree" name="education_end_date[]"
                                                autocomplete="off">



                                            <input type="hidden" class="form-control education-end-date"
                                                id="present-education-hidden-field" placeholder="Enter Degree"
                                                name="education_present[]" autocomplete="off" value=0>




                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>


                                        </div>
                                    </div>

                                    {{--  faizan  --}}

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Institute Link* </label>

                                            <input type="tyest" class="form-control required_field "
                                                placeholder="Enter institute Website Link"
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
                                                data-current_count="{{ $count }}">
                                            <label class="custom-control-label"
                                                for="current-education-present-button{{ $count }}">Currently Studying</label>
                                        </div>



                                    </div>



                                    
                                </div>
                                <div class="education-append_container">
                                </div>
                                <button type="button" class="btn btn-primary" data-current_count="{{ $count }}"
                                    id="addMoreEducation"><i class="fa fa-plus"></i></button>
                            </div>
                            <!-- education details end -->










                            <!-- experience details start -->
                            <div class="cv-block">
                                <div class="col-sm-12">
                                    <h4 class="tx-color-01 mg-b-5 mb-4 text-center">Experience Details</h4>
                                </div>

                                @php $count = 0 ; @endphp

                                <div class="row education-section" id="experience-row{{ ++$count }}">

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Position (optional)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-book"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control "
                                                placeholder="Position Name" name="experience_position[]"
                                                autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Employer (optional)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-building"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control "
                                                placeholder="Company Name" name="experience_employer[]"
                                                autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="" class="resume-form-label">City (optional)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-home"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control "
                                                placeholder="Enter City" name="experience_city[]" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Country (optional)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-flag"></i>
                                                </div>
                                            </div>
                                            <select name="experience_country[]"
                                                class="form-control  w100p country-select">
                                                <option value="">Select Country</option>
                                                @foreach ($countriesArray as $country)
                                                    <option value="{{ $country }}"> {{ $country }} </option>
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
                                            <label for="" class="resume-form-label">Start Date (optional)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="date" class="form-control "
                                                placeholder="Enter Degree" name="experience_start_date[]"
                                                autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3" id="experience-end-date-container">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">End Date (optional)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="date" class="form-control experience-end-date-input-field"
                                                placeholder="Enter Degree" name="experience_end_date[]"
                                                autocomplete="off">


                                            <input type="hidden" class="form-control experence-hidden-end-date"
                                                id="present-hidden-field" placeholder="Enter Degree"
                                                name="experience_present[]" autocomplete="off" value=0>


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
                                                data-current_count="{{ $count }}">
                                            <label class="custom-control-label"
                                                for="current-experience-present-button{{ $count }}">Currently Working</label>
                                        </div>
                                    </div>


                                    
                                </div>


                                <div class="experience-append_container" id="experience-append_container">
                                    <div class="row experience-section mt-5">
                                        <!-- experience form fields here as provided in your original code -->
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="addMoreexperience"
                                    data-current_count="{{ $count }}"><i class="fa fa-plus"></i></button>
                            </div>

                            <!-- experience details end -->

                            <!-- skills details start -->
                            <div class="cv-block">
                                <div class="col-sm-12">
                                    <h4 class="tx-color-01 mg-b-5 text-center">Add Skills</h4>
                                    <h6 class="tx-color-01 mg-b-5 mb-4 text-center">Add at least three skills.</h6>
                                </div>
                                <div class="row education-section">
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Skill Name (optional)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-book"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control"
                                                placeholder="Enter Skill" name="skill_name[]" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Skill Lavel (optional)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <select name="skill_perofessionlism[]"
                                                class="form-control   w100p country-select">
                                                <option value="">--Select Skill --</option>
                                                <option value="Basic">Basic</option>
                                                <option value="Intermediate">Intermediate</option>
                                                <option value="Expert">Expert</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="skills-append_container">
                                    <div class="row skills-section">

                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="addMoreskills"><i
                                        class="fa fa-plus"></i></button>
                            </div>
                            <!-- skills details end -->

                            <!-- languages details start -->
                            <div class="cv-block">
                                <div class="col-sm-12">
                                    <h4 class="tx-color-01 mg-b-5 mb-4 text-center">Add Languages</h4>
                                </div>
                                <div class="sol-sm-12">
                                    <h5 class="tx-color-01 mb-2 text-left">Only English Language</h5>
                                </div>
                                <div class="row education-section">

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Language Name (optional)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-language"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control " value="English"
                                                placeholder="Enter Language" name="language_name[]" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">English Certificateirtificate (optional)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <select id="language_professionalisms" name="cirtificate_type[]"
                                                class="form-control  w100p country-select" required>
                                                <option value="">--Select Certificate--</option>
                                                 <option value="English Proficiency Certificate">English Proficiency Certificate</option>
                                                <option value="IELTS">IELTS</option>
                                                <option value="PTE">PTE</option>
                                                <option value="TOEFL iBT">TOEFL iBT</option>
                                                <option value="TOEFL CBT">TOEFL CBT</option>
                                                <option value="TOEFL PBT">TOEFL PBT</option>
                                                <option value="Duolingo">Duolingo</option>
                                                <option value="Cambridge English Test">Cambridge English Test</option>
                                                <option value="Language Cert International ESOL">Language Cert
                                                    International ESOL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row" id="proficiency-container" style="display:none;">

                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="languages-append_container">
                                    <div class="row languages-section">

                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="addMorelanguages"><i
                                        class="fa fa-plus"></i></button>
                            </div>


                            {{--  Faizan Driving Liesence --}}


                            <!-- Driving Licence start -->
                            <div class="cv-block">
                                <div class="col-sm-12">
                                    <h4 class="tx-color-01 mg-b-5 mb-4 text-center">Add Driving Licence </h4>
                                </div>

                                <div class="row education-section" id="licence-append-container">

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Select Licence
                                                Cateogory (optional)</label>

                                            <select name="driving_licence[]"
                                                class="form-control  w100p country-select" required>
                                                <option value="">Select Licence Category</option>
                                                <option value="LTV">LTV</option>
                                                <option value="HTV">HTV</option>
                                                <option value=" Moter Car & Moter Bike"> Moter Car & Moter Bike</option>
                                                <option value="I don't have it">I don't have it</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>

                                <button type="button" class="btn btn-primary" id="add-more-driving-licence"><i
                                        class="fa fa-plus"></i></button>
                            </div>

                            {{-- end of Licence section --}}



                            {{--  Faizan Hobies Liesence --}}


                            <!-- Hobies start -->
                            <div class="cv-block">
                                <div class="col-sm-12">
                                    <h4 class="tx-color-01 mg-b-5  text-center">Add Hobbies And Interest </h4>
                                    <h6 class="tx-color-01 mg-b-5 mb-4 text-center">Add at least three hobbies.</h6>
                                </div>

                                <div class="row education-section" id="hobbie-append-container">

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Enter Hobbie (optional)</label>

                                            <input type="text" class="form-control " value=""
                                                placeholder="Enter Hobbie or interes" name="hobbies[]">

                                        </div>
                                    </div>


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
                                <div class="row education-section">

                                <div class="col-sm-12 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Award Title (optional)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-building"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control "
                                                placeholder="Award Title" name="Awarded_title[]" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Awarded Date (optional)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="date" class="form-control "
                                                placeholder="Awarded Date" name="Awarded_date[]" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Institute Name (optional)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-book"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control "
                                                placeholder="Institute Name" name="awarded_uni_name[]"
                                                autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="experience-append_container">
                                    <div class="mt-5" id="appended-award-section">
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
                                <div class="row education-section">

                                <div class="col-sm-12 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label"> Title (optional) </label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-book"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control "
                                                placeholder="Project Title" name="project_title[]" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Start Date (optional)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="date" class="form-control "
                                                placeholder="Enter Project Starting Date" name="project_start_date[]"
                                                autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">End Date (optional)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="date" class="form-control  end-date"
                                                placeholder="Enter Project Starting Date" name="project_end_date[]"
                                                autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>


                                    

                                </div>


                                <div class="experience-append_container">
                                    <div class="" id="project-details-appended-container">
                                        <!-- experience form fields here as provided in your original code -->
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="add-more-projects"><i
                                        class="fa fa-plus"></i></button>
                            </div>

                            {{-- end of Honer and rewards section --}}


                            <input name="student_id"  type="hidden" id = "student-id" value="{{ $regId }}">
                            <!-- languages details end -->
                            <button id="register-button" type="submit"
                                class="btn btn-brand-02 btn-block save-changes">Submit</button>
                        </form>


                    </div>
                </div><!-- sign-wrapper -->
            </div><!-- media -->
        </div><!-- container -->
    </div><!-- content -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="//http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/"></script>
    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     document.getElementById("language_professionalisms").addEventListener("change", function() {
        //         const selectedValue = this.value;
        //         const proficiencyLevels = {
        //             "IELTS": [{
        //                     level: "B2",
        //                     score: "5.5-6.5"
        //                 },
        //                 {
        //                     level: "C1",
        //                     score: "7.0-8.0"
        //                 },
        //                 {
        //                     level: "C2",
        //                     score: "8.5-9.0"
        //                 }
        //             ],
        //             "PTE": [{
        //                     level: "B2",
        //                     score: "59-75"
        //                 },
        //                 {
        //                     level: "C1",
        //                     score: "76-84"
        //                 },
        //                 {
        //                     level: "C2",
        //                     score: "85-90"
        //                 }
        //             ],
        //             "TOEFL iBT": [{
        //                     level: "B2",
        //                     score: "87-109"
        //                 },
        //                 {
        //                     level: "C1",
        //                     score: "110-120"
        //                 }
        //             ],
        //             "TOEFL CBT": [{
        //                     level: "B2",
        //                     score: "227-269"
        //                 },
        //                 {
        //                     level: "C1",
        //                     score: "270-300"
        //                 }
        //             ],
        //             "TOEFL PBT": [{
        //                     level: "B2",
        //                     score: "567-636"
        //                 },
        //                 {
        //                     level: "C1",
        //                     score: "637-677"
        //                 }
        //             ],
        //             "Duolingo": [{
        //                     level: "B2",
        //                     score: "95-125"
        //                 },
        //                 {
        //                     level: "C1",
        //                     score: "130-155"
        //                 },
        //                 {
        //                     level: "C2",
        //                     score: "160"
        //                 }
        //             ],
        //             "Language Cert International ESOL": [{
        //                     level: "C2",
        //                     score: "Mastery"
        //                 },
        //                 {
        //                     level: "C1",
        //                     score: "Expert"
        //                 },
        //                 {
        //                     level: "B2",
        //                     score: "Communicator"
        //                 }
        //             ],
        //             "Cambridge English Test": [{
        //                     level: "B2",
        //                     score: "162-176"
        //                 },
        //                 {
        //                     level: "C1",
        //                     score: "185-200"
        //                 },
        //                 {
        //                     level: "C2",
        //                     score: "205-209+"
        //                 }
        //             ],
        //             "English Proficiency Certificate": [{
        //                 level: "B2",
        //                     score: "162-176"
        //                 },
        //                 {
        //                     level: "C1",
        //                     score: "185-200"
        //                 },
        //                 {
        //                     level: "C2",
        //                     score: "205-209+"
        //                 }
        //             ]
        //         };

        //         const proficiencyContainer = document.getElementById("proficiency-container");
        //         proficiencyContainer.innerHTML = ""; // Clear previous content

        //         if (selectedValue && proficiencyLevels[selectedValue]) {
        //             proficiencyContainer.style.display = "flex";

        //             // Create a row for each skill
        //             const skills = ["Listening", "Reading", "Spoken Interaction", "Spoken Production",
        //                 "Writing", "Overall"
        //             ];

        //             skills.forEach(skill => {
        //                 const div = document.createElement("div");
        //                 div.className = "col-sm-6 mb-3";

        //                 const select = document.createElement("select");
        //                 select.className =
        //                     `language_${skill.toLowerCase().replace(" ", "_")} form-control certificate-select`;
        //                 select.name =
        //                     `language_${skill.toLowerCase().replace(" ", "_")}[]`; // Add name attribute

        //                 // Add default option
        //                 const defaultOption = document.createElement("option");
        //                 defaultOption.value = "";
        //                 defaultOption.textContent = "Select Level"; // Default option text
        //                 select.appendChild(defaultOption);

        //                 // Populate the select with options
        //                 proficiencyLevels[selectedValue].forEach(level => {
        //                     const option = document.createElement("option");
        //                     option.value = level.level;
        //                     option.textContent = `${level.level} (${level.score})`;
        //                     select.appendChild(option);
        //                 });

        //                 div.innerHTML = `<label class="resume-form-label">${skill}</label>`;
        //                 div.appendChild(select);
        //                 proficiencyContainer.appendChild(
        //                     div); // Append the skill select to the container
        //             });
        //         } else {
        //             proficiencyContainer.style.display = "none";
        //         }
        //     });
        // });
        
        
         document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("language_professionalisms").addEventListener("change", function() {
        const selectedValue = this.value;
        const proficiencyContainer = document.getElementById("proficiency-container");
        proficiencyContainer.innerHTML = ""; // Clear previous content

        const proficiencyLevels = {
            "IELTS": [
                { level: "A0", score: "1.0" },
                { level: "A1", score: "2.0-2.5" },
                { level: "A2", score: "3.0-3.5" },
                { level: "B1", score: "4.0-5.0" },
                { level: "B2", score: "5.5-6.5" },
                { level: "C1", score: "7.0-8.0" },
                { level: "C2", score: "8.5-9.0" }
            ],
            "PTE": [
                        // {
                        //         level: "A0",
                        //         score: "59-75"
                        //     },
                            {
                                level: "A1",
                                score: "10-29"
                            },
                            {
                                level: "A2",
                                score: "30-42"
                            },
                            {
                                level: "B1",
                                score: "43-58"
                            },
                            {
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

                    "TOEFL CBT": [ {
                                level: "A1",
                                score: "0-119"
                            },
                            {
                                level: "A2",
                                score: "120-162"
                            },
                            {
                                level: "B1",
                                score: "163-226"
                            },
                            {
                                level: "B2",
                                score: "227-269"
                            },
                            {
                                level: "C1",
                                score: "270-300"
                            }
                    ],
                    "Duolingo": [ {
                            level: "B1",
                            score: "10-90"
                        },
                        {
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
                    "Language Cert International ESOL": [ {
                            level: "A1",
                            score: "A1 Preliminary"
                        },
                        {
                            level: "A2",
                            score: "A2 Access"
                        },
                        {
                            level: "B1",
                            score: "B1 Achiever"
                        },
                        {
                            level: "B2",
                            score: "B2 Communicator"
                        },
                        {
                            level: "C1",
                            score: "C1 Expert"
                        },
                        {
                            level: "C2",
                            score: "C2 Mastery"
                        }
                    ],
                    "Cambridge English Test": [ {
                        level: "A1",
                        score: "100-119"
                    },
                    {
                        level: "A2",
                        score: "120-139"
                    },
                    {
                        level: "B1",
                        score: "140-159"
                    },
                    {
                        level: "B2",
                        score: "160-179"
                    },
                    {
                        level: "C1",
                        score: "180-199"
                    },
                    {
                        level: "C2",
                        score: "200-230"
                    }
                    ],
                    "TOEFL PBT": [ {
                            level: "A1",
                            score: "310-432"
                        },
                        {
                            level: "A2",
                            score: "433-486"
                        },
                        {
                            level: "B1",
                            score: "487-566"
                        },
                        {
                            level: "B2",
                            score: "567-636"
                        },
                        {
                            level: "C1",
                            score: "637-677"
                        }
                    ],
                    "English Proficiency Certificate": [{
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
                    ],
            
            "TOEFL iBT": {
                main: [
                    { level: "A1", score: "0-39" },
                    { level: "A2", score: "40-56" },
                    { level: "B1", score: "57-86" },
                    { level: "B2", score: "87-109" },
                    { level: "C1", score: "110-120" }
                ],
                subTables: {
                    "Reading": [
                        { level: "A2", score: "0-3" },
                        { level: "B1", score: "4-17" },
                        { level: "B2", score: "18-23" },
                        { level: "C1", score: "24-30" }
                    ],
                    "Listening": [
                        { level: "A2", score: "0-8" },
                        { level: "B1", score: "9-16" },
                        { level: "B2", score: "17-21" },
                        { level: "C1", score: "22-30" }
                    ],
                    "Speaking": [
                        { level: "A1", score: "0-9" },
                        { level: "A2", score: "10-15" },
                        { level: "B1", score: "16-19" },
                        { level: "B2", score: "20-24" },
                        { level: "C1", score: "25-30" }
                    ],
                    "Writing": [
                        { level: "A1", score: "0-6" },
                        { level: "A2", score: "7-12" },
                        { level: "B1", score: "13-16" },
                        { level: "B2", score: "17-23" },
                        { level: "C1", score: "24-30" }
                    ]
                   
                }
            }
        };

        if (selectedValue && proficiencyLevels[selectedValue]) {
            proficiencyContainer.style.display = "flex";

            // If TOEFL iBT is selected, handle main levels and sub-tables separately
           if (selectedValue === "TOEFL iBT") {
    // Sub-tables for TOEFL iBT (Reading, Listening, Speaking, Writing)
    for (const [subTableName, subTableLevels] of Object.entries(proficiencyLevels["TOEFL iBT"].subTables)) {
        const subTableDiv = document.createElement("div");
        subTableDiv.className = "col-sm-6 mb-3";
        subTableDiv.innerHTML = `<label class="resume-form-label">TOEFL iBT - ${subTableName}</label>`;

        const subTableSelect = document.createElement("select");
        subTableSelect.className = "form-control certificate-select";
        subTableSelect.name = `language_${subTableName.toLowerCase()}[]`;

        const defaultSubOption = document.createElement("option");
        defaultSubOption.value = "";
        defaultSubOption.textContent = "Select Level";
        subTableSelect.appendChild(defaultSubOption);

        subTableLevels.forEach(level => {
            const option = document.createElement("option");
            option.value = level.level;
            option.textContent = `${level.level} (${level.score})`;
            subTableSelect.appendChild(option);
        });

        subTableDiv.appendChild(subTableSelect);
        proficiencyContainer.appendChild(subTableDiv);
    }

    // Main TOEFL iBT Scores (Overall)
    const mainDiv = document.createElement("div");
    mainDiv.className = "col-sm-6 mb-3";
    mainDiv.innerHTML = `<label class="resume-form-label">TOEFL iBT - Overall</label>`;

    const mainSelect = document.createElement("select");
    mainSelect.className = "form-control certificate-select";
    mainSelect.name = "language_overall[]";

    const defaultOption = document.createElement("option");
    defaultOption.value = "";
    defaultOption.textContent = "Select Level";
    mainSelect.appendChild(defaultOption);

    proficiencyLevels["TOEFL iBT"].main.forEach(level => {
        const option = document.createElement("option");
        option.value = level.level;
        option.textContent = `${level.level} (${level.score})`;
        mainSelect.appendChild(option);
    });

    mainDiv.appendChild(mainSelect);
    proficiencyContainer.appendChild(mainDiv);
}
 else {
                // For other language tests, display general proficiency levels
                const skills = ["Listening", "Reading", "Speaking", "Writing", "Overall"];
                skills.forEach(skill => {
                    const div = document.createElement("div");
                    div.className = "col-sm-6 mb-3";

                    const select = document.createElement("select");
                    select.className = `language_${skill.toLowerCase().replace(" ", "_")} form-control certificate-select`;
                    select.name = `language_${skill.toLowerCase().replace(" ", "_")}[]`;

                    const defaultOption = document.createElement("option");
                    defaultOption.value = "";
                    defaultOption.textContent = "Select Level";
                    select.appendChild(defaultOption);

                    proficiencyLevels[selectedValue].forEach(level => {
                        const option = document.createElement("option");
                        option.value = level.level;
                        option.textContent = `${level.level} (${level.score})`;
                        select.appendChild(option);
                    });

                    div.innerHTML = `<label class="resume-form-label">${skill}</label>`;
                    div.appendChild(select);
                    proficiencyContainer.appendChild(div);
                });
            }
        } else {
            proficiencyContainer.style.display = "none";
        }
    });
});

    </script>


    <script>
        $(document).ready(function() {
            
              $('#language_professionalisms').change(function() {
    var selectedValue = $(this).val();
    var certificateSelect = $('.certificate-select');

    if (selectedValue === 'English Proficiency Certificate') {
        // Prevent changes to the select, simulating "readonly"
        certificateSelect.val('B2'); // Set the value to "B2"
        certificateSelect.addClass('invisible-select');
        certificateSelect.prop('readonly', true); // Mark the element as readonly-like
        certificateSelect.on('mousedown', function(e) {
            e.preventDefault(); // Prevent selection change on click
        });
    } else {
        // Enable selection and remove readonly-like behavior
        certificateSelect.prop('readonly', false); // Remove readonly-like behavior
        certificateSelect.off('mousedown'); // Allow selection change
        certificateSelect.removeClass('invisible-select');
        certificateSelect.val(''); // Reset the select value
    }
});

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
                $('.current-education-present-button').data('current_count',
                currentCount); // Set the updated value
                $(this).attr('data-current_count', currentCount); // Update the attribute in the DOM
                console.log(currentCount);

                var newEducationSection = `
        <div class="row mt-4" id = "education-row${currentCount}">
            <div class="col-sm-6 mb-3">
                <div class="input-group">
                <label for="" class="resume-form-label">Degree Name*</label>
                  <div class="input-group-prepend">
                    <div class="input-group-text input-icon student-login-icon">
                        <i class="fa fa-book"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control required_field " placeholder="Enter degree name" name="education_degree_name[]" autocomplete="off">
                </div>
            </div>

            <div class="col-sm-6 mb-3">
              <div class="input-group">
                <label for="" class="resume-form-label">Institute Name*</label>
                  <div class="input-group-prepend">
                    <div class="input-group-text input-icon student-login-icon">
                        <i class="fa fa-building"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control required_field " placeholder="Enter institute name" name="education_university_name[]" autocomplete="off">
              </div>
            </div>

            <div class="col-sm-6 mb-3">
              <label for="" class="resume-form-label">City*</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text input-icon student-login-icon">
                        <i class="fa fa-home"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control required_field " placeholder="Enter City" name="education_city[]" autocomplete="off">
                </div>
            </div>

            <div class="col-sm-6 mb-3">
              <div class="input-group">
              <label for="" class="resume-form-label">Country*</label>
              <div class="input-group-prepend">
                  <div class="input-group-text input-icon student-login-icon">
                    <i class="fa fa-flag"></i>
                  </div>
                </div>
                <select name="education_country[]" class="form-control required_field  w100p country-select">
                  <option selected=""> Select Country </option>
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
                              <label for="" class="resume-form-label">Total Marks/CGPA*</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                  </div>
                                  <input type="number" class="form-control required_field " placeholder="Total Marks" name="education_total_marks[]" autocomplete="off" step="0.01" min="0"  >
                                 
                                  <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                    <span v-text="error"></span>
                                  </div>
                                </div>
                              </div>
            <div class="col-sm-6 mb-3">
                <div class="input-group">
                <label for="" class="resume-form-label">Start Date*</label>
                  <div class="input-group-prepend">
                    <div class="input-group-text input-icon student-login-icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                  </div>
                  <input type="date" class="form-control required_field " placeholder="Enter start date" name="education_start_date[]" autocomplete="off">
                </div>
            </div>

            <div class="col-sm-6 mb-3" id= "end-date-education-container">
                <div class="input-group">
                <label for="" class="resume-form-label">End Date*</label>
                  <div class="input-group-prepend">
                    <div class="input-group-text input-icon student-login-icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                  </div>
                  <input type="date" class="form-control end-date education-end-date-input" placeholder="Enter end date" name="education_end_date[]" autocomplete="off">
                </div>
                <input type="hidden" class="form-control education-end-date" id="present-education-hidden-field"
                                                    placeholder="Enter Degree" name="education_present[]"
                                                    autocomplete="off" value= 0>
            </div>


                              <div class="col-sm-6 mb-3">
                    <div class="input-group">
                      <label for="" class="resume-form-label">Institute Link* </label>
                    
                      <input type="tyest" class="form-control required_field " placeholder="Enter University institute Link" name="education_university_web_link[]"
                        autocomplete="off">

                      <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                        <span v-text="error"></span>
                      </div>
                    </div>
                  </div>



                     <div class="col-sm-12 my-3">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox"
                                                class="custom-control-input current-education-present-button"
                                                id="current-education-present-button${ currentCount }"
                                                data-current_count="${ currentCount }"
                                                >
                                            <label class="custom-control-label"
                                                for="current-education-present-button${ currentCount }">Currently Studying</label>
                                        </div>
                                    </div>



                  
          
                              
                                <!-- Add delete button for the row -->
                            <div class="col-sm-12 mb-3">
                                <button type="button" class="btn-danger delete-education-row" data-row-id="education-row${currentCount}">Delete</button>
                            </div>
        </div>`;

                // Append the new education section to the container
                $('.education-append_container').append(newEducationSection);
                
                 $('.delete-education-row').off('click').on('click', function() {
                    var rowId = $(this).data('row-id');  // Get the ID of the row to delete
                    $('#' + rowId).remove();  // Remove the row
                });
            });



            $('#addMoreexperience').click(function() {


                // Define the HTML content for the new education section
                var currentCount = $(this).data('current_count');
                // Increment the count
                currentCount += 1;
                // Update the data attribute

                $(this).data('current_count', currentCount); // Set the updated value
                $('.current-experience-present-button').data('current_count',
                currentCount); // Set the updated value
                $(this).attr('data-current_count', currentCount); // Update the attribute in the DOM
                console.log(currentCount);

                // Define the HTML content for the new education section
                var newExperienceSection = `    
                          <div class="row experience-section my-2 py-2" id="experience-row${currentCount}">
                            
                            <div class="col-sm-6 mb-3">
                                <div class="input-group">
                                <label for="" class="resume-form-label">Position (optional)</label>
                                  <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-book"></i>
                                    </div>
                                  </div>
                                  <input type="text" class="form-control " placeholder="Position Name" name="experience_position[]" autocomplete="off" >
                                 
                                  <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                    <span v-text="error"></span>
                                  </div>
                                </div>
                              </div>

                              <div class="col-sm-6 mb-3">
                              <div class="input-group">
                                <label for="" class="resume-form-label">Employer (optional)</label>
                                  <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-building"></i>
                                    </div>
                                  </div>
                                  <input type="text" class="form-control " placeholder="Company Name" name="experience_employer[]" autocomplete="off" >
                                 
                                  <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                    <span v-text="error"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6 mb-3">
                              <label for="" class="resume-form-label">City (optional)</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                  </div>
                                  <input type="text" class="form-control " placeholder="Enter City" name="experience_city[]" autocomplete="off" >
                                 
                                  <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                    <span v-text="error"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6 mb-3">
                              <div class="input-group">
                              <label for="" class="resume-form-label">Country (optional)</label>
                              <div class="input-group-prepend">
                                  <div class="input-group-text input-icon student-login-icon">
                                    <i class="fa fa-flag"></i>
                                  </div>
                                </div>
                                <select name="experience_country[]" class="form-control  w100p country-select">
                                  <option selected=""> Select Country</option>
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
                                <label for="" class="resume-form-label">Start Date (optional)</label>
                                  <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                  </div>
                                  <input type="date" class="form-control " placeholder="Enter Degree" name="experience_start_date[]" autocomplete="off" >
                                 
                                  <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                    <span v-text="error"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6 mb-3" id="experience-end-date-container">
                                <div class="input-group">
                                <label for="" class="resume-form-label">End Date (optional)</label>
                                  <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                  </div>
                                  <input type="date" class="form-control experience-end-date-input-field" placeholder="Enter Degree" name="experience_end_date[]" autocomplete="off" >
                                 <input type="hidden" class="form-control experence-hidden-end-date"
                                                    id="present-hidden-field" placeholder="Enter Degree"
                                                    name="experience_present[]" autocomplete="off"
                                                    value=0>


                                                    
                                  <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                    <span v-text="error"></span>
                                  </div>
                                </div>
                              </div>

                               <div class="col-sm-12 my-3">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox"
                                                    class="custom-control-input current-experience-present-button"
                                                    id="current-experience-present-button${ currentCount }"
                                                    data-current_count="${ currentCount }"
                                                   >
                                                <label class="custom-control-label"
                                                    for="current-experience-present-button${ currentCount }">Currently Working</label>
                                            </div>
                                </div>


                                
                               
                              
                                <!-- Add delete button for the row -->
                            <div class="col-sm-12 mb-3">
                                <button type="button" class="btn-danger delete-experience-row" data-row-id="experience-row${currentCount}">Delete</button>
                            </div>
                             
                          </div>`;

                // Append the new education section to the container
                $('#experience-append_container').append(newExperienceSection);
                
                 $('.delete-experience-row').off('click').on('click', function() {
                    var rowId = $(this).data('row-id');  // Get the ID of the row to delete
                    $('#' + rowId).remove();  // Remove the row
                });
            });


            $('#addMoreskills').click(function() {
                // Generate a unique ID for each new skills section (using timestamp or a counter)
                    var timestamp = new Date().getTime();

                var newskillsSection = `                
                          <div class="row skills-section my-2 py-2" id="skills-section-${timestamp}">
                             <div class="col-sm-6 mb-3">
                                <div class="input-group">
                                  <label for="" class="resume-form-label">Skill Name (optional)</label>
                                  <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-book"></i>
                                    </div>
                                  </div>
                                  <input type="text" class="form-control " placeholder="Enter Skill" name="skill_name[]" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="input-group">
                                  <label for="" class="resume-form-label">Skill Lavel (optional)</label>
                                  <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-star"></i>
                                    </div>
                                  </div>
                                  <select name="skill_perofessionlism[]" class="form-control  w100p country-select">
                                    <option  value="Basic">Basic</option>
                                    <option  value="Intermediate">Intermediate</option>
                                    <option  value="Expert">Expert</option>
                                  </select>
                                </div>
                            </div>
                              <div class="col-sm-12 mb-3">
                                    <button type="button" class="btn-danger delete-skill" data-skill-id="skills-section-${timestamp}">Delete</button>
                                </div>
                         </div>`;

                // Append the new education section to the container
                $('.skills-append_container').append(newskillsSection);
                $('.delete-skill').off('click').on('click', function() {
                    var skillId = $(this).data('skill-id'); // Get the ID of the skills section to delete
                    $('#' + skillId).remove(); // Remove the skills section
                });
            });




            $('#addMorelanguages').click(function() {
                var timestamp = new Date().getTime();
                var newlanguagesSection = `     
                
                <div class="row languages-section my-2 py-2" id="language-section-${timestamp}">
                    <div class="col-sm-6 mb-3">
                        <div class="input-group">
                            <label for="" class="resume-form-label">Language Name (optional)</label>
                            <div class="input-group-prepend">
                                <div class="input-group-text input-icon student-login-icon">
                                    <i class="fa fa-language"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control " placeholder="Enter Language" name="other_language_name[]" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="input-group">
                            <label for="" class="resume-form-label">Language Proficiency (optional)</label>
                            <div class="input-group-prepend">
                                <div class="input-group-text input-icon student-login-icon">
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <select name="other_language_professionalism[]" class="form-control  w100p country-select">
                                <option value="">--Select Professionalism--</option>
                                <option value="Basic">Basic</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Expert">Expert</option>
                            </select>
                        </div>
                    </div>
                      <div class="col-sm-12 mb-3">
                        <button type="button" class="btn-danger delete-language" data-language-id="language-section-${timestamp}">Delete</button>
                       </div>
                </div>
            `;

                // Append the new language section to the container
                $('.languages-append_container').append(newlanguagesSection);
                 $('.delete-language').off('click').on('click', function() {
                    var languageId = $(this).data('language-id'); // Get the ID of the skills section to delete
                    $('#' + languageId).remove(); // Remove the skills section
                });
            });


            //  ==============================================================
            //  =============================== faizan ======================= 
            //  ==============================================================

            $('#add-more-driving-licence').click(function() {
                var timestamp = new Date().getTime();
                var newlanguagesSection = `
  
  
                      
                        <div class="col-sm-6 mb-3" id="driving-section-${timestamp}">
                          <div class="input-group" style="position: relative;">
                            <label for="" class="resume-form-label">Select Licence Cateogory (optional)</label>
                            
                            <select  name="driving_licence[]" class="form-control  w100p country-select" required>
                            <option value="">Select Licence Category</option>
                           <option value="LTV">LTV</option>
                            <option value="HTV">HTV</option>
                            <option value=" Moter Car & Moter Bike"> Moter Car & Moter Bike</option>
                            </select>
                            <button type="button" class="btn-danger delete-driving fa fa-minus" data-driving-id="driving-section-${timestamp}" style="position: absolute; top: 5px; right: 25px;"></button> 
                          </div>
                        </div>
                        
                            `;

                // Append the new liecence  section to the container
                $('#licence-append-container').append(newlanguagesSection);
                 $('.delete-driving').off('click').on('click', function() {
                    var drivingId = $(this).data('driving-id'); // Get the ID of the skills section to delete
                    $('#' + drivingId).remove(); // Remove the skills section
                });
            });





            $('#add-more-hobbies').click(function() {
                var timestamp = new Date().getTime();   
                var newhobieSection = `

                                    <div class="col-sm-6 mb-3" id="hobbie-section-${timestamp}">
                                        <div class="input-group" style="position: relative;">

                                                                      <label for="" class="resume-form-label"> Hobbie (optional)</label>


                                            <input type="text" class="form-control " value=""
                                                placeholder="Enter Hobbie or interes" name="hobbies[]">
                                                 <button type="button" class="btn-danger delete-hobbie fa fa-minus" data-hobbie-id="hobbie-section-${timestamp}" style="position: absolute; top: 5px; right: 0;"></button> 

                                        </div>
                                    </div>
                                    

                                
                            `;

                // Append the Hobbie  section to the container
                $('#hobbie-append-container').append(newhobieSection);
                $('.delete-hobbie').off('click').on('click', function() {
                    var hobbieId = $(this).data('hobbie-id'); // Get the ID of the skills section to delete
                    $('#' + hobbieId).remove(); // Remove the skills section
                });
            });




            $('#add-more-awards').click(function() {
                 var timestamp = new Date().getTime();     
                var newAwardSection = `
                                     <div class="row experience-section my-2 py-2" id="awards-section-${timestamp}"> 
                                      <div class="col-sm-12 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Award Title</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-building"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control required_field " placeholder="Award Title"
                                                name="Awarded_title[]" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                      <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Awarded Date</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="date" class="form-control required_field " placeholder="Awarded Date"
                                                name="Awarded_date[]" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Institute Name</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-book"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control required_field " placeholder="Institute Name"
                                                name="awarded_uni_name[]" autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>


                                   
                                    
                                      <!-- Add delete button for the row -->
                            <div class="col-sm-12 mb-3">
                                    <button type="button" class="btn-danger delete-awards" data-awards-id="awards-section-${timestamp}">Delete</button>
                                </div>
                                </div>
                                   
                                
                            `;
                // Append the new liecence  section to the container
                $('#appended-award-section').append(newAwardSection);
                 $('.delete-awards').off('click').on('click', function() {
                    var awardsId = $(this).data('awards-id'); // Get the ID of the skills section to delete
                    $('#' + awardsId).remove(); // Remove the skills section
                });
            });





            $('#add-more-projects').click(function() {
                var timestamp = new Date().getTime(); 
                var newAwardSection = `
                                     <div class="row experience-section mt-3" id="project-section-${timestamp}"> 
                                      <div class="col-sm-12 mb-3">
                                        <div class="input-group">
                                            <label for="" class="resume-form-label">Title </label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text input-icon student-login-icon">
                                                    <i class="fa fa-book"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control required_field " placeholder="Position Name"
                                                name="project_title[]" autocomplete="off">

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
                                            <input type="date" class="form-control required_field " placeholder="Enter Degree"
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
                                            <input type="date" class="form-control required_field  end-date"
                                                placeholder="Enter Degree" name="project_end_date[]"
                                                autocomplete="off">

                                            <div class="reg-error-msg" v-if="errors.country"
                                                v-for="error in errors.country">
                                                <span v-text="error"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-12 mb-3">
                                        <button type="button" class="btn-danger delete-project" data-project-id="project-section-${timestamp}">Delete</button>
                                    </div>
                            </div> 



                                    
                                
                            `;
                // Append the more projects to the container
                $('#project-details-appended-container').append(newAwardSection);
                 $('.delete-project').off('click').on('click', function() {
                    var projectId = $(this).data('project-id'); // Get the ID of the skills section to delete
                    $('#' + projectId).remove(); // Remove the skills section
                });
            });



            $('#resumeForm').on('submit', function(e) {

                e.preventDefault(); // Prevent form from reloading the page

                var resumeId = $('#student-id').val();
                var formData = new FormData(this); // Get form data including file inputs
                $.ajax({
                    url: '{{ route('resume-store') }}', // Set this to your backend route
                    method: 'POST',
                    data: formData,
                    contentType: false, // Needed for FormData
                    processData: false, // Prevent jQuery from processing data
                    success: function(response) {
                        // Handle success - show a message, etc.
                        $('#resumeForm')[0].reset(); // Reset the form

                        // Show success message
                    
                        var url = `{{ url('resume') }}?i=${resumeId}`;

                        window.location.href = url;
                        alert('Resume submitted successfully!');
                        $('#resumeForm')[0].reset(); // Reset the form

                    },
                    error: function(xhr, status, error) {

                        console.log(error)
                        var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : error;
                        alert('An error occurred: ' + errorMessage);
                        
                    }
                });
            });




            function validate_fields() {
                var bool = true;
                $(".required_field").each(function(index, value) {
                    if ($(value).val() == "") {
                        $(value).addClass("validation-failed");
                        bool = false;
                    } else {
                        $(value).removeClass("validation-failed");
                    }
                });
                return bool;
            }






            $(document).on("click", ".save-changes", function(e) {
                e.preventDefault();
                if (validate_fields()) {
                    $(this).parents('form:first').submit();
                }
            });









            $('body').on('click', '.current-education-present-button', function() {
                // present-education-hidden-field
                var current_count = $(this).attr('data-current_count');
                console.log("current count of education : " + current_count);
                if ($(this).is(':checked')) {
                    console.log("checked");
                    $('#education-row' + current_count).find('#end-date-education-container').find(
                        '.education-end-date-input').val('');
                    $('#education-row' + current_count).find('#end-date-education-container').find(
                        '.education-end-date-input').prop('readonly', true);
                    $('#education-row' + current_count).find('#end-date-education-container').find(
                        '#present-education-hidden-field').val(1);


                } else {
                    console.log("un checked");

                    $('#education-row' + current_count).find('#end-date-education-container').find(
                        '.education-end-date-input').prop('readonly', false);
                    $('#education-row' + current_count).find('#end-date-education-container').find(
                        '#present-education-hidden-field').val(0);


                }
            });


            $('body').on('click', '.current-experience-present-button', function() {
                var current_count = $(this).attr('data-current_count');
                console.log("current count of experience : " + current_count);


                if ($(this).is(':checked')) {
                    var $endDateInput = $('#experience-row' + current_count).find(
                        '#experience-end-date-container').find('.experience-end-date-input-field').val(
                        '');
                    $('#experience-row' + current_count).find('#experience-end-date-container').find(
                        '.experience-end-date-input-field').prop('readonly', true);
                    $('#experience-row' + current_count).find('#experience-end-date-container').find(
                        '.experence-hidden-end-date').val(1);


                } else {
                    $('#experience-row' + current_count).find('#experience-end-date-container').find(
                        '.experence-hidden-end-date').val(0);
                    $('#experience-row' + current_count).find('#experience-end-date-container').find(
                        '.experience-end-date-input-field').prop('readonly', false);


                }
            });


            //     $('.word-limit').on('input', function () {
            //     var text = $(this).val().trim();
            //     var words = text.split(/\s+/).filter(function (word) {
            //         return word.length > 0;
            //     });

            //     var errorMsg = $(this).closest('.input-group').find('.word-count-error');

            //     // Check if word count exceeds the limit
            //     if (words.length > 200) {
            //         // Trim to the first 200 words
            //         $(this).val(words.slice(0, 200).join(' '));
            //         errorMsg.show();
            //     } else {
            //         errorMsg.hide();
            //     }
            // });







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

            //  ==============================================================



            $('.toggle-switch').on('change', function() {
                // Find the closest .end-date input field and toggle the disabled property
                $(this).closest('.row').find('.end-date').prop('disabled', this.checked);
            });
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            $('#resumeForm').on('submit', function(e) {

                // e.preventDefault(); // Prevent form from reloading the page
                e.preventDefault();

                var formData = new FormData(this); // Get form data including file inputs
                $.ajax({
                    url: '{{ route('resume-store') }}', // Set this to your backend route
                    method: 'POST',
                    data: formData,
                    contentType: false, // Needed for FormData
                    processData: false, // Prevent jQuery from processing data
                    success: function(response) {
                        // Handle success - show a message, etc.
                        alert('Resume submitted successfully!');
                        console.log(response);
                        alert(response);
                        $('#resumeForm')[0].reset(); // Reset the form

                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : error;
                        alert('An error occurred: ' + errorMessage);
                    }
                });
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
    </script> --}}
@endsection
