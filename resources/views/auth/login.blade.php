@extends('layouts.app')

@section('content')
<div class="authentication-wrapper authentication-basic h-custom">
        <!-- Register -->
        <div class="card card-login">
          <div class="card-body md:my-4 md:mx-4">
            <!-- Logo -->
            <div class="app-brand justify-content-left mb-3">
              <a href="index.html" class="app-brand-link">
                <span class="app-brand-logo demo">
                  <img
                    src="/dashboard/assets/img/elements/logo-default.png"
                    alt=""
                  />
                </span>
              </a>
            </div>
            <!-- /Logo -->
            <h2 class="mb-2 font-semibold">Masuk</h2>
            <p class="mb-4 subtitle-1">
              Silahkan masukkan akun kamu disini
            </p>

            <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('auth.login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}<span>*</span></label>
                <input id="email" type="email" class="form-control @error('error-email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @if(session('error-email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ (session('error-email')) }}</strong>
                    </span>
                @elseif($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
              <div class="mb-3 form-password-toggle">
                <label for="password" class="form-label">{{ __('Password') }}<span>*</span></label>
                <div class="input-group input-group-merge">
                  <input id="password" type="password" class="form-control @error('error-password') is-invalid @enderror" name="password" aria-describedby="password" required autocomplete="current-password">
                  <span id="togglePassword" class="input-group-text cursor-pointer">
                    <i class="ri-eye-line"></i>
                  </span>
                    @if(session('error-password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ (session('error-password')) }}</strong>
                        </span>
                    @elseif($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
              <div class="mb-3">
                <div class="d-flex justify-content-between">
                  <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember-me">
                      Simpan Password
                    </label>
                  </div>
                  <a href="{{ route('forgot.view') }}">
                    <small>Lupa Password?</small>
                  </a>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">
                  Masuk
                </button>
              </div>
                <!-- error message -->
                @if(session('error'))
                    <span class="invalid-feedback" role="alert">
                    </span>
                    @include('partials._login-failed',['message' => (session('error'))])
                @endif
            </form>
          </div>
        </div>
        <!-- /Register -->
</div>
@endsection
@push('scripts')
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script>

        $(document).ready(function() {
            setTimeout(function() {
                $('.modal-backdrop').hide();
                $('#modalCenter').hide();
                $('#modalCenterSuccess').hide();
            }, 3000);
        });

        const togglePassword = () => {
        const passwordInput = document.getElementById('password');
        const toggleButton =
            document.getElementById('togglePassword');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.innerHTML = '<i class="ri-eye-off-line"></i>';
        } else {
            passwordInput.type = 'password';
            toggleButton.innerHTML = '<i class="ri-eye-line"></i>';
        }
        };

        const toggleButton = document.getElementById('togglePassword');
        toggleButton.addEventListener('click', togglePassword);
    </script>
@endpush
