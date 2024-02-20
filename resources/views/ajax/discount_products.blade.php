<div class="form-group pull-right" style="margin-bottom: 10px;">
    <form action="#" method="POST" id="product_form" form="product_form">{{csrf_field()}}</form>
    @if(isset($discount['id'])) <input type="hidden" name="discount_id" form="product_form" value="{{$discount['id']}}"> @endif
    <input type="hidden" name="div" form="product_form" value="{{$div}}">
    <input type="hidden" name="name" form="product_form" value="{{$name}}">
    <a class="btn btn-primary btn-sm" id="addProducts">Add (<span id="checkCount">0</span>)</a>
</div>
<div class="clearfix"></div>
<table class="table fetchedProducts">
    <thead>
        <tr>
            <th><input type="checkbox" id="check_all"></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $value)
        <tr>
            <td><input type="checkbox" class="checkItem" name="ids[]" form="product_form" value="{{$value->id}}" {{(in_array($value->id, $already))?'disabled':''}}></td>
            <td>@if(filter_var($value->image, FILTER_VALIDATE_URL))
                <img src="{{$value->image}}" class="product_image">
                @elseif(!empty($value->image))
                <img src="{{url($value->image)}}" class="product_image"> @else
                <img src="{{asset('placeholder.jpg')}}" class="product_image"> @endif
                {{$value->title}}</td>
            <td>{{(isset($value->category->name))?$value->category->name:''}}</td>
            <td>{{$value->quantity}} in Stock</td>
        </tr>
        @endforeach
    </tbody>
</table>