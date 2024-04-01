<?php if(isset($meta['type'])): ?>

<?php if($meta['type'] == 'blog'): ?>



<!-- /* ..................Our LATEST ARTICLES start............. */ -->
<section class="papolar-universities pl-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-12 col-sm-12 po_un_col1">
        <div class="po_un_col1 left-heading-container">
          <div class="section-left-heading-block">
            <h3 class="section-heading ">latest
              <span class="section-heading-span">articles</span>
            </h3>
            <p class="section-paragraph section-heading-paragraph">Stay updated on universities and courses with our insightful articles. Explore academic trends, institution profiles, and career advice to guide your educational journey.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-12 col-sm-12">
        <div class="container-fluid">
          <div class="owl-carousel owl-theme row" id="imageSlider3">
            <?php $__currentLoopData = latestBlog(16); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
              <a href="<?php echo e(url($blog->slug)); ?>">
                <div class="card">
                  <!-- <img src="<?php echo e((url(fix($blog->image, 'thumbs')))??iph()); ?>" style="height: 180px !important; width: 94%;" class="img-fluid card-img-top lazyloaded" alt="..."> -->
                  <img class="card-img-top lazyloaded" width="100%" height="100%" alt="<?php echo $blog->title; ?>" src="<?php echo e(url(($blog->image)??'#')); ?>" data-echo="<?php echo e(url(($blog->image)??'#')); ?>" style="height: 180px !important; width: 100%;" class="img-fluid card-img-top" alt="...">
                  <div class="card-body article-card-body" style="border: none; margin-top: 10px;">
                    <h4 class="articles-heading"><?php echo e(($blog->title)??''); ?></h4>
                    <p class="articles-paragraph"><?php echo substr($blog->short_description, 0, 100) ?></p>
                    <a href="<?php echo e(url($blog->slug)); ?>" class="view-all-link">View All</a>
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
</section>


<!-- /* ..................Our LATEST ARTICLES End............. */ -->
<div class="clearfix" style="clear:both;"></div>
<?php elseif($meta['type'] == 'university'): ?>
<!-- ..................POPULAR UNIVERSITIES Section Start............. -->


<style type="text/css">
  .owl-carousel,
  .owl-carousel .owl-item {
    background: none;
  }
</style>

<div class="popular-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-12 col-sm-12 ">
        <div class="po_un_col1">
          <h3 class="section-heading ">popular
            <span>universites</span>
          </h3>
          <p class="section-paragraph section-heading-paragraph">Explore world-renowned universities offering top-tier education, diverse programs, and vibrant campus life. Choose your path to success at prestigious institutions.</p>
        </div>
      </div>
      <div class="col-lg-9 col-md-12 col-sm-12">
        <div class="container-fluid">
          <div class="row">
            <?php
            $university = getPopualrUniversity();
            ?>
            <?php $__currentLoopData = $university; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $bg = (fix($uni->feature_image['image'][0], 'thumbs'))??iph();
            ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 slider-column mb-3">
              <div class="container1 m-0">
                <a class="o-blockLink" href="<?php echo e(url(('university/'.$uni->slug)??'#')); ?>">
                  <img class="img-fluid lazyloaded" src="<?php echo e(($bg!==null)?url(($bg)??'#.'):url((fix($uni->logo,'thumbs'))??iph())); ?>" alt="<?php echo $uni->name; ?>" alt="Snow" style="width:100%;">
                  <div class="centered">
                    <div class="overlay">
                      <p><?php echo $uni->name; ?></p>
                    </div>
                  </div>
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
</div> 


<!-- ..................POPULAR UNIVERSITIES Section End............. -->
<?php elseif($meta['type'] == 'courses'): ?>
<!-- /* ..................Popular Courses Section Start............. */ -->



<section class="popular-course-section">
  <div class="container">
    <div class="po_un_col1 section-heading-center-container">
      <h2 class="section-heading">Popular <span class="section-heading-span">Courses</span></h2>
      <p class="section-heading-paragraph">Experience excellence in education through popular courses at top-tier universities.</p>
    </div>
    <div class="row">
      <?php
      $university = getPopualrCourse();
      ?>
      <?php $__currentLoopData = $university; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
      $bg = (fix($uni->feature_image['image'][0], 'thumbs'))??iph();
      ?>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3  MBBSimg">
        <a class="o-blockLink" href="<?php echo e(url(('courses/'.$uni->id)??'#')); ?>">
          <!--<img class="img-fluid Rectangle45" src="<?php echo e(($bg!==null)?url(($bg)??'#.'):url((fix($uni->logo,'thumbs'))??iph())); ?>" alt="">-->
          <div class="inaerdiv">
            <img class="img-fluid inaerdivimg lazyload" src="<?php echo e(url((fix($uni->university->logo, 'thumbs'))??iph())); ?>" alt="">
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
</section>


<!-- /* ..................Popular Courses Section End............. */ -->




<?php elseif($meta['type'] == 'consultant'): ?>

<section class="<?php echo e(isset($meta['class']) ? $meta['class'] : ''); ?>">
  <div class="share__bg share__bg--home">
    <div class="container container--narrow container--clear">
      <div class="module--spacing">
        <div class="grid">
          <div class="grid__item grid__item--1">
            <h2 id="proud" class="h1 caps line-tight text-center">
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
                  <?php if($ranking[0]!==0): ?> <?php for($i=0; $i<(int)$ranking[0]; $i++): ?> <i class="fa fa-star"></i>
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
              <div class="share__half1__img">
                <img src="<?php echo e(url($image2)); ?>" alt="Universities Page">
              </div>
              <div class="share__half__text module--blackish">
                <p>
                  City/Country: <?php echo e($consultant[1]->city); ?>, <?php echo e($consultant[1]->country); ?><br>
                  Rating:
                  <?php
                  $ranking = ($consultant[1]->ranking!==null)?explode('.', $consultant[1]->ranking):0;
                  ?>
                  <?php if($ranking[0]!==0): ?> <?php for($i=0; $i<(int)$ranking[0]; $i++): ?> <i class="fa fa-star"></i>
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