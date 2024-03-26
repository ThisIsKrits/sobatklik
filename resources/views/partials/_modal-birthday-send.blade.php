<div class="modal fade" id="modalFormBirthday" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header p-0">
                <h2></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
            <div
            class="my-5 mx-4 text-center"
            >
            <div >
                <img class="w-px-100 h-auto rounded-circle mb-2" src="{{ asset('/dashboard/assets/img/avatars/6.png') }}" alt="">
                <h5 class="mb-3 font-semibold">Kirim Ucapan untuk John Doe</h5>
                <form action="{{ route('speech-birthday.store')}}" method="post">
                    <div class="my-4 text-start">
                        <label for="birthday" class="form-label"
                            >Ucapan Ulang Tahun <span>*</span></label
                        >

                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <textarea
                            type="text"
                            class="form-control"
                            id="birthday"
                            rows="3"
                            name="content"
                            placeholder="Tulis Ucapan"
                            autofocus
                        ></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit"> <div class="d-flex align-items-center gap-2">kirim Sekarang <i class="ri-send-plane-2-line"></i> </div></button>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
