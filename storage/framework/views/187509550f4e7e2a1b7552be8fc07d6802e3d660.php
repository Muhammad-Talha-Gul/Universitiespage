
   <?php $__env->startSection('title',(isset($data['seo']->meta_title))?$data['seo']     ->meta_title :$data->name.' '.$data->qualificationName->title.'  in '.$data->university->name.' '); ?>
  <?php $__env->startSection('seo'); ?>
  <meta name="description" content="<?php echo !empty(strip_tags($data->about)) ? strip_tags($data->about) : $data->name.' '.$data->qualificationName->title.' course is offered in '.$data->university->name.' '.$data->university->country.' with the duration of  '.$data->duration.', taught in '.$data->languages.'. The tuition fees are '.$data->yearly_fee.'$ yearly and admission intake is '.$data->university->intake.'.'; ?>">

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
  

  <style type="text/css">
  .Milanbgimg {
    margin-top: -10px;
  }
</style>
    
  <div class="Milanbgimg" <?php if($data->feature_image!==null): ?> style="background-image: url(<?php echo e(url((fix($data->university->logo))??iph())); ?>);height:500px; background-repeat: no-repeat;background-size:100% 100%; background-position:center center;padding-left: 0px;padding-right: 0px;" <?php else: ?> style="background-image: url(<?php echo e(url((fix($data->logo))??iph())); ?>);height:500px;background-repeat: no-repeat;background-size:100% 100%;background-position:center center;padding-left: 0px;padding-right: 0px;" <?php endif; ?>>
    <div class="Milanbgimgoverly">
        
        <div class="centered2">
            <h6><?php echo e(($data->name)??''); ?> </h6>
            <p>(<?php echo e(($data->qualificationName->title)??''); ?>)</p>
            <button class="btn Milanbtn1" onclick="send_emailcontat()" style="cursor: pointer;">Admission Request</button>
            <button class="btn Milanbtn2"onclick="consulation()" style="cursor: pointer;">Free Consultation</button>
        </div>

    </div>
</div>
  

<header class="container mt-3">
  <div class="row align-items-start">

 
    
    <section class="col-12 col-md">
      
      <div>
     <h2> <small> <a href="<?php echo e(url('university/'.$data->university->slug)); ?>" ><?php echo $data->university->name; ?> </a></small></h2>
        <?php 
          $ranking = ($data->university->ranking!==null)?explode('.', $data->university->ranking):0; 
        ?>
        <?php if($ranking[0]!==0): ?> <?php for($i=0; $i<(int)$ranking[0]; $i++): ?>
          <i class="fa fa-star"></i>
        <?php endfor; ?> <?php endif; ?>
        <?php if(isset($ranking[1]) && $ranking[1]>=5): ?>
          <i class="fa fa-star-half"></i>
        <?php endif; ?>
      </div>
      <small>
        <?php echo e($data->university->city); ?>, <?php echo e($data->university->country); ?>

      </small>
    </section>

    <section class="col-12 col-md-auto c-actionBtn-group p-3 p-md-0" style="padding-right: 25px;">
      <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url('courses/'.$data->id)); ?>/" class="o-titledIcon is-md-stacked u-smd-w100 btn c-actionBtn">
        <i class="fa fa-fw fa-lg fa-facebook"></i>
      </a>
      <a target="_blank" href="https://twitter.com/home?status=<?php echo e(url('courses/'.$data->id)); ?>/" class="o-titledIcon is-md-stacked u-smd-w100 btn c-actionBtn">
        <i class="fa fa-fw fa-lg fa-twitter"></i>
      </a>
      <a target="_blank" href="https://wa.me/?text=<?php echo e(url('courses/'.$data->id)); ?>" class="o-titledIcon is-md-stacked u-smd-w100 btn c-actionBtn">
        <i class="fa fa-fw fa-lg fa-whatsapp"></i>
      </a>



    </section>
      

  </div>
</header>


<br><br>

