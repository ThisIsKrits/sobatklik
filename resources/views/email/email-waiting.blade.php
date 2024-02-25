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
              <p class="subtitle-2">Silahkan coba lagi setelah</p>

              <h5 class="font-semibold" id="countdown">00:03:00</h5>
            </div>
          </div>
        </div>
</div>
@endsection

@push('scripts')
<script>
      // Countdown verify email

      const padZero = (number) => (number < 10 ? '0' : '') + number;

      let timeLeft = 3 * 60; // 3 menit

      const updateCountdown = () => {
        const hours = Math.floor(timeLeft / 3600);
        const minutes = Math.floor((timeLeft % 3600) / 60);
        const seconds = timeLeft % 60;

        const formattedTime = `${padZero(hours)}:${padZero(
          minutes
        )}:${padZero(seconds)}`;

        document.getElementById('countdown').textContent =
          formattedTime;

        timeLeft--;

        if (timeLeft < 0) {
          clearInterval(intervalId);
          document.getElementById('countdown').innerHTML =
            '<a class="mb-2 font-semibold" href="#">Kirim Lagi</a>';
        }
      };

      const intervalId = setInterval(updateCountdown, 1000);

      // Toast
      document.addEventListener('DOMContentLoaded', function () {
        const toastEl = document.querySelector('.toast');
        const toast = new bootstrap.Toast(toastEl);
        toast.show();
      });
    </script>
@endpush
