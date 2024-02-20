<?php $__env->startSection('content'); ?>
<div class="bg-light">
    <section class="login-section py-5 mb-3">
        <div class="container">
            <div class="login-section-main">
                <div class="formcol track-application-form-main auth-form-main">
                    <!-- consultant register start here -->
                    <div class="registration-form" id="registerValidateConsult">
                        <div div class="modal-heading-container">
                            <h2 class="user-modal-heading user-form-heading">Registration as Consultant</h2>
                        </div>
                        <form class="form-inline" method="POST" @submit="submitReg($event)">
                            <input type="hidden" value="sub-admin" name="user_type">
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text input-icon student-login-icon">
                                                <i class="fa fa-building"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="company_name" v-model="list.company_name" class="form-control" placeholder="Company name">
                                        <div class="reg-error-msg" v-if="errors.company_name" v-for="error in errors.company_name">
                                            <span v-text="error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text input-icon student-login-icon">
                                                <i class="fa fa-user-o"></i>
                                            </div>
                                        </div>
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
                                <div class="col-sm-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text input-icon student-login-icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                        </div>
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
                                <div class="col-sm-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text input-icon student-login-icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="state" v-model="list.state" class="form-control" placeholder="State">
                                        <div class="reg-error-msg" v-if="errors.state" v-for="error in errors.state">
                                            <span v-text="error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text input-icon student-login-icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="city" v-model="list.city" class="form-control" placeholder="city">
                                        <div class="reg-error-msg" v-if="errors.city" v-for="error in errors.city">
                                            <span v-text="error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text input-icon student-login-icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="address" v-model="list.address" class="form-control" placeholder="Address">
                                        <div class="reg-error-msg" v-if="errors.address" v-for="error in errors.address">
                                            <span v-text="error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text input-icon student-login-icon">
                                                <i class="fa fa-user-o"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="first_name" v-model="list.first_name" class="form-control" placeholder="First/given name(s)">
                                        <div class="reg-error-msg" v-if="errors.first_name" v-for="error in errors.first_name">
                                            <span v-text="error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text input-icon student-login-icon">
                                                <i class="fa fa-user-o"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="last_name" v-model="list.last_name" class="form-control" placeholder="Enter Your Last Name">
                                        <div class="reg-error-msg" v-if="errors.last_name" v-for="error in errors.last_name">
                                            <span v-text="error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text input-icon student-login-icon">
                                                <i class="fa fa-user-o"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="designation" v-model="list.designation" class="form-control" placeholder="Designation">
                                        <div class="reg-error-msg" v-if="errors.designation" v-for="error in errors.designation">
                                            <span v-text="error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text input-icon student-login-icon">
                                                <i class="fa fa-envelope-o"></i>
                                            </div>
                                        </div>
                                        <input type="email" name="email" v-model="list.email" class="form-control" placeholder="Enter Valid Email Address">
                                        <div class="reg-error-msg" v-if="errors.email" v-for="error in errors.email">
                                            <span v-text="error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text input-icon student-login-icon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                        </div>
                                        <input type="number" name="phone" v-model="list.phone" class="form-control" placeholder="Mobile Number">
                                        <div class="reg-error-msg" v-if="errors.phone" v-for="error in errors.phone">
                                            <span v-text="error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text input-icon student-login-icon">
                                                <i class="fa fa-key"></i>
                                            </div>
                                        </div>
                                        <input type="password" name="password" v-model="list.password" class="form-control" placeholder="Password">
                                        <div class="reg-error-msg" v-if="errors.password" v-for="error in errors.password">
                                            <span v-text="error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text input-icon student-login-icon">
                                                <i class="fa fa-key"></i>
                                            </div>
                                        </div>
                                        <input type="password" name="password_confirmation" v-model="list.password_confirmation" class="form-control" placeholder="Confirm Password">
                                        <div class="reg-error-msg" v-if="errors.password_confirmation" v-for="error in errors.password_confirmation">
                                            <span v-text="error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text input-icon student-login-icon">
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
                                <div class="col-sm-6 mb-3" style="height: 26px;">
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
                            <div class="form-check text-left mb-4">
                                <label class="login-remember-label mb-0">
                                    <input type="checkbox" name="terms" v-model="list.terms" value="1">
                                    <span> I agree to the <a class="term-condition-link" href="<?php echo e(url('terms-and-condition')); ?>">Terms And Conditions</a> </span>
                                </label>
                                <div class="reg-error-msg" style="bottom:-3px;" v-if="errors.terms" v-for="error in errors.terms">
                                    <span v-text="error"></span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mb-2 w100p submit-btn">Register</button>
                        </form>
                        <div class="bottom-link-main text-center mt-2">
                            <a href="<?php echo e(route('consultant-login')); ?>" class="form-bottom-link">Login As Consultant</a>
                        </div>
                    </div>
                    <!-- consultant register end here -->
                </div>
                </main>
            </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>