<div class="container">
  <div class="row">
    <div class="col-md-12" style="height: 60px;">


        <div class="applybtn-course-detail">
          <?php if(auth()->check() && auth()->user()->user_type == 'student'): ?>
            <div class="apply-btn">
              <a href="<?php echo e(url('apply-for-course/'.$data->id)); ?>" style="
    background-color: red;
    color: #fff !important;
" class="btn py-1 hover border-o c-actionBtn"><i class="fa fa-wpforms"></i> Apply</a>
            </div>
    
            
          <?php elseif(auth()->check() && auth()->user()->user_type !== 'student'): ?>
            <div class="apply-btn">
              <span class="other-user-status">Login as student first</span>
              <a href="javascript:void(0)" style="
    background-color: red;
    color: #fff !important;
" class="other-user btn py-1 hover border-o c-actionBtn"><i class="fa fa-wpforms"></i> Apply</a>
            </div>
          <?php else: ?>
            <div class="apply-btn">
              <a href="javascript:void(0)" style="
    background-color: red;
    color: #fff !important;
" data-toggle="modal" data-target="#login_model" class="btn py-1 hover border-o c-actionBtn"><i class="fa fa-wpforms"></i> Apply</a>
            </div>
          <?php endif; ?>

          <?php if(auth()->check() && auth()->user()->user_type == 'student'): ?>
            <form class="save-for-later-form" action="<?php echo e(route('addToWishlist')); ?>" method="post" @submit="addToWishlist($event)" style="width: 227px;">
              <?php echo e(csrf_field()); ?>

              <button type="submit" class="btn py-1 hover border-o c-actionBtn" style="margin-left: 6px;position: relative;">
                <i class="fa fa-heart"></i> Save <div class="wishlist-status" style="font-size: 12px;color: rgb(197, 34, 40);position: absolute;bottom: 8px;width: 100%;left: 93px;display:none;"></div> 
                </button>

              <input type="hidden" value="<?php echo e($data->id); ?>" name="course_id">
            </form>
          <?php endif; ?>
          
        </div>
        
                                       
    </div>
  </div>
</div>

<main class="o-2colLayout container mb-sm-5">
  <article class="o-2colLayout-content">



<style type="text/css">
      
    @media  screen and (max-width: 600px) {
  .Accommodationdiv p {
    font-size: 15px;
    text-align: left;
  }
}

@media  screen and (max-width: 450px) {
  .Accommodationdiv p {
    font-size:13px;
    text-align: left;
}
}

  </style>




<div class="container-fluid">
    <div class="border textdivcolcss">

    <div class="row mb-3">
        <div class="col-lg-3 col-md-3 col-6">
            <div class="border mb-3  Accommodationdiv"><p><i class="fa fa-fw fa-graduation-cap"></i> Qualification</p></div>
        </div>

        <div class="col-lg-9 col-md-9 col-6">
            <div class="border Accommodationdiv"><p><?php echo e(($data->qualificationName->title)??''); ?></p></div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-3 col-md-3 col-6">
            <div class="border mb-3  Accommodationdiv"><p><i class="fa fa-fw fa-clock-o"></i> Subject</p></div>
        </div>

        <div class="col-lg-9 col-md-9 col-6">
            <div class="border Accommodationdiv"><p><?php echo e(($data->subject->name)??''); ?></p></div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-3 col-md-3 col-6">
            <div class="border mb-3  Accommodationdiv"><p><i class="fa fa-fw fa-calendar"></i> Duration</p></div>
        </div>

        <div class="col-lg-9 col-md-9 col-6">
            <div class="border Accommodationdiv"><p><?php echo e(($data->duration)??''); ?></p></div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-3 col-md-3 col-6">
            <div class="border mb-3  Accommodationdiv"><p><i class="fa fa-fw fa-sign-in"></i> Intakes</p></div>
        </div>

        <div class="col-lg-9 col-md-9 col-6">
            <div class="border Accommodationdiv"><p><?php echo e(($data->university->intake)??''); ?></p></div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-3 col-md-3 col-6">
            <div class="border mb-3  Accommodationdiv"><p><i class="fa fa-fw fa-sign-in"></i> Languages</p></div>
        </div>

        <div class="col-lg-9 col-md-9 col-6">
            <div class="border Accommodationdiv"><p><?php echo e(($data->languages)??''); ?></p></div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-3 col-md-3 col-6">
            <div class="border mb-3  Accommodationdiv"><p><i class="fa fa-dollar rustom-class"></i> Tuition fee</p></div>
        </div>

        <div class="col-lg-9 col-md-9 col-6">
            <div class="border Accommodationdiv"><p>$<?php echo e((isset($data->yearly_fee))?$data->yearly_fee:'Contact the university / institute'); ?></p></div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-3 col-md-3 col-6">
            <div class="border mb-3  Accommodationdiv"><p><i class="fa fa-fw fa-credit-card"></i> Scholarship</p></div>
        </div>

        <div class="col-lg-9 col-md-9 col-6">
            <div class="border Accommodationdiv"><p><?php echo e(($data->scholarship==1)?'Available':'Not Available'); ?></p></div>
        </div>
    </div>


</div>
</div>


    


    <section class="mb-4">
      <h2 class="h4 c-heading-bar mb-3">Entry Requirements</h2>
      <?php echo ($data->entry_requirments)??''; ?>

    </section>


   
   <section class="text-center py-3 mb-3">
<div class="container">

<h6 class="text-center mb-4 h4">Other Related Courses</h6>
<div class="row">

<?php $__currentLoopData = $getrandcourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<div class="card col-md-4 text-center">
  <a href="<?php echo e(url('courses/'.$course->id)); ?>">
                <img class="img-fluid" src="<?php echo e(url((fix($course->logo, 'thumbs')))??iph()); ?>" alt="university page" alt="">
                <h6><?php echo e($course->name); ?></h6>
              </a>
                    <p>
<i class="fa fa-home"></i> <span><?php echo e($course->unvname); ?> <br><i class="fa fa-map-marker"></i> <?php echo e($course->city); ?>, <?php echo e($course->country); ?></span>

</p>
            </div>




<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

</div>

<br><br>

<div class="mt-5">
<a class="btn btn-primary" href="<?php echo e(url('search?page=1&limit=14&scholarship=2&type=course&guide=university,subject&qualification=1')); ?>">View more Courses</a>
</div>
</section>

  </article>
</main>

  <div class="modal student-login-model" style="padding-top: 117px;">

    <!-- Modal content -->
    <div class="modal-content student_login">
      <div class="">
        <h3 style="margin: 0px;margin-bottom:20px;">Student Login</h3>
        <form class="login-student" method="POST">
          <?php echo e(csrf_field()); ?>

          <div class="col-full">
            <div class="form-group" style="position: relative;">
              <label class="form__label">Email Address<span class="label__required">*</span></label>
              <input type="email" name="email" placeholder="" value="<?php echo e(old('email')); ?>" class="form__input" required="">
              <div id="ResetMsg" style="font-size: 11px;color: red;position: absolute;bottom: -13px"></div>
            </div>
          </div>
          <div class="col-full">
            <div class="form-group">
              <label class="form__label">Password<span class="label__required">*</span></label>
              <input type="password" name="password" placeholder="" class="form__input" required="">
            </div>
          </div>
          <div class="col-full" style="margin-bottom: 10px;">
            <button type="submit" class="button form__button submit-btn" style="display:inline-flex;"> Submit </button>
            <a href="<?php echo e(url('student-sign-up')); ?>" class="button form__button" style="display:inline-flex;"> Register </a>
            <button type="button" class="button form__button close" style="display:inline-flex;"> Close </button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<!--- schema markup start by -->
