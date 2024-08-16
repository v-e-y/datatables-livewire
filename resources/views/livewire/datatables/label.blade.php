<div 
    class="text-nowrap @if($column['headerAlign'] === 'right') text-end @elseif($column['headerAlign'] === 'center') text-center @else text-start @endif {{ $this->cellClasses($row, $column) }}"
    wire:key="column_{{ Str::slug($column['name'], '_') }}_{{ $row->id }}_{{ $this->id }}"
>
    {!! $column['content'] ?? '' !!}
</div>
