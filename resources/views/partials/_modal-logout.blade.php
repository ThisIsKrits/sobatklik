<!-- Modal Logout-->
<div class="modal fade" id="modalLogout" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-0">
                <h2></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
            <div
                class="my-5 d-flex justify-content-center align-items-center text-center"
            >
                <div >
                <img
                    class="mb-4 w-px-300"
                    src="{{ asset('/dashboard/assets/img/elements/email-verify-error.svg') }}"
                    alt=""
                />
                <h3 class="mb-3 h3 font-semibold">Apakah kamu yakin akan
                    keluar dari aplikasi?</h3>
                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button
                            class="mb-2 btn btn-danger d-grid w-100"
                            type="submit"
                        >
                            Ya, Keluar Sekarang
                        </button>
                    </form>
                <span data-bs-dismiss="modal" aria-label="Close" class="subtitle-1 cursor-pointer">
                    Batal
                </span>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
