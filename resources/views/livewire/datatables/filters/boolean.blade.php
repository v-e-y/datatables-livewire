<div x-data class="d-flex flex-col">
    <select
        x-ref="select"
        name="{{ $name }}"
        class="m-1 text-sm block rounded-md border-gray-300 shadow-sm "
        wire:input="doBooleanFilter('{{ $index }}', $event.target.value)"
        x-on:input="$refs.select.value=''"
    >
        <option value=""></option>
        <option value="0">{{ __('No') }}</option>
        <option value="1">{{ __('Yes') }}</option>
    </select>

    <div class="d-flex flex-wrap max-w-48 space-x-1">
        @isset($this->activeBooleanFilters[$index])
        @if($this->activeBooleanFilters[$index] == 1)
        <button wire:click="removeBooleanFilter('{{ $index }}')"
            class="m-1 pl-1 d-flex align-items-center text-uppercase bg-gray-300 text-white  rounded-full text-xs space-x-1">
            <span>{{ __('YES') }}</span>
            <x-icons.x-circle />
        </button>
        @elseif(strlen($this->activeBooleanFilters[$index]) > 0)
        <button wire:click="removeBooleanFilter('{{ $index }}')"
            class="m-1 pl-1 d-flex align-items-center text-uppercase bg-gray-300 text-white  rounded-full text-xs space-x-1">
            <span>{{ __('No') }}</span>
            <x-icons.x-circle />
        </button>
        @endif
        @endisset
    </div>
</div>
