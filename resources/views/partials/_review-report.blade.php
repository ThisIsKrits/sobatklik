@if ($report->status == 2)
<hr class="hr-thin" />
<div class="row mb-3">
    <div class="col-12 col-md-3">
        <p class="font-medium">
            Rata-rata response admin
        </p>
    </div>
    <div class="col-12 col-md-9">
        <p class="font-normal">
            {{ $report->avg }} hari
        </p>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 col-md-3">
        <p class="font-medium">
            Waktu total yang
            dibutuhkan
        </p>
    </div>
    <div class="col-12 col-md-9">
        <p class="font-normal">
            {{ $report->total }} hari
        </p>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 col-md-3">
        <p class="font-medium">
            Kejelasan informasi yang
            anda terima
        </p>
    </div>
    <div class="col-12 col-md-9">
        @for ($i = 0 ; $i < $report->reviews->review1; $i++)
            <img
                src="{{ asset('/dashboard/assets/img/icons/iconly/Star.svg') }}"
                alt=""
            />
        @endfor
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 col-md-3">
        <p class="font-medium">
            Kecepatan tim admin
            memberikan response
        </p>
    </div>
    <div class="col-12 col-md-9">
        @for ($i = 0 ; $i < $report->reviews->review2; $i++)
            <img
                src="{{ asset('/dashboard/assets/img/icons/iconly/Star.svg') }}"
                alt=""
            />
        @endfor
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 col-md-3">
        <p class="font-medium">
            Pemberian informasi dan
            solusi terhadap
            permasalahan anda
        </p>
    </div>
    <div class="col-12 col-md-9">
        @for ($i = 0 ; $i < $report->reviews->review3; $i++)
            <img
                src="{{ asset('/dashboard/assets/img/icons/iconly/Star.svg') }}"
                alt=""
            />
        @endfor
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 col-md-3">
        <p class="font-medium">
            Apakah anda mau
            merekomendasikan biro
            kami atas layanan yang
            tim admin berikan kepada
            anda
        </p>
    </div>
    <div class="col-12 col-md-9">
        @for ($i = 0 ; $i < $report->reviews->review4; $i++)
            <img
                src="{{ asset('/dashboard/assets/img/icons/iconly/Star.svg') }}"
                alt=""
            />
        @endfor
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 col-md-3">
        <p class="font-medium">
            Catatan Client
        </p>
    </div>
    <div class="col-12 col-md-9">
        <p class="font-normal">
            {{ $report->reviews->response }}
        </p>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 col-md-3">
        <p class="font-medium">
            Template Opening
        </p>
    </div>
    <div class="col-12 col-md-9">
        <p class="font-normal">
            {{ $report->opening_text }}
        </p>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 col-md-3">
        <p class="font-medium">
            Template Closing
        </p>
    </div>
    <div class="col-12 col-md-9">
        <p class="font-normal">
            {{ $report->closing_text }}
        </p>
    </div>
</div>
@endif
