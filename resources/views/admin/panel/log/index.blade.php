@extends('layouts.dashboard')

@section('title', 'Customer')

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
                            id="reportGrafik"
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
                                <tr>
                                    <td>
                                        17 Agustus 2023
                                        17:08:45
                                    </td>
                                    <td>192.168.1.1</td>
                                    <td>
                                        <div
                                            class="d-flex justify-content-start align-items-center gap-1"
                                        >
                                            <i
                                                class="ri-map-pin-range-fill text-danger ic-md"
                                            ></i>
                                            <p
                                                class="ic-sm"
                                            >
                                                Jawa
                                                Timur
                                            </p>
                                            <img
                                                src="../assets/img/icons/iconly/Image.svg"
                                                alt=""
                                            />
                                            <i
                                                class="ri-error-warning-line text-danger ic-sm mb-0"
                                            ></i>
                                        </div>
                                    </td>
                                    <td>
                                        Login ke
                                        Aplikasi Sobat
                                        Klik
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
