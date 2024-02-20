<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Register
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
                        <input type="text" name="components[{{$rand}}][register][class]" class="form-control" placeholder="Custom Calss" value="{{$meta['class'] or ''}}">
                    </div>

                    <div class="form-group col-md-6">
                        <select name="components[{{$rand}}][register][type]" class="form-control">
                            <option value="institute" @if(isset($meta['type'])) {{($meta['type'] == 'institute')?'selected':''}} @endif>Institute</option>
                            <option value="student" @if(isset($meta['type'])) {{($meta['type'] == 'student')?'selected':''}} @endif>Student</option>
                            <option value="consultant" @if(isset($meta['type'])) {{($meta['type'] == 'consultant')?'selected':''}} @endif>Consultant</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <input type="text" name="components[{{$rand}}][register][title]" class="form-control" placeholder="Student Heading" value="{{$meta['title'] or ''}}">
                    </div>

                       
                </div>
            </div>
        </div>
    </div>
</div>