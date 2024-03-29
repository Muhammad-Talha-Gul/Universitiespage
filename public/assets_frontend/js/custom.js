$(document).ready(function () {
  // alert("The paragraph was clicked.");
  $(".course_search").click(function () {
    $(".course-button").addClass("active");
  });

  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    freeMode: true,
    spaceBetween: 30,
    // centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },

  });

  function getRandomColor() {
    var colors = ['orange', '#3a853a']; // Define the two colors
    return colors[Math.floor(Math.random() * colors.length)];
  }
  
  // Continuous color change every 0.5 seconds
  $(document).ready(function() {
    setInterval(function() {
      var newColor = getRandomColor();
      $('.span-on:last').css('background-color', newColor);
    }, 300);
  });
  $('.span-on:last ').addClass('last-item');
  
    var swiper = new Swiper(".top-swiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });

    $('.datepicker-autoclose').datepicker({
      format: "yyyy-mm-dd",
      weekStart: 1,
      orientation: "bottom",
      keyboardNavigation: false,
      viewMode: "years",
      autoclose: true,
    });



  //   setInterval(function() {
  //     $('.largest-icon').toggleClass('flipped');
  // }, 500);
  setInterval(function() {
    $('.largest-icon').toggleClass('img-hidden');
  $('.largest-portal-paragraph').toggleClass('blue');

}, 500);

$('.whatsapp_floating_trigger').addClass('animate');

setInterval(function() {
  $('.message-box').show();
  $('.whatsapp_floating_trigger span').show();

}, 5000);
$('.select2').select2();

document.addEventListener("DOMContentLoaded", function() {
  var lazyloadImages = document.querySelectorAll("img.lazyload");
  lazyloadImages.forEach(function(img) {
      img.setAttribute("src", img.getAttribute("data-src"));
  });
});


    var selectedCountry = localStorage.getItem('selectedCountry');
    
    // If a value is found in local storage, set the dropdown value
    if(selectedCountry) {
        $('#countryDropdown').val(selectedCountry);
    }
    
    // Listen for change events on the dropdown
    $('#countryDropdown').change(function() {
        // Store the selected value in local storage
        var selectedValue = $(this).val();
        localStorage.setItem('selectedCountry', selectedValue);
    });

    setTimeout(function() {
			$('.alert-success').fadeOut('slow');
		}, 5000); 

    const observer = lozad('.lazyload');
    observer.observe();

});