<table class="table shot-table">
   <thead>
      <tr>
         <th></th>
         <th>Item</th>
         <th>Total</th>
      </tr>
   </thead>
   <tbody>
      @foreach($data as $key => $cart)
      <tr>
         <td style="padding: 5px;">{{$key+1}}</td>
         <td style="padding: 5px;"><a href="#">{{getProduct($cart['product'])['title']}} x {{$cart['qty']}}</a>
          <input type="hidden" name="items[product_id][]" value="{{$cart['product']}}">
          <input type="hidden" name="items[qty][]" value="{{$cart['qty']}}">
          <input type="hidden" name="items[price][]" value="{{(isset($cart['discount']))?$cart['discount']:$cart['total']}}">
        </td>
         <td style="padding: 5px;">@if(isset($cart['discount'])) <del>PKR{{number_format($cart['total'],2)}}</del><br>PKR{{number_format($cart['discount'],2)}} @else PKR{{number_format($cart['total'],2)}} @endif</td>
      </tr>
      @endforeach
   </tbody>
   <tfoot>
      <tr>
         <td style="padding: 0px;"></td>
         <th>Total</th>
         <td style="">@if(isset($total)) <del>PKR{{number_format(cartTotal(),2)}}</del><br>PKR{{number_format($total,2)}} @else PKR{{number_format(cartTotal(),2)}} @endif
        <input type="hidden" name="order_total_amount" value="{{(isset($total))?$total:cartTotal()}}">
      </td>
      </tr>
   </tfoot>
</table>
@isset($discount)
<div class="applied-coupon">
  <h5>{{$discount['title'].' ('.$discount['code'].')'}} <span class="pull-right">
    <a class="btn btn-danger btn-xs" id="removeDiscount"><i class="fa fa-times"></i> remove</a>
  </span></h5>
</div>
@endisset