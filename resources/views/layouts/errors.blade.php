<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}">

        <!-- Font Icons Files -->
        <link rel="stylesheet" href="{{ asset('assets/icons/bootstrap-icons/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/icons/boxicons/css/boxicons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/icons/remixicon/remixicon.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/lonely/glightbox/css/glightbox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/icons/fontawesome/css/all.min.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css">

        <!-- Addons CSS Files -->
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/mdb/css/mdb.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/jquery/css/jquery-ui.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/lonely/swiper/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/dataTables/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/cropper/css/cropper.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/croppie/croppie.css') }}">

        <!-- Lonely CSS File -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.lonely.css') }}">
        <!-- Custom CSS File -->
        <style>
            pre {
                font-family: inherit!important;
                font-size: inherit!important;
                line-height: 1.8rem;
                white-space: pre-wrap;       /* css-3 */
                white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
                white-space: -pre-wrap;      /* Opera 4-6 */
                white-space: -o-pre-wrap;    /* Opera 7 */
                word-wrap: break-word;       /* Internet Explorer 5.5+ */
            }
        </style>

        <title>@lang('miscellaneous.error_label') {{ $exception->getStatusCode() }}</title>
    </head>

    <body>
        <!-- ======= Main ======= -->
        <main id="main">
            <section id="about" class="about pt-2">
@yield('errors-content')
            </section>
        </main><!-- Main -->

        <a role="button" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- JavaScript Libraries -->
        <script src="{{ asset('assets/addons/custom/jquery/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/jquery/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/mdb/js/mdb.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/addons/lonely/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/autosize/js/autosize.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/parallax/parallax.min.js') }}"></script>
        <script src="{{ asset('assets/addons/lonely/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('assets/addons/lonely/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/addons/lonely/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/addons/lonely/waypoints/noframework.waypoints.js') }}"></script>
        <script src="{{ asset('assets/addons/lonely/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/dataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/cropper/js/cropper.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/croppie/croppie.min.js') }}"></script>

        <!-- Lonely Javascript -->
        <script src="{{ asset('assets/js/script.lonely.js') }}"></script>
        <!-- Adminator Javascript -->
        <script defer="defer" src="{{ asset('assets/js/scripts.adminator.js') }}"></script>
        <!-- Custom Javascript -->
        <script type="text/javascript">
            $(document).ready(function () {
                $('.navbar, .card, .btn').addClass('shadow-0');
                $('.btn').css({textTransform: 'inherit', paddingBottom: '0.5rem'});
                $('.back-to-top').click(function (e) {
                    $("html, body").animate({ scrollTop: "0" });
                });
            });
        </script>
    </body>
</html>
