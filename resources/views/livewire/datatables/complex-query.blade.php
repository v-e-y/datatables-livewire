<div x-data="{
        rules: @if($persistKey) $persist('').as('{{ $persistKey }}') @else '' @endif,
        init() {
            Livewire.on('complexQuery', rules => this.rules = rules)
            if (this.rules && this.rules !== '') {
                $wire.set('rules', this.rules)
                $wire.runQuery()
            }
        }
    }" class=""
>
    <div class="my-4 d-flex justify-content-between text-xl text-uppercase ">
        <span>Query Builder</span>
        <span>@if($errors->any())
            <div class="text-red-500">You have missing values in your rules</div>
        @endif</span>
    </div>

    @if(count($this->rules[0]['content']))
        <div class="my-4 px-4 py-2 bg-gray-500 whitespace-pre-wrap @if($errors->any())text-red-200 @else text-green-100 @endif rounded">{{ $this->rulesString }}@if($errors->any()) Invalid rules @endif</div>
    @endif

    <div>@include('datatables::complex-query-group', ['rules' => $rules, 'parentIndex' => null])</div>

    @if(count($this->rules[0]['content']))
        @unless($errors->any())
            <div class="pt-2  w-100 justify-content-between">
                <div>
                    {{-- <button class="bg-blue-500 px-3 py-2 rounded text-white" wire:click="runQuery">Apply Query</button> --}}
                </div>
                <div class="mt-2 sm:mt-0  sm:">
                    @isset($savedQueries)
                        <div class="d-flex align-items-center " x-data="{
                            name: null,
                            saveQuery() {
                                $wire.call('saveQuery', this.name)
                                this.name = null
                            }
                        }">
                            <input x-model="name" wire:loading.attr="disabled" x-on:keydown.enter="saveQuery" placeholder="save as..." class="flex-grow px-3 py-3 border  text-gray-900 block border-gray-300 shadow-sm " />
                            <button x-bind:disabled="! name" x-show="rules" x-on:click="saveQuery" class="d-flex align-items-center  px-3 py-0.5 border  disabled:border-gray-300 text-success disabled:text-gray-300  text-uppercase   disabled:hover: disabled:pointer-events-none">
                                <span>{{ __('Save') }}</span>
                                <span wire:loading.remove><x-icons.check-circle class="m-2" /></span>
                                <span wire:loading><x-icons.cog class="animate-spin m-2" /></span>
                            </button>
                        </div>
                    @endisset
                    <button x-show="rules" wire:click="resetQuery" class="d-flex align-items-center  px-3 border border-red-400 text-red-500  text-uppercase  hover:bg-red-200">
                        <span>{{ __('Reset') }}</span>
                        <x-icons.x-circle class="m-2" />
                    </button>
                </div>
            </div>
        @endif

    @endif
    @if(count($savedQueries ?? []))
        <div>
            <div class="mt-8 my-4 text-xl text-uppercase ">Saved Queries</div>
            <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-2">
                @foreach($savedQueries as $saved)
                    <div class="flex" wire:key="{{ $saved['id'] }}">
                        <button wire:click="loadRules({{ json_encode($saved['rules']) }})" wire:loading.attr="disabled" class="p-2 flex-grow d-flex align-items-center  px-3 border border-r-0 border-blue-400 rounded-r-none  text-primary  text-uppercase  ">{{ $saved['name'] }}</button>
                        <button wire:click="deleteRules({{ $saved['id'] }})" wire:loading.attr="disabled" class="p-2 d-flex align-items-center  px-3 border border-red-400 rounded-l-none  text-red-500  text-uppercase  hover:bg-red-200">
                            <x-icons.x-circle wire:loading.remove />
                            <x-icons.cog wire:loading class="h-6 w-6 animate-spin" />
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
