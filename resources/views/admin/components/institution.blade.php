<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Institution
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
                        <input type="text" name="components[{{$rand}}][institution][class]" class="form-control" placeholder="Custom Class" value="{{$meta['class'] or ''}}">
                    </div>

                    <div class="form-group col-md-6">
                        <input type="text" name="components[{{$rand}}][institution][title]" class="form-control" placeholder="Title" value="{{$meta['title'] or ''}}">
                    </div>

                    <div class="form-group col-md-6">
                        <input type="text" name="components[{{$rand}}][institution][text]" class="form-control" placeholder="Paragraph" value="{{$meta['text'] or ''}}">
                    </div>

                    <div class="input-group col-md-6">
                       <span class="input-group-btn">
                         <a data-input="thumbnail{{$rand}}" data-preview="holder{{$rand}}" class="btn btn-success image-placeholder"><i class="fa fa-picture-o"></i> Choose BG Image</a>
                       </span>
                       <input id="thumbnail{{$rand}}" class="form-control" type="text" name="components[{{$rand}}][institution][bg]" placeholder="Background Image" @isset($meta['bg']) value="{{$meta['bg']}}" @endisset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>