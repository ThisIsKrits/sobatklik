@extends('layouts.dashboard')

@section('title', 'Log Aktifitas')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Content header -->
    <div
        class="d-flex flex-row justify-content-between align-items-center pb-4"
    >
        <h3 class="ms-1 font-semibold mb-0">
            Log Aktifitas
        </h3>
    </div>
    <!-- Main Content -->

    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body px-3">
                    <div class="table">
                        <table
                            id="data"
                            class="table"
                        >
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>IP</th>
                                    <th>Lokasi</th>
                                    <th>Deskripsi</th>
                                    <th
                                        class="w-md-px-100"
                                    >
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody
                                class="table-border-bottom-0"
                            >
                                <!--   1 -->
                                @foreach ($datas as  $data)
                                    <tr>
                                        <td>
                                        {{ \Carbon\Carbon::parse($data->create_at)->format('d M Y H:i:s') }}
                                        </td>
                                        <td>{{ $data->ip }}</td>
                                        <td>
                                            <div
                                                class="d-flex justify-content-start align-items-center gap-1"
                                            >
                                                <a href="#modalMaps" data-bs-toggle="modal"  data-bs-target="#modalMaps">
                                                    <i
                                                        class="ri-map-pin-range-fill text-danger ic-md"
                                                    ></i>
                                                </a>
                                                <p
                                                    class="ic-sm"
                                                >
                                                    {{ $data->location }}
                                                </p>
                                                <a href="#modalSelfie" data-bs-toggle="modal"  data-bs-target="#modalSelfie">
                                                    <img
                                                        src="{{ asset('/dashboard/assets/img/icons/iconly/Image.sv') }}g"
                                                        alt=""
                                                    />
                                                </a>
                                                <i
                                                    class="ri-error-warning-line text-danger ic-sm mb-0"
                                                ></i>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $data->description }}
                                        </td>

                                        <td>
                                            <div
                                                class="d-flex justify-conten-center align-items-center gap-2"
                                            >
                                                <button
                                                    class="btn btn-primary-weak"
                                                    type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalInfo"
                                                >
                                                    <i
                                                        class="ri-eye-line"
                                                    ></i>
                                                </button>
                                                <a
                                                    href="./customer-edit.html"
                                                    class="btn btn-success-weak"
                                                >
                                                    <i
                                                        class="ri-edit-2-line"
                                                    ></i>
                                                </a>

                                                <button
                                                    class="btn btn-danger-weak"
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
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMaps" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                    <div class="email-verify-wrapper authentication-basic">
                        <!-- Register -->
                        <div class="card card-login">
                            <div class="card-body">
                                <!-- Logo -->
                                <div
                                    class="app-brand flex-column justify-content-center"
                                >
                                    <!-- /Logo -->
                                    <div class="card my-3">
                                        <img
                                            src="{{ asset('/dashboard/assets/img/elements/Maps.png') }}"
                                            alt=""
                                        />
                                    </div>
                                    <a href="" class="btn btn-lg btn-primary" style="width:100%;">
                                        Buka Maps
                                    </a>
                                    <a href="" class="text-primary mt-3 fw-bold" data-bs-dismiss="modal" aria-label="Close">
                                        Tutup
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSelfie" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                    <div class="email-verify-wrapper authentication-basic">
                        <!-- Register -->
                        <div class="card card-login">
                            <div class="card-body">
                                <!-- Logo -->
                                <div
                                    class="app-brand flex-column justify-content-center"
                                >
                                    <!-- /Logo -->
                                    <div class="card my-3">
                                        <img
                                            src="{{ asset('/dashboard/assets/img/elements/Selfie.png') }}"
                                            class="image-card" width="633px" height="527px"
                                            alt=""
                                        />
                                    </div>
                                    <a href="" class="text-primary mt-3 fw-bold" data-bs-dismiss="modal" aria-label="Close">
                                        Tutup
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Filter Table-->
@include('partials._modal-filter');

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
        $('#confirmDeleteBtn').click(function() {
            var id = $(this).data('id'); // Ambil nilai ID dari tombol konfirmasi hapus
            var modal = $('#modalDelete');
            var form = modal.find('form');

            // Set nilai ID ke dalam input hidden di dalam form modal delete
            form.find('#deleteId').val(id);

            // Set URL aksi form modal delete dengan nilai ID yang benar
            var actionUrl = form.attr('action');
            actionUrl = actionUrl.replace(':id', id);
            form.attr('action', actionUrl);

            // Tampilkan modal delete
            modal.modal('show');
        });
    });
</script>
@endpush
