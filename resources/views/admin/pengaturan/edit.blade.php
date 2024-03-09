@extends('layouts.dashboard')

@section('title', 'Pengaturan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
                            <!-- Content header -->
                            <div
                                class="d-flex flex-row justify-content-between align-items-center pb-4"
                            >
                                <h3 class="ms-1 font-semibold mb-0">
                                    Pengaturan
                                </h3>
                            </div>
                            <!-- Main Content -->

                            <div class="row mb-4">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body px-3">
                                            <form action="{{route('setting.update', ['id' => 1])}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div  class="row gap-1 gap-md-0 mx-0">
                                                    @foreach ($lists as $list)
                                                        <div class="col-3 col-md-1">
                                                            <div class="color d-flex align-items-center justify-content-center" style="background: {{$list->colors}};" onclick="changeRadio({{$list->id}})">
                                                                <input type="radio" id="colorCheck{{$list->id}}" name="theme_id" value="{{$list->id}}" hidden @if ($select->color->colors == $list->colors) checked @endif>
                                                                <i id="icon{{$list->id}}" class="ri-checkbox-circle-fill ic-md text-white" style="display: none;"></i>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                <div class="row gap-1 gap-md-0 mx-0">
                                                    <div class="mt-3">
                                                        <label
                                                            for="brand"
                                                            class="form-label"
                                                            >Syarat dan ketentuan
                                                            <span>*</span></label
                                                        >
                                                        <textarea
                                                            name="term"
                                                            id="text-editor"
                                                        > {{ $term->terms }}</textarea>
                                                    </div>
                                                    <div class="mt-3">
                                                        <div class="mb-3">
                                                            <button
                                                                class="btn btn-primary d-grid"
                                                                type="submit"
                                                            >
                                                                Ubah Pengaturan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

@endsection
@push('scripts')
<script src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
            selector: 'textarea#text-editor',
            toolbar2: 'undo redo | bold italic | alignleft aligncenter alignright | link| styles | fontsize | fontfamily|numlist|bullist',
            toolbar_mode: 'floating',
        });

        function changeRadio(id) {
        $('.ri-checkbox-circle-fill').hide();
        $('#icon' + id).show();
        $('#colorCheck' + id).prop('checked', true);
        $('input[name="theme_id"]').not('#colorCheck' + id).prop('checked', false);
    }

    $(document).ready(function() {
        function showDefaultIcon() {
            $('input[name="theme_id"]').each(function() {
                if ($(this).prop('checked')) {
                    var radioId = this.id.substr(10);
                    var iconId = 'icon' + radioId;
                    var icon = $('#' + iconId);
                    if (icon.length > 0) {
                        icon.show();
                    } else {
                        console.log("Elemen ikon tidak ditemukan!");
                    }
                }
            });
        }
        showDefaultIcon();
    });
</script>
@endpush
