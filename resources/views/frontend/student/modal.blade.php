<div class="modal def" id="modal-property-languages" data-toggle="modal" style='margin-top:220px;'>
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong class="modal-title"> <span class="font-weight-light">FREE CONSULTATION</span></strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <style>
                .input {
                    margin-bottom: 10px;
                }
                .btn {
                    background-color: #0A74B9;
                    color: white;
                }
                .error-span{
                    font-size:12px;
                }
            </style>
            
            
            <form id="ratingForm">
                <div class="modal-body">
                    <div class="row input m-0">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                    </div>
                    <div class="row input m-0">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="phone_number" class="form-control" placeholder="Enter Your Phone Number ">
                    </div>
                    <div class="col-md-6 mb-3">
                        <!--<input type="text" name="last_education" class="form-control" placeholder="Enter Your Last Education">-->
                       <select name="last_education" class="form-control apply-input" aria-label="Default select example">
                            <option selected disabled>Select Last Education</option>
                            <option value="Matric">Matric</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Bachelor">Bachelor</option> <!-- Corrected from "Becholer" -->
                            <option value="Master">Master</option>
                        </select>
                    </div>
                    </div>
                    <div class="row input m-0">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                        
                            <select name="country" class="form-control apply-input country" aria-label="Default select example" onchange="loadStates()">
                                <option selected disabled>Select Country</option>
                            </select>
                            <input type="hidden" id="hidden_country_name" name="selected_country_name">
                           
                        </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <select class="form-control apply-input state" aria-label="Default select example" onchange="loadCities()" id='state' name='state'>
                                <option selected disabled>Select State</option>
                            </select>
                            
                            <input type="hidden" id="hidden_state_name" name="selected_state_name">
                            
                    </div>
                    </div>
                    <div class="row input m-0 mt-1">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                        
                            <select class="form-control apply-input city" aria-label="Default select example" id='city' name='city'>
                                <option selected disabled>Select City</option>
                            </select>
                           
                            <input type="hidden" id="hidden_city_name" name="selected_city_name">
                           
                        </div>
                        
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <select name="interested_country" class="form-control apply-input" id="interestedCountry" aria-label="Default select example">
                              <option selected disabled>Select Interested Country</option>
                                <option value="Italy">Italy</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Turkey">Turkey</option> 
                                <option value="France">France</option>
                                <option value="UK">UK</option>
                                <option value="China">China</option> 
                                <option value="Others">Others</option>
                        </select>
                           
                        </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="apply_for" class="form-control" placeholder="Apply For">
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="consultation-button" class="btn btn-default pull-left" onclick="FormSubmit(this)">Submit</button>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript" src="{{asset('assets_frontend/js/jquery.js') }}"></script>
<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="{{asset('assets_frontend/js/axios.js') }}"></script>
<script>
    function FormSubmit(input){
        console.log($("#interestedCountry").val());
         $("#consultation-button").prop("disabled", true).text("Submitting...");
        $(':input').removeClass('has-error');
        $('.error-span').remove();
        
        if (!$('.t_loader').is(':visible')) {
            $('.t_loader').fadeIn(200)
          }
        axios.post('/free-consulation',$('#ratingForm').serialize()).then(function (response) {
            if (response.data.status === 'success'){
                 $('#modal-property-languages').modal('hide');
                  $("#consultation-button").prop("disabled", true).text("Submitted");
                  $("#consultation-button").prop("disabled", true).text("Submited");
                  if ($('.t_loader').is(':visible')) {
                  $('.t_loader').fadeOut(200)
                }
                        //   const articleFlag = 'true';  
                        //   localStorage.setItem(articleModelStatus, articleFlag);
                        const articleFlag = 'true';  // New value to be stored (true)
                        const articleModelStatus = 'articleFlag';  // Key for local storage
                          localStorage.setItem(articleModelStatus, articleFlag);
                          localStorage.setItem('formSubmittedTime', new Date().toString());
                swal({
                    title: response.data.msg,
                    icon: "success",
                }).then(data =>{
                  $("#modal-property-languages").removeAttr("id");

                    $('#ratingForm')[0].reset(); // Reset all form fields
                $('#ratingForm :input').prop("disabled", true); // Disable all form inputs
                });
            }else if(response.data.status == 'error'){
                $("#consultation-button").prop("disabled", false).text("Submit");
                if ($('.t_loader').is(':visible')) {
                  $('.t_loader').fadeOut(200)
                }
                $(input).attr('disabled',false);
                $('.alert-danger').text(response.data.msg);
                $('.alert-danger').show();
            }
        }).catch(function (error){
             $("#consultation-button").prop("disabled", false).text("Submit");
            if ($('.t_loader').is(':visible')) {
                  $('.t_loader').fadeOut(200)
                }
            $(input).attr('disabled',false);
            $.each(error.response.data.errors, function (k, v) {
                $('input[name="' + k + '"]').addClass("has-error");
                $('input[name="' + k + '"]').after("<span class='error-span'>" + v[0] + "</span>");
            });
        });
    }
</script>


