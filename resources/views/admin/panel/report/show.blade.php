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
        @if ($report->status !== 2)
            <button
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#modalFinishReport"
                class="btn btn-outline-danger confirmReport"
                data-id="{{ $report->id }}"
            >
                Selesaikan Laporan
            </button>
        @endif

    </div>
    <!-- Main Content -->


    <div
        class="d-flex align-items-center
        @if($report->status == 0)bg-danger-weak
        @elseif($report->status == 1) bg-primary-weak
        @else bg-success-weak
        @endif
        rounded-3 py-2 px-3"
    >

        @if ($report->status == 0)
        <img
            src="{{ asset('/dashboard/assets/img/icons/iconly/Danger-Time-Square.svg') }}"
            alt=""
        />
        <p class="ms-2 text-danger font-light">
                Admin harus memberi tanggapan maksimal 7
                hari kerja
        </p>
        @elseif ($report->status == 1)
        <img
            src="{{ asset('/dashboard/assets/img/icons/iconly/Time-Square.svg') }}"
            alt=""
        />
        <p class="ms-2 text-secondary font-light">
            Tiket akan otomatis tertutup jika tidak ada balasan selama 5 hari dari customer
        </p>
        @else
            <img src="{{ asset('/dashboard/assets/img/icons/iconly/Lock-success.svg') }}"
            alt=""/>
            <div>
                <p class="ms-2 text-general font-medium">
                    Laporan Selesai
                </p>
                <p class="ms-2 text-general font-light">
                    Anda sudah tidak bisa memberikan
                    tanggapan
                </p>
            </div>
        @endif
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
                                <a href="{{ asset('storage/uploads/report/' . $file->name) }}" download="{{ $file->name }}">
                                    {{ $file->name }},
                                </a>

                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>

                    @include('partials._review-report', ['report' => $report])

                </div>
            </div>
        </div>
    </div>
    @include('partials._chat')

    @if ($report->status !== 2)
        @include('partials._chat-report',['datas' => $report])
    @endif

</div>

<!-- confirm laporan -->
<div class="modal fade" id="modalFinishReport" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-0">
                <h2></h2>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="my-1 d-flex justify-content-center align-items-center text-center" >
                    <form action="{{ route('data-report.update', ':id') }}" method="post" id="updateForm">
                        @method('PUT')
                        @csrf
                        <div>
                            <img
                                class="mb-4 w-px-300"
                                src="{{ asset('/dashboard/assets/img/elements/email-verify-error.svg') }}"
                                alt=""
                            />
                            <h3
                                class="mb-3 h3 font-semibold"
                            >
                                Apakah kamu yakin akan
                                menyelesaikan laporan ini?
                            </h3>
                            <p class="mt-3 mb-3 font-light">Setelah file diselesaikan maka admin maupun customer tidak bisa melakukan percakapan, akan tetapi riwayat percakapan masih tersimpan</p>
                            <button
                                class="mb-2 btn btn-danger d-grid w-100"
                                type="submit"
                            >
                                Ya, Selesaikan
                            </button>
                            <span
                                data-bs-dismiss="modal"
                                aria-label="Close"
                                class="subtitle-1 cursor-pointer"
                                id="cancelDeleteBtn"
                            >
                                Batal
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                var selectedContent = '';
                var opening = 0;
                var closing = 0;

                function removeExtraSpaces(inputString) {
                    return inputString.trim().replace(/\s+/g, ' ');
                }

                // Fungsi untuk menangani pemilihan card
                function selectCard(cardId) {
                    var cardContent = $('#' + cardId + ' .card-body p').text().trim();
                    selectedContent = removeExtraSpaces(cardContent);

                    if (cardId === 'card1') {
                        opening = 1; // Jika card 1 dipilih, selectedValue diatur menjadi 1
                    } else {
                        opening = 0; // Jika card lain dipilih, selectedValue diatur menjadi 0
                    }
                    if (cardId === 'card2') {
                        closing = 1; // Jika card 1 dipilih, selectedValue diatur menjadi 1
                    } else {
                        closing = 0; // Jika card lain dipilih, selectedValue diatur menjadi 0
                    }
                }

                $('.card-template-chat').click(function() {
                    var cardId = $(this).attr('id');
                    selectCard(cardId);
                });

                $('#modalTemplateChat .btn-primary').click(function() {
                    if (selectedContent !== '') {
                        $('#keluhan').val(selectedContent);
                        $('#opening').val(opening);
                        $('#closing').val(closing);
                        $('#modalTemplateChat').modal('hide');
                        $('#formAuthentication').submit();
                    } else {
                        alert('Silakan pilih template chat terlebih dahulu.');
                    }
                });
            });


            $('.confirmReport').click(function() {
                var id = $(this).data('id');
                var modal = $('#modalFinishReport');
                var form = modal.find('form');
                form.find('#updateForm').val(id);
                console.log(id);

                var actionUrl = form.attr('action');
                actionUrl = actionUrl.replace(':id', id);
                form.attr('action', actionUrl);

                modal.modal('show');
            });
    </script>
@endpush
