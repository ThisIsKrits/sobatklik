@extends('layouts.app')

@section('content')
<div class="email-verify-wrapper authentication-basic">
        <!-- Register -->
        <div class="card card-login">
          <div class="card-body my-4 mx-5">
            <!-- Logo -->
            <div
              class="app-brand flex-column justify-content-center my-3"
            >
              <a href="index.html" class="app-brand-link">
                <span class="app-brand-logo demo">
                  <img
                    src="{{ asset('/dashboard/assets/img/elements/logo-default.png') }}"
                    alt=""
                  />
                </span>
              </a>
              <!-- /Logo -->
              <img
                src="{{ asset('/dashboard/assets/img/elements/logo-default.png') }}"
                alt=""
              />
              <h3 class="mb-3 font-semibold">
                Email Kamu Kadaluarsa
              </h3>

              <p class="subtitle-2">
                Email akan berlaku dalam 1x24 jam sejak permintaan
              </p>

              <button
                class="btn btn-primary d-grid w-25"
                type="submit"
              >
                Hubungi Admin
              </button>
            </div>
          </div>
        </div>
</div>
@endsection
