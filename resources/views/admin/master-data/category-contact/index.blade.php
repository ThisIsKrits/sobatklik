@extends('layouts.dashboard')

@section('title', 'Kategori Kontak')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Content header -->
    <div
        class="d-flex flex-row justify-content-between align-items-center pb-4"
    >
        <h3 class="ms-1 font-semibold mb-0">
            Kategori Kontak
        </h3>

        <a
            href="{{ route('data-contact.create') }}"
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
                                        Icon
                                    </th>
                                    <th>
                                        Nama Kategori
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
                                            src="{{ asset('/storage/uploads/kontak/'. $data->icon ) }}"
                                            alt=""
                                        />
                                    </td>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        <p class="badge {{ $data->status == 1 ? 'bg-badge-label-success' : 'bg-badge-label-danger' }}">
                                            {{ $data->status_text }}
                                        </p>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-conten-center align-items-center gap-2" >
                                            <a href="{{ route('data-contact.edit',$data->id) }}" class="btn btn-success-weak" >
                                                <i class="ri-edit-2-line"></i>
                                            </a>
                                            @if ($data->status !== 'Aktif' && !$data->contactBrand->count())
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
                    <form action="{{ route('data-contact.destroy', ':id') }}" method="post" id="deleteForm">
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
