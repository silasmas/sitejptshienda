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
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/custom/sweetalert/sweetalert.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/custom/show-more/dist/css/show-more.min.css') }}">

        <!-- Adminator CSS File -->
        <style>
            #loader {
                transition: all 0.3s ease-in-out;
                opacity: 1;
                visibility: visible;
                position: fixed;
                height: 100vh;
                width: 100%;
                background: #fff;
                z-index: 90000;
            }

            #loader.fadeOut {
                opacity: 0;
                visibility: hidden;
            }

            .spinner {
                width: 40px;
                height: 40px;
                position: absolute;
                top: calc(50% - 20px);
                left: calc(50% - 20px);
                background-color: #333;
                border-radius: 100%;
                -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
                animation: sk-scaleout 1.0s infinite ease-in-out;
            }

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

            @-webkit-keyframes sk-scaleout {
                0% {
                    -webkit-transform: scale(0)
                }

                100% {
                    -webkit-transform: scale(1.0);
                    opacity: 0;
                }
            }

            @keyframes sk-scaleout {
                0% {
                    -webkit-transform: scale(0);
                    transform: scale(0);
                }

                100% {
                    -webkit-transform: scale(1.0);
                    transform: scale(1.0);
                    opacity: 0;
                }
            }
        </style>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.adminator.css') }}">

        <title>
{{-- Titles of all roles --}}
@if (Route::is('account') || Route::is('account.update.password') || Route::is('donate'))
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

{{-- Admin titles --}}
@if ($current_user->role_user->role->role_name == 'Administrateur')
    @if (Route::is('admin') || request()->user_role == 'admin')
            @lang('miscellaneous.admin.home.title')
    @endif

    @if (Route::is('legal_info.home') || Route::is('legal_info.datas'))
            @lang('miscellaneous.admin.legal_info_subject.title')
    @endif

    @if (Route::is('legal_info.entity.home') || Route::is('legal_info.entity.datas'))
        @if (!empty($entity))
            @if ($entity == 'title')
            @lang('miscellaneous.admin.legal_info_subject.legal_info_title.title')
            @endif

            @if ($entity == 'content')
            @lang('miscellaneous.admin.legal_info_subject.legal_info_content.title')
            @endif

        @else
            @lang('miscellaneous.admin.legal_info_subject.title')
        @endif
    @endif

    @if (Route::is('country.home') || Route::is('country.datas'))
            @lang('miscellaneous.admin.legal_info_subject.title')
    @endif

    @if (Route::is('miscellaneous.home') || Route::is('miscellaneous.datas'))
            @lang('miscellaneous.admin.miscellaneous.title')
    @endif

    @if (Route::is('miscellaneous.entity.home') || Route::is('miscellaneous.entity.datas'))
        @if (!empty($entity))
            @if ($entity == 'group')
            @lang('miscellaneous.admin.miscellaneous.group.title')
            @endif

            @if ($entity == 'type')
            @lang('miscellaneous.admin.miscellaneous.type.title')
            @endif

            @if ($entity == 'role')
            @lang('miscellaneous.admin.miscellaneous.role.title')
            @endif

            @if ($entity == 'admins')
            @lang('miscellaneous.admin.miscellaneous.other_admin.title')
            @endif

            @if ($entity == 'developers')
            @lang('miscellaneous.admin.miscellaneous.other_admin.title')
            @endif

            @if ($entity == 'managers')
            @lang('miscellaneous.admin.miscellaneous.other_admin.title')
            @endif
        @else
            @lang('miscellaneous.admin.miscellaneous.title')
        @endif
    @endif

    @if (Route::is('legal_info.search') || Route::is('legal_info.entity.search') || Route::is('country.search') || Route::is('miscellaneous.search') || Route::is('miscellaneous.entity.search'))
            @lang('miscellaneous.message.search_result')
    @endif
@endif

{{-- Developer titles --}}
@if ($current_user->role_user->role->role_name == 'Développeur')
    @if (Route::is('developer') || request()->user_role == 'developer')
            @lang('miscellaneous.developer.home.title')
    @endif

    @if (Route::is('apis.home') || Route::is('apis.entity'))
            @lang('miscellaneous.menu.developer.apis')
    @endif
@endif

