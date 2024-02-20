<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Images Grid
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
                        <input type="text" name="components[{{$rand}}][images][title]" class="form-control" placeholder="Title/Heading" value="{{$slot or ''}}">
                    </div>
                    <div class="form-group col-md-5">
                        <select name="components[{{$rand}}][images][style]" class="form-control">
                            <option value="1" @isset($meta['style']) {{($meta['style']==1)?'selected':''}} @endisset>Style 1</option>                            
                        </select>
                    </div>
                    <div class="form-group pull-right col-md-1">
                        <a href="javascript:void(0)" class="btn btn-md text-left btn-primary addImage" data-id="{{$rand}}"><i class="fa fa-plus"></i></a>                        
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div id="images-{{$rand}}" class="methods-list">
                        @isset($meta['image'])
                        @foreach($meta['image'] as $key => $value)
                        <div class="row text-center" style="position: relative;">
                            <div class="input-group pull-left col-md-6">
                               <span class="input-group-btn">
                                 <a data-input="thumbnail-{{$key.'-'.$rand}}" data-preview="holder{{$key.'-'.$rand}}" class="btn btn-success image-placeholder"><i class="fa fa-picture-o"></i> Choose</a>
                               </span>
                               <input id="thumbnail-{{$key.'-'.$rand}}" class="form-control" type="text" name="components[{{$rand}}][images][image][]" value="{{$value}}">
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" name="components[{{$rand}}][images][text][]" placeholder="Text" value="{{$meta['text'][$key] or ''}}">
                            </div>                            
                            <div class="form-group col-md-1">
                                <a href="javascript:void(0)" class="btn btn-md btn-danger removeText"><i class="fa fa-times"></i></a>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Desciption" name="components[{{$rand}}][images][desc][]" value="{{$meta['desc'][$key] or ''}}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="components[{{$rand}}][images][btntext][]" class="form-control" placeholder="Button Text" value="{{$meta['btntext'][$key] or ''}}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="components[{{$rand}}][images][btnlink][]" class="form-control" placeholder="Button Link" value="{{$meta['btnlink'][$key] or ''}}">
                            </div>                            
                        </div>
                        @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>