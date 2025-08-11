<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin_assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/admin_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/admin_assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin_assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/admin_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/admin_assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/admin_assets/plugins/summernote/summernote-bs4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/admin_assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="/admin_assets/plugins/toastr/toastr.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="/admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    {{-- Boostrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- Trix --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

    {{-- FilePond --}}
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .help-button {
            position: fixed;
            bottom: 25px;
            right: 40px;
            background-color: #484848;
            color: #ffffff;
            border: none;
            border-radius: 50px;
            padding: 10px 15px;
            font-size: 16px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            z-index: 1000;
        }

        .help-button:hover {
            background-color: #100d11;
        }
    </style>
    <style>
        .login-card {
            background-color: rgba(255, 255, 255, 0.75);
            border-radius: 15px;
        }

        .logo-title {
            font-size: 2.5rem;
            font-weight: 700;
            font-family: 'Montserrat', sans-serif;
        }

        .logo-title span {
            color: white;
            background-color: #198754;
            /* Bootstrap success */
            padding: 8px 8px;
            border-radius: 6px;
        }

        .logo-container {
            margin-bottom: 20px;
        }
    </style>

    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        @include('admin.layouts.navbar')
        @include('admin.layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('admin.layouts.header')
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('container')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>


        <footer class="main-footer">
            <div class="copyright">
                &copy; 2025 <strong><span>NextUp.Creative</span></strong>. All Rights Reserved
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/admin_assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/admin_assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/admin_assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/admin_assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/admin_assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/admin_assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/admin_assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/admin_assets/plugins/moment/moment.min.js"></script>
    <script src="/admin_assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/admin_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/admin_assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/admin_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin_assets/dist/js/adminlte.js"></script>
    <!-- SweetAlert2 -->
    <script src="/admin_assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="/admin_assets/plugins/toastr/toastr.min.js"></script>
    {{-- Bootstrap Js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>



    <!-- DataTables  & Plugins -->
    <script src="/admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/admin_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/admin_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/admin_assets/plugins/jszip/jszip.min.js"></script>
    <script src="/admin_assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/admin_assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/admin_assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/admin_assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/admin_assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    {{-- FilePond --}}
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>



    <script>
        @if (session()->has('success'))
            $(document).ready(function() {
                toastr.success('{{ session('success') }}')
            });
        @elseif (session()->has('error'))
            $(document).ready(function() {
                toastr.error('{{ session('error') }}')
            });
        @endif
    </script>

    @yield('js')
</body>

</html>
