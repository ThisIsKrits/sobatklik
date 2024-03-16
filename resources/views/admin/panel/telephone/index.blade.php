@extends('layouts.dashboard')

@section('title', 'Telephone')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
                            <!-- Content header -->
                            <div
                                class="d-flex flex-row justify-content-between align-items-center pb-4"
                            >
                                <h3 class="ms-1 font-semibold mb-0">Telepon</h3>
                            </div>
                            <!-- Main Content -->
                            <div class="row">
                                <!-- Total Laporan -->
                                <div class="col-lg-3 col-12 mb-4">
                                    <div class="card card-shadow">
                                        <div class="card-body">
                                            <div
                                                class="d-flex align-items-start justify-content-start gap-3"
                                            >
                                                <div
                                                    class="bg-primary-weak bg-label-primary rounded-circle p-3"
                                                >
                                                    <div>
                                                        <img
                                                            style="
                                                                width: 40px;
                                                                height: 40px;
                                                            "
                                                            src="../assets//img/icons/iconly/Ticket.svg"
                                                            alt=""
                                                        />
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-body-1 mb-1">
                                                        Total Laporan
                                                    </p>
                                                    <h3 class="mb-0">128</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Belum Dibalas -->
                                <div class="col-lg-3 col-12 mb-4">
                                    <div class="card card-shadow">
                                        <div class="card-body">
                                            <div
                                                class="d-flex align-items-start justify-content-start gap-3"
                                            >
                                                <div
                                                    class="bg-danger-weak bg-label-primary rounded-circle p-3"
                                                >
                                                    <div>
                                                        <img
                                                            style="
                                                                width: 40px;
                                                                height: 40px;
                                                            "
                                                            src="../assets//img/icons/iconly/Danger-2.svg"
                                                            alt=""
                                                        />
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-body-1 mb-1">
                                                        Belum Dibalas
                                                    </p>
                                                    <h3 class="mb-0">128</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sudah Dibalas -->
                                <div class="col-lg-3 col-12 mb-4">
                                    <div class="card card-shadow">
                                        <div class="card-body">
                                            <div
                                                class="d-flex align-items-start justify-content-start gap-3"
                                            >
                                                <div
                                                    class="bg-warning-weak bg-label-primary rounded-circle p-3"
                                                >
                                                    <div>
                                                        <img
                                                            style="
                                                                width: 40px;
                                                                height: 40px;
                                                            "
                                                            src="../assets//img/icons/iconly/Time-Circle.svg"
                                                            alt=""
                                                        />
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-body-1 mb-1">
                                                        Sudah Dibalas
                                                    </p>
                                                    <h3 class="mb-0">128</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Laporan Selesai -->
                                <div class="col-lg-3 col-12 mb-4">
                                    <div class="card card-shadow">
                                        <div class="card-body">
                                            <div
                                                class="d-flex align-items-start justify-content-start gap-3"
                                            >
                                                <div
                                                    class="bg-success-weak bg-label-primary rounded-circle p-3"
                                                >
                                                    <div>
                                                        <img
                                                            style="
                                                                width: 40px;
                                                                height: 40px;
                                                            "
                                                            src="../assets//img/icons/iconly/Tick-Square.svg"
                                                            alt=""
                                                        />
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-body-1 mb-1">
                                                        Laporan Selesai
                                                    </p>
                                                    <h3 class="mb-0">128</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Grafik laporan -->

                            <div class="row mb-4">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body px-3">
                                            <div class="table">
                                                <table
                                                    id="reportGrafik"
                                                    class="table"
                                                >
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="w-px-150"
                                                            >
                                                                Tgl. Lporan
                                                            </th>

                                                            <th>Brand</th>
                                                            <th>Penelpon</th>
                                                            <th>Admin</th>

                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody
                                                        class="table-border-bottom-0"
                                                    >
                                                        <!--   1 -->
                                                        <tr>
                                                            <td>
                                                                17 Agustus 2023
                                                                19:08:45
                                                            </td>

                                                            <td>
                                                                Ruang Bercerita
                                                                Indonesia
                                                            </td>
                                                            <td>
                                                                Sebastian Foster
                                                            </td>
                                                            <td>Zoe Bennett</td>

                                                            <td>
                                                                <a
                                                                    href="./telepon-detail.html"
                                                                    class="btn btn-md btn-primary-weak"
                                                                >
                                                                    <i
                                                                        class="ri-eye-line"
                                                                    ></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <!--   2 -->
                                                        <tr>
                                                            <td>
                                                                17 Agustus 2023
                                                                19:08:45
                                                            </td>

                                                            <td>
                                                                Mitra Solusi
                                                                Jakarta
                                                            </td>
                                                            <td>
                                                                Maya Rodriguez
                                                            </td>
                                                            <td>
                                                                Liam Anderson
                                                            </td>

                                                            <td>
                                                                <a
                                                                    href="./telepon-detail.html"
                                                                    class="btn btn-md btn-primary-weak"
                                                                >
                                                                    <i
                                                                        class="ri-eye-line"
                                                                    ></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <!--   3 -->
                                                        <tr>
                                                            <td>
                                                                17 Agustus 2023
                                                                19:08:45
                                                            </td>

                                                            <td>
                                                                Ruang Bercerita
                                                                Indonesia
                                                            </td>
                                                            <td>
                                                                Jasper Quinn
                                                            </td>
                                                            <td>
                                                                Olivia Harper
                                                            </td>

                                                            <td>
                                                                <a
                                                                    href="./telepon-detail.html"
                                                                    class="btn btn-md btn-primary-weak"
                                                                >
                                                                    <i
                                                                        class="ri-eye-line"
                                                                    ></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <!--   3 -->
                                                        <tr>
                                                            <td>
                                                                17 Agustus 2023
                                                                19:08:45
                                                            </td>

                                                            <td>
                                                                Mitra Solusi
                                                                Jakarta
                                                            </td>
                                                            <td>
                                                                Olivia Harper
                                                            </td>
                                                            <td>
                                                                Jasper Quinn
                                                            </td>

                                                            <td>
                                                                <a
                                                                    href="./telepon-detail.html"
                                                                    class="btn btn-md btn-primary-weak"
                                                                >
                                                                    <i
                                                                        class="ri-eye-line"
                                                                    ></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <!--   4 -->
                                                        <tr>
                                                            <td>
                                                                17 Agustus 2023
                                                                19:08:45
                                                            </td>

                                                            <td>
                                                                Smile Consulting
                                                                Indonesia
                                                            </td>
                                                            <td>
                                                                Liam Anderson
                                                            </td>
                                                            <td>
                                                                Maya Rodriguez
                                                            </td>

                                                            <td>
                                                                <a
                                                                    href="./telepon-detail.html"
                                                                    class="btn btn-md btn-primary-weak"
                                                                >
                                                                    <i
                                                                        class="ri-eye-line"
                                                                    ></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <!--   5 -->
                                                        <tr>
                                                            <td>
                                                                17 Agustus 2023
                                                                19:08:45
                                                            </td>

                                                            <td>
                                                                Assesment
                                                                Indonesia
                                                            </td>
                                                            <td>Zoe Bennet</td>
                                                            <td>
                                                                Sebastian Foster
                                                            </td>

                                                            <td>
                                                                <a
                                                                    href="./telepon-detail.html"
                                                                    class="btn btn-md btn-primary-weak"
                                                                >
                                                                    <i
                                                                        class="ri-eye-line"
                                                                    ></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection
