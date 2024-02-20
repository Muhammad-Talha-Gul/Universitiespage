@extends('layouts.backend')
@section('customStyles')
<link rel="stylesheet" type="text/css" href="{{asset('assets_backend/css/tree.css')}}">
<link href="{{asset("plugins/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
  <style type="text/css">
    .my-control {
      border-top-left-radius: 0px;border-bottom-left-radius: 0px;width: 90%;height: 34px;
    }
  </style>
@endsection
@section('content')
@if(check_access(Auth::user()->id,'additionals','_show')==1)
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Footer Editor </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Footer Editor
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <form action="{{route('updateFooter')}}" method="POST">
      {{csrf_field()}}
      <div class="row">
        <div class="col-md-12">
          <div class="card-box table-responsive">
            <h4>Social Links</h4>
            <div class="row">
              <div class="form-group col-md-6">
                  <span class="btn btn-facebook pull-left"><i class="fa fa-facebook"></i></span>
                  <input type="text" class="pull-left my-control form-control" name="contact_social[facebook]" placeholder="Facebook" value="{{$data['contact_social']['facebook'] or ''}}">
              </div>
              <div class="form-group col-md-6">
                  <span class="btn btn-twitter pull-left"><i class="fa fa-twitter"></i></span>
                  <input type="text" class="pull-left my-control form-control" name="contact_social[twitter]" placeholder="Twitter" value="{{$data['contact_social']['twitter'] or ''}}">
              </div>
              <div class="form-group col-md-6">
                  <span class="btn btn-linkedin pull-left"><i class="fa fa-linkedin"></i></span>
                  <input type="text" class="pull-left my-control form-control" name="contact_social[linkedin]" placeholder="Linkedin" value="{{$data['contact_social']['linkedin'] or ''}}">
              </div>
              <div class="form-group col-md-6">
                  <span class="btn btn-googleplus pull-left"><i class="fa fa-google-plus"></i></span>
                  <input type="text" class="pull-left my-control form-control" name="contact_social[google-plus]" placeholder="Google Plus" value="{{$data['contact_social']['google-plus'] or ''}}">
              </div>
              <div class="form-group col-md-6">
                  <span class="btn btn-instagram pull-left"><i class="fa fa-instagram"></i></span>
                  <input type="text" class="pull-left my-control form-control" name="contact_social[instagram]" placeholder="instagram" value="{{$data['contact_social']['instagram'] or ''}}">
              </div>
              <div class="form-group col-md-6">
                  <span class="btn btn-pinterest pull-left"><i class="fa fa-pinterest"></i></span>
                  <input type="text" class="pull-left my-control form-control" name="contact_social[pinterest]" placeholder="Pinterest" value="{{$data['contact_social']['pinterest'] or ''}}">
              </div>
            </div>
          </div>
        </div>        
        <div class="col-md-12">
          <div class="card-box table-responsive">
            <div class="row">
              <div class="col-sm-4 p-0">
                <div class="col-sm-12">
                  <h4>Footer (Column 1)</h4>
                  <div class="form-group m-b-20">
                    <div class="row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="footer_meta[0][title]" placeholder="Heading" value="{{$data['footer_meta'][0]['title'] or ''}}">
                      </div>
                      <div class="col-sm-12 " style="padding-top:10px;">
                        <select class="form-control col-sm-6" name="footer_meta[0][menu]">
                          <option value="">Select Menu</option>
                          @foreach($menus as $value)
                          <option value="{{$value->id}}" @isset($data['footer_meta'][0]['menu']) {{($data['footer_meta'][0]['menu']==$value->id)?'selected':''}} @endisset>{{$value->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <h4>Footer (Column 4)</h4>
                  <div class="form-group m-b-20">
                    <div class="row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="footer_meta[2][title]" placeholder="Heading" value="{{$data['footer_meta'][2]['title'] or ''}}">
                      </div>
                      <div class="col-sm-12" style="padding-top:10px;">
                        <select class="form-control col-sm-6" name="footer_meta[2][menu]">
                          <option value="">Select Menu</option>
                          @foreach($menus as $value)
                          <option value="{{$value->id}}" @isset($data['footer_meta'][2]['menu']) {{($data['footer_meta'][2]['menu']==$value->id)?'selected':''}} @endisset>{{$value->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-sm-4">
                <h4>Footer (Column 2)</h4>
                <div class="form-group m-b-20">
                  <div class="row">
                    <div class="col-sm-12 p-t-10">
                      <input type="text" class="form-control" name="footer_meta[1][title]" placeholder="Heading" value="{{$data['footer_meta'][1]['title'] or ''}}">
                    </div>
                    <div class="col-sm-12 p-t-10">
                      <input type="text" class="form-control" name="footer_meta[1][wapp_no]" placeholder="WhatsApp Number" value="{{$data['footer_meta'][1]['wapp_no'] or ''}}">
                    </div>
                    <div class="col-sm-12 p-t-10">
                      <input type="text" class="form-control" name="footer_meta[1][email]" placeholder="Email" value="{{$data['footer_meta'][1]['email'] or ''}}">
                    </div>
                    <div class="col-sm-12 p-t-10">
                      <textarea class="form-control" name="footer_meta[1][address]" placeholder="Address">{{$data['footer_meta'][1]['address'] or ''}}</textarea>
                    </div>
                    {{-- <div class="col-sm-12">
                      <input type="text" class="form-control" name="footer_meta[1][title]" placeholder="Heading" value="{{$data['footer_meta'][1]['title'] or ''}}">
                    </div> --}}
                    {{-- <div class="col-sm-12" style="padding-top:10px;">
                      <select class="form-control col-sm-6" name="footer_meta[1][menu]">
                        <option value="">Select Menu</option>
                        @foreach($menus as $value)
                        <option value="{{$value->id}}" @isset($data['footer_meta'][1]['menu']) {{($data['footer_meta'][1]['menu']==$value->id)?'selected':''}} @endisset>{{$value->name}}</option>
                        @endforeach
                      </select>
                    </div> --}}
                  </div>
                </div>
              </div>
              <div class="col-sm-4 p-0">
                <div class="col-sm-12">
                  <h4>Footer (Column 3)</h4>
                  <div class="form-group m-b-20">
                    <div class="row">

                      <div class="col-sm-12">
                        <h4 align="center" style="color:#afaeae;">Universities</h4>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <h4>Footer (Column 5)</h4>
                  <div class="form-group m-b-20">
                    <div class="row">

                      <div class="col-sm-12">
                        <h4 align="center" style="color:#afaeae;">Subjects</h4>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              
            </div>

            
          </div>
        </div>

        <div class="col-md-12">
          <div class="card-box table-responsive">
            <h4>Copy Right</h4>
            <input type="text" class="form-control" name="footer_meta[copy]" placeholder="Heading" value="{{$data['footer_meta']['copy'] or ''}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card-box table-responsive">
            <input type="submit" class="btn btn-primary btn-md" value="Save">
          </div>
        </div>
      </div>
    </form>
</div>
@else
@component('admin.access-denied') @endcomponent
@endif
@endsection
@section('customScripts')
<script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script src="{{asset('assets_backend/js/tree.js')}}"></script>
<script src="{{asset("plugins/select2/js/select2.min.js")}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    $('#tree2').treed({openedClass:'fa fa-plus-o', closedClass:'fa fa-minus'}); 
    $(".select2").select2();
    $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
});
</script>
@endsection