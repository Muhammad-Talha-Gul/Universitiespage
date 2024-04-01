<?php if(isset($meta['style'])): ?>
<?php if($meta['style'] == 'style1'): ?>


<?php elseif($meta['style'] == 'style2'): ?>

<section class="o-ad-banner text-center">

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

  
  <div class="slideshow-container slider--space--fix">
    
    <!-- ..................Home herro Section Start............. -->

    <div class="herrobgimg">
      <div class="overlay11">
        <div class="centertextdiv banner-content">
          <!-- banner contant start -->
          <div class="banner-contant-main">
            <h4 class="banner-sub-heading">Want To</h4>
            <h1 class="banner-heading">Study Abroad ?</h1>
            <p class="banner-description">Find the perfect courses and universities to <br> meet your
              education goals</p>
            <a href="<?php echo url('institutions') ?>" class="btn-uni">Universities</a>
          </div>
          <!-- banner contant end -->

          <!-- banner search start -->
          <div class="row searchdiv_row">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 search-column">
              <div class="searchone_opti">
                <select v-model="location" id="search_type_value_select" class="form-control heroinput">
                  <option id="empty">Search For</option>
                  <option value="university">University</option>
                  <option value="course">Course</option>
                </select>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 search-column">
              <div class="searchtwo_opti">
                <select v-model="location" id="search_comp_value_select" class="form-control input-sm heroinput">
                  <option id="Country">Select Country</option>
                  <?php $c = allCountry() ?>
                  <?php $__currentLoopData = $c; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($val->country); ?>"><?php echo e($val->country); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 search-column">
              <div class="searchthree_opti">
                <input type="text" class="form-control heroinput" id="search_comp_value" placeholder="Search university and course" autocomplete="off" data-autoselect="desktop">
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 search-column">
              <div class="searchfour_opti search-button">
                <span onclick="search_comp_home()" style="background: white; cursor: pointer;" class="btn heroformsubmit"><i class="fa fa-search c-pulsate-infreq"></i></span>
                </button>
              </div>
            </div>
            
          </div>
          <!-- banner search end -->
        </div>
      </div>
    </div>


    <!-- ..................Home herro Section End............. -->




    <!-- <script>
      window.onscroll = function() {
        myFunctionsticky();
      };

      var navbarstickyone = document.getElementById("navbarsticky");
      var sticky_check = navbarstickyone.offsetTop;
      function myFunctionsticky() {
        if (window.pageYOffset >= sticky_check) {
          navbarstickyone.classList.add("stickynavstylye")
        } else {
          navbarstickyone.classList.remove("stickynavstylye");
        }
      }
    </script> -->


    <?php $__env->startPush('scripts'); ?>
    <script>
      function search_comp_home() {
        var search_comp_value = document.getElementById("search_comp_value").value;
        var search_comp_value_select = document.getElementById("search_comp_value_select").value;
        var search_type_value_select = document.getElementById("search_type_value_select").value;

        if (search_comp_value == '' && search_comp_value_select == 'Select Country' || search_type_value_select ==
          'empty') {
          document.getElementById("search_comp_value").style.border = "2px solid red";
        } else {
          window.location.href = "https://universitiespage.com/search?page=1&location=" +
            search_comp_value_select + "&search=" + search_comp_value + "&type=" + search_type_value_select +
            "";
        }
      }


      $(document).ready(function() {
        $(document).on('keyup', '.uni-search', function() {
          var val = $(this).val();
          var baseUrl = '<?php echo e(url(' / ')); ?>';
          if (val !== '') {
            $.ajax({
              url: '<?php echo e(url("get-university-list")); ?>',
              type: 'POST',
              dataType: 'json',
              data: {
                'search': val,
                _token: '<?php echo e(csrf_token()); ?>'
              },
              success: function(uni) {
                var html = ``;
                for (var i = uni.length - 1; i >= 0; i--) {
                  html +=
                    `<a class="d-block c-highlightLink list-uni" href="` +
                    baseUrl + '/university/' + uni[i]['slug'] + `">` + uni[
                      i]['name'] + `</a>`;
                }
                $('.search-uni').html(html);
                $('.search-uni').removeClass('d-none');
                if (uni.length == 0) {
                  $('.search-uni').addClass('d-none');
                }
              }
            })
          } else {
            $('.search-uni').html('');
            $('.search-uni').addClass('d-none');
          }
        });
      });
    </script>
    <?php $__env->stopPush(); ?>






  </div>

</section>
<?php endif; ?>
<?php endif; ?>