@extends('layouts.frontend')
@section('title',(isset($data['seo']->meta_title))?$data['seo'] ->meta_title :$data->name.' '.$data->qualificationName->title.' in '.$data->university->name.' ')
@section('seo')
<meta name="description" content="{!! !empty(strip_tags($data->about)) ? strip_tags($data->about) : $data->name.' '.$data->qualificationName->title.' course is offered in '.$data->university->name.' '.$data->university->country.' with the duration of  '.$data->duration.', taught in '.$data->languages.'. The tuition fees are '.$data->yearly_fee.'$ yearly and admission intake is '.$data->university->intake.'.'!!}">

@endsection



@section('content')

<!-- <div class="Milanbgimg herrobgimg" @if($data->feature_image!==null) style="background-image: url({{ url((fix($data->university->logo))??iph()) }});" @endif>
  <div class="Milanbgimgoverly overlay11 course-detail-overlay">
    <div class="centered2 centertextdiv banner-content">
      <div class="banner-contant-main">
        <h1 class="banner-heading">{{($data->name)??''}} </h1>
        <p class="banner-description">({{($data->qualificationName->title)??''}})</p>
        <button class="btn Milanbtn1 course-banner-button btn-uni" onclick="send_emailcontat()" style="cursor: pointer;">Admission Request</button>
        <button class="btn Milanbtn2 course-banner-button btn-uni" onclick="consulation()" style="cursor: pointer;">Free Consultation</button>
      </div>
    </div>

  </div>
</div> -->

<div class="container p-0 mt-2" style="position: relative;">
  <div class="Milanbgimg details-overlay university-details-banner p-0" @if($data->feature_image !== null)
    style="background-image: url({{ url((isset($data->feature_image['image'][0])) ? fix($data->feature_image['image'][0]) : fix($data->logo)) }});"
@elseif($uniData->feature_image !== null)
    style="background-image: url({{ url(fix($uniData->feature_image)) }});"
@endif>
    <div class="course-detail-overlay university-details-overlay">
      <div class="centered2 centertextdiv banner-content">
        <div class="banner-contant-main">
          <h1 class="banner-heading">{{($data->name)??''}} </h1>
          <p class="banner-description" style="color: #000;">({{($data->qualificationName->title)??''}})</p>
          <button class="btn Milanbtn1 course-banner-button btn-uni" onclick="send_emailcontat()" style="cursor: pointer;">Admission Request</button>
          <button class="btn Milanbtn2 course-banner-button btn-uni" onclick="consulation()" style="cursor: pointer;">Free Consultation</button>
        </div>
      </div>
    </div>
  </div>
</div>


<header class="header course-details-header pt-5">
  <div class="container">
    <div class="course-header-main">
    <div class="course-logo" @if($data->feature_image !== null)
        style="background-image: url('{{ url((fix($data->feature_image)) ?? iph()) }}');"
        @else
        style="background-image: url('{{ url((fix($data->university->logo)) ?? iph()) }}');"
        @endif
        ></div>
      <div class="course-header-left">
        <div class="course-heading-main">
          <a href="{{url('university/'.$data->university->slug)}}" class="course-header-link">{!! $data->university->name !!} </a>
        </div>
        @php
        $ranking = ($data->university->ranking!==null)?explode('.', $data->university->ranking):0;
        @endphp
        @if($ranking[0]!==0) @for($i=0; $i<(int)$ranking[0]; $i++) <i class="fa fa-star"></i>
          @endfor @endif
          @if(isset($ranking[1]) && $ranking[1]>=5)
          <i class="fa fa-star-half"></i>
          @endif
          <p class="course-header-paragraph">
            {{$data->university->city}}, {{$data->university->country}}
          </p>
          <div class="apply-button-main  pb-3">
      <div class="applybtn-course-detail">
        @if(auth()->check() && auth()->user()->user_type == 'student')
        <div class="apply-btn">
          <a href="{{url('apply-for-course/'.$data->id)}}" style=" background-color: red; color: #fff !important; " class="btn py-1 hover border-o c-actionBtn"><i class="fa fa-wpforms"></i> Apply</a>
        </div>
        @elseif(auth()->check() && auth()->user()->user_type !== 'student')
        <div class="apply-btn">
          <span class="other-user-status">Login as student first</span>
          <a href="javascript:void(0)" style=" background-color: red; color: #fff !important; " class="other-user btn py-1 hover border-o c-actionBtn"><i class="fa fa-wpforms"></i> Apply</a>
        </div>
        @else
        <div class="apply-btn">
          <a href="javascript:void(0)" style=" background-color: red; color: #fff !important;" data-toggle="modal" data-target="#login_model" class="btn py-1 hover border-o c-actionBtn"><i class="fa fa-wpforms"></i> Apply</a>
        </div>
        @endif
        @if(auth()->check() && auth()->user()->user_type == 'student')
        <form class="save-for-later-form" action="{{route('addToWishlist')}}" method="post" @submit="addToWishlist($event)" style="width: 227px;">
          {{csrf_field()}}
          <button type="submit" class="btn py-1 hover border-o c-actionBtn mt-1" style="position: relative;">
            <i class="fa fa-heart"></i> Save <div class="wishlist-status" style="font-size: 12px;color: rgb(197, 34, 40);position: absolute;bottom: 8px;width: 100%;left: 93px;display:none;"></div>
          </button>
          <input type="hidden" value="{{$data->id}}" name="course_id">
        </form>
        @endif
      </div>
    </div>
      </div>
      <div class="course-header-right c-actionBtn-group ">
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url('courses/'.$data->id)}}/" class="o-titledIcon is-md-stacked u-smd-w100 btn c-actionBtn course-header-icon">
          <i class="fa fa-fw fa-lg fa-facebook"></i>
        </a>
        <a target="_blank" href="https://twitter.com/home?status={{url('courses/'.$data->id)}}/" class="o-titledIcon is-md-stacked u-smd-w100 btn c-actionBtn course-header-icon">
          <i class="fa fa-fw fa-lg fa-twitter"></i>
        </a>
        <a target="_blank" href="https://wa.me/?text={{url('courses/'.$data->id)}}" class="o-titledIcon is-md-stacked u-smd-w100 btn c-actionBtn course-header-icon">
          <i class="fa fa-fw fa-lg fa-whatsapp"></i>
        </a>
        {{-- <a  onclick="consulation()" class="o-titledIcon is-md-stacked u-smd-w100 btn c-actionBtn course-header-icon">--}}
        {{-- <i class="fa fa-fw fa-lg fa-whatsapp"></i>--}}
        {{-- </a>--}}
      </div>
    </div>
   
  </div>
