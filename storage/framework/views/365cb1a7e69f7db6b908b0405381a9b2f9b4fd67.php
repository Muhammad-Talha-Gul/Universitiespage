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

    .row.Countryimg {
        margin-top: 23px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="bg-light">
    <nav class="container o-breadcrumb top-link-main">
        <a class="o-breadcrumb-item" href="<?php echo e(url('/')); ?>">Home</a>
        <a class="o-breadcrumb-item" href="<?php echo e(url('visit_visa')); ?>">Visit Visa</a>
    </nav>
</div>



<div class="container-fluid searchsectionbg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 textcol1" style="text-align: center;">
                <h4>Search By Country</h4>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid Browsesection">
    <div class="container">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header1" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">
                    <span class="title">Available Visit Vise By Country</span>
                    <span class="accicon"><i class="fa fa-caret-down"></i></span>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="">
                    <div class="card-body Selectone" style="border: none;">
                        <div class="row Countryimg">
                            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (!isset($dataz->slug)) {
                                continue;
                            }  ?>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 flagcol1 mb-4">
                                <a href="<?php echo e(url('visa/'.$dataz->slug)); ?>"><img class="img-fluid" src="<?php echo e($dataz->country_image); ?>" alt="<?php echo e($dataz->country_name); ?>">
                                    <p class="visit-block-paragraph"><?php echo e($dataz->country_name); ?></p>
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </div>
</div>



<br><br><br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>