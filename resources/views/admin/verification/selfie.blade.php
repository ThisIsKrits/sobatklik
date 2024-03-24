@extends('layouts.app')

@section('content')
<div class="authentication-wrapper authentication-basic h-custom">
    <!-- Register -->
    <div class="card card-login d-flex justify-content-center">
        <div class="card-body pad-y-xl md:mx-4">
            <div
                class="app-brand flex-column justify-content-center my-3"
            >
                <a href="{{ route('home') }}" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <img
                            src="{{ asset('/dashboard/assets/img/elements/logo-default.png') }}"
                            alt=""
                        />
                    </span>
                </a>

                <!-- /Logo -->
                <div class="card my-3">
                    <img
                        src="{{ asset('/dashboard/assets/img/elements/Maps.png') }}"
                        alt=""
                    />
                </div>
                <h3 class="mb-3 font-semibold">
                    Sepertinya kamu login diluar radius
                </h3>

                <p class="mb-3 subtitle-2">
                    Silahkan lakukan login di lokasi kerja Brandmu,
                    atau lakukan selfie
                </p>

                <button
                    class="btn btn-primary mb-3"
                    type="button"
                    id="BtnSelfie"
                    data-bs-toggle="modal"
                    data-bs-target="#modalSelfie"
                >
                    Lakukan Selfie
                </button>
                <span class="mb-3 subtitle-1 cursor-pointer" id="logoutBtn">
                    Logout
                </span>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSelfie" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                                    <div class="selfie-area text-center" id="selfie-area">
                                        <video id="video" width="100%" height="auto" autoplay></video>
                                        <img id="previewImage" src="#" alt="Preview Image" style="display: none;">
                                    </div>
                                </div>
                                <button  class="btn btn-outline-primary" id="image" onclick="take_snapshot()">
                                <div class="d-flex align-items-center gap-2">
                                        <img
                                            src="{{ asset('/dashboard/assets/img/icons/iconly/Camera.svg') }}"
                                            alt=""
                                        />
                                        Ambil foto
                                    </div>
                                </button>

                                <form action="{{ route('save.store') }}" method="POST">
                                    @csrf
                                    <div class="app-brand flex-column justify-content-center" id="send" style="display: none;">
                                        <input type="hidden" name="name" class="image-tag" value="">
                                        <button class="btn btn-primary" type="submit">
                                            <div class="d-flex align-items-center gap-2">
                                                Kirim Foto
                                            </div>
                                        </button>
                                        <span class="mt-3 mb-2 subtitle-1 cursor-pointer" id="reset">
                                            Ulangi
                                        </span>
                                    </div>
                                </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDeny" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card">
                <div class="card-header ms-auto">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                    <div class="card-body my-4 mx-5">
                        <!-- Logo -->
                        <div class="d-flex flex-column align-items-center my-3">
                            <!-- /Logo -->
                            <div class="my-3">
                                <img
                                    src="{{ asset('/dashboard/assets/img/icons/iconly/Camera-Off.svg') }}"
                                    alt=""
                                />
                            </div>
                            <h3 class="mb-3 font-semibold">
                                Kamera Tidak Aktif
                            </h3>

                            <p class="mb-3 subtitle-2">
                                Silahkan aktifkan kamera pada browser Anda
                            </p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>


    function startWebcam() {
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function(stream) {
                var video = document.getElementById('video');
                if (video) {
                    video.srcObject = stream;
                    video.play();
                }
            })
            .catch(function(err) {
                $('#modalDeny').modal('show');
            });
    }

    function stopWebcam() {
        var video = document.getElementById('video');
        if (video && video.srcObject) {
            var stream = video.srcObject;
            var tracks = stream.getTracks();

            tracks.forEach(function(track) {
                track.stop(); // Menghentikan setiap track kamera
            });

            video.srcObject = null; // Membebaskan sumber video
        }
    }

    function take_snapshot() {
        var canvas = document.createElement('canvas');
        var video = document.getElementById('video');
        var context = canvas.getContext('2d');

        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        var imageData = canvas.toDataURL('image/jpeg', 0.9);

        $(".image-tag").val(imageData);

        var previewImage = document.getElementById('previewImage');
        previewImage.src = imageData;
        previewImage.style.display = 'block';

        video.style.display = 'none';

        $('#image').hide();
        $('#send').show();
    }



    $('#modalSelfie').on('shown.bs.modal', function () {
        startWebcam('.selfie-area');
    });

    $('#modalSelfie').on('hidden.bs.modal', function() {
        stopWebcam()
    });

    $('#reset').on('click', function() {
        $('#image').show();

        $('#send').hide();

        $('#video').show();
        $('#previewImage').hide();

        startWebcam();
    });

    $(document).ready(function() {
        $('#logoutBtn').on('click', function() {
            // Buat elemen form secara dinamis
            var form = $('<form>', {
                'method': 'POST',
                'action': '{{ route("auth.logout") }}'
            });

            // Tambahkan input _token untuk keamanan CSRF
            var token = $('<input>', {
                'type': 'hidden',
                'name': '_token',
                'value': '{{ csrf_token() }}'
            });

            // Tambahkan input _method untuk metode POST
            var method = $('<input>', {
                'type': 'hidden',
                'name': '_method',
                'value': 'POST'
            });

            // Append token dan method ke dalam form
            form.append(token, method);

            // Append form ke dalam body dan submit form
            $('body').append(form);
            form.submit();
        });
    });
</script>
@endpush
