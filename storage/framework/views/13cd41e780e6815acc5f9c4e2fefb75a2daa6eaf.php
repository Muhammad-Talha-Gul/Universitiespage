<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,minimum-scale=1, initial-scale=1">

  <meta property="og:image" content="https://www.universitiespage.com/filemanager/photos/1/thumbs/5d98611365165.png" />
  <meta property="og:image:secure_url" content="https://www.universitiespage.com/filemanager/photos/1/thumbs/5d98611365165.png" />
  <meta property="og:image:type" content="image/png" />
  <meta property="og:image:width" content="400" />
  <meta property="og:image:height" content="300" />
  <meta property="og:image:alt" content="veiversities page" />
  <!--<input type="text" value="<?php echo e(csrf_token()); ?>" >-->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <link rel="icon" href="<?php echo e(asset('fav.png')); ?>" type="image/x-icon" />
  <title><?php echo $__env->yieldContent('title'); ?> </title>

  <?php echo $__env->yieldContent('seo'); ?>

  <?php if(isset($data)): ?>
  <?php $page = $data; ?>
  <?php endif; ?>
  <?php if(isset($category_page)): ?>
  <?php $page = $category_page; ?>
  <?php endif; ?>
  <?php if(isset($page['seo']->show_meta)): ?>
  <?php if($page['seo']->meta_title!=null): ?>

  <?php
  // if(!empty($_GET['type']) && ($_GET['type'] == 'course' || $_GET['type'] == 'university') )
  // {
  $meta_title_with_new_year = $page['seo']->meta_title;
  $firstYear_meta = date('Y') - 10;
  $lastYear_meta = $firstYear_meta + 10;

  for ($i = $firstYear_meta; $i <= $lastYear_meta; $i++) {
    $meta_title_with_new_year = str_replace($i, $lastYear_meta, $meta_title_with_new_year);
  }
  // }
  ?>

  <meta name="title" content="<?php echo $meta_title_with_new_year; ?>">
  <?php else: ?>
  <meta name="title" content="Web Development Company in Pakistan, Affordable Website Design Services">
  <?php endif; ?>

  <?php
  $urlForUniSub = $_SERVER['REQUEST_URI'];

  // if(!empty($_GET['type']) && ($_GET['type'] == 'course' || $_GET['type'] == 'university') )
  // {

  $meta_keyword_with_new_year = $page['seo']->meta_keywords;
  $firstYear_meta = date('Y') - 10;
  $lastYear_meta = $firstYear_meta + 10;

  for ($i = $firstYear_meta; $i <= $lastYear_meta; $i++) {
    $meta_keyword_with_new_year = str_replace($i, $lastYear_meta, $meta_keyword_with_new_year);
  }
  // }
  // else if(!empty($urlForUniSub))
  // {
  //     $str = ltrim($url, '/');
  //     $universityCourse =  substr($str, 0, strpos($str, '/'));
  //     if($universityCourse == 'university')
  //     {
  //         $meta_keyword_with_new_year = $page['seo']->meta_keywords;
  //         $firstYear_meta = date('Y') - 10;
  //         $lastYear_meta = $firstYear_meta+10;

  //         for($i=$firstYear_meta;$i<=$lastYear_meta;$i++)
  //         {
  //             $meta_keyword_with_new_year = str_replace($i, $lastYear_meta, $meta_keyword_with_new_year);
  //         }
  //     }
  // }

  ?>

  <?php

  // if(!empty($_GET['type']) && ($_GET['type'] == 'course' || $_GET['type'] == 'university' || $_GET['type'] == 'visa' || $_GET['type'] == 'guides' || $_GET['type'] == 'blog') )
  // {
  $meta_description_with_new_year = $page['seo']->meta_description;
  $firstYear_meta = date('Y') - 10;
  $lastYear_meta = $firstYear_meta + 10;

  for ($i = $firstYear_meta; $i <= $lastYear_meta; $i++) {
    $meta_description_with_new_year = str_replace($i, $lastYear_meta, $meta_description_with_new_year);
  }
  // }
  // else if(!empty($urlForUniSub))
  // {
  //     $str = ltrim($url, '/');
  //     $universityCourse =  substr($str, 0, strpos($str, '/'));

  //     if($universityCourse == 'university')
  //     {
  //         $meta_description_with_new_year = $page['seo']->meta_description;
  //         $firstYear_meta = date('Y') - 10;
  //         $lastYear_meta = $firstYear_meta+10;

  //         for($i=$firstYear_meta;$i<=$lastYear_meta;$i++)
  //         {
  //             $meta_description_with_new_year = str_replace($i, $lastYear_meta, $meta_description_with_new_year);
  //         }
  //     }

  // }


  ?>

  <meta name="keywords" content="<?php echo isset($meta_keyword_with_new_year) ? $meta_keyword_with_new_year : ''; ?>">
  <meta name="description" content="<?php echo isset($meta_description_with_new_year) ? $meta_description_with_new_year : ''; ?>">
  <?php endif; ?>

  <!-- Icon css link -->
  <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/ltr.css')); ?>">
  <link type="text/css" href="<?php echo e(asset("plugins/select2/css/select2.min.css")); ?>" rel="stylesheet" />
  <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/animate.min.css')); ?>">
  <link type="text/css" href="<?php echo e(asset('assets_frontend/css/aos.css')); ?>" rel="stylesheet">
  <link type="text/css" href="<?php echo e(asset('assets_frontend/dist/css/datepicker.css')); ?>" rel="stylesheet">

  <link rel="canonical" href="https://universitiespage.com<?php echo $_SERVER['REQUEST_URI']; ?>">
  <style>
    .no-js #loader {
      display: none;
    }

    .js #loader {
      display: block;
      position: absolute;
      left: 100px;
      top: 0;
    }

    .se-pre-con {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 99999;
      background-color: white !important;
    }

    .error-span {
      color: red;
    }

    .has-error {
      border: 1px solid red;
    }
  </style>




  <?php if(getAnalyticsCode() !== ''): ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e(getAnalyticsCode()); ?>">
  </script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', '<?php echo e(getAnalyticsCode()); ?>');
  </script>
  <?php endif; ?>


  <script src="<?php echo e(asset('assets_frontend/js/vendor/siema.min.js')); ?>"></script>
  <?php echo $__env->yieldPushContent('css'); ?>
  <?php echo $__env->yieldContent('customStyles'); ?>
  <?php echo $__env->yieldContent('chatterCss'); ?>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <link rel="stylesheet" href="<?php echo e(asset('assets_frontend')); ?>/css/whatsapp-chat.css?ver=0.30">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_frontend/css/custom.css?ver=0.30')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_frontend/css/new_style.min.css?ver=0.30')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_frontend/css/pages.css?ver=0.30')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_frontend/css/responsive.css?ver=0.30')); ?>">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-148598570-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-148598570-1');
  </script>


  <meta name="google-site-verification" content="0m6HCXV8Q3bfrzUtFlbjTfMonzj2d7wSNKmCRV-XV1k" />
  <meta name="facebook-domain-verification" content="52mr3v1uckv3bzx5zkf5yi4cag51eq" />

  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Universities Pages",
      "url": "https://www.universitiespage.com",
      "logo": "https://www.universitiespage.com/filemanager/photos/1/thumbs/5d98611365165.png",
      "alternateName": "University college school education | Want to study abroad | Find the prefect courses  and universities to meet your educational goals"
    }
  </script>
  <?php echo $__env->yieldContent('schemaMarkup'); ?>

  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-N6TNFD4');
  </script>
  <!-- End Google Tag Manager -->

  <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" defer></script>
  <script>
    window.OneSignal = window.OneSignal || [];
    OneSignal.push(function() {
      OneSignal.init({
        appId: "4d179767-ad5c-49d4-9a4b-42448a90a9ee",
      });
    });
  </script>


