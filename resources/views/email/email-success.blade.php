@extends('layouts.app')

@section('content')
@if(session('message'))
<div
      class="toast toast-success fade fade middle-top-toast"
      role="alert"
      aria-live="assertive"
      aria-atomic="true"
      data-bs-autohide="true"
      data-bs-delay="5000"
    >
      <div class="toast-header toast-succes-header">
        <strong class="me-auto">{{ session('message') }}</strong>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="toast"
          aria-label="Close"
        ></button>
      </div>
</div>
@endif


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
                  {{ $email }}
                </span>
                Mohon check kotak masuk, sosial, promosi ataupun kotak
                spam
              </p>
              <p class="subtitle-2">Belum menerima email?</p>
                <form id="formResend" class="mb-3" action="{{ route('resend') }}" method="POST">
                    @csrf
                    <input type="hidden" id="email" name="email" value="{{ $email }}" placeholder="Masukan email" autofocus />
                    <a class="mb-2 font-semibold" id="resendLink" class="button" href="#">Kirim Lagi</a>
                </form>
            </div>
          </div>
        </div>
      </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toastEl = document.querySelector('.toast');
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
         });

        const form = document.getElementById('formResend');
        const resendLink = document.getElementById('resendLink');

        resendLink.addEventListener('click', function(event) {
            event.preventDefault();
            form.submit();
        });
    </script>
@endpush
