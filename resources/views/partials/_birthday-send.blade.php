<div class="mb-3 container-xxl navbar navbar-expand-xl navbar-detached  d-flex justify-content-between bg-primary-weak rounded-4 py-3">
    <div class="d-flex align-items-center gap-2">
        <img class="w-px-50 h-auto rounded-circle" src="{{ asset('dashboard/assets/img/avatars/6.png') }}" alt="">
        <h6 class="mb-0 text-general">Admin {{ $user->fullname }} sedang berulang tahun hari ini yang ke-{{ $age }}
        </h6>
    </div>
    <button class="btn btn-primary" type="button"
    data-bs-toggle="modal"
    data-bs-target="#modalFormBirthday">
        Kirim Ucapan
    </button>
</div>
