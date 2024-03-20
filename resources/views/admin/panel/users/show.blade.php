@extends('layouts.dashboard')

@section('title', 'User')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<!-- Content header -->
<div
    class="d-flex flex-row justify-content-between align-items-center pb-4"
>
    <div class="d-flex align-items-center">
        <a
            href="{{ route('data-user.index') }}"
            class="text-general"
            ><i class="ri-arrow-left-line fs-1"></i
        ></a>
        <h3 class="ms-1 font-semibold mb-0">
            Detail User
        </h3>
    </div>

    <div class="d-flex gap-1">
        <div>
            <select
                class="form-select"
                id="exampleFormControlSelect1"
                aria-label="Default select example"
            >
                <option selected>
                    Filter Brand
                </option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div>
            <select
                class="form-select"
                id="exampleFormControlSelect1"
                aria-label="Default select example"
            >
                <option selected>Bulanan</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
    </div>
</div>
<!-- Main Content -->
<div class="row">
    <!-- Total Laporan -->
    <div class="col-lg-4 col-12 mb-4">
        <div class="card card-shadow">
            <div class="card-body">
                <div
                    class="d-flex align-items-start justify-content-start gap-3"
                >
                    <div
                        class="bg-primary-weak rounded-circle p-3"
                    >
                        <div>
                            <img
                                style="
                                    width: 40px;
                                    height: 40px;
                                "
                                src="{{ asset('/dashboard/assets/img/icons/iconly/Ticket.svg') }}"
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
    <div class="col-lg-4 col-12 mb-4">
        <div class="card card-shadow">
            <div class="card-body">
                <div
                    class="d-flex align-items-start justify-content-start gap-3"
                >
                    <div
                        class="bg-danger-weak rounded-circle p-3"
                    >
                        <div>
                            <img
                                style="
                                    width: 40px;
                                    height: 40px;
                                "
                                src="{{ asset('/dashboard/assets/img/icons/iconly/Danger-2.svg') }}"
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
    <div class="col-lg-4 col-12 mb-4">
        <div class="card card-shadow">
            <div class="card-body">
                <div
                    class="d-flex align-items-start justify-content-start gap-3"
                >
                    <div
                        class="bg-warning-weak rounded-circle p-3"
                    >
                        <div>
                            <img
                                style="
                                    width: 40px;
                                    height: 40px;
                                "
                                src="{{ asset('/dashboard/assets/img/icons/iconly/Time-Circle.sv') }}g"
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
    <div class="col-lg-4 col-12 mb-4">
        <div class="card card-shadow">
            <div class="card-body">
                <div
                    class="d-flex align-items-start justify-content-start gap-3"
                >
                    <div
                        class="bg-success-weak rounded-circle p-3"
                    >
                        <div>
                            <img
                                style="
                                    width: 40px;
                                    height: 40px;
                                "
                                src="{{ asset('/dashboard/assets/img/icons/iconly/Tick-Square.svg') }}"
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
    <!-- Rata-rata waktu response -->
    <div class="col-lg-4 col-12 mb-4">
        <div class="card card-shadow">
            <div class="card-body">
                <div
                    class="d-flex align-items-start justify-content-start gap-3"
                >
                    <div
                        class="bg-info-weak rounded-circle p-3"
                    >
                        <div>
                            <img
                                style="
                                    width: 40px;
                                    height: 40px;
                                "
                                src="{{ asset('/dashboard/assets/img/icons/iconly/Time-Square.svg') }}"
                                alt=""
                            />
                        </div>
                    </div>
                    <div>
                        <p class="text-body-1 mb-1">
                            Rata- Rata Waktu
                            Response
                        </p>
                        <h3 class="mb-0">48 Jam</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Total Panggilan -->
    <div class="col-lg-4 col-12 mb-4">
        <div class="card card-shadow">
            <div class="card-body">
                <div
                    class="d-flex align-items-start justify-content-start gap-3"
                >
                    <div
                        class="bg-grey rounded-circle p-3"
                    >
                        <div>
                            <img
                                style="
                                    width: 40px;
                                    height: 40px;
                                "
                                src="{{ asset('/dashboard/assets/img/icons/iconly/Light-Calling.svg') }}"
                                alt=""
                            />
                        </div>
                    </div>
                    <div>
                        <p class="text-body-1 mb-1">
                            Total Panggilan
                        </p>
                        <h3 class="mb-0">48 Jam</h3>
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
            <div class="card-header pb-1">
                <div>
                    <ul
                        class="nav nav-pills gap-3"
                        role="tablist"
                    >
                        <li class="nav-item">
                            <span
                                type="button"
                                class="p-0 nav-link active d-flex align-items-center justify-content-center gap-1"
                                role="tab"
                                data-bs-toggle="tab"
                                data-bs-target="#navs-info-user"
                                aria-controls="navs-info-user"
                                aria-selected="true"
                            >
                                <div
                                    class="svg-icon"
                                >
                                    <svg
                                        width="16px"
                                        height="16px"
                                        viewBox="0 0 24 24"
                                        version="1.1"
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                    >
                                        <title>
                                            Iconly/Light/Profile
                                        </title>
                                        <g
                                            id="Iconly/Light/Profile"
                                            stroke="#000000"
                                            stroke-width="1.5"
                                            fill="none"
                                            fill-rule="evenodd"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >
                                            <g
                                                id="Profile"
                                                transform="translate(4.814286, 2.814476)"
                                                stroke="#000000"
                                            >
                                                <path
                                                    d="M7.17047619,12.531714 C3.30285714,12.531714 -4.08562073e-14,13.1164759 -4.08562073e-14,15.4583807 C-4.08562073e-14,17.8002854 3.28190476,18.4059997 7.17047619,18.4059997 C11.0380952,18.4059997 14.34,17.8202854 14.34,15.479333 C14.34,13.1383807 11.0590476,12.531714 7.17047619,12.531714 Z"
                                                    id="Stroke-1"
                                                    stroke-width="1.5"
                                                ></path>
                                                <path
                                                    d="M7.17047634,9.19142857 C9.70857158,9.19142857 11.7657144,7.13333333 11.7657144,4.5952381 C11.7657144,2.05714286 9.70857158,-5.32907052e-15 7.17047634,-5.32907052e-15 C4.6323811,-5.32907052e-15 2.574259,2.05714286 2.574259,4.5952381 C2.56571443,7.1247619 4.60952396,9.18285714 7.13809539,9.19142857 L7.17047634,9.19142857 Z"
                                                    id="Stroke-3"
                                                    stroke-width="1.5"
                                                ></path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                Info User
                            </span>
                        </li>
                        <li class="nav-item">
                            <span
                                type="button"
                                class="p-0 nav-link d-flex align-items-center justify-content-center gap-1"
                                role="tab"
                                data-bs-toggle="tab"
                                data-bs-target="#navs-laporan"
                                aria-controls="navs-laporan"
                                aria-selected="true"
                            >
                                <div
                                    class="svg-icon"
                                >
                                    <svg
                                        width="16px"
                                        height="16px"
                                        viewBox="0 0 24 24"
                                        version="1.1"
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                    >
                                        <title>
                                            Iconly/Light/Paper
                                        </title>
                                        <g
                                            id="Iconly/Light/Paper"
                                            stroke="#000000"
                                            stroke-width="1.5"
                                            fill="none"
                                            fill-rule="evenodd"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >
                                            <g
                                                id="Paper"
                                                transform="translate(3.500000, 2.000000)"
                                                stroke="#000000"
                                                stroke-width="1.5"
                                            >
                                                <path
                                                    d="M11.2378,0.761771171 L4.5848,0.761771171 C2.5048,0.7538 0.7998,2.4118 0.7508,4.4908 L0.7508,15.2038 C0.7048,17.3168 2.3798,19.0678 4.4928,19.1148 C4.5238,19.1148 4.5538,19.1158 4.5848,19.1148 L12.5738,19.1148 C14.6678,19.0298 16.3178,17.2998 16.3029015,15.2038 L16.3029015,6.0378 L11.2378,0.761771171 Z"
                                                    id="Stroke-1"
                                                ></path>
                                                <path
                                                    d="M10.9751,0.75 L10.9751,3.659 C10.9751,5.079 12.1231,6.23 13.5431,6.234 L16.2981,6.234"
                                                    id="Stroke-3"
                                                ></path>
                                                <line
                                                    x1="10.7881"
                                                    y1="13.3585"
                                                    x2="5.3881"
                                                    y2="13.3585"
                                                    id="Stroke-5"
                                                ></line>
                                                <line
                                                    x1="8.7432"
                                                    y1="9.606"
                                                    x2="5.3872"
                                                    y2="9.606"
                                                    id="Stroke-7"
                                                ></line>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                Laporan
                            </span>
                        </li>
                        <li class="nav-item">
                            <span
                                type="button"
                                class="p-0 nav-link d-flex align-items-center justify-content-center gap-1"
                                role="tab"
                                data-bs-toggle="tab"
                                data-bs-target="#navs-log-aktifitas"
                                aria-controls="navs-log-aktifitas"
                                aria-selected="true"
                            >
                                <div
                                    class="svg-icon"
                                >
                                    <svg
                                        width="16px"
                                        height="16px"
                                        viewBox="0 0 24 24"
                                        version="1.1"
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                    >
                                        <title>
                                            Iconly/Light/Time
                                            Circle
                                        </title>
                                        <g
                                            id="Iconly/Light/Time-Circle"
                                            stroke="#000000"
                                            stroke-width="1.5"
                                            fill="none"
                                            fill-rule="evenodd"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >
                                            <g
                                                id="Time-Circle"
                                                transform="translate(2.000000, 2.000000)"
                                                stroke="#000000"
                                                stroke-width="1.5"
                                            >
                                                <path
                                                    d="M19.2498,10.0005 C19.2498,15.1095 15.1088,19.2505 9.9998,19.2505 C4.8908,19.2505 0.7498,15.1095 0.7498,10.0005 C0.7498,4.8915 4.8908,0.7505 9.9998,0.7505 C15.1088,0.7505 19.2498,4.8915 19.2498,10.0005 Z"
                                                    id="Stroke-1"
                                                ></path>
                                                <polyline
                                                    id="Stroke-3"
                                                    points="13.4314 12.9429 9.6614 10.6939 9.6614 5.8469"
                                                ></polyline>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                Log Aktifitas
                            </span>
                        </li>
                    </ul>
                    <hr />
                </div>
            </div>
            <div class="card-body px-3">
                <div class="tab-content p-0">
                    <div
                        class="tab-pane fade show active"
                        id="navs-info-user"
                        role="tabpanel"
                    >
                        <div class="ms-2">
                            <div class="row mb-3">
                                <div
                                    class="col-12 col-md-3"
                                >
                                    <p
                                        class="font-normal"
                                    >
                                        Nama
                                    </p>
                                </div>
                                <div
                                    class="col-12 col-md-9"
                                >
                                    <p
                                        class="font-normal"
                                    >
                                        Sebastian
                                        Foster
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div
                                    class="col-12 col-md-3"
                                >
                                    <p
                                        class="font-normal"
                                    >
                                        Nickname
                                    </p>
                                </div>
                                <div
                                    class="col-12 col-md-9"
                                >
                                    <p
                                        class="font-normal"
                                    >
                                        Sebastian
                                        Foster
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div
                                    class="col-12 col-md-3"
                                >
                                    <p
                                        class="font-normal"
                                    >
                                        Email
                                    </p>
                                </div>
                                <div
                                    class="col-12 col-md-9"
                                >
                                    <p
                                        class="font-normal"
                                    >
                                        sebastianfoster@gmail.com
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div
                                    class="col-12 col-md-3"
                                >
                                    <p
                                        class="font-normal"
                                    >
                                        Tanggal
                                        Lahir
                                    </p>
                                </div>
                                <div
                                    class="col-12 col-md-9"
                                >
                                    <p
                                        class="font-normal"
                                    >
                                        17 Agustus
                                        1999
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div
                                    class="col-12 col-md-3"
                                >
                                    <p
                                        class="font-normal"
                                    >
                                        Brand
                                    </p>
                                </div>
                                <div
                                    class="col-12 col-md-9"
                                >
                                    <p
                                        class="font-normal"
                                    >
                                        Smile
                                        Consulting
                                        Indonesia,
                                        Assesment
                                        Indonesia
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div
                                    class="col-12 col-md-3"
                                >
                                    <p
                                        class="font-normal"
                                    >
                                        Role
                                    </p>
                                </div>
                                <div
                                    class="col-12 col-md-9"
                                >
                                    <p
                                        class="font-normal"
                                    >
                                        Admin
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="navs-laporan"
                        role="tabpanel"
                    >
                        <div class="table">
                            <table
                                id="reportTable"
                                class="table"
                            >
                                <thead>
                                    <tr>
                                        <th
                                            class="w-md-px-150"
                                        >
                                            Kode
                                            Pelaporan
                                        </th>
                                        <th>
                                            Tgl.
                                            Lporan
                                        </th>
                                        <th>
                                            Kategori
                                        </th>
                                        <th>
                                            Brand
                                        </th>
                                        <th>
                                            Pelapor
                                        </th>
                                        <th>
                                            Admin
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
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
                                            17
                                            Agustus
                                            2023
                                            19:08:45
                                        </td>
                                        <td>
                                            Tiket
                                        </td>
                                        <td>
                                            Ruang
                                            Bercerita
                                            Indonesia
                                        </td>
                                        <td>
                                            Sebastian
                                            Foster
                                        </td>
                                        <td>
                                            Zoe
                                            Bennett
                                        </td>
                                        <td>
                                            <p
                                                class="badge bg-badge-label-danger"
                                            >
                                                Ada
                                                Balasan
                                                dari
                                                User
                                            </p>
                                        </td>
                                        <td>
                                            <div
                                                class="d-flex justify-conten-center align-items-center gap-2"
                                            >
                                                <a
                                                    href="./laporan-detail.html"
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
                                                    data-bs-target="#modalDeleteLaporan"
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
                                            17
                                            Agustus
                                            2023
                                            19:08:45
                                        </td>
                                        <td>
                                            Whatsapp
                                        </td>
                                        <td>
                                            Ruang
                                            Bercerita
                                            Indonesia
                                        </td>
                                        <td>
                                            Jasper
                                            Quinn
                                        </td>
                                        <td>
                                            Olivia
                                            Harper
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
                                                    href="./laporan-detail.html"
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
                                                    data-bs-target="#modalDeleteLaporan"
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
                                            17
                                            Agustus
                                            2023
                                            19:08:45
                                        </td>
                                        <td>
                                            Email
                                        </td>
                                        <td>
                                            Smile
                                            Consulting
                                            Indonesia
                                        </td>
                                        <td>
                                            Liam
                                            Anderson
                                        </td>
                                        <td>
                                            Maya
                                            Rodriguez
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
                                                    href="./laporan-detail.html"
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
                                                    data-bs-target="#modalDeleteLaporan"
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
                    <div
                        class="tab-pane fade"
                        id="navs-telepon"
                        role="tabpanel"
                    >
                        <table
                            id="phoneTable"
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
                                    <th>
                                        Penelpon
                                    </th>
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
                                        17 Agustus
                                        2023
                                        19:08:45
                                    </td>

                                    <td>
                                        Ruang
                                        Bercerita
                                        Indonesia
                                    </td>
                                    <td>
                                        Sebastian
                                        Foster
                                    </td>
                                    <td>
                                        Zoe Bennett
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
                                <!--   2 -->
                                <tr>
                                    <td>
                                        17 Agustus
                                        2023
                                        19:08:45
                                    </td>

                                    <td>
                                        Mitra Solusi
                                        Jakarta
                                    </td>
                                    <td>
                                        Maya
                                        Rodriguez
                                    </td>
                                    <td>
                                        Liam
                                        Anderson
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
                                        17 Agustus
                                        2023
                                        19:08:45
                                    </td>

                                    <td>
                                        Ruang
                                        Bercerita
                                        Indonesia
                                    </td>
                                    <td>
                                        Jasper Quinn
                                    </td>
                                    <td>
                                        Olivia
                                        Harper
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
                                        17 Agustus
                                        2023
                                        19:08:45
                                    </td>

                                    <td>
                                        Mitra Solusi
                                        Jakarta
                                    </td>
                                    <td>
                                        Olivia
                                        Harper
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
                                        17 Agustus
                                        2023
                                        19:08:45
                                    </td>

                                    <td>
                                        Smile
                                        Consulting
                                        Indonesia
                                    </td>
                                    <td>
                                        Liam
                                        Anderson
                                    </td>
                                    <td>
                                        Maya
                                        Rodriguez
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
                                        17 Agustus
                                        2023
                                        19:08:45
                                    </td>

                                    <td>
                                        Assesment
                                        Indonesia
                                    </td>
                                    <td>
                                        Zoe Bennet
                                    </td>
                                    <td>
                                        Sebastian
                                        Foster
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
                    <div
                        class="tab-pane fade"
                        id="navs-log-aktifitas"
                        role="tabpanel"
                    >
                        <table
                            id="logAktifitas"
                            class="table"
                        >
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>IP</th>
                                    <th>Lokasi</th>
                                    <th>
                                        Deskripsi
                                    </th>
                                    <th
                                        class="w-md-px-100"
                                    ></th>
                                </tr>
                            </thead>
                            <tbody
                                class="table-border-bottom-0"
                            >
                                <!--   1 -->
                                <tr>
                                    <td>
                                        17 Agustus
                                        2023
                                        17:08:45
                                    </td>
                                    <td>
                                        192.168.1.1
                                    </td>
                                    <td>
                                        <div
                                            class="d-flex justify-content-start align-items-center gap-1"
                                        >
                                            <i
                                                class="ri-map-pin-range-fill text-danger ic-md"
                                            ></i>
                                            <p
                                                class="ic-sm"
                                            >
                                                Jawa
                                                Timur
                                            </p>
                                            <img
                                                src="../assets/img/icons/iconly/Image.svg"
                                                alt=""
                                            />
                                            <i
                                                class="ri-error-warning-line text-danger ic-sm mb-0"
                                            ></i>
                                        </div>
                                    </td>
                                    <td>
                                        Login ke
                                        Aplikasi
                                        Sobat Klik
                                    </td>

                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        17 Agustus
                                        2023
                                        17:08:45
                                    </td>
                                    <td>
                                        192.168.1.1
                                    </td>
                                    <td>
                                        <div
                                            class="d-flex justify-content-start align-items-center gap-1"
                                        >
                                            <i
                                                class="ri-map-pin-range-fill text-danger ic-md"
                                            ></i>
                                            <p
                                                class="ic-sm"
                                            >
                                                Jawa
                                                Timur
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        Login ke
                                        Aplikasi
                                        Sobat Klik
                                    </td>

                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
