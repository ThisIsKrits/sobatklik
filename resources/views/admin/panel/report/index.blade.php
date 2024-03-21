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
            href="{{ route('data-report.create') }}"
            class="btn btn-primary"
        >
            <div
                class="d-flex align-items-center gap-3"
            >
                <img
                    class="w-px-20"
                    src="{{ asset('/dashboard/assets/img/icons/iconly/Plus.svg') }}"
                    alt=""
                />
                Tambah
            </div>
        </a>
    </div>

    @include('partials._data-report')

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
                                    <th>Jenis Laporan</th>
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
                                @foreach ($datas as $report)
                                <tr>
                                    <td>
                                        <p
                                            class="text-primary"
                                        >
                                            {{ $report->codes }}
                                        </p>
                                    </td>
                                    <td>
                                        {{ $report->report_date }}
                                    </td>
                                    <td>{{ $report->type->name }}</td>
                                    <td>{{ $report->category }}</td>
                                    <td>
                                        {{ $report->brand->name }}
                                    </td>
                                    <td>
                                        {{ $report->user->fullname }}
                                    </td>
                                    <td>
                                        @if (isset($report->admin))
                                        {{ $report->admin->fullname }}
                                        @endif
                                    </td>
                                    <td>
                                        <p class="badge {{ $report->status == 1 ? 'bg-badge-label-success' : 'bg-badge-label-danger' }}">
                                            {{ $report->status_text }}
                                        </p>
                                    </td>
                                    <td>
                                        <div
                                            class="d-flex justify-conten-center align-items-center gap-2"
                                        >
                                            <a
                                                href="{{ route('data-report.show',$report->id) }}"
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
