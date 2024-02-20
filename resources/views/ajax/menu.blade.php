<div class="col-md-6">
    <h3 class="pull-left">{{$menu['name']}}</h3>
    <div class="form-group pull-left" style="margin: 15px 0px 0px 10px;">
        <input type="checkbox" id="make_primary" switch="primary" data-id="{{$menu['id']}}" value="1" {{($menu['is_primary']==1)?'checked':''}} />
            <label for="make_primary" data-on-label="On" data-off-label="Off"></label>
    </div>
    <span class="pull-left" style="margin: 15px 0px 0px 10px;" id="menu-loader"> (Switch On to make it Primary Menu)</span>
</div>
<div class="col-md-6 text-right">        
    <a href="javascript:void(0)" class="btn btn-danger btn-xs" onclick="deleteit();">Delete Menu</a>
    <form action="{{route('deleteMenu')}}" method="POST" id="delete-form">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="{{$menu['id']}}">
        {{csrf_field()}}
    </form>
</div>
<div class="clearfix"></div>
<div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="card-box table-responsive" id="forms-here">
                <form id="addMenuItem">
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" id="type-selection" name="type" required>
                            <option value="">Select Type</option>
                            {{-- <option value="category">Category</option> --}}
                            {{-- <option value="brand">Brand</option> --}}
                            <option value="page">Page</option>
                            <option value="url">Custom Url</option>
                        </select>
                        <input type="hidden" name="menu_id" value="{{$menu['id']}}">
                        {{csrf_field()}}
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="url form-group" id="category" style="display: none;">
                        <label>Category</label>
                        <select class="form-control url-fields category-field select2" name="url" disabled>
                            @foreach($categories as $value)
                            <option value="{{route('category_page',$value->slug)}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="url form-group" id="brand" style="display: none;">
                        <label>Brand</label>
                        <select class="form-control url-fields brand-field select2" name="url" disabled>
                            @foreach($brands as $value)
                            <option value="{{route('brand_page',$value->slug)}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="url form-group" id="page" style="display: none;">
                        <label>Pages</label>
                        <select class="form-control url-fields page-field select2" name="url" disabled>
                            @foreach($pages as $value)
                            <option value="{{route('dynamicPage',$value->slug)}}">{{$value->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="url form-group" id="url" style="display: none;">
                        <label>Url</label>
                        <input type="text" class="form-control url-fields url-field" name="url" disabled>
                    </div>
                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text" class="form-control url-fields url-field" name="icon" disabled>
                    </div>
                    <div class="form-group">
                        <label>Parent</label>
                        <select class="form-control" name="parent">
                            <option value="">None</option>
                            @foreach($menu_items as $value)
                            <option value="{{$value->id}}">{{$value->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Order</label>
                        <input type="number" class="form-control" name="sort_order" required value="0" min="0">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-md" value="Save">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-box table-responsive">
                <label>Tree View of {{$menu['name']}} Levels</label>
                <div style="max-height: 249px !important; overflow: scroll;">
                    <ul id="tree2">
                        @if(!empty($menu_items))
                        @foreach($menu_items->where('parent',null) as $value)
                        <li>
                            <span class="menu-item" data-id="{{$value->id}}">{{ $value->title }}</span>
                            @if(count($value->childrens))
                                @include('ajax.menu_tree', ['childrens' => $value->childrens])
                            @endif
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    