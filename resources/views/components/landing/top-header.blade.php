@props(['site'])

<div class="px-2 sm:px-0 bg-green-700 w-full mx-auto">
    <div class="max-w-screen-lg mx-auto w-full py-2 flex justify-between items-center">
      <div class="flex gap-2">
        {{-- Phone --}}
        <a href="" class="inline-flex gap-1 items-center text-slate-50">
          <x-icons.phone class="w-5 h-5" />
          <span class="text-sm font-medium">{{ $site->hp }}</span>
        </a>
        {{-- Mail --}}
        {{-- <a href="" class="inline-flex gap-1 items-center text-slate-50">
          <x-icons.mail class="w-5 h-5" />
          <span class="text-sm font-medium">kejaksaan@pku.com</span>
        </a> --}}
      </div>
      {{-- Search Box --}}
      <x-landing.search-box class="hidden md:flex items-center max-w-sm mx-auto"/>

      <div class="flex gap-2">
        {{-- Socmed --}}
        <a href="" class="bg-slate-100/50 p-1 rounded-md">
          <x-icons.facebook class="h-5 w-5 text-white" />
        </a>
        {{-- Socmed --}}
        <a href="" class="bg-slate-100/50 p-1 rounded-md">
          <x-icons.instagram class="h-5 w-5 text-white" />
        </a>
      </div>
    </div>
  </div>
