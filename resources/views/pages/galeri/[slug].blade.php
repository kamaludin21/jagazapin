@php
    use Carbon\Carbon;
    $data = App\Models\Image::show()->where('slug', $slug)->first();
    if (!$data):
        $page = env('APP_URL') . '/';
    else:
        $page = env('APP_URL') . '/' . $data->slug;
    endif;
    $image = App\Models\Image::show()->orderByDesc('created_at')->paginate(12);
@endphp

@extends('layouts.app')
@section('container')
    <section class="container py-4">
        <div class="row mt-5 pt-5">
            <div class="col-12 ">
                <ul class="breadcrumb mb-5">
                    <li class="breadcrumb-item"><a wire:navigate.hover href="/">Beranda</a></li>
                    <li class="breadcrumb-item">Galeri</li>
                </ul>
                <h1 class="mb-5">
                    Galeri
                </h1>
            </div>
        </div>

        @if (!$data)
            <div class="row justify-content-center">
                <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                    <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                </div>
            </div>
        @else
            <div class="row" data-masonry='{"percentPosition": true }'>
                <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ $data->file ? asset('storage/' . $data->file) : asset('image/default-img.svg') }}"
                            class="card-img-top" alt="image {{ $data->title }}">
                        @if ($data->description)
                            <div class="card-body">
                                <p class="card-text">
                                    {{ $data->description }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
                @if ($data->attachment)
                    @foreach ($data->attachment as $item)
                        <div class="col-sm-6 col-md-3 col-lg-3 mb-4">
                            <div class="card border-0 shadow-sm">
                                <img src="{{ $item ? asset('storage/' . $item) : asset('image/default-img.svg') }}"
                                    class="card-img-top" alt="image {{ $item }}">
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        @endif
        {{-- @if ($image->isEmpty())
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
            <div class="row">
                <div class="col-12">
                    <x-pagination.page>
                        <x-pagination.current wire="wire:navigate.hover"
                            href=" {{ $image->currentPage() }} / {{ $image->lastPage() }}" />
                        <x-pagination.previous wire="wire:navigate.hover" href="{{ $image->previousPageUrl() }}" />
                        <x-pagination.next wire="wire:navigate.hover" href="{{ $image->nextPageUrl() }}" />
                    </x-pagination.page>
                </div>
            </div>
        @endif --}}
    </section>
@endsection

@push('script')
    <script src="{{ asset('/js/masonry.pkgd.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
@endpush
