<div 
    class="d-flex align-items-center justify-content-between position-relative pe-5" 
    x-data="{ 
        data_to_copy: '{{ isset($dataToCopy) ? $dataToCopy : $data }}',  
        showMsg: false 
    }"
>
    <span>
        {{ $data }}
    </span>
    <a 
        type="button" 
        class="position-absolute top-50 end-0 translate-middle-y opacity-50"
        @mouseover="$el.classList.add('opacity-100')"
        @mouseleave="$el.classList.remove('opacity-100')"
        @click="navigator.clipboard.writeText(data_to_copy), showMsg = true, setTimeout(() => showMsg = false, 1000)"
    >
        <template x-if="showMsg">
            <i class="fa-solid fa-check text-success"></i>
        </template>
        <template x-if="! showMsg">
            <i class="fa-solid fa-copy text-muted"></i>
        </template>
    </a>
</div>