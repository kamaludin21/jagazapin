@props([
    'class' => null,
    'height' => '90',
    'title' => null,
])
<div class="w-100 rounded-1 d-flex align-items-center align-middle bg-slate {{ $class }}"
    style="height:{{ $height }}px;">
    <div class="m-auto text-center text-secondary">
        <h6>{{ $title }}</h6>
    </div>
</div>
