<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Search
            </h3>
            <div class="portlet-widgets">
                <a data-toggle="collapse" data-parent="#{{$rand}}" href="#{{$rand}}" class="collapsed" aria-expanded="true"><i class="ion-minus-round"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="{{$rand}}" class="panel-collapse collapse" aria-expanded="true" style="">
            <div class="portlet-body">
                <div class="form-group col-md-6">
                    <input type="text" name="components[{{$rand}}][search][class]" class="form-control" placeholder="Custom Class" value="{{$meta['class'] or ''}}">
                </div>

                <div class="form-group col-md-6">
                   <select name="components[{{$rand}}][search][style]" class="form-control select2 change-style" data-rand="{{$rand}}">
                        <option selected disabled>Select Any Style</option> 
                       <option value="style1" @if(isset($meta['style'])) {{($meta['style'] == 'style1')?'selected':''}} @endif>Style 1</option>
                       <option value="style2" @if(isset($meta['style'])) {{($meta['style'] == 'style2')?'selected':''}} @endif>Style 2</option>
                   </select>
                </div>
                
                <div class="style-box{{$rand}} style1{{$rand}}" @if(isset($meta['style'])) @if($meta['style']=='style1') @else style="display:none" @endif @else style="display:none" @endif>
                    <div class="form-group col-md-4">
                        <input type="text" name="components[{{$rand}}][search][opt][0][title]" class="form-control" placeholder="Heading/Title" value="{{$meta['opt'][0]['title'] or ''}}">
                        <input type="text" name="components[{{$rand}}][search][opt][0][text]" class="form-control" placeholder="Text" value="{{$meta['opt'][0]['text'] or ''}}" style="margin-top:5px;">
                        <select name="components[{{$rand}}][search][opt][0][type]" class="form-control">
                            <option selected disabled>Select Any Type</option> 
                            <option value="programs" @if(isset($meta['opt'][0]['type'])) {{($meta['opt'][0]['type'] == 'programs')?'selected':''}} @endif>Programs</option>
                            <option value="university" @if(isset($meta['opt'][0]['type'])) {{($meta['opt'][0]['type'] == 'university')?'selected':''}} @endif>University</option>
                            <option value="subject" @if(isset($meta['opt'][0]['type'])) {{($meta['opt'][0]['type'] == 'subject')?'selected':''}} @endif>Subject</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <input type="text" name="components[{{$rand}}][search][opt][1][title]" class="form-control" placeholder="Heading/Title" value="{{$meta['opt'][1]['title'] or ''}}">
                        <input type="text" name="components[{{$rand}}][search][opt][1][text]" class="form-control" placeholder="Text" value="{{$meta['opt'][1]['text'] or ''}}" style="margin-top:5px;">
                        <select name="components[{{$rand}}][search][opt][1][type]" class="form-control" style="margin-top:5px;">
                            <option selected disabled>Select Any Type</option> 
                            <option value="programs" @if(isset($meta['opt'][1]['type'])) {{($meta['opt'][1]['type'] == 'programs')?'selected':''}} @endif>Programs</option>
                            <option value="university" @if(isset($meta['opt'][1]['type'])) {{($meta['opt'][1]['type'] == 'university')?'selected':''}} @endif>University</option>
                            <option value="subject" @if(isset($meta['opt'][1]['type'])) {{($meta['opt'][1]['type'] == 'subject')?'selected':''}} @endif>Subject</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <input type="text" name="components[{{$rand}}][search][opt][2][title]" class="form-control" placeholder="Heading/Title" value="{{$meta['opt'][2]['title'] or ''}}">
                        <input type="text" name="components[{{$rand}}][search][opt][2][text]" class="form-control" placeholder="Text" value="{{$meta['opt'][2]['text'] or ''}}" style="margin-top:5px;">
                        <select name="components[{{$rand}}][search][opt][2][type]" class="form-control" style="margin-top:5px;">
                            <option selected disabled>Select Any Type</option> 
                            <option value="programs" @if(isset($meta['opt'][2]['type'])) {{($meta['opt'][2]['type'] == 'programs')?'selected':''}} @endif>Programs</option>
                            <option value="university" @if(isset($meta['opt'][2]['type'])) {{($meta['opt'][2]['type'] == 'university')?'selected':''}} @endif>University</option>
                            <option value="subject" @if(isset($meta['opt'][2]['type'])) {{($meta['opt'][2]['type'] == 'subject')?'selected':''}} @endif>Subject</option>
                        </select>
                    </div>
                    
                </div>


                <div class="style-box{{$rand}} style2{{$rand}}" @if(isset($meta['style'])) @if($meta['style']=='style2') @else style="display:none" @endif @else style="display:none" @endif>
                    <div class="form-group col-md-6">
                        <input type="text" name="components[{{$rand}}][search][title]" class="form-control" placeholder="Heading" value="{{$meta['title'] or ''}}">
                    </div>

                    <div class="input-group col-md-6">
                       <span class="input-group-btn">
                         <a data-input="thumbnail{{$rand}}" data-preview="holder{{$rand}}" class="btn btn-success image-placeholder"><i class="fa fa-picture-o"></i> Choose BG Image</a>
                       </span>
                       <input id="thumbnail{{$rand}}" class="form-control" type="text" name="components[{{$rand}}][search][bg_image]" placeholder="Background Image" @isset($meta['bg_image']) value="{{$meta['bg_image']}}" @endisset>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>