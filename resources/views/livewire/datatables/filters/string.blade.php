<div x-data class="flex flex-col">
    <input
        x-ref="input"
        type="text"
        class="m-1 text-sm block rounded-md border-gray-300 shadow-sm "
        wire:change="doTextFilter('{{ $index }}', $event.target.value)"
        x-on:change="$refs.input.value = ''"
    />
    <div class="flex flex-wrap max-w-48 space-x-1">
        @foreach($this->activeTextFilters[$index] ?? [] as $key => $value)
        <button wire:click="removeTextFilter('{{ $index }}', '{{ $key }}')" class="m-1 pl-1 d-flex align-items-center uppercase bg-gray-300 text-white hover:bg-red-600 rounded-full text-xs space-x-1">
            <span>{{ $this->getDisplayValue($index, $value) }}</span>
            <x-icons.x-circle />
        </button>
        @endforeach
    </div>
</div>
