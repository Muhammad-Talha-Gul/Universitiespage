@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
<style type="text/css"> .table .active {font-weight: bold;}</style>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Notifications</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Notifications
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
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
                {{-- <div class="form-group pull-right" style="margin-bottom: 10px;">
                    <a href="{{route('posts_lists',$type['slug'])}}" class="btn btn-primary btn-sm">{{$type['name']}}</a>
                </div> --}}
                <div class="clearfix"></div>

                <table class="table">
                    <tbody>

                        @foreach($data as $key => $value)
                        <tr style="cursor: pointer;" class="{{($value->is_read==1)?'':'active'}}" onclick="location.href='{{route('notification_detail',$value->id)}}'">
                            <th scope="row">{{$key+1}}</th>
                            <td>@if($value->type=='application_status') Application @endif{{ucwords($value->meta)}}</td>
                            <td>
                                @if($value->type=='subscription') 
                                    {{$value->email}}
                                @elseif($value->type=='review') 
                                    {{($value->student->name)??''}} give review to {{($value->university->name)??''}}.
                                @elseif($value->type=='review-replay') 
                                    {{($value->university->name)??''}} replied to {{($value->student->name)??''}} review.
                                @elseif($value->type=='application_status') 
                                    {{($value->student->name)??''}}'s Application is {{($value->meta)??''}} by {{($value->university->name)??''}}.
                                @elseif($value->type=='premium') 
                                    @if($value->university_id!==null) {{($value->university->name)??''}}'s @else {{($value->consultant->organization_name)??''}}'s @endif  Account is upgrated.
                                @elseif($value->type=='application') 
                                    {{($value->student->name)??''}} fill an application form in {{($value->university->name)??''}}.
                                @elseif($value->type=='consult') 
                                    {{($value->student->name)??''}} ask {{($value->consultant->organization_name)??''}} for their consultancy.
                                @elseif($value->type=='reply') 
                                    {{($value->consultant->organization_name)??''}} reply to {{($value->student->name)??''}}.
                                @elseif($value->type=='account') 
                                    New account is created by
                                    @if($value->student_id!==null)
                                        {{($value->student->name)??''}}
                                    @elseif($value->consultant_id!==null)
                                        {{($value->consultant->organization_name)??''}}
                                    @elseif($value->university_id!==null)
                                        {{($value->university->name)??''}}
                                    @endif
                                   <b>( {{$value->email}} )</b> 
                                @elseif($value->type=='comment') 
                                    New Comment
                                @endif
                                {{-- @if($value->type=='stock') 
                                    {{(isset($value->post))?$value->post->title:''}} 
                                @elseif($value->type=='order' || $value->type=="order_action")
                                 #{{(isset($value->order))?$value->order->order_no:''}}  
                                @elseif($value->type=='helping') 
                                    {{$value->name}} ({{$value->email}}) 
                                @elseif($value->type=='email')
                                    {{$value->name}} ({{$value->email}}) 
                                @elseif($value->type=='subscription')
                                    {{$value->email}} 
                                @elseif($value->type=='review') 
                                    {{(isset($value->post))?$value->post->title:''}} 
                                @endif --}}
                            </td>
                            <td>{{date_format($value->created_at,'d M Y g:i:s a')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pull-right">
                {{$data->links()}}
            </div>
		</div>
	</div>

</div>
@endsection
@section('customScripts')
<script src="{{asset('/plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
<script type="text/javascript">
    $("#check_all").click(function(){
        $(':checkbox.checkItem').prop('checked', this.checked);
        $("#checkCount").text($(':checkbox.checkItem:checked').length);
    });
    $(".checkItem").on('click',function(){ $("#checkCount").text($(':checkbox.checkItem:checked').length); });
</script>

@endsection