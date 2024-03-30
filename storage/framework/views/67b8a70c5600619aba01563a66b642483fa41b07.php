<?php $__env->startSection('customStyles'); ?>
<link href="<?php echo e(asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Add User </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="<?php echo e(url('/admin/home')); ?>">Admin</a>
                    </li>
                    <li class="active">
                        Add User
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
            <form action="<?php echo e(route('users.store')); ?>" method="POST"> 
                <?php echo e(csrf_field()); ?>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            User Information
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Name</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php echo e(old('first_name')); ?>">
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php echo e(old('last_name')); ?>">
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <label class="col-md-6 control-label">Email</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>">
                                        <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6 control-label">Password</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control" name="password" placeholder="Password" id="password">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#passwordModal">Generate Password</a>
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                                    <label class="col-md-6 control-label">Phone</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo e(old('phone')); ?>">
                                        <?php if($errors->has('phone')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('phone')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6 control-label">User Group</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="group_id">
                                            <option value="">Administrator</option>
                                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Date of Birth</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control datepicker-autoclose" name="dob" placeholder="DOB" value="<?php echo e(old('dob')); ?>">
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                                    <label class="col-md-6 control-label">Address</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo e(old('address')); ?>">
                                        <?php if($errors->has('address')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('address')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label class="col-md-6 control-label">City</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo e(old('city')); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6 control-label">Country</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="country" placeholder="Country" value="<?php echo e(old('country')); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6 control-label">Postal</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="postal" placeholder="Postal" value="<?php echo e(old('postal')); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6 control-label" style="margin-top: 10px;">Profile Image</label>
                                    <div class="col-md-12">
                                        <div class="image-placeholder" align="center" data-input="f-logo-hidden" data-preview="f-logo-holder" style="box-shadow:0px 0px 5px 1px #cbcbcb;width: 200px">
                                            <img src="<?php echo e(asset('placeholder.jpg')); ?>" style="max-width: 100%;" id="f-logo-holder" class="img-responsive img-selection img-thumbnail"></div>
                                        <a href="javascript:void(0)" class="removeImage" data-hidden="f-logo-hidden" data-holder="f-logo-holder" style="display: none">Remove Image</a>
                                        <input type="hidden" name="image" id="f-logo-hidden" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Active</label>
                                <input type="checkbox" name="is_active" value="1" checked>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="<?php echo e(route('users.index')); ?>" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </form>
		</div>
	</div>

</div>
<!-- Modal -->
<div id="passwordModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <div class="form-group">
            <input type="text" id="generatedPass" class="form-control" readonly>
        </div>
        <div class="form-group text-center">
            <a href="javascript:void(0)" class="btn btn-primary" id="generatePass">Generate Password</a>
            <a href="javascript:void(0)" class="btn btn-primary" id="usePass">Use Password</a>
        </div>

      </div>
    </div>

  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('customScripts'); ?>
<script src="<?php echo e(asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('vendor/laravel-filemanager/js/lfm.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.image-placeholder').filemanager('image',{prefix:"<?php echo e(url('/filemanager')); ?>"});
    });
    jQuery('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    $(document).on('click',"#generatePass",function(){
        var pass = generatePassword(8);
        $("#generatedPass").val(pass);
    });

    $(document).on('click',"#usePass",function(){
        var pass = $("#generatedPass").val();
        $("#password").val(pass);
        $("#passwordModal").modal('hide');
    });

    function generatePassword(length) {
    var length = length,
        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
        retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }
    return retVal;
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>