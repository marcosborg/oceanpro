<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Ocean Pro</title>
    <meta
        content="A Ocean Pro, empresa fundada em 2020, é representada por uma equipa de técnicos altamente qualificados com mais de 20 anos de experiência profissional em mergulho."
        name="description">

    <!-- Favicons -->
    <link href="/website/assets/img/favicon.png" rel="icon">
    <link href="/website/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/website/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/website/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/website/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/website/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/website/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/website/assets/css/style.css" rel="stylesheet">

    @yield('styles')

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <a href="/"><img src="/website/assets/img/logo.webp" alt="" class="img-fluid"></a>
            </div>

            <x-navbar />

        </div>
    </header><!-- End Header -->

    @yield('header')

    <main id="main">

    @yield('content')
    
    </main><!-- End #main -->

    <x-footer />

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/website/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/website/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/website/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/website/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/website/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/website/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/website/assets/js/main.js"></script>

    @yield('scripts')

</body>

</html>