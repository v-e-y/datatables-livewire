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
                <button 
                    type="button" 
                    class="btn-close" 
                    wire:click.prevent="closeModal"
                    aria-label="Close"
                ></button>
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
                <button 
                    type="button" class="btn btn-link btn-lg p-0 w-100 text-center"
                    wire:click.prevent="closeModal"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"></path>
                    </svg>    
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('open_{{ $modalId }}', event => {
        $("#{{ $modalId }}").modal('show');
    });
    window.addEventListener('close_{{ $modalId }}', event => {
        $("#{{ $modalId }}").modal('hide');
    });
</script>