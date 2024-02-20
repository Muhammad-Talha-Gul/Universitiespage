<?php if(isset($meta['style'])): ?>
<?php if($meta['style'] == 'style1'): ?>


<?php elseif($meta['style'] == 'style2'): ?>

  <section class="o-ad-banner text-center pb-5">



















      <div class="slideshow-container slider--space--fix">

          




    <!-- ..................Home herro Section Start............. -->

<style>
      
      .herrobgimg{
  background-image: url(<?php echo e(url('/filemanager/photos/1/new_style')); ?>/hero-bg-1.jpg);
}

    </style>

<style> @media (min-width: 800px) { 
    .stickynavstylye {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 999999 !important;
    margin-top: 0px !important;
    width: 79%;
    opacity: 1 !important;
    border-radius: 9px !important;
    margin-left: -248px;
    
    }
    .searchdiv_row{
      display: flex;
    flex-wrap: wrap;
    /* margin-right: -10px;
    margin-left: -10px; */
    margin-top:-366px;
    border-radius: 10px 10px 10px 10px;
    opacity: 0.78;
    background: #0B6D76;
    padding: 9px;
    height: 57px;
    margin-left: 20%;
    width: 59%;
    }
    #navbarsticky  {
      margin-top: -366px;
   }
  }
    @media  only screen and (min-width: 801px) and (max-width: 1740px) {
    .stickynavstylye {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 999999 !important;
    margin-top: 0px !important;
    width: 79%;
    opacity: 1 !important;
    border-radius: 9px !important;
    margin-left: -248px;
    
    }
    .searchdiv_row{
      display: flex;
    flex-wrap: wrap;
    /* margin-right: -10px;
    margin-left: -10px; */
    margin-top:-366px;
    border-radius: 10px 10px 10px 10px;
    opacity: 0.78;
    background: #0B6D76;
    padding: 9px;
    height: 57px;
    margin-left: 20%;
    width: 59%;
    }
    #navbarsticky  {
      margin-top: -304px;
   }
}
    @media  screen and (max-width: 770px) {
      .stickynavstylye {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 999999 !important;
    margin-top: 0px !important;
    width: 102%;
    opacity: 1 !important;
    }
    .searchone_opti{
      width: 100%;
    }
    .searchtwo_opti{
      width: 100%;
    }
    .searchthree_opti{
      width: 80%;
    
    }
    .searchfour_opti{
      width: 16%;
      
    }
    .searchdiv_row{
      display: flex;
    flex-wrap: wrap;
    margin-right: -10px;
    margin-left: -10px;
    border-radius: 10px 10px 10px 10px;
    opacity: 0.78;
    background: #0B6D76;
    padding: 14px;
    width: auto;
    margin-bottom: 93px;

    }
    #navbarsticky  {
      margin-top: -230px;
   }
}
.heroinput{
  height:39px;
}
.form-control{
    padding: 0.2rem .75rem !important;
}
</style>
<div class='container_fluid'>
  <div class="row">
    <div class="herrobgimg">
      <div class="overlay11">
        
        <div class="centertextdiv">
          <h6>Want To</h6>
          <h4>Study Abroad ?</h4>
          <p>Find the perfect courses and universities to <br> meet your education goals</p>
          <a href="<?php echo url('institutions') ?>" class="btn-uni">Universities</a>
          
        </div> 
</div>
</div>


      <div class="row searchdiv_row" id="navbarsticky" style="">

              <div class="searchone_opti col-md-3">
                <select v-model="location" id="search_type_value_select" class="form-control heroinput" >
                              <option id="empty" >Search For</option>
                              <option value="university">University</option>
                              <option value="course">Course</option>
                          </select>
              </div>

              <div class="searchtwo_opti col-md-3">
                <select v-model="location" id="search_comp_value_select" class="form-control input-sm heroinput" >
                              <option id="Country" >Select Country</option>
                              <?php $c = allCountry() ?>
                              <?php $__currentLoopData = $c; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($val->country); ?>"><?php echo e($val->country); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
              </div>

              <div class="searchthree_opti col-md-5">
                <input type="text" class="form-control heroinput" id="search_comp_value"  placeholder="Search university and course" autocomplete="off" data-autoselect="desktop">
              </div>

              <div class="searchfour_opti col-md-1">
                <span onclick="search_comp_home()" style="background: white; cursor: pointer;" class="btn heroformsubmit"><i class="fa fa-search c-pulsate-infreq" style="color: black;"></i></span>
                </button>
              </div>

            </div>
</div>
</div>  


   <!-- ..................Home herro Section End............. -->




<script>
    
window.onscroll = function() {myFunctionsticky();};

var navbarstickyone = document.getElementById("navbarsticky");

var sticky_check = navbarstickyone.offsetTop;

function myFunctionsticky() { 
  if (window.pageYOffset >= sticky_check) { 
    navbarstickyone.classList.add("stickynavstylye")
  } else {
    navbarstickyone.classList.remove("stickynavstylye");
  }
}
    
</script>


 <?php $__env->startPush('scripts'); ?>
                  <script>
                  
                  function search_comp_home(){
                      var search_comp_value = document.getElementById("search_comp_value").value;
                      var search_comp_value_select = document.getElementById("search_comp_value_select").value;
                      var search_type_value_select = document.getElementById("search_type_value_select").value;
                      
                      if(search_comp_value == '' && search_comp_value_select == 'Select Country' || search_type_value_select == 'empty'){
                          document.getElementById("search_comp_value").style.border = "2px solid red";
                      } else {
                          window.location.href="https://universitiespage.com/search?page=1&location="+search_comp_value_select+"&search="+search_comp_value+"&type="+search_type_value_select+"";
                      }
                  }
                  
                  
                      $(document).ready(function(){
                          $(document).on('keyup', '.uni-search', function(){
                              var val = $(this).val();
                              var baseUrl = '<?php echo e(url('/')); ?>';
                              if(val!==''){
                                  $.ajax({
                                      url:'<?php echo e(url("get-university-list")); ?>',
                                      type: 'POST',
                                      dataType: 'json',
                                      data: {'search':val, _token:'<?php echo e(csrf_token()); ?>'},
                                      success: function (uni){
                                          var html = ``;
                                          for (var i = uni.length - 1; i >= 0; i--) {
                                              html +=`<a class="d-block c-highlightLink list-uni" href="`+baseUrl+'/university/'+uni[i]['slug']+`">`+uni[i]['name']+`</a>`;
                                          }
                                          $('.search-uni').html(html);
                                          $('.search-uni').removeClass('d-none');
                                          if(uni.length == 0){
                                              $('.search-uni').addClass('d-none');
                                          }
                                      }
                                  })
                              }else{
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
