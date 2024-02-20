<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Blank Space
            </h3>
            <div class="portlet-widgets">
                <a data-toggle="collapse" data-parent="#{{$rand}}" href="#{{$rand}}" class="collapsed" aria-expanded="true"><i class="ion-minus-round"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="{{$rand}}" class="panel-collapse collapse" aria-expanded="true" style="">
            <div class="portlet-body">
                <div class="row">
                    <div class="form-group col-md-6 col-md-offset-3">
                        <select name="components[{{$rand}}][spacer][style]" class="form-control">
                            <option value="1" @isset($meta['style']) {{($meta['style']==1)?'selected':''}} @endisset>Simple</option>
                            <option value="2" @isset($meta['style']) {{($meta['style']==2)?'selected':''}} @endisset>With Horizontal Seperator</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-md-offset-3">
                        <input type="number" name="components[{{$rand}}][spacer][space]" class="form-control" placeholder="Space in pixels" value="{{$meta['space'] or ''}}">
                    </div>                                        
                </div>
            </div>
        </div>
    </div>
</div>