{{-- Manager titles --}}
@if ($current_user->role_user->role->role_name == 'Manager')
    @if (Route::is('manager') || request()->user_role == 'manager')
            @lang('miscellaneous.manager.home.title')
    @endif

    @if (Route::is('party.member.home') || Route::is('party.member.new') || Route::is('party.member.on_going'))
            @lang('miscellaneous.manager.member.title')
    @endif

    @if (Route::is('party.member.datas') || Route::is('party.member.update'))
            {{ $selected_member->firstname . ' ' . $selected_member->lastname }}
    @endif

    @if (Route::is('party.managers') || Route::is('party.manager.new') || Route::is('party.manager.datas'))
            @lang('miscellaneous.menu.manager.other_managers')
    @endif

    @if (Route::is('party.infos'))
            @lang('miscellaneous.manager.info.title')
    @endif

    @if (Route::is('party.infos.entity'))
        @if (!empty($entity))
            @if ($entity == 'news')
            @lang('miscellaneous.manager.info.news.title')
            @endif

            @if ($entity == 'communique')
            @lang('miscellaneous.manager.info.communique.title')
            @endif

            @if ($entity == 'event')
            @lang('miscellaneous.manager.info.event.title')
            @endif

        @else
            @lang('miscellaneous.manager.info.title')
        @endif
    @endif

    @if (Route::is('party.infos.entity.datas'))
                {{ $news->news_title }}
    @endif
@endif
        </title>
    </head>

    <body class="app">
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
                        <input type="hidden" name="userId" id="userId" value="{{ !empty(Auth::user()) ? (Route::is('party.member.datas') ? $selected_member->id : Auth::user()->id) : null }}">
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

        <div>
            <!-- #Left Sidebar ==================== -->
            <div class="sidebar">
                <div class="sidebar-inner">
                    <!-- ### $Sidebar Header ### -->
                    <div class="sidebar-logo bg-light" style="height: 74px;">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer peer-greed">
@if ($current_user->role_user->role->role_name == 'Administrateur')
                                <a class="sidebar-link td-n" href="{{ route('admin') }}">
                                    <div class="peers ai-c fxw-nw">
                                        <div class="peer">
                                            <div class="logo ms-3" style="margin-top: 1.2rem;">
                                                <img src="{{ asset('assets/img/logo.png') }}" alt="" width="37">
                                            </div>
                                        </div>
                                        <div class="peer peer-greed p-0">
                                            <h5 class="h5 logo-text fw-bold" style="font-family: Arial"><span class="text-primary">J-P</span> <span class="text-success">TSHIENDA</span></h5>
                                        </div>
                                    </div>
                                </a>
@endif

@if ($current_user->role_user->role->role_name == 'Développeur')
                                <a class="sidebar-link td-n" href="{{ route('manager') }}">
                                    <div class="peers ai-c fxw-nw">
                                        <div class="peer">
                                            <div class="logo ms-3" style="margin-top: 1.2rem;">
                                                <img src="{{ asset('assets/img/logo.png') }}" alt="" width="37">
                                            </div>
                                        </div>
                                        <div class="peer peer-greed p-0">
                                            <h5 class="h5 logo-text fw-bold" style="font-family: Arial"><span class="text-primary">J-P</span> <span class="text-success">TSHIENDA</span></h5>
                                        </div>
                                    </div>
                                </a>
@endif

@if ($current_user->role_user->role->role_name == 'Manager')
                                <a class="sidebar-link td-n" href="{{ route('manager') }}">
                                    <div class="peers ai-c fxw-nw">
                                        <div class="peer">
                                            <div class="logo ms-3" style="margin-top: 1.2rem;">
                                                <img src="{{ asset('assets/img/logo.png') }}" alt="" width="37">
                                            </div>
                                        </div>
                                        <div class="peer peer-greed p-0">
                                            <h5 class="h5 logo-text fw-bold" style="font-family: Arial"><span class="text-primary">J-P</span> <span class="text-success">TSHIENDA</span></h5>
                                        </div>
                                    </div>
                                </a>
@endif
                            </div>
                            <div class="peer">
                                <div class="mobile-toggle sidebar-toggle">
                                    <a href="" class="td-n">
                                        <i class="ti-arrow-circle-left"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ### $Sidebar Menu ### -->
                    <ul class="sidebar-menu scrollable pos-r pt-2">
