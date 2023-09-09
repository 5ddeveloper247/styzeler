<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Styzeler Admin Login</title>

  	<!-- Favicon -->
  	<link rel="icon" href="{{ asset('assets_admin/dist/img/favicon-logo.png') }}" type="image/png" sizes="16x16">
  	<!-- Google Font: Source Sans Pro -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="{{ asset('assets_admin/plugins/fontawesome-free/css/all.min.css') }}">
  	<!-- Ionicons -->
  	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  	<!-- Tempusdominus Bootstrap 4 -->
  	<link rel="stylesheet" href="{{ asset('assets_admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  	<!-- iCheck -->
  	<link rel="stylesheet" href="{{ asset('assets_admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  	<!-- JQVMap -->
  	<link rel="stylesheet" href="{{ asset('assets_admin/plugins/jqvmap/jqvmap.min.css') }}">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="{{ asset('assets_admin/dist/css/adminlte.min.css') }}">
  	<!-- overlayScrollbars -->
  	<link rel="stylesheet" href="{{ asset('assets_admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  	<!-- Daterange picker -->
  	<link rel="stylesheet" href="{{ asset('assets_admin/plugins/daterangepicker/daterangepicker.css') }}">
  	<link rel="stylesheet" href="{{ asset('assets_admin/plugins/jquery-ui/jquery-ui.css') }}">
  	<!-- summernote -->
  	<link rel="stylesheet" href="{{ asset('assets_admin/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template_new/assets/css/toastr.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link type="image/png" rel="icon" href="{{ asset('assets_admin/assets/images/fav') }}" /> --}}
    <style>
        #toast-container>.toast {
            width: 300px;
            /* width: 100% */
        }
    </style>
    @stack('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @include('layouts.master.admin_template.header')
    <main>
        <div class="overlay"></div>
        @yield('content')
    </main>
    @include('layouts.master.admin_template.footer')

</body>

</html>
