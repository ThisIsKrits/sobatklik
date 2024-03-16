@extends('layouts.dashboard')

@section('title', 'Laporan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Content header -->
    <div
        class="d-flex flex-row justify-content-between align-items-center pb-4"
    >
        <div class="d-flex align-items-center">
            <a
                href="./laporan.html"
                class="text-general"
                ><i class="ri-arrow-left-line fs-1"></i
            ></a>
            <h3 class="ms-1 font-semibold mb-0">
                Detail Laporan
            </h3>
        </div>
        <button
            type="button"
            data-bs-toggle="modal"
            data-bs-target="#modalFinishReport"
            class="btn btn-outline-danger"
        >
            Selesaikan Laporan
        </button>
    </div>
    <!-- Main Content -->

    <div
        class="d-flex align-items-center bg-danger-weak rounded-3 py-2 px-3"
    >
        <img
            src="../assets/img/icons/iconly/Danger-Time-Square.svg"
            alt=""
        />
        <p class="ms-2 text-danger font-light">
            Admin harus memberi tanggapan maksimal 7
            hari kerja
        </p>
    </div>

    <div class="row my-4">
        <div class="col">
            <div class="card">
                <div class="card-body px-3">
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <p class="font-medium">
                                Kode Pelaporan
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <p
                                class="text-primary font-normal"
                            >
                                TIX-1234567892
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <p class="font-medium">
                                Tanggal
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="font-normal">
                                17 Agustus 2023 19:08:45
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <p class="font-medium">
                                Brand
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="font-normal">
                                Smile Consulting
                                Indonesia
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <p class="font-medium">
                                Nama Pelapor
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="font-normal">
                                Sebastian Foster
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <p class="font-medium">
                                Nama Admin CS
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="font-normal">
                                Ava Parker
                            </p>
                        </div>
                    </div>
                    <hr class="hr-thin" />
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <p class="font-medium">
                                Detail Keluhan
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="font-normal">
                                Saya merasa bahwa
                                kualitas sesi konseling
                                yang saya terima kurang
                                memuaskan. Terapisnya
                                tidak sepenuhnya
                                memahami masalah saya
                                dan memberikan solusi
                                yang kurang relevan.
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <p class="font-medium">
                                Lampiran
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <p
                                class="text-primary font-normal"
                            >
                                nama-file.pdf,
                                nama-file.pdf
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Textarea -->
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body px-3">
                    <form
                        id="formAuthentication"
                        action="index.html"
                        method="POST"
                    >
                        <form>
                            <div class="mb-4">
                                <div
                                    class="d-flex justify-content-between align-content-center"
                                >
                                    <label
                                        class="form-label"
                                        >Masukan
                                        Balasanmu
                                        <span
                                            >*</span
                                        ></label
                                    >
                                    <span
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalTemplateChat"
                                        class="fs-6 text-primary hover cursor-pointer"
                                    >
                                        Template Chat
                                    </span>
                                </div>
                                <textarea
                                    type="text"
                                    class="form-control"
                                    id="keluhan"
                                    rows="3"
                                    name="detail"
                                    placeholder="Tulis alasanmu disini"
                                ></textarea>
                            </div>

                            <button
                                class="btn btn-primary"
                            >
                                <div
                                    class="d-flex align-items-center gap-2"
                                >
                                    kirim Sekarang
                                    <i
                                        class="ri-send-plane-2-line"
                                    ></i>
                                </div>
                            </button>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