@if ($current_user->role_user->role->role_name == 'Administrateur')
                        <li class="nav-item{{ Route::is('admin') OR request()->user_role == 'admin' ? ' actived' : '' }}">
                            <a class="sidebar-link" href="{{ route('admin') }}">
                                <span class="icon-holder">
                                    <i class="bi bi-grid-1x2 c-blue-500"></i>
                                </span>
                                <span class="title">@lang('miscellaneous.menu.dashboard')</span>
                            </a>
                        </li>

                        {{-- <li
                            class="nav-item{{ Route::is('message.inbox') OR Route::is('message.outbox') OR Route::is('message.draft') OR Route::is('message.spams') OR Route::is('message.new') OR Route::is('message.search') ? ' actived' : '' }}">
                            <a class="sidebar-link" href="{{ route('message.inbox') }}">
                                <span class="icon-holder">
                                    <i class="ti-email align-middle c-brown-500"></i>
                                </span>
                                <span class="title">@lang('miscellaneous.menu.messages')</span>
                            </a>
                        </li> --}}

                        <li class="nav-item{{ Route::is('legal_info.home') OR Route::is('legal_info.datas') OR Route::is('legal_info.entity.home') OR Route::is('legal_info.entity.datas') ? ' actived' : '' }}">
                            <a class="sidebar-link" href="{{ route('legal_info.home') }}">
                                <span class="icon-holder">
                                    <i class="bi bi-shield-check align-middle c-blue-500"></i>
                                </span>
                                <span class="title">@lang('miscellaneous.menu.admin.legal_info')</span>
                            </a>
                        </li>

                        <li class="nav-item{{ Route::is('country.home') OR Route::is('country.datas') ? ' actived' : '' }}">
                            <a class="sidebar-link" href="{{ route('country.home') }}">
                                <span class="icon-holder">
                                    <i class="bi bi-pin-map-fill align-middle c-deep-orange-500"></i>
                                </span>
                                <span class="title">@lang('miscellaneous.menu.admin.country')</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="ti-view-list-alt align-middle c-teal-500"></i>
                                </span>
                                <span class="title">@lang('miscellaneous.menu.admin.miscellaneous')</span>
                                <span class="arrow">
                                    <i class="ti-angle-right"></i>
                                </span>
                            </a>

                            <ul class="dropdown-menu">
                                <li
                                    class="{{ Route::is('miscellaneous.home') OR Route::is('miscellaneous.datas') OR Route::is('miscellaneous.entity.home') OR Route::is('miscellaneous.entity.datas') ? ' actived' : '' }}">
                                    <a href="{{ route('miscellaneous.home') }}">
                                        <span>@lang('miscellaneous.menu.home')</span>
                                    </a>
                                </li>

                                <li
                                    class="{{ Route::is('miscellaneous.entity.home') AND $entity == 'group' OR Route::is('miscellaneous.entity.datas') AND $entity == 'group' ? ' actived' : '' }}">
                                    <a href="{{ route('miscellaneous.entity.home', ['entity' => 'group']) }}">
                                        <span>@lang('miscellaneous.admin.miscellaneous.group.title')</span>
                                    </a>
                                </li>

                                <li
                                    class="{{ Route::is('miscellaneous.entity.home') AND $entity == 'type' OR Route::is('miscellaneous.entity.datas') AND $entity == 'type' ? ' actived' : '' }}">
                                    <a href="{{ route('miscellaneous.entity.home', ['entity' => 'type']) }}">
                                        <span>@lang('miscellaneous.admin.miscellaneous.type.title')</span>
                                    </a>
                                </li>

                                <li
                                    class="{{ Route::is('miscellaneous.entity.home') AND $entity == 'role' OR Route::is('miscellaneous.entity.datas') AND $entity == 'role' ? ' actived' : '' }}">
                                    <a href="{{ route('miscellaneous.entity.home', ['entity' => 'role']) }}">
                                        <span>@lang('miscellaneous.admin.miscellaneous.role.title')</span>
                                    </a>
                                </li>

                                <li
                                    class="{{ Route::is('miscellaneous.entity.home') AND $entity == 'admins' OR Route::is('miscellaneous.entity.datas') AND $entity == 'admins' ? ' actived' : '' }}">
                                    <a href="{{ route('miscellaneous.entity.home', ['entity' => 'admins']) }}">
                                        <span>@lang('miscellaneous.admin.miscellaneous.other_admin.title')</span>
                                    </a>
                                </li>

                                <li
                                    class="{{ Route::is('miscellaneous.entity.home') AND $entity == 'developers' OR Route::is('miscellaneous.entity.datas') AND $entity == 'developers' ? ' actived' : '' }}">
                                    <a href="{{ route('miscellaneous.entity.home', ['entity' => 'developers']) }}">
                                        <span>@lang('miscellaneous.admin.miscellaneous.developers.title')</span>
                                    </a>
                                </li>

                                <li
                                    class="{{ Route::is('miscellaneous.entity.home') AND $entity == 'managers' OR Route::is('miscellaneous.entity.datas') AND $entity == 'managers' ? ' actived' : '' }}">
                                    <a href="{{ route('miscellaneous.entity.home', ['entity' => 'managers']) }}">
                                        <span>@lang('miscellaneous.admin.miscellaneous.managers.title')</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
