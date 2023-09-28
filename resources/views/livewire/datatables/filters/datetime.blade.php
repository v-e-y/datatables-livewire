<div x-data class="d-flex flex-column">
    <div class="w-100 position-relative d-flex">
        <input 
            x-ref="start" 
            class="w-100 pe-6 form-control form-control-sm" 
            type="datetime-local"
            wire:change="doDatetimeFilterStart('{{ $index }}', $event.target.value)" 
            style="padding-bottom: 5px"
            value="{{ $this->activeDatetimeFilters[$index]['start'] ?? ''}}"
        />
        <div class="position-absolute top-50 end-0 translate-middle-y">
            <button 
                x-on:click="$refs.start.value=''" 
                wire:click="doDatetimeFilterStart('{{ $index }}', '')" 
                class="pe-1 btn btn-sm btn-link py-0 mb-1 me-2" 
                tabindex="-1"
            >
                <x-icons.x-circle class="h-5 w-5" />
            </button>
        </div>
    </div>
    <div class="w-100 position-relative d-flex align-items-center">
        <input 
            x-ref="end" 
            class="w-100 pe-6 form-control form-control-sm" 
            type="datetime-local"
            wire:change="doDatetimeFilterEnd('{{ $index }}', $event.target.value)" 
            style="padding-bottom: 5px"
            value="{{ $this->activeDatetimeFilters[$index]['end'] ?? ''}}"
        />
        <div class="position-absolute top-50 end-0 translate-middle-y">
            <button 
                x-on:click="$refs.end.value=''" 
                wire:click="doDatetimeFilterEnd('{{ $index }}', '')" 
                class="pe-1 btn btn-sm btn-link py-0 mb-1 me-2" 
                tabindex="-1"
            >
                <x-icons.x-circle class="h-5 w-5" />
            </button>
        </div>
    </div>
</div>