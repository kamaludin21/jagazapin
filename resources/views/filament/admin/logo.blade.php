<div class="flex justify-center space-x-4 mb-8">
    @foreach (\App\Models\Site::first()?->logo as $item)
        <img src="{{ \Storage::disk('public')->url(trim($item)) }}">
    @endforeach
</div>
