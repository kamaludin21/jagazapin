<div class="flex justify-center space-x-4 mb-8">
    @php
        $site = \App\Models\Site::first();
        $logos = $site ? explode(',', $site->logo) : [];
    @endphp

    @foreach ($logos as $item)
        <img src="{{ \Storage::disk('public')->url(trim($item)) }}">
    @endforeach
</div>