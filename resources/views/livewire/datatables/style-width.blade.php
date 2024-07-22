@if (isset($column['width']) || isset($column['minWidth']) || isset($column['maxWidth']))
    style="
        @if (isset($column['width']))width: {{ $column['width'] }};@endif
        @if (isset($column['minWidth']))min-width: {{ $column['minWidth'] }};@endif
        @if (isset($column['maxWidth']))max-width: {{ $column['maxWidth'] }};@endif
    "
@endif