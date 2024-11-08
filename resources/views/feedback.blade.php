@extends('layouts.frontend')
@section('title',(isset($data['seo']->meta_title))?$data['seo']->meta_title:'Feedback')
@section('content')

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<!-- <meta name="csrf-token" content="{{ csrf_token() }}">-->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<style>
    textarea {
        height: 179px !important;
        /* width: 559px !important; */
    }

    .custom-table {
        width: 75%;
    }

    @media only screen and (min-width: 1441px) and (max-width: 1760px) {
        .custom-container {
            margin-left: 347px;
            margin-top: 40px;
        }

        h2,
        h6 {
            margin-left: 20%;

        }
    }

    @media only screen and (min-width: 300px) and (max-width: 767px) {
        .custom-table {
            width: 100%;
        }
    }

    .with-margin {
        margin-left: 2px;
        color: #000;
        /* Adjust the margin as needed */
    }

    .btn-primary {
        background-color: #0B6D76 !important;
        border-color: #0B6D76 !important;
    }

    label {

        color: #0B6D76 !important;
        font-size: 16px;
        font-weight: 400;
        opacity: 1;
    }

    /* .table{
width: 100% !important;
} */
    h6 {
        color: #0B6D76;
        font-size: 16px;
        font-weight: 500;
        text-align: center;
    }

    h5 {
        color: #288089;
        font-size: 18px;
        font-weight: 500;
    }

    /* star_rating css*/
    .star_rating {
        unicode-bidi: bidi-override;
        direction: rtl;
        text-align: center;
        position: relative;
        display: inline-block;
        margin-top: -12px;
    }

    .star_rating input {
        display: none;
    }

    .star_rating label {
        cursor: pointer;
        width: 1em;
        font-size: 2.7em;
        color: #fff !important;
        text-shadow: 0 0 2px #097781;
    }

    .star_rating label:before {
        content: '\2605';
        display: block;
    }

    .star_rating input:checked~label {
        color: #0B6D76 !important;
    }

    .star_rating:not(:checked) label:hover,
    .star_rating:not(:checked) label:hover~label {
        color: #0B6D76 !important;
    }

    /* end*/
    .table td,
    .table th {
        opacity: 0.7 !important;
    }
    .table td{
        text-align: center;

    }

    @media (max-width: 992px) {

.custom-container {
    margin-top: 120px !important;
}
}
    @media (max-width: 767px) {
        .custom-table {
            width: 100%;
        }
        .custom-container {
            margin-top: 120px !important;
        }
    }
    @media (max-width: 575px) {

        .custom-container {
            margin-top: 190px !important;
        }
    }
    .feedback-section {
        background: #f0f0f0;
        padding: 50px 0px;
    }

    .custom-container {
        background: #fff;
        border-radius: 5px;
        padding: 20px;
    }
    .form-check-input:checked + .form-check-label{
        background: #0B6D76 !important;
        color: #fff !important;
    }

    .form-check-label{
        cursor: pointer;
        padding: 7px 15px;
        border-radius: 20px;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        display: block;
        min-width: 100px;
        max-width: max-content;
        text-align: center;
        font-size: 14px;
    }
    .checkbox-main-row{
        max-width: max-content;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }
    .form-check-label:hover{
        background: #0B6D76 !important;
        color: #fff !important;
    }
    .check-box-column{
        margin-right: 10px;
    }
   
