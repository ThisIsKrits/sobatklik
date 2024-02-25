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
                src="{{ asset('/dashboard/assets/img/elements/email-verify.svg') }}"
                alt=""
              />
              <h3 class="mb-3 font-semibold">
                Email Berhasil Dikirim
              </h3>
              <p class="mb-4 subtitle-1 text-center">
                Kami telah mengirim email verifikasi ke email
                <span class="text-primary font-medium">
                  johndoe@example.com.
                </span>
                Mohon check kotak masuk, sosial, promosi ataupun kotak
                spam
              </p>
              <p class="subtitle-2">Belum menerima email?</p>
              <a class="mb-2 font-semibold" href="#">Kirim Lagi</a>
            </div>
          </div>
        </div>
      </div>
@endsection
