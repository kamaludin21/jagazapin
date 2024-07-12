@extends('layouts.landing')

@section('content')
  <section class="w-full max-w-screen-md mx-auto py-10 space-y-4">
    <nav class="flex" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
          <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600 ">
            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
              viewBox="0 0 20 20">
              <path
                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
            </svg>
            Beranda
          </a>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 9 4-4-4-4" />
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">
              Pengaduan</span>
          </div>
        </li>
      </ol>
    </nav>
    <h3 class="text-3xl font-bold">Pengaduan</h3>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('complaint.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      @method('POST')
      {{-- Pelapor --}}
      <div class="grid max-w-lg gap-4 bg-white border p-2 rounded">
        <div class="pb-2 border-b-2">
          <p class="text-2xl font-semibold">Pelapor</p>
        </div>
        <div class="w-full">
          <label for="reporter_category_id" class="mb-2 block text-sm font-medium text-gray-900">Kategori Pelapor <span class="text-red-500">*</span></label>
          <select id="reporter_category_id" name="reporter_category_id"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"
            required>
            <option selected disabled value="">Pilih Kategori</option>
            @foreach ($reporterCategory as $item)
              <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label for="reporter_name" class="mb-2 block text-sm font-medium text-gray-900">Nama <span class="text-red-500">*</span></label>
          <input type="text" id="reporter_name" name="reporter_name"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"
            placeholder="Nama Pelapor" required />
        </div>
        <div>
          <label for="reporter_phone_number" class="mb-2 block text-sm font-medium text-gray-900">No. HP</label>
          <input type="text" id="reporter_phone_number" name="reporter_phone_number"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"
            placeholder="No. HP" />
        </div>
        <div>
          <label for="reporter_email" class="mb-2 block text-sm font-medium text-gray-900">Email</label>
          <input type="email" id="reporter_email" name="reporter_email"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"
            placeholder="Email" />
        </div>
        <div>
          <label for="reporter_address" class="mb-2 block text-sm font-medium text-gray-900">Alamat</label>
          <textarea id="reporter_address" name="reporter_address" rows="2"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"
            placeholder="Alamat"></textarea>
        </div>
      </div>

      {{-- Terlapor --}}
      <div class="grid max-w-lg gap-4 bg-white border p-2 rounded">
        <div class="pb-2 border-b-2">
          <p class="text-2xl font-semibold">Terlapor</p>
        </div>
        <div>
          <label for="suspect_name" class="mb-2 block text-sm font-medium text-gray-900">Nama <span class="text-red-500">*</span></label>
          <input type="text" id="suspect_name" name="suspect_name"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"
            placeholder="Nama" required />
        </div>
        <div>
          <label for="suspect_phone_number" class="mb-2 block text-sm font-medium text-gray-900">No. HP</label>
          <input type="text" id="suspect_phone_number"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"
            placeholder="No. HP" />
        </div>
        <div>
          <label for="suspect_email" class="mb-2 block text-sm font-medium text-gray-900">Email</label>
          <input type="email" id="suspect_email" name="suspect_email"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"
            placeholder="Email" />
        </div>
        <div>
          <label for="suspect_address" class="mb-2 block text-sm font-medium text-gray-900">Alamat</label>
          <textarea id="suspect_address" name="suspect_address" rows="2"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"
            placeholder="Write your thoughts here..."></textarea>
        </div>
      </div>

      {{-- Isi Aduan --}}
      <div class="grid max-w-lg gap-4 bg-white border p-2 rounded">
        <div class="pb-2 border-b-2">
          <p class="text-2xl font-semibold">Aduan</p>
        </div>
        <div class="w-full">
          <label for="complaint_category_id" class="mb-2 block text-sm font-medium text-gray-900">Kategori
            Pidana <span class="text-red-500">*</span></label>
          <select id="complaint_category_id" name="complaint_category_id"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"
            required>
            <option selected value="">Pilih Kategori</option>
            @foreach ($complaintCategory as $item)
              <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
          </select>
        </div>
        <div class="relative grid">
          <label for="date" class="mb-2 block text-sm font-medium text-gray-900">Waktu Kejadian <span class="text-red-500">*</span></label>
          <input type="date" name="date" class="" required>
        </div>

        <div>
          <label for="location" class="mb-2 block text-sm font-medium text-gray-900">Lokasi Kejadian <span class="text-red-500">*</span></label>
          <input type="text" id="location" name="location"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"
            placeholder="Lokasi Kejadian" required />
        </div>
        <div>
          <label for="title" class="mb-2 block text-sm font-medium text-gray-900">Judul <span class="text-red-500">*</span></label>
          <input type="text" id="title" name="title"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"
            placeholder="Judul" required />
        </div>
        <div>
          <label for="description" class="mb-2 block text-sm font-medium text-gray-900">Keterangan <span class="text-red-500">*</span></label>
          <textarea id="description" rows="4" name="description"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"
            placeholder="Keterangan" required></textarea>
        </div>
        <div>
          <label class="mb-2 block text-base font-medium text-gray-900" for="attachment">Lampiran Bukti <span class="text-red-500">*</span></label>
          <input name="attachment[]" multiple onchange="previewFiles()"
            class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-base text-gray-900 focus:outline-none"
            id="attachment" type="file" />
          <div class="preview-container" id="preview-container"></div>
        </div>
      </div>
      <button type="submit"
        class="px-3 py-2 bg-green-600 hover:bg-green-700 rounded-md text-sm font-medium text-white">SUBMIT</button>
    </form>
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
