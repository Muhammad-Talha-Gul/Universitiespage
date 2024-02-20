
<div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle hidden-xs"> 
  <a href="{{url('/')}}"> 
    <i class="glyphicon glyphicon-shopping-cart"></i>
    <div class="cart-box"><span class="title">cart</span><span id="cart-total">{{cartCount()}} items </span></div>
  </a>
</div>
  <div class="top-cart-content arrow_box">
    <div id="cart-load" style="position: relative;width: 100%">
    <!-- <div class="block-subtitle">Recently added item(s)</div> -->
    <ul id="cart-sidebar" class="mini-products-list">
      @if(!empty(getCart()))
      @foreach(getCart() as $cart)
      <li class="item even"> 
        <a class="product-image col-xs-2 col-md-2" href="{{route('product_detail',getProduct($cart['product'])['slug'])}}" title="Downloadable Product" style="padding: 0;">
          @if(filter_var(getProduct($cart['product'])['image'], FILTER_VALIDATE_URL))
          <img src="{{getProduct($cart['product'])['image']}}" class="img-responsive">
          @elseif(!empty(getProduct($cart['product'])['image']))
          <img src="{{url(getProduct($cart['product'])['image'])}}" class="img-responsive">
          @else
          <img src="{{asset('placeholder.jpg')}}" class="img-responsive">
          @endif
        </a>
        <div class="detail-item col-xs-5 col-md-5">
          <div class="product-details"> 
            <p class="product-name"> 
              <a href="{{route('product_detail',getProduct($cart['product'])['slug'])}}" title="{{getProduct($cart['product'])['title']}}">{{str_limit(getProduct($cart['product'])['title'],30,'..')}} x <b>{{$cart['qty']}}</b></a> 
            </p>
          </div>
        </div>
        <div class="detail-item col-xs-3 col-md-3 text-right">
          <span class="price">PKR{{number_format((isset($cart['total']))?$cart['total']:0)}}</span> 
        </div>
        <div class="detail-item col-xs-1 col-md-1 pull-right" style="padding: 6;">
          <div class="product-details"> 
            <a href="javascript:void(0)" title="Remove This Item" onClick="" class="glyphicon glyphicon-remove removeCart" data-id={{$cart['product']}}>&nbsp;</a>
          </div>
        </div>
      </li>
      @endforeach
      @endif
      
    </ul>
    <!-- <div class="top-subtotal">Subtotal: <span class="price">$420.00</span></div> -->
    <div class="actions">
      <a href="{{url('/cart')}}" class="view-cart"><span>View Cart</span></a>
      <div class="pull-right">Total: <span class="price">PKR{{number_format(cartTotal())}}</span></div>
    </div>
  </div>
  </div>
