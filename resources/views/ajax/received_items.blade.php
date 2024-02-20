@foreach($items as $value)
<tr>
    <td>
      @if(filter_var($value->item->image, FILTER_VALIDATE_URL))
      <img src="{{$value->item->image}}" class="product_image" width="40">
      @elseif(!empty($value->item->image))
      <img src="{{url($value->item->image)}}" class="product_image" width="40"> @else
      <img src="{{asset('placeholder.jpg')}}" class="product_image" width="40"> @endif
      {{$value->item->title}}
    </td>
    <td>
        <div class="progress" style="margin-bottom: 2px;">
            @php 
            $recieved_qty = 0; $cancel_qty = 0; $rejected_qty = 0;
            if($value->ordered_qty>0) {
                $recieved_qty = $value->recieved_qty*100/$value->ordered_qty; 
                $cancel_qty = $value->cancel_qty*100/$value->ordered_qty; 
                $rejected_qty = $value->rejected_qty*100/$value->ordered_qty; 
            }
            @endphp
            <div class="progress">
              @if($recieved_qty>0)
              <div title="{{ $value->recieved_qty }} Recieved" class="progress-bar progress-bar-success" role="progressbar" style="width:{{$recieved_qty}}%">
                
              </div>
              @endif
              @if($cancel_qty>0)
              <div title="{{ $value->cancel_qty }} Cancelled" class="progress-bar progress-bar-warning" role="progressbar" style="width:{{$cancel_qty}}%">
                
              </div>
              @endif
              @if($rejected_qty>0)
              <div title="{{ $value->rejected_qty }} Rejected" class="progress-bar progress-bar-danger" role="progressbar" style="width:{{$rejected_qty}}%">
                
              </div>
              @endif
            </div>
        </div>
        <span style="display: block; text-align: center;"> {{ $value->total($value->id)+0 }} of {{ $value->ordered_qty }}</span>
    </td>
    <td><input type="number" class="received-{{$value->id}} form-control" min="0" max="{{$value->ordered_qty}}" value="{{$value->recieved_qty+0}}"></td>
    <td><input type="number" class="cancelled-{{$value->id}} form-control" min="0" max="{{$value->ordered_qty}}" value="{{$value->cancel_qty+0}}"></td>
    <td><input type="number" class="rejected-{{$value->id}} form-control" min="0" max="{{$value->ordered_qty}}" value="{{$value->rejected_qty+0}}"></td>
    <td>
        @if($value->total($value->id)==$value->ordered_qty)
        <span class="text-success">Completed</span>
        @else
        <a href="javascript:void(0)" data-id="{{$value->id}}" class="receiveItem btn btn-info btn-sm"><i class="fa fa-floppy-o"></i></a>
        @endif
    </td>
</tr>
@endforeach