@php
    use Carbon\Carbon;
    $data = App\Models\Page::where('slug', $slug)->first();
    if (!$data):
        abort(404);
    endif;
    $page = env('APP_URL') . '/' . $data->slug;
@endphp

@extends('layouts.app')

@push('seo')
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
@endpush

@section('container')
    <section class="container py-4">
        <div class="row mt-5 pt-5">
            <div class="col-12 col-md-9">
                <div class="mb-5 px-5">
                    <ol class="breadcrumb mb-5">
                        <li class="breadcrumb-item"><a wire:navigate.hover href="/">Beranda</a></li>
                        <li class="breadcrumb-item">Halaman</li>
                        <li class="breadcrumb-item d-inline-block text-truncate">
                            {{ Str::limit(strip_tags($data->title), 50, '...') }}
                        </li>
                    </ol>
                    <h1>
                        <a wire:navigate.hover href="/halaman/{{ $data->slug }}"
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
                    @if ($data->file)
                        <img src="{{ $data->file ? asset('storage/' . $data->file) : asset('image/default-img.svg') }}"
                            alt="image {{ $data->title }}" class="w-100 rounded-2 bg-secondary-subtle">
                    @endif
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
                </div>
            </div>

            <div class="col-12 col-md-3">
                @include('layouts.sections.side')
            </div>
        </div>
    </section>
@endsection

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
