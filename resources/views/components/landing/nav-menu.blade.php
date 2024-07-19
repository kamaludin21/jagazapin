@props(['data'])
<nav class="px-2 sm:px-0 bg-white border-y py-1 w-full mx-auto">
  {{-- Mobile --}}
  <ul class="block md:hidden">
    <div class="flex items-center w-full justify-between">
      <button class="p-2 border rounded-md" type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
        <x-icons.burger-menu class="w-6 h-6"/>
      </button>
      <x-landing.search-box class="flex md:hidden items-center max-w-sm"/>
    </div>


    <!-- drawer component -->
    <div id="drawer-navigation"
      class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full overflow-y-auto bg-white p-4 transition-transform"
      tabindex="-1" aria-labelledby="drawer-navigation-label">
      <h5 id="drawer-navigation-label" class="text-base font-semibold uppercase text-gray-500">Menu</h5>
      <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
        class="absolute end-2.5 top-2.5 inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900">
        <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close menu</span>
      </button>
      <div class="overflow-y-auto py-4">
        <x-landing.menu-item :data="$data"/>
      </div>
    </div>

  </ul>
  {{-- Desktop --}}
  <ul class="hidden md:flex gap-3 max-w-screen-lg mx-auto w-full">
    <x-landing.menu-item :data="$data"/>
  </ul>
</nav>
