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
                        @foreach ($brand as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
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
        @if(isset($user->birthdate) && $user->birthdate == Auth::user()->birthdate)
            @include('partials._birthday-notif')
            @include('partials._modal-birthday-notif')
        @elseif(isset($user->birthdate))
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
                                        @foreach ($report as $key => $report)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>
                                                    {{ \Carbon\Carbon::createFromDate(null, $report->bulan, 1)->monthName }}
                                                </td>
                                                <td>
                                                    {{ $report->jumlah_data }}
                                                </td>
                                            </tr>

                                        @endforeach

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
                                        @foreach ($reportBrand as $key => $reportBrand )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div
                                                        class="d-flex align-items-center gap-2"
                                                    >
                                                        <img
                                                            class="w-px-30"
                                                            src="{{ asset('/storage/uploads/logo/'. $reportBrand->brand_logo) }}"
                                                            alt=""
                                                        />
                                                        <p>
                                                            {{ $reportBrand->brand_name }}
                                                        </p>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div
                                                        class="d-flex align-items-center gap-2"
                                                    >

                                                        <img
                                                            class="w-px-30"
                                                            src="{{ asset('/dashboard/assets/img/icons/iconly/Star.svg') }}"
                                                            alt=""
                                                        />
                                                        <p>
                                                           {{ number_format($reportBrand->avg_rating,2) }}
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                            {{ number_format($reportBrand->avg_time,0) }} Hari
                                                </td>
                                                <td>{{ $reportBrand->total_reports }}</td>

                                            </tr>
                                        @endforeach
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
                                        @foreach ($reportUser as $reportUser)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div
                                                        class="d-flex align-items-center gap-2"
                                                    >
                                                    {{ $reportUser->user_name }}
                                                </td>

                                                <td>
                                                    <div
                                                        class="d-flex align-items-center gap-2"
                                                    >
                                                        <img
                                                            class="w-px-30"
                                                            src="{{ asset('/dasboard/assets/img/icons/iconly/Star.svg') }}"
                                                            alt=""
                                                        />
                                                        <p>
                                                        {{ number_format($reportUser->avg_rating,2) }}
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ number_format($reportUser->avg_time,) }} Hari
                                                </td>
                                                <td>{{ $reportUser->total_reports }}</td>

                                            </tr>
                                        @endforeach
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


