@extends('layouts.dashboard')

@section('title', 'Laporan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Content header -->
    <div
        class="d-flex flex-row justify-content-between align-items-center pb-4"
    >
        <h3 class="ms-1 font-semibold mb-0">Laporan</h3>

        <a
            href="./laporan-create.html"
            class="btn btn-primary"
        >
            <div
                class="d-flex align-items-center gap-3"
            >
                <img
                    class="w-px-20"
                    src="../assets/img/icons/iconly/Plus.svg"
                    alt=""
                />
                Tambah
            </div>
        </a>
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
                                        class="w-md-px-150"
                                    >
                                        Kode Pelaporan
                                    </th>
                                    <th>Tgl. Lporan</th>
                                    <th>Kategori</th>
                                    <th>Brand</th>
                                    <th>Pelapor</th>
                                    <th>Admin</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody
                                class="table-border-bottom-0"
                            >
                                <!--   1 -->
                                <tr>
                                    <td>
                                        <p
                                            class="text-primary"
                                        >
                                            TIX-1234567892
                                        </p>
                                    </td>
                                    <td>
                                        17 Agustus 2023
                                        19:08:45
                                    </td>
                                    <td>Tiket</td>
                                    <td>
                                        Ruang Bercerita
                                        Indonesia
                                    </td>
                                    <td>
                                        Sebastian Foster
                                    </td>
                                    <td>Zoe Bennett</td>
                                    <td>
                                        <p
                                            class="badge bg-badge-label-danger"
                                        >
                                            Ada Balasan
                                            dari User
                                        </p>
                                    </td>
                                    <td>
                                        <div
                                            class="d-flex justify-conten-center align-items-center gap-2"
                                        >
                                            <a
                                                href=""
                                                class="btn btn-md btn-primary-weak"
                                            >
                                                <i
                                                    class="ri-eye-line"
                                                ></i>
                                            </a>

                                            <button
                                                class="btn btn-md btn-danger-weak"
                                            >
                                                <i
                                                    class="ri-delete-bin-7-line"
                                                ></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- tr 2 -->
                                <tr>
                                    <td>
                                        <p
                                            class="text-primary"
                                        >
                                            TIX-1234567892
                                        </p>
                                    </td>
                                    <td>
                                        17 Agustus 2023
                                        19:08:45
                                    </td>
                                    <td>Whatsapp</td>
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
                                        <p
                                            class="badge bg-badge-label-warning"
                                        >
                                            Sudah
                                            Dibalas
                                            Admin
                                        </p>
                                    </td>
                                    <td>
                                        <div
                                            class="d-flex justify-conten-center align-items-center gap-2"
                                        >
                                            <a
                                                href=""
                                                class="btn btn-md btn-primary-weak"
                                            >
                                                <i
                                                    class="ri-eye-line"
                                                ></i>
                                            </a>

                                            <button
                                                class="btn btn-md btn-danger-weak"
                                            >
                                                <i
                                                    class="ri-delete-bin-7-line"
                                                ></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- tr 3 -->
                                <tr>
                                    <td>
                                        <p
                                            class="text-primary"
                                        >
                                            TIX-1234567890
                                        </p>
                                    </td>
                                    <td>
                                        17 Agustus 2023
                                        19:08:45
                                    </td>
                                    <td>Email</td>
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
                                        <p
                                            class="badge bg-badge-label-success"
                                        >
                                            Laporan
                                            Selesai
                                        </p>
                                    </td>
                                    <td>
                                        <div
                                            class="d-flex justify-conten-center align-items-center gap-2"
                                        >
                                            <a
                                                href=""
                                                class="btn btn-md btn-primary-weak"
                                            >
                                                <i
                                                    class="ri-eye-line"
                                                ></i>
                                            </a>

                                            <button
                                                class="btn btn-md btn-danger-weak"
                                                type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalDelete"
                                            >
                                                <i
                                                    class="ri-delete-bin-7-line"
                                                ></i>
                                            </button>
                                        </div>
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
