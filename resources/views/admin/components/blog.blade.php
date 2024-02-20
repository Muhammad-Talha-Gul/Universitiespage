<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Blog
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
                        <input type="text" name="components[{{$rand}}][blog][class]" class="form-control" placeholder="Custom Class" value="{{$meta['class'] or ''}}">
                    </div>

                    <div class="form-group col-md-6">
                        <input type="number" name="components[{{$rand}}][blog][paginate]" class="form-control" placeholder="Paginate" value="{{$meta['paginate'] or ''}}" min="0">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>