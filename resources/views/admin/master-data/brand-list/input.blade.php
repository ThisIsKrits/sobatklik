@extends('layouts.dashboard')

@section('title', 'Tambah Kategori Sosial Media')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-row justify-content-between align-items-center pb-4">
        <div class="d-flex align-items-center">
            <a
                href="{{ route('data-brand.index') }}"
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
                                            <form
                                                id="formAuthentication"
                                                class="mb-3"
                                                action="index.html"
                                                method="POST"
                                            >
                                                <form>
                                                    <div class="mb-3 w-100">
                                                        <label
                                                            for="code"
                                                            class="form-label"
                                                            >Kode Brand
                                                            <span
                                                                >*</span
                                                            ></label
                                                        >
                                                        <input
                                                            class="form-control"
                                                            name="brandCode"
                                                            placeholder="Masukan Kode Brand"
                                                            id="code"
                                                        />
                                                    </div>
                                                    <div class="mb-3 w-100">
                                                        <label
                                                            for="brandName"
                                                            class="form-label"
                                                            >Nama Brand
                                                            <span
                                                                >*</span
                                                            ></label
                                                        >
                                                        <input
                                                            class="form-control"
                                                            name="brandName"
                                                            placeholder="Masukan Nama Brand"
                                                            id="brandName"
                                                        />
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
                                                            name="taglineBrand"
                                                            placeholder="Masukan Tagline Brand"
                                                            id="taglineBrand"
                                                        />
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

                                                                <img
                                                                    style="
                                                                        display: none;
                                                                        max-width: 104px;
                                                                        border-radius: 8px;
                                                                    "
                                                                    id="resultImage"
                                                                    src=""
                                                                    alt="Cropped Image"
                                                                />

                                                                <div
                                                                    class="input-file"
                                                                    id="input-logo"
                                                                >
                                                                    <div
                                                                        class="file-upload"
                                                                    >
                                                                        <input
                                                                            type="file"
                                                                            accept="image/*"
                                                                            id="brandLogo"
                                                                        />
                                                                        <img
                                                                            src="../assets//img/icons/iconly/Plus-general.svg"
                                                                            alt=""
                                                                        />
                                                                        <p>
                                                                            Upload
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-12 col-md-4"
                                                        >
                                                            <div
                                                                class="d-flex flex-column"
                                                            >
                                                                <label
                                                                    for="brand"
                                                                    class="form-label"
                                                                    >Maskot
                                                                    Brand
                                                                    <span
                                                                        >*</span
                                                                    ></label
                                                                >

                                                                <img
                                                                    style="
                                                                        display: none;
                                                                        max-width: 104px;
                                                                        border-radius: 8px;
                                                                    "
                                                                    id="resultMaskot"
                                                                    src=""
                                                                    alt="Maskot Image"
                                                                />

                                                                <div
                                                                    class="input-file"
                                                                    id="input-maskot"
                                                                >
                                                                    <div
                                                                        class="file-upload"
                                                                    >
                                                                        <input
                                                                            type="file"
                                                                            accept="image/*"
                                                                            id="brandMaskot"
                                                                        />
                                                                        <img
                                                                            src="../assets//img/icons/iconly/Plus-general.svg"
                                                                            alt=""
                                                                        />
                                                                        <p>
                                                                            Upload
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-5">
                                                        <p
                                                            class="mb-3 font-semibold"
                                                        >
                                                            Alamat
                                                        </p>
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
                                                                    src="../assets/img/icons/iconly/Plus-outline.svg"
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
                                                                    src="../assets/img/icons/iconly/Plus-outline.svg"
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
                                                                    src="../assets/img/icons/iconly/Plus-outline.svg"
                                                                    alt=""
                                                                />
                                                                Tambah Sosial
                                                                Media
                                                            </div>
                                                        </button>
                                                    </div>
                                                    <button
                                                        class="mb-2 btn btn-primary btn-md"
                                                        type="submit"
                                                    >
                                                        Simpan
                                                    </button>
                                                </form>
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
        console.log('Modal tampil');
        if (cropper) {
            cropper.destroy();
        }

        cropper = new Cropper(image, {
            aspectRatio: 1/1,
            viewMode: 3,
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
        console.log('Modal hidden');
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

    // Add address form
    const addAddress = () => {
                let container = document.getElementById("container");

                let inputDiv = document.createElement("div");
                inputDiv.className = "mb-4 w-100 d-flex";

                let input = document.createElement("input");
                input.type = "text";
                input.name = "address";
                input.className = "form-control";

                let deleteButton = document.createElement("i");
                deleteButton.className =
                    "ri-close-circle-fill cursor-pointer ic-md text-danger ms-1";
                deleteButton.onclick = function () {
                    container.removeChild(inputDiv);
                };

                inputDiv.appendChild(input);
                inputDiv.appendChild(deleteButton);

                container.appendChild(inputDiv);
            };

            //Add contact form
            const addContact = () => {
                const container = document.getElementById("contactContainer");

                const rowDiv = document.createElement("div");
                rowDiv.className = "row gap-1 mb-3";
                container.appendChild(rowDiv);

                const colDiv1 = document.createElement("div");
                colDiv1.className = "col-12 col-md-3";
                rowDiv.appendChild(colDiv1);

                const label1 = document.createElement("label");
                label1.textContent = "Jenis Kontak";
                label1.className = "form-label";
                colDiv1.appendChild(label1);

                const select1 = document.createElement("select");
                select1.className = "form-select";
                select1.id = "jenisSosmed";
                select1.setAttribute("aria-label", "Default select example");
                colDiv1.appendChild(select1);

                const option1 = document.createElement("option");
                option1.text = "Jenis Kontak";
                option1.selected = true;
                select1.appendChild(option1);
                ["One", "Two", "Three"].forEach((optionText) => {
                    const option = document.createElement("option");
                    option.value = optionText;
                    option.text = optionText;
                    select1.appendChild(option);
                });

                const colDiv2 = document.createElement("div");
                colDiv2.className = "col-12 col-md-4";
                rowDiv.appendChild(colDiv2);

                const label2 = document.createElement("label");
                label2.textContent = "Label";
                label2.className = "form-label";
                colDiv2.appendChild(label2);

                const input1 = document.createElement("input");
                input1.className = "form-control";
                input1.name = "sosmedLabel";
                input1.placeholder = "Label";
                input1.id = "label";
                colDiv2.appendChild(input1);

                const colDiv3 = document.createElement("div");
                colDiv3.className = "col-12 col-md-4";
                rowDiv.appendChild(colDiv3);

                const label3 = document.createElement("label");
                label3.textContent = "Link";
                label3.className = "form-label";
                colDiv3.appendChild(label3);

                const flexDiv = document.createElement("div");
                flexDiv.className = "d-flex";
                colDiv3.appendChild(flexDiv);

                // Membuat input untuk "Kode Brand"
                const input2 = document.createElement("input");
                input2.className = "form-control";
                input2.name = "link";
                input2.placeholder = "Link";
                input2.id = "link";
                flexDiv.appendChild(input2);

                // Membuat ikon untuk menghapus
                const deleteIcon = document.createElement("i");
                deleteIcon.className =
                    "ri-close-circle-fill cursor-pointer ic-md text-danger ms-1";
                deleteIcon.addEventListener("click", () => {
                    container.removeChild(rowDiv);
                });
                flexDiv.appendChild(deleteIcon);
            };

            //Add sosmed form
            const addSosmed = () => {
                const container = document.getElementById("sosmedContainer");

                const rowDiv = document.createElement("div");
                rowDiv.className = "row gap-1 mb-3";
                container.appendChild(rowDiv);

                const colDiv1 = document.createElement("div");
                colDiv1.className = "col-12 col-md-3";
                rowDiv.appendChild(colDiv1);

                const label1 = document.createElement("label");
                label1.textContent = "Jenis Sosmed";
                label1.className = "form-label";
                colDiv1.appendChild(label1);

                const select1 = document.createElement("select");
                select1.className = "form-select";
                select1.id = "jenisSosmed";
                select1.setAttribute("aria-label", "Default select example");
                colDiv1.appendChild(select1);

                const option1 = document.createElement("option");
                option1.text = "Jenis Sosmed";
                option1.selected = true;
                select1.appendChild(option1);
                ["One", "Two", "Three"].forEach((optionText) => {
                    const option = document.createElement("option");
                    option.value = optionText;
                    option.text = optionText;
                    select1.appendChild(option);
                });

                const colDiv2 = document.createElement("div");
                colDiv2.className = "col-12 col-md-4";
                rowDiv.appendChild(colDiv2);

                const label2 = document.createElement("label");
                label2.textContent = "Label";
                label2.className = "form-label";
                colDiv2.appendChild(label2);

                const input1 = document.createElement("input");
                input1.className = "form-control";
                input1.name = "sosmedLabel";
                input1.placeholder = "Label";
                input1.id = "label";
                colDiv2.appendChild(input1);

                const colDiv3 = document.createElement("div");
                colDiv3.className = "col-12 col-md-4";
                rowDiv.appendChild(colDiv3);

                const label3 = document.createElement("label");
                label3.textContent = "Link";
                label3.className = "form-label";
                colDiv3.appendChild(label3);

                const flexDiv = document.createElement("div");
                flexDiv.className = "d-flex";
                colDiv3.appendChild(flexDiv);

                // Membuat input untuk "Kode Brand"
                const input2 = document.createElement("input");
                input2.className = "form-control";
                input2.name = "link";
                input2.placeholder = "Link";
                input2.id = "link";
                flexDiv.appendChild(input2);

                // Membuat ikon untuk menghapus
                const deleteIcon = document.createElement("i");
                deleteIcon.className =
                    "ri-close-circle-fill cursor-pointer ic-md text-danger ms-1";
                deleteIcon.addEventListener("click", () => {
                    container.removeChild(rowDiv);
                });
                flexDiv.appendChild(deleteIcon);
            };

</script>
@endpush
