@extends('layouts.guest')

@section('guest-content')

            <!-- ======= About Section ======= -->
            <section id="about" class="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-sm-5 col-9 mx-sm-0 mx-auto">
                            <div class="card border">
                                <div class="card-body">
                                    <div class="bg-image mb-2">
                                        <img src="{{ $current_user->avatar_url != null ? $current_user->avatar_url : asset('assets/img/user.png') }}" alt="{{ $current_user->firstname . ' ' . $current_user->lastname }}" class="user-image img-fluid img-thumbnail rounded-5">
                                        <div class="mask"></div>
                                    </div>

                                    <form method="POST" class="">
                                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                        <label for="avatar" class="btn d-block btn-warning rounded-pill">
                                            <i class="bi bi-pencil me-3"></i>@lang('miscellaneous.change_image')
                                            <input type="file" name="avatar" id="avatar" class="d-none">
                                        </label>
                                    </form>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
            </section><!-- End About Section -->

@endsection
