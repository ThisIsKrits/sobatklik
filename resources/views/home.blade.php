@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
        <!-- Content header -->
        <div
            class="d-flex flex-row justify-content-between align-items-center pb-4"
        >
            <h3 class="ms-1 font-semibold mb-0">
                Dashboard
            </h3>

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

        <!-- Birthday notif -->
        @if($user->birthdate == Auth::user()->birthdate)
            @include('partials._birthday-notif')
            @include('partials._modal-birthday-notif')
        @else
            @include('partials._birthday-send')
            @include('partials._modal-birthday-send')
        @endif


        <!-- Modal Birthday notif-->

        <!-- Modal Birthday notif-->
        <!-- Birthday notif -->
    <!-- Content header -->

    <!-- Main Content -->

    @include('partials._data-report')
    <!-- Grafik laporan -->

    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div
                        class="d-flex justify-content-between align-items-center"
                    >
                        <h3 class="mb-0">
                            Grafik Laporan
                        </h3>
                        <ul
                            class="nav nav-pills mb-3"
                            role="tablist"
                        >
                            <li class="nav-item">
                                <span
                                    type="button"
                                    class="p-0 nav-link active"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-report-table"
                                    aria-controls="navs-report-table"
                                    aria-selected="true"
                                >
                                    <i
                                        class="ri-layout-column-line ic-md"
                                    ></i>
                                </span>
                            </li>
                            <li class="nav-item">
                                <span
                                    type="button"
                                    class="p-0 nav-link"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-report-chart"
                                    aria-controls="navs-report-chart"
                                    aria-selected="false"
                                >
                                    <i
                                        class="ri-line-chart-line ic-md"
                                    ></i>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body px-3">
                    <div class="tab-content p-0">
                        <div
                            class="tab-pane fade show active"
                            id="navs-report-table"
                            role="tabpanel"
                        >
                            <div
                                class="table-responsive text-nowrap"
                            >
                                <table id="data" class="table responsive">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>
                                                Bulan
                                            </th>
                                            <th>
                                                Laporan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="table-border-bottom-0"
                                    >
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                Januari
                                            </td>
                                            <td>
                                                2413
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                Februari
                                            </td>
                                            <td>
                                                2413
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>
                                                Maret
                                            </td>
                                            <td>
                                                2413
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>
                                                April
                                            </td>
                                            <td>
                                                2413
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Mei</td>
                                            <td>
                                                2413
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>
                                                Juni
                                            </td>
                                            <td>
                                                2413
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>
                                                Juli
                                            </td>
                                            <td>
                                                2413
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>
                                                Agustus
                                            </td>
                                            <td>
                                                2413
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>
                                                September
                                            </td>
                                            <td>
                                                2413
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>
                                                Oktober
                                            </td>
                                            <td>
                                                2413
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>
                                                November
                                            </td>
                                            <td>
                                                2413
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>
                                                Desember
                                            </td>
                                            <td>
                                                2413
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="navs-report-chart"
                            role="tabpanel"
                        >
                            <div id="reportChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik laporan -->

    <!-- Ringkasan By brand  -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <div
                        class="d-flex justify-content-between align-items-center"
                    >
                        <h3 class="mb-0">
                            Ringkasan by Brand
                        </h3>
                        <ul
                            class="nav nav-pills mb-3"
                            role="tablist"
                        >
                            <li class="nav-item">
                                <span
                                    type="button"
                                    class="p-0 nav-link active"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-brand-table"
                                    aria-controls="navs-brand-table"
                                    aria-selected="true"
                                >
                                    <i
                                        class="ri-layout-column-line ic-md"
                                    ></i>
                                </span>
                            </li>
                            <li class="nav-item">
                                <span
                                    type="button"
                                    class="p-0 nav-link"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-brand-chart"
                                    aria-controls="navs-brand-chart"
                                    aria-selected="false"
                                >
                                    <i
                                        class="ri-line-chart-line ic-md"
                                    ></i>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body px-3">
                    <div class="tab-content p-0">
                        <div
                            class="tab-pane fade show active"
                            id="navs-brand-table"
                            role="tabpanel"
                        >
                            <div
                                class="table-responsive text-nowrap"
                            >
                                <table id="byBrandTable" class="table responsive">
                                    <thead>
                                        <tr>
                                            <th>
                                                Rank
                                            </th>
                                            <th>
                                                Brand
                                            </th>
                                            <th>
                                                Rata-Rata
                                                Rating
                                            </th>
                                            <th>
                                                Rata-Rata
                                                Response
                                            </th>
                                            <th>
                                                Total
                                                Laporan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="table-border-bottom-0"
                                    >
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    <img
                                                        class="w-px-30"
                                                        src="../assets/img/elements/SCI.png"
                                                        alt=""
                                                    />
                                                    <p>
                                                        Smile
                                                        Consulting
                                                        Indonesia
                                                    </p>
                                                </div>
                                            </td>

                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    <img
                                                        class="w-px-30"
                                                        src="../assets/img/icons/iconly/Star.svg"
                                                        alt=""
                                                    />
                                                    <p>
                                                        5.0
                                                    </p>
                                                </div>
                                            </td>
                                            <td>
                                                1m 15s
                                            </td>
                                            <td>100</td>

                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    <img
                                                        class="w-px-30"
                                                        src="../assets/img/elements/ASI.png"
                                                        alt=""
                                                    />
                                                    <p>
                                                        Assesment
                                                        Indonesia
                                                    </p>
                                                </div>
                                            </td>

                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    <img
                                                        class="w-px-30"
                                                        src="../assets/img/icons/iconly/Star.svg"
                                                        alt=""
                                                    />
                                                    <p>
                                                        5.0
                                                    </p>
                                                </div>
                                            </td>
                                            <td>
                                                1m 15s
                                            </td>
                                            <td>100</td>

                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    <img
                                                        class="w-px-30"
                                                        src="../assets/img/elements/RBI.png"
                                                        alt=""
                                                    />
                                                    <p>
                                                        Ruang
                                                        Bercerita
                                                        Indonesia
                                                    </p>
                                                </div>
                                            </td>

                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    <img
                                                        class="w-px-30"
                                                        src="../assets/img/icons/iconly/Star.svg"
                                                        alt=""
                                                    />
                                                    <p>
                                                        5.0
                                                    </p>
                                                </div>
                                            </td>
                                            <td>
                                                1m 15s
                                            </td>
                                            <td>100</td>

                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    <img
                                                        class="w-px-30"
                                                        src="../assets/img/elements/Psikolog-Kak-Gun.png"
                                                        alt=""
                                                    />
                                                    <p>
                                                        Psikolog
                                                        Kak
                                                        Gun
                                                    </p>
                                                </div>
                                            </td>

                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    <img
                                                        class="w-px-30"
                                                        src="../assets/img/icons/iconly/Star.svg"
                                                        alt=""
                                                    />
                                                    <p>
                                                        5.0
                                                    </p>
                                                </div>
                                            </td>
                                            <td>
                                                1m 15s
                                            </td>
                                            <td>100</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="navs-brand-chart"
                            role="tabpanel"
                        >
                            <div class="row">
                                <div class="col-4">
                                    <div
                                        id="ratingChart"
                                    ></div>
                                </div>
                                <div class="col-4">
                                    <div
                                        id="responseChart"
                                    ></div>
                                </div>
                                <div class="col-4">
                                    <div
                                        id="totalReportChart"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-3">
                    <div class="row">
                        <div class="col-4">
                            <div id="ratingChart"></div>
                        </div>
                        <div class="col-4">
                            <div
                                id="responseChart"
                            ></div>
                        </div>
                        <div class="col-4">
                            <div
                                id="totalReportChart"
                            ></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ringkasan By brand2 -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <div
                        class="d-flex justify-content-between align-items-center"
                    >
                        <h3 class="mb-0">
                            Ringkasan by Admin
                        </h3>
                        <ul
                            class="nav nav-pills mb-3"
                            role="tablist"
                        >
                            <li class="nav-item">
                                <span
                                    type="button"
                                    class="p-0 nav-link active"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-admin-table"
                                    aria-controls="navs-admin-table"
                                    aria-selected="true"
                                >
                                    <i
                                        class="ri-layout-column-line ic-md"
                                    ></i>
                                </span>
                            </li>
                            <li class="nav-item">
                                <span
                                    type="button"
                                    class="p-0 nav-link"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-admin-chart"
                                    aria-controls="navs-admin-chart"
                                    aria-selected="false"
                                >
                                    <i
                                        class="ri-line-chart-line ic-md"
                                    ></i>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body px-3">
                    <div class="tab-content p-0">
                        <div
                            class="tab-pane fade show active"
                            id="navs-admin-table"
                            role="tabpanel"
                        >
                            <div
                                class="table-responsive text-nowrap"
                            >
                                <table id="byBrand" class="table responsive">
                                    <thead>
                                        <tr>
                                            <th>
                                                Rank
                                            </th>
                                            <th>
                                                Nama Admin
                                            </th>
                                            <th>
                                                Rata-Rata
                                                Rating
                                            </th>
                                            <th>
                                                Rata-Rata
                                                Response
                                            </th>
                                            <th>
                                                Total
                                                Laporan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="table-border-bottom-0"
                                    >
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    Sebastian Foster
                                            </td>

                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    <img
                                                        class="w-px-30"
                                                        src="../assets/img/icons/iconly/Star.svg"
                                                        alt=""
                                                    />
                                                    <p>
                                                        5.0
                                                    </p>
                                                </div>
                                            </td>
                                            <td>
                                                1m 15s
                                            </td>
                                            <td>100</td>

                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    Maya Rodriguez
                                                </div>
                                            </td>

                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    <img
                                                        class="w-px-30"
                                                        src="../assets/img/icons/iconly/Star.svg"
                                                        alt=""
                                                    />
                                                    <p>
                                                        5.0
                                                    </p>
                                                </div>
                                            </td>
                                            <td>
                                                1m 15s
                                            </td>
                                            <td>100</td>

                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    Jasper Quinn
                                                </div>
                                            </td>

                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    <img
                                                        class="w-px-30"
                                                        src="../assets/img/icons/iconly/Star.svg"
                                                        alt=""
                                                    />
                                                    <p>
                                                        5.0
                                                    </p>
                                                </div>
                                            </td>
                                            <td>
                                                1m 15s
                                            </td>
                                            <td>100</td>

                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    Olivia Harper
                                                </div>
                                            </td>

                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    <img
                                                        class="w-px-30"
                                                        src="../assets/img/icons/iconly/Star.svg"
                                                        alt=""
                                                    />
                                                    <p>
                                                        5.0
                                                    </p>
                                                </div>
                                            </td>
                                            <td>
                                                1m 15s
                                            </td>
                                            <td>100</td>

                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    Liam Anderson
                                                </div>
                                            </td>

                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    <img
                                                        class="w-px-30"
                                                        src="../assets/img/icons/iconly/Star.svg"
                                                        alt=""
                                                    />
                                                    <p>
                                                        5.0
                                                    </p>
                                                </div>
                                            </td>
                                            <td>
                                                1m 15s
                                            </td>
                                            <td>100</td>

                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    Zoe Bennett
                                                </div>
                                            </td>

                                            <td>
                                                <div
                                                    class="d-flex align-items-center gap-2"
                                                >
                                                    <img
                                                        class="w-px-30"
                                                        src="../assets/img/icons/iconly/Star.svg"
                                                        alt=""
                                                    />
                                                    <p>
                                                        5.0
                                                    </p>
                                                </div>
                                            </td>
                                            <td>
                                                1m 15s
                                            </td>
                                            <td>100</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="navs-admin-chart"
                            role="tabpanel"
                        >
                        <div class="mb-2">
                            <div id="ratingAdminChart"></div>
                        </div>
                        <div class="mb-2">
                            <div
                                id="responseAdminChart"
                            ></div>
                        </div>
                        <div class="mb-2">
                            <div
                                id="totalReportAdminChart"
                            ></div>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    @include('partials._datatable-view')
@endpush


