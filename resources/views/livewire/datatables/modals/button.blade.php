<button 
    type="button" 
    class="{{ $modalButtonStyle }}" 
    wire:click.prevent="{{ $clickReceiverName }}({{ $id }})"
>
    {!! isset($buttonText) ? $buttonText : '<i class="fa-regular fa-eye pe-0"></i>' !!}
</button>