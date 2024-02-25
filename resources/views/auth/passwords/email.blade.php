@extends('layouts.app')

@section('title', 'Forgot-password')

@section('content')
<div class="authentication-wrapper authentication-basic h-custom">
        <!-- Register -->
        <div class="card card-login">
          <div class="card-body md:my-4 md:mx-4">
            <!-- Logo -->
            <div class="app-brand justify-content-left mb-3">
              <a href="{{route('login.view')}}" class="app-brand-link">
                <span class="app-brand-logo demo">
                  <img
                    src="{{asset('/dashboard/assets/img/elements/logo-default.png')}}"
                    alt=""
                  />
                </span>
              </a>
            </div>
            <!-- /Logo -->
            <div class="d-flex justify-content-left align-items-center">
              <i class="ri-arrow-left-line h2 me-2"></i>
              <h2 class="mb-2 font-semibold">Lupa Password</h2>
            </div>
            <p class="mb-4 subtitle-1">
              Kami akan mengirimkan email untuk reset password
            </p>
            <form
              id="formAuthentication"
              class="mb-3"
              action="{{ route('forgot.post') }}"
              method="POST">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label">
                    Email <span>*</span>
                    </label>
                <input
                  type="text"
                  class="form-control  @error('email') is-invalid @enderror"
                  id="email"
                  name="email"
                  value="{{ old('email') }}"
                  placeholder="Masukan email"
                  autofocus
                />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
