<?php $__env->startSection('content'); ?>
<div class="bg-light">

    <!--<header class="container" style="margin-top: 20px;">-->
    <!--  <div class="fluid-container" align="left">-->
    <!--      <h1>Complaint</h1>-->
    <!--  </div>-->
    <!--</header>-->

    <section class="py-5 complaint-sention guide-detail-section">
        <div class="container">

            <div class="dashboard-edit-profile" style="background: #fff;">
                <div class="row" id="complaint">
                    <div class="col-md-12 mb-2" style="text-align: center;">
                        <h4 style="font-size:20px;">Complaint/Suggestion Box</h4>
                        <p style="font-size: 16px;">If you have any complaint or suggestion please send us message</p>
                    </div>
                    <div class="col-md-12">
                        <?php if (isset($_GET['message'])) { ?>
                            <div class="alert alert-success" style="text-align: center;">
                                <strong>Success!</strong> Your Compliant Has Been Send Successfully.
                            </div>
                        <?php } ?>
                    </div>

                    <form action="<?php echo e(url('send-mail')); ?>" method="POST" style="width:100%;">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="type" value="complaint">
                        <div class="row">
                            <div class="form-group col-md-6 p-relative">
                                <label class="form__label dashboard-form-label">Name</label>
                                <input type="text" class="form-control" required="" value="<?php echo e(old('name')); ?>" name="name" autocomplete="Off" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6 p-relative">
                                <label class="form__label dashboard-form-label">Email</label>
                                <input type="email" class="form-control" required="" value="<?php echo e(old('email')); ?>" name="email" autocomplete="Off" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6 p-relative">
                                <label class="form__label dashboard-form-label">Subject</label>
                                <input type="text" class="form-control" required="" value="<?php echo e(old('subject')); ?>" name="subject" autocomplete="Off" placeholder="Subject">
                            </div>
                            <div class="form-group col-md-6 p-relative">
                                <label class="form__label dashboard-form-label">Phone No.</label>
                                <input type="number" class="form-control" required="" value="<?php echo e(old('phone')); ?>" name="phone" autocomplete="Off" placeholder="Phone Number">
                            </div>
                            <div class="form-group col-md-12 p-relative">
                                <label class="form__label dashboard-form-label">Office Location</label>
                                <select class="form-control" name="location">
                                    <option <?php echo e(old('location')== 'lahore' ? 'selected' : ''); ?> value="lahore">Lahore</option>
                                    <option <?php echo e(old('location')== 'islamabad' ? 'selected' : ''); ?> value="islamabad">Islamabad</option>
                                    <option <?php echo e(old('location')== 'karachi' ? 'selected' : ''); ?> value="karachi">Karachi</option>
                                </select>
                                <!--<input type="number" class="form-control" required="" value="<?php echo e(old('phone')); ?>" name="phone" autocomplete="Off">-->
                            </div>
                            <div class="form-group col-md-12 p-relative">
                                <label class="form__label dashboard-form-label">Details</label>
                                <textarea class="form-control" name="contact_message" required="" rows="6" autocomplete="Off" placeholder="Write Your Message"><?php echo e(old('contact_message')); ?></textarea>
                            </div>
                        </div>
                       
                        <div class="form-group p-relative text-center mt-2">
                            <button type="submit" class="btn btn-primary">Submit Complaint</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>