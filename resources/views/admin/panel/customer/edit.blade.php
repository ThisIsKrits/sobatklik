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
                href="./customer.html"
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
                    <form
                        id="formAuthentication"
                        class="mb-3"
                        action="index.html"
                        method="POST"
                    >
                        <form>
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
                                    name="name"
                                    placeholder="Nama customer"
                                    value="John demo"
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
                                    value="johndoe@gmail.com"
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
                                    name="nohp"
                                    placeholder="Nomor HP"
                                    value="081234567890"
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
                                    id="nohp"
                                    name="nohp"
                                    placeholder="Tanggal Lahir"
                                    value="17 Agustus 1998"
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
                                    id="nohp"
                                    name="nohp"
                                    placeholder="Masukkan Password Baru "
                                    autofocus
                                />
                            </div>
                            <div
                                class="mb-3 form-check form-switch"
                            >
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="flexSwitchCheckChecked"
                                    checked
                                />
                                <label
                                    class="form-check-label"
                                    for="flexSwitchCheckChecked"
                                    >Status
                                    Aktif?</label
                                >
                            </div>
                            <button
                                class="mb-2 btn btn-primary btn-md"
                                type="submit"
                            >
                                Ubah Data
                            </button>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
