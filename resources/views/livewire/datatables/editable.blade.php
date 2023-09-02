<div 
    x-data="{
        edit: false,
        edited: false,
        init() {
            window.livewire.on('fieldEdited', (id, column) => {
                if (id === '{{ $rowId }}' && column === '{{ $column }}') {
                    this.edited = true
                    setTimeout(() => {
                        this.edited = false
                    }, 5000)
                }
            })
        }
    }" 
    x-init="init()" 
    wire:key="{{ $rowId }}_{{ $column }}"
>
    <button 
        class="w-100 btn btn-light btn-sm text-start"
        {{-- if !value add opacity-50 --}}
        :class="{ 'opacity-50': !{{ $value }} }"
        {{-- if edited add text-success --}}
        x-bind:class="{ 'text-success': edited }" 
        x-show="!edit"
        x-on:click="edit = true; $nextTick(() => { $refs.input.focus() })"
    >
        {!! htmlspecialchars($value ?? 'Add value') !!}
    </button>
    <span 
        x-cloak 
        x-show="edit"
    >
        <input 
            class="form-control form-control-sm" 
            x-ref="input" 
            value="{!! htmlspecialchars($value) !!}"
            wire:change="edited($event.target.value, '{{ $key }}', '{{ $column }}', '{{ $rowId }}')"
            x-on:click.away="edit = false" 
            x-on:blur="edit = false" 
            x-on:keydown.enter="edit = false" 
        />
    </span>
</div>
