<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DSS Contact @yield('title')</title>

    <!-- Google Fonts: Kanit -->
    <link href="https://fonts.googleapis.com/css?family=Kanit:300,400,500,600,700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap datepicker3 (ย้ายขึ้นมาอยู่ใน head ให้ถูกต้องตามมาตรฐาน) -->
    <link rel="stylesheet" href="{{ asset('style-index/css/bootstrap-datepicker3.min.css') }}" type="text/css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.css') }}">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/ekko-lightbox/ekko-lightbox.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

    <!-- Custom Admin Theme: Deep Emerald Green DSS Style -->
    <style>
        /* ป้องกัน Horizontal Scrollbar ล้นออกด้านข้างใน Chrome / Edge */
        html,
        body {
            max-width: 100% !important;
            overflow-x: hidden !important;
        }

        /* ป้องกัน Bootstrap .row ดันทะลุขอบจอเวลาอยู่นอก .container */
        .container-fluid {
            overflow-x: hidden;
        }


        body {
            font-family: 'Kanit', sans-serif !important;
            background-color: #f4f7f6;
        }

        /* ================= 1. SIDEBAR & BRAND LOGO ================= */
        .main-sidebar {
            background: linear-gradient(180deg, #022c22 0%, #064e3b 100%) !important;
            box-shadow: 4px 0 15px rgba(2, 44, 34, 0.15);
        }

        .dss-sidebar-brand {
            display: flex;
            align-items: center;
            padding: 12px 14px;
            border-bottom: 1px solid rgba(110, 231, 183, 0.15);
            text-decoration: none !important;
            gap: 10px;
            transition: all 0.25s ease;
            overflow: hidden;
        }

        .dss-sidebar-brand:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .dss-sidebar-logo-svg {
            flex-shrink: 0;
            filter: drop-shadow(0 2px 6px rgba(16, 185, 129, 0.35));
        }

        .dss-sidebar-text-wrap {
            display: flex;
            flex-direction: column;
            justify-content: center;
            white-space: nowrap;
            transition: opacity 0.2s ease;
        }

        /* ซ่อนข้อความโลโก้อัตโนมัติเมื่อกดพับ Sidebar (sidebar-collapse) */
        .sidebar-collapse .main-sidebar:not(:hover) .dss-sidebar-text-wrap {
            opacity: 0;
            width: 0;
            overflow: hidden;
        }

        .dss-sidebar-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.05;
            margin: 0;
            letter-spacing: -0.2px;
        }

        .dss-sidebar-subtitle {
            font-size: 0.72rem;
            font-weight: 400;
            color: #6ee7b7;
            line-height: 1.1;
            margin-top: 1px;
        }

        /* ไฮไลต์เมนูที่เลือกใน Sidebar เป็นโทนเขียวมรกต */
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
        .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #059669 !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.35);
            border-radius: 10px;
        }

        .nav-sidebar .nav-link {
            border-radius: 10px;
            margin-bottom: 2px;
        }

        /* ================= 2. TOP NAVBAR ================= */
        .main-header.navbar {
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            padding: 0.5rem 1rem;
        }

        .user-greeting-pill {
            display: inline-flex;
            align-items: center;
            background-color: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #064e3b;
            padding: 5px 14px;
            border-radius: 50px;
            font-size: 0.85rem;
            gap: 8px;
        }

        .greeting-time-badge {
            background-color: #059669;
            color: #ffffff;
            padding: 2px 10px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.78rem;
        }

        .btn-logout-modern {
            border-radius: 50px;
            font-weight: 500;
            padding: 5px 16px;
            transition: all 0.2s ease;
        }

        .btn-logout-modern:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(245, 158, 11, 0.3);
        }

        /* ================= 3. FOOTER ================= */
        .main-footer {
            background-color: #ffffff;
            border-top: 1px solid #e2e8f0;
            color: #64748b;
            font-size: 0.85rem;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed text-sm">

    @include('backend.modals.modal-logout')

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-success" data-widget="pushmenu" href="#" role="button"
                        title="ย่อ/ขยายเมนู">
                        <i class="fas fa-bars fa-lg"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" target="_blank" class="nav-link text-muted small">
                        <i class="fas fa-external-link-alt mr-1 text-success"></i> ดูหน้าเว็บไซต์หลัก
                    </a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item d-flex align-items-center flex-wrap" style="gap: 10px;">
                    @if (Session::get('emp_name'))
                        <div class="user-greeting-pill">
                            <span id="time" class="greeting-time-badge"></span>
                            <span class="font-weight-bold">
                                <i class="fas fa-user-circle text-success mr-1"></i>
                                {{ Session::get('pfix_name') }}{{ Session::get('emp_name') }}
                            </span>
                            @if (Session::get('position_view'))
                                <span
                                    class="text-muted d-none d-md-inline">({{ Session::get('position_view') }})</span>
                            @endif
                        </div>

                        <!-- ตรวจสอบช่วงเวลาปัจจุบัน -->
                        <script type="text/javascript">
                            (function() {
                                var today = new Date();
                                var curHr = today.getHours();
                                var greetingText = "สวัสดียามมืด :)";

                                if (curHr < 12) {
                                    greetingText = "สวัสดียามเช้า :)";
                                } else if (curHr < 18) {
                                    greetingText = "สวัสดียามบ่าย :)";
                                }
                                var timeEl = document.getElementById("time");
                                if (timeEl) timeEl.innerHTML = greetingText;
                            })();
                        </script>

                        <button type="button" id="btLogout" name="btLogout"
                            class="btn btn-warning btn-sm btn-logout-modern shadow-sm">
                            <i class="fas fa-sign-out-alt mr-1"></i> ออกจากระบบ
                        </button>
                    @endif
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo (โลโก้ไอคอน SVG หูโทรศัพท์ + ซองจดหมาย ปรับขนาดให้พอดีกับ Sidebar) -->
            <a class="dss-sidebar-brand" href="{{ url('/') }}">
                <svg class="dss-sidebar-logo-svg" width="42" height="42" viewBox="0 0 36 36" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="emeraldGrad" x1="4" y1="6" x2="32" y2="30"
                            gradientUnits="userSpaceOnUse">
                            <stop offset="0%" stop-color="#10b981" />
                            <stop offset="100%" stop-color="#34d399" />
                        </linearGradient>
                    </defs>
                    <!-- ซองจดหมาย -->
                    <rect x="11" y="7" width="21" height="15" rx="3" fill="#d1fae5" stroke="#10b981"
                        stroke-width="2.2" />
                    <path d="M12.5 9.5L21.5 16L30.5 9.5" stroke="#059669" stroke-width="2.2" stroke-linecap="round"
                        stroke-linejoin="round" />

                    <!-- หูโทรศัพท์ -->
                    <path
                        d="M8.5 8C6.8 8 5.5 9.3 5.5 11C5.5 21.5 14 30 24.5 30C26.2 30 27.5 28.7 27.5 27L25.2 22.2C24.7 21.2 23.5 20.8 22.5 21.2L19.8 22.3C16.3 20.4 14.1 18.2 12.2 14.7L13.3 12C13.7 11 13.3 9.8 12.3 9.3L8.5 8Z"
                        fill="url(#emeraldGrad)" stroke="#022c22" stroke-width="1.6" stroke-linejoin="round" />
                </svg>

                <div class="dss-sidebar-text-wrap">
                    <span class="dss-sidebar-title">นามสงเคราะห์</span>
                    <span class="dss-sidebar-subtitle">กรมวิทยาศาสตร์บริการ (วศ.)</span>
                </div>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-3">
                    @include('menu-left.menu')
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header pb-1">
                @yield('content-header')
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content pt-2">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->

                @yield('modal')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            {{-- <div class="float-right d-none d-sm-inline">
                <span class="badge badge-success px-2 py-1" style="background-color: #059669;">Version 2.2</span>
            </div> --}}
            <strong>© {{ date('Y') }} กรมวิทยาศาสตร์บริการ (DSS)</strong> — All Rights Reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/moment/locale/th.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap-datepicker -->
    <script src="{{ asset('style-index/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- DataTables rowGroup -->
    <script src="https://cdn.datatables.net/rowgroup/1.4.0/js/dataTables.rowGroup.min.js"></script>
    <!-- Ekko Lightbox -->
    <script src="{{ asset('adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>

    <!-- DateTimePicker & Modal Logout Scripts -->
    <script>
        $(function() {
            $('#select_date').datetimepicker({
                format: 'DD-MM-YYYY'
            });

            $('#select_date_update').datetimepicker({
                format: 'DD-MM-YYYY'
            });

            $('body').on('click', '#btLogout', function() {
                $('#modal-logout').modal('show');
            });

            $('#reload').click(function() {
                $.ajax({
                    type: 'GET',
                    url: 'reload-captcha',
                    success: function(data) {
                        $(".captcha span").html(data.captcha);
                    }
                });
            });

            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>

    <!-- SweetAlert2 Session Notifications -->
    @if (Session::has('success_msg'))
        <script type="text/javascript">
            $(function() {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '<h4>{{ session('success_msg') }}</h4>',
                    showConfirmButton: false,
                    showCloseButton: true,
                    timer: 3000,
                    timerProgressBar: true
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
                    title: '<h4>{{ session('warning_msg') }}</h4>',
                    showConfirmButton: false,
                    showCloseButton: true,
                    timer: 3000,
                    timerProgressBar: true
                });
            });
        </script>
    @endif

    @if (Session::has('error_msg'))
        <script type="text/javascript">
            $(function() {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: '<h4>{{ session('error_msg') }}</h4>',
                    showConfirmButton: false,
                    showCloseButton: true,
                    timer: 3000,
                    timerProgressBar: true
                });
            });
        </script>
    @endif

    @yield('scripts')

</body>

</html>
