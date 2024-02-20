

<?php $__env->startSection('title',(isset($data['seo']->meta_title))?$data['seo']->meta_title:$data->name. ' Admission,Scholarship & courses Fee 2021'); ?>


<?php $__env->startSection('seo'); ?>

<meta name="description" content="<?php echo !empty(strip_tags($data->abou)) ? strip_tags ($data->abou):$data->name. '  '.$data->country.' offers admission and scholarships '.date('Y').' in total ' .count($data->courses). ' courses.Check courses tution fees and these courses are taught in '. $data->languages.' language.'; ?>">


<?php $__env->stopSection(); ?>
<?php $__env->startSection('customStyles'); ?>
<link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets_frontend/lightGallery/lightgallery.min.css')); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets_frontend/lightGallery/lg.woff')); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/jquery.mCustomScrollbar.css')); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/jquery-confirm.min.css')); ?>">

<style type="text/css">.compare-popover-content{background-color:#364656;width:auto;margin-top:7px;margin-left:0;padding:5px;position:absolute;z-index:1;display:none;color:#f2f5e9}.compare-popover-content:before{content:"";width:0;height:0;border-bottom:10px solid #364656;border-left:10px solid transparent;border-right:10px solid transparent;position:absolute;top:-10px}</style>
<style type="text/css">.o-icon{margin-top:-3.5rem}section{clear: both;}</style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<style type="text/css">
  .Milanbgimg {
    margin-top: -10px;
  }
</style>



<div class="Milanbgimg" <?php if($data->feature_image!==null): ?> style="background-image: url(<?php echo e(url((isset($data->feature_image['image'][0]))?fix($data->feature_image['image'][0]):fix($data->logo))); ?>);height:500px; background-repeat: no-repeat;background-size:100% 100%; background-position:center center;padding-left: 0px;padding-right: 0px;" <?php else: ?> style="background-image: url(<?php echo e(url((fix($data->logo))??iph())); ?>);height:500px;background-repeat: no-repeat;background-size:100% 100%;background-position:center center;padding-left: 0px;padding-right: 0px;" <?php endif; ?>>
    <div class="Milanbgimgoverly">
        
        <div class="centered2">
            <h6><?php echo e(($data->name)??''); ?> (<?php echo e(($data->founded_in)??''); ?>)</h6>

            <?php
                $ranking = ($data->ranking!==null)?explode('.', $data->ranking):0;
              ?>
              <?php if($ranking[0]!==0): ?> <?php for($i=0; $i<(int)$ranking[0]; $i++): ?>
                <i class="fa fa-star"></i>
              <?php endfor; ?> <?php endif; ?>
              <?php if(isset($ranking[1]) && $ranking[1]>=5): ?>
                <i class="fa fa-star-half"></i>
              <?php endif; ?>

            <p><?php echo $data->city.', '.$data->country; ?></p>
            <button class="btn Milanbtn1" onclick="consulation()" style="cursor: pointer;">Admission Request</button>
            <button class="btn Milanbtn2" onclick="send_emailcontat()" style="cursor: pointer;">Apply to University</button>
        </div>

    </div>
</div>


<br><br>

<style type="text/css">
  .Milansamlimg2 {
    cursor: pointer;
  }
  .active {
    background: white;
  }
</style>

<div class="container-fluid">

    <div class="row">

        <div class="col-lg-2 mb-3 text-center">

            <div class="border Milansamlimg2" onclick="openCity(event, 'London')" style="background: #0B6D76 !important;">
                <img class="img-fluid" src="<?php echo e(url('/filemanager/photos/1/new_style')); ?>/Vector.png" alt="">
                <p style="color: white;">Overview</p>
            </div>
        </div>
        
        <div class="col-lg-2 mb-3 text-center">

            <div class="border Milansamlimg2" onclick="openCity(event, 'Paris')">
                <img class="img-fluid" src="<?php echo e(url('/filemanager/photos/1/new_style')); ?>/Group.png" alt="">
                <p>Photos</p>
            </div>
        </div>

        <div class="col-lg-2 mb-3 text-center">

            <div class="border Milansamlimg2" onclick="openCity(event, 'news')">
                <img class="img-fluid" src="<?php echo e(url('/filemanager/photos/1/new_style')); ?>/Vector (11).png" alt="">
                <p>News</p>
            </div>
        </div>

        <div class="col-lg-2 mb-3 text-center">

            <div class="border Milansamlimg2" onclick="openCity(event, 'courses')">
                <img class="img-fluid" src="<?php echo e(url('/filemanager/photos/1/new_style')); ?>/Vector (2).png" alt="">
                <p>Courses</p>
            </div>
        </div>

        <div class="col-lg-2 mb-3 text-center">

            <div class="border Milansamlimg2" onclick="openCity(event, 'apply')">
                <img class="img-fluid" src="<?php echo e(url('/filemanager/photos/1/new_style')); ?>/Group 119.png" alt="">
                <p>How To Apply</p>
            </div>
        </div>

        <div class="col-lg-2 mb-3 text-center">

            <div class="border Milansamlimg2" onclick="openCity(event, 'reviews')">
                <img class="img-fluid" src="<?php echo e(url('/filemanager/photos/1/new_style')); ?>/Group (1).png" alt="">
                <p>Reviews</p>
            </div>
        </div>

    </div>

</div>
  

  <br><br><br>

  <style type="text/css">
      
    @media  screen and (max-width: 600px) {
  .Accommodationdiv p {
    font-size: 15px;
  }
}

@media  screen and (max-width: 450px) {
  .Accommodationdiv p {
    font-size:13px;
    text-align: left;
}
}

  </style>




  <div class="container-fluid" style="color:#464646; margin-left: -10px;">
    <div class="row">

      <div class="contantbox" style="width: 100%;">

        <div id="London" class="tabcontent">

          <div class="container-fluid">
    <div class="border textdivcolcss">

    <div class="row mb-3">
        <div class="col-lg-3 col-md-3 col-6">
            <div class="border mb-3  Accommodationdiv"><p>Accommodation:</p></div>
        </div>

        <div class="col-lg-9 col-md-9 col-6">
            <div class="border Accommodationdiv"><p><?php echo e(($data->accommodation==null)?'Off Campus':$data->accommodation); ?></p></div>
        </div>
    </div>



    <div class="row mb-3">
        <div class="col-lg-3 col-md-3 col-6">
            <div class="border mb-3  Accommodationdiv"><p>In Take:</p></div>
        </div>

        <div class="col-lg-9 col-md-9 col-6">
            <div class="border Accommodationdiv"><p><?php echo e(($data->intake)??''); ?></p></div>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-3 col-md-3 col-6">
            <div class="border mb-3  Accommodationdiv"><p>Languages:</p></div>
        </div>

        <div class="col-lg-9 col-md-9 col-6">
            <div class="border Accommodationdiv"><p><?php echo e(($data->languages)??''); ?></p></div>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-3 col-md-3 col-6">
            <div class="border mb-3  Accommodationdiv"><p>Scholarship:</p></div>
        </div>

        <div class="col-lg-9 col-md-9 col-6">
            <div class="border Accommodationdiv"><p><?php echo e(($data->scholarship==1)?'Avalible':'Not Avalible'); ?></p></div>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-3 col-md-3 col-6">
            <div class="border mb-3 Accommodationdiv"><p>Address:</p></div>
        </div>

        <div class="col-lg-9 col-md-9 col-6">
            <div class="border Accommodationdiv"><p><?php echo e(($data->address)??''); ?></p></div>
        </div>
    </div>

</div>
</div>


          
<br><br><br>

       

          <div class="c-drawerStack mb-4">

            <?php if($data->guide!==null): ?>
            <section>
              <h2 class="h4 c-heading-bar u-pointer mb-0" tabindex="0" data-drawer="section-campus">
                <i class="fa fa-caret-right u-o50"></i> Admission Guide
              </h2>
              <div id="section-campus" style="display: none;padding:10px 0px;" data-drawer-group="accordion">
                <div class="s-content mt-3"><?php echo $data->guide; ?></div>
              </div>
            </section>
            <?php endif; ?>

            <?php if($data->accommodation_detail!==null): ?>
            <section>
              <h2 class="h4 c-heading-bar u-pointer mb-0" tabindex="0" data-drawer="section-accommodation">
                <i class="fa fa-caret-right u-o50"></i> Accommodation

              </h2>
              <div id="section-accommodation" style="display: none;padding:10px 0px;" data-drawer-group="accordion">
                  <div class="s-content mt-3"><?php echo $data->accommodation_detail; ?></div>
              </div>
            </section>
            <?php endif; ?>

            <?php if($data->expanse!==null): ?>
            <section>
              <h2 class="h4 c-heading-bar u-pointer mb-0" tabindex="0" data-drawer="section-fee">
                <i class="fa fa-caret-right u-o50"></i> Fee Structure
              </h2>
              <div id="section-fee" style="display: none;padding:10px 0px;" data-drawer-group="accordion">
                  <div class="s-content mt-3"><?php echo $data->expanse; ?></div>
              </div>
            </section>
            <?php endif; ?>


<br><br>

<div class="container-fluid Browsesection">
  
        <div class="accordion" id="accordionExample">



                    <div class="card">
                        <div class="card-header1" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">     
                            <span class="title">Available Courses (<?php echo e(count($data->courses)); ?>)</span>
                            <span class="accicon"><i class="fa fa-caret-down"></i></span>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="">
                            <div class="card-body Selectone" style="border: none; margin-top: 20px;">
            
                            <div class="newdivtext">

                                <div class="row mb-3">


                                   <?php $__currentLoopData = $subject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <div style="cursor: pointer;" class="col-md-4 course_search" data-subid="<?php echo e($sub->id); ?>" onclick="openCity(event, 'courses')">
                                        <div class="border mb-3 Accommodationdiv"><p><?php echo e($sub->name); ?> <span style="color: #0B6D76;">(<?php echo e(count($data->courses->where('subject_id',$sub->id))); ?>)</span></p></div>
                                    </div>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            
            
                            </div>
                        </div>
                    </div>


        </div>



        <div class="card">
            <div class="card-header1 collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false">
                <span class="title">About</span>
                <span class="accicon"><i class="fa fa-caret-down"></i></span>
            </div>
            <div id="collapseThree" class="collapse" data-parent="#accordionExample">
              <div class="card-body Selectone" style="border: none; margin-top: 20px;">
               

                <div id="section-about" class="c-overlay mb-3 js-drawer is-partClosed-h200 is-open">
              <div class="s-content">
                <p style="margin-left:0cm; margin-right:0cm; text-align:start">
                  <?php echo $data->about; ?>

                </p>

              <p style="margin-left:0cm; margin-right:0cm; text-align:start">&nbsp;</p></div>
              <div class="c-overlay-item is-gradient-white-bottom w-100 h-25"></div>
            </div>
            <div class="text-center">
              <button class="btn btn-outline-primary d-none" type="button" data-drawer="section-about" data-drawer-open="false">
                <span class="js-drawer-showIf-close">View more</span>
                <span class="js-drawer-showIf-open">View less</span>
              </button>
            </div>

                  
                                </div>
            </div>
        </div>




        <div class="card">
            <div class="card-header1 collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false">
                <span class="title">Review (0)</span>
                <span class="accicon"><i class="fa fa-caret-down"></i></span>
            </div>
            <div id="collapse2" class="collapse" data-parent="#accordionExample">
              <div class="card-body Selectone" style="border: none; margin-top: 20px;">
               


                 <h2 class="h4 c-heading-bar mb-3" style="position: relative;">
                Reviews
                <span class="badge badge-pill badge-secondary"><?php echo e(count($reviews)); ?></span>
              </h2>

              <?php if(count($reviews)>0): ?>
              <?php $__currentLoopData = $reviews->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="javascript:void(0);" class="o-blockLink">
                  <article class="c-bgLight-hoverDark border rounded p-3 mb-3" <?php if(auth()->check() && $review->user_id == auth()->user()->id): ?> style="background-color:#ffffff;border: 1px solid #c52228!important;" <?php endif; ?>>
                    <header class="pb-2">
                      <span class="text-primary">
                         <?php for($i=0; $i<$review->stars; $i++): ?><i class="fa fa-star-o"></i><?php endfor; ?>
                        <span class="sr-only"><?php echo e($review->stars); ?>/5</span>
                      </span>
                    </header>
                    <div class="text-muted small">By <?php if(auth()->check()): ?><?php echo e(($review->user_id == auth()->user()->id)?'You':$review->users->students->name); ?> <?php endif; ?></div>
                    <span class="font-italic read-less">
                      <?php echo implode(' ', array_slice(str_word_count($review->review, 2), 0, 20)); ?>

                    </span>
                    <span class="font-italic read-more" style="display: none;">
                      <?php echo e($review->review); ?>

                    </span>
                    <?php if(str_word_count($review->review)>=20): ?>
                    <small class="text-primary read-more-btn">... Read more</small>
                    <?php endif; ?>
                  </article>
                </a>
                <div class="clearfix"></div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
                <p class="not-found">No Reviews</p>
              <?php endif; ?>




                  
                                </div>
            </div>
        </div>
    
    </div>

    </div>



            <section class="c-heading-bar text-center py-3 mb-4">

              <h6 class="h5">Share this <i class="fa fa-share-alt"></i></h6>


              <a class="fa-stack u-text-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url('university/'.$data->slug)); ?>/">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
              </a>
              <a class="fa-stack u-text-twitter" href="https://twitter.com/home?status=<?php echo e(url('university/'.$data->slug)); ?>/">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
              </a>
              <a class="fa-stack u-text-whatsapp" href="https://wa.me/?text=<?php echo e(url('university/'.$data->slug)); ?>">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-whatsapp fa-stack-1x fa-inverse"></i>
              </a>
            </section>







<div class="slider-container pr-4 pl-4">

        <h6>Other universities and colleges</h6>
        <hr>

        <style type="text/css">
          
        </style>

           <div class="row">
             
            <?php $__currentLoopData = getRandUni(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          
            <div class="card col-md-4 text-center">
              <a href="<?php echo e(url('university/'.$uni->slug)); ?>">
                <img class="img-fluid" src="<?php echo e(url((fix($uni->logo, 'thumbs')))??iph()); ?>" alt="university" alt="">
                <h6><?php echo e($uni->name); ?></h6></a>
                    <p><i class="fa-sharp fa-light fa-location-dot"></i> <?php echo e($uni->city); ?>, <?php echo e($uni->country); ?></p>
            </div>
            
          

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

           </div>


        
        
      </div>





            

          </div>
        </div>

        <div id="Paris" class="tabcontent" style="display: none;">

          <div id="aniimated-thumbnials" style="margin-bottom:50px;">
            <?php if(isset($data->feature_image)): ?>
            <?php for($i=0; $i<count($data->feature_image['image']); $i++): ?>
                <a href="<?php echo e(url(fix($data->feature_image['image'][$i]))); ?>">
                  <img src="<?php echo e(url(fix($data->feature_image['image'][$i], 'thumbs'))); ?>" alt="university" />
                </a>
            <?php endfor; ?>
            <?php else: ?> <p class="not-found">No Images Found</p> <?php endif; ?>
          </div>
        </div>

        <div id="news" class="tabcontent" style="display: none;">
          <section class="container pb-5">
            <h3 class="h4 md-font text-center mb-3">Latest News</h3>
            <div class="col-md-12">
              <div class="acc-box">
                <?php if(count($news)>0): ?>
                  <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <h4 class="card-title h6 acc-btn">
                    <?php echo e($key+1); ?>- <?php echo e(($new->title)??''); ?>

                    <span class="acc_date">(<?php echo e(date('dS M, Y',strtotime($new->created_at))); ?>)</span>
                  </h4>
                  <div class="acc-description">
                    <?php echo ($new->description)??''; ?>

                  </div>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </div>
            </div>
          </section>
        </div>

        <div id="courses" class="tabcontent" style="display: none;">
          <main id="course_filter" class="o-2colLayout-content">


            <section class="o-flex-between align-items-end mb-3">
              <h2 class="d-none d-md-block h2 mb-0">Courses</h2>
              <div><strong><?php echo e(count($data->courses)); ?></strong> courses found</div>
            </section>

            <form id="filter-form" class="bg-light border pt-3 px-3 mb-4" method="GET">
              <h5>Filter courses</h5>

              <div id="filters" class="row">
                <div class="col-md-12" style="margin-bottom: 12px;">
                  <input type="text" class="form-control custom-input" @keyup="fetchData(page)" placeholder="Search Course By Name" v-model="search">
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <select name="qualification" v-model="qualification" @change="fetchData(page)" class="form-control custom-select js-select-resetBtn">
                      <option value="0" selected="">All qualifications</option>
                      <?php $__currentLoopData = qualification(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($qual->id); ?>"><?php echo e($qual->title); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group c-select-resetBtn">
                    <select name="subject" v-model="subject" @change="fetchData(page)" class="form-control custom-select js-select-resetBtn">
                      <option value="0" selected="">All subjects</option>
                      <?php $__currentLoopData = pluckSubjects(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($sub); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
              </div>
            </form>

            <section class="mb-3">
              <div class="course_lists">
                <div class="row" v-if="courses.data && courses.data.length>0">
                  <div class="col-md-6" v-for="course in courses.data">
                    <article class="row no-gutters align-items-center flex-nowrap border-bottom border-top u-small95 pt-4 course-articles">
                      <div class="col">
                        <h6><a :href="baseUrl+'/courses/'+course.id" v-text="course.name"></a><div class="ml-2" style="display: inline;font-size: 13px;position: relative;top: -1px;" v-if="course.qualification_name">({{course.qualification_name.title}})</div></h6>
                        <div class="media mb-3">
                          <div class="media-body mx-2">
                            <div class="text-muted small">
                              <div class=""><i class="fa fa-book"></i> <span v-if="course.subject">{{course.subject.name}}</span></div>
                              <div class=""><i class="fa fa-calendar"></i> {{(course.duration!==null)?course.duration:''}}</div>
                            </div>
                          </div>
                        </div>
                        <div class="btn-group p-0 mx-3" style="bottom: 1px;" v-if="authtype == 'student'">
                          <form class="save-for-later-form" action="<?php echo e(route('addToWishlist')); ?>" method="post" @submit="addToWishlist($event)">
                            <?php echo e(csrf_field()); ?>

                            <button type="submit" class="btn py-1 border u-small80 c-actionBtn"><i class="fa fa-heart"></i> Save </button>
                            <input type="hidden" :value="course.id" name="course_id">
                          </form>
                        </div>
                        <div class="wishlist-status" style="font-size: 12px;color: rgb(197, 34, 40);margin-top: 5px;position: absolute;bottom: -5px;width: 100%;"></div>
                      </div>
                    </article>
                  </div>
                </div>
                <p v-else class="not-found">No Course Found</p>
              </div>

            </section>


            <div class="mt-5 mb-5"></div>
          </main>
        </div>

        <div id="apply" class="tabcontent" style="display: none;">
          <section class="container pb-5">
            <?php echo (getpreferences()['general_meta']['how_to_apply'])??''; ?>

          </section>
        </div>

        <div id="reviews" class="tabcontent" style="display:none;padding-bottom: 50px;">

          <h3 class="h4 md-font text-center mb-3" style="text-transform:capitalize;" Reviews</h3>

          <div class="scroll-area all-reviews scroll2">
            <?php echo $__env->make('frontend.student.review', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div>
          <div class="clearfix"></div>

          <?php if(auth()->check() && auth()->user()->user_type=='student' && count($reviews->where('user_id', auth()->user()->id)) == 0 ): ?>
          <div id="CreateReview" method="POST" class="bg-light border rounded p-3 review" style="position: relative;">
            <fieldset>
                <legend class="h6 form-control-label is-required">Rate <b><?php echo e($data->name); ?></b> Tell others what you think</legend>
                <div class="stars uniDetail">
                  <i class="fa fa-star review-star"></i>
                  <i class="fa fa-star review-star"></i>
                  <i class="fa fa-star review-star"></i>
                  <i class="fa fa-star review-star"></i>
                  <i class="fa fa-star review-star"></i>
                </div>
            </fieldset>

            <div class="form-group">
              <label for="id_pros" class="form-control-label is-required">Review</label>
              <textarea name="content_pros" placeholder="Share some of the best reasons to study at <?php echo e($data->name); ?>" class="textarea form-control rev_reason" cols="40" rows="4" minlength="140" required=""></textarea>
            </div>

            <div class="row">
              <div class="col-auto mb-3">
                <input class="btn btn-primary save-review" type="submit" value="Submit Review">
              </div>
            </div>
          </div>
          <?php endif; ?>
        </div>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customScripts'); ?>
  <script type="text/javascript" src="<?php echo e(asset('assets_frontend/lightGallery/lightgallery.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets_frontend/js/jquery.mCustomScrollbar.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets_frontend/js/jquery-confirm.min.js')); ?>"></script>


  <script>
    $(document).ready(function(){

      $('.c-drawerStack').on('click', 'h2', function(){
        var drawer = $(this).attr('data-drawer');
        if(drawer===undefined){return false;}
        $(this).parent().find('#'+drawer).toggle(function(){
          if($(this).is(':visible')){
            $(this).fadeIn(300);
          }else{
            $(this).fadeOut(300);
          }
        });
      });

      $('.acc-box').on('click', '.acc-btn', function(){
        $(this).next('.acc-description').toggle(function(){
          if($(this).is(':visible')){
            $(this).fadeIn(300);
          }else{
            $(this).fadeOut(300);
          }
        });
      });

      $('#aniimated-thumbnials').lightGallery({
          thumbnail:true,
          animateThumb: false,
          showThumbByDefault: false
      });

      $('.stars').on('mouseenter', '.review-star', function(){
        $(this).addClass('till');
        $('.stars').find('.review-star').each(function(){
          $(this).css('color', '#c52228');
          if($(this).hasClass('till')){
            return false;
          }
        })
      })
      $('.stars').on('click', '.review-star', function(){
        $('.stars').find('.review-star').removeClass('checked-star');
        $(this).addClass('checked-star');
        var count=0;
        $('.stars').find('.review-star').each(function(){
          $(this).css('color', '#c52228');
          count++
          if($(this).hasClass('checked-star')){
            return false;
          }
          $(this).addClass('checked-star');
        })
      })
      $('.stars').on('mouseleave', '.review-star', function(){
        $(this).removeClass('till');
        $('.review-star').css('color', '#dad7d7');
      });
      $('.save-review').on('click', function(){
        var _this = $(this);
        var val = $('.rev_reason').val();
        var stars = $('.uniDetail .review-star.checked-star').length;
        if(val!=='' && stars!==0){
          _this.attr('disabled','disabled');
          setTimeout(()=>{
            _this.removeAttr('disabled');
          },5000);
          $.ajax({
            url: "<?php echo e(route('save-review')); ?>",
            type: 'POST',
            dataType: 'html',
            data: {'review':val, 'stars':stars, 'university_id':'<?php echo e($data->id); ?>', '_token':'<?php echo e(csrf_token()); ?>'},
            success: function(data){
              $('.review').fadeOut(300);
              $('.all-reviews').html(data);
              _this.removeAttr('disabled','disabled');
            }
          })
        }
      });
      $('.read-more-btn').on('click', function(){
        if($(this).parent().find('.read-more').is(':visible')){
          $(this).parent().find('.read-more').fadeOut(300);
          $(this).parent().find('.read-less').delay(300).fadeIn(300);
          $(this).delay(300).text('... Read more');
        }else{
          $(this).parent().find('.read-less').fadeOut(300);
          $(this).parent().find('.read-more').delay(300).fadeIn(300);
          $(this).delay(300).text('Read less');
        }
      })
    });

    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }

    function deleteReview(id, uni_id) {
        $.confirm({
            title: 'Confirm!',
            content: 'Are you sure, You want to Remove this?',
            useBootstrap: false,
            buttons: {
                confirm: function () {
                    $(function(){
                      $.ajax({
                        url: '<?php echo e(route('remove-review')); ?>',
                        type: 'POST',
                        dataType: 'html',
                        data: {'id':id, 'uni_id':uni_id,'_token':'<?php echo e(csrf_token()); ?>'},
                        success: function(data){
                          $('body .all-reviews').html(data);
                          setTimeout(()=>{
                            $('.review').fadeIn(300);
                          },500)
                        }
                      })
                    });
                },
                cancel: function () {
                }
            }
        });
    }

  </script>

  <script>
    var course_filter = new Vue({
      el: '#course_filter',
      data: {
          url: '<?php echo e(route("getUniCourse")); ?>',
          authtype: '<?php echo e((auth()->user()->user_type)??0); ?>',
          baseUrl: '<?php echo e(url("/")); ?>',
          qualification: 0,
          subject: 0,
          university: '<?php echo e($data->id); ?>',
          courses:[],
          search: "",
          moment:moment,
          page: 1,
          limit: '<?php echo e(($meta['paginate'])??5000); ?>',
      },
      created(){

      },
      methods: {
          fetchData(page){
              var _this = this;
              var data='?';
              data+='page='+_this.page;
              (_this.limit!=='')?data+='&limit='+_this.limit:'';
              (_this.search!=='')?data+='&search='+_this.search:'';
              (_this.subject!==0)?data+='&subject='+_this.subject:'';
              (_this.university!==0)?data+='&university='+_this.university:'';
              (_this.qualification!==0)?data+='&qualification='+_this.qualification:'';
              if(!$('.t_loader').is(':visible')){
                  $('.course_lists').fadeOut(200).delay(200);
                  $('.t_loader').delay(200).fadeIn(200)
              }
              axios.get(_this.url+data)
              .then(response => {
                  _this.courses = response.data;
                  // console.log(_this.courses);
                  $(function(){
                      $('.t_loader').fadeOut(200);
                      $('.course_lists').delay(300).fadeIn(200);

                  })
              }).catch(errror=>{

              });
          },
          addToWishlist(event){
            event.preventDefault();
            var action = $(event.target).attr('action');
            var data = $(event.target).serialize();
            axios.post(action, data)
            .then(response => {
              if(response.data == 'success'){
                $(event.target).parent().parent().find('.wishlist-status').text('Successfully saved to wishlist');
                $(event.target).parent().parent().find('.wishlist-status').fadeIn(300).delay(5000).fadeOut(300);
              }else{
                $(event.target).parent().parent().find('.wishlist-status').text('Already in your wishlist');
                $(event.target).parent().parent().find('.wishlist-status').fadeIn(300).delay(5000).fadeOut(300);
              }
            }).catch(errror=>{

            });
          },
          optImage(file, size=null){
            var _this = this;
            var url = '<?php echo e(iph()); ?>';
            if(file==null){
              return url;
            }
            var thumb = file.split("/");
            var sliced = thumb.slice(1, thumb.length-1);
            var temp = sliced.join('/');
            var ext = file.split(".").pop().toLowerCase();
            if(!['jpg', 'png', 'jpeg','svg','gif','exif','bmp'].includes(ext)){
              return url;
            }
            if(size!==null){
              url = temp+'/'+size+'/'+thumb.pop();
            }else{
              if('<?php echo e(is_mobile()); ?>'*1){
                size = 'small';
                url = temp+'/'+size+'/'+thumb.pop();
              }else{
                if('<?php echo e(op_image()); ?>'*1 == 1){
                  size = 'optimize';
                  url = temp+'/'+size+'/'+thumb.pop();
                }else{
                  url = temp+'/'+thumb.pop();
                }
              }
            }
            return url;
          },
      },
      mounted(){
        var _this = this;
        $(document).ready(function(){
          $('.course_search').on('click', function(){
              var id = $(this).attr('data-subid');
              if(id !== undefined && id !==''){
                _this.subject = id;
              }
              _this.fetchData(_this.page)
          });
        });

      },

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
            url: '/sendbtnemail/<?php echo $data->id; ?>/university',   
            data: {},
            dataType: "json",
            success: function (data) {

              if (data.message == 'success') {
                  
                  swal("Success!", data.message_text, "success");
                  
              } 
               else if (data.message == 'login') {
                  
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