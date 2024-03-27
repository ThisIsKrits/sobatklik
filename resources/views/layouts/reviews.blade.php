<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SobatKlik')</title>

    <!-- Scripts -->
    <link rel="icon" type="image/x-icon" href="/dashboard/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('/dashboard/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dashboard/assets/img/icons/remix-icons/remixicon.css') }}"/>

    <link
            rel="stylesheet"
            href="{{ asset('/dashboard/assets/vendor/css/core.css') }}"
            class="template-customizer-core-css"
    />

    <link
            rel="stylesheet"
            href="{{ asset('/dashboard/assets/vendor/css/theme-default.css') }}"
            class="template-customizer-theme-css"
    />

    <link rel="stylesheet" href="{{ asset('/dashboard/assets/css/demo.css') }}" />



    <!-- Vendors CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('/dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"
    />


    <link rel="stylesheet" href="{{ asset('/dashboard/assets/vendor/css/pages/page-auth.css') }}"/>

    <link
            rel="stylesheet"
            href="{{ asset('/dashboard/assets/vendor/libs/rateyo/jquery.rateyo.css') }}"
        />

</head>
<body>
    <div id="app">
        <section class="bg-primary p-3 p-md-4 p-xl-5 min-vh-100">
            <div class="container">
                 @if (session('setting-success'))
                    @include('partials.success',['message' => (session('setting-success'))])
                @endif
                @yield('content')

            </div>
        </section>
    </div>

    <!-- script -->


    <script src="{{ asset('/dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/libs/popper/popper.js') }}"></script>

    <script src="{{ asset('/dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script src="{{ asset('/dashboard/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/js/main.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/libs/rateyo/jquery.rateyo.js') }}"></script>
        <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#modalCenterSuccess').hide();
            }, 3000);

            setTimeout(function() {
                $('#modalCenterError').hide();
            }, 3000);
        });
        $(document).ready(function() {
                var crudMessage = "{{ session('setting-success') }}";

                if (crudMessage) {
                    $('#modalCenterSuccess').modal('show');

                    setTimeout(function() {
                        $('#modalCenterSuccess').modal('hide');
                    }, 2000);
                }
            });
    </script>
    @stack('scripts')
</body>
</html>
