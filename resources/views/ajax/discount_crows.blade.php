@foreach($items as $value)
<tr>
	<td> {{$value->name}}
	<input type="hidden" name="{{$name}}" value="{{$value->id}}" required>
	</td>
	<td><a href="javascript:void(0)" class="btn btn-danger btn-xs deleteCategory"><i class="fa fa-times"></i></a></td>
</tr>
@endforeach