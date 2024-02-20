@extends('layouts.frontend')
@section('title',(isset($data['seo']->meta_title))?$data['seo']->meta_title:'Course')
@section('seo')
  @isset($data['seo']->show_meta)
  <meta name="keywords" content="{!!$data['seo']->meta_keywords or ''!!}">
  <meta name="description" content="{!!$data['seo']->meta_description or ''!!}">
  @endisset
@endsection
@section('customStyles')
<style>
  {{-- {!! $data['custom_css'] !!} --}}
</style>
@endsection
@section('content')

  {{-- <div id="main-content"></div> --}}
  <div class="page">
      <section class="main__container">
            <div class="banner-slide">
               <img src="{{asset('assets_frontend/img/banner1.jpg')}}" alt="Chinese Program">
               <div class="container">
                  <div class="caption-text">
                     <h1 id="leaders" class=""><span class="text-white">Chinese Program</span></h1>
                     
                     <a href="#more" class="hero__welcome action__welcome">
                        Apply Now
                     <span class="hero__welcome__icon scdown svgstore svgstore--Caret-down">
                       <i class="fas fa-chevron-down"></i>                      
                     </span>               
                  </a>
                  </div>
               </div>
            </div>
            <!-- <div class="module--arrow-green module--spacing">
               <div class="container container--clear">
                  <h1 id="leaders" class=""><span class="text-white">Chinese Program</span></h1>
                  <div class="container--slim">
                     <p class="serif-xlarge-alt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer efficitur faucibus consequat. Pellentesque suscipit tristique risus ut fringilla. Curabitur pharetra hendrerit orci.
                     </p>
                  </div>
                  <a href="#more" class="hero__welcome action__welcome">
                     Apply Now
                     <span class="hero__welcome__icon scdown svgstore svgstore--Caret-down">
                       <i class="fas fa-chevron-down"></i>                      
                     </span>
                     
                  </a>
               </div>
            </div> -->
            <div id="more" class="container">
               <div class="">
                  <div class="main__sidebar">
                      <div class="ous-p-callout-snapshot module--gray feature feature--noborder feature--callout">
                        <div class="feature__content">
                           <div class="ous-p-callout-snapshot__title h3">Program Snapshot</div>
                           <dl class="ous-p-callout-snapshot__text inline-definition-list">
                              <div class="ous-p-callout-snapshot__pair">
                                 <dt class="ous-p-callout-snapshot__key h4 text-black caps">Program type:</dt>
                                 <dd class="ous-p-callout-snapshot__value sans-serif">Certificate - Graduate</dd>
                              </div>
                              <div class="ous-p-callout-snapshot__pair">
                                 <dt class="ous-p-callout-snapshot__key h4 text-black caps">Format:</dt>
                                 <dd class="ous-p-callout-snapshot__value sans-serif">On-campus or online</dd>
                              </div>
                              <div class="ous-p-callout-snapshot__pair">
                                 <dt class="ous-p-callout-snapshot__key h4 text-black caps">Est. time to complete:</dt>
                                 <dd class="ous-p-callout-snapshot__value sans-serif">2 years</dd>
                              </div>
                              <div class="ous-p-callout-snapshot__pair">
                                 <dt class="ous-p-callout-snapshot__key h4 text-black caps">Credit hours:</dt>
                                 <dd class="ous-p-callout-snapshot__value sans-serif">13</dd>
                              </div>
                           </dl>
                        </div>
                     </div>
                  </div>
                  <div class="main__content content ncontent" role="main">
                     <h1>Apply: Freshmen and First-Year Students</h1>
                     <p class="serif-xlarge text-primary">Ready to become the next generation of leaders? It's easy. You can apply in 4 steps!</p>
                     
                     <div class="ou-form">
                        <div id="status_bf5e7913-bdb2-4a99-8d1f-5c95baf33575"></div>
                        <form id="" name="contact-form" class="form " autocomplete="off">
                           
                           
                           <div  class="form-group">
                              <label class="form__label">First Name<span class="label__required">*</span>
                              </label>
                                 <input type="text" name="firstname" placeholder="" class="form__input" required="">
                           </div>
                           
                           <div class="form-group">
                              <label class="form__label">Last Name<span class="label__required">*</span>
                              </label>
                              <input type="text" name="lastname" id="id_lastname" placeholder="" class="form__input" required="">
                           </div>
                           
                           <div class="form-group">
                              <label class="form__label">Email Address<span class="label__required">*</span></label>
                              <input type="email" name="emailaddress" placeholder="" class="form__input" required="">
                           </div>

                           <div class="form-group">
                              <label class="form__label">Your Message<span class="label__required"></span></label>
                              <textarea row="3" class="form__input"></textarea>
                             <!--  <input type="email" name="emailaddress" placeholder="" class="form__input" required=""> -->
                           </div>
                           
                           <button type="submit" class="button form__button"> Submit </button>&nbsp; 
                           <button type="reset"  class="button form__button">Clear</button>
                        </form>
                     </div>
                     
                  </div>

               </div>

            </div>
         </section>
  </div>
  <div style="clear: both;"></div>

@endsection