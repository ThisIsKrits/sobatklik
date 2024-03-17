<!-- Main Content -->
<div class="row">
        <!-- Total Laporan -->
        <div class="col-lg-3 col-12 mb-4">
            <div class="card card-shadow">
                <div class="card-body">
                    <div
                        class="d-flex align-items-start justify-content-start gap-3"
                    >
                        <div
                            class="bg-primary-weak bg-label-primary rounded-circle p-3"
                        >
                            <div>
                                <img
                                    style="
                                        width: 40px;
                                        height: 40px;
                                    "
                                    src="{{ asset('/dashboard/assets//img/icons/iconly/Ticket.svg') }}"
                                    alt=""
                                />
                            </div>
                        </div>
                        <div>
                            <p class="text-body-1 mb-1">
                                Total Laporan
                            </p>
                            <h3 class="mb-0">{{ $datas->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Belum Dibalas -->
        <div class="col-lg-3 col-12 mb-4">
            <div class="card card-shadow">
                <div class="card-body">
                    <div
                        class="d-flex align-items-start justify-content-start gap-3"
                    >
                        <div
                            class="bg-danger-weak bg-label-primary rounded-circle p-3"
                        >
                            <div>
                                <img
                                    style="
                                        width: 40px;
                                        height: 40px;
                                    "
                                    src="{{ asset('/dashboard/assets//img/icons/iconly/Danger-2.svg') }}"
                                    alt=""
                                />
                            </div>
                        </div>
                        <div>
                            <p class="text-body-1 mb-1">
                                Belum Dibalas
                            </p>
                            <h3 class="mb-0">{{ $datas->where('status', 'belum dibalas')->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sudah Dibalas -->
        <div class="col-lg-3 col-12 mb-4">
            <div class="card card-shadow">
                <div class="card-body">
                    <div
                        class="d-flex align-items-start justify-content-start gap-3"
                    >
                        <div
                            class="bg-warning-weak bg-label-primary rounded-circle p-3"
                        >
                            <div>
                                <img
                                    style="
                                        width: 40px;
                                        height: 40px;
                                    "
                                    src="{{ asset('/dashboard/assets/img/icons/iconly/Time-Circle.svg') }}"
                                    alt=""
                                />
                            </div>
                        </div>
                        <div>
                            <p class="text-body-1 mb-1">
                                Sudah Dibalas
                            </p>
                            <h3 class="mb-0">{{ $datas->where('status', 'sudah dibalas')->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Laporan Selesai -->
        <div class="col-lg-3 col-12 mb-4">
            <div class="card card-shadow">
                <div class="card-body">
                    <div
                        class="d-flex align-items-start justify-content-start gap-3"
                    >
                        <div
                            class="bg-success-weak bg-label-primary rounded-circle p-3"
                        >
                            <div>
                                <img
                                    style="
                                        width: 40px;
                                        height: 40px;
                                    "
                                    src="{{ asset('/dashboard/assets//img/icons/iconly/Tick-Square.svg') }}"
                                    alt=""
                                />
                            </div>
                        </div>
                        <div>
                            <p class="text-body-1 mb-1">
                                Laporan Selesai
                            </p>
                            <h3 class="mb-0">{{ $datas->where('status', 'selesai')->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Grafik laporan -->
