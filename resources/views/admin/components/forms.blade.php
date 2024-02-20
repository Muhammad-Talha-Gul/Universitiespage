<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Forms
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
                        <input type="text" name="components[{{$rand}}][forms][title]" class="form-control" placeholder="Title/Heading" value="{{$slot or ''}}">
                    </div>
                    <div class="form-group col-md-6">
                        <select class="form-control" name="components[{{$rand}}][forms][form]">
                            <option value="contact" @isset($meta['form']) {{($meta['form']=='contact')?'selected':''}} @endisset>Contact Form</option>
                            {{-- <option value="helping" @isset($meta['form']) {{($meta['form']=='helping')?'selected':''}} @endisset>Helping</option> --}}
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>