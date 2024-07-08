@props([
    'href' => null,
    'wire' => null,
])
<li class="page-item">
    <a class="page-link" {{ $wire }} href="{{ $href }}">
        <i class="bi bi-chevron-right"></i>
    </a>
</li>
