<div class="row g-1">
    <div x-data class="position-relative col-12">
        <input
            x-ref="min"
            type="number"
            wire:input.debounce.500ms="doNumberFilterStart('{{ $index }}', $event.target.value)"
            class="form-control form-control-sm w-100 ps-2 pe-5"
            placeholder="{{ __('MIN') }}"
        />
        <div class="position-absolute top-50 end-0 translate-middle-y">
            <button 
                x-on:click="$refs.min.value=''" 
                wire:click="doNumberFilterStart('{{ $index }}', '')" 
                class="pe-1 btn btn-sm btn-link py-0 mb-1 me-1" 
                tabindex="-1"
            >
                <x-icons.x-circle class="h-5 w-5" />
            </button>
        </div>
    </div>

    <div x-data class="position-relative col-12">
        <input
            x-ref="max"
            type="number"
            wire:input.debounce.500ms="doNumberFilterEnd('{{ $index }}', $event.target.value)"
            class="form-control form-control-sm w-100 ps-2 pe-5"
            placeholder="{{ __('MAX') }}"
        />
        <div class="position-absolute top-50 end-0 translate-middle-y">
            <button 
                x-on:click="$refs.max.value=''" 
                wire:click="doNumberFilterEnd('{{ $index }}', '')" 
                class="pe-1 btn btn-sm btn-link py-0 mb-1 me-1" 
                tabindex="-1"
            >
                <x-icons.x-circle class="h-5 w-5" />
            </button>
        </div>
    </div>
</div>
