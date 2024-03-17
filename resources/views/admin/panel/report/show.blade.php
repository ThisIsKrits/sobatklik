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
                Detail Laporan
            </h3>
        </div>
        <button
            type="button"
            data-bs-toggle="modal"
            data-bs-target="#modalFinishReport"
            class="btn btn-outline-danger"
        >
            Selesaikan Laporan
        </button>
    </div>
    <!-- Main Content -->

    <div
        class="d-flex align-items-center bg-danger-weak rounded-3 py-2 px-3"
    >
        <img
            src="{{ asset('/dashboard/assets/img/icons/iconly/Danger-Time-Square.svg') }}"
            alt=""
        />
        <p class="ms-2 text-danger font-light">
            Admin harus memberi tanggapan maksimal 7
            hari kerja
        </p>
    </div>

    <div class="row my-4">
        <div class="col">
            <div class="card">
                <div class="card-body px-3">
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <p class="font-medium">
                                Kode Pelaporan
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <p
                                class="text-primary font-normal"
                            >
                                {{ $report->codes }}
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <p class="font-medium">
                                Tanggal
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="font-normal">
                                {{ $report->report_date }}
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <p class="font-medium">
                                Brand
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="font-normal">
                                {{ $report->brand->name }}
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <p class="font-medium">
                                Nama Pelapor
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="font-normal">
                                {{ $report->user->fullname }}
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <p class="font-medium">
                                Nama Admin CS
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="font-normal">
                                @if (isset($report->admin))
                                    {{ $report->admin->fullname }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <hr class="hr-thin" />
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <p class="font-medium">
                                Detail Keluhan
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="font-normal">
                                {{ $report->complaint }}
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <p class="font-medium">
                                Lampiran
                            </p>
                        </div>
                        <div class="col-12 col-md-9">
                            <p
                                class="text-primary font-normal"
                            >
                                @if (isset($report->files))
                                    @foreach ($report->files as $file)
                                        {{ $file->name }},

                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials._chat')
    @include('partials._chat-report',['datas' => $report])
</div>



@include('partials._template-chat', ['datas' => $report])

@endsection
@push('scripts')
    <script>
        const selectCard = (cardId) => {
                const selectedCard = document.getElementById(cardId);
                const iconActive = selectedCard.querySelector(".icon-active");

                if (selectedCard.classList.contains("active-template")) {
                    selectedCard.classList.remove("active-template");
                    removeIcon(iconActive);
                } else {
                    const previousActiveCard = document.querySelector(
                        ".card-template-chat.active-template"
                    );
                    if (previousActiveCard) {
                        previousActiveCard.classList.remove("active-template");
                        const previousIconActive =
                            previousActiveCard.querySelector(".icon-active");
                        removeIcon(previousIconActive);
                    }

                    selectedCard.classList.add("active-template");
                    addIcon(iconActive);
                }
            };

            const addIcon = (iconActive) => {
                if (!iconActive.querySelector(".ri-checkbox-circle-fill")) {
                    const icon = document.createElement("i");
                    icon.classList.add("ri-checkbox-circle-fill");
                    iconActive.appendChild(icon);
                }
            };

            const removeIcon = (iconActive) => {
                iconActive.innerHTML = "";
            };

            $(document).ready(function() {
                var selectedContent = ''; // Variabel untuk menyimpan konten card terpilih

                // Fungsi untuk menghapus spasi berlebihan
                function removeExtraSpaces(inputString) {
                    return inputString.trim().replace(/\s+/g, ' ');
                }

                // Fungsi untuk menangani pemilihan card
                function selectCard(cardId) {
                    var cardContent = $('#' + cardId + ' .card-body p').text().trim();
                    selectedContent = removeExtraSpaces(cardContent); // Menghapus spasi berlebihan dari konten card
                }

                // Event listener untuk klik pada card
                $('.card-template-chat').click(function() {
                    var cardId = $(this).attr('id');
                    selectCard(cardId); // Panggil fungsi untuk menangani pemilihan card
                });

                // Event listener untuk klik tombol "Kirim" di dalam modal
                $('#modalTemplateChat .btn-primary').click(function() {
                    if (selectedContent !== '') {
                        $('#keluhan').val(selectedContent); // Mengganti isi input content dengan konten card yang sudah dihapus spasi berlebihan
                        $('#modalTemplateChat').modal('hide'); // Menutup modal
                        $('#formAuthentication').submit(); // Submit formulir secara otomatis
                    } else {
                        alert('Silakan pilih template chat terlebih dahulu.'); // Peringatan jika belum memilih template chat
                    }
                });
            });

    </script>
@endpush
