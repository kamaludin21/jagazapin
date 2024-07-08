@props([
    'href' => null,
    'src' => null,
    'title' => null,
])
<div class="card bg-transparent border-0 h-100">
    <a href="#">
        <img src="{{ $src }}" alt="{{ $title }}" class="card-img w-100 rounded-1">
    </a>
    <div class="card-footer bg-transparent px-0">
        <a href="{{ $href }}" class="card-title text-reset text-decoration-none">
            {{ $title }}
        </a>
    </div>
</div>
