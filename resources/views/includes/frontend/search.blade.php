<div class="row">
    <div class="col-xs-8 col-md-8">
        <p>search result for <i>{{$q}}</i></p>
        <div class="searches">
          <table class="table">
            @foreach($data as $key => $value)
            <tr>
              <td><a href="{{route("product_detail",$value->slug)}}">
                @if(filter_var($value->image, FILTER_VALIDATE_URL))
                <img src="{{$value->image}}" width="30" height="30">
                @elseif(!empty($value->image))
                <img src="{{url(getThumb($value->image))}}" width="30" height="30">
                @else
                <img src="{{asset('placeholder.jpg')}}" width="30" height="30">
                @endif
              </a></td>
              <td style="padding:10px 0;"><a href="{{route("product_detail",$value->slug)}}">{{str_limit($value->title,20,'...')}}</a></td>
              <td style="padding:10px 0;">
                <div class="qty-input" style="width: 80px; margin:0 auto;">
                  <div class="input-group">
                    <span class="input-group-btn">
                    <button {{($value->quantity==0)?'disabled':''}} type="button" style="padding:1px 4px;" class="btn btn-default" data-type="minus" onClick="var result = document.getElementById('s_{{$key}}'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;">
                        <span class="glyphicon glyphicon-minus"></span>
                      </button>
                      </span>
                      <input type="number" style="height: 24px;" id="s_{{$key}}" class="form-control input-number" value="1" min="1" {{($value->quantity==0)?'disabled':''}} max="{{$value->quantity}}">
                      <span class="input-group-btn">
                    <button {{($value->quantity==0)?'disabled':''}} type="button" style="padding:1px 4px;" onClick="var result = document.getElementById('s_{{$key}}'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="btn btn-default" >
                        <span class="glyphicon glyphicon-plus"></span>
                      </button>
                      </span>
                  </div>
                </div>
              </td>
              <td style="padding:10px 0;">@if(!empty($value->discounted_price))<del class="text-danger">PKR {{$value->price}}</del> <br> PKR {{$value->discounted_price}} @else PKR {{$value->price}} @endif</td>
              <td style="padding:10px 0;">
                @if($value->quantity>0)
                <a href="javascript:void(0)" class="btn btn-warning btn-xs addToCart" data-type="s" data-id="{{$value->id}}" data-qty="s_{{$key}}">Add</a>
                @else
                <a href="javascript:void(0)" class="btn btn-danger btn-xs">Add</a>
                @endif
              </td>
            </tr>
            @endforeach
          </table>
        </div>
    </div>
    <div class="col-xs-4 col-md-4">
      <div class="search-banner hidden-xs">
        @if(!empty(getpreferences()['banner']))
        <a href="{{getpreferences()['banner_link']}}">
          <img src="{{url(getpreferences()['banner'])}}" class="img-responsive">
        </a>
        @endif
      </div>
      <br>
      <p><b>Commonly Searched</b>
        <ul>
          @foreach(getCommonSearched() as $line)
          <li><a href="{{route('search')}}?q={{$line}}">{{$line}}</a></li>
          @endforeach
        </ul>
      </p>
    </div>
  </div>