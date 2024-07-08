@extends('layouts.app')

@section('container')
    <section class="container pt-5">
        <div class="row mt-5 pt-5">
            <div class="col-12 ">
                <ul class="breadcrumb mb-5">
                    <li class="breadcrumb-item"><a wire:navigate.hover href="/">Beranda</a></li>
                    <li class="breadcrumb-item">Kritik dan Saran</li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-evenly">
            <div class="col-12 col-md-2 mb-3">
                <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                    Kritik dan Saran
                </h4>
                <p>
                    Berikan keritik dan saran anda untuk kemajuan kedepannya
                </p>
            </div>
            <div class="col-12 col-md-5 mb-3">
                @php
                    $message = session('message');
                    $alert = session('alert');
                    $icon = session('icon');
                @endphp
                @if ($message)
                    <div class="alert alert-{{ $alert }} alert-dismissible fade show mb-5" role="alert">
                        <div class="fs-5">
                            <i class="{{ $icon }} me-2"></i>
                            {{ $message }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('feedback.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama </label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="form-control @error('name')is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email </label>
                        <input type="text" name="email" id="email" value="{{ old('email') }}"
                            class="form-control @error('email')is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Alamat</label>
                        <textarea name="message" id="message" rows="10" class="form-control @error('message')is-invalid @enderror">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" id="submit" class="btn btn-primary">
                            <span id="spinner" class="spinner-border spinner-border-sm d-none"></span>
                            <i id="icon" class="bi bi-send me-2"></i>
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        const submit = document.getElementById('submit');
        const icon = document.getElementById('icon');
        const spinner = document.getElementById('spinner');
        document.addEventListener('DOMContentLoaded', function() {
            submit.addEventListener('click', function() {
                icon.classList.add('d-none');
                spinner.classList.remove('d-none');
            });
        });
    </script>
@endpush
