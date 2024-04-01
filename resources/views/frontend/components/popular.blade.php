@if(isset($meta['type']))

@if($meta['type'] == 'blog')



<!-- /* ..................Our LATEST ARTICLES start............. */ -->
<section class="papolar-universities pl-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-12 col-sm-12 po_un_col1">
        <div class="po_un_col1 left-heading-container">
          <div class="section-left-heading-block">
            <h3 class="section-heading ">latest
              <span class="section-heading-span">articles</span>
            </h3>
            <p class="section-paragraph section-heading-paragraph">Stay updated on universities and courses with our insightful articles. Explore academic trends, institution profiles, and career advice to guide your educational journey.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-12 col-sm-12">
        <div class="container-fluid">
          <div class="owl-carousel owl-theme row" id="imageSlider3">
            @foreach(latestBlog(16) as $key => $blog)
            <div class="item">
              <a href="{{url($blog->slug)}}">
                <div class="card">
                  <!-- <img src="{{ (url(fix($blog->image, 'thumbs')))??iph() }}" style="height: 180px !important; width: 94%;" class="img-fluid card-img-top lazyloaded" alt="..."> -->
                  <img class="card-img-top lazyloaded" width="100%" height="100%" alt="<?php echo $blog->title; ?>" src="{{url(($blog->image)??'#')}}" data-echo="{{url(($blog->image)??'#')}}" style="height: 180px !important; width: 100%;" class="img-fluid card-img-top" alt="...">
                  <div class="card-body article-card-body" style="border: none; margin-top: 10px;">
                    <h4 class="articles-heading">{{($blog->title)??''}}</h4>
                    <p class="articles-paragraph"><?php echo substr($blog->short_description, 0, 100) ?></p>
                    <a href="{{url($blog->slug)}}" class="view-all-link">View All</a>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- /* ..................Our LATEST ARTICLES End............. */ -->
<div class="clearfix" style="clear:both;"></div>
@elseif($meta['type'] == 'university')
<!-- ..................POPULAR UNIVERSITIES Section Start............. -->


<style type="text/css">
  .owl-carousel,
  .owl-carousel .owl-item {
    background: none;
  }
</style>

<div class="popular-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-12 col-sm-12 ">
        <div class="po_un_col1">
          <h3 class="section-heading ">popular
            <span>universites</span>
          </h3>
          <p class="section-paragraph section-heading-paragraph">Explore world-renowned universities offering top-tier education, diverse programs, and vibrant campus life. Choose your path to success at prestigious institutions.</p>
        </div>
      </div>
      <div class="col-lg-9 col-md-12 col-sm-12">
        <div class="container-fluid">
          <div class="row">
            @php
            $university = getPopualrUniversity();
            @endphp
            @foreach($university as $uni)
            @php
            $bg = (fix($uni->feature_image['image'][0], 'thumbs'))??iph();
            @endphp
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 slider-column mb-3">
              <div class="container1 m-0">
                <a class="o-blockLink" href="{{url(('university/'.$uni->slug)??'#')}}">
                  <img class="img-fluid lazyloaded" src="{{ ($bg!==null)?url(($bg)??'#.'):url((fix($uni->logo,'thumbs'))??iph()) }}" alt="<?php echo $uni->name; ?>" alt="Snow" style="width:100%;">
                  <div class="centered">
                    <div class="overlay">
                      <p><?php echo $uni->name; ?></p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            @endforeach
            <!-- Add more items as needed -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 


<!-- ..................POPULAR UNIVERSITIES Section End............. -->
@elseif($meta['type'] == 'courses')
<!-- /* ..................Popular Courses Section Start............. */ -->



