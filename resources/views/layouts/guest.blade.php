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
@if (Route::is('home'))
            J-P TSHIENDA | @lang('miscellaneous.slogan')
@endif

@if (Route::is('account') || Route::is('account.update.password'))
            @lang('miscellaneous.menu.account_settings')
@endif

@if (Route::is('message.inbox'))
            @lang('miscellaneous.message.inbox')
@endif

@if (Route::is('message.outbox'))
            @lang('miscellaneous.message.outbox')
@endif

@if (Route::is('message.draft'))
            @lang('miscellaneous.message.draft')
@endif

@if (Route::is('message.spams'))
            @lang('miscellaneous.message.spams')
@endif

@if (Route::is('message.new'))
            @lang('miscellaneous.message.new')
@endif

@if (Route::is('message.search'))
            @lang('miscellaneous.message.search_result')
@endif

@if (Route::is('notification'))
            @lang('miscellaneous.menu.notifications')
@endif

@if (Route::is('news.home'))
            @lang('miscellaneous.menu.public.news')
@endif

@if (Route::is('works'))
            @lang('miscellaneous.menu.public.works')
@endif

@if (Route::is('donate'))
            @lang('miscellaneous.menu.public.donate')
@endif

@if (Route::is('about.home'))
            @lang('miscellaneous.public.about.title')
@endif

@if (Route::is('about.help'))
            @lang('miscellaneous.public.help.title')
@endif

@if (Route::is('about.faq'))
            @lang('miscellaneous.public.faq.title')
@endif

@if (Route::is('about.terms_of_use'))
            @lang('miscellaneous.public.terms_of_use.title')
@endif

@if (Route::is('about.privacy_policy'))
            @lang('miscellaneous.public.privacy_policy.title')
