<div
    @if (isset($column['tooltip']['text'])) title="{{ $column['tooltip']['text'] }}" @endif
    class="d-flex flex-column align-items-center h-100 px-6 py-5 overflow-hidden   text-start text-gray-500 text-uppercase align-top bg-light bg-gradient border-bottom border-gray-200 space-y-2">
    <div>{{ __('SELECT ALL') }}</div>
    <div>
        <input
        type="checkbox"
        wire:click="toggleSelectAll"
        class="w-4 h-4 mt-1 text-primary form-checkbox transition duration-150 ease-in-out"
        @if($this->results->total() === count($visibleSelected)) checked @endif
        />
    </div>
</div>
