<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard')</title>

     <!-- Favicon -->
     <link
            rel="icon"
            type="image/x-icon"
            href="/dashboard/assets/img/favicon/favicon.ico"
        />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet"
        />

        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="/dashboard/assets/vendor/fonts/boxicons.css" />

        <link
            rel="stylesheet"
            href="/dashboard/assets/img/icons/remix-icons/remixicon.css"
        />
        <!-- Core CSS -->
        <link
            rel="stylesheet"
            href="/dashboard/assets/vendor/css/core.css"
            class="template-customizer-core-css"
        />
        <link
            rel="stylesheet"
            href="/dashboard/assets/vendor/css/theme-default.css"
            class="template-customizer-theme-css"
        />
        <link rel="stylesheet" href="/dashboard/assets/css/demo.css" />

        <!-- Vendors CSS -->
        <link
            rel="stylesheet"
            href="/dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"
        />

        <!-- Datatables -->
        <link rel="stylesheet" href="/dashboard/assets/vendor/libs/datatables/datatables.min.css">


        <link
            rel="stylesheet"
            href="/dashboard/assets/vendor/libs/apex-charts/apex-charts.css"
        />

        <!-- Page CSS -->

        <!-- Helpers -->
        <script src="/dashboard/assets/vendor/js/helpers.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="/dashboard/assets/js/config.js"></script>
        <style>
           .form-switch .form-check-input{
            width: 60px;
            height: 32px;
           }
        </style>