</style>
<div class="d-flex justify-content-center align-items-center mx-auto feedback-section">
    <div class='container custom-container'>
        <form action="#" method="post" id='Form'>
            <h2 class="text-center mb-4" style="color: #0B6D76;font-size:24px; font-weight:500; margin-left:0px !important; margin-bottom:20px !important;">Client Satisfaction Survey</h2>
            <div class="row mt-3">
                <div class="col-md-3 mb-3">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="full_name" placeholder="Enter Your Full Name" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Contact Phone</label>
                    <input type="text" class="form-control" name="contact_number" placeholder="Enter Your Contact Number" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="options">Branches</label>
                    <select id="branches" class='form-control'>
                        <option value="none">Select Branch</option>
                        <option value="lahore">Lahore</option>
                        <option value="islamabad">Islamabad</option>
                        <option value="karachi">Karachi</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <div id="inputBoxContainer" style="opacity: 0; width: 0; overflow: hidden; transition: width 0.5s;">
                        <label for="inputBox">Counselor Name</label>
                        <select id="inputbox" class='form-control' name='consuler_id'>

                        </select>
                    </div>
                </div>
            </div>
            <h5 class=' mt-3 text-center'>How would you rate your overall satisfaction with our Counselor?</h5>
            <div class="row mt-3" style="justify-content: center;">
                <div class="col-md-8 d-flex justify-content-center align-items-center">
                    <div class="star_rating">
                        <input type="radio" name="star_rating" id="star5" value="5" /><label for="star5"></label>
                        <input type="radio" name="star_rating" id="star4" value="4" /><label for="star4"></label>
                        <input type="radio" name="star_rating" id="star3" value="3" /><label for="star3"></label>
                        <input type="radio" name="star_rating" id="star2" value="2" /><label for="star2"></label>
                        <input type="radio" name="star_rating" id="star1" value="1" /><label for="star1"></label>
                    </div>
                </div>

            </div>
            <h6 style="margin-left:0px !important;" class='text-center  mt-1'>How was your experience with our Counselor?</h6>
            <!---Table ---->
            <div class="row mt-3 justify-content-center">

                <table class="table table-bordered custom-table table-responsive" id='table'>
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col-sm-6 col-md-4 col-lg-2">Very Satisfied</th>
                            <th scope="col-sm-6 col-md-4 col-lg-2">Satisfied</th>
                            <th scope="col-sm-6 col-md-4 col-lg-2">Neutral</th>
                            <th scope="col-sm-6 col-md-4 col-lg-2">Dissatisfied</th>
                            <th scope="col-sm-6 col-md-4 col-lg-2">Very Dissatisfied</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Behaviour</th>
                            <td><input type="radio" name="behaviour" value="Very Satisfied"> </td>
                            <td><input type="radio" name="behaviour" value="Satisfied"> </td>
                            <td><input type="radio" name="behaviour" value="Neutral"> </td>
                            <td><input type="radio" name="behaviour" value="Dissatisfied"> </td>
                            <td><input type="radio" name="behaviour" value="very Dissatisfied"> </td>
                        </tr>
                        <tr>
                            <th scope="row">Timely Response</th>
                            <td><input type="radio" name="timely_response" value="Very Satisfied"></td>
                            <td><input type="radio" name="timely_response" value="Satisfied"></td>
                            <td><input type="radio" name="timely_response" value="Neutral"> </td>
                            <td><input type="radio" name="timely_response" value="Dissatisfied"></td>
                            <td><input type="radio" name="timely_response" value="very Dissatisfied"></td>
                        </tr>
                        <tr>
                            <th scope="row">Call pickup response</th>
                            <td><input type="radio" name="call_response" value="Very Satisfied"></td>
                            <td><input type="radio" name="call_response" value="Satisfied"></td>
                            <td><input type="radio" name="call_response" value="Neutral"></td>
                            <td><input type="radio" name="call_response" value="Dissatisfied"></td>
                            <td><input type="radio" name="call_response" value="very Dissatisfied"></td>
                        </tr>
                        <tr>
                            <th scope="row">Knowledge</th>
                            <td><input type="radio" name="knowledge" value="Very Satisfied"></td>
                            <td><input type="radio" name="knowledge" value="Satisfied"></td>
                            <td><input type="radio" name="knowledge" value="Neutral"></td>
                            <td><input type="radio" name="knowledge" value="Dissatisfied"></td>
                            <td><input type="radio" name="knowledge" value="very Dissatisfied"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Likely radio boxes-->
            <h6 class='text-center ml-0  mt-3' style=''>How likely are you to recommend our service to a friend or collleage?</h6>
            <div class=" mt-4  checkbox-main-row">
                <div class=" mb-3 text-center check-box-column">
                    <input id="rating-radio1" type="radio" name="likelihood" class="form-check-input" value="Very Likely">
                    <label for="rating-radio1" class="radio-inline form-check-label with-margin">
                        Very Likely 
                    </label>
                </div>

                <div class=" mb-3 text-center check-box-column ">
                    <input id="rating-radio2" type="radio" name="likelihood" class="form-check-input" value="Likely">
                    <label for="rating-radio2" class="radio-inline form-check-label with-margin">
                        Likely
                    </label>
                </div>

                <div class=" mb-3 text-center check-box-column ">
                    <input id="rating-radio3" type="radio" name="likelihood" class="form-check-input" value="Neutral">
                    <label for="rating-radio3" class="radio-inline form-check-label with-margin">
                        Neutral
                    </label>
                </div>

                <div class=" mb-3 text-center check-box-column ">
                    <input id="rating-radio4" type="radio" name="likelihood" class="form-check-input" value="Unlikely">
                    <label for="rating-radio4" class="radio-inline form-check-label with-margin">
                         Unlikely
                    </label>
                </div>
                <div class=" mb-3 text-center">
                    <input  id="rating-radio5" type="radio" name="likelihood" class="form-check-input" value="Very Unlikely">
                    <label for="rating-radio5" class="radio-inline form-check-label with-margin">
                        Very Unlikely
                    </label>
                </div>
            </div>
            <h6 class='mt-4 text-center last-heading my-4'>Do you have any suggestions for how we can improve our customer experience?</h6>
            <div class="row mt-3 justify-content-center">
                <div class="col-lg-6">
                    <textarea class="form-control" rows="5" name='customer_experience'></textarea>
                </div>
            </div>
            
                
                            
                            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                            
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                                <div class="col-sm-12 g-recaptcha-container2">
                                   <div class="g-recaptcha" data-sitekey="6LdLb9UpAAAAAHkasPy1bBC5hz--AtVWq2-X-Jha"></div> 
                                </div>
                            </div>
            
            <!-- Add a submit button -->
            <div class="row mt-3  form-group ">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary  submitbutton">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="result">
    @if(selectedValue=='lahore')
    {{1}}
    @endif
