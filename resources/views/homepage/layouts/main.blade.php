<!doctype html>
<html lang="en">

<head>
    <title>CIVIL.MATCH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link rel="shortcut icon" href="ftco-32x32.png">

    <link rel="stylesheet" href="/homepage_assets/css/custom-bs.css">
    <link rel="stylesheet" href="/homepage_assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/homepage_assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/homepage_assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/homepage_assets/fonts/line-icons/style.css">
    <link rel="stylesheet" href="/homepage_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/homepage_assets/css/animate.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="/homepage_assets/css/style.css">

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="top">
    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: @json(session('success')),
            });
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: @json(session('error')),
            });
        </script>
    @endif


    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>


    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div> <!-- .site-mobile-menu -->


        @include('homepage.layouts.header')
        @yield('container')
        @include('homepage.layouts.footer')

    </div>

    <!-- SCRIPTS -->
    <script src="/homepage_assets/js/jquery.min.js"></script>
    <script src="/homepage_assets/js/bootstrap.bundle.min.js"></script>
    <script src="/homepage_assets/js/isotope.pkgd.min.js"></script>
    <script src="/homepage_assets/js/stickyfill.min.js"></script>
    <script src="/homepage_assets/js/jquery.fancybox.min.js"></script>
    <script src="/homepage_assets/js/jquery.easing.1.3.js"></script>

    <script src="/homepage_assets/js/jquery.waypoints.min.js"></script>
    <script src="/homepage_assets/js/jquery.animateNumber.min.js"></script>
    <script src="/homepage_assets/js/owl.carousel.min.js"></script>

    <script src="/homepage_assets/js/bootstrap-select.min.js"></script>

    <script src="/homepage_assets/js/custom.js"></script>


</body>

</html>