</head>

<!-- Meta Pixel Code -->
<script>
  ! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '707529750730580');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=707529750730580&ev=PageView&noscript=1" /></noscript>
<!-- End Meta Pixel Code -->

<body class="t-home s-global oua-pub condensed__list--active">



  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N6TNFD4" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->



  <input type="hidden" id="baseUrl" value="<?php echo e(url('/')); ?>">
  <input type="hidden" id="authCheck" value="<?php echo e(Auth::check()); ?>">
  <input type="hidden" id="chat_key" value="<?php echo e((getContactMeta()['pusher']['key'])??''); ?>">
  <input type="hidden" id="cluster" value="<?php echo e((getContactMeta()['pusher']['cluster'])??''); ?>">
  <?php if(Auth::check()): ?>
  <input type="hidden" id="authId" value="<?php echo e(Auth::user()->id); ?>">
  <input type="hidden" id="authType" value="<?php echo e(Auth::user()->user_type); ?>">
  <?php endif; ?>

  <div class="t_loader" align="center">
    <img src="<?php echo e(asset('page_loader.gif')); ?>">
  </div>

  <?php echo $__env->make('includes.frontend.contact_form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php echo $__env->make('includes.frontend.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php echo $__env->yieldContent('content'); ?>

  <?php echo $__env->make('includes.frontend.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php echo $__env->make('frontend.student.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  
  <script type="text/javascript" src="<?php echo e(asset('assets_frontend/js/jquery.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets_frontend/js/popper.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets_frontend/js/bootstrap.min.js')); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

  
  <script type="text/javascript" src="<?php echo e(asset('assets_frontend/js/vendor.js')); ?>"></script>
  
  
  <script type="text/javascript" src="<?php echo e(asset('assets_frontend/dist/js/datepicker.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets_frontend/dist/js/i18n/datepicker.en.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets_frontend/js/moment.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets_frontend/js/vue.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets_frontend/js/axios.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset("plugins/select2/js/select2.min.js")); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets_frontend/js/aos.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('js/app.js')); ?>"></script>
  <!-- Include lozad.js library -->
  <script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets_frontend')); ?>/js/whatsapp-chat.js?ver=0.30"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets_frontend/js/custom.js?ver=0.30')); ?>"></script>
  <style>
    .ayoan_whatsapp_chatbox_container {
      z-index: 1000;
      width: 375px !important;
    }

    .ayoan_whatsapp_chatbox .widget-header {
      padding: 22px 21px;
    }

    @media  screen and (max-width: 770px) {
      .ayoan_whatsapp_chatbox_container {
        width: 314px !important;
        /* height: 58vh !important; */
      }

      .ayoan_whatsapp_chatbox .widget-header {
        padding: 9px 8px !important;
        height: 94px !important;

      }

      .ayoan_whatsapp_chatbox .widget-header .ayoan_col-1 .header-icon {
        width: 31px !important;
      }
    }
  </style>
  <script type="text/javascript">
    whatsappchat.multipleUser({
      selector: '#example',
      users: [{
          name: 'Lahore Branch',
          phone: '923112853194',
          designation: 'universitiespage.com',
          image: 'https://universitiespage.com/assets/female-avatar.jpg'
        },
        {
          name: 'Islamabad Branch',
          phone: '923359990308',
          designation: 'universitiespage.com',
          image: 'https://universitiespage.com/assets/female-avatar.jpg'

        },
      ],
      headerMessage: 'Feel free to ask any questions in <strong>WhatsApp</strong>',
      chatBoxMessage: 'Team replies in a minute',
      color: '#25D366',
    });
  </script>


  <script>
    function consulation() {
      $('#modal-property-languages').modal('toggle');
    }
  </script>

  <script>
    AOS.init();
    window.addEventListener("load", function() {});
    var slideIndex = 0;

    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1
      }
      if (slides[slideIndex - 1] !== undefined) {
        slides[slideIndex - 1].style.display = "block";
      }
      setTimeout(showSlides, 6000); // Change image every 2 seconds
    }
    showSlides();

    var carousel = new Siema({
      selector: '#featuredUnis',
      perPage: {
        0: 1,
        700: 2,
        1000: 3
      },
      duration: 700,
      loop: true,
    });
    setInterval(_ => carousel.next(), 4000);
    var carsel = new Siema({
      selector: '#featuredCourses',
      perPage: {
        0: 1,
        700: 2,
        1000: 3
      },
      duration: 700,
      loop: true,
    });
    setInterval(_ => carsel.next(), 4000);
  </script>
  <?php echo $__env->yieldContent('customScripts'); ?>
  <?php echo $__env->yieldContent('chatterJs'); ?>
  <?php echo $__env->yieldPushContent('scripts'); ?>
  <script>
    $(document).ready(function() {
      $('#Country').attr("selected", "selected");
      $('body').on('submit', '.comment-form', function(e) {
        e.preventDefault();
        var ret = 0;
        $('.comment-form').find('input').each(function() {
          if ($(this).val() == null) {
            ret = 1;
          }
        })
        if (ret) {
          return false;
        }
        $('.comment-button').prop('disabled', true);
        $('.comment-button').val('Submitting...');
        setTimeout(function() {
          $('.comment-button').prop('disabled', false);
          $('.comment-button').val('Submit');
        }, 10000)
        var data = $(this).serialize();
        $.ajax({
          url: "<?php echo e(url('send-comment')); ?>",
          type: 'post',
          data: data,
          success: function(response) {
            $('.comment-button').prop('disabled', false);
            $('.comment-button').val('Submit');
            if (response) {
              $('.comment-form').find('input').each(function() {
                if ($(this).attr('name') !== '_token') {
                  $(this).val('');
                }
              })
              $('.comment-form textarea').val('');
              $('.alert-success').fadeIn(200).delay(5000).fadeOut(200);
            } else {
              $('.alert-danger').fadeIn(200).delay(5000).fadeOut(200);
            }
          }
        });
      });

      $(document).on('click', '.login-as-student', function() {
        $('.registration-form').fadeOut(300);
        $('.login-form').delay(300).fadeIn(300);
      });
      $(document).on('click', '.register-as-student', function() {
        $('.login-form').fadeOut(300);
        $('.registration-form').delay(300).fadeIn(300);
      });

      $(document).on('click', '.logedin-user', function() {
        if ($('.dropdown-login-user').is(':visible')) {
          $(this).parent().find('.dropdown-login-user').fadeOut(300);
        } else {
          $(this).parent().find('.dropdown-login-user').fadeIn(300);
        }
      });
      $('body').on('click', function() {
        $('.dropdown-login-user').fadeOut(300);
      });
      $(document).on('click', '.logout-btn', function() {
        $('#logout-form').submit();
      });
      $(document).on('click', function(e) {
        $('.dropdown-noti').fadeOut(300)
      });
      $(document).on('click', '.notification-btn', function(e) {
        e.stopPropagation();
        if ($(this).next('.dropdown-noti').is(':visible')) {
          $(this).next('.dropdown-noti').fadeOut(300)
        } else {
          $(this).next('.dropdown-noti').fadeIn(300)
        }
      });
      $(document).on('click', '.dropdown-noti', function(e) {
        e.stopPropagation()
      });
    });
    $(window).load(function() {
      $(".se-pre-con").fadeOut("slow");
    });
    $(document).on('keyup', '.login-student input', function() {
      $('#ResetMsg').text('');
    });
    $(document).on('submit', '.login-student', function(e) {
      e.preventDefault();
      var data = $(this).serialize();
      $(this).find('.submit-btn').attr('disabled', true);
      $(this).find('.submit-btn').text('Submitting');
      var _this = $(this);
      setTimeout(function() {
        _this.find('.submit-btn').attr('disabled', false);
        _this.find('.submit-btn').text('Submit');
      }, 4000);
      $.ajax({
        url: '<?php echo e(url("login")); ?>',
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function(data) {
          _this.find('.submit-btn').attr('disabled', false);
          _this.find('.submit-btn').text('Submit');
          if (data.type == 'student') {
            window.location.href = 'dashboard';
          } else if (data.type == 'consultant') {
            window.location.href = 'dashboard';
          } else {
            window.location.href = data.url;
          }
        },
        error: function(data) {

          if (isJson(data.responseText)) {

            var resp = JSON.parse(data.responseText);

            if (typeof resp['errors']['email'][0] !== 'undefined') {
              _this.find("#ResetMsg").text(resp['errors']['email'][0]);
            }

          }
          else {
            window.location.href = 'dashboard';
          }
          _this.find('.submit-btn').attr('disabled', false);
          _this.find('.submit-btn').text('Submit');
        },
      })
    });

    
    function isJson(str) {
      try {
        JSON.parse(str);
      } catch (e) {
        return false;
      }
      return true;
    }
  </script>

  <script>
    
    var registerValidate = new Vue({
      el: '#register-validate',
      data: {
        url: "<?php echo e(route('student.store')); ?>",
        baseUrl: '<?php echo e(preg_match("~\b(university/|courses)\b~i",url()->current())?url()->current():url("/")."/dashboard"); ?>',

        list: {
          user_type: 'student',
          first_name: '',
          last_name: '',
          email: '',
          password: '',
          password_confirmation: '',
          phone: '',
          gender: 'male',
          country: '',
          prefer: '',
          terms: '',
          _token: '<?php echo e(csrf_token()); ?>',
        },
        errors: {},
        counter: 1,
      },
      created() {

      },
      methods: {
        submitReg(event) {
          event.preventDefault();
          var _this = this;
          if (!$('.t_loader').is(':visible')) {
            $('.t_loader').fadeIn(200)
          }
          axios.post(_this.url, _this.list)
            .then(response => {
              window.location.href = _this.baseUrl;
            }).catch(error => {
              _this.errors = error.response.data.errors;
              setTimeout(() => {
                _this.errors = {};
              }, 5000);
              if (_this.counter < 5) {
                _this.submitReg(event);
                _this.counter++;
              } else {
                if ($('.t_loader').is(':visible')) {
                  $('.t_loader').fadeOut(200)
                }
              }
            });
        },
      },
      mounted() {
        var _this = this;
        $(document).ready(function() {
          $('.prefer-select').on('click', function() {
            var val = $(this).val();
            _this.list.prefer = val;
          });
          $('.country-select').on('click', function() {
            var val = $(this).val();
            _this.list.country = val;
          });
        });
      },
    });
    
    var registerValidate = new Vue({
      el: '#registerValidate',
      data: {
        url: "<?php echo e(route('student.store')); ?>",
        baseUrl: '<?php echo e(preg_match("~\b(university/|courses)\b~i",url()->current())?url()->current():url("/")."/dashboard"); ?>',
        list: {
          user_type: 'student',
          first_name: '',
          last_name: '',
          email: '',
          password: '',
          password_confirmation: '',
          phone: '',
          gender: 'male',
          country: '',
          prefer: '',
          terms: '',
          _token: '<?php echo e(csrf_token()); ?>',
        },
        errors: {},
        counter: 1,
      },
      created() {

      },
      methods: {
        submitReg(event) {
          event.preventDefault();
          var _this = this;
          if (!$('.t_loader').is(':visible')) {
            $('.t_loader').fadeIn(200)
          }
          axios.post(_this.url, _this.list)
            .then(response => {
              window.location.href = _this.baseUrl;
            }).catch(error => {
              _this.errors = error.response.data.errors;
              setTimeout(() => {
                _this.errors = {};
              }, 5000);
              if (_this.counter < 5) {
                _this.submitReg(event);
                _this.counter++;
              } else {
                if ($('.t_loader').is(':visible')) {
                  $('.t_loader').fadeOut(200)
                }
              }
            });
        },
      },
      mounted() {
        var _this = this;
        $(document).ready(function() {
          $('.prefer-select').on('click', function() {
            var val = $(this).val();
            _this.list.prefer = val;
          });
          $('.country-select').on('click', function() {
            var val = $(this).val();
            _this.list.country = val;
          });
        });
      },
    });

     var registerValidate = new Vue({
      el: '#registerValidateConsult',
      data: {
        url: "<?php echo e(route('student.store')); ?>",
        baseUrl: '<?php echo e(preg_match("~\b(university/|courses)\b~i",url()->current())?url()->current():url("/")."/dashboard"); ?>',
        list: {
          user_type: 'consultant',
          first_name: '',
          last_name: '',
          email: '',
          password: '',
          password_confirmation: '',
          phone: '',
          gender: 'male',
          country: '',
          prefer: '',
          company_name: '',
          employeeno: '',
          state: '',
          designation: '',
          comment: '',
          terms: '',
          _token: '<?php echo e(csrf_token()); ?>',
        },
        errors: {},
        counter: 1,
      },
      created() {

      },
      methods: {
        submitReg(event) {
          event.preventDefault();
          var _this = this;
          if (!$('.t_loader').is(':visible')) {
            $('.t_loader').fadeIn(200)
          }
          axios.post(_this.url, _this.list)
            .then(response => {
              window.location.href = _this.baseUrl;
            }).catch(error => {
              _this.errors = error.response.data.errors;
              setTimeout(() => {
                _this.errors = {};
              }, 5000);
              if (_this.counter < 5) {
                _this.submitReg(event);
                _this.counter++;
              } else {
                if ($('.t_loader').is(':visible')) {
                  $('.t_loader').fadeOut(200)
                }
              }
            });
        },
      },
      mounted() {
        var _this = this;
        $(document).ready(function() {
          $('.prefer-select').on('click', function() {
            var val = $(this).val();
            _this.list.prefer = val;
          });
          $('.country-select').on('click', function() {
            var val = $(this).val();
            _this.list.country = val;
          });
        });
      },
    });

    var registerValidate = new Vue({
      el: '#register-validateconsult',
      data: {
        url: "<?php echo e(route('student.store')); ?>",
        baseUrl: '<?php echo e(preg_match("~\b(university/|courses)\b~i",url()->current())?url()->current():url("/")."/dashboard"); ?>',
        list: {
          user_type: 'consultant',
          first_name: '',
          last_name: '',
          email: '',
          password: '',
          password_confirmation: '',
          phone: '',
          gender: 'male',
          country: '',
          prefer: '',
          company_name: '',
          employeeno: '',
          state: '',
          designation: '',
          comment: '',
          terms: '',
          _token: '<?php echo e(csrf_token()); ?>',
        },
        errors: {},
        counter: 1,
      },
      created() {

      },
      methods: {
        submitReg(event) {
          event.preventDefault();
          var _this = this;
          if (!$('.t_loader').is(':visible')) {
            $('.t_loader').fadeIn(200)
          }
          axios.post(_this.url, _this.list)
            .then(response => {
              window.location.href = _this.baseUrl;
            }).catch(error => {
              _this.errors = error.response.data.errors;
              setTimeout(() => {
                _this.errors = {};
              }, 5000);
              if (_this.counter < 5) {
                _this.submitReg(event);
                _this.counter++;
              } else {
                if ($('.t_loader').is(':visible')) {
                  $('.t_loader').fadeOut(200)
                }
              }
            });
        },
      },
      mounted() {
        var _this = this;
        $(document).ready(function() {
          $('.prefer-select').on('click', function() {
            var val = $(this).val();
            _this.list.prefer = val;
          });
          $('.country-select').on('click', function() {
            var val = $(this).val();
            _this.list.country = val;
          });
        });
      },
    });
  </script>

  <!-- student modal start -->
  <script>
     var search = new Vue({
      el: '#search-comp',
      data() {
        return {
          baseUrl: '<?php echo e(url("/")); ?>',
          search: '',
          location: '',
          suggestion: {},
          moment: moment
        };
      },
      mounted() {
        $('body').on('click', () => {
          $('.suggestion-box').fadeOut(100);
        });

        $('body').on('click', '.search-btn', () => {
          const searchParams = _this.location !== undefined ? `&location=${this.location}` : '';
          const url = `${this.baseUrl}/search?search=${this.search}${searchParams}`;
          window.location.href = url;
        });

        $('body').on('click', '.suggestion-url', function() {
          window.location.href = $(this).data('url');
        });
      },
      methods: {
        suggest() {
          if (this.search !== '' && this.location !== '') {
            const data = `?search=${this.search}&country=${this.location}`;
            axios
              .get(`${this.baseUrl}/suggestion${data}`)
              .then(response => {
                this.suggestion = response.data;
                $('.suggestion-box').toggle(this.suggestion.uni.length > 0 || this.suggestion.guide.length > 0 || this.suggestion.course.length > 0 || this.suggestion.article.length > 0);
              })
              .catch(error => {});
          } else {
            this.suggestion = {};
            $('.suggestion-box').fadeOut(100);
          }
        },
      }
    });

    // var search = new Vue({
    //   el: '#search-comp',
    //   data: {
    //     baseUrl: '<?php echo e(url("/")); ?>',
    //     search: '',
    //     location: '',
    //     suggestion: {},
    //     moment: moment,
    //   },
    //   created() {},
    //   mounted() {
    //     var _this = this;
    //     $(document).ready(function() {
    //       $('body').on('click', function() {
    //         $('.suggestion-box').fadeOut(100);
    //       })


    //       $('body').on('click', '.search-btn', function() {

    //         //console.log("value: "+_this.location);
    //         //return false;

    //         if (typeof _this.location === 'undefined') {
    //           window.location.href = _this.baseUrl + '/search?search=' + _this.search;
    //         } else {
    //           window.location.href = _this.baseUrl + '/search?search=' + _this.search + '&location=' + _this.location;
    //         }


    //       });
    //       $('body').on('click', '.suggestion-url', function() {
    //         var url = $(this).attr('data-url');
    //         window.location.href = url;
    //       });
    //     })
    //   },
    //   methods: {
    //     suggest(event) {
    //       var _this = this;
    //       if (_this.search !== '' && _this.location !== '') {
    //         var data = '?search=' + _this.search + '&country=' + _this.location;
    //         axios
    //           .get(_this.baseUrl + '/suggestion' + data)
    //           .then(response => {
    //             _this.suggestion = response.data;
    //             if (_this.suggestion.uni.length > 0 || _this.suggestion.guide.length > 0 || _this.suggestion.course.length > 0 || _this.suggestion.article.length > 0) {
    //               $('.suggestion-box').fadeIn(100);
    //             } else {
    //               $('.suggestion-box').fadeOut(100);
    //             }
    //           }).catch(error => {

    //           })
    //       } else {
    //         _this.suggestion = {};
    //         $('.suggestion-box').fadeOut(100);
    //       }

    //     },
    //   }
    // });

    
    // var search = new Vue({
    //   el: '#search-comp',
    //   data: {
    //     baseUrl: '<?php echo e(url("/")); ?>',
    //     search: '',
    //     location: '',
    //     suggestion: {},
    //     moment: moment,
    //   },
    //   created() {},
    //   mounted() {
    //     var _this = this;
    //     $(document).ready(function() {
    //       $('body').on('click', function() {
    //         $('.suggestion-box').fadeOut(100);
    //       })


    //       $('body').on('click', '.search-btn', function() {

    //         //console.log("value: "+_this.location);
    //         //return false;

    //         if (typeof _this.location === 'undefined') {
    //           window.location.href = _this.baseUrl + '/search?search=' + _this.search;
    //         } else {
    //           window.location.href = _this.baseUrl + '/search?search=' + _this.search + '&location=' + _this.location;
    //         }


    //       });
    //       $('body').on('click', '.suggestion-url', function() {
    //         var url = $(this).attr('data-url');
    //         window.location.href = url;
    //       });
    //     })
    //   },
    //   methods: {
    //     suggest(event) {
    //       var _this = this;
    //       if (_this.search !== '' && _this.location !== '') {
    //         var data = '?search=' + _this.search + '&country=' + _this.location;
    //         axios
    //           .get(_this.baseUrl + '/suggestion' + data)
    //           .then(response => {
    //             _this.suggestion = response.data;
    //             if (_this.suggestion.uni.length > 0 || _this.suggestion.guide.length > 0 || _this.suggestion.course.length > 0 || _this.suggestion.article.length > 0) {
    //               $('.suggestion-box').fadeIn(100);
    //             } else {
    //               $('.suggestion-box').fadeOut(100);
    //             }
    //           }).catch(error => {

    //           })
    //       } else {
    //         _this.suggestion = {};
    //         $('.suggestion-box').fadeOut(100);
    //       }

    //     },
    //   }
    // });

        // var search = new Vue({
    //   el: '#search-comp',
    //   data: {
    //     baseUrl: '<?php echo e(url("/")); ?>',
    //     search: '',
    //     location: '',
    //     suggestion: {},
    //     moment: moment,
    //   },
    //   created() {},
    //   mounted() {
    //     var _this = this;
    //     $(document).ready(function() {
    //       $('body').on('click', function() {
    //         $('.suggestion-box').fadeOut(100);
    //       })


    //       $('body').on('click', '.search-btn', function() {

    //         //console.log("value: "+_this.location);
    //         //return false;

    //         if (typeof _this.location === 'undefined') {
    //           window.location.href = _this.baseUrl + '/search?search=' + _this.search;
    //         } else {
    //           window.location.href = _this.baseUrl + '/search?search=' + _this.search + '&location=' + _this.location;
    //         }


    //       });
    //       $('body').on('click', '.suggestion-url', function() {
    //         var url = $(this).attr('data-url');
    //         window.location.href = url;
    //       });
    //     })
    //   },
    //   methods: {
    //     suggest(event) {
    //       var _this = this;
    //       if (_this.search !== '' && _this.location !== '') {
    //         var data = '?search=' + _this.search + '&country=' + _this.location;
    //         axios
    //           .get(_this.baseUrl + '/suggestion' + data)
    //           .then(response => {
    //             _this.suggestion = response.data;
    //             if (_this.suggestion.uni.length > 0 || _this.suggestion.guide.length > 0 || _this.suggestion.course.length > 0 || _this.suggestion.article.length > 0) {
    //               $('.suggestion-box').fadeIn(100);
    //             } else {
    //               $('.suggestion-box').fadeOut(100);
    //             }
    //           }).catch(error => {

    //           })
    //       } else {
    //         _this.suggestion = {};
    //         $('.suggestion-box').fadeOut(100);
    //       }

    //     },
    //   }
    // });

    
  </script>
  <!-- student modal end -->

  <script>
    var notification = new Vue({
      el: '#vue-notification',
      data: {
        notifications: [],
        msg: 0,
        moment: moment,
        baseUrl: document.getElementById('baseUrl').value,
        authCheck: document.getElementById('authCheck').value,
        authToken: '', // This will hold the authentication token
      },
      created() {
        var _this = this;
        setInterval(() => {
          if (_this.authCheck === 'true') { // Check if the user is authenticated
            _this.get_notification();
          }
        }, 11000);

        if (_this.authCheck === 'true') { // Check if the user is authenticated
          _this.get_notification();
        }
      },
      methods: {
        get_notification() {
          var _this = this;
          axios.post(_this.baseUrl + '/user-notifcation', {}, {
            headers: {
              Authorization: 'Bearer ' + _this.authToken // Include the auth token in the request headers
            }
          }).then(response => {
            _this.notifications = response.data.note;
            _this.msg = response.data.msg
          }).catch(error => {
            if (error.response && error.response.status === 401) {
              // User is not authenticated, do nothing or handle as needed
              console.error('User is not authenticated');
            } else {
              console.error('Error fetching notifications:', error);
            }
          });
        },
        read(id) {
          var _this = this;
          axios.post(_this.baseUrl + '/read-notifcation', {
            id: id
          }, {
            headers: {
              Authorization: 'Bearer ' + _this.authToken // Include the auth token in the request headers
            }
          }).then(response => {}).catch(error => {
            console.error('Error marking notification as read:', error);
          });
        }
      },
    });

    // var notification = new Vue({
    //   el: '#vue-notification',
    //   data: {
    //     notifications: [],
    //     msg: 0,
    //     moment: moment,
    //     baseUrl: document.getElementById('baseUrl').value,
    //     authCheck: document.getElementById('authCheck').value,
    //     authToken: '', // This will hold the authentication token
    //   },
    //   created() {
    //     var _this = this;
    //     setInterval(() => {
    //       _this.get_notification()
    //     }, 11000);
    //     _this.get_notification()
    //   },
    //   methods: {
    //     get_notification() {
    //       var _this = this;
    //       axios.post(_this.baseUrl + '/user-notifcation', {}, {
    //         headers: {
    //           Authorization: 'Bearer ' + _this.authToken // Include the auth token in the request headers
    //         }
    //       }).then(response => {
    //         _this.notifications = response.data.note;
    //         _this.msg = response.data.msg
    //       }).catch(errors => {})
    //     },
    //     read(id) {
    //       var _this = this;
    //       axios.post(_this.baseUrl + '/read-notifcation', {
    //         id: id
    //       }, {
    //         headers: {
    //           Authorization: 'Bearer ' + _this.authToken // Include the auth token in the request headers
    //         }
    //       }).then(response => {})
    //     }
    //   },
    // });


     // var notification = new Vue({
    //   el: '#vue-notification',
    //   data: {
    //     notifications: [],
    //     msg: 0,
    //     moment: moment,
    //     baseUrl: document.getElementById('baseUrl').value,
    //     authCheck: document.getElementById('authCheck').value,
    //     authToken: '', // This will hold the authentication token
    //   },
    //   created() {
    //     var _this = this;
    //     setInterval(() => {
    //       _this.get_notification()
    //     }, 11000);
    //     _this.get_notification()
    //   },
    //   methods: {
    //     get_notification() {
    //       var _this = this;
    //       axios.post(_this.baseUrl + '/user-notifcation', {}, {
    //         headers: {
    //           Authorization: 'Bearer ' + _this.authToken // Include the auth token in the request headers
    //         }
    //       }).then(response => {
    //         _this.notifications = response.data.note;
    //         _this.msg = response.data.msg
    //       }).catch(errors => {})
    //     },
    //     read(id) {
    //       var _this = this;
    //       axios.post(_this.baseUrl + '/read-notifcation', {
    //         id: id
    //       }, {
    //         headers: {
    //           Authorization: 'Bearer ' + _this.authToken // Include the auth token in the request headers
    //         }
    //       }).then(response => {})
    //     }
    //   },
    // });

    // var notification = new Vue({
    //   el: '#vue-notification',
    //   data: {
    //     notifications: [],
    //     msg: 0,
    //     moment: moment,
    //     baseUrl: document.getElementById('baseUrl').value,
    //     authCheck: document.getElementById('authCheck').value,
    //     authToken: '', // This will hold the authentication token
    //   },
    //   created() {
    //     var _this = this;
    //     setInterval(() => {
    //       _this.get_notification()
    //     }, 11000);
    //     _this.get_notification()
    //   },
    //   methods: {
    //     get_notification() {
    //       var _this = this;
    //       axios.post(_this.baseUrl + '/user-notifcation', {}, {
    //         headers: {
    //           Authorization: 'Bearer ' + _this.authToken // Include the auth token in the request headers
    //         }
    //       }).then(response => {
    //         _this.notifications = response.data.note;
    //         _this.msg = response.data.msg
    //       }).catch(errors => {})
    //     },
    //     read(id) {
    //       var _this = this;
    //       axios.post(_this.baseUrl + '/read-notifcation', {
    //         id: id
    //       }, {
    //         headers: {
    //           Authorization: 'Bearer ' + _this.authToken // Include the auth token in the request headers
    //         }
    //       }).then(response => {})
    //     }
    //   },
    // });
  </script>
  <!-- consultant modal end -->
  <script>
    $(document).on('click', '.close-quick-contact', function() {
      $(this).parent().css('width', '0px');
      setTimeout(() => {
        $(this).parent().css('border', 'none');
      }, 600);
    })
    $(document).on('click', '.quick-contact-btn', function() {
      if ($(window).width() < 400) {
        $('.quick-contact').css('width', '99%');
      } else {
        $('.quick-contact').css('width', '400px');
      }
      $('.quick-contact').css('border-left', 'solid 3px #c52228');
    })
    $(document).on('click', '.close-quick-chat', function() {
      $(this).parent().css('width', '0px');
      setTimeout(() => {
        $(this).parent().css('border', 'none');
      }, 600);
    })
    $(document).on('click', '.quick-chat-btn', function() {
      if ($(window).width() < 400) {
        $('.quick-chat').css('width', '99%');
      } else {
        $('.quick-chat').css('width', '400px');
      }
      $('.quick-chat').css('border-left', 'solid 3px #464646');
    })
    $(document).on('change', '.search-subject-footer', function() {
      let baseUrl = '<?php echo e(url("/")); ?>'
      let val = $(this).val();
      window.location.href = baseUrl + '/search?type=course&subject=' + val;
    });
    $(document).on('change', '.search-university-footer', function() {
      let baseUrl = '<?php echo e(url("/")); ?>'
      let val = $(this).val();
      window.location.href = baseUrl + '/university/' + val;
    });
    $(document).on('click', '.filterBtn', function() {
      let box = $('.filterBtn').parent().next('.search-filter');
      if (box.is(':visible')) {
        box.fadeOut(300);
      } else {
        box.fadeIn(300);
      }
    });
  </script>


