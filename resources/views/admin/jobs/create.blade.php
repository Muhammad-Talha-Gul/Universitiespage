@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/jquery.filer/css/jquery.filer.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/summernote/summernote.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
<link href="{{asset("plugins/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<style>
    .sq-box {
        width: 42px;
        background: lightgray;
        height: 38px;
        position: absolute;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
        text-align: center;
        padding-top: 8px;
        font-weight: bolder;
        top: 0px;
        right: 10px
    }

    .form-control {
        margin-bottom: 10px;
    }

    .register-main {
        max-width: 800px;
        margin: 40px auto;
    }

    .bootstrap-tagsinput {
        margin: 0;
        width: 100%;
        padding: 0.5rem 0.75rem 0;
        font-size: 1rem;
        line-height: 1.25;
        transition: border-color 0.15s ease-in-out;

        &.has-focus {
            background-color: #fff;
            border-color: #5cb3fd;
        }

        .label-info {
            margin-right: 2px;
    color: white;
    font-size: 14px;
        }

        input {
            margin-bottom: 0.5em;
        }
    }

    .bootstrap-tagsinput .tag [data-role="remove"]:after {
        content: '\00d7';
    }
    .tag-input-main input{
        min-height: 26px;
        font-size: 14px;
    }
</style>
@endsection
@section('content')
@if(check_access(Auth::user()->id,'admin','_create')==1)
<div class="container">\
    <div class="row">

        <div class="col-md-12" id="admin-registration">
            <form method="POST" action="{{'job-post'}}">
                {{csrf_field()}}
                <!-- <input type="hidden" name="user_type" value="admin"> -->
                <div class="card-box table-responsive">
                    <div class="tabs-vertical-env products-form">
                        <div class="" style="width: 100%">
                            <div class="register-main">
                                <h4 class="page-title text-center mb-6">Add New job</h4>
                                <div class="row">

                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="register-form-main">
                                                @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="">Job Title</label>
                                                            <input type="text" class="form-control" name="title" placeholder="Enter Job Title" value="{{ old('title') }}">
                                                            @if ($errors->has('title'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('title') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Job Type</label>
                                                            <select class="form-select form-control" name="job_type" aria-label="Default select example">
                                                                <option selected disabled>Select Type</option>
                                                                <option value="Full Time">Full Time</option>
                                                                <option value="Part Time">Part Time</option>
                                                                <option value="Contract">Contract Based</option>
                                                            </select>
                                                            @if ($errors->has('job_type'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('job_type') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="">City</label>
                                                            <input type="text" class="form-control" name="city" placeholder="Enter City" value="{{ old('city') }}">
                                                            @if ($errors->has('city'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('city') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="">Previunce</label>
                                                            <input type="text" class="form-control" name="province" placeholder="Enter Province" value="{{ old('province') }}">
                                                            @if ($errors->has('province'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('province') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="">Country</label>
                                                            <input type="text" class="form-control" name="country" placeholder="Enter Country" value="{{ old('country') }}">
                                                            @if ($errors->has('country'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('country') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                            <label class="control-label">Job Based</label>
                                                            <select class="form-select form-control" name="site_based" aria-label="Default select example">
                                                                <option selected disabled>Select job Based</option>
                                                                <option value="onsite">Onsite</option>
                                                                <option value="remote">Remote</option>
                                                            </select>
                                                            @if ($errors->has('site_based'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('site_based') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group tag-input-main">
                                                            <label for="input" class="col-2 col-form-label">Add Skills</label>
                                                            <input type="text" name="skills" class="form-control tabg-input" placeholder="Enter Skills Tag With Comma and Enter" style="height: 100%; width:100%;">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="">Experience</label>
                                                            <input type="text" class="form-control" name="experience" placeholder="Enter City" value="{{ old('experience') }}">
                                                            @if ($errors->has('experience'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('experience') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12">
                                                        <div class="form-group{{ $errors->has('requirements') ? ' has-error' : '' }}">
                                                            <label class="control-label">Requirments</label>
                                                            <textarea class="form-control textarea-editor" rows="10" cols="12" name="requirements"></textarea>
                                                            @if ($errors->has('requirements'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('requirements') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12">
                                                        <div class="form-group{{ $errors->has('responsibilities') ? ' has-error' : '' }}">
                                                            <label class="control-label">Resposibilities</label>
                                                            <textarea class="form-control textarea-editor" rows="10" cols="12" name="responsibilities"></textarea>
                                                            @if ($errors->has('responsibilities'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('responsibilities') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12">
                                                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                                            <label class="control-label">Details</label>
                                                            <textarea class="form-control textarea-editor" rows="10" cols="12" name="description" placeholder="Enter Job Details"></textarea>
                                                            @if ($errors->has('description'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('description') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-4 text-center">
                                                        <button type="Post" class="btn btn-primary mb-2 w100p submit-btn">Register</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </form>
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
<script src="{{asset("plugins/select2/js/select2.min.js")}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<script src="//http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/"></script>
<script>
    var registerValidate = new Vue({
        el: '#admin-registration',
        data: {
            url: "{{ route('admin-register-submit') }}", // Update to admin registration route
            baseUrl: '{{ preg_match("~\b(university/|courses)\b~i",url()->current()) ? url()->current() : url("/") . "/dashboard" }}',
            list: {
                user_type: 'admin', // Set user_type to 'admin'
                first_name: '',
                last_name: '',
                email: '',
                password: '',
                password_confirmation: '',
                phone: '',
                gender: 'male',
                country: '',
                prefer: '',
                terms: '',
                _token: '{{ csrf_token() }}',
            },
            errors: {},
            counter: 1,
        },
        methods: {
            submitReg(event) {
                event.preventDefault();
                var _this = this;
                if (!$('.t_loader').is(':visible')) {
                    $('.t_loader').fadeIn(200);
                }
                axios.post(_this.url, _this.list)
                    .then(response => {
                        window.location.href = _this.baseUrl;
                    }).catch(error => {
                        _this.errors = error.response.data.errors;
                        setTimeout(() => {
                            _this.errors = {};
                        }, 5000);
                        if (_this.counter < 5) {
                            _this.submitReg(event);
                            _this.counter++;
                        } else {
                            if ($('.t_loader').is(':visible')) {
                                $('.t_loader').fadeOut(200);
                            }
                        }
                    });
            },
        },
        mounted() {
            var _this = this;
            $(document).ready(function() {
                $('.prefer-select').on('click', function() {
                    var val = $(this).val();
                    _this.list.prefer = val;
                });
                $('.country-select').on('click', function() {
                    var val = $(this).val();
                    _this.list.country = val;
                });
            });
        },
    });
</script>
<script>
    $(document).ready(function() {

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
    document.querySelectorAll('.textarea-editor').forEach((editor) => {
        ClassicEditor
            .create(editor)
            .catch(error => {
                console.error(error);
            });
    });
</script>



@endsection