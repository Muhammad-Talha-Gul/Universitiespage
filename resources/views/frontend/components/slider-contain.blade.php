<section class="featured-pro container wow bounceInUp animated">
    <div class="slider-items-products">
      <div class="new_title center">
        <h2>{{$slot or ''}}</h2>
      </div>
      <div class="category-description std">
            <div class="slider-items-products">
              <div id="category-desc-slider" class="product-flexslider hidden-buttons contain-slider">
                <div class="slider-items slider-width-col1"> 
                  @isset(json_decode($meta->meta,true)['image'])
                  @php $data = json_decode($meta->meta,true); @endphp
                  @foreach($data['image'] as $key => $value)
                  <!-- Item -->
                  <div class="item"> <a href="{{$data['link'][$key] or '#'}}"><img alt="university page" src="{{url($value)}}"></a> </div>
                  <!-- End Item --> 
                  @endforeach
                  @endisset
                </div>
              </div>
            </div>
          </div>
    </div>
  </section>
  <br>