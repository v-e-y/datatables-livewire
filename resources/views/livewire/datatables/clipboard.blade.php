<div 
    class="d-inline-flex align-items-center" 
    x-data="{ data_to_copy: '{{ $data }}',  showMsg: false }"
>
    <span>
        {{ $data }}
    </span>
    <a 
        type="button" 
        class="ps-2 position-relative"
        @click="navigator.clipboard.writeText(data_to_copy), showMsg = true, setTimeout(() => showMsg = false, 1000)"
    >
        <template x-if="showMsg">
            <i class="fa-solid fa-check fs-2 text-success"></i>
        </template>
        <template x-if="! showMsg">
            <i class="fa-solid fa-copy fs-2 text-muted"></i>
        </template>
    </a>
</div>