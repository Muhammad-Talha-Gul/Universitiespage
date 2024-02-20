<footer>


  <div class="container-fluid footersection">
    <div class="row">

      <div class="col-lg-4 footercol1">
        <img class="img-fluid" src="<?php echo e(url('/filemanager/photos/1/thumbs/unipage_logo_2.png')); ?>" alt="">

        <p>Sunrise international education consultancy private limited built the Universities Page app as a Free app. This SERVICE is provided by sunrise international education consultancy private limited at no cost and is intended for use as is.</p>

        <div class="row">
          <div class="col-lg-6">
              <select class="select required span6 search-university-footer" id="footer_site_menu">
                  <option>Select Universities</option>
                  <?php $__currentLoopData = getAllUniversity(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nui): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($nui->slug); ?>"><?php echo e($nui->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
          </div>

          <div class="col-lg-6">
            <select class="select required span6 search-subject-footer" id="customer_service_pickup2" name="customer_service[pickup]">
              <option>Select Subjects</option>
              <?php $__currentLoopData = subjects(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($sub->id); ?>"><?php echo e($sub->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>
          </div>
          
        </div>



                            
                                                     

                        


      </div>
      <div class="col-lg-3 footercol2">
        <h3><?php echo e((getFooterMeta()[0]['title'])??''); ?></h3>

        <ul>

          <?php if(isset(getFooterMeta()[0]['menu'])): ?>
                                 <?php $__currentLoopData = getMenuById(getFooterMeta()[0]['menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <li><a href="<?php echo e(url(($menu->url)??'#.')); ?>"><?php echo e(($menu->title)??''); ?></a></li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>

        </ul>

      </div>
      <div class="col-lg-5 footercol3">
        <div class="row">
          <div class="col-md-4">
            <h3><?php echo e((getFooterMeta()[2]['title'])??''); ?></h3>
            
             <?php if(isset(getFooterMeta()[2]['menu'])): ?>
                                    <?php $__currentLoopData = getMenuById(getFooterMeta()[2]['menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(url(($menu->url)??'#.')); ?>"><?php echo e(($menu->title)??''); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>

          </div>
          <div class="col-md-4">
            <h3>Privacy Policy</h3>
            <a href="https://universitiespage.com/privacy-policy">Privacy Policy</a>
          </div>
          <div class="col-md-4">
          <h3>FeedBack</h3>
            <a href="<?php echo e(route('feedback')); ?>">Feedback Form</a></div>
        </div>
    

        <hr class="hr1">

        <h3>Follow us</h3>

        <ul>
                                        <?php $__currentLoopData = getSocialMeta(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($social!==null): ?>
                     <li>
                        <a href="<?php echo e(($social)??''); ?>" title="Facebook">
                        <i class="fa fa-<?php echo e($key); ?> u-text-<?php echo e($key); ?>"></i>
                     </a>
                     </li>
                  <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <li><a href="https://whatsapp.com/channel/0029Va7vJOYJkK79737At844" title="whatsapp">
                        <i class="fa fa-whatsapp u-text-whatsapp"></i>
                     </a>
                </li>
        </ul>

        <a href="https://play.google.com/store/apps/details?id=com.universitiespage" target="_blank"><img class="img-fluid" style="width: 50% !important;" src="<?php echo e(url('/public/google-play.png')); ?>" alt="university page app"></a>

      </div>

    </div>

 <hr class="hr2">   

 <div class="emailsection">
  <div class="text-center">
    <ul>
      <li><a class="emailp" href="mailto:admission@universitiespage.com">Email admission@universitiespage.com</a></li>
      <li><a class="projectp" href="https://www.universitiespage.com" target="_blank">A project of www.universitiespage.com</a></li>
    </ul>
  </div>
 </div>

<hr class="hr3">

<div class="row footerlastrow">

  <div class="col-lg-3 col-md-6">
    <h3>China Address</h3>
    <p>Select Universities</p>
  </div>

  <div class="col-lg-3 col-md-6">
    <h3>Thailand Address</h3>
    <p>Bangkok,Thailand.</p>
    <p>Email:Thailand@universitiespage.com</p>
  </div>

  <div class="col-lg-3 col-md-6">
    <h3>Pakistan Lahore Addres</h3>
    <p>Universities Page,2nd Floor faisal bank,Raja</p>
    <p>Market,Garden town,Lahore,Pakistan</p>
    <p>Phone:0324 3640038</p>
    <p>Phone:0333 0033235</p>
    <p>Phone:0310 3162004</p>
  </div>

  <div class="col-lg-3 col-md-6">
    <h3>Islamabad Address</h3>
    <p>Universities Page, Punjab market,Venus Plaza, 1st</p>
    <p>Floor, Office No. 1, Sector G13/4,Islamabad</p>
    <p>Phone:0335 9990308</p>
    <p>Phone:0334 9990308</p>
  </div>

</div>





  </div>


<div class="row">
    
   <div class="col-md-12" style="text-align: center; padding: 15px;"> Copyright© Universities Page. All rights reserved.</div>
    
</div>

</footer>







   <style>
         .wwwa__brand{
           font-size: 0px !important;
       }
       .widget-header {
          background: #0B6D76 !important; 
       }
       .ayoan_whatsapp_chatbox .widget-body .body-content .user-list .ayoan_item.active {
         border-left: 3px solid #0B6D76 !important;
       }
   </style>
   
  
    
  
   
   <div id="example"></div>