<section class="popular-course-section">
  <div class="container">
    <div class="po_un_col1 section-heading-center-container">
      <h2 class="section-heading">Popular <span class="section-heading-span">Courses</span></h2>
      <p class="section-heading-paragraph">Experience excellence in education through popular courses at top-tier universities.</p>
    </div>
    <div class="row">
      @php
      $university = getPopualrCourse();
      @endphp
      @foreach($university as $uni)
      @php
      $bg = (fix($uni->feature_image['image'][0], 'thumbs'))??iph();
      @endphp
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3  MBBSimg">
        <a class="o-blockLink" href="{{url(('courses/'.$uni->id)??'#')}}">
          <!--<img class="img-fluid Rectangle45" src="{{ ($bg!==null)?url(($bg)??'#.'):url((fix($uni->logo,'thumbs'))??iph()) }}" alt="">-->
          <div class="inaerdiv">
            <img class="img-fluid inaerdivimg lazyload" src="{{ url((fix($uni->university->logo, 'thumbs'))??iph()) }}" alt="">
            <h4>{{($uni->name)??''}}</h4>
            <h5>{{($uni->university->name)??''}}</h5>
            <h6>Yearly Fee: {{($uni->yearly_fee)??''}}$</h6>
            <p><i class="fa-solid fa-location-dot"></i> {{($uni->university->city)??''}}, {{($uni->university->country)??''}}</p>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>


<!-- /* ..................Popular Courses Section End............. */ -->




@elseif($meta['type'] == 'consultant')

