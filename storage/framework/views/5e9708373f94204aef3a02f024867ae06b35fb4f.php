
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
         <div class="tablinks" onclick="openCity(event, 'password')">
            <i class="fa fa-key tab-icon"></i> 
            <span>Change Password</span>
          </div>
          <div class="tablinks" onclick="openCity(event, 'dashboard')">
            <i class="fa fa-home tab-icon"></i>
            <span>Dashboard</span>
          </div>
          <div class="tablinks course_search" onclick="openCity(event, 'addstd')">
            <i class="fa fa-plus tab-icon"></i>
            <span>Add Students</span>
          </div>
          <div class="tablinks" onclick="openCity(event, 'liststd')">
            <i class="fa fa-list tab-icon"></i>
            <span>All Students</span>
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
          <div class="tablinks" onclick="openCity(event, 'password')" style="padding: 10px; width: 100%;">
            <i class="fa fa-key tab-icon"></i> 
            <span>Change Password</span>
          </div>
          <div class="tablinks course_search" onclick="openCity(event, 'addstd')" style="padding: 10px; width: 100%;">
            <i class="fa fa-plus tab-icon"></i>
            <span>Add Students</span>
          </div>
          <div class="tablinks" onclick="openCity(event, 'liststd')" style="padding: 10px; width: 100%;">
            <i class="fa fa-list tab-icon"></i>
            <span>All Students</span>
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
                  <p>From your Dashboard you have the ability to view your Added students activity and update your account information. Select a link below to view or edit information.</p>

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
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="box-style" onclick="openCity(event, 'liststd')">
                  <div class="box-text">
                    <p class="left-align">Total Students</p>
                    <p class="right-align" style="background-color: #048BC9; border: none;"><i class="fa fa-list" style="color: white;"></i></p>
                    <span><?php echo e(count($cstudents)); ?></span>
                  </div>
                </div>
              </div>

              <!-- <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="box-style" onclick="openCity(event, 'application')">
                  <div class="box-text">
                    <p class="left-align">applied Application</p>
                    <p class="right-align"><i class="fa fa-book"></i></p>
                    <span><?php echo e(count(appliedCourse())); ?></span>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="box-style" onclick="openCity(event, 'notification')">
                  <div class="box-text">
                    <p class="left-align">UnRead Notification</p>
                    <p class="right-align"><i class="fa fa-graduation-cap"></i></p>
                    <span><?php echo e(userNoti()); ?></span>
                  </div>
                </div>
              </div> -->
            </div> 
            
            <div class="row">
              <div class="col-md-12">
                <div class="app-dash">
                  <!-- <h3><a href="<?php echo e(url('search?page=1&limit=18&scholarship=2&star=5&languages=English,Chinese,chinese,Franch&qualification=1,2,3')); ?>"><u>Search/Apply other Universities</u></a><i class="fa fa-arrow-right"></i></h3> -->
                  <h3>Profile Information </h3>



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
            <div class="border mb-3  Accommodationdiv"><p>Company:</p></div>
        </div>

        <div class="col-md-9">
            <div class="border Accommodationdiv"><p><?php echo e($users->company_name); ?></p></div>
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

      <div id="addstd" class="tabcontent" style="display: none;">
        <main class="o-2colLayout-content">

          <section class="mb-3 mt-3 custom-html">
            <h3 style="font-size:30px;margin-left: -10px">Add Student</h3>
            <?php
              $user = auth()->user();

            ?>
            <form name="contact-form" class="form " method="post" action="<?php echo e(route('addstudent')); ?>" autocomplete="off" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

             
              <div class="" style="width: 100%;min-height:auto;">
                <h3>Enter Information</h3>
  
                <div class="row">
                <div class="col-md-6">
                   <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                      <label class="form__label">Name<span class="label__required">*</span>
                      </label>
                        <input type="text" name="name" required class="form-control"  value="<?php echo e($user->name); ?>">
                        <?php if($errors->has('name')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('name')); ?></strong>
                        </span>
                      <?php endif; ?>
                   </div>
                </div>

                <div class="col-md-6">
                   <div class="form-group<?php echo e($errors->has('passport_number') ? ' has-error' : ''); ?>">
                      <label class="form__label">Passport Number</label>
                        <input type="text" name="passport_number" required class="form-control" value="<?php echo e($user->passport_number); ?>">
                        <?php if($errors->has('passport_number')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('passport_number')); ?></strong>
                        </span>
                      <?php endif; ?>
                   </div>
                </div>

                </div>

                <div class="row">
                <div class="col-md-6">
                   <div class="form-group<?php echo e($errors->has('course_doc') ? ' has-error' : ''); ?>">
                      <label class="form__label">Course<span class="label__required">*</span>
                      </label>
                        <input type="text" name="course_doc" required class="form-control" value="<?php echo e($user->course_doc); ?>">
                        <?php if($errors->has('course_doc')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('course_doc')); ?></strong>
                        </span>
                      <?php endif; ?>
                   </div>
                </div>

                <div class="col-md-6">
                   <div class="form-group<?php echo e($errors->has('intrested_country_doc') ? ' has-error' : ''); ?>">
                      <label class="form__label">Intrested Country</label>
                        <input type="text" name="intrested_country_doc" class="form-control" value="<?php echo e($user->intrested_country_doc); ?>">
                        <?php if($errors->has('intrested_country_doc')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('intrested_country_doc')); ?></strong>
                        </span>
                      <?php endif; ?>
                   </div>
                </div>

                </div>


                <div class="row">
                <div class="col-md-6">
                   <div class="form-group<?php echo e($errors->has('passport_doc') ? ' has-error' : ''); ?>">
                      <label class="form__label">Passport<span class="label__required">*</span>
                      </label>
                        <input type="file" name="passport_doc[]" multiple class="form-control"  value="<?php echo e($user->passport_doc); ?>">
                        <?php if($errors->has('passport_doc')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('passport_doc')); ?></strong>
                        </span>
                      <?php endif; ?>
                   </div>
                </div>

                <div class="col-md-6">
                   <div class="form-group<?php echo e($errors->has('photo_doc') ? ' has-error' : ''); ?>">
                      <label class="form__label">Photo</label>
                        <input type="file" name="photo_doc[]" multiple class="form-control" value="<?php echo e($user->photo_doc); ?>">
                        <?php if($errors->has('photo_doc')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('photo_doc')); ?></strong>
                        </span>
                      <?php endif; ?>
                   </div>
                </div>

                </div>


                <div class="row">
                <div class="col-md-6">
                   <div class="form-group<?php echo e($errors->has('educational_degree_doc') ? ' has-error' : ''); ?>">
                      <label class="form__label">Educational Degree</label>
                        <input type="file" name="educational_degree_doc[]" multiple class="form-control" value="<?php echo e($user->educational_degree_doc); ?>">
                        <?php if($errors->has('educational_degree_doc')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('educational_degree_doc')); ?></strong>
                        </span>
                      <?php endif; ?>
                   </div>
                </div>

                <div class="col-md-6">
                   <div class="form-group<?php echo e($errors->has('educational_certificate_doc') ? ' has-error' : ''); ?>">
                      <label class="form__label">Educational Certificate<span class="label__required">*</span>
                      </label>
                        <input type="file" name="educational_certificate_doc[]" multiple class="form-control"  value="<?php echo e($user->educational_certificate_doc); ?>">
                        <?php if($errors->has('educational_certificate_doc')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('educational_certificate_doc')); ?></strong>
                        </span>
                      <?php endif; ?>
                   </div>
                </div>

                </div>

                <div class="row">
                <div class="col-md-6">
                   <div class="form-group<?php echo e($errors->has('recomendation_letter_doc') ? ' has-error' : ''); ?>">
                      <label class="form__label">Recomendation Letter<span class="label__required">*</span>
                      </label>
                        <input type="file" name="recomendation_letter_doc[]" multiple class="form-control"  value="<?php echo e($user->recomendation_letter_doc); ?>">
                        <?php if($errors->has('recomendation_letter_doc')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('recomendation_letter_doc')); ?></strong>
                        </span>
                      <?php endif; ?>
                   </div>
                </div>

                <div class="col-md-6">
                   <div class="form-group<?php echo e($errors->has('study_plan') ? ' has-error' : ''); ?>">
                      <label class="form__label">Study Plan</label>
                        <input type="file" name="study_plan[]" multiple class="form-control" value="<?php echo e($user->study_plan); ?>">
                        <?php if($errors->has('study_plan')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('study_plan')); ?></strong>
                        </span>
                      <?php endif; ?>
                   </div>
                </div>

                </div>


                <div class="row">

                <div class="col-md-6">
                   <div class="form-group<?php echo e($errors->has('ielts_english_proficiency_letter') ? ' has-error' : ''); ?>">
                      <label class="form__label">IELTS or English proficiency letter<span class="label__required">*</span>
                      </label>
                        <input type="file" name="ielts_english_proficiency_letter[]" multiple class="form-control"  value="<?php echo e($user->ielts_english_proficiency_letter); ?>">
                        <?php if($errors->has('ielts_english_proficiency_letter')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('ielts_english_proficiency_letter')); ?></strong>
                        </span>
                      <?php endif; ?>
                   </div>
                </div>

                </div>
                



              <div class="row acd" style="width: 100%;min-height:40px;margin-top: 20px">
                <div class="col-full">
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary ml-2">Add</button>
                  </div>
                </div>
              </div>

            </form>
     
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

      <div id="liststd" class="tabcontent" style="display: none;">
        <main class="o-2colLayout-content">

          <section class="mb-3 mt-3 custom-html">
            <h3 style="font-size:40px;">List Students</h3>
            
            <br>

            <div class="table-responsive">
  <table class="table">
  <caption>List of users</caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Passport #</th>
      <th scope="col">Intrested Country</th>
      <th scope="col">Course</th>
      <th scope="col">Documents</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php
  
  $i=1;
  
  foreach($cstudents as $cstudent) { ?>

    <tr id="row<?php echo $cstudent->id; ?>">
      <th scope="row"><?php echo $i; $i++; ?></th>
      <td id="name<?php echo $cstudent->id; ?>"><?php echo $cstudent->name; ?></td>
      <td id="passport_number<?php echo $cstudent->id; ?>"><?php echo $cstudent->passport_number; ?></td>
      <td id="intrested_country_doc<?php echo $cstudent->id; ?>"><?php echo $cstudent->intrested_country_doc; ?></td>
      <td id="course_doc<?php echo $cstudent->id; ?>"><?php echo $cstudent->course_doc; ?></td>
      <td>
        
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#recordmodal<?php echo $cstudent->id; ?>">
 View
</button>
      </td>
      <td>


      <button onclick="deleterow(<?php echo $cstudent->id; ?>)" class="btn btn-success"><i class="fa fa-trash"></i></button>
      <button onclick="editrow(<?php echo $cstudent->id; ?>)" class="btn btn-success"><i class="fa fa-edit"></i></button>
      <a href="<?php echo e(route('show_student_report',($cstudent->id)??'')); ?>" class="btn btn-success"><i class="fa fa-user"> Report</i></a>

      </td>
    </tr>


    <div class="modal fade" id="recordmodal<?php echo $cstudent->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Documents</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow: scroll; height: 100vh;">
        
      <style>
        .artigo_nome {
    border: 1px dotted blue;
    display: inline-block;
    max-width: 250px;
    padding: 10px;
    word-break: break-all; /* optional */
}
      </style>

      <!-- passport --> <br>


      <div class="row" id="passport_docrow">
      
        
<div class="col-md-12" style="margin-bottom: 10px;"><h5 style="color: black;">Passport Documents

<form enctype="multipart/form-data" method="post" onsubmit="add_doc(this, '<?php echo $cstudent->id; ?>', 'passport_doc')">
<?php echo e(csrf_field()); ?>

<span id="show_message_profilepassport_doc"></span>
  <input type="file" name="file_name">
  <input type="hidden" name="type" value="passport_doc">
  <input type="hidden" name="recordid" value="<?php echo $cstudent->id; ?>">
  <button class="btn btn-success" id="upload_btnpassport_doc" type="submit">Add</button>
</form>


</h5></div> 

<?php 
    $passport_docs = json_decode($cstudent->passport_doc);


if($passport_docs != '[]') {
      
foreach($passport_docs as $passport_doc) {

?>

<div class="col-md-2" id="doc<?php $newcourdocname = str_replace(".", "", $passport_doc); $newcourdocname = str_replace("-", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); echo $newcourdocname; ?>">
  <h6 class="artigo_nome"><?php echo $passport_doc; ?></h6>
  <a target="_blank" href="<?php echo 'public/assets_frontend/cstudent/'.$passport_doc; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
  <button onclick="delete_doc('passport_doc', '<?php echo $cstudent->id; ?>', '<?php echo $passport_doc; ?>')" class="btn btn-success"><i class="fa fa-trash"></i></button>
</div>

<?php

}

}

?>

</div>
    

<!-- photos --> <br>
 

<div class="row" id="photo_docrow">
      
        
<div class="col-md-12" style="margin-bottom: 10px;"><h5 style="color: black;">Photos

<form enctype="multipart/form-data" method="post" onsubmit="add_doc(this, '<?php echo $cstudent->id; ?>', 'photo_doc')">
<?php echo e(csrf_field()); ?>

<span id="show_message_profilephoto_doc"></span>
  <input type="file" name="file_name">
  <input type="hidden" name="type" value="photo_doc">
  <input type="hidden" name="recordid" value="<?php echo $cstudent->id; ?>">
  <button class="btn btn-success" id="upload_btnphoto_doc" type="submit">Add</button>
</form>


</h5></div> 

<?php 
    $photo_docs = json_decode($cstudent->photo_doc);


if($photo_docs != '[]') {
      
foreach($photo_docs as $photo_doc) {

?>

<div class="col-md-2" id="doc<?php $newcourdocname = str_replace(".", "", $photo_doc); $newcourdocname = str_replace("-", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); echo $newcourdocname; ?>">
  <h6 class="artigo_nome"><?php echo $photo_doc; ?></h6>
  <a target="_blank" href="<?php echo 'public/assets_frontend/cstudent/'.$photo_doc; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
  <button onclick="delete_doc('photo_doc', '<?php echo $cstudent->id; ?>', '<?php echo $photo_doc; ?>')" class="btn btn-success"><i class="fa fa-trash"></i></button>
</div>

<?php

}

}

?>

</div>


<!-- Educational Degree --> <br>

<div class="row" id="educational_degree_docrow">
      
        
<div class="col-md-12" style="margin-bottom: 10px;"><h5 style="color: black;">Educational Degree Documents

<form enctype="multipart/form-data" method="post" onsubmit="add_doc(this, '<?php echo $cstudent->id; ?>', 'educational_degree_doc')">
<?php echo e(csrf_field()); ?>

<span id="show_message_profileeducational_degree_doc"></span>
  <input type="file" name="file_name">
  <input type="hidden" name="type" value="educational_degree_doc">
  <input type="hidden" name="recordid" value="<?php echo $cstudent->id; ?>">
  <button class="btn btn-success" id="upload_btneducational_degree_doc" type="submit">Add</button>
</form>


</h5></div> 

<?php 
    $educational_degree_docs = json_decode($cstudent->educational_degree_doc);


if($educational_degree_docs != '[]') {
      
foreach($educational_degree_docs as $educational_degree_doc) {

?>

<div class="col-md-2" id="doc<?php $newcourdocname = str_replace(".", "", $educational_degree_doc); $newcourdocname = str_replace("-", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); echo $newcourdocname; ?>">
  <h6  class="artigo_nome"><?php echo $educational_degree_doc; ?></h6>
  <a target="_blank" href="<?php echo 'public/assets_frontend/cstudent/'.$educational_degree_doc; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
  <button onclick="delete_doc('educational_degree_doc', '<?php echo $cstudent->id; ?>', '<?php echo $educational_degree_doc; ?>')" class="btn btn-success"><i class="fa fa-trash"></i></button>
</div>

<?php

}

}

?>

</div>




<!-- Educational Certificate --> <br>


<div class="row" id="educational_certificate_docrow">
      
        
<div class="col-md-12" style="margin-bottom: 10px;"><h5 style="color: black;">Educational Certificates Documents

<form enctype="multipart/form-data" method="post" onsubmit="add_doc(this, '<?php echo $cstudent->id; ?>', 'educational_certificate_doc')">
<?php echo e(csrf_field()); ?>

<span id="show_message_profileeducational_certificate_doc"></span>
  <input type="file" name="file_name">
  <input type="hidden" name="type" value="educational_certificate_doc">
  <input type="hidden" name="recordid" value="<?php echo $cstudent->id; ?>">
  <button class="btn btn-success" id="upload_btneducational_certificate_doc" type="submit">Add</button>
</form>


</h5></div> 

<?php 
    $educational_certificate_docs = json_decode($cstudent->educational_certificate_doc);


if($educational_certificate_docs != '[]') {
      
foreach($educational_certificate_docs as $educational_certificate_doc) {

?>

<div class="col-md-2" id="doc<?php $newcourdocname = str_replace(".", "", $educational_certificate_doc); $newcourdocname = str_replace("-", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); echo $newcourdocname; ?>">
  <h6 class="artigo_nome"><?php echo $educational_certificate_doc; ?></h6>
  <a target="_blank" href="<?php echo 'public/assets_frontend/cstudent/'.$educational_certificate_doc; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
  <button onclick="delete_doc('educational_certificate_doc', '<?php echo $cstudent->id; ?>', '<?php echo $educational_certificate_doc; ?>')" class="btn btn-success"><i class="fa fa-trash"></i></button>
</div>

<?php

}

}

?>

</div>



<!-- Recomendation Letter --> <br>


<div class="row" id="recomendation_letter_docrow">
      
        
<div class="col-md-12" style="margin-bottom: 10px;"><h5 style="color: black;">Recomendation Letter Documents

<form enctype="multipart/form-data" method="post" onsubmit="add_doc(this, '<?php echo $cstudent->id; ?>', 'recomendation_letter_doc')">
<?php echo e(csrf_field()); ?>

<span id="show_message_profilerecomendation_letter_doc"></span>
  <input type="file" name="file_name">
  <input type="hidden" name="type" value="recomendation_letter_doc">
  <input type="hidden" name="recordid" value="<?php echo $cstudent->id; ?>">
  <button class="btn btn-success" id="upload_btnrecomendation_letter_doc" type="submit">Add</button>
</form>


</h5></div> 

<?php 
    $recomendation_letter_docs = json_decode($cstudent->recomendation_letter_doc);


if($recomendation_letter_docs != '[]') {
      
foreach($recomendation_letter_docs as $recomendation_letter_doc) {

?>

<div class="col-md-2" id="doc<?php $newcourdocname = str_replace(".", "", $recomendation_letter_doc); $newcourdocname = str_replace("-", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); echo $newcourdocname; ?>">
  <h6 class="artigo_nome"><?php echo $recomendation_letter_doc; ?></h6>
  <a target="_blank" href="<?php echo 'public/assets_frontend/cstudent/'.$recomendation_letter_doc; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
  <button onclick="delete_doc('recomendation_letter_doc', '<?php echo $cstudent->id; ?>', '<?php echo $recomendation_letter_doc; ?>')" class="btn btn-success"><i class="fa fa-trash"></i></button>
</div>

<?php

}

}

?>

</div>



<!-- Study Plan --> <br>

<div class="row" id="study_planrow">
      
        
<div class="col-md-12" style="margin-bottom: 10px;"><h5 style="color: black;">Study Plan Documents

<form enctype="multipart/form-data" method="post" onsubmit="add_doc(this, '<?php echo $cstudent->id; ?>', 'study_plan')">
<?php echo e(csrf_field()); ?>

<span id="show_message_profilestudy_plan"></span>
  <input type="file" name="file_name">
  <input type="hidden" name="type" value="study_plan">
  <input type="hidden" name="recordid" value="<?php echo $cstudent->id; ?>">
  <button class="btn btn-success" id="upload_btnstudy_plan" type="submit">Add</button>
</form>


</h5></div> 

<?php 
    $study_plans = json_decode($cstudent->study_plan);


if($study_plans != '[]') {
      
foreach($study_plans as $study_plan) {

?>

<div class="col-md-2" id="doc<?php $newcourdocname = str_replace(".", "", $study_plan); $newcourdocname = str_replace("-", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); echo $newcourdocname; ?>">
  <h6 class="artigo_nome"><?php echo $study_plan; ?></h6>
  <a target="_blank" href="<?php echo 'public/assets_frontend/cstudent/'.$study_plan; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
  <button onclick="delete_doc('study_plan', '<?php echo $cstudent->id; ?>', '<?php echo $study_plan; ?>')" class="btn btn-success"><i class="fa fa-trash"></i></button>
</div>

<?php

}

}

?>

</div>



<!-- Ielts English Proficiency Letter --> <br>


<div class="row" id="ielts_english_proficiency_letterrow">
      
        
<div class="col-md-12" style="margin-bottom: 10px;"><h5 style="color: black;">Ielts English Proficiency Documents

<form enctype="multipart/form-data" method="post" onsubmit="add_doc(this, '<?php echo $cstudent->id; ?>', 'ielts_english_proficiency_letter')">
<?php echo e(csrf_field()); ?>

<span id="show_message_profileielts_english_proficiency_letter"></span>
  <input type="file" name="file_name">
  <input type="hidden" name="type" value="ielts_english_proficiency_letter">
  <input type="hidden" name="recordid" value="<?php echo $cstudent->id; ?>">
  <button class="btn btn-success" id="upload_btnielts_english_proficiency_letter" type="submit">Add</button>
</form>


</h5></div> 

<?php 
    $ielts_english_proficiency_letters = json_decode($cstudent->ielts_english_proficiency_letter);


if($ielts_english_proficiency_letters != '[]') {
      
foreach($ielts_english_proficiency_letters as $ielts_english_proficiency_letter) {

?>

<div class="col-md-2" id="doc<?php $newcourdocname = str_replace(".", "", $ielts_english_proficiency_letter); $newcourdocname = str_replace("-", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); $newcourdocname = str_replace(" ", "", $newcourdocname); echo $newcourdocname; ?>">
  <h6 class="artigo_nome"><?php echo $ielts_english_proficiency_letter; ?></h6>
  <a target="_blank" href="<?php echo 'public/assets_frontend/cstudent/'.$ielts_english_proficiency_letter; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
  <button onclick="delete_doc('ielts_english_proficiency_letter', '<?php echo $cstudent->id; ?>', '<?php echo $ielts_english_proficiency_letter; ?>')" class="btn btn-success"><i class="fa fa-trash"></i></button>
</div>

<?php

}

}

?>

</div>






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


  <?php } ?>

  </tbody>
