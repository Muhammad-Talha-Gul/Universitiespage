

<?php $__env->startSection('content'); ?>
    <div class="bg-light">
  
        <!--<header class="container" style="margin-top: 20px;">-->
        <!--  <div class="fluid-container" align="left">-->
        <!--      <h1>Complaint</h1>-->
        <!--  </div>-->
        <!--</header>-->

          <section class="container mb-3">
                <div class="container">
                
                        <div class="row">
                            <div class="col-md-12" id="complaint">
                
                			<div class="col-md-12 my-5" style="text-align: center;">
                                 <h4>Complaint/Suggestion Box</h4>
                        			<p>If you have any complaint or suggestion please send us message</p>
                            </div>
                      
                      
                              <div class="col-md-12">
                                  <?php if(isset($_GET['message'])){ ?>
                                  
                                  <div class="alert alert-success" style="text-align: center;">
                                   <strong>Success!</strong> Your Compliant Has Been Send Successfully.
                                   </div>
                                  
                                  <?php } ?>
                              </div>
                
                    			<form action="<?php echo e(url('send-mail')); ?>" method="POST">
                    				<?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="type" value="complaint">
                                   <div class="row">
                                       <div class="form-group col-md-6 p-relative">
                        					<label class="label-control">Name</label>
                        					<input type="text" class="form-control" required="" value="<?php echo e(old('name')); ?>" name="name" autocomplete="Off">
                        				</div>
                        				<div class="form-group col-md-6 p-relative">
                        					<label class="label-control">Email</label>
                        					<input type="email" class="form-control" required="" value="<?php echo e(old('email')); ?>" name="email" autocomplete="Off">
                        				</div>
                                   </div>
                                    <div class="row">
                                    
                                        <div class="form-group col-md-6 p-relative">
                                        	<label class="label-control">Subject</label>
                                        	<input type="text" class="form-control" required="" value="<?php echo e(old('subject')); ?>" name="subject" autocomplete="Off">
                                        </div>
                                        <div class="form-group col-md-3 p-relative">
                                        	<label class="label-control">Phone No.</label>
                                        	<input type="number" class="form-control" required="" value="<?php echo e(old('phone')); ?>" name="phone" autocomplete="Off">
                                        </div>
                                        <div class="form-group col-md-3 p-relative">
                                        	<label class="label-control">Office Location</label>
                                        	<select class="form-control" name="location">
                                        	    <option <?php echo e(old('location')== 'lahore' ? 'selected' : ''); ?> value="lahore">Lahore</option>
                                        	    <option <?php echo e(old('location')== 'islamabad' ? 'selected' : ''); ?> value="islamabad">Islamabad</option>
                                        	</select>
                                        	<!--<input type="number" class="form-control" required="" value="<?php echo e(old('phone')); ?>" name="phone" autocomplete="Off">-->
                                        </div>
                                    
                                    </div>
                                    
                                	<div class="form-group col-md-12 p-relative">
                                		<label class="label-control">Details</label>
                                		<textarea class="form-control" name="contact_message" required="" rows="6" autocomplete="Off"><?php echo e(old('contact_message')); ?></textarea>
                                	</div>
                                		<!-- <p class="terms">By clicking Submit, you agree to our <a href="<?php echo e(url('terms-and-condition')); ?>">Terms and Conditions</a>.</p>
                                		<p class="terms">After submitting your Complaint, We will contact you as soon as possible.</p>
                                		 -->
                                    <div class="form-group p-relative" style="text-align: center; margin-bottom:3rem;">
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