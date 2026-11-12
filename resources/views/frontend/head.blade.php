<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DSS Contact @yield('title')</title>

    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <meta name="keywords" content="QRCode/URL DSS">
    <meta name="description" content="QRCode/URL DSS">
    <meta name="author" content="dss">

    <!-- Google Fonts: Prompt -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('style-index/css/bootstrap.min.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('style-index/css/style.css') }}">
    <!-- Responsive -->
    <link rel="stylesheet" href="{{ asset('style-index/css/responsive.css') }}">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('style-index/css/jquery.mCustomScrollbar.min.css') }}">

    <!-- Font Awesome (v6 + v4 fallback) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css') }}">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.css') }}">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('style-index/css/bootstrap-datepicker3.min.css') }}" type="text/css" />

    <!-- Style เสริมความโมเดิร์น -->
    <style>
        body {
            font-family: 'Prompt', sans-serif !important;
            background-color: #f8fafc;
        }

        .modern-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(226, 232, 240, 0.8);
            transition: all 0.3s ease;
            text-decoration: none !important;
            display: block;
        }

        .modern-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(11, 60, 93, 0.12);
        }

        .stat-card {
            border-radius: 16px;
            padding: 24px;
            color: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.25s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
        }

        .bg-grad-primary {
            background: linear-gradient(135deg, #0b3c5d 0%, #1d70b8 100%);
        }

        .bg-grad-info {
            background: linear-gradient(135deg, #0284c7 0%, #38bdf8 100%);
        }

        .bg-grad-success {
            background: linear-gradient(135deg, #059669 0%, #34d399 100%);
        }

        .bg-grad-warning {
            background: linear-gradient(135deg, #d97706 0%, #fbbf24 100%);
        }

        .bg-grad-secondary {
            background: linear-gradient(135deg, #475569 0%, #94a3b8 100%);
        }

        #myBtn {
            display: none;
            position: fixed;
            bottom: 25px;
            right: 25px;
            z-index: 999;
            border: none;
            outline: none;
            background-color: #0b3c5d;
            color: white;
            cursor: pointer;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
            transition: all 0.2s;
        }

        #myBtn:hover {
            background-color: #328cc1;
            transform: scale(1.08);
        }
    </style>

    <!-- Core Scripts: โหลด jQuery และ SweetAlert ก่อนหน้าลูกจะเรียกใช้งาน -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('style-index/js/bootstrap.bundle.min.js') }}"></script>

    <!-- DataTables JS -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.4.0/js/dataTables.rowGroup.min.js"></script>

    <!-- Datepicker & Cookie JS -->
    <script src="{{ asset('style-index/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('style-index/js/cookie.js') }}"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DDRWVTM803"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-DDRWVTM803');
    </script>
</head>

<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up"></i></button>

<!-- REQUIRED SCRIPTS -->
@if (Session::has('success_msg'))
    <script type="text/javascript">
        $(function() {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<h1> {{ session('success_msg') }} </h1>',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 5000,
                timerProgressBar: true,
            });
        });
    </script>
@endif

@if (Session::has('warning_msg'))
    <script type="text/javascript">
        $(function() {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: '<h1> {{ session('warning_msg') }} </h1>',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 5000,
                timerProgressBar: true,
            });
        });
    </script>
@endif

<script type="text/javascript">
    // Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

@yield('scripts')

<!-- body -->

<body class="main-layout">