<script>

        var config = {
    cUrl: 'https://api.countrystatecity.in/v1/countries',
    ckey: 'NHhvOEcyWk50N2Vna3VFTE00bFp3MjFKR0ZEOUhkZlg4RTk1MlJlaA=='
}
  var countrySelect = document.querySelector('.country'),
    stateSelect = document.querySelector('.state'),
    citySelect = document.querySelector('.city')
    function loadCountries() {
        let apiEndPoint = config.cUrl;
        // Create a search input element
        const searchInput = document.createElement('input');
        searchInput.setAttribute('type', 'text');
        searchInput.setAttribute('placeholder', 'Search country...');
        searchInput.classList.add('hidden');
        searchInput.classList.add('form-control');
        searchInput.addEventListener('input', filterCountries); // Attach event listener
        // Append the search input before the country select element
        document.querySelector('.country').parentNode.insertBefore(searchInput, document.querySelector('.country'));

        // Fetch countries from API
        fetch(apiEndPoint, {headers: {"X-CSCAPI-KEY": config.ckey}})
            .then(response => response.json())
            .then(data => {
                // console.log(data);
                const countrySelect = document.querySelector('.country');

                data.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.iso2;
                    option.textContent = country.name;
                    countrySelect.appendChild(option);
                });
                // Enable the state and city selects
                stateSelect.disabled = true;
                citySelect.disabled = true;
                stateSelect.style.pointerEvents = 'none';
                citySelect.style.pointerEvents = 'none';

                // Initialize Select2 after appending options
                $('.country').select2();
                
            })
            .catch(error => console.error('Error loading countries:', error));
    }
    // Function to filter countries based on search input
    function filterCountries() {
        const searchText = this.value.toLowerCase();
        const options = document.querySelectorAll('.country option');

        options.forEach(option => {
            const optionText = option.textContent.toLowerCase();
            const showOption = optionText.includes(searchText);
            option.style.display = showOption ? 'block' : 'none';
        });
    }
    function loadStates() {
        stateSelect.disabled = false;
        citySelect.disabled = true;
        stateSelect.style.pointerEvents = 'auto';
        citySelect.style.pointerEvents = 'none';

        const selectedCountryCode = countrySelect.value;
        stateSelect.innerHTML = ''; // Clear existing options

        // Initialize Select2 on the state select element
        $(stateSelect).empty().select2({
            placeholder: 'Search or select state...',
            allowClear: true // Add an option to clear the selection
        });

        // Fetch states from the API
        fetch(`${config.cUrl}/${selectedCountryCode}/states`, { headers: { "X-CSCAPI-KEY": config.ckey } })
            .then(response => response.json())
            .then(data => {
                // Map states data to Select2 compatible format
                const statesData = data.map(state => ({ id: state.iso2, text: state.name }));

                statesData.unshift({ id: '', text: 'Select State'});
                // Add the states data to the Select2 dropdown
                $(stateSelect).select2({
                    data: statesData
                });
            })
            .catch(error => console.error('Error loading states:', error));
    }
    function loadCities() {
        citySelect.disabled = false;
        citySelect.style.pointerEvents = 'auto';

        const selectedCountryCode = countrySelect.value;
        const selectedStateCode = stateSelect.value;
        // console.log(selectedCountryCode, selectedStateCode);

        citySelect.innerHTML = ''; // Clear existing options

        // Initialize Select2 on the city select element
        $(citySelect).empty().select2({
            placeholder: 'Search or select city...',
            allowClear: true // Add an option to clear the selection
        });

        // Fetch cities from the API
        fetch(`${config.cUrl}/${selectedCountryCode}/states/${selectedStateCode}/cities`, { headers: { "X-CSCAPI-KEY": config.ckey } })
            .then(response => response.json())
            .then(data => {
                // Map cities data to Select2 compatible format
                const citiesData = data.map(city => ({ id: city.name, text: city.name }));
                citiesData.unshift({ id: '', text: 'Select City'});
                // Add the cities data to the Select2 dropdown
                $(citySelect).select2({
                    data: citiesData
                });
            })
            .catch(error => console.error('Error loading cities:', error));
    }
    window.onload = loadCountries


        
       

  
    $(document).ready(function(){
         $('.country').change(function() {
            // Get the selected option's text
            var selectedOptionText = $(this).find('option:selected').text();
              if (selectedOptionText === "Select Country") {
            $('#hidden_country_name').val(''); // Set to empty if "Select City"
            } else {
              $('#hidden_country_name').val(selectedOptionText);
            }
            
            
         });
         
          $('.state').change(function() {
            // Get the selected option's text
            var selectedOptionText = $(this).find('option:selected').text();
             if (selectedOptionText === "Select State") {
            $('#hidden_state_name').val(''); // Set to empty if "Select City"
            } else {
               $('#hidden_state_name').val(selectedOptionText);
            }
        // Set the value of the hidden input field to the selected option's text
        
    });
    $('#city').change(function() {
    
    // Get the selected option's text
    var selectedOptionText = $(this).find('option:selected').text();
    
    // Check if the selected option's text is "Select City"
    if (selectedOptionText === "Select City") {
        $('#hidden_city_name').val(''); // Set to empty if "Select City"
    } else {
        $('#hidden_city_name').val(selectedOptionText); // Set to the selected option's text
    }
});
    });
</script>