<?php $__env->startSection('title', isset($data['seo']->meta_title) ? $data['seo']->meta_title : $data['title']); ?>
<?php $__env->startSection('seo'); ?>
<?php if(isset($data['seo']->show_meta)): ?>
<meta name="keywords" content="<?php echo isset($data['seo']->meta_keywords) ? $data['seo']->meta_keywords : ''; ?>">
<meta name="description" content="<?php echo isset($data['seo']->meta_description) ? $data['seo']->meta_description : ''; ?>">
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('customStyles'); ?>
<style type="text/css">
    {
        ! ! isset($data['custom_css']) ? $data['custom_css']: '' ! !
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="bg-light">

    <?php if(request()->path() !== '/' && request()->path() !== null): ?>
    <nav class="container o-breadcrumb top-link-main">
        <a class="o-breadcrumb-item top-link" href="<?php echo e(url('/')); ?>">Home</a>
        <a class="o-breadcrumb-item top-link" href="<?php echo e(url($data->slug)); ?>">Article Search</a>
    </nav>
    <?php endif; ?>

    <div class="container-fluid text-center firstsection">
        <h1>Search Here Blogs Articles</h1>
        <p>Browse, explore, Request Information from Articles.</p>
        <div class="universities-form-main">
            <form id="searchForm" class="mb-1" action="<?php echo e(route('blog.search')); ?>" method="GET">
                <div class="universities-form-block">
                    <input type="text" id="searchInput" name="keyword" class="form-control uni-search searchform2" placeholder="Search..." autocomplete="Off">
                    <button type="submit" class="Searchbtn2"><i class="fa fa-search"></i></button>
                </div>
                <script>
                    // JavaScript code to preserve the search text in the input field
                    document.addEventListener("DOMContentLoaded", function() {
                        // Get the search input field and the search query from the URL
                        var searchInput = document.getElementById('searchInput');
                        var urlParams = new URLSearchParams(window.location.search);
                        var keyword = urlParams.get('keyword');

                        // Set the value of the search input field to the search query
                        if (keyword) {
                            searchInput.value = keyword;
                        }
                    });
                </script>
            </form>
            <div style="position: absolute;" class="is-dropdown w-100 u-maxw-680px bg-white u-boxShadow-light d-none search-uni scroll2"></div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row blog-main-row pb-5">
            <?php if(isset($relatedBlogs) && !$relatedBlogs->isEmpty()): ?>
            <?php $__currentLoopData = $relatedBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="article-card-main col-sm-6">
                <a href="<?php echo e(url(($blog->slug) ?? '#')); ?>">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pl-0 pr-0">
                            <div class="imgcol">
                                <img class="card-img-top" width="100%" height="100%" alt="<?php echo e($blog->title); ?>" src="<?php echo e(url(($blog->image) ?? '#')); ?>" data-echo="<?php echo e(url(($blog->image) ?? '#')); ?>">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="colmd12 textcol">
                                <div class="blog-content-main">
                                    <h3><?php echo e($blog->title); ?> 1</h3>
                                    <p><?php echo $blog->short_description; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <div class="col-sm-12 text-center">
                <p>No Record Found</p>
            </div>
            <?php endif; ?>
        </div>
        <!-- Pagination links -->
        <div class="col-sm-12 mt-5 text-center">
    <?php if($relatedBlogs->total() > 0 && $relatedBlogs->count() > 0): ?>
        <nav aria-label="Page navigation" style="display: inline-block; margin:0 auto 40px; max-width:max-content;">
            <ul class="pagination small blogs-pagination">
                <?php if($relatedBlogs->currentPage() != 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($relatedBlogs->appends(['keyword' => $keyword])->url(1)); ?>">
                            <i class="fa fa-chevron-left"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php for($i = 1; $i <= $relatedBlogs->lastPage(); $i++): ?>
                    <li class="<?php echo e(($relatedBlogs->currentPage() == $i) ? 'active page-item' : 'page-item'); ?>">
                        <a class="page-link" href="<?php echo e($relatedBlogs->appends(['keyword' => $keyword])->url($i)); ?>">
                            <?php echo e($i); ?>

                            <?php echo ($relatedBlogs->currentPage() == $i) ? '<span class="sr-only">(current)</span>' : ''; ?>

                        </a>
                    </li>
                <?php endfor; ?>
                <?php if($relatedBlogs->currentPage() != $relatedBlogs->lastPage()): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($relatedBlogs->appends(['keyword' => $keyword])->url($relatedBlogs->lastPage())); ?>">
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>