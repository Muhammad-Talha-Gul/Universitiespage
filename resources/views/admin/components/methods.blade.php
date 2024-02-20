<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Methods
            </h3>
            <div class="portlet-widgets">
                <a data-toggle="collapse" data-parent="#{{$rand}}" href="#{{$rand}}" class="collapsed" aria-expanded="true"><i class="ion-minus-round"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="{{$rand}}" class="panel-collapse collapse" aria-expanded="true" style="">
            <div class="portlet-body">
                <div class="row">
                    <div class="form-group col-md-6 col-md-offset-2">
                        <input type="text" name="components[{{$rand}}][methods][title]" class="form-control" placeholder="Title/Heading" value="{{$slot or ''}}">
                    </div>
                    <div class="form-group col-md-1">
                        <a href="javascript:void(0)" class="btn btn-md text-left btn-primary addMethod" data-id="{{$rand}}"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="clearfix"></div>
                    <div id="methods-{{$rand}}" class="methods-list">
                        @isset($meta['image1'])
                        @foreach($meta['image1'] as $key => $value)
                        <div class="row text-center" style="position: relative;">
                            <a href="javascript:void(0)" class="text-danger deleteMethod"><i class="fa fa-times"></i></a>
                            <div class="form-group col-md-6">
                                <div class="image-placeholder" id="wfm" data-input="f-hidden-1-{{$key}}" data-preview="f-holder-1-{{$key}}">
                                    @if(!empty($value))
                                    <img src="{{url($value)}}" id="f-holder-1-{{$key}}" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                    @else
                                    <img src="{{asset('placeholder.jpg')}}" id="f-holder-1-{{$key}}" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                    @endif
                                </div>
                                <input type="hidden" name="components[{{$rand}}][methods][image1][]" id="f-hidden-1-{{$key}}" value="{{$value}}">
                            </div>
                            <div class="form-group col-md-6">
                                <div class="image-placeholder" id="wfm" data-input="f-hidden-2-{{$key}}" data-preview="f-holder-2-{{$key}}">
                                    @if(isset($meta['image2'][$key]))
                                    <img src="{{url($meta['image2'][$key])}}" id="f-holder-2-{{$key}}" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                    @else
                                    <img src="{{asset('placeholder.jpg')}}" id="f-holder-2-{{$key}}" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                    @endif
                                </div>
                                <input type="hidden" name="components[{{$rand}}][methods][image2][]" id="f-hidden-2-{{$key}}" value="{{$meta['image2'][$key] or ''}}">
                            </div>
                        </div>
                        @endforeach
                        @endisset
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>