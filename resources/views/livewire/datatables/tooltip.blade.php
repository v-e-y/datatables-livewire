<span 
    class="cursor-pointer"
    data-bs-toggle="tooltip" 
    data-bs-placement="bottom" 
    title="{{ $slot }}"
>
    {{ Str::limit($slot, $length) }}
</span>