@endif

@if ($current_user->role_user->role->role_name == 'Développeur')
                        <li
                            class="nav-item{{ Route::is('developer') OR request()->user_role == 'developer' ? ' actived' : '' }}">
                            <a class="sidebar-link" href="{{ route('developer') }}">
                                <span class="icon-holder">
                                    <i class="bi bi-grid-1x2 c-blue-500"></i>
                                </span>
                                <span class="title">@lang('miscellaneous.menu.dashboard')</span>
                            </a>
                        </li>

                        {{-- <li
                            class="nav-item{{ Route::is('message.inbox') OR Route::is('message.outbox') OR Route::is('message.draft') OR Route::is('message.spams') OR Route::is('message.new') OR Route::is('message.search') ? ' actived' : '' }}">
                            <a class="sidebar-link" href="{{ route('message.inbox') }}">
                                <span class="icon-holder">
                                    <i class="c-brown-500 ti-email"></i>
                                </span>
                                <span class="title">@lang('miscellaneous.menu.messages')</span>
                            </a>
                        </li> --}}

                        <li class="nav-item{{ Route::is('apis.home') OR Route::is('apis.entity') ? ' actived' : '' }}">
                            <a class="sidebar-link" href="{{ route('apis.home') }}">
                                <span class="icon-holder">
                                    <i class="c-blue-500 ti-share"></i>
                                </span>
                                <span class="title">@lang('miscellaneous.menu.developer.apis')</span>
                            </a>
                        </li>
@endif

@if ($current_user->role_user->role->role_name == 'Manager')
                        <li
                            class="nav-item{{ Route::is('manager') OR request()->user_role == 'manager' ? ' actived' : '' }}">
                            <a class="sidebar-link" href="{{ route('manager') }}">
                                <span class="icon-holder">
                                    <i class="bi bi-grid-1x2 c-blue-500"></i>
                                </span>
                                <span class="title">@lang('miscellaneous.menu.dashboard')</span>
                            </a>
                        </li>

                        {{-- <li
                            class="nav-item{{ Route::is('message.inbox') OR Route::is('message.outbox') OR Route::is('message.draft') OR Route::is('message.spams') OR Route::is('message.new') OR Route::is('message.search') ? ' actived' : '' }}">
                            <a class="sidebar-link" href="{{ route('message.inbox') }}">
                                <span class="icon-holder">
                                    <i class="c-brown-500 align-middle ti-email"></i>
                                </span>
                                <span class="title">@lang('miscellaneous.menu.messages')</span>
                            </a>
                        </li> --}}

                        <li
                            class="nav-item{{ Route::is('party.member.home') OR Route::is('party.member.datas') OR Route::is('party.member.new') OR Route::is('party.member.on_going') ? ' actived' : '' }}">
                            <a class="sidebar-link" href="{{ route('party.member.home') }}">
                                <span class="icon-holder">
                                    <i class="bi bi-people align-middle c-orange-700 fs-5"></i>
                                </span>
                                <span class="title">@lang('miscellaneous.menu.manager.members')</span>
                            </a>
                        </li>

                        <li
                            class="nav-item{{ Route::is('party.managers') OR Route::is('party.manager.new') OR Route::is('party.manager.datas') ? ' actived' : '' }}">
                            <a class="sidebar-link" href="{{ route('party.managers') }}">
                                <span class="icon-holder">
                                    <i class="bi bi-clipboard-pulse c-green-700 align-middle"></i>
                                </span>
                                <span class="title">@lang('miscellaneous.menu.manager.other_managers')</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="bi bi-journal-arrow-up align-middle c-red-500"></i>
                                </span>
                                <span class="title">@lang('miscellaneous.menu.manager.infos')</span>
                                <span class="arrow">
                                    <i class="ti-angle-right"></i>
                                </span>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="{{ Route::is('party.infos') ? ' actived' : '' }}">
                                    <a href="{{ route('party.infos') }}">
                                        <span>@lang('miscellaneous.menu.home')</span>
                                    </a>
                                </li>

                                <li
                                    class="{{ Route::is('party.infos.entity') AND $entity == 'news' OR Route::is('party.infos.entity.datas') AND $entity == 'news' ? ' actived' : '' }}">
                                    <a href="{{ route('party.infos.entity', ['entity' => 'news']) }}">
                                        <span>@lang('miscellaneous.manager.info.news.title')</span>
                                    </a>
                                </li>

                                <li
                                    class="{{ Route::is('party.infos.entity') AND $entity == 'communique' OR Route::is('party.infos.entity.datas') AND $entity == 'communique' ? ' actived' : '' }}">
                                    <a href="{{ route('party.infos.entity', ['entity' => 'communique']) }}">
                                        <span>@lang('miscellaneous.manager.info.communique.title')</span>
                                    </a>
                                </li>

                                <li
                                    class="{{ Route::is('party.infos.entity') AND $entity == 'event' OR Route::is('party.infos.entity.datas') AND $entity == 'event' ? ' actived' : '' }}">
                                    <a href="{{ route('party.infos.entity', ['entity' => 'event']) }}">
                                        <span>@lang('miscellaneous.manager.info.event.title')</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
