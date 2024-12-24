@php
  $navMenus = App\Models\NavMenu::where('parent_id', -1)
      ->with('children')
      ->orderBy('order')
      ->get();
  $site = App\Models\Site::first();
@endphp

<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ env('APP_NAME') }}</title>
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ secure_asset('/dist/css/bootstrap.min.css') }}">
  {{-- <link rel="stylesheet" href="{{ secure_asset('/dist/icons/font/bootstrap-icons.css') }}"> --}}
  <link rel="stylesheet" href="{{ secure_asset('owlcarousel/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('owlcarousel/dist/assets/owl.theme.default.min.css') }}">
  @vite('resources/css/app.css')
</head>

<body class="max-w-screen-xl mx-auto bg-white">
  {{-- Header --}}
  {{-- Brand --}}
  <x-landing.top-header :site="$site" />
  <div class="max-w-screen-lg mx-auto w-full my-2">
    <div class="flex gap-4 items-center w-full justify-evenly md:justify-start">
      @foreach ($site->logo as $item)
        <img class="w-16 h-auto" src="{{ \Storage::disk('public')->url(trim($item)) }}">
      @endforeach
    </div>
  </div>
  {{-- Navbar --}}
  <x-landing.nav-menu :data="$navMenus" />
  {{-- Header --}}

  <main class="max-w-screen-lg mx-auto w-full">
    @yield('content')
  </main>

  <footer class="w-full mx-auto  border-t-4 border-green-600">
    <div class="max-w-screen-lg mx-auto flex flex-col md:flex-row p-2 md:p-0 gap-8 justify-between w-full py-10">
      {{-- informasi --}}
      <div>
        <p class="text-2xl font-bold">{{ $site->nama_site }}</p>
        <p class="text-lg font-light">Kejaksaan Tinggi Riau</p>

        <div class="text-base font-normal text-slate-600">
          <p>Alamat: Jl. Jend. Sudirman No. 375 Pekanbaru</p>
          <p>Telp: (0761) 32103</p>
          <p>Email: kejati.riau@kejaksaan.go.id</p>
        </div>

        <div class="mt-4">
          <p class="text-xl font-medium">Sosial Media</p>
          <div class="flex gap-2">
            {{-- Socmed --}}
            <a href="" class="bg-green-600 p-1 rounded-md">
              <x-icons.facebook class="h-5 w-5 text-white" />
            </a>
            {{-- Socmed --}}
            <a href="" class="bg-green-600 p-1 rounded-md">
              <x-icons.instagram class="h-5 w-5 text-white" />
            </a>
          </div>
        </div>

      </div>

      {{-- Link --}}
      <div>
        <p class="text-xl font-bold">Menu Lainnya</p>
        <div class="grid">
          <a href="" class="text-lg font-light hover:underline">Kejaksaan Agung RI</a>
          <a href="" class="text-lg font-light hover:underline">Kejari Pekanbaru</a>
          <a href="" class="text-lg font-light hover:underline">Kejari Dumai</a>
          <a href="" class="text-lg font-light hover:underline">Kejari Pelelawan</a>
          <a href="" class="text-lg font-light hover:underline">Kejari Siak</a>
          <a href="" class="text-lg font-light hover:underline">Kejari Kuansing</a>
          <a href="" class="text-lg font-light hover:underline">Kejari Rokan Hulu</a>
          <a href="" class="text-lg font-light hover:underline">Kejari Rokan Hilir</a>
          <a href="" class="text-lg font-light hover:underline">Kejari Indragiri Hulu</a>
          <a href="" class="text-lg font-light hover:underline">Kejari Indragiri Hilir</a>
          <a href="" class="text-lg font-light hover:underline">Kejari Bengkalis</a>
          <a href="" class="text-lg font-light hover:underline">Kejari Kepulauan Meranti</a>
        </div>
      </div>

      {{-- Lokasi --}}
      <div class="">
        <p class="text-xl font-bold">Lokasi</p>
        <div>
          {{-- <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6560349774486!2d101.44529257505096!3d0.5167758636869536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ac1d09a9b905%3A0xe1c458a97fb867a1!2sKejaksaan%20Tinggi%20Riau!5e0!3m2!1sid!2sid!4v1711598667977!5m2!1sid!2sid"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="h-56 w-full">
          </iframe> --}}
        </div>
      </div>
    </div>
    <div class="bg-green-600">
      <div class="max-w-screen-lg mx-auto flex justify-between items-center py-2 p-2 md:p-0">
        <div class="flex gap-2 items-center w-fit justify-evenly md:justify-start">
          @foreach ($site->logo as $item)
            <img class="w-8 h-auto" src="{{ \Storage::disk('public')->url(trim($item)) }}">
          @endforeach
        </div>
        <p class="text-base font-medium text-white">2024 &copy; {{ $site->nama_site }}</p>

      </div>
    </div>
  </footer>
  <script src="{{ asset('/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('/owlcarousel/dist/owl.carousel.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
  @stack('script')

</body>

</html>
