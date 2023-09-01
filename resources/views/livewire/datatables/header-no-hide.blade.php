@unless($column['hidden'])
    <div
        @if (isset($column['tooltip']['text'])) title="{{ $column['tooltip']['text'] }}" @endif
                                                class="position-relative d-table-cell h-12 overflow-hidden align-top" @include('datatables::style-width')>
        @if($column['sortable'])
            <button wire:click="sort('{{ $index }}')" class="w-100 h-full px-6 py-3 border-b border-gray-200 bg-gray-50 text-start text-xs font-medium text-gray-500 uppercase  d-flex align-items-center @if($column['headerAlign'] === 'right') justify-end @elseif($column['headerAlign'] === 'center') justify-center @endif">
                <span class="inline ">{{ str_replace('_', ' ', $column['label']) }}</span>
                <span class="inline text-xs text-blue-400">
                    @if($sort === $index)
                        @if($direction)
                            <x-icons.chevron-up wire:loading.remove class="w-6 h-6 text-green-600 stroke-current" />
                        @else
                            <x-icons.chevron-down wire:loading.remove class="w-6 h-6 text-green-600 stroke-current" />
                        @endif
                    @endif
                </span>
            </button>
        @else
            <div class="w-100 h-full px-6 py-3 border-b border-gray-200 bg-gray-50 text-start text-xs font-medium text-gray-500 uppercase  d-flex align-items-center @if($column['headerAlign'] === 'right') justify-end @elseif($column['headerAlign'] === 'center') justify-center @endif">
                <span class="inline ">{{ str_replace('_', ' ', $column['label']) }}</span>
            </div>
        @endif
    </div>
@endif
