@foreach($items as $value)
<tr>
    <td>@if(filter_var($value->item->image, FILTER_VALIDATE_URL)) 
        <img src="{{$value->item->image}}" class="product_image" width="40">
        @elseif(!empty($value->image))
        <img src="{{url($value->item->image)}}" class="product_image" width="40"> @else
        <img src="{{asset('placeholder.jpg')}}" class="product_image" width="40"> @endif 
        {{$value->item->title}}
    </td>
    <td>{{$value->item->quantity}} in stock</td>
    <td>
        <span class="item-{{$value->id}}">{{$value->ordered_qty}}</span>
        <input type="number" id="item-{{$value->id}}" class="form-control" name="items[qty][]" required value="{{$value->ordered_qty}}" style="display: none;">
    </td>
    <td>
        <a href="javascript:void(0)" data-id="{{$value->id}}" class="editItem btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
        <a href="javascript:void(0)" class="btn btn-danger btn-xs deleteItem" data-id="{{$value->id}}"><i class="fa fa-times"></i></a>
    </td>
</tr>
@endforeach