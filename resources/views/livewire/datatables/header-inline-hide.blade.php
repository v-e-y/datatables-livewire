<div 
    wire:click.prefetch="toggle('{{ $index }}')"
    class="@if($column['hidden']) position-relative bg-transparent d-table-cell h-12 w-3 bg-light bg-gradient overflow-none align-top group @else d-none @endif"
    style="min-width:12px; max-width:12px"
    wire:key="header_{{ $index }}_{{ Str::slug($column['label'], '_') }}_{{ $this->id }}"
>
    <button class="position-relative h-12 w-3">
        <span
            class="w-32 hidden group-hover:inline-block position-absolute z-10 top-0 left-0 ml-3 bg-blue-300  text-start text-primary  transform text-uppercase">
            {{ str_replace('_', ' ', $column['label']) }}
        </span>
    </button>
    <svg 
        class="position-absolute w-100 inset-x-0 bottom-0"
        viewBox="0 0 314.16 207.25"
    >
        <path stroke-miterlimit="10" d="M313.66 206.75H.5V1.49l157.65 204.9L313.66 1.49v205.26z" />
    </svg>
</div>
<div 
    class="@if($column['hidden']) d-none @else position-relative h-12 overflow-hidden align-top d-flex d-table-cell @endif" 
    @include('datatables::style-width')
>
    @if($column['sortable'])
        <button 
            wire:click="sort('{{ $index }}')"
            class="w-100 h-100 px-3 py-3 bg-transparent border-bottom border-gray-200 text-gray-500 text-uppercase d-flex justify-content-between align-items-center"
        >
            <span class="inline flex-grow @if($column['headerAlign'] === 'right') text-end @elseif($column['headerAlign'] === 'center') text-center @endif"">
                {{ str_replace('_', ' ', $column['label']) }}
            </span>
            <span class="inline text-primary">
                @if($sort === $index)
                    @if($direction)
                        <x-icons.chevron-up class="h-6 w-6 " />
                    @else
                        <x-icons.chevron-down class="h-6 w-6 " />
                    @endif
                @endif
            </span>
        </button>
    @else
        <div class="w-100 h-100 px-3 py-3 border-bottom border-gray-200 text-gray-500 text-uppercase d-flex justify-content-between align-items-center">
            <span 
                class="inline flex-grow @if($column['headerAlign'] === 'right') text-end @elseif($column['headerAlign'] === 'center') text-center @endif""
            >
                {{ str_replace('_', ' ', $column['label']) }}
            </span>
        </div>
    @endif
    @if ($column['hideable'])
        <button 
            wire:click.prefetch="toggle('{{ $index }}')"
            class="position-absolute bottom-1 right-1"
        >
            <x-icons.arrow-circle-left class="h-3 w-3 text-gray-300 " />
        </button>
    @endif
</div>
