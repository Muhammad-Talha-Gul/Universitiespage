<div class="modal " id="modal-property-languages" data-toggle="modal" style='margin-top:220px;'>
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
                        <input type="text" name="last_education" class="form-control" placeholder="Enter Your Last Education">
                    </div>
                    </div>
                    <div class="row input m-0">
                    <div class="col-md-6 mb-3">
          
                    <select class="form-control country" aria-label="Default select example" onchange="loadStates()">
                                    <option selected>Select Country</option>
                                </select>
                    </div>
                    <div class="col-md-6 mb-3">
                  
                    <select class="form-control state" aria-label="Default select example" onchange="loadCities()" id='state' name='state'>
                    <option selected>Select State</option>
                    </select>
                    </div>
                    </div>
                    <div class="row input m-0 mt-1">
                        <div class="col-md-6 mb-3">
                    <select class="form-control city" aria-label="Default select example" id='city' name='city'>
                        <option selected>Select City</option>
                    </select></div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="apply_for" class="form-control" placeholder="Apply For">
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" onclick="FormSubmit(this)">Submit</button>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript" src="<?php echo e(asset('assets_frontend/js/jquery.js')); ?>"></script>
<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="<?php echo e(asset('assets_frontend/js/axios.js')); ?>"></script>
<script>
    function FormSubmit(input){
        $(':input').removeClass('has-error');
        $('.error-span').remove();
        axios.post('/free-consulation',$('#ratingForm').serialize()).then(function (response) {
            if (response.data.status == 'success'){
                swal({
                    title: response.data.msg,
                    icon: "success",
                }).then(data =>{
                    window.location.reload()
                });
            }else if(response.data.status == 'error'){
                $(input).attr('disabled',false);
                $('.alert-danger').text(response.data.msg);
                $('.alert-danger').show();
            }
        }).catch(function (error){
            $(input).attr('disabled',false);
            $.each(error.response.data.errors, function (k, v) {
                $('input[name="' + k + '"]').addClass("has-error");
                $('input[name="' + k + '"]').after("<span class='error-span'>" + v[0] + "</span>");
            });
        });
    }
        var config = {
    cUrl: 'https://api.countrystatecity.in/v1/countries',
    ckey: 'NHhvOEcyWk50N2Vna3VFTE00bFp3MjFKR0ZEOUhkZlg4RTk1MlJlaA=='
}
  var countrySelect = document.querySelector('.country'),
    stateSelect = document.querySelector('.state'),
    citySelect = document.querySelector('.city')


// function loadCountries() {

//     let apiEndPoint = config.cUrl

//     fetch(apiEndPoint, {headers: {"X-CSCAPI-KEY": config.ckey}})
//     .then(Response => Response.json())
//     .then(data => {

//         data.forEach(country => {
//             const option = document.createElement('option')
//             option.value = country.iso2
//             option.textContent = country.name 
//             countrySelect.appendChild(option)
//         })
//     })
//     .catch(error => console.error('Error loading countries:', error))

//     stateSelect.disabled = true
//     citySelect.disabled = true
//     stateSelect.style.pointerEvents = 'none'
//     citySelect.style.pointerEvents = 'none'
// }


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


// for country dropdown

// function loadStates() {
//     stateSelect.disabled = false
//     citySelect.disabled = true
//     stateSelect.style.pointerEvents = 'auto'
//     citySelect.style.pointerEvents = 'none'

//     const selectedCountryCode = countrySelect.value
//     // console.log(selectedCountryCode);
//     stateSelect.innerHTML = '<option value="">Select State</option>' // for clearing the existing states
//     citySelect.innerHTML = '<option value="">Select City</option>' // Clear existing city options

//     fetch(`${config.cUrl}/${selectedCountryCode}/states`, {headers: {"X-CSCAPI-KEY": config.ckey}})
//     .then(response => response.json())
//     .then(data => {
//         // console.log(data);

//         data.forEach((state,index) => {
//             const option = document.createElement('option')

//             option.value = state.iso2
//             option.textContent = state.name 
//             stateSelect.appendChild(option)
//         })
//     })
//     .catch(error => console.error('Error loading countries:', error))
// }


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

            // Add the states data to the Select2 dropdown
            $(stateSelect).select2({
                data: statesData
            });
        })
        .catch(error => console.error('Error loading states:', error));
}



// function for cities
// function loadCities() {
//     citySelect.disabled = false
//     citySelect.style.pointerEvents = 'auto'

//     const selectedCountryCode = countrySelect.value
//     const selectedStateCode = stateSelect.value
//     // console.log(selectedCountryCode, selectedStateCode);

//     citySelect.innerHTML = '<option value="">Select City</option>' // Clear existing city options

//     fetch(`${config.cUrl}/${selectedCountryCode}/states/${selectedStateCode}/cities`, {headers: {"X-CSCAPI-KEY": config.ckey}})
//     .then(response => response.json())
//     .then(data => {
//         // console.log(data);
      
//         data.forEach(city => {
//             const option = document.createElement('option')
//             option.value = city['name']
//             option.textContent = city.name 
//             citySelect.appendChild(option)
//         })
//     })
// }

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

            // Add the cities data to the Select2 dropdown
            $(citySelect).select2({
                data: citiesData
            });
        })
        .catch(error => console.error('Error loading cities:', error));
}



window.onload = loadCountries
</script>