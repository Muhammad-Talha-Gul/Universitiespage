<?php $__env->startSection('title',(isset($data['seo']->meta_title))?$data['seo']->meta_title:'Visit Visa'); ?>
<?php $__env->startSection('seo'); ?>
<?php if(isset($data['seo']->show_meta)): ?>
<meta name="keywords" content="">
<meta name="description" content="">
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customStyles'); ?>
<style type="text/css">
  .c-bgHeader.has-banner-350px {
    height: 305px !important;
    max-height: 350px;
    background-position-x: center;
    background-position-y: top;
    position: relative;
  }

  .socilaMediaIconSize {
    font-size: 2rem;
  }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-light">
  
  <!-- <?php if(1==1): ?>
        <header class="c-bgHeader c-countryPageBanner p-0 has-banner-350px mb-4" class="fluid-container" style="background-image: url(<?php echo e(url((fix($data->visa_image))??iph())); ?>);background-position: center;"  data-img="<?php echo e(url((fix($data->visa_image))??iph())); ?>" >
          <div class="fluid-container" align="left" style="background-color:#00000073;height:inherit;">
            <div class="container" style="position: absolute;bottom: 20px;margin-left: 14%;width: 73%;">
              <h1><?php echo e($data->visa_title); ?> </h1>
              <div class="h5 mb-4" style="color: #c7c7c7;font-size: 16px;"><?php echo $data->visa_title; ?></div>
            </div>
          </div>
        </header>
      <?php else: ?>
        <header class="container" style="margin-top: 20px;">
          <div class="fluid-container" align="left">
              <h1><?php echo e($data->visa_title); ?> </h1>
              <div class="h5 mb-4" style="color: #c7c7c7;font-size: 16px;"><?php echo ($data->sub_title)??''; ?></div>
          </div>
        </header>
      <?php endif; ?> -->
  <div class="o-2colLayout" style="display: unset !important;">
    <section class="guide-detail-section mb-3 pt-5">
      <div class="container">
        <div class="d-lg-none">
          <div class="js-share u-pointer u-small95">

            <!--<i class="fa fa-facebook-official u-text-facebook"></i>-->
            <!--<i class="fa fa-twitter u-text-twitter"></i>-->
            <!--<i class="fa fa-whatsapp u-text-whatsapp"></i>-->
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url('visa/'.$data->slug)); ?>/">
              <i class="fa fa-facebook-official u-text-facebook socilaMediaIconSize"></i>
            </a>
            <a href="https://twitter.com/home?status=<?php echo e(url('visa/'.$data->slug)); ?>/">
              <i class="fa fa-twitter u-text-twitter socilaMediaIconSize"></i>
            </a>
            <a href="https://wa.me/?text=<?php echo e(url('visa/'.$data->slug)); ?>">
              <i class="fa fa-whatsapp u-text-whatsapp socilaMediaIconSize"></i>
            </a>
            <a href="https://plus.google.com/share?url=<?php echo e(url('visa/'.$data->slug)); ?>&amp;name=<?php echo e(str_replace(" ", "+", $data->title)); ?>"><i class="fa fa-google-plus u-text-google-plus socilaMediaIconSize"></i></a>

            <strong class="text-primary">Share this page with friends</strong>
          </div>
          <aside class="c-share">
            <div class="c-share-body is-onTrigger bg-light rounded u-boxShadow-light h4 p-2">

              <a class="fa-stack u-text-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url('visa/'.$data->slug)); ?>/">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
              </a>
              <a class="fa-stack u-text-twitter" href="https://twitter.com/home?status=<?php echo e(url('visa/'.$data->slug)); ?>/">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
              </a>
              <a class="fa-stack u-text-whatsapp" href="https://wa.me/?text=<?php echo e(url('visa/'.$data->slug)); ?>">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-whatsapp fa-stack-1x fa-inverse"></i>
              </a>

            </div>
          </aside>
        </div>
        <div class="d-none d-lg-flex flex-wrap">

          <a class="d-block text-white rounded p-2 mx-1 mb-2 u-bg-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url('visa/'.$data->slug)); ?>/">
            <i class="fa fa-lg fa-facebook-official"></i> Share on Facebook
          </a>
          <a class="d-block text-white rounded p-2 mx-1 mb-2 u-bg-twitter" href="https://twitter.com/home?status=<?php echo e(url('visa/'.$data->slug)); ?>/">
            <i class="fa fa-lg fa-twitter"></i> Twitter
          </a>
          <a class="d-block text-white rounded p-2 mx-1 mb-2 u-bg-whatsapp" href="https://wa.me/?text=<?php echo e(url('visa/'.$data->slug)); ?>">
            <i class="fa fa-lg fa-whatsapp"></i> WhatsApp
          </a>

        </div>
      </div>
  </div>
  </section>

  <div class="o-2colLayout container mb-5">
    <main class="o-2colLayout-content">
      <div class="article-details-content-main">
        <article><?php echo $data->visa_description; ?></article>
        <!-- added by sadam start --->
        <section class="mb-5">
          <h4 class="mb-3">You might be interested in...</h4>
          <div class="row">
            <?php
            $randomVisa = DB::table('visa_details')->select('visa_title as title', 'slug')->inRandomOrder()->limit(8)->get();
            ?>
            <?php if(count($randomVisa)>0): ?>
            <?php $__currentLoopData = $randomVisa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $visa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $c='primary';
            $r=rand(1,3);
            if($r==1){$c='primary';}elseif($r==2){$c='success';}
            elseif($r==3){$c='info';}
            ?>
            <article class="col-md-6 border-top  u-mb-n1px px-3">
              <a class="row" href="<?php echo e(url('visa/'.$visa->slug)); ?>">
                <div class="col-2 h2 o-flex-center rounded text-white bg-<?php echo e($c); ?> py-1 my-3">
                  <?php echo e($key+1); ?>

                </div>
                <div class="col my-3"><?php echo e($visa->title); ?></div>
              </a>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

          </div>
        </section>

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
              if ($count > 0) {
                for ($i = 0; $i < $count;) { ?> {
                    "@type": "Question",
                    "name": "<?php echo e($question[$i]); ?>",
                    "acceptedAnswer": {
                      "@type": "Answer",
                      "text": "<?php echo e($answer[$i]); ?>"
                    }

                  <?php echo ($i === ($count - 1)) ? '}' : '},';
                  $i++;
                }
              }
                  ?>

                  ]
            }
        </script>
        <?php /* ?>
            <script type="application/ld+json">
            {
              "@context": "https://schema.org/", 
              "@type": "Visa", 
              "name": "{{$data->visa_title}}",
              "image": "{{url((fix($data->visa_image))??iph())}}",
              "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "{{$data->avg_review_value}}",
                "bestRating": "5",
                "worstRating": "1",
                "ratingCount": "{{$data->rating_count}}",
                "reviewCount": "{{$data->review_count}}"
              },
              "review": [{
              <?php 
                     $review_detail = !empty($data->review_detail)? json_decode($data->review_detail):[];
                     $count =  count($review_detail);
                     $startCount = 0;
                    if($count > 0)
                    {
                         foreach($review_detail as $oneByone){  ?>
                                
                                "@type": "Review",
                                "name": "{{ $oneByone->reviewerName }}",
                                "reviewBody": "{{ $oneByone->reviewBody }}",
                                "reviewRating": {
                                  "@type": "Rating",
                                  "ratingValue": "{{ $oneByone->ratingValue }}",
                                  "bestRating": "5",
                                  "worstRating": "1"
                                },
                                "datePublished": "{{ $oneByone->datePublished }}",
                                "author": {"@type": "Person", "name": "{{ $oneByone->author }}"},
                                "publisher": {"@type": "Organization", "name": "{{ $oneByone->publisherName }}"}
                            
                          
              <?php 
                   
                   echo ($startCount === ($count-1))? '':'},{'; ++$startCount; 
              }  // end foreach
                        
                    } ?>
            
                    }]
            }
            </script>
            <?php */ ?>
        <?php $__env->stopSection(); ?>

        <!-- end add by sadam -->
    </main>
    <aside class="o-2colLayout-sidebar">
      <section class="mb-5 d-flex flex-column align-items-center">
        <h6 class="h4 mb-3">Visa Countries</h6>
        <section class="mb-4 uni_lists" style="display: block;">
          <?php $__currentLoopData = $datacountries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datacountry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <?php if (!isset($datacountry->slug)) {
            continue;
          }  ?>
          <a href="<?php echo e(url('visa/'.$datacountry->slug)); ?>">
            <article class="row align-items-center bg-white border-bottom border-top u-small95 course-articles">
              <div class="col pl-0 pl-md-3 search-grad">
                <h6 class="u-lrm">
                  <?php echo e($datacountry->country_name); ?>

                </h6>
                <div class="text-muted small">
                  <img style="width: 120px; height: auto;" alt="<?php echo e($datacountry->country_name); ?>" src="<?php echo e(url((fix($datacountry->country_image))??iph())); ?>">
                </div>
              </div>
            </article>
          </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </section>
        <div class="text-center mb-4">
          <a class="btn btn-primary" href="<?php echo e(url('visit_visa')); ?>" style="color:white!important;">View More Countires</a>
        </div>
      </section>
    </aside>
  </div>
</div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>