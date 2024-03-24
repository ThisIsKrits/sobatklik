@extends('layouts.app')

@section('content')
<div class="authentication-wrapper authentication-basic h-custom">
    <div class="card card-login d-flex justify-content-center">
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
            <h2 class="mb-2 font-semibold">
                Masukkan Kode Verifikasi
            </h2>
            <p class="mb-4 subtitle-1">
                Harap hubungi owner untuk mendapatkan kode
                verifikasi
            </p>

            <form
                id="formAuthentication"
                class="mb-3"
                action="{{ route('code.verify') }}"
                method="POST"
            >
            @csrf
                <div class="mb-3">
                    <label for="code" class="form-label"
                        >Kode Verifikasi <span>*</span></label
                    >
                    <input
                        type="text"
                        class="form-control"
                        id="code"
                        name="code"
                        placeholder="Masukan kode verifikasi"
                        autofocus
                    />
                </div>

                <div class="mb-3">
                    <button
                        class="btn btn-primary d-grid w-100"
                        type="submit"
                    >
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
