<div class="d-flex justify-content-center">
    <input
        type="checkbox"
        wire:model="selected"
        value="{{ $value }}"
        @if (property_exists($this, 'pinnedRecords') && in_array($value, $this->pinnedRecords)) checked @endif
        class="w-4 h-4 mt-1 text-primary form-checkbox transition duration-150 ease-in-out"
    />
</div>