@endif
                    </ul>
                </div>
            </div>

            <!-- #Main ============================ -->
            <div class="page-container">
                <!-- ### $Topbar ### -->
                <div class="header navbar shadow-0">
                    <div class="header-container">
                        <ul class="nav-left mt-2">
                            <li>
                                <a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);">
                                    <i class="ti-menu"></i>
                                </a>
                            </li>
                            <li class="search-box" style="height: 60px;">
                                <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                                    <i class="search-icon ti-search pdd-right-10"></i>
                                    <i class="search-icon-close ti-close pdd-right-10"></i>
                                </a>
                            </li>
                            <li class="search-input">
                                <input class="form-control" type="text" placeholder="@lang('miscellaneous.search')">
                            </li>
                        </ul>

                        <ul class="nav-right mt-1">
                            {{-- Notification --}}
                            <li id="adminNotification" class="notifications{{ $current_user->notifications[0]->status->status_name == 'Non lue' ? ' dropdown' : '' }}">
@if ($current_user->notifications[0]->status->status_name == 'Non lue')
                                <span class="counter bg-transparent p-0 border border-4 acr-border-red" style="top: 6px; width: 16px; height: 16px; font-size: O.1rem; color: transparent;"></span>
@endif

                                <a href="{{ route('notification.home') }}" id="notificationLink" class="dropdown-toggle no-after" data-bs-toggle="{{ $current_user->notifications[0]->status->status_name == 'Non lue' ? 'dropdown' : '' }}" aria-expanded="false">
                                    <i class="fs-3 align-middle{{ $current_user->notifications[0]->status->status_name == 'Non lue' ? ' bi bi-bell-fill text-primary' : 'bi bi-bell' }}"></i>
                                </a>

                                <ul class="dropdown-menu border-0 overflow-hidden" data-user-id="{{ $current_user->id }}" aria-labelledby="notificationLink">
                                    <li class="acr-bg-gray text-center">
                                        <a id="markAllRead" href="#" class="dropdown-item py-3" data-user-id="{{ $current_user->id }}">
                                            <i class="far fa-circle me-2"></i>@lang('miscellaneous.mark_all_read')
                                        </a>
                                    </li>
                                    <li>
                                        <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
@forelse ($current_user->notifications as $notification)
    @if ($loop->index < 3)
                                            <li>
                                                <a href="/{{ $notification->notification_url }}" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                                    <div class="peer peer-greed">
                                                        <span>
                                                            <span class="text-dark">{{ $notification->notification_content }}</span>
                                                        </span>
                                                        <p class="m-0">
                                                            <small class="c-grey-600">{{ $notification->created_at }}</small>
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
    @endif
