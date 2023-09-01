<ul class="pagination pagination-outline">
    <li 
        class="page-item previous @if ($paginator->onFirstPage()) disabled @endif m-1"
        @if ($paginator->onFirstPage())
            wire:click="previousPage"
        @endif
    >
        <a type="button" class="page-link">
            <i class="previous"></i>
        </a>
    </li>
    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="page-item active m-1" wire:key="paginator_page_{{ Str::random(4) }}_{{ $this->id }}">
                <span class="page-link">
                    {{ $element }}
                </span>
            </li>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                <li class="page-item m-1" wire:key="paginator_page_{{ $page }}_{{ $this->id }}">
                    <a 
                        class="page-link {{ $page === $paginator->currentPage() ? 'active' : '' }}" 
                        wire:click="gotoPage({{ $page }})"
                        id="pagination-desktop-page-{{ $page }}"
                    >
                        {{ $page }}
                    </a>
                </li>
            @endforeach
        @endif
    @endforeach
    <li 
        class="page-item next m-1"
    >
        <a 
            type="button"
            class="page-link"
            @if ($paginator->hasMorePages())
                wire:click="nextPage"
            @else
                disabled
            @endif
        >
            <i class="next"></i>
        </a>
    </li>
</ul>
