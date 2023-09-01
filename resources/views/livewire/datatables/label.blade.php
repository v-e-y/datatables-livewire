
<div class="d-table-cell px-6 py-2 text-nowrap @if($column['headerAlign'] === 'right') text-end @elseif($column['headerAlign'] === 'center') text-center @else text-start @endif {{ $this->cellClasses($row, $column) }}">
    {!! $column['content'] ?? '' !!}
</div>
