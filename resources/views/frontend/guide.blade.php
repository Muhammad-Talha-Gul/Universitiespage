@extends('layouts.frontend')
@section('title',(isset($data['seo']->meta_title))?$data['seo']->meta_title:$data['title'])
@section('seo')
@isset($data['seo']->show_meta)
<meta name="keywords" content="{!!$data['seo']->meta_keywords or ''!!}">
<meta name="description" content="{!!$data['seo']->meta_description or ''!!}">
@endisset
@endsection
@section('customStyles')
<style type="text/css">
  .c-bgHeader.has-banner-350px {
    height: 305px !important;
    max-height: 350px;
    background-position-x: center;
    background-position-y: top;
    position: relative;
  }

  .socilaMediaIconSize {
    font-size: 2rem;
  }
</style>
@endsection
@section('content')
<div class="bg-light dvfgfsdgdgsdf">
  {{-- @if(request()->path()!=='/' && request()->path()!==null)
      <nav class="container o-breadcrumb">
        <a class="o-breadcrumb-item" href="{{url('/')}}">Home</a>
  <a class="o-breadcrumb-item" href="{{url('guides')}}">Guides</a>
  <a class="o-breadcrumb-item" href="{{url($data->slug)}}">{{$data->title}}</a>
  </nav>
  @endif --}}
  <!-- @if($data->guide_type=='university')
  <header class="c-bgHeader c-countryPageBanner p-0 has-banner-350px mb-4" class="fluid-container" style="background-image: url({{url((fix($data->image))??iph())}});background-position: center;" data-img="{{url((fix($data->image))??iph())}}">
    <div class="fluid-container" align="left" style="background-color:#00000073;height:inherit;">
      <div class="container mb-3" style="position: absolute;bottom: 20px;margin-left: 14%;width: 73%;">
          <h1>{{$data->title}} </h1>
          <div class="h5 mb-4" style="color: #c7c7c7;font-size: 16px;">
            {!! $data->sub_title !!}
          </div>
        </div>
      </div>
  </header>
  @else
  <header class="container" style="margin-top: 20px;">
    <div class="fluid-container" align="left">
      <h1>{{$data->title}}</h1>
      <div class="h5 mb-4" style="color: #c7c7c7;font-size: 16px;">
        {!! ($data->sub_title)??'' !!}
      </div>
    </div>
  </header>
  @endif -->
  <div class="o-2colLayout" style="display: unset !important;">
    <section class="guide-detail-section mb-3 pt-5">
      <div class="container">
        <div class="d-lg-none">
          <div class="js-share u-pointer u-small95">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{url('guides/'.$data->slug)}}/">
              <i class="fa fa-facebook-official u-text-facebook socilaMediaIconSize"></i>
            </a>
            <a href="https://twitter.com/home?status={{url('guides/'.$data->slug)}}/">
              <i class="fa fa-twitter u-text-twitter socilaMediaIconSize"></i>
            </a>
            <a href="https://wa.me/?text={{url('guides/'.$data->slug)}}">
              <i class="fa fa-whatsapp u-text-whatsapp socilaMediaIconSize"></i>
            </a>
            <a href="https://plus.google.com/share?url={{url('guides/'.$data->slug)}}&amp;name={{str_replace(" ", "+", $data->title)}}"><i class="fa fa-google-plus u-text-google-plus socilaMediaIconSize"></i></a>
            <strong class="text-primary">Share this page with friends</strong>
          </div>
          <aside class="c-share">
            <div class="c-share-body is-onTrigger bg-light rounded u-boxShadow-light h4 p-2">
              <a class="fa-stack u-text-facebook" href="https://www.facebook.com/sharer/sharer.php?u={{url('guides/'.$data->slug)}}/">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
              </a>
              <a class="fa-stack u-text-twitter" href="https://twitter.com/home?status={{url('guides/'.$data->slug)}}/">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
              </a>
              <a class="fa-stack u-text-whatsapp" href="https://wa.me/?text={{url('guides/'.$data->slug)}}">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-whatsapp fa-stack-1x fa-inverse"></i>
              </a>
            </div>
          </aside>
        </div>
        <div class="d-none d-lg-flex flex-wrap">
          <a class="d-block text-white rounded p-2 mx-1 mb-2 u-bg-facebook" href="https://www.facebook.com/sharer/sharer.php?u={{url('guides/'.$data->slug)}}/">
            <i class="fa fa-lg fa-facebook-official"></i> Share on Facebook
          </a>
          <a class="d-block text-white rounded p-2 mx-1 mb-2 u-bg-twitter" href="https://twitter.com/home?status={{url('guides/'.$data->slug)}}/">
            <i class="fa fa-lg fa-twitter"></i> Twitter
          </a>
          <a class="d-block text-white rounded p-2 mx-1 mb-2 u-bg-whatsapp" href="https://wa.me/?text={{url('guides/'.$data->slug)}}">
            <i class="fa fa-lg fa-whatsapp"></i> WhatsApp
          </a>

        </div>
      </div>
  </div>
  </section>

  <div class="o-2colLayout container mb-5">
    <main class="o-2colLayout-content">
      <div class="article-details-content-main">
        <article>{!! $data->description !!}</article>
      </div>
      <!-- start by sadam --->
      <section class="mb-5">
        <h4 class="mb-3">You might be interested in...</h4>
        <div class="row">
          @if(count(getRandGuides($data->guide_type))>0)
          @foreach(getRandGuides($data->guide_type) as $key=> $guide)
          @php
          $c='primary';
          $r=rand(1,3);
          if($r==1){$c='primary';}elseif($r==2){$c='success';}
          elseif($r==3){$c='info';}
          @endphp
          <article class="col-md-6 border-top border-bottom u-mb-n1px px-3">
            <a class="row" href="{{url('guides/'.$guide->slug)}}">
              <div class="col-2 h2 o-flex-center rounded text-white bg-{{$c}} py-1 my-3">
                {{$key+1}}
              </div>
              <div class="col my-3">{{$guide->title}}</div>
            </a>
          </article>
          @endforeach
          @endif

        </div>
      </section>

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
            if ($count > 0) {
              for ($i = 0; $i < $count;) { ?> {
                  "@type": "Question",
                  "name": "{{ $question[$i] }}",
                  "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{{ $answer[$i] }}"
                  }

                <?php echo ($i === ($count - 1)) ? '}' : '},';
                $i++;
              }
            }
                ?>

                ]
          }
      </script>
      @endsection
      <!-- end by sadam -->
    </main>
    <aside class="o-2colLayout-sidebar">


      <section class="mb-5 d-flex flex-column align-items-center">
        <h6 class="h4 mb-3">Featured universities</h6>
        <section class="mb-4 uni_lists" style="display: block;">

          @foreach(getPopualrUniversity() as $uni)
          <article class="row align-items-center bg-white border-bottom border-top u-small95 course-articles" style="width: 80%;margin-left: 10%;background-image:url({{url((fix($uni->logo))??iph())}});">
            <div class="col pl-0 pl-md-3 search-grad">
              <h6 class="u-lrm">

                <a href="{{url('university/'.$uni->slug)}}">{{$uni->name}}</a>

              </h6>
              <div class="text-muted small">
                @php
                $ranking = ($uni->ranking!==null)?explode('.', $uni->ranking):0;
                @endphp
                @if($ranking[0]!==0) @for($i=0; $i<(int)$ranking[0]; $i++) <i class="fa fa-star" style="color:#c52228;"></i>
                  @endfor @endif
                  @if(isset($ranking[1]) && $ranking[1]>=5)
                  <i class="fa fa-star-half" style="color:#c52228;"></i>
                  @endif
                  <span style="display:block;">{{$uni->city.', '.$uni->country}}</span>
                  <div class="mt-4"> Total Courses {{count($uni->courses)}}</div>
              </div>

            </div>
          </article>
          @endforeach

        </section>
        <div class="text-center mb-4">
          <a class="btn btn-primary" href="{{url('institutions')}}" style="color:white!important;">View more universities</a>
        </div>
      </section>

    </aside>
  </div>



</div>


@endsection