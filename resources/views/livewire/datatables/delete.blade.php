<div class="dropdown-center" wire:key="delete-{{ $value }}">
    <button class="btn btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false"><x-icons.trash /></button>
    <ul class="dropdown-menu">
        <li>
            <h6 class="dropdown-header">
                {{ __('Are you sure?') }}
            </h6>
        </li>
        <li>
        <button 
            wire:click="delete('{{ $value }}')" 
            class="btn btn-sm btn-outline-danger"
        >
            {{ __('Yes')}}
        </button>
        </li>
    </ul>
</div>