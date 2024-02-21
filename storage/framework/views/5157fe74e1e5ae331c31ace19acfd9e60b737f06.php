<?php $__env->startSection('content'); ?>
<div class="first-section py-5">
    <div class="container">
        <div class="firstsection text-center firstsection discount-content-main">
            <h1>100% Discount Offer</h1>
            <p>100% discount offer program is designed by our company to encourage and support poor families students who want to study abroad but cannot afford consultancy fee.</p>
            <p>The student must come under the following criteria.</p>
            <ul class="descount-list">
                <li class="descount-list-item"><p class="descount-paragaraph"> Must be from a deserving family.</p></li>
                <li class="descount-list-item"><p class="descount-paragaraph"> Must have 70% marks in the last education.</p></li>
                <li class="descount-list-item"><p class="descount-paragaraph"> The study gap should not be more than 1.5 years.</p></li>
                <li class="descount-list-item"><p class="descount-paragaraph"> Pass the final interview for selection.</p></li>
            </ul>
        </div>
    </div>
</div>
<div class="Browsesection">
    <div class="container">
        <div class="accordion-main">
            <div class="accordion" id="accordionExample">
                <div class="cardntio">
                    <div class="card-header1" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">
                        <span class="title">Fill The Form Below to Apply Now</span>
                        <span class="accicon"><i class="fa fa-caret-down"></i></span>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="">
                        <div class="card-body Selectone" style="border: none;">
                            <div class="Discountform">
                                <div class="col-md-12">
                                    <?php if (isset($_GET['message'])) { ?>
                                        <div class="alert alert-success" style="text-align: center;">
                                            <strong>Success!</strong> Your Request Has Been Send Successfully.
                                        </div>
                                    <?php } ?>
                                </div>
                                <form action="<?php echo e(url('send-offer')); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="type" value="discountOffer">
                                    <div class="row">
                                        <div class="form-group col-md-6 inputcol121">
                                            <label class="label-control label1">Student Name</label>
                                            <input type="text" class="form-control descount-input" required="" value="<?php echo e(old('name')); ?>" name="name" autocomplete="Off" placeholder="Enter Your  Name">
                                        </div>
                                        <div class="form-group col-md-6 inputcol121">
                                            <label class="label-control label1">Last Education</label>
                                            <input type="text" class="form-control descount-input" required="" value="<?php echo e(old('lastEducation')); ?>" name="lastEducation" autocomplete="Off" required placeholder="Enter Your Last Education">
                                        </div>
                                        <div class="form-group col-md-6 inputcol121">
                                            <label class="label-control label1">Last Education % <small>(Example 70%)</small></label>
                                            <input type="text" class="form-control descount-input" required="" value="<?php echo e(old('lastEducationPer')); ?>" name="lastEducationPer" autocomplete="Off" placeholder="Enter Your  Persentage">
                                        </div>
                                        <div class="form-group col-md-6 inputcol121">
                                            <label class="label-control label1">Phone No.</label>
                                            <input type="number" class="form-control descount-input" required="" value="<?php echo e(old('phone')); ?>" name="phone" autocomplete="Off" placeholder="Phone Number">
                                        </div>
                                        <div class="form-group col-md-6 inputcol121">
                                            <label class="label-control label1">Email</label>
                                            <input type="email" class="form-control descount-input" required="" value="<?php echo e(old('email')); ?>" name="email" autocomplete="Off" placeholder="Enter Your  Email">
                                        </div>
                                        <div class="form-group col-md-6 inputcol121">
                                            <label class="label-control label1">Office Location</label>
                                            <select class="form-control descount-input" name="location">
                                                <option <?php echo e(old('location')== 'lahore' ? 'selected' : ''); ?> value="lahore">Lahore</option>
                                                <option <?php echo e(old('location')== 'islamabad' ? 'selected' : ''); ?> value="islamabad">Islamabad</option>
                                            </select>
                                            <!--<input type="number" class="form-control descount-input" required="" value="<?php echo e(old('phone')); ?>" name="phone" autocomplete="Off">-->
                                        </div>
                                        <div class="form-group col-md-12 inputcol121 mt-2">
                                            <label class="label-control label1" style="font-size:14px;">Why should select you for this offer? ( Write your educational grades and family financial background)</label>
                                            <textarea class="form-control descount-input textarea p-3" name="familyDetail" required="" rows="6" autocomplete="Off" placeholder="Enter Details"><?php echo e(old('familyDetail')); ?></textarea>
                                        </div>
                                    </div>
                                    <!-- <p class="terms">By clicking Submit, you agree to our <a href="<?php echo e(url('terms-and-condition')); ?>">Terms and Conditions</a>.</p>
                                        <p class="terms">After submitting your Complaint, We will contact you as soon as possible.</p>
                                         -->
                                    <div class="form-group inputcol121 text-center pt-5">
                                        <button type="submit" class="btn btn-primary Filterbtn">Submit Offer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>