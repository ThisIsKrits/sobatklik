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
                        <table  id="contact" class="table">
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
                                            src="{{ asset('/uploads/'. $data->icon ) }}"
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
                                            <a href="{{ route('data-contact.edit',$data->id) }}" class="btn btn-success-weak" >
                                                <i class="ri-edit-2-line"></i>
                                            </a>
                                            @if ($data->status == 'Tidak Aktif')
                                            <button
                                                class="btn btn-danger-weak"
                                                type="button"
                                                id="confirmDeleteBtn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalDelete"
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
<script>
    // Datatables

    $(function () {
        var table = $("#contact").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            searching: true,
            paging: true,
            pagingType: "simple_numbers",
            info: false,
            language: {
                lengthMenu: "Show _MENU_ data",
                paginate: {
                    previous: '<i class="ri-arrow-left-line"></i>',
                    next: '<i class="ri-arrow-right-line"></i>',
                },
                search: "",
                searchPlaceholder: "Cari",
            },

            dom: '<"top"i<"px-3 d-flex flex-column justify-content-start align-items-start gap-3 ms-auto flex-md-row justify-content-between align-items-md-center gap-md-0"lf>>rt<"bottom"p>',
            fnInitComplete: function () {
                var newDiv = $(
                    "<div class='d-flex justify-content-center align-items-center gap-2'></div>"
                );
                newDiv.append($(".dt-search"));
                newDiv.append(
                    '<button class="btn btn-outline-placeholder" type="button" data-bs-toggle="modal" data-bs-target="#modalFilter"><i class="ri-equalizer-2-line "></i></button>'
                );

                newDiv.append(
                    `<div class="dropdown">
                        <button class="btn btn-outline-placeholder" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-list-check"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <div class="container px-2">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Default checkbox
                                    </label>
                                    </div>
                                </div>
                            </li>
                            <li><a class="dropdown-item" href="#">Item 2</a></li>
                            <li><a class="dropdown-item" href="#">Item 3</a></li>
                        </ul>
                    </div>`
                );

                $(
                    "div.d-flex.flex-column.justify-content-start.align-items-start.gap-3.ms-auto.flex-md-row.justify-content-between.align-items-md-center.gap-md-0"
                ).append(newDiv);
            },
        });

        $('#filterForm').submit(function (e) {
        e.preventDefault();
        var status = $('#status').val();

        table.columns(2).search(status).draw();

        $('#modalFilter').modal('hide');
    });

    });

    $(document).ready(function () {
        var selectElement = $("#dt-length-0");
        selectElement.removeClass("form-select-sm");
        selectElement.addClass("form-select-md");
        var searchElement = $("#dt-search-1");
        searchElement.removeClass("form-control-sm");
        searchElement.addClass("form-control-md");
    });

    $(document).ready(function() {
        $('[data-bs-toggle="modal"]').click(function() {
            var targetModal = $(this).data('bs-target');
            $(targetModal).modal('show');
        });

        $('#confirmDeleteBtn').click(function() {
            $('#modalDelete').modal('show');
        });

        // Menangani penutupan modal setelah penghapusan data
        $('#deleteForm').submit(function(event) {
            event.preventDefault();
            $(this).get(0).submit(); // Submit form
            $('#modalDelete').modal('hide'); // Menutup modal
        });
    });
</script>
@endpush
