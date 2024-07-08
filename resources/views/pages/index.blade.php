@php
    use Carbon\Carbon;
    $slideshow = App\Models\SlideShow::show()->limit(5)->orderByDesc('created_at')->get();
    $news = App\Models\Article::show()->limit(9)->orderByDesc('published_at')->get();
    $newsSlide = App\Models\Article::show()->limit(5)->orderByDesc('published_at')->get();
    $category = App\Models\category::show()->limit(10)->inRandomOrder()->get();
    $newsRandom = App\Models\Article::show()->limit(15)->inRandomOrder()->get();
    $new = App\Models\Article::show()->limit(3)->orderByDesc('published_at')->get();
    $service = App\Models\Service::show()->limit(10)->orderBy('order')->get();
    $image = App\Models\Image::show()->limit(8)->orderByDesc('created_at')->get();
    $staff = App\Models\Staff::show()->orderBy('order')->get();
@endphp

@extends('layouts.app')
@section('container')
    <section class="container pt-1">
        @if ($slideshow->isEmpty())
            <div class="row justify-content-center mt-5 pt-5">
                <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                    <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                </div>
            </div>
        @else
            <div id="carouselSlideshow" class="carousel slide carousel-fade mt-5 pt-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($slideshow as $item)
                        <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-slideshow.svg') }}"
                                class="d-block w-100 rounded-4 vh-65 bg-secondary-subtle" alt="image {{ $item->title }}">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-shadow">{{ $item->title }}</h5>
                                <p class="text-shadow">{{ $item->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselSlideshow"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselSlideshow"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endif
    </section>

    <section class="wrapper bg-body-secondary my-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-9">
                    @if ($newsSlide->isEmpty())
                        <div class="row justify-content-center">
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                            </div>
                        </div>
                    @else
                        <div id="carouselNews" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($newsSlide as $item)
                                    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                            class="d-block w-100 rounded-4 vh-75 bg-secondary-subtle"
                                            alt="image {{ $item->title }}">
                                        <div class="carousel-caption d-none d-md-block">
                                            <a wire:navigate.hover href="/{{ $item->slug }}"
                                                class="text-reset text-decoration-none">
                                                <h5 class="text-shadow fs-3">{{ $item->title }}</h5>
                                            </a>
                                            <p class="text-shadow fs-5">
                                                {{ $item->title }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselNews"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselNews"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="col-12 col-md-3">
                    @if ($new->isEmpty())
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                            </div>
                        </div>
                    @else
                        @foreach ($new as $item)
                            <div class="card text-bg-dark border-0 rounded-0">
                                <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                    class="card-img border-0 rounded-0 w-100 bg-secondary-subtle vh-25"
                                    alt="image {{ $item->title }}">
                                <div class="card-img-overlay">
                                    <a wire:navigate.hover href="/{{ $item->slug }}"
                                        class="text-reset text-decoration-none">
                                        <h5 class="card-title text-shadow">
                                            {{ Str::limit(strip_tags($item->title), 100, '...') }}
                                        </h5>
                                    </a>
                                    <small class="card-text text-shadow">
                                        {{ Carbon::parse($item->publishe_at)->translatedFormat('l, j F Y') }}
                                    </small>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <div class="row">
            <div class="col-12 col-md-9">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-end border-bottom mb-5">
                            <h1>
                                Berita
                            </h1>
                            <h5>
                                <a href="/berita" class="text-decoration-none link-secondary">
                                    Selengkapnya
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>

                @if ($news->isEmpty())
                    <div class="row justify-content-center">
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                            <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                        </div>
                    </div>
                @else
                    <div class="row">
                        @foreach ($news as $item)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                <div class="card bg-transparent border-0 mb-4">
                                    <a wire:navigate.hover href="/{{ $item->slug }}">
                                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                            alt="image {{ $item->title }}"
                                            class="w-100 rounded-2 vh-20 bg-secondary-subtle">
                                    </a>
                                    <div class="card-body px-0 py-2">
                                        <a href="/kategori/{{ $item->category->slug }}"
                                            class="badge bg-success-subtle link-success rounded-pill mb-2 link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                            {{ $item->category->title }}
                                        </a>
                                        <div>
                                            <small class="text-muted">
                                                {{ Carbon::parse($item->publishe_at)->translatedFormat('l, j F Y') }}
                                            </small>
                                        </div>
                                        <a wire:navigate.hover href="/{{ $item->slug }}"
                                            class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                            {{ Str::limit(strip_tags($item->title), 100, '...') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif


                <div class="row mt-5">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-end border-bottom mb-5">
                            <h1>
                                Berita lainnya
                            </h1>
                            <h5>
                                <a href="/berita" class="text-decoration-none link-secondary">
                                    Selengkapnya
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
                @if ($newsRandom->isEmpty())
                    <div class="row justify-content-center">
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                            <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                        </div>
                    </div>
                @else
                    <div class="row">
                        @foreach ($newsRandom as $item)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                <div class="card bg-transparent border-0 mb-4">
                                    <a wire:navigate.hover href="/{{ $item->slug }}">
                                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                            alt="image {{ $item->title }}"
                                            class="w-100 rounded-2 vh-20 bg-secondary-subtle">
                                    </a>
                                    <div class="card-body px-0 py-2">
                                        <a href="/kategori/{{ $item->category->slug }}"
                                            class="badge bg-success-subtle link-success rounded-pill mb-2 link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                            {{ $item->category->title }}
                                        </a>
                                        <div>
                                            <small class="text-muted">
                                                {{ Carbon::parse($item->publishe_at)->translatedFormat('l, j F Y') }}
                                            </small>
                                        </div>
                                        <a wire:navigate.hover href="/{{ $item->slug }}"
                                            class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                            {{ Str::limit(strip_tags($item->title), 100, '...') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="col-12 col-md-3">
                @include('layouts.sections.side')
            </div>
        </div>
    </section>

    <section class="wrapper bg-body-secondary my-5">
        <div class="container py-5">
            @if ($service->isEmpty())
                <div class="row justify-content-center">
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                        <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                    </div>
                </div>
            @else
                <div class="owl-carousel owl-app owl-theme owl-loaded mt-4">
                    @foreach ($service as $item)
                        <div class="card bg-transparent border-0">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <a href="{{ $item->url }}">
                                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                            alt="{{ $item->title }}" class="img-fluid w-100 rounded-3">
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body py-0">
                                        <h5 class="fs-4">
                                            <a href="{{ $item->url }}"
                                                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                                {{ $item->title }}
                                            </a>
                                        </h5>
                                        <p class="text-secondary">
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="border-bottom mb-5 d-flex justify-content-between align-items-end">
                    <h1>
                        Galeri
                    </h1>
                    <h5>
                        <a href="/galeri" class="text-decoration-none link-secondary">
                            Selengkapnya
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </h5>
                </div>
            </div>
        </div>
        @if ($image->isEmpty())
            <div class="row justify-content-center">
                <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                    <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                </div>
            </div>
        @else
            <div class="row" data-masonry='{"percentPosition": true }'>
                @foreach ($image as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card border-0 shadow-sm">
                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                class="card-img-top" alt="image {{ $item->title }}">
                            <div class="card-body">
                                <p class="card-text">
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    {{-- <section class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="border-bottom mb-5 d-flex justify-content-between align-items-end">
                    <h1>
                        Pejabat
                    </h1>
                    <h5>
                        <a href="/pejabat" class="text-decoration-none link-secondary">
                            Selengkapnya
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </h5>
                </div>
            </div>
        </div>

        @if ($staff->isEmpty())
            <div class="row justify-content-center">
                <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                    <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                </div>
            </div>
        @else
            <div class="owl-carousel owl-theme owl-loaded">
                @foreach ($staff as $item)
                    <div class="card border-0 rounded-4 m-2 p-3 pb-0">
                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-user.svg') }}"
                            alt="{{ $item->title }}" class="card-img-top w-100 bg-secondary-subtle rounded-3 shadow">
                        <div class="card-body text-center">
                            <h5 class="fs-5 fw-medium">
                                {{ $item->title_front }}
                                {{ $item->name }},
                                {{ $item->title_back }}
                            </h5>
                            <small class="text-secondary">
                                {{ $item->position->title }}
                            </small>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section> --}}
@endsection

@push('script')
    <script src="{{ asset('/js/masonry.pkgd.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
    <script>
        $(document).ready(function() {
            var owlApp = $('.owl-app');
            var owl = $('.owl-carousel');
            owlApp.owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    },
                    1200: {
                        items: 3
                    },
                }
            });
            $('.play').on('click', function() {
                owlApp.trigger('play.owlApp.autoplay', [1000])
            })
            $('.stop').on('click', function() {
                owlApp.trigger('stop.owlApp.autoplay')
            })

            owl.owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    },
                }
            });
            $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [1000])
            })
            $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
            })
        });
    </script>
@endpush
