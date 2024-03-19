<div class="modal fade" id="modalDelete" tabindex="-1" aria-hidden="true">
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
                <div class="my-5 d-flex justify-content-center align-items-center text-center" >
                    <form action="{{ route('data-brand.destroy', ':id') }}" method="post" id="deleteForm">
                        @method('DELETE')
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
                                menghapus data ini?
                            </h3>
                            <button
                                class="mb-2 btn btn-danger d-grid w-100"
                                type="submit"
                            >
                                Hapus
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
