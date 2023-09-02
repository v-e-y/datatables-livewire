<div x-data class="d-flex flex-column">
    <input
        x-ref="input"
        type="text"
        class="form-control form-control-sm"
        wire:change="doTextFilter('{{ $index }}', $event.target.value)"
        x-on:change="$refs.input.value = ''"
    />
    <div class="d-flex flex-wrap max-w-48 ">
        @foreach($this->activeTextFilters[$index] ?? [] as $key => $value)
            <button 
                wire:click="removeTextFilter('{{ $index }}', '{{ $key }}')" 
                class="btn btn-sm btn-danger py-1 px-2 m-1"
                wire:key="removeTextFilter_{{ $index }}_{{ $key }}_{{ $this->id }}"
            >
                <span>{{ $this->getDisplayValue($index, $value) }}</span>
                <x-icons.x-circle  class="h-5 w-5 text-red-500"  />
            </button>
        @endforeach
    </div>
</div>