</table>
</div>


<!-- Modal -->
<div class="modal fade" id="editrecordmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form enctype="multipart/form-data" method="post" onsubmit="edit_student(this)">

        <?php echo e(csrf_field()); ?>


        <span id="editrecordmessage"></span>
        <label for="Name">Name</label>
          <input type="text" class="form-control" name="name" id="editname">
        <label for="Passport Number">Passport Number</label>
          <input type="text" class="form-control" name="passport_number" id="editpassport_number">
          <label for="Intrested Country">Intrested Country</label>
          <input type="text" class="form-control" name="intrested_country_doc" id="editintrested_country_doc">
          <label for="Course">Course</label>
          <input type="text" class="form-control" name="course_doc" id="editcourse_doc">
          <input type="hidden" class="form-control" name="recordid" id="editrecordid">
          <br>
          <button class="btn btn-success" id="editrecordbtn" type="submit">Update</button>
          
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
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


  <script>


    function deleterow(id) {
       

swal({
  title: "Are You Sure You Want to Delete this Student?",
  text: "This Record Will Be Deleted Permanantly.",
  icon: "warning",
  buttons: true,
  successMode: true,
})
.then((willDelete) => {
  if (willDelete) {

          jQuery.ajax({
            type: 'GET',
            url: './delete_student/'+id,   
            data: {},
            dataType: "json",
            success: function (data) {

              if (data.message == 'success') {
                  
                $('#row'+id).hide();
                  swal("Success!", data.message_text, "success");
                  
              } 
               else if (data.message == 'login') {
                  
                                                swal({
  title: "You are not login!",
  text: "Please login to Perform The Action",
  icon: "warning",
  buttons: true,
  dangerMode: false,
  buttons: ["Cancel", "Login Now"],
})
.then((willDelete) => {
  if (willDelete) {
    
    $("#login_model_consult").modal("show");  
    
  } else {
    
  }
});
                  
              }
              else {

     swal("Failure!", data.message_text, "error");

              }

            }   
          });

  } else {
    return false;
  }
});


      }


      function editrow(id) { 

var name = $('#name'+id).html();
var passport_number = $('#passport_number'+id).html();
var intrested_country_doc = $('#intrested_country_doc'+id).html();
var course_doc = $('#course_doc'+id).html();

$('#editrecordmodal').modal('show');

$('#editname').val(name);
$('#editpassport_number').val(passport_number);
$('#editintrested_country_doc').val(intrested_country_doc);
$('#editcourse_doc').val(course_doc);
$('#editrecordid').val(id);


} 



