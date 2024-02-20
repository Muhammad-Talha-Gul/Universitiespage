@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/jquery.filer/css/jquery.filer.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/summernote/summernote.css')}}" rel="stylesheet" />
@endsection
@section('content')
@if(check_access(Auth::user()->id,'settings','_show')==1)
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Configuration </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Configuration
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
            <form action="{{route('updateSettings')}}" method="POST" enctype="multipart/form-data"> 
                {{csrf_field()}}
                <div class="card-box table-responsive">
                    <div class="tabs-vertical-env products-form">
                        <ul class="nav tabs-vertical" id="product_tabs">
                            <li class="active">
                                <a href="#t-general" data-toggle="tab" aria-expanded="false">General</a>
                            </li>
                            {{-- <li class="">
                                <a href="#t-social" data-toggle="tab" aria-expanded="false">Social</a>
                            </li> --}}
                            <li class="">
                                <a href="#t-mailer" data-toggle="tab" aria-expanded="false">Mailer Settings</a>
                            </li>
                            <li class="">
                                <a href="#t-keys" data-toggle="tab" aria-expanded="false">Api Keys</a>
                            </li>
                            {{-- <li class="">
                                <a href="#t-footer" data-toggle="tab" aria-expanded="false">Footer</a>
                            </li> --}}
                        </ul>
                        <div class="tab-content" style="width: 100%">
                            <div class="tab-pane active" id="t-general">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="form-group m-b-20">
                                                    <label>Website Logo</label>
                                                    <div class="image-placeholder" id="wfm" data-input="f-hidden" data-preview="f-holder">
                                                        @if($data['logo']!=null)
                                                        <img src="{{url($data['logo'])}}" id="f-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                                        @else
                                                        <img src="{{asset('placeholder.jpg')}}" id="f-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                                        @endif
                                                    </div>
                                                    <a href="javascript:void(0)" class="removeImage" data-hidden="f-hidden" data-holder="f-holder" style="display: none">Remove Image</a>
                                                    <input type="hidden" name="logo" id="f-hidden" value="{{($data['logo']!=null)?$data['logo']:''}}">
                                                </div>
                                                <div class="form-group m-b-20">
                                                    <label>Footer Logo</label>
                                                    <div class="image-placeholder" id="wfm" data-input="sl-hidden" data-preview="sl-holder">
                                                        @if($data['sticky_logo']!=null)
                                                        <img src="{{url($data['sticky_logo'])}}" id="sl-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                                        @else
                                                        <img src="{{asset('placeholder.jpg')}}" id="sl-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                                        @endif
                                                    </div>
                                                    <a href="javascript:void(0)" class="removeImage" data-hidden="sl-hidden" data-holder="sl-holder" style="display: none">Remove Image</a>
                                                    <input type="hidden" name="sticky_logo" id="sl-hidden" value="{{($data['sticky_logo']!=null)?$data['sticky_logo']:''}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Optimize All Images</label> <br>
                                                    <input type="checkbox" id="optimize_image" switch="primary" name="optimize_image" {{($data['optimize_image']==1)?'checked':''}} value="1" />
                                                    <label for="optimize_image" data-on-label="Yes" data-off-label="No"></label>
                                                </div>
                                                <div class="form-group m-b-20">
                                                    <label>How To Apply</label>
                                                    <textarea class="form-control summernote" name="general_meta[how_to_apply]" placeholder="How To Apply">{!!($data['general_meta']['how_to_apply'])??''!!}</textarea>
                                                </div>                                         
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="t-mailer">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="form-group m-b-20">
                                                    <label>Host</label>
                                                    <input type="text" class="form-control" id="smtp_host" name="mailer[host]" placeholder="smtp.mailer.com" value="{{(isset($data['mailer']['host'])?$data['mailer']['host']:'')}}">
                                                </div>
                                                <div class="form-group m-b-20">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" id="smtp_user" name="mailer[username]" placeholder="test@mailer.com" value="{{(isset($data['mailer']['username'])?$data['mailer']['username']:'')}}">
                                                </div>
                                                <div class="form-group m-b-20">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" id="smtp_pass" name="mailer[password]" placeholder="Enter title" value="{{(isset($data['mailer']['password'])?$data['mailer']['password']:'')}}">
                                                </div>
                                                <div class="form-group m-b-20">
                                                    <label>Port</label>
                                                    <input type="number" class="form-control" id="smtp_port" name="mailer[port]" placeholder="587" value="{{(isset($data['mailer']['port'])?$data['mailer']['port']:'')}}">
                                                </div>
                                                <div class="form-group m-b-20">
                                                    <label>Encryption</label>
                                                    <select class="form-control" id="smtp_enc" name="mailer[encryption]">
                                                        <option value="tls" {{($data['mailer']['encryption']=='tls')?'selected':''}}>TLS</option>
                                                        <option value="ssl" {{($data['mailer']['encryption']=='ssl')?'selected':''}}>SSL</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <a href="javascript:void(0)" id="checkSMTP" class="btn btn-primary">Test Connection</a>
                                                </div>
                                                <div class="form-group">
                                                    <p id="smtp_resp"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="t-keys">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                @php
                                                    $data['contact_meta'] = json_decode($data['contact_meta'],true);
                                                @endphp
                                                

                                                <h5>PUSHER</h5>
                                                <div class="row">
                                                    <div class="col-sm-6 form-group m-b-20">
                                                        <label>App Id</label>
                                                        <input type="text" class="form-control" name="contact_meta[pusher][app_id]" value="{{($data['contact_meta']['pusher']['app_id'])??''}}">
                                                    </div>
                                                    <div class="col-sm-6 form-group m-b-20">
                                                        <label>key</label>
                                                        <input type="text" class="form-control" name="contact_meta[pusher][key]" value="{{($data['contact_meta']['pusher']['key'])??''}}">
                                                    </div>
                                                    <div class="col-sm-6 form-group m-b-20">
                                                        <label>Secret</label>
                                                        <input type="text" class="form-control" name="contact_meta[pusher][secret]" value="{{($data['contact_meta']['pusher']['secret'])??''}}">
                                                    </div>
                                                    <div class="col-sm-6 form-group m-b-20">
                                                        <label>Cluster</label>
                                                        <input type="text" class="form-control" name="contact_meta[pusher][cluster]" value="{{($data['contact_meta']['pusher']['cluster'])??''}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>

                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                </div>
            </form>
            <form method="POST" action="{{route('sqlBackup')}}" id="sqlForm">{{csrf_field()}}</form>
		</div>
	</div>

