@php
    use Carbon\Carbon;
    $data = App\Models\File::show()->where('slug', $slug)->first();
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
                                <li class="breadcrumb-item">Dokumen</li>
                                <li class="breadcrumb-item d-inline-block text-truncate">
                                    {{ Str::limit(strip_tags($data->title), 50, '...') }}
                                </li>
                            </ul>
                            <div class="ratio ratio-1x1 my-5">
                                <embed type="application/pdf" src=" {{ asset('storage/' . $data->attachment) }}"></embed>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card bg-transparent border-2">
                    <div class="card-body">
                        <div>
                            <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                                Informasi
                            </h4>
                            @if (!$data)
                                <h6>Tidak ada data yang ditampilkan</h6>
                            @else
                                <img src="{{ $data->file ? asset('storage/' . $data->file) : 'https://source.unsplash.com/400x600/?nature,forest' }}"
                                    alt="image {{ $data->title }}" class="w-100 rounded-2 bg-secondary-subtle mb-3">
                                <h6 class="text-secondary">Judul</h6>
                                <h6> {{ $data->title }} </h6>
                                <h6 class="text-secondary">Kategori</h6>
                                <h6> {{ $data->category->title }}</h6>
                                <h6 class="text-secondary">Dibuat Pada</h6>
                                <h6>{{ Carbon::parse($data->created_at)->translatedFormat('l, j F Y') }}</h6>
                                <h6 class="text-secondary">Terakhir Diperbarui</h6>
                                <h6>{{ Carbon::parse($data->updated_at)->translatedFormat('l, j F Y') }}</h6>
                                <div class="d-grid gap-2 mt-4">
                                    <a href="/dokumen/download/{{ $data->slug }}"
                                        class="btn btn-primary rounded-pill px-3 py-2">
                                        <i class="bi-download me-2"></i>
                                        Unduh
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
