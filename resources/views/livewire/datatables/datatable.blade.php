<div 
    id="data_table_livewire"
    class="{{ $cmpWrapperClasses }}"
>
    @if (! empty($this->beforeCmpLWComponents))
        <div class="row g-1 align-items-center mb-10">
            @foreach ($this->beforeCmpLWComponents as $bcLWCmpName => $bcWCmpSettings)
                <div 
                    class="{{ 
                        isset($bcWCmpSettings['cmp_wrapper_classes'])
                            ? $bcWCmpSettings['cmp_wrapper_classes']
                            : 'col-auto'
                    }}"
                    wire:ignore
                >
                    @livewire(
                        $bcLWCmpName,
                        isset($bcWCmpSettings['cmp_props']) ? $bcWCmpSettings['cmp_props'] : [],
                        key('beforeCmpLWComponents_' . $loop->index)
                    )
                </div>
            @endforeach
        </div>
    @endif
    @isset($title)
        <h1 class="h2 mb-5">{{ $title }}</h1>
    @endisset
    @includeIf($beforeTableSlot)
    <div class="position-relative">
        <x-icons.cog wire:loading class="text-gray-400 h-9 w-9 animate-spin position-absolute top-50 start-50 translate-middle" />
        <div class="row align-items-center justify-content-between mb-10">
            <div class="col-12 col-md-4 col-lg-3 align-items-center">
                @if($this->searchableColumns()->count())
                    <div class="input-group input-group-sm w-100">
                        <input 
                            wire:model.debounce.500ms="search" 
                            class="form-control form-control-sm" 
                            placeholder="{{__('Search in')}} {{ $this->searchableColumns()->map->label->join(', ') }}" 
                            type="text" 
                            autocomplete="off"
                            name="search"
                            id="search"
                        />
                        @if ($this->search)
                            <button 
                                wire:click="$set('search', null)" 
                                class="btn btn-sm btn-danger"
                            >
                                <x-icons.x-circle class="w-5 h-5 " />
                            </button>
                        @endif
                    </div>
                @endif
            </div>
            <div class="col-12 col-md-8">
                <div class="row g-1 justify-content-end align-items-center">
                    @if($this->activeFilters)
                        <div class="col-auto">
                            {{-- <span class="text-xl text-primary text-uppercase">@lang('Filter active')</span> --}}
                            <button 
                                wire:click="clearAllFilters" 
                                class="btn btn-sm btn-warning"
                            >
                                <span>Reset Filters</span>
                                <x-icons.x-circle />
                            </button>
                        </div>
                    @endif

                    @if(count($this->massActionsOptions))
                        <div class="d-flex align-items-center justify-content-center ">
                            <label for="datatables_mass_actions">{{ __('With selected') }}:</label>
                            <select wire:model="massActionOption" class="px-3 text-uppercase  border" id="datatables_mass_actions">
                                <option value="">{{ __('Choose...') }}</option>
                                @foreach($this->massActionsOptions as $group => $items)
                                    @if(!$group)
                                        @foreach($items as $item)
                                            <option 
                                                value="{{$item['value']}}"
                                                wire:key="massActionOption_{{ Str::slug($item['value'] . $item['label'], '_') }}"
                                            >
                                                {{ $item['label'] }}
                                            </option>
                                        @endforeach
                                    @else
                                        <optgroup label="{{ $group }}">
                                            @foreach($items as $item)
                                                <option 
                                                    value="{{$item['value']}}"
                                                    wire:key="massActionOption_{{ Str::slug($item['value'] . $item['label'], '_') }}"
                                                >
                                                    {{$item['label']}}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endif
                                @endforeach
                            </select>
                            <button
                                wire:click="massActionOptionHandler"
                                class="d-flex align-items-center px-4 py-2 text-success text-uppercase border" 
                                type="submit" 
                                title="Submit"
                            >
                                Go
                            </button>
                        </div>
                    @endif

                    @if (count($userHeaderHTMLComponents))
                        @foreach ($userHeaderHTMLComponents as $headerComponent)
                            <div class="col-auto" wire:key="userHeaderHTMLComponents_{{ Str::random(4) }}">
                                {!! $headerComponent !!}
                            </div>
                        @endforeach
                    @endif

                    @if (count($headerLWComponents))
                        @foreach ($headerLWComponents as $component => $componentProps)
                            <div class="col-auto" wire:ignore>
                                @livewire($component, $componentProps, key('headerLWComponents_' . $loop->index))
                            </div>
                        @endforeach
                    @endif

                    @if($exportable)
                        <div 
                            class="col-auto"
                            x-data="{ init() {window.livewire.on('startDownload', link => window.open(link, '_blank'))} }" 
                            x-init="init"
                        >
                            <button 
                                wire:click="export" 
                                class="btn btn-sm btn-info"
                            >
                                <span>{{ __('Export') }}</span>
                                <x-icons.excel />
                            </button>
                        </div>
                    @endif

                    @if($hideable === 'select')
                        <div class="col-auto">
                            @include('datatables::hide-column-multiselect')
                        </div>
                    @endif

                    @foreach ($columnGroups as $name => $group)
                        <button
                            wire:click="toggleGroup('{{ $name }}')"
                            class="px-3 py-2 text-success text-uppercase  border"
                            wire:key="toggleGroup_{{ Str::slug($name, '_') }}"
                        >
                            <span class="d-flex align-items-center h-5">
                                {{ isset($this->groupLabels[$name]) ? __($this->groupLabels[$name]) : __('Toggle :group', ['group' => $name]) }}
                            </span>
                        </button>
                    @endforeach
                    @includeIf($buttonsSlot)
                </div>
            </div>
        </div>

        @if($hideable === 'buttons')
            <div class="p-2 grid grid-cols-8 gap-2">
                @foreach($this->columns as $index => $column)
                    @if ($column['hideable'])
                        <button 
                            wire:click.prefetch="toggle('{{ $index }}')" 
                            class="px-3 py-2 rounded text-white {{ $column['hidden'] ? 'bg-light bg-gradient  text-primary' : 'bg-blue-500 hover:bg-blue-800' }}"
                            wire:key="hide_button_{{ $index }}_{{ $this->id }}"
                        >
                            {{ $column['label'] }}
                        </button>
                    @endif
                @endforeach
            </div>
        @endif

        <div 
            wire:loading.class="opacity-50" 
            class="shadow-lg w-100 overflow-auto"
        >
            <div>
                <div class="w-100 d-table mw-100 align-middle">
                    @unless($this->hideHeader)
                        <div class="d-table-row">
                            @foreach($this->columns as $index => $column)
                                @if($hideable === 'inline')
                                    @include('datatables::header-inline-hide', ['column' => $column, 'sort' => $sort])
                                @elseif($column['type'] === 'checkbox')
                                    @unless($column['hidden'])
                                        <div 
                                            class="position-relative d-table-cell h-12 overflow-hidden align-top"
                                            wire:key="header_checkbox_{{ $index }}_{{ $this->id }}"
                                        >
                                            <div 
                                                class="w-100 h-100 px-6 py-3 border border-gray-200 bg-transparent text-start text-gray-500 text-uppercase d-flex align-items-center justify-content-center"
                                            >
                                                <span class="badge badge-square @if(count($selected)) badge-primary @else badge-secondary @endif">
                                                    {{ count($visibleSelected) }}
                                                </span>
                                            </div>
                                        </div>
                                    @endunless
                                @else
                                    @include('datatables::header-no-hide', ['column' => $column, 'sort' => $sort])
                                @endif
                            @endforeach
                        </div>
                    @endunless
                    <div class="d-table-row bg-light bg-gradient">
                        @foreach($this->columns as $index => $column)
                            @if($column['hidden'])
                                @if($hideable === 'inline')
                                    <div class="d-table-cell p-2 w-5 overflow-hidden align-top bg-light bg-gradient"></div>
                                @endif
                            @elseif($column['type'] === 'checkbox')
                                @include('datatables::filters.checkbox')
                            @elseif($column['type'] === 'label')
                                <div 
                                    class="d-table-cell p-2 overflow-hidden align-top"
                                    wire:key="header_cell_{{ Str::slug($column['label'], '_') }}_{{ $index }}_{{ $this->id }}"
                                >
                                    {{ $column['label'] ?? '' }}
                                </div>
                            @else
                                <div 
                                    class="d-table-cell p-2 overflow-hidden align-top"
                                    wire:key="header_cell_{{ Str::slug($column['name'], '_') }}_{{ $index }}_{{ $this->id }}"
                                >
                                    @isset($column['filterable'])
                                        @if( is_iterable($column['filterable']) )
                                            <div>
                                                @include('datatables::filters.select', ['index' => $index, 'name' => $column['label'], 'options' => $column['filterable']])
                                            </div>
                                        @else
                                            <div>
                                                @include('datatables::filters.' . ($column['filterView'] ?? $column['type']), ['index' => $index, 'name' => $column['label']])
                                            </div>
                                        @endif
                                    @endisset
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @foreach($this->results as $rowIndex => $row)
                        <div 
                            class="d-table-row {{ $this->rowClasses($row, $loop) }}"
                            wire:key="row_{{ $loop->index }}_{{ Str::random(3) }}_{{ $this->id }}"
                        >
                            @foreach($this->columns as $column)
                                @if($column['hidden'])
                                    @if($hideable === 'inline')
                                        <div 
                                            class="d-table-cell w-5 @unless($column['wrappable']) whitespace-nowrap truncate @endunless overflow-hidden align-top"
                                            wire:key="row_{{ $rowIndex }}_cell_{{ $loop->index }}_{{ $this->id }}"
                                        ></div>
                                    @endif
                                @elseif($column['type'] === 'checkbox')
                                    @include('datatables::checkbox', ['value' => $row->checkbox_attribute])
                                @elseif($column['type'] === 'label')
                                    @include('datatables::label')
                                @else
                                    <div 
                                        class="d-table-cell @unless($column['wrappable']) whitespace-nowrap truncate @endunless @if($column['contentAlign'] === 'right') text-end @elseif($column['contentAlign'] === 'center') text-center @else text-start @endif {{ $this->cellClasses($row, $column) }}"
                                        wire:key="row_{{ $rowIndex }}_cell_{{ $loop->index }}_{{ $this->id }}"
                                    >
                                        {!! $row->{$column['name']} !!}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach

                    @if ($this->hasSummaryRow())
                        <div class="d-table-row p-1">
                            @foreach($this->columns as $column)
                                @unless($column['hidden'])
                                    @if ($column['summary'])
                                        <div 
                                            class="
                                                d-table-cell 
                                                px-6 
                                                py-2 
                                                @unless ($column['wrappable']) 
                                                    whitespace-nowrap truncate 
                                                @endunless 
                                                @if($column['contentAlign'] === 'right') 
                                                    text-end 
                                                @elseif($column['contentAlign'] === 'center') 
                                                    text-center 
                                                @else 
                                                    text-start 
                                                @endif 
                                                {{ $this->cellClasses($row, $column) }}
                                            "
                                            wire:key="summary_cell_{{ $loop->index }}_{{ $this->id }}"
                                        >
                                            {!! $this->summarize($column['name']) !!}
                                        </div>
                                    @else
                                        <div class="d-table-cell"></div>
                                    @endif
                                @endunless
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            @if($this->results->isEmpty())
                <p class="p-3 text-lg text-center">
                    {{ __("There's Nothing to show at the moment") }}
                </p>
            @endif
        </div>

        @unless($this->hidePagination)
            <div class="d-flex align-items-center justify-content-between pt-10">
                @if(count($this->results))
                    <div class="d-flex align-items-center">
                        <select 
                            name="perPage" 
                            class="form-select form-select-sm" 
                            wire:model="perPage"
                        >
                            @foreach($this->perPageOptions as $per_page_option)
                                <option 
                                    value="{{ $per_page_option }}"
                                    wire:key="per_page_{{ $per_page_option }}"
                                >
                                    {{ $per_page_option }}
                                </option>
                            @endforeach
                            @if ($this->showAll)
                                <option value="99999999">{{__('All')}}</option>
                            @endif
                        </select>
                    </div>
                    <div>
                        <div class="d-lg-none">
                            <span class="">{{ $this->results->links('datatables::tailwind-simple-pagination') }}</span>
                        </div>

                        <div class="justify-content-center d-none d-lg-flex">
                            <span>{{ $this->results->links('datatables::tailwind-pagination') }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end text-gray-600">
                        {{__('Results')}} {{ $this->results->firstItem() }} - {{ $this->results->lastItem() }} {{__('of')}}
                        {{ $this->results->total() }}
                    </div>
                @endif
            </div>
        @endif
    </div>

    @if($complex)
        <div class="px-4 py-4 rounded-b-lg rounded-t-none shadow-lg border-2 @if($this->activeFilters) border-blue-500 @else border-transparent @endif @if($complex) border-t-0 @endif">
            <livewire:complex-query :columns="$this->complexColumns" :persistKey="$this->persistKey" :savedQueries="method_exists($this, 'getSavedQueries') ? $this->getSavedQueries() : null" />
        </div>
    @endif

    @if (count($footerLWComponents))
        <div class="row g-1 align-items-center">
            @foreach ($footerLWComponents as $fLWCmpName => $fLWCmpSettings)
                <div 
                    class="{{ 
                        isset($fLWCmpSettings['cmp_wrapper_classes'])
                            ? $fLWCmpSettings['cmp_wrapper_classes']
                            : 'col-auto'
                    }}"
                    wire:ignore
                >
                    @livewire(
                        $fLWCmpName,
                        isset($fLWCmpSettings['cmp_props']) ? $fLWCmpSettings['cmp_props'] : [],
                        key('footerLWComponents_' . $loop->index)
                    )
                </div>
            @endforeach
        </div>
    @endif

    @includeIf($afterTableSlot)

    <span class="hidden  text-start text-center text-end text-gray-900 bg-gray-100 bg-yellow-100 leading-5 "></span>

    @if($this->useModals)
        @include('datatables::modals.modal')
    @endif

    @push('scripts')
        <script>
            Livewire.on('tooltipHydrate', () => {
                $('[data-bs-toggle="tooltip"]').tooltip('dispose');
                $('[data-bs-toggle="tooltip"]').tooltip();
            });
        </script>
    @endpush
</div>
