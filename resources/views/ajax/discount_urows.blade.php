@foreach($items as $value)
<tr>
	<td> {{$value->first_name.' '.$value->last_name}}
	<input type="hidden" name="{{$name}}" value="{{$value->id}}">
	</td>
	<td> {{$value->email}}
	</td>
	<td><a href="javascript:void(0)" class="btn btn-danger btn-xs deleteCustomer"><i class="fa fa-times"></i></a></td>
</tr>
@endforeach