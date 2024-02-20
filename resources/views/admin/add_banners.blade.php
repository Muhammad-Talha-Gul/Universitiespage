@extends('layouts.backend')
@section('customStyles')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Add Advertisements / Banners </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Add Advertisements / Banners
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('storeBanner')}}" method="POST"> 
                {{csrf_field()}}
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name*</label>
                                <div class="col-md-10">
                                    <input type="text" name="name" placeholder="Name" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Body/Type*</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="size" id="styles" required>
                                        <option value="style1">Style 1</option>
                                        <option value="style2">Style 2</option>
                                        <option value="style3">Style 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box table-responsive" id="banners">
                    <div class="row">
                        <aside class="col-xs-6 col-sm-6 col-md-6">
                            <div class="image-placeholder" id="wfm" data-input="hidden-s1" data-preview="holder-s1">
                                <img src="{{asset('placeholder.jpg')}}" id="holder-s1" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                            </div>
                            <input type="hidden" name="banners[image1]" id="hidden-s1">
                            <input type="text" class="form-control" name="banners[link1]" placeholder="Link">
                        </aside>
                        <aside class="col-xs-6 col-sm-6 col-md-6">
                            <div class="image-placeholder" id="wfm" data-input="hidden-s3" data-preview="holder-s3">
                                <img src="{{asset('placeholder.jpg')}}" id="holder-s3" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                            </div>
                            <input type="hidden" name="banners[image2]" id="hidden-s3">
                            <input type="text" class="form-control" name="banners[link2]" placeholder="Link">
                        </aside>                            
                    </div>
                </div>
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="{{route('sliders')}}" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
@section('customScripts')
<script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
});
$("#styles").on('change',function(){
  var html = "";
  if($(this).val()=="style1") {
      html = `<div class="row">
                <aside class="col-xs-6 col-sm-6 col-md-6">
                    <div class="image-placeholder" id="wfm" data-input="hidden-s1" data-preview="holder-s1">
                        <img src="{{asset('placeholder.jpg')}}" id="holder-s1" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                    </div>
                    <input type="hidden" name="banners[image1]" id="hidden-s1">
                    <input type="text" class="form-control" name="banners[link1]" placeholder="Link">                    
                </aside>
                <aside class="col-xs-6 col-sm-6 col-md-6">
                    <div class="image-placeholder" id="wfm" data-input="hidden-s2" data-preview="holder-s2">
                        <img src="{{asset('placeholder.jpg')}}" id="holder-s2" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                    </div>
                    <input type="hidden" name="banners[image2]" id="hidden-s2">
                    <input type="text" class="form-control" name="banners[link2]" placeholder="Link">                  
                </aside>                
        </div>`;
  } else if($(this).val()=="style2") {
    html = `<div class="row">
                <div class="col-md-3">
                    <div class="image-placeholder" id="wfm" data-input="hidden-s1" data-preview="holder-s1">
                        <img src="{{asset('placeholder.jpg')}}" id="holder-s1" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                    </div>
                    <input type="hidden" name="banners[image1]" id="hidden-s1">
                    <input type="text" class="form-control" name="banners[link1]" placeholder="Link">
                </div>
                <div class="col-md-3">
                    <div class="image-placeholder" id="wfm" data-input="hidden-s2" data-preview="holder-s2">
                        <img src="{{asset('placeholder.jpg')}}" id="holder-s2" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                    </div>
                    <input type="hidden" name="banners[image2]" id="hidden-s2">
                    <input type="text" class="form-control" name="banners[link2]" placeholder="Link">
                </div>
                <div class="col-md-3">
                    <div class="image-placeholder" id="wfm" data-input="hidden-s3" data-preview="holder-s3">
                        <img src="{{asset('placeholder.jpg')}}" id="holder-s3" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                    </div>
                    <input type="hidden" name="banners[image3]" id="hidden-s3">
                    <input type="text" class="form-control" name="banners[link3]" placeholder="Link">
                </div>
                <div class="col-md-3">
                    <div class="image-placeholder" id="wfm" data-input="hidden-s4" data-preview="holder-s4">
                        <img src="{{asset('placeholder.jpg')}}" id="holder-s4" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                    </div>
                    <input type="hidden" name="banners[image4]" id="hidden-s4">
                    <input type="text" class="form-control" name="banners[link4]" placeholder="Link">
                </div>
            </div>`;
  } else {
    html = `<div class="row">
                <div class="col-md-12">
                    <div class="image-placeholder" id="wfm" data-input="hidden-s1" data-preview="holder-s1">
                        <img src="{{asset('placeholder.jpg')}}" id="holder-s1" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                    </div>
                    <input type="hidden" name="banners[image]" id="hidden-s1">
                    <input type="text" name="banners[link]" class="form-control" placeholder="Link">
                </div>
            </div>`;
  }
        $("#banners").html(html);
        $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
});
</script>
@endsection