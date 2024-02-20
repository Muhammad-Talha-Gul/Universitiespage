<div class="product-view">
  <div class="product-essential">
    <form action="#" method="post" id="product_addtocart_form">
      <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
      <div class="product-img-box col-lg-6 col-md-6 col-sm-4 col-xs-12">
          @if(filter_var($data['image'], FILTER_VALIDATE_URL))
          <img class="" src="{{$data['image']}}" style="height: 430px;width: 100%;object-fit: contain;" alt="university page"> 
          @elseif(!empty($data['image']))
          <img class="" src="{{url($data['image'])}}" style="height: 430px;width: 100%;object-fit: contain;" alt="university page"> 
          @else
          <img class="" src="{{asset('placeholder.jpg')}}" style="height: 430px;width: 100%;object-fit: contain;" alt="university page"> 
          @endif
      </div>
      <div class="product-shop col-lg-6 col-md-6 col-sm-8 col-xs-12">
        {{-- <div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div> --}}
        <div class="product-name">
          <h3>{{$data['title']}}</h3>
        </div>
        <div class="ratings">
          <div class="rating-box">
            <div class="rating" style="width: 70%;"></div>
          </div>
        </div>
        @if($data['quantity']>0)
        <p class="availability in-stock">Availability: In stock</p>
        @else
        <p class="availability in-stock" style="background: red;color:#fff;">Availability: Out of stock</p>
        @endif
        <div class="price-block">
          <div class="price-box">
            {!!$data->getprice()!!}
          </div>
        </div>
        @if(count($data['short_description'])>0)
        <div class="short-description">
          <h2>Quick Overview</h2>
          <p>{{$data['short_description']}}</p>
        </div>
        @endif
        <div class="add-to-box">
          <div class="add-to-cart">
            <form class="cart-form">
            <label for="qty">Quantity:</label>
            <div class="pull-left">
              <div class="custom pull-left">
                <button @if($data['quantity']==0) disabled @endif onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                <input type="number" class="input-text qty" style="width: 45px;" name="qty" title="Qty" value="1" max="{{$data['quantity']}}" @if($data['quantity']==0) disabled @endif id="qty">
                <input type="hidden" name="product_id" value="{{$data['id']}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button @if($data['quantity']==0) disabled @endif onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
              </div>
            </div>
            <button type="button" style="padding: 4px 10px;" @if($data['quantity'] < 1) disabled @endif class="button btn-cart addToCart" @if($data['quantity'] < 1) style="background-color:red;" @endif title="@if($data['quantity'] > 0) Add to Cart @else Out of stock @endif"data-type="d"><span style="margin-left: 1px;font-size: 10px;"><i class="icon-basket" style="font-size: 12px;"></i> @if($data['quantity'] > 0) Add to Cart @else  @endif</span></button>
            <button type="button" @if($data['quantity'] < 1) disabled @endif class="button buyNow" @if($data['quantity'] < 1) style="background-color:red;" @endif title="@if($data['quantity'] > 0) Buy Now @else Out of stock @endif"data-type="d"><span style="font-size:10px;"> @if($data['quantity'] > 0) Buy Now @else Out of stock @endif</span></button>
            </form>
            <div class="email-addto-box" style="float:right;margin-left: 0px;">
              <ul class="add-to-links">
                <li> <a class="link-wishlist add-to-wishlist" style="height: 33px;width: 40px;line-height: 30px;" href="javascript:void(0);" data-id="{{$data['id']}}"><span>Add to Wishlist</span></a></li>
                <!-- <li><span class="separator">|</span> <a class="link-compare" href="compare.html"><span>Add to Compare</span></a></li> -->
              </ul>
            </div>
          </div>
        </div>        
      </div>
    </form>
  </div>
</div>