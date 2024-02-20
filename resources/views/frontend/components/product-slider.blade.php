<section class="featured-pro container wow bounceInUp animated">
    <div class="slider-items-products">
      <div class="new_title center">
        <h2>{{$slot or "Product Slider"}}</h2>
      </div>
      <div id="featured-slider" class="product-flexslider hidden-buttons">
        <div class="slider-items slider-width-col4"> 
          
          @foreach($products as $key => $value)
          <!-- Item -->
          <div class="item">
            <div class="col-item">
              @if(!empty($value->discounted_price))
              <div class="sale-label sale-top-right">Sale</div>
              @endif
              <div class="product-image-area"> <a class="product-image" title="{{$value->title}}" href="{{route('product_detail',$value->slug)}}"> 
                @if(filter_var($value->image, FILTER_VALIDATE_URL))
                <img src="{{$value->image}}" alt="{{$value->title}}" class="img-responsive" style="height: 173px;" />
                @elseif(!empty($value->image))
                <img src="{{url(getThumb($value->image))}}" alt="{{$value->title}}" class="img-responsive" style="height: 173px;" />
                @else
                <img src="{{asset('placeholder.jpg')}}" alt="{{$value->title}}" class="img-responsive" style="height: 173px;" /> 
                @endif
              </a>
                <div class="actions-links"><span class="add-to-links"> <a title="magik-btn-quickview" class="magik-btn-quickview btn-quickview" data-id="{{$value->id}}" href="{{route('product_detail',$value->slug)}}"><span>quickview</span></a> @auth <a title="Add to Wishlist" class="link-wishlist add-to-wishlist" href="javascript:void(0);" data-id="{{$value->id}}"><span>Add to Wishlist</span></a> @endauth {{-- <a title="Add to Compare" class="link-compare" href="#"><span>Add to Compare</span></a> --}}</span> </div>
              </div>
              <div class="info">
                <div class="info-inner">
                  <div class="item-title"> <a title="{{$value->title}}" href="{{route('product_detail',$value->slug)}}"> {{str_limit($value->title,25,'..')}} </a> </div>
                  <!--item-title-->
                  <div class="item-content">
                    <div class="ratings">
                      <div class="rating-box">
                        <div class="rating"></div>
                      </div>
                    </div>
                    <div class="price-box">
                        {!! $value->getprice() !!}
                      </div>
                  </div>
                  <!--item-content--> 
                </div>
                <!--info-inner-->
                <div class="actions">
                  <form class="cart-form">
                  <div class="qty-input" style="width: 101px; margin:0 auto;">
                    <div class="input-group">
                      <span class="input-group-btn">
                      <button type="button" class="btn btn-default" onClick="var result = document.getElementById('ps_{{$key}}'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;">
                          <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        </span>
                        <input type="number" name="qty" id="ps_{{$key}}" class="form-control input-number" value="1" min="1" max="{{$value->quantity}}">
                        <input type="hidden" name="product_id" value="{{$value->id}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <span class="input-group-btn">
                      <button type="button" class="btn btn-default" onClick="var result = document.getElementById('ps_{{$key}}'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;">
                          <span class="glyphicon glyphicon-plus"></span>
                        </button>
                        </span>
                    </div>
                  </div>
                  <button type="button" title="Add to Cart" class="button btn-cart addToCart" data-type="p" {{($value->quantity==0)?'disabled':''}}><span>{{($value->quantity>0)?'Add to Cart':'Out of Stock'}}</span></button>
                  </form>
                </div>
                <!--actions-->
                
                <div class="clearfix"> </div>
              </div>
            </div>
          </div>
          <!-- End Item --> 
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <br> <br>