@if(isset($meta['type']))

@if($meta['type'] == 'student')
  <section class="mb50">
    <div class="container">
      <div class="grid-wrapper">
        <div class="login-right" style="width: 80%; margin-top: 50px;">
          <h3>{{($meta['title'])??''}}</h3>
          <form action="{{route('student.store')}}" method="POST" class="form " autocomplete="off">
            {{csrf_field()}}
            <input type="hidden" value="student" name="user_type">
            <div class="row">
              <div class="col-6">
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                  <label class="form__label">First/given name(s)<span class="label__required">*</span>
                  </label>
                  <input type="text" name="first_name" placeholder="" value="{{old('first_name')}}" class="form__input" required="">
                  @if($errors->has('first_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('first_name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              <div class="col-6">
                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                  <label class="form__label">Surname/last name/family name<span class="label__required">*</span>
                  </label>
                  <input type="text" name="last_name" placeholder="" value="{{old('last_name')}}" class="form__input" required="">
                  @if($errors->has('last_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('last_name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              <div class="col-6">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="form__label">Email Address<span class="label__required">*</span></label>
                  <input type="email" name="email" placeholder="" value="{{old('email')}}" class="form__input" required="">
                  @if($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              <div class="col-6">
                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                  <label class="form__label">Nationality <span class="label__required">*</span>
                  </label>
                  <select name="country" class="form__input" required="">
                    <option selected="" disabled="">--Please select--</option>
                    @foreach(allCountry() as $prefer)
                      <option value="{{$prefer->country}}" @if(old('country') == $prefer->country) selected="" @endif>{{$prefer->country}}</option>
                    @endforeach
                  </select>
                  @if($errors->has('country'))
                      <span class="help-block">
                          <strong>{{ $errors->first('country') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="col-6">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label class="form__label">Password<span class="label__required">*</span></label>
                  <input type="password" name="password" placeholder="" class="form__input" required="">
                  @if($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              
              <div class="col-6">
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                  <label class="form__label">Confrim Password<span class="label__required">*</span></label>
                  <input type="password" name="password_confirmation" placeholder="" class="form__input" required="">
                  @if($errors->has('password_confirmation'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              <div class="col-6">
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                  <label class="form__label">Cell phone<span class="label__required">*</span>
                  </label>
                  <input type="text" name="phone" placeholder="" value="{{old('phone')}}" class="form__input" required="">
                  @if($errors->has('phone'))
                      <span class="help-block">
                          <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              <div class="col-6">
                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} mbr" style="text-align: left;">
                  <div style="text-align: left;display: inline-block;">
                    <input id="Schoolmale" type="radio" name="gender" @if(old('gender') == 'Male') selected="" @endif value="Male" checked="checked"><label for="Schoolmale">Male</label>
                  </div>
                  <div style="text-align: left;display: inline-block;">
                    <input id="Schoolfemale" type="radio" name="gender" @if(old('gender') == 'Female') selected="" @endif value="Female"><label for="Schoolfemale">Female</label>
                  </div>
                  @if($errors->has('gender'))
                      <span class="help-block">
                          <strong>{{ $errors->first('gender') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              
              
              <div class="col-12">
                <div class="form-group{{ $errors->has('prefer') ? ' has-error' : '' }}">
                  <label class="form__label">What type of program would you prefer? <span class="label__required">*</span>
                  </label>
                  <select name="prefer" class="form__input" required="">
                    <option selected="" disabled="">--Please select--</option>
                    @foreach(qualification() as $prefer)
                      <option value="{{$prefer->id}}" @if(old('prefer') == $prefer->id) selected="" @endif>{{$prefer->title}}</option>
                    @endforeach
                  </select>
                  @if($errors->has('prefer'))
                      <span class="help-block">
                          <strong>{{ $errors->first('prefer') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              <button type="submit" class="button form__button" style="margin-left: 17px;"> Submit </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@elseif($meta['type'] == 'institute')
  
  <section class="mb50">
    <div class="container" id="register-university">
      <div class="grid-wrapper">
        <div class="login-right" style="width: 80%; margin-top: 50px;">
          @if($meta['type'] == 'institute')
            <h3>{{($meta['title'])??''}}</h3>
            <br>
            <br>
            <h5 align="left" style="padding-left: 6px">Important Instructions</h5>
            <ul style="text-align: left;font-size: 13px;color: #484848;padding-left: 22px;">
              <li style="font-family:Trade Gothic, Oswald Medium, Oswald, Arial, sans-serif!important;list-style: circle;">Must be filled by the person Responsible for overall International Student Recruitments for the Institution</li>
              <li style="font-family:Trade Gothic, Oswald Medium, Oswald, Arial, sans-serif!important;list-style: circle;">Must use official Institution Email ID</li>
              <li style="font-family:Trade Gothic, Oswald Medium, Oswald, Arial, sans-serif!important;list-style: circle;">Must provide Direct Fixed Line Number at the Institution for Telephonic Verification</li>
            </ul>
          @endif
          <form class="form" novalidate="" autocomplete="off">
            
            <input type="hidden" value="university" name="user_type">
            <div class="row">
              <div class="col-6">
                <div :class="(error_list.university_name)?'form-group has-error':'form-group'">
                  <label class="form__label">Institute Name<span class="label__required">*</span>
                  </label>
                  <input type="text" name="university_name" placeholder="" v-model="university_list.university_name" class="form__input" required="">
                  <span class="help-block" v-if="error_list.university_name" v-for="error in error_list.university_name"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.founded_in)?'form-group has-error':'form-group'">
                  <label class="form__label">Year of Establishment<span class="label__required">*</span>
                  </label>
                  <input type="text" name="founded_in" placeholder="" class="form__input change_founded_in datepicker-autoclose-year" data-language='en' data-date-format="yyyy" data-view="years" data-min-view="years" required="" readonly="">
                  <span class="help-block" v-if="error_list.founded_in" v-for="error in error_list.founded_in"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.country)?'form-group has-error':'form-group'">
                  <label class="form__label">Country <span class="label__required">*</span>
                  </label>
                  <select name="country" class="form__input select_country" required="">
                    <option selected="" disabled="">--Please select--</option>
                    @foreach(country() as $prefer)
                      <option value="{{$prefer->country}}">{{$prefer->country}}</option>
                    @endforeach
                  </select>
                  <span class="help-block" v-if="error_list.country" v-for="error in error_list.country"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.city)?'form-group has-error':'form-group'">
                  <label class="form__label">City<span class="label__required">*</span>
                  </label>
                  <input type="text" name="city" placeholder="" v-model="university_list.city" class="form__input" required="">
                  <span class="help-block" v-if="error_list.city" v-for="error in error_list.city"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.address)?'form-group has-error':'form-group'">
                  <label class="form__label">Address<span class="label__required">*</span>
                  </label>
                  <input type="text" name="address" placeholder="" v-model="university_list.address" class="form__input" required="">
                  <span class="help-block" v-if="error_list.address" v-for="error in error_list.address"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.postcode)?'form-group has-error':'form-group'">
                  <label class="form__label">Post Code<span class="label__required">*</span>
                  </label>
                  <input type="text" name="postcode" placeholder="" v-model="university_list.postcode" class="form__input" required="">
                  <span class="help-block" v-if="error_list.postcode" v-for="error in error_list.postcode"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.first_name)?'form-group has-error':'form-group'">
                  <label class="form__label">First/given name(s)<span class="label__required">*</span>
                  </label>
                  <input type="text" name="first_name" placeholder="" v-model="university_list.first_name" class="form__input" required="">
                  <span class="help-block" v-if="error_list.first_name" v-for="error in error_list.first_name"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.designation)?'form-group has-error':'form-group'">
                  <label class="form__label">Your Designation in the Institution <span class="label__required">*</span>
                  </label>
                  <input type="text" name="designation" placeholder="" v-model="university_list.designation" class="form__input" required="">
                  <span class="help-block" v-if="error_list.designation" v-for="error in error_list.designation"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.email)?'form-group has-error':'form-group'">
                  <label class="form__label">Your Official Email Address/ (User ID)<span class="label__required">*</span></label>
                  <input type="email" name="email" placeholder="" v-model="university_list.email" value="{{old('email')}}" class="form__input" required="">
                  <span class="help-block" v-if="error_list.email" v-for="error in error_list.email"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.alternate_email)?'form-group has-error':'form-group'">
                  <label class="form__label">Alternate Email Address<span class="label__required">*</span></label>
                  <input type="email" name="alternate_email" placeholder="" v-model="university_list.alternate_email" class="form__input" required="">
                  <span class="help-block" v-if="error_list.alternate_email" v-for="error in error_list.alternate_email"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.password)?'form-group has-error':'form-group'">
                  <label class="form__label">Password<span class="label__required">*</span></label>
                  <input type="password" name="password" placeholder="" v-model="university_list.password" class="form__input" required="">
                  <span class="help-block" v-if="error_list.password" v-for="error in error_list.password"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.password_confirmation)?'form-group has-error':'form-group'">
                  <label class="form__label">Confrim Password<span class="label__required">*</span></label>
                  <input type="password" name="password_confirmation" v-model="university_list.password_confirmation" placeholder="" class="form__input" required="">
                  <span class="help-block" v-if="error_list.password_confirmation" v-for="error in error_list.password_confirmation"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.phone)?'form-group has-error':'form-group'">
                  <label class="form__label">Cell phone Number<span class="label__required">*</span>
                  </label>
                  <input type="text" name="phone" placeholder="" v-model="university_list.phone" class="form__input" required="">
                  <span class="help-block" v-if="error_list.phone" v-for="error in error_list.phone"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.agency_number)?'form-group has-error':'form-group'">
                  <label class="form__label">Agency Number<span class="label__required">*</span>
                  </label>
                  <input type="text" name="agency_number" placeholder="" v-model="university_list.agency_number" class="form__input" required="">
                  <span class="help-block" v-if="error_list.agency_number" v-for="error in error_list.agency_number"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.website)?'form-group has-error':'form-group'">
                  <label class="form__label">Institution Website
                  </label>
                  <input type="text" name="website" placeholder="" v-model="university_list.website" class="form__input">
                  <span class="help-block" v-if="error_list.website" v-for="error in error_list.website"></strong v-text="error"></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.accommodation)?'form-group has-error':'form-group'">
                  <label class="form__label">Accommodation
                  </label>
                  <select name="accommodation" class="form__input select_accommodation">
                    <option selected="" disabled="">--Please select--</option>
                    <option value="On Campus" >On Campus</option>
                    <option value="Off Campus">Off Campus</option>
                  </select>
                  <span class="help-block" v-if="error_list.accommodation" v-for="error in error_list.accommodation"><strong v-text="error"></strong></span>
                </div>
              </div>


              <button type="submit" class="button form__button submit-university" style="margin-left: 17px;"> Submit </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  @push('scripts')
    <script>

      var register = new Vue({
          el: '#register-university',
          data: {
              baseUrl: '{{url("/")}}',
              university_list: {
                _token: '{{csrf_token()}}',
                user_type:'university',
                university_name:'',
                founded_in:'',
                country:'',
                city:'',
                address:'',
                postcode:'',
                first_name:'',
                designation:'',
                email:'',
                alternate_email:'',
                password:'',
                password_confirmation:'',
                phone:'',
                agency_number:'',
                website:'',
                accommodation:'',
              },
              error_list:{},
          },
          created(){
          },
          methods: {
              submitForm(){
                  var _this = this;
                  axios.post('{{route("university-register")}}', _this.university_list)
                  .then(response => {
                      window.location.href = '{{"dashboard"}}';
                  }).catch(error=>{
                      console.log(error.response.data.errors);
                      _this.error_list = error.response.data.errors;
                  });
              },
          },
          mounted(){
            var _this = this;
            $(document).on('click', '.submit-university',function(e) {
              e.preventDefault();
              _this.submitForm();
            });
            $(document).on('change', '.select_country', function(){
              var val = $(this).val();
              _this.university_list.country = val;
            });
            $(document).on('change', '.select_accommodation', function(){
              var val = $(this).val();
              _this.university_list.accommodation = val;
            });
            $(document).on('focusout', '.change_founded_in', function(){
              var val = $(this).val();
              console.log(val);
              _this.university_list.founded_in = val;
            });
          },

      });
      
    </script>
  @endpush
