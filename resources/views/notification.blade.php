@extends('layouts.guest')

@section('guest-content')

            <!-- ======= Breadcrumbs Section ======= -->
            <section class="breadcrumbs">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="mb-lg-0">@lang('miscellaneous.menu.notifications')</h2>
                        <ol>
                            <li><a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a></li>
                            <li>@lang('miscellaneous.menu.notifications')</li>
                        </ol>
                    </div>
                </div>
            </section><!-- Breadcrumbs Section -->

            <!-- ======= Notifications Section ======= -->
            <section id="about" class="about">
                <div class="container">
                    <div class="section-title pb-0">
                        <h2 class="text-green">@lang('miscellaneous.menu.notifications')</h2>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="list-group element" style="padding-left: 0;">
    @forelse ($current_user->notifications as $notification)
        @if ($notification->notif_name == 'notification')
                                <a href="/{{ $notification->notification_url }}" class="list-group-item list-group-item-action py-3">
                                    <p class="m-0 text-black acr-line-height-1_45">{{ $notification->notification_content }}</p>
                                    <small class="text-secondary small">{{ $notification->created_at }}</small>
                                </a>
        @endif
    @empty
    @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- Notifications Section -->
  
@endsection
