@props(['data'])

@foreach ($data as $parent)
      @if (count($parent->children) > 0)
        <li class="py-2 relative border-b-4 border-transparent hover:border-green-400 group">
          <a role="button"
            class="flex gap-1 items-center text-lg font-light text-slate-600 group-hover:text-green-700">
            <span>{{ $parent->title }}</span>
            <x-icons.chev-down class="h-5 w-5" />
          </a>
          <div class="block md:hidden  group-hover:block static md:absolute w-fit  whitespace-normal md:whitespace-nowrap left-0 top-full z-20">
            <div class="grid bg-white p-2 rounded-md ring-0 md:ring-1 ring-slate-400">
              @foreach ($parent->children as $child)
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
                <a href="{{ $url }}" class="text-slate-600 hover:underline">
                  {{ $child->title }}
                </a>
              @endforeach
            </div>
          </div>
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
        <li class="py-2 relative border-b-4 border-transparent hover:border-green-400 group">
          <a href="{{ $url }}"
            class="flex gap-1 items-center text-lg font-light text-slate-600 group-hover:text-green-700">
            <span>{{ $parent->title }}</span>
          </a>
        </li>
      @endif
    @endforeach