@endif
        </title>
    </head>

    <body>
        <!-- #Modals Start ==================== -->
        <!-- ### Crop entity (User, News and Legal info content) image ### -->
        <div class="modal fade" id="cropModalUser" tabindex="-1" aria-labelledby="cropModalUserLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cropModalUserLabel">{{ __('miscellaneous.crop_before_save') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mb-sm-0 mb-4">
                                    <div class="bg-image">
                                        <img src="" id="retrieved_image" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <input type="hidden" name="userId" id="userId" value="{{ !empty(Auth::user()) ? Auth::user()->id : null }}">
                        <button type="button" class="btn btn-light border border-default shadow-0" data-bs-dismiss="modal">{{ __('miscellaneous.cancel') }}</button>
                        <button type="button" id="crop_avatar" class="btn btn-primary btn-color shadow-0">{{ __('miscellaneous.register') }}</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ### Crop recto image ### -->
        <div class="modal fade" id="cropModal_recto" tabindex="-1" aria-labelledby="cropModalRectoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cropModalRectoLabel">{{ __('miscellaneous.crop_before_save') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mb-sm-0 mb-4">
                                    <div class="bg-image">
                                        <img src="" id="retrieved_image_recto" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-light border border-default shadow-0" data-bs-dismiss="modal">{{ __('miscellaneous.cancel') }}</button>
                        <button type="button" id="crop_recto" class="btn btn-primary btn-color shadow-0">{{ __('miscellaneous.register') }}</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ### Crop verso image ### -->
        <div class="modal fade" id="cropModal_verso" tabindex="-1" aria-labelledby="cropModalVersoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cropModalVersoLabel">{{ __('miscellaneous.crop_before_save') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mb-sm-0 mb-4">
                                    <div class="bg-image">
                                        <img src="" id="retrieved_image_verso" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-light border border-default shadow-0" data-bs-dismiss="modal">{{ __('miscellaneous.cancel') }}</button>
                        <button type="button" id="crop_verso" class="btn btn-primary btn-color shadow-0">{{ __('miscellaneous.register') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #Modals End ==================== -->

@if (Route::is('home'))
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="position-relative d-flex flex-column align-items-center justify-content-center overflow-hidden">
            <h1 class="text-center">@lang('miscellaneous.foundation_name')</h1>
            <h2 class="text-yellow">@lang('miscellaneous.slogan')</h2>
            <a href="#about" class="btn-get-started scrollto"><i class="bi bi-chevron-double-down"></i></a>
            <div class="position-absolute w-100 h-100" style="background: rgba(0, 0, 0, 0.5);"></div>
        </section><!-- End Hero -->
@endif

        <!-- ======= Header ======= -->
        <header id="header" class="d-flex align-items-center" style="{{ !Route::is('home') ? 'border-bottom: 1px #f0f0f0 solid; box-shadow: none;' : '' }}">
            <div class="container d-flex align-items-center justify-content-between">
                <div class="logo">
                    <h1>
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid">
                            <span class="d-lg-inline-block d-none pt-1 align-middle fw-bold" style="font-family: Arial, Helvetica, sans-serif; letter-spacing: 1px;">
                                <span class="text-blue">J-P</span> <span class="text-green">TSHIENDA</span>
                            </span>
                        </a>
                    </h1>
                </div>

                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link{{ Route::is('home') ? ' active' : '' }}" href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a></li>
                        <li><a class="nav-link{{ Route::is('about.home') ? ' active' : '' }}" href="{{ route('about.home') }}">@lang('miscellaneous.menu.public.about')</a></li>
                        <li><a class="nav-link{{ Route::is('news.home') ? ' active' : '' }}" href="{{ route('news.home') }}">@lang('miscellaneous.menu.public.news')</a></li>
                        <li><a class="nav-link{{ Route::is('works') ? ' active' : '' }}" href="{{ route('works') }}">@lang('miscellaneous.menu.public.works')</a></li>

@if (!empty(Auth::user()))
    @if ($current_user->notifications[0]->status->status_name == 'Non lue')
                        {{-- NOTIFICATIONS --}}
                        <li class="dropdown mt-lg-0 mt-2">
                            <a href="{{ route('notification.home') }}" class="text-primary">
                                <span>
                                    <i class="bi bi-bell-fill fs-4 align-middle"></i>
                                    <span class="position-absolute translate-middle start-5 p-1 border border-4 border-danger rounded-circle" style="top: 8px;">
                                    </span>
                                    <span class="d-lg-none d-inline-block align-middle">@lang('miscellaneous.menu.notifications')</span>
                                </span>
                            </a>

                            <ul class="py-0 rounded-3 overflow-hidden">
                                <li class="text-center">
                                    <a id="markAllRead" href="#" class="dropdown-item d-inline-block py-3 bg-secondary text-white" data-user-id="{{ $current_user->id }}">
                                        <i class="far fa-circle me-2"></i>@lang('miscellaneous.mark_all_read')
                                    </a>
                                </li>
        @forelse ($current_user->notifications as $notification)
            @if ($loop->index < 2)
                                <li class="border-bottom border-secondary w-100">
                                    <a href="/{{ $notification->notification_url }}" class="dropdown-item d-inline-block py-3 text-wrap">
                                        <p class="m-0">{{ $notification->notification_content }}</p>
                                        <small class="text-secondary">{{ $notification->created_at }}</small>
                                    </a>
                                </li>
            @endif
        @empty
        @endforelse
                                <li class="text-center">
                                    <a href="{{ route('notification.home') }}" class="dropdown-item py-3 bg-primary text-light">
                                        @lang('miscellaneous.see_all_notifications') <i class="fa fa-angle-right align-middle ms-2 fw-100" style="font-size: 1.2rem;"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
    @else
                        <li class="mt-lg-0 mt-2">
                            <a class="nav-link d-inline-block{{ Route::is('notification.home') ? ' active' : '' }}" href="{{ route('notification.home') }}">
                                <i class="bi bi-bell me-2 fs-4 align-middle"></i>
                                <span class="d-lg-none d-inline-block align-middle">@lang('miscellaneous.menu.notifications')</span>
                            </a>
                        </li>
    @endif
                        {{-- AVATAR --}}
                        <li id="avatarLinkWrapper" class="dropdown">
                            <a href="{{ route('account') }}" id="avatarLink">
                                <img src="{{ $current_user->avatar_url != null ? $current_user->avatar_url : asset('assets/img/user.png') }}" alt="{{ $current_user->firstname . ' ' . $current_user->lastname }}" width="37" class="user-image rounded-circle me-2">
                            </a>

                            <ul class="py-0 rounded-3 overflow-hidden">
                                <li class="d-lg-flex d-none justify-content-center pt-3 bg-info">
                                    <div class="bg-image">
                                        <img src="{{ $current_user->avatar_url != null ? $current_user->avatar_url : asset('assets/img/user.png') }}" alt="{{ $current_user->firstname . ' ' . $current_user->lastname }}" width="70" class="user-image img-thumbnail rounded-circle me-2">
                                        <div class="mask"></div>
                                    </div>
                                </li>
                                <li class="d-lg-block d-none px-3 py-2 text-center bg-info">
                                    <?php $names = $current_user->firstname . ' ' . $current_user->lastname ?>
                                    <h5 class="h5 mb-1 fw-bold">{{ strlen($names) > 14 ? substr($names, 0, 14) . '...' : $names }}</h5>
                                </li>
    @if ($current_user->role_user->role->role_name == 'Administrateur')
                                <li class="border-bottom border-default">
                                    <a href="{{ route('admin') }}" class="dropdown-item d-inline-block py-3">
                                        <i class="bi bi-grid-1x2 me-3 align-middle fs-5"></i>@lang('miscellaneous.admin.home.title')
                                    </a>
                                </li>
    @endif
    @if ($current_user->role_user->role->role_name == 'Développeur')
                                <li class="border-bottom border-default">
                                    <a href="{{ route('developer') }}" class="dropdown-item d-inline-block py-3">
                                        <i class="bi bi-grid-1x2 me-3 align-middle fs-5"></i>@lang('miscellaneous.developer.home.title')
                                    </a>
                                </li>
    @endif
    @if ($current_user->role_user->role->role_name == 'Manager')
                                <li class="border-bottom border-default">
                                    <a href="{{ route('manager') }}" class="dropdown-item d-inline-block py-3">
                                        <i class="bi bi-grid-1x2 me-3 align-middle fs-5"></i>@lang('miscellaneous.manager.home.title')
                                    </a>
                                </li>
    @endif
                                <li class="border-bottom border-default">
                                    <a href="{{ route('account') }}" class="dropdown-item d-inline-block py-3">
                                        <i class="bi bi-gear me-3 align-middle fs-5"></i>@lang('miscellaneous.menu.account_settings')
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" class="dropdown-item d-inline-block py-3">
                                        <i class="bi bi-power me-3 align-middle fs-5"></i>@lang('miscellaneous.logout')
                                    </a>
                                </li>
                            </ul>
                        </li>
@endif

@empty(Auth::user())
                        <li class="dropdown mt-lg-0 mt-5">
                            <a class="d-inline-block" role="button">
                                <i class="bi bi-translate me-2 fs-4"></i><span class="d-lg-none">@lang('miscellaneous.your_language')</span>
                            </a>
                            <ul>
    @foreach ($available_locales as $locale_name => $available_locale)
                                <li>
        @if ($available_locale != $current_locale)
                                    <a class="d-inline-block" href="{{ route('change_language', ['locale' => $available_locale]) }}">
            @switch($available_locale)
                @case('ln')
                                        <span class="fi fi-cd me-3"></span>
                @break
                @case('en')
                                        <span class="fi fi-us me-3"></span>
                @break
                @default
                                        <span class="fi fi-{{ $available_locale }} me-3"></span>
                @endswitch
                                        {{ $locale_name }}
                                    </a>
        @endif
                                </li>
    @endforeach
                            </ul>
                        </li>
@endempty
                    </ul>

@empty(Auth::user())
                    <a href="{{ route('login') }}" class="btn btn-success text-white ms-5 me-lg-0 me-2 px-3 pt-2 rounded-pill">
                        @lang('miscellaneous.login_title1')
                    </a>
@endif

                    <a href="#donate" class="btn btn-outline-primary d-lg-inline-block d-none ms-2 px-3 pt-2 rounded-pill scrollto">
                        @lang('miscellaneous.menu.public.donate')
                    </a>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->
            </div>
        </header><!-- End Header -->

@if (!empty(request()->alert_success))
        <div class="position-fixed w-100" style="top: -5px; z-index: 9999;">
            <div class="row mb-5">
                <div class="col-lg-4 col-md-6 col-10 mx-auto">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="bi bi-info-circle me-2 mb-0 fs-4" style="vertical-align: -3px;"></span> {{
                        request()->alert_success }}
                        <button type="button" class="btn-close mt-1" data-bs-dismiss="alert"
                            aria-label="@lang('miscellaneous.close')"></button>
                    </div>
                </div>
            </div>
        </div>
@endif
@if (\Session::has('success_message'))
        <div class="position-fixed w-100" style="top: -5px; z-index: 9999;">
            <div class="row mb-5">
                <div class="col-lg-4 col-md-6 col-10 mx-auto">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="bi bi-info-circle me-2 mb-0 fs-4" style="vertical-align: -3px;"></span> {{
                        \Session::get('success_message') }}
                        <button type="button" class="btn-close mt-1" data-bs-dismiss="alert"
                            aria-label="@lang('miscellaneous.close')"></button>
                    </div>
                </div>
            </div>
        </div>
@endif
@if (!empty($alert_success))
        <div class="position-fixed w-100" style="top: -5px; z-index: 9999;">
            <div class="row mb-5">
                <div class="col-lg-4 col-md-6 col-10 mx-auto">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="bi bi-info-circle me-2 mb-0 fs-4" style="vertical-align: -3px;"></span> {{
                        $alert_success }}
                        <button type="button" class="btn-close mt-1" data-bs-dismiss="alert"
                            aria-label="@lang('miscellaneous.close')"></button>
                    </div>
                </div>
            </div>
        </div>
@endif
@if (\Session::has('exception'))
        <div class="position-fixed w-100" style="top: -5px; z-index: 9999;">
            <div class="row mb-5">
                <div class="col-lg-4 col-md-6 col-10 mx-auto">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="bi bi-exclamation-triangle me-2 mb-0 fs-4" style="vertical-align: -3px;"></span> {{
                        \Session::get('exception') }}
                        <button type="button" class="btn-close mt-1" data-bs-dismiss="alert"
                            aria-label="@lang('miscellaneous.close')"></button>
                    </div>
                </div>
            </div>
        </div>
@endif
@if (\Session::has('error_message'))
        <div class="position-fixed w-100" style="top: -5px; z-index: 9999;">
            <div class="row mb-5">
                <div class="col-lg-4 col-md-6 col-10 mx-auto">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="bi bi-exclamation-triangle me-2 mb-0 fs-4" style="vertical-align: -3px;"></span> {{
                        \Session::get('error_message') }}
                        <button type="button" class="btn-close mt-1" data-bs-dismiss="alert"
                            aria-label="@lang('miscellaneous.close')"></button>
                    </div>
                </div>
            </div>
        </div>
@endif
@if (!empty($response_error))
        <div class="position-fixed w-100" style="top: -5px; z-index: 9999;">
            <div class="row mb-5">
                <div class="col-lg-4 col-md-6 col-10 mx-auto">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="bi bi-exclamation-triangle me-2 mb-0 fs-4" style="vertical-align: -3px;"></span> {{
                        $response_error->message }}
                        <button type="button" class="btn-close mt-1" data-bs-dismiss="alert"
                            aria-label="@lang('miscellaneous.close')"></button>
                    </div>
                </div>
            </div>
        </div>
@endif

        <!-- ======= Main ======= -->
        <main id="main">
@yield('guest-content')

            <!-- ======= Donate Section ======= -->
            <section id="donate" class="contact section-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-lg-0 mb-sm-5 mb-4">
                            <div class="contact-about">
                                <h3>@lang('miscellaneous.foundation_name')</h3>
                                <p>@lang('miscellaneous.foundation_description')</p>

                                <div class="social-links">
                                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-lg-0 mb-5">
                            <div class="info">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-geo-alt"></i>
                                    <p>@lang('miscellaneous.public.footer.head_office.address')</p>
                                </div>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-envelope"></i>
                                    <p>@lang('miscellaneous.public.footer.head_office.email')</p>
                                </div>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-phone"></i>
                                    <p>@lang('miscellaneous.public.footer.head_office.phone')</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-8">
                            <form action="{{ route('donate') }}" method="POST" role="form" class="php-email-form mt-sm-0 mt-3">
@csrf
                                <input type="hidden" name="offer_type_id" value="9">

                                <div id="donorIdentity" class="row g-3 mb-4">
                                    <div class="col-12">
                                        <h3 class="mb-0 text-uppercase fw-bold text-green">@lang('miscellaneous.menu.public.donate')</h3>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="register_firstname" placeholder="@lang('miscellaneous.firstname')">
                                            <label for="register_firstname">@lang('miscellaneous.firstname')</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="register_lastname" placeholder="@lang('miscellaneous.lastname')">
                                            <label for="register_lastname">@lang('miscellaneous.lastname')</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="form-floating pt-0">
                                            <select name="select_country_user" id="select_country2" class="form-select pt-2 shadow-0">
                                                <option class="small" selected disabled>@lang('miscellaneous.choose_country')</option>
@isset($countries)
    @forelse ($countries as $country)
                                                <option value="+{{ $country->country_phone_code }}">{{ $country->country_name }}</option>
    @empty
                                                <option>@lang('miscellaneous.empty_list')</option>
    @endforelse
@endisset
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-7">
                                        <div class="input-group">
                                            <span id="phone_code_text2" class="input-group-text d-inline-block h-100 bg-light" style="padding-top: 0.3rem; padding-bottom: 0.5rem; line-height: 1.35;">
                                                <small class="text-secondary m-0 p-0" style="font-size: 0.85rem; color: #010101;">
                                                    @lang('miscellaneous.phone_code')
                                                </small><br>
                                                <span class="text-value">xxxx</span>
                                            </span>

                                            <div class="form-floating">
                                                <input type="tel" name="phone_number_user" id="phone_number_user" class="form-control" placeholder="@lang('miscellaneous.phone')">
                                                <label for="phone_number_user">@lang('miscellaneous.phone')</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="email" name="register_email" id="register_email" class="form-control" placeholder="@lang('miscellaneous.email')">
                                            <label for="register_email">@lang('miscellaneous.email')</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="financialDonation" class="row g-3 mb-4">
                                    <div class="col-12">
                                        <h5 class="h5 m-0 fw-bolder">@lang('miscellaneous.public.home.donate.send_money.description')</h5>
                                    </div>

                                    <div id="paymentMethod">
@isset($transaction_types)
    @foreach ($transaction_types as $type)
        @if ($type->type_name == 'Mobile money')
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input mt-2" type="radio" name="transaction_type_id" id="mobile_money" value="{{ $type->id }}" />
                                            <label role="button" class="form-check-label" for="mobile_money">
                                                <img src="{{ asset('assets/img/payment-mobile-money.png') }}" alt="Mobile money" width="40">
                                                @lang('miscellaneous.public.home.donate.send_money.mobile_money')
                                            </label>
                                        </div>
        @else
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input mt-2" type="radio" name="transaction_type_id" id="bank_card" value="{{ $type->id }}" />
                                            <label role="button" class="form-check-label" for="bank_card">
                                                <img src="{{ asset('assets/img/payment-credit-card.png') }}" alt="Carte bancaire" width="40">
                                                @lang('miscellaneous.public.home.donate.send_money.bank_card')
                                            </label>
                                        </div>
        @endif
    @endforeach
@endisset
                                    </div>
                                </div>

                                <div id="amountCurrency" class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="form-floating">
                                                <input type="number" name="register_amount" id="register_amount" class="form-control" placeholder="@lang('miscellaneous.amount')" required>
                                                <label for="register_amount">@lang('miscellaneous.amount')</label>
                                            </div>

                                            <div class="input-group-prepend">
                                                <select name="select_currency" id="select_currency" class="form-select input-group-text ps-3 pe-4 py-3 shadow-0" style="height: 3.63rem; background-color: #f3f3f3; border-end-start-radius: 0; border-start-start-radius: 0;">
                                                    <option class="small" selected disabled>@lang('miscellaneous.currency')</option>
                                                    <option value="USD">@lang('miscellaneous.usd')</option>
                                                    <option value="CDF">@lang('miscellaneous.cdf')</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="phoneNumberForMoney" class="row">
                                    <div class="col-lg-5 mb-3">
                                        <div class="form-floating pt-0">
                                            <select name="select_country" id="select_country3" class="form-select pt-2 shadow-0">
                                                <option class="small" selected disabled>@lang('miscellaneous.choose_country')</option>
@isset($countries)
    @forelse ($countries as $country)
                                                <option value="{{ $country->country_phone_code }}">{{ $country->country_name }}</option>
    @empty
                                                <option>@lang('miscellaneous.empty_list')</option>
    @endforelse
@endisset
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-7">
                                        <div class="input-group">
                                            <span id="phone_code_text3" class="input-group-text d-inline-block h-100 bg-light" style="padding-top: 0.3rem; padding-bottom: 0.5rem; line-height: 1.35;">
                                                <small class="text-secondary m-0 p-0" style="font-size: 0.85rem; color: #010101;">@lang('miscellaneous.phone_code')</small><br>
                                                <span class="text-value">xxxx</span>
                                            </span>
            
                                            <div class="form-floating">
                                                <input type="hidden" id="phone_code3" name="other_phone_code" value="">
                                                <input type="tel" name="other_phone_number" id="other_phone_number" class="form-control" placeholder="@lang('miscellaneous.phone')">
                                                <label for="other_phone_number">@lang('miscellaneous.phone')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="otherDonation" class="row mt-1 mb-4 g-3">
                                    <div class="col-12">
                                        <h5 class="h5 m-0 fw-bolder">@lang('miscellaneous.public.home.donate.other_donation.title')</h5>
                                    </div>
            
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea name="register_offer_name" id="register_offer_name" class="form-control" placeholder="Décrivez votre don" style="height: 100px"></textarea>
                                            <label for="register_offer_name">@lang('miscellaneous.public.home.donate.other_donation.description')</label>
                                        </div>
                                    </div>
                                </div>
            
                                <button class="btn btn-secondary w-100 rounded-pill" type="submit">@lang('miscellaneous.send')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section><!-- End Donate Section -->
        </main><!-- Main -->

        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright {{ date('Y') }} <strong><span>@lang('miscellaneous.foundation_name')</span></strong>. @lang('miscellaneous.all_right_reserved')
                </div>
                <div class="credits">
                    Designed by <a href="https://silasmas.com/">SDEV</a>
                </div>
            </div>
        </footer><!-- End  Footer -->

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

        <!-- Lonely Javascript -->
        <script src="{{ asset('assets/js/script.lonely.js') }}"></script>
        <!-- Custom Javascript -->
        <script type="text/javascript">
            $(document).ready(function () {
                var currentHost = $(location).attr('port') ? $(location).attr('protocol') + '//' + $(location).attr('hostname') + ':' + $(location).attr('port') : $(location).attr('protocol') + '//' + $(location).attr('hostname')
                // var apiURL = 'https://jptshienda.dev:1443';
                var apiURL = 'https://api.jptshienda.cd';
                var headers = {'Authorization': 'Bearer ' + $('[name="jpt-devref"]').attr('content'), 'Accept': 'application/json', 'X-localization': navigator.language};
                var currentLanguage = $('html').attr('lang');

                // jQuery DataTable
                $('#dataList').DataTable({
                    language: {
                        url: currentHost + '/assets/addons/custom/dataTables/Plugins/i18n/' + $('html').attr('lang') + '.json'
                    },
                    paging: 'matchMedia' in window ? (window.matchMedia('(min-width: 500px)').matches ? true : false) : false,
                    ordering: false,
                    info: 'matchMedia' in window ? (window.matchMedia('(min-width: 500px)').matches ? true : false) : false,
                });

                $('.navbar, .card, .btn').addClass('shadow-0');
                $('.btn').css({textTransform: 'inherit', paddingBottom: '0.5rem'});
                $('.back-to-top').click(function (e) {
                    $("html, body").animate({ scrollTop: "0" });
                });

                /* Auto-resize textarea */
                autosize($('textarea'));

                /* Get cropped image */
                // Modals
                var modalUser = $('#cropModalUser');
                var modalRecto = $('#cropModal_recto');
                var modalVerso = $('#cropModal_verso');
                // Preview images
                var retrievedAvatar = document.getElementById('retrieved_image');
                var retrievedImageRecto = document.getElementById('retrieved_image_recto');
                var currentImageRecto = document.querySelector('#rectoImageWrapper img');
                var retrievedImageVerso = document.getElementById('retrieved_image_verso');
                var currentImageVerso = document.querySelector('#versoImageWrapper img');
                var cropper;

                // AVATAR
                $('#avatar').on('change', function (e) {
                    var files = e.target.files;
                    var done = function (url) {
                        retrievedAvatar.src = url;
                        var modal = new bootstrap.Modal(document.getElementById('cropModalUser'), { keyboard: false });

                        modal.show();
                    };

                    if (files && files.length > 0) {
                        var reader = new FileReader();

                        reader.onload = function () {
                            done(reader.result);
                        };
                        reader.readAsDataURL(files[0]);
                    }
                });

                $(modalUser).on('shown.bs.modal', function () {
                    cropper = new Cropper(retrievedAvatar, {
                        aspectRatio: 1,
                        viewMode: 3,
                        preview: '#cropModalUser .preview',
                        done: function (data) { console.log(data); },
                        error: function (data) { console.log(data); }
                    });

                }).on('hidden.bs.modal', function () {
                    cropper.destroy();

                    cropper = null;
                });

                $('#cropModalUser #crop_avatar').click(function () {
                    // Ajax loading image to tell user to wait
                    $('.user-image').attr('src', currentHost + '/assets/img/ajax-loading.gif');

                    var canvas = cropper.getCroppedCanvas({
                        width: 700,
                        height: 700
                    });

                    canvas.toBlob(function (blob) {
                        URL.createObjectURL(blob);

                        var reader = new FileReader();

                        reader.readAsDataURL(blob);
                        reader.onloadend = function () {
                            var base64_data = reader.result;
                            var entity_id = document.getElementById('user_id').value;
                            var mUrl = apiURL + '/api/user/update_avatar_picture/' + parseInt($('#userId').val());
                            var datas = JSON.stringify({ 'id': parseInt($('#userId').val()), 'user_id': entity_id, 'image_64': base64_data });

                            modalUser.hide();

                            $.ajax({
                                headers: headers,
                                type: 'PUT',
                                contentType: 'application/json',
                                url: mUrl,
                                dataType: 'json',
                                data: datas,
                                success: function (res) {
                                    $('.user-image').attr('src', res);
                                    window.location.reload();
                                },
                                error: function (xhr, error, status_description) {
                                    console.log(xhr.responseJSON);
                                    console.log(xhr.status);
                                    console.log(error);
                                    console.log(status_description);
                                }
                            });
                        };
                    });
                });

                // RECTO
                $('#image_recto').on('change', function (e) {
                    var files = e.target.files;
                    var done = function (url) {
                        retrievedImageRecto.src = url;
                        var modal = new bootstrap.Modal(document.getElementById('cropModal_recto'), { keyboard: false });

                        modal.show();
                    };

                    if (files && files.length > 0) {
                        var reader = new FileReader();

                        reader.onload = function () {
                            done(reader.result);
                        };
                        reader.readAsDataURL(files[0]);
                    }
                });

                $('#cropModal_recto').on('shown.bs.modal', function () {
                    cropper = new Cropper(retrievedImageRecto, {
                        aspectRatio: 4 / 3,
                        viewMode: 3,
                        preview: '#cropModal_recto .preview'
                    });

                }).on('hidden.bs.modal', function () {
                    cropper.destroy();

                    cropper = null;
                });

                $('#cropModal_recto #crop_recto').on('click', function () {
                    var canvas = cropper.getCroppedCanvas({
                        width: 933,
                        height: 700
                    });

                    canvas.toBlob(function (blob) {
                        URL.createObjectURL(blob);
                        var reader = new FileReader();

                        reader.readAsDataURL(blob);
                        reader.onloadend = function () {
                            var base64_data = reader.result;

                            $(currentImageRecto).attr('src', base64_data);
                            $('#data_recto').attr('value', base64_data);
                        };
                    });

                    modalRecto.hide();
                });

                // VERSO
                $('#image_verso').on('change', function (e) {
                    var files = e.target.files;
                    var done = function (url) {
                        retrievedImageVerso.src = url;
                        var modal = new bootstrap.Modal(document.getElementById('cropModal_verso'), { keyboard: false });

                        modal.show();
                    };

                    if (files && files.length > 0) {
                        var reader = new FileReader();

                        reader.onload = function () {
                            done(reader.result);
                        };
                        reader.readAsDataURL(files[0]);
                    }
                });

                $('#cropModal_verso').on('shown.bs.modal', function () {
                    cropper = new Cropper(retrievedImageVerso, {
                        aspectRatio: 4 / 3,
                        viewMode: 3,
                        preview: '#cropModal_verso .preview'
                    });

                }).on('hidden.bs.modal', function () {
                    cropper.destroy();

                    cropper = null;
                });

                $('#cropModal_verso #crop_verso').on('click', function () {
                    var canvas = cropper.getCroppedCanvas({
                        width: 933,
                        height: 700
                    });

                    canvas.toBlob(function (blob) {
                        URL.createObjectURL(blob);
                        var reader = new FileReader();

                        reader.readAsDataURL(blob);
                        reader.onloadend = function () {
                            var base64_data = reader.result;

                            $(currentImageVerso).attr('src', base64_data);
                            $('#data_verso').attr('value', base64_data);
                        };
                    });

                    modalVerso.hide();
                });

                /* jQuery Date picker */
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

                /* Mark all notifications as read */
                $('#markAllRead').click(function (e) {
                    e.preventDefault();

                    $.ajax({
                        headers: headers,
                        type: 'PUT',
                        contentType: 'application/json',
                        url: apiURL + '/api/notification/mark_all_read/' + parseInt($(this).attr('data-user-id')),
                        success: function () {
                            window.location.reload();
                        },
                        error: function (xhr, error, status_description) {
                            console.log(xhr.responseJSON);
                            console.log(xhr.status);
                            console.log(error);
                            console.log(status_description);
                        }
                    });
                });
            });
        </script>
    </body>
</html>