function edit_student(d) {
        
        event.preventDefault();// using this page stop being refreshing 
        document.getElementById('editrecordbtn').innerHTML='<i class="fa fa-spinner fa-spin"></i> Wait Updating...';
	      $('#editrecordbtn').prop('disabled',true);

        var form_data = new FormData(d);

        jQuery.ajax({
            type: 'post',
            url: './edit_student',   
            data: form_data,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

            		document.getElementById('editrecordbtn').innerHTML='Update';
	              $('#editrecordbtn').prop('disabled',false);


                  if (data.message == 'success') {

                    d.reset();
                    $('#editrecordmodal').modal('hide');
                    $('#name'+data.id).html(data.name);
                    $('#passport_number'+data.id).html(data.passport_number);
                    $('#intrested_country_doc'+data.id).html(data.intrested_country_doc);
                    $('#course_doc'+data.id).html(data.course_doc);
                    
                    $("#editrecordmessage").html(data);
                  
                    swal("Success!", data.message_text, "success");
                    
                } 
                 else if (data.message == 'login') {
                    
                                                  swal({
    title: "You are not login!",
    text: "Please login to Perform The Action",
    icon: "warning",
    buttons: true,
    dangerMode: false,
    buttons: ["Cancel", "Login Now"],
  })
  .then((willDelete) => {
    if (willDelete) {
      
      $("#login_model_consult").modal("show");  
      
    } else {
      
    }
  });
                    
                }
                else {

       swal("Failure!", data.message_text, "error");
  
                }
            		
            
              
            }
          });
       
       
             }




      function delete_doc(type, id, docname) { 

        var newdocname = docname.split(".").join("");
        newdocname = newdocname.split("-").join("");
        newdocname = newdocname.split(" ").join("");
        newdocname = newdocname.split(" ").join("");
        newdocname = newdocname.split(" ").join("");
        newdocname = newdocname.split(" ").join("");
        newdocname = newdocname.split(" ").join("");

jQuery.ajax({
           type: 'GET',
           url: './delete_doc/'+type+'/'+id+'/'+docname,   
           data: {},
           dataType: "json",
           success: function (data) {

             if (data.message == 'success') {
                 
              $('#doc'+newdocname).hide();

               swal("Success!", data.message_text, "success");
                 
             } 
              else if (data.message == 'login') {
                 
                                               swal({
 title: "You are not login!",
 text: "Please login to Perform The Action",
 icon: "warning",
 buttons: true,
 dangerMode: false,
 buttons: ["Cancel", "Login Now"],
})
.then((willDelete) => {
 if (willDelete) {
   
   $("#login_model_consult").modal("show");  
   
 } else {
   
 }
});
                 
             }
             else {

    swal("Failure!", data.message_text, "error");

             }

           }   
         });


     }  


      function add_doc(d, id, type) {
        
        event.preventDefault();// using this page stop being refreshing 
        document.getElementById('upload_btn'+type).innerHTML='<i class="fa fa-spinner fa-spin"></i> Wait Uploading...';
	      $('#upload_btn'+type).prop('disabled',true);

        var form_data = new FormData(d);

        jQuery.ajax({
            type: 'post',
            url: './add_doc',   
            data: form_data,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

            		document.getElementById('upload_btn'+type).innerHTML='Add';
	                $('#upload_btn'+type).prop('disabled',false);


                  if (data.message == 'success') {
                   
                    d.reset();
                    var newdocname = data.docname.split(".").join("");
                    newdocname = newdocname.split("-").join("");
                    newdocname = newdocname.split(" ").join("");
                    newdocname = newdocname.split(" ").join("");
                    newdocname = newdocname.split(" ").join("");
                    newdocname = newdocname.split(" ").join("");
                    newdocname = newdocname.split(" ").join("");

                    var docname = "'"+data.docname+"'";
                    type1 = type;
                    type = "'"+type+"'";
                    id = "'"+id+"'";

                    $('<div class="col-md-2" id="doc'+newdocname+'"><h6 class="artigo_nome">'+data.docname+'</h6><a target="_blank" href="public/assets_frontend/cstudent/'+data.docname+'" class="btn btn-success"><i class="fa fa-eye"></i></a><button onclick="delete_doc('+type+', '+id+', '+docname+')" class="btn btn-success"><i class="fa fa-trash"></i></button></div>').appendTo('#'+type1+'row')

                    $("#show_message_profile"+type).html(data);
                  //  $('#row'+id).hide();
                    swal("Success!", data.message_text, "success");
                    
                } 
                 else if (data.message == 'login') {
                    
                                                  swal({
    title: "You are not login!",
    text: "Please login to Perform The Action",
    icon: "warning",
    buttons: true,
    dangerMode: false,
    buttons: ["Cancel", "Login Now"],
  })
  .then((willDelete) => {
    if (willDelete) {
      
      $("#login_model_consult").modal("show");  
      
    } else {
      
    }
  });
                    
                }
                else {

       swal("Failure!", data.message_text, "error");
  
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