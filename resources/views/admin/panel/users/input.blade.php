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
                href="{{ route('data-user.index') }}"
                class="text-general"
                ><i class="ri-arrow-left-line fs-1"></i
            ></a>
            <h3 class="ms-1 font-semibold mb-0">
                @if (isset($data))
                    Edit User
                @else
                    Tambah User
                @endif
            </h3>
        </div>
    </div>
    <!-- Main Content -->

    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body px-3">
                    @if (isset($data))
                        <form
                            id="formAuthentication"
                            class="mb-3"
                            action="{{ route('data-user.update',$data->id) }}"
                            method="POST"
                        >
                        @method('PUT')
                    @else
                        <form
                            id="formAuthentication"
                            class="mb-3"
                            action="{{ route('data-user.store') }}"
                            method="POST"
                        >
                    @endif

                    @csrf
                            <div class="mb-3 w-100">
                                <label
                                    for="role"
                                    class="form-label"
                                    >Role
                                    <span
                                        >*</span
                                    ></label
                                >
                                <select
                                    class="form-select"
                                    id="role"
                                    aria-label="Default select example"
                                    name="role"
                                >
                                    <option selected disabled >
                                        Pilih Role
                                    </option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ isset($data) && $data->roles[0]->name == $role->name ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 w-100">
                                <label
                                    for="user"
                                    class="form-label"
                                    >Nama User
                                    <span
                                        >*</span
                                    ></label
                                >
                                <input
                                    class="form-control"
                                    name="fullname"
                                    placeholder="Masukan Nama User"
                                    id="user"
                                    value="{{old('fullname', $data->fullname ?? '')}}"
                                />
                                @error('fullname')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 w-100">
                                <label
                                    for="birth"
                                    class="form-label"
                                    >Tanggal Lahir
                                    <span
                                        >*</span
                                    ></label
                                >
                                <input
                                    class="form-control"
                                    name="birthdate"
                                    placeholder="DD/MM/YYY"
                                    id="birth"
                                    value="{{ isset($data->birthdate) ? \Carbon\Carbon::createFromFormat('Y-m-d', $data->birthdate)->format('d/m/Y') : '' }}
"
                                />
                            </div>
                            @error('birthdate')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            <div class="mb-3">
                                <label
                                    for="brand"
                                    class="form-label"
                                    >Brand
                                    <span
                                        >*</span
                                    ></label
                                >
                                <select
                                    class="form-select w-100"
                                    id="basic-usage"
                                    multiple="multiple"
                                    name="brand_id[]"
                                >
                                    <option></option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ isset($data) && $data->brands->contains($brand->id) ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
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
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    placeholder="Masukan Email"
                                    id="email"
                                    value="{{old('email', $data->email ?? '')}}"
                                />
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 w-100">
                                <label
                                    for="password"
                                    class="form-label"
                                    >Password
                                    <span
                                        >*</span
                                    ></label
                                >
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Password" aria-label="Password" id="password" name="password" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="button" id="generate">Generate</button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="status"
                                    type="checkbox" id="toggleSwitch" data-toggle="toggle" data-on="1" data-off="0" value="{{old('status', $data->status ?? '')}}"
                                    @if (isset($data) && $data->status == 1)
                                    checked
                                    @endif>
                                    <label class="form-check-label" for="toggleSwitch">
                                        <i class="far fa-square text-secondary" id="uncheckedIcon"></i>
                                        <i class="fas fa-check-square text-success d-none" id="checkedIcon"></i>
                                    </label>
                                    <label for="toggleSwitch" class="mt-2 ml-2">Status Aktif?</label>
                                </div>
                            </div>

                            <button
                                class="mb-2 btn btn-primary btn-md"
                                type="submit"
                            >
                                Simpan
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

    $("#basic-usage").select2({
        allowClear: true,
        placeholder: "Pilih Brand",
    });

    $(document).ready(function() {
        $('#generate').click(function() {
            var length = 8; // Panjang password minimal 8 karakter
            var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=";
            var password = "";
            for (var i = 0; i < length; i++) {
                var charIndex = Math.floor(Math.random() * charset.length);
                password += charset.charAt(charIndex);
            }
            $('#password').val(password);
        });
    });
    </script>
@endpush