<?php $__env->startSection('schemaMarkup'); ?>
            <script type="application/ld+json">
                {
                  "@context": "https://schema.org",
                  "@type": "FAQPage",
                  "mainEntity": [
                       <?php 
                         $question = json_decode($data->sm_question);
                         $answer = json_decode($data->sm_answer);
                         $count =  count($question);
                         if($count > 0)
                         {
                             for($i = 0; $i < $count;)
                             { ?>
                             {
                                "@type": "Question",
                                "name": "<?php echo e($question[$i]); ?>",
                                "acceptedAnswer": {
                                  "@type": "Answer",
                                  "text": "<?php echo e($answer[$i]); ?>"
                                }
                              
                         <?php echo ($i === ($count-1))? '}':'},'; $i++;  
                                 
                             }
                         }
                    ?>
                    
                  ]
                }
            </script>
<!--- schema markup end   -->

<?php $__env->startSection('customScripts'); ?>
   <script>
      var acc = document.getElementsByClassName("accordion");
      var i;

      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var panel = this.nextElementSibling;
          if (panel.style.display === "block") {
            $(panel).slideUp( 300, function(){
               $(panel).fadeOut(300);
            });
          } else {
            $(panel).slideDown( 300, function(){
               $(panel).fadeIn(300);
            });
          }
        });
      }

      $(document).ready(function() {
        $(document).on('submit', '.login-student', function(e){
          e.preventDefault();
          var data = $(this).serialize();
          $(this).find('.submit-btn').attr('disabled',true);
          $(this).find('.submit-btn').text('Submitting');
          var _this = $(this);
          setTimeout(function(){
            _this.find('.submit-btn').attr('disabled',false);
            _this.find('.submit-btn').text('Submit');
          },4000);
          $.ajax({
            url: '<?php echo e(url("login")); ?>',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function (data) {
              _this.find('.submit-btn').attr('disabled',false);
              _this.find('.submit-btn').text('Submit');
              if(data.type == 'student'){
                window.location.href = "<?php echo e(url('apply-for-course/'.$data->id)); ?>";
              }else{
                window.location.href = data.url;
              }
            },
            error: function (data) {
              if (typeof data.responseJSON['errors']['email'][0] !== 'undefined') {
                _this.find("#ResetMsg").text(data.responseJSON['errors']['email'][0]);
              }
              _this.find('.submit-btn').attr('disabled',false);
              _this.find('.submit-btn').text('Submit');
            },
          })
        });
         $('.save-for-later').on('click', function(){
            $('.save-for-later-form').submit();
         })
         $('.save-for-later-form').on('submit', function(e){
            e.preventDefault();
            var action = $(this).attr('action');
            var data = $(this).serialize();
            $.post(action, data, function(data){
               if(data == 'success'){
                  $('.wishlist-status').text('Successfully saved to wishlist');
                  $('.wishlist-status').fadeIn(300).delay(5000).fadeOut(300);
               }else{
                  $('.wishlist-status').text('Already in your wishlist');
                  $('.wishlist-status').fadeIn(300).delay(5000).fadeOut(300);
               }
            })
         })
         $('.other-user').on('click' , function(){
          $(this).parent().find('.other-user-status').fadeIn(300).delay(2000).fadeOut(300);
         });
      });
   </script>
   
   <script>

      function send_emailcontat(){


swal({
  title: "Do you want to request admission information from this University?",
  text: "Student information will be transfer to university!",
  icon: "warning",
  buttons: true,
  successMode: true,
})
.then((willDelete) => {
  if (willDelete) {

          jQuery.ajax({
            type: 'GET',
            url: '/sendbtnemail/<?php echo $data->id; ?>/courses',   
            data: {},
            dataType: "json",
            success: function (data) {

              if (data.message == 'success') {
                  
                  swal("Success!", data.message_text, "success");
                  
              } else if (data.message == 'login') {
                  
                                                swal({
  title: "You are not login!",
  text: "Please login to send information request",
  icon: "warning",
  buttons: true,
  dangerMode: false,
  buttons: ["Cancel", "Login Now"],
})
.then((willDelete) => {
  if (willDelete) {
    
    $("#login_model").modal("show");  
    
  } else {
    
  }
});
                  
              }
              else {

     swal("Failure!", data.message_text, "error");

              }

            }   
          });

  } else {
    return false;
  }
});


      }

    </script>
   

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>