@empty
@endforelse
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('notification.home') }}" class="d-flex justify-content-center acr-bg-blue-transparent py-3 fsz-sm td-n text-white">
                                            @lang('miscellaneous.see_all_notifications') <i class="ti-angle-right mT-4 mL-10"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- Avatar --}}
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-bs-toggle="dropdown">
                                    <div id="userImageWrapper" class="peer mR-10">
                                        <img src="{{ $current_user->avatar_url != null ? $current_user->avatar_url : asset('assets/img/user.png') }}" alt="{{ $current_user->firstname . ' ' . $current_user->lastname }}" class="user-image w-2r bdrs-50p">
                                    </div>
                                    <div class="peer">
                                        <span class="fsz-sm c-grey-900">{{ $current_user->firstname . ' ' . $current_user->lastname }}</span>
                                    </div>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end fsz-sm py-0" style="min-width: 230px">
                                    <li class="d-flex justify-content-center py-3" style="background-color: #e0e0e0;">
                                        <div id="userImageWrapper" class="bg-image">
                                            <img src="{{ $current_user->avatar_url != null ? $current_user->avatar_url : asset('assets/img/user.png') }}" alt="{{ $current_user->firstname . ' ' . $current_user->lastname }}" width="70" class="user-image img-thumbnail rounded-circle me-2">
                                            <div class="mask"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ route('home') }}" class="d-b td-n py-3 bgcH-grey-100 c-grey-700">
                                            <i class="ti-home mR-10"></i>
                                            <span>@lang('miscellaneous.back_home')</span>
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="{{ route('account') }}" class="d-b td-n py-3 bgcH-grey-100 c-grey-700">
                                            <i class="ti-settings mR-10"></i>
                                            <span>@lang('miscellaneous.menu.account_settings')</span>
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}" class="d-b td-n py-3 bgcH-grey-100 c-grey-700">
                                            <i class="ti-power-off mR-10"></i>
                                            <span>@lang('miscellaneous.logout')</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- ### $App Screen Content ### -->
                <main class="main-content bgc-grey-100">
@if (!empty(request()->alert_success))
                    <div class="position-fixed w-100" style="top: 41px; z-index: 9999;">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-10 mx-auto">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="bi bi-info-circle me-2 mb-0 fs-4" style="vertical-align: -3px;"></span> {{ request()->alert_success }}
                                    <button type="button" class="btn-close mt-1" data-bs-dismiss="alert" aria-label="@lang('miscellaneous.close')"></button>
                                </div>
                            </div>
                        </div>
                    </div>
@endif
@if (\Session::has('alert_success'))
                    <div class="position-fixed w-100" style="top: 41px; z-index: 9999;">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-10 mx-auto">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="bi bi-info-circle me-2 mb-0 fs-4" style="vertical-align: -3px;"></span> {{ \Session::get('alert_success') }}
                                    <button type="button" class="btn-close mt-1" data-bs-dismiss="alert" aria-label="@lang('miscellaneous.close')"></button>
                                </div>
                            </div>
                        </div>
                    </div>
@endif
@if (\Session::has('success_message'))
                    <div class="position-fixed w-100" style="top: 41px; z-index: 9999;">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-10 mx-auto">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="bi bi-info-circle me-2 mb-0 fs-4" style="vertical-align: -3px;"></span> {{ \Session::get('success_message') }}
                                    <button type="button" class="btn-close mt-1" data-bs-dismiss="alert" aria-label="@lang('miscellaneous.close')"></button>
                                </div>
                            </div>
                        </div>
                    </div>
@endif
@if (!empty($alert_success))
                    <div class="position-fixed w-100" style="top: 41px; z-index: 9999;">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-10 mx-auto">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="bi bi-info-circle me-2 mb-0 fs-4" style="vertical-align: -3px;"></span> {{ $alert_success }}
                                    <button type="button" class="btn-close mt-1" data-bs-dismiss="alert" aria-label="@lang('miscellaneous.close')"></button>
                                </div>
                            </div>
                        </div>
                    </div>
@endif
@if (!empty($errors) && !empty($errors->first('server_error')))
                    <div class="position-fixed w-100" style="top: 41px; z-index: 9999;">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-10 mx-auto">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="bi bi-exclamation-triangle me-2 mb-0 fs-4" style="vertical-align: -3px;"></span> {{ $errors->first('server_error') }}
                                    <button type="button" class="btn-close mt-1" data-bs-dismiss="alert" aria-label="@lang('miscellaneous.close')"></button>
                                </div>
                            </div>
                        </div>
                    </div>
