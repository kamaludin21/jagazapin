@props([
    'title' => null,
    'href' => null,
])
<h4 class="mb-4">
    <a href="/{{ $href }}"
        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
        {{ $title }}
    </a>
</h4>
