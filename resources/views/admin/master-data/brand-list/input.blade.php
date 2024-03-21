@extends('layouts.dashboard')

@section('title', 'Brand')

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
                @if (isset($brand))
                    Edit Brand
                @else
                    Tambah Brand
                @endif
            </h3>
        </div>
    </div>
    <!-- Main Content -->

    <div class="row mb-4">
        <div class="col">
            <div class="card">
                @include('partials._form-brand')
            </div>
        </div>
    </div>
</div>

@include('partials._modal-logo')

@include('partials._modal-maskot')

@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
<script>
    var $modalLogo = $('#modal-logo');
    var $modalMaskot = $('#modal-maskot');
    var imageLogo = document.getElementById('image-logo');
    var imageMaskot = document.getElementById('image-maskot');
    var cropperLogo;
    var cropperMaskot;
    var croppedCanvas;

    $(".image-logo").on("change", function(e){
        var files = e.target.files;
        var done = function (url) {
            imageLogo.src = url;
            $modalLogo.modal('show');
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

    $modalLogo.on('shown.bs.modal', function () {
        if (cropperLogo) {
            cropperLogo.destroy();
        }

        cropperLogo = new Cropper(imageLogo, {
            aspectRatio: 1/1,
            viewMode: 3,
            preview: '.preview',
        });

        $('#range').on('input', function() {
            var value = $(this).val();
            $('#cropWidth').val(value);
            $('#cropHeight').val(value);
            cropperLogo.setCropBoxData({ width: value, height: value });
            var zoomLevel = parseFloat(value) / 100;
            cropperLogo.zoomTo(zoomLevel);
        });
    }).on('hidden.bs.modal', function () {
        $('.image-logo').val('');
        if (cropperLogo) {
            cropperLogo.destroy();
            cropperLogo = null;
        }
    });

    $("#cropLogo").click(function(){
        if (cropperLogo) {
            canvas = cropperLogo.getCroppedCanvas({
                width: 512,
                height: 512,
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        var base64data = reader.result;
                        $("input[name='image_logo']").val(base64data);
                        $(".show-image-logo").show();
                        $(".text-upload-logo").hide();
                        $(".show-image-logo").attr("src",base64data);
                        $("#modal-logo").modal('toggle');
                    }
            });
        }
    });

    $(".image-maskot").on("change", function(e){
        var files = e.target.files;
        var done = function (url) {
            imageMaskot.src = url;
            $modalMaskot.modal('show');
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

    $modalMaskot.on('shown.bs.modal', function () {
        if (cropperMaskot) {
            cropperMaskot.destroy();
        }

        cropperMaskot = new Cropper(imageMaskot, {
            aspectRatio: 1/1,
            viewMode: 3,
            preview: '.preview',
        });

        $('#range').on('input', function() {
            var value = $(this).val();
            $('#cropWidth').val(value);
            $('#cropHeight').val(value);
            cropperMaskot.setCropBoxData({ width: value, height: value });
            var zoomLevel = parseFloat(value) / 100; // Ubah rentang 100-500 menjadi 0.33-1.67
            cropperMaskot.zoomTo(zoomLevel);
        });
    }).on('hidden.bs.modal', function () {
        console.log('Modal hidden');
        $('.image').val('');
        if (cropperMaskot) {
            cropperMaskot.destroy();
            cropperMaskot = null;
        }
    });

    $("#cropMaskot").click(function(){
        if (cropperMaskot) {
            canvas = cropperMaskot.getCroppedCanvas({
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
                        $("input[name='image_maskot']").val(base64data);
                        $(".show-image-maskot").show();
                        $(".text-upload-maskot").hide();
                        $(".show-image-maskot").attr("src",base64data);
                        $("#modal-maskot").modal('toggle');
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

    const contact =  {!!$contacts!!}
    const sosmed  = {!!$sosmeds!!}

    const addressBrand = {!! isset($addressBrand) ? json_encode($addressBrand) : 'null' !!};
    const contactBrand = {!! isset($contactBrand) ? json_encode($contactBrand) : 'null' !!};
    const sosmedBrand = {!! isset($sosmedBrand) ? json_encode($sosmedBrand) : 'null' !!};

    var countAddress    = 0;
    var countSosmed     = 0;
    var countContact    = 0;


    const addAddress = () => {
        let container = document.getElementById("container");

        const rowDiv = document.createElement("div");
        rowDiv.className = "row gap-1 mb-3";
        rowDiv.id         = "input-"+countAddress;
        container.appendChild(rowDiv);

        const colDiv1 = document.createElement("div");
        rowDiv.appendChild(colDiv1);

        let inputId = document.createElement("input");
        inputId.type = "hidden";
        inputId.name = "id[]";
        colDiv1.appendChild(inputId);

        const colDiv2 = document.createElement("div");
        colDiv2.className = "col-12 col-md-5";
        rowDiv.appendChild(colDiv2);

        const label2 = document.createElement("label");
        label2.textContent = "Long";
        label2.className = "form-label";
        colDiv2.appendChild(label2);

        const input1 = document.createElement("input");
        input1.className = "form-control";
        input1.name = "long[]";
        input1.placeholder = "long";
        input1.id = "long[]";
        colDiv2.appendChild(input1);

        const colDiv3 = document.createElement("div");
        colDiv3.className = "col-12 col-md-5";
        rowDiv.appendChild(colDiv3);

        const label3 = document.createElement("label");
        label3.textContent = "Lat";
        label3.className = "form-label";
        colDiv3.appendChild(label3);

        const flexDiv = document.createElement("div");
        flexDiv.className = "d-flex";
        colDiv3.appendChild(flexDiv);

        const input2 = document.createElement("input");
        input2.className = "form-control";
        input2.name = "lat[]";
        input2.placeholder = "Lat";
        input2.id = "lat[]";
        flexDiv.appendChild(input2);


        const deleteIcon = document.createElement("i");
        deleteIcon.className =
            "ri-close-circle-fill cursor-pointer ic-md text-danger ms-1";
        deleteIcon.addEventListener("click", () => {
            container.removeChild(rowDiv);
        });
        flexDiv.appendChild(deleteIcon);

        if (addressBrand && countAddress < addressBrand.length) {
            inputId.value = addressBrand[countAddress]['id'];
            input1.value = addressBrand[countAddress]['long'];
            input2.value = addressBrand[countAddress]['lat'];
        } else {
            input1.value = '';
            input2.value = '';
        }

        countAddress++;
    };

    //Add contact form
    const addContact = () => {

        const container = document.getElementById("contactContainer");

        const rowDiv = document.createElement("div");
        rowDiv.className = "row gap-1 mb-3";
        rowDiv.id         = "input-"+countContact;
        container.appendChild(rowDiv);

        let inputId = document.createElement("input");
        inputId.type = "hidden";
        inputId.name = "idContact[]";
        inputId.className = "form-control";

        const colDiv1 = document.createElement("div");
        colDiv1.className = "col-12 col-md-3";
        rowDiv.appendChild(colDiv1);

        const label1 = document.createElement("label");
        label1.textContent = "Jenis Kontak";
        label1.className = "form-label";
        colDiv1.appendChild(label1);

        const select1 = document.createElement("select");
        select1.className = "form-select";
        select1.id = "jenisContact";
        select1.name = 'contact_id[]'
        select1.setAttribute("aria-label", "Default select example");
        colDiv1.appendChild(select1);

        const option1 = document.createElement("option");
        option1.text = "Jenis Kontak";
        option1.selected = true;
        option1.disabled = true;
        option1.value = "";
        select1.appendChild(option1);
        contact.forEach((optionText) => {
            const option = document.createElement("option");
            option.value = optionText['id'];
            option.text = optionText['name'];
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
        input1.name = "label_contact[]";
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
        input2.name = "link_contact[]";
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
        flexDiv.appendChild(inputId);

        if (contactBrand && countContact < contactBrand.length) {

            const selectedContactId = contactBrand[countContact]['contact_id'];

            inputId.value = contactBrand[countContact]['id'];
            for (let i = 0; i < select1.options.length; i++) {
                if (select1.options[i].value == selectedContactId) {
                    select1.options[i].selected = true;
                    break;
                }

            }
            input1.value = contactBrand[countContact]['label'];
            input2.value = contactBrand[countContact]['link'];
        }

        countContact++;
    };

    //Add sosmed form
    const addSosmed = () => {
        const container = document.getElementById("sosmedContainer");

        const rowDiv = document.createElement("div");
        rowDiv.className = "row gap-1 mb-3";
        rowDiv.id = "input"+countSosmed;
        container.appendChild(rowDiv);

        let inputId = document.createElement("input");
        inputId.type = "hidden";
        inputId.name = "idSosmed[]";
        inputId.className = "form-control";

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
        select1.name = 'sosmed_id[]';
        select1.setAttribute("aria-label", "Default select example");
        colDiv1.appendChild(select1);

        const option1 = document.createElement("option");
        option1.text = "Jenis Sosmed";
        option1.selected = true;
        option1.disabled = true;
        option1.value = "";
        select1.appendChild(option1);
        sosmed.forEach((optionText) => {
            const option = document.createElement("option");
            option.value = optionText['id'];
            option.text = optionText['name'];
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
        input1.name = "label_sosmed[]";
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
        input2.name = "link_sosmed[]";
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
        flexDiv.appendChild(inputId);

        if (sosmedBrand && countSosmed < sosmedBrand.length) {

            const selectedContactId = sosmedBrand[countSosmed]['sosmed_id'];

            inputId.value = sosmedBrand[countSosmed]['id'];
            for (let i = 0; i < select1.options.length; i++) {
                if (select1.options[i].value == selectedContactId) {
                    select1.options[i].selected = true;
                    break;
                }

            }
            input1.value = sosmedBrand[countSosmed]['label'];
            input2.value = sosmedBrand[countSosmed]['link'];
        }

        countSosmed++;
    };

    document.addEventListener('DOMContentLoaded', function() {
        if(addressBrand){
            addressBrand.forEach(() => {
                addAddress(); // Menambahkan input alamat berdasarkan data lama
            });
        }
        if(contactBrand){
            contactBrand.forEach(() => {
                addContact();
            });
        }
        if(sosmedBrand){
            sosmedBrand.forEach(() => {
                addSosmed();
            });
        }
    });

</script>
@endpush
