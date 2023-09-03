<button 
    type="button" 
    class="{{ isset($buttonStyle) ? $buttonStyle : 'btn btn-primary'}}" 
    {{-- data-bs-toggle="modal" 
    data-bs-target="#{{ $modalId }}" --}}
    wire:click.prevent="{{ isset($clickReceiverName) ? $clickReceiverName : 'showModal'"
>
    {!! isset($buttonText) ? $buttonText : '<i class="fa-regular fa-eye"></i>' !!}
</button>