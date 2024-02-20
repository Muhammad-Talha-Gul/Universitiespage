(()=>{
    var enquiry_form_meta = enquiry_form_meta || null;
    const API_URL = location.origin + "/api/institution-enquiry/";
    const $form = document.getElementById('EnquiryForm');
    const $nationality = document.getElementById('id_nationality');
    const $country = document.getElementById('id_country');
    const $phone_number = document.getElementById('id_phone_number');
    const $err_phone_number = document.getElementById('err_phone_number');
    const $spinner = $form.querySelector('[data-spinner]');

    function show_error($field, show) {
        $field.style.display = show ? '' : 'none';
    }

    function toggle_spinner() {
        [$spinner.className, $spinner.dataset.spinner] = [$spinner.dataset.spinner, $spinner.className];
    }

    function submit_form() {
        const form_data = formToObject($form);
        toggle_spinner();
        ajax.post(API_URL, form_data, response => {
            const data = JSON.parse(response);

            if (data.success) {
                const thankyou_data = {
                    country: enquiry_form_meta && enquiry_form_meta.country ? enquiry_form_meta.country : form_data.country,
                    subject: form_data.subject || '',
                    qualification: form_data.qualification || '',
                    transaction_id: data.transaction_id,
                };
                location.href = `${location.origin}/thankyou/?${objectToQueryString(thankyou_data)}`;
            } else {
                if (data.errors.limited) {
                    alert('Too many request from your browser, Please wait for a while and continue');
                }
                show_error($err_phone_number, data.errors.phone_number);
                toggle_spinner();
            }
        });
    }

    function init_enquiry_form() {

        const update_prefix = () => updatePrefix($country, $phone_number);

        if ($nationality) populateCountrySelect($nationality);
        if ($country) {
            populateCountrySelect($country, true);
            $country.onchange = update_prefix;
        }

        var request_data = {};
        if (enquiry_form_meta && enquiry_form_meta.institution_id) {
            request_data.institution_id = enquiry_form_meta.institution_id;
        }
        if (enquiry_form_meta && enquiry_form_meta.session_country) {
            $country.value = enquiry_form_meta.session_country;
            if ($nationality) {
                $nationality.value = enquiry_form_meta.session_nationality;
            }
        } else {
            ajax.get(API_URL, request_data, response => {
                var data = JSON.parse(response);
                if ($country && data.country_code) {
                    $country.value = data.country_code.toLowerCase();
                    update_prefix();
                }
                if ($nationality && data.nationality) {
                    $nationality.value = data.nationality.toLowerCase();
                }
            });
        }

        $form.addEventListener('submit', event => {
            event.preventDefault();
            const valid_phone = libphonenumber.isValidNumber($phone_number.value);
            if (!valid_phone) {
                $phone_number.setCustomValidity($phone_number.dataset.error);
                return false;
            }
            submit_form();
        });
        $phone_number.onchange = () => $phone_number.setCustomValidity('');
    }

    document.addEventListener('DOMContentLoaded', init_enquiry_form);

})();
