@extends('layouts.guest')

@section('guest-content')

            <!-- ======= Breadcrumbs Section ======= -->
            <section class="breadcrumbs">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center">
    @if (Route::is('about.home'))
                        <h2 class="mb-lg-0">@lang('miscellaneous.public.about.title')</h2>
                        <ol>
                            <li><a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a></li>
                            <li>@lang('miscellaneous.menu.public.about')</li>
                        </ol>
    @endif

    @if (Route::is('about.terms_of_use'))
                        <h2 class="mb-lg-0">@lang('miscellaneous.public.terms_of_use.title')</h2>
                        <ol>
                            <li><a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a></li>
                            <li><a href="{{ route('about.home') }}">@lang('miscellaneous.menu.public.about')</a></li>
                            <li>@lang('miscellaneous.public.terms_of_use.title')</li>
                        </ol>
    @endif

    @if (Route::is('about.privacy_policy'))
                        <h2 class="mb-lg-0">@lang('miscellaneous.public.privacy_policy.title')</h2>
                        <ol>
                            <li><a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a></li>
                            <li><a href="{{ route('about.home') }}">@lang('miscellaneous.menu.public.about')</a></li>
                            <li>@lang('miscellaneous.public.privacy_policy.title')</li>
                        </ol>
    @endif

    @if (Route::is('about.help'))
                        <h2 class="mb-lg-0">@lang('miscellaneous.public.help.title')</h2>
                        <ol>
                            <li><a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a></li>
                            <li><a href="{{ route('about.home') }}">@lang('miscellaneous.menu.public.about')</a></li>
                            <li>@lang('miscellaneous.public.help.title')</li>
                        </ol>
    @endif

    @if (Route::is('about.faq'))
                        <h2 class="mb-lg-0">@lang('miscellaneous.public.faq.title')</h2>
                        <ol>
                            <li><a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a></li>
                            <li><a href="{{ route('about.home') }}">@lang('miscellaneous.menu.public.about')</a></li>
                            <li>@lang('miscellaneous.public.faq.title')</li>
                        </ol>
    @endif
                    </div>
                </div>
            </section><!-- Breadcrumbs Section -->

    @if (Route::is('about.home'))
            <!-- ======= About Foundation Section ======= -->
            <section id="about" class="about">
                <div class="container">
                    <div class="section-title pb-0">
                        <h2 class="text-green">{{ $about_foundation->subject_name }}</h2>
                    </div>

                    <div class="row">
                        <div class="col-lg-9">
                            <pre class="fs-5">{{ $about_foundation->subject_description }}</pre>

                            <hr class="mt-4 mb-5">

        @foreach ($about_foundation->legal_info_titles as $info_title)
                            <h3 class="h3 mt-3 fw-bold">{{ $info_title->title }}</h3>

            @foreach ($info_title->legal_info_contents as $info_content)
                @if ($info_content->photo_url != null)
                            <div class="row">
                                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="bg-image">
                                        <img src="{{ $info_content->photo_url }}" alt="{{ $info_title->title }}" class="img-fluid rounded">
                                        <div class="mask"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 pe-2 wow fadeInUp" data-wow-delay="0.5s">
                                    <h5 class="h5 mt-3 text-blue fw-bold">{{ $info_content->subtitle }}</h5>
                                    <p class="mb-4"><pre class="fw-light">{{ $info_content->content }}</pre></p>
                                </div>
                            </div>
                @else
                            <div class="row">
                                <div class="col-12 pe-2 wow fadeInUp" data-wow-delay="0.3s">
                                    <h5 class="h5 mt-3 text-blue fw-bold">{{ $info_content->subtitle }}</h5>
                                    <p class="mb-4"><pre class="fw-light">{{ $info_content->content }}</pre></p>
                                </div>
                            </div>
                @endif
            @endforeach                
        @endforeach
                        </div>

                        <div class="col-lg-3">
                            <div class="card my-4 border border-default shadow-0">
                                <div class="card-body">
                                    <h4 class="h4 mb-4 text-black fw-bold">@lang('miscellaneous.public.about.other_links.title')</h4>

                                    <a href="{{ route('about.terms_of_use') }}" class="btn btn-sm btn-light mb-3 py-2 rounded-pill shadow-0">@lang('miscellaneous.public.about.other_links.link1')</a>
                                    <a href="{{ route('about.privacy_policy') }}" class="btn btn-sm btn-light mb-3 py-2 rounded-pill shadow-0">@lang('miscellaneous.public.about.other_links.link2')</a>
                                    <a href="{{ route('about.help') }}" class="btn btn-sm btn-light mb-3 py-2 rounded-pill shadow-0">@lang('miscellaneous.public.about.other_links.link3')</a>
                                    <a href="{{ route('about.faq') }}" class="btn btn-sm btn-light mb-3 py-2 rounded-pill shadow-0">@lang('miscellaneous.public.about.other_links.link4')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End About Foundation Section -->

            <!-- ======= About App Section ======= -->
            <section id="about" class="about section-bg">
                <div class="container">
                    <div class="section-title pb-0">
                        <h2 class="text-green">{{ $about_app->subject_name }}</h2>
                    </div>

                    <pre class="fs-5">{{ $about_app->subject_description }}</pre>

                    <hr class="mt-4 mb-5">

        @foreach ($about_app->legal_info_titles as $info_title)
            @if ($info_title->title == 'Avantages d\'utiliser notre appli mobile')
                    <h4 class="h4 mt-3 fw-bold">{{ $info_title->title }}</h4>

                @foreach ($info_title->legal_info_contents as $info_content)
                    <ul>
                        <li class="wow fadeInUp" data-wow-delay="0.1s">
                            <h5 class="h5 mt-4 mb-0 text-blue fw-bold">{{ $info_content->subtitle }}</h5>
                            <p class="mb-3"><pre class="fw-light">{{ $info_content->content }}</pre></p>
                        </li>
                    </ul>
                @endforeach
            @else
                    <h4 class="h4 mt-3 fw-bold">{{ $info_title->title }}</h4>

                @foreach ($info_title->legal_info_contents as $info_content)
                    @if ($info_content->photo_url != null)
                    <div class="row">
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="bg-image">
                                <img src="{{ $info_content->photo_url }}" alt="{{ $info_title->title }}" class="img-fluid rounded">
                                <div class="mask"></div>
                            </div>
                        </div>
                        <div class="col-md-6 pe-2 wow fadeInUp" data-wow-delay="0.5s">
                            <h5 class="h5 mt-3 text-blue fw-bold">{{ $info_content->subtitle }}</h5>
                            <p class="mb-4"><pre class="fw-light">{{ $info_content->content }}</pre></p>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-12 pe-2 wow fadeInUp" data-wow-delay="0.3s">
                            <h5 class="h5 mt-3 text-blue fw-bold">{{ $info_content->subtitle }}</h5>
                            <p class="mb-4"><pre class="fw-light">{{ $info_content->content }}</pre></p>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif
        @endforeach
                    <div class="row mt-5">
                        <div class="col-lg-4 col-sm-6">
                            <div class="bg-image mb-4">
                                <img src="{{ asset('assets/img/button-playstore-white.png') }}" alt="" class="img-fluid">
                                <div class="mask"><a href="#" class="stretched-link"></a></div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <div class="bg-image">
                                <img src="{{ asset('assets/img/button-applestore-white.png') }}" alt="" class="img-fluid">
                                <div class="mask"><a href="#" class="stretched-link"></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End About App Section -->
    @endif

    @if (Route::is('about.terms_of_use'))
            <!-- ======= About App Section ======= -->
            <section id="about" class="about">
                <div class="container">
                    <div class="section-title pb-0">
                        <h2 class="text-green">{{ $terms->subject_name }}</h2>
                    </div>

                    <div class="row">
                        <div class="col-lg-9">
                            <pre class="fs-5">{{ $terms->subject_description }}</pre>

                            <hr class="mt-4 mb-5">
        @foreach ($terms->legal_info_titles as $info_title)
                            <h3 class="h3 mt-3 fw-bold">{{ $info_title->title }}</h3>

            @foreach ($info_title->legal_info_contents as $info_content)
                @if ($info_content->photo_url != null)
                            <div class="row">
                                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="bg-image">
                                        <img src="{{ $info_content->photo_url }}" alt="{{ $info_title->title }}" class="img-fluid rounded">
                                        <div class="mask"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 pe-2 wow fadeInUp" data-wow-delay="0.5s">
                                    <h5 class="h5 mt-3 text-blue fw-bold">{{ $info_content->subtitle }}</h5>
                                    <p class="mb-4"><pre class="fw-light">{{ $info_content->content }}</pre></p>
                                </div>
                            </div>
                @else
                            <div class="row">
                                <div class="col-12 pe-2 wow fadeInUp" data-wow-delay="0.3s">
                                    <h5 class="h5 mt-3 text-blue fw-bold">{{ $info_content->subtitle }}</h5>
                                    <p class="mb-4"><pre class="fw-light">{{ $info_content->content }}</pre></p>
                                </div>
                            </div>
                @endif
            @endforeach                
        @endforeach
                        </div>

                        <div class="col-lg-3">
                            <div class="card my-4 border border-default shadow-0">
                                <div class="card-body">
                                    <h4 class="h4 mb-4 text-black fw-bold">@lang('miscellaneous.public.about.other_links.title')</h4>

                                    <a href="{{ route('about.home') }}" class="btn btn-sm btn-primary mb-3 py-2 rounded-pill text-white shadow-0">@lang('miscellaneous.menu.public.about')</a>
                                    <a href="{{ route('about.privacy_policy') }}" class="btn btn-sm btn-light mb-3 py-2 rounded-pill shadow-0">@lang('miscellaneous.public.about.other_links.link2')</a>
                                    <a href="{{ route('about.help') }}" class="btn btn-sm btn-light mb-3 py-2 rounded-pill shadow-0">@lang('miscellaneous.public.about.other_links.link3')</a>
                                    <a href="{{ route('about.faq') }}" class="btn btn-sm btn-light mb-3 py-2 rounded-pill shadow-0">@lang('miscellaneous.public.about.other_links.link4')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End About App Section -->
    @endif

    @if (Route::is('about.privacy_policy'))
            <!-- ======= Privacy Policy Section ======= -->
            <section id="about" class="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <!--  Subtitle -->
                            <div class="mb-5 wow fadeInUp" data-wow-delay="0.1s">
                                <h4 class="h4 text-black fw-bold">@lang('miscellaneous.public.privacy_policy.subtitle')</h4>
                                <p class="m-0 small">@lang('miscellaneous.public.privacy_policy.last_updated')</p>
                            </div>
    
                            <!-- Description -->
                            <div class="mb-5">
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.description.paragraph1')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.description.item1')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.description.item2')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.description.item3')</li>
                                </ul>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.description.paragraph2')</p>
                            </div>
    
                            <!-- Summary of key points -->
                            <div class="mb-5">
                                <h4 class="h4 fw-bold wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.key_point_summary.title')</h4>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.key_point_summary.paragraph01')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.key_point_summary.paragraph02')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.key_point_summary.paragraph03')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.key_point_summary.paragraph04')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.key_point_summary.paragraph05')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.key_point_summary.paragraph06')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.key_point_summary.paragraph07')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.key_point_summary.paragraph08')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.key_point_summary.paragraph09')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.key_point_summary.paragraph10')</p>
                            </div>
    
                            <!-- Table of content -->
                            <div class="card mb-4 border border-default shadow-0 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="card-body">
                                    <h4 class="h4 mb-4 fw-bold">@lang('miscellaneous.public.privacy_policy.table_of_content.title')</h4>
    
                                    <ul id="toc">
                                        <li style="list-style-type: decimal;"><a href="#toc_item01" class="text-dark">@lang('miscellaneous.public.privacy_policy.table_of_content.item01')</a></li>
                                        <li style="list-style-type: decimal;"><a href="#toc_item02" class="text-dark">@lang('miscellaneous.public.privacy_policy.table_of_content.item02')</a></li>
                                        <li style="list-style-type: decimal;"><a href="#toc_item03" class="text-dark">@lang('miscellaneous.public.privacy_policy.table_of_content.item03')</a></li>
                                        <li style="list-style-type: decimal;"><a href="#toc_item04" class="text-dark">@lang('miscellaneous.public.privacy_policy.table_of_content.item04')</a></li>
                                        <li style="list-style-type: decimal;"><a href="#toc_item05" class="text-dark">@lang('miscellaneous.public.privacy_policy.table_of_content.item05')</a></li>
                                        <li style="list-style-type: decimal;"><a href="#toc_item06" class="text-dark">@lang('miscellaneous.public.privacy_policy.table_of_content.item06')</a></li>
                                        <li style="list-style-type: decimal;"><a href="#toc_item07" class="text-dark">@lang('miscellaneous.public.privacy_policy.table_of_content.item07')</a></li>
                                        <li style="list-style-type: decimal;"><a href="#toc_item08" class="text-dark">@lang('miscellaneous.public.privacy_policy.table_of_content.item08')</a></li>
                                        <li style="list-style-type: decimal;"><a href="#toc_item09" class="text-dark">@lang('miscellaneous.public.privacy_policy.table_of_content.item09')</a></li>
                                        <li style="list-style-type: decimal;"><a href="#toc_item10" class="text-dark">@lang('miscellaneous.public.privacy_policy.table_of_content.item10')</a></li>
                                        <li style="list-style-type: decimal;"><a href="#toc_item11" class="text-dark">@lang('miscellaneous.public.privacy_policy.table_of_content.item11')</a></li>
                                        <li style="list-style-type: decimal;"><a href="#toc_item12" class="text-dark">@lang('miscellaneous.public.privacy_policy.table_of_content.item12')</a></li>
                                        <li style="list-style-type: decimal;"><a href="#toc_item13" class="text-dark">@lang('miscellaneous.public.privacy_policy.table_of_content.item13')</a></li>
                                        <li style="list-style-type: decimal;"><a href="#toc_item14" class="text-dark">@lang('miscellaneous.public.privacy_policy.table_of_content.item14')</a></li>
                                        <li style="list-style-type: decimal;"><a href="#toc_item15" class="text-dark">@lang('miscellaneous.public.privacy_policy.table_of_content.item15')</a></li>
                                        <li style="list-style-type: decimal;"><a href="#toc_item16" class="text-dark">@lang('miscellaneous.public.privacy_policy.table_of_content.item16')</a></li>
                                    </ul>
                                </div>
                            </div>
    
                            <div class="my-5">
                                <h4 id="toc_item01" class="h4 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">
                                    1. @lang('miscellaneous.public.privacy_policy.table_of_content.item01') 
                                    <a href="#toc" title="@lang('miscellaneous.back_toc')"><i class="bi bi-arrow-up-short align-middle acr-text-blue"></i></a>
                                </h4>
    
                                <h6 class="h6 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">1.1. @lang('miscellaneous.public.privacy_policy.item01.content01')</h6>
                                <p class="fst-italic acr-line-height-1_4 wow fadeInUp" data-wow-delay="0.3s">
                                    <i class="bi bi-chevron-double-right me-2 align-middle fs-4 text-danger"></i>
                                    <u class="fw-bold">@lang('miscellaneous.public.privacy_policy.in_short')</u>@lang('miscellaneous.colon_after_word') @lang('miscellaneous.public.privacy_policy.item01.in_short_content01')
                                </p>
    
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph01')</p>
                                <p class="mb-1 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph02.content')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph02.item01')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph02.item02')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph02.item03')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph02.item04')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph02.item05')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph02.item06')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph02.item07')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph02.item08')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph02.item09')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph02.item10')</li>
                                </ul>
                                <p class="mb-1 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph03.content')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph03.item01')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph03.item02')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph03.item03')</li>
                                </ul>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph04')</p>
                                <p class="mb-1 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph05.content')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph05.item01')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph05.item02')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph05.item03')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph05.item04')</li>
                                </ul>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph06')</p>
                                <p class="mb-5 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph07')</p>
    
                                <h6 class="h6 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">1.2. @lang('miscellaneous.public.privacy_policy.item01.content02')</h6>
                                <p class="fst-italic acr-line-height-1_4 wow fadeInUp" data-wow-delay="0.3s">
                                    <i class="bi bi-chevron-double-right me-2 align-middle fs-4 text-danger"></i>
                                    <u class="fw-bold">@lang('miscellaneous.public.privacy_policy.in_short')</u>@lang('miscellaneous.colon_after_word') @lang('miscellaneous.public.privacy_policy.item01.in_short_content02')
                                </p>
    
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph08')</p>
                                <p class="mb-1 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph09.content')</p>
                                <ul class="mb-5">
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph09.item01')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph09.item02')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph09.item03')</li>
                                </ul>
    
                                <h6 class="h6 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">1.3. @lang('miscellaneous.public.privacy_policy.item01.content03')</h6>
                                <p class="fst-italic acr-line-height-1_4 wow fadeInUp" data-wow-delay="0.3s">
                                    <i class="bi bi-chevron-double-right me-2 align-middle fs-4 text-danger"></i>
                                    <u class="fw-bold">@lang('miscellaneous.public.privacy_policy.in_short')</u>@lang('miscellaneous.colon_after_word') @lang('miscellaneous.public.privacy_policy.item01.in_short_content03')
                                </p>
    
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item01.paragraph10')</p>
                            </div>
    
                            <div class="my-5">
                                <h4 id="toc_item02" class="h4 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">
                                    2. @lang('miscellaneous.public.privacy_policy.table_of_content.item02') 
                                    <a href="#toc" title="@lang('miscellaneous.back_toc')"><i class="bi bi-arrow-up-short align-middle acr-text-blue"></i></a>
                                </h4>
    
                                <p class="fst-italic acr-line-height-1_4 wow fadeInUp" data-wow-delay="0.3s">
                                    <i class="bi bi-chevron-double-right me-2 align-middle fs-4 text-danger"></i>
                                    <u class="fw-bold">@lang('miscellaneous.public.privacy_policy.in_short')</u>@lang('miscellaneous.colon_after_word') @lang('miscellaneous.public.privacy_policy.item02.in_short_content01')
                                </p>
    
                                <p class="mb-1 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item02.paragraph01.content')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item02.paragraph01.item01')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item02.paragraph01.item02')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item02.paragraph01.item03')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item02.paragraph01.item04')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item02.paragraph01.item05')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item02.paragraph01.item06')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item02.paragraph01.item07')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item02.paragraph01.item08')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item02.paragraph01.item09')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item02.paragraph01.item10')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item02.paragraph01.item11')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item02.paragraph01.item12')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item02.paragraph01.item13')</li>
                                </ul>
                            </div>
    
                            <div class="my-5">
                                <h4 id="toc_item03" class="h4 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">
                                    3. @lang('miscellaneous.public.privacy_policy.table_of_content.item03') 
                                    <a href="#toc" title="@lang('miscellaneous.back_toc')"><i class="bi bi-arrow-up-short align-middle acr-text-blue"></i></a>
                                </h4>
    
                                <p class="fst-italic acr-line-height-1_4 wow fadeInUp" data-wow-delay="0.3s">
                                    <i class="bi bi-chevron-double-right me-2 align-middle fs-4 text-danger"></i>
                                    <u class="fw-bold">@lang('miscellaneous.public.privacy_policy.in_short')</u>@lang('miscellaneous.colon_after_word') @lang('miscellaneous.public.privacy_policy.item03.in_short_content01')
                                </p>
    
                                <h6 class="h6 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">3.1. @lang('miscellaneous.public.privacy_policy.item03.content01')</h6>
                                <p class="mb-1 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph01.content')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph01.item01')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph01.item02')</li>
                                    <li>
                                        <span class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph01.item03.subcontent01')</span>
    
                                        <ul>
                                            <li class="wow fadeInUp" data-wow-delay="0.3s" style="list-style-type: square;">@lang('miscellaneous.public.privacy_policy.item03.paragraph01.item03.subitem01')</li>
                                            <li class="wow fadeInUp" data-wow-delay="0.3s" style="list-style-type: square;">@lang('miscellaneous.public.privacy_policy.item03.paragraph01.item03.subitem02')</li>
                                            <li class="wow fadeInUp" data-wow-delay="0.3s" style="list-style-type: square;">@lang('miscellaneous.public.privacy_policy.item03.paragraph01.item03.subitem03')</li>
                                            <li class="wow fadeInUp" data-wow-delay="0.3s" style="list-style-type: square;">@lang('miscellaneous.public.privacy_policy.item03.paragraph01.item03.subitem04')</li>
                                            <li class="wow fadeInUp" data-wow-delay="0.3s" style="list-style-type: square;">@lang('miscellaneous.public.privacy_policy.item03.paragraph01.item03.subitem05')</li>
                                            <li class="wow fadeInUp" data-wow-delay="0.3s" style="list-style-type: square;">@lang('miscellaneous.public.privacy_policy.item03.paragraph01.item03.subitem06')</li>
                                        </ul>
                                    </li>
                                    <li class="mt-2 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph01.item04')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph01.item05')</li>
                                </ul>
                                <p class="mb-5 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph02')</p>
    
                                <h6 class="h6 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">3.2. @lang('miscellaneous.public.privacy_policy.item03.content02')</h6>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph03')</p>
                                <p class="mb-1 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph04.content')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph04.item01')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph04.item02')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph04.item03')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph04.item04')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph04.item05')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph04.item06')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph04.item07')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph04.item08')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph04.item09')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph04.item10')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item03.paragraph04.item11')</li>
                                </ul>
                            </div>
    
                            <div class="my-5">
                                <h4 id="toc_item04" class="h4 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">
                                    4. @lang('miscellaneous.public.privacy_policy.table_of_content.item04') 
                                    <a href="#toc" title="@lang('miscellaneous.back_toc')"><i class="bi bi-arrow-up-short align-middle acr-text-blue"></i></a>
                                </h4>
    
                                <p class="fst-italic acr-line-height-1_4 wow fadeInUp" data-wow-delay="0.3s">
                                    <i class="bi bi-chevron-double-right me-2 align-middle fs-4 text-danger"></i>
                                    <u class="fw-bold">@lang('miscellaneous.public.privacy_policy.in_short')</u>@lang('miscellaneous.colon_after_word') @lang('miscellaneous.public.privacy_policy.item04.in_short_content01')
                                </p>
    
                                <p class="mb-1 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item04.paragraph01.content')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item04.paragraph01.item01')</li>
                                </ul>
                            </div>
    
                            <div class="my-5">
                                <h4 id="toc_item05" class="h4 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">
                                    5. @lang('miscellaneous.public.privacy_policy.table_of_content.item05') 
                                    <a href="#toc" title="@lang('miscellaneous.back_toc')"><i class="bi bi-arrow-up-short align-middle acr-text-blue"></i></a>
                                </h4>
    
                                <p class="fst-italic acr-line-height-1_4 wow fadeInUp" data-wow-delay="0.3s">
                                    <i class="bi bi-chevron-double-right me-2 align-middle fs-4 text-danger"></i>
                                    <u class="fw-bold">@lang('miscellaneous.public.privacy_policy.in_short')</u>@lang('miscellaneous.colon_after_word') @lang('miscellaneous.public.privacy_policy.item05.in_short_content01')
                                </p>
    
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item05.paragraph01')</p>
                            </div>
    
                            <div class="my-5">
                                <h4 id="toc_item06" class="h4 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">
                                    6. @lang('miscellaneous.public.privacy_policy.table_of_content.item06') 
                                    <a href="#toc" title="@lang('miscellaneous.back_toc')"><i class="bi bi-arrow-up-short align-middle acr-text-blue"></i></a>
                                </h4>
    
                                <p class="fst-italic acr-line-height-1_4 wow fadeInUp" data-wow-delay="0.3s">
                                    <i class="bi bi-chevron-double-right me-2 align-middle fs-4 text-danger"></i>
                                    <u class="fw-bold">@lang('miscellaneous.public.privacy_policy.in_short')</u>@lang('miscellaneous.colon_after_word') @lang('miscellaneous.public.privacy_policy.item06.in_short_content01')
                                </p>
    
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item06.paragraph01')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item06.paragraph02')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s"><i class="bi bi-pin-angle align-middle fs-4 acr-text-yellow"></i> @lang('miscellaneous.public.privacy_policy.item06.paragraph03')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item06.paragraph04')</p>
                            </div>
    
                            <div class="my-5">
                                <h4 id="toc_item07" class="h4 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">
                                    7. @lang('miscellaneous.public.privacy_policy.table_of_content.item07') 
                                    <a href="#toc" title="@lang('miscellaneous.back_toc')"><i class="bi bi-arrow-up-short align-middle acr-text-blue"></i></a>
                                </h4>
    
                                <p class="fst-italic acr-line-height-1_4 wow fadeInUp" data-wow-delay="0.3s">
                                    <i class="bi bi-chevron-double-right me-2 align-middle fs-4 text-danger"></i>
                                    <u class="fw-bold">@lang('miscellaneous.public.privacy_policy.in_short')</u>@lang('miscellaneous.colon_after_word') @lang('miscellaneous.public.privacy_policy.item07.in_short_content01')
                                </p>
    
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item07.paragraph01')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item07.paragraph02')</p>
                            </div>
    
                            <div class="my-5">
                                <h4 id="toc_item08" class="h4 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">
                                    8. @lang('miscellaneous.public.privacy_policy.table_of_content.item08') 
                                    <a href="#toc" title="@lang('miscellaneous.back_toc')"><i class="bi bi-arrow-up-short align-middle acr-text-blue"></i></a>
                                </h4>
    
                                <p class="fst-italic acr-line-height-1_4 wow fadeInUp" data-wow-delay="0.3s">
                                    <i class="bi bi-chevron-double-right me-2 align-middle fs-4 text-danger"></i>
                                    <u class="fw-bold">@lang('miscellaneous.public.privacy_policy.in_short')</u>@lang('miscellaneous.colon_after_word') @lang('miscellaneous.public.privacy_policy.item08.in_short_content01')
                                </p>
    
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item08.paragraph01')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item08.paragraph02')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item08.paragraph03')</p>
                            </div>
    
                            <div class="my-5">
                                <h4 id="toc_item09" class="h4 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">
                                    9. @lang('miscellaneous.public.privacy_policy.table_of_content.item09') 
                                    <a href="#toc" title="@lang('miscellaneous.back_toc')"><i class="bi bi-arrow-up-short align-middle acr-text-blue"></i></a>
                                </h4>
    
                                <p class="fst-italic acr-line-height-1_4 wow fadeInUp" data-wow-delay="0.3s">
                                    <i class="bi bi-chevron-double-right me-2 align-middle fs-4 text-danger"></i>
                                    <u class="fw-bold">@lang('miscellaneous.public.privacy_policy.in_short')</u>@lang('miscellaneous.colon_after_word') @lang('miscellaneous.public.privacy_policy.item09.in_short_content01')
                                </p>
    
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item09.paragraph01')</p>
                            </div>
    
                            <div class="my-5">
                                <h4 id="toc_item10" class="h4 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">
                                    10. @lang('miscellaneous.public.privacy_policy.table_of_content.item10') 
                                    <a href="#toc" title="@lang('miscellaneous.back_toc')"><i class="bi bi-arrow-up-short align-middle acr-text-blue"></i></a>
                                </h4>
    
                                <p class="fst-italic acr-line-height-1_4 wow fadeInUp" data-wow-delay="0.3s">
                                    <i class="bi bi-chevron-double-right me-2 align-middle fs-4 text-danger"></i>
                                    <u class="fw-bold">@lang('miscellaneous.public.privacy_policy.in_short')</u>@lang('miscellaneous.colon_after_word') @lang('miscellaneous.public.privacy_policy.item10.in_short_content01')
                                </p>
    
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item10.paragraph01')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item10.paragraph02')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item10.paragraph03')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item10.paragraph04')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item10.paragraph05')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item10.paragraph06')</p>
    
                                <h6 class="h6 mt-4 mb-2 fw-bold wow fadeInUp" data-wow-delay="0.3s"><i class="bi bi-pin-angle align-middle fs-4 acr-text-yellow"></i> @lang('miscellaneous.public.privacy_policy.item10.content01')</h6>
                                <p class="mb-1 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item10.paragraph07.content')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item10.paragraph07.item01')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item10.paragraph07.item02')</li>
                                </ul>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item10.paragraph08')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item10.paragraph09')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item10.paragraph10')</p>
                            </div>
    
                            <div class="my-5">
                                <h4 id="toc_item11" class="h4 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">
                                    11. @lang('miscellaneous.public.privacy_policy.table_of_content.item11') 
                                    <a href="#toc" title="@lang('miscellaneous.back_toc')"><i class="bi bi-arrow-up-short align-middle acr-text-blue"></i></a>
                                </h4>
    
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item11.paragraph01')</p>
                            </div>
    
                            <div class="my-5">
                                <h4 id="toc_item12" class="h4 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">
                                    12. @lang('miscellaneous.public.privacy_policy.table_of_content.item12') 
                                    <a href="#toc" title="@lang('miscellaneous.back_toc')"><i class="bi bi-arrow-up-short align-middle acr-text-blue"></i></a>
                                </h4>
    
                                <p class="fst-italic acr-line-height-1_4 wow fadeInUp" data-wow-delay="0.3s">
                                    <i class="bi bi-chevron-double-right me-2 align-middle fs-4 text-danger"></i>
                                    <u class="fw-bold">@lang('miscellaneous.public.privacy_policy.in_short')</u>@lang('miscellaneous.colon_after_word') @lang('miscellaneous.public.privacy_policy.item12.in_short_content01')
                                </p>
    
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph01')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph02')</p>
    
                                <h6 class="h6 mt-4 mb-2 fw-bold wow fadeInUp" data-wow-delay="0.3s">12.1. @lang('miscellaneous.public.privacy_policy.item12.content01')</h6>
                                <p class="mb-1 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph03.content')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph03.item01')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph03.item02')</li>
                                </ul>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph04')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph05')</p>
    
                                <h6 class="h6 mt-4 mb-2 fw-bold wow fadeInUp" data-wow-delay="0.3s">12.2. @lang('miscellaneous.public.privacy_policy.item12.content02')</h6>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph06')</p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="fw-bold">@lang('miscellaneous.public.privacy_policy.item12.table01.head.col01')</th>
                                                <th class="fw-bold">@lang('miscellaneous.public.privacy_policy.item12.table01.head.col02')</th>
                                                <th class="fw-bold">@lang('miscellaneous.public.privacy_policy.item12.table01.head.col03')</th>
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            <tr>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row01.col01')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row01.col02')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row01.col03')</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row02.col01')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row02.col02')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row02.col03')</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row03.col01')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row03.col02')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row03.col03')</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row04.col01')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row04.col02')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row04.col03')</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row05.col01')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row05.col02')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row05.col03')</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row06.col01')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row06.col02')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row06.col03')</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row07.col01')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row07.col02')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row07.col03')</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row08.col01')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row08.col02')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row08.col03')</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row09.col01')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row09.col02')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row09.col03')</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row10.col01')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row10.col02')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row10.col03')</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row11.col01')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row11.col02')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row11.col03')</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row12.col01')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row12.col02')</td>
                                                <td>@lang('miscellaneous.public.privacy_policy.item12.table01.row12.col03')</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p class="mb-1 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph08.content')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph08.item01')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph08.item02')</li>
                                </ul>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph09')</p>
                                <p class="mb-1 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph10.content')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph10.item01')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph10.item02')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph10.item03')</li>
                                </ul>
    
                                <h6 class="h6 mt-4 mb-2 fw-bold wow fadeInUp" data-wow-delay="0.3s">12.3. @lang('miscellaneous.public.privacy_policy.item12.content03')</h6>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph11')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph12')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph13')</p>
    
                                <h6 class="h6 mt-4 mb-2 fw-bold wow fadeInUp" data-wow-delay="0.3s">12.4. @lang('miscellaneous.public.privacy_policy.item12.content04')</h6>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph14')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph15')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph16')</p>
    
                                <h6 class="h6 mt-4 mb-2 fw-bold wow fadeInUp" data-wow-delay="0.3s">12.5. @lang('miscellaneous.public.privacy_policy.item12.content05')</h6>
                                <p class="my-3 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph17.title')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph17.content')</p>
                                <p class="mb-3 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph18.title')</p>
                                <p class="mb-1 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph18.content.subcontent01')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph18.content.subitem01')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph18.content.subitem02')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph18.content.subitem03')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph18.content.subitem04')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph18.content.subitem05')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph18.content.subitem06')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph18.content.subitem07')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph18.content.subitem08')</li>
                                </ul>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph19')</p>
                                <p class="my-3 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph20.title')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph20.content')</p>
                                <p class="mb-3 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph21.title')</p>
                                <p class="mb-1 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph21.content.subcontent01')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph21.content.subitem01')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph21.content.subitem02')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph21.content.subitem03')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph21.content.subitem04')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph21.content.subitem05')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph21.content.subitem06')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph21.content.subitem07')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph21.content.subitem08')</li>
                                </ul>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph22')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph23')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph24')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph25')</p>
                                <p class="my-3 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph26.title')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph26.content01')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph26.content02')</p>
                                <p class="mb-3 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph27.title')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph27.content.subitem01')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph27.content.subitem02')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph27.content.subitem03')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph27.content.subitem04')</li>
                                </ul>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item12.paragraph28')</p>
                            </div>
    
                            <div class="my-5">
                                <h4 id="toc_item13" class="h4 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">
                                    13. @lang('miscellaneous.public.privacy_policy.table_of_content.item13') 
                                    <a href="#toc" title="@lang('miscellaneous.back_toc')"><i class="bi bi-arrow-up-short align-middle acr-text-blue"></i></a>
                                </h4>
    
                                <p class="fst-italic acr-line-height-1_4 wow fadeInUp" data-wow-delay="0.3s">
                                    <i class="bi bi-chevron-double-right me-2 align-middle fs-4 text-danger"></i>
                                    <u class="fw-bold">@lang('miscellaneous.public.privacy_policy.in_short')</u>@lang('miscellaneous.colon_after_word') @lang('miscellaneous.public.privacy_policy.item13.in_short_content01')
                                </p>
    
                                <h6 class="h6 mt-4 mb-2 fw-bold wow fadeInUp" data-wow-delay="0.3s">13.1. @lang('miscellaneous.public.privacy_policy.item13.content01')</h6>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph01')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph02')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph03')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph04')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph05')</p>
                                <p class="mb-1 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph06.content')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph06.item01')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph06.item02')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph06.item03')</li>
                                </ul>
                                <p class="mb-3 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph07.title')</p>
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph07.content.subitem01')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph07.content.subitem02')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph07.content.subitem03')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph07.content.subitem04')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph07.content.subitem05')</li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph07.content.subitem06')</li>
                                </ul>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph08')</p>
    
                                <h6 class="h6 mt-4 mb-2 fw-bold wow fadeInUp" data-wow-delay="0.3s">13.2. @lang('miscellaneous.public.privacy_policy.item13.content02')</h6>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph09')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph10')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph11')</p>
                                <p class="my-3 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph12.title')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph12.content01')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph12.content02')</p>
                                <p class="my-3 wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph13.title')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item13.paragraph13.content')</p>
                            </div>
    
                            <div class="my-5">
                                <h4 id="toc_item14" class="h4 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">
                                    14. @lang('miscellaneous.public.privacy_policy.table_of_content.item14') 
                                    <a href="#toc" title="@lang('miscellaneous.back_toc')"><i class="bi bi-arrow-up-short align-middle acr-text-blue"></i></a>
                                </h4>
    
                                <p class="fst-italic acr-line-height-1_4 wow fadeInUp" data-wow-delay="0.3s">
                                    <i class="bi bi-chevron-double-right me-2 align-middle fs-4 text-danger"></i>
                                    <u class="fw-bold">@lang('miscellaneous.public.privacy_policy.in_short')</u>@lang('miscellaneous.colon_after_word') @lang('miscellaneous.public.privacy_policy.item14.in_short_content01')
                                </p>
    
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item14.paragraph01')</p>
                            </div>
    
                            <div class="my-5">
                                <h4 id="toc_item15" class="h4 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">
                                    15. @lang('miscellaneous.public.privacy_policy.table_of_content.item15') 
                                    <a href="#toc" title="@lang('miscellaneous.back_toc')"><i class="bi bi-arrow-up-short align-middle acr-text-blue"></i></a>
                                </h4>
    
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item15.paragraph01')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item15.paragraph02')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item15.paragraph03')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item15.paragraph04')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item15.paragraph05')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item15.paragraph06')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item15.paragraph07')</p>
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item15.paragraph08')</p>
                            </div>
    
                            <div class="my-5">
                                <h4 id="toc_item16" class="h4 mb-4 fw-bold wow fadeInUp" data-wow-delay="0.3s">
                                    16. @lang('miscellaneous.public.privacy_policy.table_of_content.item16') 
                                    <a href="#toc" title="@lang('miscellaneous.back_toc')"><i class="bi bi-arrow-up-short align-middle acr-text-blue"></i></a>
                                </h4>
    
                                <p class="wow fadeInUp" data-wow-delay="0.3s">@lang('miscellaneous.public.privacy_policy.item16.paragraph01')</p>
                            </div>
                        </div>
    
                        <div class="col-lg-3">
                            <div class="card my-4 border border-default shadow-0">
                                <div class="card-body">
                                    <h4 class="h4 mb-4 text-black fw-bold">@lang('miscellaneous.public.about.other_links.title')</h4>
    
                                    <a href="{{ route('about.home') }}" class="btn btn-sm btn-primary mb-3 py-2 rounded-pill text-white shadow-0">@lang('miscellaneous.menu.public.about')</a>
                                    <a href="{{ route('about.terms_of_use') }}" class="btn btn-sm btn-secondary mb-3 py-2 rounded-pill shadow-0">@lang('miscellaneous.public.about.other_links.link1')</a>
                                    <a href="{{ route('about.help') }}" class="btn btn-sm btn-secondary mb-3 py-2 rounded-pill shadow-0">@lang('miscellaneous.public.about.other_links.link3')</a>
                                    <a href="{{ route('about.faq') }}" class="btn btn-sm btn-secondary mb-3 py-2 rounded-pill shadow-0">@lang('miscellaneous.public.about.other_links.link4')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End Privacy Policy Section -->
    @endif

    @if (Route::is('about.help'))
            <!-- ======= Help Center Section ======= -->
            <section id="about" class="about">
                <div class="container">
                    <div class="section-title pb-0">
                        <h2 class="text-green">{{ $help->subject_name }}</h2>
                    </div>

                    <div class="row">
                        <div class="col-lg-9">
                            <pre class="fs-5">{{ $help->subject_description }}</pre>

                            <hr class="mt-4 mb-5">
        @foreach ($help->legal_info_titles as $info_title)
                            <h3 class="h3 mt-3 fw-bold">{{ $info_title->title }}</h3>

            @foreach ($info_title->legal_info_contents as $info_content)
                @if ($info_content->photo_url != null)
                            <div class="row">
                                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="bg-image">
                                        <img src="{{ $info_content->photo_url }}" alt="{{ $info_title->title }}" class="img-fluid rounded">
                                        <div class="mask"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 pe-2 wow fadeInUp" data-wow-delay="0.5s">
                                    <h5 class="h5 mt-3 text-blue fw-bold">{{ $info_content->subtitle }}</h5>
                                    <p class="mb-4"><pre class="fw-light">{{ $info_content->content }}</pre></p>
                                </div>
                            </div>
                @else
                            <div class="row">
                                <div class="col-12 pe-2 wow fadeInUp" data-wow-delay="0.3s">
                                    <h5 class="h5 mt-3 text-blue fw-bold">{{ $info_content->subtitle }}</h5>
                                    <p class="mb-4"><pre class="fw-light">{{ $info_content->content }}</pre></p>
                                </div>
                            </div>
                @endif
            @endforeach                
        @endforeach
                        </div>

                        <div class="col-lg-3">
                            <div class="card my-4 border border-default shadow-0">
                                <div class="card-body">
                                    <h4 class="h4 mb-4 text-black fw-bold">@lang('miscellaneous.public.about.other_links.title')</h4>

                                    <a href="{{ route('about.home') }}" class="btn btn-sm btn-primary mb-3 py-2 rounded-pill text-white shadow-0">@lang('miscellaneous.menu.public.about')</a>
                                    <a href="{{ route('about.terms_of_use') }}" class="btn btn-sm btn-light mb-3 py-2 rounded-pill shadow-0">@lang('miscellaneous.public.about.other_links.link1')</a>
                                    <a href="{{ route('about.privacy_policy') }}" class="btn btn-sm btn-light mb-3 py-2 rounded-pill shadow-0">@lang('miscellaneous.public.about.other_links.link2')</a>
                                    <a href="{{ route('about.faq') }}" class="btn btn-sm btn-light mb-3 py-2 rounded-pill shadow-0">@lang('miscellaneous.public.about.other_links.link4')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End Help Center Section -->
    @endif

    @if (Route::is('about.faq'))
            <!-- ======= Help Center Section ======= -->
            <section id="about" class="about">
                <div class="container">
                    <div class="section-title pb-0">
                        <h2 class="text-green">{{ $faq->subject_name }}</h2>
                    </div>

                    <div class="row">
                        <div class="col-lg-9">
                            <pre class="fs-5">{{ $faq->subject_description }}</pre>

                            <hr class="mt-4 mb-5">
        @foreach ($faq->legal_info_titles as $info_title)
                            <h3 class="h3 mt-3 fw-bold">{{ $info_title->title }}</h3>

            @foreach ($info_title->legal_info_contents as $info_content)
                @if ($info_content->photo_url != null)
                            <div class="row">
                                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="bg-image">
                                        <img src="{{ $info_content->photo_url }}" alt="{{ $info_title->title }}" class="img-fluid rounded">
                                        <div class="mask"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 pe-2 wow fadeInUp" data-wow-delay="0.5s">
                                    <h5 class="h5 mt-3 text-blue fw-bold">{{ $info_content->subtitle }}</h5>
                                    <p class="mb-4"><pre class="fw-light">{{ $info_content->content }}</pre></p>
                                </div>
                            </div>
                @else
                            <div class="row">
                                <div class="col-12 pe-2 wow fadeInUp" data-wow-delay="0.3s">
                                    <h5 class="h5 mt-3 text-blue fw-bold">{{ $info_content->subtitle }}</h5>
                                    <p class="mb-4"><pre class="fw-light">{{ $info_content->content }}</pre></p>
                                </div>
                            </div>
                @endif
            @endforeach                
        @endforeach
                        </div>

                        <div class="col-lg-3">
                            <div class="card my-4 border border-default shadow-0">
                                <div class="card-body">
                                    <h4 class="h4 mb-4 text-black fw-bold">@lang('miscellaneous.public.about.other_links.title')</h4>

                                    <a href="{{ route('about.home') }}" class="btn btn-sm btn-primary mb-3 py-2 rounded-pill text-white shadow-0">@lang('miscellaneous.menu.public.about')</a>
                                    <a href="{{ route('about.terms_of_use') }}" class="btn btn-sm btn-light mb-3 py-2 rounded-pill shadow-0">@lang('miscellaneous.public.about.other_links.link1')</a>
                                    <a href="{{ route('about.privacy_policy') }}" class="btn btn-sm btn-light mb-3 py-2 rounded-pill shadow-0">@lang('miscellaneous.public.about.other_links.link2')</a>
                                    <a href="{{ route('about.help') }}" class="btn btn-sm btn-light mb-3 py-2 rounded-pill shadow-0">@lang('miscellaneous.public.about.other_links.link3')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End Help Center Section -->
    @endif

            <!-- ======= Testimonials Section ======= -->
            <section id="testimonials" class="testimonials section-bg">
                <div class="container">
                    <div class="section-title">
                        <h2>@lang('miscellaneous.public.about.testimonials.title')</h2>
                        <p>@lang('miscellaneous.public.about.testimonials.description')</p>
                    </div>

                    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                    <img src="{{ asset('assets/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
                                    <h3>Saul Goodman</h3>
                                    <h4>Ceo &amp; Founder</h4>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                    <img src="{{ asset('assets/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
                                    <h3>Sara Wilsson</h3>
                                    <h4>Designer</h4>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                    <img src="{{ asset('assets/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
                                    <h3>Jena Karlis</h3>
                                    <h4>Store Owner</h4>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                    <img src="{{ asset('assets/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
                                    <h3>Matt Brandon</h3>
                                    <h4>Freelancer</h4>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                    <img src="{{ asset('assets/img/testimonials/testimonials-5.jpg') }}" class="testimonial-img" alt="">
                                    <h3>John Larson</h3>
                                    <h4>Entrepreneur</h4>
                                </div>
                            </div><!-- End testimonial item -->
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section><!-- End Testimonials Section -->
  
@endsection
