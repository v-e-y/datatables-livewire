<div 
    class="modal fade" 
    id="{{ $modalId }}"
    tabindex="-1" 
    aria-labelledby="Data Tables Livewire Modal" 
    aria-hidden="true"
    wire:ignore.self
>
    <div 
        class="modal-dialog {{ isset($modalSize) ? $modalSize : '' }}"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="data_tables_livewire_modal_title">
                    {{ isset($modalTitle) ? $modalTitle : '' }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (isset($modalLWComponent))
                    @livewire($modalLWComponent, isset($modalLWComponentParams) ? $modalLWComponentParams : [])
                @endif
                @if (isset($modalView))
                    @include($modalView)
                @endif
                @isset($modalBody)
                    {!! $modalBody !!}
                @endisset
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>