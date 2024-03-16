@extends('layouts.dashboard')

@section('title', 'Telephone')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Content header -->
    <div
        class="d-flex flex-row justify-content-between align-items-center pb-4"
    >
        <div class="d-flex align-items-center">
            <a
                href="./telepon.html"
                class="text-general"
                ><i class="ri-arrow-left-line fs-1"></i
            ></a>
            <h3 class="ms-1 font-semibold mb-0">
                Detail Telepon
            </h3>
        </div>
    </div>
    <!-- Main Content -->

    <div class="row my-4">
        <div class="col">
            <div class="card">
                <div class="card-body px-3">
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
                                Penelpon
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
                                Nama Admin
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="font-normal">
                                Ava Parker
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <p class="font-medium">
                                Waktu total yang
                                dibutuhkan
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="font-normal">
                                12 menit 16 detik
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <p class="font-medium">
                                Rating
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <img
                                src="../assets/img/icons/iconly/Star.svg"
                                alt=""
                            />
                            <img
                                src="../assets/img/icons/iconly/Star.svg"
                                alt=""
                            />
                            <img
                                src="../assets/img/icons/iconly/Star.svg"
                                alt=""
                            />
                            <img
                                src="../assets/img/icons/iconly/Star.svg"
                                alt=""
                            />
                            <img
                                src="../assets/img/icons/iconly/Star.svg"
                                alt=""
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
