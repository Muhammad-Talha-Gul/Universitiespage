@if(isset($meta['style']))
@if($meta['style'] == 'style1')
  <section class="main__container {{$meta['class'] or ''}}">
      <div class="banner-slide">
         <img src="{{(isset($meta['image']))?url(fix($meta['image'])):iph()}}">
         <div class="container">
            <div class="caption-text">
             <h1 id="leaders" class="">
                  <span class="text-white">
                    @if($blog!==null)
                      {{(isset($blog->title))? $blog->title : $blog->name}}
                    @elseif(isset($_GET['about']))
                      {{$_GET['about']}}
                    @else
                      {{$meta['title'] or ''}}
                    @endif
                  </span>
                  @if(in_array(request()->path(), pluckBlog()))<strong class="cadmin">By {{getAuthorName($blog->user_id)}}</strong>@endif

              </h1>
               <a href="#more" class="hero__welcome action__welcome" @if(request()->path() == 'our-consultants' )  @else style="visibility:hidden; @endif">
                 View List 
               <span class="hero__welcome__icon scdown svgstore svgstore--Caret-down">
                 <i class="fas fa-chevron-down"></i>                      
               </span>               
            </a>

            </div>
         </div>
      </div>

      <div id="more" class="container">
            
        
      </div>
  </section>
@elseif($meta['style'] == 'style2')

  {{-- <section class="bg-primary text-white {{$meta['class'] or ''}}">
     <div class="row no-gutters">
        <div class="col-md" data-aos="flip-right" data-aos-duration="4000">
           <img class="img-fluid" alt="{!! $meta['title'] or '' !!}" src="{{(isset($meta['image']))?url(fix($meta['image'])):iph()}}" width="1000" height="620" alt="Uni team">
        </div>
        <div class="col-md o-flex-center" data-aos="flip-left" data-aos-duration="4000">
           <div class="p-4 p-md-5">
              <h3>{!! $meta['title'] or '' !!}</h3>
              <p>{!! $meta['text'] !!}</p>
              <p>{{ ($meta['sub_title'])??'' }}<br><small>{{($meta['text2'])??''}}</small></p>
           </div>
        </div>
     </div>
  </section> --}}

{{--   <section class="cus-ourteam bg-primary text-white {{$meta['class'] or ''}}" data-aos="flip-left" data-aos-duration="4000">
     <div class="row no-gutters" style="background-image:url({{(isset($meta['image']))?url(fix($meta['image'])):iph()}});">
        <div class="col-md o-flex-center blackout">
           <div class="p-4 p-md-5" align="center">
              <h3 class="team-title">{!! $meta['title'] or '' !!}</h3>
              <p class="team-para">{!! $meta['text'] !!}</p>
              <p class="team-sub">{{ ($meta['sub_title'])??'' }}<br><small>{{($meta['text2'])??''}}</small></p>
           </div>
        </div>
     </div>
  </section> --}}


  <!-- /* ..................Our Team Section Start............. */ -->


<div class="container-fluid OurTeamsection">
<div class="container">
  <div class="row">

    <div class="col-lg-3  ourteamcol">
      <h2>{!! $meta['title'] or '' !!}</h2>
    </div>

    <div class="col-lg-9 col-md-12 UniversitiesPageTeamcol">
      <p>{!! $meta['text'] !!}</p>
      <h3>{{ ($meta['sub_title'])??'' }}</h3>
      <h6>{{($meta['text2'])??''}}</h6>
    </div>

  </div>
</div>
</div>


<!-- /* ..................Our Team Section End............. */ -->


@endif
@endif