</body>


<script>
  function subscribe() {
    // OneSignal.push(["registerForPushNotifications"]);
    OneSignal.push(["registerForPushNotifications"]);
    event.preventDefault();
  }

  function unsubscribe() {
    OneSignal.setSubscription(true);
  }

  var OneSignal = OneSignal || [];
  OneSignal.push(function() {
    /* These examples are all valid */
    // Occurs when the user's subscription changes to a new value.
    OneSignal.on('subscriptionChange', function(isSubscribed) {
      console.log("The user's subscription state is now:", isSubscribed);
      OneSignal.sendTag("user_id", "4444", function(tagsSent) {
        // Callback called when tags have finished sending
        console.log("Tags have finished sending!");
      });
    });

    var isPushSupported = OneSignal.isPushNotificationsSupported();
    if (isPushSupported) {
      // Push notifications are supported
      OneSignal.isPushNotificationsEnabled().then(function(isEnabled) {
        if (isEnabled) {
          console.log("Push notifications are enabled!");

        } else {
          OneSignal.showHttpPrompt();
          console.log("Push notifications are not enabled yet.");
        }
      });

    } else {
      console.log("Push notifications are not supported.");
    }
  });
</script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



<script>
  $(document).ready(function() {
    $("#imageSlider").owlCarousel({
      items: 3,
      autoplay: true,
      rewind: true,
      margin: 5,
      loop: true,
      nav: true,
      dots: true,
      responsiveClass: true,
      autoHeight: true,
      autoplayTimeout: 7000,
      smartSpeed: 800,
      nav: true,
      navText: ["<span class='carousel-nav-prev'></span>", "<span class='carousel-nav-next'></span>"],
      responsive: {
        // Customize options for different screen sizes
        0: {
          items: 1 // Number of items to display on smaller screens
        },
        400: {
          items: 2 // Number of items to display on medium-sized screens
        },
        576: {
          items: 3 // Number of items to display on medium-sized screens
        },
        676: {
          items: 3 // Number of items to display on medium-sized screens
        },
        992: {
          items: 4 // Number of items to display on larger screens
        }
      }
    });
  });
