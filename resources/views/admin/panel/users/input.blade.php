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
                    <form
                        id="formAuthentication"
                        class="mb-3"
                        action="index.html"
                        method="POST"
                    >
                        <form>
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
                                >
                                    <option selected>
                                        Pilih Role
                                    </option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">
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
                                    name="user"
                                    placeholder="Masukan Nama User"
                                    id="user"
                                />
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
                                    name="birth"
                                    placeholder="DD/MM/YYY"
                                    id="birth"
                                />
                            </div>
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
                                >
                                    <option></option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">
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
                                />
                            </div>

                            <div
                                class="bg-primary-weak text-center py-3 mb-3"
                            >
                                <p class="text-primary">
                                    Default Password :
                                    12345678
                                </p>
                            </div>
                            <div
                                class="form-check form-switch mb-4"
                            >
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="flexSwitchCheckChecked"
                                    value="true"
                                    checked
                                />
                                <label
                                    class="form-check-label"
                                    for="flexSwitchCheckChecked"
                                    >Status Aktif
                                    ?</label
                                >
                            </div>

                            <button
                                class="mb-2 btn btn-primary btn-md"
                                type="submit"
                            >
                                Simpan
                            </button>
                        </form>
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
    </script>
@endpush
