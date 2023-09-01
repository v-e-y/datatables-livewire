<div
    @if (isset($column['tooltip']['text'])) title="{{ $column['tooltip']['text'] }}" @endif
    class="d-flex flex-col align-items-center h-full px-6 py-5 overflow-hidden text-xs font-medium  text-start text-gray-500 uppercase align-top bg-blue-100 border-b border-gray-200 space-y-2">
    <div>{{ __('SELECT ALL') }}</div>
    <div>
        <input
        type="checkbox"
        wire:click="toggleSelectAll"
        class="w-4 h-4 mt-1 text-blue-600 form-checkbox transition duration-150 ease-in-out"
        @if($this->results->total() === count($visibleSelected)) checked @endif
        />
    </div>
</div>
