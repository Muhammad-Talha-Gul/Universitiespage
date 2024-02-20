

<?php $__env->startSection('content'); ?>



<br><br><br>

<div class="container pl-5 pr-5 text-center firstsection  bg-light">
  <h1>100% Discount Offer</h1>
  <p>100% discount offer program is designed by our company to encourage and support poor families students who want to study abroad but cannot afford consultancy fee.</p>

  <p>The student must come under the following criteria.</p>

  <ul style="margin-left: -40px; text-align: left; display: inline-block;">
    <li><samp class="dotspan">.</samp> Must be from a deserving family.</li>
    <li><samp class="dotspan">.</samp> Must have 70% marks in the last education.</li>
    <li><samp class="dotspan">.</samp> The study gap should not be more than 1.5 years.</li>
    <li><samp class="dotspan">.</samp> Pass the final interview for selection.</li>
  </ul>
  

</div>
<br>




    <br><br>





<div class="container-fluid Browsesection">
        <div class="container">
          
        <div class="container">
            <div class="accordion" id="accordionExample">




                

                    

                        <div class="card">
                            <div class="card-header1" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">     
                                <span class="title">Fill The Form Below to Apply Now</span>
                                <span class="accicon"><i class="fa fa-caret-down"></i></span>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="">
                                <div class="card-body Selectone" style="border: none;">
                
                                    <div class="Discountform">


                                         <div class="col-md-12">
                                  <?php if(isset($_GET['message'])){ ?>
                                  
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
                                            <label class="label-control">Student Name</label>
                                            <input type="text" class="form-control" required="" value="<?php echo e(old('name')); ?>" name="name" autocomplete="Off">
                                        </div>
                                        
                                        <div class="form-group col-md-3 inputcol121">
                                            <label class="label-control">Last Education</label>
                                            <input type="text" class="form-control" required="" value="<?php echo e(old('lastEducation')); ?>" name="lastEducation" autocomplete="Off" required>
                                        </div>
                                        
                                        <div class="form-group col-md-3 inputcol121">
                                            <label class="label-control">Last Education % <small>(Example 70%)</small></label>
                                            <input type="text" class="form-control" required="" value="<?php echo e(old('lastEducationPer')); ?>" name="lastEducationPer" autocomplete="Off">
                                        </div>
                                        
                                   </div>
                                    <div class="row">
                                    
                                        <div class="form-group col-md-3 inputcol121">
                                            <label class="label-control">Phone No.</label>
                                            <input type="number" class="form-control" required="" value="<?php echo e(old('phone')); ?>" name="phone" autocomplete="Off">
                                        </div>
                                        
                                        <div class="form-group col-md-6 inputcol121">
                                            <label class="label-control">Email</label>
                                            <input type="email" class="form-control" required="" value="<?php echo e(old('email')); ?>" name="email" autocomplete="Off">
                                        </div>
                                        
                                        <div class="form-group col-md-3 inputcol121">
                                            <label class="label-control">Office Location</label>
                                            <select class="form-control" name="location">
                                                <option <?php echo e(old('location')== 'lahore' ? 'selected' : ''); ?> value="lahore">Lahore</option>
                                                <option <?php echo e(old('location')== 'islamabad' ? 'selected' : ''); ?> value="islamabad">Islamabad</option>
                                            </select>
                                            <!--<input type="number" class="form-control" required="" value="<?php echo e(old('phone')); ?>" name="phone" autocomplete="Off">-->
                                        </div>
                                    
                                    </div>
                                    
                                    <div class="form-group col-md-12 inputcol121">
                                        <label class="label-control">Why should select you for this offer? ( Write your educational grades and family financial background)</label>
                                        <textarea class="form-control" name="familyDetail" required="" rows="6" autocomplete="Off"><?php echo e(old('familyDetail')); ?></textarea>
                                    </div>
                                        <!-- <p class="terms">By clicking Submit, you agree to our <a href="<?php echo e(url('terms-and-condition')); ?>">Terms and Conditions</a>.</p>
                                        <p class="terms">After submitting your Complaint, We will contact you as soon as possible.</p>
                                         -->
                                    <div class="form-group inputcol121" style="text-align: center; margin-bottom:3rem;">
                                        <button type="submit" class="btn btn-primary">Submit Offer</button>
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




<br><br><br>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>