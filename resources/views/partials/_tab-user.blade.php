<div
    class="tab-pane fade show active"
    id="navs-info-user"
    role="tabpanel"
>
    <div class="ms-2">
        <div class="row mb-3">
            <div
                class="col-12 col-md-3"
            >
                <p
                    class="font-normal"
                >
                    Nama
                </p>
            </div>
            <div
                class="col-12 col-md-9"
            >
                <p
                    class="font-normal"
                >
                    {{ $data->fullname}}
                </p>
            </div>
        </div>
        <div class="row mb-3">
            <div
                class="col-12 col-md-3"
            >
                <p
                    class="font-normal"
                >
                    Nickname
                </p>
            </div>
            <div
                class="col-12 col-md-9"
            >
                <p
                    class="font-normal"
                >
                    {{ $data->nickname }}
                </p>
            </div>
        </div>
        <div class="row mb-3">
            <div
                class="col-12 col-md-3"
            >
                <p
                    class="font-normal"
                >
                    Email
                </p>
            </div>
            <div
                class="col-12 col-md-9"
            >
                <p
                    class="font-normal"
                >
                    {{  $data->email }}
                </p>
            </div>
        </div>
        <div class="row mb-3">
            <div
                class="col-12 col-md-3"
            >
                <p
                    class="font-normal"
                >
                    Tanggal
                    Lahir
                </p>
            </div>
            <div
                class="col-12 col-md-9"
            >
                <p
                    class="font-normal"
                >
                    {{ $data->birthdate }}
                </p>
            </div>
        </div>
        <div class="row mb-3">
            <div
                class="col-12 col-md-3"
            >
                <p
                    class="font-normal"
                >
                    Brand
                </p>
            </div>
            <div
                class="col-12 col-md-9"
            >
                <p
                    class="font-normal"
                >
                    {{ $data->brand_id }}
                </p>
            </div>
        </div>
        <div class="row mb-3">
            <div
                class="col-12 col-md-3"
            >
                <p
                    class="font-normal"
                >
                    Role
                </p>
            </div>
            <div
                class="col-12 col-md-9"
            >
                <p
                    class="font-normal"
                >
                    {{ $data->roles[0]->name }}
                </p>
            </div>
        </div>
    </div>
</div>
