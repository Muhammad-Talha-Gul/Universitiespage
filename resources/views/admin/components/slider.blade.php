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
                    <div class="form-group  col-md-6">
                        <input type="text" name="components[{{$rand}}][slider][title]" class="form-control" placeholder="Title/Heading" value="{{$slot or ''}}">
                    </div>
                    <div class="form-group col-md-6">
                        <select class="form-control" name="components[{{$rand}}][slider][id]">
                            @foreach($sliders as $value)
                            <option value="{{$value->id}}" @isset($meta['id']) {{($meta['id']==$value->id)?'selected':''}} @endisset>{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>