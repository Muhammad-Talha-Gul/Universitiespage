@extends('layouts.backend')
@section('customStyles')
<link href="{{asset("plugins/bootstrap-daterangepicker/daterangepicker.css")}}" rel="stylesheet">
<link href="{{asset("plugins/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<style type="text/css">
    #timeline i.loader {
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
    #timeline table tr, #timeline table td {
        border: 0px;
    }
    #timeline .card-box {
        border: 2px solid #f3f3f3;
        border-radius: 10px;
    }
</style>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">{{$type['title']}} Logs </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                       {{$type['title']}} Logs
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="generate-logs">
                <div class="row">
                    <div class="form-group col-md-5">
                        <select class="select2 form-control" name="product_id">
                            <option value="">All Items</option>
                            @foreach($items as $value)
                            <option value="{{$value->id}}">{{$value->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="reportrange" autocomplete="off" name="dates" required>
                    </div>
                    <div class="form-group col-md-2">
                        <input type="submit" class="btn btn-primary btn-sm" value="Generate">
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-12" id="timeline">
            @include('ajax.post-logs')
        </div>
    </div>

</div>
@endsection
@section('customScripts')
<script src="{{asset("plugins/moment/moment.js")}}"></script>
<script src="{{asset("plugins/bootstrap-daterangepicker/daterangepicker.js")}}"></script>
<script src="{{asset("plugins/select2/js/select2.min.js")}}" type="text/javascript"></script>
<script type="text/javascript">    
    jQuery(document).ready(function(){
        $(".select2").select2();
    });
    $(document).on('submit','#generate-logs',function(event){
              var data = $(this).serialize();
              $("#timeline").addClass("stats-loading");
              $("#timeline i.loader").show(100);
              event.preventDefault();
              $.ajax({
              url: '{{route('postLogs',$type['slug'])}}',
              data: data,
              success: function (data) {
                $("#timeline").html(data);
                $("#timeline i.loader").hide();
                $("#timeline").removeClass("stats-loading");
              },
            });
          });
        $(function(){
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
            });
        });
</script>
@endsection