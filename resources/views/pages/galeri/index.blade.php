@php
    use Carbon\Carbon;
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
                            <a href="/galeri/{{ $item->slug }}">
                                <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                    class="card-img-top" alt="image {{ $item->title }}">
                            </a>
                            <div class="card-body">
                                <p class="card-text">
                                    <a href="/galeri{{ $item->slug }}">
                                        {{ $item->description }}
                                    </a>
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
        @endif
    </section>
@endsection

@push('script')
    <script src="{{ asset('/js/masonry.pkgd.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
@endpush
