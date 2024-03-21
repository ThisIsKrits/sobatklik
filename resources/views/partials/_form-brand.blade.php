<div class="card-body px-3">
    @if (isset($brand))
        <form id="formAuthentication" class="mb-3" action="{{ route('data-brand.update',$brand->id) }}" method="POST">
        @method('PUT')
    @else
        <form id="formAuthentication" class="mb-3" action="{{ route('data-brand.store') }}" method="POST" >
    @endif
        @csrf
            <div class="mb-3 w-100">
                <label  for="code" class="form-label">Kode Brand
                    <span>*</span>
                </label>
                <input class="form-control" name="kode_brand" value="{{old('kode_brand', $brand->kode_brand ?? '')}}" placeholder="Masukan Kode Brand" id="code"/>
                @error('kode_brand')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 w-100">
                <label for="brandName" class="form-label">
                    Nama Brand
                    <span>*</span>
                </label>
                <input
                    class="form-control"
                    name="name"
                    placeholder="Masukan Nama Brand"
                    value="{{old('name', $brand->name ?? '')}}"
                    id="brandName"
                />
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 w-100">
                <label
                    for="taglineBrand"
                    class="form-label"
                    >Tagline Brand
                    <span
                        >*</span
                    ></label
                >
                <input
                    class="form-control"
                    name="tagline"
                    value="{{old('tagline', $brand->tagline ?? '')}}"
                    placeholder="Masukan Tagline Brand"
                    id="taglineBrand"
                />
                @error('tagline')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="row gap-3 mb-5">
                <div
                    class="col-12 col-md-4"
                >
                    <div
                        class="d-flex flex-column"
                    >
                        <label
                            for="brand"
                            class="form-label"
                            >Logo Brand
                            <span
                                >*</span
                            ></label
                        >
                        <div class="input-file" id="input-logo">
                            <div class="file-upload">
                                <input type="file" accept="image/*" name="logo" class="image-logo">
                                <input type="hidden" name="image_logo" accept="image/*">
                                <img src="{{ asset('/dashboard/assets/img/icons/iconly/Plus-general.svg') }}" class="text-upload-logo" alt=""  style="display: {{ isset($brand) && $brand->logo ? 'none' : '' }};"/>
                                <input type="file" name="logo" class="image-logo" accept="image/*"/>
                                <img src="{{ isset($brand) && $brand->logo ? asset('storage/uploads/logo/' . $brand->logo) : '' }}" alt="" class="show-image-logo" style="display: {{ isset($brand) && $brand->logo ? 'block' : 'none' }};max-width: 104px;
                                    border-radius: 8px;"/>
                                <p class="text-upload-logo" style="display: {{ isset($brand) && $brand->logo ? 'none' : '' }};">Upload</p>
                            </div>
                        </div>
                        @error('image_logo')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="brand" class="form-label" >
                            Maskot Brand
                            <span >*</span>
                        </label>
                        <div class="input-file" id="input-maskot">
                            <div class="file-upload">
                                <input type="file" accept="image/*" name="maskot" class="image-maskot">
                                <input type="hidden" name="image_maskot" accept="image/*">
                                <img src="{{ asset('/dashboard/assets/img/icons/iconly/Plus-general.svg') }}" class="text-upload-maskot" alt=""  style="display: {{ isset($brand) && $brand->maskot ? 'none' : '' }};"/>
                                <input type="file" name="maskot" class="image-maskot" accept="image/*"/>
                                <img src="{{ isset($brand) && $brand->maskot ? asset('storage/uploads/maskot/' . $brand->maskot) : '' }}" alt="" class="show-image-maskot" style="display: {{ isset($brand) && $brand->maskot ? 'block' : 'none' }};max-width: 104px;
                                    border-radius: 8px;"/>
                                <p class="text-upload-maskot" style="display: {{ isset($brand) && $brand->maskot ? 'none' : '' }};">Upload</p>
                            </div>
                        </div>
                        @error('image_maskot')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <p
                    class="mb-3 font-semibold"
                >
                    Alamat
                </p>
                @error('address')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <div
                    id="container"
                ></div>
                <button
                    class="btn btn-outline-placeholder w-100"
                    type="button"
                    onclick="addAddress()"
                >
                    <div
                        class="d-flex align-items-center justify-content-center gap-2"
                    >
                        <img
                            src="{{ asset('/dashboard/assets/img/icons/iconly/Plus-outline.svg') }}"
                            alt=""
                        />
                        Tambah Alamat
                        baru
                    </div>
                </button>
            </div>

            <div class="mb-5">
                <p
                    class="mb-3 font-semibold"
                >
                    Kontak
                </p>
                @error('label_contact')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <div
                    id="contactContainer"
                ></div>
                <button
                    class="btn btn-outline-placeholder w-100"
                    type="button"
                    onclick="addContact()"
                >
                    <div
                        class="d-flex align-items-center justify-content-center gap-2"
                    >
                        <img
                            src="{{ asset('/dashboard/assets/img/icons/iconly/Plus-outline.svg') }}"
                            alt=""
                        />
                        Tambah Kontak
                        baru
                    </div>
                </button>
            </div>
            <div class="mb-5">
                <p
                    class="mb-3 font-semibold"
                >
                    Sosial Media
                </p>
                @error('label_sosmed')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <div
                    id="sosmedContainer"
                ></div>
                <button
                    class="btn btn-outline-placeholder w-100"
                    type="button"
                    onclick="addSosmed()"
                >
                    <div
                        class="d-flex align-items-center justify-content-center gap-2"
                    >
                        <img
                            src="{{ asset('/dashboard/assets/img/icons/iconly/Plus-outline.svg') }}"
                            alt=""
                        />
                        Tambah Sosial
                        Media
                    </div>
                </button>
            </div>
            <div class="mb-5">
                <div class="form-check form-switch">
                    <input class="form-check-input" name="status"
                    type="checkbox" id="toggleSwitch" data-toggle="toggle" data-on="1" data-off="0" value="{{old('status', $brand->status ?? '')}}"
                    @if (isset($brand) && $brand->status == 1)
                    checked
                    @endif>
                    <label class="form-check-label" for="toggleSwitch">
                        <i class="far fa-square text-secondary" id="uncheckedIcon"></i>
                        <i class="fas fa-check-square text-success d-none" id="checkedIcon"></i>
                    </label>
                    <label for="toggleSwitch" class="mt-2 ml-2">Status Aktif?</label>
                </div>
            </div>
            <button
                class="mb-2 btn btn-primary btn-md"
                type="submit"
            >
                Simpan
            </button>
    </form>
</div>
