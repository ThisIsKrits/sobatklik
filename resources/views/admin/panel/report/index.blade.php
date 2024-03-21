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
                                                class="btn btn-danger-weak confirmDeleteBtn"
                                                type="button"
                                                id="confirmDeleteBtn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalDelete"
                                                data-id="{{ $report->id }}"
                                            >
                                                <i class="ri-delete-bin-7-line"></i>
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

<!-- Modal Delete Table-->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-0">
                <h2></h2>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="my-5 d-flex justify-content-center align-items-center text-center" >
                    <form action="{{ route('data-report.destroy', ':id') }}" method="post" id="deleteForm">
                        @method('DELETE')
                        @csrf
                        <div>
                            <img
                                class="mb-4 w-px-300"
                                src="{{ asset('/dashboard/assets/img/elements/email-verify-error.svg') }}"
                                alt=""
                            />
                            <h3
                                class="mb-3 h3 font-semibold"
                            >
                                Apakah kamu yakin akan
                                menghapus data ini?
                            </h3>
                            <button
                                class="mb-2 btn btn-danger d-grid w-100"
                                type="submit"
                            >
                                Hapus
                            </button>
                            <span
                                data-bs-dismiss="modal"
                                aria-label="Close"
                                class="subtitle-1 cursor-pointer"
                                id="cancelDeleteBtn"
                            >
                                Batal
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@include('partials._datatable-view')
<script>

    $(document).ready(function () {
        var selectElement = $("#dt-length-0");
        selectElement.removeClass("form-select-sm");
        selectElement.addClass("form-select-md");
        var searchElement = $("#dt-search-1");
        searchElement.removeClass("form-control-sm");
        searchElement.addClass("form-control-md");
    });

    $(document).ready(function () {
        $('.confirmDeleteBtn').click(function() {
            var id = $(this).data('id');
            var modal = $('#modalDelete');
            var form = modal.find('form');
            console.log(id);
            form.find('#deleteId').val(id);

            var actionUrl = form.attr('action');
            actionUrl = actionUrl.replace(':id', id);
            form.attr('action', actionUrl);

            modal.modal('show');
        });
    });
</script>
@endpush