</script>

<script>
  $(document).ready(function() {
    $("#imageSlider2").owlCarousel({
      items: 3,
      autoplay: true,
      rewind: true,
      margin: 5,
      loop: true,
      nav: true,
      dots: true,
      responsiveClass: true,
      autoHeight: true,
      autoplayTimeout: 7000,
      smartSpeed: 800,
      nav: true,
      navText: ["<span class='carousel-nav-prev'></span>", "<span class='carousel-nav-next'></span>"],
      responsive: {
        // Customize options for different screen sizes
        0: {
          items: 1 // Number of items to display on smaller screens
        },
        400: {
          items: 2 // Number of items to display on medium-sized screens
        },
        576: {
          items: 3 // Number of items to display on medium-sized screens
        },
        676: {
          items: 3 // Number of items to display on medium-sized screens
        },
        992: {
          items: 4 // Number of items to display on larger screens
        }
      }


    });
  });
</script>


<script>
  $(document).ready(function() {
    $("#imageSlider3").owlCarousel({
      items: 3,
      autoplay: true,
      rewind: true,
      margin: 5,
      loop: true,
      nav: true,
      dots: true,
      responsiveClass: true,
      autoHeight: true,
      autoplayTimeout: 7000,
      smartSpeed: 800,
      navText: ["<span class='carousel-nav-prev'></span>", "<span class='carousel-nav-next'></span>"],
      responsive: {
        // Customize options for different screen sizes
        0: {
          items: 1 // Number of items to display on smaller screens
        },
        400: {
          items: 1 // Number of items to display on medium-sized screens
        },
        576: {
          items: 2 // Number of items to display on medium-sized screens
        },
        767: {
          items: 3 // Number of items to display on medium-sized screens
        },
        992: {
          items: 3 // Number of items to display on larger screens
        },
        1199: {
          items: 4 // Number of items to display on larger screens
        }
      }


    });
  });


  function event_trigger_web(action_button, whatsapp_button_text) {

    var action_button = action_button;
    var page_hit_name = "";
    var whatsapp_button_text = whatsapp_button_text;
    var csrfToken = '<?php echo e(csrf_token()); ?>';

    var currentURL = window.location.href;

    var parts = currentURL.split('/');
    var page_hit_name = parts[parts.length - 1];

    if (page_hit_name == '') {

      page_hit_name = 'home';

    }


    // store this in databse


    $.ajax({
      url: '<?php echo e(route("event_trigger_web")); ?>',
      type: 'POST',
      dataType: 'json',
      data: {
        action_button: action_button,
        page_hit_name: page_hit_name,
        whatsapp_button_text: whatsapp_button_text,
        _token: csrfToken
      },
      success: function(data) {

        console.log(data);


      },
      error: function(data) {

        console.log(data);

      },
    })

  }
</script>


</html>