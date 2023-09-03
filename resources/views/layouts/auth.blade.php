<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="acr-devref" content="uWNJB6EwpVQwSuL5oJ7S7JkSkLzdpt8M1Xrs1MZITE1bCEbjMhscv8ZX2sTiDBarCHcu1EeJSsSLZIlYjr6YCl7pLycfn2AAQmYm">

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

        <title>
@if (Route::is('register') || Route::is('update') || Route::is('register.check_token'))
            @lang('auth.register')
@endif

@if (Route::is('login'))
            @lang('auth.login')
@endif

@if (Route::is('password.request') || Route::is('password.reset'))
            @lang('auth.reset-password')
@endif

@if (!empty($alert_msg))
            {{ $alert_msg }}
@endif

@if (!empty($response_error))
            {{ $response_error->data }}
@endif
        </title>
    </head>

    <body class="bg-light">
        <!-- ======= Main ======= -->
        <main id="main">
@if (!empty($alert_msg))
            <!-- Alert Start -->
            <div class="position-relative">
                <div class="row position-absolute w-100" style="opacity: 0.9; z-index: 999;">
                    <div class="col-lg-3 col-sm-4 mx-auto">
                        <div class="alert alert-danger alert-dismissible fade show rounded-0" role="alert">
                            {{ $alert_msg }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Alert End -->
@endif

            <section id="about" class="about pt-2">
                <div class="container-xxl pb-5">
                    <!-- Logo Start -->
                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-sm-3 col-5 mx-auto">
                            <div class="bg-image mb-2 px-lg-3 d-flex justify-content-center">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="JPTshienda" class="img-fluid">
                                <div class="mask"><a href="{{ route('home') }}" class="stretched-link"></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Logo End -->

@yield('auth-content')
                </div>
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
        <!-- Custom Javascript -->
        <script type="text/javascript">
            $(document).ready(function () {
                $('.navbar, .card, .btn').addClass('shadow-0');
                $('.btn').css({textTransform: 'inherit', paddingBottom: '0.5rem'});
                $('.back-to-top').click(function (e) {
                    $("html, body").animate({ scrollTop: "0" });
                });

                /* Auto-resize textarea */
                autosize($('textarea'));

                /* jQuery Date picker */
                var currentLanguage = $('html').attr('lang');

                $('#register_birthdate').datepicker({
                    dateFormat: currentLanguage.startsWith('fr') ? 'dd/mm/yy' : 'mm/dd/yy',
                    onSelect: function () {
                        $(this).focus();
                    }
                });

                /* On select change, update de country phone code */
                $('#select_country1').on('change', function () {
                    var countryPhoneCode = $(this).val();

                    $('#phone_code_text1 .text-value').text(countryPhoneCode);
                    $('#phone_code1').val(countryPhoneCode);
                });
                $('#select_country2').on('change', function () {
                    var countryPhoneCode = $(this).val();

                    $('#phone_code_text2 .text-value').text(countryPhoneCode);
                    $('#phone_code2').val(countryPhoneCode);
                });
                $('#select_country3').on('change', function () {
                    var countryPhoneCode = $(this).val();

                    $('#phone_code_text3 .text-value').text(countryPhoneCode);
                    $('#phone_code3').val(countryPhoneCode);
                });

                /* On select, show/hide some blocs */
                // IDENTITY DOC DESCRIPTION
                $('#register_image_name').on('change', function () {
                    if ($('#register_image_name option').filter(':selected').text() == 'Autre' || $('#register_image_name option').filter(':selected').text() == 'Other') {
                        $('#docDescription').removeClass('d-none');

                    } else {
                        $('#docDescription').addClass('d-none');
                    }
                });

                /* On check, show/hide some blocs */
                // OFFER TYPE
                $('#donationType .form-check-input').each(function () {
                    $(this).on('click', function () {
                        if ($('#anonyme').is(':checked')) {
                            $('#donorIdentity, #otherDonation').addClass('d-none');

                        } else {
                            $('#donorIdentity, #otherDonation').removeClass('d-none');
                        }
                    });
                });
                // TRANSACTION TYPE
                $('#paymentMethod .form-check-input').each(function () {
                    $(this).on('click', function () {
                        if ($('#bank_card').is(':checked')) {
                            $('#phoneNumberForMoney').addClass('d-none');

                        } else {
                            $('#phoneNumberForMoney').removeClass('d-none');
                        }
                    });
                });
            });
        </script>
    </body>
</html>
