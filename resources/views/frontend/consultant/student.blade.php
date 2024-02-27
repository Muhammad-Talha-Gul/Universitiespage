@extends('layouts.frontend')
@section('title','Dashboard | University Page')
@section('customStyles')
<link rel="stylesheet" href="{{asset('assets_frontend/css/jquery-confirm.min.css')}}">
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">--}}
@endsection
@section('content')

@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@elseif(Session::has('error'))
<div class="alert alert-danger">{{Session::get('error')}}</div>
@endif


<div class="container" style="color:#464646;">

  <div class="">


    <div class="row">
      <div class="col-md-12">
        <div class="app-dash report-main">
          <!-- <h3><a href="{{url('search?page=1&limit=18&scholarship=2&star=5&languages=English,Chinese,chinese,Franch&qualification=1,2,3')}}"><u>Search/Apply other Universities</u></a><i class="fa fa-arrow-right"></i></h3> -->
          <h2 class="repost-heading">Student Report </h2>
          <!-- <i class="fa fa-edit" onclick="openCity(event, 'profile')"></i> -->
          <?php
          $photo_docs = json_decode($cstudent->photo_doc);
          $profilephoto = '';
          $i = 1;
          if ($photo_docs != '[]') {

            foreach ($photo_docs as $photo_doc) {
              if ($i = 1) {
                $profilephoto = $photo_doc;
              }
              $i++;
            }
          } else {
            $profilephoto = 'defualt.png';
          }
          ?>
          <div class="row">

            <style>
              .card {
                padding: 60px;
                border-radius: 5px;
                display: flex;
                flex-direction: column;
                align-items: center;
                box-shadow: rgba(0, 0, 0, 0.7);
                color: white;
              }

              .card__name {
                margin-top: 15px;
                font-size: 16px;
                font-weight: 400;
                color: white;
                text-align: center;
                color: red;
              }
              .card-name-span{
                color: #0B6D76;
                font-size: 20px;
                font-weight: 500;
                text-transform: capitalize;
              }
              .card__image {
                height: 160px;
                width: 160px;
                border-radius: 50%;
                border: 5px solid #0B6D76;
                margin-top: 20px;
                box-shadow: 0 10px 50px #0B6D76;
              }


              .draw-border {
                box-shadow: inset 0 0 0 4px #58cdd1;
                color: #58afd1;
                -webkit-transition: color 0.25s 0.0833333333s;
                transition: color 0.25s 0.0833333333s;
                position: relative;
              }

              .draw-border::before,
              .draw-border::after {
                border: 0 solid transparent;
                box-sizing: border-box;
                content: '';
                pointer-events: none;
                position: absolute;
                width: 0rem;
                height: 0;
                bottom: 0;
                right: 0;
              }

              .draw-border::before {
                border-bottom-width: 4px;
                border-left-width: 4px;
              }

              .draw-border::after {
                border-top-width: 4px;
                border-right-width: 4px;
              }

              .draw-border:hover {
                color: #ffe593;
              }

              .draw-border:hover::before,
              .draw-border:hover::after {
                border-color: #eb196e;
                -webkit-transition: border-color 0s, width 0.25s, height 0.25s;
                transition: border-color 0s, width 0.25s, height 0.25s;
                width: 100%;
                height: 100%;
              }

              .draw-border:hover::before {
                -webkit-transition-delay: 0s, 0s, 0.25s;
                transition-delay: 0s, 0s, 0.25s;
              }

              .draw-border:hover::after {
                -webkit-transition-delay: 0s, 0.25s, 0s;
                transition-delay: 0s, 0.25s, 0s;
              }

              .btn {
                background: none;
                border: none;
                cursor: pointer;
                line-height: 1.5;
                font: 700 1.2rem 'Roboto Slab', sans-serif;
                padding: 0.75em 2em;
                letter-spacing: 0.05rem;
                margin: 1em;
                width: 13rem;
              }

              .btn:focus {
                outline: 2px dotted #55d7dc;
              }


              .grid-container {
                display: grid;
                grid-template-columns: 1fr 1fr;
                grid-gap: 20px;
                font-size: 1.2em;
              }
              /* Extra Media Query */
              @media (min-width: 300px) and (max-width: px) {

              }
            </style>



            <div class="col-md-4 mb-3">
              <div class="card">
                <img src="<?php if ($profilephoto == '') {
                            echo 'https://st.depositphotos.com/2101611/3925/v/600/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg';
                          } else {
                            echo config('app.url') . 'public/assets_frontend/cstudent/' . $profilephoto;
                          } ?>" alt="Person" class="card__image">
                <br>
                <p class="card__name"><span class="card-name-span">Name:</span><br><br>Talha Gul rajput {{$cstudent->name}}</p>
                <p class="card__name"><span class="card-name-span">Intrested Country:</span><br><br> Pakistan {{$cstudent->intrested_country_doc}}</p>
                <p class="card__name"><span class="card-name-span">Passport Number:</span><br><br> Ak474849 {{$cstudent->passport_number}}</p>
              </div>
            </div>

            <div class="col-md-8 mb-3" style="text-align: center;">
              <div class="pgb p-2 application-status-main" style=" display: flex;  align-items: center;  min-height: 100%;">
              <div class="status-main-block" style="max-width: 100%;">
                <div class="application-paragraph-main">
                  <p class="track-application-details-paragraph">
                    This Progress bar Shows the Progress Of Current Application Of a Student The Green Background Shows The Current Status Of Application
                  </p>
                </div>

                <div class="application-status-block-main pt-4">
                  <div class="track-status-column-main">
                    <div class="track-status-column mb-3 status-column step complete">
                      <div class="status-column-block">
                        <span class="img-circle span-on" style="color: white;">
                          <p>1</p>
                        </span>
                        <center class="curcle-paragraph">Intial Documents Assessment</center>
                      </div>
                    </div>

                    <div class="track-status-column mb-3 status-column step complete">
                      <div class="status-column-block">
                        <span class="img-circle <?php echo ($cstudent['course_finalaztion'] == 'on') ? 'span-on' : 'span-off'; ?>" style="color: white;">
                          <p>2</p>
                        </span>
                        <center class="curcle-paragraph">Course Finalaztion</center>
                      </div>
                    </div>

                    <div class="track-status-column mb-3 status-column step complete">
                      <div class="status-column-block">
                        <span class="img-circle color-transition  <?php echo ($cstudent['application_submitted'] == 'on') ? 'span-on' : 'span-off'; ?>" style="color: white;">
                          <p>3</p>
                        </span>
                        <center class="curcle-paragraph">Application Submitted</center>
                      </div>
                    </div>

                    <div class="track-status-column mb-3 status-column step complete">
                      <div class="status-column-block">
                        <span class="img-circle  <?php echo ($cstudent['got_admission'] == 'on') ? 'span-on' : 'span-off'; ?>" style="color: white;">
                          <p>4</p>
                        </span>
                        <center class="curcle-paragraph">Got Admission</center>
                      </div>
                    </div>

                    <div class="track-status-column mb-3 status-column step complete">
                      <div class="status-column-block">
                        <span class="img-circle  <?php echo ($cstudent['visa_applied'] == 'on') ? 'span-on' : 'span-off'; ?>" style="color: white;">
                          <p>5</p>
                        </span>
                        <center class="curcle-paragraph">Visa Applied</center>
                      </div>
                    </div>

                    <div class="track-status-column mb-3 status-column step complete">
                      <div class="status-column-block">
                        <span class="img-circle <?php echo ($cstudent['case_closed'] == 'on') ? 'span-on' : 'span-off'; ?> " style="color: white;">
                          <p>6</p>
                        </span>
                        <center class="curcle-paragraph">Case Closed</center>
                      </div>
                    </div>
                  </div>
                </div>
                </div>

              </div>
            </div>




          </div>
          <br><br> <br><br>


        </div>
      </div>
      </section>

      </main>
    </div>


  </div>

</div>

</div>


@endsection
@section('customScripts')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>--}}

<script>
  // window.location.hash = tab2
  var hash = $(location).attr('hash');
  @if(Session::has('id'))
  hash = '#' + '{{Session::get("id")}}';
  @endif
  if (hash !== '') {
    $('.tabcontent').each(function() {
      $(this).hide();
      $(this).removeClass('active');
    });
    $(hash).show();
    window.history.pushState({
      path: '{{request()->url()}}' + hash
    }, '', '{{request()->url()}}' + hash);
  } {
    {
      Session::forget("id")
    }
  }

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
    evt.currentTarget.className += " active";
    window.history.pushState({
      path: '{{request()->url()}}' + '#' + cityName
    }, '', '{{request()->url()}}' + '#' + cityName);
  }
  $(document).ready(function() {
    $('.app-uni').hover(function() {
      $(this).parent().next().find('.hover-uni').show();
    }, function() {
      $('.hover-uni').hide();
    });
    $(document).on('mouseenter', '.hover-uni', function(e) {
      $(this).show();
    });
    $(document).on('mouseleave', '.hover-uni', function(e) {
      $(this).hide();
    });
  });
</script>
@endsection