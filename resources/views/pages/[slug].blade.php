@php
    use Carbon\Carbon;
    $data = App\Models\Article::where('slug', $slug)->with('tags')->first();
    if (!$data):
        $page = env('APP_URL') . '/';
    else:
        $page = env('APP_URL') . '/' . $data->slug;
    endif;
    $articleRandom = App\Models\Article::limit(18)->inRandomOrder()->get();
@endphp

@extends('layouts.app')

@section('container')
    <section class="container py-4">
        <div class="row mt-5 pt-5">
            <div class="col-12 col-md-9">
                <div class="mb-5 px-5">
                    @if (!$data)
                        <ul class="breadcrumb mb-5">
                            <li class="breadcrumb-item"><a wire:navigate.hover href="/">Beranda</a></li>
                            <li class="breadcrumb-item">Baca</li>
                        </ul>
                        <h1 class="mb-5">
                            Baca
                        </h1>
                        <div class="col-12">
                            <p class="fs-5 text-danger mb-5 pb-5">
                                Hasil tidak ditemukan.
                            </p>
                        </div>
                    @else
                        <ul class="breadcrumb mb-5">
                            <li class="breadcrumb-item"><a wire:navigate.hover href="/">Beranda</a></li>
                            <li class="breadcrumb-item">Baca</li>
                            <li class="breadcrumb-item d-inline-block text-truncate">
                                {{ Str::limit(strip_tags($data->title), 50, '...') }}
                            </li>
                        </ul>
                        <h4>
                            <a href="/kategori/{{ $data->category->slug }}"
                                class="badge bg-success-subtle link-success rounded-pill mb-2 link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                {{ $data->category->title }}
                            </a>
                        </h4>
                        <h1>
                            <a wire:navigate.hover href="/{{ $data->slug }}"
                                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                {{ $data->title }}
                            </a>
                        </h1>
                        <h6 class="mb-55">
                            {{ Carbon::parse($data->publishe_at)->translatedFormat('l, j F Y') }}
                            -
                            {{ App\Helpers\EstimateReadingTime($data->content) }} Menit baca
                        </h6>
                        <nav class="nav mb-5">
                            <button onclick="whatsapp()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis">
                                <i class="rounded-circle bi bi-whatsapp fs-4"></i>
                            </button>
                            <button onclick="facebook()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis">
                                <i class="rounded-circle bi bi-facebook fs-4"></i>
                            </button>
                            <button onclick="twitter()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis">
                                <i class="rounded-circle bi bi-twitter-x fs-4"></i>
                            </button>
                            <button onclick="telegram()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis">
                                <i class="rounded-circle bi bi-telegram fs-4"></i>
                            </button>
                            <button onclick="copyLink()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis">
                                <i class="rounded-circle bi bi-copy fs-4"></i>
                            </button>
                        </nav>
                        <img src="{{ $data->file ? asset('storage/' . $data->file) : asset('image/default-img.svg') }}"
                            alt="image {{ $data->title }}" class="w-100 rounded-2 bg-secondary-subtle">
                        @if ($data->description)
                            <div class="mt-2">
                                <small class="text-secondary">
                                    {{ $data->description }}
                                </small>
                            </div>
                        @endif
                        <div class="fs-5 fw-light my-5">
                            {!! $data->content !!}
                        </div>
                        @if ($data->attachment)
                            <p class="text-muted">
                                Galeri:
                            </p>
                            <div class="row g-2 mb-5">
                                @foreach ($data->attachment as $item)
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                        <img src="{{ asset('storage/' . $item) }}" alt="image {{ $item }}"
                                            class="w-100 rounded-2 vh-20 bg-secondary-subtle">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @if ($data->tags)
                            <p class="text-muted">
                                Topik:
                            </p>
                            <div class="mb-5">
                                @foreach ($data->tags as $item)
                                    <span class="fs-5">
                                        <div
                                            class="badge rounded-pill bg-secondary-subtle text-secondary-emphasis fw-normal px-3 py-2">
                                            {{ $item->title }}
                                        </div>
                                    </span>
                                @endforeach
                            </div>
                        @endif
                        <p class="text-muted">
                            Bagikan:
                        </p>
                        <nav class="nav my-3">
                            <button onclick="whatsapp()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis border border-dark-subtle me-1 mb-1 px-2 py-1">
                                <i class="rounded-circle bi bi-whatsapp fs-4 me-2"></i>
                                WhatsApp
                            </button>
                            <button onclick="facebook()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis border border-dark-subtle me-1 mb-1 px-2 py-1">
                                <i class="rounded-circle bi bi-facebook fs-4 me-2"></i>
                                Facebook
                            </button>
                            <button onclick="twitter()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis border border-dark-subtle me-1 mb-1 px-2 py-1">
                                <i class="rounded-circle bi bi-twitter-x fs-4 me-2"></i>
                                X
                            </button>
                            <button onclick="telegram()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis border border-dark-subtle me-1 mb-1 px-2 py-1">
                                <i class="rounded-circle bi bi-telegram fs-4 me-2"></i>
                                Telegram
                            </button>
                            <button onclick="copyLink()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis border border-dark-subtle me-1 mb-1 px-2 py-1">
                                <i class="rounded-circle bi bi-copy fs-4 me-2"></i>
                                Salin tautan
                            </button>
                        </nav>
                    @endif
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-12">
                        <h1 class="border-bottom mb-3">
                            Berita Lainnya
                        </h1>
                    </div>
                    @foreach ($articleRandom as $item)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                            <div class="card bg-transparent border-0">
                                <a wire:navigate.hover href="/{{ $item->slug }}">
                                    <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                        alt="image {{ $item->title }}" class="w-100 rounded-2 vh-20 bg-secondary-subtle">
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
            </div>

            <div class="col-12 col-md-3">
                @include('layouts.sections.side')
            </div>
        </div>
    </section>
