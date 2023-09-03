<div 
    class="d-table-cell px-6 py-2 text-nowrap @if($column['headerAlign'] === 'right') text-end @elseif($column['headerAlign'] === 'center') text-center @else text-start @endif {{ $this->cellClasses($row, $column) }}"
    wire:key="column_{{ Str::slug($column['name'], '_') }}_{{ $row->id }}"
>
    {!! $column['content'] ?? '' !!}
</div>
