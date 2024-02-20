<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Contact
            </h3>
            <div class="portlet-widgets">
                <a data-toggle="collapse" data-parent="#{{$rand}}" href="#{{$rand}}" class="collapsed" aria-expanded="true"><i class="ion-minus-round"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="{{$rand}}" class="panel-collapse collapse" aria-expanded="true" style="">
            <div class="portlet-body">
                <div class="row">
                    <div class="form-group col-md-6 ">
                        <input type="text" name="components[{{$rand}}][contact][class]" class="form-control" placeholder="Custom Class" value="{{$meta['class'] or ''}}">
                    </div>  

                    <div class="form-group col-md-6 ">
                        <input type="text" name="components[{{$rand}}][contact][title]" class="form-control" placeholder="Title/Heading" value="{{$meta['title'] or ''}}">
                    </div>

                    <div class="form-group col-md-6 ">
                        <textarea name="components[{{$rand}}][contact][text]" class="form-control" placeholder="Paragraph">{{$meta['text'] or ''}}</textarea>
                    </div> 

                    <div class="form-group col-md-6 ">
                        <div class="col-sm-12 p-0">
                            <input type="text" name="components[{{$rand}}][contact][phone]" class="form-control" placeholder="Phone Number" value="{{$meta['title'] or ''}}">
                        </div>
                        <div class="col-sm-12 p-0" style="margin-top: 12px;">
                            <input type="text" name="components[{{$rand}}][contact][email]" class="form-control" placeholder="Email" value="{{$meta['email'] or ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>