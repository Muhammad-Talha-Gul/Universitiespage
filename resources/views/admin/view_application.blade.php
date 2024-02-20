@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<style type="text/css">
    .ul-c{
        list-style-type: none;
    }
    .ul-c a{
        color:#0e86ee;
    }
    .ul-c2{
        list-style-type: none;
        font-size: 13px;
    }
    .ul-c2 li{
        line-height:21px;
    }
    .green{
        color:green;
        cursor: pointer;
        margin-bottom:4px
    }
    .red{
        color:#ff4b4b;
        cursor: pointer;
        margin-bottom:4px
    }
    .orange{
        color: orange;
        cursor: pointer;
        margin-bottom:4px
    }
    .blue{
        color: blue;
        cursor: pointer;
        margin-bottom:4px
    }
    .darkpink{
        color: #f794a5;
        cursor: pointer;
        margin-bottom:4px
    }
    .lightbrown{
        color: brown;
        cursor: pointer;
        margin-bottom:4px
    }
    hr{
       border: solid 0.5px #78257266;
    }
</style>
@endsection
@section('content')
@if(check_access(Auth::user()->id,'applicationForm','_view')==1)
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Application </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li>
                        <a href="{{route('applicationForm.index')}}">Application Detail</a>
                    </li>
                    <li class="active">
                        Application
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
    <div class="row">
        <div class="col-xs-12">
            <div class="mails">

                <div class="table-box">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box m-t-20">
                                    <h4 class="m-t-0"><b>Application Detail</b></h4>

                                    <hr/>

                                    <div style="font-size: 16px;">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <ul class="ul-c">
                                                    <li><b>Application ID :</b> {{$data->application_id}}-{{$data->id}}</li>
                                                    <li><b>Student Name :</b> <a href="{{url('admin/student/'.$data->student->id)}}" target="_blank">{{$data->student->name}}</a></li>
                                                    <li><b>University Name :</b> <a href="{{url('university/'.$data->university->slug)}}" target="_blank">{{$data->university->name}}</a></li>
                                                    <li><b>Course :</b> <a href="{{url('courses/'.$data->course->id)}}" target="_blank">{{$data->course->name}}</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6">
                                                <ul class="ul-c">
                                                    {{-- <li><b>Application Fee :</b> {!!($data->application_fee)?'<span class="green">Paid</span>':'<span class="red">Unpaid</span>'!!}</li> --}}
                                                    <li><b>Term & Condition :</b> {!!($data->declaration)?'<span class="green">Accepted</span>':'<span class="red">Not yet</span>'!!}</li>

                                                    <li>
                                                        <form action="{{url('change-app-status')}}" method="post">
                                                            {{csrf_field()}}
                                                            <input type="hidden" value="{{$data->id}}" name="id">
        
                                                            <b>Status : @if($data->status !== 4)<button type="submit" class="btn-xs btn-success change-status">Change Status</button>@endif</b>
                                                            @if($data->status == 4)
                                                                <span class="orange">Incomplete</span>
                                                            @else
                                                                <div class="form-group">
                                                                    <div class="radio" style="margin:0 auto">
                                                                        <input type="radio" name="status" value="3" @if($data->status==3) checked @endif data-parsley-multiple="status">
                                                                        <label class="blue" style="font-weight:bold">Processing</label>
                                                                    </div>
                                                                    <div class="radio" style="margin:0 auto">
                                                                        <input type="radio" name="status" value="2" @if($data->status==2) checked @endif data-parsley-multiple="status">
                                                                        <label class="darkpink" style="font-weight:bold">Pending</label>
                                                                    </div>
                                                                    <div class="radio" style="margin:0 auto">
                                                                        <input type="radio" name="status" value="1" @if($data->status==1) checked @endif data-parsley-multiple="status">
                                                                        <label class="green" style="font-weight:bold">Completed</label>
                                                                    </div>
                                                                    <div class="radio" style="margin:0 auto">
                                                                        <input type="radio" name="status" value="0" @if($data->status==0) checked @endif data-parsley-multiple="status">
                                                                        <label class="red" style="font-weight:bold">Rejected</label>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </form>
                                                    </li>
                                                    {{-- <li><b>Send To University :</b> {!!($data->send_to_uni)?'<span class="green">Send</span>':'<span class="red">Not yet</span>'!!}</li> --}}

                                                </ul>
                                            </div>
                                            <div class="col-sm-12">
                                                <hr>
                                                <h4 style="padding-left: 20px;">Personal Information</h4>
                                                <hr>
                                                <ul class="ul-c2">
                                                <div class="row">
                                                @php $personal_info = json_decode($data->personal_information);$p=0; @endphp
                                                @if($personal_info!==null)
                                                @foreach($personal_info as $key => $value)
                                                    <div class="col-sm-4">
                                                        <li><b style="text-transform: capitalize;">{{str_replace('_', ' ', $key)}} : </b>{{($value)??'-'}}</li>
                                                    </div>
                                                @php $p++ @endphp
                                                @endforeach
                                                @endif
                                                </div>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12">
                                                <hr>
                                                <h4 style="padding-left: 20px;">Education Background</h4>
                                                <hr>
                                                <ul class="ul-c2">
                                                <div class="row">
                                                @php $edu_bg = json_decode($data->educational_background, true);$p=0; @endphp
                                                @if($edu_bg!==null)
                                                @foreach($edu_bg as $k => $value)
                                                    <div class="col-sm-4">
                                                    <h5>Information {{$k+1}}</h5>
                                                    @if($value!==null)
                                                    @foreach($value as $key=>$val)
                                                    
                                                        <li><b style="text-transform: capitalize;">{{str_replace('_', ' ', $key)}} : </b>{{($val)??'null'}}</li>
                                                    @endforeach
                                                    @endif
                                                    </div>
                                                @php $p++ @endphp
                                                @endforeach
                                                @endif
                                                </div>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12">
                                                <hr>
                                                <h4 style="padding-left: 20px;">Language Qualification</h4>
                                                <hr>
                                                <ul class="ul-c2">
                                                <div class="row">
                                                @php $language_qual = json_decode($data->language_qualification);$p=0; @endphp
                                                @if($language_qual!==null)
                                                @foreach($language_qual as $key => $value)
                                                    <div class="col-sm-4">
                                                        <li><b style="text-transform: capitalize;">{{str_replace('_', ' ', $key)}} : </b>{{($value)??'-'}}</li>
                                                    </div>
                                                @php $p++ @endphp
                                                @endforeach
                                                @endif
                                                </div>
                                                </ul>
                                            </div>

                                           {{--  <div class="col-sm-12">
                                                <hr>
                                                <h4 style="padding-left: 20px;">Reasons To Choose</h4>
                                                <hr>
                                                <ul class="ul-c2">
                                                <div class="row">
                                                @php $rtc = $data->reasons_to_choose; @endphp
                                                    <div class="col-sm-12">
                                                        <li><b style="text-transform: capitalize;">Reasons To Choose : </b>{{($data->reasons_to_choose)??'-'}}</li>
                                                    </div>
                                                </div>
                                                </ul>
                                            </div>
 --}}
                                            {{-- <div class="col-sm-12">
                                                <hr>
                                                <h4 style="padding-left: 20px;">Family Member</h4>
                                                <hr>
                                                <ul class="ul-c2">
                                                <div class="row">
                                                @php $family = json_decode($data->family, true);$p=0; @endphp
                                                @if($family!==null)
                                                @foreach($family as $k => $value)
                                                    <div class="col-sm-4">
                                                    <h5>Member {{$k+1}}</h5>
                                                    @if($value !== null)
                                                    @foreach($value as $key=>$val)
                                                    
                                                        <li><b style="text-transform: capitalize;">{{str_replace('_', ' ', $key)}} : </b>{{($val)??'null'}}</li>
                                                    @endforeach
                                                    @endif
                                                    </div>
                                                @php $p++ @endphp
                                                @endforeach
                                                @endif
                                                </div>
                                                </ul>
                                            </div> --}}

                                            <div class="col-sm-12">
                                                <hr>
                                                <h4 style="padding-left: 20px;">Financial Support</h4>
                                                <hr>
                                                <ul class="ul-c2">
                                                <div class="row">
                                                @php $financial_support = json_decode($data->financial_support);$p=0; @endphp
                                                @if($financial_support!==null)
                                                @foreach($financial_support as $key => $value)
                                                    <div class="col-sm-4">
                                                        <li><b style="text-transform: capitalize;">{{str_replace('_', ' ', $key)}} : </b>{{($value)??'-'}}</li>
                                                    </div>
                                                @php $p++ @endphp
                                                @endforeach
                                                @endif
                                                </div>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12">
                                                <hr>
                                                <h4 style="padding-left: 20px;">Mailling Address</h4>
                                                <hr>
                                                <ul class="ul-c2">
                                                <div class="row">
                                                @php $mailling_address = json_decode($data->mailling_address);$p=0; @endphp
                                                @if($mailling_address!==null)
                                                @foreach($mailling_address as $key => $value)
                                                    <div class="col-sm-4">
                                                        <li><b style="text-transform: capitalize;">{{str_replace('_', ' ', $key)}} : </b>{{($value)??'-'}}</li>
                                                    </div>
                                                @php $p++ @endphp
                                                @endforeach
                                                @endif
                                                </div>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12">
                                                <hr>
                                                <h4 style="padding-left: 20px;">Documents</h4>
                                                <hr>
                                                <ul class="ul-c2">
                                                <div class="row">
                                                @php $uploads = json_decode($data->uploads);$p=0; @endphp
                                                {{-- {{dd($uploads)}} --}}
                                                @if($uploads!==null)
                                                @foreach($uploads as $key => $value)
                                                {{-- {{dd($key)}} --}}
                                                    @if($key !== 'other')
                                                    <div class="col-sm-4">
                                                        <li><b style="text-transform: capitalize;">{{str_replace('_', ' ', $key)}} : </b><br>@if($value!==null)<div align="center" style="margin-top: 10px;"><a href="{{ url(($value)??'#.') }}" target="_blank"><img src="{{ url(($value)??'#.') }}" alt="{{$key}}" style="width: 70%;height: auto;"></a></div>@endif</li>
                                                    </div>
                                                    @elseif($value !== null)
                                                        <li><b style="text-transform: capitalize;">{{($key)?str_replace('_', ' ', $key):''}} : </b></li>
                                                        @foreach($value as $k => $val)
                                                        @if($val!==null)
                                                        <div class="col-sm-4">
                                                            <div align="center" style="margin-top: 10px;">
                                                                <a href="{{ url(($val)??'#.') }}" target="_blank"><img src="{{ url($val) }}" alt="{{$k}}" style="width: 70%;height: auto;"></a>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                    @endif
                                                @php $p++ @endphp
                                                @endforeach
                                                @endif
                                                </div>
                                                </ul>
                                            </div>


                                        </div>
    
                                       
                                    </div>
                                </div>
                                <!-- card-box -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-right">
                                    <a href="{{route('applicationForm.index')}}" class="btn btn-primary waves-effect waves-light w-md m-b-30"><i class="fa fa-arrow-left m-r-10"></i>Back</a>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- End row -->

                    </div> <!-- table detail -->
                </div>
                <!-- end table box -->

            </div> <!-- mails -->
        </div>
    </div>
</div>
@else
@component('admin.access-denied') @endcomponent
@endif
@endsection
@section('customScripts')
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script type="text/javascript">
    
    $(document).on('click', '.change-status',function(){
        var status = $('input[name="status"]:checked').val();
        
    });

</script>
@endsection