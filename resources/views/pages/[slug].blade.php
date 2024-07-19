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

@extends('layouts.landing')

@section('content')
  <section class="w-full max-w-screen-md mx-auto py-10 space-y-4">
    @if(!$data)
      <div class="w-full">
        <p class="fs-5 text-danger mb-5 pb-5">
          Hasil tidak ditemukan.
        </p>
      </div>
    @else
      <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
          <li class="inline-flex items-center">
            <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600 ">
              <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                  d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
              </svg>
              Beranda
            </a>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 9 4-4-4-4" />
              </svg>
              <span
                class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ Str::limit(strip_tags($data->title), 30, '...') }}</span>
            </div>
          </li>
        </ol>
      </nav>
      <h3 class="text-3xl font-bold">{{ $data->title }}</h3>

      <div class="flex gap-2 items-center">
        <p>{{ Carbon::parse($data->published_at)->translatedFormat('l, j F Y') }}</p>
        <p>&#x2022;</p>
        <p>{{ App\Helpers\EstimateReadingTime($data->content) }} Menit baca</p>
      </div>

      <div>
        <img class="w-full h-auto border"
          src="{{ $data->file ? asset('storage/' . $data->file) : asset('image/default-img.svg') }}" alt="">

        <div class="mt-2">
          @if ($data->attachment)
            <div class="flex gap-2 overflow-auto">
              @foreach ($data->attachment as $item)
                <img class="border max-w-56 h-auto" src="{{ asset('storage/' . $item) }}" alt="">
              @endforeach
            </div>
          @endif
        </div>
      </div>

      <div class="text-lg font-normal space-y-2">
        {!! $data->content !!}
      </div>

      @if ($data->tags)
        <div class="flex gap-2 items-start">
          <p class="text-sm font-medium">Topik:</p>
          @foreach ($data->tags as $item)
            <span class="px-3 py-1 text-sm font-light bg-green-200 rounded-full">{{ $item->title }}</span>
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
