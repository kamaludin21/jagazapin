@php
    use Carbon\Carbon;
    $category = App\Models\category::show()->limit(10)->inRandomOrder()->get();
    $popular = App\Models\Article::show()->limit(7)->orderByDesc('visitor')->get();
    $newest = App\Models\Article::show()->limit(7)->orderByDesc('published_at')->get();
@endphp
<div class="card bg-transparent border-2">
    <div class="card-body">
        <div>
            <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                Tetap Terhubung
            </h4>
            <div class="d-grid gap-2">
                <a href="https://facebook.com/kejatiriau/" target="_blank"
                    class="btn btn-primary text-start rounded-pill px-3 py-2">
                    <i class="bi-facebook me-2"></i>
                    Facebook
                </a>
                <a href="https://www.instagram.com/kejatiriau/" target="_blank"
                    class="btn btn-secondary text-start rounded-pill px-3 py-2">
                    <i class="bi-instagram me-2"></i>
                    Instagram
                </a>
                <a href="https://www.youtube.com/@kejatiriau" target="_blank"
                    class="btn btn-danger text-start rounded-pill px-3 py-2">
                    <i class="bi-youtube me-2"></i>
                    Youtube
                </a>
                <a href="https://twitter.com/kejatiriau_" target="_blank"
                    class="btn btn-dark text-start rounded-pill px-3 py-2">
                    <i class="bi-twitter-x me-2"></i>
                    X
                </a>
            </div>
        </div>
        <div class="mt-5">
            <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                Berita Populer
            </h4>
            <ul class="list-group list-group-flush">
                @if ($popular->isEmpty())
                    <li class="list-group-item px-0">
                        <div class="fw-medium">
                            Not found!
                        </div>
                    </li>
                @else
                    @foreach ($popular as $item)
                        <li class="list-group-item px-0">
                            <small class="text-secondary">
                                {{ Carbon::parse($item->publishe_at)->translatedFormat('l, j F Y') }}
                            </small>
                            <a wire:navigate.hover href="/{{ $item->slug }}"
                                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                <div class="fw-medium">
                                    {{ $item->title }}
                                </div>
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>

        <div class="mt-5">
            <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                Kategori
            </h4>
            @if ($category->isEmpty())
                <a href="/" class="btn btn-secondary rounded-pill">
                    Not found!
                </a>
            @else
                @foreach ($category as $item)
                    <a wire:navigate.hover href="/kategori/{{ $item->slug }}"
                        class="btn btn-secondary rounded-pill mb-2">
                        {{ $item->title }}
                    </a>
                @endforeach
            @endif
        </div>

        <div class="mt-5">
            <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                Berita Terbaru
            </h4>
            <ul class="list-group list-group-flush">
                @if ($newest->isEmpty())
                    <li class="list-group-item px-0">
                        <div class="fw-medium">
                            Not found!
                        </div>
                    </li>
                @else
                    @foreach ($newest as $item)
                        <li class="list-group-item px-0">
                            <small class="text-secondary">
                                {{ Carbon::parse($item->publishe_at)->translatedFormat('l, j F Y') }}
                            </small>
                            <a wire:navigate.hover href="/{{ $item->slug }}"
                                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                <div class="fw-medium">
                                    {{ $item->title }}
                                </div>
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
