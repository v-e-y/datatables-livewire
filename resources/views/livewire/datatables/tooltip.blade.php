<span class="position-relative group cursor-pointer">
    <span class="d-flex align-items-center">{{ Str::limit($slot, $length) }}</span>
    <span class="hidden group-hover:block position-absolute z-10 -ml-28 w-96 mt-2 p-2 text-xs whitespace-pre-wrap rounded-lg bg-gray-100 border border-gray-300 shadow-xl text-gray-700 text-start">{{ $slot }}</span>
</span>