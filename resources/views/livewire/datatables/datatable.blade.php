<div>
    @includeIf($beforeTableSlot)
    <div class="position-relative">
        <div class="d-flex align-items-center justify-content-between mb-10">
            <div class="d-flex align-items-center">
                @if($this->searchableColumns()->count())
                    <div class="input-group input-group-sm w-100">
                        <input 
                            wire:model.debounce.500ms="search" 
                            class="form-control form-control-sm" 
                            placeholder="{{__('Search in')}} {{ $this->searchableColumns()->map->label->join(', ') }}" 
                            type="text" 
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

            @if($this->activeFilters)
                <span class="text-xl text-primary text-uppercase">@lang('Filter active')</span>
            @endif

            <div class="d-flex flex-wrap align-items-center ">
                <x-icons.cog wire:loading class="text-gray-400 h-9 w-9 animate-spin" />

                @if($this->activeFilters)
                    <button wire:click="clearAllFilters" class="d-flex align-items-center px-3   text-red-500 text-uppercase  border border-red-400  hover:bg-red-200"><span>{{ __('Reset') }}</span>
                        <x-icons.x-circle class="m-2" />
                    </button>
                @endif

                @if(count($this->massActionsOptions))
                    <div class="d-flex align-items-center justify-content-center ">
                        <label for="datatables_mass_actions">{{ __('With selected') }}:</label>
                        <select wire:model="massActionOption" class="px-3 text-uppercase  border" id="datatables_mass_actions">
                            <option value="">{{ __('Choose...') }}</option>
                            @foreach($this->massActionsOptions as $group => $items)
                                @if(!$group)
                                    @foreach($items as $item)
                                        <option value="{{$item['value']}}">{{$item['label']}}</option>
                                    @endforeach
                                @else
                                    <optgroup label="{{$group}}">
                                        @foreach($items as $item)
                                            <option value="{{$item['value']}}">{{$item['label']}}</option>
                                        @endforeach
                                    </optgroup>
                                @endif
                            @endforeach
                        </select>
                        <button
                            wire:click="massActionOptionHandler"
                            class="d-flex align-items-center px-4 py-2 text-success text-uppercase border" type="submit" title="Submit"
                        >Go</button>
                    </div>
                @endif

                @if($exportable)
                    <div 
                        x-data="{ init() {window.livewire.on('startDownload', link => window.open(link, '_blank'))} }" 
                        x-init="init"
                    >
                        <button 
                            wire:click="export" 
                            class="d-flex align-items-center px-3 text-success text-uppercase border"
                        >
                            <span>{{ __('Export') }}</span>
                            <x-icons.excel class="m-2" />
                        </button>
                    </div>
                @endif

                @if($hideable === 'select')
                    @include('datatables::hide-column-multiselect')
                @endif

                @foreach ($columnGroups as $name => $group)
                    <button
                        wire:click="toggleGroup('{{ $name }}')"
                        class="px-3 py-2   text-success text-uppercase  border"
                    >
                        <span class="d-flex align-items-center h-5">
                            {{ isset($this->groupLabels[$name]) ? __($this->groupLabels[$name]) : __('Toggle :group', ['group' => $name]) }}
                        </span>
                    </button>
                @endforeach
                @includeIf($buttonsSlot)
            </div>
        </div>

        @if($hideable === 'buttons')
            <div class="p-2 grid grid-cols-8 gap-2">
                @foreach($this->columns as $index => $column)
                    @if ($column['hideable'])
                        <button wire:click.prefetch="toggle('{{ $index }}')" class="px-3 py-2 rounded text-white
                        {{ $column['hidden'] ? 'bg-light bg-gradient  text-primary' : 'bg-blue-500 hover:bg-blue-800' }}">
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
                <div class="table d-table mw-100 align-middle">
                    @unless($this->hideHeader)
                        <div class="d-table-row">
                            @foreach($this->columns as $index => $column)
                                @if($hideable === 'inline')
                                    @include('datatables::header-inline-hide', ['column' => $column, 'sort' => $sort])
                                @elseif($column['type'] === 'checkbox')
                                    @unless($column['hidden'])
                                        <div 
                                            class="d-flex justify-content-center d-table-cell w-32 h-12 px-4 py-4 overflow-hidden text-start text-uppercase align-top border-bottom border-gray-200"
                                            wire:key="header_checkbox_{{ $index }}_{{ $this->id }}"
                                        >
                                            <div 
                                                class="px-3 py-1 rounded @if(count($selected)) bg-orange-400 @else bg-gray-200 @endif text-white text-center"
                                            >
                                                {{ count($visibleSelected) }}
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
                                    <div class="d-table-cell w-5 overflow-hidden align-top bg-light bg-gradient"></div>
                                @endif
                            @elseif($column['type'] === 'checkbox')
                                @include('datatables::filters.checkbox')
                            @elseif($column['type'] === 'label')
                                <div class="d-table-cell overflow-hidden align-top">
                                    {{ $column['label'] ?? '' }}
                                </div>
                            @else
                                <div class="d-table-cell overflow-hidden align-top">
                                    @isset($column['filterable'])
                                        @if( is_iterable($column['filterable']) )
                                            <div wire:key="{{ $index }}">
                                                @include('datatables::filters.select', ['index' => $index, 'name' => $column['label'], 'options' => $column['filterable']])
                                            </div>
                                        @else
                                            <div wire:key="{{ $index }}">
                                                @include('datatables::filters.' . ($column['filterView'] ?? $column['type']), ['index' => $index, 'name' => $column['label']])
                                            </div>
                                        @endif
                                    @endisset
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @foreach($this->results as $row)
                        <div class="d-table-row p-1 {{ $this->rowClasses($row, $loop) }}">
                            @foreach($this->columns as $column)
                                @if($column['hidden'])
                                    @if($hideable === 'inline')
                                        <div class="d-table-cell w-5 @unless($column['wrappable']) whitespace-nowrap truncate @endunless overflow-hidden align-top"></div>
                                    @endif
                                @elseif($column['type'] === 'checkbox')
                                    @include('datatables::checkbox', ['value' => $row->checkbox_attribute])
                                @elseif($column['type'] === 'label')
                                    @include('datatables::label')
                                @else

                                    <div class="d-table-cell px-6 py-2 @unless($column['wrappable']) whitespace-nowrap truncate @endunless @if($column['contentAlign'] === 'right') text-end @elseif($column['contentAlign'] === 'center') text-center @else text-start @endif {{ $this->cellClasses($row, $column) }}">
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
                                        <div class="d-table-cell px-6 py-2 @unless ($column['wrappable']) whitespace-nowrap truncate @endunless @if($column['contentAlign'] === 'right') text-end @elseif($column['contentAlign'] === 'center') text-center @else text-start @endif {{ $this->cellClasses($row, $column) }}">
                                            {{ $this->summarize($column['name']) }}
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
                            @foreach(config('livewire-datatables.per_page_options', [ 10, 25, 50, 100 ]) as $per_page_option)
                                <option 
                                    value="{{ $per_page_option }}"
                                    wire:key="per_page_{{ $per_page_option }}"
                                >
                                    {{ $per_page_option }}
                                </option>
                            @endforeach
                            <option value="99999999">{{__('All')}}</option>
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

    @includeIf($afterTableSlot)

    <span class="hidden  text-start text-center text-end text-gray-900 bg-gray-100 bg-yellow-100 leading-5 "></span>
</div>
