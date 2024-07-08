@php
    use Carbon\Carbon;
    $dpo = App\Models\Dpo::show()->orderbyDesc('created_at')->paginate(15);
@endphp

@extends('layouts.app')

@section('container')
    <section class="container py-4">
        <div class="row mt-5 pt-5">
            <div class="col-12 col-md-9">
                <div class="row g-4">
                    @if (!$dpo)
                        <div class="col-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a wire:navigate.hover href="/">Beranda</a></li>
                                <li class="breadcrumb-item">Dpo</li>
                            </ul>
                            <h1 class="mb-5">
                                Dpo
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
                                <li class="breadcrumb-item">Dpo</li>
                            </ul>
                            <h1 class="mb-5">
                                <a wire:navigate.hover href="/Dpo"
                                    class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                    Dpo
                                </a>
                            </h1>
                        </div>

                        @foreach ($dpo as $item)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                <div class="card bg-transparent border-0">
                                    <a wire:navigate.hover href="/dpo/{{ $item->slug }}">
                                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-user.svg') }}"
                                            alt="image {{ $item->title }}"
                                            class="w-100 rounded-2 vh-25 bg-secondary-subtle">
                                    </a>
                                    <div class="card-body px-0 py-2">
                                        <a wire:navigate.hover href="/dpo/{{ $item->slug }}"
                                            class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                            {{ Str::limit(strip_tags($item->title), 100, '...') }}
                                        </a>
                                        <div>
                                            <small class="text-muted">
                                                {{ Carbon::parse($item->created_at)->translatedFormat('l, j F Y') }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 mb-5 pb-5">
                            <x-pagination.page>
                                <x-pagination.current wire="wire:navigate.hover"
                                    href=" {{ $dpo->currentPage() }} / {{ $dpo->lastPage() }}" />
                                <x-pagination.previous wire="wire:navigate.hover" href="{{ $dpo->previousPageUrl() }}" />
                                <x-pagination.next wire="wire:navigate.hover" href="{{ $dpo->nextPageUrl() }}" />
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
