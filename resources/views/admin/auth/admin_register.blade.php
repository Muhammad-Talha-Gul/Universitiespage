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
        max-width: 500px;
        margin: 40px auto;
    }
</style>
@endsection
@section('content')
@if(check_access(Auth::user()->id,'admin','_create')==1)
<div class="container">
    <div class="row">
    
        <div class="col-md-12"  id="admin-registration">
            <form method="POST" action="{{ route('admin-register-submit') }}">
                {{csrf_field()}}
                <!-- <input type="hidden" name="user_type" value="admin"> -->
                <div class="card-box table-responsive">
                    <div class="tabs-vertical-env products-form">
                        <div class="" style="width: 100%">
                            <div class="register-main">
                            <h4 class="page-title text-center mb-6">Create New Account </h4>
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
                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label">First Name</label>
                                                            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Last Name</label>
                                                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                            <label class="control-label">Email</label>
                                                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                                                            @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                            <label class="control-label">password</label>
                                                            <input type="password" class="form-control" name="password" placeholder="password" value="{{ old('password') }}">
                                                            @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                            <label class="control-label">Confirm Password</label>
                                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                                                            @if ($errors->has('password_confirmation'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-4 text-center">
                                                        <button type="submit" class="btn btn-primary mb-2 w100p submit-btn">Register</button>
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

@endsection