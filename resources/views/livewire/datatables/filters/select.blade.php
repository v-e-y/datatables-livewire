<div x-data class="d-flex flex-column">
    <div class="d-flex">
        <select
            x-ref="select"
            name="{{ $name }}"
            class="w-100 form-select form-select-sm"
            wire:input="doSelectFilter('{{ $index }}', $event.target.value)"
            x-on:input="$refs.select.value=''"
        >
            <option value=""></option>
            @foreach($options as $value => $label)
                @if(is_object($label))
                    <option 
                        value="{{ $label->id }}"
                        wire:key="doSelectFilter_{{ $label->id }}_{{ $index }}_{{ $this->id }}"
                    >
                        {{ $label->name }}
                    </option>
                @elseif(is_array($label))
                    <option 
                        value="{{ $label['id'] }}"
                        wire:key="doSelectFilter_{{ $label['id'] }}_{{ $index }}_{{ $this->id }}"
                    >
                        {{ $label['name'] }}
                    </option>
                @elseif(is_numeric($value))
                    <option 
                        value="{{ $label }}"
                        wire:key="doSelectFilter_{{ $label }}_{{ $index }}_{{ $this->id }}"
                    >
                        {{ $label }}
                    </option>
                @else
                    <option 
                        value="{{ $value }}"
                        wire:key="doSelectFilter_{{ $value }}_{{ $index }}_{{ $this->id }}"
                    >
                        {{ $label }}
                    </option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="d-flex flex-wrap">
        @foreach($this->activeSelectFilters[$index] ?? [] as $key => $value)
            <button 
                wire:click="removeSelectFilter('{{ $index }}', '{{ $key }}')" 
                x-on:click="$refs.select.value=''"
                class="btn btn-sm btn-danger py-1 px-2"
            >
                <span>{{ $this->getDisplayValue($index, $value) }}</span>
                <x-icons.x-circle />
            </button>
        @endforeach
    </div>
</div>
