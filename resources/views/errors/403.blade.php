@extends('layouts.errors')

@section('errors-content')

            <!-- 403 Start -->
            <div class="container-xxl">
                <div class="container text-center">
                    <div class="row justify-content-center border-bottom border-secondary">
                        <div class="col-lg-2 col-md-3 col-sm-3 col-5 my-4">
                            <div class="bg-image">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="JPTshienda" class="img-fluid">
                                <div class="mask"><a href="{{ route('home') }}"></a></div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-6 my-4">
                            <h1 class="display-1 fw-bold text-danger">403</h1>
                            <h1 class="mb-4">{{ __('notifications.403_title') }}</h1>
                            <p class="mb-4">{{ __('notifications.403_description') }}</p>
                            <a href="{{ route('home') }}" class="btn btn-warning rounded-pill py-3 px-5">{{ __('miscellaneous.back_home') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 403 End -->

@endsection
