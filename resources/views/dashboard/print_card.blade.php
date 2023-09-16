<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="@lang('miscellaneous.keywords')">
        <meta name="description" content="@lang('miscellaneous.slogan')">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="jpt-devref" content="IQmxemeH2oYJ7Rsp3yx97S8GEsCVEQdtNaWuh88dfYp66P0HJS8g2xVqEeCnFImCaWKyn733o7jOtzxwB5INSU5W26Bw63QruvZl">

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

        <!-- Adminator CSS File -->
        <style>
            /********** Custom colors **********/
            /* background */
            .acr-bg-blue {
                background-color: #005dba !important;
            }

            .acr-bg-blue-transparent {
                background-color: rgba(0, 93, 186, 0.5) !important;
            }

            a.acr-bg-blue-transparent:hover {
                transition: .3s;
                background-color: rgba(0, 93, 186, 0.7) !important;
            }

            .acr-bg-yellow {
                background-color: #febd00 !important;
            }

            .acr-bg-yellow-transparent {
                background-color: rgba(255, 188, 1, 0.5) !important;
            }

            a.acr-bg-yellow-transparent:hover {
                transition: .3s;
                background-color: rgba(255, 188, 1, 0.7) !important;
            }

            .acr-bg-red {
                background-color: #ad0304 !important;
            }

            .acr-bg-red-transparent {
                background-color: rgba(229, 6, 1, 0.5) !important;
            }

            a.acr-bg-red-transparent:hover {
                background-color: rgba(229, 6, 1, 0.7) !important;
            }

            .acr-bg-navy-blue {
                background-color: #cffafe !important;
            }

            .acr-bg-blue-gray {
                background-color: #2f465e !important;
            }

            .acr-bg-gray {
                background-color: #e0e0e0 !important;
            }

            a.acr-bg-gray:hover {
                transition: .3s;
                background-color: #c0c0c0 !important;
            }

            /* button */
            .acr-btn-blue {
                background-color: #005dba !important;
                color: #fff !important;
                border-color: #0058b1 !important;
            }

            .acr-btn-blue:hover {
                background-color: #0058b1 !important;
                color: #fff !important;
                border-color: #0058b1 !important;
            }

            .acr-btn-outline-blue {
                background-color: transparent !important;
                color: #005dba !important;
                border-color: #005dba !important;
            }

            .acr-btn-outline-blue:hover {
                background-color: #005dba !important;
                color: #fff !important;
                border-color: #005dba !important;
            }

            .acr-btn-yellow {
                background-color: #febd00 !important;
                color: #333 !important;
                border-color: #f1b500 !important;
            }

            .acr-btn-yellow:hover {
                background-color: #f1b500 !important;
                color: #333 !important;
                border-color: #f1b500 !important;
            }

            .acr-btn-outline-yellow {
                background-color: transparent !important;
                color: #f1b500 !important;
                border-color: #f1b500 !important;
            }

            .acr-btn-outline-yellow:hover {
                background-color: #f1b500 !important;
                color: #333 !important;
                border-color: #f1b500 !important;
            }

            .acr-btn-red {
                background-color: #ad0304 !important;
                color: #fff !important;
                border-color: #ad0304 !important;
            }

            .acr-btn-red:hover {
                background-color: #ad0304 !important;
                color: #fff !important;
                border-color: #ad0304 !important;
            }

            .acr-btn-outline-red {
                background-color: transparent !important;
                color: #ad0304 !important;
                border-color: #ad0304 !important;
            }

            .acr-btn-outline-red:hover {
                background-color: #ad0304 !important;
                color: #fff !important;
                border-color: #ad0304 !important;
            }

            /* border */
            .acr-border-blue {
                border-color: #005dba !important;
            }

            .acr-border-yellow {
                border-color: #febd00 !important;
            }

            .acr-border-red {
                border-color: #e20401 !important;
            }

            /* text */
            .acr-text-blue {
                color: #005dba !important;
            }

            .acr-text-yellow {
                color: #febd00 !important;
            }

            .acr-text-red-1 {
                color: #e20403 !important;
            }

            .acr-text-red-2 {
                color: #ad0304 !important;
            }

            /* paragraph */
            .acr-line-height-1 {
                line-height: 1;
            }

            .acr-line-height-1_4 {
                line-height: 1.4;
            }

            .acr-line-height-1_45 {
                line-height: 1.45;
            }

            .acr-line-height-1_5 {
                line-height: 1.5;
            }

            #loader {transition: all 0.3s ease-in-out; opacity: 1; visibility: visible; position: fixed; height: 100vh; width: 100%; background: #fff; z-index: 90000;}
            #loader.fadeOut {opacity: 0; visibility: hidden;}
            .spinner {width: 40px; height: 40px; position: absolute; top: calc(50% - 20px); left: calc(50% - 20px); background-color: #333; border-radius: 100%; -webkit-animation: sk-scaleout 1.0s infinite ease-in-out; animation: sk-scaleout 1.0s infinite ease-in-out;}

            @-webkit-keyframes sk-scaleout {0% {-webkit-transform: scale(0)} 100% { -webkit-transform: scale(1.0); opacity: 0;}}
            @keyframes sk-scaleout {0% {-webkit-transform: scale(0); transform: scale(0);} 100% {-webkit-transform: scale(1.0); transform: scale(1.0); opacity: 0;}}
            @media print {
                body {-webkit-print-color-adjust:exact!important; print-color-adjust:exact!important;}
                #cardRecto {page-break-after: recto;}
                #cardVerso {page-break-after: verso;}
                #cardRecto, #cardVerso {background-color: #cffafe!important; height: 340px!important;}
                #cardRecto .col-8 h5, #cardRecto .col-8 h3, #cardVerso .col-8 h5, #cardVerso .col-8 h3 {font-family: Arial Narrow!important; font-size: 10.5pt!important;}
                #cardRecto .row .col-4 .card-body h3, #cardRecto .row .col-8 > p > span {font-size: 10pt; font-family: Arial; color: #555;}
                #cardVerso h6 {font-size: 12.5pt; font-family: Arial; color: #555;}
            }
        </style>

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.adminator.css') }}">

        <title>@lang('miscellaneous.account.membership_card.print_card')</title>
    </head>

    <body>
        <div id="loader">
            <div class="spinner"></div>
        </div>

        <script>
            window.addEventListener('load', function load() {
                const loader = document.getElementById('loader');

                setTimeout(function() {
                    loader.classList.add('fadeOut');
                }, 300);
            });
        </script>

        <!-- Card content Start -->
        <div class="container">
            <div class="row py-5">
                <!-- RECTO -->
                <div class="col-lg-4 col-md-6 col-10 mb-4 mx-auto">
                    <h3 class="mb-0 text-center fw-bold text-uppercase">@lang('miscellaneous.recto')</h3>
                    <div id="cardRecto" class="p-10 acr-bg-navy-blue border border-2 border-info rounded-3" style="height: 300px;">
                        <div class="row g-1 mb-2 pb-2 border-bottom border-3 border-warning">
                            <div class="col-2">
                                <div class="bg-image">
                                    <img src="{{ asset('assets/img/drc-flag.png') }}" alt="" class="img-fluid">
                                    <div class="mask"></div>
                                </div>
                            </div>
                            <div class="col-8 pt-1 text-center text-uppercase">
                                <h5 class="m-0 fw-bold text-truncate" style="font-family: Arial Narrow; font-size: 11px;">@lang('miscellaneous.drc')</h5>
                                <h3 class="m-0 text-black fw-bold text-truncate" style="font-family: Arial Narrow; font-size: 11px;">Action Commune pour la République</h3>
                            </div>
                            <div class="col-2">
                                <div class="bg-image bg-white rounded-circle" style="margin-top: -3px;">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid">
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-4">
                                <div class="card mb-2 border-0 rounded-4 shadow-0">
                                    <div class="card-body pb-0">
                                        <div class="bg-image bg-white rounded-circle" style="margin-top: -3px;">
                                            <img src="{{ $selected_member->avatar_url != null ? $selected_member->avatar_url : asset('assets/img/user.png') }}" alt="{{ $selected_member->firstname . ' ' . $selected_member->lastname }}" class="user-image img-fluid rounded-circle">
                                            <div class="mask"></div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-2 pb-2 px-1">
                                        <h3 class="m-0 text-center text-black text-uppercase" style="font-family: 'Segoe UI Semibold'; font-size: 8px;">{{ $selected_member->role_user->role->role_name }}</h3>
                                    </div>
                                </div>
                                <p class="m-0 fw-bold text-uppercase" style="font-family: Arial; font-size: 11px;">
                                    <span class="badge d-block py-2 bgc-{{ $selected_member->status->status_name == 'Activé' && $selected_member->birth_date != null && $residence != null ? 'green' : 'red' }}-600 rounded-0">
                                        <span class="bi bi-{{ $selected_member->status->status_name == 'Activé' && $selected_member->birth_date != null && $residence != null ? 'check2' : 'x' }}-circle me-1 fs-6" style="vertical-align: -2px"></span>
                                        {{ $selected_member->status->status_name == 'Activé' && $selected_member->birth_date != null && $residence != null ? __('miscellaneous.validated') : __('miscellaneous.invalid') }}
                                    </span>
                                </p>
                            </div>
                            <div class="col-8">
                                <p class="mb-1 acr-line-height-1_5" style="font-size: 0.68rem; font-family: Arial; color: #555;">
                                    <span>@lang('miscellaneous.firstname')@lang('miscellaneous.colon_after_word')</span> 
                                    <span class="d-inline-block text-black fw-bold text-uppercase">{{ $selected_member->firstname }}</span> 
                                    <span class="float-end">@lang('miscellaneous.gender_title')@lang('miscellaneous.colon_after_word') <span class="fw-bold text-black">{{ $selected_member->gender }}</span></span>
                                </p>
                                <p class="mb-1 acr-line-height-1_5" style="font-size: 0.68rem; font-family: Arial; color: #555;">
                                    <span>@lang('miscellaneous.lastname')@lang('miscellaneous.colon_after_word')</span> 
                                    <span class="text-black fw-bold text-uppercase">{{ $selected_member->lastname }}</span>
                                </p>
                                <p class="mb-1 acr-line-height-1_5" style="font-size: 0.68rem; font-family: Arial; color: #555;">
                                    <span>@lang('miscellaneous.surname')@lang('miscellaneous.colon_after_word')</span> 
                                    <span class="text-black fw-bold text-uppercase">{{ $selected_member->surname }}</span>
                                </p>
                                <p class="mb-1 acr-line-height-1_5" style="font-size: 0.68rem; font-family: Arial; color: #555;">
                                    <span>@lang('miscellaneous.birth_city_date')@lang('miscellaneous.colon_after_word')</span><br>
                                    <span class="text-black fw-bold">{{ $selected_member->birth_city . ', ' . (!empty($selected_member->birth_date) ? (str_starts_with(app()->getLocale(), 'fr') ? \Carbon\Carbon::createFromFormat('Y-m-d', $selected_member->birth_date)->format('d/m/Y') : \Carbon\Carbon::createFromFormat('Y-m-d', $selected_member->birth_date)->format('m/d/Y')) : null) }}</span>
                                </p>
                                <p class="mb-2 acr-line-height-1_5" style="font-size: 0.68rem; font-family: Arial; color: #555;">
                                    <span>@lang('miscellaneous.address.title')@lang('miscellaneous.colon_after_word')</span> 
                                    <span class="text-black fw-bold">{{ $residence != null ? $residence->address_content : '- - - - -' }}</span><br>
                                </p>
                                <div id="issuedOn">
                                    <p class="mb-1 acr-line-height-1_5 text-center" style="font-size: 0.55rem; font-family: Arial; color: #555;">
                                        <span>@lang('miscellaneous.issued_on') {{ str_starts_with(app()->getLocale(), 'fr') ? \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'))->format('d/m/Y') : \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'))->format('m/d/Y') }}</span>
                                    </p>
                                    <div class="mb-1 bg-image text-center">
                                        <img src="{{ asset('assets/img/signature.png') }}" alt="" width="50">
                                        <div class="mask"></div>
                                    </div>
                                    <p class="m-0 acr-line-height-1_5 text-center" style="font-size: 0.55rem; font-family: Arial; color: #555;">
                                        <span>Jean Pierre TSHIENDA</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- VERSO -->
                <div class="col-lg-4 col-md-6 col-10 mb-4 mx-auto">
                    <h3 class="mb-0 text-center fw-bold text-uppercase">@lang('miscellaneous.verso')</h3>
                    <div id="cardVerso" class="p-10 acr-bg-navy-blue border border-2 border-info rounded-3" style="height: 300px;">
                        <div class="row g-1 pb-2 border-bottom border-3 border-warning">
                            <div class="col-2">
                                <div class="bg-image">
                                    <img src="{{ asset('assets/img/drc-flag.png') }}" alt="" class="img-fluid">
                                    <div class="mask"></div>
                                </div>
                            </div>
                            <div class="col-8 pt-1 text-center text-uppercase">
                                <h5 class="m-0 fw-bold text-truncate" style="font-family: Arial Narrow; font-size: 11px;">@lang('miscellaneous.drc')</h5>
                                <h3 class="m-0 text-black fw-bold text-truncate" style="font-family: Arial Narrow; font-size: 11px;">Action Commune pour la République</h3>
                            </div>
                            <div class="col-2">
                                <div class="bg-image bg-white rounded-circle" style="margin-top: -3px;">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid">
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </div>

                        <h1 class="mt-2 mb-0 text-center fs-4 fw-700 text-black text-uppercase" style="font-family: 'Segoe UI';">
                            @lang('miscellaneous.account.membership_card.title')
                        </h1>

                        <div class="mx-auto mt-2" style="width: 148px;">
                            <img src="data:image/png;base64,{{ base64_encode($qr_code) }}" alt="QR Code">
                        </div>

                        <h6 class="mt-2 mb-0 text-center text-black fw-bold acr-line-height-1_4">
                            <span class="text-muted">@lang('miscellaneous.serial_number')@lang('miscellaneous.colon_after_word')</span> 
                            {{ $selected_member->serial_number }}
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card content End -->
        
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

        <!-- Adminator Javascript -->
        <script defer="defer" src="{{ asset('assets/js/scripts.adminator.js') }}"></script>
    </body>
</html>
