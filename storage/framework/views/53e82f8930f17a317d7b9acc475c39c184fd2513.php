<style type="text/css">
  .note-video-clip {
    width: 100% !important;
  }
</style>


<?php if(!in_array(request()->path(), pluckBlog())): ?>
<div class="po_un_col1 my-5 left-heading-container">
  <div class="section-left-heading-block">
    <h3 class="section-heading ">latest
      <span class="section-heading-span">articles</span>
    </h3>
    <!-- <p class="section-paragraph section-heading-paragraph">Stay updated on universities and courses with our insightful articles. Explore academic trends, institution profiles, and career advice to guide your educational journey.</p> -->
  </div>
</div>
<div class="container" style="border: 1px solid grey; padding: 15px; background: #0B6D76; border-radius: 5px; margin-bottom:20px;">
  <ul class="list-group list-group-horizontal mt-0" style="display: table;">
    <?php $__currentLoopData = getBlogCategories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="list-group-item" style="display: inline; background: #0B6D76;"><a style="color: white !important;" href="<?php echo e((url($cate->slug))??''); ?>"><?php echo e($cate->name); ?></a></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<div class="container">
  <div class="row blog-main-row pb-5">
    <?php
    $paginate = (isset($meta['paginate']))?$meta['paginate']:0;
    $category = (isset($blog->id))?$blog->id:null;
    ?>
    <?php if(count(getBlogs(0,$category))>0): ?>
    <?php $__currentLoopData = popularBlog(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="article-card-main col-sm-6">
      <a href="<?php echo e(url(($blog->slug)??'#')); ?>">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pl-0 pr-0">
            <div class="imgcol">
              <img class="card-img-top" width="100%" height="100%" alt="<?php echo $blog->title; ?>" src="<?php echo e(url(($blog->image)??'#')); ?>" data-echo="<?php echo e(url(($blog->image)??'#')); ?>">
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
            <div class="colmd12 textcol">
              <div class="blog-content-main">
                <h3><?php echo e(($blog->title)??''); ?></h3>
                <p><?php echo ($blog->short_description)??''; ?></p>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $check_count = 0; ?>
    <?php $__currentLoopData = getBlogs($paginate,$category); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($blog->is_featured == 0): ?>
    <?php if ($check_count == 0) { ?>
      <div class="article-card-main  col-sm-6">
        <a href="<?php echo e(url(($blog->slug)??'#')); ?>">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pl-0 pr-0">
              <div class="imgcol">
                <img class="card-img-top" width="100%" height="100%" alt="<?php echo $blog->title; ?>" src="<?php echo e(url(($blog->image)??'#')); ?>" data-echo="<?php echo e(url(($blog->image)??'#')); ?>">
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
              <div class="colmd12 textcol">
                <div class="blog-content-main">
                  <h3><?php echo e(($blog->title)??''); ?></h3>
                  <p><?php echo ($blog->short_description)??''; ?></p>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php $check_count = 1;
    } else { ?>
      <div class="article-card-main  col-sm-6">
        <a href="<?php echo e(url(($blog->slug)??'#')); ?>">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pl-0 pr-0">
              <div class="imgcol">
                <img class="card-img-top" width="100%" height="100%" alt="<?php echo $blog->title; ?>" src="<?php echo e(url(($blog->image)??'#')); ?>" data-echo="<?php echo e(url(($blog->image)??'#')); ?>">
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
              <div class="colmd12 textcol">
                <div class="blog-content-main">
                  <h3><?php echo e(($blog->title)??''); ?></h3>
                  <p><?php echo ($blog->short_description)??''; ?></p>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php  } ?>
    <?php endif; ?>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="col-sm-12 mt-5">
      <?php if(count(getBlogs($paginate,$category))>0 && $paginate !== 0 && count(getBlogs($paginate,$category))<count(getBlogs(0,$category))): ?> <nav class="Page navigation" aria-label="Page navigation">
        <ul class="pagination small blogs-pagination">
          <?php
          $result = getBlogs($paginate,$category);
          $count=$result->lastPage()+1;
          ?>
          <?php if($result->currentPage()!=1): ?><li class="page-item active"><a class="page-link" href="<?php echo e($result->url(1)); ?>"><i class="fa fa-chevron-left"></i></a></a></li><?php endif; ?>
          <?php for($i=1; $i<$count; $i++): ?> <li class=<?php echo e(($result->currentPage()==$i)?'active page-item':'page-item'); ?>>
            <a class="page-link " href="<?php echo e($result->url($i)); ?>"><?php echo e($i); ?>

              <?php echo ($result->currentPage()==$i)?'<span class="sr-only">(current)</span>':''; ?>

            </a>
            </li>
            <?php endfor; ?>
            <?php if($result->currentPage()!=$result->lastPage()): ?><li class="page-item active"><a class="page-link" href="<?php echo e($result->url($result->lastPage())); ?>"><i class="fa fa-chevron-right"></i></a></a></li><?php endif; ?>
        </ul>
        </nav>
        <?php endif; ?>
    </div>
    <?php else: ?>
    <p style="margin-top: 50px;text-align: center;color: #919191;font-size: 22px;">No Blog Posted</p>
    <?php endif; ?>
  </div>
</div>
<?php else: ?>
<div class="o-2colLayout container">
  <main class="o-2colLayout-content mr-md-5">
    <header class="pt-5 pb-3 articles-details-header">
      <h1 class="m-0 article-details-heading"><?php echo e($blog->title); ?></h1>
      <p class="text-muted article-details-header-paragraph">
        By <strong><?php echo e(getAuthorName($blog->user_id)); ?></strong> |
        Last modified <?php echo e(date('dS M Y', strtotime($blog->updated_at))); ?>

      </p>
    </header>


    <!--<section class="mb-4">-->
    <!--  <div class="d-lg-none">-->
    <!--    <div class="js-share u-pointer u-small95">-->

    <!--      <strong class="text-primary">Share this page with friends</strong>-->
    <!--    </div>-->
    <!--    <aside class="c-share">-->
    <!--      <div class="c-share-body is-onTrigger bg-light rounded u-boxShadow-light h4 p-2">-->
    <!--        <a href="http://www.facebook.com/sharer.php?u=<?php echo e(Request::url()); ?>"><i class="fa fa-facebook-official u-text-facebook"></i></a>-->
    <!--        <a href="https://twitter.com/intent/tweet?text=<?php echo e(str_replace(" ", "+", $blog->title)); ?>&amp;url=<?php echo e(Request::url()); ?>"><i class="fa fa-twitter u-text-twitter"></i></a>-->
    <!--        <a href="https://plus.google.com/share?url=<?php echo e(Request::url()); ?>&amp;name=<?php echo e(str_replace(" ", "+", $blog->title)); ?>"><i class="fa fa-google-plus u-text-google-plus"></i></a>-->
    <!--      </div>-->
    <!--    </aside>-->
    <!--  </div>-->
    <!--  <div class="d-none d-lg-flex flex-wrap"> -->
    <!--      <a href="http://www.facebook.com/sharer.php?u=<?php echo e(Request::url()); ?>" class="d-block text-white rounded p-2 mx-1 mb-2 u-bg-facebook">-->
    <!--        <i class="fa fa-lg fa-facebook-official"></i> Share on Facebook-->
    <!--      </a>-->
    <!--      <a href="https://twitter.com/intent/tweet?text=<?php echo e(str_replace(" ", "+", $blog->title)); ?>&amp;url=<?php echo e(Request::url()); ?>" class="d-block text-white rounded p-2 mx-1 mb-2 u-bg-twitter" ><i class="fa fa-lg fa-twitter"></i> Twitter</a>-->
    <!--      <a href="https://plus.google.com/share?url=<?php echo e(Request::url()); ?>&amp;name=<?php echo e(str_replace(" ", "+", $blog->title)); ?>" class="d-block text-white rounded p-2 mx-1 mb-2 u-bg-google-plus" style="background: #e60303;"><i class="fa fa-lg fa-google-plus"></i> Google</a>-->
    <!--  </div>-->
    <!--</section>-->
    <style>
      .socilaMediaIconSize {
        font-size: 2rem;
      }
    </style>

    <section class="container mb-3">
      <div class="d-lg-none">
        <div class="js-share u-pointer u-small95">
          <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(Request::url()); ?>/"><i class="fa fa-facebook-official u-text-facebook socilaMediaIconSize"></i></a>
          <a href="https://twitter.com/home?status=<?php echo e(Request::url()); ?>/"><i class="fa fa-twitter u-text-twitter socilaMediaIconSize"></i></a>
          <a href="https://wa.me/?text=<?php echo e(Request::url()); ?>"><i class="fa fa-whatsapp u-text-whatsapp socilaMediaIconSize"></i></a>
          <a href="https://plus.google.com/share?url=<?php echo e(Request::url()); ?>&amp;name=<?php echo e(str_replace(" ", "+", $blog->title)); ?>"><i class="fa fa-google-plus u-text-google-plus socilaMediaIconSize"></i></a>
          <strong class="text-primary">Share this page with friends</strong>
        </div>
        <aside class="c-share">
          <div class="c-share-body is-onTrigger bg-light rounded u-boxShadow-light h4 p-2">
            <a class="fa-stack u-text-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(Request::url()); ?>/">
              <i class="fa fa-square fa-stack-2x"></i>
              <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
            </a>
            <a class="fa-stack u-text-twitter" href="https://twitter.com/home?status=<?php echo e(Request::url()); ?>/">
              <i class="fa fa-square fa-stack-2x"></i>
              <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
            </a>
            <a class="fa-stack u-text-whatsapp" href="https://wa.me/?text=<?php echo e(Request::url()); ?>">
              <i class="fa fa-square fa-stack-2x"></i>
              <i class="fa fa-whatsapp fa-stack-1x fa-inverse"></i>
            </a>
          </div>
        </aside>
      </div>
      <div class="d-none d-lg-flex flex-wrap">
        <a class="d-block text-white rounded p-2 mx-1 mb-2 u-bg-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(Request::url()); ?>/">
          <i class="fa fa-lg fa-facebook-official"></i> Share on Facebook
        </a>
        <a class="d-block text-white rounded p-2 mx-1 mb-2 u-bg-twitter" href="https://twitter.com/home?status=<?php echo e(Request::url()); ?>/">
          <i class="fa fa-lg fa-twitter"></i> Twitter
        </a>
        <a class="d-block text-white rounded p-2 mx-1 mb-2 u-bg-whatsapp" href="https://wa.me/?text=<?php echo e(Request::url()); ?>">
          <i class="fa fa-lg fa-whatsapp"></i> WhatsApp
        </a>
        <a href="https://plus.google.com/share?url=<?php echo e(Request::url()); ?>&amp;name=<?php echo e(str_replace(" ", "+", $blog->title)); ?>" class="d-block text-white rounded p-2 mx-1 mb-2 u-bg-google-plus" style="background: #e60303;"><i class="fa fa-lg fa-google-plus"></i> Google</a>
      </div>
    </section>
    <section class="s-content clearfix mb-4">
      <div class="article-details-content-main">
        <?php echo $blog->description; ?>

      </div>
    </section>

    <section class="small text-muted mb-4">
      <div>
        <i class="fa fa-calendar"></i>
        Posted on <?php echo e(date('dS M Y', strtotime($blog->created_at))); ?>

      </div>
      <div>
        <i class="fa fa-tag"></i>
        <a href="<?php echo e(url(($blog->category->slug)??'#')); ?>"><?php echo e($blog->category->name); ?></a>
      </div>
    </section>
    <?php $__env->startSection('schemaMarkup'); ?>

    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
          <?php
          $question = json_decode($blog->sm_question);
          $answer = json_decode($blog->sm_answer);
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

    <?php $__env->stopSection(); ?>

    <section class="mb-4">
      <div id="fb-root"></div>
      <div class="fb-comments" data-href="https://www.easyuni.com/advice/8_Lessons_from_Failure-2442/" data-num-posts="2" data-width="100%"></div>
    </section>

    <!-- added by sadam start --->
    <section class="mb-5">
      <h4 class="mb-3">You might be interested in...</h4>
      <div class="row">
        <?php
        $randomArticle = DB::table('blogs')->select('title', 'slug')->inRandomOrder()->limit(8)->get();
        ?>
        <?php if(count($randomArticle)>0): ?>
        <?php $__currentLoopData = $randomArticle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $c='primary';
        $r=rand(1,3);
        if($r==1){$c='primary';}elseif($r==2){$c='success';}
        elseif($r==3){$c='info';}
        ?>
        <!--<article class="col-md-6 border-top border-bottom u-mb-n1px px-3">-->
        <article class="col-md-6 border-top  u-mb-n1px px-3">
          <a class="row" href="<?php echo e(url($article->slug)); ?>">
            <div class="col-2 h2 o-flex-center rounded text-white bg-<?php echo e($c); ?> py-1 my-3">
              <?php echo e($key+1); ?>

            </div>
            <div class="col my-3"><?php echo e($article->title); ?></div>
          </a>
        </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

      </div>
    </section>
    <!-- end add by sadam -->

  </main>
  <aside class="o-2colLayout-sidebar">

    <section class="mb-4">
      <h5 class="mb-3">Categories</h5>
      <?php $__currentLoopData = getBlogCategories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a class="d-block" href="<?php echo e((url($cate->slug))??''); ?>"><?php echo e($cate->name); ?></a>
      <hr class="my-2">
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>

    

  </aside>
</div>

<div style="clear: both;"></div>

<?php endif; ?>



<div class="modal " id="apply_now_form" data-toggle="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <strong class="modal-title"> <span class="font-weight-light">Apply Now</span></strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <style>
        .input {
          margin-bottom: 10px;
        }

        .btn {
          background-color: #0A74B9;
          color: white;
        }
      </style>
      <form id="apply_now_form_data">
        <div class="modal-body">
          <div class="row input">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
            </div>
            <div class="col-md-6">
              <input type="text" name="phone_number" class="form-control" placeholder="Enter Your Phone Number ">
            </div>
          </div>
          <div class="row input">
            <div class="col-md-6">
              <input type="text" name="city" class="form-control" placeholder="Enter Your City">
            </div>
            <div class="col-md-6">
              <input type="text" name="last_education" class="form-control" placeholder="Enter Your Last Education">
            </div>
          </div>
          <div class="row input">
            <div class="col-md-12">
              <input type="text" name="intrested_country" class="form-control" placeholder="Intrested Country">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" onclick="apply_now_submit(this)">Submit</button>
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->


  <script>
    function apply_now_submit(input) {
      $(':input').removeClass('has-error');
      $('.error-span').remove();
      axios.post('/apply-now-form', $('#apply_now_form_data').serialize()).then(function(response) {
        if (response.data.status == 'success') {
          swal({
            title: response.data.msg,
            icon: "success",
          }).then(data => {
            window.location.reload()
          });
        } else if (response.data.status == 'error') {
          $(input).attr('disabled', false);
          $('.alert-danger').text(response.data.msg);
          $('.alert-danger').show();
        }
      }).catch(function(error) {
        $(input).attr('disabled', false);
        $.each(error.response.data.errors, function(k, v) {
          $('input[name="' + k + '"]').addClass("has-error");
          $('input[name="' + k + '"]').after("<span class='error-span'>" + v[0] + "</span>");
        });
      });
    }
  </script>