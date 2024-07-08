@props([
    'href' => null,
    'wire' => null,
])
<li class="page-item disabled">
    <a class="page-link" {{ $wire }} href="{{ $href }}">
        Halaman {{ $href }}
    </a>
</li>
