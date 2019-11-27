<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="title-section">
              <h1>Login</h1>
          </div>
          <form method="POST" action="{{ route('login') }}" id="login-form">
            @csrf
            <p>Welcome! Login to your account.</p>
            <label for="email">{{ __('Username or Email Address*') }}</label>
            <input id="email" type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="password">{{ __('Password*') }}</label>
            <input id="password" name="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
            <div class="pl-4">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label  for="remember">
                {{ __('Remember Me') }}
            </label>
            </div>
            <button type="submit" id="submit-register">
                <i class="fa fa-paper-plane"></i> {{ __('Login') }}
            </button>
                
          </form>
          @if (Route::has('password.request'))
          <p><a href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
          </a>
          </p>
          @endif
          <p>Don't have account? <a href="{{ route('register') }}">{{ __('Register Here') }}</a></p>
        </div>
      </div>
    </div>
  </div>
  <!-- End Login Modal -->
