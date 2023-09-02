<div 
    x-data 
    class="row g-1"
>
    <div class="col-12 position-relative d-flex">
        <input 
            x-ref="start" 
            class="w-100 pe-6 form-control form-control-sm"
            type="date"
            wire:change="doDateFilterStart('{{ $index }}', $event.target.value)" 
        />
        <div class="position-absolute top-50 end-0 translate-middle-y">
            <button 
                x-on:click="$refs.start.value=''" 
                wire:click="doDateFilterStart('{{ $index }}', '')" 
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
            type="date"
            wire:change="doDateFilterEnd('{{ $index }}', $event.target.value)" 
        />
        <div class="position-absolute top-50 end-0 translate-middle-y">
            <button 
                x-on:click="$refs.end.value=''" 
                wire:click="doDateFilterEnd('{{ $index }}', '')" 
                class="pe-1 btn btn-sm btn-link py-0 mb-1 me-2" 
                tabindex="-1"
            >
                <x-icons.x-circle class="h-5 w-5" />
            </button>
        </div>
    </div>
</div>
