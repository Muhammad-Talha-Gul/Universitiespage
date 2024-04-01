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


<section class="dashboard-section  py-5">
  <div class="container">
    <div class="row mt-3">
      <div class="col-sm-12">
        <div class="boxbar2 mt-3">
          <div class="tab custom_tab1 mt-3 ">
            <div class="tablinks  " onclick="openCity(event, 'dashboard')">
              <i class="fa fa-home tab-icon"></i>
              <span>Dashboard</span>
            </div>
            <div class="tablinks" onclick="openCity(event, 'profile')">
              <i class="fa fa-user tab-icon"></i>
              <span>Profile</span>
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
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
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
      </div>



      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
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
                      <h3 class="dashboard-section-heading">Dashboard</h3>
                      <span>Hey <?php echo e(ucfirst($user->first_name)); ?></span>
                      <p>From your Dashboard you have the ability to view your university application's activity and update your account information. Select a link below to view or edit information.</p>

                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="box-style" onclick="openCity(event, 'wishlist')">
                      <div class="box-text">
                        <p class="left-align">
                          Total Wishlist
                        </p>
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
                    <h3 class="dashboard-table-header-heading mt-4 mb-5"><a href="<?php echo e(url('search?page=1&limit=18&scholarship=2&star=5&languages=English,Chinese,chinese,Franch&qualification=1,2,3')); ?>"><u>Search/Apply other Universities</u></a><span class="heading-arrow-span"><i class="fa fa-arrow-right  arrow"></span></i></h3>
                    <h3 class="dashboard-table-header-heading">Profile Information <i class="fa fa-edit" onclick="openCity(event, 'profile')"></i></h3>
                    <div class="dashboard-table-main">
                      <div class="border textdivcolcss">

                        <div class="row mb-3">
                          <div class="col-md-3">
                            <div class="border mb-3  Accommodationdiv">
                              <p>Name:</p>
                            </div>
                          </div>

                          <div class="col-md-9">
                            <div class="border Accommodationdiv">
                              <p><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></p>
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-md-3">
                            <div class="border mb-3  Accommodationdiv">
                              <p>Email:</p>
                            </div>
                          </div>

                          <div class="col-md-9">
                            <div class="border Accommodationdiv">
                              <p><?php echo e($user->email); ?></p>
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-md-3">
                            <div class="border mb-3  Accommodationdiv">
                              <p>Phone No:</p>
                            </div>
                          </div>

                          <div class="col-md-9">
                            <div class="border Accommodationdiv">
                              <p><?php echo e($user->phone); ?></p>
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-md-3">
                            <div class="border mb-3  Accommodationdiv">
                              <p>Nationality:</p>
                            </div>
                          </div>

                          <div class="col-md-9">
                            <div class="border Accommodationdiv">
                              <p><?php echo e($user->country); ?></p>
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-md-3">
                            <div class="border mb-3  Accommodationdiv">
                              <p>Gender:</p>
                            </div>
                          </div>

                          <div class="col-md-9">
                            <div class="border Accommodationdiv">
                              <p><?php echo e($users->gender); ?></p>
                            </div>
                          </div>
                        </div>

                        <div class="bottom-paragraph-main">
                          <?php if($users->prefered_program == 1): ?>
                          <p class="bottom-paragraph"><span class="bottom-paragraph-span">Program you prefer:</span> Bachelor</p>
                          <?php endif; ?>

                          <?php if($users->prefered_program == 2): ?>
                          <p class="bottom-paragraph"><span class="bottom-paragraph-span">Program you prefer:</span> Masters</p>
                          <?php endif; ?>

                          <?php if($users->prefered_program == 3): ?>
                          <p class="bottom-paragraph"><span class="bottom-paragraph-span">Program you prefer:</span> Doctorate</p>
                          <?php endif; ?> <?php if($users->prefered_program == 4): ?>
                          <p class="bottom-paragraph"><span class="bottom-paragraph-span">Program you prefer:</span> Non-Degree program</p>
                          <?php endif; ?> <?php if($users->prefered_program == 5): ?>
                          <p class="bottom-paragraph"><span class="bottom-paragraph-span">Program you prefer:</span> Diploma/Certification</p>
                          <?php endif; ?> <?php if($users->prefered_program == 6): ?>
                          <p class="bottom-paragraph"><span class="bottom-paragraph-span">Program you prefer:</span> Matric</p>
                          <?php endif; ?> <?php if($users->prefered_program == 7): ?>
                          <p class="bottom-paragraph"><span class="bottom-paragraph-span">Program you prefer:</span> A level</p>
                          <?php endif; ?> <?php if($users->prefered_program == 9): ?>
                          <p class="bottom-paragraph"><span class="bottom-paragraph-span">Program you prefer:</span> O level</p>
                          <?php endif; ?> <?php if($users->prefered_program == 10): ?>
                          <p class="bottom-paragraph"><span class="bottom-paragraph-span">Program you prefer:</span> Intermediate</p>
                          <?php endif; ?> <?php if($users->prefered_program == 11): ?>
                          <p class="bottom-paragraph"><span class="bottom-paragraph-span">Program you prefer:</span> Associate degree</p>
                          <?php endif; ?> <?php if($users->prefered_program == 12): ?>
                          <p class="bottom-paragraph"><span class="bottom-paragraph-span">Program you prefer:</span> Foundation Degree</p>
                          <?php endif; ?> <?php if($users->prefered_program == 13): ?>
                          <p class="bottom-paragraph"><span class="bottom-paragraph-span">Program you prefer:</span> Diploma of higher education</p>
                          <?php endif; ?> <?php if($users->prefered_program == 14): ?>
                          <p class="bottom-paragraph"><span class="bottom-paragraph-span">Program you prefer:</span> Higher national diploma</p>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          </div>

          <div id="profile" class="tabcontent" style="display: none;">
            <main class="o-2colLayout-content dashboard-edit-profile">
              <section class="mb-3 custom-html">
                <h3 class="dashboard-section-heading edit-profile-heading">Edit Profile</h3>
                <h3 class="dashboard-sub-heading text-center mb-3">General Information</h3>
                <?php
                $user = auth()->user();
                ?>
                <form name="contact-form" class="form " method="post" action="<?php echo e(route('student.update', $user->id)); ?>" autocomplete="off">
                  <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('PUT')); ?>

                  <div class="row acd ">
                    <input type="hidden" name="password" value="">
                    <input type="hidden" name="profile" value="student">
                    <div class="col-sm-6">
                      <div class="form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
                        <label class="form__label dashboard-form-label">First Name<span class="label__required">*</span>
                        </label>
                        <input type="text" name="first_name" class="form-control" required="" value="<?php echo e($user->first_name); ?>">
                        <?php if($errors->has('first_name')): ?>
                        <span class="help-block">
                          <strong><?php echo e($errors->first('first_name')); ?></strong>
                        </span>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
                        <label class="form__label dashboard-form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo e($user->last_name); ?>">
                        <?php if($errors->has('last_name')): ?>
                        <span class="help-block">
                          <strong><?php echo e($errors->first('last_name')); ?></strong>
                        </span>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label class="form__label dashboard-form-label">Email Address<span class="label__required">*</span></label>
                        <input type="email" name="email" class="form-control" required="" value="<?php echo e($user->email); ?>">
                        <?php if($errors->has('email')): ?>
                        <span class="help-block">
                          <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                        <label class="form__label dashboard-form-label">Phone<span class="label__required">*</span></label>
                        <input type="number" name="phone" class="form-control" required="" value="<?php echo e($user->phone); ?>">
                        <?php if($errors->has('phone')): ?>
                        <span class="help-block">
                          <strong><?php echo e($errors->first('phone')); ?></strong>
                        </span>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 edit-profile-select-column">
                      <div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                        <label class="form__label dashboard-form-label">Nationality<span class="label__required">*</span></label>
                        <select name="country" class="form-control" required="">
                          <option  value="<?php echo e($user->country); ?>" selected=""><?php echo e($user->country); ?></option>
                          <!-- <?php $__currentLoopData = allCountry(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prefer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($prefer->country); ?>" <?php if($user->students->nationality == $prefer->country): ?> selected <?php endif; ?>><?php echo e($prefer->country); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
                          <option value="Afganistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bonaire">Bonaire</option>
                                            <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Canary Islands">Canary Islands</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Channel Islands">Channel Islands</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos Island">Cocos Island</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote DIvoire">Cote DIvoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Curaco">Curacao</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands">Falkland Islands</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Ter">French Southern Ter</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Great Britain">Great Britain</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Hawaii">Hawaii</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="India">India</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea North">Korea North</option>
                                            <option value="Korea Sout">Korea South</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Macedonia">Macedonia</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Midway Islands">Midway Islands</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Nambia">Nambia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherland Antilles">Netherland Antilles</option>
                                            <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                            <option value="Nevis">Nevis</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau Island">Palau Island</option>
                                            <option value="Palestine">Palestine</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Phillipines">Philippines</option>
                                            <option value="Pitcairn Island">Pitcairn Island</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Republic of Montenegro">Republic of Montenegro</option>
                                            <option value="Republic of Serbia">Republic of Serbia</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="St Barthelemy">St Barthelemy</option>
                                            <option value="St Eustatius">St Eustatius</option>
                                            <option value="St Helena">St Helena</option>
                                            <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                            <option value="St Lucia">St Lucia</option>
                                            <option value="St Maarten">St Maarten</option>
                                            <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                            <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                            <option value="Saipan">Saipan</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="Samoa American">Samoa American</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Tahiti">Tahiti</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Erimates">United Arab Emirates</option>
                                            <option value="United States of America">United States of America</option>
                                            <option value="Uraguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Vatican City State">Vatican City State</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                            <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                            <option value="Wake Island">Wake Island</option>
                                            <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zaire">Zaire</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                        <?php if($errors->has('country')): ?>
                        <span class="help-block">
                          <strong><?php echo e($errors->first('country')); ?></strong>
                        </span>
                        <?php endif; ?>
                      </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 edit-profile-select-column">
                      <div class="form-group<?php echo e($errors->has('prefer') ? ' has-error' : ''); ?>">
                        <label class="form__label dashboard-form-label">What type of program would you prefer? *<span class="label__required">*</span></label>
                        <select name="prefer" class="form-control" required="">
                          <option selected="" disabled>--Please select--</option>
                          <?php $__currentLoopData = qualification(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prefer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($prefer->id); ?>" <?php if($user->students->prefered_program == $prefer->id): ?> selected <?php endif; ?>><?php echo e($prefer->title); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('prefer')): ?>
                        <span class="help-block">
                          <strong><?php echo e($errors->first('prefer')); ?></strong>
                        </span>
                        <?php endif; ?>
                      </div>
                    </div>

                    <div class="col-sm-12">
    <div class="form-group button-check <?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
        <h6 class="form__label dashboard-form-label gender-heading">Gender<span class="label__required">*</span></h6>
        <div style="text-align: left;display: inline-block;">
            <input id="Schoolmale" class="form-check-input" type="radio" name="gender" <?php echo e($user->students->gender == 'Male' ? 'checked' : ''); ?> value="Male">
            <label for="Schoolmale" class="form-check-label checkbox-button">Male</label>
        </div>
        <div style="text-align: left;display: inline-block;">
            <input id="Schoolfemale" class="form-check-input" type="radio" name="gender" <?php echo e($user->students->gender == 'Female' ? 'checked' : ''); ?> value="Female">
            <label for="Schoolfemale" class="form-check-label checkbox-button">Female</label>
        </div>
        <?php if($errors->has('gender')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('gender')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>

                    <div class="col-sm-12 mt-4 text-center">
                        <button type="submit" class="btn btn-primary ml-2 dashboard-button">Update</button>
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
                  <h3 class="dashboard-section-heading">Application Form</h3>
                  <span class="dashboard-sub-heading">List Of Application Form</span>
                  <div class="table-responsive" style="scroll-behavior: smooth;overflow-y:hidden;overflow-x: auto;margin-bottom: 50px;">
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
                                    <?php if($ranking[0]!==0): ?> <?php for($i=0; $i<(int)$ranking[0]; $i++): ?> <i class="fa fa-star"></i>
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
                            <?php endif; ?>
                          </td>
                          
                          
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
                            <a class="btn btn-danger btn-xs dashboard-delete-button" onclick="deleteApp(<?php echo e($value->id); ?>)"><i class="fa fa-trash"></i></a>
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
                      <h3 class="dashboard-section-heading">Wishlist</h3>
                      <span class="dashboard-sub-heading">My Wishlist</span>
                      <div class="table-responsive" style="scroll-behavior: smooth;overflow-y:hidden;overflow-x: auto;margin-bottom: 50px;">
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
                            <td class="a-center last"><span class="nobr">
                              <a class="btn btn-danger btn-xs dashboard-delete-button" href="<?php echo e(url('courses/'.$value->course->id)); ?>" target="_blank">
                              <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                                preserveAspectRatio="xMidYMid meet" class="action-icon">

                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                fill="#fff" stroke="none">
                                <path d="M2404 4080 c-846 -49 -1644 -502 -2280 -1294 -166 -207 -166 -244 1
                                -453 635 -793 1436 -1245 2286 -1292 961 -52 1870 402 2585 1293 166 207 166
                                244 -1 453 -464 579 -1016 977 -1626 1172 -190 61 -419 105 -599 116 -196 11
                                -238 12 -366 5z m368 -466 c287 -54 563 -250 713 -505 180 -308 199 -680 51
                                -995 -58 -123 -114 -203 -209 -301 -535 -551 -1446 -383 -1756 324 -112 255
                                -114 567 -5 833 105 259 334 485 595 588 198 78 396 96 611 56z"/>
                                <path d="M2455 3130 c-163 -35 -307 -136 -389 -274 -61 -101 -81 -176 -80
                                -296 0 -116 11 -163 57 -260 43 -89 167 -213 258 -257 321 -155 694 3 810 342
                                33 97 34 249 2 350 -73 231 -285 392 -528 401 -49 2 -108 -1 -130 -6z"/>
                                </g>
                                </svg></a>
                              <a class="btn btn-danger btn-xs dashboard-delete-button danger-button" style="cursor:pointer;" onclick="deleteit('<?php echo e(route("deleteWishlist",$value->id)); ?>')">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                                preserveAspectRatio="xMidYMid meet" class="action-icon">

                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                fill="#fff" stroke="none">
                                <path d="M1871 5109 c-128 -25 -257 -125 -311 -241 -37 -79 -50 -146 -50 -259
                                l0 -88 -487 -3 c-475 -3 -489 -4 -534 -24 -60 -28 -125 -93 -152 -153 -30 -64
                                -30 -178 0 -242 27 -60 92 -125 152 -153 l46 -21 2025 0 2025 0 46 21 c60 28
                                125 93 152 153 30 64 30 178 0 242 -27 60 -92 125 -152 153 -45 20 -59 21
                                -533 24 l-488 3 0 88 c0 49 -5 112 -10 142 -34 180 -179 325 -359 359 -66 12
                                -1306 12 -1370 -1z m1359 -309 c60 -31 80 -78 80 -190 l0 -90 -750 0 -750 0 0
                                90 c0 110 20 159 78 189 36 19 60 20 670 21 615 0 634 -1 672 -20z"/>
                                <path d="M625 3578 c3 -24 62 -727 130 -1563 69 -836 130 -1558 136 -1605 24
                                -197 159 -352 343 -395 91 -22 2561 -22 2652 0 184 43 319 198 343 395 6 47
                                67 769 136 1605 68 836 127 1539 130 1563 l5 42 -1940 0 -1940 0 5 -42z m1122
                                -286 c17 -12 37 -36 46 -54 12 -26 32 -304 92 -1273 l77 -1239 -21 -43 c-37
                                -77 -129 -104 -205 -60 -76 43 -66 -39 -151 1332 l-77 1239 21 43 c38 79 146
                                106 218 55z m883 8 c26 -13 47 -34 60 -60 20 -39 20 -56 20 -1280 0 -1224 0
                                -1241 -20 -1280 -23 -45 -80 -80 -130 -80 -50 0 -107 35 -130 80 -20 39 -20
                                56 -20 1280 0 1223 0 1241 20 1280 37 73 124 99 200 60z m901 0 c27 -14 46
                                -34 60 -63 l21 -43 -77 -1239 c-85 -1371 -75 -1289 -151 -1332 -76 -44 -168
                                -17 -205 60 l-21 43 76 1234 c71 1155 77 1238 97 1277 15 29 34 48 63 63 52
                                25 86 25 137 0z"/>
                                </g>
                                </svg>
                            </a>
                          </span></td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php else: ?>
                          <tr>
                            <td colspan="5">
                              <p class="not-found2">No Record found</p>
                            </td>
                          </tr>
                          <?php endif; ?>
                        </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </main>
          </div>

          <div id="password" class="tabcontent" style="display: none;">
            <main class="o-2colLayout-content dashboard-edit-profile">

              <section class="mb-3 custom-html">
                <h3 class="dashboard-section-heading edit-profile-heading change-password-heading mb-5">Change Password</h3>
                <form method="POST" action="<?php echo e(route('updatePassword')); ?>">
                  <?php echo e(csrf_field()); ?>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group<?php echo e($errors->has('current-password') ? ' has-error' : ''); ?>">
                        <label class="form__label dashboard-form-label">Current Password</label>
                        <input id="current-password" type="password" class="form-control" name="current-password" placeholder="Current Password" required>
                        <?php if($errors->has('current-password')): ?>
                        <span class="help-block">
                          <strong><?php echo e($errors->first('current-password')); ?></strong>
                        </span>
                        <?php endif; ?>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group<?php echo e($errors->has('new-password') ? ' has-error' : ''); ?>">
                        <label class="form__label dashboard-form-label">New Password</label>
                        <input id="new-password" type="password" class="form-control" name="new-password" placeholder="New Password" required>
                        <?php if($errors->has('new-password')): ?>
                        <span class="help-block">
                          <strong><?php echo e($errors->first('new-password')); ?></strong>
                        </span>
                        <?php endif; ?>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group<?php echo e($errors->has('new-password_confirmation') ? ' has-error' : ''); ?>">
                        <label class="form__label dashboard-form-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="new-password_confirmation"placeholder="Confirm New Password" required>
                        <?php if($errors->has('new-password_confirmation')): ?>
                        <span class="help-block">
                          <strong><?php echo e($errors->first('new-password_confirmation')); ?></strong>
                        </span>
                        <?php endif; ?>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-primary dashboard-button">Update</button>
                      </div>
                    </div>
                  </div>
                </form>
              </section>

            </main>
          </div>

          <div id="notification" class="tabcontent" style="display:none;">
            <main class="o-2colLayout-content">
              <section class="mb-3 custom-html">
                <h3 class="dashboard-section-heading">Notifications</h3>
                <span class="dashboard-sub-heading">List Of Notifications</span>
                <div class="row">
                  <div class="col-md-12">
                    <div class="main-dashboard">
                    <div class="table-responsive" style="scroll-behavior: smooth;overflow-y:hidden;overflow-x: auto;margin-bottom: 50px;">
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
                          
                          <tr style="cursor: pointer;" class="<?php echo e(($value->is_read==1)?'':'active'); ?>" onclick="location.href='<?php echo e(route('dashboard-notification-detail',$value->id)); ?>'">
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
                              <?php if($value->university_id!==null): ?> <?php echo e(($value->university->name)??''); ?>'s <?php else: ?> <?php echo e(($value->consultant->organization_name)??''); ?>'s <?php endif; ?> Account is upgrated to Premium.
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
                            <td colspan="3">
                              <p class="not-found2">No Notification</p>
                            </td>
                          </tr>
                          <?php endif; ?>
                        </tbody>
                      </table>
                      <div class="table-responsive" style="scroll-behavior: smooth;overflow-y:hidden;overflow-x: auto;margin-bottom: 50px;">
                      <?php if(count($notifications)>= 10): ?>
                      <div class="pagination-wrapper">
                        <?php
                        $result = $notifications;
                        $count=$result->lastPage()+1;
                        ?>
                        <ul class="pagination">
                          <?php if($result->currentPage()!=1): ?><li><a href="<?php echo e($result->url(1)); ?>">«</a></li><?php endif; ?>
                          <?php for($i=1; $i<$count; $i++): ?> <li class=<?php echo e(($result->currentPage()==$i)?'active':''); ?>>
                            <a href="<?php echo e($result->url($i)); ?>"><?php echo e($i); ?>

                              <?php echo ($result->currentPage()==$i)?'<span class="sr-only">(current)</span>':''; ?>

                            </a>
                            </li>
                            <?php endfor; ?>
                            <?php if($result->currentPage()!=$result->lastPage()): ?><li><a href="<?php echo e($result->url($result->lastPage())); ?>">»</a></li><?php endif; ?>
                        </ul>
                      </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </section>
            </main>
          </div>
</section>

</main>
</div>


</div>
</section>


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
        console.log('Hello, world!');
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

    var isLarge = false; // Initial state of arrow size

  setInterval(function() {
    var newSize = isLarge ? '16px' : '20px';
    $('.arrow').animate({ fontSize: newSize });
    isLarge = !isLarge;
  }, 100);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>