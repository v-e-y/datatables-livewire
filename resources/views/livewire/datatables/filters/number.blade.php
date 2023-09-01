<div class="d-flex flex-col">
    <div x-data class="position-relative d-flex">
        <input
            x-ref="min"
            type="number"
            wire:input.debounce.500ms="doNumberFilterStart('{{ $index }}', $event.target.value)"
            class="w-100 pr-8 m-1 text-sm block rounded-md border-gray-300 shadow-sm "
            placeholder="{{ __('MIN') }}"
        />
        <div class="position-absolute inset-y-0 right-0 pr-2 d-flex align-items-center">
            <button x-on:click="$refs.min.value=''" wire:click="doNumberFilterStart('{{ $index }}', '')" class="pr-1 d-flex text-gray-400 hover:" tabindex="-1">
                <x-icons.x-circle class="h-5 w-5 " />
            </button>
        </div>
    </div>

    <div x-data class="position-relative d-flex">
        <input
            x-ref="max"
            type="number"
            wire:input.debounce.500ms="doNumberFilterEnd('{{ $index }}', $event.target.value)"
            class="w-100 pr-8 m-1 text-sm block rounded-md border-gray-300 shadow-sm "
            placeholder="{{ __('MAX') }}"
        />
        <div class="position-absolute inset-y-0 right-0 pr-2 d-flex align-items-center">
            <button x-on:click="$refs.max.value=''" wire:click="doNumberFilterEnd('{{ $index }}', '')" class="pr-1 d-flex text-gray-400 hover:" tabindex="-1">
                <x-icons.x-circle class="h-5 w-5 " />
            </button>
        </div>
    </div>
</div>
