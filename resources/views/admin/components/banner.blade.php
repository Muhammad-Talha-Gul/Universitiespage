<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Banner
            </h3>
            <div class="portlet-widgets">
                <a data-toggle="collapse" data-parent="#{{$rand}}" href="#{{$rand}}" class="collapsed" aria-expanded="true"><i class="ion-minus-round"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="{{$rand}}" class="panel-collapse collapse" aria-expanded="true" style="">
            <div class="portlet-body">
                <div class="row">
                    <div class="form-group col-md-12">
                       <select name="components[{{$rand}}][banner][style]" class="form-control select2 change-style" data-rand="{{$rand}}">
                           <option value="style1" @if(isset($meta['style'])) {{($meta['style'] == 'style1')?'selected':''}} @endif>Style 1</option>
                           <option value="style2" @if(isset($meta['style'])) {{($meta['style'] == 'style2')?'selected':''}} @endif>Style 2</option>
                       </select>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="image-placeholder" id="wfm" data-input="b1-{{$rand}}-hidden" data-preview="b1-{{$rand}}-holder">
                            @if(isset($meta['image']))
                            <img src="{{url($meta['image'])}}" id="b1-{{$rand}}-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                            @else
                            <img src="{{asset('placeholder.jpg')}}" id="b1-{{$rand}}-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                            @endif
                        </div>
                        <input type="hidden" name="components[{{$rand}}][banner][image]" id="b1-{{$rand}}-hidden" value="{{$meta['image'] or ''}}"> <br>
                    </div>

                    
                    <div class="col-md-6">
                        <div class="form-group col-md-12 p-0">
                            <input type="text" class="form-control" placeholder="Custom Class" name="components[{{$rand}}][banner][class]" value="{{$meta['class'] or ''}}">
                        </div>
                        
                        <div class="form-group col-md-12 p-0">
                            <input type="text" name="components[{{$rand}}][banner][title]" class="form-control" placeholder="Title" value="{{$meta['title'] or ''}}">
                        </div>

                        <div class="row style-box{{$rand}} style1{{$rand}}" @if(isset($meta['style'])) @if($meta['style']=='style1') @else style="display:none" @endif @else style="display:none" @endif>


                        </div>

                        <div class="row style-box{{$rand}} style2{{$rand}}" @if(isset($meta['style'])) @if($meta['style']=='style2') @else style="display:none" @endif @else style="display:none" @endif>

                            <div class="form-group col-md-12">
                                <textarea name="components[{{$rand}}][banner][text]" class="form-control" placeholder="Paragraph">{{$meta['text'] or ''}}</textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <input type="text" name="components[{{$rand}}][banner][sub_title]" class="form-control" placeholder="Sub Title" value="{{$meta['sub_title'] or ''}}">
                            </div>

                            <div class="form-group col-md-12">
                                <input type="text" name="components[{{$rand}}][banner][text2]" class="form-control" placeholder="Text" value="{{$meta['text2'] or ''}}">
                            </div>

                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>