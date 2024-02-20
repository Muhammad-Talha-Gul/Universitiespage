@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/jquery.filer/css/jquery.filer.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/summernote/summernote.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
<link href="{{asset("plugins/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<style>
    .sq-box{
        width: 42px;
        background: lightgray;
        height: 38px;
        position: absolute;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
        text-align: center;
        padding-top: 8px;
        font-weight: bolder;
        top: 0px;
        right: 10px
    }
    .form-control{
        margin-bottom: 10px;
    }
</style>
@endsection
@section('content')
@if(check_access(Auth::user()->id,'university','_create')==1)
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Add University </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Add University
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('university.store')}}" method="POST" enctype="multipart/form-data"> 
                {{csrf_field()}}
                <div class="card-box table-responsive">
                    <div class="tabs-vertical-env products-form">
                        <ul class="nav tabs-vertical" id="product_tabs">
                            <li class="active">
                                <a href="#t-general" data-toggle="tab" aria-expanded="false">General</a>
                            </li>
                            <li class="">
                                <a href="#t-mailer" data-toggle="tab" aria-expanded="false">More Detail</a>
                            </li>
                            <li class="">
                                <a href="#t-logos" data-toggle="tab" aria-expanded="false">Images</a>
                            </li>
                            <li class="">
                                <a href="#t-about" data-toggle="tab" aria-expanded="false">About University</a>
                            </li>
                            <li class="">
                                <a href="#t-guide" data-toggle="tab" aria-expanded="false">Guide</a>
                            </li>
                            <li class="">
                                <a href="#t-accommodation" data-toggle="tab" aria-expanded="false">Accommodation</a>
                            </li>
                            <li class="">
                                <a href="#t-expanse" data-toggle="tab" aria-expanded="false">Expanse</a>
                            </li>
                        </ul>
                        <div class="tab-content" style="width: 100%">
                            <div class="tab-pane active" id="t-general">
                                <div class="row">
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="user_type" value="university">
                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label">Name</label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                            <label class="col-md-6 control-label">Email</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                                                                @if ($errors->has('email'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                            <label class="col-md-6 control-label">Phone</label>
                                                            <div class="col-md-10">
                                                                <input type="number" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                                                                @if ($errors->has('phone'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-6 control-label">University Full Name</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="university_name" placeholder="University Name" value="{{ old('university_name') }}">
                                                                @if ($errors->has('university_name'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('university_name') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-6 control-label">City</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="city" placeholder="City" value="{{ old('city') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-6 control-label">Country</label>
                                                            <div class="col-md-10">
                                                                <select class="form-control select2" name="country" value="">
                                                                    @foreach(country() as $value)
                                                                    <option value="{{$value->country}}">{{$value->country}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <!--- schema markup satart by awais --->
                           
                                                      <div class="optionBox">
                                                          <div class="block">
                                                              <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Scehma Markup Question</label>
                                                                        <input type="text" class="form-control" name="sm_question[]" id="sm_question" >
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix block"></div>                                    
                                                                
                                                                <div class="col-md-12 block">
                                                                    <div class="form-group">
                                                                        <label>Scehma Markup Answer</label>
                                                                        <textarea class="form-control" name="sm_answer[]" rows="10"  placeholder="Enter short description"></textarea>
                                                                    </div>
                                                                </div>
                                                          </div>
                                                            
                                                            <div class="block">
                                                                <button class="add btn btn-primary btn-sm fa fa-plus"> Add Schema Row</button>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <!-- review stat -->
                                                        <div class="optionBox2">
                                                            <div class="col-md-3 block2">
                                                                <div class="form-group">
                                                                    <label>Rating</label>
                                                                    <input type="number" min="0" class="form-control" name="ratingValue[]" id="ratingValue" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 block2">
                                                                <div class="form-group">
                                                                    <label>Date</label>
                                                                    <input type="date" class="form-control" name="datePublished[]" id="datePublished" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 block2">
                                                                <div class="form-group">
                                                                    <label>Author's Name</label>
                                                                    <input type="text" min="0" class="form-control" name="author[]" id="worstRating" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 block2">
                                                                <div class="form-group">
                                                                    <label>Publisher's Name</label>
                                                                    <input type="text"  class="form-control" name="publisherName[]" id="publisherName" >
                                                                </div>
                                                            </div>
                                                            <!-- end row -->
                                                            <div class="clearfix block2"></div>
                                                            
                                                            <div class="col-md-12 block2">
                                                                <div class="form-group">
                                                                    <label>Review's Name</label>
                                                                    <input type="text" class="form-control" name="reviewerName[]" id="reviewerName" >
                                                                </div>
                                                            </div>
                                                            <div class="clearfix block2"></div>                                    
                                                            
                                                            <div class="col-md-12 block2">
                                                                <div class="form-group">
                                                                    <label>Review Description</label>
                                                                    <textarea class="form-control" name="reviewBody[]" rows="5"  placeholder="Enter short description"></textarea>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="block2">
                                                                <button class="add2 btn btn-primary btn-sm fa fa-plus"> Add Review Row</button>
                                                            </div>
                                                        </div>
                                                        <hr>
                        
                                                    <!--- sechem markup end by awais    --->
                                                    
                                                </div>                                   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="t-mailer">
                                <div class="row">
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="col-md-6 control-label">Address</label>
                                                            <div class="col-md-11">
                                                                <textarea class="form-control" name="address">{{ old('address') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- <div class="form-group">
                                                            <label class="col-md-6 control-label">Agency Number</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control " name="agency_number" value="{{ old('agency_number') }}">
                                                            </div>
                                                        </div> --}}
                                                        <div class="form-group">
                                                            <label class="col-md-6 control-label">Founded In</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control date-picker-year" name="founded_in" value="{{ old('founded_in') }}">
                                                            </div>
                                                        </div>
                                                       {{--  <div class="form-group">
                                                            <label class="col-md-6 control-label">Total Student</label>
                                                            <div class="col-md-10">
                                                                <input type="number" class="form-control" name="total_students" placeholder="Total Number Student" value="{{ old('total_students') }}">
                                                            </div>
                                                        </div> --}}
                                                        <div class="form-group">
                                                            <label class="col-md-6 control-label">Intake (semiser starting months in year)</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control tags" name="intake" value="{{ old('intake') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <div class="checkbox checkbox-primary">
                                                                <input type="checkbox" name="scholarship" value="1" >
                                                                <label>Scholarship</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        {{-- <div class="form-group">
                                                            <label class="col-md-6 control-label">Postal Code</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="postcode" value="{{ old('postcode') }}">
                                                            </div>
                                                        </div> --}}
                                                        {{-- <div class="form-group">
                                                            <label class="col-md-6 control-label">Area</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="area" placeholder="1000" value="{{ old('area') }}">
                                                                <div class="sq-box">Sq</div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-6 control-label">International Student (in %)</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="international_student" placeholder="Total International Student" value="{{ old('international_student') }}">
                                                                <div class="sq-box">%</div>
                                                            </div>
                                                        </div> --}}
                                                        <div class="form-group">
                                                            <label class="col-md-6 control-label">Teaching Language</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control tags" name="languages" value="{{ old('languages') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="t-logos">
                                <div class="row">
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="col-md-3">
                                                    <div class="form-group m-b-20">
                                                        <label>Logo (image size must be : 400x400)</label>
                                                        <div class="image-placeholder" id="wfm" data-input="f-logo-hidden" data-preview="f-logo-holder">
                                                            <img src="{{asset('placeholder.jpg')}}" id="f-logo-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                                        </div>
                                                        <a href="javascript:void(0)" class="removeImage" data-hidden="f-logo-hidden" data-holder="f-logo-holder" style="display: none">Remove Image</a>
                                                        <input type="hidden" name="logo" id="f-logo-hidden">
                                                    </div>                         
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Image Gallary (image size must be : 800x800)</label>
                                                        <select id="noofdivs" class="form-control" style="max-width: 10%; display: inline;">
                                                            @for($i=1; $i<=5; $i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                        <a href="javascript:void" id="addDivs" class="btn btn-sm btn-info">Add</a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="row" id="g-divs">
                                                        
                                                    </div>
                                                </div>                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="t-about">
                                <div class="row">
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="form-group col-sm-10">
                                                    <label>About</label>
                                                    <textarea class="summernote" name="about"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="t-guide">
                                <div class="row">
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="form-group col-sm-10">
                                                    <label>Guide</label>
                                                    <textarea class="summernote" name="guide"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="t-accommodation">
                                <div class="row">
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Accommodation</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control accommodation-change" name="accommodation" required>
                                                            <option value="On Campus" @if(old('accommodation') == 'On Campus') selected="" @endif>On Campus</option>
                                                            <option value="Off Campus" @if(old('accommodation') == 'Off Campus') selected="" @endif>Off Campus</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-10 accommodation_detail" @if(old('accommodation') == 'Off Campus') style="display:none;" @endif>
                                                    <label>Accommodation Detail</label>
                                                    <textarea class="summernote " name="accommodation_detail"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="t-expanse">
                                <div class="row">
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="">
                                                    <div class="form-group col-sm-10">
                                                        <label>Fee Structure</label>
                                                        <textarea class="summernote" name="expanse"></textarea>
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
                            <div class="form-group">
                                <div class="checkbox checkbox-primary">
                                    <input type="checkbox" name="active" value="1" checked>
                                    <label>Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="{{route('university.index')}}" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </form>
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
<script src="{{asset("plugins/select2/js/select2.min.js")}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        
        // dynamic row for schema start

        $('.add').click(function() {
            $('.block:last').before('<div class="block"><div class="col-md-12"><div class="form-group"><label>Scehma Markup Question</label><input type="text" class="form-control" name="sm_question[]" id="sm_question" required></div></div><div class="clearfix block"></div><div class="col-md-12 block"><div class="form-group"><label>Scehma Markup Answer</label><textarea class="form-control" name="sm_answer[]" rows="10" required placeholder="Enter short description"></textarea></div></div><button class="remove btn btn-danger btn-sm fa fa-trash"> Remove Schema Question</button></div><hr>');
        });
        $('.optionBox').on('click','.remove',function() {
         	$(this).parent().remove();
        });
        
         // review dynamic script
        $('.add2').click(function() {
            $('.block2:last').before('<div class="block2"><div class="col-md-3 block2">\
                                            <div class="form-group">\
                                                <label>Rating</label>\
                                                <input type="number" min="0" class="form-control" name="ratingValue[]" id="ratingValue" required>\
                                            </div>\
                                        </div>\
                                        <div class="col-md-3 block2">\
                                            <div class="form-group">\
                                                <label>Date</label>\
                                                <input type="date" class="form-control" name="datePublished[]" id="datePublished" required>\
                                            </div>\
                                        </div>\
                                        <div class="col-md-3 block2">\
                                            <div class="form-group">\
                                                <label>Author\'s\ Name</label>\
                                                <input type="text" min="0" class="form-control" name="author[]" id="worstRating" required>\
                                            </div>\
                                        </div>\
                                        <div class="col-md-3 block2">\
                                            <div class="form-group">\
                                                <label>Publisher\'s\ Name</label>\
                                                <input type="text"  class="form-control" name="publisherName[]" id="publisherName" required>\
                                            </div>\
                                        </div>\
                                        <div class="clearfix block2"></div>\
                                        <div class="col-md-12">\
                                            <div class="form-group">\
                                                <label>Review\'s\ Name</label>\
                                                <input type="text" class="form-control" name="reviewerName[]" id="reviewerName" required>\
                                            </div>\
                                        </div>\
                                        <div class="col-md-12 block2">\
                                            <div class="form-group">\
                                                <label>Review Description</label>\
                                                <textarea class="form-control" name="reviewBody[]" rows="5" required placeholder="Enter short description"></textarea>\
                                            </div>\
                                        </div>\
                                        <button class="remove2 btn btn-danger btn-sm fa fa-trash"> Remove Review Row</button></div><hr>');
        });
        $('.optionBox2').on('click','.remove2',function() { 
         	$(this).parent().remove();
        });
     // dynamic row for schema end
     
     
        $('.accommodation-change').on('change', function(){
            var val = $(this).val();
            if(val == 'On Campus'){
                $('.accommodation_detail').fadeIn(500);
            }else{
                $('.accommodation_detail').fadeOut(500);
            }
        })
        $('.select2').select2();
        var lfm = function(options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '{{url('/filemanager')}}';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };

        var LFMButton = function(context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                click: function() {        
                    lfm({type: 'image', prefix: '{{url('/filemanager')}}'}, function(url, path) {
                        context.invoke('insertImage', url);
                    });
                }
            });
            return button.render();
        };
        $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
        $('.summernote').summernote({
            height: 240,
            minHeight: null,
            maxHeight: null,
            focus: false,
            toolbar: [
                ['popovers', ['lfm']],
                ['style', ['style']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['link', ['linkDialogShow', 'unlink']],
                ['table', ['table']],
            ],
            buttons: {
                lfm: LFMButton
            }
        });
        $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
        
        $(".tags").tagsinput();

        jQuery('.datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        $('.date-picker-year').datepicker({
            format: "yyyy",
            weekStart: 1,
            orientation: "bottom",
            // language: '',
            keyboardNavigation: false,
            viewMode: "years",
            autoclose: true,
            minViewMode: "years"
        });
        $(document).on('click',"#generatePass",function(){
            var pass = generatePassword(8);
            $("#generatedPass").val(pass);
        });

        $(document).on('click',"#usePass",function(){
            var pass = $("#generatedPass").val();
            $("#password").val(pass);
            $("#passwordModal").modal('hide');
        });
        function generatePassword(length) {
            var length = length,
                charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
                retVal = "";
            for (var i = 0, n = charset.length; i < length; ++i) {
                retVal += charset.charAt(Math.floor(Math.random() * n));
            }
            return retVal;
        }

        $("#addDivs").on('click',function(){
            var $num = $("#noofdivs").val();
            for (var i=1; i<=$num; i++) {
              var $count = Math.floor((Math.random() * 999) + 1);
              $("#g-divs").append(`<div class="col-md-3">
                            <div class="image-placeholder" id="wfm" data-input="g`+$count+`-hidden" data-preview="g`+$count+`-holder">
                                <img src="{{asset('placeholder.jpg')}}" id="g`+$count+`-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                            </div>
                            <input type="number" min="1" name="feature_image[sort_order][]" class="form-control" placeholder="Sort Order">
                            <a href="javascript:void(0)" class="removeThis btn-danger btn-xs text-center" data-hidden="g`+$count+`-hidden" data-holder="g`+$count+`-holder"><i class="fa fa-trash-o"></i> Remove</a>
                            <input type="hidden" name="feature_image[image][]" id="g`+$count+`-hidden">
                        </div>`);
            }
            $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
        });
        $(document).on('click',".removeThis",function(){
            $(this).parent().remove();
        });
    });
</script>
@endsection