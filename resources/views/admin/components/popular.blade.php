<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Popular
            </h3>
            <div class="portlet-widgets">
                <a data-toggle="collapse" data-parent="#{{$rand}}" href="#{{$rand}}" class="collapsed" aria-expanded="true"><i class="ion-minus-round"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="{{$rand}}" class="panel-collapse collapse" aria-expanded="true" style="">
            <div class="portlet-body">
                <div class="row">
                    <div class=" col-md-6">
                        <div class="form-group col-sm-12 p-0">
                            <input type="text" name="components[{{$rand}}][popular][class]" class="form-control" placeholder="Custom Class" value="{{$meta['class'] or ''}}">
                        </div>

                        <div class="form-group col-sm-12 p-0">
                            <input type="text" name="components[{{$rand}}][popular][title]" class="form-control" placeholder="Title/Heading" value="{{$meta['title'] or ''}}">
                        </div>

                        <div class="form-group col-sm-12 p-0">
                            <select name="components[{{$rand}}][popular][type]" class="form-control select2">
                                <option selected="" disabled="">Select Any Option</option>
                                <option value="blog" @if(isset($meta['type'])) {{($meta['type'] == 'blog')? 'selected':''}} @endif>Blog</option>
                                <option value="university" @if(isset($meta['type'])) {{($meta['type'] == 'university')? 'selected':''}} @endif>University</option>
                                <option value="consultant" @if(isset($meta['type'])) {{($meta['type'] == 'consultant')? 'selected':''}} @endif>Consultant</option>
                                <option value="courses" @if(isset($meta['type'])) {{($meta['type'] == 'courses')? 'selected':''}} @endif>Courses</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                         <textarea name="components[{{$rand}}][popular][text]" class="form-control" placeholder="Paragraph" rows="6">{{$meta['text'] or ''}}</textarea>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>