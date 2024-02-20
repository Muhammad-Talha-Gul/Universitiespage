<br> <br>
<div class="grocers-banners wow bounceInUp animated">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="new_title center">
            <h2>{{$slot or 'Default Title'}}</h2>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <br>
      <div class="row method-row">
        @isset($meta['image1'])
        @foreach($meta['image1'] as $key => $value)
        <div class="col-lg-3  col-sm-3 col-xs-6">
          <a href="{{(isset($meta['image2'][$key]))?url($meta['image2'][$key]):asset('placeholder.jpg')}}" class="fancybox">
            <img alt="process banner{{$key}}" src="{{url($value)}}" class="item methods" width="100%">
          </a>
          <!-- <div class="overlay"><a class="info" href="#">Learn More</a></div> -->
        </div>
        @endforeach
        @endisset
      </div>
    </div>
  </div>
  <br> <br>