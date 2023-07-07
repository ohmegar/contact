<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      {{-- <title>{{ config('app.name', '') }}</title> --}}
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
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('style-index/css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('style-index/css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('style-index/css/responsive.css') }}">
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
      <!-- SweetAlert2 -->
      <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css') }}">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('style-index/css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

      <!-- DataTables -->
      <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
      <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.css') }}">

      <!-- jQuery -->
      <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

      <!-- DataTables -->
      <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
      <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
      
      <script src="{{ asset('style-index/js/bootstrap-datepicker.min.js') }}"></script>
      <script src="{{ asset('style-index/js/cookie.js') }}"></script>
      <link rel="stylesheet" href="{{ asset('style-index/css/bootstrap-datepicker3.min.css') }}"  type="text/css" />


<!-- Google tag (gtag.js) -->
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-6HR7992QWX"></script>
<script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'G-6HR7992QWX');
</script> --}}


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
            })
         });
      </script>
         @endif
         @if (Session::has('warning_msg'))
            <script type="text/javascript">
            Swal.fire({
            position: 'center',
            icon: 'warning',
            title: '<h1> {{ session('warning_msg') }} </h1>',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000,
            timerProgressBar: true,
            })
            </script>
         @endif

      <script>
      //Get the button
      var mybutton = document.getElementById("myBtn");
      
      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function() {scrollFunction()};
      
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
