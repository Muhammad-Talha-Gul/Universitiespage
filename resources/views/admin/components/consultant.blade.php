<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Consultant
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
                        <input type="text" name="components[{{$rand}}][consultant][class]" class="form-control" placeholder="Custom Class" value="{{$meta['class'] or ''}}">
                    </div>

                    <div class="form-group col-md-6">
                       <select name="components[{{$rand}}][consultant][style]" class="form-control select2 change-style" data-rand="{{$rand}}">
                           <option value="style1" @if(isset($meta['style'])) {{($meta['style'] == 'style1')?'selected':''}} @endif>Consultant Grid</option>
                           <option value="style2" @if(isset($meta['style'])) {{($meta['style'] == 'style2')?'selected':''}} @endif>Consultant Form</option>
                       </select>
                    </div>
                    
                    <div class="style-box{{$rand}} style1{{$rand}}" @if(isset($meta['style'])) @if($meta['style']=='style1') @else style="display:none" @endif @else style="display:none" @endif>
                        <div class="col-12">
                            <h5 style="margin-left:10px;margin-top: 10px;">Consultant Grid</h5>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="components[{{$rand}}][consultant][title]" class="form-control" placeholder="Title/Heading" value="{{$meta['title'] or ''}}">
                        </div>

                        <div class="form-group col-md-6">
                            <textarea name="components[{{$rand}}][consultant][text]" class="form-control" placeholder="Paragraph">{{$meta['text'] or ''}}</textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <textarea name="components[{{$rand}}][consultant][text1]" class="form-control" placeholder="Sub Paragraph">{{$meta['text1'] or ''}}</textarea>
                        </div>

                        {{-- <div class="form-group col-md-12">
                            <button data-rand="{{$rand}}" type="button" class="btn btn-primary add-topic" style=""><i class="fa fa-plus"> Add New Topic</i></button>
                        </div>
        
                        <div class="cosultant-topic row">
                            @if(isset($meta['topic']))
                            
                            @if(count($meta['topic'])>0)
                            @foreach($meta['topic'] as $key=>$value)
                                <div class="form-group col-lg-3 col-md-4 col-sm-6 topic" style="position: relative;">
                                    <div class="image-placeholder" id="wfm{{$key}}" data-input="{{$key}}b1-{{$rand}}-hidden" data-preview="{{$key}}b1-{{$rand}}-holder">
                                        @if(isset($value['image']))
                                        <img src="{{url($value['image'])}}" id="{{$key}}b1-{{$rand}}-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                        @else
                                        <img src="{{asset('placeholder.jpg')}}" id="{{$key}}b1-{{$rand}}-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-danger remove-topic" style="position: absolute;top:0px;right: 11px;border-bottom-left-radius: 224px;width: 39px;padding-bottom: 13px;padding-left: 16px;"><i class="fa fa-trash"></i></button>
                                    <input type="hidden" name="components[{{$rand}}][consultant][topic][{{$key}}][image]" id="{{$key}}b1-{{$rand}}-hidden" value="{{($value['image'])??''}}"> <br>
                                    <div class="form-group">
                                        <input type="text" name="components[{{$rand}}][consultant][topic][{{$key}}][title]" class="form-control" placeholder="Title/Heading" value="{{($value['title'])??''}}">
                                    </div>
                                </div>
                            @endforeach
                            @endif

                            @endif
                        </div> --}}
                    </div>

                    <div class="style-box{{$rand}} style2{{$rand}}" @if(isset($meta['style'])) @if($meta['style']=='style2') @else style="display:none" @endif @else style="display:none" @endif>
                        <div class="col-12">
                            <h5 style="margin-left:10px;margin-top: 10px;">Consultant Grid</h5>
                        </div>

                        <div class="form-group col-md-6">
                            <input type="text" name="components[{{$rand}}][consultant][form_title]" class="form-control" placeholder="Title/Heading" value="{{$meta['title'] or ''}}">
                        </div>

                        <div class="form-group col-md-6">
                            <input type="text" name="components[{{$rand}}][consultant][form_sub_title]" class="form-control" placeholder="Sub Title/Sub Heading" value="{{$meta['title'] or ''}}">
                        </div>

                        
                    </div>

                   

                </div>
            </div>
        </div>
    </div>
</div>