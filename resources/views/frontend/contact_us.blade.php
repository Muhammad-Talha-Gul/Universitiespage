@extends('layouts.frontend')
@section('title', 'Application Form | '.$data->name.' | '.$data->university->name)


@section('content')
<style>
    .office-location-paragraph {
        color: black;
    }
    .location-icon{
        display: block;
    }
</style>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<section class="contact-us py-5">
    <div class="container">
        <div class="contact-top-content-main">
            <h2 class="h2 contact-us-heading">
                Do you want to Contact Us?
            </h2>
            <p class="p contact-us-paragraph">
                If you are facing any issue or if you have any requiremnt and complaint then you can contact with us
            </p>
        </div>
        <div class="contact-us-main pt-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 mb-3">
                    <div class="office-location-main">
                        <div class="contact-us-card-header">
                            <h6 class="h6 header-heading">Lahore Office</h6>
                        </div>
                        <div class="office-location-list-main">
                            <ul class="office-list">
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="{{asset('assets_frontend/images/svg/location.svg')}}" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            Universities Page,2nd Floor faisal bank,Raja Market,Garden town,Lahore,Pakistan
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="{{asset('assets_frontend/images/svg/mail.svg')}}" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            Info@universitiespage.com
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="{{asset('assets_frontend/images/svg/whatsapp.svg')}}" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            03112853198
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="{{asset('assets_frontend/images/svg/phone-call.svg')}}" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0324 3640038
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="{{asset('assets_frontend/images/svg/phone-call.svg')}}" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0333 0033235
                                        </p>

                                    </div>
                                </li>
                                <!-- <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="{{asset('assets_frontend/images/svg/phone-call.svg')}}" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0310 3162004
                                        </p>

                                    </div>
                                </li> -->

                            </ul>
                        </div>
                        <div class="location-footer-main">
                            <h5 class="h5 socail-list-heading">Follow Us</h5>
                            <ul class="office-social-list">
                                @foreach(getSocialMeta() as $key => $social)
                                @if($social!==null)
                                <li class="office-socail-list-item">
                                    <a class="lahore-location-link" target="_blank" href="{{($social)??''}}" title="Facebook">
                                        <i class="fa fa-{{$key}} u-text-{{$key}}"></i>
                                    </a>
                                </li>
                                @endif
                                @endforeach
                                <li class="office-socail-list-item">
                                    <a class="lahore-location-link" target="_blank" href="https://whatsapp.com/channel/0029Va7vJOYJkK79737At844" title="whatsapp">
                                        <i class="fa fa-whatsapp u-text-whatsapp"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 mb-3">
                    <div class="office-location-main">
                        <div class="contact-us-card-header">
                            <h6 class="h6 header-heading">Islamabad Office</h6>
                        </div>
                        <div class="office-location-list-main">
                            <ul class="office-list">
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="{{asset('assets_frontend/images/svg/location.svg')}}" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            Universities Page, Punjab market,Venus Plaza, 1st Floor, Office No. 1, Sector G13/4,Islamabad
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="{{asset('assets_frontend/images/svg/mail.svg')}}" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            Info@universitiespage.com
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="{{asset('assets_frontend/images/svg/whatsapp.svg')}}" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0334 9990308
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="{{asset('assets_frontend/images/svg/phone-call.svg')}}" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0310 3172004
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="{{asset('assets_frontend/images/svg/phone-call.svg')}}" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0300 4010286
                                        </p>

                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="location-footer-main">
                            <h5 class="h5 socail-list-heading">Follow Us</h5>
                            <ul class="office-social-list">
                                @foreach(getSocialMeta() as $key => $social)
                                @if($social!==null)
                                <li class="office-socail-list-item">
                                    <a class="lahore-location-link" target="_blank" href="{{($social)??''}}" title="Facebook">
                                        <i class="fa fa-{{$key}} u-text-{{$key}}"></i>
                                    </a>
                                </li>
                                @endif
                                @endforeach
                                <li class="office-socail-list-item">
                                    <a class="lahore-location-link" target="_blank" href="https://whatsapp.com/channel/0029Va7vJOYJkK79737At844" title="whatsapp">
                                        <i class="fa fa-whatsapp u-text-whatsapp"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 mb-3">
                    <div class="office-location-main">
                        <div class="contact-us-card-header">
                            <h6 class="h6 header-heading">Karachi Office</h6>
                        </div>
                        <div class="office-location-list-main">
                            <ul class="office-list">
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="{{asset('assets_frontend/images/svg/location.svg')}}" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            Universities Page,1st floor, Amber Estate, Shahrah-e-Faisal Rd, Bangalore Town Block A Shah, Karachi, Sindh
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="{{asset('assets_frontend/images/svg/mail.svg')}}" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            Info@universitiespage.com
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="{{asset('assets_frontend/images/svg/whatsapp.svg')}}" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0310 6225430
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="{{asset('assets_frontend/images/svg/phone-call.svg')}}" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0310 6225408
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="{{asset('assets_frontend/images/svg/phone-call.svg')}}" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0310 6225410
                                        </p>

                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="location-footer-main">
                            <h5 class="h5 socail-list-heading">Follow Us</h5>
                            <ul class="office-social-list">
                                @foreach(getSocialMeta() as $key => $social)
                                @if($social!==null)
                                <li class="office-socail-list-item">
                                    <a class="lahore-location-link" target="_blank" href="{{($social)??''}}" title="Facebook">
                                        <i class="fa fa-{{$key}} u-text-{{$key}}"></i>
                                    </a>
                                </li>
                                @endif
                                @endforeach
                                <li class="office-socail-list-item">
                                    <a class="lahore-location-link" target="_blank" href="https://whatsapp.com/channel/0029Va7vJOYJkK79737At844" title="whatsapp">
                                        <i class="fa fa-whatsapp u-text-whatsapp"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="message-section py-5">
    <div class="container">
        <div class="bottom-main">
            <div class="apply-online-main contact-us-from-main w3-teal">

                <form id="contactForm" action="{{route('message-post')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body p-0">
                        <div class="row input m-0">
                            <!-- <div class="col-sm-12 mb-3">
                                <div class="contact-us-card-header">
                                    <h6 class="h6 header-heading">Enter Here Your Message</h6>
                                </div>
                            </div> -->
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <label for="" class="apply-inpu-label contact-us-label">Office Location</label>
                                <select class="form-control apply-input" aria-label="Default select example" name='office_location' required>
                                    <option selected>Select Location</option>
                                    <option>Lahore</option>
                                    <option>Islamabad</option>
                                    <option>Karachi</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <label for="" class="apply-inpu-label contact-us-label">Full Name</label>
                                <input type="text" name="user_name" class="form-control apply-input" placeholder="Enter Your Name" required>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <label for="" class="apply-inpu-label contact-us-label">Enter Email</label>
                                <input type="email" name="user_email" class="form-control apply-input" placeholder="Enter Your Email" required>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <label for="phone-number" class="apply-inpu-label contact-us-label">Phone Number</label>
                                <input type="number" name="phone_number" id="phone-number" class="form-control apply-input" placeholder="Enter Your Phone Number" required>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                                <label for="" class="apply-inpu-label contact-us-label">Enter Message</label>
                                <textarea name="message" id="" cols="30" rows="10" class="form-control apply-input contact-textarea pt-1" placeholder="Enter Your Mesaage" maxlength="1000" required></textarea>
                            </div>
                            
                            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                            
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                                <div class="col-sm-12 g-recaptcha-container2">
                                   <div class="g-recaptcha" data-sitekey="6LdLb9UpAAAAAHkasPy1bBC5hz--AtVWq2-X-Jha"></div> 
                                </div>
                            </div>
                            <div class="col-sm-12 text-center my-3" style="display: flex;">
                                <button type="submit" id="submitButton" class="btn btn-default pull-left" style="margin: 0 auto;">Send Mesaage</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#submitButton').click(function(event) {
            event.preventDefault();
            var formData = $('#contactForm').serialize();
            $.ajax({
                url: "{{ route('message-post') }}",
                type: 'POST',
                data: formData,
                success: function(response) {
                    alert(response);
                    $('#contactForm')[0].reset();
                    
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseJSON.error); // Show error message
                }
            });
        });
    });
</script>

@endsection