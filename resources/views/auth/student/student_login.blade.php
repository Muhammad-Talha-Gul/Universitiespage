@extends('layouts.frontend')
@section('content')
<div class="bg-light">
    <section class="login-section py-5 mb-3">
        <div class="container">
            <div class="login-section-main">
                <div class="formcol track-application-form-main auth-form-main">
                    <!-- login start -->
                    <div class="login-form">
                        <div class="modal-heading-container">
                            <h3 class=" user-modal-heading user-form-heading">Login as Student
                            </h3>
                        </div>
                        <form class="form-inline login-student" method="POST">
                            {{csrf_field()}}
                            <label class="sr-only" for="login_email">Email</label>
                            <div class="input-group " style="margin-bottom: 20px;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                </div>
                                <input type="email" name="email" class="form-control"  placeholder="Enter Your Email">
                                <div id="ResetMsg" style="font-size: 12px;color: red;position: absolute;text-align: center;width: 100%;font-weight: 500;top: -20px;"></div>
                            </div>

                            <label class="sr-only" for="login_password">Password</label>
                            <div class="input-group " style="margin-bottom: 10px;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text input-icon student-login-icon">
                                        <i class="fa fa-key"></i>
                                    </div>
                                </div>
                                <input type="password" name="password" class="form-control"  placeholder="Password">
                            </div>

                            <div class="login-forgot-main pt-2 pb-4">
                                <div class="form-check mb-0">
                                    <label class="login-remember-label mb-0">
                                        <input type="checkbox" name="" value="1">
                                        <span> Remember me </span>
                                    </label>
                                </div>
                                {{-- =========Amir edit --}}
                                <a class="forgot-link" href="{{ route('password.request') }}">@lang('Forgot password?')</a>
                                {{-- =======End amir edit======= --}}
                            </div>

                            <button type="submit" class="btn btn-primary mb-2 w100p submit-btn">Submit</button>
                        </form>
                        <div class="bottom-link-main text-center mt-2">
                            <a href="{{route('student-register')}}" class="form-bottom-link">Register As Student</a>
                        </div>
                    </div>
                    <!-- login end -->
                </div>
                </main>
            </div>
    </section>
</div>
@endsection