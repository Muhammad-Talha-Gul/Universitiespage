
<style>
@media  screen and (max-width: 770px) {
.stickyposition_mobile{
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 999999 !important;
    margin-top: 0px !important;
    width: 102%;
    opacity: 1 !important;
    }


}

</style>
<div class="stickyposition_mobile">
<aside id="siteRedirect" class="sticky-top bg-dark text-white p-3 p-sm-2 d-none" style="z-index:1025">
   <div class="container">
      <div class="row align-items-center">
         
         <div class="col-auto order-sm-2 align-self-start align-self-sm-center">
            <button type="button" class="close text-white" aria-label="Close">&times;</button>
         </div>
         <div class="col-12 col-sm-auto order-sm-1">
            <a href="#" class="js-url btn btn-secondary w-100">Yes, continue</a>
         </div>
      </div>
   </div>
</aside>
<nav class="container c-navbar border-bottom py-1 px-0">
   <a class="col-auto" href="<?php echo e(url('/')); ?>">
   <img src="<?php echo e(url('/filemanager/photos/1/thumbs/unipage_logo_2.png')); ?>" style="height: 56px !important;" alt="">
   </a>
<style>
    
.blink_me_text_on_header {
  animation: blinker 1s linear infinite;
  font-weight: bold;
  text-align: center;
  color:red;
}

@keyframes  blinker {
  50% {
    opacity: 0;
  }
}
    
</style>

    
<!--<div class="blink_me_text_on_header">Due to Covid-19,we are only accepting online applications</div>-->
   <div class="col p-0"></div>







































   <!--<a class="col-auto c-navbar-icon d-md-none rounded-circle bg-secondary px-1 c-pulsate-infreq js-onModalOpen-highlight" tabindex="0" title="Search" data-toggle="modal" data-target="#SearchModal">-->
   <!--<i class="fa fa-fw fa-search"></i>-->
   <!--</a>-->

   <style>
     
    .border-bottom span {
    color: #000000;
    padding-left: 5px;
    font-family: Poppins;
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

   </style>

   <div class="bottom-nav" style="justify-content: flex-end;
    align-items: center; display: flex;">
     <a class="bottom-nav-links col-auto c-navbar-contactUs" style="cursor:pointer; padding-left: 0px; padding-right: 20px;">
        <!--<small>Need help?</small>-->
        <div class="col-md-12">
           <?php $__currentLoopData = getSocialMeta(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($social!==null): ?>
                    <!-- <i class="fa fa-<?php echo e($key); ?> fa_icon" onclick="window.location.href=`<?php echo e(url(($social)??'#.')); ?>`"></i> -->
              <?php endif; ?>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <style>
                @media (max-width: 570px) {
                    .displaynonethis{display:none;}
                }
            </style>
        





<i class="fa fa-whatsapp fa_icon" onclick="window.open('https://api.whatsapp.com/send?phone=923112853194')" style="font-size: 18px;color: #0B6D76;font-weight: bold;"><span>Lahore</span> <span class="displaynonethis" style="font-size: 14px; font-weight: bold;">03112853194</span></i>
          
      <i class="fa fa-whatsapp fa_icon" onclick="window.open('https://api.whatsapp.com/send?phone=+923349990308')" style="font-size: 18px;color: #0B6D76;font-weight: bold;"><span>Islamabad</span> <span class="displaynonethis" style="font-size: 14px; font-weight: bold;">03349990308</span></i>
         
          

          <i class="fa fa-envelope fa_icon" onclick="window.location.href=`mailto:info@universitiespage.com`" style="font-size: 18px;color: #0B6D76;font-weight: bold;"><span class="displaynonethis"> Email </span> <span class="displaynonethis" style="font-size: 11px; font-weight: bold;">Click Mail</span></i>


         <i class="fa fa-fw fa-key fa_icon" data-toggle="modal" data-target="#login_model" style="font-size: 18px;font-weight: bold; color: #0B6D76;"><span style="font-size: 11px; font-weight: bold;">Student</i>


         <i class="fa fa-fw fa-key fa_icon" data-toggle="modal" data-target="#login_model_consult" style="font-size: 18px;font-weight: bold; margin-left: 42px; color: #0B6D76;"><span style="font-size: 11px; font-weight: bold;">Consultant </span> <span style="font-size: 11px; font-weight: bold;"></span></i>
        
   
        
          
          
       
        </div>

        <style type="text/css">
          .bottom-nav .bottom-nav-links {
            display: inline-flex !important;
          }
        </style>

         <?php if(Auth::check()): ?>
             <?php if(auth()->user()->user_type=='student' OR auth()->user()->user_type=='consultant'): ?>
         <div class="username-box bottom-nav-links">
             <a class="logedin-user" href="javascript:void(0);" style="font-size: 20px;"><i class="fa fa-fw fa-user-circle-o"></i></a>
             <div class="dropdown-login-user">
                 <div class="carot"></div>
                 <ul>
                     <li align="center">HI, <?php echo e((auth()->user()->first_name)??''); ?> <?php echo e((auth()->user()->last_name)??''); ?></li>
                     <li align="center"><a href="<?php echo e(url((auth()->user()->user_type=='student')?'dashboard':'admin')); ?>" target="_blank">Dashboard</a></li>
                     <?php if(auth()->user()->user_type=='student'): ?><li align="center"><a href="<?php echo e(url('dashboard#profile')); ?>" target="_blank">Profile</a></li><?php endif; ?>
                     <li align="center" class="logout-btn">Logout</li>
                     <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                         <?php echo e(csrf_field()); ?>

                     </form>
                 </ul>
             </div>
             
         </div>
             <?php endif; ?>
             <?php endif; ?>
     </a>
      <?php if(Auth::check()): ?>
        <?php if(auth()->user()->user_type=='student'): ?>
          <div id="vue-notification" class="bottom-nav-links">
            <a class="col-auto c-navbar-contactUs notification-btn">
              <i class="fa fa-bell"></i>
              <b v-if="(notifications && notifications.length>0)?true:false" v-text="notifications.length"></b>
            </a>

            <div class="dropdown-noti">
              <div class="pointer-up"></div>
              <h5 class="noti-heading">Notification</h5>
                <div v-for="notification in notifications.slice(0, 3)" @click="read(notification.id)">
                  <a v-if="notification.type=='application'" :href="baseUrl+'/dashboard#applications'">
                    <div class="notes">
                      <h5 class="notes-title">Application {{notification.meta}}</h5>
                      <p class="notes-date"> {{moment(notification.created_at).format('Do MMM YYYY, h:mm a')}}</p>
                    </div>
                  </a>
                  <a v-if="notification.type=='application_status'" :href="baseUrl+'/dashboard#applications'">
                    <div class="notes">
                      <h5 class="notes-title">Application {{notification.meta}}</h5>
                      <p class="notes-date"> {{moment(notification.created_at).format('Do MMM YYYY, h:mm a')}}</p>
                    </div>
                  </a>
                  <a v-if="notification.type=='review-replay'" :href="baseUrl+'/university/'+notification.message">
                    <div class="notes">
                      <h5 class="notes-title">{{notification.meta}}</h5>
                      <p class="notes-date"> {{moment(notification.created_at).format('Do MMM YYYY, h:mm a')}}</p>
                    </div>
                  </a>
                </div>
                <div class="notes" v-if="(notifications && notifications.length==0)?true:false">
                  <p class="notes-date" align="center" style="font-size: 12px;margin: 0;"> No Notification</p>
                </div>

              <a href="<?php echo e(url('dashboard#notification')); ?>" class="noti-seemore">See All Notification</a>
            </div>
          </div>
        <?php endif; ?>


















      <?php else: ?>



        <div class="modal c-navbarModal" id="login_model" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog" role="document">
              <div class="modal-content">
                 <div class="modal-header is-borderless">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute;top: -7px;right: 6px">
                    <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                 <div class="modal-body">
                    <div class="login-form">
                      <h2 class="h2 mb-3 w100p" align="center">Login as Student</h2>
                      <form class="form-inline login-student" method="POST">
                         <?php echo e(csrf_field()); ?>

                        <label class="sr-only" for="login_email">Email</label>
                        <div class="input-group mr-sm-2" style="margin-bottom: 20px;">
                          <div class="input-group-prepend">
                            <div class="input-group-text input-icon">
                               <i class="fa fa-envelope-o"></i>
                            </div>
                          </div>
                          <input type="email" name="email" class="form-control" id="login_email" placeholder="Enter Your Email">
                          <div id="ResetMsg" style="font-size: 12px;color: red;position: absolute;text-align: center;width: 100%;font-weight: 500;top: -20px;"></div>
                        </div>

                        <label class="sr-only" for="login_password">Password</label>
                        <div class="input-group mr-sm-2" style="margin-bottom: 10px;">
                          <div class="input-group-prepend">
                            <div class="input-group-text input-icon">
                               <i class="fa fa-key"></i>
                            </div>
                          </div>
                          <input type="password" name="password" class="form-control" id="login_password" placeholder="Password">
                        </div>

                        <div class="form-check mb-2 mr-sm-2">
                         <label>
                           <input type="checkbox" name="" value="1"> 
                           <span> Remember me </span>
                         </label>
                        </div>
                        
								<p ><small><a href="<?php echo e(route('password.request')); ?>" ><?php echo app('translator')->getFromJson('Forgot password?'); ?></a></small></p>
								

                        <button type="submit" class="btn btn-primary mb-2 w100p submit-btn">Submit</button>
                      </form>
                      <p class="register-as-student">Register As Student</p>
                    </div>
                    <div class="registration-form" id="register-validate" style="display:none;">
                      <h2 class="h2 mb-3 w100p" align="center">Registration as Student</h2>
                      <form class="form-inline" method="POST" @submit="submitReg($event)">
                        <input type="hidden" value="student" name="user_type">
                        
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="input-group mr-sm-2" style="margin-bottom: 20px;">
                              <div class="input-group-prepend">
                                <div class="input-group-text input-icon">
                                   <i class="fa fa-user-o"></i>
                                </div>
                              </div>
                              <input type="text" name="first_name" v-model="list.first_name" class="form-control" placeholder="First/given name(s)">
                              <div class="reg-error-msg" v-if="errors.first_name" v-for="error in errors.first_name">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="input-group mr-sm-2" style="margin-bottom: 20px;">
                              <input type="text" name="last_name" v-model="list.last_name" class="form-control" placeholder="Enter Your Last Name">
                              <div class="reg-error-msg" v-if="errors.last_name" v-for="error in errors.last_name">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="input-group mr-sm-2" style="margin-bottom: 20px;">
                              <div class="input-group-prepend">
                                <div class="input-group-text input-icon">
                                   <i class="fa fa-envelope-o"></i>
                                </div>
                              </div>
                              <input type="email" name="email" v-model="list.email" class="form-control" placeholder="Enter Valid Email Address">
                              <div class="reg-error-msg" v-if="errors.email" v-for="error in errors.email">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 pb-3">
                            <div class="input-group mr-sm-2" style="margin-bottom: 10px;">
                              <div class="input-group-prepend">
                                <div class="input-group-text input-icon">
                                   <i class="fa fa-key"></i>
                                </div>
                              </div>
                              <input type="password" name="password" v-model="list.password" class="form-control" placeholder="Password">
                              <div class="reg-error-msg" v-if="errors.password" v-for="error in errors.password">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 pb-3">
                            <div class="input-group mr-sm-2" style="margin-bottom: 10px;">
                              <input type="password" name="password_confirmation" v-model="list.password_confirmation" class="form-control" placeholder="Confirm Password">
                              <div class="reg-error-msg" v-if="errors.password_confirmation" v-for="error in errors.password_confirmation">
                                <span v-text="error"></span>
                              </div>                  
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 pb-3">
                            <div class="input-group mr-sm-2" style="margin-bottom: 10px;">
                              <div class="input-group-prepend">
                                <div class="input-group-text input-icon">
                                   <i class="fa fa-phone"></i>
                                </div>
                              </div>
                              <input type="number" name="phone" v-model="list.phone" class="form-control" placeholder="Mobile Number">
                              <div class="reg-error-msg" v-if="errors.phone" v-for="error in errors.phone">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 pb-3" style="height: 26px;">
                            <label class="custom-radio" style="display: inline-block;"> Male
                              <input type="radio" name="gender" checked="" v-model="list.gender" value="male">
                              <span class="checkmark" style="margin-left: 8px;"></span>
                            </label>
                            <label class="custom-radio" style="display: inline-block;"> Female
                              <input type="radio" name="gender" v-model="list.gender" value="female">
                              <span class="checkmark" style="margin-left: 8px;"></span>
                            </label>
                            <div class="reg-error-msg" v-if="errors.gender" v-for="error in errors.gender">
                              <span v-text="error"></span>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 pb-3">
                            <div class="input-group mr-sm-2" style="margin-bottom: 10px;">
                              <select name="country" class="form-control w100p country-select">
                                <option selected="">--Nationality--</option>
                                										
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
                              <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 pb-3">
                            <div class="input-group mr-sm-2" style="margin-bottom: 10px;">
                              <select name="prefer" class="form-control w100p prefer-select">
                                <option selected="">--What type of program would you prefer?--</option>
                                <?php $__currentLoopData = qualification(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prefer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($prefer->id); ?>" <?php if(old('prefer') == $prefer->id): ?> selected="" <?php endif; ?>><?php echo e($prefer->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                              <div class="reg-error-msg" v-if="errors.prefer" v-for="error in errors.prefer">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                        </div>



                        <input type="hidden" name="company_name" value="none"> 
                        <input type="hidden" name="employeeno" value="none"> 
                        <input type="hidden" name="state" value="none"> 
                        <input type="hidden" name="designation" value="none"> 
                        <input type="hidden" name="comment" value="none"> 



                        <div class="form-check mb-2 mr-sm-2">
                         <label>
                           <input type="checkbox" name="terms" v-model="list.terms" value="1">
                           <span> I agree to the <a href="<?php echo e(url('terms-and-condition')); ?>" style="color: #c52228 !important;">Terms And Conditions</a> </span>
                         </label>
                          <div class="reg-error-msg" style="bottom:-3px;" v-if="errors.terms" v-for="error in errors.terms">
                            <span v-text="error"></span>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary mb-2 w100p submit-btn">Register</button>
                      </form>
                      <p class="login-as-student">Login</p>
                    </div>
                    
                    <div id="autocomplete_result_model" class="autocomplete-result o-ruled-list"></div>
                 </div>
              </div>
           </div>
        </div>







<!-- consultion modal start -->


        <div class="modal c-navbarModal" id="login_model_consult" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog" role="document">
              <div class="modal-content">
                 <div class="modal-header is-borderless">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute;top: -7px;right: 7px">
                    <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                 <div class="modal-body">
                    <div class="login-form">
                      <h2 class="h2 mb-3 w100p" align="center">Login as Consultant</h2>
                      <form class="form-inline login-student" method="POST">
                         <?php echo e(csrf_field()); ?>

                        <label class="sr-only" for="login_email">Email</label>
                        <div class="input-group mr-sm-2" style="margin-bottom: 20px;">
                          <div class="input-group-prepend">
                            <div class="input-group-text input-icon">
                               <i class="fa fa-envelope-o"></i>
                            </div>
                          </div>
                          <input type="email" name="email" class="form-control" id="login_email" placeholder="Enter Your Email">
                          <div id="ResetMsg" style="font-size: 12px;color: red;position: absolute;text-align: center;width: 100%;font-weight: 500;top: -20px;"></div>
                        </div>

                        <label class="sr-only" for="login_password">Password</label>
                        <div class="input-group mr-sm-2" style="margin-bottom: 10px;">
                          <div class="input-group-prepend">
                            <div class="input-group-text input-icon">
                               <i class="fa fa-key"></i>
                            </div>
                          </div>
                          <input type="password" name="password" class="form-control" id="login_password" placeholder="Password">
                        </div>

                        <div class="form-check mb-2 mr-sm-2">
                         <label>
                           <input type="checkbox" name="" value="1"> 
                           <span> Remember me </span>
                         </label>
                        </div>
                        
							     	<p ><small><a href="<?php echo e(route('password.request')); ?>" ><?php echo app('translator')->getFromJson('Forgot password?'); ?></a></small></p>
							      	

                        <button type="submit" class="btn btn-primary mb-2 w100p submit-btn">Submit</button>
                      </form>
                      <p class="register-as-student">Register As Consultant</p>
                    </div>
                    <div class="registration-form" id="register-validateconsult" style="display:none;">
                      <h2 class="h2 mb-3 w100p" align="center">Registration as Consultant</h2>
                      <form class="form-inline" method="POST" @submit="submitReg($event)">
                        <input type="hidden" value="consultant" name="user_type">
                        
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="input-group mr-sm-2" style="margin-bottom: 20px;">
                              <div class="input-group-prepend">
                                <div class="input-group-text input-icon">
                                   <i class="fa fa-building"></i>
                                </div>
                              </div>
                              <input type="text" name="company_name" v-model="list.company_name" class="form-control" placeholder="Company name">
                              <div class="reg-error-msg" v-if="errors.company_name" v-for="error in errors.company_name">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 pb-3">
                            <div class="input-group mr-sm-2" style="margin-bottom: 10px;">
                              <select name="employeeno" class="form-control" v-model="list.employeeno">
                              
                              <option selected="" value="">--No Of Employees--</option>
                                										
                              <option value="1-5">1-5</option>
                              <option value="6-10">6-10</option>
                              <option value="11-50">11-50</option>
                              <option value="50_more">50+</option>

                              </select>
                              <div class="reg-error-msg" v-if="errors.employeeno" v-for="error in errors.employeeno">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="row">
                        <div class="col-sm-6 pb-3">
                            <div class="input-group mr-sm-2" style="margin-bottom: 10px;">
                              <select name="country" class="form-control w100p country-select">
                                <option selected="">--Nationality--</option>
                                										
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
                              <div class="reg-error-msg" v-if="errors.country" v-for="error in errors.country">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="input-group mr-sm-2" style="margin-bottom: 20px;">
                              <div class="input-group-prepend">
                                <div class="input-group-text input-icon">
                                   <i class="fa fa-home"></i>
                                </div>
                              </div>
                              <input type="text" name="state" v-model="list.state" class="form-control" placeholder="State">
                              <div class="reg-error-msg" v-if="errors.state" v-for="error in errors.state">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mr-sm-2" style="margin-bottom: 20px;">
                              <div class="input-group-prepend">
                                <div class="input-group-text input-icon">
                                   <i class="fa fa-home"></i>
                                </div>
                              </div>
                              <input type="text" name="city" v-model="list.city" class="form-control" placeholder="city">
                              <div class="reg-error-msg" v-if="errors.city" v-for="error in errors.city">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="input-group mr-sm-2" style="margin-bottom: 20px;">
                              <input type="text" name="address" v-model="list.address" class="form-control" placeholder="Address">
                              <div class="reg-error-msg" v-if="errors.address" v-for="error in errors.address">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        



                        <div class="row">
                          <div class="col-sm-6">
                            <div class="input-group mr-sm-2" style="margin-bottom: 20px;">
                              <div class="input-group-prepend">
                                <div class="input-group-text input-icon">
                                   <i class="fa fa-user-o"></i>
                                </div>
                              </div>
                              <input type="text" name="first_name" v-model="list.first_name" class="form-control" placeholder="First/given name(s)">
                              <div class="reg-error-msg" v-if="errors.first_name" v-for="error in errors.first_name">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="input-group mr-sm-2" style="margin-bottom: 20px;">
                              <input type="text" name="last_name" v-model="list.last_name" class="form-control" placeholder="Enter Your Last Name">
                              <div class="reg-error-msg" v-if="errors.last_name" v-for="error in errors.last_name">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="row">
                          
                          <div class="col-sm-12">
                            <div class="input-group mr-sm-2" style="margin-bottom: 20px;">
                              <input type="text" name="designation" v-model="list.designation" class="form-control" placeholder="Designation">
                              <div class="reg-error-msg" v-if="errors.designation" v-for="error in errors.designation">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                        </div>



                        <div class="row">
                          <div class="col-sm-6">
                            <div class="input-group mr-sm-2" style="margin-bottom: 20px;">
                              <div class="input-group-prepend">
                                <div class="input-group-text input-icon">
                                   <i class="fa fa-envelope-o"></i>
                                </div>
                              </div>
                              <input type="email" name="email" v-model="list.email" class="form-control" placeholder="Enter Valid Email Address">
                              <div class="reg-error-msg" v-if="errors.email" v-for="error in errors.email">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 pb-3">
                            <div class="input-group mr-sm-2" style="margin-bottom: 10px;">
                              <div class="input-group-prepend">
                                <div class="input-group-text input-icon">
                                   <i class="fa fa-phone"></i>
                                </div>
                              </div>
                              <input type="number" name="phone" v-model="list.phone" class="form-control" placeholder="Mobile Number">
                              <div class="reg-error-msg" v-if="errors.phone" v-for="error in errors.phone">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-sm-6 pb-3">
                            <div class="input-group mr-sm-2" style="margin-bottom: 10px;">
                              <div class="input-group-prepend">
                                <div class="input-group-text input-icon">
                                   <i class="fa fa-key"></i>
                                </div>
                              </div>
                              <input type="password" name="password" v-model="list.password" class="form-control" placeholder="Password">
                              <div class="reg-error-msg" v-if="errors.password" v-for="error in errors.password">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 pb-3">
                            <div class="input-group mr-sm-2" style="margin-bottom: 10px;">
                              <input type="password" name="password_confirmation" v-model="list.password_confirmation" class="form-control" placeholder="Confirm Password">
                              <div class="reg-error-msg" v-if="errors.password_confirmation" v-for="error in errors.password_confirmation">
                                <span v-text="error"></span>
                              </div>                  
                            </div>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="input-group mr-sm-2" style="margin-bottom: 20px;">
                              <div class="input-group-prepend">
                                <div class="input-group-text input-icon">
                                   <i class="fa fa-comment"></i>
                                </div>
                              </div>
                              <input type="text" name="comment" v-model="list.comment" class="form-control" placeholder="Comment">
                              <div class="reg-error-msg" v-if="errors.comment" v-for="error in errors.comment">
                                <span v-text="error"></span>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div style="display: none;" class="row">

                          <div class="col-sm-6 pb-3" style="height: 26px;">
                            <label class="custom-radio" style="display: inline-block;"> Male
                              <input type="radio" name="gender" checked="" v-model="list.gender" value="male">
                              <span class="checkmark" style="margin-left: 8px;"></span>
                            </label>
                            <label class="custom-radio" style="display: inline-block;"> Female
                              <input type="radio" name="gender" v-model="list.gender" value="female">
                              <span class="checkmark" style="margin-left: 8px;"></span>
                            </label>
                            <div class="reg-error-msg" v-if="errors.gender" v-for="error in errors.gender">
                              <span v-text="error"></span>
                            </div>
                          </div>
                        </div>

                        <div style="display: none;" class="row">

                          <input type="hidden" name="prefer" value="none">  
                        
                        </div>

                        <div class="form-check mb-2 mr-sm-2">
                         <label>
                           <input type="checkbox" name="terms" v-model="list.terms" value="1">
                           <span> I agree to the <a href="<?php echo e(url('terms-and-condition')); ?>" style="color: #c52228 !important;">Terms And Conditions</a> </span>
                         </label>
                          <div class="reg-error-msg" style="bottom:-3px;" v-if="errors.terms" v-for="error in errors.terms">
                            <span v-text="error"></span>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary mb-2 w100p submit-btn">Register</button>
                      </form>
                      <p class="login-as-student">Login</p>
                    </div>
                    
                    <div id="autocomplete_result_model" class="autocomplete-result o-ruled-list"></div>
                 </div>
              </div>
           </div>
        </div>
      <?php endif; ?>
   </div>
</nav>




<style type="text/css">
  
  #navbarNav ul li a {
    font-size: 14px !important;
}

</style>


<nav class="bg-primary" style="margin-bottom:10px;">
    <div class="container navbar navbar-expand-lg navbar-light mobile-menu ">
        <button style="background: white; cursor: pointer;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Your navigation list items go here -->
                <li class="nav-item">
                    <a class="nav-link" style="margin-right: 7px;" href="<?php echo e(url('/')); ?>">
                        <i class="fa fa-home"></i> <span class="u-xs-small95">Home</span>
                    </a>
                </li>
               </li>

      <?php $__currentLoopData = primaryMenu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


       <?php if($menu->url == 'complaint') continue; ?>
         <?php if($menu->url == 'discount-offer') continue; ?>

         <?php if($menu->title !== ' Free Consulation'): ?>
      
      <li class="nav-item">
                <a class="nav-link " style="margin-right: 7px;" href="<?php echo e(url(($menu['url'])??'#.')); ?>">
      <i class="<?php echo e(($menu['icon'])??''); ?>"></i> <span class="u-xs-small95"><?php echo e(($menu['title'])??''); ?></span>
      </a>
               </li>
           <?php else: ?>
               
               <li class="nav-item">
                 <a class="nav-link" style="margin-right: 7px;" onclick="consulation()">
                   <span class="u-xs-small95">Free Consultation</span>
               </a>
               </li>
               
               <li class="nav-item">
                <a class="nav-link" href="filter_report" style="margin-right: 7px;">
                   <span class="u-xs-small95">Track Application</span>
               </a>
               </li>
               <li class="nav-item">
                <a class="nav-link" href="discount-offer" style="margin-right: 7px;">
                   <span class="u-xs-small95">100% Discount Offer</span>
               </a>
               </li>
               

               
           <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      

   


      </ul>
        </div>
    </div>
</nav>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
      $(document).ready(function () {
        // Check if the user is on the home page
        if (window.location.pathname === '/') {
            // Remove the sticky class for mobile screens
            if ($(window).width() <= 770) {
                $('.stickyposition_mobile').removeClass('stickyposition_mobile');
                $('.bg-light').removeClass('bg-light');
            }
            else{
              $('.bg-light').addClass('bg-light');

            }
        }
   $('.navbar-nav .nav-item').on('click', function () {
       
        $('.mobile-menu .navbar-collapse').collapse('hide');
    });


    });
</script>


