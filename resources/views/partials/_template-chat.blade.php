<!-- Modal Template Chat-->
<div
    class="modal fade"
    id="modalTemplateChat"
    tabindex="-1"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-centered"
        role="document"
    >
        <div class="modal-content p-4">
            <div class="modal-header p-0">
                <h4 class="mb-0 mt-4 ms-4">
                    Template Chat
                </h4>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div
                        id="card1"
                        class="card-template-chat my-3"
                        onclick="selectCard('card1')"
                    >
                        <div class="card-body">
                            <div
                                class="d-flex flex-row justify-content-between align-items-start"
                            >
                                <div>
                                    <span
                                        class="mb-2 fs-6 text-primary font-medium"
                                        >Pembukaan</span
                                    >
                                    <p>
                                    Halo dengan saya {{ Auth::user()->fullname }} saat ini kamu sedang ditanggapi oleh customer service {{ $report->brand->name }}
                                    </p>
                                    <span class="mt-2 fw-bold"> - {{ Auth::user()->fullname }}</span>
                                </div>
                                <div
                                    class="icon-active ic-lg text-primary"
                                ></div>
                            </div>
                        </div>
                    </div>

                    <div
                        id="card2"
                        class="card-template-chat my-3"
                        onclick="selectCard('card2')"
                    >
                        <div class="card-body">
                            <div
                                class="d-flex flex-row justify-content-between align-items-start"
                            >
                                <div>
                                    <span
                                        class="mb-2 fs-6 text-primary font-medium"
                                        >Penutup</span
                                    >
                                    <p>
                                        Terima kasih telah menghubungi kami, jika ada pertanyaan lain silahkan menghubungi kami.
                                    </p>
                                    <span class="mt-2 fw-bold"> - {{ Auth::user()->fullname }}</span>
                                </div>
                                <div
                                    class="icon-active ic-lg text-primary"
                                ></div>
                            </div>
                        </div>
                    </div>
                    <button
                        class="mb-2 btn btn-primary d-grid w-100"
                        type="submit"
                    >
                        Kirim
                    </button>
                    <span
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        class="text-center subtitle-1 cursor-pointer"
                    >
                        Batal
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
