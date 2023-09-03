<button 
    type="button" 
    class="{{ isset($buttonStyle) ? $buttonStyle : 'btn btn-primary'}}" 
    {{-- data-bs-toggle="modal" 
    data-bs-target="#{{ $modalId }}" --}}
    wire:click.prevent="{{ $clickReceiverName }}({{ $id }})"
>
    {!! isset($buttonText) ? $buttonText : '<i class="fa-regular fa-eye pe-0"></i>' !!}
</button>