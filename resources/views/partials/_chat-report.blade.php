<!-- Textarea -->
<div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-body px-3">
                <form
                    id="formAuthentication"
                    action="{{ route('data-response.store') }}"
                    method="POST"
                >
                @csrf
                    <input type="hidden" name="id" value="{{ $datas->id }}">
                    <input type="hidden" name="opening" id="opening" value="0">
                    <input type="hidden" name="closing" id="closing" value="0">
                        <div class="mb-4">
                            <div
                                class="d-flex justify-content-between align-content-center"
                            >
                                <label
                                    class="form-label"
                                    >Masukan
                                    Balasanmu
                                    <span
                                        >*</span
                                    ></label
                                >
                                <span
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalTemplateChat"
                                    class="fs-6 text-primary hover cursor-pointer"
                                >
                                    Template Chat
                                </span>
                            </div>
                            <textarea
                                type="text"
                                class="form-control"
                                id="keluhan"
                                rows="3"
                                name="content"
                                placeholder="Tulis alasanmu disini"
                            ></textarea>
                        </div>

                        <button
                            class="btn btn-primary"
                        >
                            <div
                                class="d-flex align-items-center gap-2"
                            >
                                kirim Sekarang
                                <i
                                    class="ri-send-plane-2-line"
                                ></i>
                            </div>
                        </button>
                </form>
            </div>
        </div>
    </div>
</div>
