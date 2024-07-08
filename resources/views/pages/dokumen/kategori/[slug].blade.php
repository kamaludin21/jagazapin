@php
    use Carbon\Carbon;
    $data = App\Models\FileCategory::where('slug', $slug)->show()->first();
    $file = App\Models\File::limit(15)
        ->whereHas('category', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
        ->show()
        ->orderByDesc('created_at')
        ->paginate(15);
@endphp


@extends('layouts.app')

@section('container')
    <section class="container py-4">
        <div class="row mt-5 pt-5">
            <div class="col-12 col-md-9">
                <div class="row g-4">
                    @if (!$data)
                        <div class="col-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a wire:navigate.hover href="/">Beranda</a></li>
                                <li class="breadcrumb-item">Dokumen</li>
                            </ul>
                            <h1 class="mb-5">
                                Dokumen
                            </h1>
                            <div class="col-12">
                                <p class="fs-5 text-danger mb-5 pb-5">
                                    Hasil tidak ditemukan.
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="col-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a wire:navigate.hover href="/">Beranda</a></li>
                                <li class="breadcrumb-item d-inline-block text-truncate">Dokumen</li>
                            </ul>
                            <h1 class="mb-5">
                                <a wire:navigate.hover href="/dokumen"
                                    class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                    Dokumen {{ $data->title }}
                                </a>
                            </h1>
                        </div>
                        <div class="col-12">
                            <ul class="list-group list-group-flush">
                                @foreach ($file as $item)
                                    <li class="list-group-item">
                                        <a href="/dokumen/kategori/{{ $item->category->slug }}"
                                            class="badge bg-success-subtle link-success rounded-pill mb-2 link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                            {{ $item->category->title }}
                                        </a>
                                        <h5>
                                            <a href="/dokumen/{{ $item->slug }}"
                                                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                                {{ $item->title }}
                                            </a>
                                        </h5>
                                        <small class="text-muted">
                                            {{ Carbon::parse($item->publishe_at)->translatedFormat('l, j F Y') }}
                                        </small>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-12 mb-5 pb-5">
                            <x-pagination.page>
                                <x-pagination.current wire="wire:navigate.hover"
                                    href=" {{ $file->currentPage() }} / {{ $file->lastPage() }}" />
                                <x-pagination.previous wire="wire:navigate.hover" href="{{ $file->previousPageUrl() }}" />
                                <x-pagination.next wire="wire:navigate.hover" href="{{ $file->nextPageUrl() }}" />
                            </x-pagination.page>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-12 col-md-3">
                @include('layouts.sections.side')
            </div>
        </div>
    </section>
@endsection
