@php
  use Carbon\Carbon;
  $news = App\Models\Article::show()->paginate(6);
@endphp

@extends('layouts.landing')

@section('content')
  <section class="w-full px-2 space-y-4 md:px-0 max-w-screen-lg mx-auto py-10">
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
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Berita</span>
          </div>
        </li>
      </ol>
    </nav>
    <h3 class="text-3xl font-bold">Berita</h3>
    <hr>
    @if ($news->isEmpty())
      <div class="row justify-content-center">
        <div class="col-6 col-sm-6 col-md-4 col-lg-4">
          <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
        </div>
      </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @foreach ($news as $item)
        <div class="space-y-2">
          <img class="h-full max-h-56 w-full object-cover"
            src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}" alt="">
          <div class="space-y-2">
            <a href="/{{ $item->slug }}"
              class="line-clamp-2 hover:underline text-green-800 font-bold text-xl tracking-wide leading-6">
              {{ $item->title }}
            </a>
            <div class="flex gap-2 items-center text-sm">
              <button class="font-light bg-green-600 text-white px-2 py-1">
                {{ $item->category->title }}
              </button>
              <p class="text-slate-500">{{ Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}</p>
            </div>
            <p class="text-slate-600 line-clamp-3 leading-5 text-sm">
              {{ Str::limit(strip_tags($item->content), 150, '...') }}
            </p>
          </div>
        </div>
      @endforeach
    </div>
    {{ $news->links() }}
    @endif
  </section>
@endsection

{{-- @push('script')
  <script src="{{ asset('/js/masonry.pkgd.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
@endpush --}}
