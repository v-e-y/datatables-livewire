<div x-data="{ show: false }" class="d-flex flex-column align-items-center">
    <div class="d-flex flex-column align-items-center position-relative">
        <button 
            x-on:click="show = !show" 
            class="btn btn-sm btn-info"
        >
            <div class="d-flex align-items-center h-5">
                {{ __('Show / Hide Columns')}}
            </div>
        </button>
        <div 
            x-show="show" 
            x-on:click.away="show = false" 
            class="z-3 position-absolute top-100 w-100 right-0 max-h-select overflow-y-auto" 
            x-cloak
        >
            <div class="d-flex flex-column w-100">
                @foreach($this->columns as $index => $column)
                    @if ($column['hideable'] !== false)
                        <div wire:key="hide_column_{{ $index }}_{{ $this->id }}">
                            <div 
                                class="@unless($column['hidden']) d-none @endif cursor-pointer w-100 border-gray-800 border-bottom bg-gray-700 text-gray-500" 
                                wire:click="toggle({{$index}})"
                            >
                                <div class="position-relative d-flex w-100 align-items-center p-2">
                                    <div class="w-100 align-items-center d-flex">
                                        <div class="mx-2">{{ $column['label'] }}</div>
                                    </div>
                                    <div class="position-absolute top-50 end-0 translate-middle-y pe-2 d-flex align-items-center">
                                        <x-icons.check-circle />
                                    </div>
                                </div>
                            </div>
                            <div 
                                class="@if($column['hidden']) d-none @endif cursor-pointer w-100 border-gray-800 border-bottom bg-gray-700 text-white" 
                                wire:click="toggle({{$index}})"
                                >
                                <div class="position-relative d-flex w-100 align-items-center p-2">
                                    <div class="w-100 align-items-center d-flex">
                                        <div class="mx-2">{{ $column['label'] }}</div>
                                    </div>
                                    <div class="position-absolute top-50 end-0 translate-middle-y pe-2 d-flex align-items-center">
                                        <x-icons.x-circle />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .top-100 {
        top: 100%
    }

    .bottom-100 {
        bottom: 100%
    }

    .max-h-select {
        max-height: 300px;
    }
</style>
