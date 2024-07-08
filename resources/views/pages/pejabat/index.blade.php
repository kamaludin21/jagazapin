@php
    use Carbon\Carbon;
    $staff = App\Models\Staff::show()->orderBy('order')->paginate(12);
@endphp

@extends('layouts.app')
@section('container')
    <section class="container py-4">
        <div class="row mt-5 pt-5">
            <div class="col-12 ">
                <ul class="breadcrumb mb-5">
                    <li class="breadcrumb-item"><a wire:navigate.hover href="/">Beranda</a></li>
                    <li class="breadcrumb-item">Pejabat</li>
                </ul>
                <h1 class="mb-5">
                    Pejabat
                </h1>
            </div>
        </div>
        @if ($staff->isEmpty())
            <div class="row justify-content-center">
                <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                    <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                </div>
            </div>
        @else
            <div class="row">
                @foreach ($staff as $item)
                    <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                        <div class="card border-0 rounded-4 mb-5">
                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-user.svg') }}"
                                alt="{{ $item->title }}" class="card-img-top w-100 bg-secondary-subtle rounded-3 shadow">
                            <div class="card-body text-center">
                                <h5 class="fs-5 fw-medium">
                                    {{ $item->title_front }}
                                    {{ $item->name }},
                                    {{ $item->title_back }}
                                </h5>
                                <small class="text-secondary">
                                    {{ $item->position->title }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <x-pagination.page>
                        <x-pagination.current wire="wire:navigate.hover"
                            href=" {{ $staff->currentPage() }} / {{ $staff->lastPage() }}" />
                        <x-pagination.previous wire="wire:navigate.hover" href="{{ $staff->previousPageUrl() }}" />
                        <x-pagination.next wire="wire:navigate.hover" href="{{ $staff->nextPageUrl() }}" />
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