@endif
@if (\Session::has('error_message'))
                    <div class="position-fixed w-100" style="top: 41px; z-index: 9999;">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-10 mx-auto">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="bi bi-exclamation-triangle me-2 mb-0 fs-4" style="vertical-align: -3px;"></span> {{ \Session::get('error_message') }}
                                    <button type="button" class="btn-close mt-1" data-bs-dismiss="alert" aria-label="@lang('miscellaneous.close')"></button>
                                </div>
                            </div>
                        </div>
                    </div>
@endif
@if (\Session::has('response_error'))
                    <div class="position-fixed w-100" style="top: 41px; z-index: 9999;">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-10 mx-auto">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="bi bi-exclamation-triangle me-2 mb-0 fs-4" style="vertical-align: -3px;"></span> {{ \Session::get('response_error') }}
                                    <button type="button" class="btn-close mt-1" data-bs-dismiss="alert" aria-label="@lang('miscellaneous.close')"></button>
                                </div>
                            </div>
                        </div>
                    </div>
@endif
@if (!empty($response_error))
                    <div class="position-fixed w-100" style="top: 41px; z-index: 9999;">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-10 mx-auto">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="bi bi-exclamation-triangle me-2 mb-0 fs-4" style="vertical-align: -3px;"></span> {{ $response_error->message }}
                                    <button type="button" class="btn-close mt-1" data-bs-dismiss="alert" aria-label="@lang('miscellaneous.close')"></button>
                                </div>
                            </div>
                        </div>
                    </div>
@endif
                    <div id="mainContent">