@push('scripts')
    <script>
        const selectCard = (cardId) => {
                const selectedCard = document.getElementById(cardId);
                const iconActive = selectedCard.querySelector(".icon-active");

                if (selectedCard.classList.contains("active-template")) {
                    selectedCard.classList.remove("active-template");
                    removeIcon(iconActive);
                } else {
                    const previousActiveCard = document.querySelector(
                        ".card-template-chat.active-template"
                    );
                    if (previousActiveCard) {
                        previousActiveCard.classList.remove("active-template");
                        const previousIconActive =
                            previousActiveCard.querySelector(".icon-active");
                        removeIcon(previousIconActive);
                    }

                    selectedCard.classList.add("active-template");
                    addIcon(iconActive);
                }
            };

            const addIcon = (iconActive) => {
                if (!iconActive.querySelector(".ri-checkbox-circle-fill")) {
                    const icon = document.createElement("i");
                    icon.classList.add("ri-checkbox-circle-fill");
                    iconActive.appendChild(icon);
                }
            };

            const removeIcon = (iconActive) => {
                iconActive.innerHTML = "";
            };

            $(document).ready(function() {
                var selectedContent = ''; // Variabel untuk menyimpan konten card terpilih

                // Fungsi untuk menghapus spasi berlebihan
                function removeExtraSpaces(inputString) {
                    return inputString.trim().replace(/\s+/g, ' ');
                }

                // Fungsi untuk menangani pemilihan card
                function selectCard(cardId) {
                    var cardContent = $('#' + cardId + ' .card-body p').text().trim();
                    selectedContent = removeExtraSpaces(cardContent); // Menghapus spasi berlebihan dari konten card
                }

                // Event listener untuk klik pada card
                $('.card-template-chat').click(function() {
                    var cardId = $(this).attr('id');
                    selectCard(cardId); // Panggil fungsi untuk menangani pemilihan card
                });

                // Event listener untuk klik tombol "Kirim" di dalam modal
                $('#modalTemplateChat .btn-primary').click(function() {
                    if (selectedContent !== '') {
                        $('#keluhan').val(selectedContent); // Mengganti isi input content dengan konten card yang sudah dihapus spasi berlebihan
                        $('#modalTemplateChat').modal('hide'); // Menutup modal
                        $('#formAuthentication').submit(); // Submit formulir secara otomatis
                    } else {
                        alert('Silakan pilih template chat terlebih dahulu.'); // Peringatan jika belum memilih template chat
                    }
                });
            });

    </script>
@endpush