@elseif($meta['type'] == 'consultant')
  
  <section class="mb50">
    <div class="container" id="register-university">
      <div class="grid-wrapper">
        <div class="login-right" style="width: 80%; margin-top: 50px;">
          <h3>{{($meta['title'])??''}}</h3>
          <br>
          <form class="form" novalidate="" autocomplete="off">
            
            <input type="hidden" value="consultant" name="user_type">
            <div class="row">
              <div class="col-full">
                <h5 style="text-align: left;padding-left: 17px;color: #00829b;padding-bottom: 7px;margin-bottom: 12px;border-bottom: 1px solid #1799d045;">Agent Registration</h5>
              </div>
              <div class="col-6">
                <div :class="(error_list.organization_name)?'form-group has-error':'form-group'">
                  <label class="form__label">Organization Name<span class="label__required">*</span>
                  </label>
                  <input type="text" name="organization_name" placeholder="" v-model="consultant_list.organization_name" class="form__input" required="">
                  <span class="help-block" v-if="error_list.organization_name" v-for="error in error_list.organization_name"><strong v-text="error"></strong></span>
                </div>
              </div>
              
              <div class="col-6">
                <div :class="(error_list.phone)?'form-group has-error':'form-group'">
                  <label class="form__label">phone Number<span class="label__required">*</span>
                  </label>
                  <input type="text" name="phone" placeholder="" v-model="consultant_list.phone" class="form__input" required="">
                  <span class="help-block" v-if="error_list.phone" v-for="error in error_list.phone"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.country)?'form-group has-error':'form-group'">
                  <label class="form__label">Country <span class="label__required">*</span>
                  </label>
                  <select name="country" class="form__input select_country" required="">
                    <option selected="" disabled="">--Please select--</option>
                    @foreach(allCountry() as $prefer)
                      <option value="{{$prefer->country}}">{{$prefer->country}}</option>
                    @endforeach
                  </select>
                  <span class="help-block" v-if="error_list.country" v-for="error in error_list.country"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.city)?'form-group has-error':'form-group'">
                  <label class="form__label">City<span class="label__required">*</span>
                  </label>
                  <input type="text" name="city" placeholder="" v-model="consultant_list.city" class="form__input" required="">
                  <span class="help-block" v-if="error_list.city" v-for="error in error_list.city"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.address)?'form-group has-error':'form-group'">
                  <label class="form__label">Address<span class="label__required">*</span>
                  </label>
                  <input type="text" name="address" placeholder="" v-model="consultant_list.address" class="form__input" required="">
                  <span class="help-block" v-if="error_list.address" v-for="error in error_list.address"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.postcode)?'form-group has-error':'form-group'">
                  <label class="form__label">Post Code<span class="label__required">*</span>
                  </label>
                  <input type="text" name="postcode" placeholder="" v-model="consultant_list.postcode" class="form__input" required="">
                  <span class="help-block" v-if="error_list.postcode" v-for="error in error_list.postcode"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-full">
                <h5 style="text-align: left;padding-left: 17px;color: #00829b;padding-bottom: 7px;margin-bottom: 12px;border-bottom: 1px solid #1799d045;">Owner Information</h5>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label class="form__label">Owner's Official Email Address</label>
                  <input type="email" placeholder="" v-model="consultant_list.owner.email" value="{{old('email')}}" class="form__input" required="">
                </div>
              </div>
              
              <div class="col-6">
                <div class="form-group">
                  <label class="form__label">Owner's Name</label>
                  <input type="text" placeholder="" v-model="consultant_list.owner.name" class="form__input" required="">
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label class="form__label">Owner's Phone Number</label>
                  <input type="text" placeholder="" v-model="consultant_list.owner.phone" class="form__input" required="">
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label class="form__label">Owner's Alternate Phone Number</label>
                  <input type="text" placeholder="" v-model="consultant_list.owner.alternate_phone" class="form__input" required="">
                </div>
              </div>

              <div class="col-full">
                <h5 style="text-align: left;padding-left: 17px;color: #00829b;padding-bottom: 7px;margin-bottom: 12px;border-bottom: 1px solid #1799d045;">Login Information</h5>
              </div>

              <div class="col-6">
                <div :class="(error_list.email)?'form-group has-error':'form-group'">
                  <label class="form__label">Your Official Email Address/ (User ID)<span class="label__required">*</span></label>
                  <input type="email" name="email" placeholder="" v-model="consultant_list.email" value="{{old('email')}}" class="form__input" required="">
                  <span class="help-block" v-if="error_list.email" v-for="error in error_list.email"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.first_name)?'form-group has-error':'form-group'">
                  <label class="form__label">First/given name(s)<span class="label__required">*</span>
                  </label>
                  <input type="text" name="first_name" placeholder="" v-model="consultant_list.first_name" class="form__input" required="">
                  <span class="help-block" v-if="error_list.first_name" v-for="error in error_list.first_name"><strong v-text="error"></strong></span>
                </div>
              </div>


              <div class="col-6">
                <div :class="(error_list.password)?'form-group has-error':'form-group'">
                  <label class="form__label">Password<span class="label__required">*</span></label>
                  <input type="password" name="password" placeholder="" v-model="consultant_list.password" class="form__input" required="">
                  <span class="help-block" v-if="error_list.password" v-for="error in error_list.password"><strong v-text="error"></strong></span>
                </div>
              </div>

              <div class="col-6">
                <div :class="(error_list.password_confirmation)?'form-group has-error':'form-group'">
                  <label class="form__label">Confrim Password<span class="label__required">*</span></label>
                  <input type="password" name="password_confirmation" v-model="consultant_list.password_confirmation" placeholder="" class="form__input" required="">
                  <span class="help-block" v-if="error_list.password_confirmation" v-for="error in error_list.password_confirmation"><strong v-text="error"></strong></span>
                </div>
              </div>
              
              <div class="col-full">
                <h5 style="text-align: left;padding-left: 17px;color: #00829b;padding-bottom: 7px;margin-bottom: 12px;border-bottom: 1px solid #1799d045;">Services Offered to <b>Students</b></h5>
              </div>
              
              @foreach(services() as $serv)
              <div class="col-6">
                  <label class="checkbox__label finder__dropdown__link" @click="service($event)" style="color: white;">
                     <input type="checkbox" class="checkbox__option check-services" name="services[]" value="{{$serv}}">
                     <span></span>
                     <span style="color:#00829b;text-transform:capitalize;">{{str_replace('_', ' ', $serv)}}</span>
                  </label>
              </div>
              @endforeach

              <div class="col-full" style="margin-top: 30px;">
                <div class="form-group">
                  <label class="form__label">What language assistance do you provide to students?</label>
                  <textarea name="language_assistance" style="min-height:100px;" v-model="consultant_list.language_assistance" class="form__input"></textarea>
                </div>
              </div>
              



              <button type="submit" @click="submitConsultantForm()" class="button form__button submit-consultant" style="margin-left: 17px;"> Submit </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  @push('scripts')
    <script>

      var consultant = new Vue({
          el: '#register-university',
          data: {
              baseUrl: '{{url("/")}}',
              consultant_list: {
                _token: '{{csrf_token()}}',
                user_type:'consultant',
                organization_name:'',
                postcode:'',
                first_name:'',
                email:'',
                country:'',
                city:'',
                address:'',
                password:'',
                password_confirmation:'',
                phone:'',
                services:[],
                language_assistance:'',
                owner:{
                  name:'',
                  email:'',
                  phone:'',
                  alternate_phone:'',
                },
              },
              error_list:{},
          },
          created(){
          },
          methods: {
              submitConsultantForm(){
                  var _this = this;
                  $('.submit-consultant').attr('disabled', true);
                  $('.submit-consultant').text('Submitting ...');
                  axios.post('{{url("/admin/consultant/store")}}', _this.consultant_list)
                  .then(response => {
                      window.location.href = '{{url("dashboard")}}';
                      console.log('ok')
                  }).catch(error=>{
                      console.log(error.response.data.errors)
                      _this.error_list = error.response.data.errors;
                      $('.submit-consultant').attr('disabled', false);
                      $('.submit-consultant').text('Submit');
                  });
              },
              service(event){
                var _this = this;
                $(document).ready(function(){
                  var input = $(event.target).parent().find('input');
                  var val = input.val();
                  if(!input.is(':checked')){
                      _this.consultant_list.services.push(val);
                  }else{
                      _this.consultant_list.services.splice(_this.consultant_list.services.indexOf(val), 1);
                  }
                  console.log(_this.consultant_list.services);
                });
              },
          },
          mounted(){
            var _this = this;
            $(document).on('click', '.submit-university',function(e) {
              e.preventDefault();
              _this.submitForm();
            });
            $(document).on('change', '.select_country', function(){
              var val = $(this).val();
              _this.consultant_list.country = val;
            });
          },

      });
      
    </script>
  @endpush
@endif
@endif