<div 
    class="d-flex align-items-center justify-content-between position-relative pe-5" 
    data-tocopy="{{ isset($dataToCopy) ? $dataToCopy : $data }}"
    @if (isset($cropped) && $cropped)
        data-bs-toggle="tooltip" 
        data-bs-placement="bottom" 
        title="{{ isset($data) ? $data : '' }}"
    @endif
    wire:key="clipboard_{{ Str::random(4) }}_{{ $this->id }}"
>
    @if (isset($data))
        <span>{{ isset($cropped) ? Str::limit($data, $cropped) : $data }}</span>
    @endif
    <a 
        type="button"  
        class="position-absolute top-50 end-0 translate-middle-y opacity-50"
        onclick="window.DatatablesLivewire.toClipboard(this)"
    >
        <i class="fa-solid fa-check text-success d-none"></i>
        <i class="fa-solid fa-copy text-muted"></i>
    </a>
</div>