@yield('app-content')
                    </div>
                </main>

                <!-- ### $App Screen Footer ### -->
                <footer class="bdT ta-c p-30 lh-0 c-grey-600">
                    <span>&copy; <a href="{{ route('about.home') }}" class="text-info">ACR</a> @lang('miscellaneous.all_right_reserved')</span>
                </footer>
            </div>
        </div>

        <!-- JavaScript Libraries -->
        <script src="{{ asset('assets/addons/custom/jquery/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/jquery/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/jquery/ellipsis/jquery.ellipsis.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/mdb/js/mdb.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/dataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/cropper/js/cropper.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/croppie/croppie.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/autosize/js/autosize.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/biliap/js/biliap.cores.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/sweetalertjs/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/show-more/dist/js/showMore.min.js') }}"></script>

        <!-- Adminator Javascript -->
        <script defer="defer" src="{{ asset('assets/js/scripts.adminator.js') }}"></script>
        <!-- Custom Javascript -->
        <script src="{{ asset('assets/js/scripts.custom.js') }}"></script>
        <script type="text/javascript">
            var currentHost = $(location).attr('port') ? $(location).attr('protocol') + '//' + $(location).attr('hostname') + ':' + $(location).attr('port') : $(location).attr('protocol') + '//' + $(location).attr('hostname')
            // var apiURL = 'https://jptshienda.dev:1443';
            var apiURL = 'https://api.jptshienda.cd';
            var headers = {'Authorization': 'Bearer ' + $('[name="jpt-devref"]').attr('content'), 'Accept': 'application/json', 'X-localization': navigator.language};
            var currentLanguage = $('html').attr('lang');

            new ShowMore('.element', {
                config: {
                    type: "list",
                    limit: 4,
                    element: "li",
                    more: "↓ <?= __('miscellaneous.see_more') ?>",
                    less: "↑ <?= __('miscellaneous.see_less') ?>",
                    number: true
                }
            });

            function changeStatus(id) {
                var element = document.getElementById(id);
                var xhr = new XMLHttpRequest();

                xhr.open('PUT', apiURL + '/api/user/switch_status/' + parseInt(id.split('-')[1]) + '/' + (element.getAttribute('aria-current') === 'Activé' ? 4 : 3));
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('Authorization', 'Bearer uWNJB6EwpVQwSuL5oJ7S7JkSkLzdpt8M1Xrs1MZITE1bCEbjMhscv8ZX2sTiDBarCHcu1EeJSsSLZIlYjr6YCl7pLycfn2AAQmYm');
                xhr.send(JSON.stringify({'id' : parseInt(id.split('-')[1]), 'status_id' : (element.getAttribute('aria-current') === 'Activé' ? 4 : 3)}));
                xhr.onload = function () {
                    if(xhr.status === 200) {
                        window.location.reload();
                    }
                }
            }

            function changeRole(id) {
                var element = document.getElementById(id);
                var xhr = new XMLHttpRequest();

                xhr.open('PUT', apiURL + '/api/user/update_role/' + parseInt(id.split('-')[1]));
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('Authorization', 'Bearer uWNJB6EwpVQwSuL5oJ7S7JkSkLzdpt8M1Xrs1MZITE1bCEbjMhscv8ZX2sTiDBarCHcu1EeJSsSLZIlYjr6YCl7pLycfn2AAQmYm');
                xhr.send(JSON.stringify({'id' : parseInt(id.split('-')[1]), 'role_id' : (element.value)}));
                xhr.onload = function () {
                    if(xhr.status === 200) {
                        window.location.reload();
                    }
                }
            }

            function deletemsg(id, url) {
                swal({
                    title: '<?= __("miscellaneous.attention_delete") ?>',
                    text: '<?= __("miscellaneous.confirm_delete") ?>',
                    icon: 'warning',
                    dangerMode: true,
                    buttons: {
                        cancel: '<?= __("miscellaneous.no") ?>',
                        delete: '<?= __("miscellaneous.yes") ?>'
                    }

                }).then(function (willDelete) {
                    if (willDelete) {
                        $.ajax({
                            headers: headers,
                            url: url + "/" + id,
                            method: "DELETE",
                            data: {'idv':id},
                            success: function (data) {
                                //  load('#tab-session');
                                if (!data.success) {
                                    swal({
                                        title: data.message,
                                        icon: 'error'
                                    });

                                } else {
                                    swal({
                                        title: data.message,
                                        icon: 'success'
                                    });
                                    location.reload();
                                }
                            },
                        });

                    } else {
                        swal({
                            title: '<?= __("miscellaneous.delete_canceled") ?>',
                            icon: 'error'
                        });
                    }
                });
            }

            $(function () {
                // jQuery DataTable
                $('#dataList').DataTable({
                    language: {
                        url: currentHost + '/assets/addons/custom/dataTables/Plugins/i18n/' + $('html').attr('lang') + '.json'
                    },
                    paging: 'matchMedia' in window ? (window.matchMedia('(min-width: 500px)').matches ? true : false) : false,
                    ordering: false,
                    info: 'matchMedia' in window ? (window.matchMedia('(min-width: 500px)').matches ? true : false) : false,
                });

                // Show/Hide ID card recto/verso
                $('#rectoVersoText').click(function (e) {
                    e.preventDefault();

                    var rectoText = '<?= __("miscellaneous.recto") ?>';
                    var versoText = '<?= __("miscellaneous.verso") ?>';

                    if ($('#cardVerso').hasClass('d-none')) {
                        $('#cardVerso').removeClass('d-none');
                        $('#cardRecto').addClass('d-none');

                        $('#rectoVersoText span').text(rectoText);

                    } else {
                        $('#cardVerso').addClass('d-none');
                        $('#cardRecto').removeClass('d-none');

                        $('#rectoVersoText span').text(versoText);
                    }
                });

                // Get cropped image
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
                        aspectRatio: 16 / 9,
                        viewMode: 3,
                        preview: '#cropModal_recto .preview'
                    });

                }).on('hidden.bs.modal', function () {
                    cropper.destroy();

                    cropper = null;
                });

                $('#cropModal_recto #crop_recto').on('click', function () {
                    var canvas = cropper.getCroppedCanvas({
                        width: 1280,
                        height: 720
                    });

                    canvas.toBlob(function (blob) {
                        URL.createObjectURL(blob);
                        var reader = new FileReader();

                        reader.readAsDataURL(blob);
                        reader.onloadend = function () {
                            var base64_data = reader.result;

                            $(currentImageRecto).attr('src', base64_data);
                            $('#register_recto').attr('value', base64_data);
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
                        aspectRatio: 16 / 9,
                        viewMode: 3,
                        preview: '#cropModal_verso .preview'
                    });

                }).on('hidden.bs.modal', function () {
                    cropper.destroy();

                    cropper = null;
                });

                $('#cropModal_verso #crop_verso').on('click', function () {
                    var canvas = cropper.getCroppedCanvas({
                        width: 1280,
                        height: 720
                    });

                    canvas.toBlob(function (blob) {
                        URL.createObjectURL(blob);
                        var reader = new FileReader();

                        reader.readAsDataURL(blob);
                        reader.onloadend = function () {
                            var base64_data = reader.result;

                            $(currentImageVerso).attr('src', base64_data);
                            $('#register_verso').attr('value', base64_data);
                        };
                    });

                    modalVerso.hide();
                });
            });
        </script>
    </body>
</html>