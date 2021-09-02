<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $csrf = json_encode([
            'csrfToken' => csrf_token(),
        ]);
    @endphp
    <script>
        window.Laravel = "{{ json_encode(['csrfToken' => csrf_token()]) }}";
        var module = {}; /*   <-----THIS LINE */
    </script>



    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <title>{{ config('app.name', '') }} - @yield('page_title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendors/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('vendors/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('vendors/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('vendors/admin/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="{{ asset('vendors/admin/plugins/sweetalert2/sweetalert2.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('vendors/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('vendors/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet"
        href="{{ asset('vendors/admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendors/admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('vendors/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('vendors/admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('vendors/admin/plugins/summernote/summernote-bs4.min.css') }}">

    @yield('styles')

    @include('layouts.scripts.notification_styles')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div style="display:none;" class="preloader dark-mode flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('vendors/admin/dist/img/AdminLTELogo.png') }}"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        @include('layouts.admin.includes.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.admin.includes.mainsidebar')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('header_title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">
                                @yield('breadcrumb')
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                @yield('content')

                @yield('modals')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            @include('layouts.admin.includes.footer')
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    @stack('modals')


    <!-- jQuery -->
    <script src="{{ asset('vendors/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('vendors/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('vendors/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('vendors/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('vendors/admin/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('vendors/admin/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('vendors/admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('vendors/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('vendors/admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('vendors/admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendors/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('vendors/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('vendors/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('vendors/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('vendors/admin/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('vendors/admin/dist/js/demo.js') }}"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="{{ asset('vendors/admin/dist/js/pages/dashboard.js') }}"></script> --}}
    <!-- Sweetalert2 -->
    <script src="{{ asset('vendors/admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('vendors/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}">
    </script>








    @stack('scripts_js')

    @include('layouts.scripts.notification_scripts');


    @yield('js')
</body>

</html>
