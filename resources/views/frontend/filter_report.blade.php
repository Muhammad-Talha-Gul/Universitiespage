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
<style>
  @media screen and (max-width: 770px) {
    .trackcontainer {
      padding-top: 118px;

    }
  }
</style>
<div class="trackcontainer pb-0">
  <div class="formcol track-application-form-main">
    <div class="po_un_col1 section-heading-center-container track-status-heading-section">
      <h3 class="section-heading track-section-heading">Track application
        <span>status</span>
      </h3>
    </div>
    <form method="GET" action="{{ route('filterreport') }}">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group{{ $errors->has('sname') ? ' has-error' : '' }}">
            <label class="label1">Enter Complete Name</label>
            <input id="sname" type="text" class="form-control inputTrack mb-4" value="<?php if (isset($_GET['sname'])) {
                                                                                        echo $_GET['sname'];
                                                                                      } ?>" name="sname" placeholder="Enter Full Name" required>
            @if ($errors->has('sname'))
            <span class="help-block">
              <strong>{{ $errors->first('sname') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="col-sm-12">
          <div class="form-group{{ $errors->has('spassport') ? ' has-error' : '' }}">
            <label class="label1">Enter Passport Number</label>
            <input id="spassport" type="text" class="form-control inputTrack mb-4" value="<?php if (isset($_GET['spassport'])) {
                                                                                            echo $_GET['spassport'];
                                                                                          } ?>" name="spassport" placeholder="Enter Passport Number" required>
            @if ($errors->has('spassport'))
            <span class="help-block">
              <strong>{{ $errors->first('spassport') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="col-sm-12 mt-3">
          <div class="form-group text-center">
            <button type="submit" class="Filterbtn">Track</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="track-application-details mt-5">
    <div class="container">
      <div class="app-dash mt-0">
        <div class="row">
          <div class="col-md-12" style="text-align: center;">
            <?php if (isset($filtersearch)) { ?>
              <div id="reponsedata" class=" track-data py-5">
                <style>
                  <?php if ($cstudent['course_finalaztion'] == 'on') {
                    echo '.pgb .steptwo .img-circle:after {
                                content: "";
                                display: block;
                                background: #5a5555;
                                height: 4px;
                                width: 60%;
                                position: absolute;
                                bottom: 80%;
                                left: 70%;
                                z-index: -1;
                            }';
                  }
                  ?><?php if ($cstudent['application_submitted'] == 'on') {
                      echo '.pgb .stepthree .img-circle:after {
                              content: "";
                              display: block;
                              background: #5a5555;
                              height: 4px;
                              width: 60%;
                              position: absolute;
                              bottom: 80%;
                              left: 70%;
                              z-index: -1;
                          }';
                    }
                    ?><?php if ($cstudent['got_admission'] == 'on') {
                        echo '.pgb .stepfour .img-circle:after {
                                content: "";
                                display: block;
                                background: #5a5555;
                                height: 4px;
                                width: 60%;
                                position: absolute;
                                bottom: 80%;
                                left: 70%;
                                z-index: -1;
                            }';
                      }
                      ?><?php if ($cstudent['visa_applied'] == 'on') {
                          echo '.pgb .stepfive .img-circle:after {
                                  content: "";
                                  display: block;
                                  background: #5a5555;
                                  height: 4px;
                                  width: 60%;
                                  position: absolute;
                                  bottom: 80%;
                                  left: 70%;
                                  z-index: -1;
                              }';
                        }
                        ?><?php if ($cstudent['case_closed'] == 'on') {
                            echo '.pgb .stepsix .img-circle:after {
                                    content: "";
                                    display: block;
                                    background: #5a5555;
                                    height: 4px;
                                    width: 60%;
                                    position: absolute;
                                    bottom: 80%;
                                    left: 70%;
                                    z-index: -1;
                                }';
                          }
                          ?>.pgb .step.complete .img-circle:after {
                    background: #0564AF;
                  }

                  .pgb .step:last-of-type .img-circle:after,
                  .pgb .step:first-of-type .img-circle:before {
                    display: none;
                  }
                </style>
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 mb-3 status-column">
                    <div class="track-details-block">
                      <label class="track-details-label">Name:</label><br>
                      <p class="track-details-paragraph">
                        <?php if (isset($_GET['sname'])) {
                          echo $_GET['sname'];
                        } ?>
                      </p>
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 mb-3 status-column">
                    <div class="track-details-block">
                      <label class="track-details-label">Passport #:</label><br>
                      <p class="track-details-paragraph">
                        <?php if (isset($_GET['spassport'])) {
                          echo $_GET['spassport'];
                        } ?>
                      </p>
                    </div>
                  </div>

                  <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 mb-3 status-column">
                    <div class="track-details-block">
                      <label class="track-details-label">Intrested Country:</label><br>
                      <p class="track-details-paragraph">
                        <?php if (isset($_GET['sname'])) {
                          echo $cstudent['interestedCountryId'];
                        } ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-12 pgb  mt-3">
                  <div class="application-status-main">
                    <div class="application-paragraph-main">
                      <p class="track-application-details-paragraph">
                        This progress bar shows the progress of your current application. The green background shows the current status of your application.
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
                            <span class="img-circle <?php echo ($cstudent['course_finalaztion'] == 'on') ? 'span-on' : 'span-off'; ?>" style="color: white;" style="color: white;">
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
        <?php } ?>
        <?php if (isset($nodataavailble)) { ?>
          <h5 class="my-5 data-not-found">No Data Can Be Found On Given Information</h5><br>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  </main>
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