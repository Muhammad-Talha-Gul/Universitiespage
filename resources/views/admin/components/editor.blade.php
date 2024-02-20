<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Editor
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
                        <input type="text" name="components[{{$rand}}][editor][title]" class="form-control" placeholder="Title/Heading" value="{{$slot or ''}}">
                    </div>
                    <div class="form-group col-md-6">
                        <select class="form-control columns_selection" name="components[{{$rand}}][editor][columns]" data-rand="{{$rand}}" data-placement="{{'columns_'.$rand}}">
                            <option value="1" @isset($meta['columns']) {{($meta['columns']==1)?'selected':''}} @endisset>1 Column</option>
                            <option value="2" @isset($meta['columns']) {{($meta['columns']==2)?'selected':''}} @endisset>2 Columns</option>
                            <option value="3" @isset($meta['columns']) {{($meta['columns']==3)?'selected':''}} @endisset>3 Columns</option>
                            <option value="4" @isset($meta['columns']) {{($meta['columns']==4)?'selected':''}} @endisset>4 Columns</option>
                            <option value="5" @isset($meta['columns']) {{($meta['columns']==5)?'selected':''}} @endisset>5 Columns</option>
                            <option value="6" @isset($meta['columns']) {{($meta['columns']==6)?'selected':''}} @endisset>6 Columns</option>
                        </select>
                    </div>
                    <div id="columns_{{$rand}}">
                        @if(isset($meta['columns']))
                        @for($i=1;$i<=$meta['columns'];$i++)
                        <div class="form-group col-md-12">
                            <textarea class="summernote" name="components[{{$rand}}][editor][content_{{$i}}]">{{$meta['content_'.$i] or ''}}</textarea>
                        </div>
                        @endfor
                        @else
                        <div class="form-group col-md-12">
                            <textarea class="summernote" name="components[{{$rand}}][editor][content_1]">{{$meta['content_1'] or ''}}</textarea>
                        </div>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
                {{-- <hr>
                <h4>Additional</h4>
                <div class="row">
                    <div class="form-group col-md-4">
                        <input type="checkbox" name="components[{{$rand}}][editor][styled]" value="1" @isset($meta['styled']) {{($meta['styled']==1)?'checked':''}} @endisset> Styled
                    </div>
                    <div class="form-group col-md-4">
                        <input type="checkbox" name="components[{{$rand}}][editor][full_width]" value="1" @isset($meta['full_width']) {{($meta['full_width']==1)?'checked':''}} @endisset> Full Width
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>