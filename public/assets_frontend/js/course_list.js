const getOption = obj => '<li><label><input type="checkbox" name="country" value="' + obj.id + '"> ' + obj.title + '</label></li>';
const cGetInput = obj => obj.getElementsByTagName('input')[0];
const cGetValue = obj => '&country=' + cGetInput(obj).value
const cFilter = obj => cGetInput(obj).checked == true
const cFilterUnchecked = obj => cGetInput(obj).checked == false
const maxCountries = 3;

function initCheckBoxValidation () {
    var clist = [].slice.call(document.getElementById('id_country').children);
    clist.map(cGetInput).forEach(function (element, index){
        element.addEventListener("click", function(e){
            if (clist.filter(cFilter).length == maxCountries) {
                clist.filter(cFilterUnchecked).map(cGetInput).forEach(function (element) {
                    element.disabled = true;
                    element.parentElement.style['color'] = 'grey';
                });
            } else {
                clist.filter(cFilterUnchecked).map(cGetInput).forEach(function (element) {
                    element.disabled = false;
                    element.parentElement.style['color'] = 'black';
                });
            }
        });
    });
}

function populateCountryModal(subject_id, study_type, qualification) {
    const data = 'subject_id='+subject_id+'&study_type='+study_type+'&qualification='+qualification;
    const csrftoken = document.getElementsByName('csrfmiddlewaretoken')[0].value;
    var country_select = document.getElementById('id_country');
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                resp = JSON.parse(xhr.responseText);
                country_select.innerHTML = '';
                options = resp.countries.map(getOption).join('');
                country_select.innerHTML += options;
                country_select.classList.remove('no-content');
                initCheckBoxValidation();
            }
            else {
                alert('Server Side Error!');
            }
        }
    };
    xhr.open("POST", "/api/populate-country-data/");
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader("X-CSRFToken", csrftoken);
    xhr.send(data);
}

var search_buttons = [].slice.call(document.getElementsByClassName("js-courseListModal"));
var country_select = document.getElementById('id_country');
var study_type = document.getElementById('id_study_type').dataset.value;
var qualification = document.getElementById('id_qualification').dataset.value;
var modal_submit = document.getElementById('modal_submit');
var subject = null;
search_buttons.forEach(function (element, index){
    element.addEventListener("click", function(e){
        subject = element.dataset.value;
        country_select.innerHTML = '';
        country_select.classList.add('no-content');
        populateCountryModal(subject, study_type, qualification);
    });
});
modal_submit.addEventListener("click", function(e){
    var clist = [].slice.call(country_select.children);
    var countries = clist.filter(cFilter).map(cGetValue).join('')
    var url = this.href + countries + '&subject=' + subject;
    this.href = url;
});


jQuery("#imageSlider3").owlCarousel({
    autoplay: true,
    rewind: true, /* use rewind if you don't want loop */
    margin: 20,
     /*
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    */
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 7000,
    smartSpeed: 800,
    nav: true,
    responsive: {
      0: {
        items: 1
      },
  
      600: {
        items: 3
      },
  
      1024: {
        items: 4
      },
  
      1366: {
        items: 4
      }
    }
  });