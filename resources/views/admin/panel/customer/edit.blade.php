@extends('layouts.dashboard')

@section('title', 'Customer')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Content header -->
    <div
        class="d-flex flex-row justify-content-between align-items-center pb-4"
    >
        <div class="d-flex align-items-center">
            <a
                href="{{ route('data-customer.index') }}"
                class="text-general"
                ><i class="ri-arrow-left-line fs-1"></i
            ></a>
            <h3 class="ms-1 font-semibold mb-0">
                Ubah Data Customer
            </h3>
        </div>
    </div>
    <!-- Main Content -->

    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body px-3">
                    <form id="formAuthentication" class="mb-3" action="{{ route('data-customer.update',$data->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                            <div class="mb-3 w-100">
                                <label
                                    for="name"
                                    class="form-label"
                                    >Nama Customer
                                    <span
                                        >*</span
                                    ></label
                                >

                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="fullname"
                                    placeholder="Nama customer"
                                    value="{{old('fullname', $data->fullname ?? '')}}"
                                    autofocus
                                />
                            </div>
                            <div class="mb-3 w-100">
                                <label
                                    for="email"
                                    class="form-label"
                                    >Email
                                    <span
                                        >*</span
                                    ></label
                                >

                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Email"
                                    value="{{old('email', $data->email ?? '')}}"
                                    autofocus
                                />
                            </div>
                            <div class="mb-3 w-100">
                                <label
                                    for="nohp"
                                    class="form-label"
                                    >No. HP
                                    <span
                                        >*</span
                                    ></label
                                >

                                <input
                                    type="text"
                                    class="form-control"
                                    id="nohp"
                                    name="phone"
                                    placeholder="Nomor HP"
                                    value="{{old('phone', $data->phone ?? '')}}"
                                    autofocus
                                />
                            </div>
                            <div class="mb-3 w-100">
                                <label
                                    for="nohp"
                                    class="form-label"
                                    >Tgl. Lahir
                                    <span
                                        >*</span
                                    ></label
                                >

                                <input
                                    type="text"
                                    class="form-control"
                                    id="birthdate"
                                    name="birthdate"
                                    placeholder="Tanggal Lahir"
                                    value="{{old('birthdate', $data->birthdate ?? '')}}"
                                    autofocus
                                />
                            </div>
                            <div class="mb-3 w-100">
                                <label
                                    for="nohp"
                                    class="form-label"
                                    >Password
                                    Baru?</label
                                >

                                <input
                                    type="text"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    placeholder="Masukkan Password Baru "
                                    autofocus
                                />
                            </div>
                            <div
                                class="mb-5 form-check form-switch"
                            >
                                <input class="form-check-input" name="status"
                                type="checkbox" id="toggleSwitch" data-toggle="toggle" data-on="1" data-off="0" value="{{old('status', $data->status ?? '')}}"
                                @if (isset($data) && $data->status == 'Aktif')
                                checked
                                @endif>
                                <label class="form-check-label" for="toggleSwitch">
                                    <i class="far fa-square text-secondary" id="uncheckedIcon"></i>
                                    <i class="fas fa-check-square text-success d-none" id="checkedIcon"></i>
                                </label>
                                <label for="toggleSwitch" class="mt-2 ml-2">Status Aktif?</label>
                            </div>
                            <button
                                class="mb-2 btn btn-primary btn-md"
                                type="submit"
                            >
                                Ubah Data
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const toggleSwitch = document.getElementById('toggleSwitch');

        // Set initial value of the checkbox based on $sosmed->status
        toggleSwitch.value = toggleSwitch.checked ? "1" : "0";

        // Add event listener to update checkbox value when changed
        toggleSwitch.addEventListener('change', function() {
            // Set checkbox value to 0 when unchecked and 1 when checked
            this.value = this.checked ? "1" : "0";
        });
    });
    </script>
@endpush
