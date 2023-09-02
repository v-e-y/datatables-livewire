<div class="btn btn-link" wire:click="toggleBoolean('{{ $field }}', '{{ $id }}')">
    @if($value)
        <x-icons.check-circle class="text-success" />
    @else
        <x-icons.x-circle class="text-danger" />
    @endif
</div>