<div x-data class="d-flex flex-column">
    <input
        x-ref="input"
        type="text"
        class="pr-8 m-1  block border-gray-300 shadow-sm "
        wire:change="doTextFilter('{{ $index }}', $event.target.value)"
        x-on:change="$refs.input.value = ''"
    />
    <div class="d-flex flex-wrap max-w-48 space-x-1">
        @foreach($this->activeTextFilters[$index] ?? [] as $key => $value)
        <button wire:click="removeTextFilter('{{ $index }}', '{{ $key }}')" class="m-1 pl-1 d-flex align-items-center text-uppercase bg-gray-300 text-white  rounded-full space-x-1">
            <span>{{ $this->getDisplayValue($index, $value) }}</span>
            <x-icons.x-circle  class="h-5 w-5  text-red-500"  />
        </button>
        @endforeach
    </div>
</div>
