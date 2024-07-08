@php
    $navMenus = App\Models\NavMenu::where('parent_id', -1)
        ->with('children')
        ->orderBy('order')
        ->get();
    $site = App\Models\Site::first();
@endphp
<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm bg-white text-dark bg-opacity-75 fw-medium"
    aria-label="Offcanvas navbar large">
    <div class="container py-2">
        <a class="navbar-brand fw-bold fs-3 text-success-emphasis" href="/">
            {{-- <img src="{{ asset('image/kejati-riau.png') }}" alt="Logo" height="35"
                class="d-inline-block align-text-top"> --}}
            {{ $site->nama_site }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2"
            aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-light bg-opacity-100" tabindex="-1" id="offcanvasNavbar2"
            aria-labelledby="offcanvasNavbar2Label">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbar2Label">
                    {{ $site->nama_site }}
                </h5>
                <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close">
                </button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 text-capitalize pe-3">
                    @foreach ($navMenus as $parent)
                        @if (count($parent->children) > 0)
                            <li class="nav-item dropdown">
                                <a role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    class="nav-link dropdown-toggle">
                                    {{ $parent->title }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @foreach ($parent->children as $child)
                                        <li>
                                            @if ($child->modelable_type == 'App\Models\Link')
                                                @php
                                                    $url = $child->link->url;
                                                @endphp
                                            @elseif ($child->modelable_type == 'App\Models\Category')
                                                @php
                                                    $url = url('kategori/' . $child->category->slug);
                                                @endphp
                                            @elseif ($child->modelable_type == 'App\Models\Article')
                                                @php
                                                    $url = url('/' . $child->article->slug);
                                                @endphp
                                            @elseif ($child->modelable_type == 'App\Models\Page')
                                                @php
                                                    $url = url('halaman/' . $child->page->slug);
                                                @endphp
                                            @elseif ($child->modelable_type == 'App\Models\FileCategory')
                                                @php
                                                    $url = url('dokumen/kategori/' . $child->fileCategory->slug);
                                                @endphp
                                            @endif
                                            <a href="{{ $url }}" class="dropdown-item">
                                                {{ $child->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            @if ($parent->modelable_type == 'App\Models\Link')
                                @php
                                    $url = $parent->link->url;
                                @endphp
                            @elseif ($parent->modelable_type == 'App\Models\Category')
                                @php
                                    $url = url('kategori/' . $parent->category->slug);
                                @endphp
                            @elseif ($parent->modelable_type == 'App\Models\Article')
                                @php
                                    $url = url('/' . $parent->article->slug);
                                @endphp
                            @elseif ($parent->modelable_type == 'App\Models\Page')
                                @php
                                    $url = url('halaman/' . $parent->page->slug);
                                @endphp
                            @elseif ($parent->modelable_type == 'App\Models\FileCategory')
                                @php
                                    $url = url('dokumen/kategori/' . $parent->fileCategory->slug);
                                @endphp
                            @endif
                            <li class="nav-item">
                                <a href="{{ $url }}" aria-current="page" class="nav-link">
                                    {{ $parent->title }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                @livewire('searching')
                <div class="d-flex">
                    <a href="{{ route('filament.admin.pages.dashboard') }}"
                        class="btn btn-primary d-block d-sm-none mt-3">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
