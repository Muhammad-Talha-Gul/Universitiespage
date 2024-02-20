
<?php $__env->startSection('title','Dashboard | University Page'); ?>
<?php $__env->startSection('customStyles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/jquery-confirm.min.css')); ?>">
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

  <?php if(Session::has('success')): ?>
    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
  <?php elseif(Session::has('error')): ?>
    <div class="alert alert-danger"><?php echo e(Session::get('error')); ?></div>
  <?php endif; ?>


<div class="container" style="color:#464646;">
  <div class="row">
    <div class="boxbar2 mt-3">
      <div class="tab custom_tab1 mt-3 ">
          <div class="tablinks" onclick="openCity(event, 'profile')">
            <i class="fa fa-user tab-icon"></i> 
            <span>Profile</span>
          </div>
          <div class="tablinks" onclick="openCity(event, 'dashboard')">
            <i class="fa fa-home tab-icon"></i>
            <span>Dashboard</span>
          </div>
          <div class="tablinks course_search" onclick="openCity(event, 'application')">
            <i class="fa fa-pencil tab-icon"></i>
            <span>Application</span>
          </div>
          <div class="tablinks" onclick="openCity(event, 'wishlist')">
            <i class="fa fa-list tab-icon"></i>
            <span>Wishlist</span>
          </div>
          <div class="tablinks" onclick="openCity(event, 'password')">
            <i class="fa fa-lock tab-icon"></i>
            <span>Password</span>
          </div>
          <div class="tablinks" onclick="openCity(event, 'notification')">
            <i class="fa fa-comment-o tab-icon"></i>
            <span>Notifications</span>
          </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">


    <div class="boxbar mt-3" style="padding-bottom: 45px">
      <div class="tab custom_tab1 mt-3 ">
        <div class="tablinks" onclick="openCity(event, 'dashboard')" style="padding: 10px; width: 100%;">
            <i class="fa fa-home tab-icon"></i>
            <span>Dashboard</span>
          </div>
          <div class="tablinks" onclick="openCity(event, 'profile')" style="padding: 10px; width: 100%;">
            <i class="fa fa-user tab-icon"></i> 
            <span>Profile</span>
          </div>          
          <div class="tablinks course_search" onclick="openCity(event, 'application')" style="padding: 10px; width: 100%;">
            <i class="fa fa-pencil tab-icon"></i>
            <span>Application</span>
          </div>
          <div class="tablinks" onclick="openCity(event, 'wishlist')" style="padding: 10px; width: 100%;">
            <i class="fa fa-list tab-icon"></i>
            <span>Wishlist</span>
          </div>
          <div class="tablinks" onclick="openCity(event, 'password')" style="padding: 10px; width: 100%;">
            <i class="fa fa-lock tab-icon"></i>
            <span>Password</span>
          </div>
          <div class="tablinks" onclick="openCity(event, 'notification')" style="padding: 10px; width: 100%;">
            <i class="fa fa-comment-o tab-icon"></i>
            <span>Notifications</span>
          </div>
      </div>
    </div>



    <div class="contantbox">

      <div id="dashboard" class="tabcontent">
        <main class="o-2colLayout-content">
            <?php
                $user = auth()->user();
            ?>
          <section class="mb-3 mt-3">
            <div class="row">
              <div class="col-md-12">
                <div class="main-dashboard">
                  <h3>Dashboard</h3>
                  <span>Hey <?php echo e(ucfirst($user->first_name)); ?></span>
                  <p>From your Dashboard you have the ability to view your university application's activity and update your account information. Select a link below to view or edit information.</p>

                </div>
              </div>
            </div>

            <style type="text/css">
                
               .box-style {
                  background-color: white;
               } 

              .box-style:hover {
                 background-color:#0B6D76;
                 color: white;
              }

              .box-style > div > p {
                 color: black;
              }

              .box-style:hover > div > p {
                 color: white;
              }

              .box-style > div > span {
                 color: black;
              }

              .box-style:hover > div > span {
                 color: white;
              }


            </style>

            <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="box-style" onclick="openCity(event, 'wishlist')">
                  <div class="box-text">
                    <p class="left-align">Total Wishlist</p>
                    <p class="right-align" style="background-color: #048BC9; border: none;"><i style="color: white;" class="fa fa-list"></i></p>
                    <span><?php echo e(count(myWishlist())); ?></span>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="box-style" onclick="openCity(event, 'application')">
                  <div class="box-text">
                    <p class="left-align">applied Application</p>
                    <p class="right-align" style="background-color: #FAD193; border: none;"><i class="fa fa-book" style="color: white;"></i></p>
                    <span><?php echo e(count(appliedCourse())); ?></span>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="box-style" onclick="openCity(event, 'notification')">
                  <div class="box-text">
                    <p class="left-align">UnRead Notification</p>
                    <p class="right-align" style="background-color: #FAA7A7; border: none;"><i class="fa fa-graduation-cap" style="color: white;"></i></p>
                    <span><?php echo e(userNoti()); ?></span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="app-dash">
                  <h3><a href="<?php echo e(url('search?page=1&limit=18&scholarship=2&star=5&languages=English,Chinese,chinese,Franch&qualification=1,2,3')); ?>"><u>Search/Apply other Universities</u></a><i class="fa fa-arrow-right"></i></h3>
                  <h3>Profile Information <i class="fa fa-edit" onclick="openCity(event, 'profile')"></i></h3>
                  

                  <div class="container-fluid">
    <div class="border textdivcolcss">

    <div class="row mb-3">
        <div class="col-md-3">
            <div class="border mb-3  Accommodationdiv"><p>Name:</p></div>
        </div>

        <div class="col-md-9">
            <div class="border Accommodationdiv"><p><?php echo e($users->name); ?></p></div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">
            <div class="border mb-3  Accommodationdiv"><p>Email:</p></div>
        </div>

        <div class="col-md-9">
            <div class="border Accommodationdiv"><p><?php echo e($user->email); ?></p></div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">
            <div class="border mb-3  Accommodationdiv"><p>Phone No:</p></div>
        </div>

        <div class="col-md-9">
            <div class="border Accommodationdiv"><p><?php echo e($user->phone); ?></p></div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">
            <div class="border mb-3  Accommodationdiv"><p>Nationality:</p></div>
        </div>

        <div class="col-md-9">
            <div class="border Accommodationdiv"><p><?php echo e($users->nationality); ?></p></div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">
            <div class="border mb-3  Accommodationdiv"><p>Gender:</p></div>
        </div>

        <div class="col-md-9">
            <div class="border Accommodationdiv"><p><?php echo e($users->gender); ?></p></div>
        </div>
    </div>

    


                    <?php if($users->prefered_program == 1): ?>
                  <p><span>Program you prefer:</span> Bachelor</p>
                    <?php endif; ?> 

                    <?php if($users->prefered_program == 2): ?>
                  <p><span>Program you prefer:</span> Masters</p>
                    <?php endif; ?>

                     <?php if($users->prefered_program == 3): ?>
                  <p><span>Program you prefer:</span> Doctorate</p>
                    <?php endif; ?> <?php if($users->prefered_program == 4): ?>
                  <p><span>Program you prefer:</span> Non-Degree program</p>
                    <?php endif; ?> <?php if($users->prefered_program == 5): ?>
                  <p><span>Program you prefer:</span> Diploma/Certification</p>
                    <?php endif; ?> <?php if($users->prefered_program == 6): ?>
                  <p><span>Program you prefer:</span> Matric</p>
                    <?php endif; ?> <?php if($users->prefered_program == 7): ?>
                  <p><span>Program you prefer:</span> A level</p>
                    <?php endif; ?> <?php if($users->prefered_program == 9): ?>
                  <p><span>Program you prefer:</span> O level</p>
                    <?php endif; ?> <?php if($users->prefered_program == 10): ?>
                  <p><span>Program you prefer:</span> Intermediate</p>
                    <?php endif; ?> <?php if($users->prefered_program == 11): ?>
                  <p><span>Program you prefer:</span> Associate degree</p>
                    <?php endif; ?> <?php if($users->prefered_program == 12): ?>
                  <p><span>Program you prefer:</span> Foundation Degree</p>
                    <?php endif; ?>   <?php if($users->prefered_program == 13): ?>
                  <p><span>Program you prefer:</span> Diploma of higher education</p>
                    <?php endif; ?>   <?php if($users->prefered_program == 14): ?>
                  <p><span>Program you prefer:</span> Higher national diploma</p>
                    <?php endif; ?>



        </div>

