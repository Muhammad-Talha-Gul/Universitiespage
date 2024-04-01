<?php if(isset($meta['style'])): ?>
<?php if($meta['style'] == 'style1'): ?>
  <section class="main__container <?php echo e(isset($meta['class']) ? $meta['class'] : ''); ?>">
      <div class="banner-slide">
         <img src="<?php echo e((isset($meta['image']))?url(fix($meta['image'])):iph()); ?>">
         <div class="container">
            <div class="caption-text">
             <h1 id="leaders" class="">
                  <span class="text-white">
                    <?php if($blog!==null): ?>
                      <?php echo e((isset($blog->title))? $blog->title : $blog->name); ?>

                    <?php elseif(isset($_GET['about'])): ?>
                      <?php echo e($_GET['about']); ?>

                    <?php else: ?>
                      <?php echo e(isset($meta['title']) ? $meta['title'] : ''); ?>

                    <?php endif; ?>
                  </span>
                  <?php if(in_array(request()->path(), pluckBlog())): ?><strong class="cadmin">By <?php echo e(getAuthorName($blog->user_id)); ?></strong><?php endif; ?>

              </h1>
               <a href="#more" class="hero__welcome action__welcome" <?php if(request()->path() == 'our-consultants' ): ?>  <?php else: ?> style="visibility:hidden; <?php endif; ?>">
                 View List 
               <span class="hero__welcome__icon scdown svgstore svgstore--Caret-down">
                 <i class="fas fa-chevron-down"></i>                      
               </span>               
            </a>

            </div>
         </div>
      </div>

      <div id="more" class="container">
            
        
      </div>
  </section>
<?php elseif($meta['style'] == 'style2'): ?>

  




  <!-- /* ..................Our Team Section Start............. */ -->


<div class="container-fluid OurTeamsection">
<div class="container">
  <div class="row">

    <div class="col-lg-3  ourteamcol">
      <h2><?php echo isset($meta['title']) ? $meta['title'] : ''; ?></h2>
    </div>

    <div class="col-lg-9 col-md-12 UniversitiesPageTeamcol">
      <p><?php echo $meta['text']; ?></p>
      <h3><?php echo e(($meta['sub_title'])??''); ?></h3>
      <h6><?php echo e(($meta['text2'])??''); ?></h6>
    </div>

  </div>
</div>
</div>


<!-- /* ..................Our Team Section End............. */ -->


<?php endif; ?>
<?php endif; ?>