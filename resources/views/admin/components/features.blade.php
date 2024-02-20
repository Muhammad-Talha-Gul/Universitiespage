<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Features
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
                        <input type="text" name="components[{{$rand}}][features][title]" class="form-control" placeholder="Title/Heading" value="{{$slot or ''}}">
                    </div>                    
                    <div class="input-group col-md-6" style="float: left;">
                       <span class="input-group-btn">
                         <a data-input="thumbnail{{$rand}}" data-preview="holder{{$rand}}" class="btn btn-success image-placeholder"><i class="fa fa-picture-o"></i> Choose Background</a>
                       </span>
                       <input id="thumbnail{{$rand}}" class="form-control" type="text" name="components[{{$rand}}][features][bg]" placeholder="Background Image" @isset($meta['bg']) value="{{$meta['bg']}}" @endisset>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="input-group">
                               <span class="input-group-btn">
                                 <a data-input="img1{{$rand}}" class="btn btn-success image-placeholder"><i class="fa fa-picture-o"></i> Choose Image</a>
                               </span>
                               <input id="img1{{$rand}}" class="form-control" type="text" name="components[{{$rand}}][features][img1]" placeholder="Image" @isset($meta['img1']) value="{{$meta['img1']}}" @endisset>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="components[{{$rand}}][features][title1]" placeholder="Title" value="{{$meta['title1'] or ''}}">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="components[{{$rand}}][features][detail1]" placeholder="Detail">{{$meta['detail1'] or ''}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group">
                               <span class="input-group-btn">
                                 <a data-input="img2{{$rand}}" data-preview="holder{{$rand}}" class="btn btn-success image-placeholder"><i class="fa fa-picture-o"></i> Choose Image</a>
                               </span>
                               <input id="img2{{$rand}}" class="form-control" type="text" name="components[{{$rand}}][features][img2]" placeholder="Image" @isset($meta['img2']) value="{{$meta['img2']}}" @endisset>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="components[{{$rand}}][features][title2]" placeholder="Title" value="{{$meta['title2'] or ''}}">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="components[{{$rand}}][features][detail2]" placeholder="Detail">{{$meta['detail2'] or ''}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group">
                               <span class="input-group-btn">
                                 <a data-input="img3{{$rand}}" data-preview="holder{{$rand}}" class="btn btn-success image-placeholder"><i class="fa fa-picture-o"></i> Choose Image</a>
                               </span>
                               <input id="img3{{$rand}}" class="form-control" type="text" name="components[{{$rand}}][features][img3]" placeholder="Image" @isset($meta['img3']) value="{{$meta['img3']}}" @endisset>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="components[{{$rand}}][features][title3]" placeholder="Title" value="{{$meta['title2'] or ''}}">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="components[{{$rand}}][features][detail3]" placeholder="Detail">{{$meta['detail3'] or ''}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>