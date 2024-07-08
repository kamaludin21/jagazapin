@extends('layouts.app')

@section('container')
    <section class="container pt-5">
        <div class="row mt-5 pt-5">
            <div class="col-12 ">
                <ul class="breadcrumb mb-5">
                    <li class="breadcrumb-item"><a wire:navigate.hover href="/">Beranda</a></li>
                    <li class="breadcrumb-item">Pengaduan</li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h3 class="text-primary">
                    Layanan Aspirasi dan Pengaduan Online Masyarakat
                </h3>
                <h5 class="text-secondary">
                    Sampaikan laporan Anda langsung kepada kami
                </h5>

                @php
                    $message = session('message');
                    $alert = session('alert');
                    $icon = session('icon');
                @endphp
                @if ($message)
                    <div class="alert alert-{{ $alert }} alert-dismissible fade show mt-5" role="alert">
                        <div class="fs-5">
                            <i class="{{ $icon }} me-2"></i>
                            {{ $message }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('complaint.store') }}" method="POST" enctype="multipart/form-data" class="mt-5">
                    @csrf
                    <div class="card bg-transparent border-0 mb-4 shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3>Pelapor</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="reporter_category_id" class="form-label">
                                    Kategori
                                    <span class="text-danger fw-bold">*</span>
                                </label>
                                <select name="reporter_category_id" id="reporter_category_id"
                                    class="form-select @error('reporter_category_id')is-invalid @enderror">
                                    <option selected disabled value="">Pilih...</option>
                                    @foreach ($reporterCategory as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                @error('reporter_category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="reporter_name" class="form-label">
                                    Nama
                                    <span class="text-danger fw-bold">*</span>
                                </label>
                                <input type="text" name="reporter_name" id="reporter_name"
                                    value="{{ old('reporter_name') }}"
                                    class="form-control @error('reporter_name')is-invalid @enderror">
                                @error('reporter_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="reporter_phone_number" class="form-label">Nomor HP/Telpon</label>
                                <input type="number" name="reporter_phone_number" id="reporter_phone_number"
                                    value="{{ old('reporter_phone_number') }}"
                                    class="form-control @error('reporter_phone_number')is-invalid @enderror">
                                @error('reporter_phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="reporter_email" class="form-label">Email</label>
                                <input type="text" name="reporter_email" id="reporter_email"
                                    value="{{ old('reporter_email') }}"
                                    class="form-control @error('reporter_email')is-invalid @enderror">
                                @error('reporter_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="reporter_address" class="form-label">Alamat</label>
                                <textarea name="reporter_address" id="reporter_address" rows="3"
                                    class="form-control @error('reporter_address')is-invalid @enderror"></textarea>
                                @error('reporter_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card bg-transparent border-0 mb-4 shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3>Terlapor</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="suspect_name" class="form-label">
                                    Nama
                                    <span class="text-danger fw-bold">*</span>
                                </label>
                                <input type="text" name="suspect_name" id="suspect_name"
                                    value="{{ old('suspect_name') }}"
                                    class="form-control @error('suspect_name')is-invalid @enderror">
                                @error('suspect_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="suspect_phone_number" class="form-label">Nomor HP/Telpon</label>
                                <input type="number" name="suspect_phone_number" id="suspect_phone_number"
                                    class="form-control">
                                <div id="suspect_phone_number" class="form-text">Jika diketahui.</div>

                            </div>
                            <div class="mb-3">
                                <label for="suspect_email" class="form-label">Email</label>
                                <input type="email" name="suspect_email" id="suspect_email"
                                    value="{{ old('suspect_email') }}"
                                    class="form-control @error('suspect_email')is-invalid @enderror">
                                <div id="email" class="form-text">Jika diketahui.</div>
                                @error('suspect_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="suspect_address" class="form-label">Alamat</label>
                                <textarea name="suspect_address" id="suspect_address" rows="3"
                                    class="form-control @error('suspect_address')is-invalid @enderror"></textarea>
                                <div id="suspect_address" class="form-text">Jika diketahui.</div>
                                @error('suspect_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card bg-transparent border-0 mb-4 shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3>Aduan</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="complaint_category_id" class="form-label">
                                    Kategori
                                    <span class="text-danger fw-bold">*</span>
                                </label>
                                <select name="complaint_category_id" id="complaint_category_id"
                                    class="form-select @error('reporter_category_id')is-invalid @enderror">
                                    <option value="">Pilih...</option>
                                    @foreach ($complaintCategory as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                @error('reporter_category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">
                                    Waktu kejadian
                                    <span class="text-danger fw-bold">*</span>
                                </label>
                                <input type="datetime-local" name="date" id="date" value="{{ old('date') }}"
                                    class="form-control @error('date')is-invalid @enderror">
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">
                                    Lokasi kejadian
                                    <span class="text-danger fw-bold">*</span>
                                </label>
                                <input type="text" name="location" id="location" value="{{ old('location') }}"
                                    class="form-control @error('location')is-invalid @enderror">
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">
                                    Judul
                                    <span class="text-danger fw-bold">*</span>
                                </label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}"
                                    class="form-control @error('title')is-invalid @enderror">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">
                                    Keterangan
                                    <span class="text-danger fw-bold">*</span>
                                </label>
                                <textarea name="description" id="description" rows="3"
                                    class="form-control @error('description')is-invalid @enderror"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="attachment" class="form-label">
                                    Lampiran bukti
                                    <span class="text-danger fw-bold">*</span>
                                </label>
                                <input type="file" name="attachment[]" id="attachment" multiple
                                    onchange="previewFiles()" class="form-control">
                                <div class="preview-container" id="preview-container"></div>
                            </div>
                        </div>
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

@push('style')
    <style>
        .preview-container {
            display: flex;
            flex-wrap: wrap;
        }

        .preview-item {
            margin: 10px;
        }

        .preview-item img,
        .preview-item video,
        .preview-item iframe {
            max-width: 150px;
            max-height: 150px;
        }
    </style>
@endpush

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

    <script>
        function previewFiles() {
            var previewContainer = document.getElementById('preview-container');
            var files = document.getElementById('attachment').files;

            previewContainer.innerHTML = '';

            if (files) {
                [].forEach.call(files, readAndPreview);
            }

            function readAndPreview(file) {
                if (!/\.(jpe?g|png|gif|webp|mp4|webm|pdf)$/i.test(file.name)) {
                    return alert(file.name + " is not an image, video, or PDF");
                }

                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    var previewItem = document.createElement('div');
                    previewItem.classList.add('preview-item');

                    if (file.type.startsWith('image')) {
                        var image = new Image();
                        image.src = this.result;
                        previewItem.appendChild(image);
                    } else if (file.type.startsWith('video')) {
                        var video = document.createElement('video');
                        video.src = this.result;
                        video.controls = true;
                        previewItem.appendChild(video);
                    } else if (file.type === 'application/pdf') {
                        var iframe = document.createElement('iframe');
                        iframe.src = this.result;
                        previewItem.appendChild(iframe);
                    }

                    previewContainer.appendChild(previewItem);
                });

                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
