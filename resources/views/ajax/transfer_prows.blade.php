@foreach($items as $value)
<tr>
	<td>@if(filter_var($value->image, FILTER_VALIDATE_URL))
		<img src="{{$value->image}}" class="product_image" width="40">
		@elseif(!empty($value->image))
		<img src="{{url($value->image)}}" class="product_image" width="40"> @else
		<img src="{{asset('placeholder.jpg')}}" class="product_image" width="40"> @endif
		 {{$value->title}}
	<input type="hidden" name="items[id][]" value="{{$value->id}}" required>
	</td>
	<td><input type="number" class="form-control" name="items[qty][]" required></td>
	<td>
		<select class="form-control" name="items[unit][]" required>
			<option value="pcs">Pcs</option>
			<option value="kg">Kg</option>
			<option value="litre">Litre</option>
			<option value="box">Box</option>
		</select>
	</td>
	<td><input type="number" class="form-control" name="items[price][]" required></td>
	<td><a href="javascript:void(0)" class="btn btn-danger btn-xs deleteProduct"><i class="fa fa-times"></i></a></td>
</tr>
@endforeach