@endsection

@push('seo')
    @if ($data)
        <meta property="og:url" content="{{ env('APP_URL') . '/' . $data->slug }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $data->title }}">
        <meta property="og:description" content="">
        <meta property="og:image" content="{{ env('APP_ASSET') . $data->file }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta property="twitter:domain" content="{{ env('APP_URL') }}">
        <meta property="twitter:url" content="{{ env('APP_URL') . '/' . $data->slug }}">
        <meta name="twitter:title" content="{{ $data->title }}">
        <meta name="twitter:image" content="{{ env('APP_ASSET') . $data->file }}">
    @endif
@endpush

@push('script')
    <script>
        let width = 600;
        let height = 400;

        function facebook() {
            let left = window.innerWidth / 2 - width / 2;
            let top = window.innerHeight / 2 - height / 2;
            const url = '{{ $page }}'
            const api = "https://www.facebook.com/sharer/sharer.php?u="
            const navUrl = api + url;
            window.open(navUrl, '_blank', 'width=' + width + ',height=' + height + ',left=' + left + ',top=' + top);
        }

        function whatsapp() {
            const url = '{{ $page }}'
            const api = "whatsapp://send?text=" + url
            const navUrl = api + url;
            window.open(navUrl);
        }

        function twitter() {
            let left = window.innerWidth / 2 - width / 2;
            let top = window.innerHeight / 2 - height / 2;
            const url = '{{ $page }}'
            const api = 'https://twitter.com/intent/tweet?text=';
            const navUrl = api + url;
            window.open(navUrl, '_blank', 'width=' + width + ',height=' + height + ',left=' + left + ',top=' + top);
        }

        function telegram() {
            let left = window.innerWidth / 2 - width / 2;
            let top = window.innerHeight / 2 - height / 2;
            const url = '{{ $page }}'
            const api = 'https://telegram.me/share/url?url=';
            const navUrl = api + url;
            window.open(navUrl, '_blank', 'width=' + width + ',height=' + height + ',left=' + left + ',top=' + top);
        }

        function copyLink() {
            const url = '{{ $page }}'
            const textarea = document.createElement('textarea');
            textarea.value = url;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            alert('Tautan berhasil disalin');
        }
    </script>
@endpush
