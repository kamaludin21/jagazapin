@php
    $site = \App\Models\Site::first();
@endphp
<footer class="wrapper bg-body-secondary mt-5">
    <div class="container pt-5">
        <div class="row justify-content-between">
            <div class="col-12 col-md-3 mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                    {{-- <img src="{{ asset('image/kejati-riau.png') }}" alt="Logo" height="50"> --}}
                    {{ $site->nama_site }}
                </a>
                <h4 class="fw-semibold">
                    Kejaksaan Tinggi Riau
                </h4>
                <ul class="list-unstyled">
                    <li>Alamat: Jl. Jend. Sudirman No. 375 Pekanbaru</li>
                    <li>Telp: (0761) 32103</li>
                    <li>Email: kejati.riau@kejaksaan.go.id</li>
                </ul>
            </div>


            <div class="col-12 col-md-3 mb-3">
                <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                    Tautan Terkait
                </h4>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="https://www.kejaksaan.go.id/" target="_BLANK" class="nav-link p-0 text-body-secondary">
                            Kejaksaan Agung RI
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="http://kejari-pekanbaru.kejaksaan.go.id/" target="_BLANK"
                            class="nav-link p-0 text-body-secondary">
                            Kejari Pekanbaru
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="http://kejari-dumai.kejaksaan.go.id/" target="_BLANK"
                            class="nav-link p-0 text-body-secondary">
                            Kejari Dumai
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="https://kejari-pelalawan.kejaksaan.go.id/" target="_BLANK"
                            class="nav-link p-0 text-body-secondary">
                            Kejari Pelalawan
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="https://kejari-siak.kejaksaan.go.id/" target="_BLANK"
                            class="nav-link p-0 text-body-secondary">
                            Kejari Siak
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="https://kejari-kuantansingingi.go.id" target="_BLANK"
                            class="nav-link p-0 text-body-secondary">
                            Kejari Kuansing
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="http://kejari-rokanhulu.kejaksaan.go.id/" target="_BLANK"
                            class="nav-link p-0 text-body-secondary">
                            Kejari Rokan Hulu
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="https://kejari-rokanhilir.kejaksaan.go.id/" target="_BLANK"
                            class="nav-link p-0 text-body-secondary">
                            Kejari Rokan Hilir
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="http://Kejari-indragirihulu.go.id" target="_BLANK"
                            class="nav-link p-0 text-body-secondary">
                            Kejari Indragiri Hulu
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="http://kejari-indragirihilir.kejaksaan.go.id/" target="_BLANK"
                            class="nav-link p-0 text-body-secondary">
                            Kejari Indragiri Hilir
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="http://kejari-bengkalis.kejaksaan.go.id/" target="_BLANK"
                            class="nav-link p-0 text-body-secondary">
                            Kejari Bengkalis
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="http://kejari-kepulauanmeranti.kejaksaan.go.id/" target="_BLANK"
                            class="nav-link p-0 text-body-secondary">
                            Kejari Kepulauan Meranti
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-md-5 mb-3">
                <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                    Lokasi
                </h4>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6560349774486!2d101.44529257505096!3d0.5167758636869536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ac1d09a9b905%3A0xe1c458a97fb867a1!2sKejaksaan%20Tinggi%20Riau!5e0!3m2!1sid!2sid!4v1711598667977!5m2!1sid!2sid"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    class="rounded-4 shadow-sm w-100 vh-50">
                </iframe>
            </div>
        </div>
    </div>
    <div class="container pt-5">
        <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                {{-- <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                    <img src="{{ asset('image/kejati-logo.png') }}" alt="Logo" width="35" height="35">
                </a> --}}
                <span class="mb-3 mb-md-0 text-body-secondary">
                    {{ $site->nama_site }} &copy; {{ date('Y') }}
                </span>
            </div>
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                {{-- @if (!empty($site->medsos))
                    @foreach ($site->medsos as $item)
                    <li class="ms-3">
                        <a href="{{ $item['link'] }}">
                            <img src="{{ \Storage::disk('public')->url($item['icon']) }}" width="10" alt="">
                        </a>
                    </li>
                    @endforeach
                @endif --}}
                {{-- kejati
                polda
                bpn --}}

                <li class="ms-3">
                    <a class="text-body-secondary" href="https://www.facebook.com/profile.php?id=61561398347698&mi  bextid=a3pxOyd5sDEt01RW" target="_blank">
                        <i class="bi-facebook fs-5"></i>
                    </a>
                </li>
                <li class="ms-3">
                    <a class="text-body-secondary" href="https://www.instagram.com/sikontanriau?igsh=ZGhvM2pnNXB4dXN3" target="_blank">
                        <i class="bi-instagram fs-5"></i>
                    </a>
                </li>
                {{-- <li class="ms-3">
                    <a class="text-body-secondary" href="#">
                        <i class="bi-youtube fs-5"></i>
                    </a>
                </li>
                <li class="ms-3">
                    <a class="text-body-secondary" href="#">
                        <i class="bi-twitter-x fs-5"></i>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</footer>
