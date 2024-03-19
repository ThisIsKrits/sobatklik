@extends('layouts.dashboard')

@section('title', 'Daftar Brand')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Content header -->
    <div
        class="d-flex flex-row justify-content-between align-items-center pb-4"
    >
        <h3 class="ms-1 font-semibold mb-0">
            Brand List
        </h3>

        <a
            href="{{ route('data-brand.create') }}"
            class="btn btn-primary"
        >
            <div class="d-flex align-items-center gap-3">
                <img
                    class="w-px-20"
                    src="{{ asset('/dashboard/assets/img/icons/iconly/Plus.svg') }}"
                    alt=""
                />
                Tambah
            </div>
        </a>
    </div>
    <!-- Main Content -->

    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body px-3">
                    <div class="table">
                        <table  id="data" class="table">
                            <thead>
                                <tr>
                                    <th class="w-md-px-25">
                                        Logo
                                    </th>
                                    <th>
                                        Nama Brand
                                    </th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach($datas as $data)
                                <tr>
                                    <td>
                                        <img
                                            width="48"
                                            height="48"
                                            src="{{ asset('storage/uploads/logo/'. $data->logo ) }}"
                                            alt=""
                                        />
                                    </td>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        @if($data->status == 'Aktif')
                                        <p class="badge bg-badge-label-success">
                                            {{ $data->status }}
                                        </p>
                                        @else
                                        <p class="badge bg-badge-label-danger">
                                            {{ $data->status }}
                                        </p>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-conten-center align-items-center gap-2" >
                                            <a href="{{ route('data-brand.edit',$data->id) }}" class="btn btn-success-weak" >
                                                <i class="ri-edit-2-line"></i>
                                            </a>
                                            @if ($data->status !== 'Aktif')
                                            <button
                                                class="btn btn-danger-weak"
                                                type="button"
                                                id="confirmDeleteBtn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalDelete"
                                                data-id="{{ $data->id }}"
                                            >
                                                <i class="ri-delete-bin-7-line"></i>
                                            </button>
                                            @endif
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
<!-- / Content -->

<!-- Modal Filter Table-->
@include('partials._modal-filter');

<!-- Modal Delete Table-->
@include('partials._modal-delete',['data' => $data])

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
