<div class="modal fade" id="modalCenterError" tabindex="-1"
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
                <h4 class="mb-2 font-semibold">{{ $message }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
