<div 
    type="button" 
    class="{ isset($crButtonClasses) && $crButtonClasses ? $crButtonClasses : 'btn py-1 px-2 btn-outline btn-sm btn-outline-info btn-outline-dashed' }}"
    wire:click="setCollapsedRow('{{ $entityId }}')"
>
    {{ isset($crButtonContent) && $crButtonContent ? $crButtonContent : '<i class="bi bi-eye"></i>' }}
</div>