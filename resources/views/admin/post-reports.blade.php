@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset("plugins/bootstrap-daterangepicker/daterangepicker.css")}}" rel="stylesheet">
<link href="{{asset("plugins/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<style type="text/css">
    .table>tbody>tr>td {
        vertical-align: middle;
        padding: 2px;
    }
    .loader {position: absolute;left: 0px;top:0px;width: 96%;height: 100%;z-index: 9999;text-align: center;background: #f7f7f7;opacity: 0.6;}
  .loader img {width: 50px;height: 50px;margin: auto;z-index: 99999999;}
</style>
@endsection
@section('content')
@if(check_access(Auth::user()->id,'products','_show')==1)
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">{{$type['name']}} Reports </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        {{$type['name']}} Reports
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="generate-report">
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
        <div class="col-md-12">
			<div class="card-box table-responsive" id="generated-report" style="position: relative;height: auto;"></div>
		</div>
	</div>
</div>
@else
@component('admin.access-denied') @endcomponent
@endif
@endsection
@section('customScripts')
<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset("plugins/moment/moment.js")}}"></script>
<script src="{{asset("plugins/select2/js/select2.min.js")}}" type="text/javascript"></script>
<script src="{{asset("plugins/bootstrap-daterangepicker/daterangepicker.js")}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        $(".select2").select2();
    });
        $(document).on('submit','#generate-report',function(event){
              var data = $(this).serialize();
              $("#generated-report").html(`<div class="loader"><img src="{{asset("loading.gif")}}"></div>`);
              event.preventDefault();
              $.ajax({
              url: '{{route('post_reports',$type['slug'])}}',
              data: data,
              success: function (data) {
                  $("#generated-report").html(data);
                  $('#datatable').dataTable();
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