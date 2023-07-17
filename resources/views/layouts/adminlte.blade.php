<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Short URL & QR code @yield('title')</title>

  <!-- Styles -->
  {{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}
  <link href="https://fonts.googleapis.com/css?family=Kanit:300,400,500,600,700" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
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

  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> --}}

  {{-- ใช้กับ script copy text --}}
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> --}}

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
  
</head>
<body class="hold-transition sidebar-mini text-sm">

  @include('backend.modals.modal-logout')

  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
      
        <li class="nav-item">
          @if (Session::get('emp_name'))
          <span id="time" style="color:rgb(0, 13, 255)"></span> {{Session::get('pfix_name')}}{{Session::get('emp_name')}} {{Session::get('position_view')}}

          <!-- check time now -->         
          <script type="text/javascript">
            var today = new Date()
            var curHr = today.getHours()
            var time = null;
  
            if (curHr < 12) {
              var time = "สวัสดียามเช้า :)";
            } else if (curHr < 18) {
              var time = "สวัสดียามบ่าย :)";
            } else {
              var time = "สวัสดียามมืด :)";
            }
            document.getElementById("time").innerHTML = time;
          </script>          


            <button type="submit" id="btLogout" name="btLogout" class="btn btn-warning"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</button>
          @else
          {{-- <a href="login">
            <button type="submit" id="login" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
          </a> --}}
        @endif

        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="{{ asset('style-index/images/logo-white.png') }}" alt="DSS" width="100%">
        {{-- <span class="brand-text font-weight-light">{{ config('app.name', '') }}</span> --}}
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- @if (Session::get('username'))
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('images/user.png') }}" class="img-circle" alt="User Image">
          </div>
          <div class="info">
            @if (Session::get('access') == '1')
            <a href="#" class="d-block">{{ Session::get('emp_name') }}</a><span class="right badge badge-danger">Super Admin</span>
            @elseif ((Session::get('access') == '2'))
            <a href="#" class="d-block">{{ Session::get('emp_name') }}</a><span class="right badge badge-success">Admin</span>
            @else
            <a href="#" class="d-block">{{ Session::get('emp_name') }}</a><span class="right badge badge-primary">User</span>
            @endif
          </div>
        </div>
        @endif --}}


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          @include('menu-left.menu')
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        {{-- <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12 text-center">
              <img src="{{ asset('images/logo-top.png') }}" alt="DSS" width="30%">
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid --> --}}
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
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
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        <b> Version 1.0 </b>
        {{-- <strong> Release {{ env('APP_VERSION') }} </strong> --}}
      </div>
      <!-- Default to the left -->
      © DSS {{ date("Y") }} All Rights Reserved.
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

  {{-- ADD PLUS --}}
  <script src="{{ asset('style-index/js/bootstrap-datepicker.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('style-index/css/bootstrap-datepicker3.min.css') }}"  type="text/css" />

  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <!-- DataTables -->
  <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <!-- Ekko Lightbox -->
  <script src="{{ asset('adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
  <!-- AdminLTE -->
  <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>

  <!-- OPTIONAL SCRIPTS -->

  {{-- <script src="{{ asset('js/custom.js') }}"></script> --}}
  <!-- Data tables script -->
  <script>
    $(function () {
      $('#select_date').datetimepicker({
          format: 'DD-MM-YYYY'
      });

      $('#select_date_update').datetimepicker({
          format: 'DD-MM-YYYY'
      });

    });
  </script>

<script>
  (function ($) {
    $('body').on('click', '#btLogout', function () {    
        $('#modal-logout').modal('show');
    });
  }(jQuery));
</script>

<script type="text/javascript">
  $('#reload').click(function () {
      $.ajax({
          type: 'GET',
          url: 'reload-captcha',
          success: function (data) {
              $(".captcha span").html(data.captcha);
          }
      });
  });
</script>

  <!-- Page specific script -->
  <script>
    $(function () {
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
    })
  </script>

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
          timer: 3000,
          timerProgressBar: true,
          })
        });
    </script>
        @endif
        @if (Session::has('warning_msg'))
            <script type="text/javascript">
            Swal.fire({
            position: 'center',
            icon: 'warning',
            title: '<h2> {{ session('warning_msg') }} </h2>',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 3000,
            timerProgressBar: true,
            })
            </script>
        @endif
        @if (Session::has('error_msg'))
            <script type="text/javascript">
            Swal.fire({
            position: 'center',
            icon: 'error',
            title: '<h3> {{ session('error_msg') }} </h3>',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 3000,
            timerProgressBar: true,
            })
            </script>
        @endif        
@yield('scripts')

</body>
</html>