</div>



                </div>
              </div>
            </div>
          </section>

        </main>
      </div>

      <div id="profile" class="tabcontent" style="display: none;">
        <main class="o-2colLayout-content">

          <section class="mb-3 mt-3 custom-html">
            <h3 style="font-size:40px;margin-left: -10px">Profile</h3>
            <?php
              $user = auth()->user();

            ?>
            <form name="contact-form" class="form " method="post" action="<?php echo e(route('student.update', $user->id)); ?>" autocomplete="off">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

              <div class="row acd" style="width: 100%;min-height:auto;border: 1px solid black;
    border-radius: 8px;
    padding: 10px;">
                <h3>General Information</h3>
                <input type="hidden" name="password" value="">
                <input type="hidden" name="profile" value="student">
                <div class="col-sm-12">
                   <div class="form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
                      <label class="form__label">First Name<span class="label__required">*</span>
                      </label>
                        <input type="text" name="first_name" class="form-control" required="" value="<?php echo e($user->first_name); ?>">
                        <?php if($errors->has('first_name')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('first_name')); ?></strong>
                        </span>
                      <?php endif; ?>
                   </div>
                </div>
                <div class="col-sm-12">
                   <div class="form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
                      <label class="form__label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo e($user->last_name); ?>">
                        <?php if($errors->has('last_name')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('last_name')); ?></strong>
                        </span>
                      <?php endif; ?>
                   </div>
                </div>
                <div class="col-sm-12">
                     <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label class="form__label">Email Address<span class="label__required">*</span></label>
                        <input type="email" name="email" class="form-control" required="" value="<?php echo e($user->email); ?>">
                        <?php if($errors->has('email')): ?>
                          <span class="help-block">
                              <strong><?php echo e($errors->first('email')); ?></strong>
                          </span>
                        <?php endif; ?>
                     </div>
                </div>
                <div class="col-sm-12">
                     <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                        <label class="form__label">Phone<span class="label__required">*</span></label>
                        <input type="number" name="phone" class="form-control" required=""  value="<?php echo e($user->phone); ?>">
                        <?php if($errors->has('phone')): ?>
                          <span class="help-block">
                              <strong><?php echo e($errors->first('phone')); ?></strong>
                          </span>
                        <?php endif; ?>
                     </div>
                </div>
                <div class="col-sm-12">
                     <div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                        <label class="form__label">Nationality<span class="label__required">*</span></label>
                        <select name="country" class="form-control" required="">
                          <option selected="" disabled="">--Please select--</option>
                          <?php $__currentLoopData = allCountry(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prefer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($prefer->country); ?>" <?php if($user->students->nationality == $prefer->country): ?> selected="" <?php endif; ?>><?php echo e($prefer->country); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('country')): ?>
                          <span class="help-block">
                              <strong><?php echo e($errors->first('country')); ?></strong>
                          </span>
                        <?php endif; ?>
                     </div>
                </div>
                <div class="col-sm-12">
                     <div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
                        <label class="form__label">Gender<span class="label__required">*</span></label>
                        <div style="text-align: left;display: inline-block;">
                          <input id="Schoolmale" type="radio" name="gender" <?php if($user->students->gender == 'Male'): ?> selected="" <?php endif; ?> value="Male" checked="checked"><label for="Schoolmale">Male</label>
                        </div>
                        <div style="text-align: left;display: inline-block;">
                          <input id="Schoolfemale" type="radio" name="gender" <?php if($user->students->gender == 'Female'): ?> selected="" <?php endif; ?> value="Female"><label for="Schoolfemale">Female</label>
                        </div>
                        <?php if($errors->has('gender')): ?>
                          <span class="help-block">
                              <strong><?php echo e($errors->first('gender')); ?></strong>
                          </span>
                        <?php endif; ?>
                     </div>
                </div>
                <div class="col-sm-12">
                     <div class="form-group<?php echo e($errors->has('prefer') ? ' has-error' : ''); ?>">
                        <label class="form__label">What type of program would you prefer? *<span class="label__required">*</span></label>
                        <select name="prefer" class="form-control" required="">
                          <option selected="" disabled="">--Please select--</option>
                          <?php $__currentLoopData = qualification(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prefer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($prefer->id); ?>" <?php if($user->students->prefered_program == $prefer->id): ?> selected="" <?php endif; ?>><?php echo e($prefer->title); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('prefer')): ?>
                          <span class="help-block">
                              <strong><?php echo e($errors->first('prefer')); ?></strong>
                          </span>
                        <?php endif; ?>
                     </div>
                </div>
              
              </div>

              <div class="row acd" style="width: 100%;min-height:40px;margin-top: 20px">
                <div class="col-full">
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary ml-2">Update</button>
                  </div>
                </div>
              </div>

            </form>
     
          </section>
        </main>
      </div>

      <div id="application" class="tabcontent" style="display: none;">
        <div class="row">
          <div class="col-md-12">
            <div class="main-dashboard">
              <h3 style="font-size:40px;">Application Form</h3>
              <div class="table-responsive" style="scroll-behavior: smooth;overflow-y:hidden;overflow-x: auto;margin-bottom: 50px;">
                <span>List Of Application Form</span>
                <table class="f-app-table uni_table">            
                  <thead>
                    <tr class="first">
                      <th>Application ID</th>
                      <th style="min-width:200px;">Applied Course & Uni</th>
                      <th>Application Form Status</th>
                      <th>Application Material Status</th>
                      
                      
                      <th style="min-width:100px;">Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(count($app)>0): ?>
                    <?php $__currentLoopData = $app; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                      <td><span class="app-id"><?php echo e($value->application_id); ?>-<?php echo e($value->id); ?></span></td>
                      <td style="text-align: left;position: relative;">
                        <a class="app-uni" href="<?php echo e(url('university/'.$value->university->slug)); ?>" target="_blank"><?php echo e($value->university->name); ?></a>
                        <br><span class="app-course" style="line-height: 9px;"><?php echo e($value->course->name); ?></span>
                      </td>
                      <td style="position: relative;">
                        <div class="hover-uni" style="background-image: url(<?php echo e((fix($value->university->logo, 'thumbs'))??iph()); ?>);">
                          <div class="pointer"></div>
                          <div class="content">
                            <div><b><?php echo e($value->university->name); ?></b></div>
                            <div>
                              <span>
                                <?php 
                                  $ranking = ($value->university->ranking!==null)?explode('.', $value->university->ranking):0; 
                                ?>
                                <?php if($ranking[0]!==0): ?> <?php for($i=0; $i<(int)$ranking[0]; $i++): ?>
                                  <i class="fa fa-star"></i>
                                <?php endfor; ?> <?php endif; ?>
                                <?php if(isset($ranking[1]) && $ranking[1]>=5): ?>
                                  <i class="fa fa-star-half"></i>
                                <?php endif; ?>
                              </span>
                            </div>
                            <div>
                              <p><strong>founded In: </strong>(<?php echo e($value->university->founded_in); ?>).</p>
                              <p><strong>Email: </strong><?php echo e($value->university->users->email); ?>.</p>
                              <p><strong>City & Country: </strong><?php echo e($value->university->city); ?>, <?php echo e($value->university->country); ?>.</p>
                            </div>
                          </div>
                        </div>
                        <?php if($value->personal_information==null || $value->educational_background==null || $value->language_qualification==null || $value->mailling_address==null): ?>
                          <?php if(check_course($value->course->id) == 1): ?>
                            <a href="<?php echo e(url('apply-for-course/'.$value->course->id.'?check=submit')); ?>" target="_blank">
                              <span class="incomp">In Complete</span>
                            </a>
                          <?php else: ?>
                            <span class="incomp">In Complete</span> 
                          <?php endif; ?>
                        <?php else: ?>
                          <span class="comp">Completed</span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if($value->uploads!==null): ?> 
                          <span class="comp">Completed</span> 
                        <?php else: ?>
                          
                          <?php if(check_course($value->course->id) == 1): ?>
                            <a href="<?php echo e(url('apply-for-course/'.$value->course->id.'?check=uploads')); ?>" target="_blank"><span class="incomp">In Complete</span> </a>
                          <?php else: ?>
                            <span class="incomp">In Complete</span> 
                          <?php endif; ?>
                        <?php endif; ?></td>
                      
                      
                      <td style="font-weight:bold;">
                        <?php if($value->status == 4): ?> 
                          <?php if(check_course($value->course->id) == 1): ?>
                            <a href="<?php echo e(url('apply-for-course/'.$value->course->id.'?check=submit')); ?>" target="_blank"><span class="incomp">In Complete</span> </a>
                          <?php else: ?>
                            <span class="incomp">In Complete</span> 
                          <?php endif; ?>
                        <?php elseif($value->status == 1): ?>
                          <span class="comp">Accepted</span> 
                        <?php elseif($value->status == 2): ?>
                          <span class="pend">Pending</span> 
                        <?php elseif($value->status == 3): ?>
                          <span class="proc">Processing</span> 
                        <?php elseif($value->status == 0): ?>
                          <span class="ref">Refused</span> 
                        <?php endif; ?>
                      </td>

                      <td align="center">
                        

                        

                        <?php if($value->application_fee==0 && $value->send_to_uni == 0): ?>
                          <a class="btn btn-danger btn-xs" onclick="deleteApp(<?php echo e($value->id); ?>)"><i class="fa fa-trash"></i></a>
                          <form action="<?php echo e(route('remove-application',$value['id'])); ?>" method="POST" id="delete-form-<?php echo e($value->id); ?>">
                              <?php echo e(csrf_field()); ?>

                          </form>
                        <?php endif; ?>
                      </td>
                     </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="8">
                          <p class="not-found2">No Application Found</p>
                        </td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>           
              </div> 
            </div> 
          </div> 
        </div> 
      </div>

      <div id="wishlist" class="tabcontent" style="display: none;margin-bottom:70px;">
        <main class="o-2colLayout-content">
          <section class="custom-html">
            <div class="row">
              <div class="col-md-12">
                <div class="main-dashboard">
                  <h3>Wishlist</h3>
                  <span>My Wishlist</span>

                  <table class="f-app-table">
                      <thead>
                        <tr>
                            <th>Course</th>
                            <th>University</th>
                            <th>Starting|Deadline Date</th>
                            <th>Added At</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(count($wishlist)>0): ?>
                        <?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($value->course->name); ?></td>
                          <td><?php echo e($value->course->university->name); ?></td>
                          <td><?php echo e(date('dS M, Y', strtotime($value->course->starting_date))); ?> -TO- <?php echo e(date('dS M, Y', strtotime($value->course->deadline))); ?></td>
                          <td><?php echo e(date_format($value->created_at,'d M, Y h:i A')); ?> </td>
                          <td class="a-center last"><span class="nobr"> <a href="<?php echo e(url('courses/'.$value->course->id)); ?>" target="_blank">View</a> <span class="separator">|</span> <a style="cursor:pointer;" onclick="deleteit('<?php echo e(route("deleteWishlist",$value->id)); ?>')">Delete</a> </span></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="5"><p class="not-found2">No Record found</p></td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>
        </main>
      </div>

      <div id="password" class="tabcontent" style="display: none;">
        <main class="o-2colLayout-content">

          <section class="mb-3 mt-3 custom-html">
            <h3 style="font-size:40px;">Change Password</h3>
            <form method="POST" action="<?php echo e(route('updatePassword')); ?>">
              <?php echo e(csrf_field()); ?>

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group<?php echo e($errors->has('current-password') ? ' has-error' : ''); ?>">
                      <label  class="form__label">Current Password</label>
                      <input id="current-password" type="password" class="form-control" name="current-password" required>
                      <?php if($errors->has('current-password')): ?>
                          <span class="help-block">
                              <strong><?php echo e($errors->first('current-password')); ?></strong>
                          </span>
                      <?php endif; ?>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group<?php echo e($errors->has('new-password') ? ' has-error' : ''); ?>">
                    <label class="form__label">New Password</label>
                    <input id="new-password" type="password" class="form-control" name="new-password" required>
                    <?php if($errors->has('new-password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('new-password')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group<?php echo e($errors->has('new-password_confirmation') ? ' has-error' : ''); ?>">
                    <label  class="form__label">Confirm Password</label>
                      <input id="password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                      <?php if($errors->has('new-password_confirmation')): ?>
                          <span class="help-block">
                              <strong><?php echo e($errors->first('new-password_confirmation')); ?></strong>
                          </span>
                      <?php endif; ?>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group" style="margin-bottom: 45px;">
                      <label  class="form__label"></label>
                      <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </form>
          </section>

        </main>
      </div>

      <div id="notification" class="tabcontent" style="display:none;">
        <main class="o-2colLayout-content">
          <section class="mb-3 mt-3 custom-html">
            <h3 style="font-size:40px;">Notifications</h3>
            <div class="row">
              <div class="col-md-12">
                <div class="main-dashboard">
                  <span>List Of Notifications</span>
                    <table class="f-app-table">            
                      <thead>
                        <tr class="first">
                          
                          <th>Title</th>
                          <th>Message</th>
                          <th>Created At</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <tr style="cursor: pointer;" class="<?php echo e(($value->is_read==1)?'':'active'); ?>" onclick="location.href='<?php echo e(route('dashboard-notification-detail',$value->id)); ?>'"
                            >
                            <td><?php if($value->type=='application_status'): ?> Application <?php endif; ?><?php echo e(ucwords($value->meta)); ?></td>
                            <td>
                                <?php if($value->type=='subscription'): ?> 
                                    <?php echo e($value->email); ?>

                                <?php elseif($value->type=='review'): ?> 
                                    <?php if($value->university !== null): ?>
                                    <?php echo e(($value->student->name)??''); ?> give review to <?php echo e(($value->university->name)??''); ?>.
                                    <?php else: ?>
                                    <?php echo e(($value->student->name)??''); ?> give review to <?php echo e(($value->consultant->organization_name)??''); ?>.
                                    <?php endif; ?>
                                <?php elseif($value->type=='review-replay'): ?>
                                    <?php if($value->university !== null): ?>
                                    <?php echo e(($value->university->name)??''); ?> replied to <?php echo e(($value->student->name)??''); ?> review.
                                    <?php else: ?>
                                    <?php echo e(($value->consultant->organization_name)??''); ?> replied to <?php echo e(($value->student->name)??''); ?> review.
                                    <?php endif; ?>
                                <?php elseif($value->type=='application_status'): ?> 
                                    <?php echo e(($value->student->name)??''); ?>'s Application is <?php echo e(($value->meta)??''); ?> by <?php echo e(($value->university->name)??''); ?>.
                                <?php elseif($value->type=='premium'): ?> 
                                    <?php if($value->university_id!==null): ?> <?php echo e(($value->university->name)??''); ?>'s <?php else: ?> <?php echo e(($value->consultant->organization_name)??''); ?>'s <?php endif; ?>  Account is upgrated to Premium.
                                <?php elseif($value->type=='application'): ?> 
                                    <?php echo e(($value->student->name)??''); ?> fill an application form in <?php echo e(($value->university->name)??''); ?>.
                                <?php elseif($value->type=='consult'): ?> 
                                    <?php echo e(($value->student->name)??''); ?> ask <?php echo e(($value->consultant->organization_name)??''); ?> for their consultancy.
                                <?php elseif($value->type=='reply'): ?> 
                                    <?php echo e(($value->consultant->organization_name)??''); ?> reply to <?php echo e(($value->student->name)??''); ?>.
                                <?php elseif($value->type=='Support'): ?> 
                                    <?php if($value->user_id == $value->consultant_id): ?>
                                      <?php echo e(($value->university->name)??''); ?> mark <?php echo e(($value->consultant->organization_name)??''); ?> as Recommended
                                    <?php else: ?>
                                        <?php echo e(($value->consultant->organization_name)??''); ?> mark <?php echo e(($value->university->name)??''); ?> as Recommended
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e(date_format($value->created_at,'d M Y g:i:s a')); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($notifications)==0): ?>
                          <tr style="cursor: pointer;">
                            <td colspan="3"><p class="not-found2">No Notification</p></td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                    <?php if(count($notifications)>= 10): ?>
                         <div class="pagination-wrapper">
                             <?php 
                                $result = $notifications;
                                $count=$result->lastPage()+1;
                             ?>
                             <ul class="pagination">
                             <?php if($result->currentPage()!=1): ?><li><a href="<?php echo e($result->url(1)); ?>">«</a></li><?php endif; ?>
                                 <?php for($i=1; $i<$count; $i++): ?>
                                     <li class=<?php echo e(($result->currentPage()==$i)?'active':''); ?>>
                                         <a href="<?php echo e($result->url($i)); ?>"><?php echo e($i); ?>

                                             <?php echo ($result->currentPage()==$i)?'<span class="sr-only">(current)</span>':''; ?>

                                         </a>
                                     </li>
                                 <?php endfor; ?>
                             <?php if($result->currentPage()!=$result->lastPage()): ?><li ><a href="<?php echo e($result->url($result->lastPage())); ?>">»</a></li><?php endif; ?>
                             </ul>
                         </div>
                    <?php endif; ?>              
                </div> 
              </div> 
            </div> 
          </section>
        </main>
      </div>
    </div>

    

  </div>

</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('customScripts'); ?>
    <script src="<?php echo e(asset('assets_frontend/js/jquery-confirm.min.js')); ?>"></script>

  <script>
    function deleteit(id) {
        $.confirm({
          title: 'Confirm!',
          content: 'Are you sure, You want to Delete this?',
          useBootstrap: false,
          buttons: {
              confirm: function () {
                  window.location.href = id;
              },
              cancel: function () {
              }
          }
        });
    }
    function deleteApp(id) {
        $.confirm({
          title: 'Confirm!',
          content: 'Are you sure, You want to Delete this?',
          useBootstrap: false,
          buttons: {
              confirm: function () {
                  $("#delete-form-"+id).submit();
              },
              cancel: function () {
              }
          }
        });
    }
  </script>
  <script>
    // window.location.hash = tab2
    var hash = $(location).attr('hash');
    <?php if(Session::has('id')): ?>
      hash = '#'+'<?php echo e(Session::get("id")); ?>';
    <?php endif; ?>
    if(hash!==''){
      $('.tabcontent').each(function(){
        $(this).hide();
        $(this).removeClass('active');
      });
      $(hash).show();
      window.history.pushState({path:'<?php echo e(request()->url()); ?>'+hash},'','<?php echo e(request()->url()); ?>'+hash);
    }
    <?php echo e(Session::forget("id")); ?>

    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
      window.history.pushState({path:'<?php echo e(request()->url()); ?>'+'#'+cityName},'','<?php echo e(request()->url()); ?>'+'#'+cityName);
    }
    $(document).ready(function(){
      $('.app-uni').hover(function(){
          $(this).parent().next().find('.hover-uni').show();
        }, function(){
          $('.hover-uni').hide();
      });
      $(document).on('mouseenter', '.hover-uni',function(e){
        $(this).show();
      });
      $(document).on('mouseleave', '.hover-uni',function(e){
        $(this).hide();
      });
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>