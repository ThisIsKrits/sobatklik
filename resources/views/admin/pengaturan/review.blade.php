@extends('layouts.reviews')

@section('title', 'Review')

@section('content')
        <div class="row justify-content-center">
            <div class="col-12 col-md-7">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-3 p-md-5">
                        <div class="text-center mb-2">
                            <img
                                src="{{ asset('/storage/uploads/logo/'. $brand->logo) }}"
                                width="150"
                                height="150"
                                alt=""
                            />
                        </div>
                        <div
                            class="d-flex align-items-center justify-content-center"
                        >
                            <h4
                                class="h35 col-12 col-md-10 col-xl-8 text-center"
                            >
                                Beri Penilaian Agent {{ $user->fullname }}
                                <span class="text-primary"
                                    >{{ $brand->name }}</span
                                >
                            </h4>
                        </div>
                        <div class="mx-3">
                        <form action="{{ route('submit.review') }}" method="POST">
                            @csrf
                            <input type="hidden" name="admin_id" value="{{$user->id}}">
                            <div class="mb-4">
                                <p class="mb-1 text-general subtitle-1">
                                    Kejelasan informasi yang anda terima
                                </p>
                                <div class="px-0" id="rating1" data-input="review1"></div>
                                <input type="hidden" name="review1" id="input-review1">
                            </div>
                            <div class="mb-4">
                                <p class="mb-1 text-general subtitle-1">
                                    Kecepatan tim admin memberikan
                                    respon
                                </p>
                                <div class="px-0" id="rating2" data-input="review2"></div>
                                <input type="hidden" name="review2" id="input-review2">
                            </div>
                            <div class="mb-4">
                                <p class="mb-1 text-general subtitle-1">
                                    Pemberian informasi dan solusi
                                    terhadap permasalahan anda
                                </p>
                                <div class="px-0" id="rating3" data-input="review3"></div>
                                <input type="hidden" name="review3" id="input-review3">
                            </div>
                            <div class="mb-4">
                                <p class="mb-1 text-general subtitle-1">
                                    Apakah anda mau merekomendasikan
                                    biro kami atas layanan yang tim
                                    admin berikan kepada anda
                                </p>
                                <div class="px-0" id="rating4" data-input="review4"></div>
                                <input type="hidden" name="review4" id="input-review4">
                            </div>
                            <div class="mb-4">
                                <textarea
                                    type="text"
                                    class="form-control"
                                    id="keluhan"
                                    rows="3"
                                    name="response"
                                    placeholder="Beri kami Masukan"
                                ></textarea>
                            </div>
                            <div class="mb-4">
                                <button class="btn btn-primary w-100">
                                    Kirim Masukan
                                </button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('scripts')
    <script>
       $(function () {
            $("#rating1").rateYo({
                rating: 0,
                fullStar: true,
                spacing: "4px",
                onSet: function (rating, rateYoInstance) {
                    $('#input-review1').val(rating);
                },
            });
            $("#rating2").rateYo({
                rating: 0,
                fullStar: true,
                spacing: "4px",
                onSet: function (rating, rateYoInstance) {
                    $('#input-review2').val(rating);
                },
            });
            $("#rating3").rateYo({
                rating: 0,
                fullStar: true,
                spacing: "4px",
                onSet: function (rating, rateYoInstance) {
                    $('#input-review3').val(rating);
                },
            });
            $("#rating4").rateYo({
                rating: 0,
                fullStar: true,
                spacing: "4px",
                onSet: function (rating, rateYoInstance) {
                    $('#input-review4').val(rating);
                },
            });
        });
    </script>
@endpush
