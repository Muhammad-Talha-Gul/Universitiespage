@foreach($items as $value)
<tr>
	<td>@if(filter_var($value->image, FILTER_VALIDATE_URL))
		<img src="{{$value->image}}" class="product_image" width="40">
		@elseif(!empty($value->image))
		<img src="{{url($value->image)}}" class="product_image" width="40"> @else
		<img src="{{asset('placeholder.jpg')}}" class="product_image" width="40"> @endif
		<span title="{{$value->title}}">{{str_limit($value->title,20,'...')}}</span>
	<input type="hidden" name="order_detail[product_id][]" value="{{$value->id}}" required>
	</td>
	<td>@if(!empty($value->discounted_price)) <del>{{$value->price}}</del> {{$value->discounted_price}} @else {{$value->price}} @endif</td>
	<td>{{$value->quantity}} in Stock</td>
	<td><input type="number" class="form-control qty-input" name="order_detail[qty][]" data-id="{{$value->id}}" required min="0" value="1" max="{{$value->quantity}}"></td>
	<td>
		<input type="hidden" class="item-price-{{$value->id}}" value="{{(!empty($value->discounted_price))?$value->discounted_price:$value->price}}">
		<span class="total-price total-price-{{$value->id}}" style="cursor: pointer;color:green;" title="Add Discount" data-id="{{$value->id}}"> {{(!empty($value->discounted_price))?number_format($value->discounted_price):number_format($value->price)}} </span>
		<input type="number" class="editable-price total-price-editable-{{$value->id}}" data-id="{{$value->id}}" value="{{(!empty($value->discounted_price))?$value->discounted_price:$value->price}}" style="display: none;">
		<input type="hidden" name="order_detail[price][]" class="total-{{$value->id}} item-price" value="{{(!empty($value->discounted_price))?$value->discounted_price:$value->price}}">
	</td>
	<td><a href="javascript:void(0)" class="btn btn-danger btn-xs deleteProduct"><i class="fa fa-times"></i></a></td>
</tr>
@endforeach