</div>
@endsection
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



<script>
    $(document).ready(function() {
        $('#Form').submit(function(e) {
            e.preventDefault(); // Prevent the form from submitting traditionally

            // Perform AJAX request
            $.ajax({
               
                type: 'POST',
                url: "{{route('submitfeeback')}}",
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response.success);
                    // Handle success, show SweetAlert
                    Swal.fire({
                        title: response.success+'!',
                        text: response.message,
                        icon: response.success,
                        confirmButtonText: 'Okay'
                    });
                },
                error: function(error) {
                    // Handle error, show SweetAlert
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Please Complete the Form!',
                        icon: 'warning',
                        confirmButtonText: 'Okay',
                        customClass: {
                            confirmButton: 'btn btn-warning',
                        },
                        buttonsStyling: false, // To disable default styling
                    });
                }
            });
        });
        $('input[name="star_rating"]').change(function() {
                var selectedValue = $(this).val();
                console.log("Selected Star Rating: " + selectedValue);
            });
            $('#branches').change(function() {
                // Get the selected value
                var selectedValue = $(this).val();

                // Show or hide the input box based on the selection
                if (selectedValue === 'lahore' || selectedValue === 'islamabad' || selectedValue === 'karachi') {
                    $('#inputBoxContainer').css({ 'opacity': 1, 'width': '100%' });
                    $('#inputbox').empty();
                    $('#inputbox').append('<option value="">Select Counselor Name</option>');
                    var consulerNames = {!! json_encode($consuler_names) !!}; 
                     consulerNames.forEach(function(name) {
                    if (name.location === selectedValue) {
                     $('#inputbox').append('<option value="' + name.intUid + '">'+ name.varFirstName+' '+name.varLastName+'</option>');
                                    }
                    });
                } else {
                    $('#inputBoxContainer').css({ 'opacity': 0, 'width': '0' });
                }
            });
    });

</script>