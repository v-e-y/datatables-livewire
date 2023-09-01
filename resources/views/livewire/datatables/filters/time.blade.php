<div x-data class="d-flex flex-col">
    <div class="w-100 position-relative flex">
        <input x-ref="start" class="w-100 pr-8 m-1 text-sm block rounded-md border-gray-300 shadow-sm " type="time"
            wire:change="doTimeFilterStart('{{ $index }}', $event.target.value)" style="padding-bottom: 5px" />
        <div class="position-absolute inset-y-0 right-0 pr-2 d-flex align-items-center">
            <button x-on:click="$refs.start.value=''" wire:click="doTimeFilterStart('{{ $index }}', '')" class="-mb-0.5 pr-1 d-flex text-gray-400 hover:" tabindex="-1">
                <x-icons.x-circle class="h-5 w-5 stroke-current" />
            </button>
        </div>
    </div>
    <div class="w-100 position-relative flex">
        <input x-ref="end" class="w-100 pr-8 m-1 text-sm block rounded-md border-gray-300 shadow-sm " type="time"
            wire:change="doTimeFilterEnd('{{ $index }}', $event.target.value)" style="padding-bottom: 5px" />
       <div class="position-absolute inset-y-0 right-0 pr-2 d-flex align-items-center">
            <button x-on:click="$refs.end.value=''" wire:click="doTimeFilterEnd('{{ $index }}', '')" class="-mb-0.5 pr-1 d-flex text-gray-400 hover:" tabindex="-1">
                <x-icons.x-circle class="h-5 w-5 stroke-current" />
            </button>
        </div>
    </div>
</div>
