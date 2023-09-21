<div 
    x-data="{ open: {{ isset($open) && $open ? 'true' : 'false' }}, working: false }" 
    x-cloak 
    wire:key="delete-{{ $value }}"
>
    <span x-on:click="open = true">
        <button class="btn btn-sm btn-outline-danger"><x-icons.trash /></button>
    </span>

    <div x-show="open"
        class="fixed z-50 bottom-0 inset-x-0 px-4 pb-4   ">
        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity">
            <div class="position-absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div x-show="open" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 "
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 "
            class="position-relative bg-gray-100 rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-100 sm:p-6">
            <div class="hidden sm:block position-absolute top-0 right-0 pt-4 pr-4">
                <button 
                    @click="open = false" 
                    type="button"
                    class="btn btn-sm btn-outline-secondary"
                >
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="w-100">
                <div class="mt-3 text-center">
                    <h3 class="text-lg text-gray-900">{{ __('Delete') }}: <small>{{ $value }}</small></h3>
                    <div class="mt-2">
                        <div class="mt-10 text-gray-700">
                            {{ __('Are you sure?')}}
                        </div>
                        <div class="mt-10 d-flex justify-content-center">
                            <span class="mr-2">
                                <button 
                                    x-on:click="open = false" 
                                    x-bind:disabled="working" 
                                    class="btn btn-sm btn-outline-secondary"
                                >
                                    {{ __('No')}}
                                </button>
                            </span>
                            <span x-on:click="working = !working">
                                <button 
                                    wire:click="delete('{{ $value }}')" 
                                    class="btn btn-sm btn-outline-danger"
                                >
                                    {{ __('Yes')}}
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
