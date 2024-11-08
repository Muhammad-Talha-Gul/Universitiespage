@extends('layouts.backend')
@section('customStyles')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link href="{{asset("plugins/bootstrap-daterangepicker/daterangepicker.css")}}" rel="stylesheet">
<style type="text/css">
    #stats-data i.loader {
        display: none;
    }

    .stats-loading {
        position: relative;
        background: #fff;
        opacity: 0.3;
    }

    .stats-loading i.loader {
        display: block;
        position: absolute;
        font-size: 70px;
        color: #000;
        z-index: 99999;
        opacity: 1;
        top: 25%;
        left: 40%;
    }

    #stats-data table tr,
    #stats-data table td {
        border: 0px;
    }

    #stats-data .card-box {
        border: 2px solid #f3f3f3;
        border-radius: 10px;
    }

    /*.wigdet-one-content {height: 200px;overflow-y: scroll;}
    .wigdet-one-content::-webkit-scrollbar-track {-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);background-color: #F5F5F5;}
    .wigdet-one-content::-webkit-scrollbar{width: 6px;background-color: #F5F5F5;}
    .wigdet-one-content::-webkit-scrollbar-thumb{background-color: #782572;}*/
    .card-box {
        border: 1px solid #e0dede;
        box-shadow: 1px 2px 8px -1px #d2cfcf;
    }

    .header-title {
        font-size: 15px;
        color: #752376;
        text-align: center;
    }

    .font-600 {
        color: #752376;
    }

    #gText {
        font-size: 20px;
        font-family: 'Raleway', sans-serif !important;
        color: #000;
    }

    #gText p {
        font-size: 14px;
        color: #752376;
    }

    .statsText {
        font-size: 12px;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">Webnet</a>
                    </li>
                    <li class="active">
                        Dashboard
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <blockquote id="gText"><span id="greetings"></span> {{Auth::user()->first_name}}!
                <p>Here’s what’s happening with your site today.</p>
            </blockquote>
        </div>
    </div>
    @if(Auth::user()->id == 1 && Auth::user()->user_type == 'admin')
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
            <div class="card-box widget-box-one">
                <div class="wigdet-one-content">
                    <p class="m-0 text-uppercase font-600 statsText font-secondary text-overflow"><a href="{{url('admin/university')}}">Total Universities</a></p>
                    <h2 class="text-danger"><span data-plugin="counterup">{{totalUniversity()}}</span></h2>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
            <div class="card-box widget-box-one">
                <div class="wigdet-one-content">
                    <p class="m-0 text-uppercase font-600 statsText font-secondary text-overflow"><a href="{{url('admin/student')}}">Total Students</a></p>
                    <h2 class="text-primary"><span data-plugin="counterup">{{totalStudent()}}</span></h2>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
            <div class="card-box widget-box-one">
                <div class="wigdet-one-content">
                    <p class="m-0 text-uppercase font-600 statsText font-secondary text-overflow"><a href="{{url('admin/additionals/emails')}}">Total Mails</a></p>
                    <h2 class="text-warning"><span data-plugin="counterup">{{totalMessage()}}</span></h2>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
            <div class="card-box widget-box-one">
                <div class="wigdet-one-content">
                    <p class="m-0 text-uppercase font-600 statsText font-secondary text-overflow"><a href="{{url('admin/applicationForm')}}">Todays Applications</a></p>
                    <h2 class="text-info"><span data-plugin="counterup">{{todayApplications()}}</span></h2>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
            <div class="card-box widget-box-one">
                <div class="wigdet-one-content">
                    <p class="m-0 text-uppercase font-600 statsText font-secondary text-overflow"><a href="{{url('admin/applicationForm')}}">Total Applications</a></p>
                    <h2 class="text-info"><span data-plugin="counterup">{{totalApplications()}}</span></h2>
                </div>
            </div>
        </div>

        {{-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
            <div class="card-box widget-box-one">
                <div class="wigdet-one-content">
                    <p class="m-0 text-uppercase font-600 statsText font-secondary text-overflow">Today Consultant</p>
                    <h2 class="text-info"><span data-plugin="counterup">{{todayConsultant()}}</span></h2>
    </div>
</div>
</div> --}}
</div>

<!-- end row -->
<div class="row" id="stats-data">
    @include('admin.stats')
</div>
<!-- end row -->
</div>
@endif
@endsection
@section('customScripts')
<script src="{{asset("plugins/moment/moment.js")}}"></script>
<script src="{{asset("plugins/bootstrap-daterangepicker/daterangepicker.js")}}"></script>
<script type="text/javascript">
    $(function() {
        $('#reportrange span').html(moment().format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker({
            format: 'MM/DD/YYYY',
            startDate: moment(),
            endDate: moment(),
            dateLimit: {
                days: 60
            },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'left',
            drops: 'down',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-success',
            cancelClass: 'btn-default',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Cancel',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        }, function(start, end, label) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            var data = {
                '_token': "{{csrf_token()}}",
                'start': start.format('YYYY-MM-DD'),
                'end': end.format('YYYY-MM-DD')
            }
            $("#stats-data").addClass("stats-loading");
            $("#stats-data i.loader").show(100);
            jQuery.ajax({
                url: '{{url("/admin/home")}}',
                dataType: 'html',
                data: data,
                success: function(data) {
                    $("#stats-data").html(data);
                    $("#stats-data i.loader").hide();
                    $("#stats-data").removeClass("stats-loading");
                }
            });
        });
    })
</script>
<script type="text/javascript">
    $(function() {
        var now = new Date();
        var hrs = now.getHours();
        var msg = "Hi";

        if (hrs > 0) msg = "Mornin' Sunshine!"; // REALLY early
        if (hrs > 6) msg = "Good Morning"; // After 6am
        if (hrs > 12) msg = "Good Afternoon"; // After 12pm
        if (hrs > 17) msg = "Good Evening"; // After 5pm
        //if (hrs > 22) msg = "Go to bed!";        // After 10pm
        $("#greetings").text(msg);
    });
</script>
@endsection