</div>
@else
@component('admin.access-denied') @endcomponent
@endif
@endsection
@section('customScripts')
<script src="{{asset('plugins/summernote/summernote.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
    $('.summernote').summernote({
        height: 240,
        minHeight: null,
        maxHeight: null,
        focus: false
    });
$("#add-feature").on('click',function(){
        count = Math.floor(Math.random() * 100);
        var _html = '<div class="feature-item" id="f_'+count+'"><div class="pull-right" style="margin: 10px;"><a href="javascript:void(0)" onclick="delete_feature('+count+')" class="btn btn-danger btn-sm">Delete</a></div><div class="form-group m-b-20"><label>Title</label><input type="text" class="form-control" name="footer_meta[title][]" required></div><div class="form-group m-b-20"><label>Link</label><input class="form-control" name="footer_meta[link][]" required></div><hr></div>';
        $("#features-list").append(_html);
        $('.summernote').summernote({
            height: 240,
            minHeight: null,
            maxHeight: null,
            focus: false
        });
    });

});
function delete_feature(key){
    $("#f_"+key).hide(300).remove();
}
</script>
<script>
    var loadLogo = function(event) {
        var output = $('#logo');
        output.attr('src', URL.createObjectURL(event.target.files[0]));
    };
    var loadStickyLogo = function(event) {
        var output = $('#sticky_logo');
        output.attr('src', URL.createObjectURL(event.target.files[0]));
    };
    var loadFooterLogo = function(event) {
        var output = $('#footer_image');
        output.attr('src', URL.createObjectURL(event.target.files[0]));
    };
    $(document).on('click',"#checkSMTP",function(){
        var host = $("#smtp_host").val();
        var user = $("#smtp_user").val();
        var pass = $("#smtp_pass").val();
        var enc = $("#smtp_enc").val();
        var port = $("#smtp_port").val();
        $this = $(this);
        $this.html("Testing <i class='fa fa-refresh fa-spin'></i>");
        var data = { '_token':"{{csrf_token()}}",'host':host,'user':user,'pass':pass,'enc':enc,'port':port };
        $.ajax({
          url: '{{route('checkSMTP')}}',
          type: 'POST',
          data: data,
          dataType: 'html',
          success: function (data) {
            if(data=='ok') {
                $("#smtp_resp").html("<span class='text-success'>Successfuly Connected</span>");
            } else {
                $("#smtp_resp").html("<span class='text-danger'>"+data+"</span>");
            }
            $this.html("Test Connection");
          }
        });
    });
    function sqlForm(){
        $("#sqlForm").submit();
    }
    $(document).on('change','#enabled_analytics',function() {
        if( $(this).is(':checked')) {
            $("#analytics_fields").show(300);
        } else {
            $("#analytics_fields").hide(300);
        }
    });
</script>
@endsection