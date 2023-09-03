@extends('layouts.guest')

@section('guest-content')

            <!-- ======= About Section ======= -->
            <section id="about" class="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <h1>{{ $current_user->firstname . ' ' . $current_user->lastname }}</h1>
                        </div>
                    </div>
                </div>
            </section><!-- End About Section -->

@endsection
