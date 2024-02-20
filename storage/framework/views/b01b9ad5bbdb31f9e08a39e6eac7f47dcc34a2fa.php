<style>
    .overlay{
  border-radius: 17px;
background: rgba(255, 255, 255, 0.65);
    min-width: 30vh;
    min-height: 10vh;
    padding: 20px;
    margin-left: 18px;
}
.MBBSimg{ 
  height:141px !important;
}
.inaerdiv{
  margin-top: 0px !important;
  height: 31vh  !important;}
  
@media  screen and (max-width: 449px) {
  .inaerdiv  {
    width: 74% !important;
    height: 29vh !important;
    margin-top: 10px !important;
    margin-left: 37px !important;
  }
}
 @media  only screen and (min-width: 450px) and (max-width: 991px){
.inaerdiv {
    width: 58% !important;
    height: 28vh !important;
    margin-top: 10px !important;
    margin-left: 100px !important;
}
    
}
</style>
<?php if(isset($meta['type'])): ?>

    <?php if($meta['type'] == 'blog'): ?>



<!-- /* ..................Our LATEST ARTICLES start............. */ -->

<br><br><br>

   <div class="container-fluid POPULARUNIVERSITIESsection">
    <div class="row">
      
        <div class="col-lg-3 col-md-12 col-sm-12 po_un_col1">
        <p>LATEST 
         <span>ARTICLES</span></p>
         <p class="newpp">Stay updated on universities and courses with our insightful articles. Explore academic trends, institution profiles, and career advice to guide your educational journey.</p>
      </div>


      <div class="col-lg-9 col-md-12 col-sm-12">
        

        <div class="container-fluid">
          <div class="owl-carousel owl-theme" id="imageSlider3">

 <?php $__currentLoopData = latestBlog(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="item">
             <a href="<?php echo e(url($blog->slug)); ?>">
              <div class="card">
                <img src="<?php echo e((url(fix($blog->image, 'thumbs')))??iph()); ?>" style="height: 180px !important; width: 94%;" class="img-fluid card-img-top" alt="...">
                <div class="card-body" style="border: none; margin-top: 10px;">
                <h4><?php echo e(($blog->title)??''); ?></h4>  
                <p><?php echo substr($blog->short_description, 0,100) ?></p>     
                <a href="<?php echo e(url($blog->slug)); ?>">View All</a>             
                </div>
              </div>
              </a>
              
            </div>

 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


          </div>
        </div>
      

        

      </div>



    </div>
   </div>


<!-- /* ..................Our LATEST ARTICLES End............. */ -->



        

        <div class="clearfix" style="clear:both;"></div>
    <?php elseif($meta['type'] == 'university'): ?>



   <!-- ..................POPULAR UNIVERSITIES Section Start............. -->
      

<style type="text/css">
    .owl-carousel, .owl-carousel .owl-item {
    background: none;
}
</style>

   <div class="container-fluid POPULARUNIVERSITIESsection">
    <div class="row">
      <div class="col-lg-3 col-md-12 col-sm-12 po_un_col1">
        <p>POPULAR 
         <span>UNIVERSITIES</span></p>
         <p class="newpp">Explore world-renowned universities offering top-tier education, diverse programs, and vibrant campus life. Choose your path to success at prestigious institutions.</p>
      </div>



      <div class="col-lg-9 col-md-12 col-sm-12">
        

        <div class="container-fluid">
          <div class="owl-carousel owl-theme" id="imageSlider">
            

            <?php
                $university = getPopualrUniversity();
            ?>              

            <?php $__currentLoopData = $university; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php
                                                 $bg = (fix($uni->feature_image['image'][0], 'thumbs'))??iph();
                                         ?>


            <div class="item" style="display: contents !important;">
              
              <div class="container1">
                <a class="o-blockLink" href="<?php echo e(url(('university/'.$uni->slug)??'#')); ?>">
                <img class="img-fluid" src="<?php echo e(($bg!==null)?url(($bg)??'#.'):url((fix($uni->logo,'thumbs'))??iph())); ?>" alt="<?php echo $uni->name; ?>" alt="Snow" style="width:100%;">
                <div class="centered"><div class="overlay"><p><?php echo $uni->name; ?></p></div></div>
                </a>
                </div>
              
            </div>    
            
            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <!-- Add more items as needed -->
          </div>


        </div>
      

        

      </div>



    </div>
   </div>

   
      
   <!-- ..................POPULAR UNIVERSITIES Section End............. -->


        

<br>


    <?php elseif($meta['type'] == 'courses'): ?>



    <!-- /* ..................Popular Courses Section Start............. */ -->


   <div class="container popularcouresesection">

    <h1>Popular Courses</h1>

    <p>Experience excellence in education through popular courses at top-tier universities.</p>

   </div>
<br>

   <div class="container-fluid">
    <div class="row">


        <?php
                $university = getPopualrCourse();

            ?>

                <?php $__currentLoopData = $university; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                    <?php
                         
                         $bg = (fix($uni->feature_image['image'][0], 'thumbs'))??iph();
                                              
                    ?>


      <div class="col-lg-3 col-md-6 MBBSimg">
        <a class="o-blockLink" href="<?php echo e(url(('courses/'.$uni->id)??'#')); ?>">
        <!--<img class="img-fluid Rectangle45" src="<?php echo e(($bg!==null)?url(($bg)??'#.'):url((fix($uni->logo,'thumbs'))??iph())); ?>" alt="">-->
        <div class="inaerdiv">
             <img class="img-fluid inaerdivimg" style="height: auto; width: 40%; margin-top: -57px;" src="<?php echo e(url((fix($uni->university->logo, 'thumbs'))??iph())); ?>" alt="">
          <h4><?php echo e(($uni->name)??''); ?></h4>
          <h5><?php echo e(($uni->university->name)??''); ?></h5>
          <h6>Yearly Fee: <?php echo e(($uni->yearly_fee)??''); ?>$</h6>
          <p><i class="fa-solid fa-location-dot"></i> <?php echo e(($uni->university->city)??''); ?>, <?php echo e(($uni->university->country)??''); ?></p>
          
         

        </div>
        </a>
      </div>

      
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            

    </div>
   </div>

   <br><br><br>


<!-- /* ..................Popular Courses Section End............. */ -->




    <?php elseif($meta['type'] == 'consultant'): ?>

        <section class="<?php echo e(isset($meta['class']) ? $meta['class'] : ''); ?>">
            <div class="share__bg share__bg--home">
                <div class="container container--narrow container--clear">
                    <div class="module--spacing">
                    <div class="grid">
                        <div class="grid__item grid__item--1">
                            <h2 id="proud" class="h1 caps line-tight text-center" >
                                <span class="text-white" style="font-size: 34px;"><?php echo e(isset($meta['title']) ? $meta['title'] : ''); ?></span>
                            </h2>
                        </div>

                    </div>
                    </div>
                </div>
                <div class="container container--clear">
                        <?php
                            $consultant = getPopualrConsultant();
                            // dd($consultant[0]->feature_image['image'][0]);
                        ?>
                        <div class="grid">
                            <?php if(isset($consultant[0])): ?>
                                <div class="grid__item grid__item--2 master-box">
                                    <div class="grid-one">
                                        <a class="share__img" align="center" href="<?php echo e(url('consultant/'.$consultant[0]->organization_name.'/'.$consultant[0]->id)); ?>" target="_blank">
                                            <img src="<?php echo e((isset($consultant[0]->logo))?url(fix($consultant[0]->logo, 'thumbs')):iph()); ?>" alt="<?php echo e($consultant[0]->organization_name); ?>" style="width: 100%;height: inherit;">
                                            <span class="share__hover">
                                                <h3><?php echo e($consultant[0]->organization_name); ?></h3>
                                                <p style="position: relative;top: 20px;">
                                                City/Country: <?php echo e($consultant[0]->city); ?>, <?php echo e($consultant[0]->country); ?><br>
                                                Rating:
                                                <?php
                                                  $ranking = ($consultant[0]->ranking!==null)?explode('.', $consultant[0]->ranking):0;
                                                ?>
                                                <?php if($ranking[0]!==0): ?> <?php for($i=0; $i<(int)$ranking[0]; $i++): ?>
                                                  <i class="fa fa-star"></i>
                                                <?php endfor; ?> <?php endif; ?>
                                                <?php if(isset($ranking[1]) && $ranking[1]>=5): ?>
                                                  <i class="fa fa-star-half"></i>
                                                <?php endif; ?>
                                                </p>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($consultant[1])): ?>
                                <?php
                                    $image = (fix($consultant[1]->logo))??iph();
                                    $image2 = (fix($consultant[1]->logo))??iph();
                                ?>
                                <div class="grid__item grid__item--2 share__special master-box">
                                    <div class="grid-two" style="flex: 1 1 0px;">
                                        <a href="<?php echo e(url('consultant/'.$consultant[1]->organization_name.'/'.$consultant[1]->id)); ?>" target="_blank" class="share__half share__half--swap">
                                            <div class="share__half__img" alt="<?php echo e(url($consultant[1]->organization_name)); ?>">
                                                <img src="<?php echo e(url($image)); ?>" alt="university page">
                                            </div>
                                            <div class="share__half__text module--blackish">
                                                <p style="font-size: 30px;">
                                                <?php echo e($consultant[1]->organization_name); ?>

                                                </p>
                                                <span class="share__hover">
                                                </span>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="grid-two" style="flex: 1 1 0px;">
                                        <a href="<?php echo e(url('consultant/'.$consultant[1]->organization_name.'/'.$consultant[1]->id)); ?>" target="_blank" class="share__half share__half--swap">
                                            <div class="share__half1__img" >
                                                <img src="<?php echo e(url($image2)); ?>" alt="Universities Page">
                                            </div>
                                            <div class="share__half__text module--blackish">
                                                <p>
                                                City/Country: <?php echo e($consultant[1]->city); ?>, <?php echo e($consultant[1]->country); ?><br>
                                                Rating:
                                                <?php
                                                  $ranking = ($consultant[1]->ranking!==null)?explode('.', $consultant[1]->ranking):0;
                                                ?>
                                                <?php if($ranking[0]!==0): ?> <?php for($i=0; $i<(int)$ranking[0]; $i++): ?>
                                                  <i class="fa fa-star"></i>
                                                <?php endfor; ?> <?php endif; ?>
                                                <?php if(isset($ranking[1]) && $ranking[1]>=5): ?>
                                                  <i class="fa fa-star-half"></i>
                                                <?php endif; ?>
                                                </p>
                                                <span class="share__hover">
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>


                        


                    </div>
                    <div class="text-center" style="padding: 50px 0 0;">
                        <a href="<?php echo e(url('our-consultants')); ?>" class="butto  n">View More</a>
                    </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>
