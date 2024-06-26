<div data-cell="{{ Str::slug($key.'_'.$column.'_'.$rowId) }}">
    <button 
        class="w-100 btn btn-light btn-sm text-start"
        onclick="editCell('{{ Str::slug($key.'_'.$column.'_'.$rowId) }}')"
        @if ($truncate && $value !== null)
            data-bs-toggle="tooltip" 
            data-bs-placement="bottom" 
            title="{{ htmlspecialchars($value) }}"
        @endif
    >
        @if ($truncate && $value !== null)
            {{ Str::limit(htmlspecialchars($value), $truncateLength ?? 16) }}
        @endif

        @if (! $truncate && $value !== null)
            {!! htmlspecialchars($value) !!}
        @endif

        @if ($value === null)
            <x-icons.pencil />
        @endif
    </button>
    <input 
        class="form-control form-control-sm d-none" 
        value="{!! htmlspecialchars($value) !!}"
        wire:change="edited($event.target.value, '{{ $key }}', '{{ $column }}', '{{ $rowId }}')"
    />
</div>
