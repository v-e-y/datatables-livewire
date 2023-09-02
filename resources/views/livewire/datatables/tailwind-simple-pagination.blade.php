<div class="d-flex justify-content-between">
<!-- Previous Page Link -->
@if ($paginator->onFirstPage())
<div class="w-32 d-flex justify-content-between align-items-center position-relative px-4 py-2 border border-gray-300  leading-5  rounded-md text-gray-400 ">
    <x-icons.arrow-left />
    {{ __('Previous')}}
</div>
@else
<button wire:click="previousPage" id="pagination-mobile-page-previous" class="w-32 d-flex justify-content-between align-items-center position-relative px-4 py-2 border border-gray-300  leading-5  rounded-md text-gray-700 bg-white hover:text-gray-500 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
    <x-icons.arrow-left />
    {{ __('Previous')}}
</button>
@endif


<!-- Next Page pnk -->
@if ($paginator->hasMorePages())
<button wire:click="nextPage" id="pagination-mobile-page-next" class="w-32 d-flex justify-content-between align-items-center position-relative align-items-center px-4 py-2 border border-gray-300  leading-5  rounded-md text-gray-700 bg-white hover:text-gray-500 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
    {{ __('Next')}}
    <x-icons.arrow-right />
</button>
@else
<div class="w-32 d-flex justify-content-between align-items-center position-relative px-4 py-2 border border-gray-300  leading-5  rounded-md text-gray-400 ">
    {{ __('Next')}}
    <x-icons.arrow-right class="inline" />
</div>
@endif
</div>
