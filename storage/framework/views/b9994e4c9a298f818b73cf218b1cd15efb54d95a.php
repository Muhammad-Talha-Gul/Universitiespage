
<?php $__env->startSection('title',(isset($data['seo']->meta_title))?$data['seo']->meta_title:'Feedback'); ?>
<?php $__env->startSection('content'); ?>

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<!-- <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">-->
  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 
                
<style>
    
    @media (min-width: 992px) {
        .custom-container {
            /* Add your custom styles for large screens here */
            margin-left: 526px;
            margin-top: 40px;
        }
 textarea {
    height: 179px !important;
    width:559px !important;
    margin-left:123px;
} 
.custom-table{
    width: 75%;
}
h6{
    margin-left:19%;
}
h2{
    margin-left:17%;
}
h5{
    margin-left:9%; 
    opacity: 0.8;
    font-size: 19px;
    font-weight: 500;
}
.last-heading{
    margin-left:5%; 
}
.submitbutton{
margin-left: 350px;

   }
    }
    @media  only screen and (min-width: 992px) and (max-width: 1440px) {
    .custom-container {
            margin-left: 219px;
            margin-top: 40px;
        }
  .submitbutton{
margin-left: 350px;

   }
   h6{
    margin-left:19%;
}
h2{
    margin-left:17%;
}
.star_rating{
    margin-left:93px;
}
}
@media  only screen and (min-width: 1441px) and (max-width: 1760px) {
    .custom-container {
            margin-left: 347px;
            margin-top: 40px;
        }
        h2, h6{
    margin-left:20%;
    
}
}

.col-sm-6 col-md-4 col-lg-2 {
    max-width: 13% !important;
}
.with-margin {
    margin-left: 2px; /* Adjust the margin as needed */
}
.btn-primary {
    background-color: #0B6D76 !important;
    border-color: #0B6D76 !important;
}
label {
    
    color: #0B6D76 !important;
    font-size: 16px ;
    font-weight: 400;
    opacity: 1;
}
/* .table{
width: 100% !important;
} */
h6{
    color:#0B6D76;
    font-size:16px;
    font-weight:500;
    text-align:center;
    opacity: 0.8;
}
h5{
    color:#288089;
    opacity: 0.8;
    font-size: 19px;
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

        .star_rating input:checked ~ label {
            color: #0B6D76 !important;
        }

        .star_rating:not(:checked) label:hover,
        .star_rating:not(:checked) label:hover ~ label {
            color: #0B6D76 !important;
        }
/* end*/ 
.table td, .table th {
opacity:0.7 !important;
}
@media (max-width: 770px){
  
   .custom-container {
       padding-top:198px !important;
   }}
</style>
<div class="d-flex justify-content-center align-items-center mx-auto">
<div class='container custom-container'>
<form action="#" method="post" id='Form'>
    <h2 class="text-center text-md-left" style="color: #0B6D76;font-size:2rem; font-weight:500; opacity:0.8">Client Satisfaction Survey</h2>
    <div class="row mt-3">
        <div class="col-md-3">
            <label>Full Name</label>
            <input type="text" class="form-control" name="full_name" required>
        </div>
        <div class="col-md-3">
            <label>Contact Phone</label>
            <input type="text" class="form-control" name="contact_number" required>
        </div>
        <div class="col-md-3">
        <label for="options">Branches</label>
        <select id="branches" class='form-control'>
        <option value="none">Select Branch</option>
        <option value="lahore">Lahore</option>
        <option value="islamabad">Islamabad</option>
       </select>
        </div>
        <div class="col-sm-3">
        <div id="inputBoxContainer" style="opacity: 0; width: 0; overflow: hidden; transition: width 0.5s;">
        <label for="inputBox">Consuler name</label>
        <select id="inputbox" class='form-control' name='consuler_id'>
        
    </select>
    </div>
        </div>
    </div>
<h5  class=' mt-3 text-center text-md-left'>How would you rate your overall satisfaction with our Consular?</h5>
<div class="row mt-3">
<div class="col-md-8 d-flex justify-content-center align-items-center">
                    <div class="star_rating">
                        <input type="radio" name="star_rating" id="star5" value="5"/><label for="star5"></label>
                        <input type="radio" name="star_rating" id="star4" value="4"/><label for="star4"></label>
                        <input type="radio" name="star_rating" id="star3" value="3"/><label for="star3"></label>
                        <input type="radio" name="star_rating" id="star2" value="2"/><label for="star2"></label>
                        <input type="radio" name="star_rating" id="star1" value="1"/><label for="star1"></label>
                    </div>
                </div>
    
</div>
<h6 style="" class='text-center text-md-left  mt-1'>How was your experience with our Consular?</h6>
<!---Table ---->
<div class="row mt-3">
    
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
<h6  class='text-center text-md-left  mt-3' style='margin-left:12%;'>How likely are you to recommend our service to a friend or collleage?</h6>
 <div class="row mt-4">
        <div class="col-sm-6 col-md-4 col-lg-2">
            <label class="radio-inline form-check-label">
                <input type="radio" name="likelihood"   class="form-check-input"  value="Very Likely"> <span class='with-margin'>Very Likely </span>
            </label>
        </div>
        
        <div class="col-sm-6 col-md-4 col-lg-2 ">
            <label class="radio-inline form-check-label">
                <input type="radio" name="likelihood"    class="form-check-input" value="Likely"> <span class='with-margin'>Likely</span>
            </label>
        </div>
        
        <div class="col-sm-6 col-md-4 col-lg-2 ">
            <label class="radio-inline form-check-label">
                <input type="radio" name="likelihood"  class="form-check-input" value="Neutral"> <span class='with-margin'>Neutral</span>
            </label>
        </div>
        
        <div class="col-sm-6 col-md-4 col-lg-2 " >
            <label class="radio-inline form-check-label">
                <input type="radio" name="likelihood"  class="form-check-input" value="Unlikely"> <span class='with-margin'>Unlikely</span>
            </label>
        </div>
       <div class="ccol-sm-6 col-md-4 col-lg-2">
        <label class="radio-inline form-check-label">
               <input type="radio" name="likelihood"  class="form-check-input" value="Very Unlikely"><span class='with-margin'>Very Unlikely</span>
        </label>
        </div>
    </div>
    <h5  class='mt-4 text-center text-md-left last-heading'>Do you have any suggestions for how we can improve our customer experience?</h5>
    <div class="row mt-3">
        <div class="col-lg-6">
            <textarea class="form-control" rows="5" name='customer_experience'></textarea>
        </div>
    </div>
<!-- Add a submit button -->
        <div class="row mt-3 form-group ">
            <div class="col-sm-6 ">
                <button type="submit" class="btn btn-primary  submitbutton">Submit</button>
            </div>
        </div>
</form>
</div>
    </div>
    <div id="result">
        <?php if(selectedValue=='lahore'): ?>
         <?php echo e(1); ?>

        <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



<script>
    $(document).ready(function() {
        $('#Form').submit(function(e) {
            e.preventDefault(); // Prevent the form from submitting traditionally

            // Perform AJAX request
            $.ajax({
               
                type: 'POST',
                url: "<?php echo e(route('submitfeeback')); ?>",
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
                if (selectedValue === 'lahore' || selectedValue === 'islamabad') {
                    $('#inputBoxContainer').css({ 'opacity': 1, 'width': '280px' });
                    $('#inputbox').empty();
                    $('#inputbox').append('<option value="">Select Consuler name</option>');
                    var consulerNames = <?php echo json_encode($consuler_names); ?>; 
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



























<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>