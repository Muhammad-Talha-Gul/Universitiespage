@extends('layouts.backend')
@section('customStyles')
<link href="{{asset("plugins/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<link href="{{asset("plugins/bootstrap-daterangepicker/daterangepicker.css")}}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Logs </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Logs
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
            <form id="generate-report">
                    <div class="row">
                        <div class="form-group col-md-5">
                            <select class="select2 form-control" name="user_id">
                                <option value="">All Users</option>
                                @foreach($users as $value)
                                <option value="{{$value->id}}" @isset($_GET['user_id']) {{($_GET['user_id']==$value->id)?'selected':''}} @endisset>{{$value->first_name.' '.$value->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <input type="text" class="form-control" id="reportrange" autocomplete="off" name="dates" required>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="submit" class="btn btn-primary btn-md" value="Generate Log">
                        </div>
                    </div>
                </form>
			<div class="card-box table-responsive" style="margin-bottom: 0px;">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <p>{{Session::get('success')}}</p>
                </div>
                @elseif(Session::has('error'))
                <div class="alert alert-danger">
                    <p>{{Session::get('error')}}</p>
                </div>
                @endif                
                <h4 class="m-t-0 header-title"><b>Pages Logs</b></h4>
                {{-- <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control filter-type">
                                <option value="">All Pages</option>
                            </select>
                        </div>
                    </div>
                </div> --}}
                <table class="table hover">
                    <tbody>                    
                	@foreach($data as $value)
                	<tr>
                        <td>{{$value->user->first_name or 'Unknown'}} {{$value->type}} {{$value->page->title or ''}} <span class="pull-right">{{$value->created_at}}</span></td>
                        <td>@if($value->type=='edit' || $value->type=='delete') <a href="{{route('restoreLog',$value->id)}}"><i class="fa fa-refresh"></i> Restore</a> @endif</td>
                	</tr>
                	@endforeach

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        {{$data->links()}}
                    </div>  
                </div>
            </div>
		</div>
	</div>

</div>
@endsection
@section('customScripts')
<script src="{{asset("plugins/moment/moment.js")}}"></script>
<script src="{{asset("plugins/select2/js/select2.min.js")}}" type="text/javascript"></script>
<script src="{{asset("plugins/bootstrap-daterangepicker/daterangepicker.js")}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        $(".select2").select2();
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