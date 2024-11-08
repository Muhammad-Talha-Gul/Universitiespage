<footer class="footersection">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="footer-left-main">
          <div class="footer-logo-block">
            <img alt="Universities Page Logo" class=" footer-logo img-fluid" src="{{ url('/filemanager/photos/1/thumbs/unipage_logo_2.png') }}" alt="">
          </div>
          <p class="footer-paragraph">Sunrise international education consultancy private limited built the Universities Page app as a Free app. This SERVICE is provided by sunrise international education consultancy private limited at no cost and is intended for use as is.</p>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <select class="select required span6 search-university-footer footer-select" id="footer_site_menu">
              <option>Select Universities</option>
              @foreach(getAllUniversity() as $nui)
              <option value="{{$nui->slug}}">{{$nui->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-lg-6">
            <select class="select required span6 search-subject-footer footer-select" id="customer_service_pickup2" name="customer_service[pickup]">
              <option>Select Subjects</option>
              @foreach(subjects() as $sub)
              <option value="{{$sub->id}}">{{$sub->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="ol-xs-12 col-sm-6 col-md-3 col-lg-3 footercol2">
        <h3 class="footer-heading">{{(getFooterMeta()[0]['title'])??''}}</h3>
        <ul>
          @isset(getFooterMeta()[0]['menu'])
          @foreach(getMenuById(getFooterMeta()[0]['menu']) as $menu)
          <li><a href="{{url(($menu->url)??'#.')}}">{{($menu->title)??''}}</a></li>
          @endforeach
          @endif
        </ul>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 footercol3">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 footer-right-sub-column">
            <h3  class="footer-sub-heading">{{(getFooterMeta()[2]['title'])??''}}</h3>
            @isset(getFooterMeta()[2]['menu'])
            @foreach(getMenuById(getFooterMeta()[2]['menu']) as $menu)
            <a href="{{url(($menu->url)??'#.')}}">{{($menu->title)??''}}</a>
            @endforeach
            @endif
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 footer-right-sub-column">
            <h3 class="footer-sub-heading">Privacy Policy</h3>
            <a href="https://universitiespage.com/privacy-policy">Privacy Policy</a>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 footer-right-sub-column">
            <h3  class="footer-sub-heading">FeedBack</h3>
            <a href="{{ route('feedback') }}">Feedback Form</a>
          </div>
        </div>
        <hr class="hr1">
        <h3 class="footer-sub-heading">Follow us</h3>
        <ul class="social-list">
          @foreach(getSocialMeta() as $key => $social)
          @if($social!==null)
          <li>
            <a href="{{($social)??''}}" title="Facebook">
              <i class="fa fa-{{$key}} u-text-{{$key}}"></i>
            </a>
          </li>
          @endif
          @endforeach
          <li><a href="https://whatsapp.com/channel/0029Va7vJOYJkK79737At844" title="whatsapp">
              <i class="fa fa-whatsapp u-text-whatsapp"></i>
            </a>
          </li>
        </ul>
        <a href="https://play.google.com/store/apps/details?id=com.universitiespage" target="_blank">
          <img class="img-fluid" src="{{ url('/public/google-play.png') }}" alt="university page app">
        </a>
      </div>
    </div>
    <div class="emailsection mt-4">
      <div class="text-center">
        <ul>
          <li class="pl-0"><a class="emailp" href="mailto:admission@universitiespage.com"><span class="email-span">Email:</span><b> admission@universitiespage.com</b></a></li>
          <li><a class="projectp emailp" href="https://www.universitiespage.com" target="_blank"><span class="email-span">visit website:</span><b><b>www.universitiespage.com</b></a></li>
        </ul>
      </div>
    </div>
    <div class="row footerlastrow">
     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-2 country-column">
        <h3  class="footer-sub-heading mb-3">Lahore Addres</h3>
        <p>Universities Page,2nd Floor faisal bank,Raja Market,Garden town,Lahore,Pakistan</p>
        <p>Phone:0324 3640038</p>
        <p>Phone:0333 0033235</p>
        <p>Phone:0310 3162004</p>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-2 country-column">
        <h3  class="footer-sub-heading mb-3">Islamabad Address</h3>
        <p>Universities Page, Punjab market,Venus Plaza, 1st Floor, Office No. 1, Sector G13/4,Islamabad</p>
        <p>Phone:0335 9990308</p>
        <p>Phone:0310 3172004</p>
        <p>Phone:0300 4010286</p>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 country-column">
        <h3  class="footer-sub-heading mb-3">Karachi Address</h3>
        <p>Universities Page,1st floor, Amber Estate, Shahrah-e-Faisal Rd, Bangalore Town Block A Shah, Karachi, Sindh</p>
        <p>Phone:0310 6225430</p>
        <p>Phone:0310 6225408</p>
        <p>Phone:0310 6225410</p>
      </div>
     
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 country-column">
        <h3  class="footer-sub-heading mb-3">Thailand Address</h3>
        <p>70 Young Pl Alley, Khwaeng Khlong Toei Nuea, Watthana, Krung Thep Maha Nakhon ,Thailand.</p>
        <p>Email:Thailand@universitiespage.com</p>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-2 country-column" >
        <div class="footer-colmun-main">
        <h3  class="footer-sub-heading mb-3">China Address</h3>
        <p>Universities Page,East road of Madian plaza, Hai Dian District, Beijing, China</p>
        </div>
      </div>
    </div>
  </div>
  <!-- <hr class="hr3"> -->
  <div class="copyright-main">
    <p class="copy-right-paragraph"> Copyright© Universities Page. All rights reserved.</p>
  </div>
</footer>
<style>
  .wwwa__brand {
    font-size: 0px !important;
  }

  .widget-header {
    background: #0B6D76 !important;
  }

  .ayoan_whatsapp_chatbox .widget-body .body-content .user-list .ayoan_item.active {
    border-left: 3px solid #0B6D76 !important;
  }
  @media (min-width: 1200px) and (max-width: 2400px) {
.footer-colmun-main{
    max-width: max-content;
    margin-left: auto;
}
  }
  .footerlastrow p {
    font-size: 15px;
  }
</style>





<div id="example"></div>