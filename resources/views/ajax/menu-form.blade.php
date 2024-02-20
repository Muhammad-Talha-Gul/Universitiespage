<form id="updateMenuItem">
    <div class="form-group">
        <label>Type</label>
        <select class="form-control" id="type-selection" name="type" required>
            <option value="">Select Type</option>
            <option value="category" {{($menu_item['type']=='category')?'selected':''}}>Category</option>
            <option value="brand" {{($menu_item['type']=='brand')?'selected':''}}>Brand</option>
            <option value="page" {{($menu_item['type']=='page')?'selected':''}}>Page</option>
            <option value="url" {{($menu_item['type']=='url')?'selected':''}}>Custom Url</option>
        </select>
        <input type="hidden" name="menu_id" value="{{$menu['id']}}">
        <input type="hidden" name="id" value="{{$menu_item['id']}}">
        {{csrf_field()}}
    </div>
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required value="{{$menu_item['title']}}">
    </div>
    <div class="url form-group" id="category" {!! ($menu_item['type']=='category')?'':'style="display: none;"' !!}>
        <label>Category</label>
        <select class="form-control url-fields category-field select2" name="url" {!! ($menu_item['type']=='category')?'':'disabled' !!} >
            @foreach($categories as $value)
            <option value="{{route('category_page',$value->slug)}}" {{(route('category_page',$value->slug)==$menu_item['url'])?'selected':''}}>{{$value->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="url form-group" id="brand" {!! ($menu_item['type']=='brand')?'':'style="display: none;"' !!}>
        <label>Brand</label>
        <select class="form-control url-fields brand-field select2" name="url" {!! ($menu_item['type']=='brand')?'':'disabled' !!}>
            @foreach($brands as $value)
            <option value="{{route('brand_page',$value->slug)}}" {{(route('brand_page',$value->slug)==$menu_item['url'])?'selected':''}}>{{$value->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="url form-group" id="page" {!! ($menu_item['type']=='page')?'':'style="display: none;"' !!}>
        <label>Pages</label>
        <select class="form-control url-fields page-field select2" name="url" {!! ($menu_item['type']=='page')?'':'disabled' !!}>
            @foreach($pages as $value)
            <option value="{{route('dynamicPage',$value->slug)}}" {{(route('dynamicPage',$value->slug)==$menu_item['url'])?'selected':''}}>{{$value->title}}</option>
            @endforeach
        </select>
    </div>
    <div class="url form-group" id="url" {!! ($menu_item['type']=='url')?'':'style="display: none;"' !!}>
        <label>Url</label>
        <input type="text" class="form-control url-fields url-field" name="url" {!! ($menu_item['type']=='url')?'':'disabled' !!} value="{{$menu_item['url']}}">
    </div>
    <div class="url form-group" {!! ($menu_item['type']=='url')?'':'style="display: none;"' !!}>
        <label>Icon</label>
        <input type="text" class="form-control url-fields url-field" name="icon" {!! ($menu_item['type']=='url')?'':'disabled' !!} value="{{$menu_item['icon']}}">
    </div>
    <div class="form-group">
        <label>Parent</label>
        <select class="form-control" name="parent">
            <option value="">None</option>
            @foreach($menu_items as $value)
            <option value="{{$value->id}}" {{($menu_item['parent']==$value->id)?'selected':''}}>{{$value->title}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Order</label>
        <input type="number" class="form-control" name="sort_order" required value="{{$menu_item['sort_order']}}" min="0">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success btn-md" value="Update">
        <a href="javascript:void(0)" class="btn btn-danger" onclick="deleteitem({{$menu_item['id']}});">Delete</a>
    </div>
</form>