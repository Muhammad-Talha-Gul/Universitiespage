<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Slider
            </h3>
            <div class="portlet-widgets">
                <a data-toggle="collapse" data-parent="#{{$rand}}" href="#{{$rand}}" class="collapsed" aria-expanded="true"><i class="ion-minus-round"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="{{$rand}}" class="panel-collapse collapse" aria-expanded="true" style="">
            <div class="portlet-body">
                <div class="row">
                    <div class="form-group col-md-6">
                       <select name="components[{{$rand}}][programs][style]" class="form-control select2 change-style" data-rand="{{$rand}}">
                            <option selected="" disabled="">Select Any Style</option>
                           <option value="style1" @if(isset($meta['style'])) {{($meta['style'] == 'style1')?'selected':''}} @endif>Style 1</option>
                           <option value="style2" @if(isset($meta['style'])) {{($meta['style'] == 'style2')?'selected':''}} @endif>Style 2</option>
                       </select>
                    </div>

                    <div class="form-group col-md-6">
                        <select class="form-control select2" name="components[{{$rand}}][programs][slider]">
                            @foreach($sliders as $slider)
                                <option value="{{$slider->id}}" @isset($meta['slider']) {{((int)$meta['slider']===(int)$slider->id)?'selected':''}} @endisset>{{$slider->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="row style-box{{$rand}} style1{{$rand}}" @if(isset($meta['style'])) @if($meta['style']=='style1') @else style="display:none" @endif @else style="display:none" @endif>
                        <div class="col-md-6">
                            <div class="form-group col-md-12 p-0">
                                <input type="text" name="components[{{$rand}}][programs][class]" class="form-control" placeholder="Custom Calss" value="{{$meta['class'] or ''}}">
                            </div>

                            <div class="form-group col-md-12 p-0">
                                <input type="text" name="components[{{$rand}}][programs][title]" class="form-control" placeholder="Title/Heading" value="{{$meta['title'] or ''}}">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <textarea name="components[{{$rand}}][programs][text]" class="form-control" rows="6" placeholder="Paragraph">{!!$meta['text'] or ''!!}</textarea>
                        </div>

                    </div>

                    <div class="row style-box{{$rand}} style1{{$rand}}" @if(isset($meta['style'])) @if($meta['style']=='style1') @else style="display:none" @endif @else style="display:none" @endif>

                
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>