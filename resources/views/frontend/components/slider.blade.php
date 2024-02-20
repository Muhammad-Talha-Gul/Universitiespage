<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->

        <ol class="carousel-indicators">
          @isset(json_decode($meta->meta,true)['image'])
          @php $data = json_decode($meta->meta,true); @endphp
          @foreach($data['image'] as $key => $value)
          <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{($key==1)?'active':''}}"></li>
          @endforeach
          @endisset
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          @isset(json_decode($meta->meta,true)['image'])
          @foreach($data['image'] as $key => $value)
          <div class="item {{($key==1)?'active':''}}">
            <img src="{{url($value)}}" alt="university page" style="width:100%;">
          </div>
          @endforeach
          @endisset
        </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

