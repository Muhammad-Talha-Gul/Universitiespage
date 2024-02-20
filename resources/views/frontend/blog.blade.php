@extends('layouts.frontend')
@section('title',(isset($data['seo']->meta_title))?$data['seo']->meta_title:'Blog')
@section('seo')
  @isset($data['seo']->show_meta)
  <meta name="keywords" content="{!!$data['seo']->meta_keywords or ''!!}">
  <meta name="description" content="{!!$data['seo']->meta_description or ''!!}">
  @endisset
@endsection
@section('customStyles')
<style type="text/css">
  {{-- {!! $data['custom_css'] !!} --}}
</style>
@endsection
@section('content')

  {{-- <div id="main-content"></div> --}}
  <div class="page">
      <section class="main__container">
            <div class="banner-slide">
               <img src="{{ asset('assets_frontend/img/banner1.jpg') }}" alt="blog">
               <div class="container">
                  <div class="caption-text">
                     <h1 id="leaders" class=""><span class="text-white">Blog</span></h1>
                     <a href="#more" class="hero__welcome action__welcome" style="visibility: 
                     hidden;">
                       Login 
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

         <section class="mb50">
          <div class="container">
            <div class="events-listing__events block-group content">  
               <a href="{{url('blog-detail')}}" class="lw_event_item lw_event__item">
                  <div class="lw_event_item_image lw_event__img"> 
                  <img alt="Universities Page " class="img_huge" src="{{ asset('assets_frontend/img/bl1.jpg') }}" width="330" height="220"> </div>
                  <div class="lw_event_info">
                     <span class="lw_event__title">Convocation Ceremony</span> 
                     <p class="lw_event__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eleifend velit in sagittis interdum. Pellentesque lobortis tortor at metus gravida auctor...</p>
                     <span class="lw_event__date"> Wednesday, June 19, 2019 </span> <span class="lw_event__time"> 11:00 AM </span> 
                  </div>
               </a>  
                <a href="{{url('blog-detail')}}" class="lw_event_item lw_event__item">
                  <div class="lw_event_item_image lw_event__img"> 
                  <img alt="Universities Page " class="img_huge" src="{{ asset('assets_frontend/img/bl2.jpg') }}" width="330" height="220"> </div>
                  <div class="lw_event_info">
                     <span class="lw_event__title">Law Student Orientation</span> 
                     <p class="lw_event__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eleifend velit in sagittis interdum. Pellentesque lobortis tortor at metus gravida auctor...</p>
                     <span class="lw_event__date"> Wednesday, June 19, 2019 </span> <span class="lw_event__time"> 11:00 AM </span> 
                  </div>
               </a> 
               <a href="{{url('blog-detail')}}" class="lw_event_item lw_event__item">
                  <div class="lw_event_item_image lw_event__img"> 
                  <img alt="Universities Page " class="img_huge" src="{{ asset('assets_frontend/img/bl3.jpg') }}" width="330" height="220"> </div>
                  <div class="lw_event_info">
                     <span class="lw_event__title">Welcome Social </span> 
                     <p class="lw_event__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eleifend velit in sagittis interdum. Pellentesque lobortis tortor at metus gravida auctor...</p>
                     <span class="lw_event__date"> Wednesday, June 19, 2019 </span> <span class="lw_event__time"> 11:00 AM </span> 
                  </div>
               </a>  
               <a href="{{url('blog-detail')}}" class="lw_event_item lw_event__item">
                  <div class="lw_event_item_image lw_event__img"> 
                  <img alt="Universities Page " class="img_huge" src="{{ asset('assets_frontend/img/bl4.jpg') }}" width="330" height="220"> </div>
                  <div class="lw_event_info">
                     <span class="lw_event__title">Welcome Social</span> 
                     <p class="lw_event__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eleifend velit in sagittis interdum. Pellentesque lobortis tortor at metus gravida auctor...</p>
                     <span class="lw_event__date"> Wednesday, June 19, 2019 </span> <span class="lw_event__time"> 11:00 AM </span> 
                  </div>
               </a> 
            </div>
          </div>
         </section>
  </div>
   <div style="clear: both;"></div>

@endsection