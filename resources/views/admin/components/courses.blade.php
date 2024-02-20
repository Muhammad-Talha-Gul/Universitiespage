<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Courses
            </h3>
            <div class="portlet-widgets">
                <a data-toggle="collapse" data-parent="#{{$rand}}" href="#{{$rand}}" class="collapsed" aria-expanded="true"><i class="ion-minus-round"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="{{$rand}}" class="panel-collapse collapse" aria-expanded="true" style="">
            <div class="portlet-body">
                <div class="row">
                    <div class="form-group col-md-4 col-md-offset-4">
                        <input type="text" name="components[{{$rand}}][courses][class]" class="form-control" placeholder="Class" value="{{$meta['class'] or ''}}">
                    </div>
                    <div class="form-group col-sm-3 col-md-offset-3" align="center">
                        <div class="form-group">
                            <input type="text" name="components[{{$rand}}][courses][title1]" class="form-control" placeholder="Course Qualification Title" value="{{$meta['title1'] or ''}}">
                        </div>
                        <label>Show Course By Qualification</label> <br>
                        <input id="{{$rand}}type" class="mark_featured type" data-id="{{$rand}}" switch="primary" name="components[{{$rand}}][courses][type]" type="checkbox" @isset($meta['type']) @if($meta['type'] != null) checked="checked" @endif @endisset>
                        <label for="{{$rand}}type" data-on-label="Yes" data-off-label="No"></label>
                    </div>
                    <div class="form-group col-sm-3" align="center">
                        <div class="form-group">
                            <input type="text" name="components[{{$rand}}][courses][title2]" class="form-control" placeholder="Course Subject Title" value="{{$meta['title2'] or ''}}">
                        </div>
                        <label>Show Course By Subject</label> <br>
                        <input id="{{$rand}}subject" class="mark_featured subject" data-id="{{$rand}}" switch="primary" name="components[{{$rand}}][courses][subject]" type="checkbox" @isset($meta['subject']) @if($meta['subject'] != null) checked="checked" @endif @endisset>
                        <label for="{{$rand}}subject" data-on-label="Yes" data-off-label="No"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>