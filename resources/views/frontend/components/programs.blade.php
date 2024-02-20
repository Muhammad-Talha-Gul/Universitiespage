@if(isset($meta['style']))
@if($meta['style'] == 'style1')


@elseif($meta['style'] == 'style2')

<section class="o-ad-banner text-center">

  {{-- <div class="slideshow-container">--}}
  {{-- {{dd('umair')}}--}}
  {{-- @if(isset($meta['slider']))--}}
  {{-- @php--}}
  {{-- $slider_meta = json_decode(getSliderByName($meta['slider'])->meta, true);--}}
  {{-- @endphp--}}
  {{-- @if(count($slider_meta)>0)--}}
  {{-- @for($i=0; $i<count($slider_meta['image']); $i++)--}}
  {{-- <div class="mySlides fade">--}}
  {{-- <img alt="univeristy page" src="{{ url(($slider_meta['image'][$i])??'#') }}"
  style="width:100%">--}}
  {{-- <div class="text">{!! ($slider_meta['title'][$i])??'#' !!}--}}
  {{-- <br><span>{!! ($slider_meta['text'][$i])??'#' !!}</span>--}}
  {{-- <br><span class="f-ab">{!! ($slider_meta['btn'][$i])??'#' !!}</span>--}}
  {{-- </div>--}}
  {{-- </div>--}}
  {{-- @endfor--}}
  {{-- @endif--}}
  {{-- @endif--}}

  {{-- </div>--}}
  <div class="slideshow-container slider--space--fix">
    {{-- {{dd($meta)}}--}}
    <!-- ..................Home herro Section Start............. -->

    <div class="herrobgimg">
      <div class="overlay11">
        <div class="centertextdiv banner-content">
          <!-- banner contant start -->
          <div class="banner-contant-main">
            <h4 class="banner-sub-heading">Want To</h4>
            <h1 class="banner-heading">Study Abroad ?</h1>
            <p class="banner-description">Find the perfect courses and universities to <br> meet your
              education goals</p>
            <a href="<?php echo url('institutions') ?>" class="btn-uni">Universities</a>
          </div>
          <!-- banner contant end -->

          <!-- banner search start -->
          <div class="row searchdiv_row">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 search-column">
              <div class="searchone_opti">
                <select v-model="location" id="search_type_value_select" class="form-control heroinput">
                  <option id="empty">Search For</option>
                  <option value="university">University</option>
                  <option value="course">Course</option>
                </select>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 search-column">
              <div class="searchtwo_opti">
                <select v-model="location" id="search_comp_value_select" class="form-control input-sm heroinput">
                  <option id="Country">Select Country</option>
                  <?php $c = allCountry() ?>
                  @foreach($c as $val)
                  <option value="{{$val->country}}">{{$val->country}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 search-column">
              <div class="searchthree_opti">
                <input type="text" class="form-control heroinput" id="search_comp_value" placeholder="Search university and course" autocomplete="off" data-autoselect="desktop">
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 search-column">
              <div class="searchfour_opti search-button">
                <span onclick="search_comp_home()" style="background: white; cursor: pointer;" class="btn heroformsubmit"><i class="fa fa-search c-pulsate-infreq"></i></span>
                </button>
              </div>
            </div>
            
          </div>
          <!-- banner search end -->
        </div>
      </div>
    </div>


    <!-- ..................Home herro Section End............. -->




    <!-- <script>
      window.onscroll = function() {
        myFunctionsticky();
      };

      var navbarstickyone = document.getElementById("navbarsticky");
      var sticky_check = navbarstickyone.offsetTop;
      function myFunctionsticky() {
        if (window.pageYOffset >= sticky_check) {
          navbarstickyone.classList.add("stickynavstylye")
        } else {
          navbarstickyone.classList.remove("stickynavstylye");
        }
      }
    </script> -->


    @push('scripts')
    <script>
      function search_comp_home() {
        var search_comp_value = document.getElementById("search_comp_value").value;
        var search_comp_value_select = document.getElementById("search_comp_value_select").value;
        var search_type_value_select = document.getElementById("search_type_value_select").value;

        if (search_comp_value == '' && search_comp_value_select == 'Select Country' || search_type_value_select ==
          'empty') {
          document.getElementById("search_comp_value").style.border = "2px solid red";
        } else {
          window.location.href = "https://universitiespage.com/search?page=1&location=" +
            search_comp_value_select + "&search=" + search_comp_value + "&type=" + search_type_value_select +
            "";
        }
      }


      $(document).ready(function() {
        $(document).on('keyup', '.uni-search', function() {
          var val = $(this).val();
          var baseUrl = '{{url(' / ')}}';
          if (val !== '') {
            $.ajax({
              url: '{{url("get-university-list")}}',
              type: 'POST',
              dataType: 'json',
              data: {
                'search': val,
                _token: '{{csrf_token()}}'
              },
              success: function(uni) {
                var html = ``;
                for (var i = uni.length - 1; i >= 0; i--) {
                  html +=
                    `<a class="d-block c-highlightLink list-uni" href="` +
                    baseUrl + '/university/' + uni[i]['slug'] + `">` + uni[
                      i]['name'] + `</a>`;
                }
                $('.search-uni').html(html);
                $('.search-uni').removeClass('d-none');
                if (uni.length == 0) {
                  $('.search-uni').addClass('d-none');
                }
              }
            })
          } else {
            $('.search-uni').html('');
            $('.search-uni').addClass('d-none');
          }
        });
      });
    </script>
    @endpush






  </div>

</section>
@endif
@endif