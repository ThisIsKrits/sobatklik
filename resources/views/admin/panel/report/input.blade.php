@extends('layouts.dashboard')

@section('title', 'Laporan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Content header -->
    <div
        class="d-flex flex-row justify-content-between align-items-center pb-4"
    >
        <div class="d-flex align-items-center">
            <a
                href="{{ route('data-report.index') }}"
                class="text-general"
                ><i class="ri-arrow-left-line fs-1"></i
            ></a>
            <h3 class="ms-1 font-semibold mb-0">
                Buat Laporan
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
                        action="{{ route('data-report.store') }}"
                        method="POST"
                    >
                    @csrf
                            <div class="mb-3 w-100">
                                <label
                                    for="brand"
                                    class="form-label"
                                    >Brand
                                    <span
                                        >*</span
                                    ></label
                                >
                                <select
                                    class="form-select"
                                    id="brand"
                                    aria-label="Default select example"
                                    name="brand_id"
                                >
                                    <option selected>
                                        Brand
                                    </option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 w-100">
                                <label
                                    for="type"
                                    class="form-label"
                                    >Jenis Laporan
                                    <span
                                        >*</span
                                    ></label
                                >
                                <select
                                    class="form-select"
                                    id="type"
                                    aria-label="Default select example"
                                    name="type_id"
                                >
                                    <option selected>
                                        Pilih Jenis Laporan
                                    </option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 w-100">
                                <label
                                    for="customer"
                                    class="form-label"
                                    >Customer
                                    <span
                                        >*</span
                                    ></label
                                >
                                <select
                                    class="form-select"
                                    id="customer"
                                    aria-label="Default select example"
                                    name="customer_id"
                                >
                                    <option selected>
                                        Pilih Customer
                                    </option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">
                                            {{ $customer->fullname }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('customer_id')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div
                                class="my-4 text-start"
                            >
                                <label
                                    for="birthday"
                                    class="form-label"
                                    >Detail Keluhan
                                    <span
                                        >*</span
                                    ></label
                                >
                                <textarea
                                    type="text"
                                    class="form-control"
                                    id="keluhan"
                                    rows="3"
                                    name="complaint"
                                    placeholder="Masukan Detail Keluhan"
                                    autofocus
                                ></textarea>
                                @error('complaint')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label
                                    for="keluhan"
                                    class="form-label"
                                >
                                    Lampiran</label
                                >
                                <div class="input-file">
                                    <div
                                        class="file-upload"
                                    >
                                        <input
                                            type="file" id="fileInput[]" multiple onchange="displayFileName()"
                                        />
                                        <img
                                            src="{{ asset('/dashboard/assets//img/icons/iconly/Plus-general.svg') }}"
                                            alt=""
                                        />
                                        <p>Upload</p>
                                    </div>
                                    <div id="fileNameDisplay"></div>
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
        function displayFileName() {
            const fileInput = document.getElementById('fileInput[]');
            const fileNameDisplay = document.getElementById('fileNameDisplay');

            if (fileInput && fileInput.files.length > 0) {
                const fileNames = Array.from(fileInput.files).map(file => file.name);
                fileNameDisplay.textContent = `Selected files: ${fileNames.join(', ')}`;
            } else {
                fileNameDisplay.textContent = 'No file selected';
            }
        }
    </script>
@endpush
