@extends('layouts.guest')

@section('guest-content')

            <!-- ======= Breadcrumbs Section ======= -->
            <section class="breadcrumbs">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center">
    @if (Route::is('career.datas'))
                        <h2 class="mb-lg-0">@lang('miscellaneous.public.career.details')</h2>
                        <ol>
                            <li><a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a></li>
                            <li><a href="{{ route('career.home') }}">@lang('miscellaneous.public.career.title')</a></li>
                            <li>@lang('miscellaneous.public.career.details')</li>
                        </ol>
    @else
                        <h2 class="mb-lg-0">@lang('miscellaneous.public.career.title')</h2>
                        <ol>
                            <li><a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a></li>
                            <li>@lang('miscellaneous.public.career.title')</li>
                        </ol>
    @endif
                    </div>
                </div>
            </section><!-- Breadcrumbs Section -->

    @if (Route::is('career.datas'))
            <!-- ======= Job Details Section ======= -->
            <section id="about" class="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 border-bottom border-default">
                            <div class="section-title">
                                <h2 class="text-green">{{ $news->news_title }}</h2>
                            </div>

        @if ($news->video_url != null)
                            <div class="ratio ratio-16x9 mb-4">
                                <iframe class="embed-responsive-item w-100" src="{{ $news->video_url }}" style="border-radius: 1.2rem;" allowfullscreen></iframe>
                            </div>
        @endif

        @if ($news->photo_url != null)
                            <div class="bg-image mb-4">
                                <img src="{{ !empty($news->photo_url) ? $news->photo_url : asset('assets/img/blank-news.png') }}" alt="{{ $news->news_title }}" class="img-fluid rounded-5">
                                <div class="mask"></div>
                            </div>
        @endif

                            <pre class="fs-5">
{{ $news->news_content }}
                            </pre>
       
                        </div>

                        <div class="col-lg-4">
                            <h4 class="h4 mb-4 fw-bold">{{ __('miscellaneous.public.career.other') }}</h4>
        @forelse ($other_news as $o_j)
            @if ($loop->index < 4 && $o_j->id != $news->id)
                            <div class="row mb-lg-4 mb-5">
                @if (!empty($o_j->photo_url))
                                <div class="col-lg-5 col-sm-4 col-12 mb-lg-0 mb-2">
                                    <div class="bg-image">
                                        <img src="{{ !empty($o_j->photo_url) ? $o_j->photo_url : asset('assets/img/blank-news.png') }}" alt="{{ $o_j->news_title }}" class="img-fluid rounded-3">
                                        <div class="mask"></div>
                                    </div>
                                </div>

                @endif
                                <div class="{{ !empty($o_j->photo_url) ? 'col-lg-7 col-sm-8 ' : '' }}col-12">
                                    <a href="{{ route('career.datas', ['id' => $o_j->id]) }}">
                                        <small class="m-0 small" style="color: #999;">{{ $o_j->created_at }}</small>
                @if (!empty($o_j->news_title))
                                        <p class="m-0 fw-bold text-danger text-truncate">{{ $o_j->news_title }}</p>
                                        <p class="m-0 text-dark text-truncate">{{ $o_j->news_content }}</p>
                @else
                                        <p class="m-0 text-dark">{{ Str::limit($o_j->news_content, 45, '...') }}</p>
                @endif
                                        <a class="btn fw-bold py-2 ps-0 pe-3 border-bottom border-3 border-danger rounded-0 shadow-0" href="{{ route('career.datas', ['id' => $o_j->id]) }}">
                                        {{ __('miscellaneous.see_more') }}
                                        </a>
                                    </a>
                                </div>
                            </div>
            @endif
        @empty
        @endforelse

        @if (count($other_news) == 1)
                            <p class="m-0 text">@lang('miscellaneous.empty_list')</p>
        @endif
                            <div class="row mt-5">
                                <div class="col-12">
                                    <a class="btn acr-btn-yellow d-block shadow-0" href="{{ route('career.home') }}">{{ __('miscellaneous.back_list') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End Job Details Section -->
    @else
            <!-- ======= Jobs List Section ======= -->
            <section id="about" class="about">
                <div class="container">
                    <div class="section-title pb-0">
                        <h2 class="text-green">@lang('miscellaneous.public.career.title')</h2>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="dataList" class="table py-4">
                                    <thead class="border-bottom border-default">
                                        <tr>
                                            <th class="bdwT-0 fw-bold"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
        @forelse ($jobs as $job_item)
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="bg-image mt-1 mb-sm-0 mb-4">
                                                            <img src="{{ !empty($job_item->photo_url) ? $job_item->photo_url : asset('assets/img/blank-news.png') }}" alt="{{ $job_item->news_title }}" class="img-fluid rounded-3">
                                                            <div class="mask h-100">
            @if (empty($job_item->photo_url))
                                                                <div class="d-flex justify-content-center align-items-center h-100 fs-5 text-black text-uppercase">
                                                                    <span class="bi bi-image text-secondary"></span>
                                                                </div>
            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 col-12">
                                                        <h4 class="h4 m-0 text-pri fw-bold">{{ Str::limit($job_item->news_title, 35, '...') }}</h4>
                                                        <small class="mb-3 small text-muted">{{ $job_item->created_at }}</small>
                                                        <p class="mt-3 mb-2 text-black acr-line-height-1_45">{{ Str::limit($job_item->news_content, 150, '...') }}</p>
                                                        <p class="mb-2">
                                                            <a class="btn fw-bold py-2 ps-0 pe-3 border-0 border-bottom border-3 border-danger rounded-0 shadow-0" href="{{ route('career.datas', ['id' => $job_item->id]) }}">
                                                                {{ __('miscellaneous.see_more') }}
                                                            </a>
                                                        </p>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
        @empty
        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End Jobs List Section -->
    @endif

@endsection
