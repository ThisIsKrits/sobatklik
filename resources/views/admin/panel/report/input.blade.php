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
                href="./laporan.html"
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
                        action="index.html"
                        method="POST"
                    >
                        <form>
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
                                >
                                    <option selected>
                                        Brand
                                    </option>
                                    <option value="1">
                                        One
                                    </option>
                                    <option value="2">
                                        Two
                                    </option>
                                    <option value="3">
                                        Three
                                    </option>
                                </select>
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
                                >
                                    <option selected>
                                        Pilih Customer
                                    </option>
                                    <option value="1">
                                        One
                                    </option>
                                    <option value="2">
                                        Two
                                    </option>
                                    <option value="3">
                                        Three
                                    </option>
                                </select>
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
                                    name="detail"
                                    placeholder="Masukan Detail Keluhan"
                                    autofocus
                                ></textarea>
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
                                            type="file"
                                        />
                                        <img
                                            src="../assets//img/icons/iconly/Plus-general.svg"
                                            alt=""
                                        />
                                        <p>Upload</p>
                                    </div>
                                </div>
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
