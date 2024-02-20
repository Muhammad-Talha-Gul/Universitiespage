@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<style>
    .disabled_color{
        background-color: #929292 !important;
    }
</style>
@endsection
@section('content')
@if(check_access(Auth::user()->id,'plan','_edit')==1)
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Plan </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li>
                        <a href="{{url('/admin/plan')}}">Plan</a>
                    </li>
                    <li class="active">
                        Edit Plan
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('plan.update', $data->id)}}" method="POST" enctype="multipart/form-data"> 
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-12 control-label">Plan</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name" value="{{($data->name)??''}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label">Type</label>
                                <div class="col-md-12">
                                    <select class="form-control change_type" name="type" required>
                                        <option selected="" disabled="">Select Plan Type</option>
                                        <option value="listing" @if($data->type == 'listing') selected @endif>Listing</option>
                                        <option value="profile" @if($data->type == 'profile') selected @endif>Profile</option>
                                        <option value="receive_message_from_student" @if($data->type == 'receive_message_from_student') selected @endif>Receive Message from student</option>
                                        <option value="chat" @if($data->type == 'chat') selected @endif>Chat App</option>
                                        <option value="access_to_student_profile" @if($data->type == 'access_to_student_profile') selected @endif>Access to students profile</option>
                                        <option value="video_graphy" @if($data->type == 'video_graphy') selected @endif>Video Graphy</option>
                                        <option value="ads_designing" @if($data->type == 'ads_designing') selected @endif>Ads designing</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group" align="center" style="padding-top: 15px;">                                    
                                <label>Free</label>
                                <input id="free" name="free" switch="primary" type="checkbox"  @if($data->free == 1) checked="checked" @endif>
                                <label for="free" data-on-label="Yes" data-off-label="No" style="position: relative;top: 12px;"></label>
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="form-group" align="center" style="padding-top: 15px;">
                                <label>Standard</label>
                                <input id="Standard" name="standard" switch="primary" type="checkbox"  @if($data->standard == 1) checked="checked" @endif>
                                <label for="Standard" data-on-label="Yes" data-off-label="No" style="position: relative;top: 12px;"></label>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group" align="center" style="padding-top: 15px;">
                                <label>Premium</label>
                                <input id="Premium" name="premium" switch="primary" type="checkbox"  @if($data->premium == 1) checked="checked" @endif>
                                <label for="Premium" data-on-label="Yes" data-off-label="No" style="position: relative;top: 12px;"></label>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group" align="center" style="padding-top: 15px;">
                                <label>Enterprise</label>
                                <input id="Enterprise" name="enterprise" switch="primary" type="checkbox"  @if($data->enterprise == 1) checked="checked" @endif>
                                <label for="Enterprise" data-on-label="Yes" data-off-label="No" style="position: relative;top: 12px;"></label>
                            </div>
                        </div>

                    </div>
                    
                </div>

                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="{{route('plan.index')}}" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->

@else
@component('admin.access-denied') @endcomponent
@endif
@endsection
@section('customScripts')
    <script src="{{asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')}}"></script>
    <script>
        @if($data->type == 'listing' || $data->type == 'profile' || $data->type == 'receive_message_from_student')
            $('Input[type="checkbox"]').attr('checked');
            $('Input[type="checkbox"]').attr('disabled',true);
            $('Input[type="checkbox"]').next().addClass('disabled_color');
        @endif
        $(document).on('change', '.change_type', function(){
            var val  = $(this).val();
            if(val == 'listing' || val == 'profile' || val == 'receive_message_from_student'){
                $('Input[type="checkbox"]').each(function(){
                    if(!$(this).is(':checked')){
                        $(this).next().trigger('click');
                    }
                });
                $('Input[type="checkbox"]').attr('checked');
                $('Input[type="checkbox"]').attr('disabled',true);
                $('Input[type="checkbox"]').next().addClass('disabled_color');
            }else{
                $('Input[type="checkbox"]').removeAttr('checked');
                $('Input[type="checkbox"]').removeAttr('disabled');
                $('Input[type="checkbox"]').next().removeClass('disabled_color');
            }
        });
    </script>
@endsection