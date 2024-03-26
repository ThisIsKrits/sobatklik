<div class="modal  fade" id="modalListSpeech" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header p-0">
                <h5 class="mb-0 mt-4 ms-4">Ucapan dari Rekan Kerja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="navbar container-xxl navbar navbar-expand-xl bg-grey rounded-3 py-2 px-3">
                    <img src="{{ asset('/dashboard/assets/img/icons/iconly/Bold-Time-Square.svg') }}" alt="">
                    <p class="ms-2 text-general">Fitur ucapan akan hilang setelah 1x24 jam. Silahkan download ucapan</p>
                    </div>
                <div
                class="my-4 card-scrollable-container"
                >
                    <div>
                        @foreach ($speeches as $speech)
                            <div class="d-flex gap-3 my-3">
                                @if (isset($speech->user->profile->image))
                                    <img src="{{ asset('storage/uploads/profile/'. $speech->user->profile->image  )}}" class="admin-avatar" alt="">
                                @else
                                    <div class="admin-avatar">
                                        <p class="mb-0">JD</p>
                                    </div>
                                    @endif
                                <div>
                                    <div>
                                        <p class="mx-0 text-general font-semibold">{{ $speech->user->fullname }}</p>
                                    </div>
                                    <p>{{ $speech->content }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="text-center mb-4">
                    <button class="btn btn-primary">
                        <div class="d-flex align-items-center gap-2">
                            <i class="ri-download-line"></i> Download Ucapan
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
