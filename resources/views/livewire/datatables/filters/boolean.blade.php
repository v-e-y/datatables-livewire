<div x-data class="row g-1">
    <div class="col-12 mb-2">
        <select
            x-ref="select"
            name="{{ $name }}"
            class="form-select form-select-sm w-100"
            wire:input="doBooleanFilter('{{ $index }}', $event.target.value)"
            x-on:input="$refs.select.value=''"
        >
            <option value=""></option>
            <option value="0">{{ __('No') }}</option>
            <option value="1">{{ __('Yes') }}</option>
        </select>
    </div>
    <div class="col-12">
        @isset($this->activeBooleanFilters[$index])
            <button 
                wire:click="removeBooleanFilter('{{ $index }}')"
                class="btn btn-sm btn-danger py-1 px-2"
            >
                @if($this->activeBooleanFilters[$index] == 1)
                    <span>{{ __('YES') }}</span>
                @else
                    <span>{{ __('NO') }}</span>
                @endif
                    <x-icons.x-circle />
            </button>
        @endisset
    </div>
</div>
