@extends('layouts.app')

@section('content')
<div
        class="authentication-wrapper authentication-basic h-custom"
      >
        <!-- Register -->
        <div class="card card-login">
          <div class="card-body md:my-4 md:mx-4">
            <!-- Logo -->
            <div class="app-brand justify-content-left mb-3">
              <a href="index.html" class="app-brand-link">
                <span class="app-brand-logo demo">
                  <img
                    src="{{ asset('/dashboard/assets/img/elements/logo-default.png') }}"
                    alt=""
                  />
                </span>
              </a>
            </div>
            <!-- /Logo -->

            <h2 class="mb-2 font-semibold">Reset Password</h2>

            <p class="mb-4 subtitle-1">
              Verifikasi email berhasil, silahkan menginput password
              baru
            </p>
            <form
              id="formAuthentication"
              class="mb-3"
              action="{{ route('reset.send') }}"
              method="POST"
            >
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" id="email"  name="email" value="{{ $email }}" />
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password"
                  >Password Baru<span>*</span></label
                >

                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control error"
                    name="password"
                    placeholder="Masukan password baru"
                    aria-describedby="password"
                  />
                  <span
                    id="togglePassword"
                    class="input-group-text cursor-pointer"
                  >
                    <i class="ri-eye-line"></i>
                  </span>
                    @if($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="mb-4 form-password-toggle">
                <label class="form-label" for="password_confirmation"
                  >Konfirmasi Password Baru <span>*</span></label
                >

                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password_confirmation"
                    class="form-control error"
                    name="password_confirmation"
                    placeholder="Masukan konfirmasi password baru"
                    aria-describedby="password"
                  />
                  <span
                    id="togglePasswordConfirmation"
                    class="input-group-text cursor-pointer"
                    ><i class="ri-eye-line"></i
                  ></span>
                    @if($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="mb-3">
                <button
                  class="btn btn-primary d-grid w-100"
                  type="submit"
                >
                  Reset Password
                </button>
              </div>
            </form>
          </div>
        </div>
        <!-- /Register -->
      </div>
@endsection
@push('scripts')
    <script>
        // Password view toggle
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

      // Password view toggle
      const togglePasswordConfirmation = () => {
        const passwordInputConfirmation = document.getElementById(
          'passwordConfirmation'
        );
        const toggleButtonConfirmation = document.getElementById(
          'togglePasswordConfirmation'
        );

        if (passwordInputConfirmation.type === 'password') {
          passwordInputConfirmation.type = 'text';
          toggleButtonConfirmation.innerHTML =
            '<i class="ri-eye-off-line"></i>';
        } else {
          passwordInputConfirmation.type = 'password';
          toggleButtonConfirmation.innerHTML =
            '<i class="ri-eye-line"></i>';
        }
      };

      const toggleButtonConfirmation = document.getElementById(
        'togglePasswordConfirmation'
      );
      toggleButtonConfirmation.addEventListener(
        'click',
        togglePasswordConfirmation
      );
    </script>
@endpush
