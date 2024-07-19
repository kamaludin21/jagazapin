@php
  use Carbon\Carbon;
  $slideshow = App\Models\SlideShow::show()->limit(5)->orderByDesc('created_at')->get();
  $news = App\Models\Article::show()->limit(9)->orderByDesc('published_at')->get();
  // $newsSlide = App\Models\Article::show()->limit(2)->orderByDesc('published_at')->get();
  $category = App\Models\category::show()->limit(10)->inRandomOrder()->get();
  $newsRandom = App\Models\Article::show()->limit(8)->inRandomOrder()->get();
  $new = App\Models\Article::show()->limit(3)->orderByDesc('published_at')->get();
  $service = App\Models\Service::show()->limit(10)->orderBy('order')->get();
  $image = App\Models\Image::show()->limit(8)->orderByDesc('created_at')->get();
  $staff = App\Models\Staff::show()->limit(3)->orderBy('order')->get();
@endphp

@extends('layouts.landing')

@section('content')
  <div class="grid gap-16 mb-20">
    <div class="flex flex-col md:flex-row h-96 mt-2 gap-2">
      @if ($slideshow->isEmpty())
        <div class="row justify-content-center mt-5 pt-5">
          <div class="col-6 col-sm-4 col-md-3 col-lg-3">
            <img src="{{ asset('image/default-slideshow.svg') }}" alt="image" class="w-100">
          </div>
        </div>
      @else
        <div class="h-full w-full">
          {{-- Main --}}
          <div id="carouselSlideshow" class="bg-slate-200 carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner h-96">
              @foreach ($slideshow as $item)
                <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                  <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-slideshow.svg') }}"
                    class="w-full h-96 object-cover bg-secondary-subtle" alt="image {{ $item->title }}">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-shadow">{{ $item->title }}</h5>
                    <p class="text-shadow">{{ $item->description }}</p>
                  </div>
                </div>
              @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselSlideshow" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselSlideshow" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        {{-- <div class="hidden h-96 w-full md:w-1/3 md:flex flex-col gap-2">
          @foreach ($newsSlide as $item)
            <div class="flex-1 overflow-hidden">
              <img class="h-full w-full object-cover"
                src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}" alt="">
            </div>
          @endforeach
        </div> --}}
      @endif
    </div>

    <div class="grid grid-cols-2 gap-4 md:grid-cols-4 justify-center p-2 md:p-0">
      @foreach ($staff as $item)
        <img class="w-fit max-h-48"
          src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}" alt="">
      @endforeach
    </div>

    {{-- Berita Section --}}
    <div class="space-y-4 p-2 md:p-0">
      <div class="flex w-full items-center gap-2 py-2">
        <div class="h-6 flex-none border-r-4 border-black"></div>
        <p class="whitespace-nowrap text-2xl font-bold uppercase">Berita</p>
        <div class="h-0.5 w-full border-b"></div>
      </div>

      <div class="grid grid-cols-1  md:grid-cols-3 gap-4">
        @foreach ($news as $item)
          <div class="space-y-2">
            <img class="h-full max-h-56 w-full object-cover"
              src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}" alt="">
            <div class="space-y-2">
              <a href="/{{ $item->slug }}"
                class="line-clamp-2 text-green-800 font-bold text-xl tracking-wide leading-6">
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

    </div>

    {{-- Service Section --}}
    <div class="grid grid-cols-2 md:grid-cols-4 place-content-start p-2 md:p-0 mt-10 md:mt-0">
      @foreach ($service as $item)
        <div class="p-4 grid gap-2 bg-gradient-to-r from-emerald-100 to-green-100">
          <a href="{{ $item->url }}" class="flex w-full items-center gap-2">
            <img class="w-14 h-auto"
              src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}" alt="">
          </a>
          <a href="{{ $item->url }}" class="text-xl hover:underline font-bold text-slate-700">{{ $item->title }}</a>
          <p>
            {{ $item->description }}
          </p>
        </div>
      @endforeach
    </div>

    {{-- Kegiatan Section --}}
    <div class="space-y-4 p-2 md:p-0">
      <div class="flex w-full items-center gap-2 py-2">
        <div class="h-6 flex-none border-r-4 border-black"></div>
        <p class="whitespace-nowrap text-2xl font-bold uppercase">Berita Lainnya</p>
        <div class="h-0.5 w-full border-b"></div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($newsRandom as $item)
          <div class="flex items-center gap-4">
            <img class="h-full max-h-44 w-1/3 object-cover"
              src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}" alt="">
            <div class="w-2/3 space-y-2">
              <a href="/kategori/{{ $item->category->slug }}"
                class="line-clamp-2 text-green-800 font-bold text-xl tracking-wide leading-6">
                {{ $item->title }}
              </a>
              <div class="flex gap-2 items-center text-sm">
                <button class="font-light bg-green-600 text-white px-2 py-1">
                  {{ $item->category->title }}
                </button>
                <p class="text-slate-500">{{ Carbon::parse($item->publishe_at)->translatedFormat('l, j F Y') }}</p>
              </div>
              <p class="text-slate-600 line-clamp-3 leading-5 text-sm">
                {{ Str::limit(strip_tags($item->content), 150, '...') }}
              </p>
            </div>
          </div>
        @endforeach
      </div>

    </div>

    {{-- Galeri --}}
    <div class="space-y-4 p-2 md:p-0">
      <div class="flex w-full items-center gap-2 py-2">
        <div class="h-6 flex-none border-r-4 border-black"></div>
        <p class="whitespace-nowrap text-2xl font-bold uppercase">Galeri</p>
        <div class="h-0.5 w-full border-b"></div>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach ($image as $item)
          <div class="space-y-1">
            <img class="w-full h-full max-h-40 hover:scale-down object-cover"
              src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}" alt="">
            <p class="text-xs font-medium">{{ Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}</p>
            <p class="text-sm font-light text-slate-800 line-clamp-2">{{ $item->title }}</p>
          </div>
        @endforeach
      </div>

    </div>
  </div>
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
