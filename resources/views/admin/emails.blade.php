@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
<style type="text/css">
    .mails .mail-select {
        width: 1px;
        min-width: 0px;
        padding: 15px 0px 15px 20px;
    }
</style>
@endsection
@section('content')
@if(check_access(Auth::user()->id,'additionals','_show')==1)
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Contact Emails </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Email</a>
                    </li>
                    <li class="active">
                        All Email
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
    <div class="row">
        <div class="col-xs-12">
            @if(Session::has('success'))
            <div class="alert alert-success">
                <p>{{Session::get('success')}}</p>
            </div>
            @elseif(Session::has('error'))
            <div class="alert alert-danger">
                <p>{{Session::get('error')}}</p>
            </div>
            @endif
            <div class="mails">
                
                <a href="javascript:void(0)" data-toggle="modal" data-target="#settingsModal" class="btn btn-info btn-sm pull-right"><i class="mdi mdi-settings"></i> Configuration</a>
                <div class="table-box">

                    <div class="table-detail">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="btn-toolbar m-t-20" role="toolbar">
                                    <div class="btn-group">
                                        <form action="{{route("deleteEmails")}}" method="POST" id="del_form" form="del_form">{{csrf_field()}}</form>
                                        <button type="button" id="check_all" class="btn btn-primary waves-effect waves-light"><i class="fa fa-check"></i> (<span id="checkCount">0</span>)</button>
                                        <button type="button" onclick="location.reload();" class="btn btn-primary waves-effect waves-light"><i class="fa fa-refresh"></i></button>
                                    </div>
                                    <div class="btn-group" id="actions" style="display: none;">
                                        <button type="button" id="readAll" title="Mark Read" class="btn btn-primary waves-effect waves-light "><i class="fa fa-inbox"></i></button>
                                        <button type="button" id="deleteAll" title="Trash" class="btn btn-primary waves-effect waves-light "><i class="fa fa-trash-o"></i></button>
                                    </div>
                                    <a style="margin-left: 30px;" class="btn btn-success" onclick="download_to_excel()">Export Excel</a>
                                </div>
                            </div>
                        </div> <!-- End row -->


                        <div class="table-responsive m-t-20">


                        <table id="datatableall" style="display: none;" class="table table-hover mails m-0">
                        <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Created at</th>
                    </tr>
                    </thead>
                                <tbody>
                                    @foreach($data as $key => $value)
                                    <tr class="{{($value->is_read==1)?'':'unread'}}">

                                        <td>
                                            <a href="{{route('emailsDetail',$value->id)}}" class="email-name">{{$value->name}}</a>
                                        </td>
                                        
                                        <td>
                                            {{$value->phone}}
                                        </td>

                                        <td class="hidden-xs">
                                            <a href="{{route('emailsDetail',$value->id)}}" class="email-msg">{{str_limit($value->subject,115,'...')}}</a>
                                        </td>
                                        <td class="text-right" style="width: 180px;">
                                            {{($value->created_at!==null)?date_format($value->created_at,'d/m/Y g:i A'):'-'}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <table class="table table-hover mails m-0">
                                <tbody>
                                    @foreach($data as $key => $value)
                                    <tr class="{{($value->is_read==1)?'':'unread'}}">
                                        <td class="mail-select" style="width: 1px;min-width: 0px;">
                                            <div class="checkbox checkbox-primary m-r-15">
                                                <input id="checkbox{{$key}}" type="checkbox" class="checkItem" name="ids[]" form="del_form" value="{{$value->id}}">
                                                <label for="checkbox{{$key}}"></label>
                                            </div>
                                        </td>

                                        <td>
                                            <a href="{{route('emailsDetail',$value->id)}}" class="email-name">{{$value->name}}</a>
                                        </td>
                                        
                                        <td>
                                            {{$value->phone}}
                                        </td>

                                        <td class="hidden-xs">
                                            <a href="{{route('emailsDetail',$value->id)}}" class="email-msg">{{str_limit($value->subject,115,'...')}}</a>
                                        </td>
                                        <td class="text-right" style="width: 180px;">
                                            {{($value->created_at!==null)?date_format($value->created_at,'d/m/Y g:i A'):'-'}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row m-t-20 m-b-30">
                            <div class="col-xs-7 m-t-20">
                                Showing {{$data->count()}} of {{$data->total()}}
                            </div>
                            <div class="col-xs-5 m-t-20">
                                <div class="btn-group pull-right">
                                  <a href="{{$data->previousPageUrl()}}" class="btn btn-default waves-effect"><i class="fa fa-chevron-left"></i></a>
                                  <a href="{{$data->nextPageUrl()}}" class="btn btn-default waves-effect"><i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div id="settingsModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Email Setting</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('updateEmail')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label>Contact emails will be sent to this email</label>
                <input type="text" class="form-control" name="email" value="{{getpreferences()['contact_email']}}" required>
                <small><b>For Multiple Recipients write emails with Comma (,) seperated.</b></small>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-md btn-success" style="width: 100%;" value="Update">
            </div>
        </form>
      </div>
    </div>

  </div>
</div>
@else
@component('admin.access-denied') @endcomponent
@endif
@endsection
@section('customScripts')
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script type="text/javascript">
    $(document).on('click',"#check_all",function(){
        $(':checkbox.checkItem').prop('checked', !$(':checkbox.checkItem').prop("checked"));
        $("#checkCount").text($(':checkbox.checkItem:checked').length);
        if($(':checkbox.checkItem:checked').length>0) { $("#actions").show(300); } else {$("#actions").hide(300);}
    });
    $(".checkItem").on('click',function(){ 
        $("#checkCount").text($(':checkbox.checkItem:checked').length);
        if($(':checkbox.checkItem:checked').length>0) { $("#actions").show(300); } else {$("#actions").hide(300);}
    });
    $(document).on('click','#deleteAll',function(e){
        if($('.checkItem').is(':checked')){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this!",
                type: "error",
                showCancelButton: true,
                cancelButtonClass: 'btn-default btn-md waves-effect',
                confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
                confirmButtonText: 'Delete!',
            },function() {
                  $("#del_form").submit();
            });
        } 
        else {
            toastr.error('Please Select Items', 'Error!');
        }
    });
    $("#readAll").on('click',function(){
        $(this).html('<i class="fa fa-refresh fa-spin"></i>');
        var data = $("#del_form").serialize();
        if($('.checkItem').is(':checked')) {
            jQuery.ajax({
                url:'{{route("readEmails")}}',
                type: 'post',
                dataType: 'html',
                data: data,
                success: function( data ){
                    location.reload();
                }
            });
        } else {
            toastr.error('Please Select Items', 'Error!');
        }
    })
</script>

<script>

function download_to_excel()
{ 

var tab_text="<table><tr>";
var textRange = ''; 
var j=0;
var tab = document.getElementById('datatableall'); // id of table

for(j = 0 ; j < tab.rows.length ; j++) 
{     
    tab_text += tab.rows[j].innerHTML+"</tr>";
}

tab_text +="</table>";

var a = document.createElement('a');
var data_type = 'data:application/vnd.ms-excel';
a.href = data_type + ', ' + encodeURIComponent(tab_text);
//setting the file name
a.download = 'export.xls';
//triggering the function
a.click();
//just in case, prevent default behaviour
e.preventDefault();

}

</script>

@endsection