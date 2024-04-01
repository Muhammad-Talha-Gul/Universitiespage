<?php $__env->startSection('title', 'Application Form | '.$data->name.' | '.$data->university->name); ?>


<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
<section class="contact-us py-5">
    <div class="container">
        <div class="contact-top-content-main">
            <h2 class="h2 contact-us-heading">
                Do you want to Contact Us?
            </h2>
            <p class="p contact-us-paragraph">
                If you are facing any issue or if you have any requiremnt and complaint then you can contact with us
            </p>
        </div>
        <div class="contact-us-main pt-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 mb-3">
                    <div class="office-location-main">
                        <div class="contact-us-card-header">
                            <h6 class="h6 header-heading">Lahore Office</h6>
                        </div>
                        <div class="office-location-list-main">
                            <ul class="office-list">
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="<?php echo e(asset('assets_frontend/images/svg/location.svg')); ?>" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            Universities Page,2nd Floor faisal bank,Raja Market,Garden town,Lahore,Pakistan
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="<?php echo e(asset('assets_frontend/images/svg/mail.svg')); ?>" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            Info@universitiespage.com
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="<?php echo e(asset('assets_frontend/images/svg/whatsapp.svg')); ?>" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            03112853198
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="<?php echo e(asset('assets_frontend/images/svg/phone-call.svg')); ?>" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0324 3640038an
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="<?php echo e(asset('assets_frontend/images/svg/phone-call.svg')); ?>" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0333 0033235
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="<?php echo e(asset('assets_frontend/images/svg/phone-call.svg')); ?>" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0310 3162004
                                        </p>

                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="location-footer-main">
                            <h5 class="h5 socail-list-heading">Follow Us</h5>
                            <ul class="office-social-list">
                                <?php $__currentLoopData = getSocialMeta(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($social!==null): ?>
                                <li class="office-socail-list-item">
                                    <a class="lahore-location-link" target="_blank" href="<?php echo e(($social)??''); ?>" title="Facebook">
                                        <i class="fa fa-<?php echo e($key); ?> u-text-<?php echo e($key); ?>"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li class="office-socail-list-item">
                                    <a class="lahore-location-link" target="_blank" href="https://whatsapp.com/channel/0029Va7vJOYJkK79737At844" title="whatsapp">
                                        <i class="fa fa-whatsapp u-text-whatsapp"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 mb-3">
                    <div class="office-location-main">
                        <div class="contact-us-card-header">
                            <h6 class="h6 header-heading">Islamabad Office</h6>
                        </div>
                        <div class="office-location-list-main">
                            <ul class="office-list">
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="<?php echo e(asset('assets_frontend/images/svg/location.svg')); ?>" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            Universities Page, Punjab market,Venus Plaza, 1st Floor, Office No. 1, Sector G13/4,Islamabad
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="<?php echo e(asset('assets_frontend/images/svg/mail.svg')); ?>" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            Info@universitiespage.com
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="<?php echo e(asset('assets_frontend/images/svg/whatsapp.svg')); ?>" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0334 9990308
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="<?php echo e(asset('assets_frontend/images/svg/phone-call.svg')); ?>" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0335 9990308
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="<?php echo e(asset('assets_frontend/images/svg/phone-call.svg')); ?>" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0334 9990308
                                        </p>

                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="location-footer-main">
                            <h5 class="h5 socail-list-heading">Follow Us</h5>
                            <ul class="office-social-list">
                                <?php $__currentLoopData = getSocialMeta(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($social!==null): ?>
                                <li class="office-socail-list-item">
                                    <a class="lahore-location-link" target="_blank" href="<?php echo e(($social)??''); ?>" title="Facebook">
                                        <i class="fa fa-<?php echo e($key); ?> u-text-<?php echo e($key); ?>"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li class="office-socail-list-item">
                                    <a class="lahore-location-link" target="_blank" href="https://whatsapp.com/channel/0029Va7vJOYJkK79737At844" title="whatsapp">
                                        <i class="fa fa-whatsapp u-text-whatsapp"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 mb-3">
                    <div class="office-location-main">
                        <div class="contact-us-card-header">
                            <h6 class="h6 header-heading">Karachi Office</h6>
                        </div>
                        <div class="office-location-list-main">
                            <ul class="office-list">
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="<?php echo e(asset('assets_frontend/images/svg/location.svg')); ?>" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            Universities Page,1st floor, Amber Estate, Shahrah-e-Faisal Rd, Bangalore Town Block A Shah, Karachi, Sindh
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="<?php echo e(asset('assets_frontend/images/svg/mail.svg')); ?>" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            Info@universitiespage.com
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="<?php echo e(asset('assets_frontend/images/svg/whatsapp.svg')); ?>" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            03112853198
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="<?php echo e(asset('assets_frontend/images/svg/phone-call.svg')); ?>" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0324 3640038an
                                        </p>

                                    </div>
                                </li>
                                <li class="office-list-item">
                                    <div class="location-icon-span">
                                        <img src="<?php echo e(asset('assets_frontend/images/svg/phone-call.svg')); ?>" alt="" srcset="" class="location-icon">
                                    </div>
                                    <div class="office-pargraph-content-span">
                                        <p class="p office-location-paragraph">
                                            0333 0033235
                                        </p>

                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="location-footer-main">
                            <h5 class="h5 socail-list-heading">Follow Us</h5>
                            <ul class="office-social-list">
                                <?php $__currentLoopData = getSocialMeta(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($social!==null): ?>
                                <li class="office-socail-list-item">
                                    <a class="lahore-location-link" target="_blank" href="<?php echo e(($social)??''); ?>" title="Facebook">
                                        <i class="fa fa-<?php echo e($key); ?> u-text-<?php echo e($key); ?>"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li class="office-socail-list-item">
                                    <a class="lahore-location-link" target="_blank" href="https://whatsapp.com/channel/0029Va7vJOYJkK79737At844" title="whatsapp">
                                        <i class="fa fa-whatsapp u-text-whatsapp"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="message-section py-5">
    <div class="container">
        <div class="bottom-main">
            <div class="apply-online-main contact-us-from-main w3-teal">

                <form action="<?php echo e(route('message-post')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="modal-body p-0">
                        <div class="row input m-0">
                            <div class="col-sm-12 mb-3">
                                <div class="contact-us-card-header">
                                    <h6 class="h6 header-heading">Enter Here Your Message</h6>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 mb-3">
                                <label for="" class="apply-inpu-label contact-us-label">Select Reason</label>
                                <select class="form-control apply-input" aria-label="Default select example" name='message_reason' required>
                                    <option selected>Select Reason</option>
                                    <option>Account Delete</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <label for="" class="apply-inpu-label contact-us-label">Full Name</label>
                                <input type="text" name="user_name" class="form-control apply-input" placeholder="Enter Your Name" required>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <label for="" class="apply-inpu-label contact-us-label">Enter Email</label>
                                <input type="email" name="user_email" class="form-control apply-input" placeholder="Enter Your Email" required>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                                <label for="" class="apply-inpu-label contact-us-label">Enter Message</label>
                                <textarea name="message" id="" cols="30" rows="10" class="form-control apply-input" placeholder="Enter Your Mesaage" maxlength="1000" required></textarea>
                            </div>
                            <div class="col-sm-12 text-center my-3" style="display: flex;">
                                <button type="submit" class="btn btn-default pull-left" style="margin: 0 auto;">Send Mesaage</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>