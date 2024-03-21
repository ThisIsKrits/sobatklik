<!-- Modal Filter -->
<div class="modal fade" id="modalFilter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-4">
            <div class="modal-header p-0">
                <h4 class="mb-0 mt-4 ms-4">Filter</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="filterForm">
                    <div class="mb-3 w-100">
                        <label for="status" class="form-label">Status <span>*</span></label>
                        <select class="form-select" id="status" aria-label="Default select example">
                            <option value="">Status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fs-5 bg-label-danger cursor-pointer font-semibold"></span>
                        <button class="mb-2 btn btn-primary btn-md" type="submit">Filter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
