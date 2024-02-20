<div class="col-md-12">
    <div class="portlet ui-state-default">
        <div class="portlet-heading bg-primary">
            <h3 class="portlet-title">
                Buttons
            </h3>
            <div class="portlet-widgets">
                <a data-toggle="collapse" data-parent="#{{$rand}}" href="#{{$rand}}" class="collapsed" aria-expanded="true"><i class="ion-minus-round"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="{{$rand}}" class="panel-collapse collapse" aria-expanded="true" style="">
            <div class="portlet-body">
                <div class="row el-row">
                    <div class="form-group col-md-6">
                        <input type="text" name="components[{{$rand}}][buttons][class]" class="form-control" placeholder="Custom Class" value="{{$meta['class'] or ''}}">
                    </div>
                    <div class="form-group col-md-6">
                       <select name="components[{{$rand}}][buttons][style]" class="form-control select2 change-style" data-rand="{{$rand}}">
                           <option value="style1" @if(isset($meta['style'])) {{($meta['style'] == 'style1')?'selected':''}} @endif>Style 1</option>
                           <option value="style2" @if(isset($meta['style'])) {{($meta['style'] == 'style2')?'selected':''}} @endif>Style 2</option>
                           <option value="style3" @if(isset($meta['style'])) {{($meta['style'] == 'style3')?'selected':''}} @endif>Style 3</option>
                       </select>
                    </div>

                    <div class="style-box{{$rand}} style1{{$rand}}" @if(isset($meta['style'])) @if($meta['style']=='style1') @else style="display:none" @endif @else style="display:none" @endif>
                        <h4 style="padding-left: 12px;">Style 1</h4>
                        <div class="form-group col-md-12">
                            <input type="text" name="components[{{$rand}}][buttons][style1][title]" class="form-control" placeholder="Title" value="{{$meta['style1']['title'] or ''}}">
                        </div>

                        <div class="col-md-4">
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style1][text1]" class="form-control" placeholder="Button Text" value="{{$meta['style1']['text1'] or ''}}">
                            </div>
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style1][url1]" class="form-control" placeholder="Button Url" value="{{$meta['style1']['url1'] or ''}}">
                            </div>
                        </div>
                        <div class="col-md-4" style="border-left: solid 1px lightgray;">
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style1][text2]" class="form-control" placeholder="Button Text" value="{{$meta['style1']['text2'] or ''}}">
                            </div>
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style1][url2]" class="form-control" placeholder="Button Url" value="{{$meta['style1']['url2'] or ''}}">
                            </div>
                        </div>
                        <div class="col-md-4" style="border-left: solid 1px lightgray;">
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style1][text3]" class="form-control" placeholder="Button Text" value="{{$meta['style1']['text3'] or ''}}">
                            </div>
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style1][url3]" class="form-control" placeholder="Button Url" value="{{$meta['style1']['url3'] or ''}}">
                            </div>
                        </div>
                    </div>

                    <div class="style-box{{$rand}} style2{{$rand}}" @if(isset($meta['style'])) @if($meta['style']=='style2') @else style="display:none" @endif @else style="display:none" @endif>
                        <h4 style="padding-left: 12px;">Style 2</h4>
                        <div class="form-group col-md-12">
                            <input type="text" name="components[{{$rand}}][buttons][style2][title]" class="form-control" placeholder="placeholder" value="{{$meta['style2']['title'] or ''}}">
                        </div>

                        <div class="col-md-4">
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style2][text1]" class="form-control" placeholder="Button Text" value="{{$meta['style2']['text1'] or ''}}">
                            </div>
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style2][url1]" class="form-control" placeholder="Button Url" value="{{$meta['style2']['url1'] or ''}}">
                            </div>
                        </div>
                        <div class="col-md-4" style="border-left: solid 1px lightgray;">
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style2][text2]" class="form-control" placeholder="Button Text" value="{{$meta['style2']['text2'] or ''}}">
                            </div>
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style2][url2]" class="form-control" placeholder="Button Url" value="{{$meta['style2']['url2'] or ''}}">
                            </div>
                        </div>
                        <div class="col-md-4" style="border-left: solid 1px lightgray;">
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style2][text3]" class="form-control" placeholder="Button Text" value="{{$meta['style2']['text3'] or ''}}">
                            </div>
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style2][url3]" class="form-control" placeholder="Button Url" value="{{$meta['style2']['url3'] or ''}}">
                            </div>
                        </div>
                    </div>

                    <div class="style-box{{$rand}} style3{{$rand}}" @if(isset($meta['style'])) @if($meta['style']=='style3') @else style="display:none" @endif @else style="display:none" @endif>
                        <h4 style="padding-left: 12px;">Style 3</h4>
                        <div class="form-group col-md-12">
                            <input type="text" name="components[{{$rand}}][buttons][style3][title]" class="form-control" placeholder="Nav Button" value="{{$meta['style3']['title'] or ''}}">
                        </div>

                        <div class="col-md-4">
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style3][text1]" class="form-control" placeholder="Button Text" value="{{$meta['style3']['text1'] or ''}}">
                            </div>
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style3][url1]" class="form-control" placeholder="Button Url" value="{{$meta['style3']['url1'] or ''}}">
                            </div>
                        </div>
                        <div class="col-md-4" style="border-left: solid 1px lightgray;">
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style3][text2]" class="form-control" placeholder="Button Text" value="{{$meta['style3']['text2'] or ''}}">
                            </div>
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style3][url2]" class="form-control" placeholder="Button Url" value="{{$meta['style3']['url2'] or ''}}">
                            </div>
                        </div>
                        <div class="col-md-4" style="border-left: solid 1px lightgray;">
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style3][text3]" class="form-control" placeholder="Button Text" value="{{$meta['style3']['text3'] or ''}}">
                            </div>
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style3][url3]" class="form-control" placeholder="Button Url" value="{{$meta['style3']['url3'] or ''}}">
                            </div>
                        </div>
                        <div class="col-md-6" style="border-top:solid 1px lightgray;padding-top: 10px;">
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style3][text4]" class="form-control" placeholder="Button Text" value="{{$meta['style3']['text4'] or ''}}">
                            </div>
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style3][url4]" class="form-control" placeholder="Button Url" value="{{$meta['style3']['url4'] or ''}}">
                            </div>
                        </div>
                        <div class="col-md-6" style="border-top:solid 1px lightgray;padding-top: 10px;border-left: solid 1px lightgray;">
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style3][text5]" class="form-control" placeholder="Button Text" value="{{$meta['style3']['text5'] or ''}}">
                            </div>
                            <div class="form-group col-sm-12 p-0">
                                <input type="text" name="components[{{$rand}}][buttons][style3][url5]" class="form-control" placeholder="Button Url" value="{{$meta['style3']['url5'] or ''}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>