</header>

<main class="o-2colLayout mb-sm-5">
  <article class="o-2colLayout-content">
    <style type="text/css">
      @media screen and (max-width: 600px) {
        .Accommodationdiv p {
          font-size: 15px;
          text-align: left;
        }
      }

      @media screen and (max-width: 450px) {
        .Accommodationdiv p {
          font-size: 13px;
          text-align: left;
        }
      }
    </style>
    <section class="table-section py-5">
      <div class="container">
        <div class="border textdivcolcss">
          <div class="row mb-3">
            <div class="col-lg-3 col-md-3 col-6">
              <div class="border mb-3  Accommodationdiv">
                <p><i class="fa fa-fw fa-graduation-cap"></i> Qualification</p>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-6">
              <div class="border Accommodationdiv">
                <p>{{($data->qualificationName->title)??''}}</p>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-3 col-md-3 col-6">
              <div class="border mb-3  Accommodationdiv">
                <p><i class="fa fa-fw fa-clock-o"></i> Subject</p>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-6">
              <div class="border Accommodationdiv">
                <p>{{($data->subject->name)??''}}</p>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-3 col-md-3 col-6">
              <div class="border mb-3  Accommodationdiv">
                <p><i class="fa fa-fw fa-calendar"></i> Duration</p>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-6">
              <div class="border Accommodationdiv">
                <p>{{($data->duration)??''}}</p>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-3 col-md-3 col-6">
              <div class="border mb-3  Accommodationdiv">
                <p><i class="fa fa-fw fa-sign-in"></i> Intakes</p>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-6">
              <div class="border Accommodationdiv">
                <p>{{($data->university->intake)??''}}</p>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-3 col-md-3 col-6">
              <div class="border mb-3  Accommodationdiv">
                <p><i class="fa fa-fw fa-sign-in"></i> Languages</p>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-6">
              <div class="border Accommodationdiv">
                <p>{{($data->languages)??''}}</p>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-3 col-md-3 col-6">
              <div class="border mb-3  Accommodationdiv">
                <p><i class="fa fa-dollar rustom-class"></i> Tuition fee</p>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-6">
              <div class="border Accommodationdiv">
                <p>${{(isset($data->yearly_fee))?$data->yearly_fee:'Contact the university / institute'}}</p>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-3 col-md-3 col-6">
              <div class="border mb-3  Accommodationdiv">
                <p><i class="fa fa-fw fa-credit-card"></i> Scholarship</p>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-6">
              <div class="border Accommodationdiv">
                <p>{{($data->scholarship==1)?'Available':'Not Available'}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="entry-section">
      <div class="container">
        <div class="details-top-container">
          <div class="corse-details-bar c-heading-bar  mb-3">
            <h4 class="h4 bar-heading">Entry Requirements</h4>
          </div>
          {!! ($data->entry_requirments)??'' !!}
        </div>
      </div>
      <div class="course-slider-main py-5">
        <div class="container">
          <h6 class="text-center h4 related-course-heading">Other Related Courses</h6>
          <div class="row">
            @foreach($getrandcourses as $course)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mb-3 course-details-column">
              <div class="card course-details-slide-card text-center">
                <a href="{{url('courses/'.$course->id)}}">
                  <div class="course-slider-image-container">
                    <img class="img-fluid course-details-slide-image" src="{{url((fix($course->logo, 'thumbs')))??iph()}}" alt="university page" alt="">
                  </div>
                  <h6 class="course-details-card-heading">{{$course->name}}</h6>
                </a>
                <p>
                  <i class="fa fa-home"></i> <span>{{$course->unvname}} <br><i class="fa fa-map-marker"></i> {{$course->city}}, {{$course->country}}</span>
                </p>
              </div>
            </div>
            @endforeach
          </div>
          <div class="mt-5 text-center pt-5 pb-3">
            <a class="btn btn-primary more-link" href="{{url('search?page=1&limit=14&scholarship=2&type=course&guide=university,subject&qualification=1')}}">View more Courses</a>
          </div>
        </div>
      </div>
    </section>
  </article>
</main>
<div class="modal student-login-model" style="padding-top: 117px;">
  <!-- Modal content -->
  <div class="modal-content student_login">
    <div class="">
      <h3 style="margin: 0px;margin-bottom:20px;">Student Login</h3>
      <form class="login-student" method="POST">
        {{csrf_field()}}
        <div class="col-full">
          <div class="form-group" style="position: relative;">
            <label class="form__label">Email Address<span class="label__required">*</span></label>
            <input type="email" name="email" placeholder="" value="{{old('email')}}" class="form__input" required="">
            <div id="ResetMsg" style="font-size: 11px;color: red;position: absolute;bottom: -13px"></div>
          </div>
        </div>
        <div class="col-full">
          <div class="form-group">
            <label class="form__label">Password<span class="label__required">*</span></label>
            <input type="password" name="password" placeholder="" class="form__input" required="">
          </div>
        </div>
        <div class="col-full" style="margin-bottom: 10px;">
          <button type="submit" class="button form__button submit-btn" style="display:inline-flex;"> Submit </button>
          <a href="{{url('student-sign-up')}}" class="button form__button" style="display:inline-flex;"> Register </a>
          <button type="button" class="button form__button close" style="display:inline-flex;"> Close </button>
        </div>
      </form>
    </div>
  </div>
</div>
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
<!--- schema markup end   -->

@section('customScripts')
<script>
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.display === "block") {
        $(panel).slideUp(300, function() {
          $(panel).fadeOut(300);
        });
      } else {
        $(panel).slideDown(300, function() {
          $(panel).fadeIn(300);
        });
      }
    });
  }

  $(document).ready(function() {
    $(document).on('submit', '.login-student', function(e) {
      e.preventDefault();
      var data = $(this).serialize();
      $(this).find('.submit-btn').attr('disabled', true);
      $(this).find('.submit-btn').text('Submitting');
      var _this = $(this);
      setTimeout(function() {
        _this.find('.submit-btn').attr('disabled', false);
        _this.find('.submit-btn').text('Submit');
      }, 4000);
      $.ajax({
        url: '{{url("login")}}',
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function(data) {
          _this.find('.submit-btn').attr('disabled', false);
          _this.find('.submit-btn').text('Submit');
          if (data.type == 'student') {
            window.location.href = "{{url('apply-for-course/'.$data->id)}}";
          } else {
            window.location.href = data.url;
          }
        },
        error: function(data) {
          if (typeof data.responseJSON['errors']['email'][0] !== 'undefined') {
            _this.find("#ResetMsg").text(data.responseJSON['errors']['email'][0]);
          }
          _this.find('.submit-btn').attr('disabled', false);
          _this.find('.submit-btn').text('Submit');
        },
      })
    });


    $('.save-for-later').on('click', function() {
      $('.save-for-later-form').submit();
    })
    $('.save-for-later-form').on('submit', function(e) {
      e.preventDefault();
      var action = $(this).attr('action');
      var data = $(this).serialize();
      $.post(action, data, function(data) {
        if (data == 'success') {
          $('.wishlist-status').text('Successfully saved to wishlist');
          $('.wishlist-status').fadeIn(300).delay(5000).fadeOut(300);
        } else {
          $('.wishlist-status').text('Already in your wishlist');
          $('.wishlist-status').fadeIn(300).delay(5000).fadeOut(300);
        }
      })
    })
    $('.other-user').on('click', function() {
      $(this).parent().find('.other-user-status').fadeIn(300).delay(2000).fadeOut(300);
    });
  });
</script>

<script>
  function send_emailcontat() {


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
            url: '/sendbtnemail/<?php echo $data->id; ?>/courses',
            data: {},
            dataType: "json",
            success: function(data) {

              if (data.message == 'success') {

                swal("Success!", data.message_text, "success");

              } else if (data.message == 'login') {

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

              } else {

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