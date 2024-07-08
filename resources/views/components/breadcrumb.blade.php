@props([
    'href' => null,
    'title' => null,
])
<nav class="border-bottom mb-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/"
                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                Beranda
            </a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ $href }}"
                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                {{ $title }}
            </a>
        </li>
    </ol>
</nav>
