@unless($column['hidden'])
    <div
        @if (isset($column['tooltip']['text'])) title="{{ $column['tooltip']['text'] }}" @endif
        class="position-relative d-table-cell h-12 overflow-hidden align-top" @include('datatables::style-width')
        wire:key="header_{{ $index }}_{{ Str::slug($column['label'], '_') }}_{{ Str::random(3) }}"
    >
        @if($column['sortable'])
            <button 
                wire:click="sort('{{ $index }}')" 
                class="w-100 h-100 px-6 py-3 border border-gray-200 bg-transparent text-start text-gray-500 text-uppercase d-flex align-items-center @if($column['headerAlign'] === 'right') justify-content-end @elseif($column['headerAlign'] === 'center') justify-content-center @endif"
            >
                <span class="fw-bold">
                    {{ str_replace('_', ' ', $column['label']) }}
                </span>
                <span class="text-primary">
                    @if($sort === $index)
                        @if($direction)
                            <x-icons.chevron-up wire:loading.remove class="w-6 h-6" />
                        @else
                            <x-icons.chevron-down wire:loading.remove class="w-6 h-6" />
                        @endif
                    @endif
                </span>
            </button>
        @else
            <div 
                class="w-100 h-100 px-6 py-3 border border-gray-200 text-start text-gray-500 text-uppercase d-flex align-items-center @if($column['headerAlign'] === 'right') justify-content-end @elseif($column['headerAlign'] === 'center') justify-content-center @endif"
            >
                <span>{{ str_replace('_', ' ', $column['label']) }}</span>
            </div>
        @endif
    </div>
@endif