<section class="{{$meta['class'] or ''}}">
  <div class="share__bg share__bg--home">
    <div class="container container--narrow container--clear">
      <div class="module--spacing">
        <div class="grid">
          <div class="grid__item grid__item--1">
            <h2 id="proud" class="h1 caps line-tight text-center">
              <span class="text-white" style="font-size: 34px;">{{$meta['title'] or ''}}</span>
            </h2>
          </div>

        </div>
      </div>
    </div>
    <div class="container container--clear">
      @php
      $consultant = getPopualrConsultant();
      // dd($consultant[0]->feature_image['image'][0]);
      @endphp
      <div class="grid">
        @if(isset($consultant[0]))
        <div class="grid__item grid__item--2 master-box">
          <div class="grid-one">
            <a class="share__img" align="center" href="{{url('consultant/'.$consultant[0]->organization_name.'/'.$consultant[0]->id)}}" target="_blank">
              <img src="{{ (isset($consultant[0]->logo))?url(fix($consultant[0]->logo, 'thumbs')):iph() }}" alt="{{$consultant[0]->organization_name}}" style="width: 100%;height: inherit;">
              <span class="share__hover">
                <h3>{{$consultant[0]->organization_name}}</h3>
                <p style="position: relative;top: 20px;">
                  City/Country: {{$consultant[0]->city}}, {{$consultant[0]->country}}<br>
                  Rating:
                  @php
                  $ranking = ($consultant[0]->ranking!==null)?explode('.', $consultant[0]->ranking):0;
                  @endphp
                  @if($ranking[0]!==0) @for($i=0; $i<(int)$ranking[0]; $i++) <i class="fa fa-star"></i>
                    @endfor @endif
                    @if(isset($ranking[1]) && $ranking[1]>=5)
                    <i class="fa fa-star-half"></i>
                    @endif
                </p>
              </span>
            </a>
          </div>
        </div>
        @endif
        @if(isset($consultant[1]))
        @php
        $image = (fix($consultant[1]->logo))??iph();
        $image2 = (fix($consultant[1]->logo))??iph();
        @endphp
        <div class="grid__item grid__item--2 share__special master-box">
          <div class="grid-two" style="flex: 1 1 0px;">
            <a href="{{url('consultant/'.$consultant[1]->organization_name.'/'.$consultant[1]->id)}}" target="_blank" class="share__half share__half--swap">
              <div class="share__half__img" alt="{{url($consultant[1]->organization_name)}}">
                <img src="{{url($image)}}" alt="university page">
              </div>
              <div class="share__half__text module--blackish">
                <p style="font-size: 30px;">
                  {{$consultant[1]->organization_name}}
                </p>
                <span class="share__hover">
                </span>
              </div>
            </a>
          </div>

          <div class="grid-two" style="flex: 1 1 0px;">
            <a href="{{url('consultant/'.$consultant[1]->organization_name.'/'.$consultant[1]->id)}}" target="_blank" class="share__half share__half--swap">
              <div class="share__half1__img">
                <img src="{{url($image2)}}" alt="Universities Page">
              </div>
              <div class="share__half__text module--blackish">
                <p>
                  City/Country: {{$consultant[1]->city}}, {{$consultant[1]->country}}<br>
                  Rating:
                  @php
                  $ranking = ($consultant[1]->ranking!==null)?explode('.', $consultant[1]->ranking):0;
                  @endphp
                  @if($ranking[0]!==0) @for($i=0; $i<(int)$ranking[0]; $i++) <i class="fa fa-star"></i>
                    @endfor @endif
                    @if(isset($ranking[1]) && $ranking[1]>=5)
                    <i class="fa fa-star-half"></i>
                    @endif
                </p>
                <span class="share__hover">
                </span>
              </div>
            </a>
          </div>
        </div>
        @endif

      </div>
      {{-- <div class="grid">
        @if(isset($consultant[2]))
          @php
            $image = ($consultant[2]->logo)??'#';
              $image2 = ($consultant[2]->logo)??'#';
                @endphp
                  <div class="grid__item grid__item--2 share__special">
                      <div class="grid-two" style="flex: 1 1 0px;">
                          <a href="{{url('consultant/'.$consultant[2]->organization_name.'/'.$consultant[2]->id)}}" target="_blank" class="share__half share__half--swap">
                      <div class="share__half__img" alt="{{url('consultant/'.$consultant[2]->organization_name.'/'.$consultant[2]->id)}}">
                        <img src="{{url($image)}}" alt="university page">
                      </div>
                      <div class="share__half__text module--blackish">
                        <p style="font-size: 30px;">
                          {{$consultant[2]->organization_name}}
                        </p>
                        <span class="share__hover">
                        </span>
                      </div>
                      </a>
                    </div>
                    <div class="grid-two" style="flex: 1 1 0px;">
                      <a href="{{url('consultant/'.$consultant[2]->organization_name.'/'.$consultant[2]->id)}}" target="_blank" class="share__half share__half--swap">
                        <div class="share__half1__img">
                          <img src="{{url($image2)}}" alt="Universities Page">
                        </div>
                        <div class="share__half__text module--blackish">
                          <p>
                            City/Country: {{$consultant[2]->city}}, {{$consultant[2]->country}}<br>
                            Rating:
                            @php
                            $ranking = ($consultant[2]->ranking!==null)?explode('.', $consultant[2]->ranking):0;
                            @endphp
                            @if($ranking[0]!==0) @for($i=0; $i<(int)$ranking[0]; $i++) <i class="fa fa-star"></i>
                              @endfor @endif
                              @if(isset($ranking[1]) && $ranking[1]>=5)
                              <i class="fa fa-star-half"></i>
                              @endif
                          </p>
                          <span class="share__hover">
                          </span>
                        </div>
                      </a>
                    </div>
                  </div>
                  @endif
                  @if(isset($consultant[3]))
                    <div class="grid__item grid__item--2">
                      <div class="grid-one">
                        <a class="share__img" href="{{url('consultant/'.$consultant[3]->organization_name.'/'.$consultant[3]->id)}}" target="_blank">
                          <img src="{{ (isset($consultant[3]->logo))?url($consultant[3]->logo):'#.' }}" alt="{{$consultant[3]->name}}" style="width: 100%;height: inherit;">
                          <span class="share__hover">
                            <h3>{{$consultant[3]->organization_name}}</h3>
                            <p style="position: relative;top:55px;">
                              City/Country: {{$consultant[3]->city}}, {{$consultant[3]->country}}<br>
                              Rating:
                              @php
                              $ranking = ($consultant[3]->ranking!==null)?explode('.', $consultant[3]->ranking):0;
                              @endphp
                              @if($ranking[0]!==0) @for($i=0; $i<(int)$ranking[0]; $i++) <i class="fa fa-star"></i>
                                @endfor @endif
                                @if(isset($ranking[1]) && $ranking[1]>=5)
                                <i class="fa fa-star-half"></i>
                                @endif
                            </p>
                          </span>
                        </a>
                      </div>
                    </div>
                  @endif
        </div> --}}
      </div>
  <div class="text-center" style="padding: 50px 0 0;">
    <a href="{{url('our-consultants')}}" class="butto  n">View More</a>
  </div>
  </div>
</section>
@endif
@endif