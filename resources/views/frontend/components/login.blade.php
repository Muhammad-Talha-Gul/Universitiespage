<section class="mb50 {{($meta['class'])??''}}">
  <div class="container">
    <div class="grid-wrapper">

        <div class="login-right">
          <h3> {{($meta['title'])??''}}</h3>
            <form class="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="position:relative;">
                  <input type="email" placeholder="Username or Email" class="form__input" name="email" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                      <span class="help-block" style="bottom: -32px;left: 1px;">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
               </div>
               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="position:relative;">
                  <input type="password" name="password" placeholder="********" class="form__input" required="">
                  @if ($errors->has('password'))
                      <span class="help-block" style="bottom: -32px;left: 1px;">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
               </div>
               <div class="form-group" style="text-align: right;">
                <button type="submit" class="sb-btn smbtn">Login</button>
               </div>
            </form>
        </div>
    </div>
  </div>

</section>