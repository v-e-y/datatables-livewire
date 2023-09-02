<div x-data="{ show: false }" class="d-flex flex-column align-items-center">
    <div class="d-flex flex-column align-items-center position-relative">
        <button 
            x-on:click="show = !show" 
            class="btn btn-sm btn-outline-info"
        >
            <div class="d-flex align-items-center h-5">
                {{ __('Show / Hide Columns')}}
            </div>
        </button>
        <div 
            x-show="show" 
            x-on:click.away="show = false" 
            class="z-50 position-absolute mt-16 -mr-4 shadow-2xl top-100  w-96 right-0 rounded max-h-select overflow-y-auto" 
            x-cloak
        >
            <div class="d-flex flex-column w-100">
                @foreach($this->columns as $index => $column)
                    @if ($column['hideable'] !== false)
                        <div>
                            <div 
                                class="@unless($column['hidden']) d-none @endif cursor-pointer w-100 border-gray-800 border-bottom bg-gray-700 text-gray-500 hover:bg-blue-600" 
                                wire:click="toggle({{$index}})"
                            >
                                <div class="position-relative d-flex w-100 align-items-center p-2 group">
                                    <div class="w-100 align-items-center d-flex">
                                        <div class="mx-2 ">{{ $column['label'] }}</div>
                                    </div>
                                    <div class="position-absolute inset-y-0 right-0 pr-2 d-flex align-items-center">
                                        <x-icons.check-circle class="h-3 w-3  text-gray-700" />
                                    </div>
                                </div>
                            </div>
                            <div class="@if($column['hidden']) d-none @endif cursor-pointer w-100 border-gray-800 border-bottom bg-gray-700 text-white " wire:click="toggle({{$index}})">
                                <div class="position-relative d-flex w-100 align-items-center p-2 group">
                                    <div class="w-100 align-items-center d-flex">
                                        <div class="mx-2 ">{{ $column['label'] }}</div>
                                    </div>
                                    <div class="position-absolute inset-y-0 right-0 pr-2 d-flex align-items-center">
                                        <x-icons.x-circle class="h-3 w-3 text-gray-700" />
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
