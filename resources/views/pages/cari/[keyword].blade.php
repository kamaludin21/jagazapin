@php
    use Carbon\Carbon;
    $keyword = Str::slug($keyword);
    $article = App\Models\Article::where('title', 'like', '%' . $keyword . '%')->paginate(15);
    $newsRandom = App\Models\Article::limit(18)->inRandomOrder()->get();
@endphp

@extends('layouts.app')

@section('container')
    <section class="container py-4">
        <div class="row mt-5 pt-5">
            <div class="col-12 col-md-9">
                <div class="row g-4">
                    <div class="col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a wire:navigate.hover href="/">Beranda</a></li>
                            <li class="breadcrumb-item">Cari</li>
                            <li class="breadcrumb-item d-inline-block text-truncate">{{ $keyword }}</li>
                        </ol>
                        <h1 class="mb-5">
                            <a wire:navigate.hover href="/cari/{{ $keyword }}"
                                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                Pencarian: {{ $keyword }}
                            </a>
                        </h1>
                    </div>
                    @if ($article->isEmpty())
                        <div class="col-12">
                            <p class="fs-5 text-danger mb-5 pb-5">
                                Hasil tidak ditemukan.
                            </p>
                        </div>
                    @else
                        @foreach ($article as $item)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                <div class="card bg-transparent border-0">
                                    <a wire:navigate.hover href="/{{ $item->slug }}">
                                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                            alt="image {{ $item->title }}"
                                            class="w-100 rounded-2 vh-20 bg-secondary-subtle">
                                    </a>
                                    <div class="card-body px-0 py-2">
                                        <div class="badge bg-success-subtle text-success rounded-pill">
                                            {{ $item->category->title }}
                                        </div>
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
                        <div class="col-12 mb-5 pb-5">
                            <x-pagination.page>
                                <x-pagination.current wire="wire:navigate.hover"
                                    href=" {{ $article->currentPage() }} / {{ $article->lastPage() }}" />
                                <x-pagination.previous wire="wire:navigate.hover"
                                    href="{{ $article->previousPageUrl() }}" />
                                <x-pagination.next wire="wire:navigate.hover" href="{{ $article->nextPageUrl() }}" />
                            </x-pagination.page>
                        </div>
                    @endif
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-12">
                        <h1 class="border-bottom mb-3">
                            Berita Lainnya
                        </h1>
                    </div>
                    @forelse ($newsRandom as $item)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                            <div class="card bg-transparent border-0">
                                <a wire:navigate.hover href="/{{ $item->slug }}">
                                    <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                        alt="image {{ $item->title }}" class="w-100 rounded-2 vh-20 bg-secondary-subtle">
                                </a>
                                <div class="card-body px-0 py-2">
                                    <div class="badge bg-success-subtle text-success rounded-pill">
                                        {{ $item->category->title }}
                                    </div>
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
                    @empty
                        @for ($i = 1; $i < 13; $i++)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                <div class="card bg-transparent border-0">
                                    <a wire:navigate.hover href="/">
                                        <img src="{{ asset('image/default-img.svg') }}" alt="image"
                                            class="w-100 rounded-2 vh-20 bg-secondary-subtle">
                                    </a>
                                    <div class="card-body px-0 py-2">
                                        <div>
                                            <small class="text-muted">
                                                {{ now()->translatedFormat('l, j F Y') }}
                                            </small>
                                        </div>
                                        <a wire:navigate.hover href="/"
                                            class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        </a>
                                    </div>
                                    <div class="card-footer bg-transparent px-0 pt-0 border-0">
                                        <div class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                                            Lorem ipsum dolor sit.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    @endforelse
                </div>
            </div>

            <div class="col-12 col-md-3">
                @include('layouts.sections.side')
            </div>
        </div>
    </section>
@endsection
