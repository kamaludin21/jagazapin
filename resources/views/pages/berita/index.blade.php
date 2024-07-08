@php
    use Carbon\Carbon;
    $news = App\Models\Article::show()->paginate(20);
@endphp

@extends('layouts.app')
@section('container')
    <section class="container py-4">
        <div class="row mt-5 pt-5">
            <div class="col-12 ">
                <ul class="breadcrumb mb-5">
                    <li class="breadcrumb-item"><a wire:navigate.hover href="/">Beranda</a></li>
                    <li class="breadcrumb-item">Berita</li>
                </ul>
                <h1 class="mb-5">
                    Berita
                </h1>
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
                    <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                        <div class="card bg-transparent border-0 mb-4">
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
            <div class="row">
                <div class="col-12">
                    <x-pagination.page>
                        <x-pagination.current wire="wire:navigate.hover"
                            href=" {{ $news->currentPage() }} / {{ $news->lastPage() }}" />
                        <x-pagination.previous wire="wire:navigate.hover" href="{{ $news->previousPageUrl() }}" />
                        <x-pagination.next wire="wire:navigate.hover" href="{{ $news->nextPageUrl() }}" />
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
