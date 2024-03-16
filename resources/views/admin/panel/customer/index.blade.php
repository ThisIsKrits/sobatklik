@extends('layouts.dashboard')

@section('title', 'Customer')

@section('content')
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
                            id="reportGrafik"
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
                                <!--   1 -->
                                <tr>
                                    <td>Jenne Doe</td>
                                    <td>
                                        jenniedoe@gmail.com
                                    </td>
                                    <td>
                                        081234567890
                                    </td>
                                    <td>
                                        17 Agustus 1992
                                    </td>
                                    <td>
                                        <p
                                            class="badge bg-badge-label-success"
                                        >
                                            Aktif
                                        </p>
                                    </td>
                                    <td>
                                        <div
                                            class="d-flex justify-conten-center align-items-center gap-2"
                                        >
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
                                            >
                                                <i
                                                    class="ri-delete-bin-7-line"
                                                ></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!--   2 -->
                                <tr>
                                    <td>John Doe</td>
                                    <td>
                                        johndoe@gmail.com
                                    </td>
                                    <td>
                                        081234567890
                                    </td>
                                    <td>
                                        17 Agustus 1992
                                    </td>
                                    <td>
                                        <p
                                            class="badge bg-badge-label-success"
                                        >
                                            Aktif
                                        </p>
                                    </td>
                                    <td>
                                        <div
                                            class="d-flex justify-conten-center align-items-center gap-2"
                                        >
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
                                            >
                                                <i
                                                    class="ri-delete-bin-7-line"
                                                ></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!--   3 -->
                                <tr>
                                    <td>
                                        Daniel Kendrick
                                    </td>
                                    <td>
                                        daniel@gmail.com
                                    </td>
                                    <td>
                                        081234567890
                                    </td>
                                    <td>
                                        17 Agustus 1992
                                    </td>
                                    <td>
                                        <p
                                            class="badge bg-badge-label-danger"
                                        >
                                            Tidak Aktif
                                        </p>
                                    </td>
                                    <td>
                                        <div
                                            class="d-flex justify-conten-center align-items-center gap-2"
                                        >
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
