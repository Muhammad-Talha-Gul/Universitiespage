<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A dashboard created by Webnet Pakistan's development team">
    <meta name="author" content="Webnet Pakistan">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/fav.ico') }}">
    <!-- App title -->
    <title>{{ config('app.name', 'Webnet Dashboard') }}</title>

    <!--Morris Chart CSS -->

    <link href="https://fonts.googleapis.com/css?family=Raleway:300i,400,500,600,700" rel="stylesheet">

    <link  type="text/css" href="{{ asset('plugins/morris/morris.css') }}">
    <link  type="text/css" href="{{ asset('css/custom_backend.css') }}">
    <!-- Custom box css -->
    <link  type="text/css" href="{{asset('plugins/custombox/css/custombox.min.css')}}" rel="stylesheet">

    <!-- App css -->
    <link  type="text/css" href="{{ asset('assets_backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link  type="text/css" href="{{ asset('assets_backend/css/core.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets_backend/css/components.css') }}" rel="stylesheet">
    <link  type="text/css" href="{{ asset('assets_backend/css/icons.css') }}" rel="stylesheet">
    <link  type="text/css" href="{{ asset('assets_backend/css/pages.css') }}" rel="stylesheet">
    <link  type="text/css" href="{{ asset('assets_backend/css/menu.css') }}" rel="stylesheet">
    <link  type="text/css" href="{{ asset('assets_backend/css/responsive.css') }}" rel="stylesheet">
    <link  type="text/css" href="{{ asset('plugins/switchery/switchery.min.css') }}" rel="stylesheet">
    <link  type="text/css" href="{{ asset('assets_backend/css/custom.css') }}" rel="stylesheet">


    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .custombox-modal-blur {width: 100%;}
    </style>
    @yield('customStyles')
    <script src="{{ asset('assets_backend/js/modernizr.min.js') }}"></script>

</head>


<body class="fixed-left">

<!--div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="spinner-wrapper">
                    <div class="rotator">
                        <div class="inner-spin"></div>
                        <div class="inner-spin"></div>
                    </div>
                </div>
            </div>
        </div>
    </div-->
    <div id="wrapper">
        @include('includes.backend.topBar')
        @include('includes.backend.leftSideBar')
        <div class="content-page">
            <div class="content">
                @yield('content')
            </div>
            @include('includes.backend.footer')
        </div>
        @include('includes.backend.rightSideBar')
    </div>
<div id="custom-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Social Channels</h4>
    <div class="modal-body">
        <form>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <i class="fa fa-facebook"></i>
                    </div>
                    <div class="col-md-6">
                        <input type="checkbox" name="facebook" value="1">
                    </div>
                </div>
            </div>
        </form>
        <div class="clearfix"></div>
    </div>
</div>
<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script type="text/javascript" src="{{ asset('assets_backend/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets_backend/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets_backend/js/detect.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets_backend/js/fastclick.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets_backend/js/jquery.blockUI.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets_backend/js/waves.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets_backend/js/jquery.slimscroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets_backend/js/jquery.scrollTo.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/switchery/switchery.min.js') }}"></script>

<!-- Counter js  -->
<script type="text/javascript" src="{{ asset('plugins/waypoints/jquery.waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/counterup/jquery.counterup.min.js') }}"></script>

<!--Morris Chart-->
<script type="text/javascript" src="{{ asset('plugins/morris/morris.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/raphael/raphael-min.js') }}"></script>

<!-- Dashboard init -->
<script type="text/javascript" src="{{ asset('assets_backend/pages/jquery.dashboard.js') }}"></script>

<!-- Modal-Effect -->
<script type="text/javascript" src="{{asset("plugins/custombox/js/custombox.min.js")}}"></script>
<script type="text/javascript" src="{{asset("plugins/custombox/js/legacy.min.js")}}"></script>

<!-- App js -->
<script type="text/javascript" src="{{ asset('assets_backend/js/jquery.core.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets_backend/js/jquery.app.min.js') }}"></script>

@yield('customScripts')

<script>
    setInterval(()=>{
        $.ajax({
            url:'{{url("admin/getUnReadConversation")}}',
            type: 'GET',
            dataType:'json',
            success: function(data){
                $('body .getUnReadConversation').html(data);
            },
        });
    },5000);
</script>
</body>
</html>