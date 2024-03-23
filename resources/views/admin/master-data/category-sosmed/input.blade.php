@extends('layouts.dashboard')

@section('title', 'Tambah Kategori Sosial Media')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-row justify-content-between align-items-center pb-4">
        <div class="d-flex align-items-center">
            <a
                href="{{ route('data-sosmed.index') }}"
                class="text-general"
                ><i class="ri-arrow-left-line fs-1"></i
            ></a>
            <h3 class="ms-1 font-semibold mb-0">
                Tambah Kategori Sosial Media
            </h3>
        </div>
    </div>
    <!-- Main Content -->

    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body px-3">
                    @if (isset($sosmed))
                        <form id="formAuthentication" class="mb-3" action="{{ route('data-sosmed.update',$sosmed->id) }}" method="POST">
                        @method('PUT')
                    @else
                        <form id="formAuthentication" class="mb-3" action="{{ route('data-sosmed.store') }}" method="POST">
                    @endif
                        @csrf
                            <div class="mb-3 w-100">
                                <label for="brand" class="form-label">
                                    Nama Kategori
                                    <span>*</span>
                                </label>
                                <input
                                    class="form-control"
                                    name="name"
                                    value="{{old('name', $sosmed->name ?? '')}}"
                                    placeholder="Masukan Nama Kategori"
                                    id="brand"
                                />
                                @error('name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="brand"class="form-label">
                                    Icon Kategori
                                    <span>*</span>
                                </label>
                                <div class="input-file">
                                    <div class="file-upload">
                                        <input type="file" name="image" class="image">
                                        <input type="hidden" name="image_base64" accept="image/*">
                                        <img src="{{ asset('/dashboard/assets/img/icons/iconly/Plus-general.svg') }}" class="text-upload" alt=""  style="display: {{ isset($sosmed) && $sosmed->icon ? 'none' : '' }};"/>
                                        <input type="file" name="logo" class="image" accept="image/*"/>
                                        <img src="{{ isset($sosmed) && $sosmed->icon ? asset('uploads/' . $sosmed->icon) : '' }}" alt="" class="show-image" style="display: {{ isset($sosmed) && $sosmed->icon ? 'block' : 'none' }};"/>
                                        <p class="text-upload" style="display: {{ isset($sosmed) && $sosmed->icon ? 'none' : '' }};">Upload</p>
                                    </div>
                                </div>
                                @error('image_base64')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="status"
                                    type="checkbox" id="toggleSwitch" data-toggle="toggle" data-on="1" data-off="0" value="{{old('status', $sosmed->status ?? '')}}"
                                    @if (isset($sosmed) && $sosmed->status == 1)
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
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade"></div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card">
                <div class="card-header ms-auto">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="card-body mx-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="my-3">
                            <div class="selfie-area text-center">
                                <img
                                    id="image"
                                    class="w-75 h-75"
                                    src="#"
                                    alt=""
                                />
                            </div>
                            <div class="mt-3">
                                <input type="range" class="form-range" id="range" min="100" max="500" value="250">
                            </div>
                        </div>
                        <button class="mb-3 btn btn-primary d-grid" id="crop">
                            Crop
                        </button>
                        <span class="mb-2 subtitle-1 cursor-pointer">
                            ulangi
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
<script>
    var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;

    $("body").on("change", ".image", function(e){
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };

        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $modal.on('shown.bs.modal', function () {
        if (cropper) {
            cropper.destroy();
        }

        cropper = new Cropper(image, {
            aspectRatio: 1/1,
            viewMode: 1,
            preview: '.preview',
        });

        $('#range').on('input', function() {
            var value = $(this).val();
            $('#cropWidth').val(value);
            $('#cropHeight').val(value);
            cropper.setCropBoxData({ width: value, height: value });
            var zoomLevel = parseFloat(value) / 100; // Ubah rentang 100-500 menjadi 0.33-1.67
            cropper.zoomTo(zoomLevel);
        });
    }).on('hidden.bs.modal', function () {
        $('.image').val('');
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });

    var croppedCanvas;

    $("#crop").click(function(){
        if (cropper) {
            canvas = cropper.getCroppedCanvas({
                width: 512,
                height: 512,
            });

            // Menggunakan croppedCanvas
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        var base64data = reader.result;
                        $("input[name='image_base64']").val(base64data);
                        $(".show-image").show();
                        $(".text-upload").hide();
                        $(".show-image").attr("src",base64data);
                        $("#modal").modal('toggle');
                    }
            });
        }
    });



    document.addEventListener('DOMContentLoaded', function() {
        const toggleSwitch = document.getElementById('toggleSwitch');

        // Set initial value of the checkbox based on $sosmed->status
        toggleSwitch.value = toggleSwitch.checked ? "1" : "0";

        // Add event listener to update checkbox value when changed
        toggleSwitch.addEventListener('change', function() {
            // Set checkbox value to 0 when unchecked and 1 when checked
            this.value = this.checked ? "1" : "0";
        });
    });

</script>
@endpush
