@extends('layouts.frontend')

@section('title',(isset($data['seo']->meta_title))?$data['seo']->meta_title:$data->name. ' Admission,Scholarship & courses Fee 2021')


@section('seo')

<meta name="description" content="{!! !empty(strip_tags($data->abou)) ? strip_tags ($data->abou):$data->name. '  '.$data->country.' offers admission and scholarships '.date('Y').' in total ' .count($data->courses). ' courses.Check courses tution fees and these courses are taught in '. $data->languages.' language.'  !!}">


@endsection
@section('customStyles')
<link type="text/css" rel="stylesheet" href="{{asset('assets_frontend/lightGallery/lightgallery.min.css')}}">
<link type="text/css" rel="stylesheet" href="{{asset('assets_frontend/lightGallery/lg.woff')}}">
<link type="text/css" rel="stylesheet" href="{{asset('assets_frontend/css/jquery.mCustomScrollbar.css')}}">
<link type="text/css" rel="stylesheet" href="{{asset('assets_frontend/css/jquery-confirm.min.css')}}">
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">--}}
<style type="text/css">.compare-popover-content{background-color:#364656;width:auto;margin-top:7px;margin-left:0;padding:5px;position:absolute;z-index:1;display:none;color:#f2f5e9}.compare-popover-content:before{content:"";width:0;height:0;border-bottom:10px solid #364656;border-left:10px solid transparent;border-right:10px solid transparent;position:absolute;top:-10px}</style>
<style type="text/css">.o-icon{margin-top:-3.5rem}section{clear: both;}</style>

@endsection
@section('content')



<div class="container">
  <div class="details-banner herrobgimg university-details-banner my-4" @if($data->feature_image!==null) style="background-image: url({{ url((isset($data->feature_image['image'][0]))?fix($data->feature_image['image'][0]):fix($data->logo)) }});" @endif>
      <div class="university-details-overlay banner-overlay">
          <div class="banner-contant-main">
              <h6 class="banner-heading details-banner-heading university-details-banner-heading">{{($data->name)??''}} ({{($data->founded_in)??''}})</h6>

              @php
                  $ranking = ($data->ranking!==null)?explode('.', $data->ranking):0;
                @endphp
                @if($ranking[0]!==0) @for($i=0; $i<(int)$ranking[0]; $i++)
                  <i class="fa fa-star"></i>
                @endfor @endif
                @if(isset($ranking[1]) && $ranking[1]>=5)
                  <i class="fa fa-star-half"></i>
                @endif

              <p class="banner-sub-heading details-banner-sub-heading">{!! $data->city.', '.$data->country !!}</p>
              <button class="btn btn-uni"  onclick="consulation()" style="cursor: pointer;">Apply to University</button>
              <button class="btn btn-uni" onclick="send_emailcontat()" style="cursor: pointer;">Admission Request</button>
          </div>

      </div>
  </div>
</div>

<section class="filter-section mobile-button-section py-5">
<div class="container">
    <div class="fillter-button-main">
      <div class="fillter-button click-button active"  onclick="openCity(event, 'London')">
        <div class="fillter-button-content">
          <!-- <img class="img-fluid " src="{{ url('/filemanager/photos/1/new_style/svg/list.svg') }}" alt=""> -->
          <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
            width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"
            preserveAspectRatio="xMidYMid meet" class="fillter-icon">

            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
            fill="#0B6D76" stroke="none">
            <path d="M272 4480 c-102 -22 -193 -96 -241 -199 -22 -47 -26 -69 -26 -141 1
            -72 5 -94 28 -142 62 -128 203 -208 341 -194 293 30 415 382 204 588 -75 73
            -201 110 -306 88z"/>
            <path d="M1360 4405 c-101 -32 -170 -129 -170 -241 0 -34 7 -78 15 -98 23 -55
            79 -111 135 -135 l49 -21 1778 2 c1678 3 1780 4 1810 21 90 49 138 130 138
            232 -1 101 -48 179 -140 228 l-40 22 -1765 2 c-1490 1 -1772 0 -1810 -12z"/>
            <path d="M250 2891 c-93 -29 -177 -101 -219 -190 -38 -81 -38 -201 0 -282 56
            -119 161 -190 294 -197 104 -5 173 19 248 88 75 69 110 147 110 250 0 62 -6
            88 -28 139 -35 78 -113 151 -190 180 -57 22 -164 27 -215 12z"/>
            <path d="M1393 2810 c-123 -25 -203 -122 -203 -250 0 -106 53 -189 150 -234
            l45 -21 1770 0 c1650 0 1772 1 1806 17 54 25 96 64 127 117 23 39 27 57 27
            121 0 64 -4 82 -27 121 -31 53 -73 92 -127 117 -34 16 -156 17 -1781 19 -960
            0 -1764 -3 -1787 -7z"/>
            <path d="M233 1300 c-80 -26 -161 -99 -200 -178 -23 -48 -27 -70 -28 -142 0
            -77 3 -92 33 -152 73 -148 229 -223 384 -183 160 40 260 168 260 330 1 235
            -225 398 -449 325z"/>
            <path d="M1335 1187 c-93 -44 -145 -126 -145 -231 0 -76 34 -151 88 -196 77
            -64 -36 -60 1897 -58 l1760 3 40 22 c92 49 139 127 140 228 0 102 -48 183
            -138 232 -30 17 -132 18 -1812 20 l-1780 3 -50 -23z"/>
            </g>
          </svg>
          <h6 class="fillter-button-heading">Overview</h6>
        </div>
      </div>

      <div class="fillter-button click-button"  onclick="openCity(event, 'Paris')">
        <div class="fillter-button-content">
          <!-- <img class="img-fluid  fillter-icon" src="{{ url('/filemanager/photos/1/new_style/svg/image.svg') }}" alt=""> -->
          <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
            width="75.000000pt" height="64.000000pt" viewBox="0 0 75.000000 64.000000"
            preserveAspectRatio="xMidYMid meet" class="fillter-icon">

            <g transform="translate(0.000000,64.000000) scale(0.100000,-0.100000)"
            fill="#0B6D76" stroke="none">
            <path d="M16 624 c-14 -13 -16 -54 -16 -295 0 -174 4 -288 10 -300 10 -18 25
            -19 355 -19 189 0 350 3 359 6 14 5 16 42 16 309 0 267 -2 304 -16 309 -9 3
            -168 6 -354 6 -294 0 -341 -2 -354 -16z m644 -300 l0 -235 -47 3 -48 3 -101
            175 c-70 120 -107 175 -119 175 -12 0 -39 -37 -81 -110 -34 -60 -67 -111 -73
            -113 -6 -2 -16 8 -22 22 -16 34 -34 33 -49 -4 -7 -16 -18 -35 -26 -41 -12 -10
            -14 16 -14 168 0 99 3 183 7 186 3 4 134 7 290 7 l283 0 0 -236z"/>
            <path d="M495 499 c-52 -30 -62 -93 -20 -134 50 -51 135 -17 135 55 0 21 -8
            47 -17 59 -22 25 -71 35 -98 20z"/>
            </g>
          </svg>
          <h6 class="fillter-button-heading">Photos</h6>
        </div>
      </div>
      <!-- <div class="col-lg-2 mb-3 text-center">
        <div class="fillter-button" onclick="openCity(event, 'news')">
          <img class="img-fluid  fillter-icon" src="{{ url('/filemanager/photos/1/new_style/Vector (11).png') }}" alt="">
          <p>News</p>
        </div>
      </div> -->
      <div class="fillter-button click-button course-button" onclick="openCity(event, 'courses')">
        <div class="fillter-button-content">
          <!-- <img class="img-fluid  fillter-icon" src="{{ url('/filemanager/photos/1/new_style/svg/books.svg') }}" alt=""> -->
          <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
            width="55.000000pt" height="62.000000pt" viewBox="0 0 55.000000 62.000000"
            preserveAspectRatio="xMidYMid meet" class="fillter-icon">
            <g transform="translate(0.000000,62.000000) scale(0.100000,-0.100000)"
            fill="#0B6D76" stroke="none">
            <path d="M108 567 c-48 -29 -92 -62 -97 -75 -7 -13 -11 -93 -11 -191 0 -146 2
            -172 17 -190 21 -26 83 -42 121 -32 l27 7 5 161 c4 120 9 164 20 178 8 9 47
            40 88 67 69 47 84 69 50 76 -8 1 -61 -27 -119 -63 -112 -70 -163 -84 -157 -43
            5 32 102 89 140 81 29 -6 29 -5 26 32 -2 21 -7 40 -13 41 -5 2 -49 -20 -97
            -49z"/>
            <path d="M303 475 c-45 -30 -87 -64 -93 -74 -6 -11 -10 -88 -10 -178 0 -177 5
            -193 65 -213 51 -17 80 -7 185 68 l95 68 0 169 c0 144 -2 170 -15 173 -9 1
            -53 -25 -100 -59 -123 -90 -180 -109 -180 -59 0 27 104 95 143 92 25 -2 27 1
            27 33 0 49 -19 46 -117 -20z m197 -139 c0 -17 -15 -35 -52 -63 -77 -57 -78
            -58 -78 -30 0 19 15 36 62 71 34 25 63 46 65 46 2 0 3 -11 3 -24z"/>
            </g>
          </svg>
          <h6 class="fillter-button-heading">Courses</h6>
        </div>
      </div>
      <!-- <div class="col-lg-2 mb-3 text-center">
        <div class="fillter-button" onclick="openCity(event, 'apply')">
          <img class="img-fluid  fillter-icon" src="{{ url('/filemanager/photos/1/new_style/Group 119.png') }}" alt="">
          <p>How To Apply</p>
        </div>
      </div> -->
      <div class="fillter-button click-button" onclick="openCity(event, 'reviews')">
        <div class="fillter-button-content">
          <!-- <img class="img-fluid  fillter-icon" src="{{ url('/filemanager/photos/1/new_style/svg/page.svg') }}" alt=""> -->
          <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
            width="56.000000pt" height="71.000000pt" viewBox="0 0 56.000000 71.000000"
            preserveAspectRatio="xMidYMid meet"  class="fillter-icon">

            <g transform="translate(0.000000,71.000000) scale(0.100000,-0.100000)"
            fill="#0B6D76" stroke="none">
            <path d="M12 698 c-9 -9 -12 -83 -12 -273 0 -221 2 -264 16 -283 22 -32 225
            -132 267 -132 38 0 62 21 72 61 6 26 10 27 81 31 60 3 78 8 96 26 23 22 23 26
            23 278 l0 256 -28 24 c-28 24 -29 24 -266 24 -171 0 -240 -3 -249 -12z m483
            -293 l0 -240 -67 -3 -68 -3 0 173 c0 117 -4 181 -13 198 -8 16 -45 42 -102 72
            l-90 48 170 -3 170 -2 0 -240z m-310 167 l110 -57 3 -223 c2 -186 0 -223 -12
            -228 -8 -3 -61 18 -118 48 l-103 53 -3 233 c-1 127 1 232 5 232 5 -1 58 -26
            118 -58z"/>
            </g>
            </svg>
          <h6 class="fillter-button-heading">Reviews</h6>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="coursses-section py-5 desktop-button-section">
  <div class="container">
  <div class="card">
              <div class="card-header1" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">
                <span class="title">Available Courses ({{count($data->courses)}})</span>
                <span class="accicon"><i class="fa fa-caret-down"></i></span>
              </div>
              <div id="collapseOne" class="collapse show" data-parent="">
                <div class="card-body Selectone" style="border: none; margin-top: 20px;">
                  <div class="newdivtext">
                    <div class="row mb-3">
                      @foreach($subject as $sub)
                        <div style="cursor: pointer;" class="col-md-4 ">
                          <div class="border mb-3 Accommodationdiv course_search click-button"  data-subid="{{$sub->id}}" onclick="openCity(event, 'courses')">
                            <p class="coursses-paragraph">{{$sub->name}} <span style="color: #0B6D76;">({{count($data->courses->where('subject_id',$sub->id))}})</span></p>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
  </div>
</section>


<section class="filter-section desktop-button-section py-5">
<div class="container">
    <div class="fillter-button-main">
      <div class="fillter-button click-button active"  onclick="openCity(event, 'London')">
        <div class="fillter-button-content">
          <!-- <img class="img-fluid " src="{{ url('/filemanager/photos/1/new_style/svg/list.svg') }}" alt=""> -->
          <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
            width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"
            preserveAspectRatio="xMidYMid meet" class="fillter-icon">

            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
            fill="#0B6D76" stroke="none">
            <path d="M272 4480 c-102 -22 -193 -96 -241 -199 -22 -47 -26 -69 -26 -141 1
            -72 5 -94 28 -142 62 -128 203 -208 341 -194 293 30 415 382 204 588 -75 73
            -201 110 -306 88z"/>
            <path d="M1360 4405 c-101 -32 -170 -129 -170 -241 0 -34 7 -78 15 -98 23 -55
            79 -111 135 -135 l49 -21 1778 2 c1678 3 1780 4 1810 21 90 49 138 130 138
            232 -1 101 -48 179 -140 228 l-40 22 -1765 2 c-1490 1 -1772 0 -1810 -12z"/>
            <path d="M250 2891 c-93 -29 -177 -101 -219 -190 -38 -81 -38 -201 0 -282 56
            -119 161 -190 294 -197 104 -5 173 19 248 88 75 69 110 147 110 250 0 62 -6
            88 -28 139 -35 78 -113 151 -190 180 -57 22 -164 27 -215 12z"/>
            <path d="M1393 2810 c-123 -25 -203 -122 -203 -250 0 -106 53 -189 150 -234
            l45 -21 1770 0 c1650 0 1772 1 1806 17 54 25 96 64 127 117 23 39 27 57 27
            121 0 64 -4 82 -27 121 -31 53 -73 92 -127 117 -34 16 -156 17 -1781 19 -960
            0 -1764 -3 -1787 -7z"/>
            <path d="M233 1300 c-80 -26 -161 -99 -200 -178 -23 -48 -27 -70 -28 -142 0
            -77 3 -92 33 -152 73 -148 229 -223 384 -183 160 40 260 168 260 330 1 235
            -225 398 -449 325z"/>
            <path d="M1335 1187 c-93 -44 -145 -126 -145 -231 0 -76 34 -151 88 -196 77
            -64 -36 -60 1897 -58 l1760 3 40 22 c92 49 139 127 140 228 0 102 -48 183
            -138 232 -30 17 -132 18 -1812 20 l-1780 3 -50 -23z"/>
            </g>
          </svg>
          <h6 class="fillter-button-heading">Overview</h6>
        </div>
      </div>

      <div class="fillter-button click-button"  onclick="openCity(event, 'Paris')">
        <div class="fillter-button-content">
          <!-- <img class="img-fluid  fillter-icon" src="{{ url('/filemanager/photos/1/new_style/svg/image.svg') }}" alt=""> -->
          <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
            width="75.000000pt" height="64.000000pt" viewBox="0 0 75.000000 64.000000"
            preserveAspectRatio="xMidYMid meet" class="fillter-icon">

            <g transform="translate(0.000000,64.000000) scale(0.100000,-0.100000)"
            fill="#0B6D76" stroke="none">
            <path d="M16 624 c-14 -13 -16 -54 -16 -295 0 -174 4 -288 10 -300 10 -18 25
            -19 355 -19 189 0 350 3 359 6 14 5 16 42 16 309 0 267 -2 304 -16 309 -9 3
            -168 6 -354 6 -294 0 -341 -2 -354 -16z m644 -300 l0 -235 -47 3 -48 3 -101
            175 c-70 120 -107 175 -119 175 -12 0 -39 -37 -81 -110 -34 -60 -67 -111 -73
            -113 -6 -2 -16 8 -22 22 -16 34 -34 33 -49 -4 -7 -16 -18 -35 -26 -41 -12 -10
            -14 16 -14 168 0 99 3 183 7 186 3 4 134 7 290 7 l283 0 0 -236z"/>
            <path d="M495 499 c-52 -30 -62 -93 -20 -134 50 -51 135 -17 135 55 0 21 -8
            47 -17 59 -22 25 -71 35 -98 20z"/>
            </g>
          </svg>
          <h6 class="fillter-button-heading">Photos</h6>
        </div>
      </div>
      <!-- <div class="col-lg-2 mb-3 text-center">
        <div class="fillter-button" onclick="openCity(event, 'news')">
          <img class="img-fluid  fillter-icon" src="{{ url('/filemanager/photos/1/new_style/Vector (11).png') }}" alt="">
          <p>News</p>
        </div>
      </div> -->
      <div class="fillter-button click-button course-button" onclick="openCity(event, 'courses')">
        <div class="fillter-button-content">
          <!-- <img class="img-fluid  fillter-icon" src="{{ url('/filemanager/photos/1/new_style/svg/books.svg') }}" alt=""> -->
          <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
            width="55.000000pt" height="62.000000pt" viewBox="0 0 55.000000 62.000000"
            preserveAspectRatio="xMidYMid meet" class="fillter-icon">
            <g transform="translate(0.000000,62.000000) scale(0.100000,-0.100000)"
            fill="#0B6D76" stroke="none">
            <path d="M108 567 c-48 -29 -92 -62 -97 -75 -7 -13 -11 -93 -11 -191 0 -146 2
            -172 17 -190 21 -26 83 -42 121 -32 l27 7 5 161 c4 120 9 164 20 178 8 9 47
            40 88 67 69 47 84 69 50 76 -8 1 -61 -27 -119 -63 -112 -70 -163 -84 -157 -43
            5 32 102 89 140 81 29 -6 29 -5 26 32 -2 21 -7 40 -13 41 -5 2 -49 -20 -97
            -49z"/>
            <path d="M303 475 c-45 -30 -87 -64 -93 -74 -6 -11 -10 -88 -10 -178 0 -177 5
            -193 65 -213 51 -17 80 -7 185 68 l95 68 0 169 c0 144 -2 170 -15 173 -9 1
            -53 -25 -100 -59 -123 -90 -180 -109 -180 -59 0 27 104 95 143 92 25 -2 27 1
            27 33 0 49 -19 46 -117 -20z m197 -139 c0 -17 -15 -35 -52 -63 -77 -57 -78
            -58 -78 -30 0 19 15 36 62 71 34 25 63 46 65 46 2 0 3 -11 3 -24z"/>
            </g>
          </svg>
          <h6 class="fillter-button-heading">Courses</h6>
        </div>
      </div>
      <!-- <div class="col-lg-2 mb-3 text-center">
        <div class="fillter-button" onclick="openCity(event, 'apply')">
          <img class="img-fluid  fillter-icon" src="{{ url('/filemanager/photos/1/new_style/Group 119.png') }}" alt="">
          <p>How To Apply</p>
        </div>
      </div> -->
      <div class="fillter-button click-button" onclick="openCity(event, 'reviews')">
        <div class="fillter-button-content">
          <!-- <img class="img-fluid  fillter-icon" src="{{ url('/filemanager/photos/1/new_style/svg/page.svg') }}" alt=""> -->
          <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
            width="56.000000pt" height="71.000000pt" viewBox="0 0 56.000000 71.000000"
            preserveAspectRatio="xMidYMid meet"  class="fillter-icon">

            <g transform="translate(0.000000,71.000000) scale(0.100000,-0.100000)"
            fill="#0B6D76" stroke="none">
            <path d="M12 698 c-9 -9 -12 -83 -12 -273 0 -221 2 -264 16 -283 22 -32 225
            -132 267 -132 38 0 62 21 72 61 6 26 10 27 81 31 60 3 78 8 96 26 23 22 23 26
            23 278 l0 256 -28 24 c-28 24 -29 24 -266 24 -171 0 -240 -3 -249 -12z m483
            -293 l0 -240 -67 -3 -68 -3 0 173 c0 117 -4 181 -13 198 -8 16 -45 42 -102 72
            l-90 48 170 -3 170 -2 0 -240z m-310 167 l110 -57 3 -223 c2 -186 0 -223 -12
            -228 -8 -3 -61 18 -118 48 l-103 53 -3 233 c-1 127 1 232 5 232 5 -1 58 -26
            118 -58z"/>
            </g>
            </svg>
          <h6 class="fillter-button-heading">Reviews</h6>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- sourses and reviews sections start -->

  <section id="reviews" class="tabcontent" style="display:none;padding-bottom: 50px;">
          <div class="container">
            <h3 class="h4 md-font text-center mb-3" style="text-transform:capitalize;" Reviews</h3>
            <div class="scroll-area all-reviews scroll2">
              @include('frontend.student.review')
            </div>
            <div class="clearfix"></div>
            @if(auth()->check() && auth()->user()->user_type=='student' && count($reviews->where('user_id', auth()->user()->id)) == 0 )
            <div id="CreateReview" method="POST" class="bg-light border rounded p-3 review" style="position: relative;">
              <fieldset>
                  <legend class="h6 form-control-label is-required">Rate <b>{{$data->name}}</b> Tell others what you think</legend>
                  <div class="stars uniDetail">
                    <i class="fa fa-star review-star"></i>
                    <i class="fa fa-star review-star"></i>
                    <i class="fa fa-star review-star"></i>
                    <i class="fa fa-star review-star"></i>
                    <i class="fa fa-star review-star"></i>
                  </div>
              </fieldset>
              <div class="form-group">
                <label for="id_pros" class="form-control-label is-required">Review</label>
                <textarea name="content_pros" placeholder="Share some of the best reasons to study at {{$data->name}}" class="textarea form-control rev_reason" cols="40" rows="4" minlength="140" required=""></textarea>
              </div>
              <div class="row">
                <div class="col-auto mb-3">
                  <input class="btn btn-primary save-review" type="submit" value="Submit Review">
                </div>
              </div>
            </div>
            @endif
          </div>
        </section>

        <section id="courses" class="tabcontent py-5 coursses-section" style="display: none;">
          <div class="container">

          <!-- corses accordion for mobile start -->
          <div class="coursses-section pb-5 mobile-button-section">
            <div class="card">
              <div class="card-header1" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">
                <span class="title">Available Courses ({{count($data->courses)}})</span>
                <span class="accicon"><i class="fa fa-caret-down"></i></span>
              </div>
              <div id="collapseOne" class="collapse show" data-parent="">
                <div class="card-body Selectone" style="border: none; margin-top: 20px;">
                  <div class="newdivtext">
                    <div class="row mb-3">
                      @foreach($subject as $sub)
                        <div style="cursor: pointer;" class="col-md-4 ">
                          <div class="border mb-3 Accommodationdiv course_search click-button"  data-subid="{{$sub->id}}" onclick="openCity(event, 'courses')">
                            <p class="coursses-paragraph">{{$sub->name}} <span style="color: #0B6D76;">({{count($data->courses->where('subject_id',$sub->id))}})</span></p>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- corses accordion for mobile end -->

  
            <main id="course_filter" class="o-2colLayout-content">
              <div class="o-flex-between align-items-end mb-3">
                <h2 class="d-none d-md-block h2 mb-0">Courses</h2>
                <div><strong>{{count($data->courses)}}</strong> courses found</div>
              </div>
              <div class="fillter-form-main">
                <form id="filter-form" class=" pt-3 px-3 mb-4" method="GET">
                  <h5>Filter courses</h5>
                  <div id="filters">
                    <input type="text" class="form-control custom-input" @keyup="fetchData(page)" placeholder="Search Course By Name" v-model="search">
                  </div>
                  <div class="select-button-main">
                    <div class="form-group select-block">
                      <select name="qualification" v-model="qualification" @change="fetchData(page)" class="form-control custom-select js-select-resetBtn">
                        <option value="0" selected="">All qualifications</option>
                        @foreach(qualification() as $qual)
                        <option value="{{$qual->id}}">{{$qual->title}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group select-block c-select-resetBtn">
                      <select name="subject" v-model="subject" @change="fetchData(page)" class="form-control custom-select js-select-resetBtn">
                        <option value="0" selected="">All subjects</option>
                        @foreach(pluckSubjects() as $key => $sub)
                        <option value="{{$key}}">{{$sub}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </form>
                </div>
              <div class="course-list-main">
                <div class="course_lists" id="cousrList">
                  <div class="row" v-if="courses.data && courses.data.length>0">
                    <div class="col-md-6" v-for="course in courses.data">
                      <!-- <article class="row no-gutters align-items-center flex-nowrap border-bottom border-top u-small95 pt-4 course-articles">
                        <div class="col">
                          <h6>
                            <a :href="baseUrl+'/courses/'+course.id" v-text="course.name"></a>
                            <div class="ml-2" style="display: inline;font-size: 13px;position: relative;top: -1px;" v-if="course.qualification_name">
                            (@{{course.qualification_name.title}})
                          </h6>
                        </div>
                        <div class="media mb-3">
                          <div class="media-body mx-2">
                            <div class="text-muted small">
                              <div class=""><i class="fa fa-book"></i> <span v-if="course.subject">@{{course.subject.name}}</span></div>
                              <div class=""><i class="fa fa-calendar"></i> @{{(course.duration!==null)?course.duration:''}}</div>
                            </div>
                          </div>
                          <div class="btn-group p-0 mx-3" style="bottom: 1px;" v-if="authtype == 'student'">
                            <form class="save-for-later-form" action="{{route('addToWishlist')}}" method="post" @submit="addToWishlist($event)">
                              {{csrf_field()}}
                              <button type="submit" class="btn py-1 border u-small80 c-actionBtn"><i class="fa fa-heart"></i> Save </button>
                              <input type="hidden" :value="course.id" name="course_id">
                            </form>
                          </div>
                          <div class="wishlist-status" style="font-size: 12px;color: rgb(197, 34, 40);margin-top: 5px;position: absolute;bottom: -5px;width: 100%;"></div>
                        </div>
                      </article> -->

                      <article class="">
                      <a :href="baseUrl+'/courses/'+course.id" target="_blank" v-if="course.id" class="row no-gutters align-items-center flex-nowrap  border-top u-small95 pt-4 course-articles">
                          <div class="col">
                              <h6> 
                                  <span style="display: inline-block;"><p v-text="course.name"></p></span>
                                  <div class="ml-2" style="display: inline;font-size: 13px;position: relative;top: -1px;" v-if="course.qualification_name">
                                      (@{{course.qualification_name.title}})
                                  </div>
                              </h6>
                          </div>
                          <div class="media mb-3">
                              <div class="media-body mx-2">
                                  <div class="text-muted small">
                                      <div class=""><i class="fa fa-book"></i> <span v-if="course.subject">@{{course.subject.name}}</span></div>
                                      <div class=""><i class="fa fa-calendar"></i> @{{(course.duration!==null)?course.duration:''}}</div>
                                  </div>
                              </div>
                              <div class="btn-group p-0 mx-3" style="bottom: 1px;" v-if="authtype == 'student'">
                                  <form class="save-for-later-form" action="{{route('addToWishlist')}}" method="post" @submit="addToWishlist($event)">
                                      {{csrf_field()}}
                                      <button type="submit" class="btn py-1 border u-small80 c-actionBtn"><i class="fa fa-heart"></i> Save </button>
                                      <input type="hidden" :value="course.id" name="course_id">
                                  </form>
                              </div>
                              <div class="wishlist-status" style="font-size: 12px;color: rgb(197, 34, 40);margin-top: 5px;position: absolute;bottom: -5px;width: 100%;"></div>
                          </div>
                      </a>
                  </article>
                    </div>
                  </div>
                  <p v-else class="not-found">No Course Found</p>
                </div>
              </div>
              <div class="mt-5 mb-5"></div>
            </main>
          </div>
        </section>
<!-- sourses and reviews sections end -->


  <div class="fillter-cintent-main mt-5" style="color:#464646;">
    <div class="row">
      <div class="contantbox" style="width: 100%;">
        <section id="London" class="tabcontent">
          <div class="container pb-5">
            <div class="border textdivcolcss">
              <div class="row mb-3">
                  <div class="col-lg-3 col-md-3 col-6 table-block table-block-left">
                      <div class="border mb-3  Accommodationdiv"><p>Accommodation:</p></div>
                  </div>
                  <div class="col-lg-9 col-md-9 col-6 table-block">
                      <div class="border Accommodationdiv"><p>{{($data->accommodation==null)?'Off Campus':$data->accommodation}}</p></div>
                  </div>
              </div>
              <div class="row mb-3">
                  <div class="col-lg-3 col-md-3 col-6 table-block table-block-left">
                      <div class="border mb-3  Accommodationdiv"><p>In Take:</p></div>
                  </div>
                  <div class="col-lg-9 col-md-9 col-6 table-block table-block-right">
                      <div class="border Accommodationdiv"><p>{{($data->intake)??''}}</p></div>
                  </div>
              </div>
              <div class="row mb-3">
                  <div class="col-lg-3 col-md-3 col-6 table-block table-block-left">
                      <div class="border mb-3  Accommodationdiv"><p>Languages:</p></div>
                  </div>
                  <div class="col-lg-9 col-md-9 col-6 table-block table-block-right">
                      <div class="border Accommodationdiv"><p>{{($data->languages)??''}}</p></div>
                  </div>
              </div>
              <div class="row mb-3">
                  <div class="col-lg-3 col-md-3 col-6 table-block table-block-left">
                      <div class="border mb-3  Accommodationdiv"><p>Scholarship:</p></div>
                  </div>
                  <div class="col-lg-9 col-md-9 col-6 table-block table-block-right">
                      <div class="border Accommodationdiv"><p>{{($data->scholarship==1)?'Avalible':'Not Avalible'}}</p></div>
                  </div>
              </div>
              <div class="row mb-3">
                  <div class="col-lg-3 col-md-3 col-6 table-block table-block-left">
                      <div class="border mb-3 Accommodationdiv"><p>Address:</p></div>
                  </div>
                  <div class="col-lg-9 col-md-9 col-6 table-block table-block-right">
                      <div class="border Accommodationdiv"><p>{{($data->address)??''}}</p></div>
                  </div>
              </div>
            </div>
          </div>
          <div class="c-drawerStack mb-4">
            @if($data->guide!==null)
            <section>
              <h2 class="h4 c-heading-bar u-pointer mb-0" tabindex="0" data-drawer="section-campus">
                <i class="fa fa-caret-right u-o50"></i> Admission Guide
              </h2>
              <div id="section-campus" style="display: none;padding:10px 0px;" data-drawer-group="accordion">
                <div class="s-content mt-3">{!! $data->guide !!}</div>
              </div>
            </section>
            @endif
            @if($data->accommodation_detail!==null)
            <section>
              <h2 class="h4 c-heading-bar u-pointer mb-0" tabindex="0" data-drawer="section-accommodation">
                <i class="fa fa-caret-right u-o50"></i> Accommodation
              </h2>
              <div id="section-accommodation" style="display: none;padding:10px 0px;" data-drawer-group="accordion">
                  <div class="s-content mt-3">{!! $data->accommodation_detail !!}</div>
              </div>
            </section>
            @endif
            @if($data->expanse!==null)
            <section>
              <h2 class="h4 c-heading-bar u-pointer mb-0" tabindex="0" data-drawer="section-fee">
                <i class="fa fa-caret-right u-o50"></i> Fee Structure
              </h2>
              <div id="section-fee" style="display: none;padding:10px 0px;" data-drawer-group="accordion">
                  <div class="s-content mt-3">{!! $data->expanse !!}</div>
              </div>
            </section>
            @endif
            <div class="Browsesection">
              <div class="container">
              <div class="accordion" id="accordionExample">
                    
                  <div class="card">
                    <div class="card-header1 collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false">
                        <span class="title">About</span>
                        <span class="accicon"><i class="fa fa-caret-down"></i></span>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                      <div class="card-body Selectone" style="border: none; margin-top: 20px;">
                        <div id="section-about" class="c-overlay mb-3 js-drawer is-partClosed-h200 is-open">
                      <div class="s-content">
                        <p style="margin-left:0cm; margin-right:0cm; text-align:start">
                          {!!$data->about!!}
                        </p>
                        <p style="margin-left:0cm; margin-right:0cm; text-align:start">&nbsp;</p>
                      </div>
                      <div class="c-overlay-item is-gradient-white-bottom w-100 h-25"></div>
                    </div>
                    <div class="text-center">
                      <button class="btn btn-outline-primary d-none" type="button" data-drawer="section-about" data-drawer-open="false">
                        <span class="js-drawer-showIf-close">View more</span>
                        <span class="js-drawer-showIf-open">View less</span>
                      </button>
                    </div> 
                  </div>
                </div>
                </div>
                  <!-- <div class="card">
                      <div class="card-header1 collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false">
                          <span class="title">Review (0)</span>
                          <span class="accicon"><i class="fa fa-caret-down"></i></span>
                      </div>
                      <div id="collapse2" class="collapse" data-parent="#accordionExample">
                        <div class="card-body Selectone" style="border: none; margin-top: 20px;">
                          <h2 class="h4 c-heading-bar mb-3" style="position: relative;">
                          Reviews
                          <span class="badge badge-pill badge-secondary">{{count($reviews)}}</span>
                        </h2>
                        @if(count($reviews)>0)
                        @foreach($reviews->take(3) as $review)
                          <a href="javascript:void(0);" class="o-blockLink">
                            <article class="c-bgLight-hoverDark border rounded p-3 mb-3" @if(auth()->check() && $review->user_id == auth()->user()->id) style="background-color:#ffffff;border: 1px solid #c52228!important;" @endif>
                              <header class="pb-2">
                                <span class="text-primary">
                                  @for($i=0; $i<$review->stars; $i++)<i class="fa fa-star-o"></i>@endfor
                                  <span class="sr-only">{{$review->stars}}/5</span>
                                </span>
                              </header>
                              <div class="text-muted small">By @if(auth()->check()){{($review->user_id == auth()->user()->id)?'You':$review->users->students->name}} @endif ({{date("dS M, Y h:i a", strtotime($review->created_at))}})</div>
                              <span class="font-italic read-less">
                                {!!implode(' ', array_slice(str_word_count($review->review, 2), 0, 20))!!}
                              </span>
                              <span class="font-italic read-more" style="display: none;">
                                {{$review->review}}
                              </span>
                              @if(str_word_count($review->review)>=20)
                              <small class="text-primary read-more-btn">... Read more</small>
                              @endif
                            </article>
                          </a>
                          <div class="clearfix"></div>
                        @endforeach
                        @else
                          <p class="not-found">No Reviews</p>
                        @endif
                        </div>
                      </div>
                    </div>
                  </div> -->
              </div>
              </div>



              <div class="slider-container py-5">
                  <div class="container">
                    <h6 class="slider-main-heading">Other universities and colleges</h6>
                    <div class="slider-main mx-2">
                      <div class="row">
                        @foreach(getRandUni() as $uni)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mb-2 slider-column">
                          <div class="card slider-card">
                            <a href="{{url('university/'.$uni->slug)}}" class="slider-link">
                              <div class="slider-image-container">
                                <img class="img-fluid slider-image" src="{{url((fix($uni->logo, 'thumbs')))??iph()}}" alt="university" alt="">
                              </div>
                              <div class="slider-content">
                                <h6 class="slider-heading">{{$uni->name}}</h6></a>
                                <p class="slider-paragraph"><i class="fa-sharp fa-light fa-location-dot"></i> {{$uni->city}}, {{$uni->country}}</p>
                              </div>
                            </a>
                          </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                  </div>
              </div>
          </div>
          <section class="c-heading-bar text-center py-3 mb-4">
                <h6 class="h5">Share this <i class="fa fa-share-alt"></i></h6>
                <a class="fa-stack u-text-facebook" href="https://www.facebook.com/sharer/sharer.php?u={{url('university/'.$data->slug)}}/">
                  <i class="fa fa-square fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                </a>
                <a class="fa-stack u-text-twitter" href="https://twitter.com/home?status={{url('university/'.$data->slug)}}/">
                  <i class="fa fa-square fa-stack-2x"></i>
                  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                </a>
                <a class="fa-stack u-text-whatsapp" href="https://wa.me/?text={{url('university/'.$data->slug)}}">
                  <i class="fa fa-square fa-stack-2x"></i>
                  <i class="fa fa-whatsapp fa-stack-1x fa-inverse"></i>
                </a>
              </section>
        </section>

        <secrtion id="Paris" class="tabcontent photos-section pt-5 pb-5" style="display: none;background-color:#F0F0F0;">
          <div class="container">
            <div id="aniimated-thumbnials">
              <div class="row">
                @if(isset($data->feature_image))
                  @for($i=0; $i<count($data->feature_image['image']); $i++)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-3 course-image-column">
                      <a href="{{ url(fix($data->feature_image['image'][$i])) }}">
                          <img src="{{ url(fix($data->feature_image['image'][$i], 'thumbs')) }}" alt="university" />
                      </a>
                    </div>
                  @endfor
                  @else <p class="not-found">No Images Found</p>
                @endif
              </div>
            </div>
          </div>
        </section>

        <section id="news" class="tabcontent" style="display: none;">
          <div class="container py-5">
            <h3 class="h4 md-font text-center mb-3">Latest News</h3>
            <div class="col-md-12">
              <div class="acc-box">
                @if(count($news)>0)
                  @foreach($news as $key => $new)
                  <h4 class="card-title h6 acc-btn">
                    {{$key+1}}- {{($new->title)??''}}
                    <span class="acc_date">({{date('dS M, Y',strtotime($new->created_at))}})</span>
                  </h4>
                  <div class="acc-description">
                    {!! ($new->description)??'' !!}
                  </div>
                  @endforeach
                @endif
              </div>
            </div>
          </div>
        </section>

      </div>
    </div>
  </div>
              <!-- <div id="apply" class="tabcontent" style="display: none;">
                <section class="container pb-5">
                  {!! (getpreferences()['general_meta']['how_to_apply'])??'' !!}
                </section>
              </div> -->
           
@endsection
<!--- schema markup start by -->
@section('schemaMarkup')
            <script type="application/ld+json">
                {
                  "@context": "https://schema.org",
                  "@type": "FAQPage",
                  "mainEntity": [
                       <?php 
                         $question = json_decode($data->sm_question);
                         $answer = json_decode($data->sm_answer);
                         $count =  count($question);
                         if($count > 0)
                         {
                             for($i = 0; $i < $count;)
                             { ?>
                             {
                                "@type": "Question",
                                "name": "{{ $question[$i] }}",
                                "acceptedAnswer": {
                                  "@type": "Answer",
                                  "text": "{{ $answer[$i] }}"
                                }
                              
                         <?php echo ($i === ($count-1))? '}':'},'; $i++;  
                                 
                             }
                         }
                    ?>
                    
                  ]
                }
            </script>
<!--- schema markup end   -->
@endsection

@section('customScripts')
  <script type="text/javascript" src="{{asset('assets_frontend/lightGallery/lightgallery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets_frontend/js/jquery.mCustomScrollbar.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets_frontend/js/jquery-confirm.min.js')}}"></script>
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>--}}

  <script>
    $(document).ready(function(){

      $('.c-drawerStack').on('click', 'h2', function(){
        var drawer = $(this).attr('data-drawer');
        if(drawer===undefined){return false;}
        $(this).parent().find('#'+drawer).toggle(function(){
          if($(this).is(':visible')){
            $(this).fadeIn(300);
          }else{
            $(this).fadeOut(300);
          }
        });
      });

      $('.acc-box').on('click', '.acc-btn', function(){
        $(this).next('.acc-description').toggle(function(){
          if($(this).is(':visible')){
            $(this).fadeIn(300);
          }else{
            $(this).fadeOut(300);
          }
        });
      });

      $('#aniimated-thumbnials').lightGallery({
          thumbnail:true,
          animateThumb: false,
          showThumbByDefault: false
      });

      $('.stars').on('mouseenter', '.review-star', function(){
        $(this).addClass('till');
        $('.stars').find('.review-star').each(function(){
          $(this).css('color', '#c52228');
          if($(this).hasClass('till')){
            return false;
          }
        })
      })
      $('.stars').on('click', '.review-star', function(){
        $('.stars').find('.review-star').removeClass('checked-star');
        $(this).addClass('checked-star');
        var count=0;
        $('.stars').find('.review-star').each(function(){
          $(this).css('color', '#c52228');
          count++
          if($(this).hasClass('checked-star')){
            return false;
          }
          $(this).addClass('checked-star');
        })
      })
      $('.stars').on('mouseleave', '.review-star', function(){
        $(this).removeClass('till');
        $('.review-star').css('color', '#dad7d7');
      });
      $('.save-review').on('click', function(){
        var _this = $(this);
        var val = $('.rev_reason').val();
        var stars = $('.uniDetail .review-star.checked-star').length;
        if(val!=='' && stars!==0){
          _this.attr('disabled','disabled');
          setTimeout(()=>{
            _this.removeAttr('disabled');
          },5000);
          $.ajax({
            url: "{{route('save-review')}}",
            type: 'POST',
            dataType: 'html',
            data: {'review':val, 'stars':stars, 'university_id':'{{$data->id}}', '_token':'{{csrf_token()}}'},
            success: function(data){
              $('.review').fadeOut(300);
              $('.all-reviews').html(data);
              _this.removeAttr('disabled','disabled');
            }
          })
        }
      });
      $('.read-more-btn').on('click', function(){
        if($(this).parent().find('.read-more').is(':visible')){
          $(this).parent().find('.read-more').fadeOut(300);
          $(this).parent().find('.read-less').delay(300).fadeIn(300);
          $(this).delay(300).text('... Read more');
        }else{
          $(this).parent().find('.read-less').fadeOut(300);
          $(this).parent().find('.read-more').delay(300).fadeIn(300);
          $(this).delay(300).text('Read less');
        }
      })
    });

    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      var filterButtons = document.querySelectorAll('.click-button ');
      filterButtons.forEach(function(btn) {
        btn.classList.remove('active');
      });
      evt.currentTarget.className += " active";

      
    // Trigger key press event after 3 seconds
    const searchInput = document.querySelector('.custom-input');
    searchInput.value = 'Your Value Here';
    setTimeout(function() {
        const event = new KeyboardEvent('keyup', {
            key: 'Enter',
            keyCode: 13,
            which: 13,
            bubbles: true,
            cancelable: true,
        });
        searchInput.dispatchEvent(event);
    }, 0);
    }

    function deleteReview(id, uni_id) {
        $.confirm({
            title: 'Confirm!',
            content: 'Are you sure, You want to Remove this?',
            useBootstrap: false,
            buttons: {
                confirm: function () {
                    $(function(){
                      $.ajax({
                        url: '{{route('remove-review')}}',
                        type: 'POST',
                        dataType: 'html',
                        data: {'id':id, 'uni_id':uni_id,'_token':'{{csrf_token()}}'},
                        success: function(data){
                          $('body .all-reviews').html(data);
                          setTimeout(()=>{
                            $('.review').fadeIn(300);
                          },500)
                        }
                      })
                    });
                },
                cancel: function () {
                }
            }
        });
    }

  </script>

  <script>
    var course_filter = new Vue({
      el: '#course_filter',
      data: {
          url: '{{route("getUniCourse")}}',
          authtype: '{{(auth()->user()->user_type)??0}}',
          baseUrl: '{{url("/")}}',
          qualification: 0,
          subject: 0,
          university: '{{$data->id}}',
          courses:[],
          search: "",
          moment:moment,
          page: 1,
          limit: '{{($meta['paginate'])??5000}}',
      },
      created(){

      },
      methods: {
          fetchData(page){
              var _this = this;
              var data='?';
              data+='page='+_this.page;
              (_this.limit!=='')?data+='&limit='+_this.limit:'';
              (_this.search!=='')?data+='&search='+_this.search:'';
              (_this.subject!==0)?data+='&subject='+_this.subject:'';
              (_this.university!==0)?data+='&university='+_this.university:'';
              (_this.qualification!==0)?data+='&qualification='+_this.qualification:'';
              if(!$('.t_loader').is(':visible')){
                  $('.course_lists').fadeOut(200).delay(200);
                  $('.t_loader').delay(200).fadeIn(200)
              }
              axios.get(_this.url+data)
              .then(response => {
                  _this.courses = response.data;
                  // console.log(_this.courses);
                  $(function(){
                      $('.t_loader').fadeOut(200);
                      $('.course_lists').delay(300).fadeIn(200);

                  })
              }).catch(errror=>{

              });
          },
          addToWishlist(event){
            event.preventDefault();
            var action = $(event.target).attr('action');
            var data = $(event.target).serialize();
            axios.post(action, data)
            .then(response => {
              if(response.data == 'success'){
                $(event.target).parent().parent().find('.wishlist-status').text('Successfully saved to wishlist');
                $(event.target).parent().parent().find('.wishlist-status').fadeIn(300).delay(5000).fadeOut(300);
              }else{
                $(event.target).parent().parent().find('.wishlist-status').text('Already in your wishlist');
                $(event.target).parent().parent().find('.wishlist-status').fadeIn(300).delay(5000).fadeOut(300);
              }
            }).catch(errror=>{

            });
          },
          optImage(file, size=null){
            var _this = this;
            var url = '{{iph()}}';
            if(file==null){
              return url;
            }
            var thumb = file.split("/");
            var sliced = thumb.slice(1, thumb.length-1);
            var temp = sliced.join('/');
            var ext = file.split(".").pop().toLowerCase();
            if(!['jpg', 'png', 'jpeg','svg','gif','exif','bmp'].includes(ext)){
              return url;
            }
            if(size!==null){
              url = temp+'/'+size+'/'+thumb.pop();
            }else{
              if('{{is_mobile()}}'*1){
                size = 'small';
                url = temp+'/'+size+'/'+thumb.pop();
              }else{
                if('{{op_image()}}'*1 == 1){
                  size = 'optimize';
                  url = temp+'/'+size+'/'+thumb.pop();
                }else{
                  url = temp+'/'+thumb.pop();
                }
              }
            }
            return url;
          },
      },
      mounted(){
        var _this = this;
        $(document).ready(function(){
          $('.course_search').on('click', function(){
              var id = $(this).attr('data-subid');
              if(id !== undefined && id !==''){
                _this.subject = id;
              }
              _this.fetchData(_this.page)
          });
        });

      },

    });
  </script>

<script>

      function send_emailcontat(){


swal({
  title: "Do you want to request admission information from this University?",
  text: "Student information will be transfer to university!",
  icon: "warning",
  buttons: true,
  successMode: true,
})
.then((willDelete) => {
  if (willDelete) {

          jQuery.ajax({
            type: 'GET',
            url: '/sendbtnemail/<?php echo $data->id; ?>/university',   
            data: {},
            dataType: "json",
            success: function (data) {

              if (data.message == 'success') {
                  
                  swal("Success!", data.message_text, "success");
                  
              } 
               else if (data.message == 'login') {
                  
                                                swal({
  title: "You are not login!",
  text: "Please login to send information request",
  icon: "warning",
  buttons: true,
  dangerMode: false,
  buttons: ["Cancel", "Login Now"],
})
.then((willDelete) => {
  if (willDelete) {
    
    $("#login_model").modal("show");  
    
  } else {
    
  }
});
                  
              }
              else {

     swal("Failure!", data.message_text, "error");

              }

            }   
          });

  } else {
    return false;
  }
});


      }

    </script>


  
@endsection
