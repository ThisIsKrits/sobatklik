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
                <div class="card my-3">
                    <img
                        src="{{ asset('/dashboard/assets/img/elements/Maps.png') }}"
                        alt=""
                    />
                </div>
                <h3 class="mb-3 font-semibold">
                    Sepertinya kamu login diluar radius
                </h3>

                <p class="mb-3 subtitle-2">
                    Silahkan lakukan login di lokasi kerja Brandmu,
                    atau lakukan selfie
                </p>

                <button
                    class="mb-3 btn btn-primary d-grid w-25"
                    type="submit"
                >
                    Lakukan Selfie
                </button>
                <span class="mb-2 subtitle-1 cursor-pointer">
                    Logout
                </span>
            </div>
        </div>
    </div>
</div>
@endsection
