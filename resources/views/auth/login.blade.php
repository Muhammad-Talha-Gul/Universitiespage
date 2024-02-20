<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Test">
    <meta name="Kashif Siddiqui" content="Webnet Pakistan">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/fav.ico') }}">
    <!-- App title -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- App css -->
    <link href="{{ asset('assets_backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_backend/css/core.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_backend/css/components.css?ver=0.30') }}" rel="stylesheet">
    <link href="{{ asset('assets_backend/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_backend/css/pages.css?ver=0.30') }}" rel="stylesheet">
    <link href="{{ asset('assets_backend/css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_backend/css/responsive.css?ver=0.11') }}" rel="stylesheet">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{ asset('assets_backend/js/modernizr.min.js') }}"></script>

</head>


<body class="bg-transparent">

<!-- HOME -->
<section>
    <div class="container-alt">
        <div class="row">
            <div class="col-sm-12">
                <div class="wrapper-page">
                    <div class="m-t-40 account-pages">
                        <div class="text-center account-logo-box" style="background-color: #643a93">
                            <h2 class="text-uppercase">
                                <a href="javascript:void(0);" class="text-success">
                                    <span style="border: 1px solid #383435;background: #fff;padding: 5px;border-radius: 10px;"><img src="{{ asset('assets_backend/images/webnet.png') }}" alt="" height="36"></span>
                                </a>
                            </h2>
                            <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                        </div>
                        <div class="account-content">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="col-xs-12">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="col-xs-12">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-xs-12">
                                        <div class="checkbox checkbox-success">
                                            <input name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="checkbox-signup">
                                                Remember me
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                {{-- <div class="form-group text-center m-t-30">
                                    <div class="col-sm-12">
                                        <a href="{{ route('password.request') }}" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                                    </div>
                                </div> --}}

                                <div class="form-group account-btn text-center m-t-10">
                                    <div class="col-xs-12">
                                        <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>

                            </form>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                    <!-- end card-box-->


                    {{-- <div class="row m-t-50">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="{{route('registration')}}" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                        </div>
                    </div> --}}

                </div>
                <!-- end wrapper -->

            </div>
        </div>
    </div>
</section>
<!-- END HOME -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{ asset('assets_backend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets_backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets_backend/js/detect.js') }}"></script>
<script src="{{ asset('assets_backend/js/fastclick.js') }}"></script>
<script src="{{ asset('assets_backend/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('assets_backend/js/waves.js') }}"></script>
<script src="{{ asset('assets_backend/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets_backend/js/jquery.scrollTo.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets_backend/js/jquery.core.js') }}"></script>
<script src="{{ asset('assets_backend/js/jquery.app.js') }}"></script>

</body>
</html>