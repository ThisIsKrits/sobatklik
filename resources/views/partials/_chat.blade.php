@if (isset($responses))
@foreach ($responses as $index => $response)
<div class="row mb-4">
    <div class="col">
        <div class="card @if ($index % 2 == 0) bg-primary-weak @endif rounded rounded">
            <div class="card-body px-3">
                <div
                    class="d-flex align-items-center justify-content-between"
                >
                    <div
                        class="d-flex align-items-center gap-3"
                    >
                        <img
                            class="w-px-50 h-auto rounded-circle"
                            src="{{ asset('/dashboard/assets/img/avatars/6.png') }}"
                            alt=""
                        />
                        <div>
                            <p class="font-medium">
                                {{ $response->users->fullname }}
                            </p>
                            @if ($response->users->roles->isNotEmpty())
                                <span class="subtitle-1 font-normal">{{ $response->users->roles->first()->name }}</span>
                            @else
                                <span class="subtitle-1 font-normal">Tidak ada peran</span>
                            @endif
                        </div>
                    </div>
                    <p
                        class="subtitle-1 font-normal"
                    >
                        {{ \Carbon\Carbon::parse($response->report_date)->format('d M Y H:i:s') }}
                    </p>
                </div>
                <hr />
                <p class="font-normal">
                    {{ $response->content }}
                </p>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif

