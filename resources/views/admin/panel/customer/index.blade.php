@extends('layouts.dashboard')

@section('title', 'Customer')

@section('content')
@if (session('message-success'))
    @include('partials._toats-success',['message' => (session('message-success'))])
@endif
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Content header -->
    <div
        class="d-flex flex-row justify-content-between align-items-center pb-4"
    >
        <h3 class="ms-1 font-semibold mb-0">
            Data Customer
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
                                    <th
                                        class="w-md-px-150"
                                    >
                                        Nama
                                    </th>
                                    <th>Email</th>
                                    <th>No. HP</th>
                                    <th>Tgl. Lahir</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody
                                class="table-border-bottom-0"
                            >
                                @foreach ($datas as $user)
                                    <tr>
                                        <td>{{ $user->fullname }}</td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->phone }}
                                        </td>
                                        <td>
                                            {{ $user->birthdate }}
                                        </td>
                                        <td>
                                            @if($user->status == 'Aktif')
                                                <p class="badge bg-badge-label-success">
                                                    {{ $user->status }}
                                                </p>
                                            @else
                                                <p class="badge bg-badge-label-danger">
                                                    {{ $user->status }}
                                                </p>
                                            @endif
                                        </td>
                                        <td>
                                            <div
                                                class="d-flex justify-conten-center align-items-center gap-2"
                                            >
                                                <a href="{{ route('data-customer.edit',$user->id) }}" class="btn btn-success-weak" >
                                                    <i class="ri-edit-2-line"></i>
                                                </a>
                                                @if ($user->status !== 'Aktif')
                                                <button
                                                    class="btn btn-danger-weak"
                                                    type="button"
                                                    id="confirmDeleteBtn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalDelete"
                                                    data-id="{{ $user->id }}"
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

@include('partials._modal-filter');

<!-- Modal Delete Table-->
@include('partials._modal-delete',['data' => $user])

@endsection

@push('scripts')
@include('partials._datatable-view')
<script>
    $(document).ready(function() {
        $('.toast').toast('show');
    });

    $(document).ready(function () {
        var selectElement = $("#dt-length-0");
        selectElement.removeClass("form-select-sm");
        selectElement.addClass("form-select-md");
        var searchElement = $("#dt-search-1");
        searchElement.removeClass("form-control-sm");
        searchElement.addClass("form-control-md");
    });

    $('[data-bs-toggle="modal"]').on('click', function() {
        var dataId = $(this).data('id');
        console.log(dataId);

        // Tambahkan baris berikut untuk mengatur atribut action pada form
        $('#deleteForm').attr('action', '/data-customer/' + dataId);
    });

    $('#confirmDeleteBtn').on('click', function() {
        $('#deleteForm').get(0).submit();
        $('#modalDelete').modal('hide');
    });
</script>
@endpush
