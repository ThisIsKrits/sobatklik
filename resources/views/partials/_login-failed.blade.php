<div class="modal-backdrop fade show"></div>
<div class="modal fade show" id="modalCenter"tabindex="-1"
    style="display: block" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="my-5 d-flex justify-content-center align-items-center text-center" >
              <div>
                <img
                  class="mb-4 w-px-100"
                  src="{{ asset('/dashboard/assets/img/icons/danger.svg') }}"
                  alt=""
                />
                <h4 class="mb-2 h4 font-semibold">Login Gagal</h4>
                <p class="subtitle-1">
                  {{ $message }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
