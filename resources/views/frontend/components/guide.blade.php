<div class="section paddingbot-clear mb-3">
   <div class="container">
      <div class="top-description-container ">
         <p class="top-description">
            Looking for help to choose Countries and their admission process. We will give you detail information here.
         </p>
      </div>
   </div>
</div>
<div class="clearfix"></div>


<div class="container-fluid">
   <div class="gide-top-image-container">
      <img src="{{ url('/filemanager/photos/1/new_style') }}/gide-banner.jpg" width="100%" class="guide-banner-image">
   </div>
</div>

@if(isset($meta['university']))
<div class="container-fluid py-5 mb-5">
   <section class="container">
      <!-- <h2 class="h4 gide-heading">{{($meta['title1'])??''}}</h2> -->
      <div class="po_un_col1 mb-5 text-center">
         <h3 class="section-heading ">Countries
            <span>Guides</span>
         </h3>
      </div>
      <div class="card-columns text-center">
         @foreach(getGuide('university') as $guide)

         <a href="{{url(('guides/'.$guide->slug)??'#')}}">
            <article class="card gide-card">
               <div class="guide-card-image-main">
                  <img class="card-img-top" src="{{url((fix($guide->image))??iph())}}" data-echo="{{url((fix($guide->image))??iph())}}" alt="{{($guide->title)??''}}">
               </div>
               <div class="p-2 headingguide">{{($guide->title)??''}}</div>
            </article>
         </a>

         @endforeach
      </div>
   </section>
</div>
@endif
@if(isset($meta['subject']))
<section class="container c-bulletLists mb-5">
   <!-- <h2 id="subject" class="h4 gide-heading">{{($meta['title2'])??''}}</h2> -->
   <div class="po_un_col1 mb-5 text-center">
      <h3 class="section-heading ">Subject
         <span>Guides</span>
      </h3>
   </div>
   <div class="o-2colLayout">
      <ul class="o-2colLayout-content c-lg-colCount-2">

         @foreach(getGuide('subject') as $guide)
         @if(isset($guide->subject))
         <li><a href="{{url(('guides/'.$guide->slug)??'#')}}">{{($guide->subject->name)??''}}</a></li>
         @endif
         @endforeach
      </ul>
   </div>
</section>
@endif