<section class="col-main col-sm-12 wow bounceInUp animated">
    @isset($slot)
    <div class="page-title">
      <h2>{{$slot}}</h2>
    </div>
    @endisset
    @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if($meta['form']=='contact')
    <div class="static-contain">
      <form method="POST" action="{{route("contactMail")}}">
        {{csrf_field()}}
      <fieldset class="group-select">
        <ul>
          <li>
            <fieldset>
              <ul>
                <li>
                  <div class="customer-name">
                    <div class="input-box name-firstname">
                      <label for="name"> Name<span class="required">*</span></label>
                      <br>
                      <input type="text" id="name" name="name" value="" title="First Name" class="input-text" required>
                    </div>
                    <div class="input-box name-lastname">
                      <label for="email"> Email Address <span class="required">*</span> </label>
                      <br>
                      <input type="email" id="email" name="email" value="" title="Email" class="input-text" required>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="input-box">
                    <label for="company">Company</label>
                    <br>
                    <input type="text" id="company" name="company" value="" title="Company" class="input-text">
                  </div>
                  <div class="input-box">
                    <label for="phone">Phone <span class="required">*</span></label>
                    <br>
                    <input type="text" name="phone" id="phone" value="" title="Phone" class="input-text validate-email" required>
                  </div>
                </li>
                <li class="">
                  <label for="subject">Subject<em class="required">*</em></label>
                  <br>
                  <div class="">
                    <input type="text" id="subject" class="input-text" name="subject" required>
                  </div>
                </li>
                <li class="">
                  <label for="msg">Message<em class="required">*</em></label>
                  <br>
                  <div class="">
                    <textarea name="contact_message" id="msg" title="Message" class="required-entry input-text" cols="5" rows="3" required></textarea>
                  </div>
                </li>
              </ul>
            </fieldset>
          </li>
          <li>
          <p class="require"><em class="required">* </em>Required Fields</p>
          <div class="buttons-set">
            <button type="submit" title="Submit" class="button submit"> <span> Submit </span> </button>
          </div>
          </li>
        </ul>
      </fieldset>
      </form>
    </div>
    @elseif($meta['form']=='helping')
    <div class="static-contain">
      <form action="{{route('helpingAction')}}" method="POST">
        {{csrf_field()}}
      <fieldset class="group-select">
        <ul>
          <li>
            <fieldset>
              <ul>
                <li>
                  <div class="customer-name">
                    <div class="input-box name-firstname">
                      <label for="name"> Name<span class="required">*</span></label>
                      <br>
                      <input type="text" id="name" name="name" value="" title="First Name" class="input-text" required>
                    </div>
                    <div class="input-box name-lastname">
                      <label for="email"> Email Address <span class="required">*</span> </label>
                      <br>
                      <input type="email" id="email" name="email" value="" title="Email" class="input-text" required>
                    </div>
                  </div>
                </li>
                <li class="">
                  <label for="comment">Detail<em class="required">*</em></label>
                  <br>
                  <div class="">
                    <textarea name="message" id="comment" title="Comment" class="required-entry input-text" cols="5" rows="3" required></textarea>
                  </div>
                </li>
              </ul>
            </fieldset>
          </li>
          <li>
          <p class="require"><em class="required">* </em>Required Fields</p>
          <div class="buttons-set">
            <button type="submit" title="Submit" class="button submit"> <span> Submit </span> </button>
          </div>
          </li>
        </ul>
      </fieldset>
      </form>
    </div>
    @endif
</section>
