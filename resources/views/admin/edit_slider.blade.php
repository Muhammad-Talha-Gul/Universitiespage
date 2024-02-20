@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<style type="text/css">
    .ui-state-default {
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 10px;
      }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Slider </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Edit Slider
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('updateSlider',$data['id'])}}" method="POST"> 
                {{csrf_field()}}
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name*</label>
                                <div class="col-md-10">
                                    <input type="text" name="name" placeholder="Slider Name" class="form-control" required value="{{$data['name']}}">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Type*</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="size" required>
                                        <option value="full" {{($data['size']=='full')?'selected':''}}>Full Width</option>
                                        <option value="contain" {{($data['size']=='contain')?'selected':''}}> Container Width</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <small>Image height must be 550px</small>
                            <a href="javascript:void(0)" id="addSlider" class="pull-right btn btn-primary btn-xs"><i class="fa fa-plus"></i></a>
                            <div class="clearfix"></div>
                            <div class="row" id="sliders">
                                @if(!empty($sliders))
                                @foreach($sliders['image'] as $key => $value)
                                <div class="portlet ui-state-default">
                                    <div class="portlet-heading bg-primary">
                                        <h3 class="portlet-title">
                                            Slider Image
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a href="javascript:;" class="handle"><i class="fa fa-arrows"></i></a>
                                            <span class="divider"></span>
                                            <a data-toggle="collapse" data-parent="#hr{{$key}}" href="#hr{{$key}}" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                                            <span class="divider"></span>
                                            <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="hr{{$key}}" class="panel-collapse collapse in" aria-expanded="true" style="">
                                        <div class="portlet-body">
                                            <div class="form-group text-center m-b-20">
                                                @if(!empty($value))
                                                <div class="image-placeholder" id="wfm" data-input="hidden-{{$key}}" data-preview="holder-{{$key}}">
                                                    <img src="{{url($value)}}" id="holder-{{$key}}" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                                </div>
                                                <input type="hidden" name="slider[image][]" id="hidden-{{$key}}" value="{{$value or ''}}">
                                                @else
                                                <div class="image-placeholder" id="wfm" data-input="hidden-{{$key}}" data-preview="holder-{{$key}}">
                                                    <img src="{{asset('placeholder.png')}}" id="holder-{{$key}}" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                                </div>
                                                <input type="hidden" name="slider[image][]" id="hidden-{{$key}}">
                                                @endif
                                            </div>
                                            <div class="form-group text-center m-b-20">
                                                <input class="form-control" placeholder="Title" name="slider[title][]" value="{{$sliders['title'][$key] or ''}}">
                                            </div>
                                            <div class="form-group text-center m-b-20">
                                                <input class="form-control" placeholder="Description" name="slider[text][]" value="{{$sliders['text'][$key] or ''}}">
                                            </div>
                                            <div class="form-group text-center m-b-20">
                                                <input class="form-control" placeholder="Button Text" name="slider[btn][]" value="{{$sliders['btn'][$key] or ''}}">
                                            </div>
                                            <div class="form-group text-center m-b-20">
                                                <input class="form-control" placeholder="Button Link" name="slider[link][]" value="{{$sliders['link'][$key] or ''}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="javascript:void(0)" class="btn btn-danger" onclick="deleteit()">Delete</a>
                            <a href="{{route('sliders')}}" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{route('deleteSlider',$data['id'])}}" method="POST" id="delete-form">
                <input type="hidden" name="_method" value="DELETE">
                {{csrf_field()}}
            </form>
        </div>
    </div>

</div>
@endsection
@section('customScripts')
<script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
    $("#sliders").sortable({
      handle: ".handle",
      axis: 'y'
    });
});
$("#addSlider").on('click',function(){
  var count = Math.floor((Math.random() * 999) + 1);
  var html = `<div class="portlet ui-state-default">
            <div class="portlet-heading bg-primary">
                <h3 class="portlet-title">
                    Slider Image
                </h3>
                <div class="portlet-widgets">
                    <a href="javascript:;" class="handle"><i class="fa fa-arrows"></i></a>
                    <span class="divider"></span>
                    <a data-toggle="collapse" data-parent="#hr`+count+`" href="#hr`+count+`" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                    <span class="divider"></span>
                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="hr`+count+`" class="panel-collapse collapse in" aria-expanded="true" style="">
                <div class="portlet-body">
                    <div class="form-group text-center m-b-20">
                        <div class="image-placeholder" id="wfm" data-input="hidden-`+count+`" data-preview="holder-`+count+`">
                            <img src="{{asset('placeholder.png')}}" id="holder-`+count+`" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                        </div>
                        <input type="hidden" name="slider[image][]" id="hidden-`+count+`">
                    </div>
                    <div class="form-group text-center m-b-20">
                        <input class="form-control" placeholder="Title" name="slider[title][]">
                    </div>
                    <div class="form-group text-center m-b-20">
                        <input class="form-control" placeholder="Description" name="slider[text][]">
                    </div>
                    <div class="form-group text-center m-b-20">
                        <input class="form-control" placeholder="Button Text" name="slider[btn][]">
                    </div>
                    <div class="form-group text-center m-b-20">
                        <input class="form-control" placeholder="Button Link" name="slider[link][]">
                    </div>
                </div>
            </div>
        </div>`;
        $("#sliders").append(html);
        $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
});
function deleteit() {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this!",
        type: "error",
        showCancelButton: true,
        cancelButtonClass: 'btn-default btn-md waves-effect',
        confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
        confirmButtonText: 'Delete!',
    },function() {
          $("#delete-form").submit();
    });
}
</script>
@endsection