</head>
<body>
    <div id="app">
                @if(session('success'))
                    @include('partials._login-success',['message' => (session('success'))])
                @endif
                @if (session('setting-success'))
                    @include('partials.success',['message' => (session('setting-success'))])
                @endif
    <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- sidebar -->
                    @include('partials._sidebar')
                <!-- endsidebar -->
                <div class="layout-page">
                    <!-- navbar -->
                        @include('partials._navbar')
                    <!-- endnavbar -->

                    <!-- modal -->
                        @include('partials._modal-logout')
                    <!-- endmodal -->

                    <div class="content-wrapper">
                            <!-- content -->
                                @yield('content')
                            <!-- endcontent -->

                            <!-- footer -->
                            <footer class="footer">
                                <div class="container py-3">
                                    <span>
                                        Copyright &copy;2024 Sobat Klik, All rights
                                        Reserved</span
                                    >
                                </div>
                            </footer>
                            <!-- endfooter -->

                            <div class="content-backdrop fade"></div>
                    </div>
                </div>
            </div>
    </div>
    </div>

      <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('/dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="/dashboard/assets/vendor/libs/popper/popper.js"></script>
        <script src="/dashboard/assets/vendor/js/bootstrap.js"></script>
        <script src="/dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

        <script src="/dashboard/assets/vendor/js/menu.js"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="/dashboard/assets/vendor/libs/apex-charts/apexcharts.js"></script>

        <!-- Datatables -->
        <script src="/dashboard/assets/vendor/libs/datatables/datatables.min.js"></script>


        <!-- Main JS -->
        <script src="/dashboard/assets/js/main.js"></script>

        <!-- Page JS -->
        <script src="/dashboard/assets/js/dashboards-analytics.js"></script>

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>

        <!-- script -->
        @stack('scripts')

        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $('.modal-backdrop').hide();
                    $('#modalCenterSuccess').hide();
                }, 2000);
            });
            // Datatables

            $(function () {
                $("#reportGrafik").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false, searching: false,paging: false,info: false
                }),
                $("#byBrandTable").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false, searching: false,paging: false,info: false
                }),
                $("#byBrand").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false, searching: false,paging: false,info: false
                })

            });
            // Chart  element
            let cardColor, headingColor, axisColor, shadeColor, borderColor;

            cardColor = config.colors.white;
            headingColor = config.colors.headingColor;
            axisColor = config.colors.axisColor;
            borderColor = config.colors.borderColor;

            // Report chart
            const reportChartEl = document.querySelector("#reportChart"),
                reportChartConfig = {
                    series: [
                        {
                            data: [24, 21, 30, 22, 42, 26, 35, 29],
                        },
                    ],
                    chart: {
                        height: 215,
                        parentHeightOffset: 0,
                        parentWidthOffset: 0,
                        toolbar: {
                            show: false,
                        },
                        type: "area",
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        width: 2,
                        curve: "smooth",
                    },
                    legend: {
                        show: false,
                    },
                    markers: {
                        size: 6,
                        colors: "transparent",
                        strokeColors: "transparent",
                        strokeWidth: 4,
                        discrete: [
                            {
                                fillColor: config.colors.white,
                                seriesIndex: 0,
                                dataPointIndex: 7,
                                strokeColor: config.colors.primary,
                                strokeWidth: 2,
                                size: 6,
                                radius: 8,
                            },
                        ],
                        hover: {
                            size: 7,
                        },
                    },
                    colors: [config.colors.primary],
                    fill: {
                        type: "gradient",
                        gradient: {
                            shade: shadeColor,
                            shadeIntensity: 0.6,
                            opacityFrom: 0.5,
                            opacityTo: 0.25,
                            stops: [0, 95, 100],
                        },
                    },
                    grid: {
                        borderColor: borderColor,

                        padding: {
                            top: -20,
                            bottom: -8,
                            left: -10,
                            right: 8,
                        },
                    },
                    xaxis: {
                        categories: [
                            "",
                            "Jan",
                            "Feb",
                            "Mar",
                            "Apr",
                            "May",
                            "Jun",
                            "Jul",
                        ],
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                        labels: {
                            show: true,
                            style: {
                                fontSize: "13px",
                                colors: axisColor,
                            },
                        },
                    },
                    yaxis: {
                        labels: {
                            show: true,
                        },
                        min: 10,
                        max: 50,
                        tickAmount: 4,
                    },
                };
            if (typeof reportChartEl !== undefined && reportChartEl !== null) {
                const reportChart = new ApexCharts(
                    reportChartEl,
                    reportChartConfig
                );
                reportChart.render();
            }

            // Ringkasan by Brand Chart
            const ratingChartEl = document.querySelector("#ratingChart"),
                ratingChartConfig = {
                    series: [
                        {
                            data: [10, 13, 12, 34, 45, 25],
                        },
                    ],
                    chart: {
                        height: 215,
                        parentHeightOffset: 0,
                        parentWidthOffset: 0,
                        toolbar: {
                            show: false,
                        },
                        type: "bar",
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: "40%",
                            distributed: true,
                        },
                    },
                    title: {
                        text: "Rata-Rata Rating",
                        margin: 24,
                        offsetX: 5,
                        offsetY: -10,
                        style: {
                            fontSize: "16px",
                            fontWeight: 600,
                            color: "#14142B",
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        show: false,
                    },
                    markers: {
                        size: 1,
                        colors: "transparent",
                        strokeColors: "transparent",
                        strokeWidth: 4,
                        discrete: [
                            {
                                fillColor: config.colors.white,
                                seriesIndex: 0,
                                dataPointIndex: 7,
                                strokeWidth: 2,
                                size: 6,
                                radius: 8,
                            },
                        ],
                        hover: {
                            size: 7,
                        },
                    },
                    colors: ["#FFA18C"],
                    grid: {
                        padding: {
                            top: -20,
                            bottom: -8,
                            left: 5,
                            right: 8,
                        },
                    },
                    xaxis: {
                        categories: [
                            "SCI",
                            "ASI",
                            "RB",
                            "SMS",
                            "MSJ",
                            "PKG",
                            "TPI",
                        ],
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                        labels: {
                            show: true,
                            style: {
                                fontSize: "13px",
                                colors: axisColor,
                            },
                        },
                    },
                };
            if (typeof ratingChartEl !== undefined && ratingChartEl !== null) {
                const ratingChart = new ApexCharts(
                    ratingChartEl,
                    ratingChartConfig
                );
                ratingChart.render();
            }

            // Ringkasan by Brand Chart
            const responseChartEl = document.querySelector("#responseChart"),
                responseChartConfig = {
                    series: [
                        {
                            data: [10, 13, 12, 34, 45, 25],
                        },
                    ],
                    chart: {
                        height: 215,
                        parentHeightOffset: 0,
                        parentWidthOffset: 0,
                        toolbar: {
                            show: false,
                        },
                        type: "bar",
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: "40%",
                            distributed: true,
                        },
                    },
                    title: {
                        text: "Rata-Rata Response",
                        margin: 24,
                        offsetX: 5,
                        offsetY: -10,
                        style: {
                            fontSize: "16px",
                            fontWeight: 600,
                            color: "#14142B",
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        show: false,
                    },
                    markers: {
                        size: 1,
                        colors: "transparent",
                        strokeColors: "transparent",
                        strokeWidth: 4,
                        discrete: [
                            {
                                fillColor: config.colors.white,
                                seriesIndex: 0,
                                dataPointIndex: 7,
                                strokeWidth: 2,
                                size: 6,
                                radius: 8,
                            },
                        ],
                        hover: {
                            size: 7,
                        },
                    },
                    colors: ["#6BBD7D"],
                    grid: {
                        padding: {
                            top: -20,
                            bottom: -8,
                            left: 5,
                            right: 8,
                        },
                    },
                    xaxis: {
                        categories: [
                            "SCI",
                            "ASI",
                            "RB",
                            "SMS",
                            "MSJ",
                            "PKG",
                            "TPI",
                        ],
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                        labels: {
                            show: true,
                            style: {
                                fontSize: "13px",
                                colors: axisColor,
                            },
                        },
                    },
                };
            if (
                typeof responseChartEl !== undefined &&
                responseChartEl !== null
            ) {
                const responseChart = new ApexCharts(
                    responseChartEl,
                    responseChartConfig
                );
                responseChart.render();
            }

            // Total Report Chart
            const totalReportChartEl =
                    document.querySelector("#totalReportChart"),
                totalReportChartConfig = {
                    series: [
                        {
                            data: [10, 13, 12, 34, 45, 25],
                        },
                    ],
                    chart: {
                        height: 215,
                        parentHeightOffset: 0,
                        parentWidthOffset: 0,
                        toolbar: {
                            show: false,
                        },
                        type: "bar",
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: "40%",
                            distributed: true,
                        },
                    },
                    title: {
                        text: "Total Laporan",
                        margin: 24,
                        offsetX: 5,
                        offsetY: -10,
                        style: {
                            fontSize: "16px",
                            fontWeight: 600,
                            color: "#14142B",
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        show: false,
                    },
                    markers: {
                        size: 1,
                        colors: "transparent",
                        strokeColors: "transparent",
                        strokeWidth: 4,
                        discrete: [
                            {
                                fillColor: config.colors.white,
                                seriesIndex: 0,
                                dataPointIndex: 7,
                                strokeWidth: 2,
                                size: 6,
                                radius: 8,
                            },
                        ],
                        hover: {
                            size: 7,
                        },
                    },
                    colors: ["#9A8DE7"],
                    grid: {
                        padding: {
                            top: -20,
                            bottom: -8,
                            left: 5,
                            right: 8,
                        },
                    },
                    xaxis: {
                        categories: [
                            "SCI",
                            "ASI",
                            "RB",
                            "SMS",
                            "MSJ",
                            "PKG",
                            "TPI",
                        ],
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                        labels: {
                            show: true,
                            style: {
                                fontSize: "13px",
                                colors: axisColor,
                            },
                        },
                    },
                };
            if (
                typeof totalReportChartEl !== undefined &&
                totalReportChartEl !== null
            ) {
                const totalReportChart = new ApexCharts(
                    totalReportChartEl,
                    totalReportChartConfig
                );
                totalReportChart.render();
            }

            // Ringkasan by Brand Chart
            const ratingAdminChartEl = document.querySelector("#ratingAdminChart"),
                ratingAdminChartConfig = {
                    series: [
                        {
                            data: [10, 13, 12, 34, 45, 25],
                        },
                    ],
                    chart: {
                        height: 415,
                        parentHeightOffset: 0,
                        parentWidthOffset: 0,
                        toolbar: {
                            show: false,
                        },
                        type: "bar",
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: "40%",
                            distributed: true,
                        },
                    },
                    title: {
                        text: "Rata-Rata Rating",
                        margin: 24,
                        offsetX: 5,
                        offsetY: -10,
                        style: {
                            fontSize: "16px",
                            fontWeight: 600,
                            color: "#14142B",
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        show: false,
                    },
                    markers: {
                        size: 1,
                        colors: "transparent",
                        strokeColors: "transparent",
                        strokeWidth: 4,
                        discrete: [
                            {
                                fillColor: config.colors.white,
                                seriesIndex: 0,
                                dataPointIndex: 7,
                                strokeWidth: 2,
                                size: 6,
                                radius: 8,
                            },
                        ],
                        hover: {
                            size: 7,
                        },
                    },
                    colors: ["#FFA18C"],
                    grid: {
                        padding: {
                            top: -20,
                            bottom: -8,
                            left: 5,
                            right: 8,
                        },
                    },
                    xaxis: {
                        categories: [
                            "SCI",
                            "ASI",
                            "RB",
                            "SMS",
                            "MSJ",
                            "PKG",
                            "TPI",
                        ],
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                        labels: {
                            show: true,
                            style: {
                                fontSize: "13px",
                                colors: axisColor,
                            },
                        },
                    },
                };
            if (typeof ratingAdminChartEl !== undefined && ratingAdminChartEl !== null) {
                const ratingAdminChart = new ApexCharts(
                    ratingAdminChartEl,
                    ratingAdminChartConfig
                );
                ratingAdminChart.render();
            }

             // Ringkasan by Brand Chart
             const responseAdminChartEl = document.querySelector("#responseAdminChart"),
                responseAdminChartConfig = {
                    series: [
                        {
                            data: [10, 13, 12, 34, 45, 25],
                        },
                    ],
                    chart: {
                        height: 415,
                        parentHeightOffset: 0,
                        parentWidthOffset: 0,
                        toolbar: {
                            show: false,
                        },
                        type: "bar",
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: "40%",
                            distributed: true,
                        },
                    },
                    title: {
                        text: "Rata-Rata Response",
                        margin: 24,
                        offsetX: 5,
                        offsetY: -10,
                        style: {
                            fontSize: "16px",
                            fontWeight: 600,
                            color: "#14142B",
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        show: false,
                    },
                    markers: {
                        size: 1,
                        colors: "transparent",
                        strokeColors: "transparent",
                        strokeWidth: 4,
                        discrete: [
                            {
                                fillColor: config.colors.white,
                                seriesIndex: 0,
                                dataPointIndex: 7,
                                strokeWidth: 2,
                                size: 6,
                                radius: 8,
                            },
                        ],
                        hover: {
                            size: 7,
                        },
                    },
                    colors: ["#6BBD7D"],
                    grid: {
                        padding: {
                            top: -20,
                            bottom: -8,
                            left: 5,
                            right: 8,
                        },
                    },
                    xaxis: {
                        categories: [
                            "SCI",
                            "ASI",
                            "RB",
                            "SMS",
                            "MSJ",
                            "PKG",
                            "TPI",
                        ],
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                        labels: {
                            show: true,
                            style: {
                                fontSize: "13px",
                                colors: axisColor,
                            },
                        },
                    },
                };
            if (
                typeof responseAdminChartEl !== undefined &&
                responseAdminChartEl !== null
            ) {
                const responseAdminChart = new ApexCharts(
                    responseAdminChartEl,
                    responseAdminChartConfig
                );
                responseAdminChart.render();
            }

            // Total Report Admin Chart
            const totalReportAdminChartEl =
                    document.querySelector("#totalReportAdminChart"),
                totalReportAdminChartConfig = {
                    series: [
                        {
                            data: [10, 13, 12, 34, 45, 25],
                        },
                    ],
                    chart: {
                        height: 415,
                        parentHeightOffset: 0,
                        parentWidthOffset: 0,
                        toolbar: {
                            show: false,
                        },
                        type: "bar",
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: "40%",
                            distributed: true,
                        },
                    },
                    title: {
                        text: "Total Laporan",
                        margin: 24,
                        offsetX: 5,
                        offsetY: -10,
                        style: {
                            fontSize: "16px",
                            fontWeight: 600,
                            color: "#14142B",
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        show: false,
                    },
                    markers: {
                        size: 1,
                        colors: "transparent",
                        strokeColors: "transparent",
                        strokeWidth: 4,
                        discrete: [
                            {
                                fillColor: config.colors.white,
                                seriesIndex: 0,
                                dataPointIndex: 7,
                                strokeWidth: 2,
                                size: 6,
                                radius: 8,
                            },
                        ],
                        hover: {
                            size: 7,
                        },
                    },
                    colors: ["#9A8DE7"],
                    grid: {
                        padding: {
                            top: -20,
                            bottom: -8,
                            left: 5,
                            right: 8,
                        },
                    },
                    xaxis: {
                        categories: [
                            "SCI",
                            "ASI",
                            "RB",
                            "SMS",
                            "MSJ",
                            "PKG",
                            "TPI",
                        ],
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                        labels: {
                            show: true,
                            style: {
                                fontSize: "13px",
                                colors: axisColor,
                            },
                        },
                    },
                };
            if (
                typeof totalReportAdminChartEl !== undefined &&
                totalReportAdminChartEl !== null
            ) {
                const totalReportAdminChart = new ApexCharts(
                    totalReportAdminChartEl,
                    totalReportAdminChartConfig
                );
                totalReportAdminChart.render();
            }
        </script>
</body>
</html>
