<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <select class="form-control filter-cat selectable">
                <option value="">By Category</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <select class="form-control filter-brand selectable">
                <option value="">By Brand</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group pull-right" style="margin-bottom: 10px;">
            <form action="#" method="POST" id="product_form" form="product_form">{{csrf_field()}}</form>
            <a class="btn btn-primary btn-sm" id="addProducts">Add (<span id="checkCount">0</span>)</a>
        </div>
    </div>
</div>
<table class="table fetchedProducts">
    <thead>
        <tr>
            <th><input type="checkbox" id="check_all"></th>
            <th></th>
            <th id="filter-cat"></th>
            <th id="filter-brand" style="display: none;"></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $value)
        <tr>
            <td><input type="checkbox" class="checkItem" name="ids[]" form="product_form" value="{{$value->id}}"></td>
            <td>@if(filter_var($value->image, FILTER_VALIDATE_URL))
                <img src="{{$value->image}}" class="product_image"> {{$value->title}}</td>
                @elseif(!empty($value->image))
                <img src="{{url(getThumb($value->image))}}" class="product_image"> {{$value->title}}</td>
                @else
                <img src="{{asset('placeholder.jpg')}}" class="product_image"> {{$value->title}}</td>
                @endif
            <td>{{(isset($value->category->name))?$value->category->name:''}}</td>
            <td  style="display: none;">{{(isset($value->brand->name))?$value->brand->name:''}}</td>
            <td>{{$value->quantity}} in Stock</td>
        </tr>
        @endforeach
    </tbody>
</table>